<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use App\Models\PaymentMethodField;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PaymentMethodController extends Controller
{
    public function index(Request $request)
    {
        $query = PaymentMethod::withCount(['fields'])
            ->withCount(['fields as active_fields_count' => fn ($q) => $q->where('is_active', true)])
            ->orderBy('sort_order')->orderBy('name');

        if ($request->filled('search')) {
            $query->where('name', 'like', '%'.$request->string('search')->toString().'%');
        }
        if ($request->filled('type') && array_key_exists($request->string('type')->toString(), PaymentMethod::TYPES)) {
            $query->where('type', $request->string('type')->toString());
        }
        if ($request->filled('status')) {
            $query->where('is_active', $request->string('status')->toString() === 'active');
        }

        return view('admin.payment-methods.index', [
            'methods' => $query->paginate(15)->withQueryString(),
            'types' => PaymentMethod::TYPES,
            'filters' => $request->only(['search', 'type', 'status']),
        ]);
    }

    public function create()
    {
        return view('admin.payment-methods.form', [
            'method' => new PaymentMethod(['deposit_enabled' => true, 'withdrawal_enabled' => true, 'is_active' => true, 'type' => 'other']),
            'types' => PaymentMethod::TYPES,
            'fieldTypes' => PaymentMethod::FIELD_TYPES,
            'showOnOptions' => PaymentMethod::SHOW_ON_OPTIONS,
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validateMethod($request);

        $method = DB::transaction(function () use ($request, $data) {
            $method = PaymentMethod::create(array_merge(Arr::except($data, ['fields', 'image']), [
                'slug' => $this->uniqueSlug($request->input('name')),
                'image_path' => $this->handleImage($request, null),
            ]));
            $this->syncFields($method, (array) $request->input('fields', []));

            return $method;
        });

        return redirect()->route('admin_payment_methods.edit', $method)->with('success', 'Payment method created successfully.');
    }

    public function edit(PaymentMethod $paymentMethod)
    {
        return view('admin.payment-methods.form', [
            'method' => $paymentMethod->load('fields'),
            'types' => PaymentMethod::TYPES,
            'fieldTypes' => PaymentMethod::FIELD_TYPES,
            'showOnOptions' => PaymentMethod::SHOW_ON_OPTIONS,
        ]);
    }

    public function update(Request $request, PaymentMethod $paymentMethod)
    {
        $data = $this->validateMethod($request, $paymentMethod->id);

        DB::transaction(function () use ($request, $paymentMethod, $data) {
            $methodData = Arr::except($data, ['fields', 'image']);
            if ($request->input('remove_image') && $paymentMethod->image_path) {
                Storage::disk('public')->delete($paymentMethod->image_path);
                $methodData['image_path'] = null;
            } else {
                $uploaded = $this->handleImage($request, $paymentMethod);
                if ($uploaded !== null || $request->hasFile('image')) {
                    $methodData['image_path'] = $uploaded;
                }
            }
            // Regenerate slug only when the name changed.
            if ($paymentMethod->name !== $request->input('name')) {
                $methodData['slug'] = $this->uniqueSlug($request->input('name'), $paymentMethod->id);
            }
            $paymentMethod->update($methodData);
            $this->syncFields($paymentMethod, (array) $request->input('fields', []));
        });

        return redirect()->route('admin_payment_methods.edit', $paymentMethod)->with('success', 'Payment method updated successfully.');
    }

    public function destroy(PaymentMethod $paymentMethod)
    {
        $usage = DB::table('deposits')->where('payment_method_id', $paymentMethod->id)->count()
            + DB::table('withdrawals')->where('payment_method_id', $paymentMethod->id)->count();

        if ($usage > 0) {
            return back()->with('error', 'This payment method has '.$usage.' transaction(s) and cannot be deleted. Disable it instead to hide it from users.');
        }

        if ($paymentMethod->image_path) {
            Storage::disk('public')->delete($paymentMethod->image_path);
        }
        $paymentMethod->delete();

        return redirect()->route('admin_payment_methods.index')->with('success', 'Payment method deleted.');
    }

    public function toggle(PaymentMethod $paymentMethod)
    {
        $paymentMethod->update(['is_active' => ! $paymentMethod->is_active]);

        return back()->with('success', $paymentMethod->name.' is now '.($paymentMethod->is_active ? 'enabled' : 'disabled').'.');
    }

    protected function validateMethod(Request $request, ?int $ignoreId = null): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:100', Rule::unique('payment_methods', 'name')->ignore($ignoreId)],
            'type' => ['required', Rule::in(array_keys(PaymentMethod::TYPES))],
            'description' => ['nullable', 'string', 'max:500'],
            'instructions' => ['nullable', 'string', 'max:5000'],
            'image' => ['nullable', 'image', 'mimes:jpeg,jpg,png,webp,gif', 'max:2048'],
            'image_url' => ['nullable', 'url', 'max:500', 'starts_with:https://'],
            'deposit_enabled' => ['nullable', 'boolean'],
            'withdrawal_enabled' => ['nullable', 'boolean'],
            'is_active' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0', 'max:10000'],
            'min_deposit' => ['nullable', 'numeric', 'min:0'],
            'max_deposit' => ['nullable', 'numeric', 'min:0', 'gte:min_deposit'],
            'min_withdrawal' => ['nullable', 'numeric', 'min:0'],
            'max_withdrawal' => ['nullable', 'numeric', 'min:0', 'gte:min_withdrawal'],
            'fields' => ['nullable', 'array'],
            'fields.*.id' => ['nullable', 'integer', 'exists:payment_method_fields,id'],
            'fields.*.label' => ['required_with:fields', 'string', 'max:100'],
            'fields.*.type' => ['required_with:fields', Rule::in(array_keys(PaymentMethod::FIELD_TYPES))],
            'fields.*.options_text' => ['nullable', 'string', 'max:2000'],
            'fields.*.placeholder' => ['nullable', 'string', 'max:500'],
            'fields.*.help_text' => ['nullable', 'string', 'max:500'],
            'fields.*.is_required' => ['nullable', 'boolean'],
            'fields.*.show_on' => ['nullable', Rule::in(['both', 'deposit', 'withdrawal'])],
            'fields.*.sort_order' => ['nullable', 'integer', 'min:0', 'max:10000'],
            'fields.*.is_active' => ['nullable', 'boolean'],
        ]);
    }

    protected function handleImage(Request $request, ?PaymentMethod $method): ?string
    {
        if ($request->hasFile('image')) {
            if ($method?->image_path) {
                Storage::disk('public')->delete($method->image_path);
            }

            return $request->file('image')->store('payment-methods', 'public');
        }

        return $method?->image_path;
    }

    /**
     * Reconcile the admin-defined dynamic fields.
     * Safe for history: transactions keep their own method_snapshot/details copies.
     */
    protected function syncFields(PaymentMethod $method, array $fieldsInput): void
    {
        $keptIds = [];
        $order = 0;

        foreach ($fieldsInput as $row) {
            if (empty($row['label'])) {
                continue;
            }
            $order++;

            $options = null;
            if (($row['type'] ?? '') === 'select') {
                $options = collect(preg_split('/[\r\n,]+/', (string) ($row['options_text'] ?? '')))
                    ->map(fn ($o) => trim($o))->filter()->values()->all();
                if (empty($options)) {
                    throw \Illuminate\Validation\ValidationException::withMessages([
                        'fields' => 'Select field "'.$row['label'].'" needs at least one option.',
                    ]);
                }
            }

            $attrs = [
                'label' => trim($row['label']),
                'name' => PaymentMethodField::makeKey($row['label']),
                'type' => $row['type'],
                'placeholder' => $row['placeholder'] ?? null,
                'help_text' => $row['help_text'] ?? null,
                'options' => $options,
                'is_required' => ! empty($row['is_required']),
                'show_on' => $row['show_on'] ?? 'both',
                'sort_order' => $row['sort_order'] ?? $order,
                'is_active' => ! isset($row['is_active']) || ! empty($row['is_active']),
            ];

            if (! empty($row['id']) && $method->fields()->whereKey($row['id'])->exists()) {
                $method->fields()->whereKey($row['id'])->update($attrs);
                $keptIds[] = (int) $row['id'];
            } else {
                // Avoid duplicate keys within the same method.
                $base = $attrs['name'];
                $i = 1;
                while ($method->fields()->where('name', $attrs['name'])->whereNotIn('id', $keptIds)->exists()) {
                    $attrs['name'] = $base.'_'.$i++;
                }
                $keptIds[] = $method->fields()->create($attrs)->id;
            }
        }

        $method->fields()->whereNotIn('id', $keptIds)->delete();
    }

    protected function uniqueSlug(string $name, ?int $ignoreId = null): string
    {
        $base = Str::slug($name) ?: 'method';
        $slug = $base;
        $i = 1;
        while (PaymentMethod::where('slug', $slug)->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))->exists()) {
            $slug = $base.'-'.$i++;
        }

        return $slug;
    }
}

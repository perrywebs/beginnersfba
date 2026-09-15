<?php

namespace App\Livewire\User;

use App\Models\PaymentMethod;
use App\Models\User;
use App\Models\withdrawal as Withdraw;
use App\Jobs\SendMail;
use App\Services\PaymentMethodService;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Withdrawal extends Component
{
    public $withdrawals;

    // Dynamic payment method selection
    public $methods;
    public $payment_method_id;
    public $dynamic = [];
    public $methodFields = [];

    // Legacy bank inputs (used only when the chosen method defines no dynamic fields)
    public $amount, $account_name, $bank_name, $account_number, $account_type, $address, $swift_bic_code;

    public $tax_code, $imf_code, $cot_code;
    public $step = 1; // Default to step 1
    public $error = "";

    protected function selectedMethod(): ?PaymentMethod
    {
        if (! $this->payment_method_id) {
            return null;
        }

        return PaymentMethod::active()
            ->where('withdrawal_enabled', true)
            ->find($this->payment_method_id);
    }

    public function mount()
    {
        $this->methods = PaymentMethod::forWithdrawal()->get();
        if ($this->methods->isNotEmpty()) {
            $this->payment_method_id = $this->methods->first()->id;
        }
        $this->refreshMethodFields();
    }

    public function updatedPaymentMethodId()
    {
        $this->dynamic = [];
        $this->resetValidation();
        $this->refreshMethodFields();
    }

    protected function refreshMethodFields(): void
    {
        $method = $this->selectedMethod();
        $this->methodFields = $method ? $method->fieldsFor('withdrawal')->all() : [];
    }

    protected function baseRules(): array
    {
        $method = $this->selectedMethod();
        $min = $method?->min_withdrawal !== null ? (float) $method->min_withdrawal : 1000;
        $rules = ['amount' => ['required', 'numeric', 'min:'.$min]];
        if ($method?->max_withdrawal !== null) {
            $rules['amount'][] = 'max:'.(float) $method->max_withdrawal;
        }

        return $rules;
    }

    public function submitWithdrawalDetails()
    {
        $method = $this->selectedMethod();
        if (! $method) {
            $this->addError('payment_method_id', 'Please choose a payment method.');
            return;
        }

        $rules = $this->baseRules();

        if (! empty($this->methodFields)) {
            // Dynamic fields replace the legacy bank inputs for configured methods.
            $built = PaymentMethodService::fieldRules($method, 'withdrawal', 'dynamic');
            $rules = array_merge($rules, $built['rules']);
            $this->validate($rules, $built['messages']);
            $this->dynamic = PaymentMethodService::sanitizeDetails($method, 'withdrawal', (array) $this->dynamic);
        } else {
            // Backward compatibility: methods without configured fields use the legacy bank form.
            $rules = array_merge($rules, [
                'account_name' => ['required', 'string', 'max:255'],
                'bank_name' => ['required', 'string', 'max:255'],
                'account_number' => ['required', 'string', 'max:20'],
                'account_type' => ['required', 'string', 'max:20'],
                'address' => ['required', 'string', 'max:255'],
                'swift_bic_code' => ['required', 'string', 'max:50'],
            ]);
            $this->validate($rules);
        }

        $this->step = 2; // Move to tax code step
    }

    public function validateTaxCode()
    {
        if ($this->tax_code != Auth::user()->tax_code) {
            $this->error = "Invalid Tax Code";
            return;
        }
        $this->error = "";
        $this->step = 3; // Move to IMF Code step
    }

    public function validateImfCode()
    {
        if ($this->imf_code != Auth::user()->imf_code) {
            $this->error = "Invalid IMF Code";
            return;
        }
        $this->error = "";
        $this->step = 4; // Move to COT Code step
    }

    public function validateCotCode()
    {
        if ($this->cot_code != Auth::user()->cot_code) {
            $this->error = "Invalid COT Code";
            return;
        }
        $this->error = "";
        $this->processWithdrawal(); // All codes are correct, proceed with withdrawal
        session()->forget('step2'); // Remove 'step2' from Laravel's session
    }

    /** Map dynamic details onto legacy NOT NULL columns so old rows/views keep working. */
    protected function legacyCompatColumns(?PaymentMethod $method, array $details): array
    {
        $byKey = [];
        foreach ($details as $key => $value) {
            $byKey[strtolower($key)] = is_array($value) ? implode(', ', $value) : (string) $value;
        }
        $pick = function (array $keys, string $fallback) use ($byKey) {
            foreach ($keys as $k) {
                if (isset($byKey[$k]) && $byKey[$k] !== '') {
                    return $byKey[$k];
                }
            }

            return $fallback;
        };

        return [
            'account_name' => $this->account_name ?: $pick(['account_name', 'receiver_name', 'account_holder', 'recipient_name'], '-'),
            'bank_name' => $this->bank_name ?: $pick(['bank_name', 'bank'], $method?->name ?? '-'),
            'account_number' => $this->account_number ?: $pick(['account_number', 'wallet_address', 'account_no', 'paypal_email', 'cashapp_username', 'zelle_email'], '-'),
            'account_type' => $this->account_type ?: ($method?->type_label ?? '-'),
            'address' => $this->address ?: $pick(['address', 'full_address', 'country', 'city'], '-'),
            'swift_bic_code' => $this->swift_bic_code ?: $pick(['swift_bic_code', 'swift', 'routing_number', 'reference', 'network'], '-'),
        ];
    }

    public function processWithdrawal()
    {
        $method = $this->selectedMethod();
        if (! $method) {
            session()->flash('error', 'Please choose a payment method.');
            $this->step = 1;
            return;
        }

        // Re-validate server-side: never trust the multi-step frontend state.
        $rules = $this->baseRules();
        if (! empty($this->methodFields)) {
            $built = PaymentMethodService::fieldRules($method, 'withdrawal', 'dynamic');
            $rules = array_merge($rules, $built['rules']);
            $this->validate($rules, $built['messages']);
            $details = PaymentMethodService::sanitizeDetails($method, 'withdrawal', (array) $this->dynamic);
        } else {
            $details = [];
        }

        try {
            $withdrawal = DB::transaction(function () use ($method, $details) {
                $user = User::whereKey(Auth::id())->lockForUpdate()->firstOrFail();

                if ($user->account_bal < $this->amount) {
                    throw new \RuntimeException('Insufficient balance to withdraw');
                }

                $user->decrement('account_bal', $this->amount);

                return Withdraw::create(array_merge(
                    $this->legacyCompatColumns($method, $details),
                    [
                        'user_id' => $user->id,
                        'payment_method_id' => $method->id,
                        'reference' => PaymentMethodService::generateReference('WDL'),
                        'amount' => $this->amount,
                        'method_snapshot' => PaymentMethodService::snapshot($method, 'withdrawal'),
                        'details' => $details,
                        'status' => Withdraw::STATUS_PENDING,
                    ]
                ));
            });
        } catch (\RuntimeException $e) {
            session()->flash('error', $e->getMessage());
            $this->step = 1;
            return;
        }

        $user = Auth::user();
        $subject = "Withdrawal Request";
        $bodyUser = [
            "name" => $user->name,
            "title" => "Withdrawal Request Notification",
            "message" => "We have successfully received your withdrawal request of \${$this->amount} via {$method->name} (Ref: {$withdrawal->reference}). Your account will be credited after confirmation.",
        ];
        $bodyAdmin = [
            "name" => "Admin",
            "title" => "Withdrawal Request Notification",
            "message" => "Hello Admin, a user by the name {$user->name} has made a withdrawal request of \${$this->amount} via {$method->name} (Ref: {$withdrawal->reference}).",
        ];

        SendMail::dispatch($user->email, $subject, $bodyUser, $bodyAdmin);

        session()->flash('success', 'Withdrawal Request Created Successfully (Ref: '.$withdrawal->reference.'). Check your email for more information');
        $this->reset(['dynamic', 'amount', 'account_name', 'bank_name', 'account_number', 'account_type', 'address', 'swift_bic_code', 'tax_code', 'imf_code', 'cot_code', 'step', 'error']);
        $this->step = 1;
        $this->refreshMethodFields();
    }

    public function render()
    {
        return view('livewire.user.withdrawal', ['step' => $this->step]);
    }
}

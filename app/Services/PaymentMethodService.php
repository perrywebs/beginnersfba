<?php

namespace App\Services;

use App\Models\PaymentMethod;
use Illuminate\Support\Str;

/**
 * Shared logic for the dynamic payment-method system.
 * Used by the user recharge controller, the withdrawal Livewire component
 * and the admin approval flows so validation is never duplicated.
 */
class PaymentMethodService
{
    /**
     * Build Laravel validation rules for a method's dynamic fields.
     *
     * @return array{rules: array, messages: array}
     */
    public static function fieldRules(PaymentMethod $method, string $context, string $inputKey = 'fields'): array
    {
        $rules = [];
        $messages = [];

        foreach ($method->fieldsFor($context) as $field) {
            $key = $inputKey.'.'.$field->name;
            $fieldRules = [];

            if ($field->is_required) {
                $fieldRules[] = 'required';
            } else {
                $fieldRules[] = 'nullable';
            }

            switch ($field->type) {
                case 'number':
                    $fieldRules[] = 'numeric';
                    break;
                case 'email':
                    $fieldRules[] = 'email:rfc';
                    break;
                case 'url':
                    $fieldRules[] = 'url';
                    break;
                case 'select':
                    $options = $field->options_list;
                    if (! empty($options)) {
                        $fieldRules[] = 'in:'.implode(',', array_map(fn ($o) => self::escapeInRule($o), $options));
                    }
                    break;
                default:
                    $fieldRules[] = 'string';
                    $fieldRules[] = 'max:1000';
                    break;
            }

            // Secrets / free text stay bounded.
            if (in_array($field->type, ['text', 'tel', 'password'], true)) {
                $fieldRules[] = 'max:500';
            }

            $rules[$key] = $fieldRules;
            $messages[$key.'.required'] = $field->label.' is required.';
            $messages[$key.'.in'] = 'Please choose a valid option for '.$field->label.'.';
        }

        return ['rules' => $rules, 'messages' => $messages];
    }

    /**
     * Strip any unexpected keys so users cannot inject arbitrary field names.
     */
    public static function sanitizeDetails(PaymentMethod $method, string $context, array $input): array
    {
        $allowed = $method->fieldsFor($context)->pluck('name')->all();
        $details = [];
        foreach ($allowed as $name) {
            if (array_key_exists($name, $input)) {
                $value = $input[$name];
                $details[$name] = is_string($value) ? trim($value) : $value;
            }
        }

        return $details;
    }

    /** Human-readable labels keyed by field name, for snapshots and admin display. */
    public static function fieldLabels(PaymentMethod $method, string $context): array
    {
        return $method->fieldsFor($context)->pluck('label', 'name')->all();
    }

    /**
     * Immutable snapshot of the method configuration at submission time.
     * Historical transactions keep rendering correctly even if the admin
     * later edits the payment method.
     */
    public static function snapshot(PaymentMethod $method, string $context): array
    {
        $method->loadMissing('fields');

        return [
            'method_id' => $method->id,
            'method_name' => $method->name,
            'method_type' => $method->type,
            'method_type_label' => $method->type_label,
            'instructions' => $method->instructions,
            'image_path' => $method->image_path,
            'image_url' => $method->image_url,
            'fields' => $method->fieldsFor($context)->map(fn ($f) => [
                'name' => $f->name,
                'label' => $f->label,
                'type' => $f->type,
                'options' => $f->type === 'select' ? $f->options_list : null,
                'is_required' => (bool) $f->is_required,
            ])->values()->all(),
        ];
    }

    public static function generateReference(string $prefix): string
    {
        return strtoupper($prefix).'-'.date('Ymd').'-'.strtoupper(Str::random(8));
    }

    protected static function escapeInRule(string $value): string
    {
        // Laravel's `in:` rule splits on commas — values with commas are not supported for select options.
        return str_replace(',', '', $value);
    }
}

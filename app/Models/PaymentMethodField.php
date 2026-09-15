<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class PaymentMethodField extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'options' => 'array',
        'is_required' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function paymentMethod(): BelongsTo
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    /** Normalized option list for select fields. */
    public function getOptionsListAttribute(): array
    {
        $options = $this->options ?? [];
        if (is_string($options)) {
            $decoded = json_decode($options, true);
            $options = is_array($decoded) ? $decoded : [];
        }

        return collect($options)
            ->flatten()
            ->map(fn ($o) => trim((string) $o))
            ->filter()
            ->values()
            ->all();
    }

    public static function makeKey(string $label): string
    {
        $key = Str::slug($label, '_');
        return $key !== '' ? $key : 'field_'.Str::random(6);
    }
}

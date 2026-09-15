<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class PaymentMethod extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'deposit_enabled' => 'boolean',
        'withdrawal_enabled' => 'boolean',
        'is_active' => 'boolean',
        'min_deposit' => 'decimal:2',
        'max_deposit' => 'decimal:2',
        'min_withdrawal' => 'decimal:2',
        'max_withdrawal' => 'decimal:2',
        'fee_percent' => 'decimal:2',
        'fee_fixed' => 'decimal:2',
    ];

    // Status: 1 = pending, 2 = approved/completed, 3 = rejected/denied
    public const STATUS_PENDING = 1;
    public const STATUS_APPROVED = 2;
    public const STATUS_REJECTED = 3;

    public const TYPES = [
        'bank' => 'Bank',
        'crypto' => 'Crypto',
        'fast_payment' => 'Fast Payment',
        'e_wallet' => 'E-Wallet',
        'money_transfer' => 'Money Transfer',
        'other' => 'Other',
    ];

    public const FIELD_TYPES = [
        'text' => 'Text',
        'number' => 'Number',
        'email' => 'Email',
        'textarea' => 'Textarea',
        'select' => 'Select / Dropdown',
        'url' => 'URL',
        'tel' => 'Phone',
        'password' => 'Secret',
    ];

    public const SHOW_ON_OPTIONS = [
        'both' => 'Deposit & Withdrawal',
        'deposit' => 'Deposit only',
        'withdrawal' => 'Withdrawal only',
    ];

    public function fields(): HasMany
    {
        return $this->hasMany(PaymentMethodField::class)->orderBy('sort_order')->orderBy('id');
    }

    public function activeFields(): HasMany
    {
        return $this->fields()->where('is_active', true);
    }

    /** Fields visible for a given context (deposit|withdrawal). */
    public function fieldsFor(string $context): \Illuminate\Support\Collection
    {
        return $this->activeFields()
            ->whereIn('show_on', ['both', $context])
            ->orderBy('sort_order')->orderBy('id')->get();
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('name');
    }

    public function scopeForDeposit($query)
    {
        return $query->active()->where('deposit_enabled', true)->ordered();
    }

    public function scopeForWithdrawal($query)
    {
        return $query->active()->where('withdrawal_enabled', true)->ordered();
    }

    public function getTypeLabelAttribute(): string
    {
        return self::TYPES[$this->type] ?? ucfirst(str_replace('_', ' ', (string) $this->type));
    }

    /** Resolved image URL: uploaded file wins, then external HTTPS URL. */
    public function getImageSrcAttribute(): ?string
    {
        if ($this->image_path && Storage::disk('public')->exists($this->image_path)) {
            return Storage::url($this->image_path);
        }
        if (! empty($this->image_url) && str_starts_with($this->image_url, 'https://')) {
            return $this->image_url;
        }
        return null;
    }
}

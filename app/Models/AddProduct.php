<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class AddProduct extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::creating(function (AddProduct $product) {
            if (empty($product->slug)) {
                $product->slug = static::generateUniqueSlug($product->productName);
            }
        });

        static::updating(function (AddProduct $product) {
            if (empty($product->slug) && !$product->isDirty('slug')) {
                $product->slug = static::generateUniqueSlug($product->productName);
            }
        });
    }

    public static function generateUniqueSlug(string $name): string
    {
        $slug = Str::slug($name);
        $originalSlug = $slug;
        $counter = 1;

        while (static::withoutGlobalScopes()->where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getFirstPhotoAttribute(): ?string
    {
        $photos = json_decode($this->photos, true);
        if (!empty($photos) && is_array($photos)) {
            return $photos[0];
        }
        return null;
    }
}

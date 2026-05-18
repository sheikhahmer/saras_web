<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'description',
        'price',
        'image',
        'is_featured',
        'has_offer',
        'old_price',
        'new_price',
        'tags',
        'care_instructions',
    ];

    protected static function booted(): void
    {
        static::saving(function (Product $product): void {
            if (! $product->isDirty('title') && filled($product->slug)) {
                return;
            }

            $base = Str::slug((string) $product->title) ?: 'product';
            $product->slug = static::uniqueSlug($base, $product->id);
        });
    }

    public static function uniqueSlug(string $base, ?int $ignoreId = null): string
    {
        $slug = $base;
        $i = 2;
        while (static::query()
            ->when($ignoreId !== null, fn ($q) => $q->where('id', '!=', $ignoreId))
            ->where('slug', $slug)
            ->exists()) {
            $slug = $base.'-'.$i++;
        }

        return $slug;
    }

    protected $casts = [
        'image' => 'array',
    ];
    const NEW_ARRIVAL = 'new_arrival';
    const BEST_SELLER = 'best_seller';
    const FEATURED = 'featured';

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

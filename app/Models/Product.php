<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'title',
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

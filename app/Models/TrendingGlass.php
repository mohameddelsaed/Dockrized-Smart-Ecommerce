<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrendingGlass extends Model
{
    protected $fillable = [
        'brand',
        'name',
        'image',
        'price',
        'original_price',
        'rating',
        'reviews_count',
        'free_shipping',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'original_price' => 'decimal:2',
        'rating' => 'decimal:1',
        'free_shipping' => 'boolean',
    ];
}

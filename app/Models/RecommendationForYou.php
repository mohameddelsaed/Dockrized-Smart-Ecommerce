<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecommendationForYou extends Model
{
    protected $table = 'recommendations_for_you';

    protected $fillable = [
        'category',
        'brand',
        'name',
        'image',
        'price',
        'original_price',
        'rating',
        'reviews_count',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'original_price' => 'decimal:2',
        'rating' => 'decimal:1',
    ];
}

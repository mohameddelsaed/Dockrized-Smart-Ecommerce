<?php

namespace Database\Seeders;

use App\Models\RecommendationForYou;
use Illuminate\Database\Seeder;

class RecommendationForYouSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'category' => 'Electronics',
                'brand' => 'Apple',
                'name' => 'Apple iPhone 15 Pro Max 256GB Natural Titanium',
                'price' => 4299,
                'original_price' => 4999,
                'rating' => 5.0,
                'reviews_count' => 3241,
            ],
            [
                'category' => 'Electronics',
                'brand' => 'Samsung',
                'name' => 'Samsung Galaxy S23 Ultra 512GB Phantom Black',
                'price' => 4100,
                'original_price' => 4799,
                'rating' => 5.0,
                'reviews_count' => 2876,
            ],
            [
                'category' => 'Electronics',
                'brand' => 'Google',
                'name' => 'Google Pixel 8 Pro 256GB Obsidian',
                'price' => 3799,
                'original_price' => 4299,
                'rating' => 5.0,
                'reviews_count' => 1945,
            ],
            [
                'category' => 'Electronics',
                'brand' => 'OnePlus',
                'name' => 'OnePlus 11 12GB+256GB Titan Black',
                'price' => 2899,
                'original_price' => 3299,
                'rating' => 5.0,
                'reviews_count' => 1532,
            ],
        ];

        foreach ($items as $item) {
            RecommendationForYou::updateOrCreate(
                ['brand' => $item['brand'], 'name' => $item['name']],
                $item
            );
        }
    }
}

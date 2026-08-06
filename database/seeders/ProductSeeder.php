<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'brand' => 'CHICCO',
                'name' => 'Chicco Baby Bottle Natural Feeling Pink 150ml 0m+',
                'price' => 299,
                'original_price' => 399,
                'rating' => 5.0,
                'reviews_count' => 3241,
                'stock' => 100,
            ],
            [
                'brand' => 'CHICCO',
                'name' => 'Chicco Baby Bottle Natural Feeling Blue 150ml 0m+',
                'price' => 299,
                'original_price' => 500,
                'rating' => 5.0,
                'reviews_count' => 1892,
                'stock' => 100,
            ],
            [
                'brand' => 'CHICCO',
                'name' => 'Chicco Teat Physio anti-colica accenttata da 9 bambini su 10',
                'price' => 100,
                'original_price' => 200,
                'rating' => 5.0,
                'reviews_count' => 456,
                'stock' => 100,
            ],
            [
                'brand' => 'CHICCO',
                'name' => 'Chicco Physio Air Soothers 0-6 months silicone',
                'price' => 2400,
                'original_price' => 3600,
                'rating' => 5.0,
                'reviews_count' => 1104,
                'stock' => 100,
            ],
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(
                ['brand' => $product['brand'], 'name' => $product['name']],
                $product
            );
        }
    }
}

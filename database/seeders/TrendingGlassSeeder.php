<?php

namespace Database\Seeders;

use App\Models\TrendingGlass;
use Illuminate\Database\Seeder;

class TrendingGlassSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'brand' => 'Ray-Ban',
                'name' => 'RAY-BAN | META WAYFARER (Gen 2) Frame Shiny Black Lenses G-15',
                'price' => 2299,
                'original_price' => 3999,
                'rating' => 5.0,
                'reviews_count' => 3241,
                'free_shipping' => false,
            ],
            [
                'brand' => 'Oakley',
                'name' => 'OAKLEY | HOLBROOK XL Matte Black Frame Prizm Black Lenses',
                'price' => 1850,
                'original_price' => 2500,
                'rating' => 5.0,
                'reviews_count' => 1892,
                'free_shipping' => false,
            ],
            [
                'brand' => 'Prada',
                'name' => 'PRADA | PR 01VS Oversized Square Frame Havana Brown Lenses',
                'price' => 3100,
                'original_price' => 4200,
                'rating' => 5.0,
                'reviews_count' => 456,
                'free_shipping' => false,
            ],
            [
                'brand' => 'Maui Jim',
                'name' => 'Maui Jim | Red Sands Polarized Sunglasses Bronze Frame',
                'price' => 2400,
                'original_price' => 3600,
                'rating' => 5.0,
                'reviews_count' => 1104,
                'free_shipping' => true,
            ],
        ];

        foreach ($items as $item) {
            TrendingGlass::updateOrCreate(
                ['brand' => $item['brand'], 'name' => $item['name']],
                $item
            );
        }
    }
}

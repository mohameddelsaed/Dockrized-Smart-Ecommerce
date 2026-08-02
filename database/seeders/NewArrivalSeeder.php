<?php

namespace Database\Seeders;

use App\Models\NewArrival;
use Illuminate\Database\Seeder;

class NewArrivalSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'brand' => 'BTC',
                'name' => 'BTC 31.1g Silver Islamic Bangle - Al-Fatiha',
                'price' => 1299,
                'original_price' => 2999,
                'rating' => 5.0,
                'reviews_count' => 3241,
                'free_shipping' => false,
            ],
            [
                'brand' => 'Onda',
                'name' => 'Onda JET Comfortable, Lightweight & Stylish Slipper',
                'price' => 850,
                'original_price' => 900,
                'rating' => 5.0,
                'reviews_count' => 1892,
                'free_shipping' => false,
            ],
            [
                'brand' => 'La Roche-Posay',
                'name' => 'Anthelios UVAir Sunscreen Serum SPF 50+ with Niacinamide, Daily',
                'price' => 900,
                'original_price' => 1200,
                'rating' => 5.0,
                'reviews_count' => 456,
                'free_shipping' => false,
            ],
            [
                'brand' => 'Bath & Body Works',
                'name' => 'Bath & Body Works Touch of Gold Fine Fragrance Mist 236ml',
                'price' => 400,
                'original_price' => 800,
                'rating' => 5.0,
                'reviews_count' => 1104,
                'free_shipping' => false,
            ],
        ];

        foreach ($items as $item) {
            NewArrival::updateOrCreate(
                ['brand' => $item['brand'], 'name' => $item['name']],
                $item
            );
        }
    }
}

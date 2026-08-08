<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $sunglasses = Category::where('name', 'Sunglasses')->first();
        $babyCare = Category::where('name', 'Baby Care')->first();
        $electronics = Category::where('name', 'Electronics')->first();

        $products = [
            // Sunglasses
            [
                'category_id' => $sunglasses?->id,
                'name' => 'RAY-BAN | META WAYFARER (Gen 2) Frame Shiny Black Lenses G-15',
                'description' => 'Ray-Ban Meta Wayfarer Gen 2, shiny black frame with G-15 lenses.',
                'price' => 3999,
                'discount_price' => 2299,
                'stock' => 50,
            ],
            [
                'category_id' => $sunglasses?->id,
                'name' => 'OAKLEY | HOLBROOK XL Matte Black Frame Prizm Black Lenses',
                'description' => 'Oakley Holbrook XL, matte black frame with Prizm black lenses.',
                'price' => 2500,
                'discount_price' => 1850,
                'stock' => 50,
            ],
            [
                'category_id' => $sunglasses?->id,
                'name' => 'PRADA | PR 01VS Oversized Square Frame Havana Brown Lenses',
                'description' => 'Prada PR 01VS oversized square frame with Havana brown lenses.',
                'price' => 4200,
                'discount_price' => 3100,
                'stock' => 50,
            ],
            [
                'category_id' => $sunglasses?->id,
                'name' => 'Maui Jim | Red Sands Polarized Sunglasses Bronze Frame',
                'description' => 'Maui Jim Red Sands polarized sunglasses with bronze frame.',
                'price' => 3600,
                'discount_price' => 2400,
                'stock' => 50,
            ],

            // Baby Care (CHICCO)
            [
                'category_id' => $babyCare?->id,
                'name' => 'Chicco Baby Bottle Natural Feeling Pink 150ml 0m+',
                'description' => 'Chicco Natural Feeling baby bottle, pink, 150ml, suitable from 0 months.',
                'price' => 399,
                'discount_price' => 299,
                'stock' => 100,
            ],
            [
                'category_id' => $babyCare?->id,
                'name' => 'Chicco Baby Bottle Natural Feeling Blue 150ml 0m+',
                'description' => 'Chicco Natural Feeling baby bottle, blue, 150ml, suitable from 0 months.',
                'price' => 500,
                'discount_price' => 299,
                'stock' => 100,
            ],
            [
                'category_id' => $babyCare?->id,
                'name' => 'Chicco Teat Physio anti-colica accenttata da 9 bambini su 10',
                'description' => 'Chicco Physio anti-colic teat, preferred by 9 out of 10 babies.',
                'price' => 200,
                'discount_price' => 100,
                'stock' => 100,
            ],
            [
                'category_id' => $babyCare?->id,
                'name' => 'Chicco Physio Air Soothers 0-6 months silicone',
                'description' => 'Chicco Physio Air silicone soothers for 0-6 months.',
                'price' => 3600,
                'discount_price' => 2400,
                'stock' => 100,
            ],

            // Electronics
            [
                'category_id' => $electronics?->id,
                'name' => 'Apple iPhone 15 Pro Max 256GB Natural Titanium',
                'description' => 'Apple iPhone 15 Pro Max, 256GB storage, Natural Titanium finish.',
                'price' => 4999,
                'discount_price' => 4299,
                'stock' => 30,
            ],
            [
                'category_id' => $electronics?->id,
                'name' => 'Samsung Galaxy S23 Ultra 512GB Phantom Black',
                'description' => 'Samsung Galaxy S23 Ultra, 512GB storage, Phantom Black finish.',
                'price' => 4799,
                'discount_price' => 4100,
                'stock' => 30,
            ],
            [
                'category_id' => $electronics?->id,
                'name' => 'Google Pixel 8 Pro 256GB Obsidian',
                'description' => 'Google Pixel 8 Pro, 256GB storage, Obsidian finish.',
                'price' => 4299,
                'discount_price' => 3799,
                'stock' => 30,
            ],
            [
                'category_id' => $electronics?->id,
                'name' => 'OnePlus 11 12GB+256GB Titan Black',
                'description' => 'OnePlus 11, 12GB RAM + 256GB storage, Titan Black finish.',
                'price' => 3299,
                'discount_price' => 2899,
                'stock' => 30,
            ],
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(
                ['name' => $product['name']],
                $product
            );
        }
    }
}

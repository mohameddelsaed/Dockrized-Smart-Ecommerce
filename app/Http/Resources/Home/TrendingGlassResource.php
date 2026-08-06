<?php

namespace App\Http\Resources\Home;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TrendingGlassResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'brand' => $this->brand,
            'name' => $this->name,
            'image' => $this->image,
            'price' => $this->price,
            'original_price' => $this->original_price,
            'rating' => $this->rating,
            'reviews_count' => $this->reviews_count,
            'free_shipping' => $this->free_shipping,
        ];
    }
}

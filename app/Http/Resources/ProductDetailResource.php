<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'category' => $this->category->name,
            'images' => $this->images->pluck('image_path'),
            'price' => $this->price,
            'discount_price' => $this->discount_price,
            'stock_status' => $this->stock > 0 ? 'in_stock' : 'out_of_stock',
            'rating' => round($this->reviews_avg_rating ?? 0, 1),
            'reviews' => ReviewResource::collection($this->reviews),
        ];
    }
}

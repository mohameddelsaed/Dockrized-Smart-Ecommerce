<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'image' => optional($this->images->first())->image_path,
            'price' => $this->price,
            'discount_price' => $this->discount_price,
            'has_discount' => ! is_null($this->discount_price),
            'rating' => round($this->reviews_avg_rating ?? 0, 1),
        ];
    }
}

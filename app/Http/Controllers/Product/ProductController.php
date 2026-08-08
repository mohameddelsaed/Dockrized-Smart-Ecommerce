<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrowseProductRequest;
use App\Http\Requests\SearchProductRequest;
use App\Http\Resources\ProductDetailResource;
use App\Http\Resources\ProductResource;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(BrowseProductRequest $request)
    {
        $query = Product::query()
            ->with('images')
            ->withAvg('reviews', 'rating');

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        $products = $query->latest()->paginate(20);

        return success(
            'Products retrieved successfully.',
            ProductResource::collection($products)
        );
    }

    
    public function show(Product $product)
    {
        $product->load(['category', 'images', 'reviews.user'])
            ->loadAvg('reviews', 'rating');

        return success(
            'Product retrieved successfully.',
            new ProductDetailResource($product)
        );
    }
}

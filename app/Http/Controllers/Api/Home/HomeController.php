<?php

namespace App\Http\Controllers\Api\Home;

use App\Http\Controllers\Controller;
use App\Http\Resources\Home\NewArrivalResource;
use App\Http\Resources\Home\RecommendationForYouResource;
use App\Http\Resources\Home\TrendingGlassResource;
use App\Models\NewArrival;
use App\Models\RecommendationForYou;
use App\Models\TrendingGlass;
use Illuminate\Http\JsonResponse;

class HomeController extends Controller
{
    public function trendingGlasses(): JsonResponse
    {
        return response()->json(
            TrendingGlassResource::collection(TrendingGlass::all())
        );
    }

    public function newArrivals(): JsonResponse
    {
        return response()->json(
            NewArrivalResource::collection(NewArrival::all())
        );
    }

    public function recommendations(): JsonResponse
    {
        return response()->json(
            RecommendationForYouResource::collection(RecommendationForYou::all())
        );
    }
}

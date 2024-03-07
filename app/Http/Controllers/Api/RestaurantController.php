<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::with('foods', 'types')->paginate(20);
        return response()->json([
            'success' => true,
            'results' => $restaurants
        ]);
    }

    public function show(string $slug)
    {
        $restaurants = Restaurant::where('slug', $slug)->with('foods', 'types')->first();
        return response()->json([
            'success' => true,
            'result' => $restaurants,
        ]);
    }
}

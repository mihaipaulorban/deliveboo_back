<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FoodStoreRequest;
use App\Http\Requests\FoodUpdateRequest;
use App\Models\Food;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $restaurant_id = Auth::user()->restaurant->id;

        $foods = Food::where('restaurant_id', $restaurant_id)->where('is_visible', 1)->get();
        $not_visible_foods = Food::where('restaurant_id', $restaurant_id)->where('is_visible', 0)->get();
        return view('dashboard', compact('foods', 'not_visible_foods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('foods.create');
    }

    /** 
     * Display the specified resource.
     * */
    public function show(Food $food)
    {
        return view('foods.show', compact('food'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FoodStoreRequest $request)
    {
        $data = $request->validated();

        $restaurant_id = Auth::user()->restaurant->id;

        $data['restaurant_id'] = $restaurant_id;

        $new_food = new Food();
        $new_food->fill($data);

        if ($request->hasFile('img')) {
            $new_food->img = Storage::put('uploads', $request->file('img'));
        }

        $new_food->save();

        return redirect()->route('admin.foods.index')->with('message', "Il piatto: \"$new_food->name\" è stato aggiunto correttamente!");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Food $food)
    {
        return view('foods.edit', compact('food'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FoodUpdateRequest $request, Food $food)
    {
        $data = $request->validated();

        if ($request->hasFile('img')) {
            // Elimina l'immagine precedente prima di caricare quella nuova
            if ($food->img) {
                Storage::delete($food->img);
            }
            $data['img'] = Storage::put('uploads', $request->file('img'));
        }

        $food->update($data);

        return redirect()->route('admin.foods.index')->with('message', "Il piatto: \"$food->name\" è stato aggiornato correttamente!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Food $food)
    {
        // Elimina l'immagine associata al piatto prima di eliminarlo
        if ($food->img) {
            Storage::delete($food->img);
        }

        $food->delete();

        return redirect()->route('admin.foods.index')->with('message', "Il piatto: \"$food->name\" è stato eliminato!");
    }
}

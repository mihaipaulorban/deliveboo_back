<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FoodStoreRequest;
use App\Http\Requests\FoodUpdateRequest;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Seleziona tutti i piatti visibili
        $foods = Food::where('is_visible', 1)->get();

        // Seleziona tutti i piatti non visibili
        $notVisibleFoods = Food::where('is_visible', 0)->get();

        return view('dashboard', compact('foods', 'notVisibleFoods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $foods = Food::all();
        return view('foods.create', compact('foods'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FoodStoreRequest $request)
    {
        $data = $request->validated();
        $food = new Food();
        $food->fill($data);
        if (isset($data['img'])) {
            $food->img = Storage::put('uploads', $data['img']);
        };
        $food->save();
        // Più tardi si potrebbe passare lo slug invece che l'id per cui usare $food non $food->id
        return redirect()->route('admin.foods.index', $food->id)->with('message', 'Food item added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Food $food)
    {
        return view('foods.show', compact('food'));
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
        if (isset($data['img'])) {
            $food->img = Storage::put('uploads', $data['img']);
        };
        $food->update($data);
        return redirect()->route('admin.foods.index', $food->id)->with('message', 'Food items updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Food $food)
    {
        if ($food->img) {
            Storage::delete($food->img);
        }
        $food->delete();
        return redirect()->route('admin.foods.index')->with('message', 'Food items deleted successfully');
    }
}

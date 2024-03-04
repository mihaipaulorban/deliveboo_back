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
        $foods = Food::all();
        return view('dashboard', compact('foods'));
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
        $data = $request->validate();
        $food = new Food();
        $food->fill($data);
        if (isset($data['img'])) {
            $food->img = Storage::put('uploads', $data['img']);
        };
        $food->save();
        // Più tardi si potrebbe passare lo slug invece che l'id per cui usare $food non $food->id
        return redirect()->route('admin.foods.index', $food->id)->with('message', 'Piatto aggiunto correttamente');
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
        return redirect()->route('admin.foods.index', $food->id)->with('message', 'Progetto aggiornato correttamente');
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
        return redirect()->route('admin.foods.index')->with('message', 'Progetto cancellato correttamente');
    }
}

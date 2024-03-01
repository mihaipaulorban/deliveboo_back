<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $foods = Food::all();
        return view('foods.list', compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Food $foods)
    {
        return view('create', compact('foods'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Qui si potrebbe aggiungere una form request validation passando come parametro della funzione store il nome della form request e invece
        // di $request->all(); usare $request->validated();
        $data = $request->all();
        $food = new Food();
        $food->fill($data);
        $food->save();
        // Più tardi si potrebbe passare lo slug invece che l'id per cui usare $food non $food->id
        return redirect()->route('admin.foods.index', $food->id)->with('message', 'Piatto aggiunto correttamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Food $food)
    {
        return view('show', compact('food'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Food $food)
    {
        return view('edit', compact('food'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

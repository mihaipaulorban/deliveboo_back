<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FoodStoreRequest;
use App\Http\Requests\FoodUpdateRequest;
use App\Models\Food;
use Illuminate\Support\Facades\Storage;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $foods = Food::where('is_visible', 1)->get();
        $notVisibleFoods = Food::where('is_visible', 0)->get();
        return view('dashboard', compact('foods', 'notVisibleFoods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('foods.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FoodStoreRequest $request)
    {
        $data = $request->validated();

        // Controlla se l'utente autenticato ha un ristorante associato
        if (auth()->user()->restaurant) {
            // Aggiungi il restaurant_id dal ristorante associato all'utente autenticato
            $data['restaurant_id'] = auth()->user()->restaurant->id;

            $food = new Food();
            $food->fill($data);

            if ($request->hasFile('img')) {
                $food->img = Storage::put('uploads', $request->file('img'));
            }

            $food->save();

            return redirect()->route('admin.foods.index')->with('message', 'Piatto aggiunto correttamente');
        } else {
            // Gestisci il caso in cui l'utente non abbia un ristorante associato
            return redirect()->route('admin.foods.index')->with('error', 'Non hai un ristorante associato. Impossibile aggiungere il piatto.');
        }
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

        return redirect()->route('admin.foods.index')->with('message', 'Piatto aggiornato correttamente');
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

        return redirect()->route('admin.foods.index')->with('message', 'Piatto cancellato correttamente');
    }
}

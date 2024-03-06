<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Http\Requests\StoreRestaurantRequest;
use App\Http\Requests\UpdateRestaurantRequest;
use Illuminate\Support\Facades\Storage;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Recupero l'utente loggato
        $user = auth()->user();
        // Recupero il primo ristorante che ha quel determinato id corrispondete all'id loggato
        $restaurant = Restaurant::where('user_id', $user->id)->first();
        // Restituisci il risturante filtrato alla vista
        return view('restaurants.index', compact('restaurant'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     $restaurants = Restaurant::all();
    //     return view('restaurants.create', compact('restaurants'));
    // }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(StoreRestaurantRequest $request)
    // {
    //     $data = $request->validated();
    //     $new_restaurant = new Restaurant();
    //     $new_restaurant->fill($data);
    //     if (isset($data['cover_img'])) {
    //         $new_restaurant->cover_img = Storage::put('uploads', $data['cover_img']);
    //     };
    //     if (isset($data['logo'])) {
    //         $new_restaurant->logo = Storage::put('uploads', $data['logo']);
    //     };
    //     $new_restaurant->save();

    //     /* ricordarsi di cancellare id per passare lo slug */
    //     return redirect()->route('admin.restaurants.index', $new_restaurant->id)->with('message', 'Restaurant added successfully');
    // }

    /**
     * Display the specified resource.
     */
    // public function show(Restaurant $restaurant)
    // {
    //     return view('restaurants.show', compact('restaurant'));
    // }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(Restaurant $restaurant)
    // {
    //     return view('restaurants.edit', compact('restaurant'));
    // }

    /**
     * Update the specified resource in storage.
     */
    // public function update(UpdateRestaurantRequest $request, Restaurant $restaurant)
    // {
    //     $data = $request->validated();
    //     if (isset($data['cover_img'])) {
    //         $restaurant->cover_img = Storage::put('uploads', $data['cover_img']);
    //     };
    //     if (isset($data['logo'])) {
    //         $restaurant->logo = Storage::put('uploads', $data['logo']);
    //     };
    //     $restaurant->update($data);
    //     return redirect()->route('admin.restaurants.index', $restaurant->id);
    // }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Restaurant $restaurant)
    // {
    //     //
    // }
}

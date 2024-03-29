<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index(Request $request)
    {
        $query = Restaurant::query();

        // Verifica se è presente il parametro types nella richiesta
        if ($request->has('types')) {
            $types = explode(',', $request->types);
            $types = array_map('trim', $types); // Rimuovi spazi extra intorno ai nomi dei tipi

            // Aggiungi vincolo per ciascun tipo
            foreach ($types as $type) {
                $query->whereHas('types', function ($query) use ($type) {
                    $query->where('name', $type);
                });
            }
        }

        // Esegui la query e restituisci i risultati paginati
        $restaurants = $query->with('foods', 'types')->paginate(9);

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

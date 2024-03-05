<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Restaurant;
use App\Models\Type;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Http\RedirectResponse;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create()
    {
        $restaurants_type = Type::all();
        return view('auth.register', compact('restaurants_type'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'restaurant_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'p_iva' => 'required|string|max:11|unique:restaurants',
        ]);

        // Creo l'utente associato al ristorante
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Salvo l'utente che ho creato
        $user->save();

        // Creo il ristorante
        $restaurant = Restaurant::create([
            'name' => $request->restaurant_name,
            'address' => $request->address,
            'p_iva' => $request->p_iva,
            'user_id' => $user->id,
        ]);

        // Creo il food type
        $type = Type::create([
            'name' => implode(',', $request->restaurant_types),
            'img' => $request->type->img,
        ]);

        // Associo il type al ristorante
        $restaurant->type()->associate($type);

        // Autentico l'utente nel sistema
        Auth::login($user);

        // Invio l'evento di registrazione
        event(new Registered($user));

        // Reindirizzo l'utente alla home
        return redirect(RouteServiceProvider::HOME);
    }
}

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
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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

        /*     dd($request->all()); */
        /*  dd($request->file('logo')); // Debug per il logo
        dd($request->file('cover_img')); */

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'restaurant_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'p_iva' => 'required|string|max:11|unique:restaurants',
            'restaurant_types' => 'required|array|min:1|max:9',
            'cover_img' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
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
        $restaurant = new Restaurant([
            'name' => $request->restaurant_name,
            'address' => $request->address,
            'p_iva' => $request->p_iva,
            'user_id' => $user->id,
            'slug' => Str::of($request->restaurant_name)->slug('-')
        ]);

        // Salvo l'immagine di copertina se è stata fornita
        if ($request->hasFile('cover_img')) {
            $coverImgPath = $request->file('cover_img')->store('uploads');
            $restaurant->cover_img = $coverImgPath;
        }

        // Salvo il logo se è stato fornito
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('uploads');
            $restaurant->logo = $logoPath;
        }


        $restaurant->save();

        // Aggiungo i tipi del ristorante
        $restaurant->types()->sync($request->restaurant_types);

        // Autentico l'utente nel sistema
        Auth::login($user);

        // Invio l'evento di registrazione
        event(new Registered($user));

        // Reindirizzo l'utente alla home
        return redirect(RouteServiceProvider::HOME);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{

    public function index()
    {
        // Recupera l'utente autenticato
        $user = Auth::user();

        // Recupera il ristorante associato all'utente autenticato
        $restaurant = $user->restaurant;

        // Recupera gli ordini associati al ristorante dell'utente autenticato
        $orders = $restaurant->orders;

        // Mostra la vista degli ordini dell'utente autenticato
        return view('orders.index', compact('orders'));
    }

    public function store(Request $request)
    {
        // Dati della carta con cui è stato effettuato l'ordine
        // $nonce = $request->input('nonce');

        $order = new Order();
        $order->restaurant_id = $request->restaurant_id; // Assumi che il ristorante venga passato dal frontend
        $order->guest_firstname = $request->guest_firstname;
        $order->guest_surname = $request->guest_surname;
        $order->guest_address = $request->guest_address;
        $order->guest_phone = $request->guest_phone;
        $order->email = $request->email;
        $order->total = $request->total;
        $order->save();

        // Ritorna alla vista degli ordini dell'utente autenticato
        return redirect()->route('orders.index');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Braintree\Gateway;
// use App\Models\Order;
// use Braintree\Configuration;
// use Braintree\Transaction;
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

        // Verifica se l'utente ha un ristorante associato
        if ($restaurant) {
            // Recupera gli ordini associati al ristorante dell'utente autenticato
            $orders = $restaurant->orders()->orderBy('created_at', 'desc')->get();

            // Mostra la vista degli ordini dell'utente autenticato
            return view('orders.index', compact('orders'));
        } else {
            // Se l'utente non ha un ristorante associato, mostra un messaggio di errore o reindirizzalo
            return redirect()->route('home')->with('error', 'Non hai un ristorante associato.');
        }
    }

    public function store(Request $request)
    {
        // Inizializza il gateway Braintree utilizzando le credenziali dal file .env
        $gateway = new Gateway([
            'environment' => 'sandbox',
            'merchantId' => 'n2sddky376q9g4bt',
            'publicKey' => 'hzywfmfwm9cmgzv8',
            'privateKey' => '0e0b1ed42edddab64a0b919b8d6de505'
        ]);

        if ($request->input('nonce') != null) {
            $nonce = $request->input('nonce');
            $amount = $request->input('amount');
            // $name = $request->input('guestName');
            // $surname = $request->input('guestSurname');
            // $address = $request->input('guestAddress');
            // $phone = $request->input('guestPhone');
            // $email = $request->input('guestEmail');

            // Elabora la transazione di pagamento utilizzando il nonce e l'importo
            $result = $gateway->transaction()->sale([
                'amount' => $amount,
                'paymentMethodNonce' => $nonce,
                'options' => [
                    'submitForSettlement' => True
                ]
            ]);

            // Controlla se la transazione è stata eseguita con successo
            if ($result->success) {
                // $new_order = new Order();
                // $new_order->name = $name;
                // $new_order->surname = $surname;
                // $new_order->address = $address;
                // $new_order->phone = $phone;
                // $new_order->email = $email;
                // $new_order->save();

                // La transazione è stata elaborata con successo
                return response()->json([
                    'message' => 'Transazione elaborata con successo',
                    'result' => $result,
                ], 200);
            } else {
                // Si è verificato un errore durante l'elaborazione della transazione
                $errorMessages = $result->errors->deepAll();
                return response()->json(['error' => $errorMessages[0]->message], 400);
            }
        }

        // Ritorna alla vista degli ordini dell'utente autenticato
        // return redirect()->route('orders.index');
        // return response()->json(['message' => 'Chiamata effettuata con successo'], 200);
    }
}

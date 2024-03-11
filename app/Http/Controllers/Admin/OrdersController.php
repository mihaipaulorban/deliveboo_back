<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Food;
use App\Models\Order;
use Braintree\Gateway;
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
            'environment' => config('braintree.environment'),
            'merchantId' => config('braintree.merchantId'),
            'publicKey' => config('braintree.publicKey'),
            'privateKey' => config('braintree.privateKey'),
        ]);

        if ($request->input('nonce') != null) {
            $nonce = $request->input('nonce');
            $amount = $request->input('amount');

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

                $validatedData = $request->validate([
                    'restaurant_id' => 'required',
                    'first_name' => 'required|string|max:255',
                    'last_name' => 'required|string|max:255',
                    'address' => 'required|string',
                    'phone' => 'required|string',
                    'email' => 'required|email',
                    'amount' => 'required|regex:/^\d{1,4}(\.\d{1,2})?$/',
                    'foods_id' => 'array',
                ]);

                $new_order = new Order();
                $new_order->restaurant_id = $validatedData['restaurant_id'];
                $new_order->guest_firstname = $validatedData['first_name'];
                $new_order->guest_surname = $validatedData['last_name'];
                $new_order->guest_address = $validatedData['address'];
                $new_order->guest_phone = $validatedData['phone'];
                $new_order->email = $validatedData['email'];
                $new_order->total = $validatedData['amount'];
                $new_order->save();

                // Associare ciascun alimento all'ordine
                if (isset($validatedData['foods_id']) && is_array($validatedData['foods_id'])) {
                    foreach ($validatedData['foods_id'] as $foodsId) {
                        // Verifica se il cibo esiste
                        $food = Food::find($foodsId);
                        if ($food) {
                            // Associa il cibo all'ordine tramite la tabella pivot
                            $new_order->foods()->attach($foodsId);
                        }
                    }
                }

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

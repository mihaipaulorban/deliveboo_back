@extends('layouts.admin')

@section('content')
    @include('partials.session_message')
    <div class="container">
        <div class="card mt-4 align-items-center shadow p-3 mb-5 bg-body-tertiary rounded border-0"
            style="width: fit-content;">
            <div class="card-body d-flex gap-3">
                <h5 class="card-title mb-0">Total orders:</h5>
                <p class="card-text">{{ count($orders) }}</p>
            </div>
        </div>
        <div class="table-responsive-lg">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id order:</th>
                        <th scope="col">Name</th>
                        <th scope="col">Surname</th>
                        <th scope="col">Foods</th>
                        <th scope="col">Data</th>
                        <th scope="col">Total €</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <th scope="row">{{ $order->id }}</th>
                            <td>
                                {{ $order->guest_firstname }}
                            </td>
                            <td>
                                {{ $order->guest_surname }}
                            </td>
                            <td>
                                @php
                                    // Inizializza un array per memorizzare il conteggio totale delle occorrenze di ciascun cibo
                                    $totalFoodCounts = [];

                                    // Itera attraverso i cibi di ogni ordine per accumulare il conteggio totale delle occorrenze
                                    foreach ($order->foods as $food) {
                                        $foodName = $food->name;
                                        if (isset($totalFoodCounts[$foodName])) {
                                            // Incrementa il conteggio se il cibo è già stato incontrato prima
                                            $totalFoodCounts[$foodName]++;
                                        } else {
                                            // Inizializza il conteggio a 1 se è la prima volta che il cibo viene incontrato
                                            $totalFoodCounts[$foodName] = 1;
                                        }
                                    }
                                @endphp

                                @foreach ($totalFoodCounts as $foodName => $count)
                                    <p>{{ $foodName }} (x{{ $count }})</p>
                                @endforeach
                            </td>
                            <td>
                                <p>{{ $order->created_at }}</p>
                            </td>
                            <td>
                                <p>{{ $order->total }}</p>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

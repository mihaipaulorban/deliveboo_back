@extends('layouts.admin')

@section('content')
    @include('partials.session_message')
    <div class="container position-absolute">
        <div class="container d-sm-flex">
            <div class="my-card align-items-center shadow mt-5 mb-5 me-5 rounded border-0" style="width: fit-content;">
                <div class="card-body gap-3">
                    <h5 class="card-title mb-0">Total orders:</h5>
                    <p class="card-text text-center mt-2 display-1">{{ count($orders) }}</p>
                </div>
            </div>

            <div class="my-card align-items-center shadow mt-5 mb-5 me-5 rounded border-0" style="width: fit-content;">
                <div class="card-body gap-3">
                    <h5 class="card-title mb-0">Total revenue:</h5>
                    <p class="card-text text-center mt-2 display-1">€ {{ $orders->sum('total') }}</p>
                </div>
            </div>

            <div class="my-card align-items-center shadow mb-5 mt-5 rounded border-0" style="width: fit-content;">
                <div class="card-body gap-3">
                    <h5 class="card-title mb-0">Most ordered item:</h5>
                    @php
                        $foodCounts = [];

                        foreach ($orders as $order) {
                            foreach ($order->foods as $food) {
                                if (isset($foodCounts[$food->name])) {
                                    $foodCounts[$food->name]++;
                                } else {
                                    $foodCounts[$food->name] = 1;
                                }
                            }
                        }

                        arsort($foodCounts);
                        $mostOrderedItem = array_key_first($foodCounts);

                        if ($mostOrderedItem === null) {
                            $mostOrderedItem = 'You have no orders yet';
                        }
                    @endphp

                    <p class="card-text text-center mt-2 display-1">{{ $mostOrderedItem }}</p>
                </div>

            </div>
        </div>




        @if (count($orders) > 0)
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Surname</th>
                            <th scope="col">Foods</th>
                            <th scope="col">Address</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Email</th>
                            <th scope="col">Data</th>
                            <th scope="col">Total €</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $index => $order)
                            <tr>
                                <td>
                                    {{ $order->guest_firstname }}
                                </td>
                                <td>
                                    {{ $order->guest_surname }}
                                </td>
                                <td>
                                    @php
                                        // Inizializza un array associativo per memorizzare il nome del cibo e il conteggio totale delle occorrenze per ID
                                        $totalFoodCounts = [];

                                        // Itera attraverso i cibi di ogni ordine per accumulare il conteggio totale delle occorrenze
                                        foreach ($order->foods as $food) {
                                            $foodId = $food->id;
                                            $foodName = $food->name;
                                            if (isset($totalFoodCounts[$foodId])) {
                                                // Incrementa il conteggio se il cibo è già stato incontrato prima
                                                $totalFoodCounts[$foodId]['count']++;
                                            } else {
                                                // Inizializza il conteggio a 1 se è la prima volta che il cibo viene incontrato
                                                $totalFoodCounts[$foodId] = [
                                                    'name' => $foodName,
                                                    'count' => 1,
                                                ];
                                            }
                                        }
                                    @endphp
                                    <p class="card-text">
                                        @foreach ($totalFoodCounts as $foodId => $foodData)
                                            <span class="food-item">{{ $foodData['name'] }}
                                                (x{{ $foodData['count'] }})
                                            </span>
                                        @endforeach
                                    </p>
                                </td>
                                <td>
                                    {{ $order->guest_address }}
                                </td>
                                <td>
                                    {{ $order->guest_phone }}
                                </td>
                                <td>
                                    {{ $order->email }}
                                </td>
                                <td>
                                    {{ $order->date }}
                                </td>
                                <td>
                                    {{ $order->total }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

@endsection

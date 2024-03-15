@extends('layouts.admin')

@section('content')
    @include('partials.session_message')
    <div class="container position-absolute">
        <div class="card mt-4 align-items-center shadow p-3 mb-5 bg-body-tertiary rounded border-0"
            style="width: fit-content;">
            <div class="card-body d-flex gap-3">
                <h5 class="card-title mb-0">Total orders:</h5>
                <p class="card-text">{{ count($orders) }}</p>
            </div>
        </div>
        @if (count($orders) > 0)
            {{-- <div class="row g-3">
                @foreach ($orders as $index => $order)
                    <h4>Ordine</h4>
                    <div class="col-12 col-lg-4">
                        <div class="card border-0 shadow">
                            <div class="card-body">
                                <h5 class="card-title">Name</h5>
                                <p class="card-text">{{ $order->guest_firstname }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="card border-0 shadow">
                            <div class="card-body">
                                <h5 class="card-title">Surname</h5>
                                <p class="card-text">{{ $order->guest_surname }}</p>
                            </div>
                        </div>
                    </div>
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
                    <div class="col-12 col-lg-4">
                        <div class="card border-0 shadow">
                            <div class="card-body">
                                <h5 class="card-title">Foods</h5>
                                <p class="card-text">
                                    @foreach ($totalFoodCounts as $foodId => $foodData)
                                        <span class="food-item">{{ $foodData['name'] }} (x{{ $foodData['count'] }})</span>
                                    @endforeach
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="card border-0 shadow">
                            <div class="card-body">
                                <h5 class="card-title">Email</h5>
                                <p class="card-text">{{ $order->email }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="card border-0 shadow">
                            <div class="card-body">
                                <h5 class="card-title">Address</h5>
                                <p class="card-text">{{ $order->guest_address }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="card border-0 shadow">
                            <div class="card-body">
                                <h5 class="card-title">Phone</h5>
                                <p class="card-text">{{ $order->guest_phone }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="card border-0 shadow">
                            <div class="card-body">
                                <h5 class="card-title">Email</h5>
                                <p class="card-text">{{ $order->email }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="card border-0 shadow">
                            <div class="card-body">
                                <h5 class="card-title">Data</h5>
                                <p class="card-text">{{ $order->date }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="card border-0 shadow">
                            <div class="card-body">
                                <h5 class="card-title">Total</h5>
                                <p class="card-text">{{ $order->total }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div> --}}
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

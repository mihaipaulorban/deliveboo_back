@extends('layouts.admin')

@section('content')
    @include('partials.session_message')
    <div class="container">
        <ul class="list-unstyled">
            @foreach ($orders as $order)
                <li>
                    <h2 class="mt-4">{{ $order->guest_firstname }} {{ $order->guest_surname }}</h2>
                    <p>Name: {{ $order->guest_firstname }}</p>
                    <p>Surname: {{ $order->guest_surname }}</p>
                </li>
                <p>Nome del cibo: </p>
                @foreach ($order->foods as $food)
                    <li>
                        {{ $food->name }}</p>
                    </li>
                @endforeach
                <li></li>
            @endforeach
        </ul>
    </div>
@endsection

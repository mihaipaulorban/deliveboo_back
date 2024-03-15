@extends('layouts.admin')

@section('content')
    @include('partials.session_message')
    <div class="container position-absolute">
        <div class="info">
            <h2 class="mt-4">{{ $restaurant->name }}</h2>
            <p>Address: {{ $restaurant->address }}</p>
            <p>VAT Number: {{ $restaurant->p_iva }}</p>
            <span>Categories:</span>
            @foreach ($restaurant->types as $type)
                <span>{{ $type->name }}</span>
            @endforeach
        </div>
        <div class="img restaurant-container">
            <img id="restaurant-logo" src="{{ asset('storage/' . $restaurant->cover_img) }}" alt="{{ $restaurant->slug }}">
        </div>
    </div>
@endsection

@extends('layouts.admin')

@section('content')
    @include('partials.session_message')
    <div class="container">
        <h2 class="mt-4">{{ $restaurant->name }}</h2>
        <p>Address: {{ $restaurant->address }}</p>
        <p>VAT Number: {{ $restaurant->p_iva }}</p>
        <span>Categories:</span>
        @foreach ($restaurant->types as $type)
            <span>{{ $type->name }}</span>
        @endforeach
    </div>
@endsection

@extends('layouts.admin')

@section('content')
    @include('partials.session_message')
    <div class="container position-absolute d-sm-flex mt-5 justify-content-between">
        <div class="info">
            <h2 class=" display-1 mt-5 fw-bold ">{{ $restaurant->name }}</h2>
            <p class="display-5">Address: <span>{{ $restaurant->address }}</span></p>
            <p class="lead">VAT Number: {{ $restaurant->p_iva }}</p>
            <span class="h3">Categories:</span>
            @foreach ($restaurant->types as $type)
                <span class="badge bg-primary">{{ $type->name }}</span>
            @endforeach

        </div>
        <div class="img d-flex justify-content-cente mt-5">
            <img id="restaurant-logo" class="rounded-4 shadow" style="width: auto; height: 300px;"
                src="{{ asset('storage/' . $restaurant->cover_img) }}" alt="{{ $restaurant->slug }}">
        </div>


    </div>
@endsection

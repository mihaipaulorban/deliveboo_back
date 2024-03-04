@extends('layouts.admin')

@section('content')
    
    <div class="container">
        <h1> {{ $food->name }}</h1>
        <h2>Descrizione</h2>
        <p>{{ $food->description }}</p>
        <p>Price:{{ $food->price }} €</p>
        @if ($food->is_visible)
            <p>Visible on Listing</p>
        @else
            <p>Not visible on listing</p>
        @endif
        @if ($food->is_vegetarian)
            <p>Vegetarian</p>
        @else
            <p>Non-Vegetarian</p>
        @endif
        <img src="{{ asset('storage/' . $food->img) }}" class="img-fluid img-thumbnail" alt="">

        <br>
        <a class="btn btn-secondary" href="{{ route('admin.foods.index') }}">Back to foods list</a>
        <a class="btn btn-info my-3 text-white" href="{{ route('admin.foods.edit', $food) }}">Edit this food</a>
    </div>
@endsection

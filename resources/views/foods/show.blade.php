@extends('layouts.admin')

@section('content')
    <div class="container mt-4 vh-100">
        <h1> {{ $food->name }}</h1>
        @if ($food->is_vegetarian)
            <span class="badge text-bg-success mb-4">Vegetarian</span>
        @else
            <span class="badge text-bg-warning mb-2">Non-Vegetarian</span>
        @endif
        <h2>Ingredienti</h2>
        <p>{{ $food->description }}</p>
        @if ($food->img)
            <div class="image-container">
                <img src="{{ asset('storage/' . $food->img) }}" class="img-fluid circular-image" alt="immagine del piatto">
            </div>
        @endif
        <div class="buttons mt-3 pb-3">
            <a class="btn btn-secondary" href="{{ route('admin.foods.index') }}">Back to foods list</a>
            <a class="btn btn-info text-white" href="{{ route('admin.foods.edit', $food) }}">Edit this food</a>
        </div>
    </div>
@endsection

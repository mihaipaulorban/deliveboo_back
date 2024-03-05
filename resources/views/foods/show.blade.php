@extends('layouts.admin')

@section('content')
    
    <div class="container mt-4 vh-100">
        <h1> {{ $food->name }}</h1>
        @if ($food->is_vegetarian)
        <span class="badge text-bg-success">Vegetarian</span>
    @else
        <span class="badge text-bg-warning">Non-Vegetarian</span>
    @endif
        <h2>Ingredienti</h2>
        <p>{{ $food->description }}</p>
        <img src="{{ asset('storage/' . $food->img) }}" class="img-fluid img-thumbnail" alt="immagine del piatto">

        <br>
        <a class="btn btn-secondary" href="{{ route('admin.foods.index') }}">Back to foods list</a>
        <a class="btn btn-info my-3 text-white" href="{{ route('admin.foods.edit', $food) }}">Edit this food</a>
    </div>
@endsection

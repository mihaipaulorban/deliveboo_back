@extends('layouts.admin')

@section('content')
    {{-- @include('partials.errors') --}}
    <div class="container">
        <form action="{{route('admin.foods.update', $food->id)}}" method="POST">            
            @csrf
            @method('PATCH')
            <h1 class="text-center">Edit a food</h1>
            <div class="mb-3">
                <label class="form-label">
                    <h2>Food name</h2>
                </label>
                <input type="text" class="form-control" name="title" value="{{ old('title', $food->name) }}">
                @error('name')
                <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">
                    <h3>Food Description</h3>
                </label>
                <textarea class="form-control" rows="3" name="description">{{ old('description', $food->description) }}</textarea>
                @error('description')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <!-- Campo per l'immagine -->
            <div class="mb-3">
                <label class="form-label">
                    <h3>Food Image</h3>
                </label>
                <input type="file" class="form-control" name="image" accept="image/*" required>
            </div>
            <!-- Radio button per indicare se l'utente è vegetariano -->
            <div class="mb-3">
                <label class="form-label">
                    <h3>Are you vegetarian?</h3>
                </label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="is_vegetarian" id="vegetarian_yes" value="1" {{ $food->is_vegetarian ? 'checked' : '' }}>
                    <label class="form-check-label" for="vegetarian_yes">Yes</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="is_vegetarian" id="vegetarian_no" value="0" {{ $food->is_vegetarian ? '' : 'checked' }}>
                    <label class="form-check-label" for="vegetarian_no">No</label>
                </div>
            </div>
            <!-- Campo per inserire il prezzo -->
            <div class="mb-3">
                <label class="form-label">
                    <h3>Price</h3>
                </label>
                <input type="number" class="form-control" name="price" value="{{ old('price', $food->price) }}" required>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
        <div>
            <a class="btn btn-secondary my-3" href="{{ route('admin.foods.show', $food) }}">Go back to single food</a>
            <br>
            <a class="btn btn-secondary" href="{{ route('admin.foods.index') }}">Go back to foods list</a>
        </div>
    </div>
@endsection

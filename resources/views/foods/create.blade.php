@extends('layouts.admin')

@section('content')
    @include('partials.errors')
    {{-- Aggiungere errori dopo ogni singolo campo di input --}}
    <div class="container">
        <form action="{{ route('admin.foods.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <h1 class="text-center">Create a new food</h1>
            <div class="mb-3">
                <label class="form-label">
                    <h2>Food Name</h2>
                </label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                @error('name')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">
                    <h3>Food Description</h3>
                </label>
                <textarea class="form-control" rows="3" name="description">{{ old('description') }}</textarea>
                @error('description')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <!-- Campo per l'immagine -->
            <div class="mb-3">
                <label class="form-label">
                    <h3>Food Image</h3>
                </label>
                <input class="form-control" type="file" id="img" name="img">
                @error('img')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <!-- Radio button per indicare se il food è vegetariano -->
            <div class="mb-3">
                <label class="form-label">
                    <h3>Is the dish vegetarian?</h3>
                </label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="is_vegetarian" id="vegetarian_yes" value="1">
                    <label class="form-check-label" for="vegetarian_yes">Yes</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="is_vegetarian" id="vegetarian_no" value="0"
                        checked>
                    <label class="form-check-label" for="vegetarian_no">No</label>
                </div>
                @error('is_vegetarian')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <!-- Radio button per indicare se il piatto è visibile -->
            <div class="mb-3">
                <label class="form-label">
                    <h3>Is the dish visible?</h3>
                </label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="is_visible" id="visible_yes" value="1"
                        checked>
                    <label class="form-check-label" for="vegetarian_yes">Yes</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="is_visible" id="visible_yes" value="0">
                    <label class="form-check-label" for="vegetarian_no">No</label>
                </div>
                @error('is_visible')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <!-- Campo per inserire il prezzo -->
            <div class="mb-3">
                <label class="form-label">
                    <h3>Price</h3>
                </label>
                <input type="number" class="form-control" name="price" value="{{ old('price') }}" required>
                @error('price')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
        <div>
            <a class="btn btn-secondary my-3" href="{{ route('admin.foods.index') }}">Go back to foods list</a>
        </div>
    </div>
@endsection

@extends('layouts.admin')

@section('content')
    {{-- @include('partials.errors') --}}
    <div class="container">
        <form action="{{ route('admin.foods.update', $food->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <h1 class="text-center">Edit a food</h1>
            <div class="mb-3">
                <label class="form-label">
                    <h2>Food name</h2>
                </label>
                <input type="text" class="form-control" name="name" @error('name') is-invalid @enderror
                    value="{{ old('name', $food->name) }}">
                @error('name')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">
                    <h3>Food Description</h3>
                </label>
                <textarea class="form-control" rows="3" @error('description') is-invalid @enderror name="description">{{ old('description', $food->description) }}</textarea>
                @error('description')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <label for="price" class="form-label">Set the price</label>
            <div class="input-group mb-3">
                <span class="input-group-text">€</span>
                <input type="text" class="form-control" name="price" aria-label="Amount (to the nearest euro)">
                @error('price')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <label for="is_visible" class="form-label mt-3">Can you see the item in your listing?</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="is_visible" id="is_visible1" checked>
                <label class="form-check-label" for="is_visible">
                    Visible
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="is_visible" id="is_visible2">
                <label class="form-check-label" for="flexRadioDefault2">
                    Not Visible
                </label>
            </div>
            <label for="is_visible" class="form-label mt-3">Is this dish vegetarian?</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="is_vegetarian" id="is_veggie1">
                <label class="form-check-label" for="is_veggie">
                    Yes
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="is_vegetarian" id="is_veggie2" checked>
                <label class="form-check-label" for="is_veggie">
                    No
                </label>
            </div>
            <div class="my-3">
                <label for="img" class="form-label">Insert an image for the Dish</label>
                <input class="form-control" type="file" id="img" name="img">
                @error('img')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
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

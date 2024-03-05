@extends('layouts.admin')

@section('content')
    <div class="container">
        <form action="{{ route('admin.foods.update', $food->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <h1 class="text-center">Edit a food</h1>
            <div class="mb-3">
                <label class="form-label">
                    <h2>Food name *</h2>
                </label>
                <input type="text" class="form-control" name="name" @error('name') is-invalid @enderror
                    value="{{ old('name', $food->name) }}">
                @error('name')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">
                    <h3>Food Description *</h3>
                </label>
                <textarea class="form-control" rows="3" @error('description') is-invalid @enderror name="description">{{ old('description', $food->description) }}</textarea>
                @error('description')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <label for="price" class="form-label">Set the price *</label>
            <div class="mb-3">
                <label class="form-label">
                    <h3>Price *</h3>
                </label>
                <div class="input-group mb-3">
                    <span class="input-group-text">€</span>
                    <input type="text" class="form-control" name="price" aria-label="Amount (to the nearest euro)" value="{{ old('price', $food->price) }}">
                </div>
                @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                @if ($errors->has('price') && strpos($errors->first('price'), 'numeric') !== false)
                    <div class="alert alert-warning">Please use a dot instead of a comma for decimal values.</div>
                @endif
            </div>
            <label for="is_visible" class="form-label mt-3">Can you see the item in your listing?</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="is_visible" id="is_visible1" value="1" {{ old('is_visible', $food->is_visible) === 1 ? 'checked' : '' }}>
                <label class="form-check-label" for="is_visible1">
                    Visible
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="is_visible" id="is_visible2" value="0" {{ old('is_visible', $food->is_visible) === 0 ? 'checked' : '' }}>
                <label class="form-check-label" for="is_visible2">
                    Not Visible
                </label>
                @error('is_visible')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <label for="is_veggie" class="form-label mt-3">Is this dish vegetarian?</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="is_vegetarian" id="is_veggie1" value="1" {{ old('is_vegetarian', $food->is_vegetarian) === 1 ? 'checked' : '' }}>
                <label class="form-check-label" for="is_veggie1">
                    Yes
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="is_vegetarian" id="is_veggie2" value="0" checked {{ old('is_vegetarian', $food->is_vegetarian) === 0  ? 'checked' : '' }}>
                <label class="form-check-label" for="is_veggie2">
                    No
                </label>
                @error('is_vegetarian')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="my-3">
                <label for="img" class="form-label">Insert an image for the Dish</label>
                <input class="form-control" type="file" id="img" name="img" value="{{ old('img', $food->img) }}">
                @if($food->img)
                    <div class="current-image mt-4">
                        <p>Currrent image:</p>
                        <img style="width: 300px;" src="{{ asset('storage/' . $food->img) }}" alt="current-image">
                    </div>
                @endif
                @error('img')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
        <div>
            <a class="btn btn-secondary my-3" href="{{ route('admin.foods.show', $food) }}">Go back to single food</a>
            <br>
            <a class="btn btn-secondary mb-3" href="{{ route('admin.foods.index') }}">Go back to foods list</a>
        </div>
    </div>
@endsection

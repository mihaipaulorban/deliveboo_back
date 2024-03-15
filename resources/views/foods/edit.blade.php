@extends('layouts.admin')

@section('content')
    <div class="container position-absolute">
        <form id="foods-edit-form" action="{{ route('admin.foods.update', $food->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <h1 class="text-center">Edit a food</h1>
            <div class="mb-3">
                <label class="form-label">
                    <h2>Food name *</h2>
                </label>
                <input id="name" type="text" class="form-control" name="name" @error('name') is-invalid @enderror
                    required minlength="3" value="{{ old('name', $food->name) }}">
                <strong id="nameError" class="text-danger error" style="font-size: 0.875em;" role="alert"></strong>
                @error('name')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">
                    <h3>Food Description *</h3>
                </label>
                <textarea id="description" class="form-control" rows="3" @error('description') is-invalid @enderror
                    name="description" required>{{ old('description', $food->description) }}</textarea>
                <strong id="descriptionError" class="text-danger error" style="font-size: 0.875em;" role="alert"></strong>
                @error('description')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <label for="price" class="form-label">Set the price *</label>
            <div class="mb-3">
                <label class="form-label">
                    <h3>Price *</h3>
                </label>
                <div class="input-group">
                    <span class="input-group-text">€</span>
                    <input id="price" type="text" class="form-control" name="price"
                        aria-label="Amount (to the nearest euro)" required maxlength="8"
                        value="{{ old('price', $food->price) }}">
                </div>
                <strong id="priceError" class="text-danger error" style="font-size: 0.875em;" role="alert"></strong>
                @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                @if ($errors->has('price') && strpos($errors->first('price'), 'numeric') !== false)
                    <div class="alert alert-warning">Please use a dot instead of a comma for decimal values.</div>
                @endif
            </div>
            <label for="is_visible" class="form-label mt-3">Can you see the item in your listing?</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="is_visible" id="visible_yes" value="1"
                    {{ old('is_visible', $food->is_visible) === 1 ? 'checked' : '' }}>
                <label class="form-check-label" for="visible_yes">
                    Visible
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="is_visible" id="visible_no" value="0"
                    {{ old('is_visible', $food->is_visible) === 0 ? 'checked' : '' }}>
                <label class="form-check-label" for="visible_no">
                    Not Visible
                </label>
                <strong id="is_visibleError" class="text-danger error" style="font-size: 0.875em;" role="alert"></strong>
                @error('is_visible')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <label for="is_veggie" class="form-label mt-3">Is this dish vegetarian?</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="is_vegetarian" id="vegetarian_yes" value="1"
                    {{ old('is_vegetarian', $food->is_vegetarian) === 1 ? 'checked' : '' }}>
                <label class="form-check-label" for="vegetarian_yes">
                    Yes
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="is_vegetarian" id="vegetarian_no" value="0"
                    {{ old('is_vegetarian', $food->is_vegetarian) === 0 ? 'checked' : '' }}>
                <label class="form-check-label" for="vegetarian_no">
                    No
                </label>
                <strong id="is_vegetarianError" class="text-danger error" style="font-size: 0.875em;"
                    role="alert"></strong>
                @error('is_vegetarian')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="my-3">
                <label for="img" class="form-label">Insert an image for the Dish</label>
                <input class="form-control image-input" type="file" id="img" name="img"
                    value="{{ old('img', $food->img) }}">
                <strong id="fileError" class="text-danger error" style="font-size: 0.875em;" role="alert"></strong>
                @if ($food->img)
                    <div id="file" class="current-image mt-4">
                        <p>Currrent image:</p>
                        <div class="image-container">
                            <img class="img-fluid circular-image" src="{{ asset('storage/' . $food->img) }}"
                                alt="current-image">
                        </div>
                    </div>
                @endif
                @error('img')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <button type="button" class="btn btn-success" onclick="foodEditValidation()">Save</button>
        </form>
        <div>
            <a class="btn btn-secondary my-2" href="{{ route('admin.foods.index') }}">Go back to foods list</a>
        </div>
    </div>
@endsection

@extends('layouts.admin')

@section('content')
    <div class="container">
        <form id="foods-form" action="{{ route('admin.foods.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <h1 class="text-center">Create a new food</h1>
            <div class="mb-3">
                <label class="form-label">
                    <h2>Food Name<strong>*</strong></h2>
                </label>
                <input id="name" type="text" class="form-control" name="name" required minlength="3"
                    value="{{ old('name') }}">
                <strong id="nameError" class="text-danger error" style="font-size: 0.875em;" role="alert"></strong>
                @error('name')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">
                    <h3>Food Description <strong>*</strong></h3>
                </label>
                <textarea id="description" class="form-control" rows="3" name="description" required>{{ old('description') }}</textarea>
                <strong id="descriptionError" class="text-danger error" style="font-size: 0.875em;" role="alert"></strong>
                @error('description')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">
                    <h3>Food Image<strong>*</strong></h3>
                </label>
                <input id="file" class="form-control" type="file" id="img" name="img">
                <strong id="fileError" class="text-danger error" style="font-size: 0.875em;" role="alert"></strong>
                @error('img')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">
                    <h3>Price<strong>*</strong></h3>
                </label>
                <div class="input-group">
                    <span class="input-group-text">€</span>
                    <input id="price" type="text" class="form-control" name="price"
                        aria-label="Amount (to the nearest euro)" required maxlength="8" value="{{ old('price') }}">
                </div>
                <strong id="priceError" class="text-danger error" style="font-size: 0.875em;" role="alert"></strong>
                @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                @if ($errors->has('price') && strpos($errors->first('price'), 'numeric') !== false)
                    <div class="alert alert-warning">Please use a dot instead of a comma for decimal values.</div>
                @endif
            </div>
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
                <strong id="is_vegetarianError" class="text-danger error" style="font-size: 0.875em;"
                    role="alert"></strong>
                @error('is_vegetarian')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">
                    <h3>Is the dish visible?</h3>
                </label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="is_visible" id="visible_yes" value="1"
                        checked>
                    <label class="form-check-label" for="visible_yes">Yes</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="is_visible" id="visible_no" value="0">
                    <label class="form-check-label" for="visible_no">No</label>
                </div>
                <strong id="is_visibleError" class="text-danger error" style="font-size: 0.875em;"
                    role="alert"></strong>
                @error('is_visible')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <button type="button" class="btn btn-success" onclick="foodsValidation()">Submit</button>
        </form>
        <div>
            <a class="btn btn-secondary my-3" href="{{ route('admin.foods.index') }}">Go back to foods list</a>
        </div>
    </div>
@endsection

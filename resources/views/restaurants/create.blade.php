@extends('layouts.admin')

@section('content')
    @include('partials.errors')
    <div class="container">
        <form action="{{ route('admin.restaurants.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <h1 class="text-center">Create a new restaurant</h1>
            {{-- Dati ristorante --}}
            <div class="mb-3">
                <label class="form-label">
                    <h2>Restaurant name</h2>
                </label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
            </div>
            <div class="mb-3">
                <label class="form-label">
                    <h3>Restaurant Address</h3>
                </label>
                <input type="text" class="form-control" name="address" value="{{ old('address') }}">
            </div>
            <!-- Campo per l'immagine -->
            <div class="mb-3">
                <label class="form-label">
                    <h3>Restaurant Image</h3>
                </label>
                <input type="file" class="form-control" name="logo" required>
            </div>
            <!-- Campo per l'immagine -->
            <div class="mb-3">
                <label class="form-label">
                    <h3>Restaurant Cover Image</h3>
                </label>
                <input type="file" class="form-control" name="cover_img" required>
            </div>
            <!-- Campo P. Iva -->
            <div class="mb-3">
                <label class="form-label">
                    <h2>Restaurant P. Iva</h2>
                </label>
                <input type="text" class="form-control" name="p_iva" value="{{ old('p_iva') }}">
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
        <div>
            <a class="btn btn-secondary my-3" href="{{ route('admin.restaurants.index') }}">Go back to Restaurants list</a>
        </div>
    </div>
@endsection

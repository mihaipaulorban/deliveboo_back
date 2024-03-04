@extends('layouts.admin')

@section('content')
    @include('partials.errors')
    <div class="container">
        <form action="{{route('admin.foods.update', $food)}}" method="POST">
        @csrf
        @method('PATCH')
        <h1 class="text-center">Edit a food</h1>
        <div class="mb-3">
            <label class="form-label">
                <h2>Food name</h2>
            </label>
            <input type="text" class="form-control" name="name" value="{{ old('name', $food->name) }}">
        </div>
        <div class="mb-3">
            <label class="form-label">
                <h3>Food Description</h3>
            </label>
            <textarea class="form-control"  rows="3" name="description">{{ old('description', $food->description) }}</textarea>
        </div>
        
        <button type="submit" class="btn btn-success">Submit</button>
        </form>
        <div>
            <a class="btn btn-secondary my-3" href="{{route('admin.foods.show', $food)}}">Go back to single food</a>
            <br>
            <a class="btn btn-secondary" href="{{ route('admin.foods.index') }}">Go back to foods list</a>
        </div>
    </div>
@endsection
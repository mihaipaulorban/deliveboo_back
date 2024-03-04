@extends('layouts.admin')

@section('content')
    @dd($food)
    <div class="container">
        <h1> {{ $food->name }}</h1>
        <p>{{ $food->description }}</p>
        <br>
        <a class="btn btn-secondary" href="{{ route('admin.foods.index') }}">Back to foods list</a>
        <a class="btn btn-info my-3 text-white" href="{{ route('admin.foods.edit', $food) }}">Edit this food</a>
    </div>
@endsection

@extends('layouts.admin')

@section('content')

    <div class="container">
        <h1> {{$foods->name}}</h1>
        <p>{{$foods->description}}</p>
        <br>
        <a class="btn btn-secondary" href="{{ route('admin.foods.index') }}">Back to foods list</a>
        <a class="btn btn-info my-3" href="{{ route('admin.foods.edit', $foods->id) }}">Edit this food</a>

    </div>
@endsection
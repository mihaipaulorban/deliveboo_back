@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>{{$restaurant->name}}</h1>
        <h3>{{$restaurant->address}}</h3>
        <div>
            <img src="{{ asset('storage/' . $restaurant->logo) }}" class="img-fluid img-thumbnail" alt="">
        </div>
        <h4>Partita iva: {{$restaurant->p_iva}}</h4>
        <div>
            <img src="{{ asset('storage/' . $restaurant->cover_img) }}" class="img-fluid img-thumbnail" alt="">
        </div>
        <a class="btn btn-secondary" href="{{ route('admin.restaurants.index') }}">Back to restaurants list</a>
        <a class="btn btn-info my-3" href="{{ route('admin.restaurants.edit', $restaurant) }}">Edit this restaurant</a>
    </div>
@endsection
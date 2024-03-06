@extends('layouts.admin')

@section('content')
    @include('partials.session_message')
    <div class="container">

        <h1>My restaurant</h1>
        <ul>
            @foreach ($restaurants as $restaurant)
                <li class="list-unstyled">
                    <h2 class="mt-3">{{ $restaurant->name }}</h2>
                    <p>Address: {{ $restaurant->address }}</p>
                    <p>VAT Number: {{ $restaurant->p_iva }}</p>
                    <span>Categories:</span>
                    @foreach ($restaurant->types as $type)
                        <span>{{ $type->name }}</span>
                    @endforeach
                    {{-- <form action="{{ route('admin.restaurants.destroy', $restaurant) }}" onsubmit="return confirm('Are you sure you want to delete this record?');" method="post">
                @csrf
                @method('delete')
                <button class="btn btn-danger">Delete this record</button>
                <a class="btn btn-info" href="{{ route('admin.restaurants.edit', $restaurant) }}">Edit this record</a>
            </form> --}}
                </li>
            @endforeach
        </ul>
        {{-- <a class="btn btn-success mt-3" href="{{ route('admin.restaurants.create') }}">Add a new restaurant</a> --}}
    </div>
@endsection

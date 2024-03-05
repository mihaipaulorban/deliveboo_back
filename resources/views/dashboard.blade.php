@extends('layouts.admin')

@section('content')
    <div class="container mt-4 vh-100">
        {{-- Titolo --}}
        <h2>Menus</h2>

        {{-- Messaggio di conferma --}}
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        {{-- Pulsante crea nuovo cibo --}}
        <a href="{{ route('admin.foods.create') }}" class="hoverable btn btn-success my-4">
            Add a new menu <i class="fa-solid fa-plus"></i>
        </a>


        {{-- Tabella Piatti Visibili --}}
        <table class="table table-borderless table-hover">
            {{-- Intestazione --}}
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Ingredients</th>
                    <th>Edit</th>
                    <th>Delete</th>

                </tr>
            </thead>

            {{-- Corpo --}}
            <tbody>
                @foreach ($foods as $food)
                    <tr>
                        {{-- ID --}}
                        <td>{{ $food->id }}</td>
                        {{-- Nome --}}
                        <td>{{ $food->name }}</td>
                        {{-- Prezzo --}}
                        <td>€{{ $food->price }}</td>

                        {{-- Descrizione --}}
                        <td>{{ $food->description }}</td>
                        {{-- Visualizza --}}
                        <td>
                            <a href="{{ route('admin.foods.show', $food) }}">
                                <div class="btn btn-info hoverable rounded">
                                    <i class="fa fa-seedling"></i>
                                </div>
                            </a>
                        </td>
                        {{-- Modifica --}}
                        <td>
                            <a href="{{ route('admin.foods.edit', $food) }}">
                                <div class="btn btn-warning rounded">
                                    <i class="fa fa-edit"></i>
                                </div>
                            </a>
                        </td>
                        {{-- Elimina --}}
                        <td>
                            <form action="{{ route('admin.foods.destroy', $food) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger hoverable rounded"
                                    onclick="return confirm('Sei sicuro di voler eliminare questo cibo?')">
                                    <i class="fa fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Titolo Piatti Non Visibili --}}
        <h2 class="mt-4">Archieved Menu</h2>

        {{-- Tabella Piatti Non Visibili --}}
        <table class="table table-borderless table-hover mt-4">
            {{-- Intestazione --}}
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Ingredients</th>
                    <th>Edit</th>
                    <th>Delete</th>

                </tr>
            </thead>

            {{-- Corpo --}}
            <tbody>
                @foreach ($notVisibleFoods as $food)
                    <tr>
                        {{-- ID --}}
                        <td>{{ $food->id }}</td>
                        {{-- Nome --}}
                        <td>{{ $food->name }}</td>
                        {{-- Prezzo --}}
                        <td>€{{ $food->price }}</td>
                        {{-- Descrizione --}}
                        <td>{{ $food->description }}</td>
                        {{-- Visualizza --}}
                        <td>
                            <a href="{{ route('admin.foods.show', $food) }}">
                                <div class="btn btn-info hoverable rounded">
                                    <i class="fa fa-seedling"></i>
                                </div>
                            </a>
                        </td>
                        {{-- Modifica --}}
                        <td>
                            <a href="{{ route('admin.foods.edit', $food) }}">
                                <div class="btn btn-warning rounded">
                                    <i class="fa fa-edit"></i>
                                </div>
                            </a>
                        </td>
                        {{-- Elimina --}}
                        <td>
                            <form action="{{ route('admin.foods.destroy', $food) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger hoverable rounded"
                                    onclick="return confirm('Sei sicuro di voler eliminare questo cibo?')">
                                    <i class="fa fa-trash-alt "></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

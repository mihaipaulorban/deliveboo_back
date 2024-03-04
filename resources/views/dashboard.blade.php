@extends('layouts.admin')

@section('content')
<div class="container mt-4 vh-100">
    {{-- Titolo --}}
    <h2>Piatti</h2>

    {{-- Pulsante crea nuovo cibo --}}
    <a href="/" class="hoverable btn btn-success my-4">
        <i class="fa-solid fa-plus"></i>
    </a>

    {{-- Tabella --}}
    <table class="table table-borderless table-hover">
        {{-- Intestazione --}}
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Prezzo</th>
                <th>Descrizione</th>
                <th>Ingredienti</th>
                <th>Modifica</th>
                <th>Elimina</th>
            </tr>
        </thead>

        {{-- Corpo --}}
        <tbody>
            @foreach($foods as $food)
            <tr>
                {{-- ID --}}
                <td>{{ $food->id }}</td>
                {{-- Nome --}}
                <td>{{ $food->name }}</td>
                {{-- Prezzo --}}
                <td>{{ $food->price }}</td>
                {{-- Descrizione --}}
                <td>{{ $food->description }}</td>
                {{-- Visualizza --}}
                <td>
                    <a href="{{route('admin.foods.show', $food)}}">
                        <div class="btn btn-info hoverable rounded">
                            <i class="fa fa-seedling"></i>
                        </div>
                    </a>
                </td>
                {{-- Modifica --}}
                <td>
                    <a href="{{route('admin.foods.edit', $food)}}">
                        <div class="btn btn-warning rounded">
                            <i class="fa fa-edit"></i>
                        </div>
                    </a>
                </td>
                {{-- Elimina --}}
                <td>
                    <form>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger hoverable rounded" onclick="return confirm('Sei sicuro di voler eliminare questo cibo?')">
                            <i class="fa fa-trash-alt"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

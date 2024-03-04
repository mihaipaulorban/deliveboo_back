@extends('layouts.admin')

@section('content')
<div class="container mt-4 vh-100">
    {{-- Titolo --}}
    <h2>Progetti</h2>

    {{-- Pulsante crea nuovo progetto --}}
    <a href="/" class="hoverable btn btn-success my-4">
        Crea Nuovo Cibo
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
                {{-- Modifica --}}
                <td>
                    <a>Modifica</a>
                </td>
                {{-- Elimina --}}
                <td>
                    <form>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger hoverable" onclick="return confirm('Sei sicuro di voler eliminare questo cibo?')">Elimina</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection


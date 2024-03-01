@extends('layouts.admin')

@section('content')
<div class="container mt-4 vh-100">

    {{-- Titolo --}}
    <h2>Progetti</h2>

    {{-- Pulsante crea nuovo progetto --}}
    <a href="/" class="hoverable btn btn-success my-4">
        Crea Nuovo Cibo
    </a>

    {{-- Pulsanti per gestire i cibi --}}
    <a href="/" class="hoverable btn btn-primary my-4">
        Gestione Cibi
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
            {{-- Progetto 1 --}}
            <tr>
                {{-- ID --}}
                <td>1</td>
                {{-- Titolo --}}
                <td>Titolo Progetto 1</td>
                {{-- Prezzo --}}
                <td>
                    <span class="badge text-bg-success">6,99€</span>
                </td>
                {{-- Descrizione --}}
                <td>
                    <button class="btn btn-info hoverable">Info</button>
                </td>
                {{-- Modifica --}}
                <td>
                    <button class="btn btn-primary hoverable">Modifica</button>
                </td>
                {{-- Elimina --}}
                <td>
                    <button class="btn btn-danger hoverable" onclick="return confirm('Sei sicuro di voler eliminare questo progetto?')">Elimina</button>
                </td>
            </tr>
        
            {{-- Progetto 2 --}}
            <tr>
                {{-- ID --}}
                <td>2</td>
                {{-- Titolo --}}
                <td>Titolo Progetto 2</td>
                {{-- Prezzo --}}
                <td>
                    <span class="badge text-bg-success">6,99€</span>
                </td>
                {{-- Descrizione --}}
                <td>
                    <button class="btn btn-info hoverable">Info</button>
                </td>
                {{-- Modifica --}}
                <td>
                    <button class="btn btn-primary hoverable">Modifica</button>
                </td>
                {{-- Elimina --}}
                <td>
                    <button class="btn btn-danger hoverable" onclick="return confirm('Sei sicuro di voler eliminare questo progetto?')">Elimina</button>
                </td>
            </tr>
        
            {{-- Progetto 3 --}}
            <tr>
                {{-- ID --}}
                <td>3</td>
                {{-- Titolo --}}
                <td>Titolo Progetto 3</td>
                {{-- Prezzo --}}
                <td>
                    <span class="badge text-bg-success">6,99€</span>
                </td>
                {{-- Descrizione --}}
                <td>
                    <button class="btn btn-info hoverable">Info</button>
                </td>
                {{-- Modifica --}}
                <td>
                    <button class="btn btn-primary hoverable">Modifica</button>
                </td>
                {{-- Elimina --}}
                <td>
                    <button class="btn btn-danger hoverable" onclick="return confirm('Sei sicuro di voler eliminare questo progetto?')">Elimina</button>
                </td>
            </tr>
        </tbody>
        

    </table>
</div>
@endsection

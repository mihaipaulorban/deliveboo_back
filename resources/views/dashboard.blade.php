@extends('layouts.admin')

@section('content')
    <div class="container mt-4 vh-100">

        {{-- Toast per creazione / eliminazione / modifica piatto --}}
        @if (session('message'))
            <div class="toast-container position-fixed bottom-0 end-0 p-3">
                <div id="liveToast" class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <strong class="me-auto">Notifica</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        {{ session('message') }}
                    </div>
                </div>
            </div>
        @endif

        {{-- Titolo --}}
        <h2>Food items</h2>

        {{-- Pulsante crea nuovo cibo --}}
        <a href="{{ route('admin.foods.create') }}" class="hoverable btn btn-success my-4">
            Add a new food item <i class="fa-solid fa-plus"></i>
        </a>

        {{-- Tabella Piatti Visibili --}}
        @if ($foods->isNotEmpty())
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
                            <td>
                                {{-- Elimina food --}}
                                <form action="{{ route('admin.foods.destroy', $food) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger hoverable rounded" data-bs-toggle="modal"
                                        data-bs-target="#id-{{ $food->id }}">
                                        <i class="fa fa-trash-alt "></i>
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="id-{{ $food->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete confirmation
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-start">
                                                    Are you sure you want to delete the dish: {{ $food->name }}?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit"
                                                        class="btn btn-danger hoverable rounded">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        {{-- Titolo Piatti Non Visibili --}}
        <h2 class="mt-4">Archived food items</h2>

        {{-- Tabella Piatti Non Visibili --}}
        @if ($not_visible_foods->isNotEmpty())
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
                    @foreach ($not_visible_foods as $food)
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
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger hoverable rounded" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        <i class="fa fa-trash-alt "></i>
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete this dish?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection

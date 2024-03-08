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
        <h2>Food items ({{count($foods)}})</h2>

        {{-- Pulsante crea nuovo cibo --}}
        <a href="{{ route('admin.foods.create') }}" class="hoverable btn btn-success my-4">
            Add a new food item <i class="fa-solid fa-plus"></i>
        </a>

        {{-- Tabella Piatti Visibili --}}
            <table class="table table-borderless table-hover ">

                {{-- Intestazione --}}
                <thead>
                    <tr>
                        <th></th>
                        <th>Visible</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Edit</th>
                        <th>Delete</th>

                    </tr>
                </thead>

                {{-- Corpo --}}
                <tbody>
                    
                    @foreach ($foods as $food)
                   
                        <tr>
                            <td class="w-team">  
                                <div class="rounded-img d-flex align-items-center"> 
                                    <img src="{{ asset('storage/' . $food->img) }}" alt="" class="">
                                </div>
                               
                            </td>


                            <td> 
                               
                                @if ($food->is_visible == 1)

                                    <div class="d-flex justify-content-center">
                                        <div class="radio-green"></div>
                                    </div>
                                
                                    @elseif ($food->is_visible == 0 )
                                    <div class="d-flex justify-content-center">
                                        <div class="radio-red"></div>
                                    </div>
                                @endif
                            </td>
                            {{-- Nome --}}
                            <td>{{ $food->name }}</td>
                            {{-- Prezzo --}}
                            <td>€{{ $food->price }}</td>
                          
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
    </div>
@endsection

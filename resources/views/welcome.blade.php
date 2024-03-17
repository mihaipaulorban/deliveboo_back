@extends('layouts.app')
@section('content')
    <div class="jumbotron p-2 mt-3 rounded-3 d-flex">
        <div class="container  my-5  p-3 mb-5 text-white rounded">

            {{-- container colonne --}}
            <div class="d-flex flex-column justify-content-center align-items-center">
                <h1 class="fw-bold">We're glad to have you with us!</h1>

                <section class="mt-5">
                    <div class="container p-3">
                        <div class="card bg-glass border-0">
                            <div class="card-body">
                                <h3 class="card-title">
                                    Welcome to your restaurant management page. Here you can register your restaurant, login
                                    to your
                                    personal page and add food items.
                                </h3>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="mt-5 d-flex justify-content-between">

                    <section class="mt-5" style="height: 300px">
                        <div class="container p-3">
                            <div class="card bg-glass border-0 p-3" style="height: 200px">
                                <div class="card-body">
                                    <h3 class="card-title">
                                        Manage your restaurant menu and orders easily.
                                    </h3>
                                    <p class="card-text">
                                        You can add, edit and remove menu items easily in your dashboard. Manage categories
                                        and
                                        pricing flexibly.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="mt-5">
                        <div class="container p-3">
                            <div class="card bg-glass border-0 p-3" style="height: 200px">
                                <div class="card-body">
                                    <h3 class="card-title">
                                        Track your sales and revenue in real-time analytics.
                                    </h3>
                                    <p class="card-text">
                                        View insightful graphs and charts showing your daily, weekly and monthly sales and
                                        revenue.
                                        Filter by location, menu item and time period.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </section>



                </div>


                <section class="mt-5">
                    <div class="container p-3">
                        <div class="card bg-glass border-0 p-4">
                            <div class="card-body">
                                <h3 class="card-title">
                                    Connect with customers directly through integrated messaging.
                                </h3>
                            </div>

                            @if (auth()->check())
                                <div class="d-flex justify-content-center mt-5">
                                    <a href="{{ route('login') }}" class="my-btn btn btn-primary">Manage your
                                        restaurant</a>
                                </div>
                            @else
                                <div class="d-flex justify-content-center mt-5">
                                    <a href="{{ route('login') }}" class="my-btn btn btn-primary">Login</a>
                                </div>
                            @endif


                        </div>
                    </div>
                </section>


            </div>


        </div>
    </div>
@endsection

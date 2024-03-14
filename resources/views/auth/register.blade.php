
@extends('layouts.app')

@section('content')
    <div class="container mt-4 ">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="glass p-5">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form id="registration-form" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-4 row">
                                <p class="text-danger fs-6">Fields with a * must be filled in</p>
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Name') }}<strong>*</strong></label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" autocomplete="name" autofocus>
                                    <strong id="nameError" class="text-danger error" style="font-size: 0.875em;"
                                        role="alert"></strong>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}<strong>*</strong></label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" autocomplete="email">
                                    <strong id="emailError" class="text-danger error" style="font-size: 0.875em;"
                                        role="alert"></strong>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}<strong>*</strong></label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        autocomplete="new-password">
                                    <strong id="passwordError" class="text-danger error" style="font-size: 0.875em;"
                                        role="alert"></strong>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}<strong>*</strong></label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" autocomplete="new-password">
                                    <strong id="passwordError" class="text-danger error" style="font-size: 0.875em;"
                                        role="alert"></strong>
                                </div>
                            </div>

                            <!-- Nuovi campi per il ristorante -->
                            <div class="mb-4 row">
                                <label for="restaurant_name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Restaurant Name') }}<strong>*</strong></label>

                                <div class="col-md-6">
                                    <input id="restaurant_name" type="text"
                                        class="form-control @error('restaurant_name') is-invalid @enderror"
                                        name="restaurant_name" value="{{ old('restaurant_name') }}"
                                        autocomplete="restaurant_name" autofocus>
                                    <strong id="restaurantNameError" class="text-danger error" style="font-size: 0.875em;"
                                        role="alert"></strong>

                                    @error('restaurant_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="address"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Address') }}<strong>*</strong></label>

                                <div class="col-md-6">
                                    <input id="address" type="text"
                                        class="form-control @error('address') is-invalid @enderror" name="address"
                                        value="{{ old('address') }}" autocomplete="address">
                                    <strong id="addressError" class="text-danger error" style="font-size: 0.875em;"
                                        role="alert"></strong>

                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- campo per il logo --}}
                            <div class="mb-4 row">
                                <label for="logo" class="col-md-4 col-form-label text-md-right">{{ __('Restaurant Logo') }}</label>
                            
                                <div class="col-md-6">
                                    <input id="logo" type="file" class="form-control @error('logo') is-invalid @enderror" name="logo" value="{{ old('logo') }}">
                                    <strong id="logoError" class="text-danger error" style="font-size: 0.875em;" role="alert"></strong>
                            
                                    @error('logo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- campo per l'immagine di copertina --}}

                            <div class="mb-4 row">
                                <label for="cover_img" class="col-md-4 col-form-label text-md-right">{{ __('Restaurant Background cover') }}</label>
                            
                                <div class="col-md-6">
                                    <input id="cover_img" type="file" class="form-control @error('cover_img') is-invalid @enderror" name="cover_img" value="{{ old('cover_img') }}">
                                    <strong id="coverImgError" class="text-danger error" style="font-size: 0.875em;" role="alert"></strong>
                            
                                    @error('cover_img')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            {{-- campo per la partita iva --}}
                            <div class="mb-4 row">
                                <label for="p_iva"
                                    class="col-md-4 col-form-label text-md-right">{{ __('VAT number') }}<strong>*</strong></label>

                                <div class="col-md-6">
                                    <input id="p_iva" type="text"
                                        class="form-control @error('p_iva') is-invalid @enderror" name="p_iva"
                                        value="{{ old('p_iva') }}" autocomplete="p_iva" maxlength="11">
                                    <strong id="pIvaError" class="text-danger error" style="font-size: 0.875em;"
                                        role="alert"></strong>

                                    @error('p_iva')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <p>Restaurant Types:</p>
                                <em style="display: inline-block; font-size: 12px" class="my-1">
                                    Select at least one field
                                </em>
                                <div class="row">
                                    <div id="checkboxContainer" class="d-flex flex-wrap">
                                        @foreach ($restaurants_type as $type)
                                            <div class="col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"
                                                        value="{{ $type->id }}" id="{{ $type->id }}"
                                                        name="restaurant_types[]"
                                                        {{ in_array($type->id, old('restaurant_types', [])) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="{{ $type->id }}">
                                                        {{ $type->name }}
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    @error('restaurant_types')
                                        <span style="font-size: 0.875em;" class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <strong id="restaurant_types" class="text-danger error" style="font-size: 0.875em;"
                                        role="alert"></strong>
                                </div>
                            </div>

                            <!-- Fine nuovi campi per il ristorante -->
                            <div class="mb-4 row mt-4 justify-content-center ">
                                <div class="col-md-6 offset-md-4">
                                    <button type="button" class="btn btn-primary" onclick="validateForm()">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


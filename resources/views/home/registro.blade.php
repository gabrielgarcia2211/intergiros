@extends('layouts.home')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-7 py-5">
                <h3><strong>Regístrate en INTERRAPPI</strong></h3>
                <br>
                <form id="camposRegistro" class="form-signup" method="POST" action="{{ route('users.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <label for="name" class="sr-only">Nombre completo</label>
                            <input class="form-control form-control-lg {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Nombre completo"
                                aria-label=".form-control-lg example">
                            @if ($errors->has('name'))
                                <span style="margin-bottom:18px" class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-md-12">
                            <label for="identificacion" class="sr-only">Identificacion</label>
                            <input class="form-control form-control-lg {{ $errors->has('identificacion') ? ' is-invalid' : '' }}"
                                type="number" name="identificacion" id="identificacion" value="{{ old('identificacion') }}" placeholder="Identificacion"
                                aria-label=".form-control-lg example">
                            @if ($errors->has('identificacion'))
                                <span style="margin-bottom:18px" class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('identificacion') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-md-12">
                            <label for="telefono" class="sr-only">Telefono</label>
                            <input class="form-control form-control-lg {{ $errors->has('telefono') ? ' is-invalid' : '' }}"
                                type="number" name="telefono" id="telefono" value="{{ old('telefono') }}" placeholder="telefono"
                                aria-label=".form-control-lg example">
                            @if ($errors->has('telefono'))
                                <span style="margin-bottom:18px" class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('telefono') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-md-12">
                            <label for="email" class="sr-only">Email</label>
                            <input class="form-control form-control-lg {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Correo Electronico"
                                aria-label=".form-control-lg example">
                            @if ($errors->has('email'))
                                <span style="margin-bottom:18px" class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-md-12">
                            <label for="password" class="sr-only">Contraseña</label>
                            <input
                                class="form-control form-control-lg {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                type="password" name="password" id="password" value="{{ old('password') }}" placeholder="Contraseña"
                                aria-label=".form-control-lg example">
                            @if ($errors->has('password'))
                                <span style="margin-bottom:18px" class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-md-12">
                            <p>Tu contraseña debe ser de 8 caracteres que contengan números, letras y una letra mayúscula.
                            </p>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-primary" id="registro"
                                type="submit"><strong>Registrarme</strong></button>
                        </div>
                    </div>
                    <br>
                    <br>

                    <div class="row">
                        <div class="col-md-12 mt-2" style="text-align: center">
                            <p>¿Ya tienes una cuenta? <a href="{{ route('login') }}">Iniciar Sesión</a></p>
                        </div>
                    </div>
                </form>

            </div>
            <div class="col-md-5 py-5">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('img/ap6TfFC.png') }}" class="d-block w-100" alt="..." height="600px"
                                width="auto">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('img/f1WarFF.png') }}" class="d-block w-100" alt="..." height="600px"
                                width="auto">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('img/KFuCr6N.png') }}" class="d-block w-100" alt="..." height="600px"
                                width="auto">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@section('script')
    <script src="{{ asset('js/home/registro.js') }}"></script>
@endsection

@extends('layouts.home')
@section('content')
    <div class="container">
        <div class="py-5">
            <h3><strong>¡Te damos la bienvenida a tu cuenta!</strong></h3>
            <br>
            <form id="camposSesion" class="form-signin" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="row  mt-3">
                    <div class="col-md-12">
                        <label for="email" class="sr-only">Correo Electrónico</label>
                        <input type="email" name="email" id="email"
                            class="form-control form-control-lg {{ $errors->has('email') ? ' is-invalid' : '' }}"
                            value="{{ old('email') }}" placeholder="Correo Electronico">
                        @if ($errors->has('email'))
                            <span style="margin-bottom:18px" class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row mt-3 mb-4">
                    <div class="col-md-12">
                        <label for="contraseña" class="sr-only">Contraseña</label>
                        <input type="password" name="contraseña" id="contraseña"
                            class="form-control form-control-lg {{ $errors->has('contraseña') ? ' is-invalid' : '' }}"
                            value="{{ old('contraseña') }}" placeholder="Contraseña">
                        @if ($errors->has('contraseña'))
                            <span style="margin-bottom:18px" class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('contraseña') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        @if (!empty($ingresoError))
                            <div class="alert alert-danger" role="alert" style="text-align: center;padding: 10px">
                                {{ $ingresoError[0] }}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary" id="ingresar" style="width: 100%">Iniciar
                            Sesión</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-2" style="text-align: center">
                        <p>¿No tienes una cuenta? <a href="{{ route('registro') }}">Registrate</a></p>
                    </div>
                </div>
            </form>

        </div>
    </div>
    </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('js/home/sesion.js') }}"></script>
@endsection

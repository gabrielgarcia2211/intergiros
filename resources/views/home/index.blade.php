@extends('layouts.home')
@section('content')
    <nav class="navbar bg-body-tertiary"
        style="
        background: rgb(10,128,198) !important;
        background: linear-gradient(87deg, rgba(10,128,198,1) 0%, rgba(0,202,242,1) 100%) !important;">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('img/LOGO-BLANCO.png') }}" alt="INTERRAPPI" width="70" height="50">
            </a>
            <div>
                <a href="{{ route('login.index') }}" type="button" style="color:white" class="btn"><strong>Iniciar Sesion</strong></a>
                <a href="{{ route('registro') }}" type="button" class="btn btn-primary"><strong>Crear Cuenta</strong></a>
            </div>
        </div>
    </nav>
    <div class="container-fluid aterrizaje-page">
        
    </div>
    <!-- Modal -->
@endsection
@section('script')
    <script src="{{ asset('js/home/index.js') }}"></script>
@endsection

@extends('layouts.home')
@section('content')
    <nav class="navbar bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('template/images/INTERRAPPI.png') }}" alt="INTERRAPPI" width="70" height="50">
            </a>
            <div>
                <a href="{{ route('login.index') }}" type="button" class="btn"><strong>Iniciar Sesion</strong></a>
                <a href="{{ route('registro') }}" type="button" class="btn btn-primary"><strong>Crear Cuenta</strong></a>
            </div>
        </div>
    </nav>
    <div class="container" id="calculadora">
        <div class="row">
            <div class="col-md-12 text-center"> <!-- Agrega la clase "text-center" para centrar el contenido horizontalmente -->
                <h1><strong>Tu Cuenta Global para ahorrar dólares, pagar, enviar, recibir dinero y más</strong></h1>
                <br>
                <img src="{{ asset('img/image-variant.png') }}" class="img-fluid mx-auto" alt="..."> <!-- Agrega la clase "mx-auto" para centrar la imagen horizontalmente -->
            </div>
        </div>
        <br>
        <div id="somos">
            <h1><strong>QUIENES SOMOS</strong></h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas accusamus, fugit voluptatem esse amet
                modi maiores id saepe maxime eaque corporis, itaque quo iure dolores aspernatur possimus numquam
                ipsum
                libero! Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ducimus similique debitis
                quibusdam!
                Deleniti rerum ullam odio necessitatibus consequuntur delectus magnam quas tempora, rem minus
                provident
                alias accusamus, fuga doloribus earum! Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                Officia
                recusandae itaque, praesentium obcaecati beatae at ea. Rerum esse cupiditate blanditiis consequuntur
                quaerat mollitia, deserunt magnam ipsam, temporibus neque praesentium. Vel. Lorem ipsum dolor sit
                amet
                consectetur adipisicing elit. Delectus debitis eaque earum voluptatem architecto voluptas in
                adipisci
                et, velit incidunt id laborum quae aspernatur distinctio tempora quidem, fugiat voluptates
                obcaecati?
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident id numquam soluta cumque, ut odit
                optio, ea labore pariatur nam eos! Optio possimus corporis reprehenderit esse sed illum et repellat!
            </p>
        </div>
        <br>
    </div>
    
    <!-- Modal -->
@endsection
@section('script')
    <script src="{{ asset('js/home/index.js') }}"></script>
@endsection

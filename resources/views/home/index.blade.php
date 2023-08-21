@extends('layouts.home')
@section('content')
    <nav class="navbar bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('') }}" alt="Intergiros" width="30" height="24">
            </a>
            <div>
                <a href="{{ route('login.index') }}" type="button" class="btn"><strong>Iniciar Sesion</strong></a>
                <a href="{{ route('registro') }}" type="button" class="btn btn-primary"><strong>Crear Cuenta</strong></a>
            </div>
        </div>
    </nav>
    <div class="container" id="calculadora">
        <div class="row">
            <div class="col-md-6">
                <h1><strong>Tu Cuenta Global para ahorrar dólares, pagar, enviar, recibir dinero y más</strong></h1>
                <br>
                <img src="{{ asset('img/image-variant.png') }}" class="img-fluid" alt="...">
            </div>
            <div class="col-md-6">
                <form id="moneda">
                    <div class="row" id="envia">
                        <p>Tu envias</p>
                        <div class="col-7">
                            <div class="mb-3">
                                <div id="monedaIn">
                                </div>
                            </div>
                        </div>
                        <div class="col-5">
                            <select class="form-select" aria-label="Default select example">
                                <option selected value="">COP</option>
                                <option value="">USD</option>
                                <option value="">PEN</option>
                                <option value="">MXN</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row" id="recibe">
                        <p>Tu contacto recibe</p>
                        <div class="col-7">
                            <div class="mb-3">
                                <div id="monedaOut">
                                </div>
                            </div>
                        </div>
                        <div class="col-5">
                            <select class="form-select" aria-label="Default select example">
                                <option selected value="">COP</option>
                                <option value="">USD</option>
                                <option value="">PEN</option>
                                <option value="">MXN</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row" id="formula">
                        <div class="row">
                            <div class="col-6">
                                <p>Costo envio:</p>
                            </div>
                            <div class="col-6" id="valores">
                                <p>$$$$$$$</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p>Monto a convertir:</p>
                            </div>
                            <div class="col-6" id="valores">
                                <p>$$$$$$$</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p>Tipo cambio:</p>
                            </div>
                            <div class="col-6" id="valores">
                                <p>$$$$$$$</p>
                            </div>
                        </div>
                        <div id="modal">
                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <p>Ver detalle completo</p><i class="fa-solid fa-chevron-down"></i>
                            </button>
                        </div>
                    </div>
                    <br>
                    <div class="row" id="entidad">
                        <select class="form-select" aria-label="Default select example">
                            <option selected value="">Donde recibira el dinero</option>
                            <option value="">En una cuenta bancaria</option>
                            <option value="">En efectivo</option>
                        </select>
                    </div>
                    <br>
                    <div class="row">
                        <a href="registro.html" class="btn btn-primary" type="button"><strong>Crea tu cuenta
                                y transfiere</strong></a>
                    </div>
                </form>
            </div>
        </div>
        <br>
        <div id="somos">
            <h1><strong>QUIENES SOMOS</strong></h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas accusamus, fugit voluptatem esse
                amet
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
    <div class="modal fade modal-centered" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Detalle completo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <p>Tu envias:</p>
                        </div>
                        <div class="col-6" id="valores">
                            <p>$$$$$$$</p>
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-6">
                            <p>Costo envio:</p>
                        </div>
                        <div class="col-6" id="valores">
                            <p>$$$$$$$</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <p>Costo tipo de cambio:</p>
                        </div>
                        <div class="col-6" id="valores">
                            <p>$$$$$$$</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <p>Costos operacionales:</p>
                        </div>
                        <div class="col-6" id="valores">
                            <p>$$$$$$$</p>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-6">
                            <p>Monto a convertir:</p>
                        </div>
                        <div class="col-6" id="valores">
                            <p>$$$$$$$</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-6">
                            <p>Tipo de cambio: </p>
                        </div>
                        <div class="col-6" id="valores">
                            <p>$$$$$$$</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-6">
                            <p>Tu contacto recibe: </p>
                        </div>
                        <div class="col-6" id="valores">
                            <p>$$$$$$$</p>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('js/home/index.js') }}"></script>
@endsection

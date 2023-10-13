@extends('layouts.main')
@section('content')
    <!-- PRE LOADER -->
    <div class="preloader">
        <div class="sk-rotating-plane"></div>
    </div>

    <!-- NAVIGATION LINKS -->
    @include('dash.nav')

    <div class="bolColven">
        <div class="cuadrointer"><br><br><br><br><br><br><br><br>
            <center>
                <h1>ENVÍO DE BOLÍVARES DE COLOMBIA A VENEZUELA</h1>
                <h5 style="color: white">POR DEPÓSITO O TRANSFERENCIA BANCARIA
                </h5>
            </center>
        </div>
    </div>
    <br><br>
    <br>

    <div class="seccion1bolPeru">
        <br> <br>
        <center>
            <h1>TASA DEL BOLÍVAR EN COLOMBIA</h1>
            <h3>{{ \Carbon\Carbon::now()->format('jS F Y') }}</h3>
            <h1>´´´´´´´´´´´´´´´´´´´´´´´´</h1>
            <h1>Tasa</h1>
            <h2>10.000 = 0 BS </h2>
            </h2>
        </center>
    </div>

    <center>
        <div class="numCuentas">
            <h3>NUESTROS NÚMEROS DE CUENTAS</h3>
            <ul class="item">
                <li> Deposite o transfiera a nuestro siguiente número de cuenta. El monto mínimo a depositar es 10,000
                    pesos. Dudas o consultas, escríbanos a nuestras redes sociales (Facebook o Instagram).</li><br>
                <br>
            </ul>
            <h2>Bancolombia: Mawir Ruiz</h2>
            <h3><b>08800011815</b> - Ahorros</h3>
            <h3>PASAPORTE 5005328728</h3>
        </div>
        <br>
    </center>

    <div class="formuPayCol" id="formuPayCol">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="wizard-container" style="margin-bottom: 50px; margin-top: 20px;">
                    <div class="card-wiz wizard-card" data-color="azzure" id="wizard">
                        <form id="paymentstransColForm">
                            @csrf
                            <div class="wizard-navigation">
                                <ul>
                                    <li>
                                        <a href="#pedidos" data-toggle="tab">¡PROCESO DE REGISTRO!</a><i
                                            class="icon fa-sharp fa-solid fa-money-bill"></i>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane" id="pedidos">
                                    <div class="containt-formu v1">
                                        <h4 class="info-text">
                                            FORMULARIO DE PEDIDO DE BOLÍVARES
                                            <br>
                                            <br>
                                            <p style="padding: 10px;color: white;float: right;">
                                                Por favor ingrese con cuidado sus datos a través del siguiente
                                                formulario. En Monto ingrese el monto exacto de su voucher de depósito o
                                                transferencia.
                                            </p>
                                            <br>
                                            <br>
                                        </h4>
                                        <div class="row">
                                            <h4 class="sub-descripction">
                                                DATOS DE LA CUENTA A TRANSFERIR:
                                                <div id="add-beneficiario"></div>
                                                <div id="list-beneficiario"></div>
                                                <div id="revert-beneficiario"></div>
                                            </h4>
                                            <div class="col-sm-4">
                                                <h4 class="sub-descripction-label">
                                                    NOMBRE DEL BENEFICIARIO:
                                                </h4>
                                                <div class="form-group">
                                                    <div id="nombre_b_transColForm"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <h4 class="sub-descripction-label">
                                                    CEDULA DEL BENEFICIARIO:
                                                </h4>
                                                <div class="form-group">
                                                    <div id="cedula_b_transColForm"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <h4 class="sub-descripction-label">
                                                    BANCO
                                                </h4>
                                                <div class="form-group">
                                                    <div id="banco_b_transColForm"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <h4 class="sub-descripction-label">
                                                    NUMERO DE CUENTA:
                                                </h4>
                                                <div class="form-group">
                                                    <div id="nro_cuenta_transColForm"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h4 class="sub-descripction-label">
                                                    TIPO DE PERSONA:
                                                </h4>
                                                <div id="radio_label_transColForm"></div>
                                            </div>
                                            <div class="col-sm-6">
                                                <h4 class="sub-descripction-label">
                                                    TIPO DE CUENTA
                                                </h4>
                                                <div id="radio_type_transColForm"></div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <h4 class="sub-descripction">DATOS DEL SOLICITANTE:
                                                <div id="check-cliente"></div>
                                            </h4>
                                            <div class="col-sm-4">
                                                <h4 class="sub-descripction-label">
                                                    TU NOMBRE:
                                                </h4>
                                                <div id="nombre_d_transColForm"></div>
                                            </div>
                                            <div class="col-sm-4">
                                                <h4 class="sub-descripction-label">
                                                    TU IDENTIFICACION:
                                                </h4>
                                                <div id="identificacion_d_transColForm"></div>
                                            </div>
                                            <div class="col-sm-4">
                                                <h4 class="sub-descripction-label">
                                                    CORREO ELECTRONICO:
                                                </h4>
                                                <div id="correo_d_transColForm"></div>
                                            </div>
                                            <div class="col-sm-4">
                                                <h4 class="sub-descripction-label">
                                                    TELEFONO:
                                                </h4>
                                                <div id="telefono_d_transColForm"></div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <h4 class="sub-descripction">DATOS DE ENVIO:</h4>
                                            <div class="col-sm-4">
                                                <h4 class="sub-descripction-label">
                                                    MONTO A CAMBIAR $:
                                                </h4>
                                                <div id="monto_enviar_d_transColForm"></div>
                                                <p style="text-align: left; display: inline-block; margin-top: 10px">Conversión a
                                                    Bolívares:</p>
                                                <p style="text-align: left; display: inline-block;"
                                                    id="conversion_transColForm"><b>$</b>00</p>
                                            </div>
                                            <div class="col-sm-5" style="text-align: left;">
                                                <p style="text-align: justify;"><i class="fa-solid fa-image"></i>
                                                    Adjuntar Vocuher</p>
                                                <hr>
                                                <p style="text-align: left;">Tamaño maximo del archivo: 5.72 MB. | Tipo
                                                    de archivos permitidos: gif, jpeg, png, jpg | Cantidad maxima de
                                                    archivo: 1 | Cantidad minima de archivo: 1</p>
                                                <hr>
                                                <div id="file_b_transColForm"></div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row" style="display: flex; justify-content: center; align-items: center; text-align:center">
                                            <div id="check_terminos"></div>
                                        </div>
                                        <br>
                                        <div class="row" style="display: flex; justify-content: center; align-items: center; text-align:center; margin-top:20px">
                                            <div class="col-md-12">
                                                <div id="btn_send_transColForm"></div>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
   

    <!-- FOOTER SECTION -->
    <div id="form_footer">
        @include('dash.footer')
    </div>
    
    <!-- Back top -->
    <a href="#back-top" class="go-top"><i class="fa fa-angle-up"></i></a>
@endsection
@section('script')
    <script src="{{ asset('js/transColForm/index.js') }}"></script>
@endsection

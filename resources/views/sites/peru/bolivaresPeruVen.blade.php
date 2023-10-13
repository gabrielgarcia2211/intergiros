@extends('layouts.main')
@section('content')
    <!-- PRE LOADER -->
    <div class="preloader">
        <div class="sk-rotating-plane"></div>
    </div>

    <!-- NAVIGATION LINKS -->
    @include('dash.nav')

    <div class="bolperuven">
        <div class="cuadrointer"><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <center>
                <h1>ENVÍO DE BOLÍVARES DE PERÚ A VENEZUELA</h1>
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
            <h1>TASA DEL BOLÍVAR EN PERÚ</h1>
            <h2>{{ \Carbon\Carbon::now()->format('jS F Y') }}</h2>
            <h1>´´´´´´´´´´´´´´´´´´´´´´´´</h1>
            <h2>{{ '1 Sol = Bs' }}
                <h2>{{ '1 Dólar = Bs' }}
        </center>
    </div>
    <center>
        <div class="numCuentas">

            <h3>NUESTROS NÚMEROS DE CUENTAS</h3>
            <ul class="item">

                <li> Deposite o transfiera a cualquiera de nuestros números de cuentas. Por favor evite realizar depósitos
                    por ventanilla del banco para evitar cargos adicionales</li><br>
                <li> A quienes se encuentren en provincia (fuera de Lima), recuerde que, a excepción de Scotiabank, el banco
                    cobrará una comisión adicional, el cuál será descontado manualmente una vez corroboremos el dinero en
                    nuestra cuenta (puede averiguar en su agencia bancaria la comisión que se cobra por depósitos de
                    provincia a Lima)
                </li><br>
                <li> El monto mínimo a depositar o transferir es 20 soles o 10 dólares, le recordamos que <u>no cobramos
                        comisiones</u> por nuestros servicios.</li><br>
                <br>
            </ul>
            <div class="row">
                <div class="wow fadeInUp col-md-6 col-sm-5" data-wow-delay="0.3s">
                    <div class="contact_des">
                        <img src="{{ asset('template/images/LogoBCP-300x80.png') }}" class="img-responsive"
                            alt="paypal" />
                        <div class="speakers-thumb">
                            <h6>BCP Soles es 19493818616076.</h6>
                            <h6>BCP Dólares es 19496026960127</h6>
                            <h6>A nombre de Mawir Ruiz</h6>
                        </div>
                    </div>
                </div>
                <div class="wow fadeInUp col-md-4 col-sm-3" data-wow-delay="0.3s">
                    <div class="contact_des">
                        <img width="150px" src="{{ asset('template/images/codQr.jpeg') }}" class="img-responsive"
                            alt="paypal" />
                        <div class="speakers-thumb">
                            <h3>QR yape</h3>
                            <h6>987919513</h6>
                            <h6>A nombre de Brandy Mejía</h6>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </center>
    <div class="formubolPeru">
        <br>
        <center>
            <h2>FORMULARIO DE PEDIDO DE BOLÍVARES</h2>
            <p>Por favor ingrese con cuidado sus datos a través del siguiente formulario. En Monto ingrese el monto exacto
                de su voucher de depósito o transferencia.</p>
        </center>
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <!--      Wizard container        -->
                <div class="wizard-container" style="margin-bottom: 50px; margin-top: 20px;">
                    <div class="card-wiz wizard-card" data-color="azzure" id="wizard">
                        <form id="paymentstransPeruForm">
                            @csrf
                            <div class="wizard-navigation">
                                <ul>
                                    <li>
                                        <a href="#pedidos" data-toggle="tab">¡DILIGENCIAMIENTO DE FORMUALRIO!</a><i
                                            class="icon fa-sharp fa-solid fa-money-bill"></i>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane" id="pedidos">
                                    <div class="containt-formu v2">
                                        <div class="row">
                                            <h4 class="sub-descripction">
                                                DATOS DEL BENEFICIARIO:
                                                <div id="add-beneficiario"></div>
                                                <div id="list-beneficiario"></div>
                                                <div id="revert-beneficiario"></div>
                                            </h4>
                                            <div class="col-sm-4">
                                                <h4 class="sub-descripction-label">
                                                    NOMBRE DEL BENEFICIARIO:
                                                </h4>
                                                <div class="form-group">
                                                    <div id="nombre_b_transPeruForm"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <h4 class="sub-descripction-label">
                                                    CEDULA DEL BENEFICIARIO:
                                                </h4>
                                                <div class="form-group">
                                                    <div id="cedula_b_transPeruForm"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <h4 class="sub-descripction-label">
                                                    TIPO DE IDENTIFICACION:
                                                </h4>
                                                <div id="radio_label_transPeruForm"></div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <h4 class="sub-descripction-label">
                                                    BANCO:
                                                </h4>
                                                <div class="form-group">
                                                    <div id="banco_b_transPeruForm"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <h4 class="sub-descripction-label">
                                                    NUMERO DE CUENTA:
                                                </h4>
                                                <div class="form-group">
                                                    <div id="nro_cuenta_transPeruForm"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 moneda-otro-view">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <h4 class="sub-descripction-label">
                                                    TIPO DE CUENTA:
                                                </h4>
                                                <div id="radio_type_transPeruForm"></div>
                                            </div>
                                            <div class="col-sm-4">
                                                <h4 class="sub-descripction-label">
                                                    MONEDA:
                                                </h4>
                                                <div id="radio_moneda_transPeruForm"></div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top: 20px">
                                            <div class="col-sm-4">
                                                <div id="moneda_b_transPeruForm"></div>
                                                <div class="row" id="group-view-moneda" style="margin-left: 6px">
                                                    <div class="col-6">
                                                        <h6 class="d-inline-block">Monto BS:</h6>
                                                        <p class="d-inline-block" id="valor_b_transPeruForm"></p>
                                                    </div>
                                                </div>                                                
                                            </div>
                                        </div>
                                        <br>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-6" style="margin-right: 8px;">
                                                <p class="descripcion-formu">
                                                    ¿Su cuenta bancaria tiene habilitada la opción de
                                                    Pago Móvil?
                                                </p>
                                                <p style="text-align: justify;">
                                                    En caso no tengamos disponibilidad en el banco que
                                                    ha elegido y nos brinda sus datos de pago móvil, le
                                                    realizaremos su transferencia por medio de este
                                                    método.
                                                </p>
                                                <div id="radio_type_movil"></div>
                                            </div>
                                            <div class="col-sm-5 group-bolivares-view-bp">
                                                <h4 class="sub-descripction-label" id="label_movil_b">
                                                    Ingrese el Teléfono vinculado a Pago Móvil:
                                                </h4>
                                                <div id="movil_b_transPeruForm"></div>
                                            </div>
                                        </div>
                                        <br>
                                        <hr>
                                        <div class="row">
                                            <h4 class="sub-descripction">DATOS DEL DEPOSITANTE:  
                                                <div id="check-cliente"></div>
                                            </h4>
                                            <div class="col-sm-4">
                                                <h4 class="sub-descripction-label">
                                                    NOMBRE DEL DEPOSITANTE:
                                                </h4>
                                                <div id="nombre_d_transPeruForm"></div>
                                            </div>
                                            <div class="col-sm-4">
                                                <h4 class="sub-descripction-label">
                                                    EMAIL DEL DEPOSITANTE:
                                                </h4>
                                                <div id="correo_d_transPeruForm"></div>
                                            </div>
                                            <div class="col-sm-4">
                                                <h4 class="sub-descripction-label">
                                                    CELULAR DEL DEPOSITANTE:
                                                </h4>
                                                <div id="telefono_d_transPeruForm"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <h4 class="sub-descripction-label">
                                                    TU IDENTIFICACION:
                                                </h4>
                                                <div id="identificacion_d_transPeruForm"></div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <p>Tamaño maximo del archivo: 5.72 MB. | Tipo de
                                                    archivos permitidos: gif, jpeg, png, jpg | Cantidad maxima de archivo: 1
                                                    | Cantidad minima de archivo: 1</p>
                                                <hr>
                                                <div id="file_b_transPeruForm"></div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row" style="display: flex; justify-content: center; align-items: center; text-align:center">
                                            <div id="check_terminos"></div>
                                        </div>
                                        <br>
                                        <div class="row" style="display: flex; justify-content: center; align-items: center; text-align:center; margin-top:20px">
                                            <div class="col-md-12">
                                                <div id="btn_send_transPeruForm"></div>
                                            </div>
                                        </div>                                        
                                    </div>
                                </div>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
            <!-- wizard container -->
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
    <script src="{{ asset('js/transPeruForm/index.js') }}"></script>
@endsection

@extends('layouts.main')

@section('content')
    <!-- =========================
                    PRE LOADER
                ============================== -->
    <div class="preloader">
        <div class="sk-rotating-plane"></div>
    </div>

    <!-- =========================
            NAVIGATION LINKS
        ============================== -->
    @include('dash.nav')

    <!-- =========================
            INTRO SECTION
        ============================== -->
    {{-- <div class="carousel fade-carousel slide" data-ride="carousel" data-interval="2000" id="bs-carousel">
        <!-- Overlay -->
        <div class="overlay"></div>

        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#bs-carousel" data-slide-to="0" class="active"></li>
            <li data-target="#bs-carousel" data-slide-to="1"></li>
            <li data-target="#bs-carousel" data-slide-to="2"></li>
            <li data-target="#bs-carousel" data-slide-to="3"></li>
            <li data-target="#bs-carousel" data-slide-to="4"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item slides active">
                <div class="slide-1"></div>
                <div class="hero">
                    <hgroup></hgroup>
                </div>
            </div>
            <div class="item slides">
                <div class="slide-2"></div>
                <div class="hero">
                    <hgroup></hgroup>
                </div>
            </div>
            <div class="item slides">
                <div class="slide-3"></div>
                <div class="hero">
                    <hgroup></hgroup>
                </div>
            </div>
            <div class="item slides">
                <div class="slide-4"></div>
                <div class="hero">
                    <hgroup></hgroup>
                </div>
            </div>
            <div class="item slides">
                <div class="slide-5"></div>
                <div class="hero">
                    <hgroup></hgroup>
                </div>
            </div>
        </div> 
    </div> --}}

    <!-- =========================
            OVERVIEW SECTION
        ============================== -->
    <section id="overview" class="parallax-section mt-5">
        <div class="container">
            <center>
                
                <div class="row" style="margin: 30px 0">
                    <div id="btn_status_form"></div>
                </div>
               
                <div class="bancoInfo">
                    Hoy transferimos a todos los bancos de Venezuela desde:
                    <br />
                    <b>BANESCO Y BANCO VENEZUELA</b>
                    <br />
                    (pago móvil a otros bancos según disponibilidad, Terminada nuestra
                    disponibilidad PM, todas las transferencias serán realizadas desde
                    banesco)
                </div>
            </center>
            <br />
            <div id="owl-speakers" class="owl-carousel">
                <div class="item wow fadeInUp col-md-3 col-sm-3" data-wow-delay="0.9s">
                    <div class="speakers-wrapper" style="text-align: center;">
                        <img src="{{ asset('template//images/paypal.png') }}" class="img-responsive" alt="paypal"
                            style="margin: 0 auto;" />
                        <div class="speakers-thumb">
                            <h3>TASA PAYPAL</h3>
                            <h2>{{ 'US $1.00 = ' . (optional(App\Models\Tipos\TasaCambio::where('key', 'PayPal')->first())->valor ?? 'N/A') . ' Bs' }}
                            </h2>
                        </div>
                    </div>
                </div>

                <div class="item wow fadeInUp col-md-3 col-sm-3" data-wow-delay="0.6s">
                    <div class="speakers-wrapper" style="text-align: center;">
                        <img src="{{ asset('template/images/skrill.png') }}" class="img-responsive" alt="skrill"
                            style="margin: 0 auto;" />
                        <div class="speakers-thumb">
                            <h3>TASA SKRILL</h3>
                            <h2>{{ 'US $1.00 = ' . (optional(App\Models\Tipos\TasaCambio::where('key', 'Skrill')->first())->valor ?? 'N/A') . ' Bs' }}
                            </h2>
                        </div>
                    </div>
                </div>

                <div class="item wow fadeInUp col-md-3 col-sm-3" data-wow-delay="0.9s">
                    <div class="speakers-wrapper" style="text-align: center;">
                        <img src="{{ asset('template/images/1.png') }}" class="img-responsive" alt="BITCOIN"
                            style="margin: 0 auto;" />
                        <div class="speakers-thumb">
                            <h3>TASA BITCOIN</h3>
                        </div>
                    </div>
                </div>

                <div class="item wow fadeInUp col-md-3 col-sm-3" data-wow-delay="0.6s">
                    <div class="speakers-wrapper" style="text-align: center;">
                        <img src="{{ asset('template/images/usdt.png') }}" class="img-responsive" alt="USDT"
                            style="margin: 0 auto;" />
                        <div class="speakers-thumb">
                            <h3>TASA USDT</h3>
                        </div>
                    </div>
                </div>

                <div class="item wow fadeInUp col-md-3 col-sm-3" data-wow-delay="0.6s">
                    <div class="speakers-wrapper" style="text-align: center;">
                        <img src="{{ asset('template/images/323273.png') }}" class="img-responsive" alt="PERU"
                            style="margin: 0 auto;" />
                        <div class="speakers-thumb">
                            <h3>TASA PERU</h3>
                        </div>
                    </div>
                </div>

                <div class="item wow fadeInUp col-md-3 col-sm-3" data-wow-delay="0.6s">
                    <div class="speakers-wrapper" style="text-align: center;">
                        <img src="{{ asset('template/images/COLOMBIA.png') }}" class="img-responsive" alt="COLOMBIA"
                            style="margin: 0 auto;" />
                        <div class="speakers-thumb">
                            <h3>TASA COLOMBIA</h3>
                            <h2>{{ '$10.000 = ' . (optional(App\Models\Tipos\TasaCambio::where('key', 'Colombia')->first())->valor ?? 'N/A') . ' Bs' }}
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="popupStatusForm" class="formPopup">
        <div id="dataGrid"></div>
    </div>
    
    <!-- =========================
            DETAIL SECTION
        ============================== -->
    @include('dash.form')

    <!-- =========================
            CONTACT SECTION
        ============================== -->
    <section id="contact" class="parallax-section">
        <div class="container" data-wow-delay="0.6s">
            <p class="elegirIntergiros">¿POR QUÉ ELEGIR {site}?</p>
            <center>
                <p><b> Dos razones importantes para elegirnos.</b></p>
            </center>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-6" data-wow-delay="0.3s" style="width: 100%;">
                                <div class="contact_des">
                                    <h2 class="elegirIntergiros1">1. Rapidez en su Envío</h2>

                                    <p class="elegirIntergiros1p">
                                        Comprendemos lo importante que es para usted tener el efectivo
                                        en su cuenta bancaria. Recibido su envío, y una vez verificado;
                                        lo procesaremos inmediatamente. Si dispone de cuenta en los
                                        bancos que tenemos disponible en el día, su dinero se reflejará
                                        mucho más rápido.
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-6" data-wow-delay="0.3s" style="text-align: center; width: 100%;">
                                <img class="happi" src="{{ asset('template/images/happiness.png') }}"
                                    style="margin-left: 0px;" />
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-6" data-wow-delay="0.3s" style="width: 100%;">
                                <div class="contact_des">
                                    <h2 class="elegirIntergiros1">2. Súper Tasa</h2>

                                    <p class="elegirIntergiros1p">
                                        Nuestra tasa es de las mejores en el mercado. No tenemos tarifas
                                        o comisiones escondidas. Puede usar el formulario de pedido de
                                        bolívares, y obtener el monto justo que pagar para enviar la
                                        cantidad de dinero que usted necesita.
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-6" data-wow-delay="0.3s" style="text-align: center; width: 100%;">
                                <img class="dinero"
                                    src="{{ asset('template/images/intergiros-envios-de-dinero-250x250.png') }}"
                                    style="margin-left: 0px; margin-top: 80px;" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- =========================
            FOOTER SECTION
        ============================== -->
    @include('dash.footer')

    <!-- Back top -->
    <a href="#back-top" class="go-top"><i class="fa fa-angle-up"></i></a>
@endsection
@section('script')
    <script src="{{ asset('js/transPrincipalForm/index.js') }}"></script>
    <script src="{{ asset('js/transPrincipalForm/payments.js') }}"></script>
@endsection

@extends('layouts.main')

@section('content')
    <div class="preloader">
        <div class="sk-rotating-plane"></div>
    </div>

    @include('dash.nav')
    <div class="carousel fade-carousel slide" data-ride="carousel" data-interval="30000" id="bs-carousel">
        <!-- Overlay -->
        <div class="overlay"></div>

        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#bs-carousel" data-slide-to="0" class="active"></li>
            <li data-target="#bs-carousel" data-slide-to="1"></li>
            <li data-target="#bs-carousel" data-slide-to="6"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item slides active">
                <img src="{{ asset('template/images/slider/img_6.jpg') }}" class="img-responsive" alt="" style="width: 100%;">
                <div class="hero">
                    <hgroup></hgroup>
                </div>
            </div>
            <div class="item slides">
                <div class="slide-6"></div>
                <div class="hero">
                    <hgroup></hgroup>
                </div>
                <div class="row justify-content-md-center">
                    <div id="owl-speakers" class="owl-carousel custom-tasas">
                        <div class="item wow fadeInUp type" data-wow-delay="0.6s">
                            <div class="speakers-wrapper" style="text-align: center;">
                                <img src="{{ asset('template//images/paypal.png') }}" class="img-responsive" alt="paypal"
                                    style="margin: 0 auto;" />
                                <div class="speakers-thumb">
                                    <h3>TASA PAYPAL</h3>
                                    <h2>{{ 'US $1.00 = ' . (optional(App\Models\Tipos\TasaCambio::where('key', '1')->first())->valor ?? 'N/A') . ' Bs' }}
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <div class="item wow fadeInUp type" data-wow-delay="0.6s">
                            <div class="speakers-wrapper" style="text-align: center;">
                                <img src="{{ asset('template/images/skrill.png') }}" class="img-responsive" alt="skrill"
                                    style="margin: 0 auto;" />
                                <div class="speakers-thumb">
                                    <h3>TASA SKRILL</h3>
                                    <h2>{{ 'US $1.00 = ' . (optional(App\Models\Tipos\TasaCambio::where('key', '2')->first())->valor ?? 'N/A') . ' Bs' }}
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <div class="item wow fadeInUp type" data-wow-delay="0.9s">
                            <div class="speakers-wrapper" style="text-align: center;">
                                <img src="{{ asset('template/images/zinli.png') }}" class="img-responsive" alt="ZINLI"
                                    style="margin: 0 auto;" />
                                <div class="speakers-thumb">
                                    <h3>TASA ZINLI</h3>
                                    <h2>{{ 'US $1.00 = ' . (optional(App\Models\Tipos\TasaCambio::where('key', '8')->first())->valor ?? 'N/A') . ' Bs' }}
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <div class="item wow fadeInUp type" data-wow-delay="0.6s">
                            <div class="speakers-wrapper" style="text-align: center;">
                                <img src="{{ asset('template/images/usdt.png') }}" class="img-responsive" alt="USDT"
                                    style="margin: 0 auto;" />
                                <div class="speakers-thumb">
                                    <h3>TASA USDT</h3>
                                    <h2>{{ 'US $1.00 = ' . (optional(App\Models\Tipos\TasaCambio::where('key', '4')->first())->valor ?? 'N/A') . ' Bs' }}
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <div class="item wow fadeInUp type" data-wow-delay="0.6s">
                            <div class="speakers-wrapper" style="text-align: center;">
                                <img src="{{ asset('template/images/323273.png') }}" class="img-responsive" alt="PERU"
                                    style="margin: 0 auto;" />
                                <div class="speakers-thumb">
                                    <h3>TASA PERU</h3>
                                    <h2>{{ 'SOL $1.00 = ' . (optional(App\Models\Tipos\TasaCambio::where('key', '5')->first())->valor ?? 'N/A') . ' Bs' }}
                                    </h2>
                                    <h2>{{ 'US $1.00 = ' . (optional(App\Models\Tipos\TasaCambio::where('key', '6')->first())->valor ?? 'N/A') . ' Bs' }}
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <div class="item wow fadeInUp type" data-wow-delay="0.6s">
                            <div class="speakers-wrapper" style="text-align: center;">
                                <img src="{{ asset('template/images/COLOMBIA.png') }}" class="img-responsive"
                                    alt="COLOMBIA" style="margin: 0 auto;" />
                                <div class="speakers-thumb">
                                    <h3>TASA COLOMBIA</h3>
                                    <h2>{{ '$10.000 = ' . (optional(App\Models\Tipos\TasaCambio::where('key', '7')->first())->valor ?? 'N/A') . ' Bs' }}
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section id="overview" class="parallax-section">
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
        </div>
    </section>

    <div id="popupStatusForm" class="formPopup">
        <div id="dataGrid"></div>
    </div>

    @include('dash.form')



    @include('dash.footer')

    <!-- Back top -->
    <a href="#back-top" class="go-top"><i class="fa fa-angle-up"></i></a>
@endsection
@section('script')
    <script src="{{ asset('js/general/index.js') }}"></script>
    <script src="{{ asset('js/transPrincipalForm/index.js') }}"></script>
    <script src="{{ asset('js/transPrincipalForm/payments.js') }}"></script>
@endsection

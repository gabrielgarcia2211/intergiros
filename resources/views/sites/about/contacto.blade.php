@extends('layouts.main')

@section('content')
    <!-- PRE LOADER -->
    <div class="preloader">
        <div class="sk-rotating-plane"></div>
    </div>

    <!-- NAVIGATION LINKS -->
    @include('dash.nav')

    <section id="overview" class="parallax-section">
        <div class="container">
            <center>
                <div class="contactanos">
                    <br />
                    <h2>CONTACTANOS</h2>
                </div>
            </center>
        </div>
    </section>
    <center>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 mt-5">
                    <ul class="social-icon">
                        <li>
                            <img src="{{ asset('template/images/face.png') }}" width="40px" />
                            <a href="https://www.facebook.com/Interrappi.co">@interrappi.co</a>
                        </li>&nbsp; &nbsp;
                        <li>
                            <img src="{{ asset('template/images/inst.png') }}" width="40px" />
                            <a href="https://www.instagram.com/interrappi/">@interrappi.co</a>
                        </li>&nbsp; &nbsp;
                        <li>
                            <img src="{{ asset('template/images/Youtube_logo.png') }}" width="40px" />
                            <a href="https://www.youtube.com/@Interrappi">@interrappi</a>
                        </li>
                    </ul>
                </div>
                </div>
            </div>
        </div>
    </center>

    <!-- Back top -->
    <a href="#back-top" class="go-top"><i class="fa fa-angle-up"></i></a>
@endsection

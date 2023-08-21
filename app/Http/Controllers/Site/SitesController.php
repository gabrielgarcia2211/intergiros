<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SitesController extends Controller
{

    public function home()
    {
        return view('home.index');
    }

    public function login()
    {
        return view('home.inicioSesion');
    }

    public function registro()
    {
        return view('home.registro');
    }

    public function index()
    {
        return view('welcome');
    }

    public function index_bolivares_peru_ven()
    {
        return view('sites.peru.bolivaresPeruVen');
    }

    public function index_cam_pay_peru()
    {
        return view('sites.peru.camPayPeru');
    }

    public function index_bolivares_col_ven()
    {
        return view('sites.colombia.bolivaresColVen');
    }

    public function index_verificar_paypal()
    {
        return view('sites.about.verificarPaypal');
    }

    public function index_otros_servicios()
    {
        return view('sites.about.otrosServicios');
    }

    public function index_contacto()
    {
        return view('sites.about.contacto');
    }

    public function index_politicas()
    {
        return view('sites.about.politicas');
    }
}

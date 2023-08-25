<?php

namespace App\Http\Controllers\Tipos;

use App\Models\Tipos\Estado;
use App\Http\Controllers\Controller;

class EstadoController extends Controller
{
    public function getEstados()
    {
        return Estado::select('id', 'descripcion')->with(Estado::RELATION_SHIPS)->distinct()->get();
    }
}

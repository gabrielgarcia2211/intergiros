<?php

namespace App\Http\Controllers\Convertidor;

use Illuminate\Http\Request;
use App\Models\Tipos\TasaCambio;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ResponseController as Response;


class ConvertidorController extends Controller
{

    public function getTasaConvert(Request $request)
    {
        if (!empty($request->input('tasa'))  && !empty($request->input('monto'))) {
            $tasa = $request->input('tasa');
            $response = TasaCambio::where('key', $tasa)->first();
            if (empty($response)) {
                return false;
            } else if ($tasa == 'PayPal') {
                $monto = $request->input('monto');
                // Calculamos la comisión
                $comision_fija = 0.3;
                $comision = (($monto + $comision_fija) * 100) / 94.6;
                $monto_a_recibir = $monto * $response->valor;
                return Response::sendResponse(['monto_a_pagar' => round($comision, 2), 'monto_a_recibir' => $monto_a_recibir]);
            }
        }

        return Response::sendResponse(false, 'No hay informacion');
    }
}

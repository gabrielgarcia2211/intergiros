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
            $response = TasaCambio::with('tipo_entidad')
                ->where('key', $tasa)
                ->first();
            if (empty($response)) {
                return false;
            } else if ($response->tipo_entidad->descripcion == 'PayPal') {
                $monto = $request->input('monto');
                $comision_fija = 0.3;
                $comision = (($monto + $comision_fija) * 100) / 94.6;
                $monto_a_recibir = $monto * $response->valor;
                return Response::sendResponse(['monto_a_pagar' => round($comision, 2), 'monto_a_recibir' => $monto_a_recibir]);
            } else if ($response->tipo_entidad->descripcion == 'Skrill') {
                $monto = $request->input('monto');
                $comision = $monto * $response->valor;
                return Response::sendResponse(['monto_a_recibir' => number_format($comision, 2, '.', ',')]);
            } else if ($response->tipo_entidad->descripcion == 'Bitcoin') {
                $monto = $request->input('monto');
                $comision = $monto * $response->valor;
                return Response::sendResponse(['monto_a_recibir' => number_format($comision, 2, '.', ',')]);
            } else if ($response->tipo_entidad->descripcion == 'Tehther') {
                $monto = $request->input('monto');
                $comision = $monto * $response->valor;
                return Response::sendResponse(['monto_a_recibir' => number_format($comision, 2, '.', ',')]);
            } else if ($response->tipo_entidad->descripcion == 'PeruDolar') {
                $monto = $request->input('monto');
                $comision = $monto * $response->valor;
                return Response::sendResponse(['monto_a_recibir' => number_format($comision, 2, '.', ',')]);
            } else if ($response->tipo_entidad->descripcion == 'PeruSol') {
                $monto = $request->input('monto');
                $comision = $monto * $response->valor;
                return Response::sendResponse(['monto_a_recibir' => number_format($comision, 2, '.', ',')]);
            } else if ($response->tipo_entidad->descripcion == 'ColombiaBolivar') {
                $monto = $request->input('monto');
                $comision = $monto * $response->valor;
                return Response::sendResponse(['monto_a_recibir' => number_format($comision, 2, '.', ',')]);
            } else if ($response->tipo_entidad->descripcion == 'Zinli') {
                $monto = $request->input('monto');
                $comision = $monto * $response->valor;
                return Response::sendResponse(['monto_a_recibir' => number_format($comision, 2, '.', ',')]);
            }
        }

        return Response::sendResponse(false, 'No hay informacion');
    }
}

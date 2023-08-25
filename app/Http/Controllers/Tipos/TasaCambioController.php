<?php

namespace App\Http\Controllers\Tipos;

use App\Models\Tipos\TasaCambio;
use App\Http\Controllers\Controller;
use App\Repositories\Tipo\TasaCambioRepository;
use App\Http\Controllers\ResponseController as Response;
use App\Http\Requests\TasaCambio\StoreTasaCambioRequest;
use App\Http\Requests\TasaCambio\UpdateTasaCambioRequest;

class TasaCambioController extends Controller
{

    public function index()
    {
        return view('');
    }

    public function getTasas()
    {
        return TasaCambio::query()->with(TasaCambio::RELATION_SHIPS)->distinct()->get();
    }

    public function store(StoreTasaCambioRequest $request)
    {
        try {
            $data = TasaCambioRepository::create($request->input());
            return Response::sendResponse($data, 'Registro guardado con exito.');
        } catch (\Exception $ex) {
            return Response::sendError('Ocurrio un error inesperado al intentar procesar la solicitud', 500);
        }
    }

    public function show($id)
    {
        return Response::sendResponse(TasaCambioRepository::getByID($id) ?? []);
    }

    public function update(UpdateTasaCambioRequest $request, TasaCambio $TasaCambio)
    {
        try {
            $data = TasaCambioRepository::update($TasaCambio,  $request->input());
            return Response::sendResponse($data, 'Registro actualizado con exito.');
        } catch (\Exception $ex) {
            return Response::sendError('Ocurrio un error inesperado al intentar procesar la solicitud', 500);
        }
    }

    public function destroy(TasaCambio $TasaCambio)
    {
        return Response::sendResponse(TasaCambioRepository::delete($TasaCambio), 'Recurso eliminado con exito');
    }
}

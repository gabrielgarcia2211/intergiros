<?php

namespace App\Http\Controllers\Formularios;

use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Formularios\Formulario;
use Illuminate\Support\Facades\Schema;
use App\Repositories\Formulario\FormularioRepository;
use App\Http\Controllers\ResponseController as Response;
use App\Http\Requests\Formularios\StoreFormularioRequest;
use App\Http\Requests\Formularios\UpdateFormularioRequest;

class FormularioController extends Controller
{

    public function index()
    {
        return view('');
    }

    public function getFormularios()
    {
        return Formulario::query()->with(Formulario::RELATION_SHIPS)->distinct()->get();
    }

    public function store(StoreFormularioRequest $request)
    {
        
        try {

            $response = mapFormPayPal($request->all());
            $response['id_moneda'] = 1;
            $response['id_entidad'] = 1;
            $response['id_formulario'] = 1;
            $response['id_user'] = Auth::user()->id;
            $response['id_estado'] = 1;

            $data = FormularioRepository::create($response);

            return Response::sendResponse($data, "Registro guardado con exito.");
        } catch (\Exception $ex) {
            Log::debug($ex->getMessage());
            return Response::sendError("Ocurrio un error inesperado al intentar procesar la solicitud", 500);
        }
    }

    public function show($id)
    {
        return Response::sendResponse(FormularioRepository::getByID($id) ?? []);
    }

    public function update(UpdateFormularioRequest $request, Formulario $Formulario)
    {
        try {
            $data = FormularioRepository::update($Formulario, $request->input());

            return Response::sendResponse($data, "Registro actualizado con exito.");
        } catch (\Exception $ex) {
            return Response::sendError("Ocurrio un error inesperado al intentar procesar la solicitud", 500);
        }
    }

    public function destroy(Formulario $Formulario)
    {
        return Response::sendResponse(FormularioRepository::delete($Formulario), "Recurso eliminado con exito");
    }
}

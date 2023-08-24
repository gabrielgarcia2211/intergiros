<?php

namespace App\Http\Controllers\Formularios;

use App\Services\FileService;
use App\Models\Tipos\TipoMoneda;
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

    protected $fileService;

    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }

    public function index()
    {
        return view('');
    }

    public function getFormularios()
    {
        return Formulario::query()->with(Formulario::RELATION_SHIPS)->distinct()->get();
    }

    public function getFormulariosUser()
    {
        return Formulario::query()->where('id_user', Auth::user()->id)->with(Formulario::RELATION_SHIPS)->distinct()->get();
    }

    public function store(StoreFormularioRequest $request)
    {
        try {
            $response = mapForm($request->all());
            $tipoPago = mapTasaPay($response['tasa']);
            if (empty($tipoPago)) {
                return Response::sendError('No esta habilitado el servicio seleccionado', 500);
            }

            $response['id_moneda'] = TipoMoneda::where('tipo', $response['id_moneda'])->first()->id;
            $response['id_entidad'] = $tipoPago[1];
            $response['id_formulario'] = $tipoPago[0];
            $response['id_user'] = Auth::user()->id;
            $response['id_estado'] = 1;
            unset($response['tasa']);

            if (isset($response['imagen_comprobante']) && !empty($response['imagen_comprobante'])) {
                $file = $response['imagen_comprobante'];
                $path = $this->fileService->saveFile($file);
                $response['imagen_comprobante'] = $path;
            }

            $data = FormularioRepository::create($response);
            return Response::sendResponse($data, 'Registro guardado con exito.');
        } catch (\Exception $ex) {
            Log::debug($ex->getMessage());
            if (isset($path)) {
                $this->fileService->deleteFile($file);
            }
            return Response::sendError('Ocurrio un error inesperado al intentar procesar la solicitud', 500);
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

            return Response::sendResponse($data, 'Registro actualizado con exito.');
        } catch (\Exception $ex) {
            return Response::sendError('Ocurrio un error inesperado al intentar procesar la solicitud', 500);
        }
    }

    public function destroy(Formulario $Formulario)
    {
        return Response::sendResponse(FormularioRepository::delete($Formulario), 'Recurso eliminado con exito');
    }
}

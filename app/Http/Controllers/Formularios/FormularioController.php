<?php

namespace App\Http\Controllers\Formularios;

use Illuminate\Http\Request;
use App\Services\FileService;
use App\Mail\NotificationEmail;
use App\Models\Tipos\TipoMoneda;
use App\Exports\FormularioExport;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Formularios\Formulario;
use App\Repositories\Formulario\FormularioRepository;
use App\Http\Controllers\ResponseController as Response;
use App\Http\Requests\Formularios\StoreFormularioRequest;
use App\Http\Requests\Formularios\UpdateFormularioRequest;
use App\Models\Tipos\Estado;

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

    public function getFormularios(Request $request)
    {
        $query = Formulario::query();

        switch (true) {
            case ($request->has('sort') && !empty($request->input('sort'))):
            case ($request->has('filter') && !empty($request->input('filter'))):
                $query->leftJoin('tipo_moneda', 'tipo_moneda.id', '=', 'formulario.id_moneda')
                    ->leftJoin('tipo_entidad', 'tipo_entidad.id', '=', 'formulario.id_entidad')
                    ->leftJoin('tipo_formulario', 'tipo_formulario.id', '=', 'formulario.id_formulario')
                    ->leftJoin('users', 'users.id', '=', 'formulario.id_user');
                break;
        }

        return setDataGrid($query, $request, Formulario::RELATION_SHIPS, 'formulario.*', [], 'desc');
    }

    public function getFormulariosUser()
    {
        return Formulario::query()->where('id_user', Auth::user()->id)->with(Formulario::RELATION_SHIPS)->orderBy('id', 'desc')->distinct()->get();
    }

    public function store(StoreFormularioRequest $request)
    {
        try {
            $response = mapForm($request->all());
            $tipoPago = mapTasaPay($response['tasa']);
            $userEmail = Auth::user()->email;
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

            $updatedForm = FormularioRepository::getByID($data->id)->toArray();

            // Enviar Correo - $userEmail
            Mail::to($userEmail)->send(new NotificationEmail($updatedForm));
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
            $response = $request->all();
            if (isset($response['is_delete']) && !empty($response['is_delete'])) {
                if ($response['is_delete'] && empty($response['archivo'])) {
                    $file = basename(Formulario::find($Formulario['id'])->archivo);
                    $this->fileService->deleteFile($file);
                } else {
                    $path = $this->fileService->saveFile($response['archivo']);
                    $response['archivo'] = $path;
                }
                unset($response['is_delete']);
            }
            $data = FormularioRepository::update($Formulario, $response);
            if (isset($response['notification'])) {
                $updatedForm = FormularioRepository::getByID($Formulario->id)->toArray();
                $updatedForm['color_estado'] = getColorStatus($updatedForm['id_estado']);
                // Enviar Correo - $userEmail
                Mail::to($updatedForm['email'])->send(new NotificationEmail($updatedForm));
            }
            return Response::sendResponse($data, 'Registro actualizado con exito.');
        } catch (\Exception $ex) {
            Log::debug($ex->getMessage());
            if (isset($path)) {
                $this->fileService->deleteFile($file);
            }
            return Response::sendError('Ocurrio un error inesperado al intentar procesar la solicitud', 500);
        }
    }

    public function destroy(Formulario $Formulario)
    {
        return Response::sendResponse(FormularioRepository::delete($Formulario), 'Recurso eliminado con exito');
    }

    public function getCantForms()
    {
        return FormularioRepository::getFormCountByStates();
    }

    public function export()
    {
        try {
            $data = Formulario::query()->with(Formulario::RELATION_SHIPS)->orderBy('id', 'desc')->distinct()->get()->toArray();
            return Excel::download(new FormularioExport($data), now() . '_reporte.xlsx');
        } catch (\Exception $ex) {
            return Response::sendError('Ocurrio un error inesperado al intentar procesar la solicitud', 500);
        }
    }
}

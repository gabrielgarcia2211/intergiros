<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Beneficiarios\Beneficiario;
use App\Repositories\Users\BeneficiarioRepository;
use App\Http\Controllers\ResponseController as Response;
use App\Http\Requests\Beneficiarios\StoreBeneficiarioRequest;
use Illuminate\Support\Facades\Auth;

class BeneficiarioController extends Controller
{

    public function index()
    {
        return view('');
    }

    public function getBenficiario()
    {
        return Beneficiario::query()->with(Beneficiario::RELATION_SHIPS)->where('id_user', Auth::user()->id)->distinct()->get();
    }

    public function store(StoreBeneficiarioRequest $request)
    {
        try {
            $request['id_user'] = Auth::user()->id;
            $data = BeneficiarioRepository::create($request->input());
            return Response::sendResponse($data, "Registro guardado con exito.");
        } catch (\Exception $ex) {
            return Response::sendError("Ocurrio un error inesperado al intentar procesar la solictud.", 500);
        }
    }

    public function show($id)
    {
        return Response::sendResponse(BeneficiarioRepository::getByID($id) ?? []);
    }

    public function destroy(Beneficiario $Beneficiario)
    {
        return Response::sendResponse(BeneficiarioRepository::delete($Beneficiario), "Recurso eliminado con exito");
    }
}

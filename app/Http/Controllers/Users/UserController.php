<?php

namespace App\Http\Controllers\Users;

use App\Models\User;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Repositories\Users\UserRepository;
use App\Http\Requests\Users\StoreUserRequest;
use App\Http\Requests\Users\UpdateUserRequest;
use App\Http\Controllers\ResponseController as Response;


class UserController extends Controller
{

    public function index()
    {
        return view('');
    }

    public function getUsers()
    {
        return User::query()->with(User::RELATION_SHIPS)->distinct()->get();
    }

    public function store(StoreUserRequest $request)
    {
        try {
            UserRepository::create($request->input());
            Alert::success('Éxito', 'Usuario creado correctamente.');
            return redirect()->route('site.welcome');
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            Alert::success('Error', 'Se ha producido un error inesperado.');
            return redirect()->back();
        }
    }

    public function show($id)
    {
        return Response::sendResponse(UserRepository::getByID($id) ?? []);
    }

    public function update(UpdateUserRequest $request, User $User)
    {
        try {
            $data = UserRepository::update($User, $request->input());

            return Response::sendResponse($data, "Registro actualizado con exito.");
        } catch (\Exception $ex) {
            return Response::sendError("Ocurrio un error inesperado al intentar procesar la solicitud", 500);
        }
    }

    public function destroy(User $User)
    {
        return Response::sendResponse(UserRepository::delete($User), "Recurso eliminado con exito");
    }
}

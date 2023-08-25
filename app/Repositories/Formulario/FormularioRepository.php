<?php

namespace App\Repositories\Formulario;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Formularios\Formulario;


class FormularioRepository
{
    public static function create($data)
    {
        return Formulario::create($data);
    }

    public static function getAll()
    {
        return Formulario::with(Formulario::RELATION_SHIPS)->get();
    }

    public static function getByID($id)
    {
        return Formulario::with(Formulario::RELATION_SHIPS)->find($id);
    }

    public static function getOneByWhere($where)
    {
        return Formulario::with(Formulario::RELATION_SHIPS)->where($where)->first();
    }

    public static function getAllByWhere($where)
    {
        return Formulario::with(Formulario::RELATION_SHIPS)->where($where)->get();
    }

    public static function update(Formulario $model, $data)
    {
        return $model->update($data);
    }

    public static function delete(Formulario $model)
    {
        return $model->delete();
    }

    public static function getFormCountByStates()
    {
        return Formulario::select('id_estado', DB::raw('COUNT(*) as count'))
            ->groupBy('id_estado')
            ->get();
    }
}
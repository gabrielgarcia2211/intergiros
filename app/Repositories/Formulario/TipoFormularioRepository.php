<?php

namespace App\Repositories\Formulario;

use App\Models\Formularios\TipoFormulario;


class TipoFormularioRepository
{
    public static function create($data)
    {
        return TipoFormulario::create($data);
    }

    public static function getAll()
    {
        return TipoFormulario::with(TipoFormulario::RELATION_SHIPS)->get();
    }

    public static function getByID($id)
    {
        return TipoFormulario::with(TipoFormulario::RELATION_SHIPS)->find($id);
    }

    public static function getOneByWhere($where)
    {
        return TipoFormulario::with(TipoFormulario::RELATION_SHIPS)->where($where)->first();
    }

    public static function getAllByWhere($where)
    {
        return TipoFormulario::with(TipoFormulario::RELATION_SHIPS)->where($where)->get();
    }

    public static function update(TipoFormulario $model, $data)
    {
        return $model->update($data);
    }

    public static function delete(TipoFormulario $model)
    {
        return $model->delete();
    }
}

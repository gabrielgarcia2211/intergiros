<?php

namespace App\Repositories\Tipo;

use App\Models\Tipos\TipoEntidad;


class TipoEntidadRepository
{
    public static function create($data)
    {
        return TipoEntidad::create($data);
    }

    public static function getAll()
    {
        return TipoEntidad::with(TipoEntidad::RELATION_SHIPS)->get();
    }

    public static function getByID($id)
    {
        return TipoEntidad::with(TipoEntidad::RELATION_SHIPS)->find($id);
    }

    public static function getOneByWhere($where)
    {
        return TipoEntidad::with(TipoEntidad::RELATION_SHIPS)->where($where)->first();
    }

    public static function getAllByWhere($where)
    {
        return TipoEntidad::with(TipoEntidad::RELATION_SHIPS)->where($where)->get();
    }

    public static function update(TipoEntidad $model, $data)
    {
        return $model->update($data);
    }

    public static function delete(TipoEntidad $model)
    {
        return $model->delete();
    }
}
<?php

namespace App\Repositories\Tipo;

use App\Models\Tipos\TipoMoneda;


class TipoMonedaRepository
{
    public static function create($data)
    {
        return TipoMoneda::create($data);
    }

    public static function getAll()
    {
        return TipoMoneda::with(TipoMoneda::RELATION_SHIPS)->get();
    }

    public static function getByID($id)
    {
        return TipoMoneda::with(TipoMoneda::RELATION_SHIPS)->find($id);
    }

    public static function getOneByWhere($where)
    {
        return TipoMoneda::with(TipoMoneda::RELATION_SHIPS)->where($where)->first();
    }

    public static function getAllByWhere($where)
    {
        return TipoMoneda::with(TipoMoneda::RELATION_SHIPS)->where($where)->get();
    }

    public static function update(TipoMoneda $model, $data)
    {
        return $model->update($data);
    }

    public static function delete(TipoMoneda $model)
    {
        return $model->delete();
    }
}

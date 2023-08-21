<?php

namespace App\Repositories\Tipo;

use App\Models\Tipos\Estado;


class EstadoRepository
{
    public static function create($data)
    {
        return Estado::create($data);
    }

    public static function getAll()
    {
        return Estado::with(Estado::RELATION_SHIPS)->get();
    }

    public static function getByID($id)
    {
        return Estado::with(Estado::RELATION_SHIPS)->find($id);
    }

    public static function getOneByWhere($where)
    {
        return Estado::with(Estado::RELATION_SHIPS)->where($where)->first();
    }

    public static function getAllByWhere($where)
    {
        return Estado::with(Estado::RELATION_SHIPS)->where($where)->get();
    }

    public static function update(Estado $model, $data)
    {
        return $model->update($data);
    }

    public static function delete(Estado $model)
    {
        return $model->delete();
    }
}
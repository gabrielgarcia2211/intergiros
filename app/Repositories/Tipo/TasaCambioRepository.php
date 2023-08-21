<?php

namespace App\Repositories\Tipo;

use App\Models\Tipos\TasaCambio;


class TasaCambioRepository
{
    public static function create($data)
    {
        return TasaCambio::create($data);
    }

    public static function getAll()
    {
        return TasaCambio::with(TasaCambio::RELATION_SHIPS)->get();
    }

    public static function getByID($id)
    {
        return TasaCambio::with(TasaCambio::RELATION_SHIPS)->find($id);
    }

    public static function getOneByWhere($where)
    {
        return TasaCambio::with(TasaCambio::RELATION_SHIPS)->where($where)->first();
    }

    public static function getAllByWhere($where)
    {
        return TasaCambio::with(TasaCambio::RELATION_SHIPS)->where($where)->get();
    }

    public static function update(TasaCambio $model, $data)
    {
        return $model->update($data);
    }

    public static function delete(TasaCambio $model)
    {
        return $model->delete();
    }
}
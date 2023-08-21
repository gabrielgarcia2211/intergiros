<?php

namespace App\Repositories\Formulario;

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
}
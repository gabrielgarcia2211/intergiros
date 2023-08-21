<?php

namespace App\Repositories\Users;

use App\Models\Beneficiarios\Beneficiario;

class BeneficiarioRepository
{
    public static function create($data)
    {
        return Beneficiario::create($data);
    }

    public static function getAll()
    {
        return Beneficiario::with(Beneficiario::RELATION_SHIPS)->get();
    }

    public static function getByID($id)
    {
        return Beneficiario::with(Beneficiario::RELATION_SHIPS)->find($id);
    }

    public static function getOneByWhere($where)
    {
        return Beneficiario::with(Beneficiario::RELATION_SHIPS)->where($where)->first();
    }

    public static function getAllByWhere($where)
    {
        return Beneficiario::with(Beneficiario::RELATION_SHIPS)->where($where)->get();
    }

    public static function update(Beneficiario $model, $data)
    {
        return $model->update($data);
    }

    public static function delete(Beneficiario $model)
    {
        return $model->delete();
    }
}

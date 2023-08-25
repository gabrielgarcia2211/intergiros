<?php

namespace App\Repositories\Users;

use App\Models\User;

class UserRepository
{
    public static function create($data)
    {
        $user = User::create($data);
        $user->assignRole('cliente');
        return $user;
    }

    public static function getAll()
    {
        return User::with(User::RELATION_SHIPS)->get();
    }

    public static function getByID($id)
    {
        return User::with(User::RELATION_SHIPS)->find($id);
    }

    public static function getOneByWhere($where)
    {
        return User::with(User::RELATION_SHIPS)->where($where)->first();
    }

    public static function getAllByWhere($where)
    {
        return User::with(User::RELATION_SHIPS)->where($where)->get();
    }

    public static function update(User $model, $data)
    {
        return $model->update($data);
    }

    public static function delete(User $model)
    {
        return $model->delete();
    }
}

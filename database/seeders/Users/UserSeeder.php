<?php

namespace Database\Seeders\Users;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    public function run()
    {

        $usuarios = [
            [
                'name' => 'Usuario Administrador',
                'email' => 'admin@example.com',
                'password' => Hash::make('admin123'),
                'identificacion' => 123456,
                'telefono' => 78900,
            ],
            [
                'name' => 'Usuario Normal',
                'email' => 'usuario_normal@example.com',
                'password' => Hash::make('user123'),
                'identificacion' => 123456,
                'telefono' => 78900,
            ],
            [
                'name' => 'Usuario Invitado',
                'email' => 'invitado@example.com',
                'password' => Hash::make('user123'),
                'identificacion' => 123456,
                'telefono' => 78900,
            ],
        ];

        foreach ($usuarios as $usuario) {
            $user = User::create($usuario);
            if ($user['name'] == 'Usuario Administrador') {
                $user->assignRole('admin');
            } else {
                $user->assignRole('cliente');
            }
        }
    }
}

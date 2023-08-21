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
                //'rol_id' => 1, // Supongamos que el ID del rol de administrador es 1
            ],
            [
                'name' => 'Usuario Normal',
                'email' => 'usuario_normal@example.com',
                'password' => Hash::make('user123'),
                'identificacion' => 123456,
                'telefono' => 78900,
                //'rol_id' => 2, // Supongamos que el ID del rol de usuario normal es 2
            ],
            [
                'name' => 'Usuario Invitado',
                'email' => 'invitado@example.com',
                'password' => Hash::make('user123'),
                'identificacion' => 123456,
                'telefono' => 78900,
                //'rol_id' => 2, // Supongamos que el ID del rol de invitado es 3
            ],
        ];

        foreach ($usuarios as $usuario) {
            User::create($usuario);
        }
    }
}

<?php

namespace Database\Seeders\Tipos;

use App\Models\Tipos\Estado;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EstadoSeeder extends Seeder
{
    public function run()
    {
        $estados = [
            ['descripcion' => 'Activo'],
            ['descripcion' => 'Pendiente'],
            ['descripcion' => 'Cerrado'],
        ];

        foreach ($estados as $estado) {
            Estado::create($estado);
        }
    }
}

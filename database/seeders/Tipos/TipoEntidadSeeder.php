<?php

namespace Database\Seeders\Tipos;

use Illuminate\Database\Seeder;
use App\Models\Tipos\TipoEntidad;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TipoEntidadSeeder extends Seeder
{

    public function run()
    {

        $tiposEntidad = [
            ['descripcion' => 'PayPal'],
            ['descripcion' => 'Skrill'],
            ['descripcion' => 'Bitcoin'],
            ['descripcion' => 'Tehther'],
            ['descripcion' => 'PeruSol'],
            ['descripcion' => 'PeruDolar'],
            ['descripcion' => 'ColombiaBolivar'],
        ];

        foreach ($tiposEntidad as $tipoEntidad) {
            TipoEntidad::create($tipoEntidad);
        }
    }
}

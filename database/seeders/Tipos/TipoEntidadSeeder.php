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
            ['descripcion' => 'USDT'],
            ['descripcion' => 'Perú'],
            ['descripcion' => 'Colombia'],
        ];

        foreach ($tiposEntidad as $tipoEntidad) {
            TipoEntidad::create($tipoEntidad);
        }
    }
}

<?php

namespace Database\Seeders\Tipos;

use Illuminate\Database\Seeder;
use App\Models\Tipos\TasaCambio;
use App\Models\Formularios\TipoFormulario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TasaCambioSeeder extends Seeder
{
    public function run()
    {
        TasaCambio::truncate();

        // Obtener IDs de tipos de formulario
        $tipoFormularioIds = TipoFormulario::pluck('id')->toArray();

        for ($i = 0; $i < 10; $i++) {
            TasaCambio::create([
                'valor' => rand(1, 100), // Valor de la tasa de cambio
                'key' => null, // Valor de la tasa de cambio
                'id_tipo_formulario' => $tipoFormularioIds[array_rand($tipoFormularioIds)],
            ]);
        }
    }
}

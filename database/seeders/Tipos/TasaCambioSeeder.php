<?php

namespace Database\Seeders\Tipos;

use Illuminate\Database\Seeder;
use App\Models\Tipos\TasaCambio;
use App\Models\Formularios\TipoFormulario;
use App\Models\Tipos\TipoEntidad;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TasaCambioSeeder extends Seeder
{
    public function run()
    {
        TasaCambio::truncate();

        // Obtener IDs de tipos de formulario
        $tipoFormularioIds = TipoFormulario::pluck('id')->toArray();
        $tipoEntidadIds = TipoEntidad::pluck('id')->toArray();

        for ($i = 0; $i < 8; $i++) {
            TasaCambio::create([
                'valor' => rand(1, 100), // Valor de la tasa de cambio
                'key' =>  $tipoEntidadIds[$i],
                'id_tipo_formulario' => $tipoFormularioIds[$i],
            ]);
        }
    }
}

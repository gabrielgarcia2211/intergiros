<?php

namespace Database\Seeders\Tipos;

use Illuminate\Database\Seeder;
use App\Models\Tipos\TipoMoneda;

class TipoMonedaSeeder extends Seeder
{
    public function run()
    {

        $tiposMoneda = [
            ['codigo' => 'VES', 'tipo' => 'Bolivar', 'descripcion' => 'Moneda de Venezuela'],
            ['codigo' => 'CNY', 'tipo' => 'Yuan chino', 'descripcion' => 'Moneda de China'],
        ];

        foreach ($tiposMoneda as $tipoMoneda) {
            TipoMoneda::create($tipoMoneda);
        }
    }
}

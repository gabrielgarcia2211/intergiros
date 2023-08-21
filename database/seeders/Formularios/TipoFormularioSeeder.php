<?php

namespace Database\Seeders\Formularios;

use Illuminate\Database\Seeder;
use App\Models\Formularios\TipoFormulario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TipoFormularioSeeder extends Seeder
{

    public function run(): void
    {
        $tiposFormulario = [
            'Formulario de Paypal',
        ];

        foreach ($tiposFormulario as $index => $descripcion) {
            TipoFormulario::create([
                'descripcion' => $descripcion . ' ' . rand(0, 9),
            ]);
        }
    }
}

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
            'Formulario de Skrill',
            'Formulario de Bitcoin',
            'Formulario de Tehther',
            'Formulario de Peru Sol',
            'Formulario de Peru Dolar',
            'Formulario de Colombia Bolivar',
        ];

        foreach ($tiposFormulario as $index => $descripcion) {
            TipoFormulario::create([
                'descripcion' => $descripcion,
            ]);
        }
    }
}

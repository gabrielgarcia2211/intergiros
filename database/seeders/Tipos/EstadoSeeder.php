<?php

namespace Database\Seeders\Tipos;

use App\Enums\EstadoType;
use App\Models\Tipos\Estado;
use Illuminate\Database\Seeder;

class EstadoSeeder extends Seeder
{
    public function run()
    {
        $estados = [
            ['descripcion' => EstadoType::PENDIENTE],
            ['descripcion' => EstadoType::EN_PROCESO],
            ['descripcion' => EstadoType::ENTREGADO],
            ['descripcion' => EstadoType::CANCELADO],
        ];

        foreach ($estados as $estado) {
            Estado::create($estado);
        }
    }
}

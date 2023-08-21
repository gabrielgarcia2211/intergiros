<?php

namespace Database\Seeders\Formularios;

use App\Models\User;
use App\Models\Tipos\Estado;
use Illuminate\Database\Seeder;
use App\Models\Tipos\TipoMoneda;
use App\Models\Tipos\TipoEntidad;
use App\Models\Formularios\Formulario;
use App\Models\Formularios\TipoFormulario;

class FormularioSeeder extends Seeder
{
    public function run()
    {
        $tipoMonedaIds = TipoMoneda::pluck('id')->toArray();
        $tipoEntidadIds = TipoEntidad::pluck('id')->toArray();
        $tipoFormularioIds = TipoFormulario::pluck('id')->toArray();
        $userIds = User::pluck('id')->toArray();
        $estadoIds = Estado::pluck('id')->toArray();

        for ($i = 0; $i < 10; $i++) {
            Formulario::create([
                'nombre_beneficiario' => 'Nombre Beneficiario ' . ($i + 1),
                'cedula_beneficiario' => '12345789' . ($i + 1),
                'banco_beneficiario' => 'Banco Beneficiario ' . ($i + 1),
                'telefono_beneficiario' => '123-456-7890',
                'nro_cuenta' => 'Cuenta ' . ($i + 1),
                'tipo_persona' => 'Natural', // O 'Jurídica'
                'tipo_cuenta' => 'Ahorros', // O 'Corriente'
                'monto_enviar' => rand(100, 1000),
                'imagen_comprobante' => 'imagen' . ($i + 1) . '.jpg',
                'terminos_comprobante' => true,
                'email_comprobante' => 'correo' . ($i + 1) . '@ejemplo.com',
                'archivo' => 'archivo' . ($i + 1) . '.pdf',
                'pais' => "COLOMBIA",
                'id_moneda' => $tipoMonedaIds[array_rand($tipoMonedaIds)],
                'id_entidad' => $tipoEntidadIds[array_rand($tipoEntidadIds)],
                'id_formulario' => $tipoFormularioIds[array_rand($tipoFormularioIds)],
                'id_user' => $userIds[array_rand($userIds)],
                'id_estado' => $estadoIds[array_rand($estadoIds)],
            ]);
        }
    }
}

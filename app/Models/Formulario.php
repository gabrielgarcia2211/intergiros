<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Formulario extends Model
{
    use HasFactory;

    protected $table = 'formulario';

    protected $fillable = [
        'nombre_beneficiario',
        'cedula_beneficiario',
        'banco_beneficiario',
        'telefono_beneficiario',
        'nro_cuenta',
        'tipo_persona',
        'tipo_cuenta',
        'monto_enviar',
        'imagen_comprobante',
        'terminos_comprobante',
        'email_comprobante',
        'id_moneda',
        'id_entidad',
        'id_formulario',
        'id_user',
        'id_estado',
        'archivo',
    ];
}

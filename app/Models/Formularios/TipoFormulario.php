<?php

namespace App\Models\Formularios;

use App\Models\Tipos\TasaCambio;
use App\Models\Formularios\Formulario;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TipoFormulario extends Model
{
    use HasFactory;

    protected $table = 'tipo_formulario';

    protected $fillable = [
        'descripcion',
    ];

    const RELATION_SHIPS = ['tasa_cambios', 'formulario'];

    public function tasa_cambios()
    {
        return $this->hasOne(TasaCambio::class, 'id_tipo_formulario');
    }

    public function formulario()
    {
        return $this->hasMany(Formulario::class, 'id_formulario');
    }
}

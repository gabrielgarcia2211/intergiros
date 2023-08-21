<?php

namespace App\Models\Tipos;

use App\Models\Formulario;
use Illuminate\Database\Eloquent\Model;
use App\Models\Formularios\TipoFormulario;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TasaCambio extends Model
{
    use HasFactory;

    protected $table = 'tasa_cambio';

    protected $fillable = [
        'valor',
        'key',
        'id_tipo_formulario',
    ];

    const RELATION_SHIPS = ['formulario', 'tipo_formulario'];

    public function formulario()
    {
        return $this->hasMany(Formulario::class, 'id_entidad');
    }

    public function tipo_formulario()
    {
        return $this->belongsTo(TipoFormulario::class);
    }
}

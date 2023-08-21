<?php

namespace App\Models\Tipos;

use App\Models\Formulario;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TipoEntidad extends Model
{
    use HasFactory;

    protected $table = 'tipo_entidad';

    protected $fillable = [
        'descripcion',
    ];

    const RELATION_SHIPS = ['formulario'];

    public function formulario()
    {
        return $this->hasMany(Formulario::class, 'id_entidad');
    }
}

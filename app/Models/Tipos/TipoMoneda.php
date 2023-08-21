<?php

namespace App\Models\Tipos;

use App\Models\Formulario;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TipoMoneda extends Model
{
    use HasFactory;

    protected $table = 'tipo_moneda';

    protected $fillable = [
        'tipo',
        'descripcion',
        'codigo',
    ];

    const RELATION_SHIPS = ['formulario'];

    public function formulario()
    {
        return $this->hasMany(Formulario::class, 'id_moneda');
    }
}

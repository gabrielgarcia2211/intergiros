<?php

namespace App\Models\Tipos;

use App\Models\Formulario;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Estado extends Model
{
    use HasFactory;

    protected $table = 'estado';

    protected $fillable = [
        'descripcion',
    ];

    const RELATION_SHIPS = ['formulario'];

    public function formulario()
    {
        return $this->hasMany(Formulario::class, 'id_estado');
    }
}

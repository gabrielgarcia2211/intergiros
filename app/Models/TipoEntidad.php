<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoEntidad extends Model
{
    use HasFactory;

    protected $table = 'tipo_entidad';

    protected $fillable = [
        'descripcion',
    ];
}

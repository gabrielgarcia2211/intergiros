<?php

namespace App\Models\Beneficiarios;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiario extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'cedula',
        'cuenta',
        'id_user'
    ];

    const RELATION_SHIPS = [];
}

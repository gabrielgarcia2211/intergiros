<?php

namespace App\Models\Formularios;

use Carbon\Carbon;
use App\Models\User;
use App\Enums\EstadoType;
use App\Models\Tipos\Estado;
use App\Models\Tipos\TipoMoneda;
use App\Models\Tipos\TipoEntidad;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Models\Formularios\TipoFormulario;
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
        'monto_convertido',
        'imagen_comprobante',
        'terminos_comprobante',
        'email_comprobante',
        'id_moneda',
        'id_entidad',
        'id_formulario',
        'id_user',
        'id_estado',
        'archivo',
        'pais',
    ];

    const RELATION_SHIPS = ['tipo_moneda', 'tipo_entidad', 'tipo_formulario', 'user', 'estado'];

    public function tipo_moneda()
    {
        return $this->belongsTo(TipoMoneda::class, 'id_moneda');
    }

    public function tipo_entidad()
    {
        return $this->belongsTo(TipoEntidad::class, 'id_entidad');
    }

    public function tipo_formulario()
    {
        return $this->belongsTo(TipoFormulario::class, 'id_formulario')->with('tasa_cambios');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class, 'id_estado');
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y H:i:s');
    }

    public function getIdEstadoAttribute($value)
    {
        switch ($value) {
            case 1:
                return EstadoType::PENDIENTE;
            case 2:
                return EstadoType::EN_PROCESO;
            case 3:
                return EstadoType::ENTREGADO;
            case 4:
                return EstadoType::CANCELADO;
            default:
                return 'Desconocido';
        }
    }

    public function getImagenComprobanteAttribute()
    {
        $disk = 'comprobante_disk';

        if ($this->attributes['imagen_comprobante']) {
            if (!Storage::disk($disk)->exists($this->attributes['imagen_comprobante'])) {
                return asset('img/no-image.png');
            }
            return Storage::disk($disk)->url($this->attributes['imagen_comprobante']);
        }

        return null;
    }

    public function getArchivoAttribute()
    {
        $disk = 'comprobante_disk';

        if ($this->attributes['archivo']) {
            if (!Storage::disk($disk)->exists($this->attributes['archivo'])) {
                return asset('img/no-image.png');
            }
            return Storage::disk($disk)->url($this->attributes['archivo']);
        }

        return null;
    }
}

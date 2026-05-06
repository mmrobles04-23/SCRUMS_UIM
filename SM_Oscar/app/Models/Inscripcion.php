<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inscripcion extends Model
{
    protected $table = 'inscripciones';

    protected $fillable = [
        'seminario_id',
        'congreso_id',
        'nombre_completo',
        'email',
        'tipo_usuario',
        'numero_cuenta',
        'motivo',
        'numero_registro'
    ];

    public function seminario(): BelongsTo
    {
        return $this->belongsTo(Seminario::class);
    }

    public function congreso(): BelongsTo
    {
        return $this->belongsTo(Congreso::class);
    }

    /**
     * Obtener el evento asociado (seminario o congreso)
     */
    public function evento(): Model|null
    {
        return $this->seminario ?? $this->congreso;
    }

    /**
     * Obtener el tipo de evento ('seminario' o 'congreso')
     */
    public function tipoEvento(): string
    {
        return $this->seminario_id ? 'seminario' : 'congreso';
    }

    /**
     * Verificar si es inscripción a seminario
     */
    public function esSeminario(): bool
    {
        return $this->seminario_id !== null;
    }

    /**
     * Verificar si es inscripción a congreso
     */
    public function esCongreso(): bool
    {
        return $this->congreso_id !== null;
    }
}

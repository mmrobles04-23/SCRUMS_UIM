<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    protected $table = 'inscripciones';

    protected $fillable = [
        'seminario_id',
        'nombre_completo',
        'email',
        'tipo_usuario',
        'numero_cuenta',
        'motivo',
        'numero_registro'
    ];

    public function seminario()
    {
        return $this->belongsTo(Seminario::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CongresoImagen extends Model
{
    protected $fillable = ['congreso_id', 'imagen_path', 'titulo', 'descripcion', 'orden'];

    public function congreso(): BelongsTo
    {
        return $this->belongsTo(Congreso::class);
    }
}

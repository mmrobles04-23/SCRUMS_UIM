<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Noticia extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'slug',
        'resumen',
        'contenido',
        'imagen_destacada',
        'estado',
        'fecha_publicacion',
        'autor_id',
    ];

    protected function casts(): array
    {
        return [
            'fecha_publicacion' => 'datetime',
        ];
    }

    public function autor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'autor_id');
    }

    public function scopePublicadas($query)
    {
        return $query->where('estado', 'publicado')->where('fecha_publicacion', '<=', now());
    }

    public function scopeRecientes($query, $limit = 5)
    {
        return $query->publicadas()->orderByDesc('fecha_publicacion')->limit($limit);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}

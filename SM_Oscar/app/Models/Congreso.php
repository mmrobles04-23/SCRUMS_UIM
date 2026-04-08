<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Congreso extends Model
{
    protected $table = 'congresos';

    protected $fillable = [
        'titulo',
        'slug',
        'resumen',
        'descripcion',
        'imagen_portada',
        'fecha_inicio',
        'fecha_fin',
        'sede',
        'enlace_inscripcion',
        'enlace_programa',
        'enlace_sitio_web',
        'activo',
    ];

    protected function casts(): array
    {
        return [
            'fecha_inicio' => 'date',
            'fecha_fin' => 'date',
            'activo' => 'boolean',
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /** URL pública de la portada o imagen por defecto (estilo propio: fallback en app). */
    public function urlPortada(): string
    {
        if ($this->imagen_portada && Storage::disk('public')->exists($this->imagen_portada)) {
            return Storage::disk('public')->url($this->imagen_portada);
        }

        return asset('dashboard/img1.jpg');
    }

    public function scopeActivos($query)
    {
        return $query->where('activo', true);
    }
}

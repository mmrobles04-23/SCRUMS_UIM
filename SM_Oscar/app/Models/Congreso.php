<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
        'cupo',
    ];

    protected function casts(): array
    {
        return [
            'fecha_inicio' => 'date',
            'fecha_fin' => 'date',
            'activo' => 'boolean',
            'cupo' => 'integer',
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /** URL pública de la portada o imagen por defecto (estilo propio: fallback en app). */
    public function urlPortada(): string
    {
        if ($this->imagen_portada && file_exists(public_path($this->imagen_portada))) {
            return asset($this->imagen_portada);
        }

        return asset('dashboard/img1.jpg');
    }

    public function scopeActivos($query)
    {
        return $query->where('activo', true);
    }

    public function scopeProximosAVencer($query, int $dias = 30)
    {
        return $query->where('activo', true)
            ->where('fecha_fin', '>=', now())
            ->where('fecha_fin', '<=', now()->addDays($dias))
            ->orderBy('fecha_fin');
    }

    public function imagenes()
    {
        return $this->hasMany(CongresoImagen::class)->orderBy('orden');
    }

    public function inscripciones()
    {
        return $this->hasMany(Inscripcion::class);
    }

    /**
     * Verificar si hay cupo disponible
     */
    public function hayCupo(): bool
    {
        if ($this->cupo === null || $this->cupo === 0) {
            return true;
        }
        return $this->inscripciones()->count() < $this->cupo;
    }

    /**
     * Obtener cantidad de inscritos
     */
    public function totalInscritos(): int
    {
        return $this->inscripciones()->count();
    }
}

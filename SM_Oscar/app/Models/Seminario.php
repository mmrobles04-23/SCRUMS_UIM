<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Seminario extends Model
{
    use HasFactory;

    protected $table = 'seminarios';

    protected $fillable = [
        'titulo',
        'categoria',
        'slug',
        'descripcion',
        'ponente',
        'institucion_ponente',
        'fecha_inicio',
        'fecha_fin',
        'lugar',
        'imagen_banner',
        'enlace_material',
        'estado',
        'departamento_id',
        'cupo',
    ];

    protected function casts(): array
    {
        return [
            'fecha_inicio' => 'datetime',
            'fecha_fin' => 'datetime',
        ];
    }

    public function departamento(): BelongsTo
    {
        return $this->belongsTo(Departamento::class);
    }

    public function inscripciones()
    {
        return $this->hasMany(Inscripcion::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function scopePublicados($query)
    {
        return $query->where('estado', 'publicado');
    }

    public function scopeProximos($query)
    {
        return $query->where('fecha_inicio', '>=', now())->orderBy('fecha_inicio');
    }

    public function urlBanner(): string
    {
        if ($this->imagen_banner && file_exists(public_path($this->imagen_banner))) {
            return asset($this->imagen_banner);
        }
        return asset('dashboard/img1.jpg');
    }
}

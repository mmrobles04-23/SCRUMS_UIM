<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory, \App\Traits\Auditable;

    protected $table = 'departamentos';

    protected $fillable = [
        'siglas',
        'nombre',
        'color',
        'logo',
        'icono',
        'descripcion',
        'objetivo',
        'imagen_banner',
        'coordinador',
        'imagen_coordinador',
        'cargo_coordinador',
        'oficina',
        'email_contacto',
        'telefono',
        'activo',
        'orden',
    ];

    protected function casts(): array
    {
        return [
            'activo' => 'boolean',
            'orden' => 'integer',
        ];
    }

    public function scopeActivos($query)
    {
        return $query->where('activo', true);
    }

    public function scopeOrdenados($query)
    {
        return $query->orderBy('orden')->orderBy('nombre');
    }

    public function funciones()
    {
        return $this->hasMany(FuncionDepartamento::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FuncionDepartamento extends Model
{
    protected $table = 'funciones_departamento';

    protected $fillable = ['departamento_id', 'descripcion'];

    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }
}

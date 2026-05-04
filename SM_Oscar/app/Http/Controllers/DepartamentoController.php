<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\View\View;

class DepartamentoController extends Controller
{
    public function show(string $siglas): View
    {
        $departamentos = Departamento::activos()->ordenados()->get();
        $deptoActivo = Departamento::where('siglas', $siglas)->where('activo', true)->firstOrFail();

        return view('departamento', compact('departamentos', 'deptoActivo'));
    }
}

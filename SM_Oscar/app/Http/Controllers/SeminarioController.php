<?php

namespace App\Http\Controllers;

use App\Models\Seminario;
use App\Models\Departamento;
use Illuminate\View\View;

class SeminarioController extends Controller
{
    public function index(): View
    {
        $seminarios = Seminario::with('departamento')
            ->publicados()
            ->orderBy('fecha_inicio')
            ->get();

        $departamentos = Departamento::activos()->ordenados()->get();

        return view('investigacion', compact('seminarios', 'departamentos'));
    }
}

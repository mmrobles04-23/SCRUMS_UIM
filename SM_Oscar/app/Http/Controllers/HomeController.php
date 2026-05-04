<?php

namespace App\Http\Controllers;

use App\Models\Congreso;
use App\Models\Departamento;
use App\Models\Setting;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function welcome(): View
    {
        $congresos = Congreso::query()
            ->activos()
            ->orderByDesc('fecha_inicio')
            ->orderByDesc('created_at')
            ->get();

        // Cargar todos los settings de welcome de una sola vez
        $settings = Setting::where('group', 'welcome')->get()->keyBy('key')->map(fn($s) => $s->value);

        // Departamentos activos para la sección de departamentos
        $departamentosLista = Departamento::activos()->ordenados()->limit(7)->get();

        return view('welcome', compact('congresos', 'settings', 'departamentosLista'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Congreso;
use App\Models\Departamento;
use App\Models\Seminario;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'usuarios' => User::count(),
            'usuarios_activos' => User::where('active', true)->count(),
            'congresos' => Congreso::count(),
            'congresos_activos' => Congreso::activos()->count(),
            'departamentos' => Departamento::count(),
            'departamentos_activos' => Departamento::activos()->count(),
            'seminarios' => Seminario::count(),
            'seminarios_publicados' => Seminario::publicados()->count(),
            'seminarios_proximos' => Seminario::publicados()->proximos()->count(),
        ];

        $actividad_reciente = [
            'congresos' => Congreso::latest()->limit(5)->get(),
            'seminarios' => Seminario::with('departamento')->latest()->limit(5)->get(),
        ];

        return view('admin.dashboard', compact('stats', 'actividad_reciente'));
    }
}

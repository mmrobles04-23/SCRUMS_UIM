<?php

namespace App\Http\Controllers;

use App\Models\Congreso;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CongresoController extends Controller
{
    public function index(): View
    {
        $congresos = Congreso::activos()
            ->orderByDesc('fecha_inicio')
            ->orderByDesc('created_at')
            ->paginate(12);

        return view('congresos.index', compact('congresos'));
    }

    public function show(Request $request, Congreso $congreso): View
    {
        if (! $congreso->activo) {
            abort(404);
        }

        return view('congresos.show', compact('congreso'));
    }
}

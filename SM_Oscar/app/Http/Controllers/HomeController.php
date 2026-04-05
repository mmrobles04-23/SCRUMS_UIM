<?php

namespace App\Http\Controllers;

use App\Models\Congreso;
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

        return view('welcome', compact('congresos'));
    }
}

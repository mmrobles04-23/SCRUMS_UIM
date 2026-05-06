<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inscripcion;
use App\Models\Seminario;
use Illuminate\Http\Request;
use Illuminate\View\View;

class InscripcionController extends Controller
{
    public function index(Request $request): View
    {
        $seminarioId = $request->query('seminario_id');
        
        $inscripciones = Inscripcion::with('seminario')
            ->when($seminarioId, function ($query, $seminarioId) {
                return $query->where('seminario_id', $seminarioId);
            })
            ->orderByDesc('created_at')
            ->paginate(20);

        $seminarios = Seminario::select('id', 'titulo')->get();

        return view('admin.inscripciones.index', compact('inscripciones', 'seminarios'));
    }

    public function destroy(Inscripcion $inscripcion)
    {
        $inscripcion->delete();
        return back()->with('status', 'Inscripción eliminada.');
    }
}

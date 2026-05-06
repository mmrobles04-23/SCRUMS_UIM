<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inscripcion;
use App\Models\Congreso;
use Illuminate\Http\Request;
use Illuminate\View\View;

class InscripcionCongresoController extends Controller
{
    /**
     * Listado de inscripciones a congresos
     */
    public function index(Request $request): View
    {
        $congresoId = $request->query('congreso_id');
        
        $inscripciones = Inscripcion::with('congreso')
            ->whereNotNull('congreso_id')
            ->when($congresoId, function ($query, $congresoId) {
                return $query->where('congreso_id', $congresoId);
            })
            ->orderByDesc('created_at')
            ->paginate(20);

        $congresos = Congreso::select('id', 'titulo')->orderByDesc('fecha_inicio')->get();

        return view('admin.inscripciones_congresos.index', compact('inscripciones', 'congresos'));
    }

    /**
     * Eliminar inscripción
     */
    public function destroy(Inscripcion $inscripcion)
    {
        // Verificar que sea una inscripción a congreso
        if (!$inscripcion->congreso_id) {
            return back()->with('error', 'Esta inscripción no es de un congreso.');
        }

        $inscripcion->delete();
        return back()->with('status', 'Inscripción al congreso eliminada.');
    }
}

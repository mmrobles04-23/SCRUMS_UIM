<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Inscripcion;
use App\Models\Seminario;
use App\Models\Congreso;
use App\Mail\InscripcionConfirmada;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class InscripcionController extends Controller
{
    /**
     * Inscripción a Seminario (endpoint existente)
     */
    public function store(Request $request)
    {
        $request->validate([
            'seminario_id' => 'required|exists:seminarios,id',
            'nombre_completo' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'tipo_usuario' => 'required|in:interno,externo',
            'numero_cuenta' => 'required_if:tipo_usuario,interno|nullable|string|max:20',
            'motivo' => 'required|string|max:1000',
        ]);

        $seminario = Seminario::findOrFail($request->seminario_id);

        // Verificar Cupo
        if (!$this->verificarCupo($seminario, 'seminario')) {
            return response()->json([
                'success' => false,
                'message' => 'Cupo lleno en el seminario.'
            ], 422);
        }

        // Generar Número de Registro
        $numeroRegistro = $this->generarNumeroRegistro($seminario, 'seminario');

        // Crear Inscripción
        $inscripcion = Inscripcion::create([
            'seminario_id' => $seminario->id,
            'nombre_completo' => $request->nombre_completo,
            'email' => $request->email,
            'tipo_usuario' => $request->tipo_usuario,
            'numero_cuenta' => $request->numero_cuenta,
            'motivo' => $request->motivo,
            'numero_registro' => $numeroRegistro,
        ]);

        // Enviar Correo
        $this->enviarConfirmacion($inscripcion);

        return response()->json([
            'success' => true,
            'message' => '¡Inscrito con éxito al seminario!',
            'numero_registro' => $numeroRegistro
        ]);
    }

    /**
     * Inscripción a Congreso (nuevo endpoint)
     */
    public function storeCongreso(Request $request)
    {
        $request->validate([
            'congreso_id' => 'required|exists:congresos,id',
            'nombre_completo' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'tipo_usuario' => 'required|in:interno,externo',
            'numero_cuenta' => 'required_if:tipo_usuario,interno|nullable|string|max:20',
            'motivo' => 'required|string|max:1000',
        ]);

        $congreso = Congreso::findOrFail($request->congreso_id);

        // Verificar que el congreso esté activo
        if (!$congreso->activo) {
            return response()->json([
                'success' => false,
                'message' => 'El congreso no está disponible para inscripciones.'
            ], 422);
        }

        // Verificar Cupo
        if (!$this->verificarCupo($congreso, 'congreso')) {
            return response()->json([
                'success' => false,
                'message' => 'Cupo lleno en el congreso.'
            ], 422);
        }

        // Generar Número de Registro
        $numeroRegistro = $this->generarNumeroRegistro($congreso, 'congreso');

        // Crear Inscripción
        $inscripcion = Inscripcion::create([
            'congreso_id' => $congreso->id,
            'nombre_completo' => $request->nombre_completo,
            'email' => $request->email,
            'tipo_usuario' => $request->tipo_usuario,
            'numero_cuenta' => $request->numero_cuenta,
            'motivo' => $request->motivo,
            'numero_registro' => $numeroRegistro,
        ]);

        // Enviar Correo
        $this->enviarConfirmacion($inscripcion);

        return response()->json([
            'success' => true,
            'message' => '¡Inscrito con éxito al congreso!',
            'numero_registro' => $numeroRegistro
        ]);
    }

    /**
     * Verificar si hay cupo disponible
     */
    private function verificarCupo($evento, string $tipo): bool
    {
        if ($tipo === 'seminario') {
            if ($evento->cupo && $evento->cupo > 0) {
                return $evento->inscripciones()->count() < $evento->cupo;
            }
        } elseif ($tipo === 'congreso') {
            if ($evento->cupo && $evento->cupo > 0) {
                return $evento->inscripciones()->count() < $evento->cupo;
            }
        }
        return true;
    }

    /**
     * Generar número de registro único
     * Formato: UIM-{TIPO}-{ID_EVENTO}-{AÑO}-{CONSECUTIVO}
     */
    private function generarNumeroRegistro($evento, string $tipo): string
    {
        $year = date('Y');
        $count = $evento->inscripciones()->count() + 1;
        
        $prefijo = $tipo === 'seminario' ? 'SEM' : 'CONG';
        
        return sprintf('UIM-%s-%02d-%d-%03d', $prefijo, $evento->id, $year, $count);
    }

    /**
     * Enviar correo de confirmación
     */
    private function enviarConfirmacion(Inscripcion $inscripcion): void
    {
        try {
            Mail::to($inscripcion->email)->send(new InscripcionConfirmada($inscripcion));
        } catch (\Exception $e) {
            \Log::error('Error al enviar correo de inscripción: ' . $e->getMessage());
        }
    }
}

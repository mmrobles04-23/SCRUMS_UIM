<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Inscripcion;
use App\Models\Seminario;
use App\Mail\InscripcionConfirmada;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class InscripcionController extends Controller
{
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

        // 1. Verificar Cupo
        if ($seminario->cupo > 0) {
            $inscritos = $seminario->inscripciones()->count();
            if ($inscritos >= $seminario->cupo) {
                return response()->json([
                    'success' => false,
                    'message' => 'Cupo lleno en el seminario.'
                ], 422);
            }
        }

        // 2. Generar Número de Registro
        // Formato: UIM-SEM-{ID_SEMINARIO}-{AÑO}-{CONSECUTIVO}
        $year = date('Y');
        $count = $seminario->inscripciones()->count() + 1;
        $numeroRegistro = sprintf('UIM-SEM-%02d-%d-%03d', $seminario->id, $year, $count);

        // 3. Crear Inscripción
        $inscripcion = Inscripcion::create([
            'seminario_id' => $seminario->id,
            'nombre_completo' => $request->nombre_completo,
            'email' => $request->email,
            'tipo_usuario' => $request->tipo_usuario,
            'numero_cuenta' => $request->numero_cuenta,
            'motivo' => $request->motivo,
            'numero_registro' => $numeroRegistro,
        ]);

        // 4. Enviar Correo
        try {
            Mail::to($inscripcion->email)->send(new InscripcionConfirmada($inscripcion));
        } catch (\Exception $e) {
            // Log error or handle it, but don't stop the process if mail fails
            \Log::error('Error al enviar correo de inscripción: ' . $e->getMessage());
        }

        return response()->json([
            'success' => true,
            'message' => '¡Inscrito con éxito!',
            'numero_registro' => $numeroRegistro
        ]);
    }
}

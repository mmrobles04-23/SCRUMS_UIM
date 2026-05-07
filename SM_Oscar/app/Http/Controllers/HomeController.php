<?php

namespace App\Http\Controllers;

use App\Models\Congreso;
use App\Models\Departamento;
use App\Models\Seminario;
use App\Models\Setting;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function welcome(): View
    {
        // Congreso más próximo a vencer (solo el primero)
        $congresoDestacado = Congreso::query()
            ->activos()
            ->where('fecha_fin', '>=', now())
            ->orderBy('fecha_fin', 'asc')
            ->first();

        // Cargar todos los settings de welcome de una sola vez
        $settings = Setting::where('group', 'welcome')->get()->keyBy('key')->map(fn($s) => $s->value);

        // Departamentos activos para la sección de departamentos
        $departamentosLista = Departamento::activos()->ordenados()->limit(7)->get();

        // Eventos próximos a vencer (carrrusel)
        $eventosProximos = $this->getEventosProximos($settings);

        // Lista completa para referencia
        $congresos = Congreso::query()
            ->activos()
            ->orderByDesc('fecha_inicio')
            ->orderByDesc('created_at')
            ->get();

        return view('welcome', compact('congresos', 'congresoDestacado', 'settings', 'departamentosLista', 'eventosProximos'));
    }

    private function getEventosProximos($settings): array
    {
        // Verificar si la sección está activa
        if (!($settings['eventos_proximos_activo'] ?? false)) {
            return [];
        }

        // Calcular días según período configurado
        $periodo = $settings['eventos_proximos_periodo'] ?? 'mes';
        $dias = match($periodo) {
            'semana' => 7,
            'mes' => 30,
            'trimestre' => 90,
            default => 30,
        };

        $cantidad = (int) ($settings['eventos_proximos_cantidad'] ?? 6);
        $tipo = $settings['eventos_proximos_tipo'] ?? 'ambos';

        $eventos = [];

        // Cargar congresos si el tipo lo permite
        if (in_array($tipo, ['ambos', 'congresos'])) {
            $congresosProximos = Congreso::proximosAVencer($dias)
                ->withCount('inscripciones')
                ->limit($cantidad)
                ->get()
                ->map(fn($c) => [
                    'tipo' => 'congreso',
                    'titulo' => $c->titulo,
                    'slug' => $c->slug,
                    'fecha_fin' => $c->fecha_fin,
                    'imagen' => $c->urlPortada(),
                    'route' => route('congresos.show', $c->slug),
                    'cupo' => $c->cupo,
                    'inscritos' => $c->inscripciones_count ?? 0,
                ]);
            $eventos = array_merge($eventos, $congresosProximos->toArray());
        }

        // Cargar seminarios si el tipo lo permite
        if (in_array($tipo, ['ambos', 'seminarios'])) {
            $seminariosProximos = Seminario::proximosAVencer($dias)
                ->with('departamento')
                ->withCount('inscripciones')
                ->limit($cantidad)
                ->get()
                ->map(fn($s) => [
                    'tipo' => 'seminario',
                    'titulo' => $s->titulo,
                    'slug' => $s->slug,
                    'fecha_fin' => $s->fecha_fin,
                    'imagen' => $s->urlBanner(),
                    'departamento' => $s->departamento?->siglas ?? 'UIMA',
                    'route' => route('seminarios.index'),
                    'cupo' => $s->cupo,
                    'inscritos' => $s->inscripciones_count ?? 0,
                ]);
            $eventos = array_merge($eventos, $seminariosProximos->toArray());
        }

        // Ordenar por fecha de vencimiento y limitar
        usort($eventos, fn($a, $b) => $a['fecha_fin'] <=> $b['fecha_fin']);

        return array_slice($eventos, 0, $cantidad);
    }
}

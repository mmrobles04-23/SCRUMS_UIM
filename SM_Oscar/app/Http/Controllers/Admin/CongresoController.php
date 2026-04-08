<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Congreso;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CongresoController extends Controller
{
    public function index(): View
    {
        $congresos = Congreso::query()
            ->orderByDesc('fecha_inicio')
            ->orderByDesc('created_at')
            ->paginate(15);

        return view('admin.congresos.index', compact('congresos'));
    }

    public function create(): View
    {
        return view('admin.congresos.create', ['congreso' => new Congreso]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);
        $data['slug'] = $this->uniqueSlug($data['titulo'], $request->input('slug'));
        $data['activo'] = $request->boolean('activo', true);

        if ($request->hasFile('imagen_portada')) {
            $data['imagen_portada'] = $request->file('imagen_portada')->store('congresos', 'public');
        } else {
            unset($data['imagen_portada']);
        }

        Congreso::create($data);

        return redirect()->route('admin.congresos.index')->with('status', 'Congreso creado correctamente.');
    }

    public function edit(Congreso $congreso): View
    {
        return view('admin.congresos.edit', compact('congreso'));
    }

    public function update(Request $request, Congreso $congreso): RedirectResponse
    {
        $data = $this->validated($request, $congreso->id);
        $data['slug'] = $this->uniqueSlug($data['titulo'], $request->input('slug'), $congreso->id);
        $data['activo'] = $request->boolean('activo');

        if ($request->hasFile('imagen_portada')) {
            if ($congreso->imagen_portada) {
                Storage::disk('public')->delete($congreso->imagen_portada);
            }
            $data['imagen_portada'] = $request->file('imagen_portada')->store('congresos', 'public');
        } else {
            unset($data['imagen_portada']);
        }

        $congreso->update($data);

        return redirect()->route('admin.congresos.index')->with('status', 'Congreso actualizado.');
    }

    public function destroy(Congreso $congreso): RedirectResponse
    {
        if ($congreso->imagen_portada) {
            Storage::disk('public')->delete($congreso->imagen_portada);
        }
        $congreso->delete();

        return redirect()->route('admin.congresos.index')->with('status', 'Congreso eliminado.');
    }

    public function toggleActivo(Congreso $congreso): RedirectResponse
    {
        $congreso->update(['activo' => ! $congreso->activo]);

        return redirect()->route('admin.congresos.index')->with('status', 'Estado del congreso actualizado.');
    }

    private function validated(Request $request, ?int $ignoreId = null): array
    {
        $slugRule = 'nullable|string|max:255|regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/';
        $slugRule .= $ignoreId
            ? '|unique:congresos,slug,'.$ignoreId
            : '|unique:congresos,slug';

        return $request->validate([
            'titulo' => 'required|string|max:255',
            'slug' => $slugRule,
            'resumen' => 'nullable|string|max:500',
            'descripcion' => 'nullable|string',
            'imagen_portada' => 'nullable|image|max:4096',
            'fecha_inicio' => 'nullable|date',
            'fecha_fin' => 'nullable|date|after_or_equal:fecha_inicio',
            'sede' => 'nullable|string|max:255',
            'enlace_inscripcion' => 'nullable|string|max:2048',
            'enlace_programa' => 'nullable|string|max:2048',
            'enlace_sitio_web' => 'nullable|string|max:2048',
        ]);
    }

    private function uniqueSlug(string $titulo, ?string $manualSlug, ?int $ignoreId = null): string
    {
        $base = $manualSlug !== null && $manualSlug !== ''
            ? Str::slug($manualSlug)
            : Str::slug($titulo);

        if ($base === '') {
            $base = 'congreso';
        }

        $slug = $base;
        $n = 1;
        while (
            Congreso::query()
                ->where('slug', $slug)
                ->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = $base.'-'.$n;
            $n++;
        }

        return $slug;
    }
}

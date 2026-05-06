<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Seminario;
use App\Models\Departamento;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class SeminarioController extends Controller
{
    public function index(): View
    {
        $seminarios = Seminario::with('departamento')
            ->orderByDesc('fecha_inicio')
            ->paginate(15);
        return view('admin.seminarios.index', compact('seminarios'));
    }

    public function create(): View
    {
        $departamentos = Departamento::activos()->ordenados()->get();
        return view('admin.seminarios.create', [
            'seminario' => new Seminario,
            'departamentos' => $departamentos
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);
        $data['slug'] = $this->uniqueSlug($data['titulo'], $request->input('slug'));

        if ($request->hasFile('imagen_banner')) {
            $data['imagen_banner'] = $this->storeBanner($request->file('imagen_banner'));
        }

        Seminario::create($data);

        return redirect()->route('admin.seminarios.index')
            ->with('status', 'Seminario creado correctamente.');
    }

    public function edit(Seminario $seminario): View
    {
        $departamentos = Departamento::activos()->ordenados()->get();
        return view('admin.seminarios.edit', compact('seminario', 'departamentos'));
    }

    public function update(Request $request, Seminario $seminario): RedirectResponse
    {
        $data = $this->validated($request, $seminario->id);
        $data['slug'] = $this->uniqueSlug($data['titulo'], $request->input('slug'), $seminario->id);

        if ($request->hasFile('imagen_banner')) {
            if ($seminario->imagen_banner) {
                $this->deleteBanner($seminario->imagen_banner);
            }
            $data['imagen_banner'] = $this->storeBanner($request->file('imagen_banner'));
        }

        $seminario->update($data);

        return redirect()->route('admin.seminarios.index')
            ->with('status', 'Seminario actualizado.');
    }

    public function destroy(Seminario $seminario): RedirectResponse
    {
        if ($seminario->imagen_banner) {
            $this->deleteBanner($seminario->imagen_banner);
        }
        $seminario->delete();

        return redirect()->route('admin.seminarios.index')
            ->with('status', 'Seminario eliminado.');
    }

    private function validated(Request $request, ?int $ignoreId = null): array
    {
        $slugRule = 'nullable|string|max:255|regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/';
        $slugRule .= $ignoreId
            ? '|unique:seminarios,slug,'.$ignoreId
            : '|unique:seminarios,slug';

        return $request->validate([
            'titulo' => 'required|string|max:255',
            'categoria' => 'required|in:Anuales,Permanentes,Otros',
            'slug' => $slugRule,
            'descripcion' => 'nullable|string',
            'ponente' => 'required|string|max:255',
            'institucion_ponente' => 'nullable|string|max:255',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'nullable|date|after_or_equal:fecha_inicio',
            'lugar' => 'nullable|string|max:255',
            'imagen_banner' => 'nullable|image|max:4096',
            'enlace_material' => 'nullable|string|max:2048',
            'estado' => 'required|in:borrador,publicado,cancelado',
            'departamento_id' => 'nullable|exists:departamentos,id',
            'cupo' => 'nullable|integer|min:0',
        ]);
    }

    private function uniqueSlug(string $titulo, ?string $manualSlug, ?int $ignoreId = null): string
    {
        $base = $manualSlug !== null && $manualSlug !== ''
            ? Str::slug($manualSlug)
            : Str::slug($titulo);

        if ($base === '') {
            $base = 'seminario';
        }

        $slug = $base;
        $n = 1;
        while (
            Seminario::query()
                ->where('slug', $slug)
                ->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = $base.'-'.$n;
            $n++;
        }

        return $slug;
    }

    private function storeBanner($file): string
    {
        $filename = Str::uuid()->toString() . '.' . $file->getClientOriginalExtension();
        $path = public_path('seminarios/banners');
        
        if (!is_dir($path)) {
            mkdir($path, 0755, true);
        }
        
        $file->move($path, $filename);
        return 'seminarios/banners/' . $filename;
    }

    private function deleteBanner(string $path): void
    {
        $fullPath = public_path($path);
        if (file_exists($fullPath)) {
            unlink($fullPath);
        }
    }
}

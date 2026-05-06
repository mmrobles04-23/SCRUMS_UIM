<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Departamento;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class DepartamentoController extends Controller
{
    public function index(): View
    {
        $departamentos = Departamento::ordenados()->paginate(15);
        return view('admin.departamentos.index', compact('departamentos'));
    }

    public function create(): View
    {
        return view('admin.departamentos.create', ['departamento' => new Departamento]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);
        $data['activo'] = $request->boolean('activo', true);

        if ($request->hasFile('imagen_banner')) {
            $data['imagen_banner'] = $this->storeBanner($request->file('imagen_banner'));
        }

        if ($request->hasFile('imagen_coordinador')) {
            $data['imagen_coordinador'] = $this->storeCoordinadorImage($request->file('imagen_coordinador'));
        }

        $departamento = Departamento::create($data);
        
        if ($request->has('funciones')) {
            foreach ($request->input('funciones') as $descripcion) {
                if (!empty($descripcion)) {
                    $departamento->funciones()->create(['descripcion' => $descripcion]);
                }
            }
        }

        return redirect()->route('admin.departamentos.index')
            ->with('status', 'Departamento creado correctamente.');
    }

    public function edit(Departamento $departamento): View
    {
        return view('admin.departamentos.edit', compact('departamento'));
    }

    public function update(Request $request, Departamento $departamento): RedirectResponse
    {
        $data = $this->validated($request, $departamento->id);
        $data['activo'] = $request->boolean('activo');

        if ($request->hasFile('imagen_banner')) {
            if ($departamento->imagen_banner) {
                $this->deleteBanner($departamento->imagen_banner);
            }
            $data['imagen_banner'] = $this->storeBanner($request->file('imagen_banner'));
        }

        if ($request->hasFile('imagen_coordinador')) {
            if ($departamento->imagen_coordinador) {
                $this->deleteCoordinadorImage($departamento->imagen_coordinador);
            }
            $data['imagen_coordinador'] = $this->storeCoordinadorImage($request->file('imagen_coordinador'));
        }

        $departamento->update($data);

        if ($request->has('funciones')) {
            $departamento->funciones()->delete();
            foreach ($request->input('funciones') as $descripcion) {
                if (!empty($descripcion)) {
                    $departamento->funciones()->create(['descripcion' => $descripcion]);
                }
            }
        }

        return redirect()->route('admin.departamentos.index')
            ->with('status', 'Departamento actualizado.');
    }

    public function destroy(Departamento $departamento): RedirectResponse
    {
        if ($departamento->imagen_banner) {
            $this->deleteBanner($departamento->imagen_banner);
        }
        if ($departamento->imagen_coordinador) {
            $this->deleteCoordinadorImage($departamento->imagen_coordinador);
        }
        $departamento->delete();

        return redirect()->route('admin.departamentos.index')
            ->with('status', 'Departamento eliminado.');
    }

    private function validated(Request $request, ?int $ignoreId = null): array
    {
        return $request->validate([
            'siglas' => 'required|string|max:10|unique:departamentos,siglas' . ($ignoreId ? ',' . $ignoreId : ''),
            'nombre' => 'required|string|max:255',
            'color' => 'required|string|size:7|regex:/^#[a-fA-F0-9]{6}$/',
            'logo' => 'nullable|string|max:255',
            'icono' => 'nullable|string|max:50',
            'descripcion' => 'nullable|string',
            'objetivo' => 'nullable|string',
            'imagen_banner' => 'nullable|image|max:4096',
            'coordinador' => 'nullable|string|max:255',
            'imagen_coordinador' => 'nullable|image|max:2048',
            'cargo_coordinador' => 'nullable|string|max:255',
            'oficina' => 'nullable|string|max:255',
            'email_contacto' => 'nullable|email|max:255',
            'telefono' => 'nullable|string|max:50',
            'orden' => 'nullable|integer|min:0',
            'funciones' => 'nullable|array',
            'funciones.*' => 'nullable|string|max:255',
        ]);
    }

    private function storeBanner($file): string
    {
        $filename = Str::uuid()->toString() . '.' . $file->getClientOriginalExtension();
        $path = public_path('departamentos/banners');
        
        if (!is_dir($path)) {
            mkdir($path, 0755, true);
        }
        
        $file->move($path, $filename);
        return 'departamentos/banners/' . $filename;
    }

    private function deleteBanner(string $path): void
    {
        $fullPath = public_path($path);
        if (file_exists($fullPath)) {
            unlink($fullPath);
        }
    }

    private function storeCoordinadorImage($file): string
    {
        $filename = Str::uuid()->toString() . '.' . $file->getClientOriginalExtension();
        $path = storage_path('app/public/coordinadores');
        
        if (!is_dir($path)) {
            mkdir($path, 0755, true);
        }
        
        $file->move($path, $filename);
        return 'coordinadores/' . $filename;
    }

    private function deleteCoordinadorImage(string $path): void
    {
        $fullPath = storage_path('app/public/' . $path);
        if (file_exists($fullPath)) {
            unlink($fullPath);
        }
    }
}

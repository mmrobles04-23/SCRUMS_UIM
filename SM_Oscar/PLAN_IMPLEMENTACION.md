# Plan de Implementación - UIMA

> Plan de acción detallado para los 6 próximos módulos del sistema
> 
> Fecha: Mayo 2026 | Prioridad: Alta → Media

---

## 📋 Resumen Ejecutivo

| # | Módulo | Complejidad | Tiempo Est. | Dependencias |
|---|--------|-------------|-------------|--------------|
| 1 | **Departamentos** | Media | 4-6 horas | Ninguna |
| 2 | **Seminarios** | Media | 4-6 horas | Departamentos (opcional FK) |
| 3 | **Editor Welcome** | Baja | 2-3 horas | Ninguna |
| 4 | **Noticias/Blog** | Media | 3-4 horas | Ninguna |
| 5 | **Dashboard Stats** | Baja | 2 horas | Departamentos + Seminarios |
| 6 | **Upload Múltiple Congresos** | Baja-Media | 2-3 horas | Ninguna |

**Orden recomendado:** 1 → 2 → 5 → 3 → 4 → 6 (o 1 → 2 → 3 → 4 → 5 → 6)

---

## FASE 1: Fundamentos (Departamentos + Seminarios)

---

### #1: Sistema de Departamentos ⏱️ 4-6 horas

#### Paso 1.1: Migración (15 min)
**Archivo:** `database/migrations/2026_05_03_000000_create_departamentos_table.php`

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('departamentos', function (Blueprint $table) {
            $table->id();
            $table->string('siglas', 10)->unique();        // DTA, IPAJ, DPE, DIE
            $table->string('nombre');
            $table->string('color', 7)->default('#1E3C70'); // Color identidad UNAM
            $table->text('descripcion')->nullable();
            $table->string('imagen_banner')->nullable();
            $table->string('coordinador')->nullable();
            $table->string('email_contacto')->nullable();
            $table->string('telefono')->nullable();
            $table->boolean('activo')->default(true);
            $table->integer('orden')->default(0);           // Para ordenar en vistas
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('departamentos');
    }
};
```

**Comando:** `php artisan migrate`

#### Paso 1.2: Modelo (10 min)
**Archivo:** `app/Models/Departamento.php` (crear)

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected $table = 'departamentos';

    protected $fillable = [
        'siglas',
        'nombre',
        'color',
        'descripcion',
        'imagen_banner',
        'coordinador',
        'email_contacto',
        'telefono',
        'activo',
        'orden',
    ];

    protected function casts(): array
    {
        return [
            'activo' => 'boolean',
            'orden' => 'integer',
        ];
    }

    public function scopeActivos($query)
    {
        return $query->where('activo', true);
    }

    public function scopeOrdenados($query)
    {
        return $query->orderBy('orden')->orderBy('nombre');
    }
}
```

#### Paso 1.3: Controlador Admin (30 min)
**Archivo:** `app/Http/Controllers/Admin/DepartamentoController.php` (crear)

```php
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

        Departamento::create($data);

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

        $departamento->update($data);

        return redirect()->route('admin.departamentos.index')
            ->with('status', 'Departamento actualizado.');
    }

    public function destroy(Departamento $departamento): RedirectResponse
    {
        if ($departamento->imagen_banner) {
            $this->deleteBanner($departamento->imagen_banner);
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
            'descripcion' => 'nullable|string',
            'imagen_banner' => 'nullable|image|max:4096',
            'coordinador' => 'nullable|string|max:255',
            'email_contacto' => 'nullable|email|max:255',
            'telefono' => 'nullable|string|max:50',
            'orden' => 'nullable|integer|min:0',
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
}
```

#### Paso 1.4: Vistas Admin (45 min)

**Actualizar:** `resources/views/admin/departamentos/index.blade.php`
- Reemplazar datos hardcodeados con loop `@forelse($departamentos as $d)`
- Agregar paginación
- Botones de acción funcionales (editar, eliminar)

**Crear:** `resources/views/admin/departamentos/create.blade.php`
```blade
@extends('admin.layout')
@section('title', 'Nuevo Departamento')
@section('admin_content')
    <div class="container py-4">
        <h1 class="h4 mb-4">Nuevo Departamento</h1>
        @include('admin.departamentos._form', ['departamento' => new \App\Models\Departamento])
    </div>
@endsection
```

**Crear:** `resources/views/admin/departamentos/edit.blade.php`
```blade
@extends('admin.layout')
@section('title', 'Editar Departamento')
@section('admin_content')
    <div class="container py-4">
        <h1 class="h4 mb-4">Editar Departamento</h1>
        @include('admin.departamentos._form', compact('departamento'))
    </div>
@endsection
```

**Crear:** `resources/views/admin/departamentos/_form.blade.php`
- Campos: siglas, nombre, color (input color picker), descripción, imagen, coordinador, email, teléfono, orden, activo
- Preview de imagen actual si existe

#### Paso 1.5: Rutas (5 min)
**Archivo:** `routes/web.php`

Reemplazar la ruta estática:
```php
// Reemplazar esto:
// Route::get('admin/departamentos', function () {
//     return view('admin.departamentos.index');
// })->name('admin.departamentos.index');

// Con esto:
Route::resource('admin/departamentos', \App\Http\Controllers\Admin\DepartamentoController::class)
    ->names('admin.departamentos');
```

#### Paso 1.6: Vista Pública (30 min)
**Actualizar:** `resources/views/departamento.blade.php`
- Obtener departamento por query param `?id=DTA`
- Mostrar datos dinámicos: nombre, color, descripción, coordinador, etc.
- Usar banner del departamento si existe

**Opcional:** Agregar método al controlador:
```php
// En WebController o nuevo DepartamentoPublicController
public function show(Request $request)
{
    $siglas = $request->get('id', 'DTA');
    $departamento = Departamento::where('siglas', $siglas)->firstOrFail();
    return view('departamento', compact('departamento'));
}
```

---

### #2: Sistema de Seminarios ⏱️ 4-6 horas

#### Paso 2.1: Migración (15 min)
**Archivo:** `database/migrations/2026_05_03_100000_create_seminarios_table.php`

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('seminarios', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('slug')->unique();
            $table->text('descripcion')->nullable();
            $table->string('ponente');
            $table->string('institucion_ponente')->nullable();
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_fin')->nullable();
            $table->string('lugar')->nullable();
            $table->string('imagen_banner')->nullable();
            $table->string('enlace_material')->nullable();
            $table->enum('estado', ['borrador', 'publicado', 'cancelado'])->default('borrador');
            $table->foreignId('departamento_id')->nullable()->constrained('departamentos')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('seminarios');
    }
};
```

**Comando:** `php artisan migrate`

#### Paso 2.2: Modelo (10 min)
**Archivo:** `app/Models/Seminario.php` (crear)

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Seminario extends Model
{
    use HasFactory;

    protected $table = 'seminarios';

    protected $fillable = [
        'titulo',
        'slug',
        'descripcion',
        'ponente',
        'institucion_ponente',
        'fecha_inicio',
        'fecha_fin',
        'lugar',
        'imagen_banner',
        'enlace_material',
        'estado',
        'departamento_id',
    ];

    protected function casts(): array
    {
        return [
            'fecha_inicio' => 'datetime',
            'fecha_fin' => 'datetime',
        ];
    }

    public function departamento(): BelongsTo
    {
        return $this->belongsTo(Departamento::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function scopePublicados($query)
    {
        return $query->where('estado', 'publicado');
    }

    public function scopeProximos($query)
    {
        return $query->where('fecha_inicio', '>=', now())->orderBy('fecha_inicio');
    }
}
```

#### Paso 2.3: Controlador Admin (30 min)
**Archivo:** `app/Http/Controllers/Admin/SeminarioController.php` (crear)

Similar estructura a `CongresoController` pero con:
- Selector de departamento (dropdown)
- Estados: borrador/publicado/cancelado
- Fechas con hora (datetime-local)

#### Paso 2.4: Vistas Admin (45 min)

**Actualizar:** `resources/views/admin/seminarios/index.blade.php`
- Loop real con datos de BD
- Filtros: por departamento, por estado, por fecha
- Paginación

**Crear:** `resources/views/admin/seminarios/create.blade.php` y `edit.blade.php`
**Crear:** `resources/views/admin/seminarios/_form.blade.php`

Campos del formulario:
- Título, Slug (auto-generado), Descripción
- Ponente, Institución del ponente
- Fecha inicio/fin (datetime-local)
- Lugar
- Imagen banner
- Enlace a material/presentación
- Estado (select: borrador/publicado/cancelado)
- Departamento (select de departamentos activos)

#### Paso 2.5: Rutas (5 min)
**Archivo:** `routes/web.php`

```php
Route::resource('admin/seminarios', \App\Http\Controllers\Admin\SeminarioController::class)
    ->names('admin.seminarios');
```

#### Paso 2.6: Vista Pública - Integración con Investigación (45 min)

**Actualizar:** `resources/views/investigacion.blade.php`
- Obtener seminarios publicados desde BD: `Seminario::publicados()->proximos()->get()`
- Renderizar lista dinámica en lugar de datos estáticos
- Mantener el **formulario de inscripción ya implementado**
- Agregar enlace o modal para ver detalles del seminario

---

## FASE 2: Mejoras de Admin

---

### #5: Dashboard con Estadísticas ⏱️ 2 horas

**Nota:** Se sugiere hacer este después de Departamentos y Seminarios para tener datos reales.

#### Paso 5.1: Actualizar Vista Admin Dashboard
**Archivo:** `resources/views/admin/dashboard.blade.php`

```blade
{{-- Agregar tarjetas de estadísticas al inicio --}}
<div class="row g-3 mb-4">
    <div class="col-6 col-md-3">
        <div class="card border-0 shadow-sm">
            <div class="card-body text-center">
                <div class="display-6 text-primary">{{ $stats['usuarios'] }}</div>
                <div class="small text-muted">Usuarios</div>
            </div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card border-0 shadow-sm">
            <div class="card-body text-center">
                <div class="display-6 text-success">{{ $stats['congresos_activos'] }}</div>
                <div class="small text-muted">Congresos Activos</div>
            </div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card border-0 shadow-sm">
            <div class="card-body text-center">
                <div class="display-6 text-warning">{{ $stats['departamentos'] }}</div>
                <div class="small text-muted">Departamentos</div>
            </div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card border-0 shadow-sm">
            <div class="card-body text-center">
                <div class="display-6 text-info">{{ $stats['seminarios_proximos'] }}</div>
                <div class="small text-muted">Seminarios Próximos</div>
            </div>
        </div>
    </div>
</div>
```

#### Paso 5.2: Crear Controller o modificar ruta
**Opción A - Simple (closure en web.php):**
```php
Route::get('/admin/dashboard', function () {
    $stats = [
        'usuarios' => \App\Models\User::count(),
        'congresos_activos' => \App\Models\Congreso::activos()->count(),
        'departamentos' => \App\Models\Departamento::activos()->count(),
        'seminarios_proximos' => \App\Models\Seminario::publicados()->proximos()->count(),
    ];
    return view('admin.dashboard', compact('stats'));
})->name('admin.dashboard');
```

**Opción B - Controller dedicado:**
Crear `Admin\DashboardController@index`

---

## FASE 3: Contenido y Configuración

---

### #3: Editor Welcome Funcional ⏱️ 2-3 horas

#### Paso 3.1: Migración Settings
**Archivo:** `database/migrations/2026_05_03_200000_create_settings_table.php`

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('group', 50)->default('general'); // welcome, contacto, etc.
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->string('type', 20)->default('text'); // text, textarea, image, boolean
            $table->string('label'); // Nombre legible para el admin
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
```

#### Paso 3.2: Modelo Setting (con cache)
**Archivo:** `app/Models/Setting.php`

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    protected $fillable = ['group', 'key', 'value', 'type', 'label'];

    public static function get(string $key, $default = null)
    {
        return Cache::remember("setting.{$key}", 3600, function () use ($key, $default) {
            $setting = static::where('key', $key)->first();
            return $setting?->value ?? $default;
        });
    }

    public static function set(string $key, $value): void
    {
        static::updateOrCreate(
            ['key' => $key],
            ['value' => $value]
        );
        Cache::forget("setting.{$key}");
    }

    public static function getGroup(string $group): array
    {
        return static::where('group', $group)
            ->get()
            ->mapWithKeys(fn ($item) => [$item->key => $item->value])
            ->toArray();
    }
}
```

#### Paso 3.3: Seeder de Settings Iniciales
**Archivo:** `database/seeders/SettingsSeeder.php`

```php
<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            // Group: welcome
            ['group' => 'welcome', 'key' => 'hero_titulo', 'type' => 'text', 'label' => 'Título Hero', 'value' => 'Unidad de Investigación Multidisciplinaria Aplicada'],
            ['group' => 'welcome', 'key' => 'hero_subtitulo', 'type' => 'textarea', 'label' => 'Subtítulo Hero', 'value' => 'FES Acatlán - UNAM'],
            ['group' => 'welcome', 'key' => 'hero_imagen', 'type' => 'image', 'label' => 'Imagen Hero', 'value' => null],
            ['group' => 'welcome', 'key' => 'proposito_titulo', 'type' => 'text', 'label' => 'Título Propósito', 'value' => '¿Qué es la UIMA?'],
            ['group' => 'welcome', 'key' => 'proposito_texto', 'type' => 'textarea', 'label' => 'Texto Propósito', 'value' => 'Contenido descripción...'],
            ['group' => 'welcome', 'key' => 'proposito_imagen', 'type' => 'image', 'label' => 'Imagen Propósito', 'value' => null],
        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }
    }
}
```

**Comando:** `php artisan db:seed --class=SettingsSeeder`

#### Paso 3.4: Controlador Admin Welcome
**Archivo:** `app/Http/Controllers/Admin/WelcomeController.php`

```php
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class WelcomeController extends Controller
{
    public function edit(): View
    {
        $settings = Setting::where('group', 'welcome')->get()->keyBy('key');
        return view('admin.welcome.edit', compact('settings'));
    }

    public function update(Request $request): RedirectResponse
    {
        $settings = Setting::where('group', 'welcome')->get();

        foreach ($settings as $setting) {
            $key = $setting->key;

            if ($setting->type === 'image' && $request->hasFile($key)) {
                // Eliminar imagen anterior
                if ($setting->value && Storage::disk('public')->exists($setting->value)) {
                    Storage::disk('public')->delete($setting->value);
                }
                // Guardar nueva
                $path = $request->file($key)->store('welcome', 'public');
                Setting::set($key, $path);
            } elseif ($setting->type === 'boolean') {
                Setting::set($key, $request->boolean($key));
            } elseif ($request->has($key)) {
                Setting::set($key, $request->input($key));
            }
        }

        return redirect()->route('admin.welcome.edit')
            ->with('status', 'Configuración actualizada correctamente.');
    }
}
```

#### Paso 3.5: Actualizar Vista Admin Welcome
**Archivo:** `resources/views/admin/welcome/edit.blade.php`

Reemplazar el contenido estático con:
- Formulario que itere sobre `$settings`
- Inputs dinámicos según el tipo (text, textarea, image)
- Preview de imágenes actuales
- Botón Guardar que envíe a `route('admin.welcome.update')`

#### Paso 3.6: Actualizar Welcome Público
**Archivo:** `resources/views/welcome.blade.php`

Reemplazar textos hardcodeados con:
```blade
<h1>{{ \App\Models\Setting::get('hero_titulo', 'UIMA') }}</h1>
<p>{{ \App\Models\Setting::get('hero_subtitulo') }}</p>
<!-- etc. -->
```

O crear un View Composer para inyectar settings automáticamente.

#### Paso 3.7: Rutas
**Archivo:** `routes/web.php`

```php
Route::get('admin/welcome', [\App\Http\Controllers\Admin\WelcomeController::class, 'edit'])
    ->name('admin.welcome.edit');
Route::post('admin/welcome', [\App\Http\Controllers\Admin\WelcomeController::class, 'update'])
    ->name('admin.welcome.update');
```

---

### #4: Sistema de Noticias/Blog ⏱️ 3-4 horas

#### Paso 4.1: Migración
**Archivo:** `database/migrations/2026_05_03_300000_create_noticias_table.php`

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('noticias', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('slug')->unique();
            $table->string('resumen', 500);
            $table->text('contenido');
            $table->string('imagen_destacada')->nullable();
            $table->enum('estado', ['borrador', 'publicado', 'archivado'])->default('borrador');
            $table->timestamp('fecha_publicacion')->nullable();
            $table->foreignId('autor_id')->constrained('users');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('noticias');
    }
};
```

#### Paso 4.2: Modelo Noticia
**Archivo:** `app/Models/Noticia.php`

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Noticia extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'slug',
        'resumen',
        'contenido',
        'imagen_destacada',
        'estado',
        'fecha_publicacion',
        'autor_id',
    ];

    protected function casts(): array
    {
        return [
            'fecha_publicacion' => 'datetime',
        ];
    }

    public function autor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'autor_id');
    }

    public function scopePublicadas($query)
    {
        return $query->where('estado', 'publicado')
            ->where('fecha_publicacion', '<=', now());
    }

    public function scopeRecientes($query, $limit = 5)
    {
        return $query->publicadas()->orderByDesc('fecha_publicacion')->limit($limit);
    }
}
```

#### Paso 4.3: Controlador Admin
**Archivo:** `app/Http/Controllers/Admin/NoticiaController.php`

CRUD completo similar a Congresos.

#### Paso 4.4: Vistas Admin
- `admin/noticias/index.blade.php`
- `admin/noticias/create.blade.php`
- `admin/noticias/edit.blade.php`
- `admin/noticias/_form.blade.php`

Campos: título, slug, resumen, contenido (textarea rica con TinyMCE o CKEditor), imagen destacada, estado, fecha publicación.

#### Paso 4.5: Integración en Dashboard Noticias
**Archivo:** `resources/views/dashboard/noticias.blade.php`

Actualizar para usar datos de BD:
```php
$noticias = \App\Models\Noticia::recientes(3)->get();
```

#### Paso 4.6: Rutas
```php
Route::resource('admin/noticias', \App\Http\Controllers\Admin\NoticiaController::class)
    ->names('admin.noticias');
```

---

## FASE 4: Mejoras Adicionales

---

### #6: Upload Múltiple de Imágenes a Congresos ⏱️ 2-3 horas

#### Paso 6.1: Migración
**Archivo:** `database/migrations/2026_05_03_400000_create_congreso_imagenes_table.php`

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('congreso_imagenes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('congreso_id')->constrained('congresos')->onDelete('cascade');
            $table->string('imagen_path');
            $table->string('titulo')->nullable();
            $table->text('descripcion')->nullable();
            $table->integer('orden')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('congreso_imagenes');
    }
};
```

#### Paso 6.2: Modelo CongresoImagen
**Archivo:** `app/Models/CongresoImagen.php`

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CongresoImagen extends Model
{
    protected $fillable = ['congreso_id', 'imagen_path', 'titulo', 'descripcion', 'orden'];

    public function congreso(): BelongsTo
    {
        return $this->belongsTo(Congreso::class);
    }
}
```

#### Paso 6.3: Actualizar Modelo Congreso
**Archivo:** `app/Models/Congreso.php`

```php
public function imagenes()
{
    return $this->hasMany(CongresoImagen::class)->orderBy('orden');
}
```

#### Paso 6.4: Actualizar Formulario Admin
**Archivo:** `resources/views/admin/congresos/_form.blade.php`

Agregar sección:
```blade
<div class="mb-3">
    <label class="form-label">Galería de imágenes</label>
    <input type="file" name="imagenes_galeria[]" multiple accept="image/*" class="form-control">
    <small class="text-muted">Puedes seleccionar múltiples imágenes</small>
</div>

{{-- Mostrar imágenes existentes si es edición --}}
@if($congreso->imagenes ?? false)
    <div class="row g-2 mb-3">
        @foreach($congreso->imagenes as $img)
            <div class="col-3">
                <img src="{{ asset($img->imagen_path) }}" class="img-thumbnail">
                <button type="button" class="btn btn-sm btn-danger">Eliminar</button>
            </div>
        @endforeach
    </div>
@endif
```

#### Paso 6.5: Actualizar Controller Congreso
**Archivo:** `app/Http/Controllers/Admin/CongresoController.php`

Modificar métodos `store` y `update`:

```php
// Después de crear/actualizar el congreso
if ($request->hasFile('imagenes_galeria')) {
    foreach ($request->file('imagenes_galeria') as $index => $imagen) {
        $path = $this->storeGaleriaImagen($imagen);
        $congreso->imagenes()->create([
            'imagen_path' => $path,
            'orden' => $index,
        ]);
    }
}
```

Agregar método:
```php
private function storeGaleriaImagen($file): string
{
    $filename = Str::uuid()->toString() . '.' . $file->getClientOriginalExtension();
    $path = public_path('congresos/galeria');
    
    if (!is_dir($path)) {
        mkdir($path, 0755, true);
    }
    
    $file->move($path, $filename);
    return 'congresos/galeria/' . $filename;
}
```

#### Paso 6.6: Actualizar Vista Pública de Congreso
**Archivo:** `resources/views/congresos/show.blade.php`

Agregar galería de imágenes si existen:
```blade
@if($congreso->imagenes->count() > 0)
    <div class="row g-2 mt-4">
        @foreach($congreso->imagenes as $imagen)
            <div class="col-6 col-md-3">
                <a href="{{ asset($imagen->imagen_path) }}" data-lightbox="galeria">
                    <img src="{{ asset($imagen->imagen_path) }}" class="img-fluid rounded">
                </a>
            </div>
        @endforeach
    </div>
@endif
```

---

## 📊 Checklist de Implementación

### Semana 1: Fundamentos
- [ ] **Día 1-2:** Departamentos (migración + modelo + controller + vistas admin)
- [ ] **Día 3-4:** Seminarios (migración + modelo + controller + vistas admin)
- [ ] **Día 5:** Integración vistas públicas + Dashboard stats

### Semana 2: Contenido
- [ ] **Día 1-2:** Settings/Editor Welcome
- [ ] **Día 3-4:** Sistema de Noticias
- [ ] **Día 5:** Upload múltiple congresos + Testing

---

## 🔧 Comandos Útiles

```bash
# Crear migración
php artisan make:migration create_X_table

# Crear modelo
php artisan make:model NombreModelo

# Crear controller
php artisan make:controller Admin/NombreController

# Ejecutar migraciones
php artisan migrate

# Crear seeder
php artisan make:seeder NombreSeeder

# Ejecutar seeder específico
php artisan db:seed --class=NombreSeeder

# Limpiar cache (después de cambios en config/views/routes)
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan route:clear
```

---

## 💡 Tips de Implementación

1. **Copia el patrón de CongresoController** - Ya tienes un CRUD completo con imágenes, úsalo como plantilla
2. **Valida siempre los permisos** - Usa `admin.or.dev` middleware en rutas admin
3. **Usa slugs para URLs amigables** - Implementa `getRouteKeyName()` en modelos
4. **Gestiona bien las imágenes** - Elimina archivos al borrar registros
5. **Cachea los settings** - Evita queries repetidas en cada carga
6. **Haz seeders para datos iniciales** - Facilita el setup en nuevos ambientes

---

*Plan creado el: Mayo 2026*

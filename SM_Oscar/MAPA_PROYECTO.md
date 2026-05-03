# Mapa Completo del Proyecto UIMA

> **Sistema de Gestión de Contenidos para UIMA - FES Acatlán UNAM**
> 
> Fecha de generación: Mayo 2026

---

## 📁 Estructura General

```
SM_Oscar/
├── app/
│   ├── Http/
│   │   ├── Controllers/      # Controladores
│   │   └── Middleware/        # Middlewares de autenticación
│   ├── Mail/                  # Clases Mailable
│   ├── Models/               # Modelos Eloquent
│   └── Providers/
├── config/
│   └── uim.php               # Configuración institucional
├── database/
│   ├── migrations/           # Migraciones de base de datos
│   ├── factories/
│   └── seeders/
├── resources/
│   ├── views/                # Vistas Blade
│   ├── css/                  # Estilos (Vite)
│   └── js/                   # JavaScript (Vite)
├── routes/
│   ├── web.php               # Rutas web
│   └── api.php               # Rutas API
└── public/                   # Assets públicos
```

---

## 🗄️ Base de Datos - Migraciones

### Migraciones Existentes (8 archivos)

| Archivo | Descripción | Tabla | Campos Principales |
|---------|-------------|-------|-------------------|
| `0000_01_01_000001_create_permisos_table.php` | Permisos del sistema | `permisos` | `id`, `nombre`, `timestamps` |
| `0000_01_01_000002_create_roles_table.php` | Roles de usuario | `roles` | `id`, `nombre`, `timestamps` |
| `0001_01_01_000000_create_users_table.php` | Usuarios (auth) | `users`, `password_reset_tokens`, `sessions` | Ver detalle abajo |
| `0001_01_01_000001_create_cache_table.php` | Cache de Laravel | `cache`, `cache_locks` | - |
| `0001_01_01_000002_create_jobs_table.php` | Colas de Laravel | `jobs`, `job_batches`, `failed_jobs` | - |
| `2025_11_22_235257_create_personal_access_tokens_table.php` | Sanctum tokens | `personal_access_tokens` | Token API |
| `2025_11_24_030050_create_password_reset_codes_table.php` | Códigos de recuperación | `password_reset_codes` | `email`, `token`, `created_at` |
| `2026_04_04_120000_create_congresos_table.php` | Congresos/ Eventos | `congresos` | Ver detalle abajo |

### Estructura Detallada - Tabla `users`

```php
- id (bigint, PK)
- name (string) - Username único
- email (string, unique)
- email_verified_at (timestamp, nullable)
- password (string)
- permiso_id (FK -> permisos, nullable)
- rol_id (FK -> roles, nullable)
- active (boolean, default: true)
- nombre (string) - Nombre real
- apellido_paterno (string)
- apellido_materno (string)
- asignado (json, nullable) - Datos asignados
- rememberToken
- timestamps
```

### Estructura Detallada - Tabla `congresos`

```php
- id (bigint, PK)
- titulo (string)
- slug (string, unique) - URL amigable
- resumen (string, 500 chars, nullable)
- descripcion (text, nullable)
- imagen_portada (string, nullable) - Path a imagen
- fecha_inicio (date, nullable)
- fecha_fin (date, nullable)
- sede (string, 255, nullable)
- enlace_inscripcion (string, 2048, nullable)
- enlace_programa (string, 2048, nullable)
- enlace_sitio_web (string, 2048, nullable)
- activo (boolean, default: true)
- timestamps
```

---

## 🧩 Modelos

### 1. `User` - `/app/Models/User.php`

**Relaciones:**
- `permiso()` → `BelongsTo(Permiso::class)`
- `rol()` → `BelongsTo(Rol::class)`

**Traits:** `HasFactory`, `Notifiable`, `HasApiTokens` (Sanctum)

**Casts:**
- `email_verified_at` → datetime
- `password` → hashed
- `active` → boolean
- `asignado` → array

**Fillable:** `name`, `email`, `password`, `permiso_id`, `rol_id`, `active`, `nombre`, `apellido_paterno`, `apellido_materno`, `asignado`

### 2. `Congreso` - `/app/Models/Congreso.php`

**Scope:**
- `scopeActivos($query)` → Filtra `activo = true`

**Métodos:**
- `urlPortada()` → Retorna URL de imagen o default
- `getRouteKeyName()` → Retorna `'slug'` (para URLs amigables)

**Casts:**
- `fecha_inicio` → date
- `fecha_fin` → date
- `activo` → boolean

**Fillable:** Todos los campos excepto `id`, `timestamps`

### 3. `Rol` - `/app/Models/Rol.php`

- Tabla: `roles`
- Fillable: `nombre`
- Trait: `HasFactory`

### 4. `Permiso` - `/app/Models/Permiso.php`

- Tabla: `permisos`
- Fillable: `nombre`
- Trait: `HasFactory`

---

## 🎮 Controladores

### Controladores Web

| Controlador | Ubicación | Responsabilidad |
|-------------|-----------|-----------------|
| `HomeController` | `app/Http/Controllers/` | Página de inicio pública |
| `WebAuthController` | `app/Http/Controllers/` | Login/Register web (Sanctum session) |
| `WebPasswordResetController` | `app/Http/Controllers/` | Recuperación de contraseña web |
| `UserController` | `app/Http/Controllers/` | CRUD usuarios vía API (SuperAdmin) |

### Controladores API

| Controlador | Ubicación | Responsabilidad |
|-------------|-----------|-----------------|
| `AuthController` | `app/Http/Controllers/` | Login/Register API (Sanctum tokens) |
| `PasswordResetController` | `app/Http/Controllers/` | Recuperación de contraseña API |

### Controladores Admin

| Controlador | Ubicación | Responsabilidad |
|-------------|-----------|-----------------|
| `CongresoController` | `app/Http/Controllers/Admin/` | CRUD completo de congresos |

#### Métodos de `Admin\CongresoController`:

**Rutas Públicas:**
- `indexPublico()` → Lista paginada de congresos activos (`congresos.index`)
- `showPublico($congreso)` → Detalle de congreso activo (`congresos.show`)

**Rutas Admin (requieren auth):**
- `index()` → Lista todos los congresos paginados (`admin.congresos.index`)
- `create()` → Formulario de creación (`admin.congresos.create`)
- `store($request)` → Guarda nuevo congreso
- `edit($congreso)` → Formulario de edición (`admin.congresos.edit`)
- `update($request, $congreso)` → Actualiza congreso
- `destroy($congreso)` → Elimina congreso e imagen asociada
- `toggleActivo($congreso)` → Cambia estado activo/inactivo

**Métodos privados:**
- `validated($request, $ignoreId)` → Reglas de validación
- `uniqueSlug($titulo, $manualSlug, $ignoreId)` → Genera slug único
- `storePortada($file)` → Guarda imagen en `public/congresos/portadas/`
- `deletePortada($path)` → Elimina archivo de imagen

---

## 🛡️ Middleware

| Middleware | Ubicación | Función |
|------------|-----------|---------|
| `CheckSuperAdmin` | `app/Http/Middleware/` | Permiso=1 + Rol=1 → Acceso API admin |
| `EnsureAdminOrDeveloper` | `app/Http/Middleware/` | Permiso en [1,2] → Acceso web admin |
| `EnsureBearerTokenInSession` | `app/Http/Middleware/` | Verifica token en sesión |
| `EnsureRegistrationKey` | `app/Http/Middleware/` | Valida `X-Registration-Key` en header |

---

## 🌐 Rutas

### Rutas Web (`routes/web.php`)

```php
// Públicas
GET  /                          → HomeController@welcome
GET  /congreso                  → Admin\CongresoController@indexPublico
GET  /congresos/{slug}          → Admin\CongresoController@showPublico
GET  /investigacion             → View: investigacion
GET  /departamento              → View: departamento
GET  /boceto                    → View: boceto (con congresos)

// Auth Web
GET  /login                     → WebAuthController@showLogin
POST /login                     → WebAuthController@login
GET  /register                  → WebAuthController@showRegister
POST /register                  → WebAuthController@register
GET  /forgot-password           → WebPasswordResetController@showForgot
POST /forgot-password           → WebPasswordResetController@sendResetCode
GET  /reset-password            → WebPasswordResetController@showReset
POST /reset-password            → WebPasswordResetController@resetPassword
POST /logout                    → WebAuthController@logout

// Protegidas (auth.token)
GET  /dashboard                 → View: dashboard

// Admin (auth.token + admin.or.dev)
GET  /admin/dashboard           → View: admin.dashboard
GET  /admin/congresos           → Admin\CongresoController@index
GET  /admin/congresos/create    → Admin\CongresoController@create
POST /admin/congresos           → Admin\CongresoController@store
GET  /admin/congresos/{id}/edit → Admin\CongresoController@edit
PUT  /admin/congresos/{id}      → Admin\CongresoController@update
DELETE /admin/congresos/{id}    → Admin\CongresoController@destroy
PATCH /admin/congresos/{id}/activo → Admin\CongresoController@toggleActivo

GET  /admin/departamentos       → View: admin.departamentos.index
GET  /admin/seminarios          → View: admin.seminarios.index
GET  /admin/welcome             → View: admin.welcome.edit
```

### Rutas API (`routes/api.php`)

```php
// Públicas
POST /api/register              → AuthController@register (middleware: EnsureRegistrationKey)
POST /api/login                 → AuthController@login
POST /api/forgot-password         → PasswordResetController@sendResetLink
POST /api/reset-password        → PasswordResetController@reset
GET  /api/test                  → Test endpoint

// Protegidas (auth:sanctum)
GET  /api/user                  → AuthController@user
POST /api/logout                → AuthController@logout

// SuperAdmin (auth:sanctum + CheckSuperAdmin)
POST /api/users                 → UserController@store
POST /api/users/admin           → UserController@storeAdmin
PUT  /api/users/{id}            → UserController@update
PUT  /api/users/{id}/password   → UserController@changePassword
PATCH /api/users/{id}/status    → UserController@toggleStatus
DELETE /api/users/{id}          → UserController@destroy
```

---

## 🎨 Vistas Blade

### Layouts Principales

| Vista | Ubicación | Descripción |
|-------|-----------|-------------|
| `layouts.app` | `resources/views/layouts/` | Layout maestro con header UNAM, footer, nav móvil |
| `admin.layout` | `resources/views/admin/` | Layout admin con sidebar navegación |

### Vistas Públicas

| Vista | Ubicación | Secciones Incluidas |
|-------|-----------|---------------------|
| `welcome` | `resources/views/` | Hero, Propósito, Departamentos, Congresos, Noticias |
| `investigacion` | `resources/views/` | Página de seminarios/investigación con **formulario de inscripción mejorado** (tipo de usuario: Interno/Externo, número de cuenta condicional) |
| `departamento` | `resources/views/` | Página de departamentos |
| `boceto` | `resources/views/` | Prototipo/diseño de congresos |

### Vistas Dashboard (includes)

| Vista | Ubicación | Descripción |
|-------|-----------|-------------|
| `dashboard.hero` | `resources/views/dashboard/` | Carrusel principal de bienvenida |
| `dashboard.proposito` | `resources/views/dashboard/` | Sección "¿Qué es la UIMA?" |
| `dashboard.departamentos` | `resources/views/dashboard/` | Grid de 4 departamentos |
| `dashboard.congresos` | `resources/views/dashboard/` | Lista dinámica de congresos activos |
| `dashboard.noticias` | `resources/views/dashboard/` | Últimas noticias y eventos |

### Vistas Departamentos (includes)

| Vista | Ubicación | Descripción |
|-------|-----------|-------------|
| `departamentos.hero` | `resources/views/departamentos/` | Hero de página departamento |
| `departamentos.sidebar` | `resources/views/departamentos/` | Navegación lateral |
| `departamentos.mobile-sidebar` | `resources/views/departamentos/` | Navegación móvil |
| `departamentos.objetivo` | `resources/views/departamentos/` | Objetivos del departamento |
| `departamentos.proyectos` | `resources/views/departamentos/` | Lista de proyectos |
| `departamentos.profile` | `resources/views/departamentos/` | Perfiles de investigadores |
| `departamentos.data` | `resources/views/departamentos/` | Datos/contacto |

### Vistas Congresos (público)

| Vista | Ubicación | Descripción |
|-------|-----------|-------------|
| `congresos.index` | `resources/views/congresos/` | Listado público de congresos |
| `congresos.show` | `resources/views/congresos/` | Detalle individual de congreso |

### Vistas Auth

| Vista | Ubicación | Propósito |
|-------|-----------|-----------|
| `auth.login` | `resources/views/auth/` | Formulario de login |
| `auth.register` | `resources/views/auth/` | Formulario de registro |
| `auth.forgot-password` | `resources/views/auth/` | Solicitar código de recuperación |
| `auth.reset-password` | `resources/views/auth/` | Establecer nueva contraseña |

### Vistas Admin

| Vista | Ubicación | Estado | Descripción |
|-------|-----------|--------|-------------|
| `admin.dashboard` | `resources/views/admin/` | ✅ Funcional | Panel de administración principal |
| `admin.congresos.index` | `resources/views/admin/congresos/` | ✅ Funcional | Listado de congresos (CRUD completo) |
| `admin.congresos.create` | `resources/views/admin/congresos/` | ✅ Funcional | Formulario crear congreso |
| `admin.congresos.edit` | `resources/views/admin/congresos/` | ✅ Funcional | Formulario editar congreso |
| `admin.congresos._form` | `resources/views/admin/congresos/` | ✅ Funcional | Partial formulario reutilizable |
| `admin.departamentos.index` | `resources/views/admin/departamentos/` | ⚠️ Mock | Vista estática con datos hardcodeados |
| `admin.seminarios.index` | `resources/views/admin/seminarios/` | ⚠️ Mock | Vista estática con datos hardcodeados |
| `admin.welcome.edit` | `resources/views/admin/welcome/` | ⚠️ Mock | Vista estática, sin funcionalidad de guardado |

### Vistas Email

| Vista | Ubicación | Propósito |
|-------|-----------|-----------|
| `emails.password_reset_code` | `resources/views/emails/` | Template correo con código de recuperación |
| `emails.registration_success` | `resources/views/emails/` | Template correo de bienvenida |

---

## ✅ Funcionalidades Implementadas

### Sistema de Autenticación
- [x] Registro de usuarios web con validación de duplicados
- [x] Login web con Sanctum (token en sesión)
- [x] Logout con invalidación de token
- [x] Registro API con clave de acceso (`X-Registration-Key`)
- [x] Login API con Bearer tokens
- [x] Recuperación de contraseña vía código de 8 dígitos (web y API)
- [x] Middleware de verificación de permisos (SuperAdmin)

### Gestión de Usuarios (API)
- [x] Crear usuario normal
- [x] Crear usuario administrativo (con permisos/roles)
- [x] Actualizar usuario
- [x] Cambiar contraseña
- [x] Activar/Desactivar usuario
- [x] Eliminar usuario

### Gestión de Congresos (Admin Web)
- [x] Listar todos los congresos (paginado)
- [x] Crear congreso con imagen de portada
- [x] Editar congreso (con reemplazo de imagen)
- [x] Eliminar congreso (con eliminación de imagen)
- [x] Cambiar estado activo/inactivo
- [x] Generación automática de slugs únicos
- [x] Validación de campos (fechas, imágenes, URLs)
- [x] Visualización pública de congresos activos
- [x] Página de detalle individual de congreso

### Frontend Público
- [x] Layout institucional UNAM (header, footer, nav móvil)
- [x] Hero carrusel en página principal
- [x] Sección Propósito
- [x] Grid de departamentos (4 departamentos)
- [x] Lista dinámica de congresos activos
- [x] Sección noticias
- [x] Página de investigación/seminarios con **formulario de inscripción**:
  - Selector tipo de usuario (Interno FES Acatlán / Externo)
  - Campo condicional número de cuenta (solo internos)
  - Badges visuales indicando tipo
  - Animaciones CSS para transiciones
- [x] Página de departamentos
- [x] Modal emergente de próximo congreso
- [x] Diseño responsive (Bootstrap 5.3)

### Configuración
- [x] Configuración centralizada UIM (`config/uim.php`)
- [x] Variables de entorno para URLs institucionales
- [x] URLs de redes sociales configurables
- [x] Datos de contacto configurables

### Assets (CSS/JS)
- [x] `resources/css/investigacion.css` - Estilos de página de investigación con animaciones para formulario de inscripción
- [x] `resources/js/investigacion.js` - JavaScript para gestión de seminarios y formulario de inscripción con lógica de tipo de usuario

---

## 🔧 Funcionalidades Pendientes / Por Implementar

### 🔴 Prioridad Alta

#### 1. Sistema Completo de Departamentos
**Migración necesaria:**
```php
Schema::create('departamentos', function (Blueprint $table) {
    $table->id();
    $table->string('siglas', 10)->unique();        // DTA, IPAJ, DPE, DIE
    $table->string('nombre');
    $table->string('color', 7)->default('#000000'); // Color identidad
    $table->text('descripcion')->nullable();
    $table->string('imagen_banner')->nullable();
    $table->string('coordinador')->nullable();
    $table->string('email_contacto')->nullable();
    $table->boolean('activo')->default(true);
    $table->timestamps();
});
```

**Controlador:** `Admin\DepartamentoController`
- CRUD completo de departamentos
- Subida de imagen de banner
- Asignación de coordinadores

**Vistas Admin:**
- `admin.departamentos.index` → Lista real con datos de BD
- `admin.departamentos.create` → Formulario de creación
- `admin.departamentos.edit` → Formulario de edición

**Vistas Públicas:**
- Actualizar `departamento.blade.php` para usar datos dinámicos
- Filtrar proyectos/investigadores por departamento

---

#### 2. Sistema de Seminarios
**Migración necesaria:**
```php
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
    $table->foreignId('departamento_id')->nullable()->constrained('departamentos');
    $table->timestamps();
});
```

**Controlador:** `Admin\SeminarioController`
- CRUD completo de seminarios
- Relación con departamentos
- Gestión de estados

**Vistas Admin:**
- `admin.seminarios.index` → Lista real con filtros
- `admin.seminarios.create`
- `admin.seminarios.edit`

**Vistas Públicas:**
- Actualizar `investigacion.blade.php` con seminarios dinámicos (⚠️ **Formulario de inscripción ya implementado en frontend** - ver sección #10)
- Página de detalle de seminario individual

---

#### 3. Gestión de Contenido Welcome (Página Principal)
**Migración necesaria:**
```php
Schema::create('configuracion_welcome', function (Blueprint $table) {
    $table->id();
    $table->string('clave')->unique();
    $table->text('valor')->nullable();
    $table->string('tipo', 20)->default('texto'); // texto, imagen, html
    $table->string('grupo', 50)->default('general');
    $table->timestamps();
});
```

**Controlador:** `Admin\WelcomeController`
- Editar bloques de contenido
- Subir/ cambiar imágenes del carrusel
- Gestionar texto de propósito
- Gestionar noticias destacadas

**Vistas Admin:**
- `admin.welcome.edit` → Formulario funcional con guardado
- Secciones por bloques: Hero, Propósito, Noticias

---

### 🟡 Prioridad Media

#### 4. Gestión de Noticias / Blog
**Migración:**
```php
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
```

**Vistas Admin:**
- `admin.noticias.index`
- `admin.noticias.create`
- `admin.noticias.edit`

---

#### 5. Gestión de Proyectos de Investigación
**Migración:**
```php
Schema::create('proyectos', function (Blueprint $table) {
    $table->id();
    $table->string('titulo');
    $table->text('descripcion');
    $table->string('responsable');
    $table->foreignId('departamento_id')->constrained('departamentos');
    $table->enum('estado', ['activo', 'concluido', 'suspendido'])->default('activo');
    $table->date('fecha_inicio');
    $table->date('fecha_fin_estimada')->nullable();
    $table->string('imagen')->nullable();
    $table->timestamps();
});
```

**Vistas Admin:**
- CRUD proyectos por departamento
- Asignación de investigadores

---

#### 6. Gestión de Investigadores/Académicos
**Migración:**
```php
Schema::create('investigadores', function (Blueprint $table) {
    $table->id();
    $table->string('nombre');
    $table->string('apellido_paterno');
    $table->string('apellido_materno');
    $table->string('email')->unique();
    $table->string('grado_academico'); // Dr., Mtra., Mtro., Lic.
    $table->string('fotografia')->nullable();
    $table->text('biografia')->nullable();
    $table->string('lineas_investigacion')->nullable();
    $table->foreignId('departamento_id')->constrained('departamentos');
    $table->string('cv_link')->nullable();
    $table->boolean('activo')->default(true);
    $table->timestamps();
});
```

---

#### 7. Galería de Imágenes por Congreso
**Migración:**
```php
Schema::create('congreso_imagenes', function (Blueprint $table) {
    $table->id();
    $table->foreignId('congreso_id')->constrained('congresos')->onDelete('cascade');
    $table->string('imagen_path');
    $table->string('titulo')->nullable();
    $table->integer('orden')->default(0);
    $table->timestamps();
});
```

---

### 🟢 Prioridad Baja / Mejoras

#### 8. Estadísticas y Dashboard Avanzado
- Contadores: usuarios, congresos activos, seminarios próximos
- Gráficas de visitas (si se implementa analytics)
- Actividad reciente (logs)

#### 9. Sistema de Archivos/Documentos
**Migración:**
```php
Schema::create('documentos', function (Blueprint $table) {
    $table->id();
    $table->string('titulo');
    $table->string('archivo_path');
    $table->enum('tipo', ['convocatoria', 'programa', 'memoria', 'presentacion']);
    $table->morphs('documentable'); // Para congresos, seminarios, etc.
    $table->timestamps();
});
```

#### 10. Sistema de Inscripciones (Backend Pendiente)
> **Estado actual:** ✅ Frontend implementado en `investigacion.blade.php` | ⏳ Backend pendiente

**Campos del formulario ya implementados (vista):**
- Nombre completo
- Correo electrónico
- **Tipo de usuario** (Interno FES Acatlán / Externo)
- **Número de cuenta** (condicional, solo internos, validación 8-9 dígitos)
- Selector de seminario
- Motivo de inscripción

**Migración propuesta:**
```php
Schema::create('inscripciones', function (Blueprint $table) {
    $table->id();
    $table->foreignId('seminario_id')->constrained('seminarios');
    $table->string('nombre_completo');
    $table->string('email');
    $table->enum('tipo_usuario', ['interno', 'externo']);
    $table->string('numero_cuenta', 9)->nullable(); // Solo internos
    $table->text('motivo');
    $table->enum('estado', ['pendiente', 'confirmada', 'cancelada'])->default('pendiente');
    $table->timestamp('fecha_inscripcion');
    $table->timestamps();
});
```

**Backend necesario:**
- API endpoint: `POST /api/inscripciones` (para seminarios)
- Controlador: `InscripcionController`
- Validación: número de cuenta requerido solo si tipo = interno
- Notificación por correo al confirmar inscripción

#### 11. Gestión de Permisos y Roles (Avanzado)
- Tabla pivote `permiso_rol`
- Permisos granulares (view, create, edit, delete)
- Roles dinámicos desde admin (no solo SuperAdmin)

#### 12. Configuración del Sistema (Admin)
- Vista `admin.configuracion.index`
- Editar datos de contacto UNAM
- Configurar redes sociales
- Cambiar logo institucional
- Colores institucionales (UNAM)

---

## 📝 Archivos de Configuración y Documentación

| Archivo | Ubicación | Descripción |
|---------|-----------|-------------|
| `config/uim.php` | `config/` | Configuración institucional (URLs, contacto, redes) |
| `DESIGN.md` | Raíz | Guía de diseño y estilos visuales |
| `API_GUIDE.md` | Raíz | Documentación de endpoints API |
| `README.md` | Raíz | Instalación y configuración general |

---

## 🎯 Estructura de Permisos

```
Sistema de Autorización Actual:

SuperAdmin (permiso_id=1, rol_id=1)
├── Acceso total API (users CRUD)
└── Acceso total Web Admin (todos los módulos)

Admin/Desarrollador (permiso_id=2, rol_id=2)
├── Acceso Web Admin (módulos operativos)
└── No accede a gestión de usuarios API

Usuario Normal (sin permiso/rol asignado)
├── Acceso a vistas públicas
├── Login propio
└── Dashboard básico
```

---

## 🚀 Próximos Pasos Recomendados

1. **Implementar Departamentos** (migración + controller + views)
2. **Implementar Seminarios** (migración + controller + views)
3. **Hacer funcional el editor de Welcome** (settings table)
4. **Agregar Noticias** (blog básico)
5. **Mejorar dashboard admin** con estadísticas reales
6. **Agregar upload múltiple de imágenes** a congresos

---

*Documento generado automáticamente. Última actualización: Mayo 2026*

# Plan: Guía Técnica del Proyecto SM_Oscar (SCRUMS_UIM)

## Descripción del proyecto

El proyecto **SM_Oscar** es una plataforma web construida con **Laravel 11** (Blade + Sanctum) que gestiona:
- Congresos académicos y científicos
- Seminarios / investigación
- Departamentos universitarios
- Inscripciones de usuarios a eventos
- Noticias y configuración del sitio

Cuenta con **dos áreas bien diferenciadas**:
1. **Área Pública + Usuario autenticado** — accesible desde `/`, `/congreso`, `/investigacion`, `/dashboard`, etc.
2. **Panel de Administración** — accesible desde `/admin/*`, protegido por middleware `admin.or.dev`.

Adicionalmente tiene una **API REST** (`/api/*`) protegida con Laravel Sanctum.

---

## Estructura de la Guía Técnica

El documento final se llamará `GUIA_TECNICA.md` y se ubicará en la raíz del proyecto.

---

## Secciones planeadas

### 1. Introducción y Stack Tecnológico
- Framework: Laravel 11
- Base de datos: MySQL/MariaDB
- Autenticación: Sanctum (API) + Sesión web personalizada con middleware `auth.token`
- Vistas: Blade templating
- Stack front: CSS + JS vanilla (sin React en este proyecto)

---

### 2. Base de Datos

#### 2.1 Migraciones (20 archivos, orden cronológico)

| # | Archivo | Tabla / Acción |
|---|---------|---------------|
| 1 | `0000_01_01_000001` | `permisos` |
| 2 | `0000_01_01_000002` | `roles` |
| 3 | `0001_01_01_000000` | `users` |
| 4 | `0001_01_01_000001` | `cache` |
| 5 | `0001_01_01_000002` | `jobs` |
| 6 | `2025_11_22` | `personal_access_tokens` |
| 7 | `2025_11_24` | `password_reset_codes` |
| 8 | `2026_04_04` | `congresos` |
| 9 | `2026_05_03_000000` | `departamentos` |
| 10 | `2026_05_03_100000` | `seminarios` |
| 11 | `2026_05_03_200000` | `settings` |
| 12 | `2026_05_03_300000` | `noticias` |
| 13 | `2026_05_03_400000` | `congreso_imagenes` |
| 14 | `2026_05_04` | ALTER `departamentos` (campos adicionales) |
| 15 | `2026_05_06_042110` | ALTER `seminarios` (categoría) |
| 16 | `2026_05_06_045205` | ALTER `seminarios` (objetivo) + CREATE `funciones` |
| 17 | `2026_05_06_051934` | ALTER `seminarios` (cupo) |
| 18 | `2026_05_06_051937` | `inscripciones` |
| 19 | `2026_05_06_235036` | ALTER `congresos` (cupo) |
| 20 | `2026_05_07` | ALTER `users` (verification_token) |

Cada migración se documentará con: **propósito**, **columnas/índices**, y **relaciones**.

#### 2.2 Seeders
- `DatabaseSeeder` (orquestador)
- `DepartamentoSeeder`
- `CongresoSeeder`
- `SeminarioSeeder`
- `SettingsSeeder`

---

### 3. Modelos (11 modelos)

Para cada modelo se documentará: tabla asociada, fillable, relaciones, scopes y métodos especiales.

| Modelo | Tabla | Notas |
|--------|-------|-------|
| `User` | `users` | Autenticación, roles |
| `Rol` | `roles` | — |
| `Permiso` | `permisos` | — |
| `Congreso` | `congresos` | Scope `activos()`, imágenes |
| `CongresoImagen` | `congreso_imagenes` | Belongs to Congreso |
| `Seminario` | `seminarios` | Categorías, cupo |
| `Departamento` | `departamentos` | Funciones |
| `FuncionDepartamento` | `funciones_departamento` | Belongs to Departamento |
| `Inscripcion` | `inscripciones` | Seminarios y Congresos |
| `Noticia` | `noticias` | — |
| `Setting` | `settings` | Configuración global |

---

### 4. Controladores y Rutas

Se divide en **Área Pública/Usuario** y **Área Admin**, más la API.

#### 4.1 Área Pública y Usuarios

**Rutas públicas (sin auth)**

| Método | URI | Controlador | Descripción |
|--------|-----|-------------|-------------|
| GET | `/` | `HomeController@welcome` | Página de inicio |
| GET | `/congreso` | `Admin\CongresoController@indexPublico` | Listado de congresos |
| GET | `/congresos/{slug}` | `Admin\CongresoController@showPublico` | Detalle de congreso |
| GET | `/investigacion` | `SeminarioController@index` | Listado de seminarios |
| POST | `/inscripcion` | `InscripcionController@store` | Inscripción a seminario |
| POST | `/inscripcion-congreso` | `InscripcionController@storeCongreso` | Inscripción a congreso |
| GET | `/departamento/{siglas}` | `DepartamentoController@show` | Perfil de departamento |

**Rutas de autenticación web**

| Método | URI | Controlador | Descripción |
|--------|-----|-------------|-------------|
| GET/POST | `/login` | `WebAuthController` | Login |
| GET/POST | `/register` | `WebAuthController` | Registro |
| GET/POST | `/forgot-password` | `WebPasswordResetController` | Recuperar contraseña |
| GET/POST | `/reset-password` | `WebPasswordResetController` | Restablecer contraseña |
| POST | `/logout` | `WebAuthController@logout` | Cerrar sesión |

**Ruta de usuario autenticado**

| Método | URI | Descripción |
|--------|-----|-------------|
| GET | `/dashboard` | Dashboard del usuario (middleware `auth.token`) |

**Controladores del área usuario:**
- `HomeController` — composición de la landing page
- `WebAuthController` — sesión web (login/register/logout)
- `WebPasswordResetController` — recuperación de contraseña vía web
- `InscripcionController` — inscripciones públicas
- `DepartamentoController` — vista pública de departamento
- `SeminarioController` — vista pública de investigación/seminarios

---

#### 4.2 Área de Administración (`/admin/*`)

Protegida por: `web` → `auth.token` → `admin.or.dev`

| Método | URI | Controlador | Descripción |
|--------|-----|-------------|-------------|
| GET | `/admin/dashboard` | `Admin\DashboardController@index` | Dashboard admin |
| PATCH | `/admin/congresos/{id}/activo` | `Admin\CongresoController@toggleActivo` | Toggle activo |
| RESOURCE | `/admin/congresos` | `Admin\CongresoController` | CRUD congresos |
| RESOURCE | `/admin/departamentos` | `Admin\DepartamentoController` | CRUD departamentos |
| RESOURCE | `/admin/seminarios` | `Admin\SeminarioController` | CRUD seminarios |
| GET/POST | `/admin/welcome` | `Admin\WelcomeController` | Editar página de bienvenida |
| GET | `/admin/usuarios` | `UserController@index` | Listado usuarios |
| GET | `/admin/usuarios/{id}/edit` | `UserController@edit` | Editar usuario |
| PUT | `/admin/usuarios/{id}` | `UserController@update` | Actualizar usuario |
| PUT | `/admin/usuarios/{id}/password` | `UserController@changePassword` | Cambiar contraseña |
| PATCH | `/admin/usuarios/{id}/status` | `UserController@toggleStatus` | Activar/desactivar |
| GET | `/admin/inscripciones` | `Admin\InscripcionController@index` | Ver inscripciones seminarios |
| DELETE | `/admin/inscripciones/{id}` | `Admin\InscripcionController@destroy` | Eliminar inscripción |
| GET | `/admin/inscripciones-congresos` | `Admin\InscripcionCongresoController@index` | Ver inscripciones congresos |
| DELETE | `/admin/inscripciones-congresos/{id}` | `Admin\InscripcionCongresoController@destroy` | Eliminar inscripción congreso |

**Controladores del área admin:**
- `Admin\DashboardController`
- `Admin\CongresoController`
- `Admin\DepartamentoController`
- `Admin\SeminarioController`
- `Admin\WelcomeController`
- `Admin\InscripcionController`
- `Admin\InscripcionCongresoController`
- `UserController` (compartido, con protección admin)

---

#### 4.3 API REST (`/api/*`)

| Método | URI | Middleware | Descripción |
|--------|-----|------------|-------------|
| POST | `/api/register` | `EnsureRegistrationKey` | Registro vía API |
| POST | `/api/login` | — | Login |
| POST | `/api/forgot-password` | — | Solicitar reset |
| POST | `/api/reset-password` | — | Resetear contraseña |
| GET | `/api/user` | `auth:sanctum` | Datos del usuario actual |
| POST | `/api/logout` | `auth:sanctum` | Logout |
| POST | `/api/users` | `auth:sanctum` + `CheckSuperAdmin` | Crear usuario |
| POST | `/api/users/admin` | `auth:sanctum` + `CheckSuperAdmin` | Crear admin |
| PUT | `/api/users/{id}` | `auth:sanctum` + `CheckSuperAdmin` | Actualizar usuario |
| PUT | `/api/users/{id}/password` | `auth:sanctum` + `CheckSuperAdmin` | Cambiar contraseña |
| PATCH | `/api/users/{id}/status` | `auth:sanctum` + `CheckSuperAdmin` | Toggle status |
| DELETE | `/api/users/{id}` | `auth:sanctum` + `CheckSuperAdmin` | Eliminar usuario |

---

### 5. Vistas (Blade)

#### 5.1 Layouts
- `layouts/app.blade.php` — layout principal público
- `admin/layout.blade.php` — layout del panel admin

#### 5.2 Vistas Públicas / Usuario

| Vista | Propósito |
|-------|-----------|
| `welcome.blade.php` | Página de inicio (ensamblada de partials) |
| `dashboard/hero.blade.php` | Sección hero |
| `dashboard/congresos.blade.php` | Congresos en la landing |
| `dashboard/noticias.blade.php` | Noticias recientes |
| `dashboard/departamentos.blade.php` | Tarjetas de departamentos |
| `dashboard/eventos-proximos.blade.php` | Próximos eventos |
| `dashboard/proposito.blade.php` | Sección propósito/misión |
| `congresos/index.blade.php` | Listado público de congresos |
| `congresos/show.blade.php` | Detalle de congreso + formulario de inscripción |
| `investigacion.blade.php` | Listado de seminarios |
| `departamento.blade.php` | Vista pública de departamento |
| `departamentos/` (partials) | Hero, sidebar, objetivo, proyectos, etc. |
| `auth/login.blade.php` | Formulario de login |
| `auth/register.blade.php` | Formulario de registro |
| `auth/forgot-password.blade.php` | Solicitar reset |
| `auth/reset-password.blade.php` | Nueva contraseña |

#### 5.3 Vistas del Panel Admin

| Vista | Propósito |
|-------|-----------|
| `admin/dashboard.blade.php` | Dashboard admin |
| `admin/layout.blade.php` | Layout admin compartido |
| `admin/congresos/index.blade.php` | Listado de congresos |
| `admin/congresos/create.blade.php` | Formulario crear |
| `admin/congresos/edit.blade.php` | Formulario editar |
| `admin/congresos/_form.blade.php` | Partial del formulario |
| `admin/seminarios/index.blade.php` | Listado de seminarios |
| `admin/seminarios/create.blade.php` | Formulario crear |
| `admin/seminarios/edit.blade.php` | Formulario editar |
| `admin/seminarios/_form.blade.php` | Partial del formulario |
| `admin/departamentos/index.blade.php` | Listado de departamentos |
| `admin/departamentos/create.blade.php` | Formulario crear |
| `admin/departamentos/edit.blade.php` | Formulario editar |
| `admin/departamentos/_form.blade.php` | Partial del formulario |
| `admin/usuarios/index.blade.php` | Listado de usuarios |
| `admin/usuarios/edit.blade.php` | Editar usuario |
| `admin/usuarios/_form.blade.php` | Partial del formulario |
| `admin/inscripciones/index.blade.php` | Inscripciones a seminarios |
| `admin/inscripciones_congresos/index.blade.php` | Inscripciones a congresos |
| `admin/welcome/edit.blade.php` | Editor de la página de bienvenida |

---

## Plan de redacción de la Guía

El documento se creará como `GUIA_TECNICA.md` en la raíz del proyecto (`SM_Oscar/`).

### Fase 1 — Base de datos (Migraciones + Seeders)
- Leer cada archivo de migración
- Documentar campos, tipos, índices, claves foráneas

### Fase 2 — Modelos
- Leer cada Model
- Documentar: fillable, casts, relaciones, scopes, métodos

### Fase 3 — Controladores y Rutas
- Documentar cada controlador con sus métodos
- Vincular cada método a su ruta correspondiente
- Separar área pública, área admin y API

### Fase 4 — Vistas
- Documentar cada vista indicando su propósito, variables recibidas y componentes que incluye
- Separar vistas públicas de vistas admin

### Entregable
- Archivo único `GUIA_TECNICA.md` en `/Users/oscarprime/Downloads/github/SCRUMS_UIM/SM_Oscar/`
- Estructura con secciones colapsables (usando headings de Markdown)
- Tablas para rutas, columnas y relaciones
- Bloques de código para los fragmentos más relevantes

---

## Preguntas abiertas

> [!IMPORTANT]
> **¿Qué nivel de detalle quieres en el código?**
> ¿Solo describir los métodos y su propósito, o también incluir fragmentos de código de los controladores/modelos dentro de la guía?

> [!IMPORTANT]
> **¿Incluimos la API REST como sección separada o integrada en la guía?**
> Actualmente la API y la web comparten algunos controladores (`UserController`).

> [!NOTE]
> **¿El archivo `boceto.blade.php` y `depaetamento.blade copy.php` son borradores?**
> Hay archivos que parecen temporales/prueba. ¿Los incluimos en la guía o los omitimos?

> [!NOTE]
> **¿Quieres que la guía incluya diagramas de relaciones de tablas (ERD en texto/Mermaid)?**


# Guía de contenido institucional UIM / FES Acatlán

Este documento indica **dónde actualizar** textos, imágenes y enlaces cuando la UNAM o la UIM entreguen material oficial. El objetivo es **homologar** el sitio y facilitar una **segunda etapa** (panel administrador) donde esos mismos datos puedan guardarse en base de datos y editarse sin tocar archivos.

---

## 1. Enfoque recomendado (etapa actual → etapa admin)

| Etapa | Qué hacer |
|--------|-----------|
| **Ahora** | Ajustar valores en `.env` (URLs y contacto) y archivos listados abajo (textos e imágenes). |
| **Después** | Migrar lo mismo a tablas Laravel (`settings`, `paginas`, `carrusel_slides`, `eventos`, etc.) y leer con `Model::` o `View::share` en lugar de `config()` fijo. |

La clave **`config/uim.php`** centraliza URLs y contacto: hoy lee de `.env`; mañana puedes sustituir la fuente por consultas a BD sin cambiar todas las vistas (solo el proveedor de configuración o un `ViewComposer`).

---

## 2. Archivo central: `config/uim.php`

Aquí están los **valores por defecto** y el mapeo a variables de entorno.

### 2.1 URLs (`urls.*`)

| Clave en config | Variable `.env` | Uso en vistas |
|-----------------|-----------------|---------------|
| `portal_fes` | `UIM_URL_PORTAL_FES` | Portal general FES Acatlán. |
| `uim_oficial` | `UIM_URL_UIM_OFICIAL` | Sitio UIM dentro del portal. |
| `revista_figuras` | `UIM_URL_REVISTA_FIGURAS` | Revista FIGURAS. |
| `publicaciones` | `UIM_URL_PUBLICACIONES` | Enlace pie “Publicaciones” (hoy `#` si no hay URL). |
| `convocatorias` | `UIM_URL_CONVOCATORIAS` | Enlace pie “Convocatorias”. |
| `podcast_uim` | `UIM_URL_PODCAST_UIM` | Enlace pie “Podcast UIM”. |
| `contacto_formulario` | `UIM_URL_CONTACTO` | Botón “Contacto” del pie. |
| `informacion` | `UIM_URL_INFORMACION` | Botón “Información” del pie. |

**Vistas que usan estas claves:** `resources/views/layouts/app.blade.php` (footer), `resources/views/welcome.blade.php` (menú lateral, tarjetas, botones).

### 2.2 Contacto (`contacto.*`)

| Clave | Variable `.env` | Notas |
|--------|-----------------|--------|
| `direccion` | `UIM_CONTACTO_DIRECCION` | Texto visible. |
| `telefono` | `UIM_CONTACTO_TELEFONO` | Texto visible (puede llevar espacios). |
| `telefono_enlace` | `UIM_CONTACTO_TELEFONO_ENLACE` | Debe ser URI válida, p. ej. `tel:+525556231333`. |
| `correo` | `UIM_CONTACTO_CORREO` | Usado en `mailto:`. |
| `web_etiqueta` | `UIM_CONTACTO_WEB_ETIQUETA` | Texto mostrado junto al ícono (puede diferir de la URL). |

### 2.3 Redes sociales (`redes_sociales.*`)

| Clave | Variable `.env` |
|--------|-----------------|
| `facebook` | `UIM_REDES_FACEBOOK` |
| `twitter` | `UIM_REDES_TWITTER` |
| `instagram` | `UIM_REDES_INSTAGRAM` |
| `youtube` | `UIM_REDES_YOUTUBE` |
| `spotify` | `UIM_REDES_SPOTIFY` |

Mientras la UNAM no confirme enlaces, el valor por defecto es `#`. Sustituye por la URL completa (con `https://`).

### 2.4 Fragmento para copiar en `.env`

Cuando tengas los datos oficiales, agrega (o edita) en la raíz del proyecto Laravel (`SM_Oscar/.env`):

```env
# --- UIM / FES (contenido institucional) ---
UIM_URL_PORTAL_FES=https://www.acatlan.unam.mx/
UIM_URL_UIM_OFICIAL=https://www.acatlan.unam.mx/uim
UIM_URL_REVISTA_FIGURAS=https://revistafiguras.acatlan.unam.mx/index.php/figuras/index

UIM_URL_PUBLICACIONES=
UIM_URL_CONVOCATORIAS=
UIM_URL_PODCAST_UIM=
UIM_URL_CONTACTO=
UIM_URL_INFORMACION=

UIM_CONTACTO_DIRECCION="Av. Alcanfores 186"
UIM_CONTACTO_TELEFONO="+52 55 5623 1333"
UIM_CONTACTO_TELEFONO_ENLACE=tel:+525556231333
UIM_CONTACTO_CORREO=uim@acatlan.unam.mx
UIM_CONTACTO_WEB_ETIQUETA=www.acatlan.unam.mx/uim

UIM_REDES_FACEBOOK=
UIM_REDES_TWITTER=
UIM_REDES_INSTAGRAM=
UIM_REDES_YOUTUBE=
UIM_REDES_SPOTIFY=
```

Después de cambiar `.env`:

```bash
php artisan config:clear
```

(Si usas `config:cache` en producción, vuelve a ejecutarlo tras actualizar `.env`.)

---

## 3. Página de inicio: `resources/views/welcome.blade.php`

| Sección | Qué cambiar | Notas |
|---------|-------------|--------|
| Carrusel superior (`#carousel`) | Rutas `asset('dashboard/imgN.jpg')`, textos en `<h2 class="slide-title">`, atributos `alt` | Imágenes físicas: carpeta `public/dashboard/`. |
| Menú lateral | Etiquetas de enlace; rutas internas ya van a `/investigacion`, `/departamento`, `#uim-proposito` | URLs externas salen de `config('uim.urls.*')`. |
| Bloque principal (`#uim-proposito`) | Párrafos bajo el encabezado “UIM — Propósito…” | Texto legal o institucional debe validarse con la UIM. |
| Imagen lateral del bloque principal | `asset('dashboard/investigacion.jpg')` | Sustituir archivo en `public/dashboard/`. |
| Carrusel de tarjetas derecho (`#tarjetasCarousel`) | Textos dentro de `.bloque-sec` | Mantener coherencia con menú Investigación del portal FES. |
| Carrusel de eventos (`#eventosCarousel`) | Imágenes, títulos y `href` de cada tarjeta | Hoy son de demostración; ideal: enlazar a rutas Laravel o URLs oficiales. |
| Script “Ver más” | Lógica en `@push('scripts')` | Solo comportamiento; el contenido está en el HTML de cada tarjeta. |

**Ancla:** el id `uim-proposito` no debe renombrarse sin actualizar enlaces en `welcome.blade.php`, `layouts/app.blade.php` y esta guía.

---

## 4. Layout global: `resources/views/layouts/app.blade.php`

| Zona | Qué cambiar |
|------|-------------|
| Header | Logos: `public/header/logo_unam.png`, `logo_unam_fesa.png`. Título bajo `<h1>`. |
| Footer — columna 1 | Textos “UIM FES Acatlán”; iconos de redes → `config('uim.redes_sociales.*')`. |
| Footer — enlaces rápidos | Ya homologados con Propósito, Seminarios, Departamentos, FIGURAS, portal FES, etc. |
| Footer — contacto | Datos desde `config('uim.contacto.*')` y botones desde `config('uim.urls.*')`. |

---

## 5. Otras vistas Blade frecuentes

| Archivo | Contenido a homologar |
|---------|------------------------|
| `resources/views/investigacion.blade.php` | Títulos de sección; datos dinámicos en `resources/js/investigacion.js` (seminarios de ejemplo). |
| `resources/views/departamento.blade.php` | Textos e imágenes en `public/departamentos/`; estilos en `resources/css/departamentos.css`. |
| `resources/views/auth/*.blade.php` | Mensajes legales o de aviso si la UIM los pide. |
| `resources/views/emails/*.blade.php` | Firmas y enlaces en correos transaccionales. |

---

## 6. Imágenes y assets estáticos

| Carpeta `public/` | Uso |
|-------------------|-----|
| `header/` | Logos UNAM y FES (header en todas las páginas). |
| `dashboard/` | Carrusel principal, imagen de investigación en welcome, miniaturas de eventos de ejemplo. |
| `departamentos/` | Banner y tarjetas de la vista departamentos. |

**Permisos de uso:** confirma con la UNAM si las fotografías pueden publicarse en este sitio (derechos de autor y imagen institucional).

---

## 7. Estilos (identidad visual)

| Archivo | Qué tocar |
|---------|-----------|
| `resources/css/app.css` | Variables `:root` (azul/dorado UNAM) **solo si** la institución entrega nueva guía de color; hoy están alineadas a la identidad usada en el proyecto. |
| `resources/css/investigacion.css` | Ajustes de la página seminarios sin mezclar con colores globales si no es necesario. |
| `resources/css/departamentos.css` | Igual para departamentos. |

---

## 8. Hacia el administrador (segunda etapa)

1. **Tabla `site_settings` (clave / valor JSON o texto):** migrar las claves de `config/uim.php` para editar URLs y contacto desde el panel.
2. **Tablas `carousel_slides`, `events`, `pages`:** sustituir bloques estáticos de `welcome.blade.php` por `@foreach`.
3. **Caché:** al guardar en admin, ejecutar `config:clear` o invalidar caché de vistas si aplica.
4. **Autorización:** reutilizar middleware existente (`admin.or.dev`, Sanctum) para restringir el CRUD.

Esta guía puede mantenerse como **checklist** al cerrar entrega con la UNAM y al planear el módulo de administración.

---

## 9. Referencias externas (consulta institucional)

- Portal FES Acatlán: [https://www.acatlan.unam.mx/](https://www.acatlan.unam.mx/)
- Revista FIGURAS (ejemplo de URL actual): [https://revistafiguras.acatlan.unam.mx/index.php/figuras/index](https://revistafiguras.acatlan.unam.mx/index.php/figuras/index)

Las URLs definitivas deben confirmarse con la UIM; actualiza `.env` y/o `config/uim.php` cuando cambien.

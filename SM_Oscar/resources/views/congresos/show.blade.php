@extends('layouts.app')

@section('title', $congreso->titulo.' — Congresos UIM')

@push('styles')
    @vite(['resources/css/congresos.css'])
@endpush

@section('content')
    <div class="congresos-wrapper">
        <section class="congresos-section">
            {{-- Breadcrumb --}}
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb small mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('congresos.index') }}">Congresos</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($congreso->titulo, 40) }}</li>
                </ol>
            </nav>

            {{-- Tarjeta principal --}}
            <div class="card border-0 shadow overflow-hidden" style="border-radius: 20px;">
                <div class="row g-0">
                    {{-- Imagen --}}
                    <div class="col-lg-5">
                        <div class="position-relative h-100" style="min-height: 300px;">
                            <img src="{{ $congreso->urlPortada() }}" 
                                 class="img-fluid w-100 h-100 object-fit-cover" 
                                 alt="Portada: {{ $congreso->titulo }}">
                            @if($congreso->fecha_inicio && $congreso->fecha_inicio->isFuture())
                                <span class="congreso-badge proximo" style="position: absolute; top: 1rem; left: 1rem;">Próximo</span>
                            @elseif($congreso->fecha_inicio && $congreso->fecha_inicio->isToday())
                                <span class="congreso-badge hoy" style="position: absolute; top: 1rem; left: 1rem;">Hoy</span>
                            @endif
                        </div>
                    </div>

                    {{-- Contenido --}}
                    <div class="col-lg-7">
                        <div class="card-body p-4 p-lg-5">
                            {{-- Título --}}
                            <h1 class="congreso-title" style="font-size: 1.75rem; margin-bottom: 1.25rem;">
                                {{ $congreso->titulo }}
                            </h1>

                            {{-- Info --}}
                            <ul class="list-unstyled mb-4">
                                @if($congreso->fecha_inicio)
                                    <li class="mb-2 d-flex align-items-center gap-2">
                                        <i class="bi bi-calendar-event" style="color: var(--unam-dorado, #b38c00);"></i>
                                        <span style="color: var(--unam-azul, #1E3C70); font-weight: 600;">
                                            {{ $congreso->fecha_inicio->format('d M Y') }}
                                            @if($congreso->fecha_fin)
                                                — {{ $congreso->fecha_fin->format('d M Y') }}
                                            @endif
                                        </span>
                                    </li>
                                @endif
                                @if($congreso->sede)
                                    <li class="mb-2 d-flex align-items-center gap-2">
                                        <i class="bi bi-geo-alt" style="color: var(--unam-dorado, #b38c00);"></i>
                                        <span style="color: #6a6a6a;">{{ $congreso->sede }}</span>
                                    </li>
                                @endif
                            </ul>

                            {{-- Botones de acción --}}
                            <div class="d-flex flex-column flex-sm-row flex-wrap gap-2 mb-4">
                                {{-- Botón de inscripción al congreso (modal) --}}
                                @if($congreso->activo)
                                    <button type="button" 
                                            class="btn" 
                                            style="background: var(--unam-dorado, #b38c00); color: #ffffff; font-weight: 600; border-radius: 8px; padding: 0.6rem 1.5rem;"
                                            data-bs-toggle="modal" 
                                            data-bs-target="#inscripcionModal">
                                        <i class="bi bi-pencil-square me-2"></i>Inscribirme al congreso
                                    </button>
                                @endif
                                
                                @if($congreso->enlace_inscripcion)
                                    <a href="{{ $congreso->enlace_inscripcion }}" 
                                       class="btn btn-outline-secondary"
                                       style="border-radius: 8px; padding: 0.6rem 1.5rem;"
                                       target="_blank" 
                                       rel="noopener noreferrer">
                                        <i class="bi bi-box-arrow-up-right me-2"></i>Inscripción externa
                                    </a>
                                @endif
                                @if($congreso->enlace_programa)
                                    <a href="{{ $congreso->enlace_programa }}" 
                                       class="btn btn-outline-secondary"
                                       style="border-radius: 8px; padding: 0.6rem 1.5rem;"
                                       target="_blank" 
                                       rel="noopener noreferrer">
                                        <i class="bi bi-file-text me-2"></i>Programa / convocatoria
                                    </a>
                                @endif
                                @if($congreso->enlace_sitio_web)
                                    <a href="{{ $congreso->enlace_sitio_web }}" 
                                       class="btn btn-outline-secondary"
                                       style="border-radius: 8px; padding: 0.6rem 1.5rem;"
                                       target="_blank" 
                                       rel="noopener noreferrer">
                                        <i class="bi bi-globe me-2"></i>Sitio del congreso
                                    </a>
                                @endif
                            </div>

                            {{-- Resumen --}}
                            @if($congreso->resumen)
                                <div class="mb-4 p-3" style="background: #f8f9fa; border-radius: 12px; border-left: 4px solid var(--unam-dorado, #b38c00);">
                                    <p class="mb-0" style="color: #222222; font-size: 1rem; line-height: 1.6;">{{ $congreso->resumen }}</p>
                                </div>
                            @endif

                            {{-- Descripción completa --}}
                            @if($congreso->descripcion)
                                <div class="congreso-descripcion" style="color: #222222; line-height: 1.8;">
                                    {!! nl2br(e($congreso->descripcion)) !!}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            {{-- Botón volver --}}
            <div class="mt-4 text-center">
                <a href="{{ route('congresos.index') }}" class="congreso-link" style="display: inline-flex;">
                    <i class="bi bi-arrow-left me-2"></i> Volver a congresos
                </a>
            </div>
        </section>
    </div>

    {{-- Modal de Inscripción al Congreso --}}
    <div class="modal fade" id="inscripcionModal" tabindex="-1" aria-labelledby="inscripcionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 16px; border: none;">
                <div class="modal-header" style="background: var(--unam-azul, #1E3C70); color: white; border-radius: 16px 16px 0 0;">
                    <h5 class="modal-title" id="inscripcionModalLabel">
                        <i class="bi bi-pencil-square me-2"></i>Inscripción al Congreso
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body p-4">
                    <form id="formInscripcionCongreso" novalidate>
                        @csrf
                        <input type="hidden" id="congresoId" name="congreso_id" value="{{ $congreso->id }}">

                        {{-- Nombre completo --}}
                        <div class="mb-3">
                            <label for="inputNombre" class="form-label fw-semibold">Nombre completo</label>
                            <input type="text" class="form-control" id="inputNombre" name="nombre_completo" 
                                   placeholder="Tu nombre completo" required style="border-radius: 10px;">
                        </div>

                        {{-- Correo electrónico --}}
                        <div class="mb-3">
                            <label for="inputCorreo" class="form-label fw-semibold">Correo electrónico</label>
                            <input type="email" class="form-control" id="inputCorreo" name="email" 
                                   placeholder="tu@correo.com" required style="border-radius: 10px;">
                        </div>

                        {{-- Tipo de usuario --}}
                        <div class="mb-3">
                            <label for="inputTipoUsuario" class="form-label fw-semibold">
                                Tipo de usuario
                            </label>
                            <select class="form-select" id="inputTipoUsuario" name="tipo_usuario" required style="border-radius: 10px;">
                                <option value="">-- Selecciona tu tipo de usuario --</option>
                                <option value="interno">Interno (FES Acatlán)</option>
                                <option value="externo">Externo</option>
                            </select>
                        </div>

                        {{-- Número de cuenta (solo interno) --}}
                        <div class="mb-3" id="grupoNumeroCuenta" style="display: none;">
                            <label for="inputNumeroCuenta" class="form-label fw-semibold">
                                <i class="bi bi-person-badge me-1" style="color: var(--unam-azul);"></i>
                                Número de cuenta
                            </label>
                            <input type="text" class="form-control" id="inputNumeroCuenta" name="numero_cuenta" 
                                   placeholder="Ej. 420012345" maxlength="9" pattern="[0-9]{8,9}" inputmode="numeric"
                                   style="border-radius: 10px;">
                            <div class="form-text">Ingresa tu número de cuenta UNAM (8-9 dígitos).</div>
                        </div>

                        {{-- Congreso (solo lectura) --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Congreso</label>
                            <div class="p-2" style="background: #f8f9fa; border-radius: 10px; border: 1px solid #dee2e6; color: var(--unam-azul); font-weight: 600;">
                                {{ $congreso->titulo }}
                            </div>
                        </div>

                        {{-- Motivo de inscripción --}}
                        <div class="mb-3">
                            <label for="inputMotivo" class="form-label fw-semibold">Motivo de inscripción</label>
                            <textarea class="form-control" id="inputMotivo" name="motivo" rows="4" 
                                      placeholder="¿Por qué deseas inscribirte a este congreso?" required 
                                      style="border-radius: 10px;"></textarea>
                        </div>

                        {{-- Botón de envío --}}
                        <button type="submit" class="btn w-100" 
                                style="background: var(--unam-dorado, #b38c00); color: #ffffff; font-weight: 600; border-radius: 10px; padding: 0.75rem;">
                            <i class="bi bi-send me-2"></i>Enviar inscripción
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('formInscripcionCongreso');
        const tipoUsuarioSelect = document.getElementById('inputTipoUsuario');
        const grupoNumeroCuenta = document.getElementById('grupoNumeroCuenta');
        const inputNumeroCuenta = document.getElementById('inputNumeroCuenta');
        const submitBtn = form.querySelector('button[type="submit"]');
        const originalBtnText = submitBtn.innerHTML;

        // Mostrar/ocultar número de cuenta según tipo de usuario
        tipoUsuarioSelect.addEventListener('change', function() {
            if (this.value === 'interno') {
                grupoNumeroCuenta.style.display = 'block';
                inputNumeroCuenta.setAttribute('required', 'required');
            } else {
                grupoNumeroCuenta.style.display = 'none';
                inputNumeroCuenta.removeAttribute('required');
                inputNumeroCuenta.value = '';
            }
        });

        // Validación del número de cuenta (solo números)
        inputNumeroCuenta.addEventListener('input', function() {
            this.value = this.value.replace(/\D/g, '');
        });

        // Envío del formulario
        form.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            // Validación básica
            if (!form.checkValidity()) {
                form.reportValidity();
                return;
            }

            // Bloquear botón y mostrar animación de carga
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Procesando...';

            const formData = new FormData(form);
            const data = Object.fromEntries(formData.entries());

            try {
                const response = await fetch('{{ route("inscripciones.congreso.store") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(data)
                });

                const result = await response.json();

                if (response.ok && result.success) {
                    // Cerrar modal primero
                    const modalEl = document.getElementById('inscripcionModal');
                    const modal = bootstrap.Modal.getInstance(modalEl);
                    modal.hide();
                    
                    // Mostrar alerta de éxito con SweetAlert2
                    Swal.fire({
                        icon: 'success',
                        title: '¡Inscripción exitosa!',
                        html: `<p>Te has inscrito exitosamente al congreso.</p><p>Tu número de registro es:</p><h3 style="color: #D4AF37; margin: 15px 0;">${result.numero_registro}</h3><p style="font-size: 0.9em; color: #666;">Guarda este número, lo necesitarás para tu constancia.</p>`,
                        confirmButtonText: 'Aceptar',
                        confirmButtonColor: '#1E3C70',
                        customClass: {
                            popup: 'swal2-uiim'
                        }
                    });
                    
                    form.reset();
                    grupoNumeroCuenta.style.display = 'none';
                } else {
                    // Manejar errores específicos
                    const errorMsg = result.message || 'Error al procesar la inscripción. Por favor revisa los campos.';
                    
                    if (errorMsg.includes('Cupo lleno') || errorMsg.includes('cupo')) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Cupo lleno',
                            text: 'Lo sentimos, el cupo para este congreso está completo.',
                            confirmButtonText: 'Entendido',
                            confirmButtonColor: '#1E3C70'
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: errorMsg,
                            confirmButtonText: 'Aceptar',
                            confirmButtonColor: '#1E3C70'
                        });
                    }
                }
            } catch (error) {
                console.error('Error:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error inesperado',
                    text: 'Ocurrió un error al procesar tu inscripción. Inténtalo más tarde.',
                    confirmButtonText: 'Aceptar',
                    confirmButtonColor: '#1E3C70'
                });
            } finally {
                // Restaurar botón
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalBtnText;
            }
        });
    });
</script>
@endpush

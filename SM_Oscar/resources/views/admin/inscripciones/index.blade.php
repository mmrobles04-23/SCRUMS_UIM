@extends('admin.layout')

@section('title', 'Inscripciones a Seminarios — UIM')

@section('admin_content')
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        <div>
            <h1 class="h4 mb-0 text-body" style="font-weight: 700;">Inscripciones a Seminarios</h1>
            <p class="text-body-secondary small mb-0">Listado de personas inscritas a los seminarios de investigación.</p>
        </div>
    </div>

    @if(session('status'))
        <div class="alert alert-success border-0 shadow-sm mb-4" style="border-radius: 14px; background-color: #d1e7dd; color: #0f5132;">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('status') }}
        </div>
    @endif

    {{-- Filtro por seminario --}}
    <div class="card border-0 shadow-sm mb-4" style="border-radius: 16px;">
        <div class="card-body p-3">
            <form method="GET" action="{{ route('admin.inscripciones.index') }}" class="d-flex flex-column flex-md-row align-items-md-center gap-2">
                <label class="fw-semibold small text-body-secondary mb-0 flex-shrink-0">Filtrar por seminario:</label>
                <select name="seminario_id" class="form-select form-select-sm" style="max-width: 350px;">
                    <option value="">— Todos los seminarios —</option>
                    @foreach($seminarios as $s)
                        <option value="{{ $s->id }}" {{ request('seminario_id') == $s->id ? 'selected' : '' }}>
                            {{ $s->titulo }}
                        </option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-sm btn-warning px-4">
                    <i class="bi bi-funnel me-1"></i>Filtrar
                </button>
                @if(request('seminario_id'))
                    <a href="{{ route('admin.inscripciones.index') }}" class="btn btn-sm btn-outline-secondary">
                        <i class="bi bi-x-circle me-1"></i>Limpiar
                    </a>
                @endif
            </form>
        </div>
    </div>

    <div class="card border-0 shadow-sm" style="border-radius: 20px; overflow: hidden;">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead style="background-color: #f8f9fa;">
                    <tr>
                        <th class="px-4 py-3" style="color: var(--unam-azul); font-weight: 600; font-size: 0.82rem; text-transform: uppercase;">Nº Registro</th>
                        <th class="py-3" style="color: var(--unam-azul); font-weight: 600; font-size: 0.82rem; text-transform: uppercase;">Participante</th>
                        <th class="py-3" style="color: var(--unam-azul); font-weight: 600; font-size: 0.82rem; text-transform: uppercase;">Seminario</th>
                        <th class="py-3" style="color: var(--unam-azul); font-weight: 600; font-size: 0.82rem; text-transform: uppercase;">Tipo</th>
                        <th class="py-3" style="color: var(--unam-azul); font-weight: 600; font-size: 0.82rem; text-transform: uppercase;">Fecha</th>
                        <th class="px-4 py-3 text-end" style="color: var(--unam-azul); font-weight: 600; font-size: 0.82rem; text-transform: uppercase;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($inscripciones as $inscripcion)
                        <tr>
                            <td class="px-4 py-3">
                                <span class="badge fw-semibold" style="background-color: rgba(212,175,55,0.15); color: #7a5f00; border-radius: 10px; font-size: 0.78rem; letter-spacing: 0.5px;">
                                    {{ $inscripcion->numero_registro }}
                                </span>
                            </td>
                            <td class="py-3">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="rounded-circle d-flex align-items-center justify-content-center text-white flex-shrink-0"
                                         style="width: 38px; height: 38px; background-color: var(--unam-azul); font-weight: 700; font-size: 0.9rem;">
                                        {{ strtoupper(substr($inscripcion->nombre_completo, 0, 1)) }}
                                    </div>
                                    <div>
                                        <div class="fw-bold text-body" style="font-size: 0.92rem;">{{ $inscripcion->nombre_completo }}</div>
                                        <div class="text-body-secondary small">{{ $inscripcion->email }}</div>
                                        @if($inscripcion->numero_cuenta)
                                            <div class="text-body-secondary small"><i class="bi bi-id-card me-1"></i>{{ $inscripcion->numero_cuenta }}</div>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="py-3 small text-body" style="max-width: 200px;">
                                {{ $inscripcion->seminario?->titulo ?? 'N/A' }}
                            </td>
                            <td class="py-3">
                                @if($inscripcion->tipo_usuario === 'interno')
                                    <span class="badge" style="background-color: rgba(30,60,112,0.1); color: var(--unam-azul); border-radius: 10px;">
                                        <i class="bi bi-building me-1"></i>Interno
                                    </span>
                                @else
                                    <span class="badge" style="background-color: rgba(106,106,106,0.1); color: #555; border-radius: 10px;">
                                        <i class="bi bi-person me-1"></i>Externo
                                    </span>
                                @endif
                            </td>
                            <td class="py-3 small text-body-secondary">
                                {{ $inscripcion->created_at->format('d/m/Y H:i') }}
                            </td>
                            <td class="px-4 py-3 text-end">
                                <div class="d-flex justify-content-end gap-2">
                                    {{-- Ver motivo --}}
                                    <button type="button" class="btn btn-sm btn-outline-secondary" style="border-radius: 8px;"
                                        data-bs-toggle="tooltip" title="{{ $inscripcion->motivo }}">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                    {{-- Eliminar --}}
                                    <form action="{{ route('admin.inscripciones.destroy', $inscripcion) }}" method="POST" class="d-inline"
                                          onsubmit="return confirm('¿Eliminar esta inscripción?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" style="border-radius: 8px;" title="Eliminar">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-body-secondary">
                                <i class="bi bi-inbox display-5 d-block mb-2 opacity-25"></i>
                                No hay inscripciones registradas.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($inscripciones->hasPages())
            <div class="card-footer bg-white border-0 px-4 py-3">
                {{ $inscripciones->links() }}
            </div>
        @endif
    </div>

    @push('scripts')
    <script>
        // Inicializar tooltips de Bootstrap para mostrar motivos
        const tooltipEls = document.querySelectorAll('[data-bs-toggle="tooltip"]');
        tooltipEls.forEach(el => new bootstrap.Tooltip(el, { placement: 'left' }));
    </script>
    @endpush
@endsection

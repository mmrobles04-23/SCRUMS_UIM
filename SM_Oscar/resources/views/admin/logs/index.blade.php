@extends('admin.layout')

@section('title', 'Logs de Auditoría — UIM')

@section('admin_content')
    <div class="mb-4 d-flex justify-content-between align-items-center">
        <div>
            <h1 class="h4 mb-0 text-body" style="font-weight: 700;">Logs de Auditoría</h1>
            <p class="text-body-secondary small">Historial de cambios y acciones realizadas en el sistema.</p>
        </div>
    </div>

    <div class="card border-0 shadow-sm" style="border-radius: 20px; overflow: hidden;">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="px-4 py-3 border-0">Fecha y Hora</th>
                        <th class="px-4 py-3 border-0">Usuario</th>
                        <th class="px-4 py-3 border-0">Acción</th>
                        <th class="px-4 py-3 border-0">Modelo</th>
                        <th class="px-4 py-3 border-0">ID Ref</th>
                        <th class="px-4 py-3 border-0">IP / Agente</th>
                        <th class="px-4 py-3 border-0 text-end">Detalles</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($logs as $log)
                        <tr>
                            <td class="px-4 py-3">
                                <div class="fw-bold" style="font-size: 0.9rem;">{{ $log->created_at->format('d/m/Y') }}</div>
                                <div class="text-muted small">{{ $log->created_at->format('H:i:s') }}</div>
                            </td>
                            <td class="px-4 py-3">
                                @if($log->user)
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="rounded-circle bg-primary d-flex align-items-center justify-content-center text-white" style="width: 32px; height: 32px; font-size: 0.8rem;">
                                            {{ strtoupper(substr($log->user->name, 0, 1)) }}
                                        </div>
                                        <div>
                                            <div class="fw-bold small">{{ $log->user->nombre }}</div>
                                            <div class="text-muted" style="font-size: 0.75rem;">{{ $log->user->email }}</div>
                                        </div>
                                    </div>
                                @else
                                    <span class="text-muted small">Sistema / Desconocido</span>
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                @php
                                    $badgeClass = match($log->accion) {
                                        'Creado' => 'bg-success',
                                        'Actualizado' => 'bg-info',
                                        'Eliminado' => 'bg-danger',
                                        default => 'bg-secondary'
                                    };
                                @endphp
                                <span class="badge {{ $badgeClass }}" style="border-radius: 12px; font-weight: 600;">
                                    {{ $log->accion }}
                                </span>
                            </td>
                            <td class="px-4 py-3">
                                <span class="fw-bold text-dark small">{{ $log->modelo }}</span>
                            </td>
                            <td class="px-4 py-3">
                                <code class="small text-muted">#{{ $log->modelo_id }}</code>
                            </td>
                            <td class="px-4 py-3">
                                <div class="small text-truncate" style="max-width: 150px;" title="{{ $log->ip_address }}">
                                    <i class="bi bi-geo-alt me-1"></i>{{ $log->ip_address }}
                                </div>
                                <div class="text-muted small text-truncate" style="max-width: 150px;" title="{{ $log->user_agent }}">
                                    {{ $log->user_agent }}
                                </div>
                            </td>
                            <td class="px-4 py-3 text-end">
                                <button type="button" class="btn btn-sm btn-outline-primary" 
                                        style="border-radius: 8px;"
                                        data-bs-toggle="modal" 
                                        data-bs-target="#modalLog{{ $log->id }}">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </td>
                        </tr>

                        <!-- Modal Detalles -->
                        <div class="modal fade" id="modalLog{{ $log->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content border-0 shadow-lg" style="border-radius: 20px;">
                                    <div class="modal-header border-0 p-4 pb-0">
                                        <h5 class="modal-title fw-bold">Detalles de Auditoría #{{ $log->id }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body p-4">
                                        <div class="row g-4 mb-4">
                                            <div class="col-md-6">
                                                <div class="p-3 bg-light rounded-3">
                                                    <div class="text-muted small mb-1">Modelo Afectado</div>
                                                    <div class="fw-bold">{{ $log->modelo }} (#{{ $log->modelo_id }})</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="p-3 bg-light rounded-3">
                                                    <div class="text-muted small mb-1">Acción Realizada</div>
                                                    <div class="fw-bold text-uppercase">{{ $log->accion }}</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <h6 class="fw-bold text-danger mb-2">Valores Anteriores</h6>
                                                <div class="bg-dark text-white p-3 rounded-3 overflow-auto" style="max-height: 300px; font-family: monospace; font-size: 0.85rem;">
                                                    @if($log->valores_viejos)
                                                        <pre class="mb-0">{{ json_encode($log->valores_viejos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre>
                                                    @else
                                                        <span class="text-white-50">N/A</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <h6 class="fw-bold text-success mb-2">Valores Nuevos / Cambios</h6>
                                                <div class="bg-dark text-white p-3 rounded-3 overflow-auto" style="max-height: 300px; font-family: monospace; font-size: 0.85rem;">
                                                    @if($log->valores_nuevos)
                                                        <pre class="mb-0">{{ json_encode($log->valores_nuevos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre>
                                                    @else
                                                        <span class="text-white-50">N/A</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer border-0 p-4 pt-0">
                                        <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal" style="border-radius: 10px;">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-5">
                                <div class="text-muted">
                                    <i class="bi bi-info-circle fs-2 mb-3 d-block"></i>
                                    No se encontraron registros de auditoría.
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($logs->hasPages())
            <div class="p-4 border-top">
                {{ $logs->links() }}
            </div>
        @endif
    </div>
@endsection

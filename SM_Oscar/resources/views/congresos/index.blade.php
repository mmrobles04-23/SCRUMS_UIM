@extends('layouts.app')

@section('title', 'Congresos — UIM FES Acatlán')

@push('styles')
    @vite(['resources/css/congresos.css'])
@endpush

@section('content')
    <div class="congresos-wrapper">
        <section class="congresos-section">
            <div class="congresos-header">
                <div class="section-title">
                    <i class="bi bi-people"></i>
                    <span>CONGRESOS Y EVENTOS ACADÉMICOS</span>
                </div>
                <p class="section-description">
                    Participa en nuestros congresos internacionales, simposios y eventos académicos organizados por la UIMA y la FES Acatlán.
                </p>
            </div>

            @if($congresos->count() > 0)
                <div class="congresos-grid">
                    @foreach($congresos as $congreso)
                        <article class="congreso-card">
                            <div class="congreso-image">
                                <img src="{{ $congreso->urlPortada() }}" alt="{{ $congreso->titulo }}">
                                @if($congreso->fecha_inicio && $congreso->fecha_inicio->isFuture())
                                    <span class="congreso-badge proximo">Próximo</span>
                                @elseif($congreso->fecha_inicio && $congreso->fecha_inicio->isToday())
                                    <span class="congreso-badge hoy">Hoy</span>
                                @endif
                            </div>
                            <div class="congreso-content">
                                <div class="congreso-dates">
                                    <i class="bi bi-calendar-event"></i>
                                    @if($congreso->fecha_inicio && $congreso->fecha_fin)
                                        {{ $congreso->fecha_inicio->format('d M') }} — {{ $congreso->fecha_fin->format('d M Y') }}
                                    @elseif($congreso->fecha_inicio)
                                        {{ $congreso->fecha_inicio->format('d M Y') }}
                                    @else
                                        Fecha por definir
                                    @endif
                                </div>
                                <h3 class="congreso-title">{{ $congreso->titulo }}</h3>
                                @if($congreso->resumen)
                                    <p class="congreso-summary">{{ Str::limit($congreso->resumen, 120) }}</p>
                                @endif
                                @if($congreso->sede)
                                    <div class="congreso-location">
                                        <i class="bi bi-geo-alt"></i>
                                        {{ $congreso->sede }}
                                    </div>
                                @endif
                                <a href="{{ route('congresos.show', $congreso) }}" class="congreso-link">
                                    Ver detalles <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>

                <div class="pagination-wrapper">
                    {{ $congresos->links() }}
                </div>
            @else
                <div class="empty-state">
                    <i class="bi bi-calendar-x"></i>
                    <h3>No hay congresos activos</h3>
                    <p>Próximamente publicaremos nuevos eventos. Vuelve a consultar más tarde.</p>
                </div>
            @endif
        </section>
    </div>
@endsection

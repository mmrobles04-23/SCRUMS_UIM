@php
$eventos = $eventosProximos ?? [];
$titulo = $settings['eventos_proximos_titulo'] ?? 'Eventos Próximos a Vencer';
@endphp

@if(count($eventos) > 0)
<section class="py-5 bg-gradient-to-r from-primary-uim/5 to-secondary-uim/5">
    <div class="container-fluid">
        {{-- Header --}}
        <div class="text-center mb-4">
            <span class="text-secondary-uim fw-bold tracking-widest small text-uppercase mb-2 d-block">No te quedes fuera</span>
            <h2 class="font-headline display-6 text-primary-uim fw-bold">
                <i class="bi bi-calendar-week me-2"></i>{{ $titulo }}
            </h2>
        </div>

        {{-- Carrusel de eventos --}}
        <div class="eventos-carrusel position-relative">
            <div class="eventos-track d-flex gap-3 overflow-auto pb-3" id="eventosTrack">
                @foreach($eventos as $evento)
                    @php
                        $diasRestantes = now()->diffInDays($evento['fecha_fin'], false);
                        $diasRestantes = max(0, (int) $diasRestantes);
                        $urgente = $diasRestantes <= 7;
                    @endphp
                    
                    <div class="evento-card flex-shrink-0" style="width: 320px;">
                        <div class="card h-100 border-0 shadow-sm overflow-hidden">
                            {{-- Imagen --}}
                            <div class="position-relative" style="height: 160px;">
                                <img src="{{ $evento['imagen'] }}" 
                                     alt="{{ $evento['titulo'] }}" 
                                     class="w-100 h-100 object-fit-cover">
                                
                                {{-- Badge tipo --}}
                                <span class="position-absolute top-0 start-0 m-2 badge 
                                    {{ $evento['tipo'] === 'congreso' ? 'bg-primary' : 'bg-secondary' }}">
                                    {{ $evento['tipo'] === 'congreso' ? 'Congreso' : 'Seminario' }}
                                </span>
                                
                                {{-- Badge días restantes --}}
                                <span class="position-absolute top-0 end-0 m-2 badge 
                                    {{ $urgente ? 'bg-danger' : 'bg-success' }}">
                                    <i class="bi bi-clock me-1"></i>
                                    {{ $diasRestantes === 0 ? 'Último día' : $diasRestantes . ' día' . ($diasRestantes !== 1 ? 's' : '') }}
                                </span>
                            </div>
                            
                            {{-- Contenido --}}
                            <div class="card-body p-3">
                                <h5 class="card-title font-headline fs-6 fw-bold text-primary-uim mb-2 line-clamp-2" 
                                    style="min-height: 2.8em;">
                                    {{ $evento['titulo'] }}
                                </h5>
                                
                                <div class="d-flex align-items-center text-muted small mb-3">
                                    <i class="bi bi-calendar-event me-2"></i>
                                    <span>Vence: {{ $evento['fecha_fin']->format('d M Y') }}</span>
                                </div>
                                
                                @if($evento['tipo'] === 'seminario' && isset($evento['departamento']))
                                    <div class="d-flex align-items-center text-muted small mb-3">
                                        <i class="bi bi-building me-2"></i>
                                        <span>{{ $evento['departamento'] }}</span>
                                    </div>
                                @endif
                                
                                {{-- Barra de progreso visual --}}
                                @php
                                    $totalDias = match($settings['eventos_proximos_periodo'] ?? 'mes') {
                                        'semana' => 7,
                                        'mes' => 30,
                                        'trimestre' => 90,
                                        default => 30,
                                    };
                                    $progreso = min(100, max(0, (($totalDias - $diasRestantes) / $totalDias) * 100));
                                    $colorProgreso = $urgente ? 'danger' : ($diasRestantes <= 14 ? 'warning' : 'success');
                                @endphp
                                <div class="progress mb-3" style="height: 4px;">
                                    <div class="progress-bar bg-{{ $colorProgreso }}" 
                                         role="progressbar" 
                                         style="width: {{ $progreso }}%"
                                         aria-valuenow="{{ $progreso }}" 
                                         aria-valuemin="0" 
                                         aria-valuemax="100">
                                    </div>
                                </div>
                                
                                <a href="{{ $evento['route'] }}" class="btn btn-sm btn-outline-primary w-100">
                                    <i class="bi bi-arrow-right me-1"></i>Ver detalles
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            {{-- Controles de navegación (visibles en desktop) --}}
            @if(count($eventos) > 3)
                <button class="btn btn-primary position-absolute start-0 top-50 translate-middle-y d-none d-lg-flex"
                        id="eventosPrev"
                        style="z-index: 10; width: 40px; height: 40px; border-radius: 50%;">
                    <i class="bi bi-chevron-left"></i>
                </button>
                <button class="btn btn-primary position-absolute end-0 top-50 translate-middle-y d-none d-lg-flex"
                        id="eventosNext"
                        style="z-index: 10; width: 40px; height: 40px; border-radius: 50%;">
                    <i class="bi bi-chevron-right"></i>
                </button>
            @endif
        </div>
        
        {{-- Indicadores --}}
        @if(count($eventos) > 3)
            <div class="d-flex justify-content-center gap-2 mt-3">
                @for($i = 0; $i < ceil(count($eventos) / 3); $i++)
                    <button class="btn btn-sm btn-primary eventos-indicator {{ $i === 0 ? 'active' : '' }}"
                            data-slide="{{ $i }}"
                            style="width: 10px; height: 10px; border-radius: 50%; padding: 0; opacity: {{ $i === 0 ? 1 : 0.5 }};">
                    </button>
                @endfor
            </div>
        @endif
    </div>
</section>

<style>
.eventos-carrusel {
    padding: 0 20px;
}
.eventos-track {
    scroll-behavior: smooth;
    -webkit-overflow-scrolling: touch;
    scrollbar-width: none;
    -ms-overflow-style: none;
}
.eventos-track::-webkit-scrollbar {
    display: none;
}
.evento-card .card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.evento-card .card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,59,111,0.15) !important;
}
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const track = document.getElementById('eventosTrack');
    const prevBtn = document.getElementById('eventosPrev');
    const nextBtn = document.getElementById('eventosNext');
    const indicators = document.querySelectorAll('.eventos-indicator');
    
    if (!track) return;
    
    const cardWidth = 320 + 16; // ancho + gap
    let currentSlide = 0;
    
    function updateSlide(index) {
        const maxSlide = Math.ceil(track.children.length / 3) - 1;
        currentSlide = Math.max(0, Math.min(index, maxSlide));
        track.scrollTo({ left: currentSlide * cardWidth * 3, behavior: 'smooth' });
        
        indicators.forEach((ind, i) => {
            ind.style.opacity = i === currentSlide ? '1' : '0.5';
        });
    }
    
    if (prevBtn) {
        prevBtn.addEventListener('click', () => updateSlide(currentSlide - 1));
    }
    
    if (nextBtn) {
        nextBtn.addEventListener('click', () => updateSlide(currentSlide + 1));
    }
    
    indicators.forEach(ind => {
        ind.addEventListener('click', () => {
            updateSlide(parseInt(ind.dataset.slide));
        });
    });
    
    // Auto-scroll cada 5 segundos
    let autoScroll = setInterval(() => {
        const maxSlide = Math.ceil(track.children.length / 3) - 1;
        if (currentSlide >= maxSlide) {
            updateSlide(0);
        } else {
            updateSlide(currentSlide + 1);
        }
    }, 5000);
    
    // Pausar en hover
    track.parentElement.addEventListener('mouseenter', () => clearInterval(autoScroll));
    track.parentElement.addEventListener('mouseleave', () => {
        autoScroll = setInterval(() => {
            const maxSlide = Math.ceil(track.children.length / 3) - 1;
            if (currentSlide >= maxSlide) {
                updateSlide(0);
            } else {
                updateSlide(currentSlide + 1);
            }
        }, 5000);
    });
});
</script>
@endif

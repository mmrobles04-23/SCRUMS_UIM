{{--
    Componente: Proyectos Destacados
    Descripción: Grid de proyectos del departamento en estilo bento
--}}

<section class="py-4 py-md-5 bg-surface-container-low border-top border-secondary border-opacity-10">
  <div class="container-fluid px-3 px-md-4 px-lg-5 py-3 py-md-4">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end mb-4 mb-md-5 gap-2 gap-md-3">
      <div>
        <h2 class="h4 h-md-3 fw-bold text-primary-uim mb-2 font-headline">Proyectos Destacados</h2>
        <div class="projects-divider"></div>
      </div>
    </div>

    <div class="row g-3 g-md-4">
      <!-- Project Card 1 -->
      <div class="col-6 col-md-6 col-xl-4">
        <div class="card border border-secondary border-opacity-10 shadow-sm rounded-4 overflow-hidden h-100 card-hover-premium group-arrow-hover">
          <div class="position-relative overflow-hidden" style="height: 100px;">
            <img alt="Riesgo Sísmico" class="w-100 h-100 object-fit-cover group-hover-scale"
              src="https://lh3.googleusercontent.com/aida-public/AB6AXuA7ffKsh3KFOnXmFF5CF96GNqecshdQ7lVKjO05Qg1xRKtyE4O2WwVY61r03iseSv0-OjWa2g5_m6yGdeEV4G7b1pFwvDIArR94RYPZXaqhfSBYd3CMiPgLYXFxR48t7N1dsoSDqWc1YZ7XHAthgt-nBiMdIlvgYNaDCPOQZxEjiNXwu9-JSj4ofqVciB59grzc6enimOUeuAsLsnYHgCPHey0uq3-rYRERcWL-mFRFeqgTN1rhmfoHheVT0SI-x8RcHoMJG30w3Q" />
            <div class="position-absolute top-0 start-0 m-2 m-md-3 z-2">
              <span class="badge bg-unam text-white text-uppercase tracking-widest px-2 py-1 rounded-pill" style="font-size: 0.5rem;">En Curso</span>
            </div>
          </div>
          <div class="card-body p-2 p-md-4 d-flex flex-column">
            <h4 class="fs-6 fs-md-5 fw-bold text-primary-uim mb-2 font-headline" style="font-size: 0.85rem !important;">Evaluación de riesgo sísmico</h4>
            <p class="small text-on-surface-variant mb-2 mb-md-4 d-none d-sm-block">Modelado avanzado de la respuesta dinámica del suelo en el Valle de México frente a eventos de gran magnitud.</p>
            <button class="btn btn-link text-secondary-uim fw-bold text-uppercase p-0 text-decoration-none d-flex align-items-center gap-1 mt-auto tracking-widest transition-all" style="font-size: 0.7rem;">
              <span class="d-none d-sm-inline">DETALLES</span>
              <span class="d-sm-none">Ver</span>
              <i class="bi bi-plus-circle icon-transition fs-6"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Project Card 2 -->
      <div class="col-6 col-md-6 col-xl-4">
        <div class="card border border-secondary border-opacity-10 shadow-sm rounded-4 overflow-hidden h-100 card-hover-premium group-arrow-hover">
          <div class="position-relative overflow-hidden" style="height: 100px;">
            <img alt="Materiales" class="w-100 h-100 object-fit-cover group-hover-scale"
              src="https://lh3.googleusercontent.com/aida-public/AB6AXuBsqi0gsXwmbDJR6e1-aO8xZW86kcqxkv9a2VyYxQiUYxaG2tUSjbWJ7RJrgWDZAoDN-TRq9luyPV7QKeaDCiCYp9UmQia7hsB5BbVnEsd8l7tkrhfbGKbl4rrA8HO25FMj4pVis0su4BExfxBHSWj8EU8LwWD3ddneBf1UPAiRLHv1V_yFg87bUuAyVfYpBbdkiqsH--bK_rrIN3-_j4OmDgrNdLBSfpf6_Qa0aAhUkFixbHPEJ3qivcKfVChYf_chhfPQz9y7Ew" />
            <div class="position-absolute top-0 start-0 m-2 m-md-3 z-2">
              <span class="badge bg-warning text-dark text-uppercase tracking-widest px-2 py-1 rounded-pill" style="font-size: 0.5rem;">Laboratorio</span>
            </div>
          </div>
          <div class="card-body p-2 p-md-4 d-flex flex-column">
            <h4 class="fs-6 fs-md-5 fw-bold text-primary-uim mb-2 font-headline" style="font-size: 0.85rem !important;">Caracterización de materiales</h4>
            <p class="small text-on-surface-variant mb-2 mb-md-4 d-none d-sm-block">Estudio de concreto de alto desempeño y polímeros para ambientes de temperaturas extremas y corrosión.</p>
            <button class="btn btn-link text-secondary-uim fw-bold text-uppercase p-0 text-decoration-none d-flex align-items-center gap-1 mt-auto tracking-widest transition-all" style="font-size: 0.7rem;">
              <span class="d-none d-sm-inline">DETALLES</span>
              <span class="d-sm-none">Ver</span>
              <i class="bi bi-plus-circle icon-transition fs-6"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Project Card 3 -->
      <div class="col-6 col-md-6 col-xl-4 mx-auto">
        <div class="card border border-secondary border-opacity-10 shadow-sm rounded-4 overflow-hidden h-100 card-hover-premium group-arrow-hover">
          <div class="position-relative overflow-hidden" style="height: 100px;">
            <img alt="Inundaciones" class="w-100 h-100 object-fit-cover group-hover-scale"
              src="https://lh3.googleusercontent.com/aida-public/AB6AXuDrDbey0ShAnsu7vb3f97Kaz6LzYMmiY3h3oDJYxkhBmVrncDVMYgvSGq_ImhhRO_MlfQUPcDiK9jUIbWF6LRWp7dGR26_yHKHlhhmU15A_dvqs6qFvNw5avLIt-GRxaFFTcX_Ddue2UlqObj6VoPV6_c_Qi6Qx5zq6XVLIhGJrOKRJOn0BOOILxWBd9vJVMNdkojUYvdjISXqQrx1V6bkt2hBKhklwUXrAbT_N1xpyiPqVW6oGg55BowyBtVyX_c2aBEi7JERqKA" />
            <div class="position-absolute top-0 start-0 m-2 m-md-3 z-2">
              <span class="badge bg-unam text-white text-uppercase tracking-widest px-2 py-1 rounded-pill" style="font-size: 0.5rem;">Planificación</span>
            </div>
          </div>
          <div class="card-body p-2 p-md-4 d-flex flex-column">
            <h4 class="fs-6 fs-md-5 fw-bold text-primary-uim mb-2 font-headline" style="font-size: 0.85rem !important;">Análisis de inundaciones pluviales</h4>
            <p class="small text-on-surface-variant mb-2 mb-md-4 d-none d-sm-block">Determinación de puntos críticos de anegamiento en zonas urbanas mediante topografía de alta precisión LIDAR.</p>
            <button class="btn btn-link text-secondary-uim fw-bold text-uppercase p-0 text-decoration-none d-flex align-items-center gap-1 mt-auto tracking-widest transition-all" style="font-size: 0.7rem;">
              <span class="d-none d-sm-inline">DETALLES</span>
              <span class="d-sm-none">Ver</span>
              <i class="bi bi-plus-circle icon-transition fs-6"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

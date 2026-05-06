import Swal from 'sweetalert2';

(function () {
    // Usar datos de la BD inyectados desde la vista
    const seminarios = window.seminariosData || [];

    const container = document.getElementById('cardsContainer');

    // ── Modal ──────────────────────────────────────────────
    const modal = document.getElementById('inscripcionModal');
    const modalForm = document.getElementById('formInscripcion');
    const modalSeminarioId = document.getElementById('modalSeminarioId');
    const modalSeminarioNombre = document.getElementById('modalSeminarioNombre');
    const modalClose = document.getElementById('modalClose');

    let currentSeminarioSeleccionado = null;

    function openModal(id) {
        const seminario = seminarios.find(s => s.id == id);
        currentSeminarioSeleccionado = seminario;
        
        if (seminario && modalSeminarioId && modalSeminarioNombre) {
            modalSeminarioId.value = seminario.id;
            modalSeminarioNombre.textContent = seminario.titulo || seminario.departamento || 'UIMA';
        }
        
        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        modal.classList.remove('active');
        document.body.style.overflow = '';
        modalForm.reset();
    }

    // Cerrar con el botón ×
    modalClose.addEventListener('click', closeModal);

    // Cerrar al hacer clic fuera del modal (en el overlay)
    modal.addEventListener('click', (e) => {
        if (e.target === modal) closeModal();
    });

    // Cerrar al enviar el formulario
    modalForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        
        const submitBtn = modalForm.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        
        // Deshabilitar botón
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Procesando...';

        const formData = {
            seminario_id: modalSeminarioId?.value || currentSeminarioSeleccionado?.id,
            nombre_completo: document.getElementById('inputNombre').value,
            email: document.getElementById('inputCorreo').value,
            tipo_usuario: document.getElementById('inputTipoUsuario').value,
            numero_cuenta: document.getElementById('inputNumeroCuenta').value,
            motivo: document.getElementById('inputMotivo').value,
            _token: document.querySelector('meta[name="csrf-token"]')?.content || ''
        };

        try {
            const response = await fetch('/inscripcion', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': formData._token
                },
                body: JSON.stringify(formData)
            });

            const result = await response.json();

            if (response.ok) {
                Swal.fire({
                    icon: 'success',
                    title: '¡Inscripción exitosa!',
                    html: `<p>Tu número de registro es:</p><h3 style="color: #D4AF37; margin: 15px 0;">${result.numero_registro}</h3><p style="font-size: 0.9em; color: #666;">Guarda este número, lo necesitarás para tu constancia.</p>`,
                    confirmButtonText: 'Aceptar',
                    confirmButtonColor: '#1E3C70',
                    customClass: {
                        popup: 'swal2-uiim'
                    }
                });
                closeModal();
            } else {
                const errorMsg = result.message || 'Error al procesar la inscripción. Por favor revisa los campos.';
                if (errorMsg.includes('Cupo lleno')) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Cupo lleno',
                        text: 'Lo sentimos, el cupo para este seminario está completo.',
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
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalText;
        }
    });
    // ──────────────────────────────────────────────────────

    const placeholders = {
        'anual': 'https://via.placeholder.com/400x160/003B6F/ffffff?text=Seminario+Anual',
        'permanente': 'https://via.placeholder.com/400x160/1f4b7a/ffffff?text=Seminario+Permanente',
        'especial': 'https://via.placeholder.com/400x160/B38633/003B6F?text=Seminario'
    };

    function renderCards(filteredSeminarios) {
        container.innerHTML = '';
        filteredSeminarios.forEach(s => {
            const card = document.createElement('div');
            card.className = 'seminario-card';
            let tagText = s.tipo === 'anual' ? 'Anual' : (s.tipo === 'permanente' ? 'Permanente' : 'Seminario');
            let tagClass = s.tipo === 'permanente' ? 'permanente' : (s.tipo === 'especial' ? 'especial' : '');
            let correoHtml = s.correo ? `<div class="correo"><i class="bi bi-envelope"></i> ${s.correo}</div>` : '';
            let telefonoHtml = s.telefono ? `<div class="telefono"><i class="bi bi-telephone"></i> ${s.telefono}</div>` : '';
            let imgSrc = s.imagen || '/seminarios/banners/Seminariosdefault.png';
            let areasHtml = (s.areas && s.areas.length) ? `<div class="card-areas"><i class="bi bi-tag"></i>${s.areas.map(a => `<span>${a}</span>`).join('')}</div>` : '';

            // Resumen corto del objetivo para móvil (primeros 80 caracteres)
            let objetivoResumen = s.objetivo.length > 80 ? s.objetivo.substring(0, 80) + '...' : s.objetivo;

            card.innerHTML = `
                <img class="card-img" src="${imgSrc}" alt="${s.titulo}" onerror="this.style.display='none';this.nextElementSibling.style.display='flex';">
                <div class="card-img-fallback" style="display:none;"><i class="bi bi-easel"></i></div>
                <div class="card-body">
                <span class="card-tag ${tagClass}">${tagText}</span>
                <h3>${s.titulo}</h3>
                <div class="objetivo"><strong>OBJETIVO:</strong> <p>${s.objetivo}</p></div>
                ${areasHtml}
                <div class="responsable"><i class="bi bi-person-badge"></i><span class="responsable-texto">${s.responsable}</span></div>
                ${correoHtml}
                ${telefonoHtml}
                <div class="card-actions">
                    <button class="btn-ver-mas" data-id="${s.id}" data-titulo="${encodeURIComponent(s.titulo)}">
                        <i class="bi bi-eye"></i> Ver más
                    </button>
                    <button class="btn-inscripcion" data-id="${s.id}"><i class="fas fa-user-plus"></i> Inscribirme ahora <span class="btn-arrow">→</span></button>
                </div>
                </div>
            `;
            container.appendChild(card);
        });
        // Event listeners para botones de inscripción
        document.querySelectorAll('.btn-inscripcion').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                const id = btn.dataset.id;
                openModal(id);
            });
        });

        // Event listeners para botones "ver más"
        document.querySelectorAll('.btn-ver-mas').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                const tituloEncoded = btn.dataset.titulo;
                const titulo = decodeURIComponent(tituloEncoded);
                const seminario = seminarios.find(s => s.titulo === titulo);
                if (seminario) {
                    openDetailModal(seminario);
                }
            });
        });
    }

    renderCards(seminarios);

    const filterBtns = document.querySelectorAll('.filter-btn');
    const searchInput = document.getElementById('searchInput');
    const searchBtn = document.getElementById('searchBtn');

    function filtrar() {
        // Buscar filtro activo en desktop o móvil
        const desktopActive = document.querySelector('.filter-btn.active');
        const mobileActive = document.querySelector('.filter-dropdown-item.active');
        const active = (desktopActive?.dataset.filter) || (mobileActive?.dataset.filter) || 'todos';

        const term = searchInput.value.trim().toLowerCase();
        const filtered = seminarios.filter(s => {
            const catMatch = (active === 'todos') ? true : s.tipo === active;
            const searchMatch = term === '' ? true :
                s.titulo.toLowerCase().includes(term) ||
                s.objetivo.toLowerCase().includes(term) ||
                s.responsable.toLowerCase().includes(term);
            return catMatch && searchMatch;
        });
        renderCards(filtered);
    }

    filterBtns.forEach(btn => {
        btn.addEventListener('click', function () {
            filterBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            filtrar();
        });
    });

    searchInput.addEventListener('input', filtrar);
    searchBtn.addEventListener('click', filtrar);

    // ===== MENÚ DROPDOWN DE FILTROS EN MÓVIL =====
    const filterMenuToggle = document.getElementById('filterMenuToggle');
    const filterDropdown = document.getElementById('filterDropdown');
    const filterDropdownItems = document.querySelectorAll('.filter-dropdown-item');
    const filterActiveLabel = document.querySelector('.filter-active-label');

    // Toggle del menú dropdown
    if (filterMenuToggle) {
        filterMenuToggle.addEventListener('click', function (e) {
            e.stopPropagation();
            filterDropdown.classList.toggle('active');
        });
    }

    // Selección de filtro en dropdown
    filterDropdownItems.forEach(item => {
        item.addEventListener('click', function () {
            const filterValue = this.dataset.filter;
            const filterText = this.textContent.trim();

            // Actualizar active en dropdown
            filterDropdownItems.forEach(i => i.classList.remove('active'));
            this.classList.add('active');

            // Actualizar label del botón
            if (filterActiveLabel) {
                filterActiveLabel.textContent = filterText;
            }

            // Cerrar dropdown
            filterDropdown.classList.remove('active');

            // Sincronizar con botones desktop y ejecutar filtro
            filterBtns.forEach(btn => {
                btn.classList.remove('active');
                if (btn.dataset.filter === filterValue) {
                    btn.classList.add('active');
                }
            });

            filtrar();
        });
    });

    // Cerrar dropdown al hacer click fuera
    document.addEventListener('click', function (e) {
        if (filterDropdown && !filterDropdown.contains(e.target) &&
            filterMenuToggle && !filterMenuToggle.contains(e.target)) {
            filterDropdown.classList.remove('active');
        }
    });

    // Cerrar dropdown al hacer scroll (mejor UX en móvil)
    let lastScrollY = window.scrollY;
    window.addEventListener('scroll', function () {
        if (filterDropdown && filterDropdown.classList.contains('active')) {
            const currentScrollY = window.scrollY;
            // Solo cerrar si hay scroll significativo
            if (Math.abs(currentScrollY - lastScrollY) > 50) {
                filterDropdown.classList.remove('active');
            }
            lastScrollY = currentScrollY;
        }
    }, { passive: true });

    // ===== MODAL DE DETALLES DEL SEMINARIO =====
    const detailModal = document.getElementById('detailModal');
    const detailModalBody = document.getElementById('detailModalBody');
    const detailModalClose = document.getElementById('detailModalClose');
    const btnInscribirFromDetail = document.getElementById('btnInscribirFromDetail');
    let currentSeminarioDetail = null;

    function openDetailModal(seminario) {
        currentSeminarioDetail = seminario;

        const tagText = seminario.tipo === 'anual' ? 'Anual' :
            (seminario.tipo === 'permanente' ? 'Permanente' : 'Seminario');
        const areasHtml = (seminario.areas && seminario.areas.length)
            ? seminario.areas.map(a => `<span class="detail-area">${a}</span>`).join('')
            : '';
        const correoHtml = seminario.correo
            ? `<div class="detail-contacto"><i class="bi bi-envelope"></i> ${seminario.correo}</div>`
            : '';
        const telefonoHtml = seminario.telefono
            ? `<div class="detail-contacto"><i class="bi bi-telephone"></i> ${seminario.telefono}</div>`
            : '';

        detailModalBody.innerHTML = `
            <div class="detail-header">
                <span class="detail-tag">${tagText}</span>
                <h3 class="detail-title">${seminario.titulo}</h3>
                <div class="detail-responsable">
                    <i class="bi bi-person-badge"></i> ${seminario.responsable}
                </div>
            </div>
            <div class="detail-objetivo">
                <h4><i class="bi bi-bullseye me-2"></i>Objetivo</h4>
                <p>${seminario.objetivo}</p>
            </div>
            <div class="detail-areas">
                <h4><i class="bi bi-tags me-2"></i>Áreas de conocimiento</h4>
                <div class="detail-areas-list">${areasHtml}</div>
            </div>
            ${(correoHtml || telefonoHtml) ? `
            <div class="detail-contacto-section">
                <h4><i class="bi bi-person-rolodex me-2"></i>Contacto</h4>
                ${correoHtml}
                ${telefonoHtml}
            </div>` : ''}
        `;

        detailModal.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeDetailModal() {
        detailModal.classList.remove('active');
        document.body.style.overflow = '';
        currentSeminarioDetail = null;
    }

    // Event listeners para modal de detalles
    if (detailModalClose) {
        detailModalClose.addEventListener('click', closeDetailModal);
    }

    if (detailModal) {
        detailModal.addEventListener('click', function (e) {
            if (e.target === detailModal) {
                closeDetailModal();
            }
        });
    }

    // Botón "Inscribirme" desde el modal de detalles
    if (btnInscribirFromDetail) {
        btnInscribirFromDetail.addEventListener('click', function () {
            if (currentSeminarioDetail) {
                closeDetailModal();
                setTimeout(() => {
                    openModal(currentSeminarioDetail.id);
                }, 200);
            }
        });
    }

    // Exponer función global para los botones "Ver más"
    window.openDetailModal = openDetailModal;
})();


// ── Lógica: selector tipo de usuario 

(function () {
    const selectTipo = document.getElementById('inputTipoUsuario');
    const grupoCuenta = document.getElementById('grupo-numero-cuenta');
    const inputCuenta = document.getElementById('inputNumeroCuenta');
    const badge = document.getElementById('tipoBadge');

    selectTipo.addEventListener('change', function () {
        const tipo = this.value;

        if (tipo === 'interno') {
            // Mostrar campo con animación
            grupoCuenta.classList.add('visible');
            inputCuenta.setAttribute('required', 'required');

            // Badge azul "FES Acatlán"
            badge.textContent = 'FES Acatlán';
            badge.className = 'tipo-badge interno';

        } else {
            // Ocultar campo y limpiar
            grupoCuenta.classList.remove('visible');
            inputCuenta.removeAttribute('required');
            inputCuenta.value = '';

            if (tipo === 'externo') {
                // Badge dorado "Externo"
                badge.textContent = 'Externo';
                badge.className = 'tipo-badge externo';
            } else {
                // Sin selección: quitar badge
                badge.textContent = '';
                badge.className = 'tipo-badge';
            }
        }
    });

    // Limpiar número de cuenta al cerrar/resetear el modal
    const btnCerrar = document.getElementById('modalClose');
    const formulario = document.getElementById('formInscripcion');

    function resetTipoUsuario() {
        selectTipo.value = '';
        grupoCuenta.classList.remove('visible');
        inputCuenta.removeAttribute('required');
        inputCuenta.value = '';
        badge.textContent = '';
        badge.className = 'tipo-badge';
    }

    if (btnCerrar) btnCerrar.addEventListener('click', resetTipoUsuario);
    if (formulario) formulario.addEventListener('reset', resetTipoUsuario);
})();
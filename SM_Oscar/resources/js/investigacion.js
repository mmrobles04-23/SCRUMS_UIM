(function() {
    const seminarios = [
        // Anuales
        { tipo: 'anual', titulo: 'La Justiciabilidad de los Derechos Económicos, Sociales y Culturales', objetivo: 'Justiciabilidad de los DESCA: fundamentar los derechos económicos, sociales y culturales, así como ambientales bajo un enfoque universal, interamericano y nacional que considere los criterios de progresividad y justiciabilidad a fin de advertir sobre relevancia e implicaciones prácticas.', responsable: 'Dr. Christian Miguel Acosta García', correo: '869546@pcpuma.acatlan.unam.mx', telefono: '', areas: ['Derecho', 'Derechos Humanos'] },
        { tipo: 'anual', titulo: 'Tendencias actuales en métodos para la investigación social', objetivo: 'Mejorar y actualizar la enseñanza de métodos de investigación para las ciencias sociales a través del fortalecimiento de los conocimientos en esta materia tanto de profesores como de estudiantes, promoviendo la generación de productos docentes que puedan ser utilizados para robustecer las habilidades en cuestiones metodológicas al interior de la FES Acatlán.', responsable: 'Dr. Edwin Atilano Robles', correo: '', telefono: '', areas: ['Ciencias Sociales', 'Metodología'] },
        { tipo: 'anual', titulo: 'Seminario multidisciplinario: Rehabilitación de la Cuenca del Río Pánuco', objetivo: 'Elaborar interdisciplinariamente una propuesta de Rehabilitación de la Cuenca del Río Pánuco, en la que se realicen estudios científicos con el fin de mejorar las condiciones de calidad y suministro de agua para las poblaciones y zonas agrícolas afectadas por la invasión de aguas residuales emitidas por la población del Valle de México, y para prevenir y mitigar desastres naturales como deslizamientos de tierras e inundaciones que afecten la estabilidad geotécnica, desde un enfoque jurídico, sociológico, económico y comunicativo.', responsable: 'Dr. José María Chávez Aguirre', correo: '', telefono: '', areas: ['Medio Ambiente', 'Multidisciplinario'] },
        { tipo: 'anual', titulo: 'Seminario-Taller de análisis de fuentes para la historia europea de los siglos XIX y XX', objetivo: 'Ser un espacio donde alumnos e investigadores recibirán clases y conferencias sobre los problemas historiográficos que aquejan el estudio del pasado desde la perspectiva de la historia europea de los siglos XIX y XX. Así mismo, trabajar el análisis de las fuentes para diversos proyectos de investigación como el proyecto "Redes de intelectuales y el espionaje en el Madrid de la Guerra Civil: análisis historiográficos y nuevas metodologías".', responsable: 'Dr. Rodrigo Octavio Tirado Salazar', correo: '', telefono: '', areas: ['Historia', 'Historiografía'] },
        { tipo: 'anual', titulo: 'Seminario Multidisciplinario de Estudios sobre la Prensa', objetivo: 'Construir un espacio de estudio multidisciplinario para el fomento, desarrollo y difusión de las investigaciones sobre distintos aspectos de la prensa periódica en México.', responsable: 'Lic. Luis Felipe Estrada Carreón', correo: '', telefono: '', areas: ['Comunicación', 'Periodismo'] },
        { tipo: 'anual', titulo: 'Recuperación y resignificación de las pedagogías liberadoras latinoamericanas y mexicanas como alternativas al pensamiento hegemónico que rige la educación del siglo XXI', objetivo: 'Recupera, mediante la técnica de investigación documental y la creación de un seminario, las pedagogías mexicanas y latinoamericanas que han significado una práctica contra hegemónica y que hoy permiten a través de su revaloración dar una respuesta alternativa a la educación dominante del siglo XXI.', responsable: 'Dra. Lorena Beatriz Garcés Zepeda', correo: '', telefono: '', areas: ['Pedagogía', 'Educación'] },
        { tipo: 'anual', titulo: 'La Cátedra Digital', objetivo: 'Formular, instrumentar y evaluar un modelo educativo que sea funcional para las modalidades presencial (con aula invertida), híbrida (mixta) y a distancia (en línea) para ser utilizado en bachillerato, licenciatura, posgrado, cursos de formación y actualización docente y educación continua.', responsable: 'Dra. María del Carmen González Videgaray', correo: '', telefono: '', areas: ['Educación', 'Tecnología'] },
        { tipo: 'anual', titulo: 'Problemas actuales de la interpretación histórica', objetivo: 'Estudiar las bases teóricas fundamentales para la investigación histórica y aplicarlas en casos concretos.', responsable: 'Lic. Manuel Ordóñez Aguilar', correo: '', telefono: '', areas: ['Historia'] },
        { tipo: 'anual', titulo: 'Seminario Modernidad, Arte y Política', objetivo: 'Análisis de los movimientos políticos-sociales y su relación con la emergencia de la crítica a la modernidad que se despliega mediante el código artístico de las vanguardias históricas.', responsable: 'Dra. Laura Páez Díaz de León', correo: '', telefono: '', areas: ['Arte', 'Política', 'Filosofía'] },
        { tipo: 'anual', titulo: 'Sociología etnográfica', objetivo: 'Realizar una propuesta en torno al uso crítico de la teoría y las técnicas de investigación en el trabajo de campo. Estudiar la dinámica institucional al interior de un hospital general de urgencias médicas. Y estudiar el papel de la teoría social en la conformación del sujeto delincuente.', responsable: 'Dr. Víctor Alejandro Payá Porres', correo: '', telefono: '', areas: ['Sociología', 'Etnografía'] },
        { tipo: 'anual', titulo: 'Arquitectura y vida cotidiana en la Ciudad de México, de fines del siglo XVIII hasta principios del siglo XX', objetivo: 'Estudiar el desarrollo de la arquitectura de la ciudad de México desde una perspectiva multidisciplinaria, incorporando para el análisis, el concepto de vida cotidiana.', responsable: 'Lic. Juan Luis Rodríguez Parga', correo: '', telefono: '', areas: ['Arquitectura', 'Historia'] },
        { tipo: 'anual', titulo: 'Género, ciencia y poder', objetivo: 'Analizar a partir de la década de los ochenta, los cambios ocurridos en el sistema de ciencia y tecnología en México, desde la perspectiva crítica de género, la sociología de la educación y la pedagogía crítica.', responsable: 'Dra. Alma Rosa Sánchez Olvera', correo: '', telefono: '', areas: ['Género', 'Ciencia y Tecnología'] },
        { tipo: 'anual', titulo: 'Problemas del aprendizaje', objetivo: 'Actualizar los procedimientos, estrategias y técnicas de intervención psicopedagógica.', responsable: 'Dra. María Teresa Alicia Silva y Ortiz', correo: '', telefono: '', areas: ['Psicología', 'Pedagogía'] },
        { tipo: 'anual', titulo: 'Didáctica híbrida en la educación superior', objetivo: 'Apoyar y dotar de elementos didácticos a profesoras y profesores que han decidido incorporar la didáctica híbrida como propuesta de formación en el nivel superior.', responsable: 'Dr. Eduardo Chávez Romero', correo: '', telefono: '', areas: ['Educación', 'Didáctica'] },
        // Permanentes
        { tipo: 'permanente', titulo: 'Seminario permanente de Derechos Humanos', objetivo: 'Valorar los Derechos Humanos bajo un enfoque integral que considere los parámetros universales, interamericanos y nacionales para promover la formación y actualización permanente a fin de advertir sobre su relevancia e implicaciones prácticas.', responsable: 'Dr. Christian Miguel Acosta García', correo: '', telefono: '', areas: ['Derecho', 'Derechos Humanos'] },
        { tipo: 'permanente', titulo: 'Seminario permanente de geopolítica aplicada', objetivo: 'Analizar desde el enfoque geopolítica eventos de coyuntura mundial.', responsable: 'Dra. Rocío Arroyo Belmonte', correo: '', telefono: '', areas: ['Geopolítica', 'Relaciones Internacionales'] },
        { tipo: 'permanente', titulo: 'Seminario permanente de Estudios de la Fiesta en México', objetivo: 'Convocar y organizar a los investigadores de la fiesta en México, independientemente de la formación profesional y de los intereses académicos.', responsable: 'Mtro. Hugo Cardoso Vargas', correo: '', telefono: '', areas: ['Cultura', 'Antropología'] },
        { tipo: 'permanente', titulo: 'Seminario permanente de Teoría e historiografía de los estudios de género', objetivo: 'Valorar los cambios y continuidades producidos en la evolución de la escritura de la historia de las mujeres y de género, durante los últimos treinta años. Analizar los avances epistemológicos que han producido la categoría de género en la investigación histórica, en particular en los campos de la historia social y la historia cultural.', responsable: 'Dra. Sofía Crespo Reyes', correo: '', telefono: '', areas: ['Género', 'Historia'] },
        { tipo: 'permanente', titulo: 'Seminario permanente de Retórica, literatura y docencia', objetivo: 'Promover el estudio de la retórica y su aplicación en el análisis y creación de textos, así como en la práctica docente.', responsable: 'Dra. Verónica Hernández Landa Valencia', correo: '', telefono: '', areas: ['Literatura', 'Lingüística'] },
        { tipo: 'permanente', titulo: 'Seminario permanente sobre Identidad universitaria', objetivo: 'Estudiar e interpretar la Identidad de la Universidad Nacional Autónoma de México para comprenderla como una obra colectiva en permanente construcción, donde confluyen la diversidad y la creatividad de la comunidad universitaria.', responsable: 'Lic. Jorge Eduardo Isaac Egurrola', correo: '', telefono: '', areas: ['Educación', 'Sociología'] },
        { tipo: 'permanente', titulo: 'Seminario permanente de Filosofía Política', objetivo: 'Plantear investigaciones hermenéuticas sobre los conceptos fundamentales de las doctrinas políticas de la Modernidad y sus críticas posmodernas.', responsable: 'Dr. Antonio Luis Marino López', correo: '', telefono: '', areas: ['Filosofía', 'Política'] },
        { tipo: 'permanente', titulo: 'Seminario permanente de Historiografía Lingüística', objetivo: 'Analizar y valorar los aportes de las obras lingüísticas surgidas en diferentes momentos de la historia, en especial de aquellas realizadas en México desde el siglo XVI, y destacar las tradiciones en que se sustentan y las innovaciones teóricas y metodológicas que incorporan en el tratamiento de un determinado tópico.', responsable: 'Dra. María del Pilar Isabel Máynez Vidal', correo: '', telefono: '', areas: ['Lingüística', 'Historia'] },
        { tipo: 'permanente', titulo: 'Seminario permanente de Epistemología, Enseñanza e Investigación Jurídica (SPEEIJ)', objetivo: 'Generar y difundir conocimiento riguroso y plural sobre la epistemología jurídica, enseñanza del derecho e investigación jurídica, desarrollando proyectos de investigación institucionales sobre el fenómeno jurídico y la enseñanza del derecho. Involucrar a los alumnos tempranamente en la investigación jurídica.', responsable: 'Dra. Pastora Melgar Manzanilla', correo: '', telefono: '', areas: ['Derecho', 'Epistemología'] },
        { tipo: 'permanente', titulo: 'Seminario permanente Crónicas y fuentes de origen indígena del siglo XVI novohispano', objetivo: 'Investigar desde la multidisciplina, las crónicas y fuentes de origen indígena del siglo XVI (paleografía, traducción y análisis) para comprender la vida indígena nahua en los albores del Virreinato.', responsable: 'Lic. Julio César Morán Álvarez', correo: '', telefono: '', areas: ['Historia', 'Antropología'] },
        { tipo: 'permanente', titulo: 'Seminario permanente de investigación en Sociología de la cultura', objetivo: 'Abordar de manera integral e interdisciplinaria las problemáticas relacionadas con el campo de conocimiento de la Sociología de la Cultura.', responsable: 'Dra. Laura Páez Díaz de León', correo: '', telefono: '', areas: ['Sociología', 'Cultura'] },
        { tipo: 'permanente', titulo: 'Seminario permanente Prácticas de inclusión y exclusión en la configuración de imaginarios mexicanos', objetivo: 'Analizar las prácticas de inclusión y exclusión entendidas como acciones, discursos, políticas, creaciones y construcción de espacios públicos y privados que configuran la construcción denominada lo mexicano. Identificar los elementos incluyentes y excluyentes en las prácticas que configuran lo mexicano. Ofrecer elementos que permitan reforzar los elementos incluyentes de estas prácticas y limitar los excluyentes.', responsable: 'Dr. Mauricio Pilatowsky Braverman', correo: '', telefono: '', areas: ['Sociología', 'Política'] },
        { tipo: 'permanente', titulo: 'Seminario permanente Análisis Regional y Estudios Espaciales (SAREE)', objetivo: 'Establecer el desarrollo, implantación y aplicación del estado del arte en la teoría y los métodos de análisis regional, la creación de nuevas perspectivas de análisis de los problemas de México y sus regiones y la formulación de políticas y estrategias para su solución.', responsable: 'Dr. Luis Quintana Romero y Lic. Jorge Eduardo Isaac Egurrola', correo: '', telefono: '', areas: ['Economía', 'Geografía'] },
        { tipo: 'permanente', titulo: 'Seminario permanente Gobernanza del desarrollo sostenible: hacia la construcción de alianzas multi-actor efectivas para la sostenibilidad', objetivo: 'Analizar la incidencia de las alianzas multistakeholder en la transformación positiva y el alcance de los ODS. Seminario co-cordinado con la Mtra. Blanca Elena Gómez García.', responsable: 'Dra. Adelina Quintero Sánchez y Mtra. Blanca Elena Gómez García', correo: '', telefono: '', areas: ['Gobernanza', 'Sustentabilidad'] },
        { tipo: 'permanente', titulo: 'Seminario permanente de Filosofía Moderna', objetivo: 'Analizar los fundamentos teóricos más relevantes de la Filosofía Moderna en sus diversas corrientes de pensamiento (Empirismo, Racionalismo, Idealismo, Criticismo, Romanticismo, etc.), para obtener una comprensión sólida de este periodo de la filosofía que le permita al integrante del seminario esclarecer tanto los antecedentes teóricos de esta área fundamental de la Filosofía, como sus implicaciones en la tradición filosófica posterior.', responsable: 'Dr. Luis Antonio Velasco Guzmán', correo: '', telefono: '', areas: ['Filosofía'] },
        // Otros
        { tipo: 'especial', titulo: 'Seminario "En la mirada de otros"', objetivo: 'Grupo de estudio sobre el retrato literario en México desde el siglo XVI al XXI en que se reflexiona y se escribe sobre los históricos, sociológicos y literarios de la construcción de la vida de artistas (particularmente escritores) mexicanos en diferentes tipos escritura: semblanza, retrato, biografía, esquela.', responsable: 'Lic. Miguel Ángel de la Calleja', correo: '', telefono: '5623-1750, ext. 38963 y 38958', areas: ['Literatura', 'Historia'] },
        { tipo: 'especial', titulo: 'Seminario Internacional: Retos y Perspectivas de la Educación y la Pedagogía', objetivo: 'Promover, estimular y fomentar la reflexión, discusión y desarrollo de las ciencias educativa y pedagógica en beneficio de la sociedad, las personas y los grupos apoyando esencialmente el desarrollo integral de los sujetos y los contextos internacionales.', responsable: 'Dra. Rosa Martha Gutiérrez Rodríguez', correo: '', telefono: '5623 1750, Ext. 38978', areas: ['Educación', 'Pedagogía'] }
    ];

    const container = document.getElementById('cardsContainer');

    // ── Modal ──────────────────────────────────────────────
    const modal        = document.getElementById('inscripcionModal');
    const modalForm    = document.getElementById('formInscripcion');
    const modalSelect  = document.getElementById('modalSeminario');
    const modalClose   = document.getElementById('modalClose');

    // Poblar el <select> con todos los títulos de seminarios
    seminarios.forEach(s => {
        const opt = document.createElement('option');
        opt.value = s.titulo;
        opt.textContent = s.titulo;
        modalSelect.appendChild(opt);
    });

    function openModal(titulo) {
        modalSelect.value = titulo;
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
    modalForm.addEventListener('submit', (e) => {
        e.preventDefault();
        closeModal();
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
            let imgSrc = s.imagen || placeholders[s.tipo] || placeholders['especial'];
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
                    <button class="btn-ver-mas" data-titulo="${encodeURIComponent(s.titulo)}">
                        <i class="bi bi-eye"></i> Ver más
                    </button>
                    <button class="btn-inscripcion"><i class="bi bi-pencil"></i> Inscribirme</button>
                </div>
                </div>
            `;
            container.appendChild(card);
        });
        // Event listeners para botones de inscripción
        document.querySelectorAll('.btn-inscripcion').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                const titulo = btn.closest('.seminario-card').querySelector('h3').textContent;
                openModal(titulo);
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
        btn.addEventListener('click', function() {
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
        filterMenuToggle.addEventListener('click', function(e) {
            e.stopPropagation();
            filterDropdown.classList.toggle('active');
        });
    }

    // Selección de filtro en dropdown
    filterDropdownItems.forEach(item => {
        item.addEventListener('click', function() {
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
    document.addEventListener('click', function(e) {
        if (filterDropdown && !filterDropdown.contains(e.target) && 
            filterMenuToggle && !filterMenuToggle.contains(e.target)) {
            filterDropdown.classList.remove('active');
        }
    });

    // Cerrar dropdown al hacer scroll (mejor UX en móvil)
    let lastScrollY = window.scrollY;
    window.addEventListener('scroll', function() {
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
        detailModal.addEventListener('click', function(e) {
            if (e.target === detailModal) {
                closeDetailModal();
            }
        });
    }

    // Botón "Inscribirme" desde el modal de detalles
    if (btnInscribirFromDetail) {
        btnInscribirFromDetail.addEventListener('click', function() {
            if (currentSeminarioDetail) {
                closeDetailModal();
                setTimeout(() => {
                    openModal(currentSeminarioDetail.titulo);
                }, 200);
            }
        });
    }

    // Exponer función global para los botones "Ver más"
    window.openDetailModal = openDetailModal;
})();
   

// ── Lógica: selector tipo de usuario 

    (function () {
        const selectTipo   = document.getElementById('inputTipoUsuario');
        const grupoCuenta  = document.getElementById('grupo-numero-cuenta');
        const inputCuenta  = document.getElementById('inputNumeroCuenta');
        const badge        = document.getElementById('tipoBadge');

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

        if (btnCerrar)  btnCerrar.addEventListener('click', resetTipoUsuario);
        if (formulario) formulario.addEventListener('reset', resetTipoUsuario);
    })();
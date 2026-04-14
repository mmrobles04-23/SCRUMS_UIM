/**
 * Lógica funcional para la vista de Departamentos en UIMA FES Acatlán
 */

document.addEventListener('DOMContentLoaded', () => {
    
    // Animación fluida de Intersección Visual para las tarjetas de proyectos
    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.1
    };

    const cardObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Agregar animación CSS u opacidad
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Aplicar a las tarjetas de proyectos (Bento Grid)
    document.querySelectorAll('.card-hover-premium').forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        card.style.transition = `all 0.6s ease-out ${index * 0.1}s`;
        cardObserver.observe(card);
    });

});
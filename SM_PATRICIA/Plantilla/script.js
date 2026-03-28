// script.js

// Arreglo actualizado: Añadimos la propiedad "url" a cada departamento
const departamentos = [
    {
        nombre: "Departamento de Investigación en Comunicación y Estudios Culturales",
        icono: "📊",
        url: "investigacion_comunicacion.html" // <- URL a donde dirigirá el clic
    },
    {
        nombre: "Departamento de Tecnología Ambiental",
        icono: "🌿",
        url: "tecnologia_ambiental.html"
    },
    {
        nombre: "Departamento de Proyección Empresarial e Intercambio y Colaboración Institucional",
        icono: "💡",
        url: "proyeccion_empresarial.html"
    },
    {
        nombre: "Departamento de Investigación en Procuración y Administración de Justicia.",
        icono: "🏢",
        url: "administracion_justicia.html"
    },
    {
        nombre: "Departamento De Investigación Educativa",
        icono: "🏢",
        url: "investigacion_educativa.html"
    },
    {
        nombre: "Departamento de Análisis de Riesgos Naturales y Antropogénicos",
        icono: "🏢",
        url: "analisis_riesgos.html"
    }
];

// Función que se ejecuta cuando la página ha cargado
document.addEventListener("DOMContentLoaded", () => {
    
    const contenedor = document.getElementById("tarjetas-contenedor");
	
    const elementoNombre = document.getElementById("NombreDepto");
    const nombreDeptoActual = elementoNombre ? elementoNombre.textContent.trim() : "";

    // Recorremos nuestros datos y creamos el HTML para cada tarjeta
    departamentos.forEach(depto => {
        // CAMBIO CLAVE: Creamos un elemento <a> en lugar de un <div>
        const tarjeta = document.createElement("a");

	// Le asignamos el enlace a la tarjeta (si no hay url, ponemos "#" por defecto)
        tarjeta.href = depto.url || "#"; 

	if (depto.nombre === nombreDeptoActual) {
            tarjeta.className = "new-format-card DeptoActual";
	    // Le insertamos la estructura HTML interna
            tarjeta.innerHTML = `
            <div class="card-icon">${depto.icono}</div>
            <div class="card-text" style="color: var(--unam-dorado);">${depto.nombre}</div>
            `;
        } else {
            tarjeta.className = "new-format-card"; // Clase normal
	    // Le insertamos la estructura HTML interna
            tarjeta.innerHTML = `
            <div class="card-icon">${depto.icono}</div>
            <div class="card-text">${depto.nombre}</div>
            `;
        }

        // Agregamos la tarjeta terminada al contenedor
        contenedor.appendChild(tarjeta);
    });

    console.log("Tarjetas cargadas dinámicamente como enlaces con éxito.");
	
    // Lógica de ventanas emergentes (se mantiene igual)
    const ventanasEmergentes = document.querySelectorAll(".Ventana");
    ventanasEmergentes.forEach(ventana => {
        ventana.addEventListener("click", function(event) {
            if (event.target === this) {
                this.style.display = "none";
            }
        });
    });
});

/**
 * @param {string} elementId  ID del elemento HTML
 */
function toggleDisplayFlex(elementId) {
    try {
        const element = document.getElementById(elementId);
        if (!element) return;

        if (window.getComputedStyle(element).display === "none") {
            element.style.display = "flex";
        } else {
            element.style.display = "none";
        }
    } catch (error) {
        console.error("Error al cambiar el display:", error);
    }
}
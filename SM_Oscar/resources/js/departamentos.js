// 🔹 VER MÁS ARRIBA
function toggleInfo(boton) {
    let info = boton.nextElementSibling;

    info.style.display = (info.style.display === "block") ? "none" : "block";
}


// 🔹 VER MÁS TARJETAS
function toggleCardInfo(event, boton) {
    event.stopPropagation(); // evita que active la tarjeta

    let info = boton.nextElementSibling;
    info.classList.toggle("activa");
}


// 🔹 SELECCIÓN DE TARJETAS (SIN cambiar info de arriba)
let tarjetas = document.querySelectorAll(".funcion");

tarjetas.forEach(t => {
    t.addEventListener("click", function() {

        // quitar selección anterior
        tarjetas.forEach(el => el.classList.remove("activa"));

        // activar esta
        this.classList.add("activa");
    });
});


// 🔹 ANIMACIÓN AL CARGAR
window.addEventListener("load", function() {

    let tarjetas = document.querySelectorAll(".funcion");

    tarjetas.forEach((el, i) => {
        el.style.opacity = "0";
        el.style.transform = "translateY(40px)";

        setTimeout(() => {
            el.style.opacity = "1";
            el.style.transform = "translateY(0)";
        }, i * 120);
    });

});
document.addEventListener('DOMContentLoaded', function() {

    eventListeners();
    darkMode();
    mostrarVendedorListener();

});

function darkMode() {
    const preferencias = window.matchMedia('(prefers-color-scheme: dark)');
    if (preferencias.matches) {
        document.body.classList.add('dark-mode');
    } else {
        document.body.classList.remove('dark-mode');
    }

    preferencias.addEventListener('change', function() {
        if (preferencias.matches) {
            document.body.classList.add('dark-mode');
        } else {
            document.body.classList.remove('dark-mode');
        }
    });

    const botonDarkMode = document.querySelector('.dark-mode-boton');
    botonDarkMode.addEventListener('click', function() {
        document.body.classList.toggle('dark-mode');

    });
}

function eventListeners() {
    const mobileMenu = document.querySelector('.mobile-menu');

    mobileMenu.addEventListener('click', function() {
        responsiveNav();
    });
}

function responsiveNav() {
    const navegation = document.querySelector('.navegacion');

    if (navegation.classList.contains('mostrar')) {
        navegation.classList.remove('mostrar');
    } else {
        navegation.classList.add('mostrar');
    }
}

function mostrarVendedorListener() {
    const botonVendedor = document.getElementById("boton-vendedor");

    botonVendedor.addEventListener('click', function(event) {
        mostrarFormularioVendedor();
        event.preventDefault();
    });
}

function mostrarFormularioVendedor() {
    const divVendedor = document.getElementById("nuevo-vendedor");

    divVendedor.classList.toggle('ocultarFormularioVendedor');
}
const imagenPortada = document.querySelector("#foto-portada");
const openModal = document.querySelector(".btn-registro")
const abrirFormRegistro = document.querySelector(".modal")
const cerrarFormRegistro = document.querySelector(".modal-close")

//variables formulario
const formulario = document.getElementById("form-registro")
const labelsFormulario = formulario.querySelectorAll("label");
const inputsLabel = formulario.querySelectorAll("input");
const nombre = document.getElementById("nombre")
const apellidos = document.getElementById("apellidos")
const email = document.getElementById("email")
const contrasena = document.getElementById("contrasena")
const contrasenaRepetida = document.getElementById("contrasena_repetida")
const parrafo = document.getElementById("warnings")

console.log(inputsLabel)
let listaUsuarios = []

cambiarImagenPortada()
cargarEventListeners();

function cargarEventListeners() {

    document.addEventListener("DOMContentLoaded", () => {
        //cambiarImagenPortada();
    })

    openModal.addEventListener("click", (e) => {
        e.preventDefault();
        abrirFormRegistro.classList.add("modal--show")
    })
    cerrarFormRegistro.addEventListener("click", (e) => {
        e.preventDefault()
        abrirFormRegistro.classList.remove("modal--show")
    })
}
//Función que cambia la imagen de la portada en base a las dimensiones de la pantalla
function cambiarImagenPortada() {
    // Creamos un objeto de media query
    const mediaQuery = window.matchMedia("(min-width: 767px)");

    // Verificamos si el media query se cumple
    if (mediaQuery.matches) {
        // Si la pantalla es mayor o igual a 480px, cambiamos la imagen
        console.log("coinciden")
        imagenPortada.src = "./assets/images/portada/definitiva3.png";

    } else {
        imagenPortada.src = "./assets/images/portada/portada_mobile.png";

    }
}

nombre.addEventListener("focus", (e) => {
    labelsFormulario[0].classList.add("subir-label")
})
apellidos.addEventListener("focus", (e) => {
    labelsFormulario[1].classList.add("subir-label")
})
email.addEventListener("focus", (e) => {
    labelsFormulario[2].classList.add("subir-label")
})
contrasena.addEventListener("focus", (e) => {
    labelsFormulario[3].classList.add("subir-label")
})
contrasenaRepetida.addEventListener("focus", (e) => {
    labelsFormulario[4].classList.add("subir-label")
})

//Función que valida el formulario al hacer submit
formulario.addEventListener("submit", e => {
    console.log("Click en eviar")
    e.preventDefault()
    const nombreValue = nombre.value.trim();
    const apellidosValue = apellidos.value.trim();
    const emailValue = email.value.trim();
    const passwordValue = contrasena.value.trim();
    const passwordRepetidaValue = contrasenaRepetida.value.trim();

    console.log(`nombre ${nombreValue}, apellidos ${apellidosValue}, email ${emailValue}, password ${passwordValue},`)

    let warnings = "";
    let error = false;
    let nombreApellidosRegex = /^([A-Za-zÑñÁáÉéÍíÓóÚú]+['\-]{0,1}[A-Za-zÑñÁáÉéÍíÓóÚú]+)(\s+([A-Za-zÑñÁáÉéÍíÓóÚú]+['\-]{0,1}[A-Za-zÑñÁáÉéÍíÓóÚú]+))*$/;
    let emailRegex = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/;
    if (nombreValue.length < 3) {
        warnings += `El nombre debe constar de al menos 3 caracteres <br/>`;
        error = true;
    } else if (!nombreApellidosRegex.test(nombreValue)) {
        warnings += `El nombre debe estar bien formado <br/>`;
        error = true;
    }
    if (apellidosValue.length < 3) {
        warnings += `Los apellidos debe constar de al menos 3 caracteres <br/>`;
        error = true;
    } else if (!nombreApellidosRegex.test(apellidosValue)) {
        warnings += `Los apellidos deben estar bien formado <br/>`;
        error = true;
    }

    if (!emailRegex.test(emailValue)) {
        warnings += `Email inválido <br/>`;
        error = true;
    }
    if (passwordValue !== passwordRepetidaValue) {
        warnings += `Las contraseñas no coinciden inválido <br/>`;
        error = true;
    } else if (passwordValue < 4) {
        warnings += `Las contraseña constar de al menos 3 caracteres <br/>`;
        error = true;
    }
    console.log(parrafo)

    if (error) {
        parrafo.innerHTML = warnings
        console.log(parrafo)
    } else {
        enviarFormulario()
    }


})


//Almacenar en localstorage
function enviarFormulario() {
    console.log("Documento listo")
    $("#form-registro").submit(function (e) {
        e.preventDefault()
        var nombre = $("#nombre").val();
        var apellidos = $("#apellidos").val()
        var email = $("#email").val()
        var contrasena = $("#contrasena").val()

        const datosUsuario = {
            nombre,
            apellidos,
            email,
            contrasena
        }
        listaUsuarios = [...listaUsuarios, datosUsuario]
        localStorage.setItem("datosUsuario", JSON.stringify(datosUsuario))
    });
}



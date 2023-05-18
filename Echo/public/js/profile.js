console.log("Holaaa desde js")

const titulo = document.querySelector("#titulo_profile");
const li = document.querySelectorAll("li")

const fotoInput = document.querySelector('.foto-input');
const fotoForm = document.getElementById('foto-form');

/*********Formulario*************** */
const formulario = document.getElementById("form-registro")
//const labelsFormulario = formulario.querySelectorAll("label");
//const inputsLabel = formulario.querySelectorAll("input");
const nombre = document.getElementById("nombre")
const apellidos = document.getElementById("apellidos")
const email = document.getElementById("email")
const contrasena = document.getElementById("contrasena")
const contrasenaRepetida = document.getElementById("contrasena_repetida")
const parrafo = document.getElementById("warnings")

const textArea = document.querySelector("textarea");

//CLick en LI, quitamos la clase activo
//todos .li quitar la clase activo
//todos .bloque quitar la clase activo
//.li con la al que hemos hecho click añadimos la clase activo
//.bloque al que le hemos hecho click añadimos la clase activo

li.forEach((cadaLi, i) => {//cadaLi es cada uno de los li, i es la posición

    li[i].addEventListener("click", () => {//cuando haga click en cada uno de los elementos

        li.forEach((cadaLi, i) => {
            li[i].classList.remove("activo")
        })
        li[i].classList.add("activo")

        const btnTexto = cadaLi.innerText;//extraico el texto de cada li, (recuerda que li es el <li> completo)
        titulo.innerText = btnTexto;
    })
});

//guarda la foto del usuariio
document.addEventListener("DOMContentLoaded", () => {
    fotoInput.addEventListener('change', function () {
        fotoForm.submit();
    });
})



nombre.addEventListener("focus", (e) => {
    console.log("click en nombre")
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
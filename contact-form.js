//  Validación del formulario de contacto

// Expresiones regulares
const soloLetras = /^[a-zA-ZàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞŸăşţĂŞŢčšžČŠŽćđžĆĐŽłńśźżŁŃŚŹŻőűŐŰ\s\-']+$/;
const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
const telRegex   = /^[+0-9\s\-]{7,15}$/;

// Función genérica de validación
function validarCampo(id, condicion, idError) {
  const input = document.getElementById(id);
  const error = document.getElementById(idError);
  if (!condicion(input.value.trim())) {
    input.classList.add("invalid");
    error.style.display = "block";
    return false;
  } else {
    input.classList.remove("invalid");
    error.style.display = "none";
    return true;
  }
}

// Validación en tiempo real al salir de cada campo
document.getElementById("nombre").addEventListener("blur", () =>
  validarCampo("nombre", v => v !== "" && soloLetras.test(v), "error-nombre"));

document.getElementById("apellidos").addEventListener("blur", () =>
  validarCampo("apellidos", v => v !== "" && soloLetras.test(v), "error-apellidos"));

document.getElementById("email").addEventListener("blur", () =>
  validarCampo("email", v => v !== "" && emailRegex.test(v), "error-email"));

document.getElementById("telefono").addEventListener("blur", () =>
  validarCampo("telefono", v => v === "" || telRegex.test(v), "error-telefono"));

document.getElementById("mensaje").addEventListener("blur", () =>
  validarCampo("mensaje", v => v !== "", "error-mensaje"));

// Validación al enviar el formulario
document.querySelector("form").addEventListener("submit", function(e) {
  const valido =
    validarCampo("nombre",    v => v !== "" && soloLetras.test(v), "error-nombre")    &
    validarCampo("apellidos", v => v !== "" && soloLetras.test(v), "error-apellidos") &
    validarCampo("email",     v => v !== "" && emailRegex.test(v), "error-email")     &
    validarCampo("telefono",  v => v === "" || telRegex.test(v),   "error-telefono")  &
    validarCampo("mensaje",   v => v !== "",                        "error-mensaje");

  if (!valido) e.preventDefault();
});

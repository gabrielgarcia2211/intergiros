const campo1 = document.getElementById('nombre');
const campo2 = document.getElementById('email');
const campo3 = document.getElementById('contraseña');
const campo4 = document.getElementById('terminos');
const boton = document.getElementById('registro');

campo1.addEventListener('input', validarCampos);
campo2.addEventListener('input', validarCampos);
campo3.addEventListener('input', validarCampos);
campo4.addEventListener('change', validarCampos);

function validarCampos() {
    if (campo1.value.trim() !== '' && campo2.value.trim() !== '' && campo3.value.trim() !== '' && campo4.checked) {
        boton.removeAttribute('disabled');
    } else {
        boton.setAttribute('disabled', 'true');
    }
}
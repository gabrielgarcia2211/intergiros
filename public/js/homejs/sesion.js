const campo1 = document.getElementById('email');
const campo2 = document.getElementById('contraseña');
const boton = document.getElementById('iniciar');

campo1.addEventListener('input', validarCampos);
campo2.addEventListener('input', validarCampos);

function validarCampos() {
    if (campo1.value.trim() !== '' && campo2.value.trim() !== '') {
        boton.removeAttribute('disabled');
    } else {
        boton.setAttribute('disabled', 'true');
    }
}
javascript
function validarClave() {
    var clave = document.getElementById("clave").value;
    var confirmacionClave = document.getElementById("confirmacionClave").value;

    if (clave === confirmacionClave) {
        Swal.fire({
            title: 'Las claves coinciden.',
            icon: 'success',
            confirmButtonText: 'Entendido'
        });
        return true;
    } else {
        Swal.fire({
            title: 'Las claves no coinciden.',
            text: 'Por favor, verifica la contraseña.',
            icon: 'error',
            confirmButtonText: 'Entendido'
        });
        return false;
    }
}
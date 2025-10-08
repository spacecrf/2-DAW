document.getElementById('miFormulario').addEventListener('submit', function (event) {
    let errores = [];
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const nombre = document.getElementById('nombre').value;

    if (!email) {
        errores.push('El email es obligatorio.');
    }
    if (!password || password.length < 8) {
        errores.push('La contraseña debe tener al menos 8 caracteres.');
    }
    for(let i = 0; i < nombre.length; i++){
        if(nombre[i] >= '0' && nombre[i] <= '9'){
            errores.push('El nombre no puede tener números.');
            break;
        }
    }
    if (errores.length > 0) {
        event.preventDefault(); // Previene el envío del formulario
        document.getElementById('errores').innerHTML = errores.join('<br>');
    }
});
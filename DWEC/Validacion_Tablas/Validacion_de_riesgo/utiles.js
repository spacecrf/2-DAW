document.getElementById('Formulario_riesgo').addEventListener('submit', function (event) {
    let errores = [];
    const email = document.getElementById('email').value;
    const nombre = document.getElementById('nombre').value;
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirm-password').value;

    if(!nombre){
        errores.push('El nombre es obligatorio')
    }

    if (!email){
        errores.push('El email no puede estar vacio');
    }

    if(password != confirmPassword){
        errores.push('Las contraseñas no coinciden')
    }

    if(errores.length > 0){
        event.preventDefault();
        document.getElementById('errores').innerHTML = errores.join('<br>');
    }
});
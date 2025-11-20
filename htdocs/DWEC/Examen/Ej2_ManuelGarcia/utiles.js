let tareas = [];

function cargarPerro(){
    fetch('https://dog.ceo/api/breeds/image/random')
    .then(response => response.json())
    .then(data => {
        const imagen = document.getElementById('imagen');
        imagen.innerHTML = `<img src="${data.message}" alt="Perro Aleatorio" width="300">`;
        tareas.push(data.message);
    })
    .catch(error => console.error('Error al cargar la imagen:', error));
}

//console.log(tareas);

function verHistorial(){
    const historial = document.getElementById('historial');
    historial.innerHTML = '';
    tareas.forEach(t => {
        const tr = document.createElement('tr');
        tr.innerHTML = `<td><img src="${t}" alt="Perro Aleatorio" width="30"></td>`;
        historial.appendChild(tr);
    });
}



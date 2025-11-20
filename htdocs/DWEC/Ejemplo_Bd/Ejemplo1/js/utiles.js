function cargarAlumnos() {
    fetch('php/listaralumons.php')
        .then(response => response.json())
        .then(data => {
            const articulos = data.slice(0, 5); // Solo los primeros 5
            const tbody = document.querySelector('#alumnos');
            tbody.innerHTML = ''; // Limpiar antes de cargar nuevos

            articulos.forEach(articulo => {
                const fila = document.createElement('tr');
                fila.innerHTML = `
                    <td>${articulo.nombre}</td>
                    <td>${articulo.apellido}</td>
                    <td>${articulo.nota}</td>
                `;
                tbody.appendChild(fila);
            });
        });
}


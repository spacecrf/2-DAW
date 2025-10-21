function cargaArticulos() {
    fetch('https://jsonplaceholder.typicode.com/posts')
        .then(response => response.json())
        .then(data => {
            const articulos = data.slice(0, 5); // Solo los primeros 5
            const tbody = document.querySelector('#tablaArticulos tbody');
            tbody.innerHTML = ''; // Limpiar antes de cargar nuevos

            articulos.forEach(articulo => {
                const fila = document.createElement('tr');
                fila.innerHTML = `
                    <td>${articulo.id}</td>
                    <td>${articulo.title}</td>
                    <td>${articulo.body}</td>
                `;
                tbody.appendChild(fila);
            });
        });
}

function muestra() {
    let id = document.getElementById('texto').value;
    if (!id) return alert("Introduce un ID para buscar.");

    fetch(`https://jsonplaceholder.typicode.com/posts/${id}`)
        .then(response => response.json())
        .then(data => {
            const tbody = document.querySelector('#tablaArticulos tbody');
            tbody.innerHTML = ''; // Limpiar la tabla

            const fila = document.createElement('tr');
            fila.innerHTML = `
                <td>${data.id}</td>
                <td>${data.title}</td>
                <td>${data.body}</td>
            `;
            tbody.appendChild(fila);
        });
}

function cargarAutores() {
    // Cargar lista de autores
    fetch('https://jsonplaceholder.typicode.com/users')
        .then(response => response.json())
        .then(users => {
            const select = document.querySelector('#autor');
            users.forEach(user => {
                const option = document.createElement('option');
                option.value = user.id;
                option.textContent = user.name;
                select.appendChild(option);
            });
        });
}

function filtrarPorAutor() {
    let id = document.querySelector('#autor').value;
    if (!id) return;

    fetch(`https://jsonplaceholder.typicode.com/posts?userId=${id}`)
        .then(response => response.json())
        .then(data => {
            const tbody = document.querySelector('#tablaArticulos tbody');
            tbody.innerHTML = ''; // Limpiar tabla

            data.forEach(articulo => {
                const fila = document.createElement('tr');
                fila.innerHTML = `
                    <td>${articulo.id}</td>
                    <td>${articulo.title}</td>
                    <td>${articulo.body}</td>
                `;
                tbody.appendChild(fila);
            });
        });
}

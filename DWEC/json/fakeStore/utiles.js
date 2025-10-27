let categoriaActual = 'all';
let ordenActual = 'asc';

// Cargar categorías desde la API
function cargarCategorias() {
    fetch('https://fakestoreapi.com/products/categories')
        .then(response => response.json())
        .then(categorias => {
            const cat = document.querySelector('#categorias');
            cat.innerHTML = ''; // Limpia el contenido previo

            const select = document.createElement('select');
            select.classList.add('form-select', 'w-auto');
            select.setAttribute('aria-label', 'Selecciona una categoría');

            // Opción inicial
            const opcionInicial = document.createElement('option');
            opcionInicial.textContent = 'Todas las categorías';
            opcionInicial.value = 'all';
            opcionInicial.selected = true;
            select.appendChild(opcionInicial);

            // Añadir opciones dinámicamente
            categorias.forEach(categoria => {
                const option = document.createElement('option');
                option.value = categoria;
                option.textContent = categoria.charAt(0).toUpperCase() + categoria.slice(1);
                select.appendChild(option);
            });

            // Insertar el select en el contenedor
            cat.appendChild(select);

            // Cuando se cambie la categoría
            select.addEventListener('change', () => {
                categoriaActual = select.value;
                if (categoriaActual === 'all') {
                    cargarArticulos();
                } else {
                    cargarArticulosPorCategoria(categoriaActual, ordenActual);
                }
            });
        })
        .catch(error => console.error('Error cargando categorías:', error));
}

// Actualizar orden
function actualizarOrden() {
    const selectOrden = document.getElementById('orden');
    ordenActual = selectOrden.value;

    if (categoriaActual === 'all') {
        cargarArticulos(ordenActual);
    } else {
        cargarArticulosPorCategoria(categoriaActual, ordenActual);
    }
}

// Cargar todos los artículos (puede aceptar orden)
function cargarArticulos(sort = 'asc') {
    fetch(`https://fakestoreapi.com/products?sort=${sort}`)
        .then(response => response.json())
        .then(articulos => mostrarArticulos(articulos))
        .catch(error => console.error('Error cargando artículos:', error));
}

// Cargar artículos filtrados por categoría y orden
function cargarArticulosPorCategoria(categoria, sort = 'asc') {
    fetch(`https://fakestoreapi.com/products/category/${categoria}?sort=${sort}`)
        .then(response => response.json())
        .then(articulos => mostrarArticulos(articulos))
        .catch(error => console.error('Error filtrando artículos:', error));
}

// Mostrar productos
function mostrarArticulos(articulos) {
    const contenedor = document.getElementById('tablaArticulos');
    contenedor.innerHTML = '';

    articulos.forEach(articulo => {
        const card = document.createElement('div');
        card.classList.add('col-md-4', 'col-lg-3');

        card.innerHTML = `
            <div class="card h-100 shadow-sm">
                <img src="${articulo.image}" class="card-img-top p-3" alt="${articulo.title}"
                    style="height: 250px; object-fit: contain;">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">${articulo.title}</h5>
                    <p class="card-text text-truncate" title="${articulo.description}">
                        ${articulo.description}
                    </p>
                    <p class="fw-bold">$${articulo.price}</p>
                    <a href="#" class="btn btn-primary mt-auto">Ver más</a>
                     <button class="btn btn-danger" onclick="eliminarArticulo(${articulo.id})">Eliminar</button>
                </div>
            </div>
        `;
        contenedor.appendChild(card);
    });
}

function eliminarArticulo(id) {
        fetch(`https://fakestoreapi.com/products/${id}`, {
            method: "DELETE",
        })
        .then(res => res.json())
        .then(data => {
            console.log("Producto eliminado:", data);
            alert(`Producto con ID ${id} eliminado (simulado).`);
            // Recargar la lista
            if (categoriaActual === 'all') {
                cargarArticulos(ordenActual);
            } else {
                cargarArticulosPorCategoria(categoriaActual, ordenActual);
            }
        })
        .catch(error => console.error('Error eliminando producto:', error));
}

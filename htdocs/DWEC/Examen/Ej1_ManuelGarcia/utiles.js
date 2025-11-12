const tareas = [];
let filtroActual = 'Todas';

function mostrarTareas() {
    const lista = document.getElementById('lista');
    const tabla = document.getElementById('tbody');
    lista.innerHTML = '';
    tabla.innerHTML = '';

    let tareasFiltradas = tareas;
    if (filtroActual !== 'Todas') {
        tareasFiltradas = tareas.filter(t => t.prioridad === filtroActual);
    }

    if (tareasFiltradas.length === 0) {
        lista.innerHTML = '<li class="muted">No hay tareas para mostrar.</li>';
        tabla.innerHTML = '<tr><td colspan="3" class="muted">No hay tareas para mostrar.</td></tr>';
        return;
    }

    tareasFiltradas.forEach(tarea => {

        const li = document.createElement('li');
        li.className = 'item';
        li.innerHTML = `
            <div>${tarea.nombre} <span class="chip ${tarea.prioridad.toLowerCase()}">${tarea.prioridad}</span></div>
            <button class="ghost" onclick="eliminarTarea(${tarea.id})">Eliminar</button>
        `;
        lista.appendChild(li);

        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td>${tarea.nombre}</td>
            <td><span class="chip ${tarea.prioridad.toLowerCase()}">${tarea.prioridad}</span></td>
            <td><button class="ghost" onclick="eliminarTarea(${tarea.id})">Eliminar</button></td>
        `;
        tabla.appendChild(tr);
    });
}

function añadirTarea() {
    const nombre = document.getElementById('nombre').value.trim();
    const prioridad = document.getElementById('prioridad').value;
    const status = document.getElementById('status');

    if (nombre === '') {
        status.textContent = 'El nombre no puede estar vacío.';
        status.className = 'status err';
        return;
    }

    const existente = tareas.find(t => t.nombre.toLowerCase() === nombre.toLowerCase());

    if (existente) {
        if (existente.prioridad === prioridad) {
            status.textContent = `La tarea "${nombre}" ya existe con prioridad ${prioridad}.`;
            status.className = 'status warn';
            return;
        } else {
            existente.prioridad = prioridad;
            status.textContent = `Se actualizó la prioridad de "${nombre}".`;
            status.className = 'status ok';
            mostrarTareas();
            return;
        }
    }

    const nuevaTarea = {
        id: Date.now(),
        nombre: nombre,
        prioridad: prioridad
    };

    tareas.push(nuevaTarea);
    status.textContent = `Tarea "${nombre}" añadida.`;
    status.className = 'status ok';
    mostrarTareas();
}

function eliminarTarea(id) {
    const index = tareas.findIndex(t => t.id === id);
    if (index !== -1) {
        const nombre = tareas[index].nombre;
        tareas.splice(index, 1);
        document.getElementById('status').textContent = `Tarea "${nombre}" eliminada.`;
        document.getElementById('status').className = 'status ok';
        mostrarTareas();
    }
}

document.getElementById('form-tarea').addEventListener('submit', function (e) {
    e.preventDefault();
    añadirTarea();
});

document.getElementById('filtro').addEventListener('change', function () {
    filtroActual = this.value;
    mostrarTareas();
});

mostrarTareas();

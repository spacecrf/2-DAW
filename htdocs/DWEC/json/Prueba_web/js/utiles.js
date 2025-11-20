document.addEventListener("DOMContentLoaded", async () => {
    const tabla = document.getElementById("tabla-alumnos");
    const tbody = tabla.querySelector("tbody");
    const cargando = document.getElementById("cargando");

    try {
        const respuesta = await fetch("php/listaralumnos.php");
        const datos = await respuesta.json();

        if (datos.length > 0) {
            datos.forEach(alumno => {
                const fila = document.createElement("tr");
                fila.innerHTML = `
                    <td>${alumno.codigo}</td>
                    <td>${alumno.nombre}</td>
                    <td>${alumno.apellido}</td>
                    <td>${alumno.notas}</td>
                    <td>
                    <button onclick="eliminaralumno(${alumno.codigo});">Eliminar</button>
                    <button onclick="modificaralumno(${alumno.codigo});">Modificar</button>
                    <button onclick="verNotas(${alumno.codigo});">Ver notas</button>
                    </td>
                `;
                tbody.appendChild(fila);
            });
            cargando.style.display = "none";
            tabla.style.display = "table";
        } else {
            cargando.textContent = "No hay registros de alumnos.";
        }
    } catch (error) {
        cargando.textContent = "Error al cargar los datos.";
        console.error(error);
    }
});

function verNotas(codigo) {
    fetch(`php/vernotas.php?codigo=${codigo}`)
        .then(res => res.json())
        .then(data => {
            const div = document.getElementById("notas");
            const ul = document.createElement("ul");
            data.forEach(nota => {
                const li = document.createElement("li");
                li.innerHTML = `
            Materia: ${nota.asignatura}, 
            Nota: ${nota.nota}
            `;
                ul.appendChild(li);
            });
            div.appendChild(ul)
        });
}

function modificaralumno(codigo) {
    const nombre = prompt("Introduce el nuevo nombre:");
    if (!nombre) return;

    const apellido = prompt("Introduce los nuevos apellidos:");
    if (!apellido) return;

    const nota = prompt("Introduce la nueva nota:");
    if (!nota) return;

    const url = `php/modificaralumno.php?codigo=${codigo}&nombre=${encodeURIComponent(nombre)}&apellido=${encodeURIComponent(apellido)}&notas=${encodeURIComponent(nota)}`;

    fetch(url)
        .then(res => res.json())
        .then(data => {
            if (data.status === "success") {
                alert(data.message);
                location.reload(); // recarga la tabla actualizada
            } else {
                alert(data.message);
            }
        })
        .catch(err => console.error(err));
}

function eliminaralumno(codigo) {
    fetch(`php/eliminaralumno.php?codigo=${codigo}`)
        .then(res => res.json())
        .then(data => {
            if (data.status === "success") {
                alert(data.message);
                // Recargar tabla y lista
                location.reload();
            } else {
                alert(data.message);
            }
        })
        .catch(err => console.error(err));
}

function cargalista() {
    fetch("php/listaralumnosfacil.php")
        .then(res => res.text())
        .then(data => document.getElementById('lista-alumnos').innerHTML = data)
        .catch(err => console.error(err));
}

function altaalumno() {
    const nombre = document.getElementById("nombre").value.trim();
    const apellido = document.getElementById("apellido").value.trim();
    const nota = document.getElementById("notas").value.trim();

    if (!nombre || !apellido || !nota) {
        alert("Todos los campos son obligatorios.");
        return;
    }

    const url = `php/insertaralumno.php?nombre=${encodeURIComponent(nombre)}&apellido=${encodeURIComponent(apellido)}&notas=${encodeURIComponent(nota)}`;

    fetch(url)
        .then(res => res.json())
        .then(data => {
            if (data.status === "success") {
                alert(data.message);
                document.getElementById("nombre").value = "";
                document.getElementById("apellido").value = "";
                document.getElementById("notas").value = "";
                // Recargar tabla y lista
                location.reload();
            } else {
                alert(data.message);
            }
        })
        .catch(err => console.error(err));
}

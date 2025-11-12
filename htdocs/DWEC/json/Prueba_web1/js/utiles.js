
// Cuando la página carga
document.addEventListener("DOMContentLoaded", async () => {
    const tabla = document.getElementById("tabla-alumnos");
    const tbody = tabla.querySelector("tbody");
    const cargando = document.getElementById("cargando");

    try {
        // Petición al PHP que devuelve JSON
        const respuesta = await fetch("php/listaralumnos.php");
        const datos = await respuesta.json();

        // Si hay alumnos
        if (datos.length > 0) {
            datos.forEach(alumno => {
                const fila = document.createElement("tr");
                fila.innerHTML = `
                    <td>${alumno.codigo}</td>
                    <td>${alumno.nombre}</td>
                    <td>${alumno.apellido}</td>
                    <td>${alumno.notas}</td>
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

function cargaLista(){
    fetch("php/listaralumnosfacil.php")
    .then(res => res.text())
    .then(data => {
        document.getElementById("lista-alumnos").innerHTML = data;
    })
}
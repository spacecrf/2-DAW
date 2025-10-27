const tabla = document.getElementById('tabla1');

// Crear visor flotante
const visorFlotante = document.createElement('div');
visorFlotante.id = 'visorFlotante';
visorFlotante.style.position = 'absolute';
visorFlotante.style.display = 'none';
visorFlotante.style.pointerEvents = 'none';
document.body.appendChild(visorFlotante);

const imgFlotante = document.createElement('img');
imgFlotante.style.maxWidth = '300px';
imgFlotante.style.maxHeight = '300px';
imgFlotante.style.border = '2px solid #007BFF';
imgFlotante.style.borderRadius = '8px';
imgFlotante.style.opacity = '0';
imgFlotante.style.transition = 'opacity 0.5s';
visorFlotante.appendChild(imgFlotante);

// Recorremos todas las filas del tbody
for (let fila of tabla.tBodies[0].rows) {

    // Colorear celdas
    for (let i = 0; i < fila.cells.length; i++) {
        const celda = fila.cells[i];

        if (celda.textContent.trim() === "") {
            celda.style.backgroundColor = "gray";
        }

        if (i === 2) { // columna Valoración
            const valor = parseInt(celda.textContent);
            if (!isNaN(valor) && valor < 5) {
                celda.style.backgroundColor = "red";
                celda.style.color = "white";
            }
        }
    }

    // Hover sobre fila
    fila.addEventListener('mouseenter', () => {
        fila.dataset.originalColor = fila.style.backgroundColor || "";
        fila.style.backgroundColor = "yellow";
    });

    fila.addEventListener('mouseleave', () => {
        fila.style.backgroundColor = "";

        for (let i = 0; i < fila.cells.length; i++) {
            const celda = fila.cells[i];

            if (celda.textContent.trim() === "") {
                celda.style.backgroundColor = "gray";
            } else if (i === 2) {
                const valor = parseInt(celda.textContent);
                if (!isNaN(valor) && valor < 5) {
                    celda.style.backgroundColor = "red";
                    celda.style.color = "white";
                } else {
                    celda.style.backgroundColor = "";
                    celda.style.color = "";
                }
            } else {
                celda.style.backgroundColor = "";
            }
        }
    });

    // Hover sobre celda Ruta para visor
    const celdaRuta = fila.cells[3];

    let timeoutOcultar; // timeout para fade-out

    celdaRuta.addEventListener('mouseenter', (e) => {
        clearTimeout(timeoutOcultar); // cancelar cualquier fade-out pendiente

        const ruta = celdaRuta.textContent.trim().replace(/\\/g, '/');
        imgFlotante.src = ruta;

        visorFlotante.style.display = "block";
        visorFlotante.style.left = e.pageX + 20 + "px";
        visorFlotante.style.top = e.pageY + 20 + "px";

        // Forzar reflow para que fade-in funcione
        imgFlotante.offsetWidth;
        imgFlotante.style.opacity = 1;
    });

    celdaRuta.addEventListener('mousemove', (e) => {
        visorFlotante.style.left = e.pageX + 20 + "px";
        visorFlotante.style.top = e.pageY + 20 + "px";
    });

    celdaRuta.addEventListener('mouseleave', () => {
        // Fade-out
        imgFlotante.style.opacity = 0;

        // Solo ocultamos después de que termine la transición
        timeoutOcultar = setTimeout(() => {
            visorFlotante.style.display = "none";
        }, 500);
    });
}
let valorSeleccionado = null;

// Capturamos clicks sobre los dígitos
const tablaDigitos = document.getElementById('tablaDigitos');
for (let celda of tablaDigitos.tBodies[0].rows[0].cells) {
    celda.style.cursor = "pointer"; // indicamos que se puede clicar
    celda.addEventListener('click', () => {
        valorSeleccionado = celda.textContent;
        // Marcamos visualmente el dígito seleccionado
        for (let c of tablaDigitos.tBodies[0].rows[0].cells) {
            c.style.backgroundColor = "";
            c.style.color = "";
        }
        celda.style.backgroundColor = "#007BFF";
        celda.style.color = "white";
    });
}

// Aplicamos clicks sobre las celdas de Valoración en tabla1
for (let fila of tabla.tBodies[0].rows) {
    const celdaValoracion = fila.cells[2]; // columna Valoración
    celdaValoracion.style.cursor = "pointer";

    celdaValoracion.addEventListener('click', () => {
        if (valorSeleccionado !== null) {
            celdaValoracion.textContent = valorSeleccionado;

            // Actualizamos el color según regla del punto a)
            const valor = parseInt(valorSeleccionado);
            if (!isNaN(valor) && valor < 5) {
                celdaValoracion.style.backgroundColor = "red";
                celdaValoracion.style.color = "white";
            } else {
                celdaValoracion.style.backgroundColor = "";
                celdaValoracion.style.color = "";
            }
        }
    });
}

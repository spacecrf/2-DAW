function cargarProvincia() {
    fetch('https://raw.githubusercontent.com/IagoLast/pselect/master/data/provincias.json')
        .then(response => response.json())
        .then(provincias => {
            const select = document.querySelector('#provincia');
            provincias.forEach(provincia => {
                const opcion = document.createElement('option');
                opcion.value = provincia.id;
                opcion.textContent = provincia.nm;
                select.appendChild(opcion);
            });
        })
        .catch(error => console.error('Error cargando provincias:', error));
}

function seleccionProvincia() {
    const idProvincia = document.querySelector('#provincia').value;
    const selectMunicipio = document.querySelector('#municipio');
    
    selectMunicipio.innerHTML = '<option value="">Seleccione un municipio</option>';

    if (!idProvincia) return;

    fetch('https://raw.githubusercontent.com/IagoLast/pselect/master/data/municipios.json')
        .then(response => response.json())
        .then(municipios => {
            const filtrados = municipios.filter(m => m.id.startsWith(idProvincia));
            filtrados.forEach(municipio => {
                const opcion = document.createElement('option');
                opcion.value = municipio.id;
                opcion.textContent = municipio.nm;
                selectMunicipio.appendChild(opcion);
            });
        })
        .catch(error => console.error('Error cargando municipios:', error));
}

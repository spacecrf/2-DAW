function crearOpcion(){
    let nuevo = document.createElement('li');
    let num = document.querySelectorAll('#opciones li').length +1;
    nuevo.innerHTML = 'Opcion ' + num+ '<button onclick= "Borrar('+num+')">borrar</button>';
    let padre = document.querySelector('#opciones');
    padre.appendChild(nuevo);
}
function Borrar(fila){
    fila = document.querySelector('li:nth-child('+fila+')');
    fila.remove();
}

function borrarOpcion() {
    let ultimo = document.querySelectorAll('#opciones li');
    if (ultimo.length >0){
        ultimo[ultimo.length -1].remove();
    }
}

function crearTabla(){
    let filas = prompt('Dame el numero de filas');
    let columnas = prompt('Dame el numero de columnas');
    let tabla = document.createElement('table');
    for (let i= 0; i<filas; i++){
        let fila = document.createElement('tr');
        for(let j=0; j<columnas; j++){
            let celdas = document.createElement('td');
            celdas.innerHTML = 0;
            fila.appendChild(celdas);
        }
        tabla.appendChild(fila);
    }
    document.body.appendChild(tabla);
}

function cambiarColor(celdas){
    celdas.innerHTML =  parseInt(celdas.innerHTML) +1;
    if (celdas.innerHTML >= 10){
        celdas.style.backgroundColor = 'yellow';
    }
}

/*
function incremetar(celda){
    letvalor = parseInt(celda.textContent);
    valor++;
    celda.textContent = valor;
    if (valor >= 10){
        celda.style.backgroundColor = 'yellow';
    }
}
*/
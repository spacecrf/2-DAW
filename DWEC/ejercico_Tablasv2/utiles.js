function agregar() {
    let codigo = document.getElementById("codigo").value;
    let descripcion = document.getElementById("descripcion").value;
    let cantidad = document.getElementById("cantidad").value;
    let precio = document.getElementById("precio").value;
    let fila = document.createElement("tr");
    document.getElementById("tabla").appendChild(fila);

    let celda = document.createElement("td");
    celda.textContent = codigo;
    fila.appendChild(celda);

    let celda2 = document.createElement("td");
    celda2.textContent = descripcion;
    fila.appendChild(celda2);

    let celda3 = document.createElement("td");
    celda3.textContent = cantidad;
    fila.appendChild(celda3);

    let celda4 = document.createElement("td");
    celda4.textContent = precio;
    fila.appendChild(celda4);

    let celda5 = document.createElement("td");
    celda5.setAttribute("class", "subtotal");
    celda5.textContent = (cantidad * precio).toFixed(2);
    fila.appendChild(celda5);

    let celda6 = document.createElement("td");
    celda6.innerHTML = '<button onclick="borrar(this)">Borrar</button>';
    celda6.innerHTML += '<button onclick="editar(this)">Editar</button>';
    fila.appendChild(celda6);

    calcularTotal();
}

function calcularTotal() {
    let total = 0;
    let subtotales = document.getElementsByClassName("subtotal");
    for (i = 0; i < subtotales.length; i++) {
        total += parseFloat(subtotales[i].textContent);
    }
    document.getElementById("total").textContent = total.toFixed(2);
}

function borrar(x) {
    var i = x.parentNode.parentNode.rowIndex;
    document.getElementById("tabla").deleteRow(i);
    calcularTotal();
}

function autocompletarCampos(){
    let codigo = document.getElementById("codigo").value;
    let tabla2 = document.getElementById("tabla2");
    let filas = tabla2.getElementsByTagName("tr");

    for(let i = 0; i < filas.length; i++){
        let codigoFila = filas[i].getElementsByTagName("td")[0].textContent;
        if(codigoFila === codigo){
            let descripcion = filas[i].getElementsByTagName("td")[1].textContent;
            let precio = filas[i].getElementsByTagName("td")[2].textContent;
            document.getElementById("descripcion").value = descripcion;
            document.getElementById("precio").value = precio;
            break;
        }else{
            document.getElementById("descripcion").value = "Indefinido";
            document.getElementById("precio").value = "";
        }
    }
}




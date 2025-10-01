var titulo;

function muestraTitulo() {
    titulo = document.getElementById("titulo");
    // alert(titulo.innerHTML)
    // console.log(titulo.innerHTML)
    titulo.innerHTML = "Hola Mundo!";
}

function contador() {
    cuenta = document.getElementById("cuenta");
    cuenta.innerHTML = parseInt(cuenta.innerHTML) + 1;
}

function parrafos() {
    parrafos = document.getElementsByTagName("p");
    parrafo = prompt("Parrafo a cambiar [1-3]: ") - 1;
    parrafos[parrafo].innerHTML = "PARRAFO CAMBIADO";
}

function sumaCelda() {
    let suma = 0;
    celdas = document.getElementsByTagName("td");

    for (let i = 0; i < celdas.length; i++) {
        suma = suma + parseInt(celdas[i].innerHTML);
    }
    let sumaDerecha = 0;
    celdasDerecha = document.getElementsByClassName("derecha");

    for (let i = 0; i < celdasDerecha.length; i++) {
        sumaDerecha = sumaDerecha + parseInt(celdasDerecha[i].innerHTML);
    }
    document.getElementById("suma").innerHTML = "SUMA : " + suma + "<br>Suma derecha : " + sumaDerecha;
}

function aumenta() {
    imagen = document.querySelector('#imagen');
    //imagen.setAttribute('width', 600);
    imagen.width = imagen.width+10;
}

function cambiaestilo() {
    micaja = document.querySelector('#micaja');
    micaja.style.backgroundColor = 'blue';
    micaja.style.width = '200px';
}
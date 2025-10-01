function sumar() {
    //document.querySelector('#formulario').prevenrtDefault();
    let num1 = parseInt(document.querySelector('#numero1').value);
    let num2 = parseInt(document.querySelector('#numero2').value);
    if (document.querySelector('#numero1').value == "" || document.querySelector('#numero2').value == "") {
        alert('Debes introducir dos numeros');
        return;
    }
    let suma = num1 + num2;
    document.querySelector('#resultado').innerHTML = "La suma es: " + suma;
}

//<button onclick="sumar()">Sumar</button>

//seleccion de radio

var votos = [0, 0, 0];
var totalVotos = 0;

function verOpcion() {
    let opciones = document.getElementsByName('encuesta');
    for (let i = 0; i < opciones.length; i++) {
        if (opciones[i].checked) {
            //alert('Has elegido: '+opciones[i].value);
            votos[i]++;
            totalVotos++;

            let porcentaje1 = (votos[0] * 100 / totalVotos).toFixed(2);
            let porcentaje2 = (votos[1] * 100 / totalVotos).toFixed(2);
            let porcentaje3 = (votos[2] * 100 / totalVotos).toFixed(2);
            document.getElementById('votosSi').innerHTML = votos[0] + ' / ' + porcentaje1 + '%';
            document.getElementById('votosNo').innerHTML = votos[1] + ' / ' + porcentaje2 + '%';
            document.getElementById('votosNs').innerHTML = votos[2] + ' / ' + porcentaje3 + '%';
            document.getElementById('img1').width = porcentaje1 * 5
            document.getElementById('img1').height = 5;
            document.getElementById('img2').width = porcentaje2 * 5
            document.getElementById('img2').height = 5;
            document.getElementById('img3').width = porcentaje3 * 5;
            document.getElementById('img3').height = 5;
        }
    }
}

function anade() {

    let paises = document.getElementById('pais');
    const nuevaOpcion = new Option(document.getElementById('texto').value, "nv")
    paises.options.add(nuevaOpcion);


    /*let pais = document.querySelector('input').value;
    let opcion = document.createElement('option');
    opcion.text = pais;
    document.getElementById('pais').add(opcion);
    document.querySelector('input').value;*/

}

function anadirPalabra() {
    let palabras = document.getElementById('palabra1');
    const nuevaOpcion = new Option(document.getElementById('Palabra').value);
    palabras.options.add(nuevaOpcion);
}

function anadirPalabra2() {
    let nueva = document.getElementById('Palabra2');
    const nuevaOpcion2 = new Option(document.getElementById('palabra1').value);

    for (let i = 0; i < nueva.options.length; i++) {
        if (nueva.options[i].value == document.getElementById('palabra1').value) {
            alert('La palabra ya existe');
            return;
        }
    }
            nueva.options.add(nuevaOpcion2);
}

const subcategorias ={
    teclado: ['mecanico', 'membrana', 'inalambrico'],
    raton: ['laser', 'optico', 'inalambrico'],
    monitor: ['led', 'oled', 'tactil'],
    pc: ['sobremesa', 'portatil', 'all in one']
};

function cargarLista2(){
    const categoria = document.getElementById('lista1').value;
    const subcategoriasSelect = document.getElementById('lista2');

    subcategoriasSelect.innerHTML = '<option value="">Selecciona una opcion</option>';

    if(categoria){
        let subcats = subcategorias[categoria];

        subcats.forEach(subcat => {
            const opcion = document.createElement('option');
            opcion.value = subcat.toLowerCase();
            opcion.textContent = subcat;
            subcategoriasSelect.appendChild(opcion);
        });
    }
}
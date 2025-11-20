// Lista de artículos disponibles
const articulos = [
  { codigo: "A001", descripcion: "Teclado", precio: 20 },
  { codigo: "A002", descripcion: "Ratón", precio: 15 },
  { codigo: "A003", descripcion: "Monitor", precio: 150 },
  { codigo: "A004", descripcion: "Impresora", precio: 90 }
];

// Mostrar descripción y precio al introducir código
document.getElementById("codigo").addEventListener("input", () => {
  const codigo = document.getElementById("codigo").value;
  const articulo = articulos.find(a => a.codigo === codigo);
  if (articulo) {
    document.getElementById("descripcion").value = articulo.descripcion;
    document.getElementById("precio").value = articulo.precio;
    actualizarSubtotal();
  }
});

// Actualizar subtotal al cambiar cantidad
document.getElementById("cantidad").addEventListener("input", actualizarSubtotal);

function actualizarSubtotal() {
  const precio = parseFloat(document.getElementById("precio").value) || 0;
  const cantidad = parseInt(document.getElementById("cantidad").value) || 1;
  document.getElementById("subtotal").value = (precio * cantidad).toFixed(2);
}

// Insertar línea en la tabla
function insertarLinea() {
  const codigo = document.getElementById("codigo").value;
  const descripcion = document.getElementById("descripcion").value;
  const precio = parseFloat(document.getElementById("precio").value);
  const cantidad = parseInt(document.getElementById("cantidad").value);
  const subtotal = parseFloat(document.getElementById("subtotal").value);

  const fila = `<tr>
    <td>${codigo}</td>
    <td>${descripcion}</td>
    <td>${precio.toFixed(2)}</td>
    <td>${cantidad}</td>
    <td>${subtotal.toFixed(2)}</td>
  </tr>`;

  document.querySelector("#tablaFactura tbody").insertAdjacentHTML("beforeend", fila);
  actualizarTotales(subtotal);
}

// Actualizar base y total con IVA
let base = 0;
function actualizarTotales(subtotal) {
  base += subtotal;
  document.getElementById("base").textContent = base.toFixed(2);
  document.getElementById("total").textContent = (base * 1.21).toFixed(2);
}

// Mostrar tabla de artículos
function mostrarArticulos() {
  const modal = document.getElementById("articulosModal");
  modal.style.display = "block";
  const tbody = document.querySelector("#tablaArticulos tbody");
  tbody.innerHTML = "";
  articulos.forEach(a => {
    const fila = document.createElement("tr");
    fila.innerHTML = `<td>${a.codigo}</td><td>${a.descripcion}</td><td>${a.precio}</td>`;
    fila.addEventListener("click", () => {
      document.getElementById("codigo").value = a.codigo;
      document.getElementById("descripcion").value = a.descripcion;
      document.getElementById("precio").value = a.precio;
      document.getElementById("cantidad").value = 1;
      actualizarSubtotal();
      modal.style.display = "none";
    });
    tbody.appendChild(fila);
  });
}

// Filtrar artículos por descripción
function filtrarArticulos() {
  const filtro = document.getElementById("buscador").value.toLowerCase();
  const filas = document.querySelectorAll("#tablaArticulos tbody tr");
  filas.forEach(fila => {
    const descripcion = fila.children[1].textContent.toLowerCase();
    fila.style.display = descripcion.includes(filtro) ? "" : "none";
  });
}
// Datos de componentes (fuente de verdad)
const COMPONENTES = [
  { n: 1, categoria: "CPU", nombre: "AMD Ryzen 7 7800X3D", precio: 369.90, moneda: "EUR", tienda: "NEOBYTE", url: "PEGA_AQUI_URL_DEL_PRODUCTO", nota: "8 núcleos, 16 hilos, 3D V-Cache para juegos de alta tasa de FPS." },
  { n: 2, categoria: "Placa base", nombre: "Gigabyte B650 EAGLE AX AM5", precio: 147.09, moneda: "EUR", tienda: "PcComponentes", url: "PEGA_AQUI_URL_DEL_PRODUCTO", nota: "Chipset B650, soporte DDR5, Wi‑Fi 6E." },
  { n: 3, categoria: "Memoria RAM", nombre: "Kingston FURY Beast 32 GB DDR5‑6000", precio: 133.67, moneda: "EUR", tienda: "PcComponentes", url: "PEGA_AQUI_URL_DEL_PRODUCTO", nota: "2x16 GB, perfil EXPO, ideal para AM5." },
  { n: 4, categoria: "Tarjeta gráfica", nombre: "Gigabyte GeForce RTX 4070 Windforce OC 12 GB", precio: 509.50, moneda: "EUR", tienda: "", url: "PEGA_AQUI_URL_DEL_PRODUCTO", nota: "DLSS 3, gran rendimiento 1080p/1440p alto refresco." },
  { n: 5, categoria: "Fuente de alimentación", nombre: "MSI MAG A850GL PCIE5 850 W", precio: 106.90, moneda: "EUR", tienda: "", url: "PEGA_AQUI_URL_DEL_PRODUCTO", nota: "80+ Gold, conector 12VHPWR." },
  { n: 6, categoria: "Monitor", nombre: "BenQ ZOWIE XL2566K", precio: 782.60, moneda: "EUR", tienda: "", url: "PEGA_AQUI_URL_DEL_PRODUCTO", nota: "24.5'', TN, 360 Hz, orientado a eSports. Precio estimado." },
  { n: 7, categoria: "Teclado", nombre: "Razer Viper Mini Signature Edition", precio: 89.99, moneda: "EUR", tienda: "Amazon", url: "PEGA_AQUI_URL_DEL_PRODUCTO", nota: "Ratón gaming ultraligero, sensor óptico de 8500 DPI." },
  { n: 8, categoria: "Almacenamiento", nombre: "Samsung 980 PRO 1TB NVMe SSD", precio: 89.90, moneda: "EUR", tienda: "PcComponentes", url: "PEGA_AQUI_URL_DEL_PRODUCTO", nota: "PCIe 4.0, velocidades hasta 7000 MB/s lectura." },
  { n: 9, categoria: "Caja", nombre: "Fractal Design Core 1000", precio: 45.99, moneda: "EUR", tienda: "Amazon", url: "PEGA_AQUI_URL_DEL_PRODUCTO", nota: "Micro ATX, compacta, excelente flujo de aire." }
];

const esEUR = new Intl.NumberFormat('es-ES', { style: 'currency', currency: 'EUR' });
const formatEUR = n => esEUR.format(n);

// Mapeo de imágenes por categoría
const IMAGENES = {
  'CPU': 'procesador.png',
  'Placa base': 'Placa.png',
  'Memoria RAM': 'ram.png',
  'Tarjeta gráfica': 'grafica.png',
  'Fuente de alimentación': 'fuente.png',
  'Monitor': 'monitor.png',
  'Teclado': 'RazerViperMiniSignatureEdition.png',
  'Almacenamiento': 'procesador.png',
  'Caja': 'Placa.png'
};

function renderComponentes() {
  const lista = document.getElementById('lista-componentes');
  lista.innerHTML = '';
  COMPONENTES.forEach(comp => {
    const el = document.createElement('article');
    el.className = 'item'; el.role = 'listitem'; el.tabIndex = 0;
    el.innerHTML = `
      <div class="row">
        <div class="info"><img class="thumb" src="images/${IMAGENES[comp.categoria] || 'monitor.png'}" alt="${comp.categoria}" /><div><div class="categoria">${comp.categoria}</div><div class="nombre">${comp.nombre}</div></div></div>
        <div class="nota">${comp.nota}</div>
        <div class="precio" aria-label="Precio">${formatEUR(comp.precio)}</div>
        <div class="acciones">
          <a class="btn btn-ghost btn-ver" href="#" target="_blank" rel="noopener">Ver producto</a>
          <span class="chip estado">${comp.tienda || '—'}</span>
        </div>
      </div>
      <div class="tooltip" role="tooltip">${comp.categoria}: ${comp.nombre}. ${comp.nota}</div>`;
    const link = el.querySelector('.btn-ver');
    if (!comp.url || comp.url.startsWith('PEGA_AQUI')) {
      link.setAttribute('aria-disabled', 'true');
      link.setAttribute('title', 'Añade la URL');
      link.addEventListener('click', e => e.preventDefault());
    } else {
      link.href = comp.url;
    }
    lista.appendChild(el);
  });
}

function getMonitorToggle() { const s = localStorage.getItem('incluyeMonitor'); return s === null ? true : s === 'true'; }
function setMonitorToggle(v) { localStorage.setItem('incluyeMonitor', String(v)); }

function calcularTotal() {
  const incluir = document.getElementById('toggle-monitor').checked;
  const sum = COMPONENTES.reduce((acc, c) => acc + ((c.categoria === 'Monitor' && !incluir) ? 0 : Number(c.precio)), 0);
  return Number(sum.toFixed(2));
}

function actualizarTotal() {
  const total = calcularTotal();
  const out = document.getElementById('total');
  out.textContent = `Total estimado: ${formatEUR(total)}`;
  const resumen = document.getElementById('resumen-total'); if (resumen) resumen.textContent = `Total estimado: ${formatEUR(total)}`;
  const schema = document.getElementById('schema-product');
  try { const data = JSON.parse(schema.textContent); data.offers.lowPrice = String(total); data.offers.highPrice = String(total); schema.textContent = JSON.stringify(data); } catch (e) { }
}

function copiarListado() {
  const lines = COMPONENTES.map(c => `- [${c.categoria}] ${c.nombre} — ${formatEUR(c.precio)}  ${c.url && !c.url.startsWith('PEGA_AQUI') ? c.url : ''}`);
  const texto = 'Listado de componentes (estimado):\n' + lines.join('\n');
  navigator.clipboard.writeText(texto).then(() => avisoTemporal('Listado copiado al portapapeles')).catch(() => alert('No se pudo copiar.'));
}

function descargarCSV() {
  const headers = ['n', 'categoria', 'nombre', 'precio', 'moneda', 'tienda', 'url', 'nota'];
  const rows = COMPONENTES.map(c => headers.map(h => String(c[h] ?? '')).join(';'));
  const csv = [headers.join(';'), ...rows].join('\n');
  const blob = new Blob(['\uFEFF' + csv], { type: 'text/csv;charset=utf-8;' });
  const url = URL.createObjectURL(blob); const a = document.createElement('a'); a.href = url; a.download = 'componentes.csv'; document.body.appendChild(a); a.click(); a.remove(); URL.revokeObjectURL(url);
}

function avisoTemporal(msg) {
  const n = document.createElement('div'); n.role = 'status'; Object.assign(n.style, { position: 'fixed', left: '50%', top: '1rem', transform: 'translateX(-50%)', background: '#13241b', border: '1px solid #1d4d38', padding: '.5rem .75rem', borderRadius: '10px', zIndex: '9999' }); n.textContent = msg; document.body.appendChild(n); setTimeout(() => n.remove(), 1800);
}

function initCarousel() {
  const track = document.getElementById('carousel-track'); const slides = Array.from(track.children);
  let index = 0, scale = 1; const prev = document.querySelector('.carousel .prev'); const next = document.querySelector('.carousel .next');
  const zoomIn = document.getElementById('zoom-in'); const zoomOut = document.getElementById('zoom-out');
  const modal = document.getElementById('modal'); const modalImg = document.getElementById('modal-img'); const modalClose = modal.querySelector('.modal-close');
  const update = () => track.style.transform = `translateX(${-index * 100}%)`;
  prev.addEventListener('click', () => { index = (index - 1 + slides.length) % slides.length; update(); });
  next.addEventListener('click', () => { index = (index + 1) % slides.length; update(); });
  zoomIn.addEventListener('click', () => { scale = Math.min(2, scale + 0.1); slides[index].querySelector('img').style.transform = `scale(${scale})`; });
  zoomOut.addEventListener('click', () => { scale = Math.max(1, scale - 0.1); slides[index].querySelector('img').style.transform = `scale(${scale})`; });
  slides.forEach(slide => slide.addEventListener('click', () => { const src = slide.querySelector('img').src; modalImg.src = src; modal.setAttribute('aria-hidden', 'false'); modal.showModal ? modal.showModal() : modal.setAttribute('open', ''); }));
  modalClose.addEventListener('click', () => { modal.setAttribute('aria-hidden', 'true'); modal.close ? modal.close() : modal.removeAttribute('open'); });
  modal.addEventListener('click', e => { if (e.target === modal) modalClose.click(); });
}

function valEmail(e) { return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(e); }

function initForm() {
  const form = document.getElementById('form-contacto'); const success = document.getElementById('form-success');
  const fields = { nombre: document.getElementById('nombre'), email: document.getElementById('email'), telefono: document.getElementById('telefono'), mensaje: document.getElementById('mensaje') };
  const showError = (id, msg) => document.getElementById('err-' + id).textContent = msg || '';
  if (!form) return;
  form.addEventListener('submit', e => {
    e.preventDefault(); let ok = true;['nombre', 'email', 'telefono', 'mensaje'].forEach(k => showError(k));
    if (!fields.nombre.value.trim()) { showError('nombre', 'Introduce tu nombre'); ok = false; }
    if (!fields.email.value.trim() || !valEmail(fields.email.value)) { showError('email', 'Introduce un email válido'); ok = false; }
    if (!fields.mensaje.value.trim()) { showError('mensaje', 'Cuéntanos qué necesitas'); ok = false; }
    if (ok) { success.hidden = false; form.reset(); fields.nombre.focus(); }
  });
}

function init() {
  const yearEl = document.getElementById('year'); if (yearEl) yearEl.textContent = new Date().getFullYear();
  renderComponentes();
  const toggle = document.getElementById('toggle-monitor'); if (toggle) { toggle.checked = getMonitorToggle(); toggle.addEventListener('change', () => { setMonitorToggle(toggle.checked); actualizarTotal(); }); }
  actualizarTotal();
  const btnCopiar = document.getElementById('btn-copiar'); if (btnCopiar) btnCopiar.addEventListener('click', copiarListado);
  const btnCsv = document.getElementById('btn-csv'); if (btnCsv) btnCsv.addEventListener('click', descargarCSV);
  initCarousel();
  initForm();
}

document.addEventListener('DOMContentLoaded', init);
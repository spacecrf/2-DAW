# Landing PC de alto rendimiento (ES)

Landing de una sola página, oscura y accesible (WCAG AA), para presentar un PC orientado a eSports y creadores. Incluye interactividad (suma de precios, tooltips, portapapeles, CSV), SEO/OG y datos estructurados.

## Tecnologías
- **HTML5 semántico**
- **CSS** sin framework (diseño dark elegante, grid 12 columnas, animaciones sutiles respetando `prefers-reduced-motion`)
- **JavaScript** vanilla (sin dependencias)

> Si prefieres **Tailwind** o **React + Vite**, puedes migrar fácilmente. Este repo está listo para desplegar sin build.

## Estructura
```
/ (raíz)
├── index.html
├── styles.css
├── app.js
├── assets/
│   ├── hero.webp
│   ├── setup-1.webp
│   ├── setup-2.webp
│   ├── setup-3.webp
│   └── og-social.webp
├── sitemap.xml
└── robots.txt
```

## Editar componentes, precios y enlaces
Los datos viven en `app.js` en la constante `COMPONENTES`. **Usa coma decimal `,` solo para mostrar**; en el código, emplea punto `.` como separador permanente.

Para cada componente:
- `url`: pega la URL real. Si queda como `PEGA_AQUI_URL_DEL_PRODUCTO`, el botón **Ver producto** se desactiva y muestra el tooltip “Añade la URL”.
- `precio`: número con punto decimal (ej. `133.67`).
- `tienda`: nombre de la tienda (opcional).

El **total** se calcula en tiempo real y respeta el checkbox *Incluir monitor* (persistente con `localStorage`).

### Copiar listado
Botón **Copiar listado** → genera un resumen con `[Categoría] Nombre — Precio (EUR)` y la URL si existe.

### Descargar CSV
Se genera en cliente con separador `;` y BOM UTF-8 para compatibilidad con Excel. Encabezados: `n;categoria;nombre;precio;moneda;tienda;url;nota`.

## Accesibilidad (WCAG AA)
- Contraste alto por defecto (texto `#EAEFF3` sobre fondos `#0B0F12/#12161A`).
- Navegación por teclado, focos visibles (`:focus-visible`).
- Tooltips accesibles (aparecen en `:hover` y `:focus-within`).
- `aria-live` para el total y mensajes de formulario.
- Alternativas de texto en imágenes, uso de `role`, `aria-` y `summary/details` para FAQ.

## SEO & Social
- `<title>`, `<meta name="description">`, Open Graph y Twitter Card.
- **Schema.org** `Product` + `AggregateOffer` con el **precio total estimado**. El JS actualiza el precio en el JSON-LD cuando cambias el checkbox del monitor.
- `sitemap.xml` y `robots.txt` básicos (edita el dominio antes de subir).

## Rendimiento
- Imágenes WebP placeholder. Puedes reemplazarlas por fotos reales o añadir fuentes **AVIF**.
- `loading="lazy"`, tipografía **Manrope** vía Google Fonts (puedes autoalojar para máxima puntuación Lighthouse).
- Código sin dependencias, ligero y rápido.

## Despliegue
- **Vercel / Netlify / GitHub Pages**: sube la carpeta tal cual.
- Define el dominio final y actualiza:
  - `<link rel="canonical">` y `og:url` en `index.html`.
  - `sitemap.xml` (`<loc>` con tu dominio).
  - `robots.txt` (`Sitemap:` con tu dominio).

## Personalización
- Colores principales en `:root` de `styles.css` (`--bg-*`, `--text`, `--accent`).
- Breakpoints y columnas en la sección *Responsive*.
- Cambia tipografía en el `<head>` o autoalójala y usa `<link rel="preload" as="font">` con `crossorigin`.

## Objetivo de Lighthouse
> Objetivo ≥ 90 en Performance y SEO. Para acercarte al 100:
- Autoalojar fuentes y añadir `preload` de fonts.
- Minimiza/concatena CSS/JS o activa minificación en el host.
- Sirve imágenes optimizadas (incluso `srcset` y AVIF). 

---

Hecho con ❤️ para una experiencia clara, veloz y accesible.

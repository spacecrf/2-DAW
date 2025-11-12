let recetas = [];

function cargar(){
    fetch("https://dummyjson.com/recipes")
    .then(r => r.json())
    .then(d => {
        recetas = d.recipes;
        rellenar("fDifficulty","difficulty");
        rellenar("fCuisine","cuisine");
        rellenar("fMeal","mealType");
        mostrar(recetas);
    });
}

function rellenar(id,campo){
    const sel = document.getElementById(id);
    recetas.forEach(r =>{
        let valor = r[campo];
        if(typeof valor === "object"){
            valor.forEach(v=>{
                if(!sel.innerHTML.includes(v)) sel.innerHTML += `<option>${v}</option>`;
            });
        } else {
            if(!sel.innerHTML.includes(valor)) sel.innerHTML += `<option>${valor}</option>`;
        }
    })
}

function mostrar(lista){
    const cont = document.getElementById("recetas");
    cont.innerHTML = "";
    lista.forEach(r=>{
        let total = r.prepTimeMinutes + r.cookTimeMinutes;
        cont.innerHTML += `
        <div class="card" onclick="verDetalle(${r.id})">
            <img src="${r.image}">
            <h3>${r.name}</h3>
            <p>⭐ ${r.rating}</p>
            <p>${r.difficulty} | ${r.cuisine} | ${total} min</p>
        </div>`
    })
}

function filtrar(){
    const d = fDifficulty.value;
    const c = fCuisine.value;
    const m = fMeal.value;
    const t = Number(fTiempo.value);

    const res = recetas.filter(r=>{
        const tot = r.prepTimeMinutes + r.cookTimeMinutes;
        return (!d || r.difficulty===d) 
        && (!c||r.cuisine===c) 
        && (!m||r.mealType.includes(m)) 
        && (!t||tot<=t);
    });
    mostrar(res);
} mostrar(res);


function buscarNombre(){
    const txt = buscar.value.toLowerCase();
    if(txt==="") return mostrar(recetas);

    const res = recetas.filter(r=>{
        const a = r.name.toLowerCase().includes(txt);
        const b = r.ingredients.some(i=>i.toLowerCase().includes(txt));
        return a||b;
    })
    mostrar(res);
}

function verDetalle(id){
    const r = recetas.find(x=>x.id==id);
    const tot = r.prepTimeMinutes + r.cookTimeMinutes;

    let html = `<h2>${r.name}</h2>`;
    html += `<p>Calorías: ${r.caloriesPerServing}</p>`;
    html += `<p>Tiempo total: ${tot} min</p>`;
    html += `<h3>Ingredientes</h3><ul>`;
    r.ingredients.forEach(i=> html += `<li>${i}</li>`);
    html += `</ul>`;
    html += `<h3>Instrucciones</h3><ol>`;
    r.instructions.forEach(p=> html += `<li>${p}</li>`);
    html += `</ol>`;

    detalleContenido.innerHTML = html;
    detalle.style.display = "flex";
}

function cerrarDetalle(){ detalle.style.display = "none"; }

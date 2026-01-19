document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("formContacto");
    const feedback = document.getElementById("feedback");

    if (form) {
        form.addEventListener("submit", function(e) {
            e.preventDefault();
            const nombre = document.getElementById("nombre").value.trim();
            const email = document.getElementById("email").value.trim();
            const mensaje = document.getElementById("mensaje").value.trim();

            if(!nombre || !email || !mensaje) {
                feedback.textContent = "Todos los campos son obligatorios.";
                feedback.style.color = "red";
                return;
            }

            feedback.textContent = "Mensaje enviado correctamente.";
            feedback.style.color = "green";
            form.reset();
        });
    }
});

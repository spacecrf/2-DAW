// auth.js
document.addEventListener("DOMContentLoaded", () => {
  const registerForm = document.getElementById("registerForm");
  const loginForm = document.getElementById("loginForm");

  // REGISTRO
  if (registerForm) {
    registerForm.addEventListener("submit", e => {
      e.preventDefault();

      const name = document.getElementById("name").value;
      const email = document.getElementById("email").value;
      const password = document.getElementById("password").value;
      const confirmPassword = document.getElementById("confirmPassword").value;

      if (password !== confirmPassword) {
        alert("Las contraseñas no coinciden.");
        return;
      }

      const user = { name, email, password };
      localStorage.setItem("user", JSON.stringify(user));
      alert("Cuenta creada correctamente. Ahora puedes iniciar sesión.");
      window.location.href = "login.html";
    });
  }

  // LOGIN
  if (loginForm) {
    loginForm.addEventListener("submit", e => {
      e.preventDefault();

      const email = document.getElementById("email").value;
      const password = document.getElementById("password").value;

      const storedUser = JSON.parse(localStorage.getItem("user"));

      if (storedUser && storedUser.email === email && storedUser.password === password) {
        localStorage.setItem("loggedIn", "true");
        alert("Inicio de sesión exitoso.");
        window.location.href = "user-dashboard.html";
      } else {
        alert("Correo o contraseña incorrectos.");
      }
    });
  }
});

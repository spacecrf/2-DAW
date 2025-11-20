document.addEventListener('DOMContentLoaded', () => {
  console.log("Hotel Los Tamarindos cargado correctamente 🏨");
});

//Booking//

    const form = document.getElementById('booking-form');
    const result = document.getElementById('booking-result');

    form.addEventListener('submit', e => {
      e.preventDefault();
      const room = document.getElementById('room').value;
      const guests = document.getElementById('guests').value;
      const inDate = document.getElementById('checkin').value;
      const outDate = document.getElementById('checkout').value;
      result.textContent = `Reserva disponible: ${room}, ${guests} huésped(es) del ${inDate} al ${outDate}.`;
      result.style.marginTop = '15px';
      result.style.color = '#005f40';
      form.reset();
    });

//Contact 

    document.getElementById("contact-form").addEventListener("submit", e => {
      e.preventDefault();
      alert("¡Mensaje enviado! Gracias por contactar con nosotros.");
      e.target.reset();
    });
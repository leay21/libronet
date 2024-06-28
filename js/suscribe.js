function showSubscriptionMessage(event) {
	event.preventDefault(); // Evitar que el formulario se envíe

	var emailInput = document.getElementById("subs-email");
	var email = emailInput.value;

	var message = "Ahora está registrado en el boletín de Libreria GrandFox como " + email;

	var subscriptionMessage = document.getElementById("subscription-message");
	subscriptionMessage.textContent = message;
	subscriptionMessage.classList.remove("hidden");

	// Ocultar el mensaje después de 5 segundos
	setTimeout(function() {
		subscriptionMessage.classList.add("hidden");
	}, 3000);
}
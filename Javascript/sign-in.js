  const passwordInput = document.getElementById('password');
  const toggleButton = document.querySelector('#revealpswrd');

  toggleButton.addEventListener('click', function() {
    if (passwordInput.type === "password") {
      passwordInput.type = "text";
    } else {
      passwordInput.type = "password";
    }
  });

  const form = document.querySelector('form');

form.addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the form from submitting

    // Redirect to home.html
    window.location.href = 'cart.html';
});

 
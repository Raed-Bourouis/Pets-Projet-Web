const passwordInput = document.getElementById('password');
const toggleButton = document.querySelector('#revealpswrd');
let eye = document.querySelector('i')
toggleButton.addEventListener('click', function () {
  if (passwordInput.type === "password") {
    passwordInput.type = "text";
    eye.classList.add("fa-eye-slash")
    eye.classList.remove("fa-eye")
    
  } else {
    passwordInput.type = "password";
    eye.classList.add("fa-eye")
    eye.classList.remove("fa-eye-slash")

  }
});

const form = document.querySelector('form');

form.addEventListener('submit', function (event) {
  event.preventDefault(); // Prevent the form from submitting

  // Redirect to home.html
  window.location.href = 'cart.html';
});


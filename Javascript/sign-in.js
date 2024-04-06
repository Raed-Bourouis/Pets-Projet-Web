const passwordInput = document.getElementById('password');
const toggleButton = document.querySelector('#revealpswrd');

// Select the eye icon element
const eye = toggleButton.querySelector('i');

toggleButton.addEventListener('click', function () {
  if (passwordInput.type === "password") {
    passwordInput.type = "text";
    eye.classList.remove("fa-eye");
    eye.classList.add("fa-eye-slash");
  } else {
    passwordInput.type = "password";
    eye.classList.remove("fa-eye-slash");
    eye.classList.add("fa-eye");
  }
});

const form = document.querySelector('form');

form.addEventListener('submit', function (event) {
  event.preventDefault(); // Prevent the form from submitting

  // Redirect to cart.html after form submission
  window.location.href = 'cart.html';
});
document.onkeydown = checkKey;
function checkKey(e) {
  e = e || window.event;
  if (e.keyCode == '13') {
    form.dispatchEvent(new Event('submit'));
  }
}


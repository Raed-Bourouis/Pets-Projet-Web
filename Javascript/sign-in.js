  const passwordInput = document.getElementById('password');
  const toggleButton = document.querySelector('#revealpswrd');

  toggleButton.addEventListener('click', function() {
    if (passwordInput.type === "password") {
      passwordInput.type = "text";
    } else {
      passwordInput.type = "password";
    }
  });

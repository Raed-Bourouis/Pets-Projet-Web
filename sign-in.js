  const passwordInput = document.getElementById('password');
  const toggleButton = document.querySelector('#revealpswrd');

  function showpassword() {
    if (passwordInput.type === "password") {
      passwordInput.type = "text";
    } else {
      passwordInput.type = "password";
    }
  }

  toggleButton.addEventListener('click', showpassword() );

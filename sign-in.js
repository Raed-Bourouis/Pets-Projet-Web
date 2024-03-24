  const passwordInput = document.getElementById('password');
  const toggleButton = document.querySelector('.password-toggle');

  toggleButton.addEventListener('click', function() {
    // Toggle between password and text type for the input field
    if (passwordInput.type === "password") {
      passwordInput.type = "text";
      toggleButton.classList.add('show-password'); // Add a class for styling when revealed (optional)
    } else {
      passwordInput.type = "password";
      toggleButton.classList.remove('show-password'); // Remove the class when masked (optional)
    }
  });

document.addEventListener("DOMContentLoaded", function() {
  // Function to dynamically generate reveal password button
  function createRevealPasswordButton(inputField) {
      const button = document.createElement('button');
      button.setAttribute('type', 'button');
      button.innerHTML = '<i class="fas fa-eye"></i>';
      button.classList.add('reveal-password-button');
      button.addEventListener('click', function () {
          const passwordField = inputField.querySelector('#password_signin');
          if (passwordField.type === "password") {
              passwordField.type = "text";
              button.innerHTML = '<i class="fas fa-eye-slash"></i>';
          } else {
              passwordField.type = "password";
              button.innerHTML = '<i class="fas fa-eye"></i>';
          }
      });
      inputField.appendChild(button);
  }

  const passwordInputsSignIn = document.querySelectorAll('.sign-in .password');



  // Add reveal password button to each password input field in sign-in form
  passwordInputsSignIn.forEach(function(input) {
      createRevealPasswordButton(input);
  });
});






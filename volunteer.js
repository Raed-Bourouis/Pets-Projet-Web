// Form submission event listener
document.forms.Vform.addEventListener('submit', e => {
    e.preventDefault();
    // Validate inputs
    if (validateForm()) {
        const submitButton = document.querySelector('button[type="submit"]');
        submitButton.innerText = 'Submitting...';
        // Perform form submission after a brief delay to ensure the "Submitting..." message is displayed
        setTimeout(() => {
            document.forms.form.submit();
            window.location.href = 'thankyou.html';
        }, 300);
    }
});

// Function to validate form inputs
function validateForm() {
        // Validate age
        var ageInput = document.getElementById("age");
        var age = parseInt(ageInput.value);
        if (isNaN(age) || age < 13 || age > 100) {
            displayErrorMessage(ageInput, "Please enter a valid age between 13 and 100.");
            return false;
        } else {
            removeErrorMessage(ageInput);
        }

        // Validate phone number
        var phoneInput = document.getElementById("phone");
        var phone = phoneInput.value.trim();
        if (!/^\+\d+$/.test(phone)) {
            displayErrorMessage(phoneInput, "Please enter a valid phone number starting with '+'.");
            return false;
        } else {
            removeErrorMessage(phoneInput);
        }
        //validate e-mail
        var emailInput = document.getElementById("email");
        var emailRegex = /^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/;
        if(!emailRegex.test(emailInput.value)){
            displayErrorMessage(emailInput,"Invalid e-mail address format!");
            return false;
        }else{
            removeErrorMessage(emailInput);
        }
    
    

        // Validate required fields
        var requiredFields = document.querySelectorAll('.required');
        var isValid = true;

        // Loop through all required fields
        requiredFields.forEach(function(field) {
            var errorMessage = field.nextElementSibling;

            // Check if the field is empty
            if (field.value.trim() === '') {
                errorMessage.textContent = "This field is required";
                errorMessage.style.display = "block";
                isValid = false; // Set isValid to false if any required field is empty
            } else {
                errorMessage.textContent = ""; // Clear error message if field is not empty
                errorMessage.style.display = "none";
            }
        });

        return isValid; // Return true if all validations pass
    }

// Function to display error message for an input field
function displayErrorMessage(inputElement, message) {
        var errorDiv = inputElement.nextElementSibling; 
        errorDiv.textContent = message;
        errorDiv.style.display = "block";
    }

    // Function to remove error message for an input field
    function removeErrorMessage(inputElement) {
        var errorDiv = inputElement.nextElementSibling; 
        errorDiv.textContent = "";
        errorDiv.style.display = "none";
    }

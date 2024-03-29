document.addEventListener("DOMContentLoaded", function() {
    var form = document.getElementById("Vform");

    // Event listener for form submission
    form.addEventListener("submit", function(event) {
        event.preventDefault(); // Prevent default form submission

        // Validate form inputs
        if (validateForm()) {
            const submitButton = document.querySelector('input[type="submit"]');
            submitButton.value = 'Submitting...';
            // Perform form submission after a brief delay to ensure the "Submitting..." message is displayed
            setTimeout(() => {
                form.submit();
                window.location.href = 'thankyou.html';
            }, 700);
        }
    });
});

function validatePassword(){
    var Password=document.getElementById("password")
    var confirmPassword=document.getElementById("confirm-password")
    return(Password.value===confirmPassword.value)

}


function validateNotEmpty() { 
    var requiredFields = document.querySelectorAll('.required');
    var isValid = true;

    // Loop through all required fields
    requiredFields.forEach(function(field) {

        // Check if the field is empty
        if (field.value.trim() === '') {
            displayErrorMessage(field.parentElement, '*This field is required');
            showErrorAnimation(field.parentElement);
            isValid = false;
        } else {
            removeErrorMessage(field.parentElement);
        }
    });

    return isValid; // Return true if all required fields are filled out
}

function validateAge() { 
    var ageInput = document.getElementById("age");
    var age = parseInt(ageInput.value);
    if (isNaN(age) || age < 13 || age > 100) {
        displayErrorMessage(ageInput.parentElement, "Please enter a valid age between 13 and 100.");
        showErrorAnimation(ageInput.parentElement);
        return false;
    } else {
        removeErrorMessage(ageInput.parentElement);
    }
    return true;
}

function validatePhoneNumber() { 
    var phoneInput = document.getElementById("phone");
    var phone = phoneInput.value.trim();
    if (!/^\+\d+$/.test(phone)) {
        displayErrorMessage(phoneInput.parentElement, "Please enter a valid phone number starting with '+'.");
        showErrorAnimation(phoneInput.parentElement);
        return false;
    } else {
        removeErrorMessage(phoneInput.parentElement);
    }

    return true;
}

function validateEmail() { 
    // Regular expression pattern for validating email addresses
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    let emailInput = document.getElementById('email');
    let emailValue = emailInput.value.trim();

    if (!emailPattern.test(emailValue)) {
        displayErrorMessage(emailInput.parentElement, "Invalid Email Address!");
        showErrorAnimation(emailInput.parentElement);
        return false;
    } else {
        removeErrorMessage(emailInput.parentElement);
    }
    return true;
}


function validateForm() {
    let isValid = true;
    isValid = validateNotEmpty() && isValid;
    isValid = validateRadios() && isValid;
    isValid = validateCheckbox() && isValid;
    if(isValid){
        isValid = validateEmail() && isValid;
        isValid = validateAge() && isValid;
        isValid = validatePhoneNumber() && isValid;
    }
   
    return isValid;
}


// Function to show error animation
const showErrorAnimation = parentElement => {
    parentElement.classList.add('error-animation');
    setTimeout(() => {
        parentElement.classList.remove('error-animation');
    }, 500);
};

// Function to display error message for an input field
function displayErrorMessage(parentElement, message) {
    var errorDiv = parentElement.querySelector('.error'); 
    errorDiv.textContent = message;
    errorDiv.style.display = "block";
    errorDiv.style="color:red;font-weight:bold;font-size:14px;margin-bottom: 20px;"
    parentElement.classList.add('error');
    parentElement.classList.remove('success');
}

// Function to remove error message for an input field
const removeErrorMessage = (parentElement) => {
    const errorDisplay = parentElement.querySelector('.error');
    errorDisplay.innerText = '';
    parentElement.classList.add('success');
    parentElement.classList.remove('error');
}

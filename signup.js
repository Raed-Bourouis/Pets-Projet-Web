document.addEventListener("DOMContentLoaded", function() {
    var form = document.getElementById("form");

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
                window.location.href = 'sign-in.html';
            }, 700);
        }
    });
});

function validatePassword(){
    var Password=document.getElementById("password")
    var confirmPassword=document.getElementById("confirm-password")
    if(Password.value=="" && confirmPassword.value== ""){
        displayErrorMessage(confirmPassword.parentElement,"*Please enter both password and confirmation.");
        showErrorAnimation(Password.parentElement);
        displayErrorMessage(Password.parentElement,"*Please enter both password and confirmation.");
        showErrorAnimation(confirmPassword.parentElement);
        return false
    }
    else if(!(Password.value===confirmPassword.value)){
        displayErrorMessage(confirmPassword.parentElement, "Passwords do not match");
        removeErrorMessage(Password.parentElement);
        showErrorAnimation(confirmPassword.parentElement);
        return false
    }
    else{
        removeErrorMessage(confirmPassword.parentElement);
    }
    return true
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
    var age = ageInput.value.slice(0,4);
    if(isNaN(age)) {
        displayErrorMessage(ageInput.parentElement,'*This field is required.');
        showErrorAnimation(ageInput.parentElement);
        return false;
    }
    if (age<1900) {
        displayErrorMessage(ageInput.parentElement, "Date of birth is invalid");
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
    if (phone==""){
        displayErrorMessage(phoneInput.parentElement, "* This field is required .");
        showErrorAnimation(phoneInput.parentElement);
        return false
    }
    else if (!/^\+\d+$/.test(phone)) {
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
    if(emailValue == "") {
        displayErrorMessage(emailInput.parentElement,"* This field is required.");
        showErrorAnimation(emailInput.parentElement);
        return false;
    } else 
    if (!emailPattern.test(emailValue)) {
        displayErrorMessage(emailInput.parentElement, "Invalid Email Address!");
        showErrorAnimation(emailInput.parentElement);
        return false;
    } else {
        removeErrorMessage(emailInput.parentElement);
    }
    return true;
}

function validateTerms(){
    let terms=document.querySelector("#terms")
    if(!terms.checked){
        displayErrorMessage(terms.parentElement,"‎ ‎ ‎ ‎ *This field is required.");
        showErrorAnimation(terms.parentElement);
        return false;
    }
    else{
        removeErrorMessage(terms.parentElement)
        return true
    }
}


function validateForm() {
    let isValid = true;
    isValid = validateNotEmpty() && isValid;
    isValid = validateEmail()  && isValid;
    isValid = validateAge() && isValid;
    isValid = validatePhoneNumber() && isValid; 
    isValid = validatePassword() && isValid;
    isValid = validateTerms() && isValid;

 
   
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
    errorDiv.style="color:red;font-weight:bold;font-size:14px;margin-bottom: 0px;"
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

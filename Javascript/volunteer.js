// Function to toggle the "otherSpecifyInput" field based on the "otherSpecify" checkbox
function toggleOtherSpecifyInput() {
    var otherSpecifyCheckbox = document.getElementById('otherSpecify');
    var otherSpecifyInput = document.getElementById('otherSpecifyInput');

    otherSpecifyInput.disabled = !otherSpecifyCheckbox.checked;

    // Add/remove the 'required' attribute based on the checkbox status
    if (otherSpecifyCheckbox.checked) {
        otherSpecifyInput.setAttribute('required', 'required');
    } else {
        otherSpecifyInput.removeAttribute('required');
    }
}


// Event listener for the "otherSpecify" checkbox change
var otherSpecifyCheckbox = document.getElementById('otherSpecify');
if (otherSpecifyCheckbox) { // Check if the element exists before adding event listener
    otherSpecifyCheckbox.addEventListener('change', toggleOtherSpecifyInput);
}

document.addEventListener("DOMContentLoaded", function () {
    var form = document.getElementById("Vform");

    // Event listener for form submission
    form.addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent default form submission

        // Validate form inputs
        if (validateForm()) {
            const submitButton = document.querySelector('input[type="submit"]');
            submitButton.value = 'Submitting...';
            // Perform form submission after a brief delay to ensure the "Submitting..." message is displayed
            form.submit();

        }
    });
});


function validateNotEmpty() {
    var requiredFields = document.querySelectorAll('.required');
    var isValid = true;

    // Loop through all required fields
    requiredFields.forEach(function (field) {

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
    if (phone.length == 0) {
        displayErrorMessage(phoneInput.parentElement, "* This field is required")
        showErrorAnimation(phoneInput.parentElement);
    }
    else if (!/^\+\d+$/.test(phone)) {
        displayErrorMessage(phoneInput.parentElement, "Please enter a valid phone number starting with '+'.");
        showErrorAnimation(phoneInput.parentElement);
        return false;
    }

    else if (phone.length != 12) {
        displayErrorMessage(phoneInput.parentElement, "Invalid Phone Number! Please make sure your number has exactly 12 characters.")
        showErrorAnimation(phoneInput.parentElement);
    }
    else {
        removeErrorMessage(phoneInput.parentElement);
    }

    return true;
}

function validateEmail() {
    // Regular expression pattern for validating email addresses
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    let emailInput = document.getElementById('email');
    let emailValue = emailInput.value.trim();
    if (emailValue === "") {
        displayErrorMessage(emailInput.parentElement, "* This field is required.")
        showErrorAnimation(emailInput.parentElement);
        return false;
    }
    else if (!emailPattern.test(emailValue)) {
        displayErrorMessage(emailInput.parentElement, "Invalid Email Address!");
        showErrorAnimation(emailInput.parentElement);
        return false;
    } else {
        removeErrorMessage(emailInput.parentElement);
    }
    return true;
}

function validateRadios() {
    let allChecked = true; // Assume all radios are checked by default

    // Select all radio buttons
    const radios = document.querySelectorAll('.required-radio input');

    radios.forEach(radio => {
        const groupName = radio.getAttribute('name'); // Get the name of the radio button group
        const groupRadios = document.querySelectorAll(`input[name="${groupName}"]`);

        let groupChecked = false; // Assume the group is not checked initially

        // Check if at least one radio button in the group is checked
        groupRadios.forEach(groupRadio => {
            if (groupRadio.checked) {
                groupChecked = true;
            }
        });
        const parentElement = radio.closest('.required-radio');

        // Display error message if the group is not checked
        if (!groupChecked) {
            const errorMessage = " *  Please select an option";
            displayErrorMessage(parentElement, errorMessage);
            allChecked = false;
        } else {
            removeErrorMessage(parentElement);
        }
    });

    return allChecked; // Return whether all groups have at least one option selected
}

function validateCheckbox() {
    const checkboxes = document.querySelectorAll("input[name='volunteerRole[]']");
    let checked = false;

    checkboxes.forEach(checkbox => {
        if (checkbox.checked) {
            checked = true;
        }
    });
    const parentElement = document.getElementById("volunteerRole");
    if (!checked) {
        const message = " * You must choose at least one role to volunteer for.";
        var errorDiv = parentElement.querySelector('.error');
        errorDiv.textContent = message;
        errorDiv.style.display = "block";
        errorDiv.style = "color:red;font-weight:bold;font-size:14px;margin-bottom: 20px;"
        return false;
    } else {
        const errorDisplay = parentElement.querySelector('.error');
        errorDisplay.innerText = '';
        return true;
    }
}

function validateForm() {
    let isValid = true;
    isValid = validateNotEmpty() && isValid;
    isValid = validateRadios() && isValid;
    isValid = validateCheckbox() && isValid;
    isValid = validateEmail() && isValid;
    isValid = validateAge() && isValid;
    isValid = validatePhoneNumber() && isValid;


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
    errorDiv.style = "color:red;font-weight:bold;font-size:14px;margin-bottom: 20px;"
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

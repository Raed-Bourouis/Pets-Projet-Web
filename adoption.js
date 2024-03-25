const form = document.getElementById('form');
const inputs = document.querySelectorAll('.input input');
const textareas = document.querySelectorAll('.textarea textarea');
const radios = document.querySelectorAll('.radio input');

form.addEventListener('submit', e => {
    e.preventDefault();
    // Validate inputs
    if (validateInputs()) {
        const submitButton = form.querySelector('button[type="submit"]');
        submitButton.innerText = 'Submitting...';
        // Perform form submission after a brief delay to ensure the "Submitting..." message is displayed
        setTimeout(() => {
            form.submit();
            window.location.href='thankyou.html'
        }, 300);
    }

});

const validateInputs = () => {
    let isValid = true;
    isValid = validateInputsOrTextarea(inputs) && isValid;
    isValid = validateInputsOrTextarea(textareas) && isValid;
    isValid = validateRadios() && isValid;
    isValid = validateMustBeAYes() && isValid;
    return isValid;
};

const validateInputsOrTextarea = elements => {
    for (let i = 0; i < elements.length; i++) {
        const parentElement = elements[i].closest('.input') || elements[i].closest('.textarea');
        const errorElement = parentElement.querySelector('.error');
        const successElement = parentElement.querySelector('.success');

        if (elements[i].value.trim() === '') {
            showError(elements[i], parentElement, errorElement);
        } else {
            showSuccess(elements[i], parentElement, successElement);
        }
    }

    // Toggle display of children ages field and label based on the number of minors
    toggleChildrenAges();
};

const validateRadios = () => {
    let checkedRadio = '';
    for (let i = 0; i < elements.length; i++)  {
        if (radios[i].checked) {
            checkedRadio = radio.id;
            break;
        }
    }
    
    if (!checkedRadio) return showCustomError('Please select an option');
}

// Show custom error message
const showCustomError = msg => {
    const errorSummary = document.getElementsByClassName('.error_select');
    errorSummary.innerHTML = `<p>${msg}</p>`;
    errorSummary.classList.add('govuk-error-summary--show');
};

// Hide all errors from summary box
const hideAllErrors = () => {
    const errorSummary = document.getElementsByClassName('.error_select');
    errorSummary.innerHTML = '';
    errorSummary.classList.remove('govuk-error-summary--show');
};


const showError = element => {
    const parentElement = element.closest('.input') || element.closest('.textarea') || element.closest('.radio') ;
    const errorElement = parentElement.querySelector('.error');
    errorElement.innerText = '* This field is required';
    parentElement.classList.add('error');
    parentElement.classList.remove('success');
};

const showSuccess = element => {
    const parentElement = element.closest('.input') || element.closest('.textarea') || element.closest('.radio') || element.closest('.additional-services');
    const errorElement = parentElement.querySelector('.error');
    errorElement.innerText = '';
    parentElement.classList.add('success');
    parentElement.classList.remove('error');
};

// Function to ensure that user verifies information
function mustBeAYes(form) {
    var x = form.elements["correct-yes"].checked;
    var y= form.elements["adult-yes"].checked;
    if (!x) {
        alert("You must verify that all of the information you have provided is correct");
        var error = document.getElementById("error_yes");
        error.innerHTML = "<p>* You did not confirm your information</p>";
        error.style.color = "red";
        return false;
    } else if(!y) {
        alert("Only Adults.");
        var error = document.getElementById("error_yes");
        error.innerHTML = "<p>* You did not confirm your information</p>";
        error.style.color = "red";
        return false;
    }
    else{
        return true;
    }
}

// Function to toggle display of children ages field and label based on the number of minors
function toggleChildrenAges() {
    var numMinors = parseInt(document.getElementById("num-minors").value);
    var childrenAgesLabel = document.getElementById("children-ages-label");
    var childrenAgesField = document.getElementById("children-ages");
    var childrenAgesParent = childrenAgesField.closest('.input');
    var childrenAgesError = childrenAgesParent.querySelector('.error');

    if (numMinors > 0) {
        childrenAgesLabel.style.display = "block";
        childrenAgesField.required = true;
        childrenAgesField.style.display = "block";

        // Validate the children ages field if it's visible
        if (childrenAgesField.style.display === "block") {
            if (childrenAgesField.value.trim() === '') {
                showError(childrenAgesField, childrenAgesParent, childrenAgesError);
            } else {
                showSuccess(childrenAgesField, childrenAgesParent, childrenAgesError);
            }
        }
    } else {
        childrenAgesLabel.style.display = "none";
        childrenAgesField.required = false;
        childrenAgesField.style.display = "none";

        // Clear any error messages for the children ages field if it's hidden
        childrenAgesError.innerText = '';
        childrenAgesParent.classList.remove('error');
        childrenAgesParent.classList.remove('success');
    }
}


// Function to initialize the form
function initializeForm() {
    // Hide the children ages field by default
    document.getElementById("children-ages").style.display = "none";

    // Attach event listener to the number of minors input
    document.getElementById("num-minors").addEventListener("change", toggleChildrenAges);
}

// Calling the initialization function when the window loads
window.onload = initializeForm;

const form = document.getElementById('form');
const inputs = document.querySelectorAll('.input input');
const textareas = document.querySelectorAll('.textarea textarea');
const radios = document.querySelectorAll('.radio input[type="radio"]');

form.addEventListener('submit', e => {
    e.preventDefault();
    validateInputs();
});

const validateInputs = () => {
    validateInputsOrTextarea(inputs);
    validateInputsOrTextarea(textareas);
    validateRadios();
    validateCheckboxes();
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
    if (!x) {
        alert("You must verify that all of the information you have provided is correct");
        var error = document.getElementById("error_yes");
        error.innerHTML = "<p>* You did not confirm your information</p>";
        error.style.color = "red";
        return false;
    } else {
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

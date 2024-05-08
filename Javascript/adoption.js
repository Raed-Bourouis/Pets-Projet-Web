const inputs = document.querySelectorAll('.input input');
const textareas = document.querySelectorAll('.textarea textarea');
const radios = document.querySelectorAll('.radio input');

// Fade-in animation function
const fadeInAnimation = element => {
    element.style.opacity = 0;
    element.style.transform = 'translateY(20px)';
    element.style.transition = 'opacity 0.5s ease, transform 0.5s ease';

    // Trigger reflow to enable transition
    void element.offsetWidth;

    element.style.opacity = 1;
    element.style.transform = 'translateY(0)';
};

// Fade-in all form elements
inputs.forEach(input => fadeInAnimation(input));
textareas.forEach(textarea => fadeInAnimation(textarea));
radios.forEach(radio => fadeInAnimation(radio));


// Form submission event listener
document.forms.form.addEventListener('submit', e => {
    e.preventDefault();
    // Validate inputs
    if (validateInputs()) {
        const submitButton = document.querySelector('button[type="submit"]');
        submitButton.innerText = 'Submitting...';
        // Perform form submission after a brief delay to ensure the "Submitting..." message is displayed
        setTimeout(() => {
            document.forms.form.submit();
            window.location.href = 'thankyou.php';
        }, 300);
    }
});

// Function to validate inputs
const validateInputs = () => {
    let isValid = true;
    isValid = validateInputsOrTextarea(inputs) && isValid;
    isValid = validateInputsOrTextarea(textareas) && isValid;
    isValid = validateRadios() && isValid;
    isValid = mustBeAYes() && isValid;
    return isValid;
};

// Function to validate inputs or textareas
const validateInputsOrTextarea = elements => {
    let isValid = true;
    elements.forEach(element => {
        const parentElement = element.closest('.input') || element.closest('.textarea');

        if (element.value.trim() === '') {
            showError(element, parentElement);
            showErrorAnimation(parentElement);
            isValid = false;
        } else {
            showSuccess(element, parentElement); 
        }
    });
    return isValid;
};


// Function to validate radio buttons
const validateRadios = () => {
    let allChecked = true; // Assume all radios are checked by default

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

        // Display error message if the group is not checked
        if (!groupChecked) {
            const parentElement = radio.closest('.radio'); // Get the parent element of the radio
            showErrorRadio(parentElement);
            showErrorAnimation(parentElement);
            allChecked = false;
        } else {
            const parentElement = radio.closest('.radio'); // Get the parent element of the radio
            showSuccessRadio(groupName, parentElement); // Pass parentElement along with groupName
        }
    });

    return allChecked; // Return whether all groups have at least one option selected
};



// Show error
const showError = (element, parentElement) => {
    const errorDisplay = parentElement.querySelector('.error');

    errorDisplay.innerText = '* This field is required';
    parentElement.classList.add('error');
    parentElement.classList.remove('success');
};

// Show success
const showSuccess = (element, parentElement) => {
    const errorDisplay = parentElement.querySelector('.error');
    
    errorDisplay.innerText = '';
    parentElement.classList.add('success');
    parentElement.classList.remove('error');
};

// Show Error for radio inputs
const showErrorRadio = (parentElement) => {
    const errorDisplay = parentElement.querySelector('.error_select');
    errorDisplay.innerHTML = '<p> &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;* You must choose a value for this question </p>';//&nbsp; to add real space
    parentElement.classList.add('error_select');
    parentElement.classList.remove('success');
};

// Show success for radio inputs
const showSuccessRadio = (groupName, parentElement) => {
    const errorDisplay = parentElement.querySelector('.error_select');
    
    errorDisplay.innerText = '';

    parentElement.classList.add('success');
    parentElement.classList.remove('error_select');
};



// Function to ensure that user verifies information
const mustBeAYes = () => {
    const x = form.elements['correct-yes'].checked;
    if (!x) {
        alert("You must verify that all of the information you have provided is correct .");
        const error = document.getElementById("error_yes");
        error.innerHTML = "<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;* You did not confirm your information</p>";
        error.style.color = "red";
        return false;
    } else {
        return true;
    }
};

// Function to ensure that user verifies information
const mustBeAYesAdult = () => {
    const y = form.elements['adult-yes'].checked;
    if (!y) {
        alert("Only adults are allowed.");
        const error = document.getElementById("error_yes_adult");
        error.innerHTML = "<p>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;* You must be an Adult.</p>";
        error.style.color = "red";
        return false;
    } else {
        return true;
    }
};

// Function to toggle display of children ages field and label based on the number of minors

// Function to show error animation
const showErrorAnimation = parentElement => {
        parentElement.classList.add('error-animation');
        setTimeout(() => {
            parentElement.classList.remove('error-animation');
        }, 500);
    };

// Function to reset form inputs
const resetForm = elements => {
        elements.forEach(element => {
            element.value = '';
            const parentElement = element.parentElement;
            parentElement.classList.remove('error', 'success');
            parentElement.querySelector('.error').textContent = '';
        });
    };

// Function to reset select
const resetSelect = select => {
        select.value = '';
        const parentElement = select.parentElement;
        parentElement.classList.remove('error', 'success');
        parentElement.querySelector('.error').textContent = '';
    };
// Function to initialize the form


// Calling the initialization function when the window loads


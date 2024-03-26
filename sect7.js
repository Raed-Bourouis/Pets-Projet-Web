// Get all input elements within the form
const inputs = document.querySelectorAll('input');

// Form submission event listener
document.forms.appform.addEventListener('submit', e => {
    e.preventDefault();
    // Validate inputs
    if (validateInputs(inputs)) {
        e.target.submit();
    }
});



// Function to validate inputs 
const validateInputs = elements => {
    let isValid = true;
    elements.forEach(element => {
        const parentElement = element.parentElement;

        if (element.value.trim() === '') {
            showError(element, parentElement);
            showErrorAnimation(parentElement); 
            isValid = false;
        } else {
            showSuccess(element, parentElement);
            showSuccessAnimation(parentElement); 
        }
    });
    return isValid;
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
// Function to show success animation
const showSuccessAnimation = element => {
    element.classList.add('success');
    setTimeout(() => {
        element.classList.remove('success');
    }, 500);
};

// Function to show error animation
const showErrorAnimation = element => {
    element.classList.add('error');
    setTimeout(() => {
        element.classList.remove('error');
    }, 500);
};
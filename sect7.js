// Get all input elements within the form
const inputs = document.querySelectorAll('.input-control input');
const selected=document.querySelector(".city");

// Form submission event listener
document.forms.appform.addEventListener('submit', e => {
    e.preventDefault();
    // Validate inputs
    if (validateInputs(inputs)) {
        e.target.submit();
    }
});

// Function to show error animation
const showErrorAnimation = parentElement => {
    parentElement.classList.add('error');
    parentElement.classList.add('error-animation'); 
    setTimeout(() => {
        parentElement.classList.remove('error-animation'); 
    }, 500);
};


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
        }
    });
    return isValid;
};

// Function to show error message
const showError = (element, parentElement) => {
    const errorMessage = parentElement.querySelector('.error');
    errorMessage.innerText = '* This field is required';
    parentElement.classList.add('error');
    parentElement.classList.remove('success');
};

// Function to show success
const showSuccess = (element, parentElement) => {
    const errorMessage = parentElement.querySelector('.error');
    errorMessage.textContent = '';
    parentElement.classList.add('success');
    parentElement.classList.remove('error');
};

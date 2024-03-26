// Get all input elements within the form
const inputs = document.querySelectorAll('.input-control input');
const selected = document.querySelector("#state");

// Form submission event listener
document.forms.appform.addEventListener('submit', e => {
    e.preventDefault();
    // Validate inputs
    if (validateInputs(inputs) && validateSelect()) {
        e.target.submit();
    }
});

// Function to validate inputs
const validateInputs = elements => {
    let isValid = true;
    elements.forEach(element => {
        const parentElement = element.parentElement;

        if (element.value.trim() === '') {
            showError(parentElement);
            showErrorAnimation(parentElement);
            isValid = false;
        } else {
            showSuccess(parentElement);
        }
    });
    return isValid;
};

// Function to validate the select dropdown
const validateSelect = () => {
    let isValid = true;
    let selectIndex = document.getElementById("state").selectedIndex

    if (selectIndex === 0) {
        showError(selected);
        showErrorAnimation(selected);
        isValid = false;
    } else {
        showSuccess(selected); 
    }
    return isValid;
};

// Function to show error message
const showError = parentElement => {
    const errorMessage = parentElement.querySelector('.error');
    errorMessage.innerText = '* This field is required';
    parentElement.classList.add('error');
    parentElement.classList.remove('success');
};

// Function to show success
const showSuccess = parentElement => {
    const errorMessage = parentElement.querySelector('.error');
    errorMessage.textContent = '';
    parentElement.classList.add('success');
    parentElement.classList.remove('error');
};

// Function to show error animation
const showErrorAnimation = parentElement => {
    parentElement.classList.add('error-animation');
    setTimeout(() => {
        parentElement.classList.remove('error-animation');
    }, 500);
};

document.addEventListener('DOMContentLoaded', function () {
    const inputs = document.querySelectorAll('.input-control input, .city input');
    // Form submission event listener
    document.forms.appform.addEventListener('submit', e => {
        e.preventDefault();
        // Validate inputs 
        if (validateInputs(inputs)) {
            e.target.submit();
        }
        if(! validateSelect(select)){
            select.style='border-color: #ff3860;animation: errorAnimation 0.5s ease forwards'
            var selected=select.parentNode
            var p=selected.querySelector('.error')
            p.innerHTML="* This field is required"
            p.style='animation: errorAnimation 0.5s ease forwards;color: #ff3860;font-size: 14px;height: 13px'
            
        }else{
            select.parentElement.querySelector('p').innerText=''
            select.style='border-color : #09c372;margin-top:18px'
        }
    });

    // Reset button event listener
    document.querySelector('.reset').addEventListener('click', function() {
        resetForm(inputs);
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

    // Function to validate select
    const validateSelect = element => {
        const parentElement = element.parentElement;

        if (element.value === 'Select your state') {
            
            
            return false;
        } else {
            
            return true;
        }
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
        errorMessage.textContent = ''; // Reset error message
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

    // Function to reset form inputs
    const resetForm = elements => {
        elements.forEach(element => {
            element.value = '';
            const parentElement = element.parentElement;
            parentElement.classList.remove('error', 'success');
            parentElement.querySelector('.error').textContent = ''; // Reset error message
        });
    };
});

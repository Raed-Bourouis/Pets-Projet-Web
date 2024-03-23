
function validateForm() {
    var form = document.getElementById('form1');
    var submitButton = form.querySelector('button[type="submit"]');

    submitButton.onclick = function(event) {
        event.preventDefault(); // Prevent default form submission
        
        var isValid = true;

        // Reset border and remove error messages for all input fields
        var inputFields = form.querySelectorAll('input, select, textarea');
        inputFields.forEach(function(field) {
            field.style.border = '1px solid #ccc';
            var errorMessage = field.parentElement.querySelector('.error-message');
            if (errorMessage) {
                errorMessage.parentNode.removeChild(errorMessage);
            }
        });

        var requiredFields = form.querySelectorAll('input, select, textarea');
        requiredFields.forEach(function(field) {
            if (!field.value.trim()) {
                // Field is empty, mark it as invalid
                isValid = false;
                field.style.border = '1px solid red';

                // Create and append error message
                var errorMessage = document.createElement('div');
                errorMessage.classList.add('error-message');
                errorMessage.style.color = 'red';
                errorMessage.textContent = 'This field is required';
                field.parentNode.appendChild(errorMessage);
            }
        });

        // If any required field is missing, show alert and prevent form submission
        if (!isValid) {
            alert('Please fill out all required fields.');
            return false;
        }

        // Form is valid, submit it
        form.submit();
    };
};
function mustbeayes() {
    var x = document.getElementById("correct-yes").checked;
    if (!x) {
        alert("You must verify that all of the information you have provided is correct");
        var error=document.getElementById("error");
        error.innerHTML="<p>Error: You did not confirm your information</p>";
        error.style="color:red";
        return false;
    } else {
        return true;
    }
}

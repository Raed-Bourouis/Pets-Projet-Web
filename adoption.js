window.onload = function() {
    // Add event listener for form submission
    var form = document.getElementById('form1');
    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent default form submission
        validateForm(); // Validate the form
    });

    // Function to validate the form
    function validateForm() {
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

        // Check each required input field
        var requiredFields = form.querySelectorAll('input[required], select[required], textarea[required]');
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
        submitAnimation();
    }

    // Function to animate the form submission
    function submitAnimation() {
        // Hide the form
        form.style.display = 'none';

        // Display a loading animation
        var loadingMessage = document.createElement('div');
        loadingMessage.textContent = 'Submitting...';
        loadingMessage.style.fontSize = '24px';
        loadingMessage.style.textAlign = 'center';
        document.body.appendChild(loadingMessage);

        // Simulate a delay (e.g., 2 seconds) to mimic server-side processing
        setTimeout(function() {
            // Remove the loading animation
            document.body.removeChild(loadingMessage);

            // Display a success message
            var successMessage = document.createElement('div');
            successMessage.textContent = 'Form submitted successfully!';
            successMessage.style.fontSize = '24px';
            successMessage.style.textAlign = 'center';
            document.body.appendChild(successMessage);

            // Redirect or perform any other actions after submission
            setTimeout(function() {
                // Redirect to another page
                window.location.href = 'thank_you_page.html';

                // Or reset the form and display it again
                form.reset();
                form.style.display = 'block';

                // Remove the success message
                document.body.removeChild(successMessage);
            }, 3000); // Change the timeout as needed
        }, 2000); // Change the timeout as needed
    }

    // Function to validate input fields
    function validateInput(field) {
        // Checking empty field
        if (field.value == "") {
            field.style.backgroundColor = "red";
            field.nextElementSibling.innerHTML = "*Please fill out this field.";
            return false;
        } else {
            field.style.backgroundColor = "";
            field.nextElementSibling.innerHTML = "";
            return true;
        }
    }

    // Function to validate textarea fields
    function validateTextarea(field) {
        // Checking empty textarea
        if (field.value == "") {
            field.style.backgroundColor = "red";
            field.nextElementSibling.innerHTML = "*Please fill out this field.";
            return false;
        } else {
            field.style.backgroundColor = "";
            field.nextElementSibling.innerHTML = "";
            return true;
        }
    }

    // Function to ensure that user verifies information
    function mustBeAYes(form) {
        var x = form.elements["correct-yes"].checked;
        if (!x) {
            alert("You must verify that all of the information you have provided is correct");
            var error = document.getElementById("error");
            error.innerHTML = "<p>Error: You did not confirm your information</p>";
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
    if (numMinors > 0) {
        childrenAgesLabel.style.display = "block";
        childrenAgesField.required = true;
        childrenAgesField.style.display = "block";
    } else {
        childrenAgesLabel.style.display = "none";
        childrenAgesField.required = false;
        childrenAgesField.style.display = "none";
    }
}


    // Function to initialize the form
    function initializeForm() {
        // Hide the children ages field by default
        document.getElementById("children-ages").style.display = "none";

        // Attach event listener to the number of minors input
        document.getElementById("num-minors").addEventListener("change", toggleChildrenAges);
    }

    // Call initializeForm() when the DOM is fully loaded
    initializeForm();
};

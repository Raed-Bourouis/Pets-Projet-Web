        // Function to toggle the disabled attribute on otherSpecifyInput
  function toggleOtherSpecifyInput() {
            var otherSpecifyCheckbox = document.getElementById('otherSpecifyVolunteerCheckbox');
            var otherSpecifyInput = document.getElementById('otherSpecifyInput');
            if (otherSpecifyCheckbox.checked) {
                otherSpecifyInput.disabled = false;
            } else {
                otherSpecifyInput.disabled = true;
            }
        }

        var otherSpecifyCheckbox = document.getElementById('otherSpecifyVolunteerCheckbox');
        otherSpecifyCheckbox.addEventListener('change', toggleOtherSpecifyInput);
        document.addEventListener("DOMContentLoaded", function() {
            var form = document.getElementById("volunteerForm");
            form.addEventListener("submit", function(event) {
                event.preventDefault(); // Prevent default form submission
                if (validateForm()) {
                    window.location.href = "thankyou.html"; // Redirect to thankyou.html
                }
            });
function validateForm() {
                var ageInput = document.getElementById("age");
                var age = parseInt(ageInput.value);

                if (isNaN(age) || age < 13 || age > 100) {
                    var ageErrorDiv = document.querySelector("#age .error");
                    ageErrorDiv.textContent = "Please enter a valid age between 13 and 100.";
                    ageErrorDiv.style.display = "block";
                    return false;
                }

                var phoneInput = document.getElementById("phone");
                var phone = phoneInput.value.trim();

                // Phone number validation (simple check for digits)
                if (!/^\d+$/.test(phone)) {
                    var phoneErrorDiv = document.querySelector("#phonenum .error");
                    phoneErrorDiv.textContent = "Please enter a valid phone number.";
                    phoneErrorDiv.style.display = "block";
                    return false;
                }

                return true;
            }
        });
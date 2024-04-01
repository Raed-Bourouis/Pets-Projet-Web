function validateForm() {
    const fullName = document.getElementById('full-name').value;
    const address = document.getElementById('address').value;
    const city = document.getElementById('city').value;
    const state = document.getElementById('state').value;
    const zip = document.getElementById('zip').value;
    const country = document.getElementById('country').value;
    const phone = document.getElementById('phone').value;
    const paymentMethod = document.querySelector('input[name="payment-method"]:checked');
    const cardNumber = document.getElementById('card-number').value;
    const expirationDate = document.getElementById('expiration-date').value;
    const cvv = document.getElementById('cvv').value;
    let isValid = true;
    document.querySelectorAll('.error').forEach(error => error.textContent = '');

    // Validation for shipping address
    if (!fullName) {
        document.getElementById('error-full-name').textContent = 'This field is required';
        isValid = false;
    }
    if (!address) {
        document.getElementById('error-address').textContent = 'This field is required';
        isValid = false;
    }
    if (!city) {
        document.getElementById('error-city').textContent = 'This field is required';
        isValid = false;
    }
    if (!state) {
        document.getElementById('error-state').textContent = 'This field is required';
        isValid = false;
    }
    if (!zip) {
        document.getElementById('error-zip').textContent = 'This field is required';
        isValid = false;
    }
    if (!country) {
        document.getElementById('error-country').textContent = 'This field is required';
        isValid = false;
    }
    if (!phone) {
        document.getElementById('error-phone').textContent = 'This field is required';
        isValid = false;
    }

    // Validation for payment method
    if (!paymentMethod) {
        document.getElementById('error-payment-method').textContent = 'Please select a payment method';
        isValid = false;
    }

    if (paymentMethod && paymentMethod.value === 'card') {
        if (!cardNumber) {
            document.getElementById('error-card-details').textContent = 'Please enter your card number';
            isValid = false;
        }
        if (!expirationDate) {
            document.getElementById('error-card-details').textContent = 'Please enter the expiration date';
            isValid = false;
        }
        if (!cvv) {
            document.getElementById('error-card-details').textContent = 'Please enter the CVV';
            isValid = false;
        }
    }
    return isValid;
}

document.addEventListener('DOMContentLoaded', function () {
    const paymentMethod = document.querySelector('.payment-method');
    const cardInfo = document.querySelector('.card-info');

    paymentMethod.addEventListener('change', function () {
        if (this.querySelector('input[name="payment-method"]:checked').value === 'card') {
            cardInfo.style.display = 'block';
        } else {
            cardInfo.style.display = 'none';
        }
    });
});


document.getElementById('checkout-form').addEventListener('submit', e => {
    e.preventDefault();
    if (validateForm()) {
        const submitButton = document.querySelector('#button-submit');
        submitButton.innerText = 'Placing...';
        setTimeout(() => {
            document.getElementById('checkout-form').submit();
            window.location.href = 'Orderplaced.html';
        }, 300);
    }
});

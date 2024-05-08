<?php

include "../PHP/functions.php";
$pdo = pdo_connect_mysql();
$total = 0;
foreach ($_SESSION["cart"] as $key => $value) {
    $total = $total + floatval($value);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = array();

    if (empty($_POST["full-name"])) {
        $errors["full-name"] = "Full name is required";
    }

    if (empty($_POST["email"])) {
        $errors["email"] = "Email is required";
    }

    if (empty($_POST["address"])) {
        $errors["address"] = "Address is required";
    }

    if (empty($_POST["city"])) {
        $errors["city"] = "City is required";
    }

    if (empty($_POST["state"])) {
        $errors["state"] = "State is required";
    }

    if (empty($_POST["zip"])) {
        $errors["zip"] = "ZIP code is required";
    }

    if (empty($_POST["country"])) {
        $errors["country"] = "Country is required";
    }

    if (empty($_POST["phone"])) {
        $errors["phone"] = "Phone is required";
    }

    if (empty($_POST["payment-method"])) {
        $errors["payment-method"] = "Payment method is required";
    } elseif ($_POST["payment-method"] === "card") {
        if (empty($_POST["card-number"])) {
            $errors["creditcard-number"] = "Card number is required";
        }
        if (empty($_POST["expiration-date"])) {
            $errors["expiration-date"] = "Expiration date is required";
        }
        if (empty($_POST["cvv"])) {
            $errors["cvv"] = "CVV is required";
        }
    }

    if (empty($errors)) {
        $stmt = $pdo->prepare("INSERT INTO orders (FullName, Email, Address, City, State, Zip, Country, Phone, PaymentMethod, Amount, CardNumber, ExpirationDate, CVV) VALUES (:fullname, :email, :address, :city, :state, :zip, :country, :phone, :paymentmethod, :amount, :cardnumber, :expirationdate, :cvv)");
        $data = [
            'fullname' => $_POST['full-name'],
            'email' => $_POST['email'],
            'address' => $_POST['address'],
            'city' => $_POST['city'],
            'state' => $_POST['state'],
            'zip' => $_POST['zip'],
            'country' => $_POST['country'],
            'phone' => $_POST['phone'],
            'paymentmethod' => $_POST['payment-method'],
            'amount' => $total,
            'cardnumber' => $_POST['card-number'],
            'expirationdate' => $_POST['expiration-date'],
            'cvv' => $_POST['cvv']
        ];
        $stmt->execute($data);

        $_SESSION['cart'] = array();

        $to = $_POST['email'];
        $subject = '[Order Confirmation  - Pets Haven Animal Shelter]';
        $message = 'Thank you for your order from Pets Haven! Your donation is highly appreciated.';
        $headers = 'From: islemnasri20020627@example.com' . "\r\n" .
            'Reply-To: islemnasri20020627@example.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
        mail($to, $subject, $message, $headers);

        header('Location: ./Orderplaced.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../CSS/checkout.css">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link rel="icon" href="../assets/logoweblight.png">
    <script defer src="../Javascript/checkout.js"></script>
</head>
<body>
    <div class="bck-img"></div>
    <div class="container">
        <h1><i class="fas fa-shopping-cart"></i>Checkout</h1>
        <div class="checkout-details">
            <h2><i class="fas fa-map-marker-alt"></i> Shipping Address </h2>
            <form id="checkout-form" action="checkout.php" method="post">
                <div class="form-group">
                    <label for="full-name">Full Name:</label>
                    <input type="text" id="full-name" name="full-name" placeholder="Enter your full name">
                    <div class="error" id="error-full-name"><?php echo isset($errors['full-name']) ? $errors['full-name'] : ''; ?></div>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email">
                    <div class="error" id="error-email"><?php echo isset($errors['email']) ? $errors['email'] : ''; ?></div>
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" placeholder="Enter your address">
                    <div class="error" id="error-address"><?php echo isset($errors['address']) ? $errors['address'] : ''; ?></div>
                </div>
                <div class="form-group">
                    <label for="city">City:</label>
                    <input type="text" id="city" name="city" placeholder="Enter your city">
                    <div class="error" id="error-city"><?php echo isset($errors['city']) ? $errors['city'] : ''; ?></div>
                </div>
                <div class="form-group">
                    <label for="state">State:</label>
                    <input type="text" id="state" name="state" placeholder="Enter your state">
                    <div class="error" id="error-state"><?php echo isset($errors['state']) ? $errors['state'] : ''; ?></div>
                </div>
                <div class="form-group">
                    <label for="zip">ZIP Code:</label>
                    <input type="number" id="zip" name="zip" placeholder="Enter your ZIP code">
                    <div class="error" id="error-zip"><?php echo isset($errors['zip']) ? $errors['zip'] : ''; ?></div>
                </div>
                <div class="form-group">
                    <label for="country">Country:</label>
                    <input type="text" id="country" name="country" placeholder="Enter your country">
                    <div class="error" id="error-country"><?php echo isset($errors['country']) ? $errors['country'] : ''; ?></div>
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number: </label>
                    <input type="tel" id="phone" name="phone" placeholder="Please enter your phone number">
                    <div class="error" id="error-phone"><?php echo isset($errors['phone']) ? $errors['phone'] : ''; ?></div>
                </div>
            </div>
            <div class="checkout-details">
                <h2><i class="fas fa-credit-card"></i>Payment Method </h2>
                <div class="payment-method">
                    <input type="radio" id="card" name="payment-method" value="card">
                    <label for="card">Credit/Debit Card</label>
                    <input type="radio" id="cash" name="payment-method" value="cash">
                    <label for="cash">Cash on Delivery</label>
                    <div class="error" id="error-payment-method"><?php echo isset($errors['payment-method']) ? $errors['payment-method'] : ''; ?></div>
                </div>
                <div class="card-info" id="card-info-form">
                    <label for="card-number">Card Number:</label>
                    <input type="text" id="card-number" name="card-number" placeholder="Enter your card number">
                    <div class="error" id="error-card-number"><?php echo isset($errors['card-number']) ? $errors['card-number'] : ''; ?></div>
                    <label for="expiration-date">Expiration Date:</label>
                    <input type="date" id="expiration-date" name="expiration-date">
                    <div class="error" id="error-expiration-date"><?php echo isset($errors['expiration-date']) ? $errors['expiration-date'] : ''; ?></div>
                    <label for="cvv">CVV:</label>
                    <input type="number" id="cvv" name="cvv" placeholder="Enter CVV">
                    <div class="error" id="error-cvv"><?php echo isset($errors['cvv']) ? $errors['cvv'] : ''; ?></div>
                </div>
            </div>
            <div class="checkout-details">
                <h2><i class="fas fa-receipt"></i>Order Summary </h2>
                <p>Total Items: <?php echo count($_SESSION["cart"]);?> <i class="fas fa-box"></i></p>
                <p>Total Price: <?php echo $total." TND"?> </p>
            </div>
            <div class="buttons">
                <button type="submit" id="button-submit" class="button">Place Order <i class="far fa-paper-plane"></i></button>
                <a href="./cart.php" > <button class="button"  >Back to Cart <i class="fas fa-arrow-left"></i></button> </a>
                
            </div>
        </form>
    </div>

</body>


</html>

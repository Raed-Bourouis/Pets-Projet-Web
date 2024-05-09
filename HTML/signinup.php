<?php
//connexion avec le serveur (APACHE)
include '../PHP/functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Sign IN
    if (isset($_POST['email']) && isset($_POST['pwd'])) {
        $username = $_POST['email'];
        $password = $_POST['pwd'];

        $stmt = $pdo->prepare("SELECT * FROM users WHERE email=:email AND pwd=:pwd");
        $stmt->bindParam(':email', $username);
        $stmt->bindParam(':pwd', $password);

        $stmt->execute();


        if ($stmt->rowCount() == 1) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            session_start();
            $_SESSION['email'] = $username;
            $_SESSION['pwd'] = $password;
            $_SESSION['id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            header('Location: ./home.php');
            exit;
        } else {
            echo '<script>alert("Nom d\'utilisateur ou mot de passe invalide.");</script>';
            
        }
    }
    //Sign UP
    elseif (
        isset($_POST['nom']) && 
        isset($_POST['password']) && 
        isset($_POST['emailup']) && 
        isset($_POST['confirm_password']) && 
        isset($_POST['phone']) && 
        isset($_POST['address']) && 
        isset($_POST['age']) && 
        isset($_POST['terms'])
    ) {
        $nom = $_POST['nom'];
        $pwdup = $_POST['password'];
        $emailUP = $_POST['emailup'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $age = $_POST['age'];
        $confirmPassword = $_POST['confirm_password'];

        // Validation de l'email
        if (!filter_var($emailUP, FILTER_VALIDATE_EMAIL)) {
            echo '<script>alert("Invalid email format.");</script>';
        } elseif (strlen($pwdup) < 8) { // Vérification de la longueur du mot de passe
            echo '<script>alert("Password must be at least 8 characters long.");</script>';
        } elseif ($pwdup !== $confirmPassword) { // Vérification de la correspondance des mots de passe
            echo '<script>alert("Passwords do not match.");</script>';
        } else {
            // Insérer un nouvel enregistrement dans la table des contacts
            $stmtt = $pdo->prepare('INSERT INTO users (fullname, pwd, email, phone, adresse, date_naiss) VALUES (?, ?, ?, ?, ?, ?)');
            $stmtt->execute([$nom, $pwdup, $emailUP, $phone, $address, $age]);
            // Message de sortie
            $msg = 'USER ' . $nom . ' created Successfully!';
            header("Location: ./signinup.php?signup=success");
            exit;
        }
    } 
    else {
        echo '<script>alert("All fields are required !");</script>';
    }
}
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../css/inup.css">
    <title>Welcome at Pets Haven </title>
    <script src="../Javascript/sign-in.js" defer></script>
    <?php
    // Display alert if sign-up was successful
    if (isset($_GET['signup']) && $_GET['signup'] === "success") {
        echo '<script>alert("User created successfully!");</script>';
    }
    ?>


</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-up">
            <form action="./signinup.php" method="POST">

                <h1>Create Account</h1>

                <input type="text" placeholder="Name" name="nom" id="name" class="required">
                <div class="error"></div>
                <input type="text" name="emailup" id="email" placeholder="Email" class="required">
                <div class="error"><?php echo $msg; ?></div>
                <div class="password">
                    <input type="password" name="password" id="password" placeholder="Password" class="required">
                    <div class="error"><?php echo $msg; ?></div>
                </div>
                <div class="password">
                    <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" class="required">
                    <div class="error"><?php echo $msg; ?></div>
                </div>
                <input type="text" id="phone" name="phone" id="phone" placeholder="Phone Number">
                <div class="error"></div>
                <textarea id="address" name="address" placeholder="Address" class="required"></textarea>
                <div class="error"></div>
                <input type="date" id="age" name="age" placeholder="Date of Birth" class="required">
                <div class="error"></div>
                <input type="checkbox" id="terms" name="terms" class="required">
                <label for="terms">I have read and accept the <a href="../assets/Terms-and-Conditions-for-Signing-Up.pdf" target="_blank">Terms & Conditions</a></label>
                <div class="error-yes"></div>
                <button type="submit" id="up-btn">Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form action="" method="POST">
                <h1>Sign In</h1>
                <input type="email" placeholder="Email" name="email" id="email_signin">
                <div class="error"></div>
                <div class="password">
                    <input type="password" name="pwd" placeholder="Password" id="password_signin">
                    <div class="error"></div>
                </div>
                <button type="submit" id="in-btn">Sign In</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <img src="../assets/logoweblight.png" alt="logo" class="logo">
                    <h1>Welcome To Pets Haven!</h1>
                    <p>Join our Community of Animal Lovers</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <img src="../assets/logoweblight.png" alt="logo" class="logo">

                    <h1>Hello, Pet Enthousiast!</h1>
                    <p>Become Part of our Community</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

</body>
<script>
  
    const container = document.getElementById('container');
    const registerBtn = document.getElementById('register');
    const loginBtn = document.getElementById('login');

    registerBtn.addEventListener('click', () => {
        container.classList.add("active");
    });

    loginBtn.addEventListener('click', () => {
        container.classList.remove("active");
    });
    document.addEventListener("DOMContentLoaded", function() {
        const signUpForm = document.querySelector('.sign-up form');
        const signInForm = document.querySelector('.sign-in form');

        // Function to show error message
        function showError(input, message) {
            const errorDiv = input.nextElementSibling;
            errorDiv.innerText = message;
            errorDiv.style.display = 'block';
        }

        // Function to hide error message
        function hideError(input) {
            const errorDiv = input.nextElementSibling;
            errorDiv.innerText = '';
            errorDiv.style.display = 'none';
        }

        // Function to validate email
        function validateEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(String(email).toLowerCase());
        }

        // Function to validate password
        function validatePassword(password) {
            return password.length >= 8;
        }

        function validateAge(age) {
            const currentDate = new Date();
            const inputDate = new Date(age);
            const ageDiff = currentDate.getFullYear() - inputDate.getFullYear();
            const monthsDiff = currentDate.getMonth() - inputDate.getMonth();
            if (monthsDiff < 0 || (monthsDiff === 0 && currentDate.getDate() < inputDate.getDate())) {
                ageDiff--;
            }
            return ageDiff > 13;
        }

        // Function to validate phone number
        function validatePhoneNumber(phone) {
            // You can implement custom validation rules for phone numbers here
            return phone.trim() !== '';
        }

        // Function to validate the sign-up form
        function validateSignUpForm() {
            const name = document.getElementById('name');
            const email = document.getElementById('email');
            const password = document.getElementById('password');
            const confirmPassword = document.getElementById('confirm_password');
            const phone = document.getElementById('phone');
            const address = document.getElementById('address');
            const age = document.getElementById('age');
            const terms = document.getElementById('terms');

            let isValid = true;



            if (name.value.trim() === '') {
                showError(name, 'Name is required.');
                isValid = false;
            } else {
                hideError(name);
            }

            if (!validateEmail(email.value.trim())) {
                showError(email, 'Invalid email address.');
                isValid = false;
            } else {
                hideError(email);
            }

            if (!validatePassword(password.value.trim())) {
                showError(password, 'Password must be at least 8 characters long.');
                isValid = false;
            } else {
                hideError(password);
            }

            if (password.value.trim() !== confirmPassword.value.trim()) {
                showError(confirmPassword, 'Passwords do not match.');
                isValid = false;
            } else {
                hideError(confirmPassword);
            }

            if (!validatePhoneNumber(phone.value.trim())) {
                showError(phone, 'Invalid phone number.');
                isValid = false;
            } else {
                hideError(phone);
            }

            if (address.value.trim() === '') {
                showError(address, 'Address is required.');
                isValid = false;
            } else {
                hideError(address);
            }

            if (age.value.trim() === '') {
                showError(age, 'Date of birth is required.');
                isValid = false;
            } else {
                hideError(age);
            }
            if (!validateAge(age.value)) {
                showError(age, 'You must be over 133 years old to sign up.');
                isValid = false;
            } else {
                hideError(age);
            }

            if (!terms.checked) {
                showError(terms, 'You must accept the terms and conditions.');
                isValid = false;
            } else {
                hideError(terms);
            }

            return isValid;
        }


        // Function to validate the sign-in form
        function validateSignInForm() {
            const email = document.getElementById('email_signin');
            const password = document.getElementById('password_signin');

            let isValid = true;

            if (!validateEmail(email.value.trim())) {
                showError(email, 'Invalid email address.');
                isValid = false;
            } else {
                hideError(email);
            }

            if (!validatePassword(password.value.trim())) {
                showError(password, 'Password must be at least 8 characters long.');
                isValid = false;
            } else {
                hideError(password);
            }

            return isValid;
        }

    });
</script>

</html>

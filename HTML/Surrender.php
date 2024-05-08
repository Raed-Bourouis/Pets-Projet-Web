<?php
include "../PHP/functions.php";
$pdo = pdo_connect_mysql();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"]) || empty($_POST["email"]) || empty($_POST["phone"]) || empty($_POST["animal_name"]) || empty($_POST["animal_type"]) || empty($_POST["breed"]) || empty($_POST["gender"]) || empty($_POST["vaccinated"])
        || empty($_POST["reason"])) {
        $errors["name"] = empty($_POST["name"]) ? "Name is required" : "";
        $errors["email"] = empty($_POST["email"]) ? "Email is required" : "";
        $errors["phone"] = empty($_POST["phone"]) ? "Phone is required" : "";
        $errors["animal_name"] = empty($_POST["animal_name"]) ? "Animal Name is required" : "";
        $errors["animal_type"] = empty($_POST["animal_type"]) ? "Animal Type is required" : "";
        $errors["breed"] = empty($_POST["breed"]) ? "Breed is required" : "";
        $errors["gender"] = empty($_POST["gender"]) ? "Gender is required" : "";
        $errors["vaccinated"] = empty($_POST["vaccinated"]) ? "Vaccinated is required" : "";
        $errors["reason"] = empty($_POST["reason"]) ? "Reason is required" : "";
    } else {
        $stmt = $pdo->prepare("INSERT INTO Surrender(Name,Email,Phone,AnimalName,AnimalType,Breed,Gender,Vaccinated,Reason) VALUES(:name,:email,:phone,:animal_name,:animal_type,:breed,:gender,:vaccinated,:reason)");
        $data = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
            'animal_name' => $_POST['animal_name'],
            'animal_type' => $_POST['animal_type'],
            'breed' => $_POST['breed'],
            'gender' => $_POST['gender'],
            'vaccinated' => $_POST['vaccinated'],
            'reason' => $_POST['reason']
        ];
        $stmt->execute($data);

        $to = $_SESSION['Email'];
        $subject = "Test Email";
        $message = "This is a test email sent from PHP.";
        $headers = "From: sender@example.com\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        if (mail($to, $subject, $message, $headers)) {
            echo "Email sent successfully!";
        } else {
            echo "Failed to send email.";
        }
    }
    header('Location: ./thankyou.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animal Surrender Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="../assets/logoweblight.png">
    
</head>

<body>
    <!-- Header -->
    <?php 
    generateHeader() ;
        
    ?>
    <!-- End of Header -->
    <div class="container">
        <div class="bck-img"></div>

        <h1>Animal Surrender Form</h1>
        <form action="Surrender.php" method="POST">
            <label for="name">Your Name:</label>
            <input type="text" id="name" name="name" required>
            <br>
            <label for="image" style="margin-bottom: 20px;">Image of The animal: (optional):</label>
            <input type="file" accept=".jpg,.jpeg,.png, .gif" id="image" name="image">

            <label for="email">Your Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Your Phone Number:</label>
            <input type="tel" id="phone" name="phone" required>

            <label for="animal_name">Animal's Name:</label>
            <input type="text" id="animal_name" name="animal_name" required>

            <label for="animal_type">Animal's Type:</label>
            <input type="text" id="animal_type" name="animal_type" required>

            <label for="breed">Animal's Breed:</label>
            <input type="text" id="breed" name="breed">

            <label for="age">Animal's Age:</label>
            <input type="number" id="age" name="age">

            <label style="margin-bottom: 15px;" for="gender">Animal's Gender:</label>
            <select id="gender" name="gender" required>
                <option value="" disabled selected>Select the gender...</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>

            <label style="margin-bottom: 15px;" for="vaccinated">Is the animal vaccinated?</label>
            <input type="radio" id="vaccinated_yes" name="vaccinated" value="Yes" required>&nbsp;Yes
            &nbsp;&nbsp;&nbsp;
            <input type="radio" id="vaccinated_no" name="vaccinated" value="No" required style="margin-bottom: 20px;">&nbsp;No

            <label for="reason">Reason for Surrender:</label>
            <textarea id="reason" name="reason" rows="4" required></textarea>

            <p style="font-style: italic; color: #666;">Note: Animal surrenders are only accepted from residents living
                in the capital, Tunis.</p>

            <input type="submit" value="Submit">
        </form>
    </div>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            font-family: 'Playfair Display', sans-serif;
        }

        /* Header styles */
        nav {
            background: linear-gradient(135deg, #2E8540, #556B2F);
            top: 0;
            left: 0;
            right: 0;
            height: 70px;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease-in-out;
        }

        nav:hover {
            background: linear-gradient(135deg, #25703B, #35603A);
        }

        #logo {
            width: 100px;
            height: auto;
            filter: drop-shadow(2px 2px 4px rgba(0, 0, 0, 0.2));
            transition: transform 0.3s ease-in-out;
        }

        #logo:hover {
            transform: scale(1.05);
        }

        .nav-separator {
            border-right: 2px solid #fff;
            height: 40px;
            margin: 0 20px;
        }

        nav ul {
            list-style: none;
            display: flex;
            align-items: center;
        }

        nav ul li {
            margin-right: 30px;
        }

        nav ul li:last-child {
            margin-right: 0;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s;
            font-size: 1em;
            letter-spacing: 1px;
        }

        nav ul li:last-child a {
            padding: 8px 16px;
            background-color: #2E8540;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        nav ul li:last-child a:hover {
            background-color: #25703B;
        }

        nav ul li a:hover {
            color: #C0C0C0;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
/* background image */
.bck-img {
    background-image: url('../assets/BackgroundImage.jpg');
    background-size: cover;
    background-position: center;
    position: fixed;
    filter: blur(8px) brightness(60%);
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -1; /* Place it behind any content so it doesn't show over anything else */
}
        h1 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
 
        #image:hover{
            cursor: pointer;
            background-color: #ccc;
        }
        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="number"],
        input[type="file"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 15px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        /*footer*/
        footer {
            background: linear-gradient(135deg, #2E8540, #556B2F);
            display: flex;
            flex-flow: row wrap;
            justify-content: space-around;
            font-family: 'Playfair display', sans-serif;
            color: #fff;
            align-items: center;

        }

        footer div:nth-child(3) {
            padding-right: 2vw;
        }
    </style>
    <!-- Footer -->
    <?php 
    generateFooter() ;
        
    ?>
    <!-- End of Footer -->
</body>

</html>
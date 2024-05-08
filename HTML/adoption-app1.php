<<<<<<< HEAD

<?php
$errors=[];
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST['Petname']) || empty($_POST['name']) || empty($_POST['email']) || empty($_POST['Phone']) ||
        empty($_POST['Address']) || empty($_POST['City']) || empty($_POST['Pcode']) ||empty($_POST['state']))
    {
        $errors['Petname']=empty($_POST["Petname"])?"Petname is required":"";
        $errors['Name']=empty($_POST["Name"])?"Name is required":"";
        $errors['Email']=empty($_POST["Email"])?"Email is required":"";
        $errors['Phone']=empty($_POST["Phone"])?"Phone is required":"";
        $errors['Address']=empty($_POST["Address"])?"Address is required":"";
        $errors['City']=empty($_POST["City"])?"City is required":"";
        $errors['Pcode']=empty($_POST["Pcode"])?"Postal code is required":"";
        $errors['State']=empty($_POST["state"])?"State is required":"";
    }
    else{
        $_SESSION['Petname'] = $_POST['Petname'];
        $_SESSION['Name'] = $_POST['name'];
        $_SESSION['Email'] = $_POST['email'];
        $_SESSION['Phone'] = $_POST['Phone'];
        $_SESSION['Address'] = $_POST['Address'];
        $_SESSION['City'] = $_POST['City'];
        $_SESSION['Pcode'] = $_POST['Pcode'];

        header('Location: ./adoption-app2.php');
    }
=======
<?php
include_once 'db_connection.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define variables and initialize with empty values
    $Petname = $name = $email = $Phone = $Address = $City = $Pcode = "";
    $errors = array();

    // Validate and sanitize input data
    // You can perform validation and sanitation here

    // Check if all required fields are filled
    if (empty($_POST['Petname']) || empty($_POST['name']) || empty($_POST['email']) || empty($_POST['Phone']) || empty($_POST['Address']) || empty($_POST['City']) || empty($_POST['Pcode'])) {
        $errors['all'] = "All fields are required";
    } else {
        // Prepare a SQL INSERT statement
        $sql = "INSERT INTO applications (Petname, name, email, Phone, Address, City, Pcode) VALUES (?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = $mysqli->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("sssssss", $Petname, $name, $email, $Phone, $Address, $City, $Pcode);

            // Set parameters
            $Petname = $_POST['Petname'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $Phone = $_POST['Phone'];
            $Address = $_POST['Address'];
            $City = $_POST['City'];
            $Pcode = $_POST['Pcode'];

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Redirect to the next page or display a success message
                header("location: adoption-app2.php");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $mysqli->error;
            }
        }

        // Close statement
        $stmt->close();
    } 
>>>>>>> 51d01e2e8b42fc916f59126acde6333bbd56eae5
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adoption Application</title>
    <link rel="stylesheet" href="../CSS/adopt-app1.css">
    <link rel="icon" href="../assets/logoweblight.png">
    <script defer src="../Javascript/adopt-app.js"></script>
</head>

<body>
         <!-- Header -->
<<<<<<< HEAD
         <?php 
    include '../PHP/functions.php';
    generateHeader() ;
        
    ?>
=======
         <header>
            <nav>
                <div>
                    <img id="logo" src="../assets/logoweblight.png" alt="Logo">
                </div>
                <div id="nav-list">
                    <ul>
                        <li><a href="home.html">Home</a></li>
                        <li><a href="AboutUs.html">About Us</a></li>
                        <li><a href="adopt-user.html">Adopt</a></li>
                        <li><a href="market.html">Marketplace</a></li>
                        <li><a href="cart.html"><i class="fas fa-cart-plus"></i> Cart</a></li>
                        <li><a href="signinup.html">Sign In</a></li>
                    </ul>
                </div>
            </nav>
        </header>
>>>>>>> 51d01e2e8b42fc916f59126acde6333bbd56eae5
        <!-- End of Header -->

    <!-- Main Content -->
    <div class="bck-img"></div>
    <div class="container">
        <img id="logo2" src="../assets/LogoLArge.png" alt="Large Logo">
        <h1 id="title">Adoption Application</h1>
        <p id="note">Complete this application to start the adoption process. Applications submitted by minors will not be considered valid.</p>
        <form name="appform" action="adoption-app1.php" method="post">
            <div class="input-control">
                <label for="Petname">Name Of the Pet(s) You're Interested in Adopting: *</label>
                <input type="text" id="Petname" name="Petname" placeholder="Kiki, Micha..">
<<<<<<< HEAD
                <p class="error"><?php echo isset( $errors['Petname']) ?  $errors['Petname']: ''; ?></p>
=======
                <p class="error"><?php echo isset($errors['Petname']) ? $errors['Petname'] : ''; ?></p>
>>>>>>> 51d01e2e8b42fc916f59126acde6333bbd56eae5
            </div>

            <div class="input-control">
                <label for="name">Your Name: *</label>
                <input type="text" id="name" name="name" placeholder="John Doe">
                <p class="error"><?php echo isset($errors['Name']) ? $errors['Name'] : ''; ?></p>
            </div>

            <div class="input-control">
                <label for="email">Your E-mail: *</label>
                <input type="email" id="email" name="email" placeholder="example@gmail.com">
                <p class="error"><?php echo isset($errors['Email']) ? $errors['Email'] : ''; ?></p>
            </div>

            <div class="input-control">
                <label for="Phone">Your Phone Number: *</label>
                <input type="tel" id="Phone" name="Phone" placeholder="+123 456789456">
<<<<<<< HEAD
                <p class="error"><?php echo isset($errors['Phone']) ? $errors['Phone'] : ''; ?></p>
=======
                <p class="error"><?php echo isset($errors['Phone']) ? $errors['Phone Number'] : ''; ?></p>
>>>>>>> 51d01e2e8b42fc916f59126acde6333bbd56eae5
            </div>

            <div class="input-control">
                <label for="Address">Your Address: *</label>
                <input type="text" id="Address" name="Address">
                <p class="error"><?php echo isset($errors['Address']) ? $errors['Address'] : ''; ?></p>
            </div>

            <div class="city">
                <div class="input-control">
                <input type="text" id="City" name="City" placeholder="City">
                <p class="error"><?php echo isset($errors['City']) ? $errors['City'] : ''; ?></p>
                </div>
                <div id="selected" class="input-control">
                    <br/>
                    <select id="state" name="state">
                        <option value="Select your state" disabled selected>Select your state</option>
                        <option value="Ariana">Ariana</option>
                        <option value="Beja">Beja</option>
                        <option value="Ben Arous">Ben Arous</option>
                        <option value="Bizerte">Bizerte</option>
                        <option value="Gabes">Gabes</option>
                        <option value="Gafsa">Gafsa</option>
                        <option value="Jendouba">Jendouba</option>
                        <option value="Kairouan">Kairouan</option>
                        <option value="Kasserine">Kasserine</option>
                        <option value="Kebili">Kebili</option>
                        <option value="Kef">Kef</option>
                        <option value="Mahdia">Mahdia</option>
                        <option value="Manouba">Manouba</option>
                        <option value="Medenine">Medenine</option>
                        <option value="Monastir">Monastir</option>
                        <option value="Nabeul">Nabeul</option>
                        <option value="Sfax">Sfax</option>
                        <option value="Sidi Bouzid">Sidi Bouzid</option>
                        <option value="Siliana">Siliana</option>
                        <option value="Sousse">Sousse</option>
                        <option value="Tataouine">Tataouine</option>
                        <option value="Tozeur">Tozeur</option>
                        <option value="Tunis">Tunis</option>
                        <option value="Zaghouan">Zaghouan</option>
                    </select>
                    <p class="error"><?php echo isset($errors['State']) ? $errors['State'] : ''; ?></p>
                </div>
                <div class="input-control">
                <input type="text" id="Pcode" name="Pcode" placeholder="Postal Code">
<<<<<<< HEAD
                <p class="error"><?php echo isset($errors['Pcode']) ? $errors['Pcode'] : ''; ?></p>
=======
                <p class="error"><?php echo isset($errors['Pcode']) ? $errors['POstal Code'] : ''; ?></p>
>>>>>>> 51d01e2e8b42fc916f59126acde6333bbd56eae5
                 </div>
            </div>

            <div class="btn-container">
                <button type="reset" class="reset">Reset</button>
                <button type="submit">Next</button>
            </div>
        </form>
    </div>
    <!-- End of Main Content -->

        <!-- Footer -->
        <?php 
    
    generateFooter() ;
        
    ?>
<!-- End of Footer -->
</body>
</html>


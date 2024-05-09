<?php
//Fonction du configuration et du connexion à une base de données
function pdo_connect_mysql() {
// Configuration des informations de la base de données
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'pets';
//saisie d'une exception potentielle
try {
    return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' .
$DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
} catch (PDOException $e) {

exit('Failed to connect to database!');
}
}

session_start();

// Check if user is logged in
function isUserLoggedIn() {
    return isset($_SESSION['id']);
}
function getRole(){
    if (isset($_SESSION['role'])){
    return $_SESSION['role'];}
}
// Generate header based on login status
function generateHeader() {
    echo '<header>
        <nav>
            <div>
                <img id="logo" src="../assets/logoweblight.png" alt="Logo">
            </div>
            <div id="nav-list">
                <ul>';
    echo '<li><a href="home.php">Home</a></li>';
    echo '<li><a href="AboutUs.php">About Us</a></li>';
    echo '<li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn">Services&nbsp;<i class="fa-solid fa-caret-down"></i></a>
                <div class="dropdown-content">
                <a href="';
    if (isUserLoggedIn()) {
        // Assuming getRole() function retrieves the user's role
        if (getRole() == '1') {
            echo './adopt-admin.php';
        } elseif (getRole() == '2') {
            echo './adopt-user.php';
        }
    } else {
        echo 'signinup.php'; // Default to sign-in page if user not logged in
    }
    echo '">Adopt a Pet</a>';
    echo '<a href="Surrender.php">Surrender a Pet</a>
                <a href="Volunteerpage1.php">Volunteer</a>
            </div>
        </li>';
    echo '<li><a href="market.php">Marketplace</a></li>';
    echo '<li><a href="cart.php"><i class="fas fa-cart-plus"></i> Cart</a></li>';

    if (isUserLoggedIn()) {
        if (getRole() == '1') {
            echo '<li><a href="userdashboard.php">User Dashboard</a></li>';
            echo '<li><a href="formsdashboard.php">Forms Dashboard</a></li>';
        }
        echo '<li><a href="../PHP/logout.php">Log out</a></li>';
    
    } else {
        echo '<li><a href="signinup.php">Sign In</a></li>';
    }

    echo '</ul>
            </div>
        </nav>
    </header>';
}
function generateFooter(){
    echo '<footer>
    <div>
        <img id="logo" src="../assets/logoweblight.png" alt="Logo">
    </div>
    <div>
        <p style="font-weight: bold;">Addresses:</p>
        <p><a href="https://www.google.com/maps/place/Denden,+Manouba" style="color:white; text-decoration:none"><i class="fa-solid fa-location-pin"></i>&nbsp;Denden, Manouba</a></p>
        <p><a href="https://www.google.com/maps/place/Av.+Moncef+Bey,+Tunis" style="color:white; text-decoration:none"><i class="fa-solid fa-location-pin"></i>&nbsp;Moncef Bey, Tunis</a></p>
    </div>
    <div>
        <p style="font-weight: bold;"> Contact Us</p>
        <p ><a href="mailto:pets@gmail.com" style="color:white; text-decoration:none" ><i class="fa-regular fa-envelope"></i>&nbsp;Email: pets@gmail.com</a></p>
        <p><i class="fa-solid fa-phone"></i>&nbsp;Tel: +216 12 898 757</p>
        <p><i class="fa-solid fa-fax"></i>&nbsp;Fax: +216 62 69 26</p>
        <p>RIB: 156549855955558598</p>
    </div>
</footer>';
}

?>
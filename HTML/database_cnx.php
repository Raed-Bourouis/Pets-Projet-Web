<?php
$servername = "localhost"; // Server name is localhost for XAMPP
$username = "root"; // Default username for XAMPP MySQL is root
$password = ""; // Default password for XAMPP MySQL is empty or root
$database = "adoption_app_db"; // Name of your database in XAMPP

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

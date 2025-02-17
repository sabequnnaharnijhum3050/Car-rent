<?php
$servername = "localhost";
$username = "root"; // Default in XAMPP
$password = ""; // Default in XAMPP
$dbname = "car_rental";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

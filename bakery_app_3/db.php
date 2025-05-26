<?php
$host = "localhost";
$user = "root";     
$pass = "";         
$dbname = "bakery"; 

// Connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Connection check
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

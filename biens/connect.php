<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "clic_db2019";

// Create connection
$conn = new mysqli($servername, $username, $password,$db);
$this->conn->exec("SET CHARACTER SET utf8");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
?>
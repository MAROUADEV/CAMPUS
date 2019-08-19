<?php 
 
$servername = "127.0.0.1"; 
$username = "root"; 
$password = ""; 
$dbname = "clic_db2019"; 
 
// create connection 
$connect = new mysqli($servername, $username, $password, $dbname); 
 $connect->set_charset("utf8");
// check connection 
if($connect->connect_error) {
    die("Connection Failed : " . $connect->connect_error);
} else {
    // echo "Successfully Connected";
}
 
?>
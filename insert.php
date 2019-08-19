<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
session_start();
require_once 'class.user.php';

$link = mysqli_connect("localhost", "root", "", "clic_db2019");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 $property =$_GET['property'];
// Escape user inputs for security
$deb = mysqli_real_escape_string($link, $_REQUEST['deb']);
$fin = mysqli_real_escape_string($link, $_REQUEST['fin']);
$nom = mysqli_real_escape_string($link, $_SESSION['Nom']);
$email = mysqli_real_escape_string($link, $_SESSION['Email']);
 $code=(uniqid(rand()));
// Attempt insert query execution
$sql = "INSERT INTO reservations (code_reservation,nom_reserveur, libelle,Date_debreserv, Date_finreserv,email_reserveur) VALUES ('$code','$nom','$property', '$deb', '$fin','$email')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>
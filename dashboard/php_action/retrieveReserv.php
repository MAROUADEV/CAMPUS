<?php 
session_start();
require_once 'db_connect.php';

$output = array('data' => array());
$nom= $_SESSION['Nom'];
$sql = "SELECT * FROM `reservations` WHERE `proprietaire` = '".$nom."' ";
$query = $connect->query($sql);

while ($row = $query->fetch_assoc()) {


	$output['data'][] = array(
        $row['nom_reserveur'],
        $row['Date_debreserv'],
        $row['Date_finreserv'],
		$row['libelle'],
        $row['total']*6/10,

	);

}

// database connection close
$connect->close();

echo json_encode($output);
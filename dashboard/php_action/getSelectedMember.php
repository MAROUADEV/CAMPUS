<?php 

require_once 'db_connect.php';

$id_bien= $_POST['id_bien'];

$sql = "SELECT * FROM biens WHERE id_bien = $id_bien";
$query = $connect->query($sql);
$result = $query->fetch_assoc();

$connect->close();

echo json_encode($result);


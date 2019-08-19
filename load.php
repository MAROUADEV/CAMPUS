<?php

//load.php

$connect = new PDO('mysql:host=localhost;dbname=clic_db2019', 'root', '');

$data = array();
$pr  = $_GET['pr'];
$query = "SELECT * FROM reservations where libelle='".$pr."' ORDER BY id_reservation";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
  $end = date('Y-m-d', strtotime($row["Date_finreserv"]. ' + 1 days'));
 $data[] = array(
  'id_reservation'   => $row["id_reservation"],
  'start'   => $row["Date_debreserv"],
  'end'   => $end
 );
}

echo json_encode($data);

?>
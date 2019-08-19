<?php 
 
require_once 'db_connect.php';
 
$output = array('success' => false, 'messages' => array());
 
$id_bien = $_POST['id_bien'];
 
$sql = "DELETE FROM biens WHERE id_bien = {$id_bien}";
$query = $connect->query($sql);
if($query === TRUE) {
    $output['success'] = true;
    $output['messages'] = 'Opération réussie ...';
} else {
    $output['success'] = false;
    $output['messages'] = 'Erreur lors de la suppression, veuillez réessayer ...';
}
 
// close database connection
$connect->close();
 
echo json_encode($output);
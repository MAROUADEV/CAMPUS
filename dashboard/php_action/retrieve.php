<?php 

require_once 'db_connect.php';

$output = array('data' => array());

$sql = "SELECT * FROM biens";
$query = $connect->query($sql);

while ($row = $query->fetch_assoc()) {
	
	$actionButton = '
	<div class="form-group">
	    <a data-toggle="modal" data-target="#editMemberModal" onClick="editMember('.$row['id_bien'].')"  class="btn1 btn-primary"><i class="ni ni-ruler-pencil" style="color:#fff"></i></a>
	    &nbsp;&nbsp;
        
        <a  data-toggle="modal" data-target="#removeMemberModal" onClick="removeMember('.$row['id_bien'].')" class="btn1 btn-primary"><i class="ni ni-fat-delete" style="color:#fff"></i></a>
	</div>
		';

	$output['data'][] = array(
		$row['libelle'],
        $row['prix_nuit'],
        $row['description'],

        $actionButton
	);

}

// database connection close
$connect->close();

echo json_encode($output);
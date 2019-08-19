<?php 
 
require_once 'db_connect.php';
 
//if form is submitted
if($_POST) {    
 
    $validator = array('success' => false, 'messages' => array());
 
    $id = $_POST['IdUtilisateur'];
    $Nom = $_POST['editNom'];
    $Prenom = $_POST['editPrenom'];
	$Date_naissance = $_POST['editDate_naissance'];
    $Email = $_POST['editEmail'];
    $NomUtilisateur = $_POST['editNomUtilisateur'];
	$SecteurUtilisateur = $_POST['editSecteurUtilisateur'];
    $role = $_POST['editrole'];
    $MotDePasse = $_POST['editMotDePasse'];
 
    $sql = "UPDATE utilisateur SET Nom = '$Nom', Prenom= '$Prenom', Date_naissance = '$Date_naissance', Email = '$Email', NomUtilisateur='$NomUtilisateur', SecteurUtilisateur='$SecteurUtilisateur', role='$role', MotDePasse='$MotDePasse' WHERE IdUtilisateur = $id";
    $query = $connect->query($sql);
 
    if($query === TRUE) {			
		$validator['success'] = true;
		$validator['messages'] = "Opération réussie ...";		
	} else {		
		$validator['success'] = false;
		$validator['messages'] = "Erreur lors de la modification, veuillez réessayer ...";
	}
 
    // close the database connection
    $connect->close();
 
    echo json_encode($validator);
 
}
<?php require_once 'db_connect.php'; //if form is submitted 


if($_POST) 
{ 
    $validator = array('success' => false, 'messages' => array());
 
    $nom = $_POST['Nom'];
    $prenom = $_POST['Prenom'];
	$date_naissance = $_POST['Date_naissance'];
    $email = $_POST['Email'];
    $NomUtilisateur = $_POST['NomUtilisateur'];
	$SecteurUtilisateur = $_POST['SecteurUtilisateur'];
    $role = $_POST['role'];
    $MotDePasse = $_POST['MotDePasse'];
	$code = $_POST['code'];

	$sql = "INSERT INTO utilisateur (Nom,Prenom, Date_naissance,Email,NomUtilisateur,role,MotDePasse,Status,code) VALUES ('$nom', '$prenom', '$date_naissance','$email','$NomUtilisateur','$role','$MotDePasse','Y','$code')";
    
    $query = $connect->query($sql);
 
    if($query === TRUE) {           
        $validator['success'] = true;
        $validator['messages'] = "Opération réussie ...";      
    } else {        
        $validator['success'] = false;
        $validator['messages'] = "Erreur lors de l'ajout des informations du l'offre";
    }
 
    // close the database connection
    $connect->close();
 
    echo json_encode($validator);
 
}
?>
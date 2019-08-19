<?php 

require_once 'db_connect.php';

//if form is submitted
if($_POST) {    
 
    $validator = array('success' => false, 'messages' => array());
 
    $id = $_POST['id_bien'];
    $libelle = $_POST['editlibelle'];
    $categories = $_POST['editcategories'];
    $logement = $_POST['editlogement'];
    $localisation = $_POST['editlocalisation'];
    $country = $_POST['editcountry'];
    $city = $_POST['editcity'];
    $capacite = $_POST['editcapacite'];
    $description = $_POST['editdescription'];
    $typeCh = $_POST['editypeCh'];
    $nbr_chambres = $_POST['editnbr_chambres'];
    $typeLi = $_POST['editypeLi'];
    $nbr_lits = $_POST['editnbr_lits'];
    $nbr_salles = $_POST['editnbr_salles'];
    $prix_nuit = $_POST['editprix_nuit'];
    $equipement = $_POST['editequipement'];
    
    
    $sql = "UPDATE biens SET libelle = '$libelle',categories= '$categories',subcategories='$logement', localisation='$localisation',Description='$description',typechambre='$typeCh',nbr_chambres='$nbr_chambres',typelit='$typeLi',nbr_lits='$nbr_lits',nbr_salles='$nbr_salles',prix_nuit='$prix_nuit',equipement='$equipement',pays='$country',ville='$city',capacite='$capacite'  WHERE id_bien = $id";
    $query = $connect->query($sql);
    
    $sql1 = "UPDATE reservations SET libelle = '$libelle' WHERE id_bien = $id";
    $query1 = $connect->query($sql1);
 
    if($query === TRUE && $query1 === TRUE) {			
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
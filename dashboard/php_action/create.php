<?php
session_start();
if(!empty($_POST['libelle']) || !empty($_POST['categories'])|| !empty($_POST['logement']) || !empty($_POST['localisation']) || !empty($_POST['country']) || !empty($_POST['city']) || !empty($_POST['capacite']) || !empty($_POST['description']) || !empty($_POST['typeCh']) || !empty($_POST['nbr_chambres']) || !empty($_POST['typeLi']) || !empty($_POST['nbr_lits']) || !empty($_POST['nbr_salles']) || !empty($_POST['prix_nuit']) || !empty($_POST['equipement']) || !empty($_FILES['img']['name']) || !empty($_FILES['img1']['name']) || !empty($_FILES['img2']['name']) || !empty($_FILES['img3']['name'])){
    $uploadedFile = '';
    if(!empty($_FILES["img"]["type"]) || !empty($_FILES['img2']['name']) || !empty($_FILES['img1']['name']) || !empty($_FILES['img3']['name'])){
        $fileName = $_FILES['img']['name'];
        
        $image_tmp = $_FILES['img']['tmp_name'];

          move_uploaded_file($image_tmp,"../uploads/$fileName");
        
        $fileName1 = $_FILES['img1']['name'];
        
        $image_tmp1 = $_FILES['img1']['tmp_name'];

          move_uploaded_file($image_tmp1,"../uploads/$fileName1");
        $fileName2 = $_FILES['img2']['name'];
        
        $image_tmp2 = $_FILES['img2']['tmp_name'];

          move_uploaded_file($image_tmp2,"../uploads/$fileName2");
        $fileName3 = $_FILES['img3']['name'];
        
        $image_tmp3 = $_FILES['img3']['tmp_name'];

          move_uploaded_file($image_tmp3,"../uploads/$fileName3");
        
    }
    
    $libelle = $_POST['libelle'];
    $categories = $_POST['categories'];
    $sub = $_POST['logement'];
    $localisation = $_POST['localisation'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $capacite = $_POST['capacite'];
	$description = $_POST['description'];
    $typeCh = $_POST['typeCh'];
    $nbr_chambres = $_POST['nbr_chambres'];
    $typeLi = $_POST['typeLi'];
    $nbr_lits = $_POST['nbr_lits'];
    $nbr_salles = $_POST['nbr_salles'];
    $prix_nuit = $_POST['prix_nuit'];
    $equipement = $_POST['equipement'];
    $nom = $_SESSION['Nom'];
    $email = $_SESSION['Email']
    //include database configuration file
    include_once '../db.php';
    
    //insert form data in the database
    $insert = $db->query("INSERT INTO biens (libelle,categories,subcategories,localisation,pays,ville,capacite,Description,typechambre,nbr_chambres,typelit,nbr_lits,nbr_salles,prix_nuit,equipement,nom_locataire,photo,photo1,photo2,photo3,email_proprietaire) VALUES ('".$libelle."','".$categories."','".$sub."','".$localisation."','".$country."','".$city."','".$capacite."','".$description."','".$typeCh."','".$nbr_chambres."','".$typeLi."','".$nbr_lits."','".$nbr_salles."','".$prix_nuit."','".$equipement."','".$nom."','".$fileName."','".$fileName1."','".$fileName2."','".$fileName3."','".$email."')");
    
    echo $insert?'ok':'err';
    unset($_POST);
    unset($_REQUEST);
}

?>

<?php

include('db_connect.php');

if(isset($_POST["libelle"]) && !empty($_POST["libelle"])){
    $v =$_POST["libelle"];
    //Get all state data
    $query = $mysqli->query("SELECT * FROM subcategories WHERE id_categorie = (select id_categorie from categories where libelle ='".$_POST['libelle']."') AND status = 1 ORDER BY libelle_sub ASC");

    //Count total number of rows
    $rowCount = $query->num_rows;

    //Display states list
    if($rowCount > 0){
        echo '<option value="" disabled>Choisissez un logement</option>';
        while($row = $query->fetch_assoc()){
            echo '<option value="'.$row['libelle_sub'].'">'.$row['libelle_sub'].'</option>';
        }
    }else{
        echo '<option value="">Logement non disponible</option>';
    }
}
?>

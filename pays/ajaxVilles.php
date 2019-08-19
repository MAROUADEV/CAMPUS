<?php

include('db_connect.php');

if(isset($_POST["libelle_pays"]) && !empty($_POST["libelle_pays"])){
    $v =$_POST["libelle_pays"];
    //Get all state data
    $query = $mysqli->query("SELECT * FROM villes WHERE id_pays = (select id_pays from pays where libelle_pays ='".$_POST['libelle_pays']."') AND status = 1 ORDER BY libelle_ville ASC");

    //Count total number of rows
    $rowCount = $query->num_rows;

    //Display states list
    if($rowCount > 0){
        echo '<option value="" disabled>Choisissez une ville</option>';
        while($row = $query->fetch_assoc()){
            echo '<option value="'.$row['libelle_ville'].'">'.$row['libelle_ville'].'</option>';
        }
    }else{
        echo '<option value="">Ville non disponible</option>';
    }
}
?>

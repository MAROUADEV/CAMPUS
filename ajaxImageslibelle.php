<?php

include('db_connect.php');

if(isset($_POST["libelle"]) && !empty($_POST["libelle"])){
    $v =$_POST["libelle"];
    //Get all state data
    $query = $mysqli->query("SELECT photo1,photo2,photo3 FROM biens WHERE  libelle ='".$_POST['libelle']."' ORDER BY libelle ASC");

    //Count total number of rows
    $rowCount = $query->num_rows;

    //Display states list
    if($rowCount > 0){
        //echo '<option value="">Choisissez une ville</option>';
        while($row = $query->fetch_assoc()){
            $ch = "dashboard/uploads/";

            echo '<img style="width:50px;hieght:50px" src="'.$ch.$row['photo1'].'"/>';
            echo '<img  style="width:50px;hieght:50px" src="'.$ch.$row['photo2'].'"/>';
            echo '<img style="width:50px;hieght:50px" src="'.$ch.$row['photo3'].'"/>';
        }
    }else{
        echo 'images non disponible';
    }
}
?>

<?php
//fetch all country data from database
//Include database configuration file
include('db_connect.php');

    $query = $mysqli->query("SELECT * FROM pays WHERE status = 1 ");// select all country from database 

    //Count total number of rows
    $rowCount = $query->num_rows;

    //Display states list
    if($rowCount > 0)
		
		{
	echo '<option value="" >Choisissez un pays</option>';// initial message display{  
	//echo '<input type="text" >';// initial message display
        
        while($row = $query->fetch_assoc())
		{
            echo '<option value="'.$row['libelle_pays'].'">'.$row['libelle_pays'].'</option>';// select country id & name from country table
        }
    }
	else
	{
        echo '<option value="" disabled>Pays non disponible</option>'; //display when no data!
	}



?>

<?php
//fetch all country data from database
//Include database configuration file
include('db_connect.php');

    $query = $mysqli->query("SELECT * FROM categories WHERE status = 1 ");// select all country from database 

    //Count total number of rows
    $rowCount = $query->num_rows;

    //Display states list
    if($rowCount > 0)
		
		{
	echo '<option value="" disabled>Choisissez une propriété</option>';// initial message display{  
	//echo '<input type="text" >';// initial message display
        
        while($row = $query->fetch_assoc())
		{
            echo '<option value="'.$row['libelle'].'">'.$row['libelle'].'</option>';// select country id & name from country table
        }
    }
	else
	{
        echo '<option value="">Propriété non disponible</option>'; //display when no data!
	}



?>

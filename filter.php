<?php
//filter.php
if(isset($_POST["datepicker-13"], $_POST["datepicker-14"]))
{
    $connect = mysqli_connect("localhost", "root", "", "clic_db2019");
    $output = '';
    $query ="SELECT count(id_reservation) as cnt FROM `reservations` WHERE  Date_debreserv >='".$_POST["datepicker-13"]."' and Date_finreserv <='".$_POST["datepicker-14"]."' having cnt >=1"

    $result = mysqli_query($connect, $query);
    
    if($num = mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <div class="alert alert-success" role="alert">
  no
</div>
                ';  
           }  
      }  
      else  
      {  
           $output .= '  
                <div class="alert alert-success" role="alert">
  yes
</div> 
           ';  
      }  
      echo $output;  
 }  
 ?>
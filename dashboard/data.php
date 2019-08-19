<?php
session_start();
header('Content-Type: application/json');

$conn = mysqli_connect("localhost","root","","clic_db2019");
$nom =$_SESSION['Nom'];
$role =$_SESSION['role'];
if($role == 'admin')
{
    $sqlQuery = "SELECT CASE EXTRACT(MONTH FROM created_date) WHEN 1 Then 'Janvier' WHEN 2 then 'Février' WHEN 3 then 'Mars' WHEN 4 Then 'Avril' WHEN 5 Then 'Mai' WHEN 6 Then 'Juin' WHEN 7 then 'Juillet' WHEN 8 then 'Août' WHEN 9 then 'Septembre' WHEN 10 then 'Octobre' WHEN 11 then 'Novembre' WHEN 12 then 'Décembre' END AS month, case utilisateur.role when 'pro' then sum(total) when 'admin' then sum(total*0.2) end as total FROM reservations, utilisateur where 
    admin ='clicadmin' and
    role='$role' GROUP BY month order by id_reservation ";

    $result = mysqli_query($conn,$sqlQuery);

    $data = array();
    foreach ($result as $row) {
        $data[] = $row;
    }

    mysqli_close($conn);

    echo json_encode($data);
}
else if($role == 'pro')
{
    $sqlQuery1 = "SELECT CASE EXTRACT(MONTH FROM created_date) WHEN 1 Then 'Janvier' WHEN 2 then 'Février' WHEN 3 then 'Mars' WHEN 4 Then 'Avril' WHEN 5 Then 'Mai' WHEN 6 Then 'Juin' WHEN 7 then 'Juillet' WHEN 8 then 'Août' WHEN 9 then 'Septembre' WHEN 10 then 'Octobre' WHEN 11 then 'Novembre' WHEN 12 then 'Décembre' END AS month, case utilisateur.role when 'pro' then sum(total) when 'admin' then sum(total*0.2) end as total FROM reservations, utilisateur where 
    proprietaire ='$nom' and
    role='$role' GROUP BY month order by id_reservation ";

    $result1 = mysqli_query($conn,$sqlQuery1);

    $data1 = array();
    foreach ($result1 as $row1) {
        $data1[] = $row1;
    }

    mysqli_close($conn);

    echo json_encode($data1);
}
?>
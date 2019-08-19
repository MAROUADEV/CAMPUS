<?php

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'fetch') {
        // tell the browser what's coming
        header('Content-type: application/json');
        // open database connection
        $db = new PDO('mysql:dbname=clic_db2019;host:localhost;', 'root', '');
        // use prepared statements!
        $query = $db->prepare('select * from biens where id_bien = ?');
        $query->execute(array($_GET['ID']));
        $row = $query->fetch(PDO::FETCH_OBJ);
        // send the data encoded as JSON
        echo json_encode($row);
        exit;
    }
}
?>
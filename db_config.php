<?php
//Database credentials
$dbHost     = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName     = 'capt_jobs_2018';

//Connect with the database
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
$conn->set_charset("utf8");
//Display error if failed to connect
if ($db->connect_errno) {
    printf("Connect failed: %s\n", $db->connect_error);
    exit();
}
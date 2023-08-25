<?php
$host = "localhost";
$dbname = "logins";
$user = "root";
$pwd = "";
$sqlout = new mysqli($host, $user, $pwd, $dbname);
if ($sqlout->connect_errno){
    printf("connection error: " . $sqlout->connect_error);
    exit();
}
return $sqlout; 
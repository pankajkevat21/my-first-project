<?php

$host = "sql212.infinityfree.com";
$user = "if0_41909277";
$pass = "u5SWeic4ND";
$dbname = "if0_41909277_webdata";

$conn = mysqli_connect($host, $user, $pass, $dbname);

if(!$conn){
    die("Database Connection Failed");
}

?>
<?php

$sqlhost = "localhost";
$sqlhost = "127.0.0.1";
$sqluser = "david";
$sqlpass = "david";
$dbname  = "viergewinnt";

$my_db = mysqli_connect($sqlhost, $sqluser, $sqlpass, $dbname) or die ("Datenbank-System nicht verfügbar");
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
<?php


$sqlhost = "localhost";
$sqlhost = "127.0.0.1";
$sqluser = "david";
$sqlpass = "david";
$dbname = "digitales_museum";

$my_db = mysqli_connect($sqlhost, $sqluser, $sqlpass, $dbname) or die ("Datenbank-System nicht verfügbar");

$id = htmlentities($_GET['id']);
$query = mysqli_query($my_db, "select * from bild where bildID='$id'");
if (mysqli_num_rows($query)) {
    $ein = mysqli_fetch_object($query);
    //Header( "Content-type: $ein->datatype");
    echo "test";
}
//$result = mysqli_fetch_all($query, MYSQLI_ASSOC);

//Header( "Content-type: $result[0][\"datatype\"]");
//echo $result[0]["data"];
?>

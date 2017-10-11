<?php


$sqlhost = "localhost";
$sqlhost = "127.0.0.1";
$sqluser = "david";
$sqlpass = "david";
$dbname = "digitales_museum";

$my_db = mysqli_connect($sqlhost, $sqluser, $sqlpass, $dbname) or die ("Datenbank-System nicht verfügbar");

$id = htmlentities($_GET['id']);
$titel = -1;
$profil = -1;

if(isset($_GET['titel'])) {
    $titel = htmlentities($_GET['titel']);
} else if (isset($_GET['profil'])) {
    $profil = htmlentities($_GET['profil']);
} else {

}


if($titel != -1) {
    $query = mysqli_query($my_db, "select * from bild where bildID=(Select titelbild from persoenlichkeit where persoenlichkeitID = '$id')");
} else if ($profil != -1) {
    $query = mysqli_query($my_db, "select * from bild where bildID=(Select profilbild from persoenlichkeit where persoenlichkeitID = '$id')");
} else {
    $query = mysqli_query($my_db, "select * from bild where bildID='$id'");
}

if (mysqli_num_rows($query)) {
    $ein = mysqli_fetch_assoc($query);
    header( "Content-type:". $ein["datatype"]);
    echo $ein["data"];
    echo "test";
}
//$result = mysqli_fetch_all($query, MYSQLI_ASSOC);

//Header( "Content-type: $result[0][\"datatype\"]");
//echo $result[0]["data"];
?>

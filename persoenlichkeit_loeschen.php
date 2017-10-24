<!--
persoenlichkeit_datenbanken.php:
Die eigentliche Registrierung in der Datenbank wird hier ausgeführt.
Wenn die Persönlichkeit schon existiert wird eine Fehlermeldung ausgegeben.
-->

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Persoenlichkeit loeschen</title>
    <link rel="stylesheet" href="css/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
</head>

<body>
<?php
//require("datenbank.php");
require("header.php");
require("helpers/KachelCreationEngine.php");
$dbcontroller = new DBController();
$personID = 1;
$confirmed=0;


if(isset($_GET["confirmed"])) {
    if($_GET["confirmed"]==1) {
        $confirmed = 1;
    } else {
        $confirmed=0;
    }
}

if(isset($_GET["id"])) {
    $personID=$_GET["id"];
}

//Standartwerte
$person = $dbcontroller->getPersoenlichkeitByID($personID);
$nachname = $person["name"];
$vorname = $person["vorname"];
$profilbild = $person["profilbild"];
$titelbild = $person["titelbild"];


if(isset($_GET["vorname"])) {
    $vorname=$_GET["vorname"];
}

if(isset($_GET["nachname"])) {
    $nachname=$_GET["nachname"];
}


//Alle Verknüpfungen werden gelöscht
if($confirmed==1) {
    $dbcontroller->deletePersoenlichkeitEpocheOfAPersoenlichkeit($personID);
    $dbcontroller->deletePersoenlichkeitKategorieOfAPersoenlichkeit($personID);
    $dbcontroller->deletePersoenlichkeitLiteraturangabenOfAPersoenlicheit($personID);
    $dbcontroller->deletePersoenlichkeitPersoenlichkeitofAPersoenlichkeit($personID);
    $dbcontroller->deletePersoenlichkeit($personID);
    $dbcontroller->deleteBild($titelbild);
    $dbcontroller->deleteBild($profilbild);
}



if($confirmed == 0) {
    ?>
    <div class="container">
        <div class="jumbotron">
            <h2><?php echo "Soll "; ?><i><?php echo $vorname . " " . $nachname ?></i><?php echo " wirklich gelöscht werden?"; ?></h2>
        </div>
    </div>

    <div class="containerKachelnStart"">
    <div class="clear"></div>
    <?php

    KachelCreationEngine::start("Ja", "persoenlichkeit_loeschen.php?id=$personID&confirmed=1&vorname=$vorname&nachname=$nachname");
    KachelCreationEngine::start("Nein", "persoenlichkeit.php?id=$personID");

    ?>
    <div class="clear"></div>
    </div>

    <?php
} else {
    ?>
    <div class="container">
        <div class="jumbotron">
            <h2><i><?php echo $vorname . " " . $nachname ?></i><?php echo " wurde erfolgreich gelöscht."; ?></h2>
        </div>
    </div>

    <div class="container">
        <div class="alert alert-success">
            <a href="startseite.php?">Zurück zur Startseite</a>
        </div>
    </div>
    <?php
}

require("footer.php");
?>
</body>
</html>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Registrierung 4-Gewinnt</title>
    <link rel="stylesheet" href="css/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
</head>

<body>
<?php
//require("datenbank.php");
require("header.php");
$dbcontroller = new DBController();
$personID = 1;

$counter = array("anzEpoche", "anzKategorie", "anzPerson", "anzLiteratur");
$counter2 = array("epoche", "kategorie", "person", "literatur_titel", "literatur_autor", "literatur_datum", "literatur_verlag", "literatur_ort");
$felder = array("nachname", "vorname", "kuenstlername", "vater", "mutter", "nationalitaet", "geburtsdatum", "geburtsort", "todesdatum", "kurzbeschreibung_quelle", "kurzbeschreibung_text",
    "text_titel", "text_autor","text_quelle", "text_text", "zitat_anlass", "zitat_datum", "zitat_urheber", "zitat_text", "epoche_0", "kategorie_0", "person_0", "literatur_titel_0",
    "literatur_autor_0", "literatur_datum_0", "literatur_verlag_0", "literatur_ort_0", "profilbild", "titelbild");

foreach ($felder as $feld) {
    $values[$feld] = "";
}

foreach ($_POST as $feld => $wert) {
    $values[$feld]= $wert;
}

$ID = 0;

$profilbild=$values["profilbild"];
$titelbild=$values["titelbild"];

//Profil-Bilder speichern
if (array_key_exists('bild_profilbild',$_FILES)) {
    if($_FILES['bild_profilbild']['tmp_name'] != "") {
        $tmpname = $_FILES['bild_profilbild']['tmp_name'];
        $type = $_FILES['bild_profilbild']['type'];
        $size = $_FILES ["bild_profilbild"] ["size"];
        $hndFile = fopen($tmpname, "r");
        $data = addslashes(fread($hndFile, filesize($tmpname)));
        if($ID==0) {
            $profilbild = $dbcontroller->addBild("","","","",$data,$type,$size);
        } else {
            $profilbild = $dbcontroller->updateBild("","","","",$data,$type,$size);
        }
    }
}

//Titel-Bilder speichern
if (array_key_exists('bild_titelbild',$_FILES)) {
    if($_FILES['bild_titelbild']['tmp_name'] != "") {
        $tmpname = $_FILES['bild_titelbild']['tmp_name'];
        $type = $_FILES['bild_titelbild']['type'];
        $size = $_FILES ["bild_titelbild"] ["size"];
        $hndFile = fopen($tmpname, "r");
        $data = addslashes(fread($hndFile, filesize($tmpname)));
        if($ID==0) {
            $titelbild = $dbcontroller->addBild("","","","",$data,$type,$size);
        } else {
            $titelbild = $dbcontroller->updateBild("","","","",$data,$type,$size);
        }
    }
}



if(isset($_GET["id"])) {
    $ID=$_GET["id"];
}



//Wenn eine Person nur überarbeitet werden soll
if($ID != 0) {
    //Persoenlichkeit wird bearbeitet
    $personID = $ID;
    $dbcontroller->updatePersoenlichkeit($ID, $values["nachname"], $values["vorname"], $values["kuenstlername"], $profilbild, $titelbild, $values["geburtsdatum"],
        $values["todesdatum"], $values["geburtsort"], $values["nationalitaet"], $values["vater"], $values["mutter"], $values["text_text"], $values["text_quelle"],
        $values["text_titel"], $values["text_autor"], $values["kurzbeschreibung_text"], $values["kurzbeschreibung_quelle"], $values["zitat_text"], $values["zitat_datum"], $values["zitat_anlass"], $values["zitat_urheber"]);


} else {
//Persoenlichkeit wird angelegt
    $personID = $dbcontroller->addPersoenlichkeit($values["nachname"], $values["vorname"], $values["kuenstlername"], $profilbild, $titelbild, $values["geburtsdatum"],
        $values["todesdatum"], $values["geburtsort"], $values["nationalitaet"], $values["vater"], $values["mutter"], $values["text_text"], $values["text_quelle"],
        $values["text_titel"], $values["text_autor"], $values["kurzbeschreibung_text"], $values["kurzbeschreibung_quelle"], $values["zitat_text"], $values["zitat_datum"], $values["zitat_anlass"], $values["zitat_urheber"]);
}

//Alte Verknüpfungen werden gelöscht
if($ID != 0) {
    $dbcontroller->deletePersoenlichkeitEpocheOfAPersoenlichkeit($ID);
    $dbcontroller->deletePersoenlichkeitKategorieOfAPersoenlichkeit($ID);
    $dbcontroller->deletePersoenlichkeitLiteraturangabenOfAPersoenlicheit($ID);
    $dbcontroller->deletePersoenlichkeitPersoenlichkeitofAPersoenlichkeit($ID);
}
//Kategorien werden angelegt
for($i = 0; $i <= $_SESSION["anzKategorie"]; $i++) {
    if(!empty($values["kategorie_".$i])) {
        if (empty($dbcontroller->getKategorieByName($values["kategorie_" . $i]))) {
            $kategorieID[$i] = $dbcontroller->addKategorie($values["kategorie_" . $i]);
        } else {
            $kategorieID[$i] = implode($dbcontroller->getIDOfAKategorie($values["kategorie_" . $i]));
        }
    }
}
//Verknüpfung von Person und Kategorie
if(isset($kategorieID)) {
    for($i = 0; $i < count($kategorieID); $i++) {
        $dbcontroller->addKategoriezuPersoenlichkeit($personID, $kategorieID[$i]);
    }
}


//Epochen werden angelegt
for($i = 0; $i <= $_SESSION["anzEpoche"]; $i++) {
    if(!empty($values["epoche_".$i])) {
        if (empty($dbcontroller->getEpocheByName($values["epoche_" . $i]))) {

            $epocheID[$i] = $dbcontroller->addEpoche($values["epoche_" . $i]);
        } else {
            $epocheID[$i] = implode($dbcontroller->getIDOfAnEpoche($values["epoche_" . $i]));
        }
    }
}
//Verknüpfung von Person und Epochen
if(isset($epocheID)) {
    for ($i = 0; $i < count($epocheID); $i++) {
        $dbcontroller->addEpochezuPersoenlichkeit($personID, $epocheID[$i]);
    }
}

//Literaturangaben werden angelegt
for($i = 0; $i <= $_SESSION["anzLiteratur"]; $i++) {
    $literaturID[$i] = $dbcontroller->addLiteraturangabe($values["literatur_autor_".$i], $values["literatur_titel_".$i], $values["literatur_datum_".$i], $values["literatur_verlag_".$i], $values["literatur_ort_".$i]);
}
//Verknüpfung von Person und Literaturangaben
for($i = 0; $i < count($literaturID); $i++) {
    $dbcontroller->addLiteraturangabezuPersoenlichkeit($personID, $literaturID[$i]);
}


//Verknüpfung von Person und Personen
for($i = 0; $i <= $_SESSION["anzPerson"]; $i++) {
    $dbcontroller->addPersoenlichkeitzuPersoenlichkeit($personID, $values["person_".$i]);
}




if($ID == 0) {
    ?>
    <div class="container">
        <div class="jumbotron">
            <h2>Vielen Dank für Ihre Eingabe! </h2>
            <h2>Es wurde erfolgreich eine neue Persönlichkiet erstellt!</h2>
        </div>
    </div>

    <div class="container">
        <div class="alert alert-success">
            <strong>Anlegen war erfolgreich!</strong>
            Du kannst die neue Perönlichkeit jetzt <a
                    href="persoenlichkeit.php?id=<?php echo $personID; ?>">anschauen</a>!
        </div>
    </div>
    <?php
} else {
    ?>
    <div class="container">
        <div class="jumbotron">
            <h2>Die Änderungen wurden erfolgreich gespeichert!</h2>
        </div>
    </div>

    <div class="container">
        <div class="alert alert-success">
            Du kannst die neue Perönlichkeit jetzt <a
                    href="persoenlichkeit.php?id=<?php echo $personID; ?>">anschauen</a>!
        </div>
    </div>
    <?php
}
?>

</body>
</html>
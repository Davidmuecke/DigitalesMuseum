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
require("session_check.php");
$dbcontroller = new DBController();
$personID = 1;

$counter = array("anzEpoche", "anzKategorie", "anzPerson", "anzLiteratur");
$counter2 = array("epoche", "kategorie", "person", "literatur_titel", "literatur_autor", "literatur_datum", "literatur_verlag", "literatur_ort", "literatur_text");
$felder = array("nachname", "vorname", "kuenstlername", "vater", "mutter", "nationalitaet", "geburtsdatum", "geburtsort", "todesdatum", "kurzbeschreibung_quelle", "kurzbeschreibung_text",
    "text_titel", "text_autor","text_quelle", "text_text", "zitat_anlass", "zitat_datum", "zitat_urheber", "zitat_text", "epoche_0", "kategorie_0", "person_0", "literatur_titel_0",
    "literatur_autor_0", "literatur_datum_0", "literatur_verlag_0", "literatur_ort_0", "literatur_text_0");

foreach ($felder as $feld) {
    $values[$feld] = " ";
}

foreach ($_POST as $feld => $wert) {
    $values[$feld]= $wert;
}

//Persohnlichkeit wird angelegt
$personID = $dbcontroller->addPersoenlichkeit($values["nachname"], $values["vorname"], $values["kuenstlername"], "1", "1", $values["geburtsdatum"],
    $values["todesdatum"], $values["geburtsort"], $values["nationalitaet"], $values["vater"], $values["mutter"], $values["text_text"], $values["text_quelle"],
    $values["text_titel"], $values["text_autor"], $values["kurzbeschreibung_text"], $values["kurzbeschreibung_quelle"], $values["zitat_text"], $values["zitat_datum"], $values["zitat_anlass"], $values["zitat_urheber"]);


//Kategorien werden angelegt
for($i = 0; $i <= $_SESSION["anzKategorie"]; $i++) {
    if(empty($dbcontroller->getKategorieByName($values["kategorie_".$i]))) {
        $kategorieID[$i] = implode($dbcontroller->addKategorie($values["kategorie_".$i]));
    } else {
        $kategorieID[$i] = implode($dbcontroller->getIDOfAKategorie($values["kategorie_".$i]));
    }
}
//Verknüpfung von Person und Kategorie
for($i = 0; $i < count($kategorieID); $i++) {
    $dbcontroller->addKategoriezuPersoenlichkeit($personID, $kategorieID[$i]);
}


//Epochen werden angelegt
for($i = 0; $i <= $_SESSION["anzEpoche"]; $i++) {
    if(empty($dbcontroller->getEpocheByName($values["epoche_".$i]))) {
        $epocheID[$i] = implode($dbcontroller->addEpoche($values["epoche_".$i]));
    } else {
        $epocheID[$i] = implode($dbcontroller->getIDOfAnEpoche($values["epoche_".$i]));
    }
    echo "EPOCHENNUMMER: " . $epocheID[$i];
}
//Verknüpfung von Person und Epochen
for($i = 0; $i < count($epocheID); $i++) {
    $dbcontroller->addEpochezuPersoenlichkeit($personID, $epocheID[$i]);
}



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
        Du kannst die neue Perönlichkeit jetzt <a href="persoenlichkeit.php?id=<?php echo $personID;?>">anschauen</a>!
    </div>
</div>

</body>
</html>
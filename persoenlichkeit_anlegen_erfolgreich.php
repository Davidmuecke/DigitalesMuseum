<!--
persoenlichkeit_anlegen_erfolgreich.php:
Die eigentliche Registrierung in der Datenbank wird hier ausgeführt
Wenn die Persönlichkeit schon existiert wird eine Fehlermeldung ausgegeben
-->
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Anlegen erfolgreich</title>
    <link rel="stylesheet" href="css/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<?php



$counter = array("anzEpoche", "anzKategorie", "anzPerson", "anzLiteratur");
$counter2 = array("epoche", "kategorie", "person", "literatur");
$felder = array("nachname", "vorname", "kuenstlername", "vater", "mutter", "nationalitaet", "geburtsdatum", "geburtsort", "todesdatum", "kurzbeschreibung_quelle", "kurzbeschreibung_text",
"text_titel", "text_autor","text_quelle", "text_text", "zitat_anlass", "zitat_datum", "zitat_urheber", "zitat_text", "epoche_0", "kategorie_0", "person_0", "literatur_0");

foreach ($felder as $feld) {
    $values[$feld] = "";
}

$zaehler = 0;
foreach ($counter as $feld) {
    if(isset($_SESSION[$feld])) {
        for($i = 1; $i <= $_SESSION[$feld]; $i++) {
            $values[$counter2[$zaehler]."_".$i]="";
        }
    }
    $zaehler++;
}

foreach ($counter as $feld) {
    if(!isset($_SESSION[$feld])) {
        $_SESSION[$feld]=1;
    }
}

if(isset($_SESSION["anzEpoche"])) {

}



foreach ($values as $feld => $wert) {
    if(isset($_POST[$feld])) {
        $values[$feld] = $_POST[$feld];
    } else { $values[$feld] =""; }
}





if(isset($_REQUEST['vorname'])&& isset($_REQUEST['nachname'])&&isset($_REQUEST['mail']) && isset($_REQUEST['userName']) && isset($_REQUEST['password']) && isset($_REQUEST["passwordWdh"])){

    $vorname = mysqli_real_escape_string($my_db,htmlentities($_REQUEST['vorname']));
    $nachname = mysqli_real_escape_string($my_db,htmlentities($_REQUEST['nachname']));
    $mail = mysqli_real_escape_string($my_db,htmlentities($_REQUEST['mail']));
    $userName = mysqli_real_escape_string($my_db,htmlentities($_REQUEST['userName']));
    $challenge = password_hash($mail,PASSWORD_DEFAULT);

    //Abfrage, ob "p-kuenstername" schon verhanden:
    $query = mysqli_query($my_db,"SELECT * FROM benutzer WHERE userName='".$userName."'");
    $result = mysqli_num_rows($query);
    if ($result === 0) {
        //"userName" ist noch nicht vorhanden!
    }

    else{
        echo "<div class='container'>
                 <div class=\"alert alert-danger\">
                    <strong>Die Persönlichkiet ist schon vorhanden!</strong>
                     <a href=\"javascript:history.back()\">Zurück</a> zur Startseite...
                 </div>
              </div>";
        die();

       }

        echo "<div class='container'>
                            <div class=\"jumbotron\">
                                <h2>Vielen Dank für Ihre Eingabe! </h2>
                                <h2>Es wurde erfolgreich eine neue Persönlichkiet erstellt!</h2>
                            </div>
                         </div>";

        echo "<div class='container'>    
                      <div class=\"alert alert-success\"
                        <strong>Anlegen war erfolgreich!</strong> Du kannst die neue Perönlichkeit jetzt <a href='#'>anschauen</a>!
                      </div>
                  </div>";

}

?>
</body>
</html>
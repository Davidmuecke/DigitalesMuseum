<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Registrierung 4-Gewinnt</title>
    <link rel="stylesheet" href="css/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<?php
require("datenbank.php");

if(isset($_REQUEST['vorname'])&& isset($_REQUEST['nachname'])&&isset($_REQUEST['mail']) && isset($_REQUEST['userName']) && isset($_REQUEST['password']) && isset($_REQUEST["passwordWdh"]) && isset($_REQUEST['userAlter']) && isset($_REQUEST['geschlecht'])){

    $vorname = mysqli_real_escape_string($my_db,htmlentities($_REQUEST['vorname']));
    $nachname = mysqli_real_escape_string($my_db,htmlentities($_REQUEST['nachname']));
    $mail = mysqli_real_escape_string($my_db,htmlentities($_REQUEST['mail']));
    $userName = mysqli_real_escape_string($my_db,htmlentities($_REQUEST['userName']));
    $userAlter = mysqli_real_escape_string($my_db,htmlentities($_REQUEST['userAlter']));
    $geschlecht = mysqli_real_escape_string($my_db,htmlentities($_REQUEST['geschlecht']));
    $challenge = password_hash($mail,PASSWORD_DEFAULT);

    //Abfrage, ob "userName" schon verhanden:
    /*$query = mysqli_query($my_db,"SELECT * FROM benutzer WHERE userName='".$userName."'");
    $result = mysqli_num_rows($query);
    if ($result === 0) {
        //"userName" ist noch nicht vorhanden!
    }

    else{
        echo "<div class='container'>
                 <div class=\"alert alert-danger\">
                    <strong>Der Benutzername ist schon vergeben!</strong>
                     Versuche es bitte <a href=\"javascript:history.back()\">erneut</a>!
                 </div>
              </div>";
        die();

    }*/

    if($_REQUEST["password"] == $_REQUEST["passwordWdh"]){
        $pas = password_hash($_REQUEST['password'],PASSWORD_DEFAULT);


        /*if(isset($_FILES['bild_daten'])){
            $bild_daten_tmpname = $_FILES['bild_daten']['tmp_name'];
            $bild_daten_name = $_FILES['bild_daten']['name'];
            $bild_daten_type = $_FILES['bild_daten']['type'];
            $bild_daten_size = $_FILES['bild_daten']['size'];

            if (!empty($bild_daten_tmpname)) {

                if (( $bild_daten_type == "image/gif" ) || ($bild_daten_type == "image/pjpeg") || ($bild_daten_type == "image/jpeg") || ($bild_daten_type == "image/png")) {

                    $dateihandle = fopen($bild_daten_tmpname, "r");
                    $bild_daten = mysqli_real_escape_string($my_db, fread($dateihandle, filesize($bild_daten_tmpname)));
                    $bild_name = mysqli_real_escape_string($my_db, $bild_daten_name);
                    $bild_type = mysqli_real_escape_string($my_db, $bild_daten_type);
                    $sql = "INSERT INTO bilder(bild_daten, bild_name, bild_typ, bild_size) VALUES('$bild_daten', '$bild_name', '$bild_type', $bild_daten_size)";
                    $res = mysqli_query($my_db, $sql) or die(mysqli_error($my_db));

                    $id = "SELECT ID FROM bilder WHERE bild_daten = '".$bild_daten."' AND bild_name = '".$bild_name."' AND bild_typ = '".$bild_type."' AND bild_size = '".$bild_daten_size."'";
                    $res = mysqli_query($my_db, $id) or die (mysqli_error($my_db));
                    $res = mysqli_fetch_assoc($res);
                */
        $sql= "INSERT INTO user (mail, password) VALUES('".$userName."','".$vorname."','".$nachname."','".$mail."','".$pas."','".$userAlter."','".$geschlecht."')";

        $res = mysqli_query($my_db, $sql) or die (mysqli_error($my_db));
        ?>
        <div class="container">
                            <div class="jumbotron">
                                <h2>Vielen Dank für deine Registrierung! </h2>
                                <h2>F&uumlr dich wurde erfolgreich ein Account angelegt!</h2>
                            </div>
        </div>;
        <?php
        /*
        }
        else {
            echo "<div class=\"alert alert-danger\">
                    <strong>Ung&uumltiges Bildformat!</strong> Bitte gib ein g&uumltiges Bildfromat ein (gif, pjpeg, jpeg, png)!</a>.
                  </div>";
        }
    }
    else {
        echo "<div class=\"alert alert-danger\">
                <strong>Es wurde kein Bild &uumlbergeben</strong> Du musst ein Bild &uumlbergeben!</a>.
              </div>";
    }
}
else{
    echo "<div class=\"alert alert-danger\">
            <strong>Fehler!</strong> Bei deinem Bild ist ein Fehler aufgetreten!</a>.
          </div>";
}*/
    }
    else{
        echo "<div class=\"container\">    
                  <div class=\"alert alert-danger\">
                    <strong>Fehler!</strong> Dein Passwort stimmt nicht überein! </a>
                    Versuche es bitte <a href=\"javascript:history.back()\">erneut</a>!
                  </div>
            </div>";
    }
}

if(isset($_REQUEST['challenge'])){

    $challenge = mysqli_real_escape_string($my_db,htmlentities($_REQUEST['challenge']));
    $sql="SELECT * FROM unbestaetigt WHERE challenge='".$challenge."'";
    $res = mysqli_query($my_db, $sql) or die (mysqli_error($my_db));
    $res = mysqli_fetch_assoc($res);

    if($res['challenge']==$challenge){

        $sql = "INSERT INTO benutzer (userName, vorname, nachname, mail, password, userAlter, geschlecht/*, bild*/) VALUES ('".$res['userName']."','".$res['vorname']."','".$res['nachname']."','".$res['mail']."','".$res['password']."','".$res['userAlter']."','".$res['geschlecht']."')";
        $res = mysqli_query($my_db, $sql) or die (mysqli_error($my_db));
        $sql = "DELETE FROM unbestaetigt WHERE challenge='".$challenge."'";
        $res = mysqli_query($my_db, $sql) or die (mysqli_error($my_db));

        echo "<div class='container'>
                <div class=\"jumbotron\">
                    <h2>Vielen Dank für deine Registrierung! </h2>
                    <h2>F&uumlr dich wurde erfolgreich ein Account angelegt!</h2>
                 </div>
              </div>";
        echo ">
                    <strong>Bestätigung war erfolgreich!</strong> Du kannst dich jetzt mit deinem Account <a href='login.php'>anmelden</a>!
                  </div>
              </div>";
    }
}
?>
</body>
</html>
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

if(isset($_REQUEST['vorname'])&& isset($_REQUEST['nachname'])&&isset($_REQUEST['mail']) && isset($_REQUEST['userName']) && isset($_REQUEST['password']) && isset($_REQUEST["passwordWdh"])){

    $vorname = mysqli_real_escape_string($my_db,htmlentities($_REQUEST['vorname']));
    $nachname = mysqli_real_escape_string($my_db,htmlentities($_REQUEST['nachname']));
    $mail = mysqli_real_escape_string($my_db,htmlentities($_REQUEST['mail']));
    $userName = mysqli_real_escape_string($my_db,htmlentities($_REQUEST['userName']));
    $challenge = password_hash($mail,PASSWORD_DEFAULT);

    //Abfrage, ob "userName" schon verhanden:
    $query = mysqli_query($my_db,"SELECT * FROM benutzer WHERE userName='".$userName."'");
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

    }

    if($_REQUEST["password"] == $_REQUEST["passwordWdh"]){
        $pas = password_hash($_REQUEST['password'],PASSWORD_DEFAULT);

        $sql= "INSERT INTO unbestaetigt (challenge, userName, vorname, nachname, mail, password) VALUES('".$challenge."','".$userName."','".$vorname."','".$nachname."','".$mail."','".$pas."')";

        $res = mysqli_query($my_db, $sql) or die (mysqli_error($my_db));
        echo "<div class='container'>
                            <div class=\"jumbotron\">
                                <h2>Vielen Dank für deine Registrierung! </h2>
                                <h2>F&uumlr dich wurde erfolgreich ein Account angelegt!</h2>
                            </div>
                         </div>";

        echo "<div class='container'>
                             <div class=\"alert alert-info\">
                                <strong>Info!</strong> Bitte klicke auf den folgenden Link, um deinen Account zu <a href='registrierung_erfolgreich.php?challenge=".$challenge."'>bestätigen</a>.
                             </div>
                          </div>";

    }
    else{
        echo "<div class='container'>    
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

        $sql = "INSERT INTO benutzer (userName, vorname, nachname, mail, password) VALUES ('".$res['userName']."','".$res['vorname']."','".$res['nachname']."','".$res['mail']."','".$res['password']."')";
        $res = mysqli_query($my_db, $sql) or die (mysqli_error($my_db));
        $sql = "DELETE FROM unbestaetigt WHERE challenge='".$challenge."'";
        $res = mysqli_query($my_db, $sql) or die (mysqli_error($my_db));

        echo "<div class='container'>
                <div class=\"jumbotron\">
                    <h2>Vielen Dank für deine Registrierung! </h2>
                    <h2>F&uumlr dich wurde erfolgreich ein Account angelegt!</h2>
                 </div>
              </div>";
        echo "<div class='container'>    
                  <div class=\"alert alert-success\"
                    <strong>Bestätigung war erfolgreich!</strong> Du kannst dich jetzt mit deinem Account <a href='login.php'>anmelden</a>!
                  </div>
              </div>";
    }
}
?>
</body>
</html>
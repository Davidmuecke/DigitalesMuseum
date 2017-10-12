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
require("helpers/DBController.php");

if(isset($_REQUEST['vorname'])&& isset($_REQUEST['nachname'])&&isset($_REQUEST['mail']) && isset($_REQUEST['userName']) && isset($_REQUEST['password']) && isset($_REQUEST["passwordWdh"])){
    $con = new DBController();
    $my_db = $con->getUserDB();
    $vorname = mysqli_real_escape_string($my_db,htmlentities($_REQUEST['vorname']));
    $nachname = mysqli_real_escape_string($my_db,htmlentities($_REQUEST['nachname']));
    $mail = mysqli_real_escape_string($my_db,htmlentities($_REQUEST['mail']));
    $userName = mysqli_real_escape_string($my_db,htmlentities($_REQUEST['userName']));



    //Abfrage, ob "userName" schon verhanden:
    $query = mysqli_query($my_db,"SELECT * FROM user WHERE username='".$userName."'");
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
        $sql= "INSERT INTO user ( username, vorname, name, mail, password) VALUES('$userName','$vorname','$nachname','$mail','$pas')";
        $res = mysqli_query($my_db, $sql) or die (mysqli_error($my_db));

       echo " <div class=\"container\">
                            <div class=\"jumbotron\">
                                <h2>Vielen Dank für deine Registrierung! </h2>                               
                            </div>
                         </div>;   ";
        echo "<div class='container'>    
                  <div class=\"alert alert-success\"
                    <strong>Bestätigung war erfolgreich!</strong> Du kannst dich jetzt mit deinem Account <a href='login.php'>anmelden</a>!
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


?>
</body>
</html>
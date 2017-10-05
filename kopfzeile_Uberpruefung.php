<?php
session_start();
require("datenbank.php");

//Ueberpruefung der Login-Daten
if(!isset($_SESSION['login'])){
    if(isset($_REQUEST['login']) && isset($_REQUEST['password'])){

        //Verifikation des Benutzers
        $login = mysqli_real_escape_string($my_db,htmlentities($_REQUEST['login']));
        $pas = mysqli_real_escape_string($my_db,htmlentities($_REQUEST['password']));
        $sql = "SELECT * FROM benutzer WHERE userName='".$login."' OR mail='".$login."'";
        $res = mysqli_query($my_db,$sql);

        if($res == false){
            header("Location: done/login_fehler.php");
            die();
        }
        else{
            $res = mysqli_fetch_assoc($res);
        }


        //Ueberpruefung des Passwords
        if(password_verify($pas,$res['password'])){
            $sql = "SELECT userName FROM benutzer WHERE userName='".$login."' OR mail='".$login."'";
            $res = mysqli_query($my_db,$sql);
            $row= mysqli_fetch_array($res);
            $_SESSION['login'] = $row['userName'];
            session_regenerate_id();
            //--> Login erfolgreich
        } else {
            header("Location: done/login_fehler.php");
            die();
        }
    }

}
else {
        //der Benutzer war schon angemeldet
}


?>

<!--Angezeigte Kopfzeile:-->
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Digitales Museum Startseite</title>
    <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="rahels_css.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/kachelnLaden.js"></script>
</head>

<body onload="mail();">


<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#" style="color: white">Digitales Museum</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="startseite.php">Home</a></li>
            <li class="active"><a href="startseite.php">Kategorien</a></li>
            <li class="active"><a href="startseite.php">Persönlichkeiten</a></li>
            <li class="active"><a href="startseite.php">Epochen</a></li>
        </ul>
        <button id="testbutton" class="btn" onclick="showKacheln('teste','test','','test','test');">tester</button>
        <ul class="nav navbar-nav navbar-right">
                    <form class="navbar-form navbar-left">
                        <div class="form-group">
                            <input type="text" id="suchen_feld" class="form-control" placeholder="Search">
                        </div>
                        <button id="suchen_button" type="submit" class="btn"><span class="glyphicon glyphicon-search"></span></button>
                    </form>
            <li class="active"><a href="done/logout.php"><span class="glyphicon glyphicon-log-out"></span>Abmelden</a></li>
        </ul>
    </div>
</nav>




</body>
</html>

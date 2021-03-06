<?php
session_start();
require("helpers/DBController.php");

//Ueberpruefung der Login-Daten
if(!isset($_SESSION['login'])){
    if(isset($_REQUEST['login']) && isset($_REQUEST['password'])){
        $con = new DBController();
        $my_db = $con->getUserDB();
        //Verifikation des Benutzers
        $login = mysqli_real_escape_string($my_db,htmlentities($_REQUEST['login']));
        $pas = mysqli_real_escape_string($my_db,htmlentities($_REQUEST['password']));
        $sql = "SELECT * FROM user WHERE username='".$login."' OR mail='".$login."'";
        $res = mysqli_query($my_db,$sql);

        if($res == false){
            header("Location: login_fehler.php");
            die();
        }
        else{
            $res = mysqli_fetch_assoc($res);
        }

        //Ueberpruefung des Passwords
        if(password_verify($pas,$res['password'])){
            $sql = "SELECT username FROM user WHERE username='".$login."' OR mail='".$login."'";
            $res = mysqli_query($my_db,$sql);
            $row= mysqli_fetch_array($res);
            $_SESSION['login'] = $row['username'];
            session_regenerate_id();
            //--> Login erfolgreich
        } else {
            header("Location: login_fehler.php");
            die();
        }
    } else{
        //anmelden
        header("Location: login.php");
        die();
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digitales Museum Startseite</title>
    <link rel="stylesheet" href="css/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body onload="mail();">

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="startseite.php" style="color: white">Digitales Museum</a>
            <button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse" aria-expanded="false" aria-controls="navHeaderCollapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
        </div>

        <div class="collapse navbar-collapse navHeaderCollapse">
            <ul class="nav navbar-nav">
                <li><a href="kategorien_uebersicht.php">Kategorien</a></li>
                <li><a href="persoenlichkeiten_uebersicht.php">Persönlichkeiten</a></li>
                <li><a href="epochen_uebersicht.php">Epochen</a></li>
                <li id="unsichtbar">a</li>
                <li id="button_persoenlichkeit_anlegen"><a href="persoenlichkeit_editor.php">Neu</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <form class="navbar-form navbar-left" role="search" action="suchen.php" method="get">
                    <div class="input-group">
                        <form><input type="text" name="suchbegriff" class="form-control" id="input_suchen" placeholder="Suche"></form>
                        <div class="input-group-btn">
                            <button class="btn btn-default btn_noeffect" type="submit" id="suchen_button"><i class="glyphicon glyphicon-search"></i></button>
                        </div>
                    </div>
                </form>
                <li class=""><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Abmelden</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="clear"></div>



</body>
</html>

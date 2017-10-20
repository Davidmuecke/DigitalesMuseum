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

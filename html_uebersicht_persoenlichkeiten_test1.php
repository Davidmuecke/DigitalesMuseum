<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Digitales Museum Startseite</title>
    <link rel="stylesheet" href="../../../../Users/illi/OneDrive%20-%20Hewlett%20Packard%20Enterprise/DHBW/3.%20Semester/Grundlagen_der_Datenbanken/Projekt_DB/GitHub_Projekt_Datenbanken/DigitalesMuseum/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../../Users/illi/OneDrive%20-%20Hewlett%20Packard%20Enterprise/DHBW/3.%20Semester/Grundlagen_der_Datenbanken/Projekt_DB/GitHub_Projekt_Datenbanken/DigitalesMuseum/rahels_css.css">
</head>

<body>
<div class="container">

    <div class="jumbotron">
        <h1>Digitales Museum</h1>
    </div>

    <?php
    require("kopfzeile_Uberpruefung.php");
    ?>

    <script language="javascript">
        <!--
        var zug = -1;
        var req = null;
        var READY_STATE_COMPLETE = 4;
        function sendRequest(url, params, HTTPMethod) {
            if (!HTTPMethod) {
                HTTPMethod = "GET";
            }
            if (window.XMLHttpRequest) {
                req = new XMLHttpRequest();
            }
            if (req) {
                req.onreadystatechange = onReadyState;
                req.open(HTTPMethod, url, true);
                req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                req.send(params);
            }
        }
        function onReadyState() {
            var ready = req.readyState;
            if (ready == READY_STATE_COMPLETE) {
                if (req.responseText) {
                    var refZiel = document.getElementById("dasDrumHerum");
                    refZiel.innerHTML = req.responseText;
                }
            }
        }
        function getGame(id) {
            var strURL = "spielfeld.php";
            params = "game=" + id;
            if (zug != -1) {
                params += "&column=" + zug;
                zug = -1;
            }
            sendRequest(strURL, params, "POST");
            window.setTimeout("getGame(" + id + ")", 500);
        }
        function getListNeuesSpiel() {
            var strURL = "listOfGames.php";
            params = "neu=game";
            sendRequest(strURL, params, "POST");
            window.setTimeout("getList()", 1500);
        }
        function getListBeitreten(id) {
            var strURL = "listOfGames.php";
            params = "beitreten=" + id;
            sendRequest(strURL, params, "POST");
            window.setTimeout("getList()", 1500);
        }
        function getList(params) {
            var strURL = "listOfGames.php";
            sendRequest(strURL, params, "POST");
            window.setTimeout("getList()", 1500);
        }
        -->
    </script>
</div>

<div id="dasDrumHerum">
    <div class="container">
        <?php
        date_default_timezone_set('Europe/Berlin');
        $current_date = date('d/m/Y == H:i:s');
        echo $current_date;
        if (isset($_REQUEST['game'])) {
            $id = mysqli_real_escape_string($my_db, htmlentities($_REQUEST['game']));
            echo "<script>getGame(" . $id . ");</script>";
        }
        else {
            if (isset($_REQUEST['neu'])) {
                $neu = mysqli_real_escape_string($my_db, htmlentities($_REQUEST['neu']));
                echo "<script>getListNeuesSpiel();</script>";
            }
            elseif (isset($_REQUEST['beitreten'])) {
                $beitreten = mysqli_real_escape_string($my_db, htmlentities($_REQUEST['beitreten']));
                echo "<script>getListBeitreten(" . $beitreten . ");</script>";
            }
            else {
                echo "<script>getList();</script>";
            }
        }
        ?>
    </div>
</div>
<?php
require("done/kontaktzeile_unten.php");
?>
</body>
</html>
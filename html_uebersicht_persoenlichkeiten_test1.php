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
                    var refZiel = document.getElementById("persoenlichkeiten_felder");
                    refZiel.innerHTML = req.responseText;
                }
            }
        }
        -->
    </script>
</div>

<div id="persoenlichkeiten_felder">
    <div class="container">
        <?php
        date_default_timezone_set('Europe/Berlin');
        $current_date = date('d/m/Y == H:i:s');
        ?>
        <div class="row vertical-offset-100">
            <div class="col-md-7 col-md-offset-2">
                <div class="panel">
                    <a href="#">
                        <div class="panel-heading">
                            Vorname Nachname
                        </div>
                    </a>
                    <div class="panel-body">
                        Geburtsdatum
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require("kontaktzeile_unten.php");
?>
</body>
</html>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Digitales Museum Startseite</title>
    <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="rahels_css.css">
    <link rel="stylesheet" href="felix_css.css">
</head>

<body>

<div class="container">

    <div class="title_image title_image--32by9"
         style="background-image:url(img_flower.jpg)"></div>

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
            <div class=" col-md-6 col-md-offset-0">
                <div class="panel">
                    <div class="panel-heading">
                        <a id="link_persoenlichkeit" href="#">Vorname Nachname</a>
                        <label id="geburtsdatum"><span class="glyphicon glyphicon-asterisk"></span> Geburtsdatum</label>
                        <label id="todestag"><span class="glyphicon glyphicon-plus"></span> Todestag</label>
                    </div>
                    <div class="panel-body">
                        <div class="profile_image profile_image--1by1"
                             style="background-image:url(img_flower.jpg)"></div>
                        <div class="characteristics">
                            <label class="charac_label">Geboren am</label>
                            <label class="charac_label">in</label>
                            <label class="charac_label">Gestorben am</label>
                            <label class="charac_label">in</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="information col-md-6 col-md-offset-0">
                <div class="panel">
                    <div class="panel-heading">
                        <a id="link_information" href="#">Information Title</a>
                    </div>
                    <div class="panel-body">
                        <div class="characteristics">
                            <label class="charac_label">Geboren am</label>
                            <label class="charac_label">in</label>
                            <label class="charac_label">Gestorben am</label>
                            <label class="charac_label">in</label>
                        </div>
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
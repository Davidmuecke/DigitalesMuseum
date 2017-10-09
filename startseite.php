<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Digitales Museum Startseite</title>
    <link rel="stylesheet" href="css/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<div class="container">

    <div class="jumbotron">
        <h1>Digitales Museum</h1>
    </div>

    <?php
    require("header.php");
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
                    var refZiel = document.getElementById("startseite_button");
                    refZiel.innerHTML = req.responseText;
                }
            }
        }
        -->
    </script>
</div>

<div id="startseite_button">
    <div class="container">
        <?php
        date_default_timezone_set('Europe/Berlin');
        $current_date = date('d/m/Y == H:i:s');
        ?>
        <div class="row vertical-offset-100">
            <div class="col-md-4 col-md-offset-4">
                <a href="#">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="face-button">
                                Kategorien
                            </div>
                        </div>
                    </div>
                </a>
                <a href="persoenlichkeiten_uebersicht.php">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="face-button">
                                Persönlichkeiten
                            </div>
                        </div>
                    </div>
                </a>
                <a href="#">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="face-button">
                                Epochen
                            </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<?php
require("footer.php");
?>
</body>
</html>>
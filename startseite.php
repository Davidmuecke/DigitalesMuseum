<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Digitales Museum Startseite</title>
    <link rel="stylesheet" href="rahels_css.css">
    <link rel="stylesheet" href="/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/main.js"></script>
</head>


<body>
<div class="container">

    <div class="jumbotron">
        <div class="clear"></div>
        <h1>Digitales Museum</h1>
    </div>

    <?php
    require("kopfzeile_Uberpruefung.php");
    ?>


</div>

<div id="startseite_button">
    <div class="container">
        <?php
        date_default_timezone_set('Europe/Berlin');
        $current_date = date('d/m/Y == H:i:s');
        ?>
        <div class="row vertical-offset-100">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body" onclick="#">
                        Kategorie
                    </div>
                </div>

                <div class="panel panel-default" onclick="#">
                    <div class="panel-body">
                        Persönlichkeit
                    </div>
                </div>

                <div class="panel panel-default" onclick="#">
                    <div class="panel-body">
                        Epoche
                    </div>
                </div>


            </div>
        </div>
    </div>

    <div class="containerKacheln">
        <div class="clear"></div>
        <?php
        $i = 0;
        for($i = 0; $i < 4; $i++) {
            ?>
            <div class="kachel">
                <h2 class="kachelHeading">Kategorie</h2>
            </div>
            <?php
        }
        ?>

        <?php
        $i = 0;
        for($i = 0; $i < 4; $i++) {
            ?>
            <div class="kachel2">
                <h2 class="kachelHeading">Persöhnlichkeit</h2>
            </div>
            <?php
        }
        ?>

        <div class="clear"></div>
    </div>



</div>
<?php
require("kontaktzeile_unten.php");
?>
</body>
</html>
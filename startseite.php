<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digitales Museum Startseite</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
</head>


<body>
<div class="container">

    <div class="jumbotron">
        <div class="clear"><!--damit die Kacheln nicht über das Jumbotron laufen-->/div>
        <h1>Digitales Museum</h1>
    </div>

    <?php
    require("header.php");
    require("helpers/KachelCreationEngine.php");
    ?>


</div>

<div id="startseite_button">
    <div class="container">

    </div>

    <div class="containerKachelnStart"">
        <div class="clear"></div>
        <?php

            KachelCreationEngine::start("Kategorien", "kategorien_uebersicht");
            KachelCreationEngine::start("Persönlichkeiten", "persoenlichkeiten_uebersicht");
            KachelCreationEngine::start("Epochen", "epochen_uebersicht");

            ?>
        <div class="clear"></div>
    </div>

</div>
<?php
require("footer.php");
?>
</body>
</html>
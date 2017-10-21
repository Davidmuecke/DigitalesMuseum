<!--
kategorien_uebersicht.php:
Diese Seite stellt das Grundgerüst für die Kategorien-Übersicht dar.
Die entsprechenden Kacheln werden mithilfe der KachelCreationEngine erstellt und eingefügt.
Die Navigation Bar wird mithilfe von header.php erzeugt, der Footer mithilfe von footer.php
-->

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Kategorien</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
</head>


<body>
<div class="container">

    <?php
    require("header.php");
    require("helpers/KachelCreationEngine.php");
    ?>

    <div class="jumbotron">
        <div class="clear"><!--damit die Kacheln nicht über das Jumbotron laufen--></div>
        <h1>Kategorien</h1>
    </div>




</div>

<div id="startseite_button">
    <div class="container">
        <?php
        date_default_timezone_set('Europe/Berlin');
        $current_date = date('d/m/Y == H:i:s');
        ?>
    </div>

    <div class="containerKachelnKategorien">
        <div class="clear"></div>
        <?php
              KachelCreationEngine::kategorie("");
        ?>
        <div class="clear"></div>
    </div>

</div>
<?php
require("footer.php");
?>
</body>
</html>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Epochen</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/main.js"></script>
</head>


<body>
<div class="container">

    <div class="jumbotron">
        <div class="clear"></div>
        <h1>Epochen</h1>
    </div>

    <?php
    require("header.php");
    require("KachelCreationEngine.php");
    ?>


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
            KachelCreationEngine::kategorie("Romantik");
            KachelCreationEngine::kategorie("Barock");
            KachelCreationEngine::kategorie("Antike");
            KachelCreationEngine::kategorie("Neuzeit");
            ?>
        <div class="clear"></div>
    </div>

</div>
<?php
require("footer.php");
?>
</body>
</html>
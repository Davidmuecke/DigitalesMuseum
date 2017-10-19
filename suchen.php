<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Suchen</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
</head>


<body>

<div class="container">
    <?php
    require("header.php");
    require("helpers/KachelCreationEngine.php");
    date_default_timezone_set('Europe/Berlin');
    $current_date = date('d/m/Y == H:i:s');

    $suchbegriff = $_GET["suchbegriff"];
    $anz_ep = KachelCreationEngine::epoche_anz($suchbegriff);
    $anz_pers =  KachelCreationEngine::persoenlichkeit_anz($suchbegriff);
    $anz_kat = KachelCreationEngine::kategorie_anz($suchbegriff);

    if ($suchbegriff != ""){
    ?>

    <div class="jumbotron">
        <div class="clear"><!--damit die Kacheln nicht über das Jumbotron laufen--></div>
        <h1>Suche nach <i><?php echo $suchbegriff; ?></i></h1>
    </div>
</div>

<div class="container">
    <?php
    if ($anz_pers > 0) {
        ?>
        <h1>Persönlichkeiten (<?php echo $anz_pers; ?> Treffer)</h1>
        <div id="startseite_button">
            <div class="containerKachelnKategorien">
                <div class="clear"></div>
                <?php
                KachelCreationEngine::persoenlichkeit(-1, -1, $suchbegriff);
                ?>
                <div class="clear"></div>
            </div>
        </div>
        <?php
    }
    ?>
</div>


<div class="container">
    <?php
    if ($anz_kat > 0) {
        ?>
        <h1>Kategorien (<?php echo $anz_kat; ?> Treffer)</h1>
        <div id="startseite_button">
            <div class="containerKachelnKategorien">
                <div class="clear"></div>
                <?php
                KachelCreationEngine::kategorie($suchbegriff);
                ?>
                <div class="clear"></div>
            </div>
        </div>
        <?php
    }
    ?>
</div>

<div class="container">
    <?php
    if ($anz_ep > 0) {
        ?>
        <h1>Epochen (<?php echo $anz_ep; ?> Treffer)</h1>
        <div id="startseite_button">
            <div class="containerKachelnKategorien">
                <div class="clear"></div>
                <?php
                KachelCreationEngine::epoche($suchbegriff);
                ?>
                <div class="clear"></div>
            </div>
        </div>
        <?php
    }
    }
    else {
        ?>
        <div class="container">
            <div class="jumbotron">
                <div class="clear"><!--damit die Kacheln nicht über das Jumbotron laufen--></div>
                <h1>Geben sie bitte einen Suchbegriff ein!</h1>
            </div>
        </div>
        <?php
    }

    if ($anz_pers + $anz_kat + $anz_ep == 0){
    ?>
    <div class="container">
        <h1> Zu diesem Suchbegriff gibt es leider <?php echo $anz_pers + $anz_kat + $anz_ep ?> Treffer!</h1>
    </div>
    <?php
    }
    ?>
</div>


<?php
require("footer.php");
?>
</body>
</html>
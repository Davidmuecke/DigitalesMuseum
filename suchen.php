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
    date_default_timezone_set('Europe/Berlin');
    $current_date = date('d/m/Y == H:i:s');

    $suchbegriff = $_GET["suchbegriff"];
    $anz_ep = KachelCreationEngine::epoche_anz($suchbegriff);
    $anz_pers =  KachelCreationEngine::persoenlichkeit_anz($suchbegriff);
    $anz_kat = KachelCreationEngine::kategorie_anz($suchbegriff);
    ?>

    <div class="jumbotron">
        <div class="clear"></div>
        <h1>Suche nach "<?php echo $suchbegriff; ?>" (<?php echo $anz_pers + $anz_kat + $anz_ep?> Treffer)</h1>
    </div>
</div>

<div class="container">
    <?php
        if($anz_pers > 0) {
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
        if($anz_kat > 0) {
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
        if($anz_ep > 0) {
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
    ?>
</div>



<?php
require("footer.php");
?>
</body>
</html>
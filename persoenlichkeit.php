<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Persönlichkeit</title>
    <link rel="stylesheet" href="css/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<?php
    require("header.php");
    //require("helpers/DBController.php");
    require("helpers/KachelCreationEngine.php");

?>

    <div class="container">
        <?php
            KachelCreationEngine::persoenlichkeit_title($_GET["id"]);
            KachelCreationEngine::persoenlichkeit_characteristic($_GET["id"]);
            KachelCreationEngine::persoenlichkeit_kurzbeschreibung($_GET["id"]);
            KachelCreationEngine::persoenlichkeit_zitat($_GET["id"]);
            KachelCreationEngine::persoenlichkeit_literaturangaben($_GET["id"]);
            KachelCreationEngine::persoenlichkeit_longText($_GET["id"]);
            KachelCreationEngine::persoenlichkeit_linkPersonen($_GET["id"]);
            KachelCreationEngine::persoenlichkeit_linkKatEpoch($_GET["id"]);
        ?>
    </div>


<?php
require("footer.php");
?>

</body>
</html>
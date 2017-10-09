<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Persönlichkeiten</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
</head>

<?php
require("header.php");
require("KachelCreationEngine.php");


$katid = -1;
$epid = -1;

if(isset($_GET['katid'])) {
    $katid = $_GET['katid'];
}

if(isset($_GET['epid'])) {
    $katid = $_GET['epid'];
}


?>

<body>
<div class="container">

    <div class="jumbotron">
        <div class="clear"></div>
        <?php
            if($katid != -1) {
                $dbcontroller = new DBController();
                $kategorie = $dbcontroller->getKategorieByID($katid);
                ?>
                <h1><?php echo $kategorie[0]["bezeichnung"]; ?></h1>
                <?php
            } else if($epid != -1) {

                //$dbcontroller = new DBController();
                //$kategorien = $dbcontroller->getEpcheByID($id);
                ?>
                <h1>Persönlichkeiten</h1>
                <?php
            } else {
                ?>
                <h1>Persönlichkeiten</h1>
                <?php
            }
        ?>
    </div>




</div>

<div id="startseite_button">
    <div class="container">
        <?php
        date_default_timezone_set('Europe/Berlin');
        $current_date = date('d/m/Y == H:i:s');
        ?>
    </div>

    <div class="containerKachelnPersoenlichkeit">
        <div class="clear"></div>
        <?php
        KachelCreationEngine::persoenlichkeit($katid, $epid);
        ?>
        <div class="clear"></div>
    </div>

</div>
<?php
require("footer.php");
?>
</body>
</html>
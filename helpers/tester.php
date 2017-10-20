<html>
<head>
    <title>Dynamische Mehrfach-Auswahl</title>
</head>
<body>
<form name="form1" method="post" action="<?php echo $PHP_SELF ?>">
    <p>
        <?php
        $themen = array("Autos","Filme","Essen","Sport");
        ?>
        <select name="thema[]" size="4" multiple>
            <?php
            foreach ($themen as $element) {
                echo "<option value=$element>$element</option>";
            }
            ?>
        </select>
    </p>
    <p>
        <input type="submit" name="Submit" value="Submit">
    </p>
</form>

<?php
if ($_POST['thema']) {
    echo "Es sind folgende Themen enthalten:<br>";
    foreach($_POST['thema'] as $element) {
        echo "$element<br>";
    }
}
?>
</body>
</html>
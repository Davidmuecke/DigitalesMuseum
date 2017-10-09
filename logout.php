<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Logout 4-Gewinnt</title>
    <link rel="stylesheet" href="css/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body onload="mail();">
<form>
    <?php
    session_start();
    session_destroy();
    echo "<div class='container'>
         <div class='alert alert-info'>
        <strong>Info!</strong> Du wurdest abgemeldet! 
                <a href='login.php'>Wieder anmelden?</a>
              </div>
      </div>";
    ?>

<?php
require("footer.php");
?>
</form>
</body>
</html>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Logout 4-Gewinnt</title>
    <link rel="stylesheet" href="../../../../../Users/illi/OneDrive%20-%20Hewlett%20Packard%20Enterprise/DHBW/3.%20Semester/Grundlagen_der_Datenbanken/Projekt_DB/GitHub_Projekt_Datenbanken/DigitalesMuseum/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../../../Users/illi/OneDrive%20-%20Hewlett%20Packard%20Enterprise/DHBW/3.%20Semester/Grundlagen_der_Datenbanken/Projekt_DB/GitHub_Projekt_Datenbanken/DigitalesMuseum/rahels_css.css">
</head>
<body onload="mail();">
<form>
<?php
session_start();
session_destroy();
echo "<div class='container'>
         <div class='alert alert-info'>
        <strong>Info!</strong> Du wurdest abgemeldet! 
                <a href='../../../../../Users/illi/OneDrive%20-%20Hewlett%20Packard%20Enterprise/DHBW/3.%20Semester/Grundlagen_der_Datenbanken/Projekt_DB/GitHub_Projekt_Datenbanken/DigitalesMuseum/bootstrap-3.3.7-dist/login_test2.php'>Wieder anmelden?</a>
              </div>
      </div>";
?>

<?php
require("kontaktzeile_unten.php");
?>
</form>
</body>
</html>

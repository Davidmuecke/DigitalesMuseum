<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Login Digitales Museum</title>
    <link rel="stylesheet" href="../../../../Users/illi/OneDrive%20-%20Hewlett%20Packard%20Enterprise/DHBW/3.%20Semester/Grundlagen_der_Datenbanken/Projekt_DB/GitHub_Projekt_Datenbanken/DigitalesMuseum/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../../Users/illi/OneDrive%20-%20Hewlett%20Packard%20Enterprise/DHBW/3.%20Semester/Grundlagen_der_Datenbanken/Projekt_DB/GitHub_Projekt_Datenbanken/DigitalesMuseum/rahels_css.css">
</head>

<body onload="mail();">
<div class="container">

    <div class="jumbotron">
        <h1>Digitales Museum</h1>
    </div>

    <!-- <?php
    if (isset($_REQUEST['error'])) {
        if ($_REQUEST['error'] == 'login') {
            echo "<div class='error'>Du hast deinen Benutzername oder dein Passwort falsch eingegeben</div>";
        }
    }
    ?> -->

    <div class="container">
        <div class="row vertical-offset-100">
            <div class="col-md-4 col-md-offset-4">
                <h1>Anmeldung</h1>

                <form accept-charset="UTF-8" role="form" action="lobby.php" method="post" enctype='multipart/form-data'>
                    <fieldset>
                    <div class="form-group">
                        <label>E-Mail oder Benutzername:</label>
                        <input type="text" placeholder="E-Mail oder Benutzername"
                               name="login" class="form-control"
                                required>
                    </div>

                    <div class="form-group">
                        <label>Passwort:</label>
                        <input type="password" placeholder="Password"
                               name="password" class="form-control"
                                required>
                    </div>

                    <button type="submit" class="btn">Login</button>

                    <div class="small">
                        <p>
                        <a href="registrierung.php">Neuen Account erstellen</a>
                        </p>
                    </div>
                    </fieldset>

                </form>
            </div>
        </div>
    </div>

</div>

<?php
require("done/kontaktzeile_unten.php");
?>

</body>
</html>
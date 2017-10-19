<!--
login_fehler.php
Anmeldeseite mit Formular auf die umgeleitet wird, wenn der Nutzer nicht (mehr) angemeldet ist
Die eigentliche Überprüfung der Anmeldedaten findet in header.php statt, welche in jeder geschützten Seite eingebunden ist
-->
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Login Digitales Museum</title>
    <link rel="stylesheet" href="css/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body onload="mail();">
<div class="container">

    <div class="jumbotron">
        <h1>Digitales Museum</h1>
    </div>

        <div class="alert alert-danger">
            <strong>Fehler!</strong> Dein Benutzername oder Passwort stimmt nicht!</a>
            Versuche es bitte erneut</a>!
        </div>

    <div class="container">
        <div class="row vertical-offset-100">
            <div class="col-md-4 col-md-offset-4">
                <h1>Anmeldung</h1>

                <form accept-charset="UTF-8" role="form" action="startseite.php" method="post" enctype='multipart/form-data'>
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

                        <button type="submit" id="login_btn" class="btn">Login</button>

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
require("footer.php");
?>

</body>
</html>
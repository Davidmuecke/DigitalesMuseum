<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Registrierung 4-Gewinnt</title>
    <link rel="stylesheet" href="css/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body onload="mail();">
<div class="container">

    <div class="jumbotron">
        <h1>Digitales Museum</h1>
    </div>

    <div>
        <div class="row vertical-offset-100">
            <div class="col-md-4 col-md-offset-4">

                <h1>Registrierung</h1>

                <form accept-charset="UTF-8" role="form" action="registrierung_erfolgreich.php" method="post" enctype='multipart/form-data'>

                    <div class="form-group">
                        <label>Vorname:</label>
                        <input type="text" placeholder="Vorname"
                               name="vorname" class="form-control"
                               required>
                    </div>

                    <div class="form-group">
                        <label>Nachname:</label>
                        <input type="text" placeholder="Nachname"
                               name="nachname" class="form-control"
                               required>
                    </div>

                    <div class="form-group">
                        <label for="mail">E-Mail:</label>
                        <input type="text" placeholder="E-Mailadresse"
                               name="mail" class="form-control"
                               pattern="[a-zA-Z0-9!#$%&'*+\/=?^_`{|}~.-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*"
                               required>
                    </div>

                    <div class="form-group">
                        <label>Benutzername:</label>
                        <input type="text" placeholder="Benutzername"
                               name="userName" class="form-control"
                               required>
                    </div>

                    <div class="form-group">
                        <label>Passwort:</label>
                        <input type="password" placeholder="Passwort"
                               name="password" class="form-control"
                               required>
                    </div>

                    <div class="form-group">
                        <label>Passwort wiederholen:</label>
                        <input type="password" placeholder="Passwort wiederholen"
                               name="passwordWdh" class="form-control"
                               required>
                    </div>


                    <!--<div class="form-group">
                        <label>Profilbild:</label>
                        <input type="file" name="bild_dateien">
                    </div> -->

                    <button type="submit" class="btn">Account anlegen</button>

                    <div class="small register">
                        <p>
                            Du hast bereits einen Account? <a href="login.php">Anmelden</a>
                        </p>
                    </div>

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
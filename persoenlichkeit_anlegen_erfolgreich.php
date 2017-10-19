<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Anlegen erfolgreich</title>
    <link rel="stylesheet" href="css/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<?php


/*if(isset($_REQUEST['vorname'])&& isset($_REQUEST['nachname'])&&isset($_REQUEST['mail']) && isset($_REQUEST['userName']) && isset($_REQUEST['password']) && isset($_REQUEST["passwordWdh"])){

    $vorname = mysqli_real_escape_string($my_db,htmlentities($_REQUEST['vorname']));
    $nachname = mysqli_real_escape_string($my_db,htmlentities($_REQUEST['nachname']));
    $mail = mysqli_real_escape_string($my_db,htmlentities($_REQUEST['mail']));
    $userName = mysqli_real_escape_string($my_db,htmlentities($_REQUEST['userName']));
    $challenge = password_hash($mail,PASSWORD_DEFAULT);

    //Abfrage, ob "p-kuenstername" schon verhanden:
    $query = mysqli_query($my_db,"SELECT * FROM benutzer WHERE userName='".$userName."'");
    $result = mysqli_num_rows($query);
    if ($result === 0) {
        //"userName" ist noch nicht vorhanden!
    }

    else{
        echo "<div class='container'>
                 <div class=\"alert alert-danger\">
                    <strong>Die Persönlichkiet ist schon vorhanden!</strong>
                     <a href=\"javascript:history.back()\">Zurück</a> zur Startseite...
                 </div>
              </div>";
        die();

       }*/

        echo "<div class='container'>
                            <div class=\"jumbotron\">
                                <h2>Vielen Dank für Ihre Eingabe! </h2>
                                <h2>Es wurde erfolgreich eine neue Persönlichkiet erstellt!</h2>
                            </div>
                         </div>";

        echo "<div class='container'>    
                      <div class=\"alert alert-success\"
                        <strong>Anlegen war erfolgreich!</strong> Du kannst die neue Perönlichkeit jetzt <a href='#'>anschauen</a>!
                      </div>
                  </div>";

//}

?>
</body>
</html>
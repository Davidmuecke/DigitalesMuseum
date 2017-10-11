<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Neue Persönlichkeit anlegen</title>
    <link rel="stylesheet" href="css/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body onload="mail();">
<div class="container">

    <div class="jumbotron">
        <h1>Digitales Museum</h1>
    </div>

    <?php
    require("header.php");
    ?>

    <div>
        <div class="row vertical-offset-100">
            <div class="col-md-4 col-md-offset-4">

                <h1>Neue Persönlichkeit</h1>

            </div>
        </div>

                <form accept-charset="UTF-8" role="form" action="persoenlichkeit_anlegen_erfolgreich.php.php" method="post" enctype='multipart/form-data'>

        <div class="row vertical-offset-100">
            <div class="col-md-0 col-md-offset-0">

                <div class="create create-one">
                    <!--Vorname-->
                    <div class="form-group">
                        <label>Vorname:</label>
                        <input type="text" placeholder="Vorname"
                               name="P_vorname" class="form-control"
                               required>
                    </div>

                    <!--Nachname-->
                    <div class="form-group">
                        <label>Nachname:</label>
                        <input type="text" placeholder="Nachname"
                               name="p_nachname" class="form-control"
                               required>
                    </div>

                    <!--Künstlername-->
                    <div class="form-group">
                        <label>Künstlername:</label>
                        <input type="text" placeholder="Künstlername"
                               name="p_kuenstlername" class="form-control"
                               required>
                    </div>
                </div>

                <div class="create create-two">
                    <!--Nationalität-->
                    <div class="form-group">
                        <label>Nationalität:</label>
                        <input type="text" placeholder="Nationalität"
                               name="p_nationalität" class="form-control"
                               required>
                    </div>

                    <!--Vater-->
                    <div class="form-group">
                        <label>Vater:</label>
                        <input type="text" placeholder="Vater"
                               name="p_vater" class="form-control"
                               required>
                    </div>

                    <!--Mutter-->
                    <div class="form-group">
                        <label>Mutter:</label>
                        <input type="text" placeholder="Mutter"
                               name="p_mutter" class="form-control"
                               required>
                    </div>
                </div>

                <div class="create create-three">
                    <!--Geburtsdatum-->
                    <div class="form-group">
                        <label>Geburtsdatum</label>
                        <input type="text" placeholder="dd/mm/yyyy"
                               name="p_geburtsdatum" class="form-control"
                               pattern="([0-3])+([0-9])+.+([0-1])+([0-9])+.+([0-9])+([0-9])+([0-9])+([0-9])"
                               required>
                    </div>

                    <!--Geburtsort-->
                    <div class="form-group">
                        <label>Geburtsort:</label>
                        <input type="text" placeholder="Geburtsort"
                               name="p_geburtsort" class="form-control"
                               required>
                    </div>

                    <!--Todestag-->
                    <div class="form-group">
                        <label>Todestag</label>
                        <input type="text" placeholder="dd/mm/yyyy"
                               name="p_todestag" class="form-control"
                               pattern="([0-3])+([0-9])+.+([0-1])+([0-9])+.+([0-9])+([0-9])+([0-9])+([0-9])"
                               required>
                    </div>
                </div>

                <div class="create create-four">
                    <!--Kurzbeschreibung-->
                    <div class="form-group">
                        <label>Kurzbeschreibung</label>
                        <textarea placeholder="Kurzbeschreibung"
                               name="p_kurzbeschreibung" class="form-control"
                                  required></textarea>
                    </div>

                    <!--Zitat-->
                    <div class="form-group">
                        <label>Zitat:</label><br>
                        <input type="radio" name="zitat" value="zitat_von" checked>
                        <label>Zitat von dieser Perönlichkeit</label><br>
                        <input type="radio" name="zitat" value="zitat_ueber">
                        <label>Zitat über diese Persönlichkeit</label><br>
                        <textarea placeholder="Zitat"
                                  name="p_zitat" class="form-control"
                                  required></textarea>
                    </div>
                </div>

                <div class="create create-five">
                    <!--Text-->
                    <div class="form-group">
                        <label>Text</label>
                        <textarea placeholder="Text"
                               name="p_text" class="form-control"
                                  required></textarea>
                    </div>

                    <div class="form-group">
                        <label>Autor:</label>
                        <input type="text" placeholder="Autor des Textes"
                               name="p_text_autor" class="form-control"
                               required>
                    </div>

                    <div class="form-group">
                        <label>Titel:</label>
                        <input type="text" placeholder="Titel des Textes"
                               name="p_text_titel" class="form-control"
                               required>
                    </div>
                </div>

                <div class="create create-six">
                    <!--Epoch-->
                    <div class="form-group">
                        <label>Epoche:</label>
                        <select id="epochen_auswahl">
                            <option value="" disabled selected>Bitte wählen</option>
                            <option value="Barock">Barock</option>
                            <option value="Romantik">Romantik</option>
                            <option value="Neuzeit">Neuzeit</option>
                            <option value="Antike">Antike</option>
                            <option value="neueEpoche">Neue Epoche</option>
                        </select>
                    </div>

                    <div id="ne_input" style="display:none;">
                        <input type="text" placeholder="Neue Epoche eingeben"
                               name="neue_epoche" class="form-control"
                               required>
                    </div>

                    <script  type="text/javascript">
                    <!--
                    var sel = document.getElementById('epochen_auswahl');
                    sel.onchange = function eins() {
                        if (document.getElementById('epochen_auswahl').value == "neueEpoche"){
                            var show = document.getElementById('ne_input');
                            show.style.display = "block";
                        }
                        else{
                            var show = document.getElementById('ne_input');
                            show.style.display = "none";
                        }
                    }
                    -->
                    </script>


                    <!--Kategorie-->
                    <div class="form-group">
                        <label>Kategorie:</label>
                        <select id="kategorie_auswahl">
                            <option value="" disabled selected>Bitte wählen</option>
                            <option value="Erziehung">Erziehung</option>
                            <option value="Vorschule">Vorschule</option>
                            <option value="Kinderbetreuung">Kinderbetreuung</option>
                            <option value="Früherziehung">Früherziehung</option>
                            <option value="neueKategorie">Neue Kategorie</option>
                        </select>
                    </div>

                    <div id="nk_input" style="display:none;">
                        <input type="text" placeholder="Neue Kategorie eingeben"
                               name="neue_kategorie" class="form-control"
                               required>
                    </div>

                    <script  type="text/javascript">
                        /*
                        var sel = document.getElementById('kategorie_auswahl');
                        sel.onchange = function eins() {
                            if (document.getElementById('kategorie_auswahl').value == "neueKategorie"){
                                var show = document.getElementById('nk_input');
                                show.style.display = "block";
                            }
                            else{
                                var show = document.getElementById('nk_input');
                                show.style.display = "none";
                            }
                        }
                        */
                    </script>
                </div>

                <div class="create create-seven">
                    <!--Quellen-->
                    <div class="form-group">
                        <label>Quellen:</label>
                        <input type="text" placeholder="Quellen"
                               name="p_quellen" class="form-control"
                               required>
                    </div>

                    <!--Literaturangaben-->
                    <div class="form-group">
                        <label>Litaraturangaben:</label>
                        <input type="text" placeholder="Litaraturangaben"
                               name="p_litaraturangaben" class="form-control"
                               required>
                    </div>
                </div>

                    <!--Bilder-->
                    <!--<div class="form-group">
                        <label>Bilder:</label>
                        <input type="file" name="bild_dateien">
                    </div> -->

                    <!--<div class="form-group">
                        <label>Profilbild:</label>
                        <input type="file" name="bild_profilbild">
                    </div> -->

                    <!--<div class="form-group">
                        <label>Titelbild:</label>
                        <input type="file" name="bild_titelbild">
                    </div> -->

            </div>
        </div>
                        <div id="p_button">
                            <button style="float:left" type="submit" class="btn">Persönlichkeit anlegen</button>
                            <button style="float:left" type="reset" class="btn">Einträge löschen</button>
                            <a style="float:left" id="btn_abbrechen" href="startseite.php" class="btn">Abbrechen</a>
                        </div>

                </form>
        </div>
    </div>

<?php
require("footer.php");
?>
</body>
</html>
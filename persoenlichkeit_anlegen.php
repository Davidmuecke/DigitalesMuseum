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
                        <!--Nachname-->
                        <div class="form-group">
                            <label class="p_h1">Name:</label>
                            <input type="text" placeholder="Nachname"
                                   name="p_nachname" class="form-control"
                                   required>
                        </div>

                        <!--Vorname-->
                        <div class="form-group">
                            <label class="p_h1">Vorname:</label>
                            <input type="text" placeholder="Vorname"
                                   name="P_vorname" class="form-control"
                                   required>
                        </div>

                        <!--Künstlername-->
                        <div class="form-group">
                            <label class="p_h1">Künstlername:</label>
                            <input type="text" placeholder="Künstlername"
                                   name="p_kuenstlername" class="form-control">
                        </div>
                    </div>

                    <div class="create create-two">
                        <!--Vater-->
                        <div class="form-group">
                            <label class="p_h1">Vater:</label>
                            <input type="text" placeholder="Vater"
                                   name="p_vater" class="form-control"
                                   required>
                        </div>

                        <!--Mutter-->
                        <div class="form-group">
                            <label class="p_h1">Mutter:</label>
                            <input type="text" placeholder="Mutter"
                                   name="p_mutter" class="form-control"
                                   required>
                        </div>

                        <!--Nationalität-->
                        <div class="form-group">
                            <label class="p_h1">Nationalität:</label>
                            <input type="text" placeholder="Nationalität"
                                   name="p_nationalität" class="form-control"
                                   required>
                        </div>
                    </div>

                    <div class="create create-three">
                        <!--Geburtsdatum-->
                        <div class="form-group">
                            <label class="p_h1">Geburtsdatum:</label>
                            <input type="text" placeholder="dd/mm/yyyy"
                                   name="p_geburtsdatum" class="form-control"
                                   pattern="([0-3])+([0-9])+.+([0-1])+([0-9])+.+([0-9])+([0-9])+([0-9])+([0-9])"
                                   required>
                        </div>

                        <!--Geburtsort-->
                        <div class="form-group">
                            <label class="p_h1">Geburtsort:</label>
                            <input type="text" placeholder="Geburtsort"
                                   name="p_geburtsort" class="form-control"
                                   required>
                        </div>

                        <!--Todesdatum-->
                        <div class="form-group">
                            <label class="p_h1">Todesdatum:</label>
                            <input type="text" placeholder="dd/mm/yyyy"
                                   name="p_todesdatum" class="form-control"
                                   pattern="([0-3])+([0-9])+.+([0-1])+([0-9])+.+([0-9])+([0-9])+([0-9])+([0-9])">
                        </div>
                    </div>

                    <!--Kurzbeschreibung-->
                    <div class="create create-four">
                        <label class="p_h1">Kurzbeschreibung</label>
                    </div>

                    <div class="create create-four">
                        <div class="form-group">
                            <label>Titel:</label>
                            <input type="text" placeholder="Titel der Kurzbeschreibung"
                                   name="p_kbeschreibung_titel" class="form-control"
                                   required>
                        </div>

                        <div class="form-group">
                            <label>Autor:</label>
                            <input type="text" placeholder="Autor der Kurzbeschreibung"
                                   name="p_kbeschreibung_autor" class="form-control"
                                   required>
                        </div>

                        <div class="form-group">
                            <label>Quelle:</label>
                            <input type="text" placeholder="Quelle der Kurzbeschreibung"
                                   name="p_kbeschreibung_quelle" class="form-control"
                                   required>
                        </div>

                    </div>

                    <div class="create-text">
                        <div class="form-group">
                            <textarea placeholder="Kurzbeschreibung"
                                      name="p_kurzbeschreibung" class="form-control"
                                      required></textarea>
                        </div>
                    </div>

                    <!--Text-->
                    <div class="create create-five">
                        <label class="p_h1">Text</label>
                    </div>

                    <div class="create create-five">
                        <div class="form-group">
                            <label>Titel:</label>
                            <input type="text" placeholder="Titel des Textes"
                                   name="p_text_titel" class="form-control"
                                   required>
                        </div>

                        <div class="form-group">
                            <label>Autor:</label>
                            <input type="text" placeholder="Autor des Textes"
                                   name="p_text_autor" class="form-control"
                                   required>
                        </div>

                        <div class="form-group">
                            <label>Quelle:</label>
                            <input type="text" placeholder="Quelle des Textes"
                                   name="p_text_quellen" class="form-control"
                                   required>
                        </div>
                    </div>

                    <div class="create">
                        <div class="form-group">
                        <textarea placeholder="Text"
                                  name="p_text" class="form-control"
                                  required></textarea>
                        </div>
                    <div/>

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
                            <!--
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
                            -->
                        </script>
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

            </div>
        </form>
    </div>
<?php
require("footer.php");
?>
</body>
</html>
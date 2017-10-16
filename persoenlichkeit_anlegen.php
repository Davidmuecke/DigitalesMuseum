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
        <h1>Neue Persönlichkeit</h1>
    </div>

    <?php
    require("header.php");
    ?>

    <div>

        <form accept-charset="UTF-8" role="form" action="persoenlichkeit_anlegen_erfolgreich.php.php" method="post" enctype='multipart/form-data'>

            <div class="row vertical-offset-100">
                <div class="col-md-0 col-md-offset-0">

                    <!--1.Reihe-->
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

                    <!--2.Reihe-->
                    <div class="create create-two">
                        <!--Vater-->
                        <div class="form-group">
                            <label class="p_h1">Vater:</label>
                            <input type="text" placeholder="Vater"
                                   name="p_vater" class="form-control">
                        </div>

                        <!--Mutter-->
                        <div class="form-group">
                            <label class="p_h1">Mutter:</label>
                            <input type="text" placeholder="Mutter"
                                   name="p_mutter" class="form-control">
                        </div>

                        <!--Nationalität-->
                        <div class="form-group">
                            <label class="p_h1">Nationalität:</label>
                            <input type="text" placeholder="Nationalität"
                                   name="p_nationalität" class="form-control">
                        </div>
                    </div>

                    <!--3.Reihe-->
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
                                   name="p_geburtsort" class="form-control">
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
                    <div>
                        <div class="create create-four">
                            <label class="p_h1">Kurzbeschreibung</label>
                        </div>

                        <div class="create create-four">
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
                    </div>

                    <!--Text-->
                    <div>
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

                        <div class="create-text">
                            <div class="form-group">
                            <textarea placeholder="Text"
                                      name="p_text" class="form-control"
                                      required></textarea>
                            </div>
                        </div>
                    </div>

                    <!--Zitat-->
                    <div>
                        <div class="create create-six">
                            <label class="p_h1">Zitat:</label><br>
                        </div>

                        <div class="create create-five">
                            <div class="form-group">
                                <label>Anlass:</label>
                                <input type="text" placeholder="Anlass des Zitats"
                                       name="p_zitat_anlass" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Datum:</label>
                                <input type="text" placeholder="Datum des Zitats: dd/mm/yyyy"
                                       name="p_zitat_datum" class="form-control"
                                       pattern="([0-3])+([0-9])+.+([0-1])+([0-9])+.+([0-9])+([0-9])+([0-9])+([0-9])">
                            </div>

                            <div id="urheber_input" class="form-group">
                                <label>Urheber:</label>
                                <input type="text" placeholder="Urheber des Zitats"
                                       name="p_zitat_urheber" class="form-control"
                                       required>
                            </div>
                        </div>

                        <!--<div class="create-zitat">
                            <divclass="form-group">
                                <label>Zitat von dieser Perönlichkeit:</label>
                                <input type="radio" name="zitat" value="zitat_von" checked><br>
                                <label>Zitat über diese Persönlichkeit:</label>
                                <input type="radio" name="zitat" value="zitat_ueber">
                            </div>


                        </div>

                        <script  type="text/javascript"> -->
                            <!--
                            function radioWert(rObj) {
                                for (var i=0; i<rObj.length; i++) if (rObj[i].checked) return rObj[i].value;
                                return false;
                            }

                            var sel1 = document.getElementsByName('zitat');
                            sel1.onchange = function() {
                                if (radioWert(document.getElementsByName('zitat')) == "zitat_ueber"){
                                    var show = document.getElementById('urheber_input');
                                    show.style.display = "block";
                                }
                                else{
                                    var show = document.getElementById('urheber_input');
                                    show.style.display = "none";
                                }
                            }
                            -->
                        <!--</script> -->

                        <div class="create-text">
                            <div class="form-group">
                                <textarea placeholder="Zitat"
                                          name="p_zitat" class="form-control"
                                          required></textarea>
                            </div>
                        </div>
                    </div>

                    <!--Epoche-->
                    <div>
                        <div id="ueber_epoche">
                            <div class="create create-seven">
                                <div class="form-group">
                                    <label class="p_h1">Epoche:</label>
                                </div>
                            </div>
                            <div id="epoche">
                                <div class="create creat-seven">
                                    <select id="epochen_auswahl">
                                        <option value="" disabled selected>Bitte wählen</option>
                                        <option value="Barock">Barock</option>
                                        <option value="Romantik">Romantik</option>
                                        <option value="Neuzeit">Neuzeit</option>
                                        <option value="Antike">Antike</option>
                                        <option value="neueEpoche">Neue Epoche</option>
                                    </select>

                                    <div id="ne_input">
                                        <input type="text" placeholder="Neue Epoche eingeben"
                                               name="neue_epoche" class="form-control"
                                               required>
                                    </div>
                                </div>

                                <script  type="text/javascript">
                            <!--
                                var sel = document.getElementById('epochen_auswahl');
                                sel.onchange = function zwei() {
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
                            </div>
                        </div>

                        <div id="add_button_epoche">
                            <a onclick="addElement('epoche','ueber_epoche')" class="btn_add"><span class="glyphicon glyphicon-plus"></span></a>
                        </div>



                        <div id="add_button_person">
                            <a onclick="addElement('epoche','ueber_epoche')" class="btn_add"><span class="glyphicon glyphicon-plus"></span></a>
                        </div>

                    </div>
                    <!--Kategorie-->
                    <div>
                        <div id="ueber_kategorie">
                            <div class="create create-eight">
                                <div class="form-group">
                                    <label class="p_h1">Kategorie:</label>
                                </div>
                            </div>
                            <div id="kategorie">
                                <div class="create create-eight">
                                    <select id="kategorie_auswahl">
                                        <option value="" disabled selected>Bitte wählen</option>
                                        <option value="Erziehung">Erziehung</option>
                                        <option value="Vorschule">Vorschule</option>
                                        <option value="Kinderbetreuung">Kinderbetreuung</option>
                                        <option value="Früherziehung">Früherziehung</option>
                                        <option value="neueKategorie">Neue Kategorie</option>
                                    </select>

                                    <div id="nk_input">
                                        <input type="text" placeholder="Neue Kategorie eingeben"
                                               name="neue_kategorie" class="form-control"
                                               required>
                                    </div>
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
                        </div>

                        <div id="add_button_kategorie">
                            <a onclick="addElement('kategorie','ueber_kategorie')" class="btn_add"><span class="glyphicon glyphicon-plus"></span></a>
                        </div>
                    </div>

                    <!--Literaturangabe-->
                    <div>
                        <div id="ueber_literatur">
                            <div class="create create-nine">
                                <div class="form-group">
                                    <label class="p_h1">Literaturangabe:</label>
                                </div>
                            </div>
                            <div id="literatur">
                                <div class="create create-nine">
                                    <div class="form-group">
                                        <label>Titel:</label>
                                        <input type="text" placeholder="Titel der Literaturangabe"
                                               name="p_literatur_titel" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Autor:</label>
                                        <input type="text" placeholder="Autor der Literaturangabe"
                                               name="p_literatur_autor" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Jahr:</label>
                                        <input type="text" placeholder="Jahr der Literaturangabe"
                                               name="p_literatur_quellen" class="form-control">
                                    </div>
                                </div>

                                <div class="create create-nine">
                                    <div class="form-group">
                                        <label>Herausgeber:</label>
                                        <input type="text" placeholder="Name des Herausgebers"
                                               name="p_literatur_herausgeber" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label id="p_literatur_ort">Ort/ Firmensitz des Herausgebers:</label>
                                        <input type="text" placeholder="Ort/Firmensitz des Herausgebers"
                                               name="p_literatur_ort" class="form-control">
                                    </div>
                                </div>

                                <div class="create-einzeilig">
                        <div class="form-group">
                            <input type="text" placeholder="Literaturangabe"
                                   name="p_literaturangabe" class="form-control">
                        </div>
                    </div>
                            </div>
                        </div>

                        <div id="add_button_literatur">
                            <a onclick="addElement('literatur','ueber_literatur')" class="btn_add"><span class="glyphicon glyphicon-plus"></span></a>
                        </div>
                    </div>

                    <!--Bilder-->
                    <div>
                        <div class="create create-ten">
                            <label class="p_h1">Bilder:</label>
                        </div>

                        <div id="ueber_bilder" class="create-einzeilig create-ten">
                            <div class="form-group">
                                <label>Profilbild:</label>
                                <input type="file" name="bild_profilbild">
                            </div>

                            <div class="form-group">
                                <label>Titelbild:</label>
                                <input type="file" name="bild_titelbild">
                            </div>
                            <div id="bilder">
                                <div class="form-group" id="bilder">
                                    <label>Weitere Bilder:</label>
                                    <input type="file" name="bild_dateien">
                                </div>
                            </div>
                        </div>
                    </div>

                        <div id="add_button_bilder">
                            <a onclick="addElement('bilder','ueber_bilder')" class="btn_add"><span class="glyphicon glyphicon-plus"></span></a>
                        </div>
                    </div>

                </div>
            </div>

            <!--Function für ADD-Button--->
            <script  type="text/javascript">
                <!--
                function addElement (id, ueber_id) {
                    var newDiv = document.createElement("div");
                    newDiv.innerHTML = document.getElementById(id).innerHTML;
                    document.getElementById(ueber_id).appendChild(newDiv);
                }
                -->
            </script>

            <!--Button--->
            <div id="p_button">
                <button id="btn_anlegen" type="submit" class="btn">Persönlichkeit anlegen</button>
                <button id="btn_loeschen" type="reset" class="btn">Einträge löschen</button>
                <a id="btn_abbrechen" href="startseite.php" class="btn">Abbrechen</a>
            </div>

        </form>
    </div>
<?php
require("footer.php");
?>
</body>
</html>
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

        $counter = array("anzEpoche", "anzKategorie", "anzPerson", "anzLiteratur");
        $counter2 = array("epoche", "kategorie", "person", "literatur");
        $felder = array("nachname", "vorname", "kuenstlername", "vater", "mutter", "nationalitaet", "geburtsdatum", "geburtsort", "todesdatum", "kurzbeschreibung_quelle", "kurzbeschreibung_text",
        "text_titel", "text_autor","text_quelle", "text_text", "zitat_anlass", "zitat_datum", "zitat_urheber", "zitat_text", "epoche_0", "kategorie_0", "person_0", "literatur_0");

    foreach ($counter as $feld) {
        if(!isset($_SESSION[$feld]) || empty($_POST)) {
            $_SESSION[$feld]=1;
        }
    }

    $zaehler = 0;
    foreach ($counter as $feld) {
        if(isset($_SESSION[$feld])) {
            for($i = 1; $i <= $_SESSION[$feld]; $i++) {
                $values[$counter2[$zaehler]."_".$i]="";
            }
        }
        $zaehler++;
    }


        foreach ($counter as $feld) {
            if(isset($_GET[$feld])) {
                $_SESSION[$feld] = $_GET[$feld];
            }
        }







        foreach ($felder as $feld) {
            $values[$feld] = "";
        }
        foreach ($values as $feld => $wert) {
            if(isset($_POST[$feld])) {
                $values[$feld] = $_POST[$feld];
            } else { $values[$feld] =""; }
        }

    ?>

    <div>

        <form accept-charset="UTF-8" role="form" action="persoenlichkeit_editor.php" method="post" enctype='multipart/form-data'>

            <div class="row vertical-offset-100">
                <div class="col-md-0 col-md-offset-0">

                    <!--1.Reihe-->
                    <div class="create create-one">
                        <!--Nachname-->
                        <div class="form-group">
                            <label class="p_h1">Name:</label>
                            <input type="text"  value="<?php echo $values["nachname"] ?>" placeholder="Nachname"
                                   name="nachname" class="form-control"
                                   >
                        </div>

                        <!--Vorname-->
                        <div class="form-group">
                            <label class="p_h1">Vorname:</label>
                            <input type="text" value="<?php echo $values["vorname"] ?>" placeholder="Vorname"
                                   name="vorname" class="form-control"
                                   >
                        </div>

                        <!--Künstlername-->
                        <div class="form-group">
                            <label class="p_h1">Künstlername:</label>
                            <input type="text" value="<?php echo $values["kuenstlername"] ?>" placeholder="Künstlername"
                                   name="kuenstlername" class="form-control">
                        </div>
                    </div>

                    <!--2.Reihe-->
                    <div class="create create-two">
                        <!--Vater-->
                        <div class="form-group">
                            <label class="p_h1">Vater:</label>
                            <input type="text" value="<?php echo $values["vater"] ?>" placeholder="Vater" name="vater" class="form-control">
                        </div>

                        <!--Mutter-->
                        <div class="form-group">
                            <label class="p_h1">Mutter:</label>
                            <input type="text" placeholder="Mutter" value="<?php echo $values["mutter"] ?>"  name="mutter" class="form-control">
                        </div>

                        <!--Nationalität-->
                        <div class="form-group">
                            <label class="p_h1">Nationalität:</label>
                            <input type="text" value="<?php echo $values["nationalitaet"] ?>" placeholder="Nationalität" name="nationalitaet" class="form-control">
                        </div>
                    </div>

                    <!--3.Reihe-->
                    <div class="create create-three">
                        <!--Geburtsdatum-->
                        <div class="form-group">
                            <label class="p_h1">Geburtsdatum:</label>
                            <input type="text" value="<?php echo $values["geburtsdatum"] ?>" placeholder="dd/mm/yyyy" name="geburtsdatum" class="form-control"
                                   pattern="([0-3])+([0-9])+.+([0-1])+([0-9])+.+([0-9])+([0-9])+([0-9])+([0-9])">
                        </div>

                        <!--Geburtsort-->
                        <div class="form-group">
                            <label class="p_h1">Geburtsort:</label>
                            <input type="text" value="<?php echo $values["geburtsort"] ?>" placeholder="Geburtsort" name="geburtsort" class="form-control">
                        </div>

                        <!--Todesdatum-->
                        <div class="form-group">
                            <label class="p_h1">Todesdatum:</label>
                            <input type="text" value="<?php echo $values["todesdatum"] ?>" placeholder="dd/mm/yyyy" name="todesdatum" class="form-control"
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
                                <input type="text" value="<?php echo $values["kurzbeschreibung_quelle"] ?>" placeholder="Quelle der Kurzbeschreibung"
                                       name="kurzbeschreibung_quelle" class="form-control">
                            </div>
                        </div>

                        <div class="create-text">
                        <div class="form-group">
                            <textarea value="<?php echo $values["kurzbeschreibung_text"] ?>" placeholder="Kurzbeschreibung"
                                      name="kurzbeschreibung_text" class="form-control">
                            </textarea>
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
                                <input type="text" value="<?php echo $values["text_titel"] ?> "placeholder="Titel des Textes"
                                       name="text_titel" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Autor:</label>
                                <input type="text" value="<?php echo $values["text_autor"] ?>" placeholder="Autor des Textes"
                                       name="text_autor" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Quelle:</label>
                                <input type="text" value="<?php echo $values["text_quelle"] ?>" placeholder="Quelle des Textes"
                                       name="text_quelle" class="form-control"
                                       >
                            </div>
                        </div>

                        <div class="create-text">
                            <div class="form-group">
                            <textarea content="<?php echo $values["text_text"] ?>"placeholder="Text"
                                      name="text_text" class="form-control">
                            </textarea>
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
                                <input type="text" value="<?php echo $values["zitat_anlass"] ?>"placeholder="Anlass des Zitats"
                                       name="zitat_anlass" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Datum:</label>
                                <input type="text" value="<?php echo $values["zitat_datum"] ?>"placeholder="Datum des Zitats: dd/mm/yyyy"
                                       name="zitat_datum" class="form-control"
                                       pattern="([0-3])+([0-9])+.+([0-1])+([0-9])+.+([0-9])+([0-9])+([0-9])+([0-9])">
                            </div>

                            <div id="urheber_input" class="form-group">
                                <label>Urheber:</label>
                                <input type="text" value="<?php echo $values["zitat_urheber"] ?>"placeholder="Urheber des Zitats"
                                       name="zitat_urheber" class="form-control"
                                       >
                            </div>
                        </div>

                        <div class="create-text">
                            <div class="form-group">
                                <textarea text="<?php echo $values["zitat_text"] ?>" placeholder="Zitat"
                                          name="zitat" class="form-control">
                                </textarea>
                            </div>
                        </div>
                    </div>

                    <!--Epoche-->
                          <div>
                                <div id="ueber_epoche">
                                    <div class="create create-seven">
                                        <div class="form-group">
                                            <label class="p_h1">Epochen:</label>
                                        </div>
                                    </div>
                                    <?php
                                        for($i = 0; $i < $_SESSION["anzEpoche"]; $i++) {
                                    ?>
                                    <div id="epoche">
                                        <div class="create creat-seven">
                                            <input type="text" value="<?php echo $values["epoche_".$i] ?>" placeholder="Epoche auswählen"
                                                   id="epochen_auswahl" class="form-control" name="epoche_<?php echo $i ?>" list="epochen">
                                            <datalist id="epochen">
                                                <option value="Barock" />
                                                <option value="Romantik" />
                                                <option value="Neuzeit" />
                                                <option value="Antike" />
                                            </datalist>
                                            </input>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    ?>
                    <input id="add_button_epoche" class="btn_add" type="submit" value="weitere Epoche" formaction="persoenlichkeit_editor.php?anzEpoche=<?php echo $_SESSION["anzEpoche"]+1;?>#epochen" formmethod="post">

                    <!--Kategorie-->
                    <div>
                        <div id="ueber_epoche">
                            <div class="create create-seven">
                                <div class="form-group">
                                    <label class="p_h1">Kategorien:</label>
                                </div>
                            </div>
                            <?php
                            for($i = 0; $i < $_SESSION['anzKategorie']; $i++) {
                            ?>
                            <div id="epoche">
                                <div class="create creat-seven">
                                    <input type="text" id="kategorien_auswahl" class="form-control" name="kategorie_<?php echo $i ?>" list="kategorien">
                                    <datalist id="kategorien">
                                        <option value="Eltern" />
                                        <option value="Ausbildung" />
                                        <option value="Grundschule" />
                                        <option value="Kindererziehung" />
                                    </datalist>
                                    </input>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                        <input id="add_button_kategorie" class="btn_add" type="submit" value="weitere Kategorien" formaction="persoenlichkeit_editor.php?anzKategorie=<?php echo $_SESSION["anzKategorie"]+1;?>" formmethod="post">
                    </div>
                    <!--Literaturangabe-->
                    <div>
                        <div id="ueber_literatur">
                            <div class="create create-nine">
                                <div class="form-group">
                                    <label class="p_h1">Literaturangaben:</label>
                                </div>
                            </div>
                            <?php
                            for($i = 0; $i < $_SESSION['anzLiteratur']; $i++) {
                            ?>
                            <div id="literatur">
                                <div class="create create-nine">
                                    <div class="form-group">
                                        <label>Titel:</label>
                                        <input type="text" placeholder="Titel der Literaturangabe" name="p_literatur_titel" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Autor:</label>
                                        <input type="text" placeholder="Autor der Literaturangabe" name="p_literatur_autor" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Jahr:</label>
                                        <input type="text" placeholder="Jahr der Literaturangabe" name="p_literatur_quellen" class="form-control">
                                    </div>
                                </div>
                                <div class="create create-nine">
                                    <div class="form-group">
                                        <label>Herausgeber:</label>
                                        <input type="text" placeholder="Name des Herausgebers" name="p_literatur_herausgeber" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label id="p_literatur_ort">Ort/ Firmensitz des Herausgebers:</label>
                                        <input type="text" placeholder="Ort/Firmensitz des Herausgebers" name="p_literatur_ort" class="form-control">
                                    </div>
                                </div>
                                <div class="create-einzeilig">
                                    <div class="form-group">
                                        <input type="text" placeholder="Literaturangabe" name="p_literaturangabe" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                        <input id="add_button_kategorie" class="btn_add" type="submit" value="weitere Literaturangaben" formaction="persoenlichkeit_editor.php?anzLiteratur=<?php echo $_SESSION["anzLiteratur"]+1;?>" formmethod="post">
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
                        </div>
                    </div>
                    </div>

                </div>
            </div>



            <!--Button--->
            <div id="p_button">
                <button id="btn_anlegen" type="submit" class="btn">Persönlichkeit anlegen</button>

                <input id="btn_anlegen" class="btn" value="anlegen" type="submit" formaction="persoenlichkeit_datenbank.php" formmethod="post">


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
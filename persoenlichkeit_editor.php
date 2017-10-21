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



    <?php
        require("header.php");

    //initiale erstellung der Felder + leer-Befüllung
    $counter = array("anzEpoche", "anzKategorie", "anzPerson", "anzLiteratur");
    $counter2 = array("epoche", "kategorie", "person", "literatur_titel", "literatur_autor", "literatur_datum", "literatur_verlag", "literatur_ort");
    $felder = array("nachname", "vorname", "kuenstlername", "vater", "mutter", "nationalitaet", "geburtsdatum", "geburtsort", "todesdatum", "kurzbeschreibung_quelle", "kurzbeschreibung_text",
        "text_titel", "text_autor", "text_quelle", "text_text", "zitat_anlass", "zitat_datum", "zitat_urheber", "zitat_text", "epoche_0", "kategorie_0", "person_0", "literatur_titel_0",
        "literatur_autor_0", "literatur_datum_0", "literatur_verlag_0", "literatur_ort_0", "profilbild", "titelbild");

    foreach ($felder as $feld) {
        $values[$feld] = "";
    }

    foreach ($counter as $feld) {
        if (!isset($_SESSION[$feld]) || !isset($_POST["id"])) {
            $_SESSION[$feld] = 0;
        }
    }

    //Ändert Session-Variablen
    foreach ($counter as $feld) {
        if (isset($_GET[$feld])) {
            $_SESSION[$feld] = $_GET[$feld];
        }
    }





    //Befüllung der Werte für die dynamischen Felder
    $zaehler = 0;
    foreach ($counter as $feld) {
        if (isset($_SESSION[$feld])) {
            for ($i = 1; $i <= $_SESSION[$feld]; $i++) {
                $values[$counter2[$zaehler] . "_" . $i] = "";
            }
        }
        $zaehler++;
    }
    //Befüllung der restlichen Literatur angabe Werten
    for ($i = 0; $i < sizeof($counter2) - 4; $i++) {
        if (isset($_SESSION["anzLiteratur"])) {
            for ($j = 1; $j <= $_SESSION["anzLiteratur"]; $j++) {
                $values[$counter2[$i + 4] . "_" . $j] = "";
            }
        }
    }

    foreach ($values as $feld => $wert) {
        if (isset($_POST[$feld])) {
            $values[$feld] = $_POST[$feld];
        } else {
            $values[$feld] = "";
        }
    }


    //Formular befüllen, wenn Daten bearbeitet werden sollen
    $ID = 0;
    $ueberschrift="Neue Persönlichkeit";
    $changeSESSIONvarsFlag = false;
    if(isset($_GET["id"])) {
            $ID = $_GET["id"];
            $changeSESSIONvarsFlag = true;
    } else if (isset($_POST["id"])) {
        $ID = $_POST["id"];
        $changeSESSIONvarsFlag = false;
    }

    if($ID != 0) {
        $dbcontroller = new DBController();

        //Standartwerte
        $person = $dbcontroller->getPersoenlichkeitByID($ID);
        $values["nachname"] = $person["name"];
        $values["vorname"] = $person["vorname"];
        $values["geburtsdatum"] = $person["geburtsdatum"];
        $values["todesdatum"] = $person["todesdatum"];
        $values["geburtsort"] = $person["geburtsort"];
        $values["nationalitaet"] = $person["nationalitaet"];
        $values["vater"] = $person["vater"];
        $values["mutter"] = $person["mutter"];
        $values["kuenstlername"] = $person["kuenstlername"];
        $values["text_titel"] = $person["textTitel"];
        $values["text_autor"] = $person["TextAutor"];
        $values["text_quelle"] = $person["textQuelle"];
        $values["text_text"] = $person["textInhalt"];
        $values["zitat_anlass"] = $person["zitatAnlass"];
        $values["zitat_datum"] = $person["zitatDatum"];
        $values["zitat_urheber"] = $person["zitatUrheber"];
        $values["zitat_text"] = $person["zitatInhalt"];
        $values["kurzbeschreibung_quelle"] = $person["beschreibungQuelle"];
        $values["kurzbeschreibung_text"] = $person["beschreibungInhalt"];
        $values["profilbild"] = $person["profilbild"];
        $values["titelbild"] = $person["titelbild"];

        //Beziehungen (mehrfach-Werte möglich

        //Kategorien
        $kategorien = $dbcontroller->getKategorienByPersoenlichkeit($ID);
        $anzKat = count($kategorien);
        if($changeSESSIONvarsFlag) {
            $_SESSION["anzKategorie"] = $anzKat - 1;
        }

        for ($i = 0; $i < $anzKat; $i++) {
            $values["kategorie_".$i] = $kategorien[$i]["bezeichnung"];
        }

        //Epochen
        $epochen = $dbcontroller->getEpochenByPersoenlichekeit($ID);
        $anzEpochen = count($epochen);
        if($changeSESSIONvarsFlag) {
            $_SESSION["anzEpoche"]=$anzEpochen-1;
        }

        for ($i = 0; $i < $anzEpochen; $i++) {
            $values["epoche_".$i] = $epochen[$i]["bezeichnung"];
        }

        //Literaturangaben
        $literaturen = $dbcontroller->getLiteraturangabenByPersoenlichkeit($ID);
        $anzLiteratur = count($literaturen);
        if($changeSESSIONvarsFlag) {
            $_SESSION["anzLiteratur"] = $anzLiteratur-1;
        }


        for($i = 0; $i < $anzLiteratur; $i++) {
            $values["literatur_autor_".$i] = $literaturen[$i]["autor"];
            $values["literatur_titel_".$i] = $literaturen[$i]["titel"];
            $values["literatur_datum_".$i] = $literaturen[$i]["datum"];
            $values["literatur_verlag_".$i] = $literaturen[$i]["herausgeberName"];
            $values["literatur_ort_".$i] = $literaturen[$i]["herausgeberOrt"];
        }


        //Freunde
        $freunde = $dbcontroller->getPersoenlichkeitenOfAPersoenlichkeit($ID);
        $anzFreunde = count($freunde);
        if($changeSESSIONvarsFlag) {
            $_SESSION["anzPerson"] = $anzFreunde-1;
        }

        for ($i = 0; $i < $anzFreunde; $i++) {
            $values["person_".$i] = $freunde[$i]['persoenlichkeitID'];
        }

        $ueberschrift = $values["vorname"]. " " . $values["nachname"];

    }
    ?>
    <div class="jumbotron">
        <h1><?php echo $ueberschrift;?></h1>
    </div>

    <div>

        <form accept-charset="UTF-8" role="form" action="persoenlichkeit_editor.php" method="post" enctype='multipart/form-data'>
            <!--versteckte Werte die auch uebergeben werden sollen -->
            <input type="hidden" name="profilbild" value="<?php echo $values["profilbild"] ?>">
            <input type="hidden" name="titelbild" value="<?php echo $values["titelbild"] ?>">
            <input type="hidden" name="id" value="<?php echo $ID ?>">

            <div class="row vertical-offset-100">
                <div class="col-md-0 col-md-offset-0">

                    <!--1.Reihe-->
                    <div class="create">
                        <!--Nachname-->
                        <div class="form-group">
                            <label class="p_h1">Name:</label>
                            <input type="text"  value="<?php echo $values["nachname"] ?>" placeholder="Nachname"
                                   name="nachname" class="form-control">
                        </div>

                        <!--Vorname-->
                        <div class="form-group">
                            <label class="p_h1">Vorname:</label>
                            <input type="text" value="<?php echo $values["vorname"] ?>" placeholder="Vorname"
                                   name="vorname" class="form-control">
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
                            <input type="text" value="<?php echo $values["geburtsdatum"] ?>" placeholder="yyyy-mm-dd" name="geburtsdatum" class="form-control"
                                   pattern="([0-9])+([0-9])+([0-9])+([0-9])+(-)+[0-1])+([0-9])+(-)+([0-3])+([0-9])">
                        </div>

                        <!--Geburtsort-->
                        <div class="form-group">
                            <label class="p_h1">Geburtsort:</label>
                            <input type="text" value="<?php echo $values["geburtsort"] ?>" placeholder="Geburtsort" name="geburtsort" class="form-control">
                        </div>

                        <!--Todesdatum-->
                        <div class="form-group">
                            <label class="p_h1">Todesdatum:</label>
                            <input type="text" value="<?php echo $values["todesdatum"] ?>" placeholder="yyyy-mm-dd" name="todesdatum" class="form-control"
                                   pattern="([0-9])+([0-9])+([0-9])+([0-9])+(-)+[0-1])+([0-9])+(-)+([0-3])+([0-9])">
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
                            <textarea name="kurzbeschreibung_text" placeholder="Kurzbeschreibung"class="form-control"><?php echo $values["kurzbeschreibung_text"] ?></textarea>
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
                                       name="text_quelle" class="form-control">
                            </div>
                        </div>

                        <div class="create-text">
                            <div class="form-group">
                                <textarea name="text_text" placeholder="Text"class="form-control"><?php echo $values["text_text"] ?></textarea>
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
                                <input type="text" value="<?php echo $values["zitat_datum"] ?>"placeholder="Datum des Zitats: yyyy-mm-dd""
                                       name="zitat_datum" class="form-control"
                                       pattern="([0-9])+([0-9])+([0-9])+([0-9])+(-)+[0-1])+([0-9])+(-)+([0-3])+([0-9])">
                            </div>

                            <div id="urheber_input" class="form-group">
                                <label>Urheber:</label>
                                <input type="text" value="<?php echo $values["zitat_urheber"] ?>"placeholder="Urheber des Zitats"
                                       name="zitat_urheber" class="form-control">
                            </div>
                        </div>

                        <a id="ep_jump"></a>

                        <div class="create-text">
                            <div class="form-group">
                                <textarea name="zitat_text" placeholder="Zitat"class="form-control"><?php echo $values["zitat_text"] ?></textarea>
                            </div>
                        </div>
                    </div>

                    <!--Epoche-->
                          <div>
                                <div id="ueber_epoche">
                                    <div class="create">
                                        <div class="form-group">
                                            <label class="p_h1">Epochen:</label>
                                        </div>
                                    </div>
                                    <?php
                                        $dbcontroller = new DBController();
                                        $epochen = $dbcontroller->getEpochen();
                                        $anzEpochen = count($epochen);
                                        for($i = 0; $i <= $_SESSION["anzEpoche"]; $i++) {
                                    ?>
                                    <div id="epoche">
                                        <div class="create create-einzeilig">
                                            <input type="text" value="<?php echo $values["epoche_".$i] ?>" placeholder="Epoche auswählen"
                                                   id="epochen_auswahl" class="form-control" name="epoche_<?php echo $i ?>" list="epochen">
                                            <datalist id="epochen">
                                                <?php
                                                for($j = 0; $j < $anzEpochen; $j++) {
                                                    echo "<option value=\"".$epochen[$j]['bezeichnung']."\"/>";
                                                }
                                                ?>
                                            </datalist>
                                            </input>
                                        </div>
                                    </div>
                                    <?php
                                        }
                                    ?>
                                </div>
                          </div>
                        <a id="kat_jump"></a>
                    <input id="add_button_epoche" class="btn_add" type="submit" value="weitere Epoche" formaction="persoenlichkeit_editor.php?anzEpoche=<?php echo $_SESSION["anzEpoche"]+1;?>#ep_jump" formmethod="post">

                    <!--Kategorie-->

                    <div>
                        <a id="kat_jump"></a>
                        <div id="ueber_kategorie">
                            <div class="create">
                                <div class="form-group">
                                    <label class="p_h1"">Kategorien:</label>
                                </div>
                            </div>
                            <?php
                            $dbcontroller = new DBController();
                            $kategorien = $dbcontroller->getKategorien();
                            $anzKategorien = count($kategorien);
                            for($i = 0; $i <= $_SESSION['anzKategorie']; $i++) {
                            ?>
                            <div id="kategorie">
                                <div class="create create-einzeilig">
                                    <input type="text" value="<?php echo $values["kategorie_".$i] ?>" placeholder="Kategorie auswählen"
                                           id="kategorien_auswahl_<?php echo $i ?>" class="form-control" name="kategorie_<?php echo $i ?>" list="kategorien">
                                    <datalist id="kategorien">
                                        <?php
                                        for($j = 0; $j < $anzKategorien; $j++) {
                                            echo "<option value=\"".$kategorien[$j]['bezeichnung']."\"/>";
                                        }
                                        ?>
                                    </datalist>
                                    </input>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        </div>
                        <a id="lit_jump"></a>
                        <input id="add_button_kategorie" class="btn_add" type="submit" value="weitere Kategorien" formaction="persoenlichkeit_editor.php?anzKategorie=<?php echo $_SESSION["anzKategorie"]+1;?>#kat_jump" formmethod="post">
                    </div>


                    <!--Literaturangabe-->
                    <div>
                        <div id="ueber_literatur">
                            <div class="create">
                                <div class="form-group">
                                    <label class="p_h1">Literaturangaben:</label>
                                </div>
                            </div>
                            <?php
                            for($i = 0; $i <= $_SESSION['anzLiteratur']; $i++) {
                            ?>
                            <div id="literatur" >
                                <div class="create">
                                    <div class="form-group">
                                        <label>Titel:</label>
                                        <input type="text" value="<?php echo $values["literatur_titel_".$i] ?>" placeholder="Titel der Literaturangabe"
                                               name="literatur_titel_<?php echo $i ?>" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Autor:</label>
                                        <input type="text" value="<?php echo $values["literatur_autor_".$i] ?>" placeholder="Autor der Literaturangabe"
                                        name="literatur_autor_<?php echo $i ?>" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Datum:</label>
                                        <input type="text" value="<?php echo $values["literatur_datum_".$i] ?>" placeholder="Datum der Literaturangabe"
                                               name="literatur_datum_<?php echo $i ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="create create-nine">
                                    <div class="form-group">
                                        <label>Herausgeber:</label>
                                        <input type="text" value="<?php echo $values["literatur_verlag_".$i] ?>" placeholder="Name des Herausgebers"
                                               name="literatur_verlag_<?php echo $i ?>" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label id="p_literatur_ort">Ort/ Firmensitz des Herausgebers:</label>
                                        <input type="text" value="<?php echo $values["literatur_ort_".$i] ?>" placeholder="Ort des Herausgebers"
                                               name="literatur_ort_<?php echo $i ?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        </div>
                        <a id="per_jump"></a>
                        <input id="add_button_kategorie" class="btn_add" type="submit" value="weitere Literaturangaben" formaction="persoenlichkeit_editor.php?anzLiteratur=<?php echo $_SESSION["anzLiteratur"]+1;?>#lit_jump" formmethod="post">
                    </div>

                    <!--Freunde-->
                    <div>
                        <div id="ueber_freund">
                            <div class="create">
                                <div class="form-group">
                                    <label class="p_h1">Freunde:</label>
                                </div>
                            </div>
                            <?php
                            $dbcontroller = new DBController();
                            $personen = $dbcontroller->getPersoenlichkeitenSorted();
                            $anzPersonen = count($personen);


                            for($i = 0; $i <= $_SESSION['anzPerson']; $i++) {
                            ?>
                            <div id="freund">
                                <div class="create">
                                    <select  id="person_auswahl" class="form-control" name="person_<?php echo $i ?>" size="1" >
                                        <?php
                                        $selectedFlag=false;
                                        for($j = 0; $j < $anzPersonen; $j++) {
                                            if($personen[$j]["persoenlichkeitID"]==$values["person_".$i]) {
                                                echo "<option selected value=\"".$personen[$j]['persoenlichkeitID']."\">".$personen[$j]['vorname']." ".$personen[$j]['name']."</option>";
                                                $selectedFlag=true;
                                            } else {
                                                echo "<option value=\"".$personen[$j]['persoenlichkeitID']."\">".$personen[$j]['vorname']." ".$personen[$j]['name']."</option>";
                                            }
                                        }
                                        if(!$selectedFlag) {
                                            echo "<option disabled selected value> -- wähle Freund aus -- </option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        </div>
                        <input id="add_button_person" class="btn_add" type="submit" value="weitere Freunde" formaction="persoenlichkeit_editor.php?anzPerson=<?php echo $_SESSION["anzPerson"]+1;?>#per_jump" formmethod="post">
                    </div>

                        <?php
                            if($ID == 0) {
                        ?>
                        <!--Bilder-->
                        <div>
                            <div class="create create-ten">
                                <label class="p_h1">Bilder:</label>
                            </div>

                            <div id="ueber_bilder" class="create-einzeilig">
                                <div class="form-group">
                                    <label>Profilbild:</label>
                                    <input type="file" name="bild_profilbild" accept="image/*">
                                </div>

                                <div class="form-group">
                                    <label>Titelbild:</label>
                                    <input type="file" name="bild_titelbild" accept="image/*">
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    } else {
                        $titelbild = "helpers/BildLaden.php?id=".$ID."&titel=1";
                        $profilbild = "helpers/BildLaden.php?id=" . $ID."&profil=1";
                        ?>
                    <!--Bilder-->
                    <div>
                        <label class="p_h1">Bilder:</label>
                        <div class="form-group">
                            <label>Titelbild:</label>
                        </div>
                        <div class="title_image title_image--32by9" style="background-image:url(<?php echo $titelbild; ?>);"></div>

                        <div class="form-group">
                            <input type="file" name="bild_titelbild" accept="image/*">
                        </div>
                        <div class="form-group">
                            <label>Profilbild:</label>
                        </div>
                        <div class="profile_image_form" style="background-image:url(<?php echo $profilbild; ?>)"></div>
                        <div class="form-group">
                            <input type="file" name="bild_profilbild" accept="image/*">
                        </div>

                    </div>
                    </div>
            </div>


                        <?php
                    }
                    ?>




                </div>

            </div>

            <!--Button--->
            <div>
            <div id="p_button">
                <?php
                if($ID == 0) {
                    ?>
                    <input id="btn_anlegen" class="btn" value="Persönlichkeit anlegen" type="submit"
                           formaction="persoenlichkeit_datenbank.php" formmethod="post">
                    <?php
                } else {
                    ?>
                    <input id="btn_anlegen" class="btn" value="Änderungen speichern" type="submit"
                           formaction="persoenlichkeit_datenbank.php?id=<?php echo $ID ?>" formmethod="post">
                    <?php
                }
                ?>
                <button id="btn_loeschen" type="reset" class="btn">Einträge löschen</button>
                <a id="btn_abbrechen" href="startseite.php" class="btn">Abbrechen</a>
            </div>
            </div>


        </form>
    </div>
<?php
require("footer.php");
?>
</body>
</html>
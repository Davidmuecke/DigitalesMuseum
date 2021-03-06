<?php


//Mit dieser Engine werden verschiedenste Kacheln erstellt und in die Webseite eingebunden
class KachelCreationEngine {

    //Gibt die Anzahl an Suchergebnissen zurück
    function kategorie_anz($find) {
        $dbcontroller = new DBController();
        $kategorien = $dbcontroller->sucheKategorie($find);
        return count($kategorien);
    }

    // Erstellt eine Kategorie kachel
    function kategorie($find) {
        $dbcontroller = new DBController();
        if($find == ""){
            $kategorien = $dbcontroller->getKategorien();
        } else {
            $kategorien = $dbcontroller->sucheKategorie($find);
        }
        $anz = count($kategorien);
        $title = "Titel";
        for($i = 0; $i < $anz; $i++) {
            $title = $kategorien[$i]["bezeichnung"];
            $id = $kategorien[$i]["kategorieID"];
            ?>
            <a href="persoenlichkeiten_uebersicht.php?katid=<?php echo $id ?>">
                <div class="kachel_kategorie">
                    <div class="panel-body">
                        <div class="characteristics">
                            <label id="kategorie_label"><?php echo $title?></label>
                        </div>
                    </div>
                </div>
            </a>
            <?php
        }
        return $anz;
    }


    //Gibt die Anzahl an Suchergebnissen zurück
    function epoche_anz($find) {
        $dbcontroller = new DBController();
        $epochen = $dbcontroller->sucheEpoche($find);
        return count($epochen);
    }

    // Erstellt eine Epoche kachel
    function epoche($find) {
        $dbcontroller = new DBController();
        if($find == ""){
            $epochen = $dbcontroller->getEpochen();
        } else {
            $epochen = $dbcontroller->sucheEpoche($find);
        }
        $anz = count($epochen);
        $title = "Titel";
        for($i = 0; $i < $anz; $i++) {
            $title = $epochen[$i]["bezeichnung"];
            $id = $epochen[$i]["epocheID"];
            ?>
            <a href="persoenlichkeiten_uebersicht.php?epid=<?php echo $id ?>">
            <div class="kachel_kategorie">
                <div class="panel-body">
                    <div class="characteristics">
                        <label id="epoche_kachel"><?php echo $title?></label>
                    </div>
                </div>
            </div>
            </a>
            <?php
        }
    }

    function persoenlichkeit_anz($find) {
        $dbcontroller = new DBController();
        if($find == ""){
            $personen = $dbcontroller->getPersoenlichkeitenSorted();
        } else {
            $personen = $dbcontroller->suchePersoenlichkeit($find);
        }
        return $anz = count($personen);
    }

    // Erstellt die gesuchten Persönlichkeitskachel
    function persoenlichkeit($katid, $epid, $find) {
        $dbcontroller = new DBController();
        if($katid != -1) {
            $personen = $dbcontroller->getPersoenlichkeitenOfAKategorie($katid);
        } else if($epid != -1) {
            $personen = $dbcontroller->getPersoenlichkeitenOfAnEpoche($epid);
        } else {
            if($find == ""){
                $personen = $dbcontroller->getPersoenlichkeitenSorted();
            } else {
                $personen = $dbcontroller->suchePersoenlichkeit($find);
            }
        }
        $anz = count($personen);
        $title = "Titel";
        for($i = 0; $i < $anz; $i++) {
            $name = $personen[$i]["name"];
            $vorname = $personen[$i]["vorname"];
            $geburtsdatum = $personen[$i]["geburtsdatum"];
            $todesdatum = $personen[$i]["todesdatum"];
            $id = $personen[$i]["persoenlichkeitID"];
            $profilbild = "helpers/BildLaden.php?id=".$id."&profil=1";
            ?>


            <div class="kachel_persoenlichkeit">
                <a href="persoenlichkeit.php?id=<?php echo $id ?>">
                <div class="panel-heading">
                        <label id="name_persoenlichkeit"><?php echo $vorname.' '.$name?></label>
                    <label id="geburtsdatum">&#10033; <?php echo $geburtsdatum?></label>
                    <?php
                    if($todesdatum != "0000-00-00" && $todesdatum != "") {
                        ?>
                        <label id="todestag">&dagger; <?php echo $todesdatum ?>
                        </label>
                        <?php
                    }
                    ?>
                </div>
                <div class="panel-body">
                    <div class="profile_image profile_image--1by1 profile_image_uebersicht" style="background-image:url(<?php echo $profilbild; ?>);"></div>
                </div>
                </a>
            </div>



            <?php
        }
    }


// Erstellt eine bestimmte Persönlichkeitskachel
    function persoenlichkeitByID($id) {
        $dbcontroller = new DBController();
        $personen = $dbcontroller->getPersoenlichkeitByID($id);
        $title = "Titel";
            $name = $personen["name"];
            $vorname = $personen["vorname"];
            $geburtsdatum = $personen["geburtsdatum"];
            $todesdatum = $personen["todesdatum"];
            $profilbild = "helpers/BildLaden.php?id=".$id."&profil=1";
            ?>

            <div class="kachel_persoenlichkeit">
                <a href="persoenlichkeit.php?id=<?php echo $id ?>">
                    <div class="panel-heading">
                        <label id="name_persoenlichkeit"><?php echo $vorname.' '.$name?></label>
                        <label id="geburtsdatum">&#10033; <?php echo $geburtsdatum?></label>
                        <?php
                        if($todesdatum != "0000-00-00" && $todesdatum != "") {
                            ?>
                            <label id="todestag">&dagger; <?php echo $todesdatum ?>
                            </label>
                    </div>
                    <div class="panel-body">
                        <div class="profile_image profile_image--1by1 profile_image_uebersicht" style="background-image:url(<?php echo $profilbild; ?>);"></div>
                    </div>
                </a>
            </div>



            <?php
        }
    }

    //Erstellt eine Kachel des Start Menüs
    //title: Titel, der in der Kachel stehen soll
    //link: Seite, die geöffnet werden woll, wenn auf die Kachel geklickt wird
    function start($title, $link) {
        ?>
        <a href="<?php echo $link?>">
            <div class="kachel_start panel panel-default">
                <div class="panel-body">
                    <?php echo $title?>
                </div>
            </div>
        </a>

        <?php
    }





    function persoenlichkeit_title($id) {
        $titelbild = "helpers/BildLaden.php?id=".$id."&titel=1";
        ?>
        <div class="title_image title_image--32by9" style="background-image:url(<?php echo $titelbild; ?>);">
            <a href = "persoenlichkeit_loeschen.php?id=<?php echo$id ?>">
                <button id="btn_bearbeiten" type="submit" class="btn btn_noeffect">Löschen</button>
            </a>
            <a href = "persoenlichkeit_editor.php?id=<?php echo$id ?>">
                <button id="btn_bearbeiten" type="submit" class="btn btn_noeffect">Bearbeiten</button>
            </a>
        </div>
        <?php
    }

    //Erstellt die Kachel mit der Persönlichkeits-Characteristic
    //@param id ID der anazuzeigenden Persönlichkeit
    function persoenlichkeit_characteristic($id) {
        $dbcontroller = new DBController();
        $person = $dbcontroller->getPersoenlichkeitByID($id);
        $name = $person["name"];
        $vorname = $person["vorname"];
        $geburtsdatum = $person["geburtsdatum"];
        $todesdatum = $person["todesdatum"];
        $geburtsort = $person["geburtsort"];
        $nationalitaet = $person["nationalitaet"];
        $vater = $person["vater"];
        $mutter = $person["mutter"];
        $kuenstlername = $person["kuenstlername"];
        $profilbild = "helpers/BildLaden.php?id=" . $id."&profil=1";

        ?>
        <div class="information col-md-6">
            <div class="panel">
                <div class="panel-heading panel-heading-persoenlichkeit">
                    <label id="link_persoenlichkeit"><?php echo $vorname.' '.$name ?></label>
                    <label id="geburtsdatum">&#10033; <?php echo $geburtsdatum ?></label>
                    <?php
                    if($todesdatum != "0000-00-00" && $todesdatum != "") {
                        ?>
                        <label id="todestag">&dagger; <?php echo $todesdatum ?>
                        </label>
                        <?php
                    }
                    ?>
                </div>
                <div class="panel-body panel-body-persoenlichkeit">
                    <div class="profile_image profile_image--1by1" style="background-image:url(<?php echo $profilbild; ?>)"></div>

                    <div class="characteristics">
                        <?php
                        if(!empty($geburtsort)) { ?>
                            <label class="charac_label">Geburtsort</label> <?php echo $geburtsort ?>
                        <?php } ?>

                        <?php
                        if(!empty($vater)) { ?>
                            <label class="charac_label">Vater</label> <?php echo $vater ?>
                        <?php
                        } ?>

                        <?php
                        if(!empty($mutter)) { ?>
                            <label class="charac_label">Mutter</label> <?php echo $mutter ?>
                            <?php
                        } ?>

                        <?php
                        if(!empty($nationalitaet)) { ?>
                            <label class="charac_label">Nationalität</label> <?php echo $nationalitaet ?>
                            <?php
                        } ?>

                        <?php if($kuenstlername!="") {?>
                            <label class="charac_label">Künstlername</label> <?php echo $kuenstlername ?>
                        <?php
                        } ?>
                    </div>
            </div>
        </div>
        </div>
        <?php
    }


    function persoenlichkeit_kurzbeschreibung($id) {
        $dbcontroller = new DBController();
        $person = $dbcontroller->getPersoenlichkeitByID($id);
        $kurzbeschreibung = $person["beschreibungInhalt"];
        $quelle = $person["beschreibungQuelle"];
        ?>
        <div class="information col-md-6">
            <div class="panel">
                <div class="panel-heading panel-heading-persoenlichkeit">
                    <label id="link_information">Kurzbeschreibung</label>
                </div>
                <div class="panel-body panel-body-persoenlichkeit">
                    <div class="information-content">
                        <?php echo $kurzbeschreibung ?>
                        <i><?php echo "(Quelle: ".$quelle . ")"?></i>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

    function persoenlichkeit_longText($id) {
        $dbcontroller = new DBController();
        $person = $dbcontroller->getPersoenlichkeitByID($id);
        $text = $person["textInhalt"];
        $titel = $person["textTitel"];
        $autor = $person["TextAutor"];
        $quelle = $person["textQuelle"];
        ?>
        <div class="information col-md-6" id="panel_text">
            <div class="panel">
                <div class="panel-heading panel-heading-persoenlichkeit">
                    <label id="link_information"><?php echo $titel ?></label>
                </div>
                <div class="panel-body panel-body-persoenlichkeit">
                    <div class="information-content">
                        <?php echo $text ?>
                        <i><?php echo "(Autor: " .$autor.", Quelle: ".$quelle.")" ?></i>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

    function persoenlichkeit_zitat($id) {
        $dbcontroller = new DBController();
        $person = $dbcontroller->getPersoenlichkeitByID($id);
        $zitat = $person["zitatInhalt"];
        $anlass = $person["zitatAnlass"];
        $urheber = $person["zitatUrheber"];
        $datum = $person["zitatDatum"];
        if(!empty($zitat) && $zitat!=" ") {
            ?>
            <div class="information col-md-6">
                <div class="panel">
                    <div class="panel-heading panel-heading-persoenlichkeit">
                        <label id="link_information">Zitat</label>
                    </div>
                    <div class="panel-body panel-body-persoenlichkeit">
                        <div class="information-content">
                            <?php echo "\"" . $zitat . "\"" ?>
                            <i><?php
                                if(!empty($urheber) || !empty($anlass) || ($datum!="0000-00-00")){
                                    echo "(";
                                }
                                if(!empty($urheber)) {
                                    echo "Urheber: " .$urheber;
                                }
                                if(!empty($anlass)) {
                                    echo ", Anlass: " . $anlass;
                                }

                                if ($datum != "0000-00-00") {
                                    echo ", Datum: " . $datum;
                                }
                                if(!empty($urheber) || !empty($anlass) || ($datum != "0000-00-00")){
                                    echo ")";
                                }
                                ?></i>

                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    }


    function persoenlichkeit_literaturangaben($id) {
        $dbcontroller = new DBController();
        $literaturen = $dbcontroller->getLiteraturangabenByPersoenlichkeit($id);
        $anz = count($literaturen);

        ?>
        <div class="information col-md-6">
            <div class="panel">
                <div class="panel-heading panel-heading-persoenlichkeit">
                    <label id="link_information">Literaturangaben</label>
                </div>
                <div class="panel-body panel-body-persoenlichkeit">
                    <div class="information-content">
                        <ul>
                            <?php
                                for($i = 0; $i < $anz; $i++) {
                                    $autor = $literaturen[$i]["autor"];
                                    $titel = $literaturen[$i]["titel"];
                                    $datum = $literaturen[$i]["datum"];
                                    $herausgeber = $literaturen[$i]["herausgeberName"];
                                    $herausgeberOrt = $literaturen[$i]["herausgeberOrt"];
                                    ?>
                                    <li>
                                        <?php
                                            echo "(Titel: ".$titel . ", Autor: " . $autor;
                                            if($datum != "0000-00-00") {
                                                echo ", Datum: ".$datum;
                                            }
                                            echo ", Herausgeber: " . $herausgeber . ", Herausgeberort: " . $herausgeberOrt.")" ?>

                                    </li>
                                    <?php
                                }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

    function persoenlichkeit_linkPersonen($id) {
        $dbcontroller = new DBController();
        $freunde = $dbcontroller->getPersoenlichkeitenOfAPersoenlichkeit($id);
        $anz = count($freunde);
        $name="";
        $vorname="";
        $id=0;
        if($anz!=0) {
            ?>
            <div class="information col-md-6">
                <div class="panel">
                    <div class="panel-heading panel-heading-persoenlichkeit">
                        <label id="link_information">Freunde</label>
                    </div>
                    <div class="panel-body panel-body-persoenlichkeit">
                        <div class="information-content">
                            <ul>
                                <?php
                                for ($i = 0; $i < $anz; $i++) {
                                    $name = $freunde[$i]['name'];
                                    $vorname = $freunde[$i]["vorname"];
                                    $idpers = $freunde[$i]["persoenlichkeitID"];
                                    $link = "persoenlichkeit.php?id=" . $idpers;
                                    ?>
                                    <li>
                                        <a id="link_kategorie"
                                           href=<?php echo $link ?>><?php echo $vorname . " " . $name ?></a>
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    }

    function persoenlichkeit_linkKatEpoch($id) {
        $dbcontroller = new DBController();
        $kategorien = $dbcontroller->getKategorienByPersoenlichkeit($id);
        $anzKat = count($kategorien);


        $epochen = $dbcontroller->getEpochenByPersoenlichekeit($id);
        $anzEpochen = count($epochen);

        if($anzKat!=0 || $anzEpochen!=0) {
            ?>
            <div class="information col-md-6">
                <div class="panel">
                    <div class="panel-heading panel-heading-persoenlichkeit">
                        <label id="link_information">Kategorien und Epochen</label>
                    </div>
                    <div class="panel-body panel-body-persoenlichkeit">
                        <div class="information-content">
                            <?php if($anzKat!=0) {?>
                            <label class="charac_label">Kategorien</label>
                            <ul>
                                <?php
                                for ($i = 0; $i < $anzKat; $i++) {
                                    $kat_ID = $kategorien[$i]["kategorieID"];
                                    $kat_Name = $kategorien[$i]["bezeichnung"];
                                    $link = "persoenlichkeiten_uebersicht.php?katid=" . $kat_ID;
                                    ?>
                                    <li>
                                        <a id="link_kategorie" href=<?php echo $link ?>><?php echo $kat_Name ?></a>
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>
                            <?php
                            }
                            if($anzEpochen!=0) {
                            ?>
                            <label class="charac_label">Epochen</label>
                            <ul>
                                <?php
                                for ($i = 0; $i < $anzEpochen; $i++) {
                                    $epoche_ID = $epochen[$i]["epocheID"];
                                    $epoche_Name = $epochen[$i]["bezeichnung"];
                                    $link = "persoenlichkeiten_uebersicht.php?epid=" . $epoche_ID;
                                    ?>
                                    <li>
                                        <a id="link_epoche" href=<?php echo $link ?>><?php echo $epoche_Name ?></a>
                                    </li>
                                    <?php
                                }
                            }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    }

}


?>
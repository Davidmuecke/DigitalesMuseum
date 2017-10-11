<?php

require("helpers/DBController.php");
//Mit dieser Engine werden verschiedenste Kacheln erstellt und in die Webseite eingebunden
class KachelCreationEngine {


    public $dbcontroller;

    // Erstellt eine Kategorie kachel
    function kategorie() {
        $dbcontroller = new DBController();
        $kategorien = $dbcontroller->getKategorien();
        $anz = count($kategorien);
        $title = "Titel";
        for($i = 0; $i < $anz; $i++) {
            $title = $kategorien[$i]["bezeichnung"];
            $id = $kategorien[$i]["kategorieID"];
            ?>
                <div class="kachel_kategorie" onclick="location.replace('persoenlichkeiten_uebersicht.php?katid=' + <?php echo $id ?>)">
                    <div class="panel-body">
                        <div class="characteristics">
                            <label id="kategorie"><?php echo $title?></label>
                        </div>
                    </div>
                </div>
            <?php
        }
    }


    // Erstellt eine Epoche kachel
    function epoche() {
        $dbcontroller = new DBController();
        $epochen = $dbcontroller->getEpochen();
        $anz = count($epochen);
        $title = "Titel";
        for($i = 0; $i < $anz; $i++) {
            $title = $epochen[$i]["bezeichnung"];
            $id = $epochen[$i]["epocheID"];
            ?>
            <div class="kachel_kategorie" onclick="location.replace('persoenlichkeiten_uebersicht.php?epid=' + <?php echo $id ?>)">
                <div class="panel-body">
                    <div class="characteristics">
                        <label id="kategorie"><?php echo $title?></label>
                    </div>
                </div>
            </div>
            <?php
        }
    }




    // Erstellt eine Persönlichkeitskachel
    function persoenlichkeit($katid, $epid) {
        $dbcontroller = new DBController();
        if($katid != -1) {
            $personen = $dbcontroller->getPersoenlichkeitenOfAKategorie($katid);
        } else if($epid != -1) {
            $personen = $dbcontroller->getPersoenlichkeitenOfAnEpoche($epid);
        } else {
            $personen = $dbcontroller->getPersoenlichkeiten();
        }
        $anz = count($personen);
        $title = "Titel";
        for($i = 0; $i < $anz; $i++) {
            $name = $personen[$i]["name"];
            $vorname = $personen[$i]["vorname"];
            $geburtsdatum = $personen[$i]["geburtsdatum"];
            $todesdatum = $personen[$i]["todesdatum"];
            $id = $personen[$i]["persoenlichkeitID"];
            $profilbild = "helpers/BildLaden.php?id=".$id;
            ?>
            <div class="kachel_persoenlichkeit" onclick="location.replace('persoenlichkeit.php?id=' + <?php echo $id ?>)">
                <div class="panel-heading">
                    <a id="link_persoenlichkeit" href="#">
                        <label id="name_persoenlichkeit"><?php echo $vorname.' '.$name?></label>
                    </a>
                    <label id="geburtsdatum"><span class="glyphicon glyphicon-asterisk"></span> <?php echo $geburtsdatum?></label>
                    <?php
                        if($todesdatum != "0000-00-00") {
                            ?>
                            <label id="todestag"><span class="glyphicon glyphicon-plus"></span> <?php echo $todesdatum ?>
                            </label>
                            <?php
                        }
                    ?>
                </div>
                <div class="panel-body">
                    <div class="profile_image profile_image--1by1" style="background-image:url(<?php echo $profilbild; ?>);"></div>
                </div>
            </div>


            <?php
        }
    }

    //Erstellt eine Kachel des Start Menüs
    //title: Titel, der in der Kachel stehen soll
    //link: Seite, die geöffnet werden woll, wenn auf die Kachel geklickt wird
    function start($title, $link) {
        ?>
        <div class="panel panel-default">
            <div class="panel-body" onclick="location.replace('<?php echo $link?>.php')">
                <?php echo $title?>
            </div>
        </div>

        <?php
    }


    function persoenlichkeit_title($id) {
        $titelbild = "helpers/BildLaden.php?id=".$id;
        ?>
        <div class="title_image title_image--32by9" style="background-image:url(<?php echo $titelbild; ?>);"></div>
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
        $profilbild = "helpers/BildLaden.php?id=" . $id;

        ?>
        <div class="information col-md-6 col-md-offset-0">
            <div class="panel">
                <div class="panel-heading panel-heading-persoenlichkeit">
                    <label id="link_persoenlichkeit"><?php echo $vorname.' '.$name ?></label>
                    <label id="geburtsdatum"><span class="glyphicon glyphicon-asterisk"></span> <?php echo $geburtsdatum ?></label>
                    <?php
                    if($todesdatum != "0000-00-00") {
                        ?>
                        <label id="todestag"><span class="glyphicon glyphicon-plus"></span> <?php echo $todesdatum ?>
                        </label>
                        <?php
                    }
                    ?>
                </div>
                <div class="panel-body panel-body-persoenlichkeit">
                    <div class="profile_image profile_image--1by1" style="background-image:url(<?php echo $profilbild; ?>)"></div>
                
                    <div class="characteristics">
                        <label class="charac_label">Geburtsort</label> <?php echo $geburtsort ?>
                        <label class="charac_label">Vater</label> <?php echo $vater ?>
                        <label class="charac_label">Mutter</label> <?php echo $mutter ?>
                        <label class="charac_label">Nationalität</label> <?php echo $nationalitaet ?>
                        <?php if($kuenstlername!="") {?>
                            <label class="charac_label">Künstlername</label> <?php echo $kuenstlername ?>
                        <?php }?>
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
        <div class="information col-md-6 col-md-offset-0">
            <div class="panel">
                <div class="panel-heading panel-heading-persoenlichkeit">
                    <label id="link_information">Kurzbeschreibung</label>
                </div>
                <div class="panel-body panel-body-persoenlichkeit">
                    <div class="information-content">
                        <?php echo $kurzbeschreibung ?>
                        <i><?php echo $quelle?></i>
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
        <div class="information col-md-6 col-md-offset-0">
            <div class="panel">
                <div class="panel-heading panel-heading-persoenlichkeit">
                    <label id="link_information"><?php echo $titel ?></label>
                </div>
                <div class="panel-body panel-body-persoenlichkeit">
                    <div class="information-content">
                        <?php echo $text ?>
                        <i><?php echo $autor.", ".$quelle ?></i>
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
        ?>
        <div class="information col-md-6 col-md-offset-0">
            <div class="panel">
                <div class="panel-heading panel-heading-persoenlichkeit">
                    <label id="link_information">Zitat</label>
                </div>
                <div class="panel-body panel-body-persoenlichkeit">
                    <div class="information-content">
                        <?php echo "\"".$zitat."\"" ?>
                        <i><?php
                            echo $urheber.", ".$anlass.", ".$datum ?></i>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }


    function persoenlichkeit_literaturangaben($id) {
        $dbcontroller = new DBController();
        $literaturen = $dbcontroller->getLiteraturangabenByPersoenlichkeit($id);
        $anz = count($literaturen);

        ?>
        <div class="information col-md-6 col-md-offset-0">
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
                                    <li><?php echo $titel . ", " . $autor . ", " . $datum . ", " . $herausgeber . ", " . $herausgeberOrt ?></li>
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
        //$freunde = $dbcontroller->getFreundeOfPersoenlichkeitByID($id);
        //$name = $freunde["name"];
        //$vorname = $freunde["vorname"];

        ?>
        <div class="information col-md-6 col-md-offset-0">
            <div class="panel">
                <div class="panel-heading panel-heading-persoenlichkeit">
                    <label id="link_information">Freunde</label>
                </div>
                <div class="panel-body panel-body-persoenlichkeit">
                    <div class="information-content">
                        Hier müssen noch die Verknüpften Persoen aufgelistet werden
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

    function persoenlichkeit_linkKatEpoch($id) {
        $dbcontroller = new DBController();
        $kategorien = $dbcontroller->getKategorienByPersoenlichkeit($id);
        $anzKat = count($kategorien);


        $epochen = $dbcontroller->getEpochenByPersoenlichekeit($id);
        $anzEpochen = count($epochen);

        ?>
        <div class="information col-md-6 col-md-offset-0">
            <div class="panel">
                <div class="panel-heading panel-heading-persoenlichkeit">
                    <label id="link_information">Kategorien und Epochen</label>
                </div>
                <div class="panel-body panel-body-persoenlichkeit">
                    <div class="information-content">
                        <label class="charac_label">Kategorien</label>
                        <ul>
                        <?php
                            for($i = 0; $i < $anzKat; $i++) {
                                $kat_ID = $kategorien[$i]["kategorieID"];
                                $kat_Name = $kategorien[$i]["bezeichnung"];
                                $link = "persoenlichkeiten_uebersicht.php?katid=".$kat_ID;
                                ?>
                                <li>
                                    <a id="link_kategorie" href=<?php echo $link?>><?php echo $kat_Name ?></a>
                                </li>
                            <?php
                            }
                        ?>
                        </ul>
                        <label class="charac_label">Epochen</label>
                        <ul>
                            <?php
                            for($i = 0; $i < $anzEpochen; $i++) {
                                $epoche_ID = $epochen[$i]["epocheID"];
                                $epoche_Name = $epochen[$i]["bezeichnung"];
                                $link = "persoenlichkeiten_uebersicht.php?epid=".$epoche_ID;
                                ?>
                                <li>
                                    <a id="link_epoche" href=<?php echo $link?>><?php echo $epoche_Name ?></a>
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


?>
<?php
/**
 * Created by PhpStorm.
 * User: Jonathan Weyl
 * Date: 05.10.2017
 * Time: 16:34
 */

//Mit dieser Engine werden verschiedenste Kacheln erstellt und in die Webseite eingebunden
class KachelCreationEngine {

    // Erstellt eine Kategorie kachel
    function kategorie($title) {
        ?>
            <div class="kachel_kategorie">
                <h2 class="kachelHeading"><?php echo $title?></h2>
            </div>
        <?php
    }

    // Erstellt eine Persönlichkeitskachel
    function persoenlichkeit() {
        ?>
        <div class="kachel_persoenlichkeit" onclick="location.replace('registrierung.php')">
            <div class="panel-heading">
                <a id="link_persoenlichkeit" href="#">
                    <label id="name_persoenlichkeit">Vorname Nachname</label>
                </a>
                <label id="geburtsdatum"><span class="glyphicon glyphicon-asterisk"></span> Geburtsdatum</label>
                <label id="todestag"><span class="glyphicon glyphicon-plus"></span> Todestag</label>
            </div>


        </div>


        <?php
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

}


?>
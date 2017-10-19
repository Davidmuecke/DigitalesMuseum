<script type="text/javascript">
    <!--
    var sel = document.getElementById('epochen_auswahl');
    sel.onchange = function zwei() {
        if (document.getElementById('epochen_auswahl').value == "neueEpoche") {
            var show = document.getElementById('ne_input');
            show.style.display = "block";
        }
        else {
            var show = document.getElementById('ne_input');
            show.style.display = "none";
        }
    }
    -->
</script>




<div id="ne_input">
    <input type="text" placeholder="Neue Epoche eingeben"
           name="neue_epoche" class="form-control"
           required>
</div>


<div id="add_button_person">
    <a onclick="addElement('epoche','ueber_epoche')" class="btn_add"><span
            class="glyphicon glyphicon-plus"></span></a>
</div>





<?php
require("datenbank.php");

/*$personID = 10;

$counter = array("anzEpoche", "anzKategorie", "anzPerson", "anzLiteratur");
$counter2 = array("epoche", "kategorie", "person", "literatur");
$felder = array("nachname", "vorname", "kuenstlername", "vater", "mutter", "nationalitaet", "geburtsdatum", "geburtsort", "todesdatum", "kurzbeschreibung_quelle", "kurzbeschreibung_text",
"text_titel", "text_autor","text_quelle", "text_text", "zitat_anlass", "zitat_datum", "zitat_urheber", "zitat_text", "epoche_0", "kategorie_0", "person_0", "literatur_0");

foreach ($felder as $feld) {
    $values[$feld] = "";
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
    if(!isset($_SESSION[$feld])) {
        $_SESSION[$feld]=1;
    }
}

if(isset($_SESSION["anzEpoche"])) {

}



foreach ($values as $feld => $wert) {
    if(isset($_POST[$feld])) {
        $values[$feld] = $_POST[$feld];
    } else { $values[$feld] =""; }
}

$personID=5;*/


?>
<?php

/**
 * Created by PhpStorm.
 * User: kochdavi
 * Date: 05.10.2017
 * Time: 09:25
 *Adapterklasse zur Kommunikation mit der Datenbank
 *
 */
class DBController
{
    private $DB;

    /*
     * Konstruktor mit PWD Daten
     */
    function __construct()
    {
        $sqlhost = "localhost";
        $sqlhost = "127.0.0.1";
        $sqluser = "david";
        $sqlpass = "david";
        $dbname = "digitales_museum";

        $this->DB = mysqli_connect($sqlhost, $sqluser, $sqlpass, $dbname) or die ("Datenbank-System nicht verfügbar");
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
    }

    /**
     * @param $id ID der Persoenlichkeit
     * @return array|null Inhalt der kompletten Tabelle
     */
    public function getPersoenlichkeitByID($id)
    {
        $id = mysqli_escape_string($this->DB, $id);
        $query = mysqli_query($this->DB, "SELECT * FROM persoenlichkeit WHERE persoenlichkeitID='" . $id . "'");
        $result = mysqli_fetch_assoc($query);
        return $result;
    }

    /**
     * Gibt ein mehrdimendionales Array mit allen Kategorien zurück
     * Zugriff nach dem Schema: $erg[0]["bezeichnung"]
     * @return array|null
     */
    public function getKategorien()
    {
        $query = mysqli_query($this->DB, "SELECT * FROM kategorie");
        $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
        return $result;
    }

    /**
     * Gibt die Kategorien sortiert nach der Anzahl der Verwendungen zurück
     * @return array|null  mehrdimensionales Array mit den Kategorien
     *                          Zufriff mit $erg[0]["bezeichnung"]
     *                          Die Anzahl der Elemente in einer Kategorie hat die Bezeichnung COUNT
     */
    public function getKategorienByUsage()
    {
        $query = mysqli_query($this->DB, "SELECT bezeichnung,kategorie.kategorieID COUNT FROM kategorie INNER JOIN persoenlichkeitkategorie ON (kategorie.kategorieID = persoenlichkeitkategorie.kategorieID) GROUP BY persoenlichkeitkategorie.kategorieID ORDER BY `COUNT` DESC");
        $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
        return $result;
    }

    /**
     * Gibt die Kategorien zu einer Persönlichkeit zurück
     * @param $idPersoenlichkeit ID der abgefragten Prersönlichkeit
     * @return array|null      mehrdimensionales Array mit den Kategorien
     *                          Zufriff mit $erg[0]["bezeichnung"]
     */
    public function getKategorienByPersoenlichkeit($idPersoenlichkeit)
    {
        $idPersoenlichkeit = mysqli_escape_string($this->DB, $idPersoenlichkeit);
        $query = mysqli_query($this->DB, "SELECT kategorie.kategorieID, bezeichnung FROM kategorie INNER JOIN persoenlichkeitkategorie ON (kategorie.kategorieID = persoenlichkeitkategorie.kategorieID) WHERE persoenlichkeitkategorie.persoenlichkeitID ='" . $idPersoenlichkeit . "' ");
        $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
        return $result;
    }

    /**Bilder zu einer Persönlichkeit
     * @param $idPersoenlichkeit
     * @return array|null
     */
    public function getBilderByPersoenlichkeit($idPersoenlichkeit)
    {
        $idPersoenlichkeit = mysqli_escape_string($this->DB, $idPersoenlichkeit);
        $query = mysqli_query($this->DB, "SELECT * FROM bild INNER JOIN persoenlichkeitbild ON (bild.bildID = persoenlichkeitbild.bildID) WHERE persoenlichkeitbild.persoenlichkeitID ='" . $idPersoenlichkeit . "' ");
        $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
        return $result;
    }

    /**Literaturangaben zu einer Persönlichkeit
     * @param $idPersoenlichkeit
     * @return array|null
     */
    public function getLiteraturangabenByPersoenlichkeit($idPersoenlichkeit)
    {
        $idPersoenlichkeit = mysqli_escape_string($this->DB, $idPersoenlichkeit);
        $query = mysqli_query($this->DB, "SELECT * FROM literaturangaben INNER JOIN persoenlichkeitliteraturangabe ON (literaturangaben.literaturangabenID = persoenlichkeitliteraturangaben.literaturangabenID) WHERE persoenlichkeitliteraturangaben.persoenlichkeitID ='" . $idPersoenlichkeit . "' ");
        $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
        return $result;
    }

    //Suchfunktionen

    /**Durchsucht den Titel und die Beschreibung nach dem Suchstring
     * @param $string   Suchstring
     * @return array|null mehrdimensionales Array
     */
    public function sucheBild($string)
    {
        $string = mysqli_escape_string($this->DB, $string);
        $query = mysqli_query($this->DB, "SELECT * FROM `bild` WHERE `titel` LIKE \"%" . $string . "%\" OR MATCH(`beschreibung`) AGAINST(\"" . $string . "\")");
        $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
        return $result;
    }

    /**
     * Suche nach Kategorie, die das Suchwort entalten oder ähnlich klingen. 100% Treffer sind vorne in der Liste
     * @param $string Suchstring
     * @return array|null  mehrdimensionales Array mit den Ergebnissen
     */
    public function sucheKategorie($string)
    {
        $string = mysqli_escape_string($this->DB, $string);
        $query = mysqli_query($this->DB, "SELECT *, ABS(STRCMP(bezeichnung, \"" . $string . "\")) AS \"STRCMP\" FROM `kategorie` WHERE kategorie.bezeichnung LIKE \"%" . $string . "%\" OR SOUNDEX(kategorie.bezeichnung) = SOUNDEX(\"" . $string . "\") ORDER BY `STRCMP` ASC");
        $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
        return $result;
    }

    /**Durchsucht Name,Vorname,Künstlername nach dem Suchtring oder einem ähnlichen Wort
     * @param $string   Suchstring
     * @return array|null Ergebnis als mehrdimensionales Array
     */
    public function suchePersoenlichkeit($string)
    {
        $string = mysqli_escape_string($this->DB, $string);
        $query = mysqli_query($this->DB, "SELECT *, ABS(STRCMP(name, \"" . $string . "\")) AS \"STRCMP\" FROM persoenlichkeit WHERE vorname LIKE \"%" . $string . "%\" OR NAME LIKE \"%" . $string . "%\" OR kuenstlername LIKE \"%" . $string . "%\" OR SOUNDEX(name) = SOUNDEX(\"" . $string . "\") OR SOUNDEX(vorname) = SOUNDEX(\"" . $string . "\") OR SOUNDEX(kuenstlername) = SOUNDEX(\"" . $string . "\") ORDER BY STRCMP ASC");
        $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
        return $result;
    }

    /**Durchsucht Zitate, Langtext und Kurzbeschreibung nach dem übergebenen Wort
     * @param $string   Suchtext
     * @return array|null   mehrdimensionales Array
     */
    public function sucheVolltext($string)
    {
        $string = mysqli_escape_string($this->DB, $string);
        $query = mysqli_query($this->DB, "SELECT * FROM `persoenlichkeit` WHERE MATCH(zitatInhalt) AGAINST(\"" . $string . "\") OR MATCH(textInhalt) AGAINST(\"" . $string . "\") OR MATCH(beschreibungInhalt) AGAINST(\"" . $string . "\")");
        $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
        return $result;
    }
    //Neue Einträge anlegen

    /**
     * @param $beschreibung
     * @param $datum
     * @param $quelle
     * @param $titel
     * @param $data     BLOB
     * @param $datatype   image/jpeg
     * @param $size   Bildgröße als int
     * @return bool Erbebnis der Abfrage true/false 1/""
     */
    public function addBild($beschreibung, $datum, $quelle, $titel, $data, $datatype, $size)
    {
        $beschreibung = mysqli_escape_string($this->DB, htmlentities($beschreibung));
        $datum = mysqli_escape_string($this->DB, htmlentities($datum));
        $quelle = mysqli_escape_string($this->DB, htmlentities($quelle));
        $titel = mysqli_escape_string($this->DB, htmlentities($titel));
        $data = mysqli_escape_string($this->DB, htmlentities($data));
        $datatype = mysqli_escape_string($this->DB, htmlentities($datatype));
        $size = (int)$size;
        $query = mysqli_query($this->DB, "INSERT INTO bild(beschreibung,datum,quelle,titel,data,datatype,size) VALUES('$beschreibung','$datum','$titel','$data','$datatype','$size') ");
        return $query;

    }

    /**
     * @param $persoenlichkeitID
     * @param $bildID
     * @return bool Erbebnis der Abfrage true/false 1/""
     */
    public function addBildzuPersoenlichkeit($persoenlichkeitID, $bildID)
    {
        $persoenlichkeitID = (int)$persoenlichkeitID;
        $bildID = (int)$bildID;
        $query = mysqli_query($this->DB, "INSERT INTO persoenlichkeitbild(bildID) VALUES('" . $persoenlichkeitID . "','" . $bildID . "') ");
        return $query;
    }

    /**
     * @param $bezeichnung      Bezeichnung der neuen Kategorie
     * @return bool     success true/false
     */
    public function addKategorie($bezeichnung)
    {
        $bezeichnung = mysqli_escape_string($this->DB, htmlentities($bezeichnung));
        $query = mysqli_query($this->DB, "INSERT INTO kategorie(bezeichnung) VALUES('" . $bezeichnung . "') ");
        return $query;
    }

    /**
     * @param $persoenlichkeitID
     * @param $kategorieID
     * @return bool Erbebnis der Abfrage true/false 1/""
     */
    public function addKategoriezuPersoenlichkeit($persoenlichkeitID, $kategorieID)
    {
        $persoenlichkeitID = (int)$persoenlichkeitID;
        $kategorieID = (int)$kategorieID;
        $query = mysqli_query($this->DB, "INSERT INTO persoenlichkeitkategorie(persoenlichkeitID,kategorieID) VALUES('" . $persoenlichkeitID . "','" . $kategorieID . "') ");
        return $query;
    }

    /**
     * @param $autor
     * @param $titel
     * @param $datum
     * @param $herausgeberName
     * @param $herausgeberOrt
     * @return bool   Erbebnis der Abfrage true/false 1/""
     */
    public function addLiteraturangabe($autor, $titel, $datum, $herausgeberName, $herausgeberOrt)
    {
        $autor = mysqli_escape_string($this->DB, htmlentities($autor));
        $titel = mysqli_escape_string($this->DB, htmlentities($titel));
        $datum = mysqli_escape_string($this->DB, htmlentities($datum));
        $herausgeberName = mysqli_escape_string($this->DB, htmlentities($herausgeberName));
        $herausgeberOrt = mysqli_escape_string($this->DB, htmlentities($herausgeberOrt));
        $values = "";
        $columns = "";
        if (!empty($autor)) {
            $columns = "autor";
            $values = "'$autor'";
        }
        if (!empty($titel)) {
            $values = $this->komma($values);
            $columns = $this->komma($columns);
            $columns .= "titel";
            $values .= "'$titel'";
        }
        if (!empty($herausgeberName)) {
            $values = $this->komma($values);
            $columns = $this->komma($columns);
            $columns .= "herausgeberName";
            $values .= "'$herausgeberName'";
        }
        if (!empty($datum)) {
            $values = $this->komma($values);
            $columns = $this->komma($columns);
            $columns .= "datum";
            $values .= "'$datum'";
        }
        if (!empty($herausgeberOrt)) {
            $values = $this->komma($values);
            $columns = $this->komma($columns);
            $columns .= "herausgeberOrt";
            $values .= "'$herausgeberOrt'";
        }
        $query = mysqli_query($this->DB, "INSERT INTO literaturangaben(" . $columns . ") VALUES(" . $values . ") ");
        return $query;
    }

    /**
     * @param $persoenlichkeitID
     * @param $literaturangabenID
     * @return bool  Erbebnis der Abfrage true/false 1/""
     */
    public function addLiteraturangabezuPersoenlichkeit($persoenlichkeitID, $literaturangabenID)
    {
        $persoenlichkeitID = (int)$persoenlichkeitID;
        $literaturangabenID = (int)$literaturangabenID;
        $query = mysqli_query($this->DB, "INSERT INTO persoenlichkeitliteraturangaben(persoenlichkeitID,literaturangabenID) VALUES('" . $persoenlichkeitID . "','" . $literaturangabenID . "') ");
        return $query;
    }

    /**
     * @param $epoche
     * @param $name
     * @param $vorname
     * @param $kuenstlername
     * @param $profilbild
     * @param $titelbild
     * @param $geburtsdatum
     * @param $todesdatum
     * @param $geburtsort
     * @param $nationalitaet
     * @param $vater
     * @param $mutter
     * @param $textInhalt
     * @param $textQuelle
     * @param $textTitel
     * @param $textAutor
     * @param $beschreibungInhalt
     * @param $beschreibungQuelle
     * @param $zitatInhalt
     * @param $zitatDatum
     * @param $zitatAnlass
     * @param $zitatUrheber
     * @return bool|mysqli_result  Ergebnis der Abfrage
     */
    public function addPersoenlichkeit($epoche, $name, $vorname, $kuenstlername, $profilbild, $titelbild, $geburtsdatum, $todesdatum, $geburtsort, $nationalitaet, $vater, $mutter, $textInhalt, $textQuelle, $textTitel, $textAutor, $beschreibungInhalt, $beschreibungQuelle, $zitatInhalt, $zitatDatum, $zitatAnlass, $zitatUrheber)
    {
        $epoche = mysqli_escape_string($this->DB, htmlentities($epoche));
        $name = mysqli_escape_string($this->DB, htmlentities($name));
        $vorname = mysqli_escape_string($this->DB, htmlentities($vorname));
        $kuenstlername = mysqli_escape_string($this->DB, htmlentities($kuenstlername));
        $profilbild = (int)$profilbild;
        $titelbild = (int)$titelbild;
        $geburtsdatum = mysqli_escape_string($this->DB, htmlentities($geburtsdatum));
        $todesdatum = mysqli_escape_string($this->DB, htmlentities($todesdatum));
        $geburtsort = mysqli_escape_string($this->DB, htmlentities($geburtsort));
        $nationalitaet = mysqli_escape_string($this->DB, htmlentities($nationalitaet));
        $vater = mysqli_escape_string($this->DB, htmlentities($vater));
        $mutter = mysqli_escape_string($this->DB, htmlentities($mutter));
        $textInhalt = mysqli_escape_string($this->DB, htmlentities($textInhalt));
        $textQuelle = mysqli_escape_string($this->DB, htmlentities($textQuelle));
        $textTitel = mysqli_escape_string($this->DB, htmlentities($textTitel));
        $textAutor = mysqli_escape_string($this->DB, htmlentities($textAutor));
        $beschreibungInhalt = mysqli_escape_string($this->DB, htmlentities($beschreibungInhalt));
        $beschreibungQuelle = mysqli_escape_string($this->DB, htmlentities($beschreibungQuelle));
        $zitatAnlass = mysqli_escape_string($this->DB, htmlentities($zitatAnlass));
        $zitatDatum = mysqli_escape_string($this->DB, htmlentities($zitatDatum));
        $zitatInhalt = mysqli_escape_string($this->DB, htmlentities($zitatInhalt));
        $zitatUrheber = mysqli_escape_string($this->DB, htmlentities($zitatUrheber));

        $columns = "`epoche`,`name`,vorname,kuenstlername,profilbild,titelbild,geburtsdatum,todesdatum,geburtsort,nationalitaet,vater,mutter,textInhalt,textQuelle,textTitel,textAutor,beschreibungInhalt,beschreibungQuelle,zitatInhalt,zitatDatum,zitatAnlass,zitatUrheber";
        $values = "'$epoche','$name','$vorname','$kuenstlername','$profilbild','$titelbild','$geburtsdatum','$todesdatum','$geburtsort','$nationalitaet','$vater','$mutter','$textInhalt','$textQuelle','$textTitel','$textAutor','$beschreibungInhalt','$beschreibungQuelle','$zitatInhalt','$zitatDatum','$zitatAnlass','$zitatUrheber'";

        $query = mysqli_query($this->DB, "INSERT INTO persoenlichkeit($columns) VALUES($values) ");
        return $query;
    }
    //Einträge verändern
    //Einträge löschen
    //intern
    private function komma($string)
    {
        if (!empty($string)) {
            $string = $string . ",";
        }
        return $string;
    }
}

?>
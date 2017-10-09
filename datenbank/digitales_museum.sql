-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 09. Okt 2017 um 17:15
-- Server-Version: 10.1.22-MariaDB
-- PHP-Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `digitales_museum`
--
CREATE DATABASE IF NOT EXISTS `digitales_museum`
  DEFAULT CHARACTER SET latin1
  COLLATE latin1_swedish_ci;
USE `digitales_museum`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bild`
--

CREATE TABLE `bild` (
  `bildID`       INT(11)      NOT NULL,
  `beschreibung` varchar(300) NOT NULL,
  `datum`        DATE         NOT NULL,
  `quelle`       VARCHAR(100) NOT NULL,
  `titel`        VARCHAR(100) NOT NULL,
  `data`         LONGBLOB     NOT NULL,
  `datatype`     VARCHAR(20)  NOT NULL,
  `size`         INT(11)      NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `epoche`
--

CREATE TABLE `epoche` (
  `epocheID`    INT(11)      NOT NULL,
  `bezeichnung` VARCHAR(100) NOT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = latin1;

--
-- Daten für Tabelle `epoche`
--

INSERT INTO `epoche` (`epocheID`, `bezeichnung`) VALUES
  (3, 'Klassik'),
  (1, 'Moderne');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kategorie`
--

CREATE TABLE `kategorie` (
  `kategorieID` int(11) NOT NULL,
  `bezeichnung` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `kategorie`
--

INSERT INTO `kategorie` (`kategorieID`, `bezeichnung`) VALUES
  (1, 'Kategorie1'),
  (2, 'Kategorie2'),
  (3, 'KategorienTest'),
  (4, 'name');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `literaturangaben`
--

CREATE TABLE `literaturangaben` (
  `literaturangabenID` INT(11)      NOT NULL,
  `autor`              VARCHAR(100) NOT NULL,
  `titel`              VARCHAR(300) NOT NULL,
  `datum`              DATE         NOT NULL,
  `herausgeberName`    VARCHAR(100) NOT NULL,
  `herausgeberOrt`     VARCHAR(30)  NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `literaturangaben`
--

INSERT INTO `literaturangaben` (`literaturangabenID`, `autor`, `titel`, `datum`, `herausgeberName`, `herausgeberOrt`)
VALUES
  (2, 'David Koch', 'Eine Literatur', '2017-10-31', '', ''),
  (3, 'David Koch', 'Eine Literatur', '0000-00-00', 'DHBW', 'Stuttgart');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `persoenlichkeit`
--

CREATE TABLE `persoenlichkeit` (
  `persoenlichkeitID`  INT(11)        NOT NULL,
  `kuenstlername`      VARCHAR(30)    NOT NULL,
  `profilbild`         INT(11)        NOT NULL,
  `titelbild`          INT(11)        NOT NULL,
  `name`               VARCHAR(30)    NOT NULL,
  `vorname`            VARCHAR(30)    NOT NULL,
  `geburtsdatum`       DATE           NOT NULL,
  `todesdatum`         DATE           NOT NULL,
  `geburtsort`         VARCHAR(40)    NOT NULL,
  `nationalitaet`      VARCHAR(30)    NOT NULL,
  `vater`              VARCHAR(100)   NOT NULL,
  `mutter`             VARCHAR(100)   NOT NULL,
  `textInhalt`         VARCHAR(10000) NOT NULL,
  `textQuelle`         VARCHAR(100)   NOT NULL,
  `textTitel`          VARCHAR(100)   NOT NULL,
  `TextAutor`          VARCHAR(30)    NOT NULL,
  `beschreibungInhalt` varchar(10000) NOT NULL,
  `beschreibungQuelle` VARCHAR(100)   NOT NULL,
  `zitatInhalt`        VARCHAR(300)   NOT NULL,
  `zitatDatum`         DATE           NOT NULL,
  `zitatAnlass`        VARCHAR(1000)  NOT NULL,
  `zitatUrheber`       VARCHAR(30)    NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `persoenlichkeit`
--

INSERT INTO `persoenlichkeit` (`persoenlichkeitID`, `kuenstlername`, `profilbild`, `titelbild`, `name`, `vorname`, `geburtsdatum`, `todesdatum`, `geburtsort`, `nationalitaet`, `vater`, `mutter`, `textInhalt`, `textQuelle`, `textTitel`, `TextAutor`, `beschreibungInhalt`, `beschreibungQuelle`, `zitatInhalt`, `zitatDatum`, `zitatAnlass`, `zitatUrheber`)
VALUES
  (1, 'KÜNSTLERNAME', 1, 2, 'Name', 'VORNAME', '2017-10-01', '2017-10-02', '0', 'NATIONALITÄT', 'VATER', 'MUTTER',
                                                                                                         'INHALT LANGTEXT',
                                                                                                         'QUELLE LANGTEXT',
                                                                                                         'TITEL LANGTEXT',
                                                                                                         'AUTOR LANGTEXT',
                                                                                                         'KURZBESCHREIBUNG INHALT',
                                                                                                         'KURZBESCHREIBUNG QUELLE',
                                                                                                         'ZITAT INHALT',
                                                                                                         '2017-10-09',
                                                                                                         'ANLASS ZITAT',
   'URHEBER'),
  (2, 'DK', 1, 1, 'Koch', 'David', '1996-10-04', '0000-00-00', 'Lich', 'deutsch', 's', 'a', 'lalal', '', '', 'jemand',
                                                                                       '', '', '', '0000-00-00',
                                                                                       'nichts', 'ich');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `persoenlichkeitbild`
--

CREATE TABLE `persoenlichkeitbild` (
  `persoenlichkeitBildID` int(11) NOT NULL,
  `persoenlichkeitID` int(11) NOT NULL,
  `bildID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `persoenlichkeitepoche`
--

CREATE TABLE `persoenlichkeitepoche` (
  `persoenlichkeitEpocheID` INT(11) NOT NULL,
  `persoenlichkeitID`       INT(11) NOT NULL,
  `epocheID`                INT(11) NOT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `persoenlichkeitkategorie`
--

CREATE TABLE `persoenlichkeitkategorie` (
  `persoenlichkeitKategorieID` int(11) NOT NULL,
  `persoenlichkeitID` int(11) NOT NULL,
  `kategorieID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `persoenlichkeitkategorie`
--

INSERT INTO `persoenlichkeitkategorie` (`persoenlichkeitKategorieID`, `persoenlichkeitID`, `kategorieID`) VALUES
  (1, 1, 1),
  (2, 5, 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `persoenlichkeitliteraturangaben`
--

CREATE TABLE `persoenlichkeitliteraturangaben` (
  `persoenlichkeitLiteraturangabenID` int(11) NOT NULL,
  `persoenlichkeitID` int(11) NOT NULL,
  `literaturangabenID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `bild`
--
ALTER TABLE `bild`
  ADD PRIMARY KEY (`bildID`);
ALTER TABLE `bild`
  ADD FULLTEXT KEY `beschreibung` (`beschreibung`);

--
-- Indizes für die Tabelle `epoche`
--
ALTER TABLE `epoche`
  ADD PRIMARY KEY (`epocheID`),
  ADD UNIQUE KEY `bezeichnung` (`bezeichnung`);

--
-- Indizes für die Tabelle `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`kategorieID`),
  ADD UNIQUE KEY `bezeichnung` (`bezeichnung`);

--
-- Indizes für die Tabelle `literaturangaben`
--
ALTER TABLE `literaturangaben`
  ADD PRIMARY KEY (`literaturangabenID`);

--
-- Indizes für die Tabelle `persoenlichkeit`
--
ALTER TABLE `persoenlichkeit`
  ADD PRIMARY KEY (`persoenlichkeitID`);
ALTER TABLE `persoenlichkeit`
  ADD FULLTEXT KEY `textInhalt` (`textInhalt`);
ALTER TABLE `persoenlichkeit`
  ADD FULLTEXT KEY `textTitel` (`textTitel`);
ALTER TABLE `persoenlichkeit`
  ADD FULLTEXT KEY `beschreibungInhalt` (`beschreibungInhalt`);
ALTER TABLE `persoenlichkeit`
  ADD FULLTEXT KEY `zitatInhalt` (`zitatInhalt`);

--
-- Indizes für die Tabelle `persoenlichkeitbild`
--
ALTER TABLE `persoenlichkeitbild`
  ADD PRIMARY KEY (`persoenlichkeitBildID`),
  ADD UNIQUE KEY `persoenlichkeitID` (`persoenlichkeitID`),
  ADD UNIQUE KEY `persoenlichkeitID_2` (`persoenlichkeitID`, `bildID`);

--
-- Indizes für die Tabelle `persoenlichkeitepoche`
--
ALTER TABLE `persoenlichkeitepoche`
  ADD PRIMARY KEY (`persoenlichkeitEpocheID`),
  ADD UNIQUE KEY `persoenlichkeitID` (`persoenlichkeitID`, `epocheID`);

--
-- Indizes für die Tabelle `persoenlichkeitkategorie`
--
ALTER TABLE `persoenlichkeitkategorie`
  ADD PRIMARY KEY (`persoenlichkeitKategorieID`),
  ADD UNIQUE KEY `persoenlichkeitID` (`persoenlichkeitID`, `kategorieID`);

--
-- Indizes für die Tabelle `persoenlichkeitliteraturangaben`
--
ALTER TABLE `persoenlichkeitliteraturangaben`
  ADD PRIMARY KEY (`persoenlichkeitLiteraturangabenID`),
  ADD UNIQUE KEY `persoenlichkeitID` (`persoenlichkeitID`, `literaturangabenID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `epoche`
--
ALTER TABLE `epoche`
  MODIFY `epocheID` INT(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

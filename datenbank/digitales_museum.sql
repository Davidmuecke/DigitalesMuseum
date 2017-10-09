-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 07. Okt 2017 um 17:22
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
  `bildID`       int(11)      NOT NULL,
  `beschreibung` varchar(300) NOT NULL,
  `datum`        DATE         NOT NULL,
  `quelle`       varchar(100) NOT NULL,
  `titel`        VARCHAR(100) NOT NULL,
  `data`         longblob     NOT NULL,
  `datatype`     VARCHAR(20)  NOT NULL,
  `size`         INT(11)      NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `literaturangabenID` int(11)      NOT NULL,
  `autor`              VARCHAR(100) NOT NULL,
  `titel`              VARCHAR(300) NOT NULL,
  `datum`              date         NOT NULL,
  `herausgeberName`    varchar(100) NOT NULL,
  `herausgeberOrt`     varchar(30)  NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `literaturangaben`
--

INSERT INTO `literaturangaben` (`literaturangabenID`, `autor`, `titel`, `datum`, `herausgeberName`, `herausgeberOrt`)
VALUES
  (2, 'David Koch', 'Eine Literatur', '2017-10-31', '', ''),
  (3, 'David Koch', 'Eine Literatur', '0000-00-00', 'DHBW', 'Stuttgart'),
  (4, 'David Koch', 'Eine Literatur', '0000-00-00', 'DHBW', 'Stuttgart'),
  (5, '', '', '0000-00-00', '', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `persoenlichkeit`
--

CREATE TABLE `persoenlichkeit` (
  `persoenlichkeitID`  int(11)        NOT NULL,
  `epoche`             varchar(30)    NOT NULL,
  `kuenstlername`      varchar(30)    NOT NULL,
  `profilbild`         int(11)        NOT NULL,
  `titelbild`          int(11)        NOT NULL,
  `name`               varchar(30)    NOT NULL,
  `vorname`            varchar(30)    NOT NULL,
  `geburtsdatum`       date           NOT NULL,
  `todesdatum`         date           NOT NULL,
  `geburtsort`         VARCHAR(50)    NOT NULL,
  `nationalitaet`      varchar(30)    NOT NULL,
  `vater`              varchar(30)    NOT NULL,
  `mutter`             varchar(30)    NOT NULL,
  `textInhalt`         varchar(10000) NOT NULL,
  `textQuelle`         varchar(100)   NOT NULL,
  `textTitel`          varchar(100)   NOT NULL,
  `TextAutor`          varchar(30)    NOT NULL,
  `beschreibungInhalt` varchar(10000) NOT NULL,
  `beschreibungQuelle` varchar(100)   NOT NULL,
  `zitatInhalt`        VARCHAR(1000)  NOT NULL,
  `zitatDatum`         date           NOT NULL,
  `zitatAnlass`        varchar(1000)  NOT NULL,
  `zitatUrheber`       VARCHAR(100)   NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `persoenlichkeit`
--

INSERT INTO `persoenlichkeit` (`persoenlichkeitID`, `epoche`, `kuenstlername`, `profilbild`, `titelbild`, `name`, `vorname`, `geburtsdatum`, `todesdatum`, `geburtsort`, `nationalitaet`, `vater`, `mutter`, `textInhalt`, `textQuelle`, `textTitel`, `TextAutor`, `beschreibungInhalt`, `beschreibungQuelle`, `zitatInhalt`, `zitatDatum`, `zitatAnlass`, `zitatUrheber`)
VALUES
  (1, 'EPOCHE', 'KÜNSTLERNAME', 1, 2, 'Name', 'VORNAME', '2017-10-01', '2017-10-02', '0', 'NATIONALITÄT', 'VATER',
                                                                                                          'MUTTER',
                                                                                                          'INHALT LANGTEXT',
                                                                                                          'QUELLE LANGTEXT',
                                                                                                          'TITEL LANGTEXT',
                                                                                                          'AUTOR LANGTEXT',
                                                                                                          'KURZBESCHREIBUNG INHALT',
                                                                                                          'KURZBESCHREIBUNG QUELLE',
                                                                                                          'ZITAT INHALT',
                                                                                                          '2017-10-09',
   'ANLASS ZITAT', 'URHEBER'),
  (2, 'Moderne', 'DK', 1, 1, 'Koch', 'David', '1996-10-04', '0000-00-00', 'Lich', 'deutsch', 's', 'a', 'lalal', '', '',
                                                                                             'jemand', '', '', '',
                                                                                             '0000-00-00', 'nichts',
   'ich'),
  (3, 'Moderne', 'DK', 1, 1, 'Koch', 'David', '1996-10-04', '0000-00-00', 'Lich', 'deutsch', 's', 'a', 'lalal', '', '',
                                                                                             'jemand', '', '', '',
                                                                                             '0000-00-00', 'nichts',
   'ich');

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
  (4, 1, 4),
  (2, 5, 2),
  (3, 1111, 2);

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
  ADD FULLTEXT KEY `beschreibungInhalt` (`beschreibungInhalt`);
ALTER TABLE `persoenlichkeit`
  ADD FULLTEXT KEY `zitatInhalt` (`zitatInhalt`);

--
-- Indizes für die Tabelle `persoenlichkeitbild`
--
ALTER TABLE `persoenlichkeitbild`
  ADD PRIMARY KEY (`persoenlichkeitBildID`),
  ADD UNIQUE KEY `persoenlichkeitID` (`persoenlichkeitID`, `bildID`);

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
-- AUTO_INCREMENT für Tabelle `bild`
--
ALTER TABLE `bild`
  MODIFY `bildID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `kategorieID` INT(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 6;
--
-- AUTO_INCREMENT für Tabelle `literaturangaben`
--
ALTER TABLE `literaturangaben`
  MODIFY `literaturangabenID` INT(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 6;
--
-- AUTO_INCREMENT für Tabelle `persoenlichkeit`
--
ALTER TABLE `persoenlichkeit`
  MODIFY `persoenlichkeitID` INT(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 6;
--
-- AUTO_INCREMENT für Tabelle `persoenlichkeitbild`
--
ALTER TABLE `persoenlichkeitbild`
  MODIFY `persoenlichkeitBildID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `persoenlichkeitkategorie`
--
ALTER TABLE `persoenlichkeitkategorie`
  MODIFY `persoenlichkeitKategorieID` INT(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 6;
--
-- AUTO_INCREMENT für Tabelle `persoenlichkeitliteraturangaben`
--
ALTER TABLE `persoenlichkeitliteraturangaben`
  MODIFY `persoenlichkeitLiteraturangabenID` INT(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 24. Okt 2017 um 16:23
-- Server-Version: 5.7.20-0ubuntu0.16.04.1
-- PHP-Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `digitales_museum`
--
CREATE DATABASE IF NOT EXISTS `digitales_museum` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `digitales_museum`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bild`
--

CREATE TABLE `bild` (
  `bildID` int(11) NOT NULL,
  `beschreibung` varchar(300) NOT NULL,
  `datum` date NOT NULL,
  `quelle` varchar(100) NOT NULL,
  `titel` varchar(100) NOT NULL,
  `data` longblob NOT NULL,
  `datatype` varchar(20) NOT NULL,
  `size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `epoche`
--

CREATE TABLE `epoche` (
  `epocheID` int(11) NOT NULL,
  `bezeichnung` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kategorie`
--

CREATE TABLE `kategorie` (
  `kategorieID` int(11) NOT NULL,
  `bezeichnung` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `literaturangaben`
--

CREATE TABLE `literaturangaben` (
  `literaturangabenID` int(11) NOT NULL,
  `autor` varchar(100) NOT NULL,
  `titel` varchar(300) NOT NULL,
  `datum` date NOT NULL,
  `herausgeberName` varchar(100) NOT NULL,
  `herausgeberOrt` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `persoenlichkeit`
--

CREATE TABLE `persoenlichkeit` (
  `persoenlichkeitID` int(11) NOT NULL,
  `kuenstlername` varchar(30) NOT NULL,
  `profilbild` int(11) NOT NULL,
  `titelbild` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `vorname` varchar(30) NOT NULL,
  `geburtsdatum` date DEFAULT NULL,
  `todesdatum` date DEFAULT NULL,
  `geburtsort` varchar(40) NOT NULL,
  `nationalitaet` varchar(30) NOT NULL,
  `vater` varchar(100) NOT NULL,
  `mutter` varchar(100) NOT NULL,
  `textInhalt` varchar(10000) NOT NULL,
  `textQuelle` varchar(100) NOT NULL,
  `textTitel` varchar(100) NOT NULL,
  `TextAutor` varchar(30) NOT NULL,
  `beschreibungInhalt` varchar(10000) NOT NULL,
  `beschreibungQuelle` varchar(100) NOT NULL,
  `zitatInhalt` varchar(300) NOT NULL,
  `zitatDatum` date DEFAULT NULL,
  `zitatAnlass` varchar(1000) NOT NULL,
  `zitatUrheber` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `persoenlichkeitEpocheID` int(11) NOT NULL,
  `persoenlichkeitID` int(11) NOT NULL,
  `epocheID` int(11) NOT NULL
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

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `persoenlichkeitliteraturangaben`
--

CREATE TABLE `persoenlichkeitliteraturangaben` (
  `persoenlichkeitLiteraturangabenID` int(11) NOT NULL,
  `persoenlichkeitID` int(11) NOT NULL,
  `literaturangabenID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `persoenlichkeitpersoenlichkeit`
--

CREATE TABLE `persoenlichkeitpersoenlichkeit` (
  `persoenlichkeitPersoenlichkeitID` int(11) NOT NULL,
  `persoenlichkeit1ID` int(11) NOT NULL,
  `persoenlichkeit2ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `bild`
--
ALTER TABLE `bild`
  ADD PRIMARY KEY (`bildID`);
ALTER TABLE `bild` ADD FULLTEXT KEY `beschreibung` (`beschreibung`);

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
ALTER TABLE `persoenlichkeit` ADD FULLTEXT KEY `textInhalt` (`textInhalt`);
ALTER TABLE `persoenlichkeit` ADD FULLTEXT KEY `textTitel` (`textTitel`);
ALTER TABLE `persoenlichkeit` ADD FULLTEXT KEY `beschreibungInhalt` (`beschreibungInhalt`);
ALTER TABLE `persoenlichkeit` ADD FULLTEXT KEY `zitatInhalt` (`zitatInhalt`);

--
-- Indizes für die Tabelle `persoenlichkeitbild`
--
ALTER TABLE `persoenlichkeitbild`
  ADD PRIMARY KEY (`persoenlichkeitBildID`),
  ADD UNIQUE KEY `persoenlichkeitID` (`persoenlichkeitID`),
  ADD UNIQUE KEY `persoenlichkeitID_2` (`persoenlichkeitID`,`bildID`);

--
-- Indizes für die Tabelle `persoenlichkeitepoche`
--
ALTER TABLE `persoenlichkeitepoche`
  ADD PRIMARY KEY (`persoenlichkeitEpocheID`),
  ADD UNIQUE KEY `persoenlichkeitID` (`persoenlichkeitID`,`epocheID`);

--
-- Indizes für die Tabelle `persoenlichkeitkategorie`
--
ALTER TABLE `persoenlichkeitkategorie`
  ADD PRIMARY KEY (`persoenlichkeitKategorieID`),
  ADD UNIQUE KEY `persoenlichkeitID` (`persoenlichkeitID`,`kategorieID`);

--
-- Indizes für die Tabelle `persoenlichkeitliteraturangaben`
--
ALTER TABLE `persoenlichkeitliteraturangaben`
  ADD PRIMARY KEY (`persoenlichkeitLiteraturangabenID`),
  ADD UNIQUE KEY `persoenlichkeitID` (`persoenlichkeitID`,`literaturangabenID`);

--
-- Indizes für die Tabelle `persoenlichkeitpersoenlichkeit`
--
ALTER TABLE `persoenlichkeitpersoenlichkeit`
  ADD PRIMARY KEY (`persoenlichkeitPersoenlichkeitID`),
  ADD UNIQUE KEY `persoenlichkeitID` (`persoenlichkeit1ID`,`persoenlichkeit2ID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `bild`
--
ALTER TABLE `bild`
  MODIFY `bildID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT für Tabelle `epoche`
--
ALTER TABLE `epoche`
  MODIFY `epocheID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT für Tabelle `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `kategorieID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT für Tabelle `literaturangaben`
--
ALTER TABLE `literaturangaben`
  MODIFY `literaturangabenID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;
--
-- AUTO_INCREMENT für Tabelle `persoenlichkeit`
--
ALTER TABLE `persoenlichkeit`
  MODIFY `persoenlichkeitID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT für Tabelle `persoenlichkeitbild`
--
ALTER TABLE `persoenlichkeitbild`
  MODIFY `persoenlichkeitBildID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT für Tabelle `persoenlichkeitepoche`
--
ALTER TABLE `persoenlichkeitepoche`
  MODIFY `persoenlichkeitEpocheID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;
--
-- AUTO_INCREMENT für Tabelle `persoenlichkeitkategorie`
--
ALTER TABLE `persoenlichkeitkategorie`
  MODIFY `persoenlichkeitKategorieID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;
--
-- AUTO_INCREMENT für Tabelle `persoenlichkeitliteraturangaben`
--
ALTER TABLE `persoenlichkeitliteraturangaben`
  MODIFY `persoenlichkeitLiteraturangabenID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;
--
-- AUTO_INCREMENT für Tabelle `persoenlichkeitpersoenlichkeit`
--
ALTER TABLE `persoenlichkeitpersoenlichkeit`
  MODIFY `persoenlichkeitPersoenlichkeitID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

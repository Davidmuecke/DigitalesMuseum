-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 06. Okt 2017 um 10:51
-- Server-Version: 10.1.16-MariaDB
-- PHP-Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `digitales museum`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bild`
--

CREATE TABLE `bild` (
  `bildID` int(11) NOT NULL,
  `beschreibung` varchar(300) NOT NULL,
  `datum` varchar(30) NOT NULL,
  `quelle` varchar(100) NOT NULL,
  `titel` varchar(30) NOT NULL,
  `data` longblob NOT NULL,
  `datatype` varchar(20) NOT NULL
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
  `autor` varchar(30) NOT NULL,
  `titel` varchar(100) NOT NULL,
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
  `epoche` varchar(30) NOT NULL,
  `kuenstlername` varchar(30) NOT NULL,
  `profilbild` int(11) NOT NULL,
  `titelbild` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `vorname` varchar(30) NOT NULL,
  `geburtsdatum` date NOT NULL,
  `todesdatum` date NOT NULL,
  `geburtsort` int(11) NOT NULL,
  `nationalitaet` varchar(30) NOT NULL,
  `vater` varchar(30) NOT NULL,
  `mutter` varchar(30) NOT NULL,
  `textInhalt` varchar(10000) NOT NULL,
  `textQuelle` varchar(100) NOT NULL,
  `textTitel` varchar(100) NOT NULL,
  `TextAutor` varchar(30) NOT NULL,
  `beschreibungInhalt` varchar(10000) NOT NULL,
  `beschreibungQuelle` varchar(100) NOT NULL,
  `zitatInhalt` varchar(300) NOT NULL,
  `zitatDatum` date NOT NULL,
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

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `bild`
--
ALTER TABLE `bild`
  ADD PRIMARY KEY (`bildID`);

--
-- Indizes für die Tabelle `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`kategorieID`);

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

--
-- Indizes für die Tabelle `persoenlichkeitbild`
--
ALTER TABLE `persoenlichkeitbild`
  ADD PRIMARY KEY (`persoenlichkeitBildID`);

--
-- Indizes für die Tabelle `persoenlichkeitkategorie`
--
ALTER TABLE `persoenlichkeitkategorie`
  ADD PRIMARY KEY (`persoenlichkeitKategorieID`);

--
-- Indizes für die Tabelle `persoenlichkeitliteraturangaben`
--
ALTER TABLE `persoenlichkeitliteraturangaben`
  ADD PRIMARY KEY (`persoenlichkeitLiteraturangabenID`);

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
  MODIFY `kategorieID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `literaturangaben`
--
ALTER TABLE `literaturangaben`
  MODIFY `literaturangabenID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `persoenlichkeit`
--
ALTER TABLE `persoenlichkeit`
  MODIFY `persoenlichkeitID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `persoenlichkeitbild`
--
ALTER TABLE `persoenlichkeitbild`
  MODIFY `persoenlichkeitBildID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `persoenlichkeitkategorie`
--
ALTER TABLE `persoenlichkeitkategorie`
  MODIFY `persoenlichkeitKategorieID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `persoenlichkeitliteraturangaben`
--
ALTER TABLE `persoenlichkeitliteraturangaben`
  MODIFY `persoenlichkeitLiteraturangabenID` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

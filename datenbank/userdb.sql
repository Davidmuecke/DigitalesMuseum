--
-- Datenbank: `userdb`
--

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE DATABASE IF NOT EXISTS `userdb`
  DEFAULT CHARACTER SET latin1
  COLLATE latin1_swedish_ci;
USE `userdb`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `userID`       int(11)      NOT NULL,
  `mail`         varchar(30)  NOT NULL,
  `password`     varchar(300)  NOT NULL,
  `username`      varchar(30)  NOT NULL,
  `name`         varchar(30)  NOT NULL,
  `vorname`      varchar(30)  NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT;

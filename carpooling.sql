-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generato il: Nov 13, 2013 alle 17:04
-- Versione del server: 5.5.27
-- Versione PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `carpooling`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `guidatore`
--

CREATE TABLE IF NOT EXISTS `guidatore` (
  `num_viaggio` int(11) NOT NULL,
  `username_guidatore` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `targa` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `media_feedback` float DEFAULT NULL,
  `commento` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`num_viaggio`),
  KEY `username_guidatore` (`username_guidatore`),
  KEY `targa` (`targa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- RELATIONS FOR TABLE `guidatore`:
--   `username_guidatore`
--       `utente` -> `username`
--   `targa`
--       `veicolo` -> `targa`
--   `num_viaggio`
--       `viaggio` -> `num_viaggio`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `passeggero`
--

CREATE TABLE IF NOT EXISTS `passeggero` (
  `username_passeggero` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `num_viaggio` int(11) NOT NULL,
  `feedback_pass` float DEFAULT NULL,
  `commento_pass` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `feedback_guid` float DEFAULT NULL,
  `commento_guid` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`username_passeggero`,`num_viaggio`),
  KEY `num_viaggio` (`num_viaggio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- RELATIONS FOR TABLE `passeggero`:
--   `username_passeggero`
--       `utente` -> `username`
--   `num_viaggio`
--       `viaggio` -> `num_viaggio`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE IF NOT EXISTS `utente` (
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cognome` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `data_nascita` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `citta_nascita` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `citta_residenza` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `sesso` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `cod_fiscale` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `num_telefono` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stato_attivazione` enum('attivo','non_attivo','','') COLLATE utf8_unicode_ci DEFAULT NULL,
  `codice_attivazione` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `immagine_profilo` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `veicolo`
--

CREATE TABLE IF NOT EXISTS `veicolo` (
  `targa` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `username_proprietario` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `num_posti` int(11) NOT NULL,
  `carburante` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `consumo_medio` float NOT NULL,
  PRIMARY KEY (`targa`),
  KEY `username_proprietario` (`username_proprietario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- RELATIONS FOR TABLE `veicolo`:
--   `username_proprietario`
--       `utente` -> `username`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `viaggio`
--

CREATE TABLE IF NOT EXISTS `viaggio` (
  `num_viaggio` int(11) NOT NULL AUTO_INCREMENT,
  `citta_partenza` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_partenza` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `citta_arrivo` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `costo` int(11) NOT NULL,
  `posti_disponibili` int(11) NOT NULL,
  `note` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`num_viaggio`),
  UNIQUE KEY `num_viaggio` (`num_viaggio`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=59 ;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `guidatore`
--
ALTER TABLE `guidatore`
  ADD CONSTRAINT `guidatore_ibfk_1` FOREIGN KEY (`username_guidatore`) REFERENCES `utente` (`username`),
  ADD CONSTRAINT `guidatore_ibfk_2` FOREIGN KEY (`targa`) REFERENCES `veicolo` (`targa`),
  ADD CONSTRAINT `guidatore_ibfk_3` FOREIGN KEY (`num_viaggio`) REFERENCES `viaggio` (`num_viaggio`);

--
-- Limiti per la tabella `passeggero`
--
ALTER TABLE `passeggero`
  ADD CONSTRAINT `passeggero_ibfk_1` FOREIGN KEY (`username_passeggero`) REFERENCES `utente` (`username`),
  ADD CONSTRAINT `passeggero_ibfk_2` FOREIGN KEY (`num_viaggio`) REFERENCES `viaggio` (`num_viaggio`);

--
-- Limiti per la tabella `veicolo`
--
ALTER TABLE `veicolo`
  ADD CONSTRAINT `veicolo_ibfk_1` FOREIGN KEY (`username_proprietario`) REFERENCES `utente` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generato il: Gen 08, 2014 alle 11:27
-- Versione del server: 5.5.27
-- Versione PHP: 5.4.7

DROP DATABASE IF EXISTS carpooling;
CREATE DATABASE carpooling;
USE carpooling;

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
  `voto_totale` int(11) NOT NULL DEFAULT '0',
  `num_voti` int(11) NOT NULL DEFAULT '0',
  `commento` varchar(300) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`num_viaggio`),
  KEY `username_guidatore` (`username_guidatore`),
  KEY `targa` (`targa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `guidatore`
--

INSERT INTO `guidatore` (`num_viaggio`, `username_guidatore`, `targa`, `voto_totale`, `num_voti`, `commento`) VALUES
(16, 'admin', '1000', 0, 0, '');

-- --------------------------------------------------------

--
-- Struttura della tabella `passeggero`
--

CREATE TABLE IF NOT EXISTS `passeggero` (
  `username_passeggero` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `num_viaggio` int(11) NOT NULL,
  `feedback_guid` float DEFAULT '0',
  `commento_guid` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `votato` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`username_passeggero`,`num_viaggio`),
  KEY `num_viaggio` (`num_viaggio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `passeggero`
--

INSERT INTO `passeggero` (`username_passeggero`, `num_viaggio`, `feedback_guid`, `commento_guid`, `votato`) VALUES
('vaan46', 16, 0, '', 0);

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
  `stato_attivazione` tinyint(1) DEFAULT NULL,
  `codice_attivazione` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amministratore` tinyint(1) NOT NULL DEFAULT '0',
  `immagine_profilo` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`username`, `password`, `nome`, `cognome`, `data_nascita`, `citta_nascita`, `citta_residenza`, `sesso`, `cod_fiscale`, `email`, `num_telefono`, `stato_attivazione`, `codice_attivazione`, `amministratore`, `immagine_profilo`) VALUES
('admin', 'admin', 'admin', 'admin', '1991-01-01', 'pescara', 'pescara', 'm', 'admin', 'admin@admin.it', '33333333', 1, '', 1, 'img/m_imgprofilo.jpg'),
('samael', 'god', 'samael', 'punitore', '1587-01-01', 'hbb', 'jkkju', 'm', 'hio', 'jkhui', '', 1, '', 0, 'img/m_imgprofilo.jpg'),
('stefano', '0000', 'stefano', 'alt', '1991-05-10', 'roma', 'roma', 'm', 'kjhi', 'hhi', '', 1, '', 0, 'img/m_imgprofilo.jpg'),
('vaan46', '1234', 'daniele', 'ciambrone', '1991-08-17', 'laquila', 'laquila', 'm', 'nkhi', 'hvjvi', '', 1, '', 0, 'img/m_imgprofilo.jpg');

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
  `attuale` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`targa`),
  KEY `username_proprietario` (`username_proprietario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `veicolo`
--

INSERT INTO `veicolo` (`targa`, `username_proprietario`, `tipo`, `num_posti`, `carburante`, `consumo_medio`, `attuale`) VALUES
('', 'samael', '', 0, '', 0, 1),
('0', 'samael', '0', 0, '0', 0, 1),
('1', 'samael', '1', 1, '1', 1, 1),
('10', 'samael', '10', 10, '10', 10, 1),
('100', 'samael', '100', 100, '100', 100, 1),
('1000', 'admin', '', 5, '', 0, 1),
('11', 'samael', '11', 11, '11', 11, 1),
('1112', 'admin', 'qqq', 4, 'eee', 5, 1),
('11233', 'admin', 'erfwf', 3, 'bee', 5, 1),
('1234', 'vaan46', 'mazda', 4, 'benzina', 13, 0),
('13', 'samael', '13', 13, '13', 13, 1),
('132', 'vaan46', '313', 2342, '242', 12321, 1),
('14', 'samael', '14', 14, '14', 14, 1),
('15', 'samael', '15', 15, '15', 15, 1),
('16', 'samael', '16', 16, '16', 16, 1),
('2', 'samael', '1', 1, '1', 2, 1),
('20', 'samael', '20', 20, '20', 20, 1),
('3', 'samael', '3', 3, '3', 3, 1),
('38', 'samael', '38', 38, '38', 38, 1),
('4', 'samael', '4', 4, '4', 4, 1),
('5', 'samael', '5', 5, '5', 5, 1),
('6', 'samael', '6', 6, '6', 6, 1),
('66', 'samael', '1', 5, '1', 1, 1),
('666', 'samael', 'tipo', 6, 'gpl', 5, 1),
('7', 'samael', '7', 7, '7', 7, 1),
('77', 'samael', '2', 5, '2', 3, 1),
('8', 'samael', '8', 8, '8', 8, 1),
('9', 'samael', '9', 9, '9', 9, 1),
('aaaaaa', 'admin', '1', 4, 'benzina', 12, 1),
('fanculo01', 'samael', '0', 4, 'ok', 4, 1),
('samael1', 'samael', 'berlina', 5, 'benzina', 20, 1),
('samael10', 'samael', '2', 3, 'e', 3, 1),
('samael2', 'samael', 'punitrice', 4, 'etanolo', 10, 1),
('samael3', 'samael', 'ok', 3, 'buono', 2, 1),
('samael4', 'samael', '1', 1, 'ok', 1, 1),
('samael6', 'samael', '6', 6, '6', 6, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `viaggio`
--

CREATE TABLE IF NOT EXISTS `viaggio` (
  `num_viaggio` int(11) NOT NULL AUTO_INCREMENT,
  `citta_partenza` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_partenza` date DEFAULT NULL,
  `citta_arrivo` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `costo` int(11) NOT NULL,
  `posti_disponibili` int(11) NOT NULL,
  `note` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`num_viaggio`),
  UNIQUE KEY `num_viaggio` (`num_viaggio`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Dump dei dati per la tabella `viaggio`
--

INSERT INTO `viaggio` (`num_viaggio`, `citta_partenza`, `data_partenza`, `citta_arrivo`, `costo`, `posti_disponibili`, `note`) VALUES
(12, 'pescara', '2013-12-12', 'roma', 10, 3, 'niente'),
(16, 'roma', '2014-01-14', 'milano', 10, 4, '');

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `guidatore`
--
ALTER TABLE `guidatore`
  ADD CONSTRAINT `guidatore_ibfk_1` FOREIGN KEY (`username_guidatore`) REFERENCES `utente` (`username`),
  ADD CONSTRAINT `guidatore_ibfk_2` FOREIGN KEY (`targa`) REFERENCES `veicolo` (`targa`),
  ADD CONSTRAINT `guidatore_ibfk_4` FOREIGN KEY (`num_viaggio`) REFERENCES `viaggio` (`num_viaggio`) ON DELETE CASCADE;

--
-- Limiti per la tabella `passeggero`
--
ALTER TABLE `passeggero`
  ADD CONSTRAINT `passeggero_ibfk_1` FOREIGN KEY (`username_passeggero`) REFERENCES `utente` (`username`),
  ADD CONSTRAINT `passeggero_ibfk_3` FOREIGN KEY (`num_viaggio`) REFERENCES `viaggio` (`num_viaggio`) ON DELETE CASCADE;

--
-- Limiti per la tabella `veicolo`
--
ALTER TABLE `veicolo`
  ADD CONSTRAINT `veicolo_ibfk_1` FOREIGN KEY (`username_proprietario`) REFERENCES `utente` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

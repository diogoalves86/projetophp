
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 17, 2015 at 04:22 PM
-- Server version: 10.0.20-MariaDB
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `u993183977_adm`
--

-- --------------------------------------------------------

--
-- Table structure for table `Aluno_Turma`
--

CREATE TABLE IF NOT EXISTS `Aluno_Turma` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aluno_id` int(11) NOT NULL,
  `turma_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `aluno_id` (`aluno_id`,`turma_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Disciplina`
--

CREATE TABLE IF NOT EXISTS `Disciplina` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `Disciplina`
--

INSERT INTO `Disciplina` (`id`, `nome`) VALUES
(1, 'Educação Física'),
(2, 'Física'),
(3, 'Espanhol'),
(4, 'Matemática');

-- --------------------------------------------------------

--
-- Table structure for table `Nota`
--

CREATE TABLE IF NOT EXISTS `Nota` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `primeira_certificacao` int(12) DEFAULT NULL,
  `segunda_certificacao` int(12) DEFAULT NULL,
  `terceira_certificacao` int(12) DEFAULT NULL,
  `primeira_recuperacao` int(12) DEFAULT NULL,
  `segunda_recuperacao` int(12) DEFAULT NULL,
  `terceira_recuperacao` int(12) DEFAULT NULL,
  `disciplina_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `disciplina_id` (`disciplina_id`,`usuario_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Professor_Disciplina`
--

CREATE TABLE IF NOT EXISTS `Professor_Disciplina` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `professor_id` int(11) NOT NULL,
  `disciplina_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_id` (`professor_id`,`disciplina_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Regra`
--

CREATE TABLE IF NOT EXISTS `Regra` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `Regra`
--

INSERT INTO `Regra` (`id`, `nome`) VALUES
(1, 'ADMIN'),
(2, 'ALUNO'),
(3, 'PROFESSOR');

-- --------------------------------------------------------

--
-- Table structure for table `Turma`
--

CREATE TABLE IF NOT EXISTS `Turma` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Usuario`
--

CREATE TABLE IF NOT EXISTS `Usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cpf` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `matricula` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `nivel` int(11) NOT NULL,
  `ativo` int(11) NOT NULL,
  `email` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `nivel` (`nivel`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `Usuario`
--

INSERT INTO `Usuario` (`id`, `nome`, `cpf`, `matricula`, `nivel`, `ativo`, `email`, `senha`) VALUES
(2, 'Diogo', '12221222221', '12345678', 1, 1, 'diogo@diogo.com', '1234');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

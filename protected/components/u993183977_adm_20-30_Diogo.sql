-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 19, 2015 at 08:30 PM
-- Server version: 5.5.46-0ubuntu0.14.04.2
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u993183977_adm`
--

-- --------------------------------------------------------

--
-- Table structure for table `Aluno_Turma`
--

CREATE TABLE `Aluno_Turma` (
  `id` int(11) NOT NULL,
  `aluno_id` int(11) NOT NULL,
  `turma_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Aluno_Turma`
--

INSERT INTO `Aluno_Turma` (`id`, `aluno_id`, `turma_id`) VALUES
(16, 6, 1),
(17, 8, 1),
(18, 9, 1),
(15, 12, 1),
(19, 13, 3);

-- --------------------------------------------------------

--
-- Table structure for table `Disciplina`
--

CREATE TABLE `Disciplina` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Disciplina`
--

INSERT INTO `Disciplina` (`id`, `nome`) VALUES
(1, 'Educação Física'),
(2, 'Física'),
(3, 'Espanhol'),
(5, 'Matemática'),
(6, 'Química');

-- --------------------------------------------------------

--
-- Table structure for table `Nota`
--

CREATE TABLE `Nota` (
  `id` int(11) NOT NULL,
  `primeira_certificacao` int(12) DEFAULT NULL,
  `segunda_certificacao` int(12) DEFAULT NULL,
  `terceira_certificacao` int(12) DEFAULT NULL,
  `primeira_recuperacao` int(12) DEFAULT NULL,
  `segunda_recuperacao` int(12) DEFAULT NULL,
  `terceira_recuperacao` int(12) DEFAULT NULL,
  `disciplina_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Nota`
--

INSERT INTO `Nota` (`id`, `primeira_certificacao`, `segunda_certificacao`, `terceira_certificacao`, `primeira_recuperacao`, `segunda_recuperacao`, `terceira_recuperacao`, `disciplina_id`, `usuario_id`) VALUES
(16, 10, 9, 8, 7, 7, 6, 5, 6),
(17, 10, 10, 10, NULL, NULL, NULL, 5, 12),
(18, 5, 7, 10, NULL, NULL, NULL, 5, 8),
(19, 7, 5, 8, NULL, 8, NULL, 5, 9),
(20, 10, 9, 10, NULL, NULL, NULL, 5, 13);

-- --------------------------------------------------------

--
-- Table structure for table `Professor_Disciplina`
--

CREATE TABLE `Professor_Disciplina` (
  `id` int(11) NOT NULL,
  `professor_id` int(11) NOT NULL,
  `disciplina_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Professor_Disciplina`
--

INSERT INTO `Professor_Disciplina` (`id`, `professor_id`, `disciplina_id`) VALUES
(4, 10, 5),
(5, 11, 6);

-- --------------------------------------------------------

--
-- Table structure for table `Professor_Turma`
--

CREATE TABLE `Professor_Turma` (
  `id` int(11) NOT NULL,
  `professor_id` int(11) NOT NULL,
  `turma_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Professor_Turma`
--

INSERT INTO `Professor_Turma` (`id`, `professor_id`, `turma_id`) VALUES
(6, 8, 3),
(5, 10, 1),
(7, 10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `Regra`
--

CREATE TABLE `Regra` (
  `id` int(11) NOT NULL,
  `nome` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Regra`
--

INSERT INTO `Regra` (`id`, `nome`) VALUES
(1, 'Administração'),
(2, 'Aluno'),
(3, 'Professor');

-- --------------------------------------------------------

--
-- Table structure for table `Turma`
--

CREATE TABLE `Turma` (
  `id` int(11) NOT NULL,
  `nome` int(20) NOT NULL,
  `turno` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Turma`
--

INSERT INTO `Turma` (`id`, `nome`, `turno`) VALUES
(11, 10, 'Integrado'),
(3, 108, 'Tarde'),
(2, 303, 'Manhã'),
(1, 307, 'Integrado'),
(5, 405, 'Manhã'),
(4, 606, 'Noite'),
(6, 608, 'Tarde');

-- --------------------------------------------------------

--
-- Table structure for table `Usuario`
--

CREATE TABLE `Usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cpf` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `matricula` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `nivel` int(11) NOT NULL,
  `ativo` int(11) DEFAULT '0',
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Usuario`
--

INSERT INTO `Usuario` (`id`, `nome`, `cpf`, `matricula`, `nivel`, `ativo`, `email`, `senha`) VALUES
(4, 'admin', '12221222', '12345678', 1, 1, 'admin@admin.com', '123'),
(6, 'Nathália', '21212121212', '87654321', 2, 1, 'nathalia@amaphp.com', 'odeioruby'),
(7, 'Ricardo', '123667667', '23145443', 3, 1, 'rica@filosofia.com', 'filosofia'),
(8, 'Agnes', '990909090', '9090909090', 2, 1, 'agnes@naocara.com', '123'),
(9, 'Sérchô', '89899898', '8998989', 2, 1, 'sercho@louder.com', '123'),
(10, 'tia emilia\r\n', '1212121121', '1132132121123123', 3, 0, 'tiaemilia@gmail.com', 'log10'),
(11, 'Carlos', '009909090909', '09009090909', 3, 1, 'carlos@quimica.com', '1234'),
(12, 'Diogo Alves', '12345678', '1211212112', 2, 1, 'diogo@diogo.com', '123'),
(13, 'Yngrid ', '232323232', '222323223', 2, 1, 'yngrid@yngrid.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Aluno_Turma`
--
ALTER TABLE `Aluno_Turma`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `aluno_id_2` (`aluno_id`,`turma_id`),
  ADD UNIQUE KEY `aluno_id_3` (`aluno_id`,`turma_id`),
  ADD KEY `aluno_id` (`aluno_id`,`turma_id`),
  ADD KEY `turma_id` (`turma_id`);

--
-- Indexes for table `Disciplina`
--
ALTER TABLE `Disciplina`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Nota`
--
ALTER TABLE `Nota`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `disciplina_id_2` (`disciplina_id`,`usuario_id`),
  ADD KEY `disciplina_id` (`disciplina_id`,`usuario_id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indexes for table `Professor_Disciplina`
--
ALTER TABLE `Professor_Disciplina`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `professor_id` (`professor_id`,`disciplina_id`),
  ADD KEY `usuario_id` (`professor_id`,`disciplina_id`),
  ADD KEY `disciplina_id` (`disciplina_id`);

--
-- Indexes for table `Professor_Turma`
--
ALTER TABLE `Professor_Turma`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `professor_id_2` (`professor_id`,`turma_id`),
  ADD KEY `professor_id` (`professor_id`),
  ADD KEY `turma_id` (`turma_id`);

--
-- Indexes for table `Regra`
--
ALTER TABLE `Regra`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Turma`
--
ALTER TABLE `Turma`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nome` (`nome`,`turno`);

--
-- Indexes for table `Usuario`
--
ALTER TABLE `Usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `nivel` (`nivel`),
  ADD KEY `nivel_2` (`nivel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Aluno_Turma`
--
ALTER TABLE `Aluno_Turma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `Disciplina`
--
ALTER TABLE `Disciplina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `Nota`
--
ALTER TABLE `Nota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `Professor_Disciplina`
--
ALTER TABLE `Professor_Disciplina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `Professor_Turma`
--
ALTER TABLE `Professor_Turma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `Regra`
--
ALTER TABLE `Regra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `Turma`
--
ALTER TABLE `Turma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `Usuario`
--
ALTER TABLE `Usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Aluno_Turma`
--
ALTER TABLE `Aluno_Turma`
  ADD CONSTRAINT `Aluno_Turma_ibfk_1` FOREIGN KEY (`aluno_id`) REFERENCES `Usuario` (`id`),
  ADD CONSTRAINT `Aluno_Turma_ibfk_2` FOREIGN KEY (`turma_id`) REFERENCES `Turma` (`id`);

--
-- Constraints for table `Nota`
--
ALTER TABLE `Nota`
  ADD CONSTRAINT `Nota_ibfk_1` FOREIGN KEY (`disciplina_id`) REFERENCES `Disciplina` (`id`),
  ADD CONSTRAINT `Nota_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `Usuario` (`id`);

--
-- Constraints for table `Professor_Disciplina`
--
ALTER TABLE `Professor_Disciplina`
  ADD CONSTRAINT `Professor_Disciplina_ibfk_1` FOREIGN KEY (`professor_id`) REFERENCES `Usuario` (`id`),
  ADD CONSTRAINT `Professor_Disciplina_ibfk_2` FOREIGN KEY (`disciplina_id`) REFERENCES `Disciplina` (`id`);

--
-- Constraints for table `Professor_Turma`
--
ALTER TABLE `Professor_Turma`
  ADD CONSTRAINT `Professor_Turma_ibfk_1` FOREIGN KEY (`professor_id`) REFERENCES `Usuario` (`id`),
  ADD CONSTRAINT `Professor_Turma_ibfk_2` FOREIGN KEY (`turma_id`) REFERENCES `Turma` (`id`);

--
-- Constraints for table `Usuario`
--
ALTER TABLE `Usuario`
  ADD CONSTRAINT `Usuario_ibfk_1` FOREIGN KEY (`nivel`) REFERENCES `Regra` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

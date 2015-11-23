-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 23-Nov-2015 às 16:15
-- Versão do servidor: 5.6.26
-- PHP Version: 5.6.12

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
-- Estrutura da tabela `aluno_turma`
--

CREATE TABLE IF NOT EXISTS `aluno_turma` (
  `id` int(11) NOT NULL,
  `aluno_id` int(11) NOT NULL,
  `turma_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `aluno_turma`
--

INSERT INTO `aluno_turma` (`id`, `aluno_id`, `turma_id`) VALUES
(16, 6, 1),
(17, 8, 1),
(18, 9, 1),
(15, 12, 1),
(19, 13, 3),
(20, 14, 3),
(23, 15, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentario`
--

CREATE TABLE IF NOT EXISTS `comentario` (
  `id` int(11) NOT NULL,
  `assunto` varchar(100) NOT NULL,
  `mensagem` text NOT NULL,
  `visualizada` tinyint(1) NOT NULL,
  `aluno_id` int(11) NOT NULL,
  `professor_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `comentario`
--

INSERT INTO `comentario` (`id`, `assunto`, `mensagem`, `visualizada`, `aluno_id`, `professor_id`) VALUES
(4, 'GTestre', 'tese', 1, 6, 7),
(5, 'Log10', 'Papai, Mamãe, log10', 1, 6, 10),
(6, 'Olá', 'Oi, Carlos, tudo bem?', 0, 12, 11),
(7, 'Teste', 'Teste', 0, 6, 11),
(8, 'Teste', 'Teste', 1, 6, 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina`
--

CREATE TABLE IF NOT EXISTS `disciplina` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `disciplina`
--

INSERT INTO `disciplina` (`id`, `nome`) VALUES
(1, 'Educação Física'),
(2, 'Física'),
(3, 'Espanhol'),
(5, 'Matemática'),
(6, 'Química'),
(7, 'Linguagem de Programação I'),
(8, 'Linguagem de Programação II'),
(9, 'Linguagem de Programação III'),
(10, 'Linguagem de Programação IV'),
(11, 'Francês'),
(12, 'Desenho'),
(13, 'Inglês'),
(14, 'Biologia'),
(15, 'Filosofia'),
(16, 'Artes'),
(17, 'Engenharia de Software'),
(18, 'Sociologia'),
(19, 'Lingua Portuguesa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `nota`
--

CREATE TABLE IF NOT EXISTS `nota` (
  `id` int(11) NOT NULL,
  `primeira_certificacao` double DEFAULT NULL,
  `segunda_certificacao` double DEFAULT NULL,
  `terceira_certificacao` double DEFAULT NULL,
  `primeira_recuperacao` double DEFAULT NULL,
  `segunda_recuperacao` double DEFAULT NULL,
  `terceira_recuperacao` double DEFAULT NULL,
  `disciplina_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `nota`
--

INSERT INTO `nota` (`id`, `primeira_certificacao`, `segunda_certificacao`, `terceira_certificacao`, `primeira_recuperacao`, `segunda_recuperacao`, `terceira_recuperacao`, `disciplina_id`, `usuario_id`) VALUES
(24, 7.6, 3.5, 5.2, NULL, NULL, NULL, 5, 13),
(25, 7.5, 4.5, 4.2, 6.4, NULL, NULL, 5, 14),
(26, 8, 8, 5, NULL, NULL, 2.4, 5, 6),
(27, 4, 4, 4.5, NULL, NULL, 6.4, 5, 12),
(28, 9, 4, 6, NULL, 7, 2.38, 5, 9),
(29, 10, 10, 5, NULL, NULL, NULL, 5, 8),
(30, 6, 2, 2, NULL, 6, 2, 6, 12),
(31, 9, 7, 5, NULL, NULL, 8, 6, 6),
(32, 3.8, 6, 8, 5, NULL, 9, 6, 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor_disciplina`
--

CREATE TABLE IF NOT EXISTS `professor_disciplina` (
  `id` int(11) NOT NULL,
  `professor_id` int(11) NOT NULL,
  `disciplina_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `professor_disciplina`
--

INSERT INTO `professor_disciplina` (`id`, `professor_id`, `disciplina_id`) VALUES
(4, 10, 5),
(5, 11, 6),
(8, 27, 7),
(9, 28, 13);

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor_turma`
--

CREATE TABLE IF NOT EXISTS `professor_turma` (
  `id` int(11) NOT NULL,
  `professor_id` int(11) NOT NULL,
  `turma_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `professor_turma`
--

INSERT INTO `professor_turma` (`id`, `professor_id`, `turma_id`) VALUES
(9, 7, 1),
(6, 8, 3),
(5, 10, 1),
(7, 10, 3),
(8, 11, 1),
(10, 27, 3),
(11, 28, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `regra`
--

CREATE TABLE IF NOT EXISTS `regra` (
  `id` int(11) NOT NULL,
  `nome` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `regra`
--

INSERT INTO `regra` (`id`, `nome`) VALUES
(1, 'Administração'),
(2, 'Aluno'),
(3, 'Professor');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE IF NOT EXISTS `turma` (
  `id` int(11) NOT NULL,
  `nome` int(20) NOT NULL,
  `turno` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`id`, `nome`, `turno`) VALUES
(3, 108, 'Tarde'),
(2, 303, 'Manhã'),
(1, 307, 'Integrado'),
(4, 606, 'Noite'),
(6, 608, 'Tarde');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cpf` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `matricula` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `nivel` int(11) NOT NULL,
  `ativo` int(11) DEFAULT '0',
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `cpf`, `matricula`, `nivel`, `ativo`, `email`, `senha`) VALUES
(4, 'admin', '12221222', '12345678', 1, 1, 'admin@admin.com', '123'),
(6, 'Nathália', '21212121212', '87654321', 2, 1, 'nathalia@amaphp.com', 'odeioruby'),
(7, 'Ricardo', '123667667', '23145443', 3, 1, 'ricardo@filosofia.com', 'filosofia'),
(8, 'Agnes', '990909090', '9090909090', 2, 1, 'agnes@naocara.com', '123'),
(9, 'Sérchô', '89899898', '8998989', 2, 1, 'sercho@louder.com', '123'),
(10, 'tia emilia\r\n', '1212121121', '1132132121123123', 3, 0, 'tiaemilia@gmail.com', 'log10'),
(11, 'Carlos', '009909090909', '09009090909', 3, 1, 'carlos@quimica.com', '1234'),
(12, 'Diogo Alves', '12345678', '1211212112', 2, 1, 'diogo@diogo.com', '123'),
(13, 'Yngrid ', '232323232', '222323223', 2, 1, 'yngrid@yngrid.com', '123'),
(14, 'Gabriel David', '12121112', '11221122112', 2, 1, 'gabriel@gabriel.com', '123'),
(15, 'Sem turma', '11122122', '12121112', 2, 1, 'semturma@semturma.com', 'semturma'),
(27, 'Marcelo Cardoso', '1211122211', '1121121', 3, 1, 'marcelo@cardoso.com', '123'),
(28, 'Rogério', '12121211', '12121212', 3, 1, 'rogerio@rogerio.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aluno_turma`
--
ALTER TABLE `aluno_turma`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `aluno_id_2` (`aluno_id`,`turma_id`),
  ADD UNIQUE KEY `aluno_id_3` (`aluno_id`,`turma_id`),
  ADD KEY `aluno_id` (`aluno_id`,`turma_id`),
  ADD KEY `turma_id` (`turma_id`);

--
-- Indexes for table `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aluno_id` (`aluno_id`),
  ADD KEY `professor_id` (`professor_id`);

--
-- Indexes for table `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `disciplina_id_2` (`disciplina_id`,`usuario_id`),
  ADD KEY `disciplina_id` (`disciplina_id`,`usuario_id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indexes for table `professor_disciplina`
--
ALTER TABLE `professor_disciplina`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `professor_id` (`professor_id`,`disciplina_id`),
  ADD KEY `usuario_id` (`professor_id`,`disciplina_id`),
  ADD KEY `disciplina_id` (`disciplina_id`);

--
-- Indexes for table `professor_turma`
--
ALTER TABLE `professor_turma`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `professor_id_2` (`professor_id`,`turma_id`),
  ADD KEY `professor_id` (`professor_id`),
  ADD KEY `turma_id` (`turma_id`);

--
-- Indexes for table `regra`
--
ALTER TABLE `regra`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nome` (`nome`,`turno`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `nivel` (`nivel`),
  ADD KEY `nivel_2` (`nivel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aluno_turma`
--
ALTER TABLE `aluno_turma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `nota`
--
ALTER TABLE `nota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `professor_disciplina`
--
ALTER TABLE `professor_disciplina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `professor_turma`
--
ALTER TABLE `professor_turma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `regra`
--
ALTER TABLE `regra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `turma`
--
ALTER TABLE `turma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `aluno_turma`
--
ALTER TABLE `aluno_turma`
  ADD CONSTRAINT `Aluno_Turma_ibfk_1` FOREIGN KEY (`aluno_id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Aluno_Turma_ibfk_2` FOREIGN KEY (`turma_id`) REFERENCES `turma` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `Comentario_ibfk_1` FOREIGN KEY (`aluno_id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Comentario_ibfk_2` FOREIGN KEY (`professor_id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `nota`
--
ALTER TABLE `nota`
  ADD CONSTRAINT `Nota_ibfk_1` FOREIGN KEY (`disciplina_id`) REFERENCES `disciplina` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Nota_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `professor_disciplina`
--
ALTER TABLE `professor_disciplina`
  ADD CONSTRAINT `Professor_Disciplina_ibfk_1` FOREIGN KEY (`professor_id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Professor_Disciplina_ibfk_2` FOREIGN KEY (`disciplina_id`) REFERENCES `disciplina` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `professor_turma`
--
ALTER TABLE `professor_turma`
  ADD CONSTRAINT `Professor_Turma_ibfk_1` FOREIGN KEY (`professor_id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Professor_Turma_ibfk_2` FOREIGN KEY (`turma_id`) REFERENCES `turma` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `Usuario_ibfk_1` FOREIGN KEY (`nivel`) REFERENCES `regra` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

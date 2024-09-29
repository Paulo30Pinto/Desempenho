-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 14-Jul-2024 às 17:02
-- Versão do servidor: 8.0.27
-- versão do PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `controle_bd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

DROP TABLE IF EXISTS `alunos`;
CREATE TABLE IF NOT EXISTS `alunos` (
  `id_aluno` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `foto_perfil` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id_aluno`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`id_aluno`, `nome`, `email`, `foto_perfil`) VALUES
(1, 'Paulo Pinto', 'paulo@mail.com', NULL),
(2, 'Ana Brenda', 'anabrenda@mail.com', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno_turma`
--

DROP TABLE IF EXISTS `aluno_turma`;
CREATE TABLE IF NOT EXISTS `aluno_turma` (
  `id_aluno_turma` int NOT NULL AUTO_INCREMENT,
  `aluno_id` int DEFAULT NULL,
  `turma_id` int DEFAULT NULL,
  PRIMARY KEY (`id_aluno_turma`),
  KEY `aluno_id` (`aluno_id`),
  KEY `turma_id` (`turma_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `aluno_turma`
--

INSERT INTO `aluno_turma` (`id_aluno_turma`, `aluno_id`, `turma_id`) VALUES
(1, 2, 1),
(2, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `classes`
--

DROP TABLE IF EXISTS `classes`;
CREATE TABLE IF NOT EXISTS `classes` (
  `id_classe` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `curso_id` int DEFAULT NULL,
  PRIMARY KEY (`id_classe`),
  KEY `curso_id` (`curso_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `classes`
--

INSERT INTO `classes` (`id_classe`, `nome`, `curso_id`) VALUES
(1, '10', 1),
(2, '11', 1),
(3, '10', 2),
(4, '11', 2),
(5, '12', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

DROP TABLE IF EXISTS `cursos`;
CREATE TABLE IF NOT EXISTS `cursos` (
  `id_curso` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`id_curso`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`id_curso`, `nome`) VALUES
(1, 'Físicas e Biológicas'),
(2, 'jurídicas e económicas '),
(3, 'Ciências Humanas  ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplinas`
--

DROP TABLE IF EXISTS `disciplinas`;
CREATE TABLE IF NOT EXISTS `disciplinas` (
  `id_disciplina` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `curso_id` int DEFAULT NULL,
  PRIMARY KEY (`id_disciplina`),
  KEY `curso_id` (`curso_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `disciplinas`
--

INSERT INTO `disciplinas` (`id_disciplina`, `nome`, `curso_id`) VALUES
(1, 'Matématica', 1),
(2, 'Fisica', 1),
(3, 'Biologia ', 1),
(4, 'filosofia', 2),
(5, 'Língua Portuguesa', 2),
(6, 'Francês ', 3),
(7, 'Sociologia ', 3),
(8, 'Química ', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `professores`
--

DROP TABLE IF EXISTS `professores`;
CREATE TABLE IF NOT EXISTS `professores` (
  `id_professor` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `foto_prof` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_professor`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `professores`
--

INSERT INTO `professores` (`id_professor`, `nome`, `email`, `senha`, `foto_prof`) VALUES
(1, 'Paulo Bunga', 'bunga@mail.com', '1234456', NULL),
(2, 'Adalgisa Antonio', 'ada@mail.com', '0987', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor_disciplina`
--

DROP TABLE IF EXISTS `professor_disciplina`;
CREATE TABLE IF NOT EXISTS `professor_disciplina` (
  `id_professor_disciplina` int NOT NULL AUTO_INCREMENT,
  `professor_id` int DEFAULT NULL,
  `disciplina_id` int DEFAULT NULL,
  PRIMARY KEY (`id_professor_disciplina`),
  KEY `professor_id` (`professor_id`),
  KEY `disciplina_id` (`disciplina_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `professor_disciplina`
--

INSERT INTO `professor_disciplina` (`id_professor_disciplina`, `professor_id`, `disciplina_id`) VALUES
(1, 1, 2),
(2, 1, 1),
(3, 2, 6),
(4, 2, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_aula`
--

DROP TABLE IF EXISTS `tb_aula`;
CREATE TABLE IF NOT EXISTS `tb_aula` (
  `id_aula` int NOT NULL AUTO_INCREMENT,
  `tema_aula` varchar(255) NOT NULL,
  `subtema_aula` varchar(255) DEFAULT NULL,
  `motivacao` text,
  `materia` text NOT NULL,
  `id_professor` int DEFAULT NULL,
  `objetivo_geral` text,
  `objetivo_especifico` text,
  `data_aula` date NOT NULL,
  `turno` enum('Manhã','Tarde','Noite') DEFAULT NULL,
  `id_turma` int DEFAULT NULL,
  PRIMARY KEY (`id_aula`),
  KEY `frk_aula` (`id_professor`),
  KEY `frk_aular` (`id_turma`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_notas`
--

DROP TABLE IF EXISTS `tb_notas`;
CREATE TABLE IF NOT EXISTS `tb_notas` (
  `id_notas` int NOT NULL,
  `nota_aluno` decimal(10,0) DEFAULT NULL,
  `id_professor` int DEFAULT NULL,
  `id_aluno` int DEFAULT NULL,
  KEY `frk_notas` (`id_professor`),
  KEY `frk_nota_aluno` (`id_aluno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_presenca`
--

DROP TABLE IF EXISTS `tb_presenca`;
CREATE TABLE IF NOT EXISTS `tb_presenca` (
  `id_falta` int NOT NULL AUTO_INCREMENT,
  `numero_falta` tinyint(1) DEFAULT NULL,
  `presenca` tinyint(1) DEFAULT NULL,
  `ponto_avalia` varchar(10) DEFAULT NULL,
  `ponto_presenca` varchar(10) DEFAULT NULL,
  `id_disciplina` int DEFAULT NULL,
  `id_professor` int DEFAULT NULL,
  `id_aluno` int DEFAULT NULL,
  PRIMARY KEY (`id_falta`),
  KEY `frk_falta` (`id_professor`),
  KEY `frk_faltou` (`id_aluno`),
  KEY `frk_falta_disc` (`id_disciplina`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `tb_presenca`
--

INSERT INTO `tb_presenca` (`id_falta`, `numero_falta`, `presenca`, `ponto_avalia`, `ponto_presenca`, `id_disciplina`, `id_professor`, `id_aluno`) VALUES
(1, NULL, NULL, '0', '0', NULL, NULL, NULL),
(2, NULL, NULL, '0', '0', NULL, NULL, NULL),
(3, NULL, NULL, '1', '0', NULL, NULL, NULL),
(4, NULL, NULL, '0', '0', NULL, NULL, NULL),
(5, NULL, NULL, '0', '0', NULL, NULL, NULL),
(6, NULL, NULL, '1', '0', NULL, NULL, NULL),
(7, NULL, NULL, '0,5', '0', NULL, NULL, NULL),
(8, NULL, NULL, '0.3', '0.125', NULL, NULL, NULL),
(9, NULL, 1, '0.4', '0.125', NULL, NULL, 1),
(10, NULL, 0, '0,5', '0', NULL, NULL, 2),
(11, NULL, 1, '0.1', '0.125', 1, 1, 1),
(12, NULL, 1, '0,1', '0.125', 1, 1, 2),
(13, NULL, 1, '0.2', '0.125', 2, 1, 1),
(14, NULL, 1, '0,3', '0.125', 2, 1, 2),
(15, NULL, 1, '1', '0.125', 1, 1, 1),
(16, NULL, 1, '2', '0.125', 1, 1, 2),
(17, NULL, 0, '1', '0', 2, 1, 1),
(18, NULL, 0, '2', '0', 2, 1, 2),
(19, NULL, 1, '0,3', '0.125', 2, 1, 1),
(20, NULL, 1, '0.3', '0.125', 2, 1, 2),
(21, NULL, 1, '0,5', '0.125', 2, 1, 1),
(22, NULL, 1, '0,2', '0.125', 2, 1, 2),
(23, NULL, 1, '0.4', '0.125', 2, 1, 1),
(24, NULL, 1, '0,2', '0.125', 2, 1, 2),
(25, NULL, 1, '1', '0.125', 2, 1, 1),
(26, NULL, 1, '', '0.125', 2, 1, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `turmas`
--

DROP TABLE IF EXISTS `turmas`;
CREATE TABLE IF NOT EXISTS `turmas` (
  `id_turma` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `classe_id` int DEFAULT NULL,
  PRIMARY KEY (`id_turma`),
  KEY `classe_id` (`classe_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `turmas`
--

INSERT INTO `turmas` (`id_turma`, `nome`, `classe_id`) VALUES
(1, 'Turma MB7', 1),
(2, 'Turma MB11', 2),
(3, 'Turma MB02', 1),
(4, 'Turma TB31', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma_disciplina`
--

DROP TABLE IF EXISTS `turma_disciplina`;
CREATE TABLE IF NOT EXISTS `turma_disciplina` (
  `id_turma_disciplina` int NOT NULL AUTO_INCREMENT,
  `turma_id` int DEFAULT NULL,
  `disciplina_id` int DEFAULT NULL,
  PRIMARY KEY (`id_turma_disciplina`),
  KEY `turma_id` (`turma_id`),
  KEY `disciplina_id` (`disciplina_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `turma_disciplina`
--

INSERT INTO `turma_disciplina` (`id_turma_disciplina`, `turma_id`, `disciplina_id`) VALUES
(1, 1, 2),
(2, 1, 1),
(3, 2, 6),
(4, 2, 4);

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `aluno_turma`
--
ALTER TABLE `aluno_turma`
  ADD CONSTRAINT `aluno_turma_ibfk_1` FOREIGN KEY (`aluno_id`) REFERENCES `alunos` (`id_aluno`),
  ADD CONSTRAINT `aluno_turma_ibfk_2` FOREIGN KEY (`turma_id`) REFERENCES `turmas` (`id_turma`);

--
-- Limitadores para a tabela `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `classes_ibfk_1` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id_curso`);

--
-- Limitadores para a tabela `disciplinas`
--
ALTER TABLE `disciplinas`
  ADD CONSTRAINT `disciplinas_ibfk_1` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id_curso`);

--
-- Limitadores para a tabela `professor_disciplina`
--
ALTER TABLE `professor_disciplina`
  ADD CONSTRAINT `professor_disciplina_ibfk_1` FOREIGN KEY (`professor_id`) REFERENCES `professores` (`id_professor`),
  ADD CONSTRAINT `professor_disciplina_ibfk_2` FOREIGN KEY (`disciplina_id`) REFERENCES `disciplinas` (`id_disciplina`);

--
-- Limitadores para a tabela `tb_aula`
--
ALTER TABLE `tb_aula`
  ADD CONSTRAINT `frk_aula` FOREIGN KEY (`id_professor`) REFERENCES `professor_disciplina` (`id_professor_disciplina`),
  ADD CONSTRAINT `frk_aular` FOREIGN KEY (`id_turma`) REFERENCES `turma_disciplina` (`id_turma_disciplina`);

--
-- Limitadores para a tabela `tb_notas`
--
ALTER TABLE `tb_notas`
  ADD CONSTRAINT `frk_nota_aluno` FOREIGN KEY (`id_aluno`) REFERENCES `aluno_turma` (`id_aluno_turma`),
  ADD CONSTRAINT `frk_notas` FOREIGN KEY (`id_professor`) REFERENCES `professor_disciplina` (`id_professor_disciplina`);

--
-- Limitadores para a tabela `tb_presenca`
--
ALTER TABLE `tb_presenca`
  ADD CONSTRAINT `frk_falta` FOREIGN KEY (`id_professor`) REFERENCES `professor_disciplina` (`id_professor_disciplina`),
  ADD CONSTRAINT `frk_falta_disc` FOREIGN KEY (`id_disciplina`) REFERENCES `professor_disciplina` (`id_professor_disciplina`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `frk_faltou` FOREIGN KEY (`id_aluno`) REFERENCES `aluno_turma` (`id_aluno_turma`);

--
-- Limitadores para a tabela `turmas`
--
ALTER TABLE `turmas`
  ADD CONSTRAINT `turmas_ibfk_1` FOREIGN KEY (`classe_id`) REFERENCES `classes` (`id_classe`);

--
-- Limitadores para a tabela `turma_disciplina`
--
ALTER TABLE `turma_disciplina`
  ADD CONSTRAINT `turma_disciplina_ibfk_1` FOREIGN KEY (`turma_id`) REFERENCES `turmas` (`id_turma`),
  ADD CONSTRAINT `turma_disciplina_ibfk_2` FOREIGN KEY (`disciplina_id`) REFERENCES `disciplinas` (`id_disciplina`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

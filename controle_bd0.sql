-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01-Ago-2024 às 18:00
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.0.30

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

CREATE TABLE `alunos` (
  `id_aluno` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `foto_perfil` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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

CREATE TABLE `aluno_turma` (
  `id_aluno_turma` int(11) NOT NULL,
  `aluno_id` int(11) DEFAULT NULL,
  `turma_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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

CREATE TABLE `classes` (
  `id_classe` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `curso_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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

CREATE TABLE `cursos` (
  `id_curso` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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

CREATE TABLE `disciplinas` (
  `id_disciplina` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `curso_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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

CREATE TABLE `professores` (
  `id_professor` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `foto_prof` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `professores`
--

INSERT INTO `professores` (`id_professor`, `nome`, `email`, `senha`, `foto_prof`) VALUES
(1, 'Paulo Bunga', 'bunga@mail.com', '1234456', 'IMG_E0697.jpg'),
(2, 'Adalgisa Antonio', 'ada@mail.com', '0987', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor_disciplina`
--

CREATE TABLE `professor_disciplina` (
  `id_professor_disciplina` int(11) NOT NULL,
  `professor_id` int(11) DEFAULT NULL,
  `disciplina_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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

CREATE TABLE `tb_aula` (
  `id_aula` int(11) NOT NULL,
  `tema_aula` varchar(255) DEFAULT NULL,
  `subtema_aula` varchar(255) DEFAULT NULL,
  `motivacao` text DEFAULT NULL,
  `materia` text DEFAULT NULL,
  `id_professor` int(11) DEFAULT NULL,
  `objetivo_geral` text DEFAULT NULL,
  `tarefa` varchar(1000) DEFAULT NULL,
  `objetivo_especifico` text DEFAULT NULL,
  `data_aula` date DEFAULT NULL,
  `turno` enum('Manhã','Tarde','Noite') DEFAULT NULL,
  `id_classe` int(11) DEFAULT NULL,
  `id_disciplina` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `tb_aula`
--

INSERT INTO `tb_aula` (`id_aula`, `tema_aula`, `subtema_aula`, `motivacao`, `materia`, `id_professor`, `objetivo_geral`, `tarefa`, `objetivo_especifico`, `data_aula`, `turno`, `id_classe`, `id_disciplina`) VALUES
(14, ':TemaAula', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'Noma', NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'Soma', 'Sobre', 'mdd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'Logica', 'Programa', 'ewr', 'wgf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(29, 'Logica', 'Programa', 'ewr', 'wgf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
(30, 'Logica', 'Programa', 'ewr', 'wgf', NULL, 'Div', NULL, NULL, NULL, NULL, NULL, 2),
(31, 'Logica', 'Programa', 'ewr', 'wgf', NULL, 'Div', 'sdg', 'Container', NULL, NULL, NULL, 1),
(32, 'Logica', 'Programa', 'ewr', 'wgf', NULL, 'Div', 'sdg', 'Container', '0000-00-00', 'Tarde', NULL, 1),
(33, 'Logica', 'Programa', 'ewr', 'wgf', 1, 'Div', 'sdg', 'Container', '0000-00-00', 'Tarde', NULL, 1),
(34, 'wsw', 'sff', 'kdif', 'kfsf', 1, 'oof', 'fsjsf', 'bfbf', '2024-08-01', 'Tarde', NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_notas`
--

CREATE TABLE `tb_notas` (
  `id_notas` int(11) NOT NULL,
  `nota_aluno` decimal(10,0) DEFAULT NULL,
  `id_professor` int(11) DEFAULT NULL,
  `id_aluno` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_presenca`
--

CREATE TABLE `tb_presenca` (
  `id_falta` int(11) NOT NULL,
  `numero_falta` tinyint(1) DEFAULT NULL,
  `presenca` tinyint(1) DEFAULT NULL,
  `ponto_avalia` varchar(10) DEFAULT NULL,
  `ponto_presenca` varchar(10) DEFAULT NULL,
  `id_disciplina` int(11) DEFAULT NULL,
  `id_professor` int(11) DEFAULT NULL,
  `id_aluno` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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

CREATE TABLE `turmas` (
  `id_turma` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `classe_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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

CREATE TABLE `turma_disciplina` (
  `id_turma_disciplina` int(11) NOT NULL,
  `turma_id` int(11) DEFAULT NULL,
  `disciplina_id` int(11) DEFAULT NULL,
  `id_professor_turma` int(11) DEFAULT NULL,
  `id_curso_turma` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `turma_disciplina`
--

INSERT INTO `turma_disciplina` (`id_turma_disciplina`, `turma_id`, `disciplina_id`, `id_professor_turma`, `id_curso_turma`) VALUES
(1, 1, 2, 1, 1),
(2, 1, 1, 1, 1),
(3, 2, 6, NULL, 3),
(4, 2, 4, 1, 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id_aluno`);

--
-- Índices para tabela `aluno_turma`
--
ALTER TABLE `aluno_turma`
  ADD PRIMARY KEY (`id_aluno_turma`),
  ADD KEY `aluno_id` (`aluno_id`),
  ADD KEY `turma_id` (`turma_id`);

--
-- Índices para tabela `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id_classe`),
  ADD KEY `curso_id` (`curso_id`);

--
-- Índices para tabela `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id_curso`);

--
-- Índices para tabela `disciplinas`
--
ALTER TABLE `disciplinas`
  ADD PRIMARY KEY (`id_disciplina`),
  ADD KEY `curso_id` (`curso_id`);

--
-- Índices para tabela `professores`
--
ALTER TABLE `professores`
  ADD PRIMARY KEY (`id_professor`);

--
-- Índices para tabela `professor_disciplina`
--
ALTER TABLE `professor_disciplina`
  ADD PRIMARY KEY (`id_professor_disciplina`),
  ADD KEY `professor_id` (`professor_id`),
  ADD KEY `disciplina_id` (`disciplina_id`);

--
-- Índices para tabela `tb_aula`
--
ALTER TABLE `tb_aula`
  ADD PRIMARY KEY (`id_aula`),
  ADD KEY `frk_aula` (`id_professor`),
  ADD KEY `frk_aular` (`id_classe`),
  ADD KEY `frk_disciplina` (`id_disciplina`);

--
-- Índices para tabela `tb_notas`
--
ALTER TABLE `tb_notas`
  ADD KEY `frk_notas` (`id_professor`),
  ADD KEY `frk_nota_aluno` (`id_aluno`);

--
-- Índices para tabela `tb_presenca`
--
ALTER TABLE `tb_presenca`
  ADD PRIMARY KEY (`id_falta`),
  ADD KEY `frk_falta` (`id_professor`),
  ADD KEY `frk_faltou` (`id_aluno`),
  ADD KEY `frk_falta_disc` (`id_disciplina`);

--
-- Índices para tabela `turmas`
--
ALTER TABLE `turmas`
  ADD PRIMARY KEY (`id_turma`),
  ADD KEY `classe_id` (`classe_id`);

--
-- Índices para tabela `turma_disciplina`
--
ALTER TABLE `turma_disciplina`
  ADD PRIMARY KEY (`id_turma_disciplina`),
  ADD KEY `turma_id` (`turma_id`),
  ADD KEY `disciplina_id` (`disciplina_id`),
  ADD KEY `frk_prof_id_turma` (`id_professor_turma`),
  ADD KEY `cfrk_curso_turma` (`id_curso_turma`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id_aluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `aluno_turma`
--
ALTER TABLE `aluno_turma`
  MODIFY `id_aluno_turma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `classes`
--
ALTER TABLE `classes`
  MODIFY `id_classe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `disciplinas`
--
ALTER TABLE `disciplinas`
  MODIFY `id_disciplina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `professores`
--
ALTER TABLE `professores`
  MODIFY `id_professor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `professor_disciplina`
--
ALTER TABLE `professor_disciplina`
  MODIFY `id_professor_disciplina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tb_aula`
--
ALTER TABLE `tb_aula`
  MODIFY `id_aula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de tabela `tb_presenca`
--
ALTER TABLE `tb_presenca`
  MODIFY `id_falta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `turmas`
--
ALTER TABLE `turmas`
  MODIFY `id_turma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `turma_disciplina`
--
ALTER TABLE `turma_disciplina`
  MODIFY `id_turma_disciplina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  ADD CONSTRAINT `frk_aular` FOREIGN KEY (`id_classe`) REFERENCES `classes` (`id_classe`),
  ADD CONSTRAINT `frk_disciplina` FOREIGN KEY (`id_disciplina`) REFERENCES `disciplinas` (`id_disciplina`);

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
  ADD CONSTRAINT `frk_falta_disc` FOREIGN KEY (`id_disciplina`) REFERENCES `professor_disciplina` (`id_professor_disciplina`),
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
  ADD CONSTRAINT `cfrk_curso_turma` FOREIGN KEY (`id_curso_turma`) REFERENCES `cursos` (`id_curso`),
  ADD CONSTRAINT `frk_prof_id_turma` FOREIGN KEY (`id_professor_turma`) REFERENCES `professores` (`id_professor`),
  ADD CONSTRAINT `turma_disciplina_ibfk_1` FOREIGN KEY (`turma_id`) REFERENCES `turmas` (`id_turma`),
  ADD CONSTRAINT `turma_disciplina_ibfk_2` FOREIGN KEY (`disciplina_id`) REFERENCES `disciplinas` (`id_disciplina`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

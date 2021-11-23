-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20-Abr-2021 às 02:35
-- Versão do servidor: 5.7.33-log
-- versão do PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `aprendi_app`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aulas`
--

CREATE TABLE `aulas` (
  `id` int(10) NOT NULL,
  `semana` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `sala_id` int(10) NOT NULL DEFAULT '1',
  `disciplina_id` int(10) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `aulas`
--

INSERT INTO `aulas` (`id`, `semana`, `title`, `sala_id`, `disciplina_id`) VALUES
(1, 1, 'Formal and Informal greetings, Classroom vocabulary and expressions', 1, 1);

INSERT INTO `aulas` (`id`, `semana`, `title`, `sala_id`, `disciplina_id`) VALUES
(2, 2, 'Subject pronouns, Verb to be (present simple)', 1, 1);

INSERT INTO `aulas` (`id`, `semana`, `title`, `sala_id`, `disciplina_id`) VALUES
(3, 3, 'Jobs, Countries and Nationalities', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplinas`
--

CREATE TABLE `disciplinas` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT 'Ingles',
  `sala_id` int(10) NOT NULL DEFAULT '1',
  `qtySemanas` int(10) NOT NULL DEFAULT '8',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `disciplinas`
--

INSERT INTO `disciplinas` (`id`, `name`, `sala_id`, `qtySemanas`, `created_at`) VALUES
(1, 'Ingles', 1, 8, '2021-04-19 21:20:17');

-- --------------------------------------------------------

--
-- Estrutura da tabela `escolas`
--

CREATE TABLE `escolas` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT 'ETEC São Caetano do Sul',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `escolas`
--

INSERT INTO `escolas` (`id`, `name`, `created_at`) VALUES
(1, 'ETEC São Caetano do Sul', '2021-04-19 21:20:17');

-- --------------------------------------------------------

--
-- Estrutura da tabela `notas`
--

CREATE TABLE `notas` (
  `id` int(10) NOT NULL,
  `nota` decimal(10,0) NOT NULL DEFAULT '0',
  `user_id` int(10) NOT NULL,
  `sala_id` int(10) NOT NULL DEFAULT '1',
  `disciplina_id` int(10) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `notas`
--

INSERT INTO `notas` (`id`, `nota`, `user_id`, `sala_id`, `disciplina_id`) VALUES
(1, '0', 1, 1, 1),
(2, '0', 2, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

CREATE TABLE `posts` (
  `id` int(10) NOT NULL,
  `aula_id` int(10) NOT NULL DEFAULT '1',
  `user_id` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `body` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts_points`
--

CREATE TABLE `posts_points` (
  `id` int(10) NOT NULL,
  `post_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `posts` (`id`, `aula_id`, `user_id`, `title`, `body`, `created_at`) VALUES
(1, 1, 1, 'Am I late?', 'Estou atrasado[a]?', '2021-05-18 00:19:54'),
(2, 2, 1, 'Are you a doctor?', 'Você é médico[a]?', '2021-05-18 00:58:41'),
(3, 1, 1, 'Is Danilo at home?', 'Danilo está em casa?', '2021-05-18 02:10:33'),
(4, 2, 1, 'Are Carol and I in this group?', 'Carol e eu estamos nesse grupo?', '2021-05-18 02:15:25'),
(5, 2, 1, 'Is the toy broken?', 'O brinquedo está quebrado?', '2021-05-18 02:15:37');

--
-- Acionadores `posts_points`
--
DELIMITER $$
CREATE TRIGGER `posts_points_AFTER_INSERT` AFTER INSERT ON `posts_points` FOR EACH ROW BEGIN
    SET
        @user_id = NEW.user_id ;
    UPDATE
        users
    SET
        points = points + 10
    WHERE
        id = @user_id ; END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `salas`
--

CREATE TABLE `salas` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `etapaEscolar` varchar(50) NOT NULL DEFAULT 'Ensino Fundamental II',
  `ano` int(10) NOT NULL DEFAULT '6',
  `disciplina_id` int(10) NOT NULL DEFAULT '1',
  `escola_id` int(10) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `salas`
--

INSERT INTO `salas` (`id`, `name`, `etapaEscolar`, `ano`, `disciplina_id`, `escola_id`, `created_at`) VALUES
(1, 'Turma 22', 'Ensino Fundamental II', 6, 1, 1, '2021-04-19 21:20:17');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `role` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL,
  `sala_id` int(10) NOT NULL DEFAULT '1',
  `points` int(10) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `username`, `password`, `sala_id`, `points`, `created_at`) VALUES
(1, 'Professor', 'Professor Professor', 'professor', '$2y$10$g5MBz0diPuPGUzxqoWejLegKmSrOVDQ7XNZ0sO.T.WyplkpL04pz.', 1, 0, '2021-04-19 21:20:17'),
(2, 'Aluno', 'Aluno Aluno', 'aluno', '$2y$10$g5MBz0diPuPGUzxqoWejLegKmSrOVDQ7XNZ0sO.T.WyplkpL04pz.', 1, 0, '2021-04-19 21:20:17');

--
-- Acionadores `users`
--
DELIMITER $$
CREATE TRIGGER `users_AFTER_INSERT` AFTER INSERT ON `users` FOR EACH ROW BEGIN
    SET
        @user_id = NEW.id ;
    INSERT INTO notas(user_id)
VALUES(@user_id) ;
END
$$
DELIMITER ;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `aulas`
--
ALTER TABLE `aulas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sala_id_idx` (`sala_id`),
  ADD KEY `disciplina_id_idx` (`disciplina_id`);

--
-- Índices para tabela `disciplinas`
--
ALTER TABLE `disciplinas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sala_id_idx` (`sala_id`);

--
-- Índices para tabela `escolas`
--
ALTER TABLE `escolas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id_idx` (`user_id`),
  ADD KEY `fk_sala_id_n_idx` (`sala_id`),
  ADD KEY `fk_disciplina_id_n_idx` (`disciplina_id`);

--
-- Índices para tabela `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_aula_id_p_idx` (`aula_id`),
  ADD KEY `fk_user_id_p_idx` (`user_id`);

--
-- Índices para tabela `posts_points`
--
ALTER TABLE `posts_points`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_post_id_pp_idx` (`post_id`),
  ADD KEY `fk_user_id_pp_idx` (`user_id`);

--
-- Índices para tabela `salas`
--
ALTER TABLE `salas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_disciplina_id_s_idx` (`disciplina_id`),
  ADD KEY `fk_escola_id_s_idx` (`escola_id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sala_id_u_idx` (`sala_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `aulas`
--
ALTER TABLE `aulas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `disciplinas`
--
ALTER TABLE `disciplinas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `escolas`
--
ALTER TABLE `escolas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `notas`
--
ALTER TABLE `notas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `posts_points`
--
ALTER TABLE `posts_points`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `salas`
--
ALTER TABLE `salas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `aulas`
--
ALTER TABLE `aulas`
  ADD CONSTRAINT `disciplina_id` FOREIGN KEY (`disciplina_id`) REFERENCES `disciplinas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `sala_id` FOREIGN KEY (`sala_id`) REFERENCES `salas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `disciplinas`
--
ALTER TABLE `disciplinas`
  ADD CONSTRAINT `fk_sala_id` FOREIGN KEY (`sala_id`) REFERENCES `salas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `fk_disciplina_id_n` FOREIGN KEY (`disciplina_id`) REFERENCES `disciplinas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sala_id_n` FOREIGN KEY (`sala_id`) REFERENCES `notas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_aula_id_p` FOREIGN KEY (`aula_id`) REFERENCES `aulas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_id_p` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `posts_points`
--
ALTER TABLE `posts_points`
  ADD CONSTRAINT `fk_post_id_pp` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_id_pp` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `salas`
--
ALTER TABLE `salas`
  ADD CONSTRAINT `fk_disciplina_id_s` FOREIGN KEY (`disciplina_id`) REFERENCES `disciplinas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_escola_id_s` FOREIGN KEY (`escola_id`) REFERENCES `escolas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_sala_id_u` FOREIGN KEY (`sala_id`) REFERENCES `salas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

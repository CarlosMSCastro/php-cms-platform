-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Jan-2026 às 06:25
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `comunicacoes_bd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `navbar`
--

CREATE TABLE `navbar` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT '#',
  `pai_id` int(11) DEFAULT NULL,
  `ordem` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `navbar`
--

INSERT INTO `navbar` (`id`, `titulo`, `url`, `pai_id`, `ordem`) VALUES
(1, 'Empresa', 'pagina.php?id=1', NULL, 1),
(2, 'Áreas de atuação', 'pagina.php?id=2', 1, 1),
(3, 'Historial', 'pagina.php?id=3', 1, 2),
(4, 'Inovação e Tecnologia', 'pagina.php?id=4', 1, 3),
(5, 'Responsabilidade Social', 'pagina.php?id=5', 1, 4),
(6, 'Destaques', 'pagina.php?id=6', NULL, 2),
(7, 'Notícias e Eventos', 'pagina.php?id=7', NULL, 3),
(8, 'Soluções', 'pagina.php?id=8', NULL, 4),
(9, 'Telecomunicações', 'pagina.php?id=9', 8, 1),
(10, 'Televisões e Audiovisuais', 'pagina.php?id=10', 8, 2),
(11, 'Informática e Redes', 'pagina.php?id=11', 8, 3),
(12, 'Data Center e Cibersegurança', 'pagina.php?id=12', 8, 4),
(13, 'Internet of Things', 'pagina.php?id=13', 8, 5),
(14, 'Assistentes Virtuais', 'pagina.php?id=14', 8, 6),
(15, 'Inovação e Tecnologia', 'pagina.php?id=15', NULL, 5),
(16, 'Inovação e Tecnologia 1', 'pagina.php?id=16', 15, 1),
(17, 'Inovação e Tecnologia 2', 'pagina.php?id=17', 15, 2),
(18, 'Inovação e Tecnologia 3', 'pagina.php?id=18', 15, 3),
(19, 'Inovação e Tecnologia 4', 'pagina.php?id=19', 15, 4),
(20, 'Inovação e Tecnologia 5', 'pagina.php?id=20', 15, 5),
(21, 'Inovação e Tecnologia 6', 'pagina.php?id=21', 15, 6),
(22, 'Os Nossos Parceiros', 'pagina.php?id=22', NULL, 6),
(23, 'Contactos', 'pagina.php?id=23', NULL, 7);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `navbar`
--
ALTER TABLE `navbar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `navbar`
--
ALTER TABLE `navbar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Jan-2026 às 19:46
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
-- Estrutura da tabela `carousel_topo`
--

CREATE TABLE `carousel_topo` (
  `id` int(11) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `ordem` int(11) NOT NULL DEFAULT 0,
  `ativo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `carousel_topo`
--

INSERT INTO `carousel_topo` (`id`, `imagem`, `ordem`, `ativo`) VALUES
(1, 'imagens/carousel1/cabecalho_home.png', 1, 1),
(2, 'imagens/carousel1/cabecalho_destaque.png', 2, 1),
(3, 'imagens/carousel1/cabecalho_contactos.png', 3, 1),
(4, 'imagens/carousel1/cabecalho_noticias_e_eventos.png', 4, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `footer_carousel`
--

CREATE TABLE `footer_carousel` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `data` varchar(50) DEFAULT NULL,
  `texto` text DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `ordem` int(11) DEFAULT 1,
  `ativo` tinyint(1) NOT NULL DEFAULT 1,
  `pagina_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `footer_carousel`
--

INSERT INTO `footer_carousel` (`id`, `titulo`, `data`, `texto`, `imagem`, `ordem`, `ativo`, `pagina_url`) VALUES
(1, 'Conferência — Desafios tecnológicos para a próxima década.', '07/12/2007', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget rutrum nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget rutrum nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget rutrum nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.', 'imagens/carousel3/1.jpg', 1, 1, NULL),
(2, 'Conferência — Desafios tecnológicos para a próxima década.', '08/10/2009', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget rutrum nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget rutrum nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget rutrum nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.', 'imagens/carousel3/2.png', 2, 1, NULL),
(3, 'Conferência — Desafios tecnológicos para a próxima década.', '17/16/2010', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget rutrum nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget rutrum nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget rutrum nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.', 'imagens/carousel3/3.png', 3, 1, NULL),
(4, 'Conferência — Desafios tecnológicos para a próxima década.', '17/11/2011', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget rutrum nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget rutrum nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget rutrum nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.', 'imagens/carousel3/4.png', 4, 1, NULL),
(5, 'Conferência — Desafios tecnológicos para a próxima década.', '20/12/2021', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget rutrum nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget rutrum nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget rutrum nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.', 'imagens/carousel3/5.png', 5, 1, NULL),
(6, 'Conferência — Desafios tecnológicos para a próxima década.', '12/01/2021', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget rutrum nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget rutrum nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget rutrum nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.', 'imagens/carousel3/6.png', 6, 1, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `footer_navbar`
--

CREATE TABLE `footer_navbar` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT '#',
  `ordem` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `footer_navbar`
--

INSERT INTO `footer_navbar` (`id`, `titulo`, `url`, `ordem`) VALUES
(1, 'Empresa', '#', 1),
(2, 'Destaques', '#', 2),
(3, 'Notícias e Eventos', '#', 3),
(4, 'Soluções', '#', 4),
(5, 'Inovação e Tecnologia', '#', 5),
(6, 'Os Nossos Parceiros', '#', 6),
(7, 'Contactos', '#', 7);

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
-- Índices para tabela `carousel_topo`
--
ALTER TABLE `carousel_topo`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `footer_carousel`
--
ALTER TABLE `footer_carousel`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `footer_navbar`
--
ALTER TABLE `footer_navbar`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `navbar`
--
ALTER TABLE `navbar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `carousel_topo`
--
ALTER TABLE `carousel_topo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `footer_carousel`
--
ALTER TABLE `footer_carousel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `footer_navbar`
--
ALTER TABLE `footer_navbar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `navbar`
--
ALTER TABLE `navbar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

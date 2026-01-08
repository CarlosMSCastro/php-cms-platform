-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Jan-2026 às 05:03
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
-- Estrutura da tabela `carousel2`
--

CREATE TABLE `carousel2` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `texto` text DEFAULT NULL,
  `data` varchar(50) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `pagina_url` varchar(255) DEFAULT NULL,
  `ordem` int(11) DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `carousel2`
--

INSERT INTO `carousel2` (`id`, `titulo`, `texto`, `data`, `imagem`, `pagina_url`, `ordem`, `ativo`) VALUES
(1, 'Data Center - Tecnologia e Inovação para 2022', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget rutrum nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Morbi id ante volutpat, commodo dolor eu, ornare leo. Integer efficitur, lacus sit amet pellentesque egestas, sapien massa tristique turpis, ac faucibus augue magna et libero. Quisque vel laoreet ipsum. Sed ac eleifend justo, maximus luctus turpis. Duis at neque nec est semper cursus. Quisque quis felis eu mi congue mollis eu at odio.\r\n\r\nVivamus aliquam nisi ut mauris luctus, eget suscipit lorem congue. Morbi ac ex quam. Aenean dapibus nibh vel nisi hendrerit venenatis a vitae nunc. In hac habitasse platea dictumst. Curabitur eleifend sagittis arcu,', '03/07/2009', 'imagens/carousel2/destaque_1.jpg', 'destaque.php?id=1', 1, 1),
(2, 'Lorem ipsum - dolor sit amet, consectetur adis', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget rutrum nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Morbi id ante volutpat, commodo dolor eu, ornare leo. Integer efficitur, lacus sit amet pellentesque egestas, sapien massa tristique turpis, ac faucibus augue magna et libero. Quisque vel laoreet ipsum. Sed ac eleifend justo, maximus luctus turpis. Duis at neque nec est semper cursus. Quisque quis felis eu mi congue mollis eu at odio.\r\n\r\nVivamus aliquam nisi ut mauris luctus, eget suscipit lorem congue. Morbi ac ex quam. Aenean dapibus nibh vel nisi hendrerit venenatis a vitae nunc. In hac habitasse platea dictumst. Curabitur eleifend sagittis arcu,', '11/02/2015', 'imagens/carousel2/destaque_2.jpg', 'destaque.php?id=2', 2, 1),
(3, 'Lorem ipsum - dolor sit amet, consectetur adis', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget rutrum nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Morbi id ante volutpat, commodo dolor eu, ornare leo. Integer efficitur, lacus sit amet pellentesque egestas, sapien massa tristique turpis, ac faucibus augue magna et libero. Quisque vel laoreet ipsum. Sed ac eleifend justo, maximus luctus turpis. Duis at neque nec est semper cursus. Quisque quis felis eu mi congue mollis eu at odio.\r\n\r\nVivamus aliquam nisi ut mauris luctus, eget suscipit lorem congue. Morbi ac ex quam. Aenean dapibus nibh vel nisi hendrerit venenatis a vitae nunc. In hac habitasse platea dictumst. Curabitur eleifend sagittis arcu,', '27/08/2012', 'imagens/carousel2/destaque_3.jpg', 'destaque.php?id=3', 3, 1),
(4, 'Lorem ipsum - dolor sit amet, consectetur adis', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget rutrum nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Morbi id ante volutpat, commodo dolor eu, ornare leo. Integer efficitur, lacus sit amet pellentesque egestas, sapien massa tristique turpis, ac faucibus augue magna et libero. Quisque vel laoreet ipsum. Sed ac eleifend justo, maximus luctus turpis. Duis at neque nec est semper cursus. Quisque quis felis eu mi congue mollis eu at odio.\r\n\r\nVivamus aliquam nisi ut mauris luctus, eget suscipit lorem congue. Morbi ac ex quam. Aenean dapibus nibh vel nisi hendrerit venenatis a vitae nunc. In hac habitasse platea dictumst. Curabitur eleifend sagittis arcu,', '05/03/2011', 'imagens/carousel2/destaque_4.jpg', 'destaque.php?id=4', 4, 1),
(5, 'Lorem ipsum - dolor sit amet, consectetur adis', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget rutrum nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Morbi id ante volutpat, commodo dolor eu, ornare leo. Integer efficitur, lacus sit amet pellentesque egestas, sapien massa tristique turpis, ac faucibus augue magna et libero. Quisque vel laoreet ipsum. Sed ac eleifend justo, maximus luctus turpis. Duis at neque nec est semper cursus. Quisque quis felis eu mi congue mollis eu at odio.\r\n\r\nVivamus aliquam nisi ut mauris luctus, eget suscipit lorem congue. Morbi ac ex quam. Aenean dapibus nibh vel nisi hendrerit venenatis a vitae nunc. In hac habitasse platea dictumst. Curabitur eleifend sagittis arcu,', '18/09/2013', 'imagens/carousel2/destaque_5.jpg', 'destaque.php?id=5', 5, 1),
(6, 'Lorem ipsum - dolor sit amet, consectetur adis', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget rutrum nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Morbi id ante volutpat, commodo dolor eu, ornare leo. Integer efficitur, lacus sit amet pellentesque egestas, sapien massa tristique turpis, ac faucibus augue magna et libero. Quisque vel laoreet ipsum. Sed ac eleifend justo, maximus luctus turpis. Duis at neque nec est semper cursus. Quisque quis felis eu mi congue mollis eu at odio.\r\n\r\nVivamus aliquam nisi ut mauris luctus, eget suscipit lorem congue. Morbi ac ex quam. Aenean dapibus nibh vel nisi hendrerit venenatis a vitae nunc. In hac habitasse platea dictumst. Curabitur eleifend sagittis arcu,', '11/11/2008', 'imagens/carousel2/destaque_6.jpg', 'destaque.php?id=6', 6, 1),
(7, 'Lorem ipsum - dolor sit amet, consectetur adis', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget rutrum nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Morbi id ante volutpat, commodo dolor eu, ornare leo. Integer efficitur, lacus sit amet pellentesque egestas, sapien massa tristique turpis, ac faucibus augue magna et libero. Quisque vel laoreet ipsum. Sed ac eleifend justo, maximus luctus turpis. Duis at neque nec est semper cursus. Quisque quis felis eu mi congue mollis eu at odio.\r\n\r\nVivamus aliquam nisi ut mauris luctus, eget suscipit lorem congue. Morbi ac ex quam. Aenean dapibus nibh vel nisi hendrerit venenatis a vitae nunc. In hac habitasse platea dictumst. Curabitur eleifend sagittis arcu,', '03/07/2009', 'imagens/carousel2/destaque_1.jpg', 'destaque.php?id=7', 7, 0),
(8, 'Lorem ipsum - dolor sit amet, consectetur adis', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget rutrum nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Morbi id ante volutpat, commodo dolor eu, ornare leo. Integer efficitur, lacus sit amet pellentesque egestas, sapien massa tristique turpis, ac faucibus augue magna et libero. Quisque vel laoreet ipsum. Sed ac eleifend justo, maximus luctus turpis. Duis at neque nec est semper cursus. Quisque quis felis eu mi congue mollis eu at odio.\r\n\r\nVivamus aliquam nisi ut mauris luctus, eget suscipit lorem congue. Morbi ac ex quam. Aenean dapibus nibh vel nisi hendrerit venenatis a vitae nunc. In hac habitasse platea dictumst. Curabitur eleifend sagittis arcu,', '12/05/2012', 'imagens/carousel2/destaque_2.jpg', 'destaque.php?id=8', 8, 0),
(9, 'Lorem ipsum - dolor sit amet, consectetur adis', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget rutrum nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Morbi id ante volutpat, commodo dolor eu, ornare leo. Integer efficitur, lacus sit amet pellentesque egestas, sapien massa tristique turpis, ac faucibus augue magna et libero. Quisque vel laoreet ipsum. Sed ac eleifend justo, maximus luctus turpis. Duis at neque nec est semper cursus. Quisque quis felis eu mi congue mollis eu at odio.\r\n\r\nVivamus aliquam nisi ut mauris luctus, eget suscipit lorem congue. Morbi ac ex quam. Aenean dapibus nibh vel nisi hendrerit venenatis a vitae nunc. In hac habitasse platea dictumst. Curabitur eleifend sagittis arcu,', '21/08/2015', 'imagens/carousel2/destaque_3.jpg', 'destaque.php?id=9', 9, 0),
(10, 'Lorem ipsum - dolor sit amet, consectetur adis', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget rutrum nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Morbi id ante volutpat, commodo dolor eu, ornare leo. Integer efficitur, lacus sit amet pellentesque egestas, sapien massa tristique turpis, ac faucibus augue magna et libero. Quisque vel laoreet ipsum. Sed ac eleifend justo, maximus luctus turpis. Duis at neque nec est semper cursus. Quisque quis felis eu mi congue mollis eu at odio.\r\n\r\nVivamus aliquam nisi ut mauris luctus, eget suscipit lorem congue. Morbi ac ex quam. Aenean dapibus nibh vel nisi hendrerit venenatis a vitae nunc. In hac habitasse platea dictumst. Curabitur eleifend sagittis arcu,', '05/11/2018', 'imagens/carousel2/destaque_4.jpg', 'destaque.php?id=10', 10, 0),
(11, 'Lorem ipsum - dolor sit amet, consectetur adis', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget rutrum nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Morbi id ante volutpat, commodo dolor eu, ornare leo. Integer efficitur, lacus sit amet pellentesque egestas, sapien massa tristique turpis, ac faucibus augue magna et libero. Quisque vel laoreet ipsum. Sed ac eleifend justo, maximus luctus turpis. Duis at neque nec est semper cursus. Quisque quis felis eu mi congue mollis eu at odio.\r\n\r\nVivamus aliquam nisi ut mauris luctus, eget suscipit lorem congue. Morbi ac ex quam. Aenean dapibus nibh vel nisi hendrerit venenatis a vitae nunc. In hac habitasse platea dictumst. Curabitur eleifend sagittis arcu,', '14/02/2020', 'imagens/carousel2/destaque_5.jpg', 'destaque.php?id=11', 11, 0),
(12, 'Lorem ipsum - dolor sit amet, consectetur adis', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget rutrum nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Morbi id ante volutpat, commodo dolor eu, ornare leo. Integer efficitur, lacus sit amet pellentesque egestas, sapien massa tristique turpis, ac faucibus augue magna et libero. Quisque vel laoreet ipsum. Sed ac eleifend justo, maximus luctus turpis. Duis at neque nec est semper cursus. Quisque quis felis eu mi congue mollis eu at odio.\r\n\r\nVivamus aliquam nisi ut mauris luctus, eget suscipit lorem congue. Morbi ac ex quam. Aenean dapibus nibh vel nisi hendrerit venenatis a vitae nunc. In hac habitasse platea dictumst. Curabitur eleifend sagittis arcu,', '30/06/2023', 'imagens/carousel2/destaque_6.jpg', 'destaque.php?id=12', 12, 0),
(13, 'Lorem ipsum - dolor sit amet, consectetur adis', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget rutrum nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Morbi id ante volutpat, commodo dolor eu, ornare leo. Integer efficitur, lacus sit amet pellentesque egestas, sapien massa tristique turpis, ac faucibus augue magna et libero. Quisque vel laoreet ipsum. Sed ac eleifend justo, maximus luctus turpis. Duis at neque nec est semper cursus. Quisque quis felis eu mi congue mollis eu at odio.\r\n\r\nVivamus aliquam nisi ut mauris luctus, eget suscipit lorem congue. Morbi ac ex quam. Aenean dapibus nibh vel nisi hendrerit venenatis a vitae nunc. In hac habitasse platea dictumst. Curabitur eleifend sagittis arcu,', '17/03/2010', 'imagens/carousel2/destaque_1.jpg', 'destaque.php?id=13', 13, 0),
(14, 'Lorem ipsum - dolor sit amet, consectetur adis', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget rutrum nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Morbi id ante volutpat, commodo dolor eu, ornare leo. Integer efficitur, lacus sit amet pellentesque egestas, sapien massa tristique turpis, ac faucibus augue magna et libero. Quisque vel laoreet ipsum. Sed ac eleifend justo, maximus luctus turpis. Duis at neque nec est semper cursus. Quisque quis felis eu mi congue mollis eu at odio.\r\n\r\nVivamus aliquam nisi ut mauris luctus, eget suscipit lorem congue. Morbi ac ex quam. Aenean dapibus nibh vel nisi hendrerit venenatis a vitae nunc. In hac habitasse platea dictumst. Curabitur eleifend sagittis arcu,', '22/09/2013', 'imagens/carousel2/destaque_2.jpg', 'destaque.php?id=14', 14, 0),
(15, 'Lorem ipsum - dolor sit amet, consectetur adis', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget rutrum nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Morbi id ante volutpat, commodo dolor eu, ornare leo. Integer efficitur, lacus sit amet pellentesque egestas, sapien massa tristique turpis, ac faucibus augue magna et libero. Quisque vel laoreet ipsum. Sed ac eleifend justo, maximus luctus turpis. Duis at neque nec est semper cursus. Quisque quis felis eu mi congue mollis eu at odio.\r\n\r\nVivamus aliquam nisi ut mauris luctus, eget suscipit lorem congue. Morbi ac ex quam. Aenean dapibus nibh vel nisi hendrerit venenatis a vitae nunc. In hac habitasse platea dictumst. Curabitur eleifend sagittis arcu,', '09/06/2017', 'imagens/carousel2/destaque_3.jpg', 'destaque.php?id=15', 15, 0),
(16, 'Lorem ipsum - dolor sit amet, consectetur adis', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget rutrum nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Morbi id ante volutpat, commodo dolor eu, ornare leo. Integer efficitur, lacus sit amet pellentesque egestas, sapien massa tristique turpis, ac faucibus augue magna et libero. Quisque vel laoreet ipsum. Sed ac eleifend justo, maximus luctus turpis. Duis at neque nec est semper cursus. Quisque quis felis eu mi congue mollis eu at odio.\r\n\r\nVivamus aliquam nisi ut mauris luctus, eget suscipit lorem congue. Morbi ac ex quam. Aenean dapibus nibh vel nisi hendrerit venenatis a vitae nunc. In hac habitasse platea dictumst. Curabitur eleifend sagittis arcu,', '05/12/2021', 'imagens/carousel2/destaque_4.jpg', 'destaque.php?id=16', 16, 0);

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
(1, 'Conferência — Desafios tecnológicos para a próxima década.', '07/12/2007', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget rutrum nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget rutrum nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget rutrum nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.', 'imagens/carousel3/1.jpg', 1, 1, 'noticia.php?id=1'),
(2, 'Conferência — Desafios tecnológicos para a próxima década.', '08/10/2009', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget rutrum nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget rutrum nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget rutrum nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.', 'imagens/carousel3/2.png', 2, 1, 'noticia.php?id=2'),
(3, 'Conferência — Desafios tecnológicos para a próxima década.', '17/16/2010', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget rutrum nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget rutrum nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget rutrum nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.', 'imagens/carousel3/3.png', 3, 1, 'noticia.php?id=3'),
(4, 'Conferência — Desafios tecnológicos para a próxima década.', '17/11/2011', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget rutrum nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget rutrum nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget rutrum nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.', 'imagens/carousel3/4.png', 4, 1, 'noticia.php?id=4'),
(5, 'Conferência — Desafios tecnológicos para a próxima década.', '20/12/2021', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget rutrum nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget rutrum nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget rutrum nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.', 'imagens/carousel3/5.png', 5, 1, 'noticia.php?id=5'),
(6, 'Conferência — Desafios tecnológicos para a próxima década.', '12/01/2021', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget rutrum nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget rutrum nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget rutrum nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.', 'imagens/carousel3/6.png', 6, 1, 'noticia.php?id=6');

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
-- Estrutura da tabela `headers`
--

CREATE TABLE `headers` (
  `id` int(11) NOT NULL,
  `tipo_pagina` varchar(50) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT 1,
  `ordem` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `headers`
--

INSERT INTO `headers` (`id`, `tipo_pagina`, `imagem`, `ativo`, `ordem`) VALUES
(1, 'empresa', 'imagens/headers/cabecalho_empresa.png', 1, 1),
(2, 'destaques', 'imagens/headers/cabecalho_destaques.png', 1, 1),
(3, 'noticias e eventos', 'imagens/headers/cabecalho_noticias_e_eventos.png', 1, 1),
(4, 'solucoes', 'imagens/headers/cabecalho_solucoes.png', 1, 1),
(5, 'inovacoes e tecnologia', 'imagens/headers/cabecalho_inovacao_e_tecnologia.png', 1, 1),
(6, 'noticias e evento', 'imagens/headers/cabecalho_noticia.png', 1, 1),
(7, 'parceiros', 'imagens/headers/cabecalho_parceiros.png', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `home_conteudo`
--

CREATE TABLE `home_conteudo` (
  `id` int(11) NOT NULL,
  `titulo_h1` varchar(255) NOT NULL,
  `titulo_h2` varchar(255) NOT NULL,
  `texto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `home_conteudo`
--

INSERT INTO `home_conteudo` (`id`, `titulo_h1`, `titulo_h2`, `texto`) VALUES
(1, 'Bem-vindo à TA Comunicações', 'O seu Parceiro Tecnológico de Excelência', 'A TA Comunicações é uma empresa especializada em fornecer soluções integradas de internet e comunicações,\r\n    que endereça clientes do segmento Corporate. Há mais de 28 anos que trabalha arduamente no sentido de se\r\n    consolidar enquanto parceiro tecnológico, potenciando a presença dos seus clientes no mercado, através de\r\n    soluções personalizadas que alavancam as receitas e reduzem os custos. Com representação das melhores\r\n    marcas e vasta experiência, posiciona-se como um fornecedor global de telecomunicações, comprometido com\r\n    a prestação de um serviço de excelência, por via de uma estratégia assente na formação contínua dos seus\r\n    colaboradores. A TA Comunicações privilegia as relações assentes na confiança e no conhecimento,\r\n    permitindo uma gestão e apoio ao cliente que se diferencia no mercado tecnológico.');

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
(1, 'Empresa', '#', NULL, 1),
(2, 'Áreas de atuação', 'empresa.php?id=2', 1, 1),
(3, 'Historial', 'empresa.php?id=3', 1, 2),
(4, 'Inovação e Tecnologia', 'empresa.php?id=4', 1, 3),
(5, 'Responsabilidade Social', 'empresa.php?id=5', 1, 4),
(6, 'Destaques', 'destaques.php', NULL, 2),
(7, 'Notícias e Eventos', 'noticias.php', NULL, 3),
(8, 'Soluções', '#', NULL, 4),
(9, 'Telecomunicações', 'solucoes.php?id=9', 8, 1),
(10, 'Televisões e Audiovisuais', 'solucoes.php?id=10', 8, 2),
(11, 'Informática e Redes', 'solucoes.php?id=11', 8, 3),
(12, 'Data Center e Cibersegurança', 'solucoes.php?id=12', 8, 4),
(13, 'Internet of Things', 'solucoes.php?id=13', 8, 5),
(14, 'Assistentes Virtuais', 'solucoes.php?id=14', 8, 6),
(15, 'Inovação e Tecnologia', '#', NULL, 5),
(16, 'Inovação e Tecnologia 1', 'inovacoes.php?id=16', 15, 1),
(17, 'Inovação e Tecnologia 2', 'inovacoes.php?id=17', 15, 2),
(18, 'Inovação e Tecnologia 3', 'inovacoes.php?id=18', 15, 3),
(19, 'Inovação e Tecnologia 4', 'inovacoes.php?id=19', 15, 4),
(20, 'Inovação e Tecnologia 5', 'inovacoes.php?id=20', 15, 5),
(21, 'Inovação e Tecnologia 6', 'inovacoes.php?id=21', 15, 6),
(22, 'Os Nossos Parceiros', 'parceiros.php', NULL, 6),
(23, 'Contactos', 'pagina.php?id=23', NULL, 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `paginas_empresa`
--

CREATE TABLE `paginas_empresa` (
  `id` int(11) NOT NULL,
  `titulo_h1` varchar(255) NOT NULL,
  `texto` text NOT NULL,
  `id_navbar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `paginas_empresa`
--

INSERT INTO `paginas_empresa` (`id`, `titulo_h1`, `texto`, `id_navbar`) VALUES
(1, 'Área de Atuação', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad \r\nminim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate \r\nvelit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue \r\nduis dolore te feugait nulla facilisi.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad \r\nminim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad \r\nminim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate \r\nvelit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue \r\nduis dolore te feugait nulla facilisi.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad \r\nminim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad \r\nminim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate \r\nvelit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue \r\nduis dolore te feugait nulla facilisi.</p>', 2),
(2, 'Historial', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad \r\nminim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate \r\nvelit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue \r\nduis dolore te feugait nulla facilisi.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad \r\nminim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad \r\nminim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate \r\nvelit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue \r\nduis dolore te feugait nulla facilisi.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad \r\nminim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad \r\nminim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate \r\nvelit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue \r\nduis dolore te feugait nulla facilisi.</p>', 3),
(3, 'Inovação e Tecnologia', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad \r\nminim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate \r\nvelit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue \r\nduis dolore te feugait nulla facilisi.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad \r\nminim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad \r\nminim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate \r\nvelit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue \r\nduis dolore te feugait nulla facilisi.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad \r\nminim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad \r\nminim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate \r\nvelit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue \r\nduis dolore te feugait nulla facilisi.</p>', 4),
(4, 'Responsabilidade Social', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad \r\nminim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate \r\nvelit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue \r\nduis dolore te feugait nulla facilisi.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad \r\nminim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad \r\nminim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate \r\nvelit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue \r\nduis dolore te feugait nulla facilisi.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad \r\nminim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad \r\nminim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate \r\nvelit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue \r\nduis dolore te feugait nulla facilisi.</p>', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `paginas_inovacoes`
--

CREATE TABLE `paginas_inovacoes` (
  `id` int(11) NOT NULL,
  `titulo_h1` varchar(255) NOT NULL,
  `texto` text NOT NULL,
  `texto_2` text NOT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `id_navbar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `paginas_inovacoes`
--

INSERT INTO `paginas_inovacoes` (`id`, `titulo_h1`, `texto`, `texto_2`, `imagem`, `id_navbar`) VALUES
(1, 'Inovações e Tecnologia 1', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.', 'imagens/inovacao/inovacao_1.jpg', 16),
(2, 'Inovações e Tecnologia 2', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.', 'imagens/inovacao/inovacao_2.jpg', 17),
(3, 'Inovações e Tecnologia 3', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.', 'imagens/inovacao/inovacao_3.jpg', 18),
(4, 'Inovações e Tecnologia 4', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.', 'imagens/inovacao/inovacao_4.jpg', 19),
(5, 'Inovações e Tecnologia 5', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.', 'imagens/inovacao/inovacao_5.webp', 20),
(6, 'Inovações e Tecnologia 6', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.', 'imagens/inovacao/inovacao_6.jpg', 21);

-- --------------------------------------------------------

--
-- Estrutura da tabela `paginas_solucoes`
--

CREATE TABLE `paginas_solucoes` (
  `id` int(11) NOT NULL,
  `titulo_h1` varchar(255) NOT NULL,
  `texto` text NOT NULL,
  `texto_2` text DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `id_navbar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `paginas_solucoes`
--

INSERT INTO `paginas_solucoes` (`id`, `titulo_h1`, `texto`, `texto_2`, `imagem`, `id_navbar`) VALUES
(1, 'Telecomunicações', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.', 'imagens/solucoes/solucao_1.jpg', 9),
(2, 'Televisões e Audiovisuais', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.', 'imagens/solucoes/solucao_2.webp', 10),
(3, 'Informática e Redes', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.', 'imagens/solucoes/solucao_3.jpg', 11),
(4, 'Data Center e Cibersegurança', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.', 'imagens/solucoes/solucao_4.jpg', 12),
(5, 'Internet of Things', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.', 'imagens/solucoes/solucao_2.webp', 13),
(6, 'Assistentes Virtuais', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.', 'imagens/solucoes/solucao_3.jpg', 14);

-- --------------------------------------------------------

--
-- Estrutura da tabela `parceiros`
--

CREATE TABLE `parceiros` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `imagem_grande` varchar(255) DEFAULT NULL,
  `imagem_pequena` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `parceiros`
--

INSERT INTO `parceiros` (`id`, `nome`, `imagem_grande`, `imagem_pequena`) VALUES
(1, 'Altice Empresas', 'imagens/footer/altice_Empresas.svg', NULL),
(2, 'Samsung', NULL, 'imagens/footer/samsung.svg'),
(3, 'Dell', NULL, 'imagens/footer/dell.svg'),
(4, 'Aruba', NULL, 'imagens/footer/aruba.svg'),
(5, 'HP', NULL, 'imagens/footer/hp.svg');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `carousel2`
--
ALTER TABLE `carousel2`
  ADD PRIMARY KEY (`id`);

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
-- Índices para tabela `headers`
--
ALTER TABLE `headers`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `home_conteudo`
--
ALTER TABLE `home_conteudo`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `navbar`
--
ALTER TABLE `navbar`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `paginas_empresa`
--
ALTER TABLE `paginas_empresa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_navbar` (`id_navbar`);

--
-- Índices para tabela `paginas_inovacoes`
--
ALTER TABLE `paginas_inovacoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_navbar` (`id_navbar`);

--
-- Índices para tabela `paginas_solucoes`
--
ALTER TABLE `paginas_solucoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_navbar` (`id_navbar`);

--
-- Índices para tabela `parceiros`
--
ALTER TABLE `parceiros`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `carousel2`
--
ALTER TABLE `carousel2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
-- AUTO_INCREMENT de tabela `headers`
--
ALTER TABLE `headers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `home_conteudo`
--
ALTER TABLE `home_conteudo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `navbar`
--
ALTER TABLE `navbar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `paginas_empresa`
--
ALTER TABLE `paginas_empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `paginas_inovacoes`
--
ALTER TABLE `paginas_inovacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `paginas_solucoes`
--
ALTER TABLE `paginas_solucoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `parceiros`
--
ALTER TABLE `parceiros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `paginas_empresa`
--
ALTER TABLE `paginas_empresa`
  ADD CONSTRAINT `paginas_empresa_ibfk_1` FOREIGN KEY (`id_navbar`) REFERENCES `navbar` (`id`);

--
-- Limitadores para a tabela `paginas_inovacoes`
--
ALTER TABLE `paginas_inovacoes`
  ADD CONSTRAINT `paginas_inovacoes_ibfk_1` FOREIGN KEY (`id_navbar`) REFERENCES `navbar` (`id`);

--
-- Limitadores para a tabela `paginas_solucoes`
--
ALTER TABLE `paginas_solucoes`
  ADD CONSTRAINT `paginas_solucoes_ibfk_1` FOREIGN KEY (`id_navbar`) REFERENCES `navbar` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

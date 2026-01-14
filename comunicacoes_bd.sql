-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14-Jan-2026 às 06:05
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
-- Estrutura da tabela `cabecalhos`
--

CREATE TABLE `cabecalhos` (
  `id` int(11) NOT NULL,
  `tipo_pagina` varchar(50) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT 1,
  `ordem` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cabecalhos`
--

INSERT INTO `cabecalhos` (`id`, `tipo_pagina`, `imagem`, `ativo`, `ordem`) VALUES
(1, 'empresa', 'http://localhost/comunicacoes/backoffice/uploads/cabecalho_empresa.png', 1, 1),
(2, 'destaques', 'http://localhost/comunicacoes/backoffice/uploads/cabecalho_destaque.png', 1, 1),
(3, 'noticias e eventos', 'http://localhost/comunicacoes/backoffice/uploads/cabecalho_noticias_e_eventos.png', 1, 1),
(4, 'solucoes', 'http://localhost/comunicacoes/backoffice/uploads/cabecalho_solucoes.png', 1, 1),
(5, 'inovacoes e tecnologia', 'http://localhost/comunicacoes/backoffice/uploads/cabecalho_inovacao_e_tecnologia.png', 1, 1),
(6, 'noticias e evento', 'http://localhost/comunicacoes/backoffice/uploads/cabecalho_noticia.png', 1, 1),
(7, 'contactos', 'http://localhost/comunicacoes/backoffice/uploads/cabecalho_contactos.png', 1, 1),
(8, 'parceiros', 'http://localhost/comunicacoes/backoffice/uploads/cabecalho_parceiros.png', 1, 1);

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
(1, 'Parceria Estratégica com a GlobalNet Porto', '<p><img src=\"http://localhost/comunicacoes/backoffice/uploads/porto-4.webp\" width=\"1081\" height=\"412\"></p>\r\n<p style=\"text-align: justify;\">No Porto, a Comunica&ccedil;&otilde;es formalizou uma parceria estrat&eacute;gica com a <strong data-start=\"895\" data-end=\"908\">GlobalNet</strong>, destinada a implementar solu&ccedil;&otilde;es de conectividade corporativa em 15 filiais de grandes empresas. A iniciativa permitir&aacute; consolidar redes internas, otimizar tr&aacute;fego de dados e reduzir custos operacionais, refor&ccedil;ando a efici&ecirc;ncia tecnol&oacute;gica das organiza&ccedil;&otilde;es envolvidas.</p>', '2017-08-02', 'backoffice/uploads/porto-4.webp', 'destaque.php?id=1', 1, 1),
(3, 'Prémio de Inovação em Braga', '<p>&nbsp;</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://localhost/comunicacoes/backoffice/uploads/cegid_16.jpg\" width=\"925\" height=\"616\"></p>\r\n<p style=\"text-align: justify;\">Durante a confer&ecirc;ncia <strong data-start=\"1630\" data-end=\"1649\">TechAwards 2026</strong> em Braga, a Comunica&ccedil;&otilde;es recebeu o pr&eacute;mio &ldquo;Melhor Parceiro em Solu&ccedil;&otilde;es Integradas&rdquo;, destacando-se pelo impacto de suas solu&ccedil;&otilde;es personalizadas no segmento Corporate. Carlos Almeida, CTO da empresa, recebeu a distin&ccedil;&atilde;o em nome da equipa, enfatizando o compromisso cont&iacute;nuo com a inova&ccedil;&atilde;o e excel&ecirc;ncia de servi&ccedil;o.</p>', '2023-12-04', 'backoffice/uploads/cegid_16.jpg', 'destaque.php?id=3', 3, 1),
(4, 'Workshop de Cibersegurança em Coimbra', '<p style=\"text-align: center;\"><img src=\"http://localhost/comunicacoes/backoffice/uploads/isec-768x448.jpg\" width=\"585\" height=\"374\"></p>\r\n<p style=\"text-align: justify;\">No campus tecnol&oacute;gico de Coimbra, a Comunica&ccedil;&otilde;es conduziu um workshop intensivo sobre ciberseguran&ccedil;a para gestores de TI. Durante o evento, que contou com 80 participantes, foram apresentadas metodologias de prote&ccedil;&atilde;o de dados corporativos, preven&ccedil;&atilde;o contra ataques de ransomware e boas pr&aacute;ticas na gest&atilde;o de acessos em ambientes cr&iacute;ticos.</p>', '2017-03-05', 'backoffice/uploads/isec-768x448.jpg', 'destaque.php?id=4', 4, 1),
(5, 'Case Study TA Comunicações, Aruba HPE e Feels Like Home', '<p style=\"text-align:justify;\"><img src=\"https://tacomunicacoes.pt//public/uploads/noticias/memoria_lx%20(002).jpg\" alt=\"\" width=\"535\" height=\"378\"></p><p style=\"text-align:justify;\">É, mais uma vez, o resultado de uma visão clara das necessidades dos nossos Clientes e da dedicação de uma Equipa comprometida em prestar um serviço de excelência.</p><p style=\"text-align:justify;\"><a href=\"https://www.itchannel.pt/news/redes-and-telecom/hpe-aruba-networking-e-ta-comunicacoes-melhoram-experiencia-dos-hospedes-do-grupo-flh-com-rede-robusta-e-escalavel\"><u>Veja a noticia completa aqui pelo IT Channel</u></a></p><p style=\"text-align:justify;\">Agradecemos a confiança...</p>', '2022-05-10', 'backoffice/uploads/memoria.jpg', 'destaque.php?id=5', 5, 1),
(6, 'Comunicações e The NM 41 Hotel', '<p style=\"text-align: center;\"><img src=\"https://tacomunicacoes.pt//public/uploads/noticias/1755621260905.jpg\" alt=\"\" width=\"535\" height=\"357\"></p>\r\n<p style=\"text-align: justify;\">&Eacute; com muito orgulho que vimos uma vez mais o nosso trabalho a ser reconhecido, alcan&ccedil;ando mais uma meta de excel&ecirc;ncia, com a implementa&ccedil;&atilde;o da rede WIFI Aruba HPE, Servidor de comunica&ccedil;&otilde;es Mitel e audiovisuais Samsung no charmoso em Lagos.</p>\r\n<p style=\"text-align: center;\"><img src=\"https://tacomunicacoes.pt//public/uploads/noticias/1755621260537.jpg\" alt=\"\" width=\"401\" height=\"535\"></p>\r\n<p>&Eacute;, mais uma vez, o resultado de uma vis&atilde;o clara das necessidades dos nossos Clientes e da dedica&ccedil;&atilde;o de uma Equipa comprometida em prestar um servi&ccedil;o de excel&ecirc;ncia.&nbsp;Agradecemos a confian&ccedil;a.</p>', '2008-11-11', 'backoffice/uploads/mn56.jpg', 'destaque.php?id=6', 6, 1),
(14, 'Implementação de Redes Inteligentes em Aveiro', '<p style=\"text-align: justify;\">A empresa implementou solu&ccedil;&otilde;es de redes inteligentes em tr&ecirc;s complexos corporativos de Aveiro, melhorando a monitoriza&ccedil;&atilde;o de tr&aacute;fego de dados e a gest&atilde;o de recursos tecnol&oacute;gicos. A iniciativa incluiu a integra&ccedil;&atilde;o de sensores IoT e dashboards de an&aacute;lise em tempo real, otimizando a tomada de decis&atilde;o operacional das empresas envolvidas.<img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://localhost/comunicacoes/backoffice/uploads/20220926_122421.jpg\"></p>', '2022-03-23', 'backoffice/uploads/20220926_122421.jpg', 'destaque.php?id=14', 14, 0),
(15, 'Nova Unidade de Suporte Técnico em Faro', '<p style=\"text-align: justify;\">A Comunica&ccedil;&otilde;es inaugurou em Faro uma nova unidade de suporte t&eacute;cnico, destinada a atender clientes da regi&atilde;o do Algarve com servi&ccedil;os especializados de manuten&ccedil;&atilde;o de redes, telecomunica&ccedil;&otilde;es e integra&ccedil;&atilde;o de sistemas. A unidade contar&aacute; com 12 t&eacute;cnicos certificados e permitir&aacute; uma resposta mais r&aacute;pida a incidentes cr&iacute;ticos.</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://localhost/comunicacoes/backoffice/uploads/faro-4401284_1920-1-1024x683.jpg\" width=\"636\" height=\"424\"></p>', '2017-09-06', 'backoffice/uploads/faro-4401284_1920-1-1024x683.jpg', 'destaque.php?id=15', 15, 0),
(16, 'Lançamento da Plataforma Digital Empresarial em Lisboa', '<p style=\"text-align: right;\"><img style=\"float: left;\" src=\"http://localhost/comunicacoes/backoffice/uploads/escritorios-as-zonas-de-maior-procura-em-lisboa-2.jpg\" width=\"551\" height=\"422\"></p>\r\n<p style=\"text-align: right;\">A Comunica&ccedil;&otilde;es marcou presen&ccedil;a no lan&ccedil;amento da nova plataforma digital da <strong data-start=\"361\" data-end=\"373\">TechNova</strong> em Lisboa, num evento que reuniu mais de 200&nbsp;gestores de TI e inova&ccedil;&atilde;o. A plataforma foi projetada para integrar solu&ccedil;&otilde;es de comunica&ccedil;&atilde;o interna e externa, incorporando intelig&ecirc;ncia artificial para otimiza&ccedil;&atilde;o do atendimento&nbsp; &nbsp;ao cliente e automa&ccedil;&atilde;o de processos administrativos. Maria Sim&otilde;es, diretora de inova&ccedil;&atilde;o da TechNova, destacou o papel da Comunica&ccedil;&otilde;es como parceira estrat&eacute;gica neste projeto.</p>', '2021-05-12', 'backoffice/uploads/escritorios-as-zonas-de-maior-procura-em-lisboa-2.jpg', 'destaque.php?id=16', 16, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `carousel_topo`
--

CREATE TABLE `carousel_topo` (
  `id` int(11) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `ordem` int(11) NOT NULL DEFAULT 0,
  `ativo` tinyint(1) NOT NULL DEFAULT 1,
  `data_insercao` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `carousel_topo`
--

INSERT INTO `carousel_topo` (`id`, `imagem`, `ordem`, `ativo`, `data_insercao`) VALUES
(1, 'backoffice/uploads/cabecalho_home.png', 1, 1, '2026-01-09 01:35:43'),
(2, 'backoffice/uploads/cabecalho_destaque.png', 2, 1, '2026-01-09 01:35:43'),
(3, 'backoffice/uploads/cabecalho_contactos.png', 3, 1, '2026-01-09 01:35:43'),
(4, 'backoffice/uploads/cabecalho_noticias_e_eventos.png', 4, 1, '2026-01-09 01:35:43');

-- --------------------------------------------------------

--
-- Estrutura da tabela `colaboradores`
--

CREATE TABLE `colaboradores` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `data_ultimo_acesso` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `colaboradores`
--

INSERT INTO `colaboradores` (`id`, `username`, `password`, `nome`, `data_ultimo_acesso`) VALUES
(1, 'admin', '$2y$10$ZYjApfjjUBens8/zaW/0y.Sv/e0SvYIXlUhj3ybxddP0sMEwFs3Qm', 'Administrador', '18:56:40 - 13/01/2026');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contactos`
--

CREATE TABLE `contactos` (
  `id` int(11) NOT NULL,
  `morada` varchar(255) DEFAULT NULL,
  `telefone` varchar(50) DEFAULT NULL,
  `fax` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `nif` varchar(50) DEFAULT NULL,
  `gps` varchar(100) DEFAULT NULL,
  `iframe_mapa` text NOT NULL,
  `gps_iframe_url` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `contactos`
--

INSERT INTO `contactos` (`id`, `morada`, `telefone`, `fax`, `email`, `nif`, `gps`, `iframe_mapa`, `gps_iframe_url`) VALUES
(1, 'Rua da Felicidade\r\nEscritório 1\r\n1234-567 Lisboa', '(+351) 212 345 678', '(+351) 218 765 432', 'geral@comunicacoes.pt', '111 222 444', '+11° 22\' 33.44\", -5° 66\' 77.88\"', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d1559.9880050579154!2d-9.335241447003197!3d38.71287539603649!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMzjCsDQyJzQ2LjkiTiA5wrAyMCcwNS44Ilc!5e0!3m2!1spt-PT!2spt!4v1767904586443!5m2!1spt-PT!2spt\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3486.868923206115!2d-8.598409450988195!3d41.36412674123536!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1spt-PT!2spt!4v1768365040580!5m2!1spt-PT!2spt\"  style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contactos_form`
--

CREATE TABLE `contactos_form` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefone` varchar(50) DEFAULT NULL,
  `assunto` varchar(255) DEFAULT NULL,
  `mensagem` text DEFAULT NULL,
  `receber_copia` tinyint(1) DEFAULT 0,
  `data_envio` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `contactos_form`
--

INSERT INTO `contactos_form` (`id`, `nome`, `email`, `telefone`, `assunto`, `mensagem`, `receber_copia`, `data_envio`) VALUES
(1, 'CarlosCastro', 'CARLOSCASTRO96@LIVE.COM.PT', '911074815', 'Primeiro Teste', 'Olá Mundo!', 0, '2026-01-08 18:47:13'),
(2, 'CarlosCastro', 'CARLOSCASTRO96@LIVE.COM.PT', '911074815', 'Primeiro Teste', 'Olá Mundo!', 0, '2026-01-08 18:51:23'),
(3, 'João Castro', 'joaocastroteste@mail.com', '911023332', 'Testar esta sht', 'Ola World', 1, '2026-01-08 18:52:20'),
(4, 'Deolinda Castro', 'deolinda.castro@mail.com', '1233212456', 'Teste2', 'Teste', 1, '2026-01-08 18:54:58'),
(5, 'Deolinda Castro', 'deolinda.castro@mail.com', '1233212456', 'Teste2', 'Teste', 1, '2026-01-08 18:55:58'),
(6, 'Cristiano Ronaldo', 'cristiano.ronaldo@mail.com', '999222433', 'Oblha', 'SIIIIIIIIU', 1, '2026-01-08 19:15:35');

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
(1, 'Conferência — Desafios tecnológicos para a próxima década.', '2018-11-12', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget rutrum nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget rutrum nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget rutrum nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.<img src=\"http://localhost/comunicacoes/backoffice/uploads/1.jpg\"></p>', 'backoffice/uploads/1.jpg', 1, 1, 'noticia.php?id=1'),
(2, 'Conferência — Desafios tecnológicos para a próxima década.', '2015-05-05', '<p><img class=\"image_resized\" style=\"aspect-ratio:2176/1428;width:367px;\" src=\"http://localhost/comunicacoes/backoffice/uploads/2.png\" width=\"2176\" height=\"1428\"></p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget rutrum nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget rutrum nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget rutrum nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.</p>', 'backoffice/uploads/2.png', 2, 1, 'noticia.php?id=2'),
(3, 'Conferência — Desafios tecnológicos para a próxima década.', '2021-05-12', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget rutrum nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget rutrum nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget rutrum nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.<img src=\"http://localhost/comunicacoes/backoffice/uploads/inovacao_6.jpg\"></p>', 'backoffice/uploads/inovacao_6.jpg', 3, 1, 'noticia.php?id=3'),
(4, 'Conferência — Desafios tecnológicos para a próxima década.', '2021-03-12', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget rutrum nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget rutrum nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget rutrum nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.<img src=\"http://localhost/comunicacoes/imagens/carousel3/4.png\"></p>', 'imagens/carousel3/4.png', 4, 1, 'noticia.php?id=4'),
(5, 'Mitel Next 2024 Barcelona', '2014-11-12', '<p style=\"text-align:justify;\">Mitel Next 2024 Barcelona&nbsp;</p><p style=\"text-align:justify;\"><img src=\"https://tacomunicacoes.pt//public/uploads/noticias/WhatsApp%20Image%202024-05-28%20at%2021-28-15.jpg\" alt=\"\" width=\"357\" height=\"476\"></p>', 'backoffice/uploads/Mitelnext.jpg', 5, 1, 'noticia.php?id=5'),
(6, 'Inovações Portugal Convida Comunicações para Evento', '2022-02-21', '<p>O Diretor-Geral da Comunica&ccedil;&otilde;es participou, como convidado especial, no evento corporativo da Inova&ccedil;&otilde;es Portugal. Teve a oportunidade de partilhar a sua experi&ecirc;ncia pessoal, profissional e desportiva, onde procura a auto-supera&ccedil;&atilde;o constante. &Agrave; semelhan&ccedil;a da multinacional que o acolheu no evento \"O Poder do Impacto\", partilha princ&iacute;pios como a resili&ecirc;ncia, o foco nos objetivos tra&ccedil;ados, esp&iacute;rito competitivo e lideran&ccedil;a. &Eacute; desta forma que Jo&atilde;o Neto inspira as equipas com quem trabalha. O desejo e curiosidade de provar o imposs&iacute;vel, tomam forma atrav&eacute;s do cume de uma montanha em regi&otilde;es in&oacute;spitas ou atrav&eacute;s de f&oacute;rmulas que visam o desenvolvimento da sociedade humana.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://masterprohosting.com/ta_comunicacoes//public/uploads/noticias/Jo%C3%A3o_Netto_Merck_Portugal.jpg\" alt=\"joao-neto-merck-portugal-o-poder-do-impacto\" width=\"757\" height=\"504\"></p>\r\n<p>&nbsp;</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>', 'backoffice/uploads/Joao_Netto_Merck_Portugal.jpg', 6, 1, 'noticia.php?id=6');

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
(2, 'Destaques', 'destaques.php', 2),
(3, 'Notícias e Eventos', 'noticias.php', 3),
(4, 'Soluções', '#', 4),
(5, 'Inovação e Tecnologia', '#', 5),
(6, 'Os Nossos Parceiros', 'parceiros.php', 6),
(7, 'Contactos', 'contactos.php', 7);

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
(1, 'empresa', 'http://localhost/comunicacoes/backoffice/uploads/cabecalho_empresa.png', 1, 1),
(2, 'destaques', 'http://localhost/comunicacoes/backoffice/uploads/cabecalho_destaque.png', 1, 1),
(3, 'noticias e eventos', 'http://localhost/comunicacoes/backoffice/uploads/cabecalho_noticias_e_eventos.png', 1, 1),
(4, 'solucoes', 'http://localhost/comunicacoes/backoffice/uploads/cabecalho_solucoes.png', 1, 1),
(5, 'inovacoes e tecnologia', 'http://localhost/comunicacoes/backoffice/uploads/cabecalho_inovacao_e_tecnologia.png', 1, 1),
(6, 'noticias e evento', 'http://localhost/comunicacoes/backoffice/uploads/cabecalho_noticia.png', 1, 1),
(7, 'contactos', 'http://localhost/comunicacoes/backoffice/uploads/cabecalho_contactos.png', 1, 1),
(8, 'parceiros', 'http://localhost/comunicacoes/backoffice/uploads/cabecalho_parceiros.png', 1, 1);

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
(1, 'Bem-vindo à Comunicações', 'O seu Parceiro Tecnológico de Excelência', '<p>A Comunica&ccedil;&otilde;es &eacute; uma empresa especializada em fornecer solu&ccedil;&otilde;es integradas de internet e comunica&ccedil;&otilde;es, que endere&ccedil;a clientes do segmento Corporate. H&aacute; mais de 28 anos que trabalha arduamente no sentido de se consolidar enquanto parceiro tecnol&oacute;gico, potenciando a presen&ccedil;a dos seus clientes no mercado, atrav&eacute;s de solu&ccedil;&otilde;es personalizadas que alavancam as receitas e reduzem os custos .Com representa&ccedil;&atilde;o das melhores marcas e vasta experi&ecirc;ncia, posiciona-se como um fornecedor global de telecomunica&ccedil;&otilde;es, comprometido com a presta&ccedil;&atilde;o de um servi&ccedil;o de excel&ecirc;ncia, por via de uma estrat&eacute;gia assente na forma&ccedil;&atilde;o cont&iacute;nua dos seus colaboradores. A Comunica&ccedil;&otilde;es privilegia as rela&ccedil;&otilde;es assentes na confian&ccedil;a e no conhecimento, permitindo uma gest&atilde;o e apoio ao cliente que se diferencia no mercado tecnol&oacute;gico.</p>');

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
(2, 'Quem Somos', 'empresa.php?id=2', 1, 1),
(3, 'Historial', 'empresa.php?id=3', 1, 2),
(4, 'Missão, Visão e Valores', 'empresa.php?id=4', 1, 3),
(5, 'Prémios e Certificações', 'empresa.php?id=5', 1, 4),
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
(16, 'Transformação Digital', 'inovacoes.php?id=16', 15, 1),
(17, 'Inteligência Artificial e Analytics', 'inovacoes.php?id=17', 15, 2),
(18, 'Automação de Processos e Robótica', 'inovacoes.php?id=18', 15, 3),
(19, 'Realidade Virtual', 'inovacoes.php?id=19', 15, 4),
(22, 'Os Nossos Parceiros', 'parceiros.php', NULL, 6),
(23, 'Contactos', 'contactos.php', NULL, 7);

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
(1, 'Quem Somos', '<p><strong>Potenciamos a sua organiza&ccedil;&atilde;o com solu&ccedil;&otilde;es tecnol&oacute;gicas &agrave; medida</strong></p>\r\n<p>A Comunica&ccedil;&otilde;es &eacute; uma empresa tecnol&oacute;gica especializada no fornecimento de solu&ccedil;&otilde;es integradas de voz e dados, com especial enfoque no segmento Corporate. A sua atua&ccedil;&atilde;o assenta numa abordagem personalizada, que permite desenhar solu&ccedil;&otilde;es ajustadas &agrave;s necessidades reais de cada organiza&ccedil;&atilde;o, posicionando-se como um verdadeiro parceiro tecnol&oacute;gico orientado para a efici&ecirc;ncia, desempenho e crescimento sustentado dos seus clientes.</p>\r\n<p><strong>Quase 30 anos de experi&ecirc;ncia em solu&ccedil;&otilde;es integradas de comunica&ccedil;&otilde;es</strong></p>\r\n<p>Fundada em 1996 e sediada em Lisboa, a Comunica&ccedil;&otilde;es acumula praticamente tr&ecirc;s d&eacute;cadas de experi&ecirc;nciano desenvolvimento e implementa&ccedil;&atilde;o de solu&ccedil;&otilde;es integradas de comunica&ccedil;&otilde;es. Ao longo do seu percurso, tem contribu&iacute;do de forma consistente para a evolu&ccedil;&atilde;o tecnol&oacute;gica dos seus clientes, acompanhando as transforma&ccedil;&otilde;es&nbsp;do mercado e adotando, de forma cont&iacute;nua, as melhores pr&aacute;ticas e tecnologias dispon&iacute;veis. Desde a sua origem, a empresa posiciona-se como representante de refer&ecirc;ncia de solu&ccedil;&otilde;es de comunica&ccedil;&otilde;es integradas, consolidando um know-how s&oacute;lido e transversal no setor.</p>\r\n<p><strong>Atua&ccedil;&atilde;o no setor das telecomunica&ccedil;&otilde;es</strong></p>\r\n<p>O crescimento e desenvolvimento da Comunica&ccedil;&otilde;es no setor das telecomunica&ccedil;&otilde;es foi sustentado numa estrat&eacute;gia focada na oferta de um portef&oacute;lio abrangente de produtos e servi&ccedil;os tecnol&oacute;gicos. Esta abordagem permitiu disponibilizar aos clientes solu&ccedil;&otilde;es integradas chave-na-m&atilde;o, capazes de responder de forma eficaz aos desafios operacionais e estrat&eacute;gicos das organiza&ccedil;&otilde;es. Como resultado, a Comunica&ccedil;&otilde;es consolidou a sua presen&ccedil;a no mercado enquanto fornecedor global de telecomunica&ccedil;&otilde;es e empresa de refer&ecirc;ncia no setor empresarial.</p>\r\n<p><strong><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://localhost/comunicacoes/backoffice/uploads/logoipsum-234.png\"><br></strong></p>\r\n<p><strong>Compromisso com o desenvolvimento dos colaboradores</strong></p>\r\n<p>O capital humano &eacute; reconhecido como o ativo mais valioso da Comunica&ccedil;&otilde;es. A empresa assume um compromisso cont&iacute;nuo com o desenvolvimento pessoal e profissional dos seus colaboradores, investindo de forma consistente na forma&ccedil;&atilde;o, atualiza&ccedil;&atilde;o de compet&ecirc;ncias e valoriza&ccedil;&atilde;o do conhecimento t&eacute;cnico. Esta aposta reflete-se diretamente na qualidade do servi&ccedil;o prestado e na capacidade de oferecer solu&ccedil;&otilde;es inovadoras e de elevado valor acrescentado aos clientes.</p>\r\n<p><strong>Proposta de valor</strong></p>\r\n<p style=\"text-align: left;\">O principal fator diferenciador da Comunica&ccedil;&otilde;es &eacute; a rela&ccedil;&atilde;o personalizada que estabelece com cada cliente. A empresa posiciona-se como um consultor tecnol&oacute;gico de refer&ecirc;ncia, capaz de analisar, aconselhar e implementar solu&ccedil;&otilde;es ajustadas &agrave; realidade de cada neg&oacute;cio. Esta proximidade, aliada &agrave; experi&ecirc;ncia e ao conhecimento t&eacute;cnico, permite entregar solu&ccedil;&otilde;es que aumentam a efici&ecirc;ncia, reduzem custos e refor&ccedil;am a competitividade das organiza&ccedil;&otilde;es no mercado.</p>', 2),
(2, 'Historial', '<p>&nbsp;</p>\r\n<p style=\"text-align: justify;\">A Comunica&ccedil;&otilde;es nasceu com a ambi&ccedil;&atilde;o clara de ser mais do que um simples fornecedor de servi&ccedil;os de internet e telecomunica&ccedil;&otilde;es. Desde a sua funda&ccedil;&atilde;o, h&aacute; mais de 28 anos, a empresa tem vindo a construir um percurso s&oacute;lido e consistente no mercado tecnol&oacute;gico, orientado para responder &agrave;s necessidades cada vez mais exigentes do segmento Corporate. Ao longo deste caminho, a Comunica&ccedil;&otilde;es afirmou-se como um parceiro tecnol&oacute;gico de confian&ccedil;a, capaz de compreender os desafios espec&iacute;ficos de cada organiza&ccedil;&atilde;o e de transformar tecnologia em valor real .</p>\r\n<p><img style=\"float: left;\" src=\"http://localhost/comunicacoes/backoffice/uploads/logoipsum-366.png\"></p>\r\n<p style=\"text-align: justify;\">Desde os primeiros anos, a estrat&eacute;gia da Comunica&ccedil;&otilde;es assentou numa vis&atilde;o integrada das comunica&ccedil;&otilde;es empresariais. Em vez de solu&ccedil;&otilde;es isoladas ou standardizadas, a empresa optou por desenvolver abordagens personalizadas, desenhadas &agrave; medida de cada cliente, tendo sempre como objetivo potenciar a efici&ecirc;ncia operacional, aumentar a competitividade e contribuir para o crescimento sustent&aacute;vel das organiza&ccedil;&otilde;es que serve. Esta filosofia permitiu-lhe acompanhar a evolu&ccedil;&atilde;o tecnol&oacute;gica do setor, adaptando-se continuamente &agrave;s novas realidades do mercado e &agrave;s transforma&ccedil;&otilde;es digitais que marcaram as &uacute;ltimas d&eacute;cadas.</p>\r\n<p style=\"text-align: justify;\">Com uma vasta experi&ecirc;ncia acumulada, a Comunica&ccedil;&otilde;es estabeleceu parcerias estrat&eacute;gicas com algumas das melhores e mais reconhecidas marcas de tecnologia e telecomunica&ccedil;&otilde;es a n&iacute;vel nacional e internacional. Esta representa&ccedil;&atilde;o criteriosa permite-lhe oferecer solu&ccedil;&otilde;es robustas, fi&aacute;veis e tecnologicamente avan&ccedil;adas, assegurando aos seus clientes acesso a infraestruturas de elevada qualidade, servi&ccedil;os inovadores e suporte especializado. O seu posicionamento enquanto fornecedor global de telecomunica&ccedil;&otilde;es reflete a capacidade de integrar diferentes tecnologias e servi&ccedil;os numa proposta coerente, eficiente e alinhada com os objetivos de neg&oacute;cio de cada cliente.</p>\r\n<p style=\"text-align: justify;\">A excel&ecirc;ncia do servi&ccedil;o sempre foi um dos pilares fundamentais da Comunica&ccedil;&otilde;es. Para garantir esse compromisso, a empresa investe de forma cont&iacute;nua na forma&ccedil;&atilde;o e valoriza&ccedil;&atilde;o dos seus colaboradores, reconhecendo que o conhecimento t&eacute;cnico, aliado &agrave; experi&ecirc;ncia pr&aacute;tica e &agrave; capacidade de an&aacute;lise, &eacute; essencial para prestar um servi&ccedil;o diferenciador. As equipas da Comunica&ccedil;&otilde;es s&atilde;o compostas por profissionais qualificados, com profundo conhecimento do setor, preparados para antecipar necessidades, propor solu&ccedil;&otilde;es adequadas e acompanhar os clientes em todas as fases do projeto, desde o planeamento at&eacute; &agrave; implementa&ccedil;&atilde;o e suporte cont&iacute;nuo.</p>\r\n<p style=\"text-align: justify;\">Ao longo dos anos, a Comunica&ccedil;&otilde;es construiu rela&ccedil;&otilde;es duradouras com os seus clientes, baseadas na confian&ccedil;a, na proximidade e no conhecimento profundo de cada neg&oacute;cio.&nbsp;</p>\r\n<p style=\"text-align: justify;\">Hoje, a Comunica&ccedil;&otilde;es &eacute; reconhecida como um parceiro tecnol&oacute;gico s&oacute;lido, experiente e orientado para resultados, com uma proposta de valor assente na personaliza&ccedil;&atilde;o, na inova&ccedil;&atilde;o e na qualidade do servi&ccedil;o. O seu historial reflete quase tr&ecirc;s d&eacute;cadas de dedica&ccedil;&atilde;o, evolu&ccedil;&atilde;o e compromisso com a excel&ecirc;ncia, mantendo sempre o foco na cria&ccedil;&atilde;o de solu&ccedil;&otilde;es que alavancam receitas, reduzem custos e refor&ccedil;am a presen&ccedil;a dos seus clientes no mercado. Com uma vis&atilde;o orientada para o futuro, a Comunica&ccedil;&otilde;es continua a investir em tecnologia, pessoas e rela&ccedil;&otilde;es, consolidando o seu papel como refer&ecirc;ncia no setor das telecomunica&ccedil;&otilde;es empresariais.</p>', 3),
(3, 'Missão, Visão e Valores', '<p style=\"line-height: 1.2;\"><strong>Miss&atilde;o</strong></p>\r\n<p style=\"text-align: justify; line-height: 1.2;\">Apoiar as organiza&ccedil;&otilde;es na otimiza&ccedil;&atilde;o e evolu&ccedil;&atilde;o das suas infraestruturas tecnol&oacute;gicas, atrav&eacute;s do fornecimento de solu&ccedil;&otilde;es integradas de comunica&ccedil;&otilde;es, ajustadas &agrave;s necessidades espec&iacute;ficas de cada cliente. Atuamos como parceiro tecnol&oacute;gico de longo prazo, acrescentando valor ao neg&oacute;cio dos nossos clientes por meio de solu&ccedil;&otilde;es fi&aacute;veis, eficientes e orientadas para resultados, que contribuem para o aumento da competitividade, a melhoria dos processos e a sustentabilidade das organiza&ccedil;&otilde;es.</p>\r\n<p style=\"line-height: 1.2;\"><strong>Vis&atilde;o</strong></p>\r\n<p style=\"text-align: justify; line-height: 1.2;\">Afirmar-se como uma refer&ecirc;ncia no mercado das comunica&ccedil;&otilde;es empresariais, reconhecida pela excel&ecirc;ncia do servi&ccedil;o, pela proximidade com os clientes e pela capacidade de antecipar necessidades num setor em constante evolu&ccedil;&atilde;o. Procuramos crescer de forma sustentada, acompanhando a inova&ccedil;&atilde;o tecnol&oacute;gica e refor&ccedil;ando o nosso posicionamento enquanto parceiro estrat&eacute;gico das organiza&ccedil;&otilde;es, capaz de transformar tecnologia em vantagem competitiva.</p>\r\n<p style=\"line-height: 1.2;\"><strong>Valores</strong></p>\r\n<p style=\"line-height: 1.2;\">A atua&ccedil;&atilde;o da Comunica&ccedil;&otilde;es &eacute; orientada por um conjunto de valores que sustentam todas as suas decis&otilde;es e rela&ccedil;&otilde;es:</p>\r\n<ul>\r\n<li style=\"line-height: 1.2;\">\r\n<p><strong>Compromisso com o cliente</strong><br>Colocamos as necessidades dos clientes no centro da nossa atua&ccedil;&atilde;o, assegurando um acompanhamento pr&oacute;ximo, respons&aacute;vel e orientado para a cria&ccedil;&atilde;o de valor.</p>\r\n</li>\r\n<li style=\"line-height: 1.2;\">\r\n<p><strong>Confian&ccedil;a e transpar&ecirc;ncia</strong><br>Constru&iacute;mos rela&ccedil;&otilde;es duradouras baseadas na confian&ccedil;a, na integridade e na comunica&ccedil;&atilde;o clara, tanto com clientes como com parceiros e colaboradores.</p>\r\n</li>\r\n<li style=\"line-height: 1.2;\">\r\n<p><strong>Excel&ecirc;ncia e qualidade</strong><br>Procuramos a excel&ecirc;ncia em tudo o que fazemos, assegurando elevados padr&otilde;es de qualidade nos servi&ccedil;os prestados e nas solu&ccedil;&otilde;es implementadas.</p>\r\n</li>\r\n<li style=\"line-height: 1.2;\">\r\n<p><strong>Conhecimento e desenvolvimento cont&iacute;nuo</strong><br>Valorizamos o conhecimento t&eacute;cnico e a aprendizagem cont&iacute;nua, investindo no desenvolvimento das compet&ecirc;ncias dos nossos colaboradores como fator cr&iacute;tico de diferencia&ccedil;&atilde;o.</p>\r\n</li>\r\n<li style=\"line-height: 1.2;\">\r\n<p><strong>Inova&ccedil;&atilde;o e adapta&ccedil;&atilde;o</strong><br>Acompanhamos a evolu&ccedil;&atilde;o tecnol&oacute;gica e as din&acirc;micas do mercado, adotando uma postura proativa e flex&iacute;vel que nos permite responder de forma eficaz aos desafios dos nossos clientes.</p>\r\n</li>\r\n<li>\r\n<p style=\"line-height: 1.2;\"><strong>Responsabilidade e sustentabilidade</strong><br>Atuamos de forma respons&aacute;vel, promovendo pr&aacute;ticas sustent&aacute;veis e decis&otilde;es orientadas para o longo prazo, garantindo a solidez da empresa e das rela&ccedil;&otilde;es que estabelece.</p>\r\n</li>\r\n</ul>', 4),
(4, 'Prémios e Certificações', '<p style=\"text-align: right;\"><strong>\"Sozinhos Vamos Mais R&aacute;pido, Mas Juntos Vamos Mais Longe&rdquo;</strong></p>\r\n<p style=\"text-align: justify;\" data-start=\"1837\" data-end=\"2287\">Ao longo do seu percurso, a Comunica&ccedil;&otilde;es tem vindo a consolidar o seu posicionamento no mercado atrav&eacute;s da qualidade do servi&ccedil;o prestado, da consist&ecirc;ncia dos projetos implementados e da confian&ccedil;a estabelecida com os seus clientes. A empresa atua de acordo com boas pr&aacute;ticas reconhecidas internacionalmente nas &aacute;reas das comunica&ccedil;&otilde;es, seguran&ccedil;a da informa&ccedil;&atilde;o e gest&atilde;o de servi&ccedil;os tecnol&oacute;gicos, assegurando elevados padr&otilde;es de fiabilidade e desempenho.</p>\r\n<p data-start=\"2289\" data-end=\"2664\">As suas equipas t&eacute;cnicas possuem forma&ccedil;&atilde;o cont&iacute;nua e compet&ecirc;ncias especializadas em solu&ccedil;&otilde;es de comunica&ccedil;&otilde;es empresariais, garantindo a capacidade de responder a ambientes exigentes e cr&iacute;ticos para o neg&oacute;cio. A longevidade no mercado, aliada a rela&ccedil;&otilde;es duradouras com clientes, reflete um reconhecimento sustentado baseado em resultados, proximidade e excel&ecirc;ncia operacional.</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://localhost/comunicacoes/backoffice/uploads/img_69670a52c9ba85.28778874.png\"><img style=\"float: right;\" src=\"http://localhost/comunicacoes/backoffice/uploads/img_69670a7624e848.12760313.png\"></p>\r\n<p style=\"text-align: center;\"><img style=\"float: left;\" src=\"http://localhost/comunicacoes/backoffice/uploads/img_69670a32bcfc81.44584287.png\"></p>', 5);

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
(1, 'Transformação Digital', '<p style=\"text-align: justify;\">A Comunica&ccedil;&otilde;es apoia organiza&ccedil;&otilde;es na sua transforma&ccedil;&atilde;o digital, integrando tecnologias inovadoras que otimizam processos, reduzem custos e aumentam a efici&ecirc;ncia operacional. Cada projeto &eacute; cuidadosamente analisado e planeado para responder &agrave;s necessidades espec&iacute;ficas de cada neg&oacute;cio, desde a automa&ccedil;&atilde;o de tarefas internas at&eacute; &agrave; integra&ccedil;&atilde;o de sistemas complexos e plataformas digitais.<br data-start=\"587\" data-end=\"590\">A transforma&ccedil;&atilde;o digital n&atilde;o &eacute; apenas sobre tecnologia, mas tamb&eacute;m sobre reorganizar processos, melhorar fluxos de trabalho e permitir que a informa&ccedil;&atilde;o flua de forma r&aacute;pida e segura entre departamentos. Ao implementar solu&ccedil;&otilde;es digitais estrat&eacute;gicas, a Comunica&ccedil;&otilde;es garante que as empresas est&atilde;o preparadas para responder &agrave;s mudan&ccedil;as do mercado, aumentar a agilidade organizacional e manter a competitividade a longo prazo.</p>\r\n<p style=\"text-align: justify;\"><img src=\"http://localhost/comunicacoes/backoffice/uploads/1687984300212.jpg\"></p>', '', 'uploads/1687984300212.jpg', 16),
(2, 'Inteligência Artificial e Analytics', '<p><img style=\"float: right;\" src=\"https://www.ovhcloud.com/sites/default/files/styles/text_media_horizontal/public/2019-09/Media1-2_Big%20Data%2C%20AI%20and%20Grid%20Computing%402x_0.png\" width=\"431\" height=\"260\"></p>\r\n<p style=\"text-align: justify;\">A Comunica&ccedil;&otilde;es aplica Intelig&ecirc;ncia Artificial e an&aacute;lise avan&ccedil;ada de dados para transformar informa&ccedil;&atilde;o em insights estrat&eacute;gicos, permitindo &agrave;s&nbsp;organiza&ccedil;&otilde;es antecipar tend&ecirc;ncias, identificar oportunidades e tomar decis&otilde;es mais assertivas. As solu&ccedil;&otilde;es incluem an&aacute;lise preditiva, dashboards inteligentes, algoritmos de aprendizagem cont&iacute;nua e modelos que interpretam grandes volumes de dados de forma r&aacute;pida e eficiente.<br data-start=\"1663\" data-end=\"1666\">Estas solu&ccedil;&otilde;es n&atilde;o s&oacute; aumentam a efic&aacute;cia operacional, mas tamb&eacute;m ajudam a criar experi&ecirc;ncias personalizadas para clientes e colaboradores, identificando padr&otilde;es de comportamento, prevendo necessidades e otimizando recursos. Ao combinar IA com analytics, a Comunica&ccedil;&otilde;es permite que as empresas aproveitem ao m&aacute;ximo o seu patrim&oacute;nio de dados, gerando valor real e mensur&aacute;vel.</p>', '', 'uploads/Media1-2_Big Data, AI and Grid Computing@2x_0.png', 17),
(3, 'Automação de Processos e Robótica', '<p style=\"text-align: justify;\">Atrav&eacute;s da automa&ccedil;&atilde;o de processos e tecnologias rob&oacute;ticas, a Comunica&ccedil;&otilde;es ajuda empresas a reduzir tarefas manuais repetitivas, minimizar erros&nbsp;operacionais e aumentar a produtividade. A integra&ccedil;&atilde;o de software inteligente, rob&ocirc;s colaborativos e sistemas automatizados permite transformar opera&ccedil;&otilde;es complexas em fluxos eficientes, escal&aacute;veis e f&aacute;ceis de gerir. Al&eacute;m de ganhos de efici&ecirc;ncia, a automa&ccedil;&atilde;o permite libertar recursos humanos para tarefas estrat&eacute;gicas e criativas, ao mesmo tempo que garante consist&ecirc;ncia e qualidade nos processos cr&iacute;ticos do neg&oacute;cio. A Comunica&ccedil;&otilde;es acompanha cada etapa, desde a an&aacute;lise inicial at&eacute; &agrave; implementa&ccedil;&atilde;o e monitoriza&ccedil;&atilde;o cont&iacute;nua, assegurando que cada solu&ccedil;&atilde;o se adapta ao crescimento e &agrave;s necessidades futuras da organiza&ccedil;&atilde;o.</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://localhost/comunicacoes/backoffice/uploads/img_6967170be422b0.73159880.jpg\" width=\"582\" height=\"285\"></p>', '', 'uploads/20221003_go1_robo_quadrupede.jpg', 18),
(4, 'Realidade Virtual', '<p style=\"text-align: justify;\" data-start=\"42\" data-end=\"393\">A Comunica&ccedil;&otilde;es desenvolve solu&ccedil;&otilde;es de Realidade Virtual (VR) pensadas para criar experi&ecirc;ncias imersivas e inovadoras no contexto empresarial. Estas solu&ccedil;&otilde;es permitem &agrave;s organiza&ccedil;&otilde;es simular ambientes, produtos ou processos de forma interativa, potenciando a forma&ccedil;&atilde;o, demonstra&ccedil;&atilde;o de produtos, marketing experiencial e an&aacute;lise de cen&aacute;rios complexos.</p>\r\n<p style=\"text-align: justify;\" data-start=\"395\" data-end=\"807\">Com a VR, &eacute; poss&iacute;vel recriar espa&ccedil;os e situa&ccedil;&otilde;es reais ou fict&iacute;cias, proporcionando aos utilizadores uma perce&ccedil;&atilde;o imersiva que facilita a aprendizagem, o planeamento estrat&eacute;gico e a experimenta&ccedil;&atilde;o sem riscos. As solu&ccedil;&otilde;es da Comunica&ccedil;&otilde;es integram hardware especializado, software avan&ccedil;ado e conte&uacute;dos personalizados, garantindo que cada experi&ecirc;ncia virtual &eacute; adaptada &agrave;s necessidades espec&iacute;ficas da organiza&ccedil;&atilde;o.</p>\r\n<figure class=\"image\"><img src=\"http://localhost/comunicacoes/backoffice/uploads/inovacao_4.jpg\"></figure>\r\n<p style=\"text-align: justify;\" data-start=\"830\" data-end=\"1224\">Al&eacute;m da experi&ecirc;ncia imersiva, a VR permite a <strong data-start=\"875\" data-end=\"902\">colabora&ccedil;&atilde;o &agrave; dist&acirc;ncia</strong>, permitindo que equipas de diferentes locais interajam em ambientes virtuais partilhados. A Comunica&ccedil;&otilde;es acompanha todo o ciclo do projeto, desde a conce&ccedil;&atilde;o e modela&ccedil;&atilde;o dos ambientes at&eacute; &agrave; implementa&ccedil;&atilde;o, testes e suporte cont&iacute;nuo, assegurando solu&ccedil;&otilde;es seguras, escal&aacute;veis e facilmente integr&aacute;veis nas opera&ccedil;&otilde;es di&aacute;rias.</p>\r\n<p style=\"text-align: justify;\" data-start=\"1226\" data-end=\"1448\">Desta forma, a Realidade Virtual deixa de ser apenas uma tecnologia experimental e torna-se uma <strong data-start=\"1322\" data-end=\"1360\">ferramenta estrat&eacute;gica de inova&ccedil;&atilde;o</strong>, potenciando a criatividade, efici&ecirc;ncia e diferencia&ccedil;&atilde;o competitiva das organiza&ccedil;&otilde;es.</p>', '', 'uploads/inovacao_4.jpg', 19);

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
(1, 'Telecomunicações', '<p style=\"text-align: justify;\" data-start=\"22\" data-end=\"394\">A Comunica&ccedil;&otilde;es disponibiliza solu&ccedil;&otilde;es de telecomunica&ccedil;&otilde;es empresariais desenhadas para responder &agrave;s exig&ecirc;ncias de organiza&ccedil;&otilde;es que dependem de comunica&ccedil;&otilde;es fi&aacute;veis, seguras e eficientes no seu dia a dia. A nossa abordagem assenta na an&aacute;lise detalhada das necessidades de cada cliente, permitindo implementar solu&ccedil;&otilde;es ajustadas &agrave; dimens&atilde;o, estrutura e objetivos do neg&oacute;cio.</p>\r\n<p style=\"text-align: justify;\" data-start=\"396\" data-end=\"779\">As solu&ccedil;&otilde;es de telecomunica&ccedil;&otilde;es abrangem infraestruturas de voz e dados, comunica&ccedil;&otilde;es unificadas e servi&ccedil;os que garantem conectividade cont&iacute;nua entre equipas, parceiros e clientes. Ao privilegiar arquiteturas escal&aacute;veis e flex&iacute;veis, a Comunica&ccedil;&otilde;es assegura que as solu&ccedil;&otilde;es evoluem em linha com o crescimento das organiza&ccedil;&otilde;es, mantendo elevados n&iacute;veis de desempenho e disponibilidade.</p>\r\n<p style=\"text-align: justify;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://localhost/comunicacoes/backoffice/uploads/img_6966f0696a4054.63335210.jpg\" width=\"1056\" height=\"401\"></p>\r\n<p style=\"text-align: justify;\">A integra&ccedil;&atilde;o de diferentes tecnologias num ecossistema &uacute;nico permite simplificar a gest&atilde;o das comunica&ccedil;&otilde;es, otimizar custos operacionais e refor&ccedil;ar a fiabilidade dos servi&ccedil;os. As solu&ccedil;&otilde;es implementadas s&atilde;o orientadas para ambientes empresariais cr&iacute;ticos, onde a continuidade do servi&ccedil;o e a qualidade das comunica&ccedil;&otilde;es s&atilde;o fatores determinantes para o sucesso do neg&oacute;cio.</p>\r\n<p style=\"text-align: justify;\" data-start=\"1171\" data-end=\"1545\">A Comunica&ccedil;&otilde;es acompanha todo o ciclo do projeto, desde o desenho da solu&ccedil;&atilde;o at&eacute; &agrave; implementa&ccedil;&atilde;o, monitoriza&ccedil;&atilde;o e suporte cont&iacute;nuo, garantindo um servi&ccedil;o consistente e alinhado com as melhores pr&aacute;ticas do setor. Desta forma, as telecomunica&ccedil;&otilde;es deixam de ser apenas um recurso t&eacute;cnico e passam a assumir um papel estrat&eacute;gico na efici&ecirc;ncia e competitividade das organiza&ccedil;&otilde;es.</p>', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>', 'uploads/img_6966f0696a4054.63335210.jpg', 9),
(2, 'Televisões e Audiovisuais', '<p style=\"text-align: justify;\" data-start=\"31\" data-end=\"430\">A Comunica&ccedil;&otilde;es fornece solu&ccedil;&otilde;es de televis&otilde;es e audiovisuais orientadas para ambientes empresariais, concebidas para melhorar a comunica&ccedil;&atilde;o, a partilha de informa&ccedil;&atilde;o e a experi&ecirc;ncia visual em diferentes contextos organizacionais. As solu&ccedil;&otilde;es s&atilde;o adaptadas &agrave;s necessidades espec&iacute;ficas de cada espa&ccedil;o, garantindo funcionalidade, fiabilidade e integra&ccedil;&atilde;o com as infraestruturas tecnol&oacute;gicas existentes.</p>\r\n<p style=\"text-align: justify;\" data-start=\"432\" data-end=\"835\">As solu&ccedil;&otilde;es abrangem sistemas de visualiza&ccedil;&atilde;o profissional para salas de reuni&otilde;es, audit&oacute;rios, espa&ccedil;os corporativos, &aacute;reas comerciais e zonas de rece&ccedil;&atilde;o, permitindo a difus&atilde;o de conte&uacute;dos informativos, institucionais ou operacionais de forma clara e eficaz. A Comunica&ccedil;&otilde;es privilegia equipamentos e arquiteturas que asseguram elevada qualidade de imagem e som, bem como uma opera&ccedil;&atilde;o simples e intuitiva.<img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://localhost/comunicacoes/backoffice/uploads/img_6966f216634fc6.89182143.jpg\" width=\"1069\" height=\"597\"></p>\r\n<p style=\"text-align: justify;\" data-start=\"856\" data-end=\"1206\">A integra&ccedil;&atilde;o de solu&ccedil;&otilde;es audiovisuais com sistemas de comunica&ccedil;&otilde;es e de tecnologia da informa&ccedil;&atilde;o permite criar ambientes colaborativos, facilitando apresenta&ccedil;&otilde;es, reuni&otilde;es h&iacute;bridas e a comunica&ccedil;&atilde;o interna. Cada projeto &eacute; desenhado de forma personalizada, considerando fatores como dimens&atilde;o do espa&ccedil;o, luminosidade, ac&uacute;stica e objetivos de utiliza&ccedil;&atilde;o.</p>\r\n<p style=\"text-align: justify;\" data-start=\"1208\" data-end=\"1614\">A Comunica&ccedil;&otilde;es acompanha todas as fases do projeto, desde o planeamento e instala&ccedil;&atilde;o at&eacute; &agrave; configura&ccedil;&atilde;o e suporte cont&iacute;nuo, assegurando que as solu&ccedil;&otilde;es audiovisuais funcionam como uma extens&atilde;o natural da estrat&eacute;gia tecnol&oacute;gica da organiza&ccedil;&atilde;o. Desta forma, os sistemas de televis&otilde;es e audiovisuais tornam-se uma ferramenta eficaz para refor&ccedil;ar a comunica&ccedil;&atilde;o, a imagem corporativa e a efici&ecirc;ncia operacional.</p>', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>', 'uploads/Channel_1_Israel_DSC0193.jpg', 10),
(3, 'Informática e Redes', '<p data-start=\"25\" data-end=\"403\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://localhost/comunicacoes/backoffice/uploads/img_6966f29b81d2c8.29301073.jpg\" width=\"1066\" height=\"423\"></p>\r\n<p style=\"text-align: justify;\" data-start=\"25\" data-end=\"403\">A Comunica&ccedil;&otilde;es disponibiliza solu&ccedil;&otilde;es de inform&aacute;tica e redes orientadas para garantir a estabilidade, seguran&ccedil;a e desempenho das infraestruturas tecnol&oacute;gicas das organiza&ccedil;&otilde;es. Atrav&eacute;s de uma abordagem integrada, s&atilde;o concebidas arquiteturas de rede robustas e escal&aacute;veis, capazes de suportar as opera&ccedil;&otilde;es cr&iacute;ticas do neg&oacute;cio e acompanhar a evolu&ccedil;&atilde;o das necessidades empresariais.</p>\r\n<p style=\"text-align: justify;\" data-start=\"405\" data-end=\"823\">As solu&ccedil;&otilde;es abrangem redes estruturadas, conectividade, sistemas de suporte &agrave; opera&ccedil;&atilde;o e ambientes tecnol&oacute;gicos preparados para elevados n&iacute;veis de disponibilidade. A Comunica&ccedil;&otilde;es analisa cada contexto de forma individual, assegurando que a infraestrutura implementada responde aos requisitos de desempenho, seguran&ccedil;a e fiabilidade, ao mesmo tempo que permite uma gest&atilde;o eficiente e otimizada dos recursos tecnol&oacute;gicos.</p>\r\n<p style=\"text-align: justify;\" data-start=\"844\" data-end=\"1189\">A integra&ccedil;&atilde;o entre inform&aacute;tica e redes permite criar ambientes tecnol&oacute;gicos coesos, onde a comunica&ccedil;&atilde;o entre sistemas &eacute; fluida e segura. Esta abordagem contribui para a redu&ccedil;&atilde;o de falhas, melhoria da produtividade e maior controlo sobre a infraestrutura, garantindo que a tecnologia suporta efetivamente os objetivos estrat&eacute;gicos da organiza&ccedil;&atilde;o.</p>\r\n<p style=\"text-align: justify;\" data-start=\"1191\" data-end=\"1564\">A Comunica&ccedil;&otilde;es acompanha todas as fases do projeto, desde o desenho da arquitetura e implementa&ccedil;&atilde;o at&eacute; &agrave; monitoriza&ccedil;&atilde;o e suporte cont&iacute;nuo, assegurando a continuidade do servi&ccedil;o e a adapta&ccedil;&atilde;o permanente &agrave;s exig&ecirc;ncias do neg&oacute;cio. Desta forma, as solu&ccedil;&otilde;es de inform&aacute;tica e redes assumem um papel central na efici&ecirc;ncia operacional e na resili&ecirc;ncia tecnol&oacute;gica das organiza&ccedil;&otilde;es.</p>', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>', 'uploads/img_6966f29b81d2c8.29301073.jpg', 11),
(4, 'Data Center e Cibersegurança', '<p style=\"text-align: justify;\" data-start=\"34\" data-end=\"378\">A Comunica&ccedil;&otilde;es oferece solu&ccedil;&otilde;es de data center e ciberseguran&ccedil;a pensadas para proteger, gerir e otimizar os dados e sistemas cr&iacute;ticos das organiza&ccedil;&otilde;es. As solu&ccedil;&otilde;es garantem ambientes tecnol&oacute;gicos resilientes, seguros e eficientes, permitindo &agrave;s empresas operar com continuidade e confian&ccedil;a num contexto cada vez mais digital e interconectado.</p>\r\n<p style=\"text-align: justify;\" data-start=\"380\" data-end=\"780\">Os servi&ccedil;os incluem a gest&atilde;o de infraestruturas de data center, armazenamento de informa&ccedil;&atilde;o, backup seguro e redundante, bem como sistemas de prote&ccedil;&atilde;o avan&ccedil;ados contra amea&ccedil;as digitais. A abordagem da Comunica&ccedil;&otilde;es integra tecnologias de ponta, protocolos de seguran&ccedil;a atualizados e monitoriza&ccedil;&atilde;o constante, assegurando a disponibilidade e integridade dos dados e aplica&ccedil;&otilde;es essenciais para o neg&oacute;cio.</p>\r\n<p style=\"text-align: justify;\">A implementa&ccedil;&atilde;o de solu&ccedil;&otilde;es de ciberseguran&ccedil;a e data center &eacute; feita de forma personalizada, adaptando-se &agrave;s exig&ecirc;ncias de cada organiza&ccedil;&atilde;o e &agrave; complexidade do seu ambiente tecnol&oacute;gico. A Comunica&ccedil;&otilde;es acompanha todo o ciclo, desde o planeamento e instala&ccedil;&atilde;o at&eacute; &agrave; monitoriza&ccedil;&atilde;o cont&iacute;nua, gest&atilde;o de incidentes e manuten&ccedil;&atilde;o preventiva, garantindo opera&ccedil;&otilde;es seguras e resilientes frente a riscos e vulnerabilidades.</p>\r\n<p style=\"text-align: justify;\" data-start=\"1214\" data-end=\"1504\">Ao unir infraestruturas de data center robustas com pr&aacute;ticas avan&ccedil;adas de ciberseguran&ccedil;a, a Comunica&ccedil;&otilde;es transforma a tecnologia numa ferramenta estrat&eacute;gica, permitindo que os clientes aumentem a efici&ecirc;ncia operacional, reduzam riscos e mantenham a confian&ccedil;a na continuidade do seu neg&oacute;cio.</p>\r\n<p><img src=\"http://localhost/comunicacoes/backoffice/uploads/img_6966f6af966db6.60272932.jpg\"></p>\r\n<p data-start=\"1214\" data-end=\"1504\">&nbsp;</p>', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>', 'uploads/img_6966f6af966db6.60272932.jpg', 12),
(5, 'Internet of Things', '<p style=\"text-align: justify;\" data-start=\"41\" data-end=\"450\">A Comunica&ccedil;&otilde;es desenvolve solu&ccedil;&otilde;es de Internet of Things (IoT) orientadas para ambientes empresariais, permitindo &agrave;s organiza&ccedil;&otilde;es conectar dispositivos, recolher dados em tempo real e automatizar processos de forma eficiente. As solu&ccedil;&otilde;es IoT s&atilde;o personalizadas para cada setor e espa&ccedil;o, garantindo integra&ccedil;&atilde;o perfeita com infraestruturas tecnol&oacute;gicas existentes e suporte &agrave; tomada de decis&atilde;o baseada em dados.</p>\r\n<p style=\"text-align: justify;\" data-start=\"452\" data-end=\"811\">As aplica&ccedil;&otilde;es incluem monitoriza&ccedil;&atilde;o de equipamentos, gest&atilde;o de ativos, controlo ambiental, rastreamento log&iacute;stico e an&aacute;lise de performance operacional. Ao centralizar a informa&ccedil;&atilde;o de m&uacute;ltiplos sensores e dispositivos, a Comunica&ccedil;&otilde;es permite que as empresas aumentem a efici&ecirc;ncia, reduzam custos operacionais e antecipem problemas antes que se tornem cr&iacute;ticos.</p>\r\n<p data-start=\"452\" data-end=\"811\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://localhost/comunicacoes/backoffice/uploads/img_696706c16ddef4.26591499.webp\" alt=\"\" width=\"1941\" height=\"768\"></p>\r\n<p style=\"text-align: justify;\" data-start=\"452\" data-end=\"811\">A implementa&ccedil;&atilde;o de solu&ccedil;&otilde;es IoT &eacute; feita de forma escal&aacute;vel, segura e adaptada &agrave;s necessidades de cada organiza&ccedil;&atilde;o, garantindo interoperabilidade entre diferentes dispositivos e sistemas. A Comunica&ccedil;&otilde;es acompanha todo o ciclo do projeto, desde o planeamento, instala&ccedil;&atilde;o, configura&ccedil;&atilde;o e monitoriza&ccedil;&atilde;o cont&iacute;nua, assegurando resultados concretos e med&iacute;veis. Desta forma, a tecnologia IoT transforma dados em insights estrat&eacute;gicos e potencializa a inova&ccedil;&atilde;o e competitividade das empresas.</p>', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>', 'uploads/img_696706c16ddef4.26591499.webp', 13),
(6, 'Assistentes Virtuais', '<p data-start=\"37\" data-end=\"416\"><img style=\"float: left;\" src=\"http://localhost/comunicacoes/backoffice/uploads/img_696707a8816673.85692213.png\" alt=\"\" width=\"544\" height=\"485\"></p>\r\n<p style=\"text-align: justify;\" data-start=\"37\" data-end=\"416\">A Comunica&ccedil;&otilde;es desenvolve solu&ccedil;&otilde;es de Assistentes Virtuais que permitem &agrave;s organiza&ccedil;&otilde;es automatizar a intera&ccedil;&atilde;o com clientes e colaboradores de forma eficiente, personalizada e inteligente. Estas solu&ccedil;&otilde;es combinam tecnologias de intelig&ecirc;ncia artificial, processamento de linguagem natural e integra&ccedil;&atilde;o com sistemas internos, garantindo respostas r&aacute;pidas, precisas e consistentes.</p>\r\n<p style=\"text-align: justify;\" data-start=\"418\" data-end=\"879\">Os assistentes virtuais podem ser implementados em m&uacute;ltiplos canais, incluindo websites, aplica&ccedil;&otilde;es m&oacute;veis, plataformas de atendimento e sistemas internos, permitindo otimizar processos como suporte ao cliente, agendamento de servi&ccedil;os, gest&atilde;o de FAQs e monitoriza&ccedil;&atilde;o de tarefas. Ao automatizar intera&ccedil;&otilde;es repetitivas, a empresa reduz custos operacionais, melhora a experi&ecirc;ncia do utilizador e liberta recursos humanos para atividades de maior valor estrat&eacute;gico.</p>\r\n<p style=\"text-align: justify;\" data-start=\"418\" data-end=\"879\">Cada projeto de assistente virtual &eacute; personalizado, adaptando-se &agrave;s necessidades espec&iacute;ficas da organiza&ccedil;&atilde;o, ao seu tom de comunica&ccedil;&atilde;o e aos objetivos de neg&oacute;cio. A Comunica&ccedil;&otilde;es acompanha todas as fases do desenvolvimento, desde o planeamento e design de conversas at&eacute; &agrave; implementa&ccedil;&atilde;o, monitoriza&ccedil;&atilde;o e otimiza&ccedil;&atilde;o cont&iacute;nua, garantindo solu&ccedil;&otilde;es eficientes, seguras e escal&aacute;veis.</p>\r\n<p style=\"text-align: justify;\" data-start=\"418\" data-end=\"879\">Desta forma, os assistentes virtuais deixam de ser apenas ferramentas de suporte e passam a constituir um canal estrat&eacute;gico de comunica&ccedil;&atilde;o e automa&ccedil;&atilde;o, potenciando a produtividade e a inova&ccedil;&atilde;o nas organiza&ccedil;&otilde;es. Al&eacute;m de automatizar intera&ccedil;&otilde;es, os assistentes virtuais da Comunica&ccedil;&otilde;es permitem recolher dados valiosos sobre padr&otilde;es de utiliza&ccedil;&atilde;o, ajudando as organiza&ccedil;&otilde;es a tomar decis&otilde;es mais informadas e estrat&eacute;gicas.A solu&ccedil;&atilde;o integra-se facilmente com sistemas internos, CRM e bases de dados, garantindo coer&ecirc;ncia na informa&ccedil;&atilde;o e agilizando processos internos.</p>', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>', 'uploads/img_696707a8816673.85692213.png', 14);

-- --------------------------------------------------------

--
-- Estrutura da tabela `parceiros`
--

CREATE TABLE `parceiros` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `tamanho` tinyint(1) DEFAULT 0,
  `ordem` int(11) DEFAULT 0,
  `ativo` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `parceiros`
--

INSERT INTO `parceiros` (`id`, `nome`, `imagem`, `tamanho`, `ordem`, `ativo`) VALUES
(7, 'Parceiro1', 'backoffice/uploads/logo1.png', 1, 1, 1),
(8, 'Parceiro2', 'backoffice/uploads/logo2.png', 0, 2, 1),
(9, 'Parceiro3', 'backoffice/uploads/logo3.png', 0, 3, 1),
(10, 'Parceiro4', 'backoffice/uploads/logo4.png', 0, 4, 1),
(11, 'Parceiro5', 'backoffice/uploads/logo5.png', 0, 5, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cabecalhos`
--
ALTER TABLE `cabecalhos`
  ADD PRIMARY KEY (`id`);

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
-- Índices para tabela `colaboradores`
--
ALTER TABLE `colaboradores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Índices para tabela `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `contactos_form`
--
ALTER TABLE `contactos_form`
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
-- AUTO_INCREMENT de tabela `cabecalhos`
--
ALTER TABLE `cabecalhos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `carousel2`
--
ALTER TABLE `carousel2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `carousel_topo`
--
ALTER TABLE `carousel_topo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `colaboradores`
--
ALTER TABLE `colaboradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `contactos_form`
--
ALTER TABLE `contactos_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `footer_carousel`
--
ALTER TABLE `footer_carousel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `footer_navbar`
--
ALTER TABLE `footer_navbar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `headers`
--
ALTER TABLE `headers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `home_conteudo`
--
ALTER TABLE `home_conteudo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `navbar`
--
ALTER TABLE `navbar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de tabela `paginas_empresa`
--
ALTER TABLE `paginas_empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `paginas_inovacoes`
--
ALTER TABLE `paginas_inovacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `paginas_solucoes`
--
ALTER TABLE `paginas_solucoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `parceiros`
--
ALTER TABLE `parceiros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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

-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13-Nov-2026 às 13:50
-- Versão do servidor: 10.4.6-MariaDB
-- versão do PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `coopceedo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `caixas`
--

CREATE TABLE `caixas` (
  `id` int(11) NOT NULL,
  `imagem` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dimensoes` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `altura_modulo` int(11) NOT NULL,
  `angulo_corte` int(11) NOT NULL,
  `especies_recomendadas` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `caixas`
--

INSERT INTO `caixas` (`id`, `imagem`, `dimensoes`, `altura_modulo`, `angulo_corte`, `especies_recomendadas`, `descricao`) VALUES
(1, 'uploads/caixa1.png', '30X20', 15, 45, 'Jataí, Mandaçaia', 'Ideal para espécies....'),
(2, 'uploads/caixa1.png', '40X20', 49, 29, 'Mirim', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `colonias`
--

CREATE TABLE `colonias` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `especie` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `procedencia` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `data_aquisicao` date NOT NULL,
  `localizacao` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `banner` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `colonias`
--

INSERT INTO `colonias` (`id`, `nome`, `especie`, `procedencia`, `data_aquisicao`, `localizacao`, `descricao`, `foto`, `banner`) VALUES
(1, 'Jataí', 'Tetragonisca angustula', 'Doação de Clair Suptiz', '0000-00-00', 'Meliponário CEEDO', 'Essa espécie de abelha sem ferrão é encontrada em diversas regiões do Brasil, sendo bem adaptada a diferentes ambientes naturais. Seu corpo apresenta coloração que varia do amarelo-claro ao marrom, com tamanho entre 8 e 10 milímetros. Constrói seus ninhos principalmente em ocos de árvores, onde desenvolve uma colmeia de estrutura compacta e bem organizada. Essas características tornam a espécie interessante tanto para estudos ambientais quanto para práticas de meliponicultura sustentável.', 'uploads/jatai1.jpg', 'uploads/bannerjatai1.jpg'),
(2, 'Jataí', 'Tetragonisca angustula', 'Captura', '2026-09-17', 'Meliponário CEEDO', '', 'uploads/jatai1.jpg', ''),
(3, 'Jataí2', 'Tetragonisca angustula', 'Captura', '2026-10-30', 'Meliponário CEEDO', '', '57ce157a67046b02ce292fa529d0e175.jpg', NULL),
(4, 'Mirim', 'Tetragonisca angustula', 'Doado por jao', '2026-12-04', 'Meliponário CEEDO', '', '3b107e9e9f669d7bffa43e3e9874fda7.jpg', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cpe_links`
--

CREATE TABLE `cpe_links` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `cpe_links`
--

INSERT INTO `cpe_links` (`id`, `titulo`, `descricao`, `url`) VALUES
(1, 'Regimento', 'Acesse agora nosso regimento!', 'https://docs.google.com/document/d/1asbtS09CWkC1zFjacYxARNawtorrEA86/edit'),
(2, 'Instagram', 'Visite nosso perfil do Instagram!', ''),
(3, 'Formulário de sugestão', 'Mande sua sugestão ao CPE', 'https://docs.google.com/forms/d/e/1FAIpQLSf36l4Y0eC7HhwD1GBwGCK6-btORp-hHD9PfttmCv7nrlD7bQ/viewform'),
(4, 'Formulário de inscrição', 'Participe do CPE', 'https://docs.google.com/forms/d/e/1FAIpQLSeyESo99ZOuSAMZ8vbjRnCAzyqqb7UMzOBdX4QqjSN9a0U3SA/viewform'),
(5, 'Apresentação', 'Conheça o CPE CEEDO', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticias`
--

CREATE TABLE `noticias` (
  `id_noticia` int(11) NOT NULL,
  `titulo_noticia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `resumo_noticia` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `conteudo_noticia` text COLLATE utf8_unicode_ci NOT NULL,
  `imagem_noticia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_noticia` date NOT NULL,
  `status_noticia` enum('Publicado','Rascunho') COLLATE utf8_unicode_ci DEFAULT 'Publicado',
  `dt_cad_noticia` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `noticias`
--

INSERT INTO `noticias` (`id_noticia`, `titulo_noticia`, `resumo_noticia`, `conteudo_noticia`, `imagem_noticia`, `data_noticia`, `status_noticia`, `dt_cad_noticia`) VALUES
(5, 'Notícia teste 06', 'lorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsum', 'lorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsum', '1fc2a5372a07401246c07ac30a973bd7.png', '2026-10-21', 'Publicado', '2026-10-21 14:12:51'),
(6, 'Notícia teste 01', 'lorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsum', 'lorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsum', '4d3a5c65d84980e043bb3f6127d693a7.jpg', '2026-10-21', 'Publicado', '2026-10-21 14:13:47');

-- --------------------------------------------------------

--
-- Estrutura da tabela `operadores`
--

CREATE TABLE `operadores` (
  `id` int(11) NOT NULL,
  `nome_operador` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_operador` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `senha_operador` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `operadores`
--

INSERT INTO `operadores` (`id`, `nome_operador`, `email_operador`, `senha_operador`) VALUES
(2, 'josiane', 'josianedeoliveiramartins33@gmail.com', '$2y$10$xrSTgEsBc02iP5xjNZIlguS7NWMNhTWOojxKVg/cb0xWHQrZ9UDx6');

-- --------------------------------------------------------

--
-- Estrutura da tabela `projetos`
--

CREATE TABLE `projetos` (
  `id_projeto` int(11) NOT NULL,
  `nome_projeto` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `ano_projeto` int(11) NOT NULL,
  `tipo_projeto` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `descricao_projeto` text COLLATE utf8_unicode_ci NOT NULL,
  `dt_cad_projeto` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `caixas`
--
ALTER TABLE `caixas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `colonias`
--
ALTER TABLE `colonias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cpe_links`
--
ALTER TABLE `cpe_links`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id_noticia`);

--
-- Índices para tabela `operadores`
--
ALTER TABLE `operadores`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `projetos`
--
ALTER TABLE `projetos`
  ADD PRIMARY KEY (`id_projeto`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `caixas`
--
ALTER TABLE `caixas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `colonias`
--
ALTER TABLE `colonias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `cpe_links`
--
ALTER TABLE `cpe_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id_noticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `operadores`
--
ALTER TABLE `operadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `projetos`
--
ALTER TABLE `projetos`
  MODIFY `id_projeto` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

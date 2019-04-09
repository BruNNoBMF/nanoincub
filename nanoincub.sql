-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 10/04/2019 às 01:04
-- Versão do servidor: 10.1.38-MariaDB
-- Versão do PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `nanoincub`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_categorias`
--

CREATE TABLE `tbl_categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `data_criacao` datetime NOT NULL,
  `data_alteracao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `tbl_categorias`
--

INSERT INTO `tbl_categorias` (`id`, `nome`, `data_criacao`, `data_alteracao`) VALUES
(59, 'Video game', '2019-04-09 19:46:11', NULL),
(60, 'TelevisÃ£o', '2019-04-09 19:47:56', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_estoque`
--

CREATE TABLE `tbl_estoque` (
  `id` int(11) NOT NULL,
  `nota_fiscal` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `referencia` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `produto_id` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `id_usuario_logado` int(11) NOT NULL,
  `data_criacao` datetime NOT NULL,
  `data_alteracao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `tbl_estoque`
--

INSERT INTO `tbl_estoque` (`id`, `nota_fiscal`, `referencia`, `produto_id`, `quantidade`, `tipo`, `id_usuario_logado`, `data_criacao`, `data_alteracao`) VALUES
(10, '000001', NULL, 34, 5, 1, 2, '2019-04-09 19:54:19', '2019-04-09 19:54:19'),
(11, '000002', NULL, 35, 3, 1, 1, '2019-04-09 19:55:31', '2019-04-09 19:55:31'),
(12, NULL, '1', 34, 1, 2, 1, '2019-04-09 19:56:16', '2019-04-09 19:56:16'),
(13, '000003', NULL, 36, 10, 1, 1, '2019-04-09 19:57:35', '2019-04-09 19:57:35');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_produtos`
--

CREATE TABLE `tbl_produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `preco` double NOT NULL,
  `quantidade_estoque` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `data_criacao` datetime NOT NULL,
  `data_alteracao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `tbl_produtos`
--

INSERT INTO `tbl_produtos` (`id`, `nome`, `preco`, `quantidade_estoque`, `categoria_id`, `data_criacao`, `data_alteracao`) VALUES
(34, 'PS4', 1800, 4, 59, '2019-04-09 19:53:35', '2019-04-09 19:53:43'),
(35, 'XBOX', 1500, 3, 59, '2019-04-09 19:55:17', NULL),
(36, 'Samsung 42', 2000, 10, 60, '2019-04-09 19:57:18', '2019-04-09 19:57:49');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_usuarios`
--

CREATE TABLE `tbl_usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`id`, `email`, `senha`) VALUES
(1, 'brunnobmf@gmail.com', 'senha1234'),
(2, 'atendimento@nanoincub.com.br', 'nano1234');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `tbl_categorias`
--
ALTER TABLE `tbl_categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tbl_estoque`
--
ALTER TABLE `tbl_estoque`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tbl_produtos`
--
ALTER TABLE `tbl_produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `tbl_categorias`
--
ALTER TABLE `tbl_categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de tabela `tbl_estoque`
--
ALTER TABLE `tbl_estoque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `tbl_produtos`
--
ALTER TABLE `tbl_produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de tabela `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

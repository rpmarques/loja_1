-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 30-Dez-2016 às 14:33
-- Versão do servidor: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `naira`
--
DROP DATABASE `naira`;
CREATE DATABASE IF NOT EXISTS `naira` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `naira`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda`
--

DROP TABLE IF EXISTS `agenda`;
CREATE TABLE IF NOT EXISTS `agenda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data_cad` date NOT NULL,
  `hora` time DEFAULT NULL,
  `cliente_id` int(11) NOT NULL,
  `descricao` text,
  `valor` float(9,3) DEFAULT NULL,
  `encerrado` tinyint(1) DEFAULT NULL,
  `data_encerramento` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1 PACK_KEYS=0;

--
-- Extraindo dados da tabela `agenda`
--

INSERT INTO `agenda` (`id`, `data_cad`, `hora`, `cliente_id`, `descricao`, `valor`, `encerrado`, `data_encerramento`) VALUES
(28, '2016-12-30', '07:00:00', 1, '<p>teste</p>', 30.000, NULL, NULL),
(29, '2017-01-02', '23:12:00', 3, '<p>teste integra&ccedil;&atilde;o com caixa</p>', 15.000, 1, '2016-12-30'),
(30, '2017-01-05', '23:12:00', 3, '<p>teste integra&ccedil;&atilde;o com caixa</p>', 15.000, 1, '2016-12-30'),
(31, '2017-01-08', '23:12:00', 3, '<p>teste integra&ccedil;&atilde;o com caixa</p>', 15.000, NULL, NULL),
(32, '2016-12-30', '23:12:00', 3, '<p>TESTE INTEGRA&Ccedil;&Atilde;O NO INCLUIR</p>', 15.000, NULL, NULL),
(33, '2016-12-30', '23:12:00', 2, '<p>dsds</p>', 150.000, NULL, NULL),
(34, '2016-12-30', '23:12:00', 2, '<p>dsds</p>', 150.000, NULL, NULL),
(35, '2016-12-30', '23:12:00', 2, '<p>dsds</p>', 150.000, NULL, NULL),
(36, '2016-12-30', '23:12:00', 2, '<p>dsds</p>', 150.000, NULL, NULL),
(37, '2016-12-30', '23:12:00', 2, '<p>dsds</p>', 150.000, NULL, NULL),
(38, '2016-12-30', '23:12:00', 2, '<p>dsds</p>', 150.000, NULL, NULL),
(39, '2016-12-30', '23:12:00', 2, '<p>dsds</p>', 150.000, NULL, NULL),
(40, '2016-12-30', '23:12:00', 2, '<p>dsds</p>', 150.000, NULL, NULL),
(41, '2016-12-30', '23:12:00', 2, '<p>dsds</p>', 150.000, NULL, NULL),
(42, '2016-12-30', '23:12:00', 2, '<p>dsds</p>', 150.000, NULL, NULL),
(43, '2016-12-30', '23:12:00', 2, '<p>dsds</p>', 150.000, NULL, NULL),
(44, '2016-12-30', '23:12:00', 2, '<p>dsds</p>', 150.000, NULL, NULL),
(45, '2016-12-30', '23:12:00', 2, '<p>dsds</p>', 150.000, NULL, NULL),
(46, '2016-12-30', '23:12:00', 2, '<p>teste</p>', 30.000, NULL, NULL),
(47, '2016-12-30', '23:12:00', 2, '<p>teste</p>', 30.000, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `caixa`
--

DROP TABLE IF EXISTS `caixa`;
CREATE TABLE IF NOT EXISTS `caixa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `serie` char(3) DEFAULT NULL,
  `data_cad` date NOT NULL,
  `data_mov` date NOT NULL,
  `valor` float(9,3) NOT NULL,
  `historico` varchar(100) DEFAULT NULL,
  `debito` tinyint(1) NOT NULL,
  `credito` tinyint(1) NOT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `fornecedor_id` int(11) DEFAULT NULL,
  `nrodoc` char(9) DEFAULT NULL,
  `contaspagar_id` int(11) DEFAULT NULL,
  `contasreceber_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `caixa`
--

INSERT INTO `caixa` (`id`, `serie`, `data_cad`, `data_mov`, `valor`, `historico`, `debito`, `credito`, `cliente_id`, `fornecedor_id`, `nrodoc`, `contaspagar_id`, `contasreceber_id`) VALUES
(12, 'ATM', '2016-12-30', '2016-12-30', 30.000, 'Atendimento João Pedro nascimento marques', 0, 1, 2, 0, '46', NULL, NULL),
(13, 'ATM', '2016-12-30', '2016-12-30', 30.000, 'Atendimento João Pedro nascimento marques', 0, 1, 2, 0, '47', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `data_nasc` date DEFAULT NULL,
  `fone_1` char(14) DEFAULT NULL,
  `fone_2` char(14) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 PACK_KEYS=0;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `endereco`, `bairro`, `email`, `data_nasc`, `fone_1`, `fone_2`) VALUES
(1, 'Ricardo Peirera Marques', 'Rua Serafim Garcia dos Santos, 214', 'Armour', 'ricardo80@gmail.com', '1980-11-25', '(55)-9165-5656', '(55)-9165-5656'),
(2, 'João Pedro nascimento marques', 'Rua Manduca Rodrigues, 424', 'Centro', 'vagareza@gmail.com', '1943-02-08', '(55)-3243-7627', '(55)-9109-7614'),
(3, 'Naira Raquel Charnoski Marques', 'Rua Serafim Garcia dos Santos, 214', 'Armour', 'nairacharnoski@gmail.com', '1988-08-22', '(55)-9131-3061', '(55)-9131-3061');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedores`
--

DROP TABLE IF EXISTS `fornecedores`;
CREATE TABLE IF NOT EXISTS `fornecedores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_fantasia` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `razao_social` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cnpj` char(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ie` char(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `endereco` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bairro` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cidade` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uf` char(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fone_1` char(14) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fone_2` char(14) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contato` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_cad` date DEFAULT NULL,
  `rg` char(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpf` char(14) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `fornecedores`
--

INSERT INTO `fornecedores` (`id`, `nome_fantasia`, `razao_social`, `cnpj`, `ie`, `endereco`, `bairro`, `cidade`, `uf`, `fone_1`, `fone_2`, `email`, `contato`, `data_cad`, `rg`, `cpf`) VALUES
(1, 'Diversos', 'Razão', '99.999.999/9999-99', '777/7777777', 'Rua Serafim Garcia dos Santos, 214', 'Armour', 'Santana do Livramento', 'RS', '(88)-8888-8888', '(11)-1111-1111', 'exemplo@exemplo.com.br', 'O mesmo', '2016-07-27', '132465789', '888.888.888-88'),
(2, 'Fornecedor 1', 'Fornec 1', '99.999.999/9999-99', '888/8888888', 'Rua Serafim Garcia dos Santos, 214', 'Armour', 'Santana do Livramento', 'AC', '', '', '', '', '2016-08-03', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

DROP TABLE IF EXISTS `servicos`;
CREATE TABLE IF NOT EXISTS `servicos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `valor` float(9,2) DEFAULT NULL,
  `valor_pacote` float(9,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 PACK_KEYS=0;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`id`, `nome`, `valor`, `valor_pacote`) VALUES
(1, 'teste', 1.00, 2.00);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) CHARACTER SET latin1 NOT NULL,
  `senha` varchar(32) CHARACTER SET latin1 NOT NULL,
  `user_padrao` tinyint(1) NOT NULL,
  `incluir` tinyint(1) NOT NULL,
  `alterar` tinyint(1) NOT NULL,
  `excluir` tinyint(1) NOT NULL,
  `login` varchar(50) CHARACTER SET latin1 NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 NOT NULL,
  `user_admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `usuarios_idx1` (`login`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `senha`, `user_padrao`, `incluir`, `alterar`, `excluir`, `login`, `email`, `user_admin`) VALUES
(1, 'Ricardo Marques', 'b72c35605af38e9225e3b4229b36e21d', 0, 1, 1, 1, 'ricardo', 'ricardo80@gmail.com', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

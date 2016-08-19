-- Vitor Melo & Afonso Henrique
-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 01-Jul-2016 às 10:36
-- Versão do servidor: 5.5.47-0ubuntu0.14.04.1
-- versão do PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `WEB`
--
CREATE DATABASE IF NOT EXISTS `WEB` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `WEB`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `idCliente` int(11) NOT NULL AUTO_INCREMENT,
  `nomeCliente` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dataCliente` datetime NOT NULL,
  PRIMARY KEY (`idCliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedores`
--

DROP TABLE IF EXISTS `fornecedores`;
CREATE TABLE IF NOT EXISTS `fornecedores` (
  `idFornecedor` int(11) NOT NULL AUTO_INCREMENT,
  `nomeFornecedor` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dataFundacao` datetime NOT NULL,
  PRIMARY KEY (`idFornecedor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

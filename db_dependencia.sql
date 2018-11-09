-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 09-Nov-2018 às 14:34
-- Versão do servidor: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_dependencia`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_dependentes`
--

CREATE TABLE IF NOT EXISTS `tb_dependentes` (
  `id` int(11) NOT NULL,
  `sequencia` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `dependente` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_dependentes`
--

INSERT INTO `tb_dependentes` (`id`, `sequencia`, `nome`, `dependente`) VALUES
(1, 1, 'Uva', 1),
(2, 2, 'Laranja', 10),
(3, 3, 'Maçã', 2),
(4, 90, 'Jiló', 1),
(5, 20, 'Manga', 1),
(6, 8, 'Abacate', 1),
(7, 12, 'Beterraba', 2),
(8, 9, 'Quiabo', 12),
(9, 15, 'Cereja', 0),
(10, 2, 'Cereja', 0),
(12, 33, 'Tomate', NULL),
(20, 1000, 'Melancia', 50),
(30, 25000, 'Abóbora', 222),
(40, 30000, 'Pato', 50000),
(41, 100, 'Égua', 100),
(42, 10000000, 'aaa', 55555555),
(43, 0, '', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_dependentes`
--
ALTER TABLE `tb_dependentes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_dependentes`
--
ALTER TABLE `tb_dependentes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

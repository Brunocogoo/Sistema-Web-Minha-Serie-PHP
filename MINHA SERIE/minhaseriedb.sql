-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 30-Jun-2017 às 03:43
-- Versão do servidor: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `minhaseriedb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `episodio`
--

CREATE TABLE `episodio` (
  `temporada` int(11) NOT NULL,
  `serieref` int(11) NOT NULL,
  `episodios` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `episodio`
--

INSERT INTO `episodio` (`temporada`, `serieref`, `episodios`) VALUES
(1, 0, 10),
(2, 0, 11),
(3, 0, 10),
(4, 0, 10),
(1, 2, 10),
(2, 2, 11),
(1, 3, 10),
(2, 3, 10),
(3, 3, 12),
(1, 4, 1),
(1, 5, 13),
(2, 5, 13),
(3, 5, 13),
(1, 6, 10),
(2, 6, 10),
(3, 6, 11),
(4, 6, 12),
(5, 6, 10),
(1, 6, 1),
(2, 6, 1),
(3, 6, 2),
(4, 6, 1),
(1, 7, 1),
(2, 7, 1),
(3, 7, 2),
(4, 7, 1),
(1, 8, 3),
(2, 8, 3),
(1, 9, 3),
(2, 9, 3),
(1, 10, 5),
(2, 10, 10),
(1, 11, 2),
(2, 11, 2),
(3, 11, 2),
(4, 11, 1),
(1, 12, 2),
(2, 12, 1),
(3, 12, 2),
(4, 12, 3),
(1, 13, 4),
(2, 13, 4),
(3, 13, 4),
(4, 13, 5),
(5, 13, 4),
(1, 14, 15),
(2, 14, 15),
(3, 14, 15),
(1, 15, 10),
(2, 15, 10),
(3, 15, 11),
(1, 16, 20),
(2, 16, 22),
(3, 16, 23),
(4, 16, 23),
(5, 16, 23),
(1, 17, 10),
(2, 17, 9),
(3, 17, 8),
(4, 17, 7),
(1, 18, 10),
(2, 18, 14),
(1, 19, 13),
(2, 19, 13),
(3, 19, 13),
(4, 19, 13),
(5, 19, 13),
(6, 19, 13),
(7, 19, 13),
(1, 20, 4),
(2, 20, 10),
(3, 20, 18),
(1, 21, 20),
(2, 21, 20),
(1, 22, 1),
(2, 22, 1),
(3, 22, 1),
(1, 23, 10),
(2, 23, 10),
(3, 23, 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem`
--

CREATE TABLE `imagem` (
  `ref` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `imagem`
--

INSERT INTO `imagem` (`ref`, `id`) VALUES
('1496366353cfcd208495d565ef66e7dff9f98764da5930bd11d3624.png', 4),
('1495498191cfcd208495d565ef66e7dff9f98764da59237dcfc8f85.png', 3),
('1495549619cfcd208495d565ef66e7dff9f98764da592446b3aa4ce.png', 1),
('1495498179cfcd208495d565ef66e7dff9f98764da59237dc385daf.png', 2),
('1495498221cfcd208495d565ef66e7dff9f98764da59237dedb7869.png', 5),
('1495498236cfcd208495d565ef66e7dff9f98764da59237dfc7d500.png', 6),
('1495498250cfcd208495d565ef66e7dff9f98764da59237e0ad1497.png', 7),
('1495498263cfcd208495d565ef66e7dff9f98764da59237e179dbe0.png', 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `minhaserie`
--

CREATE TABLE `minhaserie` (
  `usuarioms` int(11) NOT NULL,
  `seriems` int(11) NOT NULL,
  `episodio` int(11) NOT NULL,
  `temporada` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `nota` int(11) NOT NULL,
  `sugeriu` varchar(255) DEFAULT NULL,
  `sugeriuid` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `series`
--

CREATE TABLE `series` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `nota` int(100) NOT NULL,
  `temporada` int(11) NOT NULL,
  `duracao` varchar(255) NOT NULL,
  `notasinseridas` int(255) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `series`
--

INSERT INTO `series` (`id`, `nome`, `nota`, `temporada`, `duracao`, `notasinseridas`) VALUES
(0, 'Vikings', 0, 4, '45:00', 0),
(2, 'How I Met Your Mother', 5, 2, '20:00', 1),
(3, 'Game of Thrones', 0, 3, '55:00', 0),
(4, 'SerieX', 132, 1, '33:00', 19),
(5, 'Breaking Bad', 6, 3, '50:00', 1),
(6, 'House of Cards', 0, 5, '45:00', 0),
(11, 'American Horror Story', 15, 4, '15:00', 2),
(9, 'How to Get Away with Murder', 0, 2, '25:00', 0),
(10, 'Grey\'s Anatomy', 9, 2, '12:12', 1),
(12, 'Serie Y', 5, 4, '43:00', 1),
(13, 'The Flash', 8, 5, '60:00', 1),
(14, 'Flash', 0, 3, '20:00', 0),
(15, 'Better Caul Saul', 10, 3, '00:50', 1),
(16, 'Arrow', 0, 5, '45:00', 0),
(17, 'asdasda', 0, 4, '22:00', 0),
(18, 'SÃ©rie aleatoria', 0, 2, '34:22', 0),
(19, 'Sons of Anarchy', 0, 7, '60:00', 0),
(20, 'Mundo louco', 0, 3, '48:00', 0),
(21, 'Sense8', 0, 2, '45:00', 0),
(22, 'Serie Boa', 1, 3, '34:44', 1),
(23, 'Serie um', 0, 3, '40:00', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `nivel` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `email`, `senha`, `nome`, `nivel`) VALUES
(10, 'adm@local', '202cb962ac59075b964b07152d234b70', 'admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `episodio`
--
ALTER TABLE `episodio`
  ADD KEY `fk_serie` (`serieref`);

--
-- Indexes for table `minhaserie`
--
ALTER TABLE `minhaserie`
  ADD KEY `fk_usuario` (`usuarioms`),
  ADD KEY `fk_serie` (`seriems`);

--
-- Indexes for table `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `series`
--
ALTER TABLE `series`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

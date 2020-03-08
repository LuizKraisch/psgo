-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 17-Jun-2019 às 22:15
-- Versão do servidor: 10.1.40-MariaDB
-- versão do PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `psgo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `ferramentas`
--

CREATE TABLE `ferramentas` (
  `id_ferramentas` int(11) NOT NULL,
  `nomeferramenta` varchar(40) NOT NULL,
  `codigoferramenta` int(11) NOT NULL,
  `descricaoferramenta` varchar(100) DEFAULT NULL,
  `manutencao` varchar(200) NOT NULL,
  `almoxarifado` int(11) NOT NULL,
  `nomeutilizador` varchar(40) DEFAULT NULL,
  `uso` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ferramentas`
--

INSERT INTO `ferramentas` (`id_ferramentas`, `nomeferramenta`, `codigoferramenta`, `descricaoferramenta`, `manutencao`, `almoxarifado`, `nomeutilizador`, `uso`) VALUES
(44, 'dfsdfsdaf', 185695, 'dsfsasdfsdf', '12', 2, '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `manutencao`
--

CREATE TABLE `manutencao` (
  `id_manutencao` int(11) NOT NULL,
  `idprofessor` int(11) NOT NULL,
  `carro` varchar(200) NOT NULL,
  `descricaoaula` varchar(200) DEFAULT NULL,
  `nm_aulas` int(11) NOT NULL,
  `datahora` varchar(18) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `manutencao`
--

INSERT INTO `manutencao` (`id_manutencao`, `idprofessor`, `carro`, `descricaoaula`, `nm_aulas`, `datahora`) VALUES
(8, 4, 'Ford/Fiesta/2009/Preto', 'Troca de Ã³leo', 5, '22/06/2019 - 13:50'),
(11, 6, 'BMW/Z4/2014/Prata', 'Troca de Ã³leo', 6, '25/06/2017 - 14:55'),
(12, 6, 'Sem ManutenÃ§Ã£o', 'Nada', 0, '00/00/0000 - 00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pecas`
--

CREATE TABLE `pecas` (
  `id_pecas` int(11) NOT NULL,
  `nomepeca` varchar(40) NOT NULL,
  `codigopeca` int(11) NOT NULL,
  `descricaopeca` varchar(100) DEFAULT NULL,
  `manutencao` varchar(200) NOT NULL,
  `almoxarifado` int(11) NOT NULL,
  `nomeutilizador` varchar(40) DEFAULT NULL,
  `uso` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pecas`
--

INSERT INTO `pecas` (`id_pecas`, `nomepeca`, `codigopeca`, `descricaopeca`, `manutencao`, `almoxarifado`, `nomeutilizador`, `uso`) VALUES
(27, 'Mangueira', 110347, 'dfsdafasdf', '11', 2, 'Luiz', 'nao'),
(29, 'dffdsf', 292821, 'fdsfasdf', '12', 3, '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nomeusuario` varchar(40) NOT NULL,
  `emailusuario` varchar(50) NOT NULL,
  `senhausuario` varchar(40) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `tipousuario` varchar(9) NOT NULL,
  `matricula` int(7) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nomeusuario`, `emailusuario`, `senhausuario`, `usuario`, `tipousuario`, `matricula`) VALUES
(6, 'Admin', 'psgocontato@gmail.com', 'QPAH5044', 'psgoadm', 'Professor', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ferramentas`
--
ALTER TABLE `ferramentas`
  ADD PRIMARY KEY (`id_ferramentas`);

--
-- Indexes for table `manutencao`
--
ALTER TABLE `manutencao`
  ADD PRIMARY KEY (`id_manutencao`),
  ADD KEY `fk_professor` (`idprofessor`);

--
-- Indexes for table `pecas`
--
ALTER TABLE `pecas`
  ADD PRIMARY KEY (`id_pecas`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ferramentas`
--
ALTER TABLE `ferramentas`
  MODIFY `id_ferramentas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `manutencao`
--
ALTER TABLE `manutencao`
  MODIFY `id_manutencao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pecas`
--
ALTER TABLE `pecas`
  MODIFY `id_pecas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

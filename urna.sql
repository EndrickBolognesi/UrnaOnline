-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 04-Out-2018 às 01:54
-- Versão do servidor: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `urna`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `candidatos`
--

CREATE TABLE `candidatos` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `numero` int(11) NOT NULL,
  `cargo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `partido` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `img_id` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qt_votos` int(11) NOT NULL DEFAULT '0',
  `vice` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `candidatos`
--

INSERT INTO `candidatos` (`id`, `nome`, `numero`, `cargo`, `partido`, `img_id`, `estado`, `qt_votos`, `vice`) VALUES
(121, 'lukas gustavo', 20, 'Presidente', 'PT', 'attachment.png', 'Minas Gerais', 5, NULL),
(122, 'Endrick Bolognesi', 50, 'Presidente', 'PSL', 'tor2.jpg', 'Distrito Federal', 32, NULL),
(126, 'lukas gustavo', 17, 'Deputado', 'asdasd', '27751729_1823470607724508_202183197968356601_n.jpg', 'Pernambuco', 49, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargos`
--

CREATE TABLE `cargos` (
  `id` int(11) NOT NULL,
  `nome_cargo` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `cargos`
--

INSERT INTO `cargos` (`id`, `nome_cargo`) VALUES
(1, 'Presidente'),
(2, 'Deputado'),
(3, 'Governador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estados`
--

CREATE TABLE `estados` (
  `id` int(11) NOT NULL,
  `nome_estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `estados`
--

INSERT INTO `estados` (`id`, `nome_estado`) VALUES
(55, 'Acre'),
(56, 'Alagoas'),
(57, 'Amazonas'),
(58, 'Amapá'),
(59, 'Bahia'),
(60, 'Ceará'),
(61, 'Distrito Federal'),
(62, 'Espírito Santo'),
(63, 'Goiás'),
(64, 'Maranhão'),
(65, 'Minas Gerais'),
(66, 'Mato Grosso do Sul'),
(67, 'Mato Grosso'),
(68, 'Pará'),
(69, 'Paraíba'),
(70, 'Pernambuco'),
(71, 'Piauí'),
(72, 'Paraná'),
(73, 'Rio de Janeiro'),
(74, 'Rio Grande do Norte'),
(75, 'Rondônia'),
(76, 'Roraima'),
(77, 'Rio Grande do Sul'),
(78, 'Santa Catarina'),
(79, 'Sergipe'),
(80, 'São Paulo'),
(81, 'Tocantins');

-- --------------------------------------------------------

--
-- Estrutura da tabela `partidos`
--

CREATE TABLE `partidos` (
  `id` int(11) NOT NULL,
  `nome_partido` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sigla` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `partidos`
--

INSERT INTO `partidos` (`id`, `nome_partido`, `sigla`) VALUES
(9, 'MaringÃ¡', 'asdasd'),
(10, 'Fortaleza', 'asda'),
(11, 'PSL', 'asda'),
(12, 'Fortaleza', 'PT'),
(13, 'recipient-partido', 'recipient-partido');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `admin` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `dt_nascimento` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cpf` int(25) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `voto_governador` int(11) DEFAULT '0',
  `voto_presidente` int(11) DEFAULT '0',
  `voto_senador` int(11) DEFAULT '0',
  `voto_deputado` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `admin`, `email`, `senha`, `dt_nascimento`, `cpf`, `created`, `voto_governador`, `voto_presidente`, `voto_senador`, `voto_deputado`) VALUES
(3, 'Admin', 1, 'Endrick@admin', 'asdasdasd', '2018-09-29', 2147483647, '2018-09-29 22:18:15', 0, 6, NULL, NULL),
(7, 'admin', 1, 'admin', '123', '1997-10-14', 0, '2018-09-29 22:18:15', 0, -72, NULL, NULL),
(33, 'Endrick', 0, 'endrickgb@hotmail.com', '123', '1997-10-14', 2147483647, '2018-09-30 20:48:41', 0, 3, 0, 0),
(34, 'Lukas', 1, 'lukas@gmail.com', '123', '1997-10-14', 2147483647, '2018-09-30 21:17:32', 0, 3, 0, 0),
(35, 'user', 0, 'user@user.com', '123', '1997-10-14', 2147483647, '2018-09-30 23:08:32', 0, 2, 0, 0),
(36, 'PSDB', 0, '', '', '', 0, '2018-10-02 22:47:34', 0, 2, 0, 0),
(37, 'asdasd', 0, '', '', '', 0, '2018-10-02 22:48:16', 0, 2, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidatos`
--
ALTER TABLE `candidatos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partidos`
--
ALTER TABLE `partidos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidatos`
--
ALTER TABLE `candidatos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `estados`
--
ALTER TABLE `estados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `partidos`
--
ALTER TABLE `partidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

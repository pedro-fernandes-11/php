-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13-Jun-2021 às 20:57
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `chesstop`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `chessplayers`
--

CREATE TABLE `chessplayers` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `title` varchar(3) NOT NULL,
  `fide_rating` varchar(4) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `chessplayers`
--

INSERT INTO `chessplayers` (`id`, `name`, `title`, `fide_rating`, `image`) VALUES
(4, 'Magnus Carlsen', 'GM', '2847', 'efd40213b7abbe7b1ad113a353177d0d.jpg'),
(6, 'Fabiano Caruana', 'GM', '2820', '671cdfa8790bc18184d6615ddba48d8f.jpg'),
(7, 'Ding Liren', 'GM', '2799', '7178f79baa5f96d396889522bd8bd133.jpg'),
(8, 'Ian Nepomniachtchi', 'GM', '2792', 'bcf7f1d9e45a8c1bfb63880940d77fa5.jpg'),
(10, 'Levon Aronian', 'GM', '2781', '1788c91f350e4652b17e199fb3152799.jpg'),
(11, 'Anish Giri', 'GM', '2780', '9d540a0523652e48c2a77c3c7a3e423f.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `nome` varchar(30) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`nome`, `senha`, `email`) VALUES
('pedro', '21', 'pedro@pedro'),
('rfioahid', '0cc175b9c0f1b6a831c399e269772661', 'i@i'),
('p', '83878c91171338902e0fe0fb97a8c47a', 'p@p'),
('Pedro Fernandes', '9085c167160b5fe187ace2f452ec77da', 'pouzadap@gmail.com'),
('Pedro Fernandes', '9085c167160b5fe187ace2f452ec77da', 'pouzadap@gmail.com'),
('admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin'),
('aaaaaaaaa', '45e4812014d83dde5666ebdf5a8ed1ed', 'aaaaa@aaaaaa');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `chessplayers`
--
ALTER TABLE `chessplayers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `chessplayers`
--
ALTER TABLE `chessplayers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

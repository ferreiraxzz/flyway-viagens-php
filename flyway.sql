-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 25-Mar-2026 às 19:26
-- Versão do servidor: 5.7.37
-- versão do PHP: 8.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `flyway`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `pacotes`
--

CREATE TABLE `pacotes` (
  `id` int(11) NOT NULL,
  `destino` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quartos` int(11) DEFAULT NULL,
  `pessoas` int(11) DEFAULT NULL,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pais` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_reserva` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('aguardando','pago','cancelado') COLLATE utf8mb4_unicode_ci DEFAULT 'aguardando'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `pacotes`
--

INSERT INTO `pacotes` (`id`, `destino`, `quartos`, `pessoas`, `nome`, `pais`, `email`, `data_reserva`, `status`) VALUES
(1, 'SÃ£o Paulo', 1, 2, 'Giannis Antetokoumpo', 'CanadÃ¡', 'Giannis@34', '2025-06-16 21:36:29', 'cancelado'),
(2, 'Rio de Janeiro', 1, 2, 'Giannis Antetokoumpo', 'CanadÃ¡', 'Giannis@34', '2025-06-16 21:36:47', 'pago'),
(3, 'Rio de Janeiro', 1, 3, 'Yuri ', 'Brasil', 'yuri@yuri', '2025-06-16 23:51:36', 'cancelado'),
(4, 'SÃ£o Paulo', 1, 3, 'Yuri ', 'Brasil', 'yuri@yuri', '2025-06-16 23:52:16', 'pago'),
(5, 'Rio de Janeiro', 1, 4, 'leticia', 'Brasil', 'leticia@leticia.com.br', '2026-03-25 19:06:07', 'pago'),
(6, 'SÃ£o Paulo', 1, 3, 'leticia', 'Brasil', 'leticia@leticia.com.br', '2026-03-25 19:07:05', 'cancelado'),
(7, 'Rio de Janeiro', 1, 1, 'Guilherme', 'Brasil', 'gui@gui.com.br', '2026-03-25 19:14:33', 'pago');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamentos`
--

CREATE TABLE `pagamentos` (
  `id` int(11) NOT NULL,
  `id_pacote` int(11) NOT NULL,
  `metodo_pagamento` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome_titular` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero_cartao` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cvv` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `validade` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parcelas` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_pagamento` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `pagamentos`
--

INSERT INTO `pagamentos` (`id`, `id_pacote`, `metodo_pagamento`, `nome_titular`, `numero_cartao`, `cvv`, `validade`, `parcelas`, `data_pagamento`) VALUES
(1, 2, 'debito', 'GIANNIS ANTETOKOUMPO', '3333 3333 4444 4444', '343', '33/44', '1', '2025-06-16 21:37:18'),
(2, 4, 'debito', 'HUGO SOUZA GOLEIRO', '5555 5555 5555 5555', '545', '44/55', '1', '2025-06-16 23:53:18'),
(3, 5, 'debito', 'SHAI GILGEOUS ALEXANDER', '5454 5445 5454 4545', '2555', '08/10', '1', '2026-03-25 19:06:41'),
(4, 7, 'debito', 'SHAI GILGEOUS ALEXANDER', '4444 4444 4444 4444', '4444', '44/44', '1', '2026-03-25 19:14:53');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pais` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `senha` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `genero` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `pais`, `senha`, `genero`, `data_nascimento`, `foto`) VALUES
(1, 'Giannis Antetokoumpo', 'Giannis@34', 'CanadÃ¡', '$2y$10$R19FBXeMDUdpIXqARkC2BuVp/tlSYWWBIlq6zNsPw.1PztPd/53WC', 'Masculino', '2025-06-02', 'upload/68509a134a62b.png'),
(2, 'Yuri ', 'yuri@yuri', 'Brasil', '$2y$10$rMZxJrij6rtF2O1k9lu4YOwvv9Mvojs.HY0QVgyeg4IvnR6D6yGTG', 'Masculino', '2025-06-02', 'upload/6850add4db676.jpg'),
(3, 'Guilherme', 'gui@gui.com.br', 'Brasil', '$2y$10$9Sizhes3dwWcolNJ5ECZbuaZ8KXN1KizXJwVGmxNdODSIgFrbyxWK', 'Masculino', '2005-10-08', 'upload/69c433ebdd09a.jpg');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `pacotes`
--
ALTER TABLE `pacotes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pagamentos`
--
ALTER TABLE `pagamentos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `pacotes`
--
ALTER TABLE `pacotes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `pagamentos`
--
ALTER TABLE `pagamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

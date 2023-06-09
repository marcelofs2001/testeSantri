-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09-Jun-2023 às 22:12
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `testephp`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `autorizacao`
--

CREATE TABLE `autorizacao` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `chave_autorizacao` varchar(400) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `autorizacao`
--

INSERT INTO `autorizacao` (`id`, `id_usuario`, `chave_autorizacao`) VALUES
(4, 4, 'cadastrar_clientes, excluir_clientes'),
(5, 5, 'cadastrar_clientes, excluir_clientes'),
(7, 7, 'cadastrar_clientes, excluir_clientes, cadastrar_fornecedores, excluir_fornecedores'),
(9, 9, 'cadastrar_clientes, excluir_clientes, cadastrar_fornecedores, excluir_fornecedores'),
(10, 10, 'cadastrar_clientes, excluir_clientes, cadastrar_fornecedores, excluir_fornecedores, cadastrar_produtos, alterar_preco_produtos'),
(12, 12, 'cadastrar_clientes, excluir_clientes, cadastrar_fornecedores');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `ativo` varchar(3) NOT NULL,
  `nome` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `senha`, `ativo`, `nome`) VALUES
(4, 'teste', '123', 's', 'Murilo'),
(5, 'teste', '123', 's', 'João'),
(7, 'vivi', '123', 's', 'Vittoria'),
(9, 'diego', '1234', 's', 'Diego'),
(10, 'marcelo', '1234', 's', 'Marcelo'),
(12, 'teste', '123', 'S', 'Bruno');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `autorizacao`
--
ALTER TABLE `autorizacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usu_aut` (`id_usuario`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `autorizacao`
--
ALTER TABLE `autorizacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `autorizacao`
--
ALTER TABLE `autorizacao`
  ADD CONSTRAINT `fk_usu_aut` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

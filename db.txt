-- --------------------------------------------------------
-- Anfitrião:                    localhost
-- Versão do servidor:           10.4.32-MariaDB - mariadb.org binary distribution
-- SO do servidor:               Win64
-- HeidiSQL Versão:              12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- A despejar estrutura da base de dados para autoprime
CREATE DATABASE IF NOT EXISTS `autoprime` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `autoprime`;

-- A despejar estrutura para tabela autoprime.carros
CREATE TABLE IF NOT EXISTS `carros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marca` varchar(100) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `ano` int(11) NOT NULL,
  `cor` varchar(50) NOT NULL,
  `quilometragem` int(11) NOT NULL,
  `preco` int(11) NOT NULL DEFAULT 0,
  `descricao` text DEFAULT NULL,
  `imagem_url` varchar(255) DEFAULT NULL,
  `data_adicao` timestamp NOT NULL DEFAULT current_timestamp(),
  `versao` varchar(100) DEFAULT NULL,
  `combustivel` varchar(50) DEFAULT NULL,
  `ndeportas` int(11) DEFAULT NULL,
  `lotacao` int(11) DEFAULT NULL,
  `ndemudancas` int(11) DEFAULT NULL,
  `tipodecaixaa` varchar(50) DEFAULT NULL,
  `tracao` varchar(50) DEFAULT NULL,
  `2chave` varchar(3) DEFAULT NULL,
  `segmento` varchar(50) DEFAULT NULL,
  `potencia` int(11) DEFAULT NULL,
  `cilindrada` int(11) DEFAULT NULL,
  `preco_desconto` int(11) DEFAULT NULL,
  `estado` varchar(20) NOT NULL,
  `data_cadastro` date NOT NULL DEFAULT curdate(),
  `data_venda` date DEFAULT NULL,
  `data_estado` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- A despejar dados para tabela autoprime.carros: ~8 rows (aproximadamente)
INSERT INTO `carros` (`id`, `marca`, `modelo`, `ano`, `cor`, `quilometragem`, `preco`, `descricao`, `imagem_url`, `data_adicao`, `versao`, `combustivel`, `ndeportas`, `lotacao`, `ndemudancas`, `tipodecaixaa`, `tracao`, `2chave`, `segmento`, `potencia`, `cilindrada`, `preco_desconto`, `estado`, `data_cadastro`, `data_venda`, `data_estado`) VALUES
	(1, 'BMW', 'M2', 2020, 'Preto', 85000, 85000, 'Carro desportivo de alta performance, ideal para quem procura velocidade e estilo.', '1752018266_06413f67975edef40d2d.webp', '2025-01-14 11:50:35', 'M Sport', 'Gasolina', 2, 4, 6, 'Automática', 'Traseira', 'Sim', 'Desportivo', 410, 2993, 15000, 'vendido', '2025-06-27', '2025-04-01', NULL),
	(2, 'Audi', 'R8', 2020, 'Branco', 50000, 90000, 'Audi R8, um verdadeiro ícone do design e desempenho automóvel.', 'r8.webp', '2025-07-08 23:32:33', 'V10', 'Gasolina', 2, 2, 7, 'Automática', 'Traseira', 'Sim', 'Desportivo', 610, 5200, NULL, 'disponivel', '2025-06-27', '2025-07-08', NULL),
	(3, 'Audi', 'A4 Avant', 2020, 'Cinza', 25000, 40000, 'Espaço, conforto e desempenho. Perfeito para viagens de longa distância.', 'a4avant.webp', '2025-01-14 11:50:35', 'S Line', 'Diesel', 5, 5, 6, 'Manual', 'Dianteira', 'Sim', 'Sedan', 190, 1968, NULL, 'disponivel', '2025-06-27', '2025-07-01', NULL),
	(4, 'Aston Martin', 'DB11', 2020, 'Azul', 25000, 80000, 'Uma obra-prima da engenharia e design britânico, para um desempenho superior.', 'aston.webp', '2025-01-14 11:50:35', 'V8', 'Gasolina', 2, 4, 8, 'Automática', 'Traseira', 'Sim', 'Desportivo', 503, 3998, NULL, 'vendido', '2025-06-27', '2025-07-09', NULL),
	(5, 'BMW', 'M3', 2020, 'Verde', 25000, 80000, 'Desempenho e luxo juntos em um só carro.', 'bmw_m3_1.webp', '2025-01-14 11:50:35', 'Competition', 'Gasolina', 4, 5, 6, 'Automática', 'Traseira', 'Sim', 'Sedan', 510, 2993, 50000, 'vendido', '2025-06-27', '2025-07-09', NULL),
	(6, 'Porsche', 'Cayenne', 2020, 'Preto', 25000, 60000, 'SUV de luxo, ideal para quem deseja uma experiência única de condução.', 'porshe_cayenne_1.webp', '2025-01-14 11:50:35', 'Turbo', 'Gasolina', 5, 5, 8, 'Automática', 'Dianteira', 'Sim', 'SUV', 550, 4806, NULL, 'disponivel', '2025-06-27', NULL, NULL),
	(7, 'Mercedes', 'GLE', 2019, 'Prata', 35000, 60000, 'Um SUV espaçoso e elegante, com muita tecnologia e conforto.', 'mercedes_gle_1.webp', '2025-07-08 23:34:44', 'AMG', 'Diesel', 5, 5, 9, 'Automática', 'Dianteira', 'Sim', 'SUV', 400, 2925, NULL, 'disponivel', '2025-06-27', '2025-07-09', NULL),
	(8, 'Peugeot', '3008', 2022, 'Azul', 10000, 25000, 'Peugeot 3008, um SUV compacto com design moderno e tecnologias avançadas.', 'peugeot_3008_1.webp', '2025-01-14 11:50:35', 'GT', 'Diesel', 5, 5, 6, 'Manual', 'Dianteira', 'Sim', 'SUV', 180, 1598, NULL, 'disponivel', '2025-06-27', '2025-06-30', NULL);

-- A despejar estrutura para tabela autoprime.carros_favoritos
CREATE TABLE IF NOT EXISTS `carros_favoritos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `utilizador_id` int(11) DEFAULT NULL,
  `carro_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `utilizador_id` (`utilizador_id`),
  KEY `carro_id` (`carro_id`),
  CONSTRAINT `carros_favoritos_ibfk_1` FOREIGN KEY (`utilizador_id`) REFERENCES `utilizadores` (`id`),
  CONSTRAINT `carros_favoritos_ibfk_2` FOREIGN KEY (`carro_id`) REFERENCES `carros` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- A despejar dados para tabela autoprime.carros_favoritos: ~4 rows (aproximadamente)
INSERT INTO `carros_favoritos` (`id`, `utilizador_id`, `carro_id`) VALUES
	(1, 1, 2),
	(2, 2, 5),
	(3, 3, 1),
	(4, 4, 8);

-- A despejar estrutura para tabela autoprime.carro_imagens
CREATE TABLE IF NOT EXISTS `carro_imagens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `carro_id` int(11) NOT NULL,
  `imagem_url` varchar(255) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `carro_id` (`carro_id`),
  CONSTRAINT `carro_imagens_ibfk_1` FOREIGN KEY (`carro_id`) REFERENCES `carros` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- A despejar dados para tabela autoprime.carro_imagens: ~39 rows (aproximadamente)
INSERT INTO `carro_imagens` (`id`, `carro_id`, `imagem_url`, `descricao`, `criado_em`) VALUES
	(1, 1, 'bmw_m2_1.webp', NULL, '2025-01-14 12:16:13'),
	(2, 1, 'bmw_m2_2.webp', NULL, '2025-01-14 13:02:39'),
	(3, 1, 'bmw_m2_3.webp', NULL, '2025-01-14 14:27:43'),
	(4, 1, 'bmw_m2_4.webp', NULL, '2025-01-14 14:28:08'),
	(5, 2, 'Audi_r8_1.webp', NULL, '2025-01-14 14:33:05'),
	(6, 2, 'Audi_r8_2.webp', NULL, '2025-01-14 14:43:52'),
	(7, 2, 'Audi_r8_3.webp', NULL, '2025-01-14 14:44:02'),
	(8, 2, 'Audi_r8_4.webp', NULL, '2025-01-14 14:44:05'),
	(9, 2, 'Audi_r8_5.webp', NULL, '2025-01-14 14:44:18'),
	(10, 3, 'Audi_a4_1.webp', NULL, '2025-01-14 14:53:28'),
	(11, 3, 'Audi_a4_2.webp', NULL, '2025-01-14 14:54:09'),
	(12, 3, 'Audi_a4_3.webp', NULL, '2025-01-14 14:54:22'),
	(13, 3, 'Audi_a4_4.webp', NULL, '0000-00-00 00:00:00'),
	(14, 3, 'Audi_a4_5.webp', NULL, '2025-01-14 14:55:22'),
	(15, 4, 'Aston_Vantage_1.webp', NULL, '2025-01-15 08:53:37'),
	(16, 4, 'Aston_Vantage_2.webp', NULL, '2025-01-15 08:54:09'),
	(17, 4, 'Aston_Vantage_3.webp', NULL, '2025-01-15 08:54:21'),
	(18, 4, 'Aston_Vantage_4.webp', NULL, '2025-01-15 08:54:31'),
	(19, 4, 'Aston_Vantage_5.webp', NULL, '2025-01-15 08:54:41'),
	(20, 5, 'bmw_m3_1.webp', NULL, '2025-01-15 09:00:31'),
	(21, 5, 'bmw_m3_2.webp', NULL, '2025-01-15 09:00:41'),
	(22, 5, 'bmw_m3_3.webp', NULL, '2025-01-15 09:00:53'),
	(23, 5, 'bmw_m3_4.webp', NULL, '2025-01-15 09:01:03'),
	(24, 5, 'bmw_m3_5.webp', NULL, '2025-01-15 09:01:13'),
	(25, 6, 'porshe_cayenne_1.webp', NULL, '2025-01-15 09:14:39'),
	(26, 6, 'porshe_cayenne_2.webp', NULL, '2025-01-15 09:14:53'),
	(27, 6, 'porshe_cayenne_3.webp', NULL, '2025-01-15 09:15:03'),
	(28, 6, 'porshe_cayenne_4.webp', NULL, '2025-01-15 09:15:15'),
	(29, 6, 'porshe_cayenne_5.webp', NULL, '2025-01-15 09:15:15'),
	(30, 7, 'mercedes_gle_1.webp', NULL, '2025-01-15 09:22:24'),
	(31, 7, 'mercedes_gle_2.webp', NULL, '2025-01-15 09:22:36'),
	(32, 7, 'mercedes_gle_3.webp', NULL, '2025-01-15 09:22:48'),
	(33, 7, 'mercedes_gle_4.webp', NULL, '2025-01-15 09:22:58'),
	(34, 7, 'mercedes_gle_5.webp', NULL, '2025-01-15 09:23:12'),
	(35, 8, 'peugeot_3008_1.webp', NULL, '2025-01-15 09:26:40'),
	(36, 8, 'peugeot_3008_2.webp', NULL, '2025-01-15 09:26:40'),
	(37, 8, 'peugeot_3008_3.webp', NULL, '2025-01-15 09:26:40'),
	(38, 8, 'peugeot_3008_4.webp', NULL, '2025-01-15 09:26:40'),
	(39, 8, 'peugeot_3008_5.webp', NULL, '2025-01-15 09:26:40');

-- A despejar estrutura para tabela autoprime.logs
CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- A despejar dados para tabela autoprime.logs: ~75 rows (aproximadamente)
INSERT INTO `logs` (`id`, `user_id`, `user_name`, `action`, `description`, `ip_address`, `created_at`) VALUES
	(1, NULL, NULL, 'Criou Veículo', 'Veículo modelo M3 criado com sucesso.', '::1', '2025-07-02 23:04:15'),
	(2, NULL, NULL, 'Criou Veículo', 'Veículo modelo M3 criado com sucesso.', '::1', '2025-07-02 23:07:32'),
	(3, NULL, NULL, 'Criou Veículo', 'Veículo modelo M3 criado com sucesso.', '::1', '2025-07-02 23:11:53'),
	(4, 1, 'Fábio', 'Criou Veículo', 'Veículo modelo M2 criado com sucesso.', '::1', '2025-07-02 23:15:33'),
	(5, 1, NULL, 'Criou Veículo', 'Veículo modelo M15 criado com sucesso.', '::1', '2025-07-02 23:18:43'),
	(6, 1, NULL, 'Criou Veículo', 'Veículo modelo M3113 criado com sucesso.', '::1', '2025-07-02 23:21:56'),
	(7, 1, NULL, 'Criou Veículo', 'Veículo modelo m2 criado com sucesso.', '::1', '2025-07-03 18:33:02'),
	(8, 1, 'Fábio', 'Criou Veículo', 'Veículo modelo CLASSE A criado com sucesso.', '::1', '2025-07-03 18:36:13'),
	(9, 1, 'Fábio', 'Criou Veículo', 'Veículo Mercedes Classe A criado com sucesso.', '::1', '2025-07-03 18:40:30'),
	(11, 1, 'Fábio', 'Editou Veículo', 'Veículo BMW M2 editado com sucesso.', '::1', '2025-07-03 19:04:45'),
	(12, 1, 'Fábio', 'Criou Veículo', 'Veículo Bmw AMG criado com sucesso.', '::1', '2025-07-03 19:09:35'),
	(14, 1, 'Fábio', 'Criou Veículo', 'Veículo carro M2 criado com sucesso.', '::1', '2025-07-03 19:11:34'),
	(16, 1, 'Fábio', 'Criou Veículo', 'Veículo Bmw M3 criado com sucesso.', '::1', '2025-07-03 19:13:29'),
	(17, 1, 'Fábio', 'Excluiu Veículo', 'Veículo Bmw M3 excluído com sucesso.', '::1', '2025-07-03 19:13:33'),
	(18, 1, 'Fábio', 'Editou Veículo', 'Veículo Audi R8 editado com sucesso.', '::1', '2025-07-07 20:42:57'),
	(19, 1, 'Fábio', 'Editou Veículo', 'Veículo BMW M2 editado com sucesso.', '::1', '2025-07-08 00:48:33'),
	(20, 1, 'Fábio', 'Editou Veículo', 'Veículo Audi R8 editado com sucesso.', '::1', '2025-07-08 00:48:36'),
	(21, 1, 'Fábio', 'Editou Veículo', 'Veículo Audi A4 Avant editado com sucesso.', '::1', '2025-07-08 00:48:53'),
	(22, 1, 'Fábio', 'Editou Veículo', 'Veículo BMW M2 editado com sucesso.', '::1', '2025-07-08 00:49:13'),
	(23, 1, 'Fábio', 'Editou Veículo', 'Veículo Peugeot 3008 editado com sucesso.', '::1', '2025-07-08 01:08:18'),
	(24, 1, 'Fábio', 'Editou Veículo', 'Veículo Peugeot 3008 editado com sucesso.', '::1', '2025-07-08 01:17:57'),
	(25, 1, 'Fábio', 'Editou Veículo', 'Veículo Audi R8 editado com sucesso.', '::1', '2025-07-08 01:29:34'),
	(26, 1, 'Fábio', 'Criou Veículo', 'Veículo fdgdfgdfgdfg M3 criado com sucesso.', '::1', '2025-07-08 17:26:03'),
	(27, 1, 'Fábio', 'Excluiu Veículo', 'Veículo fdgdfgdfgdfg M3 excluído com sucesso.', '::1', '2025-07-08 17:28:13'),
	(28, 1, 'Fábio', 'Criou Veículo', 'Veículo Bmw M3 criado com sucesso.', '::1', '2025-07-08 17:29:40'),
	(29, 1, 'Fábio', 'Excluiu Veículo', 'Veículo Bmw M3 excluído com sucesso.', '::1', '2025-07-08 17:39:24'),
	(30, 1, 'Fábio', 'Criou Veículo', 'Veículo Bmw M3 criado com sucesso.', '::1', '2025-07-08 17:45:25'),
	(31, 1, 'Fábio', 'Excluiu Veículo', 'Veículo Bmw M3 excluído com sucesso.', '::1', '2025-07-08 17:47:37'),
	(32, 1, 'Fábio', 'Criou Veículo', 'Veículo BMW M3 criado com sucesso.', '::1', '2025-07-08 17:48:50'),
	(33, 1, 'Fábio', 'Excluiu Veículo', 'Veículo Bmw M3 excluído com sucesso.', '::1', '2025-07-08 17:55:53'),
	(34, 1, 'Fábio', 'Excluiu Veículo', 'Veículo BMW M3 excluído com sucesso.', '::1', '2025-07-08 17:55:56'),
	(35, 1, 'Fábio', 'Criou Veículo', 'Veículo BMW M3 criado com sucesso.', '::1', '2025-07-08 17:57:07'),
	(36, 1, 'Fábio', 'Criou Veículo', 'Veículo Bmw M3 criado com sucesso.', '::1', '2025-07-08 18:05:14'),
	(37, 1, 'Fábio', 'Excluiu Veículo', 'Veículo Bmw M3 excluído com sucesso.', '::1', '2025-07-08 18:20:18'),
	(38, 1, 'Fábio', 'Excluiu Veículo', 'Veículo BMW M3 excluído com sucesso.', '::1', '2025-07-08 18:20:20'),
	(39, 1, 'Fábio', 'Criou Veículo', 'Veículo Bmw M2 criado com sucesso.', '::1', '2025-07-08 18:23:06'),
	(40, 1, 'Fábio', 'Editou Veículo', 'Veículo BMW M2 editado com sucesso.', '::1', '2025-07-08 18:24:44'),
	(41, 1, 'Fábio', 'Editou Veículo', 'Veículo BMW M2 editado com sucesso.', '::1', '2025-07-08 18:31:18'),
	(42, 1, 'Fábio', 'Editou Veículo', 'Veículo BMW M2 editado com sucesso.', '::1', '2025-07-08 18:33:34'),
	(43, 1, 'Fábio', 'Editou Veículo', 'Veículo BMW M2 editado com sucesso.', '::1', '2025-07-08 18:33:44'),
	(44, 1, 'Fábio', 'Editou Veículo', 'Veículo BMW M2 editado com sucesso.', '::1', '2025-07-08 18:35:23'),
	(45, 1, 'Fábio', 'Editou Veículo', 'Veículo BMW2 M2 editado com sucesso.', '::1', '2025-07-08 18:38:30'),
	(46, 1, 'Fábio', 'Editou Veículo', 'Veículo BMW M2 editado com sucesso.', '::1', '2025-07-08 18:38:35'),
	(47, 1, 'Fábio', 'Editou Veículo', 'Veículo BMW M2 editado com sucesso.', '::1', '2025-07-08 18:48:45'),
	(48, 1, 'Fábio', 'Editou Veículo', 'Veículo BMW M2 editado com sucesso.', '::1', '2025-07-08 18:49:28'),
	(49, 1, 'Fábio', 'Editou Veículo', 'Veículo BMW M2 editado com sucesso.', '::1', '2025-07-08 19:11:27'),
	(50, 1, 'Fábio', 'Excluiu Veículo', 'Veículo Bmw M2 excluído com sucesso.', '::1', '2025-07-08 19:12:19'),
	(51, 1, 'Fábio', 'Editou Veículo', 'Veículo BMW M2 editado com sucesso.', '::1', '2025-07-08 19:12:41'),
	(52, 1, 'Fábio', 'Editou Veículo', 'Veículo BMW M2 editado com sucesso.', '::1', '2025-07-08 19:26:06'),
	(53, 1, 'Fábio', 'Editou Veículo', 'Veículo Audi R8 editado com sucesso.', '::1', '2025-07-08 20:29:11'),
	(54, 1, 'Fábio', 'Editou Veículo', 'Veículo Audi A4 Avant editado com sucesso.', '::1', '2025-07-08 20:29:37'),
	(55, 1, 'Fábio', 'Editou Veículo', 'Veículo Audi A4 Avant editado com sucesso.', '::1', '2025-07-08 20:29:45'),
	(56, 1, 'Fábio', 'Editou Veículo', 'Veículo Audi A4 Avant editado com sucesso.', '::1', '2025-07-08 20:29:49'),
	(57, 1, 'Fábio', 'Editou Veículo', 'Veículo Audi A4 Avant editado com sucesso.', '::1', '2025-07-08 20:30:35'),
	(58, 1, 'Fábio', 'Editou Veículo', 'Veículo Audi R8 editado com sucesso.', '::1', '2025-07-08 21:31:47'),
	(59, 1, 'Fábio', 'Editou Veículo', 'Veículo Audi R8 editado com sucesso.', '::1', '2025-07-08 21:31:53'),
	(60, 1, 'Fábio', 'Editou Veículo', 'Veículo Audi R8 editado com sucesso.', '::1', '2025-07-08 21:37:53'),
	(61, 1, 'Fábio', 'Editou Veículo', 'Veículo Audi R8 editado com sucesso.', '::1', '2025-07-08 21:37:57'),
	(62, 1, 'Fábio', 'Editou Veículo', 'Veículo Audi R8 editado com sucesso.', '::1', '2025-07-08 21:38:15'),
	(63, 1, 'Fábio', 'Editou Veículo', 'Veículo Audi R8 editado com sucesso.', '::1', '2025-07-08 21:41:06'),
	(64, 1, 'Fábio', 'Editou Veículo', 'Veículo Audi R8 editado com sucesso.', '::1', '2025-07-08 21:41:14'),
	(65, 1, 'Fábio', 'Editou Veículo', 'Veículo Audi R8 editado com sucesso.', '::1', '2025-07-08 21:41:41'),
	(66, 1, 'Fábio', 'Editou Veículo', 'Veículo Peugeot 3008 editado com sucesso.', '::1', '2025-07-09 00:31:57'),
	(67, 1, 'Fábio', 'Criou Veículo', 'Veículo BMS M3 criado com sucesso.', '::1', '2025-07-09 00:34:44'),
	(68, 1, 'Fábio', 'Editou Veículo', 'Veículo Peugeot 3008 editado com sucesso.', '::1', '2025-07-09 00:36:06'),
	(69, 1, 'Fábio', 'Editou Veículo', 'Veículo Peugeot 3008 editado com sucesso.', '::1', '2025-07-09 00:40:34'),
	(70, 1, 'Fábio', 'Editou Veículo', 'Veículo Peugeot 3008 editado com sucesso.', '::1', '2025-07-09 00:41:05'),
	(71, 1, 'Fábio', 'Editou Veículo', 'Veículo Peugeot 3008 editado com sucesso.', '::1', '2025-07-09 00:41:22'),
	(72, 1, 'Fábio', 'Editou Veículo', 'Veículo BMW M2 editado com sucesso.', '::1', '2025-07-09 00:42:23'),
	(73, 1, 'Fábio', 'Criou Veículo', 'Veículo Bmw fdsfdsf M3 criado com sucesso.', '::1', '2025-07-09 00:44:11'),
	(74, 1, 'Fábio', 'Editou Veículo', 'Veículo BMW M2 editado com sucesso.', '::1', '2025-07-09 00:44:26'),
	(75, 1, 'Fábio', 'Excluiu Veículo', 'Veículo Bmw fdsfdsf M3 excluído com sucesso.', '::1', '2025-07-09 00:45:00'),
	(76, 1, 'Fábio', 'Excluiu Veículo', 'Veículo Bmw M3 excluído com sucesso.', '::1', '2025-07-09 01:23:47'),
	(77, 1, 'Fábio', 'Criou Veículo', 'Veículo Bmw M3 criado com sucesso.', '::1', '2025-07-09 01:38:13'),
	(78, 1, 'Fábio', 'Excluiu Veículo', 'Veículo Bmw M3 excluído com sucesso.', '::1', '2025-07-09 01:39:35'),
	(79, 1, 'Fábio', 'Editou Veículo', 'Veículo BMW M3 editado com sucesso.', '::1', '2025-07-09 02:11:22'),
	(80, 1, 'Fábio', 'Editou Veículo', 'Veículo BMW M3 editado com sucesso.', '::1', '2025-07-09 02:11:52'),
	(81, 1, 'Fábio', 'Editou Veículo', 'Veículo Aston Martin DB11 editado com sucesso.', '::1', '2025-07-09 02:12:18'),
	(82, 1, 'Fábio', 'Editou Veículo', 'Veículo Mercedes GLE editado com sucesso.', '::1', '2025-07-09 02:29:59'),
	(83, 1, 'Fábio', 'Editou Veículo', 'Veículo Mercedes GLE editado com sucesso.', '::1', '2025-07-09 02:30:10'),
	(84, 1, 'Fábio', 'Excluiu Test Drive', 'Veículo BMW M3 excluído com sucesso.', '::1', '2025-07-09 02:47:30'),
	(85, 1, 'Fábio', 'Excluiu Administrador', 'Administrador Velar excluído com sucesso.', '::1', '2025-07-09 02:52:54'),
	(86, 1, 'Fábio', 'Criou Administrador', 'Administrador Velar adicionado com sucesso.', '::1', '2025-07-09 02:57:59'),
	(87, 1, 'Fábio', 'Excluiu Administrador', 'Administrador Velar excluído com sucesso.', '::1', '2025-07-09 02:59:38');

-- A despejar estrutura para tabela autoprime.menu_admin
CREATE TABLE IF NOT EXISTS `menu_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `link` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- A despejar dados para tabela autoprime.menu_admin: ~4 rows (aproximadamente)
INSERT INTO `menu_admin` (`id`, `nome`, `link`) VALUES
	(1, 'Dashboard', '/admin/dashboard'),
	(2, 'Gestão de Carros', '/admin/carros'),
	(3, 'Gestão de Utilizadores', '/admin/utilizadores'),
	(4, 'Relatórios', '/admin/relatorios');

-- A despejar estrutura para tabela autoprime.registos_login
CREATE TABLE IF NOT EXISTS `registos_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `utilizador_id` int(11) DEFAULT NULL,
  `ip_address` varchar(100) DEFAULT NULL,
  `data_hora` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `utilizador_id` (`utilizador_id`),
  CONSTRAINT `registos_login_ibfk_1` FOREIGN KEY (`utilizador_id`) REFERENCES `utilizadores` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- A despejar dados para tabela autoprime.registos_login: ~4 rows (aproximadamente)
INSERT INTO `registos_login` (`id`, `utilizador_id`, `ip_address`, `data_hora`) VALUES
	(1, 1, '192.168.0.1', '2025-01-10 10:23:47'),
	(2, 2, '192.168.0.2', '2025-01-10 10:23:47'),
	(3, 3, '192.168.0.3', '2025-01-10 10:23:47'),
	(4, 4, '192.168.0.4', '2025-01-10 10:23:47');

-- A despejar estrutura para tabela autoprime.test_drives
CREATE TABLE IF NOT EXISTS `test_drives` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_cliente` varchar(100) DEFAULT NULL,
  `email_cliente` varchar(100) DEFAULT NULL,
  `telefone_cliente` varchar(20) DEFAULT NULL,
  `carro_id` int(11) DEFAULT NULL,
  `data_agendada` datetime DEFAULT NULL,
  `mensagem` text DEFAULT NULL,
  `status` enum('pendente','aprovado','cancelado') DEFAULT 'pendente',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `carro_id` (`carro_id`),
  CONSTRAINT `test_drives_ibfk_1` FOREIGN KEY (`carro_id`) REFERENCES `carros` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- A despejar dados para tabela autoprime.test_drives: ~1 rows (aproximadamente)
INSERT INTO `test_drives` (`id`, `nome_cliente`, `email_cliente`, `telefone_cliente`, `carro_id`, `data_agendada`, `mensagem`, `status`, `created_at`) VALUES
	(4, 'Fábio Vieira', 'al2022065@epcc.pt', '934468028', 2, '2025-07-10 06:13:00', 'sadasdad', 'pendente', '2025-07-09 00:08:44');

-- A despejar estrutura para tabela autoprime.users
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- A despejar dados para tabela autoprime.users: ~1 rows (aproximadamente)
INSERT INTO `users` (`user_id`, `user_name`, `email`, `password`) VALUES
	(1, 'Fábio', 'fabio@autoprime.pt', '$2y$10$0JHLU5bJa5pqffyIkCBHM.ci40vNK1C/b8Si0QRhagIAwPHB55cNy');

-- A despejar estrutura para tabela autoprime.utilizadores
CREATE TABLE IF NOT EXISTS `utilizadores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `tipo` enum('cliente','admin') DEFAULT 'cliente',
  `data_registo` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- A despejar dados para tabela autoprime.utilizadores: ~4 rows (aproximadamente)
INSERT INTO `utilizadores` (`id`, `nome`, `email`, `senha`, `tipo`, `data_registo`) VALUES
	(1, 'Carlos Silva', 'carlos.silva@email.com', 'senhaCriptografada1', 'cliente', '2025-01-10 10:23:35'),
	(2, 'Ana Ferreira', 'ana.ferreira@email.com', 'senhaCriptografada2', 'cliente', '2025-01-10 10:23:35'),
	(3, 'João Mendes', 'joao.mendes@email.com', 'senhaCriptografada3', 'admin', '2025-01-10 10:23:35'),
	(4, 'Maria Costa', 'maria.costa@email.com', 'senhaCriptografada4', 'cliente', '2025-01-10 10:23:35');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

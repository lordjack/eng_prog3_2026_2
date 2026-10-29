-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.30 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Copiando estrutura do banco de dados para db_prog3_2026_1
CREATE DATABASE IF NOT EXISTS `db_prog3_2026_1` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_bin */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_prog3_2026_1`;

-- Copiando estrutura para tabela db_prog3_2026_1.categorias
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `descricao` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Copiando dados para a tabela db_prog3_2026_1.categorias
INSERT IGNORE INTO `categorias` (`id`, `nome`, `descricao`) VALUES
	(1, 'Vestuario', 'Roupas em geral'),
	(2, 'Calcados', 'Tenis, sapatos e sandalias'),
	(3, 'Acessorios', 'Bolsas, cintos e outros');

-- Copiando estrutura para tabela db_prog3_2026_1.produtos
CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(130) COLLATE utf8mb4_bin NOT NULL DEFAULT '0',
  `preco` float NOT NULL DEFAULT '0',
  `quantidade` float NOT NULL DEFAULT '0',
  `categoria_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_produtos_categorias` (`categoria_id`),
  CONSTRAINT `FK_produtos_categorias` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Copiando dados para a tabela db_prog3_2026_1.produtos: ~6 rows (aproximadamente)
INSERT IGNORE INTO `produtos` (`id`, `nome`, `preco`, `quantidade`, `categoria_id`) VALUES
	(1, 'Camisa', 89, 5, 1),
	(2, 'Bermuda', 70, 8, 1),
	(3, 'Tênis', 250, 4, 2),
	(4, 'Smartphone', 3700, 2, NULL),
	(5, 'Maça', 4, 50, NULL),
	(6, 'Camisa Polo', 89.5, 10, NULL),
	(7, 'Camisa Polo', 89.5, 10, NULL),
	(8, 'Camisa Polo', 89.5, 10, NULL);

-- Copiando estrutura para tabela db_prog3_2026_1.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(60) COLLATE utf8mb4_bin NOT NULL,
  `telefone` varchar(40) COLLATE utf8mb4_bin DEFAULT NULL,
  `ativo` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Copiando dados para a tabela db_prog3_2026_1.usuarios
INSERT IGNORE INTO `usuarios` (`id`, `nome`, `email`, `telefone`, `ativo`) VALUES
	(6, 'Maria', 'Maria@ifsc.edu.br', '49 98862-1000', 1),
	(7, 'Jose', 'jJose@ifsc.edu.br', '49 98862-0700', 1),
	(8, 'Ana', 'Ana@ifsc.edu.br', '49 98862-5000', 0),
	(9, 'Jackson', 'jackson@ifsc.edu.br', '49 98862-1001', 1);

-- Copiando estrutura para tabela db_prog3_2026_1.tarefas
CREATE TABLE IF NOT EXISTS `tarefas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `descricao` text COLLATE utf8mb4_bin,
  `prioridade` varchar(60) COLLATE utf8mb4_bin DEFAULT NULL,
  `status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `usuario_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_tarefas_aluno` (`usuario_id`) USING BTREE,
  CONSTRAINT `FK_tarefas_aluno` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Copiando dados para a tabela db_prog3_2026_1.tarefas
INSERT IGNORE INTO `tarefas` (`id`, `titulo`, `descricao`, `prioridade`, `status`, `usuario_id`) VALUES
	(2, 'Atividade Maria ', ' Teste Teste Teste Teste Teste ', 'MEDIA', 'CONCLUIDO', 6),
	(3, 'Atividade Jose', ' Teste Teste Teste Teste Teste ', 'ALTA', 'CONCLUIDO', 7),
	(8, 'Atividade Prof. Jackson ', ' Teste Teste Teste Teste Teste ', 'BAIXA', 'PENDENTE', 8),
	(9, 'Atividade SQL Maria ', NULL, 'MEDIA', 'PENDENTE', 6),
	(10, 'Atividade Jose', NULL, 'ALTA', 'PENDENTE', 7),
	(11, 'Prof. Jackson ', ' Teste Teste Teste Teste Teste ', 'BAIXA', 'EM_ANDAMENTO', 8),
	(12, 'Maria ', ' Teste Teste Teste Teste Teste ', 'MEDIA', 'EM_ANDAMENTO', 6),
	(13, 'Atividade Jose', NULL, 'ALTA', 'EM_ANDAMENTO', 7);


/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

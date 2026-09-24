-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.30 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.1.0.6537
-- --------------------------------------------------------

-- Copiando estrutura do banco de dados para db_prog3_2026_1
CREATE DATABASE IF NOT EXISTS `db_prog3_2026_1` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_bin */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_prog3_2026_1`;

-- Copiando estrutura para tabela db_prog3_2026_1.produtos
CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(130) COLLATE utf8mb4_bin NOT NULL DEFAULT '0',
  `preco` float NOT NULL DEFAULT '0',
  `quantidade` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Copiando dados para a tabela db_prog3_2026_1.produtos: ~4 rows (aproximadamente)
INSERT IGNORE INTO `produtos` (`id`, `nome`, `preco`, `quantidade`) VALUES
	(1, 'Camisa Básica', 50, 50),
	(2, 'Smartphone', 3700, 2),
	(3, 'Maça', 4, 50),
	(6, 'Camisa Polo', 89.5, 10),
	(7, 'Camisa Polo', 89.5, 10),
	(8, 'Camisa Polo', 89.5, 10);

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

-- Copiando dados para a tabela db_prog3_2026_1.tarefas: ~8 rows (aproximadamente)
INSERT IGNORE INTO `tarefas` (`id`, `titulo`, `descricao`, `prioridade`, `status`, `usuario_id`) VALUES
	(3, 'Atividade Jose', ' Teste Teste Teste Teste Teste ', 'ALTA', 'CONCLUIDO', 7),
	(8, 'Atividade Prof. Jackson ', ' Teste Teste Teste Teste Teste ', 'BAIXA', 'PENDENTE', 8),
	(10, 'Atividade Jose', NULL, 'ALTA', 'PENDENTE', 7),
	(11, 'Prof. Jackson ', ' Teste Teste Teste Teste Teste ', 'BAIXA', 'EM_ANDAMENTO', 8),
	(13, 'Atividade Jose', NULL, 'ALTA', 'EM_ANDAMENTO', 7);

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

-- Copiando dados para a tabela db_prog3_2026_1.usuarios: ~3 rows (aproximadamente)
INSERT IGNORE INTO `usuarios` (`id`, `nome`, `email`, `telefone`, `ativo`) VALUES
	(7, 'Jackson', 'Jackson@ifsc.edu.br', '49 98862-0700', 1),
	(8, 'Ana', 'Ana@ifsc.edu.br', '49 98862-5000', 0),
	(9, 'Jackson', 'jackson@ifsc.edu.br', '49 98862-1001', 1),
	(14, 'Jose', 'jJose@ifsc.edu.br', '49 98862-0700', 1);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

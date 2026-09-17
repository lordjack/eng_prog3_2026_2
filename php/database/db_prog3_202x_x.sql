-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.30 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.1.0.6537
-- --------------------------------------------------------

-- Copiando estrutura do banco de dados para db_prog3_2026_1
CREATE DATABASE IF NOT EXISTS `db_prog3_2026_1` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_bin */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_prog3_2026_1`;

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
  CONSTRAINT `FK_tarefas_aluno` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Copiando dados para a tabela db_prog3_2026_1.tarefas: ~8 rows (aproximadamente)
INSERT INTO `tarefas` (`id`, `titulo`, `descricao`, `prioridade`, `status`, `usuario_id`) VALUES
	(2, 'Atividade Maria ', ' Teste Teste Teste Teste Teste ', 'MEDIA', 'CONCLUIDO', 6),
	(3, 'Atividade Jose', ' Teste Teste Teste Teste Teste ', 'ALTA', 'CONCLUIDO', 7),
	(8, 'Atividade Prof. Jackson ', ' Teste Teste Teste Teste Teste ', 'BAIXA', 'PENDENTE', 8),
	(9, 'Atividade SQL Maria ', NULL, 'MEDIA', 'PENDENTE', 6),
	(10, 'Atividade Jose', NULL, 'ALTA', 'PENDENTE', 7),
	(11, 'Prof. Jackson ', ' Teste Teste Teste Teste Teste ', 'BAIXA', 'EM_ANDAMENTO', 8),
	(12, 'Maria ', ' Teste Teste Teste Teste Teste ', 'MEDIA', 'EM_ANDAMENTO', 6),
	(13, 'Atividade Jose', NULL, 'ALTA', 'EM_ANDAMENTO', 7);

-- Copiando estrutura para tabela db_prog3_2026_1.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(60) COLLATE utf8mb4_bin NOT NULL,
  `telefone` varchar(40) COLLATE utf8mb4_bin DEFAULT NULL,
  `ativo` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Copiando dados para a tabela db_prog3_2026_1.usuario: ~3 rows (aproximadamente)
INSERT INTO `usuario` (`id`, `nome`, `email`, `telefone`, `ativo`) VALUES
	(6, 'Maria', 'Maria@ifsc.edu.br', '49 98862-1000', 1),
	(7, 'Jose', 'jJose@ifsc.edu.br', '49 98862-0700', 1),
	(8, 'Ana', 'Ana@ifsc.edu.br', '49 98862-5000', 0);


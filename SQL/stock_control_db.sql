-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.28-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para stock_control_db
CREATE DATABASE IF NOT EXISTS `stock_control_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `stock_control_db`;

-- Copiando estrutura para tabela stock_control_db.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nome` text NOT NULL,
  `sobrenome` text NOT NULL,
  `data_de_nascimento` date NOT NULL,
  `cpf` text NOT NULL,
  PRIMARY KEY (`id_cliente`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela stock_control_db.produto
CREATE TABLE IF NOT EXISTS `produto` (
  `id_produto` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_de_barras` text NOT NULL,
  `nome` text NOT NULL,
  `categoria` text NOT NULL,
  `empresa` text NOT NULL,
  `tipo` text NOT NULL,
  `marca` text NOT NULL,
  `quantidade` int(11) NOT NULL,
  PRIMARY KEY (`id_produto`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela stock_control_db.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` text NOT NULL,
  `sobrenome` text NOT NULL,
  `data_de_nascimento` date NOT NULL,
  `cpf` text NOT NULL,
  `usuario` text NOT NULL,
  `email` text NOT NULL,
  `senha` text NOT NULL,
  `nivel` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela stock_control_db.venda
CREATE TABLE IF NOT EXISTS `venda` (
  `id_venda` int(11) NOT NULL AUTO_INCREMENT,
  `id_produto` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `data_da_venda` date DEFAULT NULL,
  PRIMARY KEY (`id_venda`),
  KEY `FK_id_produto_venda` (`id_produto`),
  KEY `FK_id_cliente_venda` (`id_cliente`),
  CONSTRAINT `FK_id_cliente_venda` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_id_produto_venda` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id_produto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para trigger stock_control_db.venda_after_insert
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `venda_after_insert` AFTER INSERT ON `venda` FOR EACH ROW BEGIN
	DECLARE produto_quantidade INT;

	-- Pegar a quantidade do livro na tabela livros
	SELECT quantidade INTO produto_quantidade
	FROM produto
	WHERE id_produto = NEW.id_produto;

	-- Verificar se há livros disponíveis para empréstimo
	IF produto_quantidade > 0 THEN
     	-- Atualizar a quantidade na tabela livros
     	UPDATE produto
     	SET quantidade = produto_quantidade - NEW.quantidade
   	WHERE id_produto = NEW.id_produto;
	ELSE
   	-- Se não houver livros disponíveis, você pode lidar com isso de acordo com a sua lógica de negócios
   	-- Por exemplo, gerar um erro ou realizar outra ação apropriada.
   	-- Aqui, estamos apenas lançando um aviso.
      SIGNAL SQLSTATE '45000'
      SET MESSAGE_TEXT = 'Não há produtos disponíveis para compra';
	END IF;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

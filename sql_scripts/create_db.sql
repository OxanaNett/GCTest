-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.5.23 - MySQL Community Server (GPL)
-- ОС Сервера:                   Win64
-- HeidiSQL Версия:              9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры базы данных yii2basic
CREATE DATABASE IF NOT EXISTS `yii2basic` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `yii2basic`;


-- Дамп структуры для таблица yii2basic.customer
CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(150) COLLATE utf8_bin NOT NULL,
  `reg_date` date NOT NULL,
  `phoneNumber` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `photo` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_customer_customer_status` (`status_id`),
  CONSTRAINT `FK_customer_customer_status` FOREIGN KEY (`status_id`) REFERENCES `customer_status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='клиент';

-- Дамп данных таблицы yii2basic.customer: ~4 rows (приблизительно)
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` (`id`, `Name`, `reg_date`, `phoneNumber`, `status_id`, `photo`) VALUES
	(1, 'Иванов Иван Иванович', '2016-08-28', '9612441005', 2, 'DefaultAvatar.jpg'),
	(2, 'Петров Петр Петрович', '2016-08-28', NULL, 2, 'DefaultAvatar.jpg'),
	(3, 'Сдоров Сидор Сидорович', '2016-08-28', '9612441007', 1, 'DefaultAvatar.jpg'),
	(4, 'Вениаминов Вениамин Вениаминович', '2016-08-28', '9206707859', 2, 'DefaultAvatar.jpg');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;


-- Дамп структуры для таблица yii2basic.customer_order
CREATE TABLE IF NOT EXISTS `customer_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `order_date` datetime DEFAULT NULL,
  `sum` decimal(6,0) NOT NULL DEFAULT '0',
  `customer_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_order_customer` (`customer_id`),
  CONSTRAINT `FK_order_customer` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='заказ';

-- Дамп данных таблицы yii2basic.customer_order: ~5 rows (приблизительно)
/*!40000 ALTER TABLE `customer_order` DISABLE KEYS */;
INSERT INTO `customer_order` (`id`, `number`, `order_date`, `sum`, `customer_id`) VALUES
	(6, '1000', '2016-08-28 13:42:16', 100, 2),
	(7, '1001', '2016-08-28 13:42:36', 150, 1),
	(8, '1003', '2016-08-28 16:33:54', 200, 3),
	(9, '1004', '2016-08-30 12:05:42', 250, 1),
	(10, '1005', '2016-09-01 10:17:59', 150, 4);
/*!40000 ALTER TABLE `customer_order` ENABLE KEYS */;


-- Дамп структуры для таблица yii2basic.customer_status
CREATE TABLE IF NOT EXISTS `customer_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Статус клиента';

-- Дамп данных таблицы yii2basic.customer_status: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `customer_status` DISABLE KEYS */;
INSERT INTO `customer_status` (`id`, `name`) VALUES
	(1, 'Постоянный покупатель\r\n'),
	(2, 'Новый клиент');
/*!40000 ALTER TABLE `customer_status` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

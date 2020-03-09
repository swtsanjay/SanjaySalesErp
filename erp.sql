-- Adminer 4.2.4 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP DATABASE IF EXISTS `erp`;
CREATE DATABASE `erp` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `erp`;

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `invoices`;
CREATE TABLE `invoices` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `client_id` int(10) NOT NULL,
  `created_by` int(10) NOT NULL,
  `type` enum('sale','purchase') NOT NULL,
  `party_id` int(10) NOT NULL,
  `invoice_number` varchar(100) NOT NULL,
  `total_amt` float(10,2) NOT NULL,
  `total_disc` float(10,2) DEFAULT NULL,
  `total_gst` float(10,2) DEFAULT NULL,
  `grand_total` float(10,2) DEFAULT NULL,
  `total_cost` float(10,2) NOT NULL,
  `paid_amt` float(10,2) NOT NULL,
  `status` enum('open','partial_paid','paid') NOT NULL,
  `notes` text DEFAULT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`client_id`),
  KEY `party_id` (`party_id`),
  CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `users` (`id`),
  CONSTRAINT `invoices_ibfk_2` FOREIGN KEY (`client_id`) REFERENCES `users` (`id`),
  CONSTRAINT `invoices_ibfk_3` FOREIGN KEY (`client_id`) REFERENCES `users` (`id`),
  CONSTRAINT `invoices_ibfk_4` FOREIGN KEY (`party_id`) REFERENCES `parties` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `invoice_items`;
CREATE TABLE `invoice_items` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(10) NOT NULL,
  `item_id` int(10) NOT NULL,
  `cost` float(10,2) NOT NULL,
  `qnty` int(10) NOT NULL,
  `rate` float(10,2) NOT NULL,
  `disc` float(10,2) DEFAULT NULL,
  `gst` float(10,2) DEFAULT NULL,
  `final_amt` float(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `invoice_id` (`invoice_id`),
  CONSTRAINT `invoice_items_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `items`;
CREATE TABLE `items` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `client_id` int(10) NOT NULL,
  `type` enum('product','service') NOT NULL,
  `name` varchar(200) NOT NULL,
  `item_code` varchar(200) NOT NULL,
  `uom` varchar(20) DEFAULT NULL,
  `unit_cost` float(10,2) NOT NULL,
  `sale_cost` float(10,2) NOT NULL,
  `dscrp` varchar(200) DEFAULT NULL,
  `gst` decimal(10,0) DEFAULT NULL,
  `status` enum('avl','not_avl') NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `client_id` (`client_id`),
  CONSTRAINT `items_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `parties`;
CREATE TABLE `parties` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `client_id` int(10) NOT NULL,
  `type` enum('customer','vendor') NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `receipts`;
CREATE TABLE `receipts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `receipt_number` varchar(200) NOT NULL,
  `client_id` int(10) NOT NULL,
  `party_id` int(10) NOT NULL,
  `amt` float(10,2) NOT NULL,
  `mode` enum('bank','cash','online') DEFAULT NULL,
  `type` enum('RECEIPT','PAYMENT') NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `client_id` (`client_id`),
  KEY `party_id` (`party_id`),
  CONSTRAINT `receipts_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `users` (`id`),
  CONSTRAINT `receipts_ibfk_2` FOREIGN KEY (`party_id`) REFERENCES `parties` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `receipt_items`;
CREATE TABLE `receipt_items` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `receipt_id` int(11) NOT NULL,
  `invoice_id` int(10) NOT NULL,
  `amt` float(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `receipt_id` (`receipt_id`),
  KEY `invoice_id` (`invoice_id`),
  CONSTRAINT `receipt_items_ibfk_1` FOREIGN KEY (`receipt_id`) REFERENCES `receipts` (`id`),
  CONSTRAINT `receipt_items_ibfk_2` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `client_id` int(10) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `type` enum('CLIENT','USER') NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`id`, `client_id`, `user_name`, `type`, `password`, `email`, `mobile`, `status`, `created`) VALUES
(1,	1,	'Test',	'CLIENT',	'test',	'test@test.com',	'345647198',	1,	'2020-01-16 12:06:20'),
(2,	1,	'Mohan',	'USER',	'Mohan',	'mohan@test.com',	'9875146895',	0,	'2020-01-20 21:56:19'),
(3,	1,	'Shyam',	'USER',	'shyam',	'shyam@test.com',	'8756489215',	0,	'2020-01-20 21:57:42'),
(4,	4,	'Admin2',	'CLIENT',	'admin',	'admin@test.com',	'5648976215',	0,	'2020-01-20 22:00:30'),
(5,	4,	'Hemant',	'USER',	'hemant',	'hemant@test.com',	'7589648956',	0,	'2020-01-20 22:01:25'),
(6,	4,	'Janardan',	'USER',	'janardan',	'janardan@test.com',	'8945697859',	0,	'2020-01-20 22:02:39');

-- 2020-03-03 02:32:10

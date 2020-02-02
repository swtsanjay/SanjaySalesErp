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

INSERT INTO `invoices` (`id`, `client_id`, `created_by`, `type`, `party_id`, `invoice_number`, `total_amt`, `total_disc`, `total_gst`, `grand_total`, `total_cost`, `paid_amt`, `status`, `notes`, `created`) VALUES
(53,	1,	1,	'sale',	2,	'INVOICE50',	1440.00,	20.00,	242.80,	1662.80,	1070.00,	1572.80,	'partial_paid',	'',	'2020-02-01 12:31:12'),
(54,	1,	1,	'sale',	4,	'INVOICE51',	5600.00,	180.00,	1213.00,	6633.00,	1510.00,	6633.00,	'paid',	'',	'2020-02-01 12:32:34'),
(62,	1,	1,	'sale',	1,	'INVOICE53',	1150.00,	0.00,	274.00,	1424.00,	850.00,	1424.00,	'paid',	'',	'2020-02-01 13:23:16'),
(63,	1,	1,	'sale',	2,	'INVOICE54',	550.00,	2.00,	0.00,	548.00,	450.00,	100.00,	'partial_paid',	'',	'2020-02-01 15:18:56'),
(65,	1,	1,	'purchase',	2,	'INVOICE56',	30000.00,	0.00,	3600.00,	33600.00,	250.00,	33510.00,	'partial_paid',	'',	'2020-02-02 16:34:32');

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

INSERT INTO `invoice_items` (`id`, `invoice_id`, `item_id`, `cost`, `qnty`, `rate`, `disc`, `gst`, `final_amt`) VALUES
(31,	53,	13,	600.00,	1,	850.00,	20.00,	238.00,	850.00),
(32,	53,	18,	20.00,	1,	40.00,	0.00,	4.80,	40.00),
(33,	53,	15,	450.00,	1,	550.00,	0.00,	0.00,	550.00),
(34,	54,	13,	600.00,	4,	850.00,	30.00,	952.00,	3400.00),
(35,	54,	17,	210.00,	3,	350.00,	40.00,	189.00,	1050.00),
(36,	54,	1,	250.00,	2,	300.00,	50.00,	72.00,	600.00),
(37,	54,	15,	450.00,	1,	550.00,	60.00,	0.00,	550.00),
(68,	62,	13,	600.00,	1,	850.00,	0.00,	238.00,	850.00),
(69,	62,	1,	250.00,	1,	300.00,	0.00,	36.00,	300.00),
(75,	63,	15,	450.00,	1,	550.00,	2.00,	0.00,	550.00),
(77,	65,	1,	250.00,	100,	300.00,	0.00,	3600.00,	30000.00);

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

INSERT INTO `items` (`id`, `client_id`, `type`, `name`, `item_code`, `uom`, `unit_cost`, `sale_cost`, `dscrp`, `gst`, `status`, `created`, `updated`) VALUES
(1,	1,	'product',	'Dabur Chyawanprash 1Kg',	'SDERT67543',	NULL,	250.00,	300.00,	'Chyawanprash Khaye Sehat Badhaye',	12,	'avl',	'0000-00-00 00:00:00',	'0000-00-00 00:00:00'),
(5,	4,	'product',	'Humdard Badam Sirin Oil 200g',	'GTRRWE726',	'G',	160.00,	200.00,	NULL,	12,	'avl',	'0000-00-00 00:00:00',	'0000-00-00 00:00:00'),
(6,	4,	'product',	'All Out',	'TREQU8786',	NULL,	60.00,	85.00,	NULL,	18,	'avl',	'2020-01-20 22:30:59',	'0000-00-00 00:00:00'),
(7,	4,	'product',	'RICHO TONER 201	',	'REX ROTERY	',	'PC',	200.00,	365.00,	NULL,	28,	'avl',	'2020-01-20 22:43:03',	'0000-00-00 00:00:00'),
(8,	4,	'product',	'CD LABEL STICKER	',	'LABEL',	'PCS',	50.00,	68.00,	NULL,	28,	'avl',	'2020-01-20 22:44:03',	'0000-00-00 00:00:00'),
(13,	1,	'product',	'MENITHOL',	'MENITHOL663',	'PC',	600.00,	850.00,	'',	28,	'avl',	'2020-01-22 07:45:12',	'2020-01-22 12:24:48'),
(15,	1,	'service',	'Home Delivery',	'HOMEDELIVERY',	'',	450.00,	550.00,	'',	0,	'avl',	'2020-01-22 07:50:27',	'2020-01-22 12:24:19'),
(17,	1,	'product',	'Sky Bag',	'SKYBAGS123',	'PC',	210.00,	350.00,	'',	18,	'avl',	'2020-01-22 12:23:22',	'2020-01-22 12:41:00'),
(18,	1,	'product',	'Tharkur Prasad Calendar',	'THAKURCAL',	'PC',	20.00,	40.00,	'',	12,	'not_avl',	'2020-01-22 13:03:18',	'2020-01-23 13:54:17'),
(20,	4,	'product',	'reimb_requests',	'SKYBAGS123',	'PC',	800.00,	1200.00,	'',	5,	'avl',	'2020-01-23 14:06:07',	'2020-01-23 14:06:21'),
(21,	1,	'product',	'Sengdana',	'SENGDANA123',	'PC',	120.00,	250.00,	'',	5,	'avl',	'2020-01-25 08:35:06',	'2020-01-25 08:35:06'),
(22,	1,	'product',	'yuyy',	'YUYY123',	'',	450.00,	600.00,	'',	12,	'avl',	'2020-01-25 08:36:53',	'2020-01-25 08:36:53');

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

INSERT INTO `parties` (`id`, `client_id`, `type`, `name`, `mobile`, `email`, `created`) VALUES
(1,	1,	'customer',	'Vinit Gupta',	'5639868989',	'',	'2020-01-19 15:27:00'),
(2,	1,	'customer',	'Radhe Shyam',	'986475321',	'test@test.com',	'2020-01-19 15:27:39'),
(3,	1,	'vendor',	'Mohan Das',	'7859462186',	'',	'2020-01-19 15:28:16'),
(4,	1,	'vendor',	'Ankush Jha',	'8649753196',	'',	'2020-01-19 15:29:02'),
(5,	4,	'customer',	'Sanjay Kumar',	'8826648669',	'sanjay@test.com',	'2020-01-21 21:03:34'),
(6,	4,	'vendor',	'Toni',	'9876985644',	'toni@test.com',	'2020-01-21 21:04:04'),
(7,	4,	'customer',	'Akash Yadav',	'9315164419',	'akash@test.com',	'2020-01-21 21:04:49'),
(12,	1,	'customer',	'reimb_requests',	'78',	'',	'2020-01-23 17:31:05'),
(14,	1,	'customer',	'ABC',	'786485123',	'abc@test.com',	'2020-01-23 17:31:50'),
(15,	1,	'customer',	'ABC',	'786485123',	'abc@test.com',	'2020-01-23 17:32:13'),
(16,	1,	'customer',	'reimb_requests',	'787111',	'',	'2020-01-23 17:33:00'),
(17,	1,	'customer',	'ABC',	'7878',	'ABC@TEST.COM',	'2020-01-23 17:33:48'),
(18,	4,	'customer',	'Sanjay',	'788884545',	'',	'2020-01-23 18:36:40'),
(19,	1,	'customer',	'reimb_requests',	'78888',	'',	'2020-01-25 12:12:35'),
(20,	1,	'customer',	'Sanjeev',	'8975648325',	'',	'2020-01-25 12:44:22'),
(21,	1,	'customer',	'Mukesh',	'7864859315',	'',	'2020-01-25 12:45:20'),
(22,	1,	'customer',	'Bittu',	'8860634853',	'',	'2020-01-25 13:03:29'),
(23,	1,	'customer',	'Vijay',	'8676925516',	'',	'2020-01-25 13:06:05'),
(24,	1,	'customer',	'Ram',	'856545',	'',	'2020-01-25 13:07:36');

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

INSERT INTO `receipts` (`id`, `receipt_number`, `client_id`, `party_id`, `amt`, `mode`, `type`, `created`) VALUES
(25,	'R0025',	1,	2,	200.00,	NULL,	'RECEIPT',	'2020-02-02 12:02:42'),
(26,	'R0026',	1,	4,	1000.00,	NULL,	'RECEIPT',	'2020-02-02 12:03:32'),
(27,	'R0027',	1,	4,	5633.00,	NULL,	'RECEIPT',	'2020-02-02 12:04:13'),
(28,	'R0028',	1,	1,	-1.00,	NULL,	'RECEIPT',	'2020-02-02 12:04:34'),
(30,	'R0030',	1,	1,	1425.00,	NULL,	'RECEIPT',	'2020-02-02 12:06:31'),
(31,	'R0031',	1,	2,	1563.00,	NULL,	'RECEIPT',	'2020-02-02 12:59:45'),
(32,	'R0032',	1,	2,	-0.20,	NULL,	'RECEIPT',	'2020-02-02 13:00:03'),
(33,	'R0033',	1,	2,	-400.00,	NULL,	'RECEIPT',	'2020-02-02 13:00:35'),
(34,	'R0034',	1,	2,	300.00,	NULL,	'RECEIPT',	'2020-02-02 20:02:43'),
(35,	'R0035',	1,	2,	33000.00,	NULL,	'PAYMENT',	'2020-02-02 20:03:07'),
(36,	'R0036',	1,	2,	500.00,	NULL,	'PAYMENT',	'2020-02-02 22:44:11'),
(37,	'R0037',	1,	2,	10.00,	NULL,	'RECEIPT',	'2020-02-02 22:47:17'),
(38,	'R0038',	1,	2,	10.00,	NULL,	'PAYMENT',	'2020-02-02 22:48:39');

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

INSERT INTO `receipt_items` (`id`, `receipt_id`, `invoice_id`, `amt`) VALUES
(27,	25,	53,	100.00),
(28,	25,	63,	100.00),
(29,	26,	54,	1000.00),
(30,	27,	54,	5633.00),
(31,	28,	62,	-1.00),
(33,	30,	62,	1425.00),
(34,	31,	53,	1563.00),
(35,	32,	53,	-0.20),
(36,	33,	53,	-400.00),
(37,	34,	53,	300.00),
(38,	35,	65,	33000.00),
(39,	36,	65,	500.00),
(40,	37,	53,	10.00),
(41,	38,	65,	10.00);

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

-- 2020-02-02 18:22:13

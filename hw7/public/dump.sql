-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.6.38-log - MySQL Community Server (GPL)
-- Операционная система:         Win64
-- HeidiSQL Версия:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Дамп структуры базы данных gb-php
DROP DATABASE IF EXISTS `gb-php`;
CREATE DATABASE IF NOT EXISTS `gb-php` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `gb-php`;

-- Дамп структуры для таблица gb-php.s_basket
DROP TABLE IF EXISTS `s_basket`;
CREATE TABLE IF NOT EXISTS `s_basket` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) NOT NULL,
  `session_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `date_insert` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `products` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы gb-php.s_basket: ~1 rows (приблизительно)
DELETE FROM `s_basket`;
/*!40000 ALTER TABLE `s_basket` DISABLE KEYS */;
INSERT INTO `s_basket` (`id`, `user_id`, `session_id`, `date_insert`, `date_update`, `products`) VALUES
	(2, 5, 'mjn71rb4er7sjjov9258ncuob6', '2018-05-09 11:17:20', '2018-05-09 12:59:14', '{"1":{"product_id":1,"quantity":1,"price":100},"2":{"product_id":2,"quantity":1,"price":200},"10":{"product_id":10,"quantity":1,"price":200}}');
/*!40000 ALTER TABLE `s_basket` ENABLE KEYS */;

-- Дамп структуры для таблица gb-php.s_catalog_category
DROP TABLE IF EXISTS `s_catalog_category`;
CREATE TABLE IF NOT EXISTS `s_catalog_category` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `parent_id` int(255) DEFAULT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='\r\n';

-- Дамп данных таблицы gb-php.s_catalog_category: ~10 rows (приблизительно)
DELETE FROM `s_catalog_category`;
/*!40000 ALTER TABLE `s_catalog_category` DISABLE KEYS */;
INSERT INTO `s_catalog_category` (`id`, `parent_id`, `name`, `code`) VALUES
	(1, 0, 'Man', 'man'),
	(2, 0, 'Woman', 'woman'),
	(3, 0, 'Kid', 'kid'),
	(4, 0, 'Accoseriese', 'accoseriese'),
	(5, 1, 'Accessories', 'accessories'),
	(6, 1, 'Bags', 'bags'),
	(7, 1, 'Denim', 'denim'),
	(8, 1, 'Hoodies & Sweatshirts', 'hoodies-and-sweatshirts'),
	(9, 1, 'Jackets & Coats', 'jakets-and-coats'),
	(10, 1, 'Pants', 'pants');
/*!40000 ALTER TABLE `s_catalog_category` ENABLE KEYS */;

-- Дамп структуры для таблица gb-php.s_catalog_products
DROP TABLE IF EXISTS `s_catalog_products`;
CREATE TABLE IF NOT EXISTS `s_catalog_products` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `category_id` int(255) DEFAULT NULL,
  `date_insert` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_small` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_slider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `size_id` int(11) DEFAULT NULL,
  `color_id` int(255) DEFAULT '0',
  `status` int(255) DEFAULT NULL,
  `view` int(255) DEFAULT NULL,
  `count` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы gb-php.s_catalog_products: ~15 rows (приблизительно)
DELETE FROM `s_catalog_products`;
/*!40000 ALTER TABLE `s_catalog_products` DISABLE KEYS */;
INSERT INTO `s_catalog_products` (`id`, `category_id`, `date_insert`, `date_update`, `name`, `description`, `image`, `image_small`, `image_slider`, `price`, `size_id`, `color_id`, `status`, `view`, `count`) VALUES
	(1, 1, '2018-04-29 21:47:18', '2018-04-29 21:48:02', 'Футболка', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services. Completely visualize parallel core competencies rather than exceptional portals.', '/images/product1.jpg', '/images/product-cart-small.jpg', '/images/productslide1.jpg', 200, 5, 1, 1, 0, 10),
	(2, 1, '2018-04-29 21:47:18', '2018-04-29 21:48:02', 'футболка', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services. Completely visualize parallel core competencies rather than exceptional portals.', '/images/product1.jpg', '/images/product-cart-small.jpg', '/images/productslide1.jpg', 250, 5, 2, 1, 0, 10),
	(3, 1, '2018-04-29 21:47:18', '2018-04-29 21:48:02', 'футболка', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services. Completely visualize parallel core competencies rather than exceptional portals.', '/images/product1.jpg', '/images/product-cart-small.jpg', '/images/productslide1.jpg', 250, 5, 2, 1, 0, 10),
	(4, 1, '2018-04-29 21:47:18', '2018-04-29 21:48:02', 'футболка', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services. Completely visualize parallel core competencies rather than exceptional portals.', '/images/product1.jpg', '/images/product-cart-small.jpg', '/images/productslide1.jpg', 250, 5, 2, 1, 0, 10),
	(5, 1, '2018-04-29 21:47:18', '2018-04-29 21:48:02', 'футболка', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services. Completely visualize parallel core competencies rather than exceptional portals.', '/images/product1.jpg', '/images/product-cart-small.jpg', '/images/productslide1.jpg', 250, 5, 2, 1, 0, 10),
	(6, 1, '2018-04-29 21:47:18', '2018-04-29 21:48:02', 'футболка', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services. Completely visualize parallel core competencies rather than exceptional portals.', '/images/product1.jpg', '/images/product-cart-small.jpg', '/images/productslide1.jpg', 250, 4, 2, 2, 0, 10),
	(7, 1, '2018-04-29 21:47:18', '2018-04-29 21:48:02', 'футболка', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services. Completely visualize parallel core competencies rather than exceptional portals.', '/images/product1.jpg', '/images/product-cart-small.jpg', '/images/productslide1.jpg', 250, 1, 2, 2, 0, 10),
	(8, 1, '2018-04-29 21:47:18', '2018-04-29 21:48:02', 'футболка', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services. Completely visualize parallel core competencies rather than exceptional portals.', '/images/product1.jpg', '/images/product-cart-small.jpg', '/images/productslide1.jpg', 250, 2, 2, 2, 0, 10),
	(9, 1, '2018-04-29 21:47:18', '2018-04-29 21:48:02', 'футболка', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services. Completely visualize parallel core competencies rather than exceptional portals.', '/images/product1.jpg', '/images/product-cart-small.jpg', '/images/productslide1.jpg', 250, 3, 2, 2, 0, 10),
	(10, 1, '2018-04-29 21:47:18', '2018-04-29 21:48:02', 'футболка', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services. Completely visualize parallel core competencies rather than exceptional portals.', '/images/product1.jpg', '/images/product-cart-small.jpg', '/images/productslide1.jpg', 250, 6, 2, 2, 0, 10),
	(11, 1, '2018-04-29 21:47:18', '2018-04-29 21:48:02', 'футболка', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services. Completely visualize parallel core competencies rather than exceptional portals.', '/images/product1.jpg', '/images/product-cart-small.jpg', '/images/productslide1.jpg', 250, 7, 2, 0, 0, 10),
	(12, 1, '2018-04-29 21:47:18', '2018-04-29 21:48:02', 'футболка', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services. Completely visualize parallel core competencies rather than exceptional portals.', '/images/product1.jpg', '/images/product-cart-small.jpg', '/images/productslide1.jpg', 250, 3, 2, 0, 0, 10),
	(13, 1, '2018-04-29 21:47:18', '2018-04-29 21:48:02', 'футболка', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services. Completely visualize parallel core competencies rather than exceptional portals.', '/images/product1.jpg', '/images/product-cart-small.jpg', '/images/productslide1.jpg', 250, 4, 2, 0, 0, 10),
	(14, 1, '2018-04-29 21:47:18', '2018-04-29 21:48:02', 'футболка', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services. Completely visualize parallel core competencies rather than exceptional portals.', '/images/product1.jpg', '/images/product-cart-small.jpg', '/images/productslide1.jpg', 250, 4, 2, 0, 0, 10),
	(15, 1, '2018-04-29 21:47:18', '2018-04-29 21:48:02', 'футболка', 'Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services. Completely visualize parallel core competencies rather than exceptional portals.', '/images/product1.jpg', '/images/product-cart-small.jpg', '/images/productslide1.jpg', 250, 4, 2, 0, 0, 10);
/*!40000 ALTER TABLE `s_catalog_products` ENABLE KEYS */;

-- Дамп структуры для таблица gb-php.s_catalog_product_color
DROP TABLE IF EXISTS `s_catalog_product_color`;
CREATE TABLE IF NOT EXISTS `s_catalog_product_color` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value_hex` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value_rgb` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы gb-php.s_catalog_product_color: ~2 rows (приблизительно)
DELETE FROM `s_catalog_product_color`;
/*!40000 ALTER TABLE `s_catalog_product_color` DISABLE KEYS */;
INSERT INTO `s_catalog_product_color` (`id`, `name`, `value_hex`, `value_rgb`) VALUES
	(1, 'Black', '#000000', 'rgba(0, 0, 0, 1);'),
	(2, 'White', '#FFFFFF', 'rgba(255, 255, 255, 1);');
/*!40000 ALTER TABLE `s_catalog_product_color` ENABLE KEYS */;

-- Дамп структуры для таблица gb-php.s_catalog_product_size
DROP TABLE IF EXISTS `s_catalog_product_size`;
CREATE TABLE IF NOT EXISTS `s_catalog_product_size` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `value` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы gb-php.s_catalog_product_size: ~7 rows (приблизительно)
DELETE FROM `s_catalog_product_size`;
/*!40000 ALTER TABLE `s_catalog_product_size` DISABLE KEYS */;
INSERT INTO `s_catalog_product_size` (`id`, `value`) VALUES
	(1, 'XS'),
	(2, 'S'),
	(3, 'M'),
	(4, 'L'),
	(5, 'XL'),
	(6, 'XXL'),
	(7, 'XXXL');
/*!40000 ALTER TABLE `s_catalog_product_size` ENABLE KEYS */;

-- Дамп структуры для таблица gb-php.s_delivery_method
DROP TABLE IF EXISTS `s_delivery_method`;
CREATE TABLE IF NOT EXISTS `s_delivery_method` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы gb-php.s_delivery_method: ~0 rows (приблизительно)
DELETE FROM `s_delivery_method`;
/*!40000 ALTER TABLE `s_delivery_method` DISABLE KEYS */;
/*!40000 ALTER TABLE `s_delivery_method` ENABLE KEYS */;

-- Дамп структуры для таблица gb-php.s_delivery_status
DROP TABLE IF EXISTS `s_delivery_status`;
CREATE TABLE IF NOT EXISTS `s_delivery_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы gb-php.s_delivery_status: ~0 rows (приблизительно)
DELETE FROM `s_delivery_status`;
/*!40000 ALTER TABLE `s_delivery_status` DISABLE KEYS */;
/*!40000 ALTER TABLE `s_delivery_status` ENABLE KEYS */;

-- Дамп структуры для таблица gb-php.s_orders
DROP TABLE IF EXISTS `s_orders`;
CREATE TABLE IF NOT EXISTS `s_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `basket_id` int(11) NOT NULL,
  `order_status` int(11) NOT NULL,
  `total_sum` float NOT NULL,
  `delivery_method` int(11) NOT NULL,
  `delivery_status` int(11) NOT NULL,
  `delivery_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pay_method` int(11) NOT NULL,
  `pay_status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `basket_id` (`basket_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы gb-php.s_orders: ~0 rows (приблизительно)
DELETE FROM `s_orders`;
/*!40000 ALTER TABLE `s_orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `s_orders` ENABLE KEYS */;

-- Дамп структуры для таблица gb-php.s_order_status
DROP TABLE IF EXISTS `s_order_status`;
CREATE TABLE IF NOT EXISTS `s_order_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы gb-php.s_order_status: ~0 rows (приблизительно)
DELETE FROM `s_order_status`;
/*!40000 ALTER TABLE `s_order_status` DISABLE KEYS */;
/*!40000 ALTER TABLE `s_order_status` ENABLE KEYS */;

-- Дамп структуры для таблица gb-php.s_pay_method
DROP TABLE IF EXISTS `s_pay_method`;
CREATE TABLE IF NOT EXISTS `s_pay_method` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы gb-php.s_pay_method: ~0 rows (приблизительно)
DELETE FROM `s_pay_method`;
/*!40000 ALTER TABLE `s_pay_method` DISABLE KEYS */;
/*!40000 ALTER TABLE `s_pay_method` ENABLE KEYS */;

-- Дамп структуры для таблица gb-php.s_pay_status
DROP TABLE IF EXISTS `s_pay_status`;
CREATE TABLE IF NOT EXISTS `s_pay_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы gb-php.s_pay_status: ~0 rows (приблизительно)
DELETE FROM `s_pay_status`;
/*!40000 ALTER TABLE `s_pay_status` DISABLE KEYS */;
/*!40000 ALTER TABLE `s_pay_status` ENABLE KEYS */;

-- Дамп структуры для таблица gb-php.s_reviews
DROP TABLE IF EXISTS `s_reviews`;
CREATE TABLE IF NOT EXISTS `s_reviews` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `date_insert` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `text` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы gb-php.s_reviews: ~3 rows (приблизительно)
DELETE FROM `s_reviews`;
/*!40000 ALTER TABLE `s_reviews` DISABLE KEYS */;
INSERT INTO `s_reviews` (`id`, `user_id`, `product_id`, `date_insert`, `name`, `text`) VALUES
	(1, 3, 0, '2018-04-29 21:50:43', 'Иван Иванов', 'Vestibulum quis porttitor dui! Quisque viverra nun'),
	(2, 3, 0, '2018-04-29 21:50:43', 'Иван Иванов', 'Vestibulum quis porttitor dui! Quisque viverra nun'),
	(3, 0, 0, '2018-04-29 21:50:43', 'Пётр Петров', 'Vestibulum quis porttitor dui! Quisque viverra nun');
/*!40000 ALTER TABLE `s_reviews` ENABLE KEYS */;

-- Дамп структуры для таблица gb-php.s_subscribe
DROP TABLE IF EXISTS `s_subscribe`;
CREATE TABLE IF NOT EXISTS `s_subscribe` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_insert` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы gb-php.s_subscribe: ~2 rows (приблизительно)
DELETE FROM `s_subscribe`;
/*!40000 ALTER TABLE `s_subscribe` DISABLE KEYS */;
INSERT INTO `s_subscribe` (`id`, `email`, `date_insert`) VALUES
	(1, '123@123.ru', '2018-04-29 21:50:21'),
	(2, '123123@123.ru', '2018-04-29 21:50:21');
/*!40000 ALTER TABLE `s_subscribe` ENABLE KEYS */;

-- Дамп структуры для таблица gb-php.s_users
DROP TABLE IF EXISTS `s_users`;
CREATE TABLE IF NOT EXISTS `s_users` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `date_insert` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `login` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `f_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `l_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы gb-php.s_users: ~3 rows (приблизительно)
DELETE FROM `s_users`;
/*!40000 ALTER TABLE `s_users` DISABLE KEYS */;
INSERT INTO `s_users` (`id`, `date_insert`, `date_update`, `login`, `password`, `email`, `f_name`, `l_name`) VALUES
	(3, '2018-03-11 16:12:25', '2018-04-29 21:49:30', 'test_update', '$2y$10$AyeQcmxfth1Jza6T/b4UqOeMB47Gn0jKwVgHzWSLRiPReVDQJldsK', 'test@test.ru', 'Vasa', 'test'),
	(4, '2018-04-25 14:00:08', '2018-04-29 21:49:30', 'test2', '$2y$10$AyeQcmxfth1Jza6T/b4UqOeMB47Gn0jKwVgHzWSLRiPReVDQJldsK', 'test2@test.ru', 'test2', 'test'),
	(5, '2018-04-29 19:16:09', '2018-05-01 16:46:48', 'test', '$2y$10$11NhWaCPM8zAPSKt/Ch88ebECSz8cIlV69ZPlxYfGSaD08MRxWFbm', 'test3@test.ru', 'Vasya', 'Pupkin');
/*!40000 ALTER TABLE `s_users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

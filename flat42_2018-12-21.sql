# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.6.41)
# Datenbank: flat42
# Erstellt am: 2018-12-21 07:11:28 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Export von Tabelle carts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `carts`;

CREATE TABLE `carts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `flat_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uniq_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `carts` WRITE;
/*!40000 ALTER TABLE `carts` DISABLE KEYS */;

INSERT INTO `carts` (`id`, `user_id`, `buyer_id`, `flat_id`, `name`, `quantity`, `price`, `uniq_id`, `created_at`, `updated_at`)
VALUES
	(7,1,1,1,'Nutella',1,'3','5c02b5515501c','2018-12-01 16:22:41','2018-12-01 16:22:41'),
	(8,1,1,1,'Reis',2,'6','5c02b5515501c','2018-12-01 16:22:41','2018-12-01 16:22:41'),
	(10,1,1,1,'asdf',3,'5.94','5c03c3121475e','2018-12-02 11:33:38','2018-12-02 16:20:27'),
	(11,1,1,1,'asdf',3,'5.94','5c03c3121475e','2018-12-02 11:33:38','2018-12-02 16:20:27'),
	(12,1,1,1,'Reis',2,'4','5c03c3121475e','2018-12-01 16:22:41','2018-12-02 16:53:17'),
	(13,1,1,1,'Reis',2,'4.92','5c03c3121475e','2018-12-01 16:22:41','2018-12-02 17:37:11'),
	(14,1,1,1,'halllo',2,'4','5c041d193a379','2018-12-02 17:57:45','2018-12-04 10:19:12'),
	(17,1,1,1,'honig',1,'4','5c0657712d5f1','2018-12-04 10:31:13','2018-12-04 10:32:30'),
	(18,1,1,1,'eier',4,'3','5c06583fda584','2018-12-04 10:34:39','2018-12-04 10:35:42'),
	(19,1,1,1,'honig',1,'2','5c06583fda584','2018-12-04 10:34:39','2018-12-04 10:35:43'),
	(20,1,1,1,'milch',1,'1','5c06583fda584','2018-12-04 10:34:39','2018-12-04 10:35:43'),
	(21,1,1,1,'honig',1,'4','5c0658a02ee32','2018-12-04 10:36:16','2018-12-04 10:37:11'),
	(22,1,1,1,'milch',3,'4','5c0658a02ee32','2018-12-04 10:36:16','2018-12-04 10:37:10'),
	(23,1,1,1,'eier',5,'4','5c0658a02ee32','2018-12-04 10:36:16','2018-12-04 10:37:10'),
	(24,1,1,1,'asdf',2,'3','5c0658e01eab8','2018-12-04 10:37:20','2018-12-04 10:37:30'),
	(25,1,1,1,'asdf',3,'3','5c0658e01eab8','2018-12-04 10:37:20','2018-12-04 10:37:31'),
	(26,1,1,1,'honig',1,'4','5c06591f9f928','2018-12-04 10:38:23','2018-12-04 11:11:27'),
	(27,1,1,1,'eier',1,'5','5c06613243e50','2018-12-04 11:12:50','2018-12-15 11:08:12'),
	(28,1,1,1,'asdf',3,'76','5c14e0c886a5e','2018-12-15 11:08:56','2018-12-15 14:45:42'),
	(29,1,1,1,'kajsdlkf',3,'67','5c14e0c886a5e','2018-12-15 11:08:56','2018-12-15 14:45:44'),
	(30,1,1,1,'apfel',8,'0','5c1c8df2d0c4d','2018-12-21 06:53:38','2018-12-21 06:54:16'),
	(31,1,1,1,'hzh',2,NULL,'5c1c8df2d0c4d','2018-12-21 06:53:38','2018-12-21 06:53:38');

/*!40000 ALTER TABLE `carts` ENABLE KEYS */;
UNLOCK TABLES;


# Export von Tabelle cleaning_periods
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cleaning_periods`;

CREATE TABLE `cleaning_periods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `cleaning_periods` WRITE;
/*!40000 ALTER TABLE `cleaning_periods` DISABLE KEYS */;

INSERT INTO `cleaning_periods` (`id`, `name`)
VALUES
	(1,'Täglich'),
	(2,'Wöchentlich'),
	(3,'Monatlich'),
	(4,'Jährlich');

/*!40000 ALTER TABLE `cleaning_periods` ENABLE KEYS */;
UNLOCK TABLES;


# Export von Tabelle cleanings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cleanings`;

CREATE TABLE `cleanings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `flat_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `period_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `cleanings` WRITE;
/*!40000 ALTER TABLE `cleanings` DISABLE KEYS */;

INSERT INTO `cleanings` (`id`, `flat_id`, `period_id`, `title`, `created_at`, `updated_at`)
VALUES
	(18,'1','1','endlich geht der scheiss auch !','2018-12-09 21:30:04','2018-12-09 21:30:04'),
	(19,'1','2','herd putzen','2018-12-09 21:30:44','2018-12-09 21:30:44'),
	(20,'1','2','hihi','2018-12-09 21:38:45','2018-12-09 21:38:45'),
	(21,'1','3','huhu','2018-12-09 21:38:54','2018-12-09 21:38:54'),
	(22,'1','4','höhöh','2018-12-09 21:39:01','2018-12-09 21:39:01'),
	(23,'1','1','herd putzen','2018-12-09 21:42:33','2018-12-09 21:42:33'),
	(24,'1','1','lkajsdflkjasdlfkjasdlkfjasldkfasldkjf','2018-12-11 09:47:52','2018-12-11 09:47:52'),
	(25,'1','2','hallo das ist ein test','2018-12-11 13:39:40','2018-12-11 13:39:40'),
	(26,'1','3','huhukhakshjdfkj','2018-12-11 13:40:34','2018-12-11 13:40:34'),
	(27,'1','3','lkasdflkajsdflkajsdlfkjasldjfaklsjflkajsdfglkjasdlkfasdkf','2018-12-11 13:41:00','2018-12-11 13:41:00');

/*!40000 ALTER TABLE `cleanings` ENABLE KEYS */;
UNLOCK TABLES;


# Export von Tabelle events
# ------------------------------------------------------------

DROP TABLE IF EXISTS `events`;

CREATE TABLE `events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `flat_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;

INSERT INTO `events` (`id`, `flat_id`, `user_id`, `updated_user_id`, `deleted_by`, `title`, `body`, `date`, `deleted`, `created_at`, `updated_at`)
VALUES
	(4,'1','1',NULL,NULL,'foobar','bar','2018-12-20',0,'2018-12-16 15:53:01','2018-12-20 10:09:30'),
	(5,'1','1',NULL,NULL,'another title','another body','2019-01-04',0,'2018-12-16 15:56:41','2018-12-20 11:25:58'),
	(6,'1','1',NULL,'1','huhu das ist ein update','some body','2018-12-31',1,'2018-12-18 12:35:13','2018-12-20 15:05:29'),
	(7,'1','1',NULL,'1','asdfasdfasd','asdfasdfasdf','2019-01-06',1,'2018-12-20 10:36:07','2018-12-20 11:12:00'),
	(8,'1','1',NULL,'3','asdfasdfa','eddddddd','2019-02-10',1,'2018-12-20 10:36:38','2018-12-20 11:17:07'),
	(9,'1','1',NULL,'3','some title','asdfasdfasd','2018-12-28',1,'2018-12-20 10:46:55','2018-12-20 11:09:17'),
	(10,'1','1',NULL,'1','asdasdf','asdasdf','2018-12-21',1,'2018-12-20 14:14:37','2018-12-20 14:14:39'),
	(11,'1','1',NULL,NULL,'asdkjhgasd','aksdjhgahsd','2018-12-20',0,'2018-12-20 15:08:16','2018-12-20 15:08:16'),
	(12,'1','1',NULL,'1','askdjgahsd','as,djhgasd','2018-12-21',1,'2018-12-20 15:08:42','2018-12-20 15:08:54'),
	(13,'1','1',NULL,'1','asdasd','asdasd','2018-12-21',1,'2018-12-20 15:09:24','2018-12-20 15:09:28'),
	(14,'1','1',NULL,'1','asdkjhgasd','asdasd','2018-12-21',1,'2018-12-20 15:10:23','2018-12-20 15:10:25'),
	(15,'1','1',NULL,NULL,'todays event','some body','2018-12-21',0,'2018-12-21 06:55:46','2018-12-21 06:55:46');

/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;


# Export von Tabelle flats
# ------------------------------------------------------------

DROP TABLE IF EXISTS `flats`;

CREATE TABLE `flats` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `flat_token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `flats` WRITE;
/*!40000 ALTER TABLE `flats` DISABLE KEYS */;

INSERT INTO `flats` (`id`, `flat_token`, `name`, `created_at`, `updated_at`)
VALUES
	(1,'asd','Test Flat','2018-12-07 08:08:17','2018-12-07 08:08:17');

/*!40000 ALTER TABLE `flats` ENABLE KEYS */;
UNLOCK TABLES;


# Export von Tabelle grocery_lists
# ------------------------------------------------------------

DROP TABLE IF EXISTS `grocery_lists`;

CREATE TABLE `grocery_lists` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `done` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flat_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uniq_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `grocery_lists` WRITE;
/*!40000 ALTER TABLE `grocery_lists` DISABLE KEYS */;

INSERT INTO `grocery_lists` (`id`, `done`, `user_id`, `flat_id`, `date`, `uniq_id`, `created_at`, `updated_at`)
VALUES
	(1,1,'1','1','2018-12-02 11:59:07','5c02b5515501c','2018-12-02 11:59:07','2018-12-02 11:59:07'),
	(2,1,'1','1','2018-12-02 11:33:38','5c03c3121475e','2018-12-02 11:33:38','2018-12-02 17:54:40'),
	(3,1,'1','1','2018-12-02 17:57:45','5c041d193a379','2018-12-02 17:57:45','2018-12-04 10:30:50'),
	(5,1,'1','1','2018-12-04 10:31:13','5c0657712d5f1','2018-12-04 10:31:13','2018-12-04 10:32:33'),
	(6,1,'1','1','2018-12-04 10:34:39','5c06583fda584','2018-12-04 10:34:39','2018-12-04 10:35:44'),
	(7,1,'1','1','2018-12-04 10:36:16','5c0658a02ee32','2018-12-04 10:36:16','2018-12-04 10:37:12'),
	(8,1,'1','1','2018-12-04 10:37:20','5c0658e01eab8','2018-12-04 10:37:20','2018-12-04 10:37:33'),
	(9,1,'1','1','2018-12-04 10:38:23','5c06591f9f928','2018-12-04 10:38:23','2018-12-04 11:11:29'),
	(10,1,'1','1','2018-12-04 11:12:50','5c06613243e50','2018-12-04 11:12:50','2018-12-15 11:08:49'),
	(11,1,'1','1','2018-12-15 11:08:56','5c14e0c886a5e','2018-12-15 11:08:56','2018-12-15 14:45:52'),
	(12,0,'1','1','2018-12-21 06:53:38','5c1c8df2d0c4d','2018-12-21 06:53:38','2018-12-21 06:53:38');

/*!40000 ALTER TABLE `grocery_lists` ENABLE KEYS */;
UNLOCK TABLES;


# Export von Tabelle items
# ------------------------------------------------------------

DROP TABLE IF EXISTS `items`;

CREATE TABLE `items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `flat_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;

INSERT INTO `items` (`id`, `user_id`, `flat_id`, `name`, `quantity`, `created_at`, `updated_at`)
VALUES
	(24,1,1,'apfel',1,'2018-12-21 07:10:43','2018-12-21 07:10:43'),
	(25,1,1,'milch',1,'2018-12-21 07:10:53','2018-12-21 07:10:53');

/*!40000 ALTER TABLE `items` ENABLE KEYS */;
UNLOCK TABLES;


# Export von Tabelle migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(12,'2014_10_12_000000_create_users_table',1),
	(13,'2014_10_12_100000_create_password_resets_table',1),
	(14,'2018_10_27_085618_create_posts_table',1),
	(15,'2018_10_28_174835_create_news_table',1),
	(16,'2018_10_28_182959_create_flats_table',1),
	(17,'2018_11_03_132143_create_items_table',1),
	(20,'2018_11_08_135702_create_welcomes_table',1),
	(21,'2018_11_22_101439_create_news_comments_table',1),
	(27,'2018_11_29_074047_create_carts_table',4),
	(29,'2018_11_29_150311_create_grocery_lists_table',5),
	(41,'2018_12_04_085456_create_cleanings_table',6),
	(45,'2018_12_04_130343_create_cleaning_days_table',7),
	(46,'2018_12_04_130517_create_cleaning_periods_table',7),
	(47,'2018_12_04_131221_create_cleaning_rooms_table',8),
	(53,'2016_06_01_000001_create_oauth_auth_codes_table',9),
	(54,'2016_06_01_000002_create_oauth_access_tokens_table',9),
	(55,'2016_06_01_000003_create_oauth_refresh_tokens_table',9),
	(56,'2016_06_01_000004_create_oauth_clients_table',9),
	(57,'2016_06_01_000005_create_oauth_personal_access_clients_table',9),
	(59,'2018_11_04_161235_create_events_table',10);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Export von Tabelle news
# ------------------------------------------------------------

DROP TABLE IF EXISTS `news`;

CREATE TABLE `news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `flat_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;

INSERT INTO `news` (`id`, `flat_id`, `user_id`, `title`, `created_at`, `updated_at`)
VALUES
	(10,1,1,'new test','2018-11-27 05:57:55','2018-11-27 05:57:55'),
	(17,1,1,'hallo wie geht es euch?','2018-11-27 06:47:17','2018-11-27 06:47:17');

/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;


# Export von Tabelle news_comments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `news_comments`;

CREATE TABLE `news_comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flat_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Export von Tabelle password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Export von Tabelle posts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `flat_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Export von Tabelle users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `flat_id` int(11) NOT NULL,
  `cart_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `flat_id`, `cart_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,1,'5c1c8df2d0c4d','Max Muster','max@muster.com',NULL,'$2y$10$ajIYY4AV0stN.KwrhFTBHOEatf6LIp.oNPphUKgVUDn.vcMIWaZxa','aEhdGZNa5T5bAVcgw9p5g0RQsxsM5xPuHIVqV9QhW0H8rwziSiGupb9YUIcb','2018-11-22 12:49:50','2018-12-21 06:53:38'),
	(3,1,'5c14e0c886a5a','Peter Peternell','peter.p@gmail.com',NULL,'$2y$10$ajIYY4AV0stN.KwrhFTBHOEatf6LIp.oNPphUKgVUDn.vcMIWaZxa','xseAt7EN6Sg7SVLBFcCJ6qt3Pi0LS8QdabpfwDNriYTFEfHLIBXDUoQH2wgQ','2018-11-22 12:49:50','2018-12-15 11:08:56');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;


# Export von Tabelle welcomes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `welcomes`;

CREATE TABLE `welcomes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `welcomes` WRITE;
/*!40000 ALTER TABLE `welcomes` DISABLE KEYS */;

INSERT INTO `welcomes` (`id`, `title`, `subtitle`, `body`, `img_url`, `created_at`, `updated_at`)
VALUES
	(1,'Title','subtitle','Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.','images/articles/cleaning.jpg',NULL,NULL),
	(2,'Title','subtitle','Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.','images/articles/cleaning.jpg',NULL,NULL),
	(3,'Title','subtitle','Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.','images/articles/cleaning.jpg',NULL,NULL),
	(4,'Title','subtitle','Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.','images/articles/cleaning.jpg',NULL,NULL);

/*!40000 ALTER TABLE `welcomes` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

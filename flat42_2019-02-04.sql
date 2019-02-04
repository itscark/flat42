# ************************************************************
# Sequel Pro SQL dump
# Version 5426
#
# https://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 8.0.13)
# Database: flat42
# Generation Time: 2019-02-04 13:30:30 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table carts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `carts`;

CREATE TABLE `carts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `flat_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uniq_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `carts` WRITE;
/*!40000 ALTER TABLE `carts` DISABLE KEYS */;

INSERT INTO `carts` (`id`, `user_id`, `buyer_id`, `flat_id`, `name`, `quantity`, `price`, `uniq_id`, `created_at`, `updated_at`)
VALUES
	(1,5,5,'2pJh0DY5q0','Zwiebel',4,'0.94','5c583d3be815e','2019-02-04 13:25:15','2019-02-04 13:25:36'),
	(2,4,5,'2pJh0DY5q0','Karotten',5,'1.45','5c583d3be815e','2019-02-04 13:25:16','2019-02-04 13:25:34'),
	(3,2,5,'2pJh0DY5q0','Erbsen',1,'1.2','5c583d3be815e','2019-02-04 13:25:16','2019-02-04 13:25:49'),
	(4,5,5,'2pJh0DY5q0','Tomaten',4,'0.56','5c583d3be815e','2019-02-04 13:25:16','2019-02-04 13:25:56'),
	(5,4,5,'2pJh0DY5q0','Kürbis',1,'2.45','5c583d3be815e','2019-02-04 13:25:16','2019-02-04 13:26:02');

/*!40000 ALTER TABLE `carts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table cleaning_periods
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


# Dump of table cleanings
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `cleanings` WRITE;
/*!40000 ALTER TABLE `cleanings` DISABLE KEYS */;

INSERT INTO `cleanings` (`id`, `flat_id`, `period_id`, `title`, `created_at`, `updated_at`)
VALUES
	(1,'2pJh0DY5q0','1','Geschirrspüler ein/ausräumen','2019-02-04 13:21:23','2019-02-04 13:21:23'),
	(2,'2pJh0DY5q0','2','Staubwischen','2019-02-04 13:21:32','2019-02-04 13:21:32'),
	(3,'2pJh0DY5q0','2','Staubsaugen','2019-02-04 13:21:39','2019-02-04 13:21:39'),
	(4,'2pJh0DY5q0','4','Fenster Putzen','2019-02-04 13:21:58','2019-02-04 13:21:58'),
	(5,'2pJh0DY5q0','3','Kühlschrank ausräumen','2019-02-04 13:22:13','2019-02-04 13:22:13'),
	(6,'2pJh0DY5q0','2','Toilette putzen','2019-02-04 13:22:31','2019-02-04 13:22:31'),
	(7,'2pJh0DY5q0','1','Wohnzimmer aufräumen','2019-02-04 13:22:54','2019-02-04 13:22:54');

/*!40000 ALTER TABLE `cleanings` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table events
# ------------------------------------------------------------

DROP TABLE IF EXISTS `events`;

CREATE TABLE `events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `flat_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;

INSERT INTO `events` (`id`, `flat_id`, `user_id`, `updated_user_id`, `deleted_by`, `title`, `body`, `date`, `deleted`, `created_at`, `updated_at`)
VALUES
	(1,'2pJh0DY5q0','2',NULL,NULL,'Pool Party','Hey Leute, zum Sommer Anfang würde ich gerne wieder eine Pool party schmeißen und grillen. Ich hoffe ihr seid dabei ;)','2019-05-08',0,'2019-02-04 13:18:53','2019-02-04 13:18:53'),
	(2,'2pJh0DY5q0','2',NULL,NULL,'Pizza Abend','Es ist wieder so weit, ein weiterer Pizza Abend steht an !','2019-02-17',0,'2019-02-04 13:19:25','2019-02-04 13:19:25'),
	(3,'2pJh0DY5q0','2',NULL,NULL,'Kino','Hey Leute ich würde mir gerne den neuen creed im kino anschauen !','2019-02-14',0,'2019-02-04 13:20:33','2019-02-04 13:20:33');

/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table flats
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
	(1,'2pJh0DY5q0','SAE - Homies','2019-02-04 13:12:42','2019-02-04 13:12:42');

/*!40000 ALTER TABLE `flats` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table grocery_lists
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `grocery_lists` WRITE;
/*!40000 ALTER TABLE `grocery_lists` DISABLE KEYS */;

INSERT INTO `grocery_lists` (`id`, `done`, `user_id`, `flat_id`, `date`, `uniq_id`, `created_at`, `updated_at`)
VALUES
	(1,1,'5','2pJh0DY5q0','2019-02-04 13:25:15','5c583d3be815e','2019-02-04 13:25:15','2019-02-04 13:26:03');

/*!40000 ALTER TABLE `grocery_lists` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table invites
# ------------------------------------------------------------

DROP TABLE IF EXISTS `invites`;

CREATE TABLE `invites` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flat_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `invites_token_unique` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table items
# ------------------------------------------------------------

DROP TABLE IF EXISTS `items`;

CREATE TABLE `items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `flat_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=163 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(145,'2014_10_12_000000_create_users_table',1),
	(146,'2014_10_12_100000_create_password_resets_table',1),
	(147,'2016_06_01_000001_create_oauth_auth_codes_table',1),
	(148,'2016_06_01_000002_create_oauth_access_tokens_table',1),
	(149,'2016_06_01_000003_create_oauth_refresh_tokens_table',1),
	(150,'2016_06_01_000004_create_oauth_clients_table',1),
	(151,'2016_06_01_000005_create_oauth_personal_access_clients_table',1),
	(152,'2018_10_28_174835_create_news_table',1),
	(153,'2018_10_28_182959_create_flats_table',1),
	(154,'2018_11_03_132143_create_items_table',1),
	(155,'2018_11_04_161235_create_events_table',1),
	(156,'2018_11_08_135702_create_welcomes_table',1),
	(157,'2018_11_22_101439_create_news_comments_table',1),
	(158,'2018_11_29_074047_create_carts_table',1),
	(159,'2018_11_29_150311_create_grocery_lists_table',1),
	(160,'2018_12_04_085456_create_cleanings_table',1),
	(161,'2018_12_04_130517_create_cleaning_periods_table',1),
	(162,'2019_01_08_104639_create_invites_table',1);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table news
# ------------------------------------------------------------

DROP TABLE IF EXISTS `news`;

CREATE TABLE `news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `flat_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;

INSERT INTO `news` (`id`, `flat_id`, `user_id`, `title`, `created_at`, `updated_at`)
VALUES
	(1,'2pJh0DY5q0',2,'Hey Leute ! Heute gibt es beim Billa -25% auf Gemüse !','2019-02-04 13:13:38','2019-02-04 13:13:38'),
	(2,'2pJh0DY5q0',2,'Einkauf ist erledigt und alles ist im Kühlschrank','2019-02-04 13:26:37','2019-02-04 13:26:37');

/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table news_comments
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `news_comments` WRITE;
/*!40000 ALTER TABLE `news_comments` DISABLE KEYS */;

INSERT INTO `news_comments` (`id`, `user_id`, `flat_id`, `news_id`, `body`, `created_at`, `updated_at`)
VALUES
	(1,'5','2pJh0DY5q0','1','Super! ich geh heute noch einkaufen, schreibt einfach auf die Liste was ihr gerne hättet :)','2019-02-04 13:16:26','2019-02-04 13:16:26'),
	(2,'2','2pJh0DY5q0','1','Danke @Rahul, steht schon alles drauf :)','2019-02-04 13:17:18','2019-02-04 13:17:18'),
	(3,'4','2pJh0DY5q0','1','von mir auch @Rahul','2019-02-04 13:17:27','2019-02-04 13:17:27');

/*!40000 ALTER TABLE `news_comments` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table oauth_access_tokens
# ------------------------------------------------------------

DROP TABLE IF EXISTS `oauth_access_tokens`;

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(10) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table oauth_auth_codes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `oauth_auth_codes`;

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(10) unsigned NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table oauth_clients
# ------------------------------------------------------------

DROP TABLE IF EXISTS `oauth_clients`;

CREATE TABLE `oauth_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table oauth_personal_access_clients
# ------------------------------------------------------------

DROP TABLE IF EXISTS `oauth_personal_access_clients`;

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_personal_access_clients_client_id_index` (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table oauth_refresh_tokens
# ------------------------------------------------------------

DROP TABLE IF EXISTS `oauth_refresh_tokens`;

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `flat_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cart_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `flat_id`, `name`, `email`, `email_verified_at`, `password`, `cart_id`, `role`, `deleted_at`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,NULL,'Admin','admin@flat42.com','2019-02-04 13:12:02','$2y$10$cgrpFu3rvnLgOOlfC85fkO7FfRs6MsrzCP8zYUQTUYPdv2qKXzypm',NULL,'admin',NULL,NULL,'2019-02-04 13:12:02','2019-02-04 13:12:02'),
	(2,'2pJh0DY5q0','Marc Peternell','peternellmarc@gmail.com','2019-02-04 13:12:02','$2y$10$O3Kl1oni6LS.DluYt27vS.gBP/YjtINGrTdOIAc3A8y0710J32qTW','5c583d3be815e','user',NULL,NULL,'2019-02-04 13:12:02','2019-02-04 13:25:15'),
	(4,'2pJh0DY5q0','Regina Mösenbacher','regi@sae.edu','2019-02-04 13:12:02','$2y$10$O3Kl1oni6LS.DluYt27vS.gBP/YjtINGrTdOIAc3A8y0710J32qTW',NULL,'user',NULL,NULL,'2019-02-04 13:12:02','2019-02-04 13:12:02'),
	(5,'2pJh0DY5q0','Rahul Sharaf','rahul@sae.edu','2019-02-04 13:12:02','$2y$10$O3Kl1oni6LS.DluYt27vS.gBP/YjtINGrTdOIAc3A8y0710J32qTW',NULL,'user',NULL,NULL,'2019-02-04 13:12:02','2019-02-04 13:12:02');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table welcomes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `welcomes`;

CREATE TABLE `welcomes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `welcomes` WRITE;
/*!40000 ALTER TABLE `welcomes` DISABLE KEYS */;

INSERT INTO `welcomes` (`id`, `title`, `section_id`, `body`, `img_url`, `created_at`, `updated_at`)
VALUES
	(1,'Shopping','sectionShopping','Führt gemeinsam eine Einkaufsliste. Jeder ist sich immer im klaren was gerade fehlt und was die anderen brauchen. Nie wieder müsst ihr mit knurrendem Magen vor leeren Regalen stehen.','svg/homepage/undraw_add_to_cart_vkjp.svg',NULL,NULL),
	(2,'News','sectionNews','Teilt eure Gedanken miteinander! Gebt euren Freunden bescheid, wo es Angebote gibt.','svg/homepage/undraw_content_vbqo.svg',NULL,NULL),
	(3,'Events','sectionEvents','Gemeinsam ist es immer lustiger! Plant gemeinsame Events... Egal ob ihr zusammen kochen wollt, einen Filmeabend plant, oder zusammen die Stadt unsicher machen wollt.','svg/homepage/undraw_having_fun_iais.svg',NULL,NULL),
	(4,'Cleaning','sectionCleaning','In einer sauberen Wohnung lebt es sich besser! Zusammen haltet ihr eure Wohnung sauber und entscheidet selbst wann was geputzt werden soll.','svg/homepage/undraw_schedule_pnbk.svg',NULL,NULL);

/*!40000 ALTER TABLE `welcomes` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

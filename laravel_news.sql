-- MySQL dump 10.17  Distrib 10.3.22-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: laravel_news
-- ------------------------------------------------------
-- Server version	10.3.22-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `laravel_news`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `laravel_news` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `laravel_news`;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Спорт1',NULL,'2021-05-04 07:51:19',NULL),(2,'Исскуство',NULL,'2021-05-03 14:20:14',NULL),(3,'Кино',NULL,'2021-05-03 14:20:29',NULL),(4,'Новая','2021-05-03 14:14:29','2021-05-03 14:14:42','2021-05-03 14:14:42');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `export_requests`
--

DROP TABLE IF EXISTS `export_requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `export_requests` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `export_requests`
--

LOCK TABLES `export_requests` WRITE;
/*!40000 ALTER TABLE `export_requests` DISABLE KEYS */;
INSERT INTO `export_requests` VALUES (1,'Arielle Tromp','817.709.0530','augustine03@okuneva.com','Quae voluptas perferendis rerum minus. Ea minus nihil fuga est. Blanditiis facere et voluptas modi sint deleniti.','2021-04-24 14:44:25','2021-04-24 14:44:25',NULL),(2,'Marina Moore','+1 (779) 623-0452','baby58@gmail.com','Quis officiis et ut veritatis consequatur in. Itaque deleniti deserunt unde quibusdam. Numquam rerum commodi doloribus minima aut sunt aliquam est. Nulla officia autem rerum maiores.','2021-04-24 14:44:27','2021-04-24 14:44:27',NULL),(3,'Sonia Roberts','+1 (364) 653-1545','jakubowski.krystal@roberts.com','Expedita quo aut molestiae. Commodi id enim accusantium. Quo quia aut facere ad modi tempore reprehenderit. Quam sed velit rerum rerum totam numquam.','2021-04-24 14:44:28','2021-04-24 14:44:28',NULL),(4,'Chris Homenick','+1-734-229-8945','johnson51@gmail.com','Et est esse itaque dolores. Veritatis quia animi ipsum praesentium cumque. Vero non quis ipsa et. Iure similique nemo eligendi dolorum qui facere.','2021-04-24 14:44:28','2021-04-24 14:44:28',NULL),(5,'Ashleigh Cartwright','541.350.8506','crystel22@gmail.com','Et suscipit facilis dolores officia. Excepturi ut aut hic dignissimos nisi quae reiciendis. Eius voluptatum non laborum a.','2021-04-24 14:44:29','2021-04-24 14:44:29',NULL),(6,'Eryn Quitzon','212-860-7664','cmuller@schamberger.com','Eius saepe reprehenderit fuga quo magnam nihil. Aut impedit est modi dolor doloribus ad autem. Cumque officiis cumque et id.','2021-04-24 14:44:30','2021-04-24 14:44:30',NULL),(7,NULL,NULL,'dserov@gmail.com','Всем - шампанского!','2021-04-24 14:44:33','2021-04-24 14:44:33',NULL);
/*!40000 ALTER TABLE `export_requests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedbacks`
--

DROP TABLE IF EXISTS `feedbacks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feedbacks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedbacks`
--

LOCK TABLES `feedbacks` WRITE;
/*!40000 ALTER TABLE `feedbacks` DISABLE KEYS */;
INSERT INTO `feedbacks` VALUES (1,'123','123','2021-04-23 05:56:36','2021-04-23 05:56:36',NULL),(2,'Дмитрий','Тест валидатора!','2021-04-23 06:00:27','2021-04-23 06:00:27',NULL);
/*!40000 ALTER TABLE `feedbacks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (4,'2014_10_12_000000_create_users_table',1),(5,'2014_10_12_100000_create_password_resets_table',1),(6,'2019_08_19_000000_create_failed_jobs_table',1),(12,'2021_04_20_161925_create_news_table',2),(13,'2021_04_20_201938_create_table_categories',2),(14,'2021_04_20_202232_create_table_feedbacks',2),(15,'2021_04_20_202929_create_table_sources',2),(18,'2021_04_21_074053_alter_table_news_add_column_category_id',3),(19,'2021_04_23_152634_alter_news_add_fields',4),(20,'2021_04_23_193524_alter_news_rename_description_to_content',5),(23,'2021_04_24_170003_create_table_export_requests',6),(24,'2021_04_24_193143_drop_table_sources',7),(25,'2021_05_06_124434_alter_users_add_is_admin',8);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `source` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publish_date` datetime DEFAULT NULL,
  `category_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `spoiler` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_private` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `news_title_unique` (`title`),
  KEY `news_publish_date_index` (`publish_date`),
  KEY `news_category_id_foreign` (`category_id`),
  CONSTRAINT `news_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,'Est repellendus.','Aut culpa id aut fugiat molestias et dolorem. Est aliquam eligendi quaerat. Labore sed pariatur ad.','http://www.torp.net/id-laborum-et-ut-soluta-fuga-odit','1993-02-16 11:40:44',2,NULL,'2021-04-23 17:48:07','2021-04-23 17:48:07','Aut culpa id aut fugiat molestias et dolorem. Est aliquam eligendi quaerat. Labore sed pariatur ad.',0),(2,'Commodi tempora.','Molestias enim distinctio rerum cupiditate et eos error. Nesciunt aut et a perferendis.','https://www.leffler.org/dolores-qui-vero-libero-ea-eum-dolor','2009-04-28 18:25:25',1,NULL,'2021-04-23 17:48:54','2021-04-23 17:48:54','Molestias enim distinctio rerum cupiditate et eos error. Nesciunt aut et a perferendis.',0),(3,'Autem odio culpa.','Enim omnis qui in quod autem inventore. Ea molestiae magnam tempore maxime.','http://www.larson.net/beatae-vitae-adipisci-id-eius','2014-11-12 22:44:28',2,NULL,'2021-04-23 17:49:12','2021-04-23 17:49:12','Enim omnis qui in quod autem inventore. Ea molestiae magnam tempore maxime.',0),(4,'Aspernatur ex ut.','Et doloremque ipsum sed facere. Minus consectetur accusantium nesciunt commodi at et blanditiis.','http://kuphal.org/reiciendis-recusandae-iure-nihil-provident-quas-facilis-reiciendis-molestias.html','2015-05-27 05:12:05',1,NULL,'2021-04-23 17:50:59','2021-04-23 17:50:59','Et doloremque ipsum sed facere. Minus consectetur accusantium nesciunt commodi at et blanditiis.',0),(5,'Pariatur qui enim.','Et aut hic nostrum numquam sit eos veritatis. Fugit quia dolor eum. Est ad et ipsa.','https://sanford.biz/est-et-corrupti-et.html','2018-10-08 09:08:55',3,NULL,'2021-04-23 17:51:54','2021-04-23 17:51:54','Et aut hic nostrum numquam sit eos veritatis. Fugit quia dolor eum. Est ad et ipsa.',0),(6,'Qui dignissimos.','Beatae amet occaecati quae pariatur et voluptate. Voluptatem est et voluptatem et cum aut.','http://www.gislason.com/','1981-03-12 07:08:09',2,NULL,'2021-04-23 18:23:25','2021-04-23 18:23:25','Beatae amet occaecati quae pariatur et voluptate. Voluptatem est et voluptatem et cum aut.',0),(7,'Illum beatae - новый заголовок','Quasi consequatur ut aspernatur dolores quos qui nobis. Rerum illum nobis ut quia laboriosam.','http://www.deckow.com/veniam-nam-est-quisquam-id-cumque-blanditiis-dolore-minus','1981-03-25 02:08:45',1,NULL,'2021-04-23 19:05:23',NULL,'Quasi consequatur ut aspernatur dolores quos qui nobis. Rerum illum nobis ut quia laboriosam.',0),(8,'Consequatur.','Labore corporis rerum quas eos laboriosam ipsum quisquam. Praesentium repudiandae delectus officia.','https://www.miller.com/eaque-et-ut-ea-tempora-et','2007-12-15 00:18:27',3,NULL,NULL,NULL,'Labore corporis rerum quas eos laboriosam ipsum quisquam. Praesentium repudiandae delectus officia.',0),(9,'Repellat aut.','Quia culpa enim quis. Minus dolor doloribus voluptate labore. Autem repellat omnis et.','https://www.gislason.biz/quae-repellendus-eum-sed-rerum-et-impedit-vel','1977-12-10 05:10:32',2,NULL,NULL,NULL,'Quia culpa enim quis. Minus dolor doloribus voluptate labore. Autem repellat omnis et.',0),(10,'Minus eligendi sint.','Quia modi magnam culpa qui. Culpa distinctio vel quo aliquid.','http://www.torphy.biz/ducimus-et-repellat-facere-fuga-expedita.html','1991-01-18 07:11:55',3,NULL,NULL,NULL,'Quia modi magnam culpa qui. Culpa distinctio vel quo aliquid.',0),(11,'Voluptatem et.','Nam impedit velit sit tempore exercitationem. Ut qui laborum recusandae in voluptate provident.','http://www.king.net/minima-est-ut-voluptatem-id-adipisci-nemo','2001-08-08 23:20:37',3,NULL,NULL,NULL,'Nam impedit velit sit tempore exercitationem. Ut qui laborum recusandae in voluptate provident.',0),(12,'Quis quis nihil in.','Laborum vel veniam voluptatem dolore blanditiis incidunt quasi. Et aperiam ex ipsum ratione rerum.','http://smitham.biz/quidem-necessitatibus-consequatur-aut-soluta-voluptatem-ut-vel-dolorem','1986-10-14 00:59:44',1,NULL,NULL,NULL,'Laborum vel veniam voluptatem dolore blanditiis incidunt quasi. Et aperiam ex ipsum ratione rerum.',0),(13,'Molestias est qui.','Consectetur quia non qui mollitia. Consectetur pariatur odit similique.','http://www.bartoletti.com/quisquam-dolor-commodi-blanditiis-in-velit-ullam.html','2001-08-13 20:55:11',2,NULL,'2021-04-26 17:22:28','2021-04-26 17:22:28','Consectetur quia non qui mollitia. Consectetur pariatur odit similique.',0),(14,'Ab enim et sit.','Quo magnam voluptatum consequuntur. Blanditiis est ea est et omnis fugiat.','http://bogan.net/magnam-voluptas-hic-et','2009-11-12 22:31:25',3,NULL,NULL,NULL,'Quo magnam voluptatum consequuntur. Blanditiis est ea est et omnis fugiat.',0),(15,'Delectus quaerat.','Aliquid tempore et eligendi. Quia quaerat modi accusantium deleniti deserunt iusto.','https://kirlin.com/provident-dolor-qui-magni.html','1979-01-17 02:55:21',1,NULL,NULL,NULL,'Aliquid tempore et eligendi. Quia quaerat modi accusantium deleniti deserunt iusto.',0),(16,'Facilis dolores.','Repudiandae vitae deserunt pariatur explicabo dolores. Corporis aut atque voluptas.','http://www.bergnaum.com/autem-aliquid-ut-facere-illo','1996-01-10 20:27:11',1,NULL,NULL,NULL,'Repudiandae vitae deserunt pariatur explicabo dolores. Corporis aut atque voluptas.',0),(17,'Qui minus.','Vero eius fugiat soluta aliquam nemo eum. Autem autem sint dicta voluptas cum.','http://www.raynor.com/est-sed-et-est.html','2010-07-17 20:24:01',2,NULL,NULL,NULL,'Vero eius fugiat soluta aliquam nemo eum. Autem autem sint dicta voluptas cum.',0),(18,'Porro qui quia.','Rerum placeat officiis nihil natus. Ut nisi blanditiis magnam iste perferendis amet.','https://gutmann.com/reprehenderit-asperiores-dolor-placeat-quasi-quis-voluptatibus.html','1989-10-28 11:04:39',3,NULL,NULL,NULL,'Rerum placeat officiis nihil natus. Ut nisi blanditiis magnam iste perferendis amet.',0),(19,'Новая новость','Осваиваем новые технологии','http://ya.ru/',NULL,1,'2021-04-23 17:40:58','2021-04-23 17:40:58',NULL,'Осваиваем новые технологии',0),(22,'Еещ одна новость','Of course, after the user is redirected to a new page, you may retrieve and display the flashed message from the session. For example, using Blade syntax:','http://ya.ru/',NULL,3,'2021-04-23 18:52:18','2021-04-23 18:52:18',NULL,'Of course, after the user is redirected to a new page, you may retrieve and display the flashed message from the session. For example, using Blade syntax:',1),(25,'Тeст createOrNew','$request->input(\'news\')','http://ya.ru/',NULL,3,'2021-04-23 19:06:02','2021-04-23 19:06:27',NULL,'$request->input(\'news\')',0),(26,'qweqweqwe',NULL,'http://sd.ru',NULL,2,'2021-05-02 16:51:58','2021-05-02 16:51:58',NULL,'dgfhdgfhdfghdgfh',1);
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (5,'Vasya','q@q.ru',NULL,'$2y$10$/aaI7lApLM4SV1p.IH2U1eAGOoahHFMohUl26SE5oi.pnRwtc1hSa','54Zw7RqnjJAQXhCb1qHgUeNFxKx3Hw0XWv5esffY3g4gF6UBs5jJjwl2oX7p','2021-05-06 20:08:45','2021-05-07 08:12:22',0),(6,'dserov@gmail.com','dserov@gmail.com',NULL,'$2y$10$XzXacgiSaCrLWu3ACziM2uiAXrtIW4qMd4GJmMNMV4IECuIzJuqQm','X6mImQ4Vp9hKJE31zBXKiY5OLY3kuDMiit6y50zmxmnTAUsCJfX6qiI5SGF3','2021-05-07 05:05:21','2021-05-07 05:06:38',1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-07 11:19:46

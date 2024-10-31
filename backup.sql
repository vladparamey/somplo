-- MySQL dump 10.13  Distrib 8.0.36, for Linux (aarch64)
--
-- Host: db    Database: db
-- ------------------------------------------------------
-- Server version	8.0.36-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2024_10_30_153800_create_sellers_table',1),(6,'2024_10_30_153813_create_products_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `seller_id` bigint unsigned NOT NULL,
  `phone_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display_size` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `cost` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_seller_id_foreign` (`seller_id`),
  CONSTRAINT `products_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `sellers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,1,'molestiae',7,28,865.56,'2024-10-31 10:39:54','2024-10-31 10:39:54'),(2,1,'qui',5,97,278.96,'2024-10-31 10:39:54','2024-10-31 10:39:54'),(3,1,'quas',4,55,853.36,'2024-10-31 10:39:54','2024-10-31 10:39:54'),(4,1,'dicta',4,100,556.72,'2024-10-31 10:39:54','2024-10-31 10:39:54'),(5,1,'corrupti',2,58,1384.46,'2024-10-31 10:39:54','2024-10-31 10:39:54'),(6,1,'officia',2,85,1228.45,'2024-10-31 10:39:54','2024-10-31 10:39:54'),(7,1,'earum',4,82,785.50,'2024-10-31 10:39:54','2024-10-31 10:39:54'),(8,1,'et',2,58,450.88,'2024-10-31 10:39:54','2024-10-31 10:39:54'),(9,1,'sed',5,35,928.13,'2024-10-31 10:39:54','2024-10-31 10:39:54'),(10,1,'odio',6,8,760.90,'2024-10-31 10:39:54','2024-10-31 10:39:54'),(11,2,'sunt',3,66,1526.26,'2024-10-31 10:39:54','2024-10-31 10:39:54'),(12,2,'numquam',4,8,295.24,'2024-10-31 10:39:54','2024-10-31 10:39:54'),(13,2,'error',6,47,458.49,'2024-10-31 10:39:54','2024-10-31 10:39:54'),(14,2,'temporibus',4,48,858.93,'2024-10-31 10:39:54','2024-10-31 10:39:54'),(15,2,'ea',2,30,1846.36,'2024-10-31 10:39:54','2024-10-31 10:39:54'),(16,2,'at',3,9,831.07,'2024-10-31 10:39:54','2024-10-31 10:39:54'),(17,2,'tenetur',2,20,1648.72,'2024-10-31 10:39:54','2024-10-31 10:39:54'),(18,2,'vel',2,17,1958.96,'2024-10-31 10:39:54','2024-10-31 10:39:54'),(19,2,'totam',6,51,1090.30,'2024-10-31 10:39:54','2024-10-31 10:39:54'),(20,2,'vero',3,16,1285.23,'2024-10-31 10:39:54','2024-10-31 10:39:54'),(21,3,'quam',5,55,464.77,'2024-10-31 10:39:54','2024-10-31 10:39:54'),(22,3,'perferendis',2,7,1095.24,'2024-10-31 10:39:54','2024-10-31 10:39:54'),(23,3,'sit',6,50,1132.81,'2024-10-31 10:39:54','2024-10-31 10:39:54'),(24,3,'suscipit',7,65,780.46,'2024-10-31 10:39:54','2024-10-31 10:39:54'),(25,3,'deserunt',5,49,440.11,'2024-10-31 10:39:54','2024-10-31 10:39:54'),(26,3,'consequatur',5,12,132.20,'2024-10-31 10:39:54','2024-10-31 10:39:54'),(27,3,'aspernatur',4,88,1660.14,'2024-10-31 10:39:54','2024-10-31 10:39:54'),(28,3,'delectus',2,61,1169.28,'2024-10-31 10:39:54','2024-10-31 10:39:54'),(29,3,'ut',6,10,1979.79,'2024-10-31 10:39:54','2024-10-31 10:39:54'),(30,3,'autem',7,35,989.55,'2024-10-31 10:39:54','2024-10-31 10:39:54'),(31,4,'eligendi',7,89,1399.44,'2024-10-31 10:39:54','2024-10-31 10:39:54'),(32,4,'asperiores',6,52,686.54,'2024-10-31 10:39:54','2024-10-31 10:39:54'),(33,4,'velit',3,61,986.22,'2024-10-31 10:39:54','2024-10-31 10:39:54'),(34,4,'occaecati',7,95,1463.04,'2024-10-31 10:39:54','2024-10-31 10:39:54'),(35,4,'quo',6,16,285.35,'2024-10-31 10:39:54','2024-10-31 10:39:54'),(36,4,'nam',3,55,185.27,'2024-10-31 10:39:54','2024-10-31 10:39:54'),(37,4,'quis',2,94,372.26,'2024-10-31 10:39:54','2024-10-31 10:39:54'),(38,4,'dolores',5,60,1446.63,'2024-10-31 10:39:54','2024-10-31 10:39:54'),(39,4,'a',7,40,1777.87,'2024-10-31 10:39:54','2024-10-31 10:39:54'),(40,4,'omnis',7,47,1326.03,'2024-10-31 10:39:54','2024-10-31 10:39:54'),(41,5,'enim',6,46,1478.40,'2024-10-31 10:39:54','2024-10-31 10:39:54'),(42,5,'cum',7,81,390.19,'2024-10-31 10:39:54','2024-10-31 10:39:54'),(43,5,'dolorem',5,88,738.16,'2024-10-31 10:39:54','2024-10-31 10:39:54'),(44,5,'provident',7,47,1305.78,'2024-10-31 10:39:54','2024-10-31 10:39:54'),(45,5,'consequuntur',4,44,1179.08,'2024-10-31 10:39:54','2024-10-31 10:39:54'),(46,5,'cumque',5,23,861.15,'2024-10-31 10:39:54','2024-10-31 10:39:54'),(47,5,'harum',6,68,735.47,'2024-10-31 10:39:54','2024-10-31 10:39:54'),(48,5,'hic',7,50,1029.15,'2024-10-31 10:39:54','2024-10-31 10:39:54'),(49,5,'id',6,62,807.19,'2024-10-31 10:39:54','2024-10-31 10:39:54'),(50,5,'eveniet',3,77,1502.11,'2024-10-31 10:39:54','2024-10-31 10:39:54');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sellers`
--

DROP TABLE IF EXISTS `sellers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sellers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `seller_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sellers_seller_name_unique` (`seller_name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sellers`
--

LOCK TABLES `sellers` WRITE;
/*!40000 ALTER TABLE `sellers` DISABLE KEYS */;
INSERT INTO `sellers` VALUES (1,'Thiel and Sons','2024-10-31 10:39:54','2024-10-31 10:39:54'),(2,'Balistreri-Hill','2024-10-31 10:39:54','2024-10-31 10:39:54'),(3,'Purdy-Goyette','2024-10-31 10:39:54','2024-10-31 10:39:54'),(4,'Dietrich, Kessler and Trantow','2024-10-31 10:39:54','2024-10-31 10:39:54'),(5,'Kiehn-Dibbert','2024-10-31 10:39:54','2024-10-31 10:39:54');
/*!40000 ALTER TABLE `sellers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
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

-- Dump completed on 2024-10-31 10:52:50

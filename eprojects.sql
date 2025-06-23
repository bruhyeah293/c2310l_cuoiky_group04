-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: laravel
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

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
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cart` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `member_id` bigint(20) unsigned DEFAULT NULL,
  `product_id` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `national` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
INSERT INTO `cart` VALUES (1,NULL,NULL,'3','1','tuấn','VietNam','vung tau','0384602005','hung@gmail.com','139','0','2025-06-20 06:45:56',NULL),(2,NULL,NULL,'3','1','Vũ','VietNam','Hải Dương','0541237663','vu@gmail.com','139','1','2025-06-20 07:06:12',NULL),(3,NULL,NULL,'2','1','dubai','VietNam','quatar','0543345231','kk@gmail.com','129','0','2025-06-21 02:06:16',NULL),(4,NULL,NULL,'1','4','dubai','VietNam','quatar','0543345231','kk@gmail.com','396','0','2025-06-21 02:06:16',NULL),(5,NULL,NULL,'5','2','văn','VietNam','hà nội','0326598726','van@gmail.com','298','0','2025-06-21 07:04:05',NULL),(6,NULL,4,'5','2','Vàng','VietNam','Vũng Tàu','0756203402','gold@gmail.com','298','0','2025-06-21 07:15:47',NULL),(7,3,NULL,'15','10','fiesta','VietNam','bình dương','0577862351','khaidz@gmail.com','2450','0','2025-06-21 07:22:03',NULL);
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `parent` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Air Conditioner 1HP',0,'2025-05-28 14:36:18',NULL),(2,'Air Conditioner 1.5HP',0,'2025-05-28 14:36:18',NULL),(3,'Air Conditioner 2HP',1,'2025-05-28 14:36:18',NULL),(4,'Air Conditioner 2.5HP',1,'2025-05-28 14:36:18',NULL),(5,'Air Conditioner 3HP',2,'2025-05-28 14:36:18',NULL);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
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
-- Table structure for table `favorites`
--

DROP TABLE IF EXISTS `favorites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `favorites` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `member_id` bigint(20) unsigned DEFAULT NULL,
  `product_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `favorites_user_id_foreign` (`user_id`),
  KEY `favorites_member_id_foreign` (`member_id`),
  KEY `favorites_product_id_foreign` (`product_id`),
  CONSTRAINT `favorites_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE,
  CONSTRAINT `favorites_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `favorites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `favorites`
--

LOCK TABLES `favorites` WRITE;
/*!40000 ALTER TABLE `favorites` DISABLE KEYS */;
INSERT INTO `favorites` VALUES (1,NULL,4,5,'2025-06-21 06:03:03',NULL),(2,NULL,4,2,'2025-06-21 06:24:43',NULL),(3,NULL,4,3,'2025-06-21 06:37:56',NULL),(4,NULL,4,20,'2025-06-21 06:47:09',NULL),(5,3,NULL,3,'2025-06-21 07:19:09',NULL),(6,3,NULL,17,'2025-06-21 07:19:35',NULL),(7,3,NULL,15,'2025-06-21 07:19:58',NULL),(8,NULL,5,3,'2025-06-21 07:37:10',NULL),(9,4,NULL,25,'2025-06-21 19:31:45',NULL),(10,4,NULL,38,'2025-06-21 19:32:04',NULL),(11,4,NULL,28,'2025-06-21 21:41:39',NULL),(12,4,NULL,14,'2025-06-21 21:42:01',NULL);
/*!40000 ALTER TABLE `favorites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `members` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `members`
--

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;
INSERT INTO `members` VALUES (1,'khoi@gmail.com','$2y$10$fVI4JX/pU7ls0GlzehLM3OkcaU3.pCVAF.LftE1Xd9LQMyAvgv7z6',1,NULL,NULL,NULL),(3,'hieu@gmail.com','$2y$10$7E/rmXUAJk/I19peG9nA4uJ3y7E/MTRGSFyfJImw16Ho2YbYgUNkW',1,NULL,'2025-06-20 05:45:52','2025-06-21 01:46:53'),(4,'bao@gmail.com','$2y$10$y9Guf7qhbIPQFdBqvyE9j.2PT8e5LicIoZaISUAWTrUiDP0nn5HOm',2,NULL,'2025-06-21 01:45:35',NULL),(5,'hung@gmail.com','$2y$10$JklrVdZ4S3rRutJ7EFNHbuJi3wTFxSGp3raDSTUUlN5vhmMS7Mt1O',1,NULL,'2025-06-21 01:46:24',NULL);
/*!40000 ALTER TABLE `members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(10,'2014_10_12_100000_create_password_resets_table',2),(11,'2019_08_19_000000_create_failed_jobs_table',2),(12,'2019_12_14_000001_create_personal_access_tokens_table',2),(13,'2022_06_30_205353_create_members_table',2),(14,'2022_07_01_192112_create_products_table',2),(15,'2022_07_01_192234_create_category_table',2),(16,'2025_06_19_132235_create_users_table',3),(17,'2022_07_21_204148_create_cart_table',4),(19,'2021_06_19_132235_create_users_table',5),(21,'2025_06_21_091339_add_member_id_to_reviews_table',7),(23,'2022_07_02_000293_create_reviews_table',8),(24,'2025_06_21_093640_add_member_id_to_reviews_table',8),(25,'2025_10_23_20_create_reviews_table',9),(26,'2025_06_21_124125_create_favorites_table',10),(27,'2025_06_21_124146_create_orders_table',10),(28,'2025_06_21_141112_add_user_id_and_member_id_to_cart_table',11);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `member_id` bigint(20) unsigned DEFAULT NULL,
  `product_id` bigint(20) unsigned NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_user_id_foreign` (`user_id`),
  KEY `orders_member_id_foreign` (`member_id`),
  KEY `orders_product_id_foreign` (`product_id`),
  CONSTRAINT `orders_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE,
  CONSTRAINT `orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
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
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
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
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `intro` text NOT NULL,
  `content` text DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `featured` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'3','Daikin Inverter 1HP Air Conditioner',99,50,'Energy-saving and quiet operation','Daikin Inverter 1HP AC with power-saving technology, ideal for rooms 10ÔÇô15m┬▓.','bruh10.webp',1,1,'2025-05-28 23:21:48',NULL),(2,'2','Panasonic 1.5HP Air Conditioner',129,39,'Fast cooling and durable','Panasonic 1.5HP with Nanoe-G technology for air purification and antibacterial filtering.','_658e193c-b13c-4f43-89d5-9013342ed703-removebg-preview.webp',1,1,'2025-05-28 23:21:48',NULL),(3,'3','LG DualCool 1HP Air Conditioner',139,26,'Two-way cooling, PM2.5 filter','LG DualCool 1HP with PM2.5 filter, fast cooling, energy-efficient operation.','_5667990a-f4c7-40ee-843b-6744a9c32d6d-removebg-preview.webp',1,0,'2025-05-28 23:21:48',NULL),(5,'3','Toshiba Inverter 1HP Air Conditioner',149,30,'Durable and quiet','Toshiba Inverter AC is energy-saving, quiet, and easy to clean.','daikin-inverter-1-5-hp-atkb35yvmv-thumb-638730710549575388-550x160.webp',1,1,'2025-05-28 23:21:48',NULL),(6,'3','Midea 1HP Air Conditioner',99,12,'Affordable and efficient','Midea 1HP is compact and budget-friendly, suitable for small rooms.','dieu-hoa-1-chieu-funiki-9000-btu-hsc-09tmu-3.webp',1,1,'2025-05-28 23:21:48',NULL),(7,'3','Sharp Inverter 1.5HP Air Conditioner',99,24,'Odor removal, antibacterial','Sharp features J-Tech Inverter and baby sleep mode for quiet cooling.','AnyConv.com__may-lanh-sharp-inverter-ah-x13zew-a .webp',1,0,'2025-05-28 23:21:48',NULL),(8,'9','Casper 1HP Air Conditioner',89,29,'Fast cooling, energy-saving','Casper AC is stylish and efficient, perfect for home use.','AnyConv.com__samsung-inverter-1-5-hp-ar13dyhzawknsv-thumb-638833568622860689-550x160.webp',1,1,'2025-05-28 23:21:48',NULL),(9,'5','Gree Inverter 1.5HP Air Conditioner',119,34,'Quiet and long-lasting','Gree with Cold Plasma tech for odor removal and germ protection.','bruh6.png',1,1,'2025-05-28 23:21:48',NULL),(10,'9','Reetech 1HP Air Conditioner',69,10,'Made in Vietnam','Reetech is reliable, cools efficiently, and reasonably priced.','AnyConv.com__dieu-hoa-1-chieu-nagakawa-inverter-nis-c09r2u51-a.webp',1,0,'2025-05-28 23:21:48',NULL),(11,'3','Funiki Inverter 1HP Air Conditioner',219,45,'Compact and energy-saving','Funiki 1HP is suitable for small spaces with quiet operation.','AnyConv.com__dieu-hoa-casper-9-000-btu-2-chieu-inverter-gh-09is33-3.webp',1,0,'2025-05-28 23:21:48',NULL),(12,'3','Aqua Inverter 1.5HP Air Conditioner',236,54,'Fast cooling with eco mode','Aqua AC provides stable cooling and good energy control.','AnyConv.com__dieu-hoa-casper-12-000-btu-2-chieu-inverter-gh-12is33-3.webp',1,1,'2025-05-28 23:21:48',NULL),(13,'5','Electrolux Inverter 1.5HP Air Conditioner',311,32,'Stylish and quiet','Electrolux offers minimal noise and sleek Scandinavian design.','AnyConv.com__dieu-hoa-casper-tc-09is36-nho.webp',1,1,'2025-05-28 23:21:48',NULL),(14,'5','Beko Inverter 1.5HP Air Conditioner',206,70,'Durable and modern','Beko with inverter technology and antibacterial filters.','bruh3.png',1,0,'2025-05-28 23:21:48',NULL),(15,'9','Nagakawa 1HP Air Conditioner',245,93,'Efficient and local brand','Nagakawa delivers reliable cooling for residential spaces.','AnyConv.com__dieu-hoa-casper-tc-24is36-300.webp',1,1,'2025-05-28 23:21:48',NULL),(16,'9','Sanyo Inverter 1HP Air Conditioner',317,57,'Smart cooling features','Sanyo AC includes auto restart, timer, and dehumidifier modes.','AnyConv.com__dieu-hoa-funiki-inverter-btu-hic-18tmu-300.webp',1,0,'2025-05-28 23:21:48',NULL),(17,'3','Hitachi 1.5HP Air Conditioner',366,51,'Advanced air purification','Hitachi features antibacterial and anti-mold filter systems.','AnyConv.com__dieu-hoa-mitsubishi-heavy-srk10yzp-w5-src10yzp-w5-300.webp',1,0,'2025-05-28 23:21:48',NULL),(18,'5','TCL 1HP Air Conditioner',409,87,'Affordable and reliable','TCL AC cools quickly and operates quietly for small rooms.','bruh7.png',1,0,'2025-05-28 23:21:48',NULL),(19,'3','Sanaky Inverter 1HP Air Conditioner',500,50,'Compact and efficient','Sanaky delivers basic features at budget-friendly price.','AnyConv.com__dieu-hoa-samsung-ar10dyhzawknsv-a.webp',1,0,'2025-05-28 23:21:48',NULL),(20,'3','Asanzo 1HP Air Conditioner',359,74,'Made in Vietnam','Asanzo delivers basic features at budget-friendly price.','AnyConv.com__dieu-hoa-samsung-ar13dyhzawknsv-300.webp',1,0,'2025-05-28 23:21:48',NULL),(21,'9','Haier Inverter 1.5HP Air Conditioner',699,26,'Fast cooling, low power usage','Haier AC with inverter tech and smart airflow control.','AnyConv.com__dieu-hoa-sharp-ah-x18zew-300.webp',1,0,'2025-05-28 23:21:48',NULL),(22,'5','Kangaroo 1HP Air Conditioner',907,27,'Quiet operation','Kangaroo AC includes antibacterial filter and low noise fan.','bruh4.png',1,0,'2025-05-28 23:21:48',NULL),(23,'9','Sunhouse 1.5HP Air Conditioner',599,86,'Easy to maintain','Sunhouse comes with self-cleaning mode and remote control.','AnyConv.com__panasonic-inverter-1-5-hp-cu-cs-xu12bkh-8-200325-060309-370-550x160.webp',1,0,'2025-05-28 23:21:48',NULL),(24,'3','Ariston Inverter 1HP Air Conditioner',277,65,'Premium build quality','Ariston AC has eco mode and sleep mode functions.','AnyConv.com__panasonic-inverter-1-hp-cu-cs-u9bkh-8-190325-053042-080-550x160.webp',1,0,'2025-05-28 23:21:48',NULL),(25,'5','Alaska 1HP Air Conditioner',459,29,'Stylish and smart','Alaska AC designed for small rooms with basic needs.','bruh8.png',1,1,'2025-05-28 23:21:48',NULL),(26,'9','Daiwa Inverter 1HP Air Conditioner',653,72,'Quiet and minimalistic','Daiwa includes fast cooling and low vibration compressor.','AnyConv.com__may-lanh-sharp-inverter-ah-x13zew-a.webp',1,1,'2025-05-28 23:21:48',NULL),(27,'3','Kachi 1HP Air Conditioner',265,12,'Japanese technology','Kachi AC offers smart temperature adjustment and quiet mode.','AnyConv.com__may-lanh-midea-msaga-13crdn8-300.webp',1,0,'2025-05-28 23:21:48',NULL),(28,'5','Kaminomoto Inverter 1.5HP AC',436,51,'Smart and silent','Kaminomoto combines fast cooling with stable performance.','bruh2.png',1,0,'2025-05-28 23:21:48',NULL),(29,'9','Xiaomi SmartMi Air Conditioner',364,15,'App-controlled cooling','Xiaomi AC connects with mobile app, includes voice control.','AnyConv.com__may-lanh-sharp-inverter-1-5hp-ah-x13cewc-a.webp',1,0,'2025-05-28 23:21:48',NULL),(30,'3','Toshiba 2HP Air Conditioner',655,11,'Efficient for large rooms','Toshiba 2HP with wide airflow and dual filters.','AnyConv.com__may-lanh-casper-sc-09fb36a-300.webp',1,0,'2025-05-28 23:21:48',NULL),(31,'5','LG Inverter 2HP DualCool',722,33,'Powerful for big rooms','Great for 25ÔÇô35m┬▓ rooms with fast cooling and PM2.5 filter.','bruh9.png',1,0,'2025-05-28 23:21:48',NULL),(32,'9','Daikin 2HP Inverter Premium',532,37,'Dual inverter technology','Daikin premium 2HP AC with smart sensors and stable airflow.','AnyConv.com__may-lanh-casper-qc-09is36-300.webp',1,1,'2025-05-28 23:21:48',NULL),(33,'5','Samsung Inverter 2HP WindFree',6099,39,'Top-tier cooling solution','Samsung WindFree gently spreads cool air with no wind blast.','bruh5.png',1,0,'2025-05-28 23:21:48',NULL),(34,'9','Casper 2HP Air Conditioner',1088,81,'No cold drafts','Casper 2HP fits well for large homes and meeting rooms.','AnyConv.com__tải xuống.webp',1,1,'2025-05-28 23:21:48',NULL),(35,'3','Midea Inverter 2HP',1277,90,'Great value large AC','Midea 2HP provides high efficiency with eco mode support.','AnyConv.com__bruh.webp',1,0,'2025-05-28 23:21:48',NULL),(36,'9','Reetech 2HP Air Conditioner',2039,91,'Reliable and cost-saving','Reetech AC covers wide area with fast cooling mode.','AnyConv.com__bruh2.webp',1,1,'2025-05-28 23:21:48',NULL),(37,'5','Gree 2HP Air Conditioner',3660,92,'Strong airflow for big space','Gree delivers consistent temperature even in large areas.','bruh.png',1,0,'2025-05-28 23:21:48',NULL),(38,'3','Sharp Inverter 2HP AC',4240,93,'Powerful and stable','Sharp AC features auto-clean, baby sleep mode, and inverter.','AnyConv.com__—Pngtree—air conditioning_2245972.webp',1,0,'2025-05-28 23:21:48',NULL),(39,'9','Panasonic 2HP Premium Inverter',7760,94,'Modern features','Panasonic premium with advanced Nanoe-X purification.','AnyConv.com__—Pngtree—air conditioner_20457936.webp',1,1,'2025-05-28 23:21:48',NULL),(40,'4','new acs 2025',50,12,'new air conditioners','very good','1750428698.jpg',1,1,'2025-06-20 07:11:38',NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reviews` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `member_id` bigint(20) unsigned DEFAULT NULL,
  `product_id` bigint(20) unsigned NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reviews_user_id_foreign` (`user_id`),
  KEY `reviews_member_id_foreign` (`member_id`),
  KEY `reviews_product_id_foreign` (`product_id`),
  CONSTRAINT `reviews_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE,
  CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
INSERT INTO `reviews` VALUES (1,NULL,3,2,'great job','2025-06-21 02:46:42','2025-06-21 02:46:42'),(2,NULL,4,5,'very good site, i\'m love this','2025-06-21 07:04:29','2025-06-21 07:04:29'),(3,NULL,4,5,'amazing site','2025-06-21 07:16:03','2025-06-21 07:16:03'),(4,3,NULL,15,'web rất dễ xài, thao tác','2025-06-21 07:22:34','2025-06-21 07:22:34');
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` tinyint(4) NOT NULL DEFAULT 2,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Hải','hai@gmail.com','$2y$10$/37JdV6GWnAOFdLqN7ZQN.FMhEw9qBPfVSdkpjQBsjRIGOIHZenfa',2,'2025-06-19 07:06:50','2025-06-19 07:06:50'),(2,'Quân','quanbel@gmail.com','$2y$10$xnjMLPowQlDsvf3TaGjT4OaBURzaTWIzJ4LbrMhOguqYXTxt6wPSa',2,'2025-06-19 07:24:49','2025-06-19 07:24:49'),(3,'Đỗ Duy Khải','khai@gmail.com','$2y$10$ozHYvNil3gS.DWfvKByLaOtAdEtJ7zmlm4iu1at6NH.SBDbvZrBEm',2,'2025-06-21 07:18:29','2025-06-21 07:18:29'),(4,'Mẵn','man@gmail.com','$2y$10$7WIDvBAaKU7TOyBnodut2OFkucHL72h98E8TT0obSLfCt3ECWQ8q.',2,'2025-06-21 19:27:42','2025-06-21 19:27:42');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'laravel'
--

--
-- Dumping routines for database 'laravel'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-06-22 14:26:59

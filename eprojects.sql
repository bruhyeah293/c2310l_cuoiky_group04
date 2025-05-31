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
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `parent` int(11) NOT NULL DEFAULT 0 COMMENT 'Parent category ID, 0 for root categories',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_category_parent` (`parent`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Air Conditioner 1HP',0,'2025-05-28 21:36:18',NULL),(2,'Air Conditioner 1.5HP',0,'2025-05-28 21:36:18',NULL),(3,'Air Conditioner 2HP',1,'2025-05-28 21:36:18',NULL),(4,'Air Conditioner 2.5HP',1,'2025-05-28 21:36:18',NULL),(5,'Air Conditioner 3HP',2,'2025-05-28 21:36:18',NULL);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
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
  `level` int(11) NOT NULL DEFAULT 2 COMMENT '1=Admin, 2=Customer',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `members_email_unique` (`email`),
  KEY `idx_members_level` (`level`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `members`
--

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;
INSERT INTO `members` VALUES (1,'lenhath6@gmail.com','$2y$10$5WilfQgyg0HC7X2TUxGivu7/MGHyld2Y3zApkX.DiGaeQTyUd295q',1,NULL,'2022-07-20 16:07:50','2022-07-29 01:32:11'),(2,'xyz@gmail.com','$2y$10$14mnuXJrOcBaBG.pgN44UOllGeawZ3QT6vLrTEMw6yEPnX0Ktcd4O',2,NULL,'2022-07-29 01:34:31',NULL),(3,'khoi2009@gmail.com','$2y$10$kmfCUCyFlaXj0AcP//ZZMu3EXQwgAmZntlFUEHeqtMsQV5N2f.e0q',1,NULL,'2025-05-31 05:49:39',NULL),(4,'norbao@gmail.com','$2y$10$/yyV3cPUp7WbnVrhusYrQuBWpdhyb/VRZLTBMk8pehNmoGssPhO0q',2,NULL,'2025-05-31 05:49:39',NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2022_06_30_205353_create_members_table',1),(6,'2022_07_01_192112_create_products_table',1),(7,'2022_07_01_192234_create_category_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
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
  `category_id` int(11) NOT NULL COMMENT 'Reference to category.id',
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT 0.00 COMMENT 'Product price in USD',
  `intro` text NOT NULL COMMENT 'Short product description',
  `content` text DEFAULT NULL COMMENT 'Detailed product description',
  `image` varchar(255) NOT NULL COMMENT 'Product image filename',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=Active, 0=Inactive',
  `featured` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1=Featured, 0=Normal',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_products_category` (`category_id`),
  KEY `idx_products_status` (`status`),
  KEY `idx_products_featured` (`featured`),
  KEY `idx_products_price` (`price`),
  KEY `idx_category_status_featured` (`category_id`,`status`,`featured`),
  KEY `idx_price_status` (`price`,`status`),
  FULLTEXT KEY `ft_product_search` (`name`,`intro`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,3,'Daikin Inverter 1HP Air Conditioner',99.00,'Energy-saving and quiet operation','Daikin Inverter 1HP AC with power-saving technology, ideal for rooms 10ÔÇô15m┬▓.','bruh10.webp',1,1,'2025-05-29 06:21:48',NULL),(2,2,'Panasonic 1.5HP Air Conditioner',129.00,'Fast cooling and durable','Panasonic 1.5HP with Nanoe-G technology for air purification and antibacterial filtering.','_658e193c-b13c-4f43-89d5-9013342ed703-removebg-preview.webp',1,1,'2025-05-29 06:21:48',NULL),(3,3,'LG DualCool 1HP Air Conditioner',139.00,'Two-way cooling, PM2.5 filter','LG DualCool 1HP with PM2.5 filter, fast cooling, energy-efficient operation.','_5667990a-f4c7-40ee-843b-6744a9c32d6d-removebg-preview.webp',1,0,'2025-05-29 06:21:48',NULL),(4,5,'Samsung WindFree 1HP Air Conditioner',89.00,'No direct wind flow','Samsung WindFree offers gentle cooling with wind dispersion technology.','_a635eadb-4c4a-44a5-b394-af2dd8424ed1-removebg-preview.webp',1,1,'2025-05-29 06:21:48',NULL),(5,3,'Toshiba Inverter 1HP Air Conditioner',149.00,'Durable and quiet','Toshiba Inverter AC is energy-saving, quiet, and easy to clean.','daikin-inverter-1-5-hp-atkb35yvmv-thumb-638730710549575388-550x160.webp',1,1,'2025-05-29 06:21:48',NULL),(6,3,'Midea 1HP Air Conditioner',99.00,'Affordable and efficient','Midea 1HP is compact and budget-friendly, suitable for small rooms.','dieu-hoa-1-chieu-funiki-9000-btu-hsc-09tmu-3.webp',1,1,'2025-05-29 06:21:48',NULL),(7,3,'Sharp Inverter 1.5HP Air Conditioner',99.00,'Odor removal, antibacterial','Sharp features J-Tech Inverter and baby sleep mode for quiet cooling.','AnyConv.com__may-lanh-sharp-inverter-ah-x13zew-a .webp',1,0,'2025-05-29 06:21:48',NULL),(8,9,'Casper 1HP Air Conditioner',89.00,'Fast cooling, energy-saving','Casper AC is stylish and efficient, perfect for home use.','AnyConv.com__samsung-inverter-1-5-hp-ar13dyhzawknsv-thumb-638833568622860689-550x160.webp',1,1,'2025-05-29 06:21:48',NULL),(9,5,'Gree Inverter 1.5HP Air Conditioner',119.00,'Quiet and long-lasting','Gree with Cold Plasma tech for odor removal and germ protection.','bruh6.png',1,1,'2025-05-29 06:21:48',NULL),(10,9,'Reetech 1HP Air Conditioner',69.00,'Made in Vietnam','Reetech is reliable, cools efficiently, and reasonably priced.','AnyConv.com__dieu-hoa-1-chieu-nagakawa-inverter-nis-c09r2u51-a.webp',1,0,'2025-05-29 06:21:48',NULL),(11,3,'Funiki Inverter 1HP Air Conditioner',219.00,'Compact and energy-saving','Funiki 1HP is suitable for small spaces with quiet operation.','AnyConv.com__dieu-hoa-casper-9-000-btu-2-chieu-inverter-gh-09is33-3.webp',1,0,'2025-05-29 06:21:48',NULL),(12,3,'Aqua Inverter 1.5HP Air Conditioner',236.00,'Fast cooling with eco mode','Aqua AC provides stable cooling and good energy control.','AnyConv.com__dieu-hoa-casper-12-000-btu-2-chieu-inverter-gh-12is33-3.webp',1,1,'2025-05-29 06:21:48',NULL),(13,5,'Electrolux Inverter 1.5HP Air Conditioner',311.00,'Stylish and quiet','Electrolux offers minimal noise and sleek Scandinavian design.','AnyConv.com__dieu-hoa-casper-tc-09is36-nho.webp',1,1,'2025-05-29 06:21:48',NULL),(14,5,'Beko Inverter 1.5HP Air Conditioner',206.00,'Durable and modern','Beko with inverter technology and antibacterial filters.','bruh3.png',1,0,'2025-05-29 06:21:48',NULL),(15,9,'Nagakawa 1HP Air Conditioner',245.00,'Efficient and local brand','Nagakawa delivers reliable cooling for residential spaces.','AnyConv.com__dieu-hoa-casper-tc-24is36-300.webp',1,1,'2025-05-29 06:21:48',NULL),(16,9,'Sanyo Inverter 1HP Air Conditioner',317.00,'Smart cooling features','Sanyo AC includes auto restart, timer, and dehumidifier modes.','AnyConv.com__dieu-hoa-funiki-inverter-btu-hic-18tmu-300.webp',1,0,'2025-05-29 06:21:48',NULL),(17,3,'Hitachi 1.5HP Air Conditioner',366.00,'Advanced air purification','Hitachi features antibacterial and anti-mold filter systems.','AnyConv.com__dieu-hoa-mitsubishi-heavy-srk10yzp-w5-src10yzp-w5-300.webp',1,0,'2025-05-29 06:21:48',NULL),(18,5,'TCL 1HP Air Conditioner',409.00,'Affordable and reliable','TCL AC cools quickly and operates quietly for small rooms.','bruh7.png',1,0,'2025-05-29 06:21:48',NULL),(19,3,'Sanaky Inverter 1HP Air Conditioner',500.00,'Compact and efficient','Sanaky delivers basic features at budget-friendly price.','AnyConv.com__dieu-hoa-samsung-ar10dyhzawknsv-a.webp',1,0,'2025-05-29 06:21:48',NULL),(20,3,'Asanzo 1HP Air Conditioner',359.00,'Made in Vietnam','Asanzo delivers basic features at budget-friendly price.','AnyConv.com__dieu-hoa-samsung-ar13dyhzawknsv-300.webp',1,0,'2025-05-29 06:21:48',NULL),(21,9,'Haier Inverter 1.5HP Air Conditioner',699.00,'Fast cooling, low power usage','Haier AC with inverter tech and smart airflow control.','AnyConv.com__dieu-hoa-sharp-ah-x18zew-300.webp',1,0,'2025-05-29 06:21:48',NULL),(22,5,'Kangaroo 1HP Air Conditioner',907.00,'Quiet operation','Kangaroo AC includes antibacterial filter and low noise fan.','bruh4.png',1,0,'2025-05-29 06:21:48',NULL),(23,9,'Sunhouse 1.5HP Air Conditioner',599.00,'Easy to maintain','Sunhouse comes with self-cleaning mode and remote control.','AnyConv.com__panasonic-inverter-1-5-hp-cu-cs-xu12bkh-8-200325-060309-370-550x160.webp',1,0,'2025-05-29 06:21:48',NULL),(24,3,'Ariston Inverter 1HP Air Conditioner',277.00,'Premium build quality','Ariston AC has eco mode and sleep mode functions.','AnyConv.com__panasonic-inverter-1-hp-cu-cs-u9bkh-8-190325-053042-080-550x160.webp',1,0,'2025-05-29 06:21:48',NULL),(25,5,'Alaska 1HP Air Conditioner',459.00,'Stylish and smart','Alaska AC designed for small rooms with basic needs.','bruh8.png',1,1,'2025-05-29 06:21:48',NULL),(26,9,'Daiwa Inverter 1HP Air Conditioner',653.00,'Quiet and minimalistic','Daiwa includes fast cooling and low vibration compressor.','AnyConv.com__may-lanh-sharp-inverter-ah-x13zew-a.webp',1,1,'2025-05-29 06:21:48',NULL),(27,3,'Kachi 1HP Air Conditioner',265.00,'Japanese technology','Kachi AC offers smart temperature adjustment and quiet mode.','AnyConv.com__may-lanh-midea-msaga-13crdn8-300.webp',1,0,'2025-05-29 06:21:48',NULL),(28,5,'Kaminomoto Inverter 1.5HP AC',436.00,'Smart and silent','Kaminomoto combines fast cooling with stable performance.','bruh2.png',1,0,'2025-05-29 06:21:48',NULL),(29,9,'Xiaomi SmartMi Air Conditioner',364.00,'App-controlled cooling','Xiaomi AC connects with mobile app, includes voice control.','AnyConv.com__may-lanh-sharp-inverter-1-5hp-ah-x13cewc-a.webp',1,0,'2025-05-29 06:21:48',NULL),(30,3,'Toshiba 2HP Air Conditioner',655.00,'Efficient for large rooms','Toshiba 2HP with wide airflow and dual filters.','AnyConv.com__may-lanh-casper-sc-09fb36a-300.webp',1,0,'2025-05-29 06:21:48',NULL),(31,5,'LG Inverter 2HP DualCool',722.00,'Powerful for big rooms','Great for 25ÔÇô35m┬▓ rooms with fast cooling and PM2.5 filter.','bruh9.png',1,0,'2025-05-29 06:21:48',NULL),(32,9,'Daikin 2HP Inverter Premium',532.00,'Dual inverter technology','Daikin premium 2HP AC with smart sensors and stable airflow.','AnyConv.com__may-lanh-casper-qc-09is36-300.webp',1,1,'2025-05-29 06:21:48',NULL),(33,5,'Samsung Inverter 2HP WindFree',6099.00,'Top-tier cooling solution','Samsung WindFree gently spreads cool air with no wind blast.','bruh5.png',1,0,'2025-05-29 06:21:48',NULL),(34,9,'Casper 2HP Air Conditioner',1088.00,'No cold drafts','Casper 2HP fits well for large homes and meeting rooms.','AnyConv.com__tải xuống.webp',1,1,'2025-05-29 06:21:48',NULL),(35,3,'Midea Inverter 2HP',1277.00,'Great value large AC','Midea 2HP provides high efficiency with eco mode support.','AnyConv.com__bruh.webp',1,0,'2025-05-29 06:21:48',NULL),(36,9,'Reetech 2HP Air Conditioner',2039.00,'Reliable and cost-saving','Reetech AC covers wide area with fast cooling mode.','AnyConv.com__bruh2.webp',1,1,'2025-05-29 06:21:48',NULL),(37,5,'Gree 2HP Air Conditioner',3660.00,'Strong airflow for big space','Gree delivers consistent temperature even in large areas.','bruh.png',1,0,'2025-05-29 06:21:48',NULL),(38,3,'Sharp Inverter 2HP AC',4240.00,'Powerful and stable','Sharp AC features auto-clean, baby sleep mode, and inverter.','AnyConv.com__—Pngtree—air conditioning_2245972.webp',1,0,'2025-05-29 06:21:48',NULL),(39,9,'Panasonic 2HP Premium Inverter',7760.00,'Modern features','Panasonic premium with advanced Nanoe-X purification.','AnyConv.com__—Pngtree—air conditioner_20457936.webp',1,1,'2025-05-29 06:21:48',NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
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
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
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

-- Dump completed on 2025-05-31 21:01:44

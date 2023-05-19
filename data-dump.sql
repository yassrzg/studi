-- MariaDB dump 10.19  Distrib 10.6.12-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: studiecf
-- ------------------------------------------------------
-- Server version	10.6.12-MariaDB-0ubuntu0.22.04.1

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
-- Table structure for table `allergie`
--

DROP TABLE IF EXISTS `allergie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `allergie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `allergie`
--

LOCK TABLES `allergie` WRITE;
/*!40000 ALTER TABLE `allergie` DISABLE KEYS */;
INSERT INTO `allergie` VALUES (1,'noisette'),(2,'lait'),(3,'chocolat');
/*!40000 ALTER TABLE `allergie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorie`
--

LOCK TABLES `categorie` WRITE;
/*!40000 ALTER TABLE `categorie` DISABLE KEYS */;
INSERT INTO `categorie` VALUES (1,'Desert'),(2,'Entrée'),(3,'Plat Principal'),(4,'Boissons');
/*!40000 ALTER TABLE `categorie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `creneaux`
--

DROP TABLE IF EXISTS `creneaux`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `creneaux` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reservation_id` int(11) DEFAULT NULL,
  `date` datetime NOT NULL,
  `nombre_couvert` int(11) NOT NULL,
  `nombre_couvert_restant` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_77F13C6DB83297E7` (`reservation_id`),
  CONSTRAINT `FK_77F13C6DB83297E7` FOREIGN KEY (`reservation_id`) REFERENCES `reservation` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `creneaux`
--

LOCK TABLES `creneaux` WRITE;
/*!40000 ALTER TABLE `creneaux` DISABLE KEYS */;
INSERT INTO `creneaux` VALUES (92,NULL,'2023-05-29 20:30:00',4,16),(93,NULL,'2023-06-17 22:00:00',1,18),(94,NULL,'2023-05-15 20:00:00',4,16),(95,NULL,'2023-05-15 12:00:00',5,0),(96,NULL,'2023-05-18 11:00:00',3,10);
/*!40000 ALTER TABLE `creneaux` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctrine_migration_versions`
--

LOCK TABLES `doctrine_migration_versions` WRITE;
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
INSERT INTO `doctrine_migration_versions` VALUES ('DoctrineMigrations\\Version20230503191900','2023-05-03 19:20:11',125),('DoctrineMigrations\\Version20230503194507','2023-05-03 19:45:31',74),('DoctrineMigrations\\Version20230504105821','2023-05-04 10:58:55',227),('DoctrineMigrations\\Version20230504110001','2023-05-04 11:00:06',202),('DoctrineMigrations\\Version20230504110630','2023-05-04 11:06:48',296),('DoctrineMigrations\\Version20230504112244','2023-05-04 11:22:47',70),('DoctrineMigrations\\Version20230504115823','2023-05-04 11:58:27',53),('DoctrineMigrations\\Version20230504120640','2023-05-04 12:06:50',88),('DoctrineMigrations\\Version20230504131042','2023-05-04 13:10:55',97),('DoctrineMigrations\\Version20230504144917','2023-05-04 14:50:39',23),('DoctrineMigrations\\Version20230504145154','2023-05-04 14:51:58',34),('DoctrineMigrations\\Version20230505082040','2023-05-05 08:20:49',87),('DoctrineMigrations\\Version20230505093249','2023-05-05 09:33:08',747),('DoctrineMigrations\\Version20230505110300','2023-05-05 11:03:04',196),('DoctrineMigrations\\Version20230505121910','2023-05-05 12:19:23',59),('DoctrineMigrations\\Version20230505123134','2023-05-05 12:31:38',163),('DoctrineMigrations\\Version20230505134920','2023-05-05 13:49:25',62),('DoctrineMigrations\\Version20230506100012','2023-05-06 10:00:16',79),('DoctrineMigrations\\Version20230509091333','2023-05-09 09:13:47',96),('DoctrineMigrations\\Version20230509144824','2023-05-09 14:48:30',79),('DoctrineMigrations\\Version20230510072420','2023-05-10 07:25:16',91),('DoctrineMigrations\\Version20230510081914','2023-05-10 08:19:20',64),('DoctrineMigrations\\Version20230510123606','2023-05-10 12:36:20',110),('DoctrineMigrations\\Version20230510183042','2023-05-10 18:30:47',71),('DoctrineMigrations\\Version20230511065817','2023-05-11 06:58:20',110),('DoctrineMigrations\\Version20230511092955','2023-05-11 09:29:59',63),('DoctrineMigrations\\Version20230511113940','2023-05-11 11:39:43',249),('DoctrineMigrations\\Version20230511132051','2023-05-11 13:20:54',301),('DoctrineMigrations\\Version20230511144445','2023-05-11 14:44:49',536),('DoctrineMigrations\\Version20230511153533','2023-05-11 15:35:37',66),('DoctrineMigrations\\Version20230511183155','2023-05-11 18:31:59',85),('DoctrineMigrations\\Version20230511183540','2023-05-11 18:35:43',212),('DoctrineMigrations\\Version20230511184111','2023-05-11 18:41:14',252),('DoctrineMigrations\\Version20230511193820','2023-05-11 19:38:23',46),('DoctrineMigrations\\Version20230511213509','2023-05-11 21:35:14',12),('DoctrineMigrations\\Version20230512105501','2023-05-12 10:55:05',22),('DoctrineMigrations\\Version20230512115044','2023-05-12 11:51:14',86),('DoctrineMigrations\\Version20230512132428','2023-05-12 13:24:32',60),('DoctrineMigrations\\Version20230513214959','2023-05-13 21:50:04',130),('DoctrineMigrations\\Version20230515105900','2023-05-15 10:59:13',164),('DoctrineMigrations\\Version20230515125437','2023-05-15 12:54:42',47),('DoctrineMigrations\\Version20230516113207','2023-05-16 11:32:12',341);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES (3,'yassine'),(4,'yass');
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messenger_messages`
--

LOCK TABLES `messenger_messages` WRITE;
/*!40000 ALTER TABLE `messenger_messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `messenger_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nos_produits`
--

DROP TABLE IF EXISTS `nos_produits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nos_produits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `illustration` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `price` double NOT NULL,
  `titre_illustration` varchar(255) NOT NULL,
  `best_menu` tinyint(1) NOT NULL,
  `menu_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_1200AB5E12469DE2` (`category_id`),
  KEY `IDX_1200AB5ECCD7E912` (`menu_id`),
  CONSTRAINT `FK_1200AB5E12469DE2` FOREIGN KEY (`category_id`) REFERENCES `categorie` (`id`),
  CONSTRAINT `FK_1200AB5ECCD7E912` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nos_produits`
--

LOCK TABLES `nos_produits` WRITE;
/*!40000 ALTER TABLE `nos_produits` DISABLE KEYS */;
INSERT INTO `nos_produits` VALUES (1,3,'sandwitch saumon','sandwitch-saumon','87e3d7f513250bd8848f087ff488aade0efa331b. png','sandwitch saumon','notre meilleur sandwitch au saumon',1400,'photo sandwitch',1,3),(2,1,'sandwitch loulou','sandwitch-loulou','12de6c9a824897466e17a2bd95f94d3ae115bdae. png','sandwitch loulou','sandwitch loulou',1000,'sandwitch loulou',1,3),(3,2,'sandwitch loulou2','sandwitch-loulou2','224307accad463d714198cadb5283aa1bba171d7. jpg','sandwitch loulou2','sandwitch loulou2',1000,'sandwitch loulou2',1,3),(4,1,'sandwitch loulou32','sandwitch-loulou32','bee2de9a5568f11462c8cf4c5ac825119c0aaa50. jpg','sandwitch loulou322','sandwitch loulou32222',1500,'sandwitch loulou32',1,4),(5,1,'sandwitch loulou84','sandwitch-loulou84','a3d360a129baf57f96495f54e7a017b2e6623d6c. jpg','sandwitch loulou84','sandwitch loulou844444',800,'sandwitch loulou4',1,4),(6,3,'sandwitch 84','sandwitch-84','a2b57203e1301f8ff9750f111cd5afd9829a0840. jpg','sandwitch84','sandwitch84',1000,'sandwitch84',0,4),(7,3,'plat principal','plat-principal','d042391bf7bf4965a466380de41c33407eaa36d1. png','plat principal','plat principal',1500,'plat principal',0,3),(8,3,'plat principal','plat-principal','2674e6eb5bc1d389f5060c37449bdfa7c89b9101. jpg','plat principal','plat principal',2000,'plat principal',0,NULL),(11,4,'powerade','powerade','69640e3e87f306d2db10debfd2ca39b702bab327. jpg','powerade','powerade',1000,'powerade',0,NULL);
/*!40000 ALTER TABLE `nos_produits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `couverts` int(11) NOT NULL,
  `heure` time NOT NULL,
  `allergie` longtext DEFAULT NULL COMMENT '(DC2Type:simple_array)',
  `couvert_restant_id` int(11) DEFAULT NULL,
  `lastname` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_42C84955633A828` (`couvert_restant_id`),
  CONSTRAINT `FK_42C84955633A828` FOREIGN KEY (`couvert_restant_id`) REFERENCES `restaurant_hours` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=187 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservation`
--

LOCK TABLES `reservation` WRITE;
/*!40000 ALTER TABLE `reservation` DISABLE KEYS */;
INSERT INTO `reservation` VALUES (163,'yassine','yass.srgrzg@gmail.com','2023-05-01',1,'21:30:00','noisette,lait,chocolat',NULL,'rzg'),(164,'yassine','test14@gmail.com','2023-05-15',3,'12:00:00','noisette,lait,chocolat',NULL,'yass'),(165,'yassine','yass14@gmail.com','2023-05-15',1,'19:00:00','chocolat',NULL,'yass'),(166,'yassine','yass14@gmail.com','2023-05-15',1,'19:00:00','chocolat',NULL,'yass'),(167,'yassine','yass14@gmail.com','2023-05-15',1,'19:00:00','chocolat',NULL,'yass'),(168,'yassine','yass.srgrzg@gmail.com','2023-05-15',1,'21:00:00','noisette,lait,chocolat',NULL,'yass'),(169,'yassine','yass.srgrzg@gmail.com','2023-05-15',1,'22:00:00','chocolat',NULL,'yass'),(170,'yassine','yass.srgrzg@gmail.com','2023-05-15',1,'22:00:00','chocolat',NULL,'yass'),(171,'yassine','yass.srgrzg@gmail.com','2023-05-28',6,'12:00:00','noisette,lait,chocolat',NULL,'rzg'),(172,'yassine','yass.srgrzg@gmail.com','2023-05-28',6,'12:00:00','noisette,lait,chocolat',NULL,'rzg'),(173,'yassine','yass.srgrzg@gmail.com','2023-05-29',4,'20:00:00','noisette,lait,chocolat',NULL,'rzg'),(174,'yassine','yass.srgrzg@gmail.com','2023-05-29',4,'20:30:00','noisette,lait,chocolat',NULL,'rzg'),(175,'yassine','yass.srgrzg@gmail.com','2023-06-17',1,'22:00:00','noisette,lait,chocolat',NULL,'rzg'),(176,'yassine','yass.srgrzg@gmail.com','2023-06-17',1,'22:00:00','noisette,lait,chocolat',NULL,'rzg'),(177,'Benoit','fbenital@gmail.com','2023-05-15',4,'20:00:00',NULL,NULL,'FERREIRA-SANTOS'),(178,'Benoit','fbenital@gmail.com','2023-05-15',5,'12:00:00','lait,chocolat',NULL,'FERREIRA-SANTOS'),(179,'Benoit','fbenital@gmail.com','2023-05-15',5,'12:00:00','lait,chocolat',NULL,'FERREIRA-SANTOS'),(180,'Benoit','fbenital@gmail.com','2023-05-15',5,'12:00:00','lait,chocolat',NULL,'FERREIRA-SANTOS'),(181,'Benoit','fbenital@gmail.com','2023-05-15',5,'12:00:00','lait,chocolat',NULL,'FERREIRA-SANTOS'),(182,'yas122','yass.srgrzg@gmail.com','2023-05-18',3,'11:00:00','noisette,lait,chocolat',NULL,'rzg'),(183,'yas122','yass.srgrzg@gmail.com','2023-05-18',3,'11:00:00','noisette,lait,chocolat',NULL,'rzg'),(184,'yass','leilassine@gmail.com','2023-05-18',3,'11:00:00','chocolat',NULL,'rzg'),(185,'yass','leilassine@gmail.com','2023-05-18',3,'11:00:00','chocolat',NULL,'rzg'),(186,'yassine','leilassine@gmail.com','2023-05-18',1,'11:00:00','lait,chocolat',NULL,'rzg');
/*!40000 ALTER TABLE `reservation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reset_password`
--

DROP TABLE IF EXISTS `reset_password`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reset_password` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_B9983CE5A76ED395` (`user_id`),
  CONSTRAINT `FK_B9983CE5A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reset_password`
--

LOCK TABLES `reset_password` WRITE;
/*!40000 ALTER TABLE `reset_password` DISABLE KEYS */;
INSERT INTO `reset_password` VALUES (1,18,'646233123685f','2023-05-15 13:26:42'),(2,18,'64623344df3af','2023-05-15 13:27:32'),(3,18,'646233c1347d4','2023-05-15 13:29:37'),(4,18,'646233c35dc7d','2023-05-15 13:29:39'),(5,18,'6462349270a35','2023-05-15 13:33:06'),(6,18,'646237ce534db','2023-05-15 13:46:54'),(7,18,'64623c2cd570a','2023-05-15 14:05:32'),(8,18,'646240953aea1','2023-05-15 14:24:21'),(9,18,'64633659d81d8','2023-05-16 07:52:57');
/*!40000 ALTER TABLE `reset_password` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `restaurant_hours`
--

DROP TABLE IF EXISTS `restaurant_hours`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `restaurant_hours` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jours` varchar(255) NOT NULL,
  `open_hours` time DEFAULT NULL,
  `close_hours` time DEFAULT NULL,
  `open_hours_soir` time DEFAULT NULL,
  `close_hours_soir` time DEFAULT NULL,
  `intervalle_horaire` int(11) NOT NULL,
  `nombre_couvert_max` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `restaurant_hours`
--

LOCK TABLES `restaurant_hours` WRITE;
/*!40000 ALTER TABLE `restaurant_hours` DISABLE KEYS */;
INSERT INTO `restaurant_hours` VALUES (1,'Monday','12:00:00','14:00:00','19:00:00','22:00:00',30,20),(2,'Tuesday','12:00:00','14:00:00','19:00:00','22:00:00',15,30),(7,'Wednesday',NULL,NULL,NULL,NULL,0,NULL),(8,'Thursday','11:00:00','14:00:00','19:00:00','22:00:00',30,23),(9,'Friday','12:00:00','14:00:00','19:00:00','22:00:00',20,17),(10,'Saturday',NULL,NULL,'19:00:00','23:00:00',60,20),(11,'Sunday','12:00:00','14:00:00',NULL,NULL,20,19);
/*!40000 ALTER TABLE `restaurant_hours` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) NOT NULL,
  `roles` longtext NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `allergie` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (13,'test@gmail.com','[]','$2y$13$nVhsLpTB30sz6tHdpI4f..UKZVujJUXle3YmFkjjpabwR0mxMb13C','yassine','rezgui','noisette,lait,chocolat'),(15,'test1@gmail.com','[]','$2y$13$sf4jN1ZlSG.18Wq1j7wj0.aqdbNATx//bSDKybDFJlC4RH0oUYl9y','yassine','rezgui','noisette,lait,chocolat'),(16,'test123@gmail.com','[]','$2y$13$ABRkUR5YaJZ/Y7Dhz41JpepX8Du59RNY5hvUGns/F6EIZsGhzMsZi','yassine','yass',''),(17,'leilassine@gmail.com','[]','$2y$13$Un7Xd2tVzOias0AEbaAom.nO.3t8hmZ2OLsBoYbN6KhjcGwk10hL6','yass','rzg','noisette,lait'),(18,'yass.srgrzg@gmail.com','[]','$2y$13$n7Gj1gXhnz2nSRhOiZ2/menODy44hC0D25mJ0h5ZADVDUzVdusq0m','yas122','rzg','noisette,lait,chocolat'),(19,'fbenital@gmail.com','[]','$2y$13$6xKgV1hd9Om3cKjqVldLQeNnwiWQurLT/5kUKfqkksyuGbesUNks.','Benoit','FERREIRA-SANTOS','lait,chocolat'),(20,'studiECF@test.com','[\"ROLE_ADMIN\"]','$2y$13$6aRW155U6cjI6HAfi3BJ5eFRcbS9pJt6Qj6pCq5yAKv9HUDmAPDiG','studiECF','studiECF',''),(21,'test1458@gmail.com','[]','$2y$13$NkJyC//fFtZ2Fk5ZbY.lhuaiS5ZbY5.C/nRHHrvTUyM2WEZ.UMJju','yassine','rezgui',''),(22,'test145788@gmail.com','[]','$2y$13$xZ9OnOpJPDFhj/AMLOJxGObYKzZodeIBniF22Rn9UJY/RFVmhDENi','yassine','rezgui','');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_allergie`
--

DROP TABLE IF EXISTS `user_allergie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_allergie` (
  `user_id` int(11) NOT NULL,
  `allergie_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`allergie_id`),
  KEY `IDX_FE557A4AA76ED395` (`user_id`),
  KEY `IDX_FE557A4A7C86304A` (`allergie_id`),
  CONSTRAINT `FK_FE557A4A7C86304A` FOREIGN KEY (`allergie_id`) REFERENCES `allergie` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_FE557A4AA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_allergie`
--

LOCK TABLES `user_allergie` WRITE;
/*!40000 ALTER TABLE `user_allergie` DISABLE KEYS */;
INSERT INTO `user_allergie` VALUES (13,1),(13,2),(13,3),(15,1),(15,2),(15,3),(17,1),(17,2),(18,1),(19,2),(19,3);
/*!40000 ALTER TABLE `user_allergie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_reservation`
--

DROP TABLE IF EXISTS `user_reservation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_reservation` (
  `user_id` int(11) NOT NULL,
  `reservation_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`reservation_id`),
  KEY `IDX_EBD380C0A76ED395` (`user_id`),
  KEY `IDX_EBD380C0B83297E7` (`reservation_id`),
  CONSTRAINT `FK_EBD380C0A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_EBD380C0B83297E7` FOREIGN KEY (`reservation_id`) REFERENCES `reservation` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_reservation`
--

LOCK TABLES `user_reservation` WRITE;
/*!40000 ALTER TABLE `user_reservation` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_reservation` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-05-17 17:13:15

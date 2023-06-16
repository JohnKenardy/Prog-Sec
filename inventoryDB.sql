-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for inventory
CREATE DATABASE IF NOT EXISTS `inventory` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `inventory`;

-- Dumping structure for table inventory.category
CREATE TABLE IF NOT EXISTS `category` (
  `categoryId` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`categoryId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table inventory.item
CREATE TABLE IF NOT EXISTS `item` (
  `itemId` int NOT NULL AUTO_INCREMENT,
  `rfid` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `type` int NOT NULL DEFAULT '0',
  `unit` int DEFAULT NULL,
  `inspector` int NOT NULL,
  `inspectorComments` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `inspectionDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `conditionDescription` enum('serviceable','defective','unserviceable','') COLLATE utf8mb4_general_ci NOT NULL,
  `storage` int NOT NULL,
  PRIMARY KEY (`itemId`),
  KEY `FK2_unit_to_unitId` (`unit`),
  KEY `FK3_inspector_to_usersId` (`inspector`),
  KEY `FK4_storage_to_storageId` (`storage`),
  KEY `FK5_type_to_typeId` (`type`),
  CONSTRAINT `FK2_unit_to_unitId` FOREIGN KEY (`unit`) REFERENCES `unit` (`unitId`),
  CONSTRAINT `FK3_type_to_typeId` FOREIGN KEY (`type`) REFERENCES `type` (`typeId`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK4_inspector_to_userId` FOREIGN KEY (`inspector`) REFERENCES `users` (`userId`),
  CONSTRAINT `FK4_storage_to_storageId` FOREIGN KEY (`storage`) REFERENCES `storage` (`storageId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table inventory.rank
CREATE TABLE IF NOT EXISTS `rank` (
  `rankId` int NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`rankId`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table inventory.storage
CREATE TABLE IF NOT EXISTS `storage` (
  `storageId` int NOT NULL AUTO_INCREMENT,
  `locationName` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `locationAddress` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `locationDescription` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`storageId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table inventory.type
CREATE TABLE IF NOT EXISTS `type` (
  `typeId` int NOT NULL AUTO_INCREMENT,
  `category` int NOT NULL,
  `description` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`typeId`),
  KEY `FK1_category_to_categoryId` (`category`),
  CONSTRAINT `FK1_category_to_categoryId` FOREIGN KEY (`category`) REFERENCES `category` (`categoryId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table inventory.unit
CREATE TABLE IF NOT EXISTS `unit` (
  `unitId` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `location` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`unitId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table inventory.users
CREATE TABLE IF NOT EXISTS `users` (
  `userId` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `rank` int NOT NULL,
  `unit` int NOT NULL DEFAULT '0',
  `role` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `accessLevel` enum('0','1','2','') COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`userId`),
  KEY `FK1_role_to_roleid` (`rank`),
  KEY `FK2_unit` (`unit`),
  CONSTRAINT `FK1_rank_to_rankId` FOREIGN KEY (`rank`) REFERENCES `rank` (`rankId`),
  CONSTRAINT `FK2_unit` FOREIGN KEY (`unit`) REFERENCES `unit` (`unitId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

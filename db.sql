-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.34-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for registrar
CREATE DATABASE IF NOT EXISTS `registrar` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `registrar`;

-- Dumping structure for table registrar.admins
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `reg_no` (`email`)
  ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table registrar.admins: ~0 rows (approximately)
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` (`id`, `email`, `password`) VALUES
(1, 'admin@nyererefy.com', '$2y$12$NWm9vXLO0nxXvvSoi.peUu69YzgnhqmCm9oEKFHLg5APX11E8q6ha');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;

-- Dumping structure for table registrar.programs
CREATE TABLE IF NOT EXISTS `programs` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `abbreviation` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `identifier` (`abbreviation`)
  ) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table registrar.programs: ~8 rows (approximately)
/*!40000 ALTER TABLE `programs` DISABLE KEYS */;
/*!40000 ALTER TABLE `programs` ENABLE KEYS */;

-- Dumping structure for table registrar.students
CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reg_no` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `programId` tinyint(4) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `year` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `reg_no` (`reg_no`),
  UNIQUE KEY `email` (`email`),
  KEY `FK_students_programs` (`programId`),
  CONSTRAINT `FK_students_programs` FOREIGN KEY (`programId`) REFERENCES `programs` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
  ) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- Dumping data for table registrar.students: ~4 rows (approximately)
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
/*!40000 ALTER TABLE `students` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

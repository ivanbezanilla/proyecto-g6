-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 192.168.6.164    Database: PAPRM
-- ------------------------------------------------------
-- Server version	8.0.35-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `alumno_clase`
--

DROP TABLE IF EXISTS `alumno_clase`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `alumno_clase` (
  `Alumno_ID` int NOT NULL,
  `Clase_ID` int NOT NULL,
  `Tipo` enum('alumno','profesor','administrador') NOT NULL,
  PRIMARY KEY (`Alumno_ID`,`Clase_ID`),
  KEY `Clase_ID` (`Clase_ID`) /*!80000 INVISIBLE */,
  KEY `alumno_clase_tipo_idx` (`Tipo`),
  CONSTRAINT `alumno_clase_ibfk_1` FOREIGN KEY (`Alumno_ID`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `alumno_clase_ibfk_2` FOREIGN KEY (`Clase_ID`) REFERENCES `clase` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `alumno_clase_tipo` FOREIGN KEY (`Tipo`) REFERENCES `usuario` (`tipo`) ON DELETE CASCADE ON UPDATE CASCADE
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumno_clase`
--

LOCK TABLES `alumno_clase` WRITE;
/*!40000 ALTER TABLE `alumno_clase` DISABLE KEYS */;
INSERT INTO `alumno_clase` VALUES (1,1,'alumno'),(1,4,'alumno'),(7,1,'alumno'),(7,4,'alumno'),(8,4,'alumno'),(9,4,'alumno');
/*!40000 ALTER TABLE `alumno_clase` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clase`
--

DROP TABLE IF EXISTS `clase`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clase` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` time NOT NULL,
  `Capacidad` int NOT NULL,
  `Profesor` int DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`)
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clase`
--

LOCK TABLES `clase` WRITE;
/*!40000 ALTER TABLE `clase` DISABLE KEYS */;
INSERT INTO `clase` VALUES (1,'testal','2023-12-23','15:35:00',67,NULL),(4,'claseprueba','2023-12-15','15:40:00',45,NULL),(5,'rasadf','2023-12-15','19:46:00',34,NULL),(6,'dfhdfgnfxghf','2023-12-15','19:46:00',31,NULL),(7,'dfhdfgnfxghf','2023-12-15','19:46:00',31,NULL);
/*!40000 ALTER TABLE `clase` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(55) NOT NULL,
  `apellidos` varchar(55) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `tipo` enum('alumno','profesor','administrador') NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ID` (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `tipo` (`tipo`)
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'testal','testal','testall@testal.net','testal','alumno'),(5,'admin','admin','admin@admin.com','admin','administrador'),(7,'prueba','prueba','prueba@gmail.com','prueba','profesor'),(8,'ivan','Bezanilla López','ivan@ivan.com','prueba','alumno'),(9,'vicctor','victor','victor@victor.com','victor','alumno');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-15 20:10:25

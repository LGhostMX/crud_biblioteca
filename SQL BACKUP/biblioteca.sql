-- MariaDB dump 10.19  Distrib 10.4.28-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: biblioteca
-- ------------------------------------------------------
-- Server version	8.0.33

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
-- Table structure for table `autor_libro`
--

CREATE DATABASE biblioteca;

USE biblioteca;

DROP TABLE IF EXISTS `autor_libro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `autor_libro` (
  `codigo_autor` varchar(45) DEFAULT NULL,
  `codigo_libro` varchar(45) DEFAULT NULL,
  `codigo_libro_autor` varchar(45) NOT NULL,
  PRIMARY KEY (`codigo_libro_autor`),
  KEY `codigo_autor` (`codigo_autor`),
  KEY `codigo_libro` (`codigo_libro`),
  CONSTRAINT `autor_libro_ibfk_1` FOREIGN KEY (`codigo_autor`) REFERENCES `autores` (`codigo`),
  CONSTRAINT `autor_libro_ibfk_2` FOREIGN KEY (`codigo_libro`) REFERENCES `libros` (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `autor_libro`
--

LOCK TABLES `autor_libro` WRITE;
/*!40000 ALTER TABLE `autor_libro` DISABLE KEYS */;
INSERT INTO `autor_libro` VALUES ('A1','L1','AL1'),('A2','L1','AL2'),('A3','L3','AL3'),('A4','L3','AL4'),('A5','L4','AL5'),('A5','L5','AL6');
/*!40000 ALTER TABLE `autor_libro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `autores`
--

DROP TABLE IF EXISTS `autores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `autores` (
  `codigo` varchar(45) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `autores`
--

LOCK TABLES `autores` WRITE;
/*!40000 ALTER TABLE `autores` DISABLE KEYS */;
INSERT INTO `autores` VALUES ('A1','Julio Verne'),('A2','Dale Carnegie'),('A3','Mark Manson'),('A4','Ryan Holliday'),('A5','Robert Greene');
/*!40000 ALTER TABLE `autores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ejemplar_usuario`
--

DROP TABLE IF EXISTS `ejemplar_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ejemplar_usuario` (
  `codigo_ejemplar` varchar(45) DEFAULT NULL,
  `codigo_usuario` varchar(45) DEFAULT NULL,
  `ejemplar_usuario` varchar(45) NOT NULL,
  PRIMARY KEY (`ejemplar_usuario`),
  KEY `codigo_ejemplar` (`codigo_ejemplar`),
  KEY `codigo_usuario` (`codigo_usuario`),
  CONSTRAINT `ejemplar_usuario_ibfk_1` FOREIGN KEY (`codigo_ejemplar`) REFERENCES `ejemplares` (`codigo`),
  CONSTRAINT `ejemplar_usuario_ibfk_2` FOREIGN KEY (`codigo_usuario`) REFERENCES `usuarios` (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ejemplar_usuario`
--

LOCK TABLES `ejemplar_usuario` WRITE;
/*!40000 ALTER TABLE `ejemplar_usuario` DISABLE KEYS */;
INSERT INTO `ejemplar_usuario` VALUES ('E1','U1','EU1'),('E1','U2','EU2'),('E2','U3','EU3'),('E3','U4','EU4'),('E4','U5','EU5');
/*!40000 ALTER TABLE `ejemplar_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ejemplares`
--

DROP TABLE IF EXISTS `ejemplares`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ejemplares` (
  `codigo` varchar(45) NOT NULL,
  `clasificacion` varchar(45) DEFAULT NULL,
  `fecha_pre` date DEFAULT NULL,
  `fecha_dev` date DEFAULT NULL,
  `codigo_lib` varchar(45) DEFAULT NULL,
  `localizacion` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`codigo`),
  KEY `codigo_lib` (`codigo_lib`),
  CONSTRAINT `ejemplares_ibfk_1` FOREIGN KEY (`codigo_lib`) REFERENCES `libros` (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ejemplares`
--

LOCK TABLES `ejemplares` WRITE;
/*!40000 ALTER TABLE `ejemplares` DISABLE KEYS */;
INSERT INTO `ejemplares` VALUES ('E1','Ciencia ficcion','2023-07-15','2023-07-18','L1','Estante b seccion 4'),('E2','Sociales','2023-06-25','2023-06-30','L2','Estante d seccion 2'),('E3','Autoayuda','2023-04-15','2023-04-20','L3','Estante a seccion 6'),('E4','Filosofia','2023-04-12','2023-04-27','L4','Estante c seccion 8'),('E5','Biografia','2023-06-23','2023-06-17','L5','Estante e seccion 5');
/*!40000 ALTER TABLE `ejemplares` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `libros`
--

DROP TABLE IF EXISTS `libros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `libros` (
  `codigo` varchar(45) NOT NULL,
  `titulo` varchar(80) DEFAULT NULL,
  `editorial` varchar(45) DEFAULT NULL,
  `ISBN` varchar(45) DEFAULT NULL,
  `num_pags` int DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `libros`
--

LOCK TABLES `libros` WRITE;
/*!40000 ALTER TABLE `libros` DISABLE KEYS */;
INSERT INTO `libros` VALUES ('L1','El viaje al centro de la tierra','Alianza Editorial','7645',360),('L2','Como hacer amigos e influir sobre las personas','Editorial Penguin','5167',304),('L3','El arte sutil de que te importe un carajo','Casa del Libro','2131',240),('L4','El obstaculo es el camino','Oceano','1264',215),('L5','Maestria','Oceano','1232',480);
/*!40000 ALTER TABLE `libros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `codigo` varchar(45) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `direccion` varchar(80) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES ('U1','4428640810','Calle 1','Uriel Ramirez'),('U2','4427737517','Calle 2','Marcos Diaz'),('U3','4428423698','Calle 3','Alan Rabell'),('U4','4421567891','Calle 4','Diego Vicente'),('U5','4426841236','Calle 5','Edwin Viera');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-10-19  0:09:27

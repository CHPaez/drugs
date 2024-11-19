-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: drugs
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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'UsuarioPruebas','pruebas@drugs.co',NULL,'$2y$10$Ia2BMIqXSF5gVvAfycvnxezHR0FJ.P91D8b6S18L.nFxOIyotH1t6',NULL,'2024-10-25 08:29:33','2024-10-25 08:29:33');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `routes`
--

DROP TABLE IF EXISTS `routes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `routes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(191) NOT NULL DEFAULT 'null',
  `method` varchar(191) NOT NULL DEFAULT 'null',
  `alias` varchar(191) DEFAULT 'null',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=139 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `routes`
--

LOCK TABLES `routes` WRITE;
/*!40000 ALTER TABLE `routes` DISABLE KEYS */;
INSERT INTO `routes` VALUES (1,'Modulos','GET|HEAD','Modulos.index','2024-10-15 02:04:28','2024-10-15 02:04:28'),(2,'/','GET|HEAD','home','2024-10-15 02:04:29','2024-10-15 02:04:29'),(3,'Roles','GET|HEAD','Roles.index','2024-10-15 02:05:34','2024-10-19 08:22:03'),(4,'roles_usuarios','GET|HEAD','roles.usuarios.index','2024-10-15 02:10:41','2024-10-15 02:10:41'),(5,'Roles','POST','Roles.store','2024-10-15 02:16:09','2024-10-15 02:16:09'),(6,'roles/selectores','POST','roles.selectores','2024-10-15 02:16:27','2024-10-15 02:16:27'),(7,'roles/selectores','POST','roles.selectores','2024-10-15 02:16:27','2024-10-15 02:16:27'),(8,'roles_usuarios','POST','user.roles.store','2024-10-15 02:16:33','2024-10-15 02:16:33'),(9,'Modulos/{Modulo}','GET|HEAD','Modulos.show','2024-10-15 02:27:34','2024-10-15 02:27:34'),(10,'Modulos','POST','Modulos.store','2024-10-15 02:39:31','2024-10-15 02:39:31'),(11,'login','GET|HEAD','login','2024-10-15 02:47:44','2024-10-15 02:47:44'),(12,'register','GET|HEAD','register','2024-10-15 02:47:47','2024-10-15 02:47:47'),(13,'register','POST',NULL,'2024-10-15 02:48:09','2024-10-15 02:48:09'),(14,'Modulos','PATCH','Modulos.update','2024-10-15 02:52:54','2024-10-15 02:52:54'),(15,'roles_usuarios','PATCH','user.roles.update','2024-10-15 03:34:00','2024-10-15 03:34:00'),(16,'login','POST',NULL,'2024-10-17 06:46:40','2024-10-17 06:46:40'),(20,'Roles/destroy','DELETE','Roles.delete','2024-10-19 08:30:14','2024-10-19 08:30:14'),(19,'Roles','PATCH','Roles.update','2024-10-19 08:23:30','2024-10-19 08:23:30'),(21,'Roles','DELETE','Roles.delete','2024-10-19 08:32:52','2024-10-19 08:32:52'),(22,'Modulos','DELETE','Modulos.delete','2024-10-19 08:49:12','2024-10-19 08:49:12'),(23,'roles_usuarios','DELETE','user.roles.delete','2024-10-19 09:05:13','2024-10-19 09:05:13'),(24,'Administracion','GET|HEAD','Administracion.index','2024-10-19 09:07:42','2024-10-19 09:07:42'),(25,'Administracion/{Administracion}/edit','GET|HEAD','Administracion.edit','2024-10-19 09:08:39','2024-10-19 09:08:39'),(26,'Administracion/create','GET|HEAD','Administracion.create','2024-10-19 09:09:06','2024-10-19 09:09:06'),(27,'_ignition/health-check','GET|HEAD','ignition.healthCheck','2024-10-19 09:16:41','2024-10-19 09:16:41'),(28,'Administracion','POST','Administracion.store','2024-10-19 09:44:45','2024-10-19 09:44:45'),(29,'Administracion/{Administracion}','PUT|PATCH','Administracion.update','2024-10-19 10:10:01','2024-10-19 10:10:01'),(30,'logout','POST','logout','2024-10-20 07:20:41','2024-10-20 07:20:41'),(31,'tipostelefonos','GET|HEAD','tipostelefonos.index','2024-10-20 07:22:53','2024-10-20 07:22:53'),(32,'tipostelefonos/create','GET|HEAD','tipostelefonos.create','2024-10-20 08:21:00','2024-10-20 08:21:00'),(33,'tipostelefonos','POST','tipostelefonos.store','2024-10-20 09:37:54','2024-10-20 09:37:54'),(34,'tipostelefonos/{tipostelefono}/edit','GET|HEAD','tipostelefonos.edit','2024-10-20 09:43:47','2024-10-20 09:43:47'),(35,'tipostelefonos/{tipostelefono}','PUT|PATCH','tipostelefonos.update','2024-10-20 09:47:23','2024-10-20 09:47:23'),(36,'tipostelefonos/{tipostelefono}','DELETE','tipostelefonos.destroy','2024-10-20 09:52:11','2024-10-20 09:52:11'),(37,'tipificacionllamadas','GET|HEAD','tipificacionllamadas.index','2024-10-21 00:54:19','2024-10-21 00:54:19'),(38,'tipificacionllamadas/create','GET|HEAD','tipificacionllamadas.create','2024-10-21 01:14:57','2024-10-21 01:14:57'),(39,'tiposasociados','GET|HEAD','tiposasociados.index','2024-10-21 02:02:49','2024-10-21 02:02:49'),(40,'tiposasociados/create','GET|HEAD','tiposasociados.create','2024-10-21 03:19:06','2024-10-21 03:19:06'),(41,'tiposasociados','POST','tiposasociados.store','2024-10-21 03:19:37','2024-10-21 03:19:37'),(42,'tiposasociados/{tiposasociado}/edit','GET|HEAD','tiposasociados.edit','2024-10-21 03:35:40','2024-10-21 03:35:40'),(43,'tiposasociados/{tiposasociado}','PUT|PATCH','tiposasociados.update','2024-10-21 03:36:10','2024-10-21 03:36:10'),(44,'tiposasociados/{tiposasociado}','DELETE','tiposasociados.destroy','2024-10-21 03:36:19','2024-10-21 03:36:19'),(45,'asociados','GET|HEAD','asociados.index','2024-10-21 03:39:11','2024-10-21 03:39:11'),(46,'asociados/create','GET|HEAD','asociados.create','2024-10-21 04:00:04','2024-10-21 04:00:04'),(47,'asociados','POST','asociados.store','2024-10-21 04:00:18','2024-10-21 04:00:18'),(48,'asociados/{asociado}','DELETE','asociados.destroy','2024-10-21 04:00:28','2024-10-21 04:00:28'),(49,'programas','GET|HEAD','programas.index','2024-10-21 04:12:55','2024-10-21 04:12:55'),(50,'programas/create','GET|HEAD','programas.create','2024-10-21 04:20:28','2024-10-21 04:20:28'),(51,'programas','POST','programas.store','2024-10-21 04:21:13','2024-10-21 04:21:13'),(52,'programas/{programa}/edit','GET|HEAD','programas.edit','2024-10-21 04:21:49','2024-10-21 04:21:49'),(53,'programas/{programa}','PUT|PATCH','programas.update','2024-10-21 04:22:08','2024-10-21 04:22:08'),(54,'programas/{programa}','DELETE','programas.destroy','2024-10-21 04:22:18','2024-10-21 04:22:18'),(55,'modalidades','GET|HEAD','modalidades.index','2024-10-21 05:48:03','2024-10-21 05:48:03'),(56,'modalidades/create','GET|HEAD','modalidades.create','2024-10-21 05:49:23','2024-10-21 05:49:23'),(57,'modalidades','POST','modalidades.store','2024-10-21 05:49:31','2024-10-21 05:49:31'),(58,'modalidades/{modalidade}/edit','GET|HEAD','modalidades.edit','2024-10-21 05:49:57','2024-10-21 05:49:57'),(59,'modalidades/{modalidade}','PUT|PATCH','modalidades.update','2024-10-21 05:51:30','2024-10-21 05:51:30'),(60,'modalidades/{modalidade}','DELETE','modalidades.destroy','2024-10-21 05:51:46','2024-10-21 05:51:46'),(61,'inscritos','GET|HEAD','inscritos.index','2024-10-21 05:51:58','2024-10-21 05:51:58'),(62,'inscritos/create','GET|HEAD','inscritos.create','2024-10-21 05:56:31','2024-10-21 05:56:31'),(63,'inscritos','POST','inscritos.store','2024-10-21 05:57:08','2024-10-21 05:57:08'),(64,'horarios','GET|HEAD','horarios.index','2024-10-21 05:58:29','2024-10-21 05:58:29'),(65,'horarios/create','GET|HEAD','horarios.create','2024-10-21 06:00:34','2024-10-21 06:00:34'),(66,'horarios','POST','horarios.store','2024-10-21 06:00:45','2024-10-21 06:00:45'),(67,'horarios/{horario}','DELETE','horarios.destroy','2024-10-21 06:01:03','2024-10-21 06:01:03'),(68,'horarios/{horario}/edit','GET|HEAD','horarios.edit','2024-10-21 06:01:06','2024-10-21 06:01:06'),(69,'horarios/{horario}','PUT|PATCH','horarios.update','2024-10-21 06:01:15','2024-10-21 06:01:15'),(70,'estadostipificacions','GET|HEAD','estadostipificacions.index','2024-10-21 06:01:41','2024-10-21 06:01:41'),(71,'estadostipificacions/create','GET|HEAD','estadostipificacions.create','2024-10-21 06:02:55','2024-10-21 06:02:55'),(72,'estadostipificacions','POST','estadostipificacions.store','2024-10-21 06:03:03','2024-10-21 06:03:03'),(73,'estadostipificacions/{estadostipificacion}','DELETE','estadostipificacions.destroy','2024-10-21 06:05:49','2024-10-21 06:05:49'),(74,'estadostipificacions/{estadostipificacion}/edit','GET|HEAD','estadostipificacions.edit','2024-10-21 06:06:31','2024-10-21 06:06:31'),(75,'estadostipificacions/{estadostipificacion}','PUT|PATCH','estadostipificacions.update','2024-10-21 06:06:35','2024-10-21 06:06:35'),(76,'datosadicionales','GET|HEAD','datosadicionales.index','2024-10-21 06:07:15','2024-10-21 06:07:15'),(77,'datosadicionales/create','GET|HEAD','datosadicionales.create','2024-10-21 06:09:24','2024-10-21 06:09:24'),(78,'datosadicionales','POST','datosadicionales.store','2024-10-21 06:09:28','2024-10-21 06:09:28'),(79,'datosadicionales/{datosadicionale}/edit','GET|HEAD','datosadicionales.edit','2024-10-21 06:09:45','2024-10-21 06:09:45'),(80,'datosadicionales/{datosadicionale}','PUT|PATCH','datosadicionales.update','2024-10-21 06:09:48','2024-10-21 06:09:48'),(81,'datosadicionales/{datosadicionale}','DELETE','datosadicionales.destroy','2024-10-21 06:09:50','2024-10-21 06:09:50'),(82,'causales','GET|HEAD','causales.index','2024-10-21 06:10:20','2024-10-21 06:10:20'),(83,'causales/create','GET|HEAD','causales.create','2024-10-21 06:14:55','2024-10-21 06:14:55'),(84,'causales','POST','causales.store','2024-10-21 06:15:36','2024-10-21 06:15:36'),(85,'causales/{causale}','DELETE','causales.destroy','2024-10-21 06:16:06','2024-10-21 06:16:06'),(86,'causales/{causale}/edit','GET|HEAD','causales.edit','2024-10-21 06:16:09','2024-10-21 06:16:09'),(87,'causales/{causale}','PUT|PATCH','causales.update','2024-10-21 06:16:12','2024-10-21 06:16:12'),(88,'tipificacionllamadas/{tipificacionllamada}','GET|HEAD','tipificacionllamadas.show','2024-10-21 06:17:53','2024-10-21 06:17:53'),(89,'paises','GET|HEAD','paises.index','2024-10-21 06:18:15','2024-10-21 06:18:15'),(90,'paises/create','GET|HEAD','paises.create','2024-10-21 06:45:36','2024-10-21 06:45:36'),(91,'paises','POST','paises.store','2024-10-21 06:45:41','2024-10-21 06:45:41'),(92,'paises/{paise}/edit','GET|HEAD','paises.edit','2024-10-21 06:45:59','2024-10-21 06:45:59'),(93,'paises/{paise}','PUT|PATCH','paises.update','2024-10-21 06:46:07','2024-10-21 06:46:07'),(94,'paises/{paise}','DELETE','paises.destroy','2024-10-21 06:46:10','2024-10-21 06:46:10'),(95,'ciudades','GET|HEAD','ciudades.index','2024-10-21 06:46:22','2024-10-21 06:46:22'),(96,'ciudades/create','GET|HEAD','ciudades.create','2024-10-21 06:50:29','2024-10-21 06:50:29'),(97,'departamentos','GET|HEAD','departamentos.index','2024-10-21 06:50:39','2024-10-21 06:50:39'),(98,'departamentos/create','GET|HEAD','departamentos.create','2024-10-21 06:51:09','2024-10-21 06:51:09'),(99,'departamentos','POST','departamentos.store','2024-10-21 06:51:16','2024-10-21 06:51:16'),(100,'departamentos/{departamento}/edit','GET|HEAD','departamentos.edit','2024-10-21 06:51:36','2024-10-21 06:51:36'),(101,'departamentos/{departamento}','PUT|PATCH','departamentos.update','2024-10-21 06:52:54','2024-10-21 06:52:54'),(102,'departamentos/{departamento}','DELETE','departamentos.destroy','2024-10-21 06:53:10','2024-10-21 06:53:10'),(103,'ciudades','POST','ciudades.store','2024-10-21 06:53:23','2024-10-21 06:53:23'),(104,'ciudades/{ciudade}','DELETE','ciudades.destroy','2024-10-21 06:53:40','2024-10-21 06:53:40'),(105,'personas','GET|HEAD','personas.index','2024-10-24 08:45:20','2024-10-24 08:45:20'),(106,'personas/create','GET|HEAD','personas.create','2024-10-24 08:45:56','2024-10-24 08:45:56'),(107,'tiposidentificaciones','GET|HEAD','tiposidentificaciones.index','2024-10-24 08:46:16','2024-10-24 08:46:16'),(108,'tiposidentificaciones/create','GET|HEAD','tiposidentificaciones.create','2024-10-24 08:47:54','2024-10-24 08:47:54'),(109,'tiposidentificaciones','POST','tiposidentificaciones.store','2024-10-24 08:47:59','2024-10-24 08:47:59'),(110,'generos','GET|HEAD','generos.index','2024-10-25 06:37:57','2024-10-25 06:37:57'),(111,'generos/create','GET|HEAD','generos.create','2024-10-25 06:38:20','2024-10-25 06:38:20'),(112,'generos','POST','generos.store','2024-10-25 06:38:46','2024-10-25 06:38:46'),(113,'generos/{genero}/edit','GET|HEAD','generos.edit','2024-10-25 06:39:11','2024-10-25 06:39:11'),(114,'generos/{genero}','PUT|PATCH','generos.update','2024-10-25 06:39:16','2024-10-25 06:39:16'),(115,'generos/{genero}','DELETE','generos.destroy','2024-10-25 06:39:18','2024-10-25 06:39:18'),(116,'tiposidentificaciones/{tiposidentificacione}/edit','GET|HEAD','tiposidentificaciones.edit','2024-10-25 06:50:31','2024-10-25 06:50:31'),(117,'tiposidentificaciones/{tiposidentificacione}','PUT|PATCH','tiposidentificaciones.update','2024-10-25 06:50:34','2024-10-25 06:50:34'),(118,'tiposidentificaciones/{tiposidentificacione}','DELETE','tiposidentificaciones.destroy','2024-10-25 06:50:38','2024-10-25 06:50:38'),(119,'personas','POST','personas.store','2024-10-25 06:51:10','2024-10-25 06:51:10'),(120,'personas/{persona}/edit','GET|HEAD','personas.edit','2024-10-25 06:53:44','2024-10-25 06:53:44'),(121,'personas/{persona}','PUT|PATCH','personas.update','2024-10-25 06:53:56','2024-10-25 06:53:56'),(122,'personas/{persona}','DELETE','personas.destroy','2024-10-25 06:53:59','2024-10-25 06:53:59'),(123,'droguerias','GET|HEAD','droguerias.index','2024-10-25 06:55:01','2024-10-25 06:55:01'),(124,'droguerias/create','GET|HEAD','droguerias.create','2024-10-25 06:55:23','2024-10-25 06:55:23'),(125,'tiposdroguerias','GET|HEAD','tiposdroguerias.index','2024-10-25 06:55:39','2024-10-25 06:55:39'),(126,'tiposdroguerias/create','GET|HEAD','tiposdroguerias.create','2024-10-25 06:57:22','2024-10-25 06:57:22'),(127,'tiposdroguerias','POST','tiposdroguerias.store','2024-10-25 06:57:45','2024-10-25 06:57:45'),(128,'tiposdroguerias/{tiposdrogueria}/edit','GET|HEAD','tiposdroguerias.edit','2024-10-25 06:58:08','2024-10-25 06:58:08'),(129,'tiposdroguerias/{tiposdrogueria}','PUT|PATCH','tiposdroguerias.update','2024-10-25 06:58:13','2024-10-25 06:58:13'),(130,'tiposdroguerias/{tiposdrogueria}','DELETE','tiposdroguerias.destroy','2024-10-25 06:58:27','2024-10-25 06:58:27'),(131,'droguerias','POST','droguerias.store','2024-10-25 06:58:53','2024-10-25 06:58:53'),(132,'droguerias/{drogueria}/edit','GET|HEAD','droguerias.edit','2024-10-25 06:59:42','2024-10-25 06:59:42'),(133,'droguerias/{drogueria}','PUT|PATCH','droguerias.update','2024-10-25 06:59:47','2024-10-25 06:59:47'),(134,'droguerias/{drogueria}','DELETE','droguerias.destroy','2024-10-25 06:59:49','2024-10-25 06:59:49'),(135,'tipificacionllamadas','POST','tipificacionllamadas.store','2024-10-25 07:02:07','2024-10-25 07:02:07'),(137,'roles_usuarios','POST','user.roles.store','2024-10-25 20:14:54','2024-10-25 20:14:54'),(138,'role_usuarios','GET|HEAD','roles.usuarios.index','2024-10-25 20:21:00','2024-10-25 20:21:00');
/*!40000 ALTER TABLE `routes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modulos`
--

DROP TABLE IF EXISTS `modulos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modulos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `MoNombre` varchar(191) NOT NULL DEFAULT 'null',
  `MoSubmodulo` varchar(191) NOT NULL DEFAULT 'null',
  `MoRoute` int(11) NOT NULL,
  `MoDescripcion` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modulos`
--

LOCK TABLES `modulos` WRITE;
/*!40000 ALTER TABLE `modulos` DISABLE KEYS */;
INSERT INTO `modulos` VALUES (3,'Configuracion','Crear roles',3,NULL,'2024-10-15 02:05:34','2024-10-15 02:05:34'),(2,'Configuracion','Administrar modulos',1,NULL,'2024-10-15 02:04:28','2024-10-15 02:04:28'),(4,'Administracion de usuarios','Roles de usuario',4,NULL,'2024-10-15 02:10:41','2024-10-15 02:10:41'),(5,'Administracion de usuarios','Usuarios',24,NULL,'2024-10-19 09:07:42','2024-10-19 09:07:42'),(6,'Llamadas','Tipos de telefono',31,NULL,'2024-10-20 07:22:53','2024-10-20 07:22:53'),(7,'Llamadas','Tipificacion de llamadas',37,NULL,'2024-10-21 00:54:19','2024-10-21 00:54:19'),(8,'Asociados','Tipos de asociados',39,NULL,'2024-10-21 02:02:49','2024-10-21 02:02:49'),(9,'Asociados','Asociados',45,NULL,'2024-10-21 03:39:11','2024-10-21 03:39:11'),(10,'Llamadas','Programas',49,NULL,'2024-10-21 04:12:55','2024-10-21 04:12:55'),(11,'Llamadas','Modalidades',55,NULL,'2024-10-21 05:48:03','2024-10-21 05:48:03'),(12,'Llamadas','Inscritos',61,NULL,'2024-10-21 05:51:58','2024-10-21 05:51:58'),(13,'Llamadas','Horarios',64,NULL,'2024-10-21 05:58:29','2024-10-21 05:58:29'),(14,'Llamadas','Estados tipificacion',70,NULL,'2024-10-21 06:01:41','2024-10-21 06:01:41'),(15,'Llamadas','Datos adicionales',76,NULL,'2024-10-21 06:07:15','2024-10-21 06:07:15'),(16,'Llamadas','Causales tipificacion',82,NULL,'2024-10-21 06:10:20','2024-10-21 06:10:20'),(17,'Paises','Paises',89,NULL,'2024-10-21 06:18:15','2024-10-21 06:18:15'),(18,'Paises','Ciudades',95,NULL,'2024-10-21 06:46:22','2024-10-21 06:46:22'),(19,'Paises','Departamentos',97,NULL,'2024-10-21 06:50:39','2024-10-21 06:50:39'),(20,'Personas','Personas',105,NULL,'2024-10-24 08:45:20','2024-10-24 08:45:20'),(21,'Personas','Tipos de identificaciones',107,NULL,'2024-10-24 08:46:16','2024-10-24 08:46:16'),(22,'Personas','Generos',110,NULL,'2024-10-25 06:37:57','2024-10-25 06:37:57'),(23,'Droguerias','Droguerias',123,NULL,'2024-10-25 06:55:01','2024-10-25 06:55:01'),(24,'Droguerias','Tipos de droguerias',125,NULL,'2024-10-25 06:55:39','2024-10-25 06:55:39'),(25,'Administracion de usuarios','Roles de usuario',136,NULL,'2024-10-25 20:00:49','2024-10-25 20:00:49'),(26,'Administracion de usuarios','Roles de usuario',138,NULL,'2024-10-25 20:21:00','2024-10-25 20:21:00');
/*!40000 ALTER TABLE `modulos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles_permisos`
--

DROP TABLE IF EXISTS `roles_permisos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles_permisos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Roles_id` bigint(20) unsigned NOT NULL,
  `Modulos_id` bigint(20) unsigned NOT NULL,
  `Read` tinyint(1) DEFAULT NULL,
  `Update` tinyint(1) DEFAULT NULL,
  `Delete` tinyint(1) DEFAULT NULL,
  `Create` tinyint(1) DEFAULT NULL,
  `Estado` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_permisos_roles_id_modulos_id_unique` (`Roles_id`,`Modulos_id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles_permisos`
--

LOCK TABLES `roles_permisos` WRITE;
/*!40000 ALTER TABLE `roles_permisos` DISABLE KEYS */;
INSERT INTO `roles_permisos` VALUES (1,1,2,1,1,1,1,1,NULL,NULL),(2,2,3,1,0,0,1,1,NULL,'2024-10-20 07:45:38'),(3,1,4,1,1,0,1,1,NULL,'2024-10-25 08:30:11'),(5,1,5,1,1,1,1,1,NULL,'2024-10-25 08:30:56'),(6,1,6,1,0,0,0,1,NULL,'2024-10-20 09:52:58'),(7,1,7,1,1,0,1,1,NULL,'2024-10-21 02:00:47'),(8,1,8,1,1,1,1,1,NULL,NULL),(9,1,9,1,1,1,1,1,NULL,NULL),(10,1,10,1,1,1,1,1,NULL,NULL),(11,1,11,1,1,1,1,1,NULL,NULL),(12,1,12,1,1,1,1,1,NULL,NULL),(13,1,13,1,1,1,1,1,NULL,NULL),(14,1,14,1,1,1,1,1,NULL,NULL),(15,1,15,1,1,1,1,1,NULL,NULL),(16,1,16,1,1,1,1,1,NULL,NULL),(17,1,17,1,1,1,1,1,NULL,NULL),(18,1,18,1,1,1,1,1,NULL,NULL),(19,1,19,1,1,1,1,1,NULL,NULL),(20,1,20,1,1,1,1,1,NULL,NULL),(21,1,21,1,1,1,1,1,NULL,NULL),(22,1,22,1,1,1,1,1,NULL,NULL),(23,1,23,1,1,1,1,1,NULL,NULL),(24,1,24,1,1,1,1,1,NULL,NULL);
/*!40000 ALTER TABLE `roles_permisos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `RoNombre` varchar(191) NOT NULL,
  `RoDescripcion` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_ronombre_unique` (`RoNombre`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Administrador','Administrar el sistema Buenas 1',NULL,'2024-10-19 08:28:18'),(2,'Auxiliar Admin.','Auxiliar del administrador 2',NULL,'2024-10-19 08:28:18'),(4,'Pruebas 2',NULL,NULL,NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios_roles`
--

DROP TABLE IF EXISTS `usuarios_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios_roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Users_id` bigint(20) unsigned NOT NULL,
  `Roles_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_user_role` (`Users_id`,`Roles_id`),
  KEY `usuarios_roles_roles_id_foreign` (`Roles_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios_roles`
--

LOCK TABLES `usuarios_roles` WRITE;
/*!40000 ALTER TABLE `usuarios_roles` DISABLE KEYS */;
INSERT INTO `usuarios_roles` VALUES (1,1,1,NULL,NULL),(2,2,2,NULL,'2024-10-19 09:04:51'),(4,5,1,NULL,'2024-10-25 20:22:27');
/*!40000 ALTER TABLE `usuarios_roles` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-10-25 15:57:10

-- MySQL dump 10.13  Distrib 5.5.16, for Win32 (x86)
--
-- Host: localhost    Database: pae_he_00
-- ------------------------------------------------------
-- Server version	5.5.16

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cat_conceptos`
--

DROP TABLE IF EXISTS `cat_conceptos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_conceptos` (
  `id_concepto` tinyint(2) NOT NULL AUTO_INCREMENT,
  `concepto` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `clave` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `valor` smallint(4) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_concepto`),
  KEY `i_clave` (`clave`),
  KEY `i_activo` (`activo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_conceptos`
--

LOCK TABLES `cat_conceptos` WRITE;
/*!40000 ALTER TABLE `cat_conceptos` DISABLE KEYS */;
INSERT INTO `cat_conceptos` VALUES (1,'PRUEBA','1',0,1);
/*!40000 ALTER TABLE `cat_conceptos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_seguimiento`
--

DROP TABLE IF EXISTS `cat_seguimiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_seguimiento` (
  `id_cat_seguimiento` mediumint(7) NOT NULL AUTO_INCREMENT,
  `tipo` enum('ACCION','ESTATUS') COLLATE utf8_spanish_ci DEFAULT 'ACCION',
  `descripcion` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `siglas` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id_cat_seguimiento`),
  KEY `i_tipo` (`tipo`),
  KEY `i_activo` (`activo`),
  KEY `i_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_seguimiento`
--

LOCK TABLES `cat_seguimiento` WRITE;
/*!40000 ALTER TABLE `cat_seguimiento` DISABLE KEYS */;
INSERT INTO `cat_seguimiento` VALUES (1,'ACCION','CAPTURADO','CAP','2014-08-29 16:48:06',1,1),(2,'ACCION','VALIDADO','VAL','2014-08-29 16:48:25',1,1),(3,'ACCION','AUTORIZADO','AUT','2014-08-29 16:49:54',1,1),(4,'ACCION','ENVIADO','ENV','2014-08-29 16:50:06',1,1),(5,'ESTATUS','EN PROCESO','PROC','2014-08-29 16:50:25',1,1),(6,'ESTATUS','APROBADO','APRO','2014-08-29 16:51:03',1,1),(7,'ESTATUS','RECHAZADO','RECH','2014-08-29 16:51:18',1,1),(8,'ESTATUS','CANCELADO','CANC','2014-08-29 16:52:39',1,1),(9,'ESTATUS','CERRADO','CERR','2014-08-29 16:52:49',1,1),(10,'ESTATUS','REALIZADO','REAL','2014-08-29 16:53:07',1,1),(11,'ESTATUS','PENDIENTE','PEND','2014-08-29 16:53:22',1,1);
/*!40000 ALTER TABLE `cat_seguimiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `he_captura`
--

DROP TABLE IF EXISTS `he_captura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `he_captura` (
  `id_captura` int(11) NOT NULL AUTO_INCREMENT,
  `id_personal` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `horas` tinyint(2) DEFAULT NULL,
  `id_concepto` tinyint(2) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL,
  `activo` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id_captura`),
  KEY `i_id_concepto` (`id_concepto`),
  KEY `i_id_usuario` (`id_personal`),
  KEY `i_activo` (`activo`),
  CONSTRAINT `fk_concepto` FOREIGN KEY (`id_concepto`) REFERENCES `cat_conceptos` (`id_concepto`),
  CONSTRAINT `fk_personal` FOREIGN KEY (`id_personal`) REFERENCES `he_personal` (`id_personal`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `he_captura`
--

LOCK TABLES `he_captura` WRITE;
/*!40000 ALTER TABLE `he_captura` DISABLE KEYS */;
INSERT INTO `he_captura` VALUES (1,1,'2014-08-29',1,1,1,'2014-08-29 16:57:00',1);
/*!40000 ALTER TABLE `he_captura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `he_empresas`
--

DROP TABLE IF EXISTS `he_empresas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `he_empresas` (
  `id_empresa` smallint(4) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `siglas` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `rfc` varchar(18) COLLATE utf8_spanish_ci DEFAULT NULL,
  `razon` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion` text COLLATE utf8_spanish_ci,
  `pais` varchar(15) COLLATE utf8_spanish_ci DEFAULT 'MX',
  `email` varchar(80) COLLATE utf8_spanish_ci DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id_empresa`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `he_empresas`
--

LOCK TABLES `he_empresas` WRITE;
/*!40000 ALTER TABLE `he_empresas` DISABLE KEYS */;
INSERT INTO `he_empresas` VALUES (1,'ISoluttion','IS','x','Intelligent Solution','Insurgentes Sur','MX','oscar.maldonado@isollution.mx','2014-08-28 18:10:49',1,1);
/*!40000 ALTER TABLE `he_empresas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `he_personal`
--

DROP TABLE IF EXISTS `he_personal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `he_personal` (
  `id_personal` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(32) COLLATE utf8_spanish_ci DEFAULT NULL,
  `paterno` varchar(32) COLLATE utf8_spanish_ci DEFAULT NULL,
  `materno` varchar(32) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(80) COLLATE utf8_spanish_ci DEFAULT NULL,
  `puesto` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `empleado_num` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_empresa` smallint(4) DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id_personal`),
  KEY `i_empresa` (`id_empresa`),
  KEY `i_activo` (`activo`),
  KEY `i_puesto` (`id_empresa`,`puesto`),
  KEY `i_empleado_num` (`empleado_num`),
  KEY `fk_usuario` (`id_usuario`),
  CONSTRAINT `fk_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `he_empresas` (`id_empresa`),
  CONSTRAINT `fk_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `sis_usuarios` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `he_personal`
--

LOCK TABLES `he_personal` WRITE;
/*!40000 ALTER TABLE `he_personal` DISABLE KEYS */;
INSERT INTO `he_personal` VALUES (1,'ADMINISTRADOR','DEL','SISTEMA','oscar.maldonado@isollution.mx','ADMINISTRADOR','777',1,'2014-08-28 18:00:42',1,1);
/*!40000 ALTER TABLE `he_personal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `he_seguimiento`
--

DROP TABLE IF EXISTS `he_seguimiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `he_seguimiento` (
  `id_seguimiento` int(11) NOT NULL AUTO_INCREMENT,
  `id_captura` int(11) DEFAULT NULL,
  `id_empresa` smallint(4) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `id_accion` mediumint(7) DEFAULT NULL,
  `id_estatus` mediumint(7) DEFAULT NULL,
  `doc` varchar(200) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL,
  `activo` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id_seguimiento`),
  KEY `i_captura` (`id_captura`),
  KEY `i_empresa` (`id_empresa`),
  KEY `i_estatus` (`id_accion`,`id_estatus`),
  KEY `i_usuario` (`id_usuario`),
  KEY `i_activo` (`activo`),
  KEY `fk_estatus` (`id_estatus`),
  CONSTRAINT `fk_accion` FOREIGN KEY (`id_accion`) REFERENCES `cat_seguimiento` (`id_cat_seguimiento`),
  CONSTRAINT `fk_captura` FOREIGN KEY (`id_captura`) REFERENCES `he_captura` (`id_captura`),
  CONSTRAINT `fk_estatus` FOREIGN KEY (`id_estatus`) REFERENCES `cat_seguimiento` (`id_cat_seguimiento`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `he_seguimiento`
--

LOCK TABLES `he_seguimiento` WRITE;
/*!40000 ALTER TABLE `he_seguimiento` DISABLE KEYS */;
INSERT INTO `he_seguimiento` VALUES (1,1,1,'2014-08-29','16:40:02',1,1,'Documento',1,'2014-08-29 16:40:17',1);
/*!40000 ALTER TABLE `he_seguimiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sis_accesos`
--

DROP TABLE IF EXISTS `sis_accesos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sis_accesos` (
  `id_acceso` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `mod1` tinyint(1) NOT NULL DEFAULT '0',
  `mod2` tinyint(1) NOT NULL DEFAULT '0',
  `mod3` tinyint(1) NOT NULL DEFAULT '0',
  `mod4` tinyint(1) NOT NULL DEFAULT '0',
  `mod5` tinyint(1) NOT NULL DEFAULT '0',
  `mod6` tinyint(1) NOT NULL DEFAULT '0',
  `mod7` tinyint(1) NOT NULL DEFAULT '0',
  `mod8` tinyint(1) NOT NULL DEFAULT '0',
  `mod9` tinyint(1) NOT NULL DEFAULT '0',
  `mod10` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_acceso`),
  KEY `i_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sis_accesos`
--

LOCK TABLES `sis_accesos` WRITE;
/*!40000 ALTER TABLE `sis_accesos` DISABLE KEYS */;
INSERT INTO `sis_accesos` VALUES (1,1,1,1,0,1,1,1,0,0,0,0);
/*!40000 ALTER TABLE `sis_accesos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sis_logs`
--

DROP TABLE IF EXISTS `sis_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sis_logs` (
  `id_log` int(11) NOT NULL AUTO_INCREMENT,
  `tablename` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_table` int(11) DEFAULT NULL,
  `accion` enum('UPDATE','DELETE','INSERT') COLLATE utf8_spanish_ci DEFAULT NULL,
  `query` text COLLATE utf8_spanish_ci,
  `txt` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `url` text COLLATE utf8_spanish_ci,
  `timestamp` datetime DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_log`),
  KEY `id_usuario` (`id_usuario`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sis_logs`
--

LOCK TABLES `sis_logs` WRITE;
/*!40000 ALTER TABLE `sis_logs` DISABLE KEYS */;
INSERT INTO `sis_logs` VALUES (1,'ife_ddvc_catalogos.tbl_adscripciones',0,'UPDATE','UPDATE ife_ddvc_catalogos.tbl_adscripciones SET \r\n					calle=\'TEJOCOTES\',\r\n					num_ext=\'NO 164\',\r\n					num_int=\'PISO 1\',\r\n					colonia=\'TLACOQUEMECATL DEL VALLE\',\r\n					mpio_desc=\'BENITO JUREZ\',\r\n					cp=\'03200\',\r\n					lada=\'0155\',\r\n					telefono=\'\',\r\n					fax=\'\',\r\n					actualizado=NOW(),\r\n					ID_usuario=\'\'\r\n					WHERE id_adscripcion=\'9\'\r\n					LIMIT 1;','',NULL,'2014-02-19 16:25:11',1),(2,'ife_ddvc_catalogos.tbl_personal',0,'UPDATE','UPDATE ife_ddvc_catalogos.tbl_personal SET \r\n					id_cargo=\'1\',\r\n					nombre=\'JORGE\',\r\n					paterno=\'ORTEGA\',\r\n					materno=\'PINEDA\',\r\n					id_tratamiento=\'2\',\r\n					sexo=\'H\',\r\n					lada=\'\',\r\n					telefono=\'2\',\r\n					telefono2=\'\',\r\n					telefonoip=\'3\',\r\n					correo=\'jorge.ortega@ife.org.mx\',\r\n					firma=\'S\',\r\n					actualizado=NOW(),\r\n					ID_usuario=\'\'\r\n					WHERE id_personal=\'9\'\r\n					LIMIT 1;','',NULL,'2014-02-19 16:26:43',1),(3,'ife_ddvc_catalogos.tbl_personal',933,'INSERT','INSERT INTO ife_ddvc_catalogos.tbl_personal SET \r\n					id_adscripcion=\'9\',\r\n					id_cargo=\'43\',\r\n					ent=\'9\',\r\n					dto=\'0\',\r\n					nombre=\'GFH\',\r\n					paterno=\'FGH\',\r\n					materno=\'\',\r\n					id_tratamiento=\'11\',\r\n					sexo=\'H\',\r\n					lada=\'0155\',\r\n					telefono=\'444\',\r\n					telefono2=\'\',\r\n					telefonoip=\'555\',\r\n					correo=\'correo@ife.com\',\r\n					firma=\'S\',\r\n					fecha_alta=CURDATE(),\r\n					actualizado=NOW(),\r\n					ID_usuario=\'\';','',NULL,'2014-02-19 16:27:54',1),(4,'ife_dom_irre.lis_vocales_local_vl',0,'INSERT','INSERT INTO ife_dom_irre.lis_vocales_local_vl SET \r\n					id_personal=\'933\',\r\n					id_adscripcion=\'9\',\r\n					id_ent=\'9\',\r\n					puesto_vl=\'ENCARGADO DE LA OFICINA DE SUPERVISIÓN DE ACTUALIZACIÓN\',\r\n					nombre_vl=\'GFH\',\r\n					paterno_vl=\'FGH\',\r\n					materno_vl=\'\',\r\n					titulo=\'ARQ.\',\r\n					sexo=\'H\',\r\n					correo_elec_vl=\'correo@ife.com\',\r\n					calle_vl=\'TEJOCOTES\',\r\n					num_ext_vl=\'NO 164\',\r\n					num_int_vl=\'PISO 1\',\r\n					colonia_vl=\'TLACOQUEMECATL DEL VALLE\',\r\n					municipio_vl=\'BENITO JUREZ\',\r\n					cp_vl=\'03200\';','',NULL,'2014-02-19 16:27:54',1),(5,'ife_ddvc_catalogos.tbl_personal',0,'UPDATE','UPDATE ife_ddvc_catalogos.tbl_personal SET \r\n			activo=0,\r\n			actualizado=NOW(),\r\n			ID_usuario=\'\'\r\n			WHERE id_personal=\'933\'\r\n			LIMIT 1;','',NULL,'2014-02-19 16:28:14',1);
/*!40000 ALTER TABLE `sis_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sis_online`
--

DROP TABLE IF EXISTS `sis_online`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sis_online` (
  `id_online` mediumint(4) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `online` int(12) DEFAULT NULL,
  PRIMARY KEY (`id_online`),
  KEY `i_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sis_online`
--

LOCK TABLES `sis_online` WRITE;
/*!40000 ALTER TABLE `sis_online` DISABLE KEYS */;
INSERT INTO `sis_online` VALUES (1,1,1409594878);
/*!40000 ALTER TABLE `sis_online` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sis_usuarios`
--

DROP TABLE IF EXISTS `sis_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sis_usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `clave` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `grupo` enum('1','2','3','4') COLLATE utf8_spanish_ci DEFAULT '4',
  `id_personal` int(11) DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL,
  `activo` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id_usuario`),
  KEY `i_grupo` (`grupo`),
  KEY `i_activo` (`activo`),
  KEY `i_personal` (`id_personal`),
  CONSTRAINT `i_accesos` FOREIGN KEY (`id_usuario`) REFERENCES `sis_accesos` (`id_usuario`),
  CONSTRAINT `i_logs` FOREIGN KEY (`id_usuario`) REFERENCES `sis_logs` (`id_usuario`),
  CONSTRAINT `i_online` FOREIGN KEY (`id_usuario`) REFERENCES `sis_online` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sis_usuarios`
--

LOCK TABLES `sis_usuarios` WRITE;
/*!40000 ALTER TABLE `sis_usuarios` DISABLE KEYS */;
INSERT INTO `sis_usuarios` VALUES (1,'admin','super','1',1,'2014-08-27 17:56:24',1);
/*!40000 ALTER TABLE `sis_usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-09-01 13:26:16

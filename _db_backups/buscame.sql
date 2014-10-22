-- MySQL dump 10.13  Distrib 5.5.19, for Linux (x86_64)
--
-- Host: 68.178.141.137    Database: buscame
-- ------------------------------------------------------
-- Server version	5.0.96-log

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
-- Table structure for table `acceso`
--

DROP TABLE IF EXISTS `acceso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acceso` (
  `usuario` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `id_almacen` int(10) NOT NULL,
  PRIMARY KEY  (`usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acceso`
--

LOCK TABLES `acceso` WRITE;
/*!40000 ALTER TABLE `acceso` DISABLE KEYS */;
INSERT INTO `acceso` VALUES ('luisalvarez','luisaleo',0),('admin','admin12345',0),('miguelreng','miguelreng',0);
/*!40000 ALTER TABLE `acceso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `almacenes`
--

DROP TABLE IF EXISTS `almacenes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `almacenes` (
  `id_almacen` int(10) NOT NULL auto_increment,
  `usuario` varchar(30) NOT NULL,
  `contrasena` varchar(50) NOT NULL,
  `almacen` varchar(50) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `local` varchar(20) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `img` varchar(300) NOT NULL,
  `likes` int(10) NOT NULL,
  `id_centroComercial` int(10) NOT NULL,
  PRIMARY KEY  (`id_almacen`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `almacenes`
--

LOCK TABLES `almacenes` WRITE;
/*!40000 ALTER TABLE `almacenes` DISABLE KEYS */;
INSERT INTO `almacenes` VALUES (2,'admin','12345','Almacén Unicentro 1','Este almacén es de prueba para unicentro','400','','Calle prueba','http://localhost/buscame/buscame/app/imagenes/almacen1.jpg',4,1),(3,'admin2','12345','Almacén Unicentro prueba 2','Este almacén es de prueba para unicentro','102','','Calle 2 #23 -32','http://localhost/buscame/buscame/app/imagenes/almacen2.jpg',6,1),(4,'almacen','123456','Almac&eacute;n Jard&iacute;&shy;n plaza 1','Este almac&eacute;n es de prueba para Jard&iacute;n Plaza','401','2323232','Carrera sola #22-34','http://localhost/buscame/buscame/content/addProduct/contentImages/almacen/almacen1166701106041b2[1].jpg',7,2),(5,'almacen01','12345','Almacén Jardín Plaza prueba 2','Este almacén es de prueba para Jardín Plaza','538','','Calle 9 # 48 - 51','http://localhost/buscame/buscame/app/imagenes/almacen4.jpg',0,2),(6,'almacen2','12345','Palmetto Store','Este almac&eacute;n es de prueba para Palmeto Plaza','324','3232323','Calle 2a 73d-42','http://localhost/buscame/buscame/app/imagenes/almacen5.jpg',0,3),(7,'almacen3','12345','Almac&eacute;n Chipichape','Este almac&eacute;n es de prueba para Chipichappe','1232','2345678','Calle de Chipichape','http://localhost/buscame/buscame/app/imagenes/almacen6.jpg',0,4),(8,'almacen4','12345','Centenario Store','Marca Centenario Store','242','3457890','Calle 5a 23d-47','http://localhost/buscame/buscame/app/imagenes/almacen7.jpg',2,5),(9,'almacen5','12345','Cosmocentro Store','Marca de ropa Cosmocentro Store','6756','3245667','Calle cosmocentro','http://localhost/buscame/buscame/app/imagenes/almacen8.jpg',1,6),(10,'almacen6','12345','Premier Store','Marca de ropa y accesorios Premier Store','768','345678','Carrera 76 a 34-22','http://localhost/buscame/buscame/content/addProduct/contentImages/almacen6/almacen61899396376wpid-centro-comercial-Premier-limonar-Cali-autopistasur.jpg',0,7),(11,'almacen7','12345','Palmas Mall Store','Palmas Mall Store la mejor tienda de ropa en el Sur','43545','5678450','Av San Joaquin Carrera 105 #15-09 Ciudad Jardin ','http://localhost/buscame/buscame/app/imagenes/almacen10.jpg',0,8),(12,'almacen8','12345','Unico Store','Marca de ropa Unico Store, estamos ubicados en el Norte.','564','9058745','Calle del único ','http://localhost/buscame/buscame/app/imagenes/almacen11.jpg',0,9),(13,'motoneta','motoneta','Motoneta CC la 80','Empresa de ropa y accesorios','J85','+57 3007882016','cra 80 Nro 13a - 261 CC LA 80','http://localhost/buscame/buscame/content/addProduct/contentImages/motoneta/motoneta53352455motoneta_cc.png',0,10),(14,'stage_unicentro','stage_cali','Stage Unicentro','Ropa para dama','203','5213033','Cra. 100 #5-16','http://localhost/buscame/buscame/content/addProduct/contentImages/stage_unicentro/stage_unicentro1618722059stage_cc.jpg',0,1),(15,'pelikano','pelikano_pass','Pelikano San Andresito del Sur','Marca de Ropa Cale&Atilde;&plusmn;a','L2-13','(572) 3175860058','Cr 80 # 11A-51','http://localhost/buscame/buscame/app/imagenes/pelikano_almacen.jpg',0,11);
/*!40000 ALTER TABLE `almacenes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `id_categoria` int(10) NOT NULL auto_increment,
  `categoria` varchar(50) NOT NULL,
  PRIMARY KEY  (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (3,'Ropa'),(4,'Calzado'),(5,'Maletines'),(6,'Bolsos'),(7,'Accesorios');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `centrocomercial`
--

DROP TABLE IF EXISTS `centrocomercial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `centrocomercial` (
  `id_centroComercial` int(10) NOT NULL auto_increment,
  `centrocomercial` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `img` varchar(200) NOT NULL,
  `latitud` varchar(30) NOT NULL,
  `longitud` varchar(30) NOT NULL,
  `web` varchar(200) NOT NULL,
  `horario` varchar(100) NOT NULL,
  `id_ciudad` varchar(10) NOT NULL,
  PRIMARY KEY  (`id_centroComercial`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `centrocomercial`
--

LOCK TABLES `centrocomercial` WRITE;
/*!40000 ALTER TABLE `centrocomercial` DISABLE KEYS */;
INSERT INTO `centrocomercial` VALUES (1,'Centro comercial Unicentro','Cra. 100 #5-169 / Cali -Valle','339 66 26','http://localhost/buscame/buscame/app/imagenes/unicentro.jpg','3.37325','-76.5404','http://www.unicentro.com/','Todos los días','1'),(2,'Centro comercial Jardín Plaza','Carrera 98 # 16 – 200','324 7222','http://localhost/buscame/buscame/app/imagenes/jardinPlaza.jpg','3.3683306','-76.5282299','http://www.jardinplaza.com/sitio/','Todos los días','1'),(3,'Centro comercial Palmeto','Calle 9 # 48 - 51','(+2) 513 7100','http://localhost/buscame/buscame/app/imagenes/palmetoplaza.jpg','3.4127417','-76.5411813','www.palmettoplaza.com/','Todos los días','1'),(4,'Centro comercial Chipichape','Calle 38Norte 6N-35','(057 2) 659 219','http://localhost/buscame/buscame/app/imagenes/chipichape.jpg','3.4769888','-76.5291332','http://www.chipichape.com.co/','Lunes a Domingo 6am – 12am','1'),(5,'Centro comercial Cosmocentro','Cll 5 # 50-103','5531150','http://localhost/buscame/buscame/app/imagenes/cosmocentro.jpg','3.414719075049449','-76.54800564050674','http://cosmocentro.com.co/site/','De 8am a 10pm todos los días.','1'),(6,'Centro comercial Centenario','Av 4N #7N-46 Barrio Centenario','683.9604','http://localhost/buscame/buscame/app/imagenes/centenario.jpg','3.4743979','-76.5240002','http://www.centenariocc.com/','Todos los días','1'),(7,'Centro comercial Premier (Limonar)','Calle 5 # 69-03 ','(57) (2) 370888','http://localhost/buscame/buscame/app/imagenes/premier.jpg','3.3950178','-76.5463702','No tiene','Todos los días','1'),(8,'Centro comercial Palmasmall','Av San Joaquin Carrera 105 #15-09 Ciudad Jardin ','(57)(2) 312 949','http://localhost/buscame/buscame/app/imagenes/palmasmall.jpg','3.3644628871322877','-76.53384003458018','http://www.palmasmall.com/cali/','Todos los días','1'),(9,'Centro comercial Único ','Calle 52 No. 3-29','+57+2+4865050','http://localhost/buscame/buscame/app/imagenes/unico.jpg',' 3.464987','-76.501081‎','http://www.web.unico.com.co/extra-view/cali/','Todos los días','1'),(10,'Centro comercial La 80','cra 80 Nro 13a - 261','5213033','http://images03.olx.com.co/ui/6/98/16/f_103209216-f2996980.jpeg','3.3876875262318626','-76.5365982055664','No tiene','Todos los dias','1'),(11,'San Andresito del Sur','Cr 80 # 11A-51','+57 (2)312 8740','http://localhost/buscame/buscame/app/imagenes/san_cc.jpg','3.386997','-76.540248','www.sanandresitodelsur.com','10:00 A.M. A 10:00 P.M.','1');
/*!40000 ALTER TABLE `centrocomercial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `color`
--

DROP TABLE IF EXISTS `color`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `color` (
  `id_color` int(10) NOT NULL auto_increment,
  `color` varchar(50) NOT NULL,
  PRIMARY KEY  (`id_color`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `color`
--

LOCK TABLES `color` WRITE;
/*!40000 ALTER TABLE `color` DISABLE KEYS */;
INSERT INTO `color` VALUES (1,'Azul'),(2,'Verde'),(3,'Rojo'),(4,'Morado'),(5,'Gris'),(6,'Blanco'),(7,'Negro'),(8,'Rosado'),(9,'Café'),(10,'Plateado'),(11,'Varios');
/*!40000 ALTER TABLE `color` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estilo`
--

DROP TABLE IF EXISTS `estilo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estilo` (
  `id_estilo` int(10) NOT NULL auto_increment,
  `estilo` varchar(50) NOT NULL,
  PRIMARY KEY  (`id_estilo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estilo`
--

LOCK TABLES `estilo` WRITE;
/*!40000 ALTER TABLE `estilo` DISABLE KEYS */;
INSERT INTO `estilo` VALUES (1,'Casual'),(2,'Deportivo'),(3,'Elegante');
/*!40000 ALTER TABLE `estilo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `like`
--

DROP TABLE IF EXISTS `like`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `like` (
  `id_like` int(10) NOT NULL auto_increment,
  `ip` int(20) NOT NULL,
  `id_producto` int(10) NOT NULL,
  `id_almacen` int(10) NOT NULL,
  PRIMARY KEY  (`id_like`)
) ENGINE=MyISAM AUTO_INCREMENT=324 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `like`
--

LOCK TABLES `like` WRITE;
/*!40000 ALTER TABLE `like` DISABLE KEYS */;
INSERT INTO `like` VALUES (1,0,0,0),(186,1,1,1),(196,2,1,0),(195,3,5,0),(194,2,2,0),(193,2,2,0),(192,2,4,0),(197,4,2,0),(198,5,6,0),(199,5,5,0),(200,5,1,0),(201,5,3,0),(202,5,2,0),(203,5,8,0),(204,5,9,0),(205,6,4,0),(206,7,2,0),(207,6,2,0),(208,6,3,0),(209,8,2,0),(210,8,1,0),(211,8,3,0),(212,8,8,0),(213,9,1,0),(214,9,2,0),(215,9,9,0),(216,5,10,0),(217,5,0,3),(218,5,0,2),(219,6,0,3),(220,10,2,0),(221,10,4,0),(222,5,7,0),(223,9,0,3),(224,9,11,0),(225,3,0,2),(226,11,11,0),(227,11,6,0),(228,8,0,4),(229,3,4,0),(230,12,1,0),(231,13,2,0),(232,13,0,4),(233,12,0,3),(234,12,2,0),(235,12,0,4),(236,14,1,0),(237,14,0,4),(238,12,0,2),(239,5,11,0),(240,12,8,0),(241,12,8,0),(242,12,8,0),(243,12,8,0),(244,12,8,0),(245,5,5,0),(246,5,5,0),(247,5,5,0),(248,5,6,0),(249,12,8,0),(250,15,2,0),(251,151,1,0),(252,151,0,3),(253,15,5,0),(254,15,0,4),(255,15,7,0),(256,11,1,0),(257,151,8,0),(258,4,0,4),(259,152,2,0),(260,12,3,0),(261,153,0,4),(262,153,5,0),(263,153,11,0),(264,153,2,0),(265,152,8,0),(266,154,11,0),(267,1531,11,0),(268,1531,6,0),(269,1532,4,0),(270,1533,2,0),(271,1533,1,0),(272,1533,0,3),(273,1534,9,0),(274,15321,4,0),(275,15321,8,0),(276,1533,8,0),(277,1533,0,2),(278,1534,1,0),(279,153211,1,0),(280,153211,2,0),(281,153211,3,0),(282,153211,5,0),(283,153211,6,0),(284,153211,7,0),(285,153211,8,0),(286,1533,12,0),(287,12,12,0),(288,153211,12,0),(289,153211,11,0),(290,153211,9,0),(291,153211,4,0),(292,153212,13,0),(293,153212,11,0),(294,153212,5,0),(295,153212,4,0),(296,153212,1,0),(297,153212,7,0),(298,1533,5,0),(299,12,0,9),(300,1533,13,0),(301,1533,0,8),(302,153213,1,0),(303,1533,14,0),(304,153214,1,0),(305,1531,2,0),(306,1533,4,0),(307,1533,15,0),(308,1533,25,0),(309,12,29,0),(310,153215,30,0),(311,12,33,0),(312,153215,31,0),(313,12,37,0),(314,153216,37,0),(315,153217,38,0),(316,153217,1,0),(317,153215,50,0),(318,153215,8,0),(319,153218,15,0),(320,153218,0,8),(321,153219,59,0),(322,153211,59,0),(323,153220,59,0);
/*!40000 ALTER TABLE `like` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marca`
--

DROP TABLE IF EXISTS `marca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `marca` (
  `id_marca` int(10) NOT NULL auto_increment,
  `marca` varchar(50) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  PRIMARY KEY  (`id_marca`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marca`
--

LOCK TABLES `marca` WRITE;
/*!40000 ALTER TABLE `marca` DISABLE KEYS */;
INSERT INTO `marca` VALUES (1,'Adidas','Adidas marca'),(2,'Nike','Nike marca'),(3,'Studio F','Studio F marca'),(4,'Levis','Marca Levis'),(5,'Diesel','Marca Diesel'),(6,'Armani','Marca Armani'),(7,'Malet.com',''),(8,'Sport shoes',''),(9,'Motoneta',''),(10,'Stage Jeans','Ropa para dama'),(11,'Pelikano','Marca de Ropa Caleña');
/*!40000 ALTER TABLE `marca` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `material`
--

DROP TABLE IF EXISTS `material`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `material` (
  `id_material` int(10) NOT NULL auto_increment,
  `material` varchar(50) NOT NULL,
  PRIMARY KEY  (`id_material`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `material`
--

LOCK TABLES `material` WRITE;
/*!40000 ALTER TABLE `material` DISABLE KEYS */;
INSERT INTO `material` VALUES (1,'Cuero'),(2,'Tela'),(3,'Nylon'),(4,'Algodon'),(5,'Lana'),(6,'Metal'),(7,'Plastico');
/*!40000 ALTER TABLE `material` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto` (
  `id_producto` int(10) NOT NULL auto_increment,
  `id_tipo` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `precio` int(20) NOT NULL,
  `precioAnterior` int(20) NOT NULL,
  `id_rango` int(10) NOT NULL,
  `id_color` int(10) NOT NULL,
  `id_marca` int(10) NOT NULL,
  `id_categoria` int(10) NOT NULL,
  `id_material` int(10) NOT NULL,
  `tipoTalla` varchar(30) NOT NULL,
  `id_talla` int(10) NOT NULL,
  `cantidad` varchar(10) NOT NULL,
  `promocion` varchar(2) NOT NULL,
  `img1` varchar(400) NOT NULL,
  `img2` varchar(400) NOT NULL,
  `img3` varchar(400) NOT NULL,
  `likes` int(10) NOT NULL,
  `id_almacen` int(10) NOT NULL,
  `id_centrocomercial` int(10) NOT NULL,
  PRIMARY KEY  (`id_producto`)
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (1,2,'Camisa inglesa.','Camisa 100% algodón manga sisa.',30000,60000,1,6,6,3,4,'letras',41,'15','Si','http://buscameapp.com/app/imagenes/camisa.jpg','http://buscameapp.com/app/imagenes/camisa.jpg','http://buscameapp.com/app/imagenes/camisa.jpg',15,2,1),(56,15,'Bolso Andrea Ardila','Bolso 100% cale&ntilde;o, corazones muy pink',120000,0,3,8,7,6,2,'tamano',38,'30','No','http://localhost/buscame/buscame/content/addProduct/contentImages/motoneta/motoneta1669379912adriana.png','','',0,13,10),(33,5,'Camisilla Brazil','Camisilla Motoneta, Retro',29900,0,1,1,1,3,4,'letras',43,'30','No','http://localhost/buscame/buscame/content/addProduct/contentImages/motoneta/motoneta197470210943039_572282742816436_1555339533_n.jpg','http://localhost/buscame/buscame/content/addProduct/contentImages/motoneta/motoneta393610897943039_572282742816436_1555339533_n.jpg','',1,13,10),(6,3,'Blusa retro','Blusa estilo 80\'s',20000,40000,1,9,4,3,4,'letras',40,'9','Si','http://buscameapp.com/app/imagenes/blusa.jpg','http://buscameapp.com/app/imagenes/blusa.jpg','http://buscameapp.com/app/imagenes/blusa.jpg',6,4,2),(7,4,'vestido kids style','vestido para niñas ',80000,100000,2,5,5,3,5,'letras',40,'200','Si','http://buscameapp.com/app/imagenes/vestido.jpg','http://buscameapp.com/app/imagenes/vestido.jpg','http://buscameapp.com/app/imagenes/vestido.jpg',5,5,2),(8,7,'Zapatilla deportiva ','Plantilla comoda',250000,0,5,1,2,4,2,'numero',30,'200','No','http://buscameapp.com/app/imagenes/zapatilla.jpg','http://buscameapp.com/app/imagenes/zapatilla.jpg','http://buscameapp.com/app/imagenes/zapatilla.jpg',14,5,2),(9,9,'Tacones femenino','Tacones 10 mm',350000,400000,6,4,3,4,1,'numero',28,'80','Si','http://buscameapp.com/app/imagenes/tacon.jpg','http://buscameapp.com/app/imagenes/tacon.jpg','http://buscameapp.com/app/imagenes/tacon.jpg',4,6,3),(10,14,'Cartera chick','Cartera de moda ultra bonita',180000,0,4,3,3,6,1,'tamano',38,'78','No','http://buscameapp.com/app/imagenes/cartera.jpg','http://buscameapp.com/app/imagenes/cartera.jpg','http://buscameapp.com/app/imagenes/cartera.jpg',1,6,3),(11,12,'Morral juvenil t&iacute;lde','morral juvenil cool',89000,100000,2,6,2,5,2,'tamano',39,'180','Si','http://buscameapp.com/app/imagenes/maletin.jpg','http://buscameapp.com/app/imagenes/maletin.jpg','http://buscameapp.com/app/imagenes/maletin.jpg',8,7,4),(12,2,'Camisa &uacute;ltima moda','Camisa &uacute;ltima moda color negro - blanco',25000,30000,1,7,3,3,4,'letras',41,'32','Si','http://localhost/buscame/buscame/app/imagenes/camisa1.jpg','http://localhost/buscame/buscame/app/imagenes/camisa2.jpg','http://localhost/buscame/buscame/app/imagenes/camisa3.jpg',3,7,4),(13,15,'Bolso bonito','Este bolso es de prueba ',150000,200000,3,1,3,6,1,'tamano',38,'21','Si','http://localhost/buscame/buscame/app/imagenes/bolso1.jpg','','http://localhost/buscame/buscame/app/imagenes/bolso3.jpg',2,8,5),(14,18,'Maletín empresarial','Maletín empresarial blanco 10x15',120000,200000,3,6,7,5,1,'tamano',38,'21','Si','http://localhost/buscame/buscame/app/imagenes/maletin1.jpg','http://localhost/buscame/buscame/app/imagenes/maletin2.jpg','',1,8,5),(15,7,'Zapatillas sencillas ','Zapatillas sencillas rojas ',250000,0,4,3,8,4,2,'numero',31,'43','no','http://localhost/buscame/buscame/app/imagenes/zapatillas1.jpg','http://localhost/buscame/buscame/app/imagenes/zapatillas2.jpg','http://localhost/buscame/buscame/app/imagenes/zapatillas3.jpg',1,9,6),(16,6,'Jeans Levanta Cola! ','Jeans Levanta Cola! Originales',300000,380000,5,1,5,4,2,'letras',41,'31','Si','http://localhost/buscame/buscame/app/imagenes/jeans1.jpg','','',0,9,6),(17,4,'Vestido toda ocación','Vestido morado para toda ocación',370000,0,6,4,3,3,2,'letras',43,'33','no','http://localhost/buscame/buscame/app/imagenes/vestido1.jpg','http://localhost/buscame/buscame/app/imagenes/vestido2.jpg','http://localhost/buscame/buscame/app/imagenes/vestido3.jpg',0,10,7),(18,6,'Pantalón deportivo','Pantalón deportivo negro',160000,0,4,7,6,3,2,'letras',43,'21','no','http://localhost/buscame/buscame/app/imagenes/pantalon1.jpg','http://localhost/buscame/buscame/app/imagenes/pantalon2.jpg','',0,10,7),(37,6,'Jeans Stage','BlueJeans nueva colecci&oacute;n para dama.',140000,200000,3,1,10,3,4,'numero',7,'30','Si','http://anaidjeans.com/uploads/3/2/4/6/3246903/587423_orig.jpg','http://anaidjeans.com/uploads/3/2/4/6/3246903/7097631_orig.jpg','',2,14,1),(31,6,'BlueJean Fashion','BluJean para dama, Estilo fashion',84000,0,2,1,10,3,3,'numero',7,'30','No','http://localhost/buscame/buscame/content/addProduct/contentImages/stage/stage811825127jean_stage_ref._2175p.jpg','http://localhost/buscame/buscame/content/addProduct/contentImages/stage/stage137698395233-102-thickbox.jpg','',1,14,1),(29,5,'Camisilla Kali &amp; Galu','Camisilla para hacer ejercicio en la ciudad.',34900,0,1,6,9,3,4,'letras',42,'30','No','http://localhost/buscame/buscame/content/addProduct/contentImages/almacen/almacen1325442928229722_568360359875341_142096730_n.jpg','','',1,4,2),(44,19,'Gafas Bampyro','Gafas para hombre, perfectas para fiestas electro.',49900,75990,1,5,9,7,6,'tamano',38,'30','Si','http://localhost/buscame/buscame/content/addProduct/contentImages/motoneta/motoneta14473496725939_593451847366192_2059749290_n.jpg','','',0,13,10),(30,15,'Bolso Arabescos Motoneta','Bolso 100% cuero para andar como retro',110000,0,3,6,9,6,1,'tamano',39,'30','No','http://localhost/buscame/buscame/content/addProduct/contentImages/motoneta/motoneta123323361179787_585428384835205_344014270_n.jpg','','',1,13,0),(59,3,'Blusa Pelikano I love','Blusa I love Pelikano',30000,42000,1,6,11,3,4,'letras',41,'30','Si','http://localhost/buscame/buscame/content/addProduct/contentImages/pelikano/pelikano1222334443392504_281890925164954_1401756320_n.jpg','','',3,15,11),(45,5,'Camisilla Huecos','Camisilla para verano, comoda y fresca.',29900,0,1,3,9,3,4,'letras',43,'30','No','http://localhost/buscame/buscame/content/addProduct/contentImages/motoneta/motoneta1337027503310866_566262440085133_1149478265_n.jpg','','',0,13,10),(46,12,'Morral Spaceship','Morral chick para dama, espacioso y bonito.',110000,0,3,11,9,5,1,'tamano',39,'30','No','http://localhost/buscame/buscame/content/addProduct/contentImages/motoneta/motoneta142099382959279_557473414297369_1504352884_n.jpg','','',0,13,10),(47,5,'Camiseta Chewaca','Camiseta perfecta para el invierno.',39900,0,1,9,9,3,4,'letras',42,'30','No','http://localhost/buscame/buscame/content/addProduct/contentImages/motoneta/motoneta88761935445492_553246484720062_1606820397_n.jpg','','',0,13,10),(48,5,'Camisilla Esqueleto','Camisilla de Alemania, Perfecta para ir al Gimnasio.',29900,0,1,11,9,3,4,'letras',44,'30','No','http://localhost/buscame/buscame/content/addProduct/contentImages/motoneta/motoneta1779756211488308_552953374749373_598475118_n.jpg','','',0,13,10),(49,20,'Buso Black Jack','Perfecto para el invierno, estilo europeo.',44900,0,1,5,9,3,4,'letras',43,'30','No','http://localhost/buscame/buscame/content/addProduct/contentImages/motoneta/motoneta183587853772788_552431228134921_1230639207_n.jpg','','',0,13,10),(50,19,'Gafas Megaman','Perfectas para salir a tomar el sol.',39900,0,1,7,9,7,7,'tamano',39,'30','No','http://localhost/buscame/buscame/content/addProduct/contentImages/motoneta/motoneta1217390583155982_540658302645547_1808041208_n.jpg','','',1,13,10),(57,3,'Blusa Pelikano Girl','Blusa de la ultima colecci&oacute;n de Pelikano',46000,0,1,2,11,3,3,'letras',41,'30','No','http://localhost/buscame/buscame/content/addProduct/contentImages/pelikano/pelikano1809420486373964_281891565164890_1034988718_n.jpg','','',0,15,11),(58,2,'Camisa Pelikano','Camisa rosada perfecta para salir de fiesta',38000,0,1,8,11,3,4,'letras',43,'30','No','http://localhost/buscame/buscame/content/addProduct/contentImages/pelikano/pelikano834376129390810_281891328498247_1240004834_n.jpg','','',0,15,11),(60,19,'Gafas Retro Motoneta','Gafas excelentes para tomar el sol.',40000,0,1,5,9,7,6,'tamano',38,'30','No','http://localhost/buscame/buscame/content/addProduct/contentImages/motoneta/motoneta1129176159421915_10151543394894541_1323472226_n.jpg','','',0,13,10),(61,3,'Blusa fresh Pelikano','Blusa para salir a tomar sol y disfrutar de la brisa',32000,0,1,8,11,3,4,'letras',41,'30','No','http://localhost/buscame/buscame/content/addProduct/contentImages/pelikano/pelikano241069414149623_169480746405973_5754106_n.jpg','http://localhost/buscame/buscame/content/addProduct/contentImages/pelikano/pelikano1979876189156794_169480696405978_7785846_n.jpg','',0,15,11);
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rango`
--

DROP TABLE IF EXISTS `rango`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rango` (
  `id_rango` int(10) NOT NULL auto_increment,
  `rango` varchar(50) NOT NULL,
  PRIMARY KEY  (`id_rango`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rango`
--

LOCK TABLES `rango` WRITE;
/*!40000 ALTER TABLE `rango` DISABLE KEYS */;
INSERT INTO `rango` VALUES (1,'Desde $0 hasta $50.000'),(2,'Desde $50.000 hasta $100.000'),(3,'Desde $100.000 hasta $150.000'),(4,'Desde $150.000 hasta $200.000'),(5,'Desde $200.000 hasta $300.000'),(6,'Desde $300.000 hasta $500.000'),(7,'De $500.000 en adelante');
/*!40000 ALTER TABLE `rango` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `talla`
--

DROP TABLE IF EXISTS `talla`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `talla` (
  `id_talla` int(10) NOT NULL auto_increment,
  `talla` varchar(10) NOT NULL,
  `tipoTalla` varchar(30) NOT NULL,
  PRIMARY KEY  (`id_talla`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `talla`
--

LOCK TABLES `talla` WRITE;
/*!40000 ALTER TABLE `talla` DISABLE KEYS */;
INSERT INTO `talla` VALUES (1,'2','numero'),(2,'4','numero'),(3,'6','numero'),(4,'8','numero'),(5,'10','numero'),(6,'12','numero'),(7,'14','numero'),(8,'16','numero'),(9,'18','numero'),(10,'20','numero'),(11,'21','numero'),(12,'22','numero'),(13,'23','numero'),(14,'24','numero'),(15,'25','numero'),(16,'26','numero'),(17,'27','numero'),(18,'28','numero'),(19,'29','numero'),(20,'30','numero'),(21,'31','numero'),(22,'32','numero'),(23,'33','numero'),(24,'34','numero'),(25,'35','numero'),(26,'36','numero'),(27,'37','numero'),(28,'38','numero'),(29,'39','numero'),(30,'40','numero'),(31,'41','numero'),(32,'42','numero'),(33,'43','numero'),(34,'44','numero'),(35,'45','numero'),(37,'Pequeño','tamano'),(38,'Mediano','tamano'),(39,'Grande','tamano'),(40,'XS','letras'),(41,'S','letras'),(42,'M','letras'),(43,'L','letras'),(44,'XL','letras'),(45,'XXL','letras');
/*!40000 ALTER TABLE `talla` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo`
--

DROP TABLE IF EXISTS `tipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo` (
  `id_tipo` int(10) NOT NULL auto_increment,
  `tipo` varchar(50) NOT NULL,
  `id_categoria` int(10) NOT NULL,
  PRIMARY KEY  (`id_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo`
--

LOCK TABLES `tipo` WRITE;
/*!40000 ALTER TABLE `tipo` DISABLE KEYS */;
INSERT INTO `tipo` VALUES (2,'Camisas',3),(3,'Blusas',3),(4,'Vestidos',3),(5,'Camisetas',3),(6,'Pantalón',3),(7,'Zapatillas',4),(8,'Zapatos',4),(9,'Tacones',4),(10,'Sandalias',4),(11,'Tulas',5),(12,'Morrales',5),(13,'Maletas',5),(14,'Carteras',6),(15,'Bolsos',6),(16,'Discreto',6),(17,'Portafolios',5),(18,'Maletín',5),(19,'Gafas',7),(20,'Busos',3);
/*!40000 ALTER TABLE `tipo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `usuario` varchar(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `contrasena` varchar(30) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `img` varchar(300) NOT NULL,
  PRIMARY KEY  (`usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES ('pepitoperez','pepito','pepito','pepito','sdasd','notiene');
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

-- Dump completed on 2013-07-07 14:10:03

CREATE DATABASE  IF NOT EXISTS `dev_blogg` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `dev_blogg`;
-- MySQL dump 10.13  Distrib 5.6.11, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: dev_blogg
-- ------------------------------------------------------
-- Server version	5.5.33

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `valor` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Actualidades'),(2,'Sociedad'),(3,'Propaganda'),(5,'Pol&iacute;ticas'),(6,'PHPro'),(7,'filosofia'),(8,'programacion'),(9,'java'),(11,'PHP'),(12,'Node JSsss'),(13,'Patrones de dise&ntilde;o'),(14,'Metodolog&iacute;as'),(15,'Leannnn'),(17,'Agile'),(18,'Lean'),(19,'ITIL'),(26,'Markussss'),(27,'Rabbit Hole'),(29,'Rubiessswasas'),(30,'Phalcon'),(31,'Javascript');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `publications`
--

DROP TABLE IF EXISTS `publications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `publications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `contenido` text NOT NULL,
  `fcreacion` datetime NOT NULL,
  `fmodificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fpublicacion` datetime DEFAULT NULL,
  `id_autor` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `titulo_UNIQUE` (`titulo`),
  KEY `id_idx` (`id_autor`),
  KEY `id_idx1` (`id_categoria`),
  CONSTRAINT `publications-categories` FOREIGN KEY (`id_categoria`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `publications-users` FOREIGN KEY (`id_autor`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publications`
--

LOCK TABLES `publications` WRITE;
/*!40000 ALTER TABLE `publications` DISABLE KEYS */;
INSERT INTO `publications` VALUES (1,'dasasdasd','dasasdasd','<p>dsadasdasd</p>','2014-04-11 08:19:00','2014-04-25 06:50:47','2014-04-11 08:19:00',2,1),(2,'Ca&ntilde;ete pide perd&oacute;n','canete-pide-perdon','<p>dsadasdasd</p>','2014-04-11 08:19:00','2014-07-18 09:47:23','2014-04-11 08:19:00',2,3),(12,'hola como estamos','hola como estamos','<p>dasdasddasdasdasdasd</p>','2014-04-25 09:22:48','2014-04-25 07:22:48','2014-04-09 09:22:00',2,1),(15,'probando','probando','<p>48324absdhbasd</p>\r\n<p>dadaskldjlkl4u0923480932843242</p>\r\n<p>&nbsp;</p>\r\n<p>asdas423809432 nakjfnh8432487238472389 ajhdjkashdjahsdasd</p>\r\n<p>&nbsp;</p>','2014-04-25 09:34:46','2014-04-25 07:34:46','2014-04-17 09:34:00',2,1),(18,'dasdasd','dasdasd','<p>dasdddddddddddd</p>','2014-05-06 09:55:40','2014-05-06 07:55:40','2014-05-21 09:43:00',2,1),(19,'LESS  vs CSS','less--vs-css','LESS CSS no es un lenguaje complicado, sin embargo, tiene una curva de aprendizaje mediana, conseguir que los estilos funcionen es bastante r&amp;aacute;pido pero llegar a aprovecharlo al 100% toma un poco m&amp;aacute;s de tiempo.\r\nEntonces la pregunta es &amp;iquest;Por qu&amp;eacute; usar Less CSS si ya existe CSS?\r\nMejoras r&amp;aacute;pidas con poco trabajo\r\nLess CSS est&amp;aacute; desarrollado a partir de CSS por lo que la sintaxis es bastante similar, tanto que puedes mezclar archivos CSS con archivos de LESS sin problema. Puedes combinar la mitad de un estilo con la mitad de otro.\r\nEsto permite migrar estilos CSS r&amp;aacute;pidamente y luego irlos mejorando eventualmente con las ventajas de Less. Adem&amp;aacute;s el enfoque del lenguaje es ahorrar trabajo por lo que existen muchos atajos y en resumen el tiempo de desarrollo se reduce, y los resultados se amplifican.\r\nMejor organizaci&amp;oacute;n en desarrollo\r\nDentro de las caracteristicas de Less encontramos uso de variables, namespaces, mixins e importaci&amp;oacute;n de hojas de estilo externas (igual que CSS). Esto reunido en un solo lenguaje permiten que desde el punto de vista de desarrollo podamos reutilizar estilos, definir reglas, paletas de colores e incluso mantener nuestra propia politica para crear estilos. Literalmente podemos trabajar con &amp;ldquo;librer&amp;iacute;as de estilos&amp;rdquo; por separado y al final ofrecerle al visitante un &amp;uacute;nico archivo CSS compilado, comprimido y funcional.\r\n\r\nBootstrap de Twitter trabaja con decenas de archivos less que se reducen a tres para el visitante\r\n\r\nOptimizaci&amp;oacute;n de estilos CSS\r\nAl compilar LESS CSS con una aplicaci&amp;oacute;n como Simpless o Less.app podemos definir la opci&amp;oacute;n de que comprima el archivo, de forma que la hoja de estilos final ocupe el menor espacio posible.\r\nReutilizaci&amp;oacute;n de estilos\r\nLos mixins de Less permiten reutilizar estilos, de forma que podemos definir un clase con estilos redondeados y luego invocarlas en diferentes clases para duplicar el estilo.\r\n.control{\r\nborder-radius: 4px;\r\nborder:solid 1px #aaa;\r\nbackground:#eee;\r\n}\r\n.boton{\r\n.control;\r\nfont-size:1em;\r\n}\r\n.panel{\r\n.control;\r\npadding:.5em;\r\n}\r\nEl estilo anterior da como resultado que la clase bot&amp;oacute;n y panel obtengan bordes redondeados, bordes y fondo gris de la clase control sin necesidad de escribirlo dos veces.\r\nFunciones aritmeticas\r\nEsta caracteristica es simplemente genial, podemos definir propiedades utilizando operaciones aritmeticas para ahorrarnos tiempo con la calculadora (o los dedos :p )\r\np{\r\nfont-size: 18/16em; // da como resultado font-size:1.125em\r\n}\r\n&amp;nbsp;Variables\r\nEl uso de variables nos ahorra estar memorizando o copiando valores, como por ejemplo colores, nombres de fuentes, etc. En CSS cada vez que necesitamos un color debemos recordar el c&amp;oacute;digo exacto mientras que con LESS solo debemos recordar el nombre de la variable. En el siguiente ejemplo defino el color de un bot&amp;oacute;n usando variables, y usando una funci&amp;oacute;n de color le indico que al posicionar el puntero encima cambie el color rojo por uno m&amp;aacute;s claro (funci&amp;oacute;n lighten al 20%).\r\n@rojo: #f00;\r\n@verde: #0f0;\r\n@blanco: #fff;\r\n.boton{\r\nbackground:@rojo;\r\ncolor:@blanco;\r\n&amp;amp;:hover{\r\nbackground: lighten(@rojo, 20%);\r\n}\r\n}','2014-05-06 10:09:57','2014-05-21 14:11:32','2014-05-15 11:00:00',2,8),(20,'Noticia2','Noticia2','<p>dasdsadsadasdasd</p>','2014-05-06 10:18:51','2014-05-06 08:18:51','2014-05-08 10:18:00',2,1),(23,'dhsajdhjashdj','dhsajdhjashdj','<p>hdkasjhdkjashdjkashd84e0918420918294812904jdkajslkdjaskd</p>','2014-05-06 10:33:35','2014-05-06 08:33:35','2014-05-21 10:33:00',2,1),(24,'probando last insert','probando-last-insert','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean consequat porttitor elementum. Mauris pulvinar semper lobortis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean consequat porttitor elementum. Mauris pulvinar semper lobortis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean consequat porttitor elementum. Mauris pulvinar semper lobortis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean consequat porttitor elementum. Mauris pulvinar semper lobortis.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean consequat porttitor elementum. Mauris pulvinar semper lobortis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean consequat porttitor elementum. Mauris pulvinar semper lobortis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean consequat porttitor elementum. Mauris pulvinar semper lobortis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean consequat porttitor elementum. Mauris pulvinar semper lobortis.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean consequat porttitor elementum. Mauris pulvinar semper lobortis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean consequat porttitor elementum. Mauris pulvinar semper lobortis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean consequat porttitor elementum. Mauris pulvinar semper lobortis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean consequat porttitor elementum. Mauris pulvinar semper lobortis.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean consequat porttitor elementum. Mauris pulvinar semper lobortis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean consequat porttitor elementum. Mauris pulvinar semper lobortis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean consequat porttitor elementum. Mauris pulvinar semper lobortis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean consequat porttitor elementum. Mauris pulvinar semper lobortis.</p>\r\n<p>Probando ultimo parrafoooooo</p>','2014-05-06 10:39:29','2014-06-16 07:09:48','2014-05-28 10:39:00',2,6),(25,'Probando segundo vez','probando-segundo','<p>Vamos a ir probando que tal se muestran los parrafos, tengo mis dudas porque no se que pasa pora qui, podeemosos ir asjdjppor jsdjaskdjasdj djjj4e234r 2nldjaskldjlkasjdlkajsd ajsdakjsdlkajsdljas djaslkdjaslkdjas djsaldjalsdjjdasld jj34lk24l adlj aslkjdjasldjalskj djaslj dlasj dajsd jaskljd ajsdlj asldjlasjdjdjasljd3jasjdlasj aksjd laksjdklasjdkljaskljdaklsdj ajsd jaskdjklasjdklasjdlasjdkjas ljdasjdklasjdkldjaskljdjjdjjdjddjjdjdjaldaskj fsdfsdfsdfsdfdsffsd fsdf sdfsdf sd f sd fsd f</p>\r\n<p>Vamos a ir probando que tal se muestran los parrafos, tengo mis dudas porque no se que pasa pora qui, podeemosos ir asjdjppor jsdjaskdjasdj djjj4e234r 2nldjaskldjlkasjdlkajsd ajsdakjsdlkajsdljas djaslkdjaslkdjas djsaldjalsdjjdasld jj34lk24l adlj aslkjdjasldjalskj djaslj dlasj dajsd jaskljd ajsdlj asldjlasjdjdjasljd3jasjdlasj aksjd laksjdklasjdkljaskljdaklsdj ajsd jaskdjklasjdklasjdlasjdkjas ljdasjdklasjdkldjaskljdjjdjjdjddjjdjdjaldaskj fsdfsdfsdfsdfdsffsd fsdf sdfsdf sd f sd fsd f</p>\r\n<p>Vamos a ir probando que tal se muestran los parrafos, tengo mis dudas porque no se que pasa pora qui, podeemosos ir asjdjppor jsdjaskdjasdj djjj4e234r 2nldjaskldjlkasjdlkajsd ajsdakjsdlkajsdljas djaslkdjaslkdjas djsaldjalsdjjdasld jj34lk24l adlj aslkjdjasldjalskj djaslj dlasj dajsd jaskljd ajsdlj asldjlasjdjdjasljd3jasjdlasj aksjd laksjdklasjdkljaskljdaklsdj ajsd jaskdjklasjdklasjdlasjdkjas ljdasjdklasjdkldjaskljdjjdjjdjddjjdjdjaldaskj fsdfsdfsdfsdfdsffsd fsdf sdfsdf sd f sd fsd f</p>','2014-05-06 10:44:14','2014-07-18 09:59:27','2014-05-21 10:43:00',2,5),(32,'Brasil gana a Croacia por dos goles a uno','brasil-gana-a-croacia-por-dos-goles-a-uno','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean consequat porttitor elementum. Mauris pulvinar semper lobortis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean consequat porttitor elementum. Mauris pulvinar semper lobortis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean consequat porttitor elementum. Mauris pulvinar semper lobortis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean consequat porttitor elementum. Mauris pulvinar semper lobortis. dsadaslkdasdasdasd &nbsp;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean consequat porttitor elementum. Mauris pulvinar semper lobortis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean consequat porttitor elementum. Mauris pulvinar semper lobortis.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean consequat porttitor elementum. Mauris pulvinar semper lobortis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean consequat porttitor elementum. Mauris pulvinar semper lobortis. dsadaslkdasdasdasd &nbsp;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean consequat porttitor elementum. Mauris pulvinar semper lobortis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean consequat porttitor elementum. Mauris pulvinar semper lobortis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean consequat porttitor elementum. Mauris pulvinar semper lobortis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean consequat porttitor elementum. Mauris pulvinar semper lobortis. dsadaslkdasdasdasd &nbsp;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean consequat porttitor elementum. Mauris pulvinar semper lobortis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean consequat porttitor elementum. Mauris pulvinar semper lobortis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean consequat porttitor elementum. Mauris pulvinar semper lobortis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean consequat porttitor elementum. Mauris pulvinar semper lobortis. dsadaslkdasdasdasd &nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean consequat porttitor elementum. Mauris pulvinar semper lobortis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean consequat porttitor elementum. Mauris pulvinar semper lobortis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean consequat porttitor elementum. Mauris pulvinar semper lobortis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean consequat porttitor elementum. Mauris pulvinar semper lobortis. dsadaslkdasdasdasd &nbsp;</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean consequat porttitor elementum. Mauris pulvinar semper lobortis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean consequat porttitor elementum. Mauris pulvinar semper lobortis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean consequat porttitor elementum. Mauris pulvinar semper lobortis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean consequat porttitor elementum. Mauris pulvinar semper lobortis. dsadaslkdasdasdasd &nbsp;</p>','2014-05-06 12:16:43','2014-06-17 08:26:39','2014-05-27 12:16:00',2,18),(41,'Tutorial sobre NodeJS','tutorial-sobre-nodejs','1','2014-05-07 10:47:15','2014-05-21 14:46:14','2014-05-21 15:00:00',2,12),(42,'El cambio clim&aacute;tica es imparable','el-cambio-climatica-es','<p>dksjahdkjhask32849032409324hjahsjdhsajdhajsh 823490128409128498124 hdhajsdhjashdjashd 823908213982198390dhjashdhasjdh 2038u2198302913hdhdhdasjhd</p>','2014-05-16 12:38:29','2014-07-18 09:59:33','2014-05-13 12:38:00',2,27),(44,'Elena Valenciano','elena-valenciano','Esta perdidaaaaaaaaaaaaaaaaaaaaaaaaaaaaa','2014-05-21 01:26:28','2014-05-21 11:40:47','2014-05-21 16:00:00',2,2),(45,'El Banco Santander lanza cr&eacute;ditos al fin','el-banco-santander-lanza-creditos-al','<p>Bot&iacute;n ha abierto el grifo</p>','2014-05-21 01:32:12','2014-07-18 09:59:20','2014-05-21 22:00:00',2,2),(46,'Probando edici&oacute;n','probando-edici&oacute;n','<p>dhasjkdhaskjdh2390\'1293\'012312dsadasd</p>','2014-05-21 01:48:12','2014-06-25 06:40:31','2014-05-21 17:00:00',2,18),(47,'Nadella se convierte en el primer gran l&iacute;der del mundo tecnol&oacute;gico empresarial','nadella-se-convierte-en-el-primer-gran-lider-del-mundo','<p>Casi 6 meses despu&eacute;s de acceder a la posici&oacute;n de CEO de Microsoft, Satya Nadella, por primera vez, en un memo escrito a toda la empresa, nos da una verdadera muestra de lo que puede ser el futuro de Microsoft.&nbsp;La versi&oacute;n resumida es: Vienen cambios estructurales en la compa&ntilde;&iacute;a.</p>\r\n<p>Tal vez lo m&aacute;s interesante del memorando es que Windows dej&oacute; de ser, como dec&iacute;a Steve Ballmer,&nbsp;&rdquo;lo mas importante para Microsoft&rdquo;. En TECHcetera no creemos que exista la posibilidad de que Windows vaya a desaparecer. Windows es una pieza esencial del entramado estrat&eacute;gico de Microsoft, pero por primera vez en su historia, ya no ser&aacute; el centro de su estrategia. Ya no habr&aacute; el mandato de llevar a Windows a cada dispositivo. El nuevo centro gravitacional de la empresa es la productividad, con completa independencia de la plataforma.</p>\r\n<p>Nadella se convierte en el primer gran l&iacute;der del mundo tecnol&oacute;gico empresarial que reconoce abiertamente que la separaci&oacute;n entre el mercado empresarial y el mercado de consumo se est&aacute; borrando. Las soluciones de Microsoft, sea Office 365, Yammer, Bing, Skype o OneDrive tienen que funcionar en ambos mundos y en cualquier dispositivo, permitiendo que los usuarios aprovechen sus ventajas independientemente del contexto en donde se encuentran. Ahora ya es clara para nosotros, la estrategia detr&aacute;s de producir una versi&oacute;n de Office para iOS.</p>\r\n<p>Es muy posible que Microsoft empiece a buscar tambi&eacute;n esa intersecci&oacute;n entre la tecnolog&iacute;a y las artes liberales que tanto cacare&oacute; Steve Jobs. No es la &uacute;nica empresa en hacer ese viraje. Tambi&eacute;n lo o&iacute;mos de&nbsp;Kazuo Hirai en su presentaci&oacute;n del CES a principios del a&ntilde;o.&nbsp;Esa es definitivamente la tendencia tecnol&oacute;gica de la actualidad.</p>','2014-07-18 10:36:25','2014-07-18 10:02:19','2014-08-01 10:36:00',2,7);
/*!40000 ALTER TABLE `publications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `publications_tags`
--

DROP TABLE IF EXISTS `publications_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `publications_tags` (
  `id_publication` int(11) NOT NULL,
  `id_tag` int(11) NOT NULL,
  PRIMARY KEY (`id_publication`,`id_tag`),
  KEY `publication-tag_idx` (`id_tag`),
  CONSTRAINT `publi_fk` FOREIGN KEY (`id_publication`) REFERENCES `publications` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tag_fk` FOREIGN KEY (`id_tag`) REFERENCES `tags` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publications_tags`
--

LOCK TABLES `publications_tags` WRITE;
/*!40000 ALTER TABLE `publications_tags` DISABLE KEYS */;
INSERT INTO `publications_tags` VALUES (24,1),(45,1),(46,1),(47,1),(24,2),(42,2),(44,3),(46,3);
/*!40000 ALTER TABLE `publications_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `valor` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (0,'ADMIN'),(1,'EDITOR'),(2,'AUTOR'),(3,'COLABORADOR'),(4,'SUBSCRIPTOR');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `statistics`
--

DROP TABLE IF EXISTS `statistics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `statistics` (
  `id` int(11) NOT NULL,
  `id_noticia` int(11) NOT NULL,
  `nfacebook` int(11) DEFAULT NULL,
  `ntwitter` int(11) DEFAULT NULL,
  `ngoogle+` int(11) DEFAULT NULL,
  `ncomentarios` int(11) DEFAULT NULL,
  `nvisitas` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `statistics-publications_idx` (`id_noticia`),
  CONSTRAINT `statistics-publications` FOREIGN KEY (`id_noticia`) REFERENCES `publications` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statistics`
--

LOCK TABLES `statistics` WRITE;
/*!40000 ALTER TABLE `statistics` DISABLE KEYS */;
/*!40000 ALTER TABLE `statistics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `valor` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES (1,'La crisis econ&oacute;mica'),(2,'Misterios sin resolverse'),(3,'Columna de opini&oacute;nes'),(4,'Imprescindiblesss'),(5,'Empleo y emprendimiento'),(6,'Curiosidades'),(7,'Compras compulsivas'),(9,'bbbbbaaaww'),(10,'probandoooooooo'),(11,'otro masssss');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(45) NOT NULL,
  `id_rol` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_idx` (`id_rol`),
  CONSTRAINT `users-roles` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'Victor Castineira','vancasti86@gmail.com','1234',0),(3,'victor','victorvancasti@gmail.com','5678',0),(4,'victor','dasdasd','dasdasd',0),(5,'Maria Carmen','carmen@roro.com','1111',0),(6,'Manuel Pablo','pablo@ras.com','1111',0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-07-18 12:33:28

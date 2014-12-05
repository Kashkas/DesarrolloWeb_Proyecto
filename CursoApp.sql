# ************************************************************
# Sequel Pro SQL dump
# Version 4135
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.5.34)
# Database: CursoApp
# Generation Time: 2014-12-05 16:50:00 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table Asignatura
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Asignatura`;

CREATE TABLE `Asignatura` (
  `codigo` varchar(11) NOT NULL DEFAULT '',
  `nombre` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `Asignatura` WRITE;
/*!40000 ALTER TABLE `Asignatura` DISABLE KEYS */;

INSERT INTO `Asignatura` (`codigo`, `nombre`)
VALUES
	('CIT1000','Programacion'),
	('CIT1010','Programacion Avanzada'),
	('CIT2000','Estructuras de Datos'),
	('CIT2100','Redes de Datos');

/*!40000 ALTER TABLE `Asignatura` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Curso
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Curso`;

CREATE TABLE `Curso` (
  `codigo_asignatura` varchar(11) NOT NULL DEFAULT '',
  `seccion` int(11) NOT NULL,
  `semestre` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `rut_profesor` int(11) DEFAULT NULL,
  PRIMARY KEY (`codigo_asignatura`,`seccion`,`semestre`,`year`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table Curso_Asignado
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Curso_Asignado`;

CREATE TABLE `Curso_Asignado` (
  `codigo_asignatura` varchar(11) NOT NULL DEFAULT '',
  `seccion` int(11) NOT NULL DEFAULT '0',
  `semestre` int(11) NOT NULL DEFAULT '0',
  `year` int(11) NOT NULL DEFAULT '0',
  `rut_alumno` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`codigo_asignatura`,`seccion`,`semestre`,`year`,`rut_alumno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `Curso_Asignado` WRITE;
/*!40000 ALTER TABLE `Curso_Asignado` DISABLE KEYS */;

INSERT INTO `Curso_Asignado` (`codigo_asignatura`, `seccion`, `semestre`, `year`, `rut_alumno`)
VALUES
	('CIT2000',1,2,2014,16531712),
	('CIT2100',1,2,2014,16531712);

/*!40000 ALTER TABLE `Curso_Asignado` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Documentos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Documentos`;

CREATE TABLE `Documentos` (
  `codigo_asignatura` varchar(11) NOT NULL DEFAULT '',
  `seccion` int(11) NOT NULL DEFAULT '0',
  `semestre` int(11) NOT NULL DEFAULT '0',
  `year` int(11) NOT NULL DEFAULT '0',
  `nombre_documento` varchar(30) NOT NULL DEFAULT '',
  `rut_integrante` int(11) DEFAULT NULL,
  PRIMARY KEY (`codigo_asignatura`,`seccion`,`semestre`,`year`,`nombre_documento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table Foro
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Foro`;

CREATE TABLE `Foro` (
  `codigo_asignatura` varchar(11) NOT NULL DEFAULT '',
  `seccion` int(11) NOT NULL DEFAULT '0',
  `semestre` int(11) NOT NULL DEFAULT '0',
  `year` int(11) NOT NULL DEFAULT '0',
  `id` int(11) NOT NULL DEFAULT '0',
  `id_padre` int(11) DEFAULT NULL,
  `titulo` varchar(30) DEFAULT NULL,
  `texto` varchar(1500) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `rut_ingreso` int(11) DEFAULT NULL,
  PRIMARY KEY (`codigo_asignatura`,`seccion`,`semestre`,`year`,`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table Login
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Login`;

CREATE TABLE `Login` (
  `rut` int(11) unsigned NOT NULL,
  `dv` int(1) NOT NULL DEFAULT '0',
  `usuario` varchar(30) NOT NULL DEFAULT '',
  `pass` varchar(20) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  PRIMARY KEY (`rut`,`dv`,`usuario`),
  CONSTRAINT `usuario_login` FOREIGN KEY (`rut`) REFERENCES `Usuario` (`rut`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `Login` WRITE;
/*!40000 ALTER TABLE `Login` DISABLE KEYS */;

INSERT INTO `Login` (`rut`, `dv`, `usuario`, `pass`, `tipo`)
VALUES
	(16531712,2,'juaramir','hola123',2);

/*!40000 ALTER TABLE `Login` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Matricula
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Matricula`;

CREATE TABLE `Matricula` (
  `rut_alumno` int(11) unsigned NOT NULL,
  `matricula` int(11) DEFAULT NULL,
  PRIMARY KEY (`rut_alumno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table Notas
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Notas`;

CREATE TABLE `Notas` (
  `codigo_asignatura` varchar(11) NOT NULL DEFAULT '',
  `seccion` int(11) NOT NULL DEFAULT '0',
  `semestre` int(11) NOT NULL DEFAULT '0',
  `year` int(11) NOT NULL DEFAULT '0',
  `rut_alumno` int(11) NOT NULL DEFAULT '0',
  `id_nota` int(11) unsigned NOT NULL,
  `nota` int(11) DEFAULT NULL,
  `porcentaje` int(11) DEFAULT NULL,
  PRIMARY KEY (`codigo_asignatura`,`seccion`,`semestre`,`year`,`rut_alumno`,`id_nota`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table Noticias
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Noticias`;

CREATE TABLE `Noticias` (
  `codigo_asignatura` varchar(11) NOT NULL DEFAULT '',
  `seccion` int(11) NOT NULL DEFAULT '0',
  `semestre` int(11) NOT NULL DEFAULT '0',
  `year` int(11) NOT NULL DEFAULT '0',
  `id` int(11) NOT NULL DEFAULT '0',
  `titulo` varchar(30) DEFAULT NULL,
  `texto` varchar(1500) DEFAULT NULL,
  `rut_ingreso` int(11) DEFAULT NULL,
  PRIMARY KEY (`codigo_asignatura`,`seccion`,`semestre`,`year`,`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table Tipo_Usuario
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Tipo_Usuario`;

CREATE TABLE `Tipo_Usuario` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tipo_usuario` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `Tipo_Usuario` WRITE;
/*!40000 ALTER TABLE `Tipo_Usuario` DISABLE KEYS */;

INSERT INTO `Tipo_Usuario` (`id`, `tipo_usuario`)
VALUES
	(1,'alumno'),
	(2,'profesor'),
	(3,'administrador');

/*!40000 ALTER TABLE `Tipo_Usuario` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Usuario
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Usuario`;

CREATE TABLE `Usuario` (
  `rut` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `dv` int(1) DEFAULT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `apellido` varchar(30) DEFAULT NULL,
  `correo_institucional` varchar(30) DEFAULT NULL,
  `correo_alternativo` varchar(30) DEFAULT NULL,
  `id_tipo_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`rut`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `Usuario` WRITE;
/*!40000 ALTER TABLE `Usuario` DISABLE KEYS */;

INSERT INTO `Usuario` (`rut`, `dv`, `nombre`, `apellido`, `correo_institucional`, `correo_alternativo`, `id_tipo_usuario`)
VALUES
	(16531712,2,'Juan Pablo','Ramirez Bachmann','juan.ramirezb@mail.udp.cl',NULL,1);

/*!40000 ALTER TABLE `Usuario` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

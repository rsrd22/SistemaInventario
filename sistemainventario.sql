/*
SQLyog Ultimate v8.82 
MySQL - 5.5.5-10.4.6-MariaDB : Database - sistemainventario
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`sistemainventario` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_spanish_ci */;

USE `sistemainventario`;

/*Table structure for table `categorias` */

DROP TABLE IF EXISTS `categorias`;

CREATE TABLE `categorias` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `descripcion` text COLLATE latin1_spanish_ci DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `id_usuario` int(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*Data for the table `categorias` */

/*Table structure for table `clientes` */

DROP TABLE IF EXISTS `clientes`;

CREATE TABLE `clientes` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `id_tercero` int(50) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `id_usuario` int(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*Data for the table `clientes` */

/*Table structure for table `compras` */

DROP TABLE IF EXISTS `compras`;

CREATE TABLE `compras` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `id_comprobante` int(50) DEFAULT NULL,
  `id_proveedor` int(50) DEFAULT NULL,
  `numero_comprobante` varchar(30) COLLATE latin1_spanish_ci DEFAULT NULL,
  `total` int(30) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `id_usuario` int(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*Data for the table `compras` */

/*Table structure for table `compraxproductos` */

DROP TABLE IF EXISTS `compraxproductos`;

CREATE TABLE `compraxproductos` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `id_compra` int(50) DEFAULT NULL,
  `id_producto` int(50) DEFAULT NULL,
  `precio` int(100) DEFAULT NULL,
  `cantidad` int(50) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `id_usuario` int(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*Data for the table `compraxproductos` */

/*Table structure for table `comprobantes` */

DROP TABLE IF EXISTS `comprobantes`;

CREATE TABLE `comprobantes` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `descripcion` text COLLATE latin1_spanish_ci DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `id_usuario` int(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*Data for the table `comprobantes` */

/*Table structure for table `gastos` */

DROP TABLE IF EXISTS `gastos`;

CREATE TABLE `gastos` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `descripcion` text COLLATE latin1_spanish_ci DEFAULT NULL,
  `monto` int(20) DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `id_usuario` int(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*Data for the table `gastos` */

/*Table structure for table `inventario` */

DROP TABLE IF EXISTS `inventario`;

CREATE TABLE `inventario` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `id_producto` int(50) DEFAULT NULL,
  `entradas` int(50) DEFAULT NULL,
  `salidas` int(50) DEFAULT NULL,
  `existencia` int(50) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `id_usuario` int(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*Data for the table `inventario` */

/*Table structure for table `productos` */

DROP TABLE IF EXISTS `productos`;

CREATE TABLE `productos` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `id_categoria` int(50) DEFAULT NULL,
  `descripcion` varchar(200) COLLATE latin1_spanish_ci DEFAULT NULL,
  `foto` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `codigo` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `precio_venta` int(20) DEFAULT NULL,
  `precio_compra` int(20) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `id_usuario` int(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*Data for the table `productos` */

/*Table structure for table `proveedores` */

DROP TABLE IF EXISTS `proveedores`;

CREATE TABLE `proveedores` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `id_tercero` int(50) DEFAULT NULL,
  `pagina_web` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `id_usuario` int(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*Data for the table `proveedores` */

/*Table structure for table `terceros` */

DROP TABLE IF EXISTS `terceros`;

CREATE TABLE `terceros` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `tpo_documento` enum('cc') COLLATE latin1_spanish_ci DEFAULT NULL,
  `numero` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `primer_nombre` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `segundo_nombre` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `primer_apellido` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `segundo_apellido` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `direccion` text COLLATE latin1_spanish_ci DEFAULT NULL,
  `correo` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `id_usuario` int(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*Data for the table `terceros` */

/*Table structure for table `tercerosxtelefono` */

DROP TABLE IF EXISTS `tercerosxtelefono`;

CREATE TABLE `tercerosxtelefono` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(50) DEFAULT NULL,
  `numero` int(10) DEFAULT NULL,
  `tipo` enum('fijo','movil') COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*Data for the table `tercerosxtelefono` */

/*Table structure for table `tipo_pagos` */

DROP TABLE IF EXISTS `tipo_pagos`;

CREATE TABLE `tipo_pagos` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `descripcion` text COLLATE latin1_spanish_ci DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `id_usuario` int(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*Data for the table `tipo_pagos` */

/*Table structure for table `tipo_ventas` */

DROP TABLE IF EXISTS `tipo_ventas`;

CREATE TABLE `tipo_ventas` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `descripcion` text COLLATE latin1_spanish_ci DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `id_usuario` int(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*Data for the table `tipo_ventas` */

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `pk_usuario` int(50) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `clave` text COLLATE latin1_spanish_ci NOT NULL,
  `estado` enum('Activo','Inactivo','','') COLLATE latin1_spanish_ci NOT NULL,
  `fk_perfil` int(10) NOT NULL,
  PRIMARY KEY (`pk_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*Data for the table `usuarios` */

/*Table structure for table `ventas` */

DROP TABLE IF EXISTS `ventas`;

CREATE TABLE `ventas` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `id_comprobante` int(50) DEFAULT NULL,
  `id_cliente` int(50) DEFAULT NULL,
  `id_tipopago` int(50) DEFAULT NULL,
  `numero_comprobante` varchar(30) COLLATE latin1_spanish_ci DEFAULT NULL,
  `iva` double DEFAULT NULL,
  `subtotal` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `id_usuario` int(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*Data for the table `ventas` */

/*Table structure for table `ventaxproductos` */

DROP TABLE IF EXISTS `ventaxproductos`;

CREATE TABLE `ventaxproductos` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `id_venta` int(50) DEFAULT NULL,
  `id_producto` int(50) DEFAULT NULL,
  `precio` int(100) DEFAULT NULL,
  `cantidad` int(50) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `id_usuario` int(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

/*Data for the table `ventaxproductos` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

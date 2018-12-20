/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50067
Source Host           : localhost:3306
Source Database       : control_consumo

Target Server Type    : MYSQL
Target Server Version : 50067
File Encoding         : 65001

Date: 2018-12-20 10:27:06
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `cargas`
-- ----------------------------
DROP TABLE IF EXISTS `cargas`;
CREATE TABLE `cargas` (
  `idCarga` int(11) NOT NULL auto_increment,
  `fecha` date default NULL,
  `idVehiculo` int(11) default NULL,
  `litros` double(11,1) default NULL,
  `precinto` int(11) default NULL,
  `idOperario` int(11) default NULL,
  `observaciones` text,
  `precio` double(11,2) default NULL,
  PRIMARY KEY  (`idCarga`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cargas
-- ----------------------------
INSERT INTO `cargas` VALUES ('38', '2018-12-09', '1', '435.0', '0', '13', '', '50.00');
INSERT INTO `cargas` VALUES ('39', '2018-12-11', '1', '303.0', '0', '13', '', '50.00');
INSERT INTO `cargas` VALUES ('40', '2018-12-14', '1', '472.0', '0', '13', '', '50.00');
INSERT INTO `cargas` VALUES ('41', '2018-12-15', '1', '355.0', '0', '13', '', '50.00');
INSERT INTO `cargas` VALUES ('42', '2018-12-18', '1', '235.0', '0', '13', '', '50.00');
INSERT INTO `cargas` VALUES ('43', '2018-12-22', '1', '289.0', '0', '13', '', '50.00');
INSERT INTO `cargas` VALUES ('44', '2018-12-24', '1', '459.0', '0', '13', '', '50.00');
INSERT INTO `cargas` VALUES ('45', '2018-12-27', '1', '361.0', '0', '13', '', '50.00');
INSERT INTO `cargas` VALUES ('35', '2018-12-02', '1', '492.0', '0', '13', '', '50.00');
INSERT INTO `cargas` VALUES ('36', '2018-12-04', '1', '429.0', '0', '13', '', '50.00');
INSERT INTO `cargas` VALUES ('37', '2018-12-07', '1', '442.0', '0', '13', '', '50.00');
INSERT INTO `cargas` VALUES ('46', '2018-12-29', '1', '443.0', '0', '13', '', '50.00');
INSERT INTO `cargas` VALUES ('47', '2018-12-31', '1', '120.0', '0', '13', '', '50.00');

-- ----------------------------
-- Table structure for `checklist`
-- ----------------------------
DROP TABLE IF EXISTS `checklist`;
CREATE TABLE `checklist` (
  `idChecklist` int(11) NOT NULL auto_increment,
  `fecha` date default NULL,
  `idVehiculo` int(11) default NULL,
  `idOperario` int(11) default NULL,
  PRIMARY KEY  (`idChecklist`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of checklist
-- ----------------------------
INSERT INTO `checklist` VALUES ('6', '2018-12-03', '1', '13');
INSERT INTO `checklist` VALUES ('8', '2018-12-10', '1', '13');
INSERT INTO `checklist` VALUES ('7', '2018-12-05', '1', '13');
INSERT INTO `checklist` VALUES ('9', '2018-12-24', '1', '13');

-- ----------------------------
-- Table structure for `detalles`
-- ----------------------------
DROP TABLE IF EXISTS `detalles`;
CREATE TABLE `detalles` (
  `idDetalle` int(11) NOT NULL auto_increment,
  `idChecklist` int(11) default NULL,
  `idItem` int(11) default NULL,
  `detalles` text,
  `solucionado` date default NULL,
  PRIMARY KEY  (`idDetalle`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of detalles
-- ----------------------------
INSERT INTO `detalles` VALUES ('12', '6', '1', '', null);
INSERT INTO `detalles` VALUES ('13', '6', '7', 'Esta muy pesada', null);
INSERT INTO `detalles` VALUES ('14', '6', '8', '', null);
INSERT INTO `detalles` VALUES ('15', '7', '1', 'Cargar aceite', null);
INSERT INTO `detalles` VALUES ('16', '7', '7', '', '2018-12-20');
INSERT INTO `detalles` VALUES ('17', '8', '7', '', null);
INSERT INTO `detalles` VALUES ('18', '8', '8', '', null);
INSERT INTO `detalles` VALUES ('19', '8', '12', 'Se quemo la delantera derecha', null);
INSERT INTO `detalles` VALUES ('20', '9', '1', '', null);
INSERT INTO `detalles` VALUES ('21', '9', '4', '', null);

-- ----------------------------
-- Table structure for `items`
-- ----------------------------
DROP TABLE IF EXISTS `items`;
CREATE TABLE `items` (
  `idItem` int(11) NOT NULL auto_increment,
  `idSeccion` int(11) default NULL,
  `item` varchar(30) default NULL,
  PRIMARY KEY  (`idItem`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of items
-- ----------------------------
INSERT INTO `items` VALUES ('1', '1', 'Aceite del motor');
INSERT INTO `items` VALUES ('2', '1', 'Líquido refrigerante');
INSERT INTO `items` VALUES ('3', '1', 'Fluído Hidráulico');
INSERT INTO `items` VALUES ('4', '1', 'Falla general');
INSERT INTO `items` VALUES ('5', '1', 'Ruido extraño');
INSERT INTO `items` VALUES ('6', '1', 'Fuerza');
INSERT INTO `items` VALUES ('7', '2', 'Dirección');
INSERT INTO `items` VALUES ('8', '2', 'Frenos');
INSERT INTO `items` VALUES ('9', '2', 'Cubiertas');
INSERT INTO `items` VALUES ('10', '2', 'Suspensión');
INSERT INTO `items` VALUES ('11', '3', 'Arranque');
INSERT INTO `items` VALUES ('12', '3', 'Luces');
INSERT INTO `items` VALUES ('13', '3', 'Tablero');
INSERT INTO `items` VALUES ('14', '3', 'Aire acondicionado');
INSERT INTO `items` VALUES ('15', '3', 'Limpia parabrisas');
INSERT INTO `items` VALUES ('16', '4', 'Falla general');
INSERT INTO `items` VALUES ('17', '5', 'Falla general');
INSERT INTO `items` VALUES ('19', '6', 'Falla general');

-- ----------------------------
-- Table structure for `operarios`
-- ----------------------------
DROP TABLE IF EXISTS `operarios`;
CREATE TABLE `operarios` (
  `idOperario` int(11) NOT NULL auto_increment,
  `nombre` varchar(50) default NULL,
  `abreviatura` varchar(20) default NULL,
  PRIMARY KEY  (`idOperario`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of operarios
-- ----------------------------
INSERT INTO `operarios` VALUES ('1', 'Juan Marcos Mulki Aguilera', 'J.Mulki');
INSERT INTO `operarios` VALUES ('2', 'Ramiro Rivera', 'R.Rivera');
INSERT INTO `operarios` VALUES ('3', 'Norma Beatriz Lesca Gomez', 'N.Lesca');
INSERT INTO `operarios` VALUES ('6', 'Carlos Buenaventura', 'C.Buena');
INSERT INTO `operarios` VALUES ('13', 'Arnaldo Ruiz', 'A.Ruiz');

-- ----------------------------
-- Table structure for `precios`
-- ----------------------------
DROP TABLE IF EXISTS `precios`;
CREATE TABLE `precios` (
  `idPrecio` int(11) NOT NULL auto_increment,
  `fecha` date default NULL,
  `precio` double(11,2) default NULL,
  PRIMARY KEY  (`idPrecio`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of precios
-- ----------------------------
INSERT INTO `precios` VALUES ('7', '2018-11-30', '50.00');
INSERT INTO `precios` VALUES ('6', '2018-11-21', '43.00');

-- ----------------------------
-- Table structure for `secciones`
-- ----------------------------
DROP TABLE IF EXISTS `secciones`;
CREATE TABLE `secciones` (
  `idSeccion` int(11) NOT NULL auto_increment,
  `seccion` varchar(30) default NULL,
  PRIMARY KEY  (`idSeccion`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of secciones
-- ----------------------------
INSERT INTO `secciones` VALUES ('1', 'Motor');
INSERT INTO `secciones` VALUES ('2', 'Tren Rodante');
INSERT INTO `secciones` VALUES ('3', 'Electricidad/Electrónica');
INSERT INTO `secciones` VALUES ('4', 'Sistema de Neumáticos');
INSERT INTO `secciones` VALUES ('5', 'Cabina/Caja Volcadora');
INSERT INTO `secciones` VALUES ('6', 'Transmisión');
INSERT INTO `secciones` VALUES ('7', 'Otra Sección');

-- ----------------------------
-- Table structure for `trabajos`
-- ----------------------------
DROP TABLE IF EXISTS `trabajos`;
CREATE TABLE `trabajos` (
  `idTrabajo` int(11) NOT NULL auto_increment,
  `fecha` date default NULL,
  `idVehiculo` int(11) default NULL,
  `kmshrs` double(11,1) default NULL,
  `idOperario` int(11) default NULL,
  `observaciones` text,
  PRIMARY KEY  (`idTrabajo`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of trabajos
-- ----------------------------
INSERT INTO `trabajos` VALUES ('28', '2018-12-02', '1', '359791.5', '13', '');
INSERT INTO `trabajos` VALUES ('29', '2018-12-04', '1', '360784.9', '13', '');
INSERT INTO `trabajos` VALUES ('30', '2018-12-07', '1', '361830.7', '13', '');
INSERT INTO `trabajos` VALUES ('31', '2018-12-09', '1', '362871.5', '13', '');
INSERT INTO `trabajos` VALUES ('32', '2018-12-11', '1', '363562.7', '13', '');
INSERT INTO `trabajos` VALUES ('33', '2018-12-14', '1', '364698.3', '13', '');
INSERT INTO `trabajos` VALUES ('34', '2018-12-15', '1', '365550.5', '13', '');
INSERT INTO `trabajos` VALUES ('35', '2018-12-18', '1', '366118.3', '13', '');
INSERT INTO `trabajos` VALUES ('36', '2018-12-22', '1', '366784.5', '13', '');
INSERT INTO `trabajos` VALUES ('37', '2018-12-24', '1', '367829.8', '13', '');
INSERT INTO `trabajos` VALUES ('38', '2018-12-27', '1', '368688.1', '13', '');
INSERT INTO `trabajos` VALUES ('39', '2018-12-29', '1', '369749.9', '13', '');
INSERT INTO `trabajos` VALUES ('40', '2018-12-31', '1', '369980.9', '13', '');

-- ----------------------------
-- Table structure for `usuarios`
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL auto_increment,
  `nombre` varchar(50) default NULL,
  `user` varchar(20) default NULL,
  `pass` varchar(100) default NULL,
  `perfil` int(1) default NULL,
  PRIMARY KEY  (`idUsuario`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES ('1', 'Juanqui Mulki', 'jmulki', '827ccb0eea8a706c4c34a16891f84e7b', '1');
INSERT INTO `usuarios` VALUES ('4', 'Patricia Orellana', 'porellana', '81dc9bdb52d04dc20036dbd8313ed055', '1');
INSERT INTO `usuarios` VALUES ('3', 'Usuario de Prueba', 'uproof', '81dc9bdb52d04dc20036dbd8313ed055', '3');

-- ----------------------------
-- Table structure for `vehiculos`
-- ----------------------------
DROP TABLE IF EXISTS `vehiculos`;
CREATE TABLE `vehiculos` (
  `idVehiculo` int(11) NOT NULL auto_increment,
  `idMaquina` int(11) default NULL,
  `descripcion` varchar(50) default NULL,
  `iniciales` double(11,1) default NULL,
  PRIMARY KEY  (`idVehiculo`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of vehiculos
-- ----------------------------
INSERT INTO `vehiculos` VALUES ('1', '0', 'IVECO 1', '358633.5');
INSERT INTO `vehiculos` VALUES ('2', '0', 'IVECO 2', '1000.0');
INSERT INTO `vehiculos` VALUES ('3', '0', 'IVECO 3', '1000.0');
INSERT INTO `vehiculos` VALUES ('4', '0', 'IVECO 4', '1000.0');
INSERT INTO `vehiculos` VALUES ('5', '0', 'IVECO 5', '1000.0');
INSERT INTO `vehiculos` VALUES ('6', '0', 'IVECO 6', '1000.0');
INSERT INTO `vehiculos` VALUES ('7', '0', 'Autoelevador LINDE 2', '2500.0');
INSERT INTO `vehiculos` VALUES ('8', '0', 'Autoelevador LINDE 4', '2500.0');
INSERT INTO `vehiculos` VALUES ('9', '0', 'Autoelevador LINDE 6', '2500.0');
INSERT INTO `vehiculos` VALUES ('10', '0', 'Autoelevador LINDE 7', '2500.0');
INSERT INTO `vehiculos` VALUES ('11', '0', 'Autoelevador LINDE 8', '2500.0');
INSERT INTO `vehiculos` VALUES ('12', '0', 'Autoelevador LINDE 9', '2500.0');
INSERT INTO `vehiculos` VALUES ('13', '0', 'Autoelevador LINDE 10', '2500.0');
INSERT INTO `vehiculos` VALUES ('14', '0', 'Autoelevador LINDE 11', '2500.0');
INSERT INTO `vehiculos` VALUES ('15', '0', 'Autoelevador LINDE 12', '2500.0');

-- ----------------------------
-- View structure for `consulta`
-- ----------------------------
DROP VIEW IF EXISTS `consulta`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `consulta` AS select `cargas`.`idCarga` AS `idCarga`,`trabajos`.`idTrabajo` AS `idTrabajo`,`cargas`.`fecha` AS `fecha`,`cargas`.`idVehiculo` AS `idVehiculo`,`cargas`.`litros` AS `litros`,`trabajos`.`kmshrs` AS `kmshrs` from (`cargas` join `trabajos` on(((`cargas`.`fecha` = `trabajos`.`fecha`) and (`cargas`.`idVehiculo` = `trabajos`.`idVehiculo`)))) ;

-- ----------------------------
-- View structure for `_consulta`
-- ----------------------------
DROP VIEW IF EXISTS `_consulta`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `_consulta` AS select `cargas`.`idCarga` AS `id`,`cargas`.`fecha` AS `fecha`,`cargas`.`idVehiculo` AS `idvehiculo`,`cargas`.`litros` AS `valor`,1 AS `tipo` from `cargas` union select `trabajos`.`idTrabajo` AS `id`,`trabajos`.`fecha` AS `fecha`,`trabajos`.`idVehiculo` AS `idVehiculo`,`trabajos`.`kmshrs` AS `valor`,2 AS `tipo` from `trabajos` order by `fecha`,`tipo` ;

/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50067
Source Host           : localhost:3306
Source Database       : control_consumo

Target Server Type    : MYSQL
Target Server Version : 50067
File Encoding         : 65001

Date: 2018-11-05 12:48:59
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
  `litros` double default NULL,
  `precinto` int(11) default NULL,
  `idOperario` int(11) default NULL,
  `observaciones` text,
  PRIMARY KEY  (`idCarga`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cargas
-- ----------------------------
INSERT INTO `cargas` VALUES ('10', '2018-11-01', '6', '100', '0', '1', '');
INSERT INTO `cargas` VALUES ('11', '2018-11-10', '6', '200', '0', '1', '');
INSERT INTO `cargas` VALUES ('12', '2018-11-15', '6', '50', '0', '1', '');
INSERT INTO `cargas` VALUES ('13', '2018-11-21', '6', '1000', '0', '1', '');
INSERT INTO `cargas` VALUES ('14', '2018-11-25', '6', '200', '0', '1', '');
INSERT INTO `cargas` VALUES ('15', '2018-11-25', '6', '200', '0', '1', '');
INSERT INTO `cargas` VALUES ('16', '2018-11-25', '6', '200', '0', '1', '');

-- ----------------------------
-- Table structure for `operarios`
-- ----------------------------
DROP TABLE IF EXISTS `operarios`;
CREATE TABLE `operarios` (
  `idOperario` int(11) NOT NULL auto_increment,
  `nombre` varchar(50) default NULL,
  `abreviatura` varchar(20) default NULL,
  PRIMARY KEY  (`idOperario`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of operarios
-- ----------------------------
INSERT INTO `operarios` VALUES ('1', 'Juan Marcos Mulki Aguilera', 'J.Mulki');
INSERT INTO `operarios` VALUES ('2', 'Ramiro Rivera', 'R.Rivera');
INSERT INTO `operarios` VALUES ('3', 'Norma Beatriz Lesca Gomez', 'N.Lesca');
INSERT INTO `operarios` VALUES ('4', 'aaa', 'bbb');
INSERT INTO `operarios` VALUES ('5', 'ccc', 'ddd');
INSERT INTO `operarios` VALUES ('6', 'Carlos Buenaventura', 'C.Buena');
INSERT INTO `operarios` VALUES ('7', 'Carlos Buenaventura', 'C.Buena');
INSERT INTO `operarios` VALUES ('8', 'Carlos Buenaventura', 'C.Buena');
INSERT INTO `operarios` VALUES ('9', 'asdf', 'asdf');
INSERT INTO `operarios` VALUES ('10', 'otro', 'otro');
INSERT INTO `operarios` VALUES ('11', 'otro', 'otros');
INSERT INTO `operarios` VALUES ('12', 'mostra', 'brevi');
INSERT INTO `operarios` VALUES ('13', 'Arnaldo Ruiz', 'A.Ruiz');

-- ----------------------------
-- Table structure for `trabajos`
-- ----------------------------
DROP TABLE IF EXISTS `trabajos`;
CREATE TABLE `trabajos` (
  `idTrabajo` int(11) NOT NULL auto_increment,
  `fecha` date default NULL,
  `idVehiculo` int(11) default NULL,
  `kmshrs` int(11) default NULL,
  `idOperario` int(11) default NULL,
  `observaciones` text,
  PRIMARY KEY  (`idTrabajo`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of trabajos
-- ----------------------------
INSERT INTO `trabajos` VALUES ('5', '2018-11-05', '6', '500', '1', '');
INSERT INTO `trabajos` VALUES ('6', '2018-11-20', '6', '700', '1', '');
INSERT INTO `trabajos` VALUES ('7', '2018-11-22', '6', '850', '1', '');
INSERT INTO `trabajos` VALUES ('8', '2018-11-23', '6', '1000', '1', '');
INSERT INTO `trabajos` VALUES ('9', '2018-11-26', '6', '1300', '1', '');
INSERT INTO `trabajos` VALUES ('10', '2018-11-26', '6', '1600', '1', '');

-- ----------------------------
-- Table structure for `vehiculos`
-- ----------------------------
DROP TABLE IF EXISTS `vehiculos`;
CREATE TABLE `vehiculos` (
  `idVehiculo` int(11) NOT NULL auto_increment,
  `idMaquina` int(11) default NULL,
  `descripcion` varchar(50) default NULL,
  `iniciales` int(11) default NULL,
  PRIMARY KEY  (`idVehiculo`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of vehiculos
-- ----------------------------
INSERT INTO `vehiculos` VALUES ('1', '123', 'maquina', '1144');
INSERT INTO `vehiculos` VALUES ('2', '444', 'otra', '12345');
INSERT INTO `vehiculos` VALUES ('3', '0', '', '0');
INSERT INTO `vehiculos` VALUES ('4', '0', '', '0');
INSERT INTO `vehiculos` VALUES ('5', '233', 'Amasadora MORANDO AST (Sector Humedo)', '12345');
INSERT INTO `vehiculos` VALUES ('6', '624', 'Pasillo de Carga (Secadero)', '222');
INSERT INTO `vehiculos` VALUES ('7', '0', 'undefined', '0');
INSERT INTO `vehiculos` VALUES ('8', null, null, null);

-- ----------------------------
-- View structure for `consulta`
-- ----------------------------
DROP VIEW IF EXISTS `consulta`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `consulta` AS select `cargas`.`idCarga` AS `id`,`cargas`.`fecha` AS `fecha`,`cargas`.`idVehiculo` AS `idvehiculo`,`cargas`.`litros` AS `valor`,1 AS `tipo` from `cargas` union select `trabajos`.`idTrabajo` AS `id`,`trabajos`.`fecha` AS `fecha`,`trabajos`.`idVehiculo` AS `idVehiculo`,`trabajos`.`kmshrs` AS `valor`,2 AS `tipo` from `trabajos` order by `fecha`,`tipo` ;

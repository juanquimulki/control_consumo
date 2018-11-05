/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50067
Source Host           : localhost:3306
Source Database       : control_consumo

Target Server Type    : MYSQL
Target Server Version : 50067
File Encoding         : 65001

Date: 2018-11-05 10:30:08
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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cargas
-- ----------------------------
INSERT INTO `cargas` VALUES ('6', '1963-01-01', '5', '123', '321', '10', 'asdasd');
INSERT INTO `cargas` VALUES ('3', '1969-12-31', '5', '123', '321', '8', 'asdasd');
INSERT INTO `cargas` VALUES ('4', '2018-10-31', '5', '123', '321', '8', 'asdasd');
INSERT INTO `cargas` VALUES ('5', '2018-10-09', '5', '123', '321', '10', 'asdasd');
INSERT INTO `cargas` VALUES ('7', '1963-01-01', '1', '123', '321', '10', 'asdasd');
INSERT INTO `cargas` VALUES ('8', '2018-10-18', '6', '333', '555', '1', 'estoy escribiendo detalles bastante largosssss\nveremos quÃ© sucede.');
INSERT INTO `cargas` VALUES ('9', '2018-10-09', '1', null, null, '13', 'dsfasdfsadf');

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
  `fecha` int(11) default NULL,
  `idVehiculo` int(11) default NULL,
  `kmshrs` int(11) default NULL,
  `idOperario` int(11) default NULL,
  `observaciones` text,
  PRIMARY KEY  (`idTrabajo`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of trabajos
-- ----------------------------
INSERT INTO `trabajos` VALUES ('1', '2018', '2', '333', '9', 'dasf');
INSERT INTO `trabajos` VALUES ('2', '0', '0', '0', '0', '');
INSERT INTO `trabajos` VALUES ('3', '2018', '7', '4433', '12', 'dsaf');
INSERT INTO `trabajos` VALUES ('4', '2018', '7', '4433', '12', 'dsafss');

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

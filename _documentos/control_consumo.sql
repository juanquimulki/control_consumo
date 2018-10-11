/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50067
Source Host           : localhost:3306
Source Database       : control_consumo

Target Server Type    : MYSQL
Target Server Version : 50067
File Encoding         : 65001

Date: 2018-10-11 18:32:10
*/

SET FOREIGN_KEY_CHECKS=0;

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
-- Table structure for `vehiculos`
-- ----------------------------
DROP TABLE IF EXISTS `vehiculos`;
CREATE TABLE `vehiculos` (
  `idVehiculo` int(11) NOT NULL auto_increment,
  `idMaquina` int(11) default NULL,
  `descripcion` varchar(50) default NULL,
  `iniciales` int(11) default NULL,
  PRIMARY KEY  (`idVehiculo`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of vehiculos
-- ----------------------------
INSERT INTO `vehiculos` VALUES ('1', '123', 'maquina', '1144');
INSERT INTO `vehiculos` VALUES ('2', '444', 'otra', '12345');
INSERT INTO `vehiculos` VALUES ('3', '0', '', '0');
INSERT INTO `vehiculos` VALUES ('4', '0', '', '0');
INSERT INTO `vehiculos` VALUES ('5', '233', 'Amasadora MORANDO AST (Sector Humedo)', '12345');
INSERT INTO `vehiculos` VALUES ('6', '624', 'Pasillo de Carga (Secadero)', '222');

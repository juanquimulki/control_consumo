/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50067
Source Host           : localhost:3306
Source Database       : control_consumo

Target Server Type    : MYSQL
Target Server Version : 50067
File Encoding         : 65001

Date: 2019-06-03 11:50:54
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `historial_neuma`
-- ----------------------------
DROP TABLE IF EXISTS `historial_neuma`;
CREATE TABLE `historial_neuma` (
  `idHistorial` int(11) NOT NULL auto_increment,
  `idNeumatico` int(11) default NULL,
  `fecha` date default NULL,
  `idOperacion` int(11) default NULL,
  `kilometros` double default NULL,
  `idVehiculo` int(11) default NULL,
  `posicion` tinyint(4) default NULL,
  `detalles` text,
  PRIMARY KEY  (`idHistorial`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of historial_neuma
-- ----------------------------

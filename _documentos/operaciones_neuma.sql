/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50067
Source Host           : localhost:3306
Source Database       : control_consumo

Target Server Type    : MYSQL
Target Server Version : 50067
File Encoding         : 65001

Date: 2019-06-03 11:51:05
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `operaciones_neuma`
-- ----------------------------
DROP TABLE IF EXISTS `operaciones_neuma`;
CREATE TABLE `operaciones_neuma` (
  `idOperacion` int(11) NOT NULL auto_increment,
  `descripcion` varchar(50) default NULL,
  `validar` varchar(20) default NULL,
  PRIMARY KEY  (`idOperacion`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of operaciones_neuma
-- ----------------------------
INSERT INTO `operaciones_neuma` VALUES ('1', 'Registrado', null);
INSERT INTO `operaciones_neuma` VALUES ('2', 'Colocado', '2.4.5');
INSERT INTO `operaciones_neuma` VALUES ('3', 'Quitado', '2');
INSERT INTO `operaciones_neuma` VALUES ('4', 'Recapado', '3');
INSERT INTO `operaciones_neuma` VALUES ('5', 'Reparado', '3');
INSERT INTO `operaciones_neuma` VALUES ('6', 'Descartado', '3');

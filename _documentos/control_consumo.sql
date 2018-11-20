/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50067
Source Host           : localhost:3306
Source Database       : control_consumo

Target Server Type    : MYSQL
Target Server Version : 50067
File Encoding         : 65001

Date: 2018-11-20 20:33:17
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
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cargas
-- ----------------------------
INSERT INTO `cargas` VALUES ('17', '2018-11-02', '6', '492.0', '0', '1', '', null);
INSERT INTO `cargas` VALUES ('18', '2018-11-04', '6', '429.0', '0', '1', '', null);
INSERT INTO `cargas` VALUES ('19', '2018-11-07', '6', '442.0', '0', '1', '', null);
INSERT INTO `cargas` VALUES ('20', '2018-11-09', '6', '435.0', '0', '1', '', null);
INSERT INTO `cargas` VALUES ('21', '2018-11-11', '6', '303.0', '0', '1', '', null);
INSERT INTO `cargas` VALUES ('22', '2018-11-14', '6', '472.0', '0', '1', '', null);
INSERT INTO `cargas` VALUES ('23', '2018-11-15', '6', '355.0', '0', '1', '', null);
INSERT INTO `cargas` VALUES ('24', '2019-12-02', '6', '492.0', '0', '1', null, null);
INSERT INTO `cargas` VALUES ('25', '2019-12-04', '6', '429.0', '0', '1', null, null);
INSERT INTO `cargas` VALUES ('26', '2019-12-07', '6', '442.0', '0', '1', null, null);
INSERT INTO `cargas` VALUES ('27', '2019-12-09', '6', '435.0', '0', '1', null, null);
INSERT INTO `cargas` VALUES ('28', '2019-12-11', '6', '303.0', '0', '1', null, null);
INSERT INTO `cargas` VALUES ('29', '2019-12-14', '6', '472.0', '0', '1', null, null);
INSERT INTO `cargas` VALUES ('30', '2019-12-15', '6', '355.0', '0', '1', null, null);
INSERT INTO `cargas` VALUES ('31', '2018-11-07', '6', '123.0', '11', '13', '', '32.00');
INSERT INTO `cargas` VALUES ('32', '2018-11-05', '1', '321.0', '321', '4', '', '32.28');

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
-- Table structure for `precios`
-- ----------------------------
DROP TABLE IF EXISTS `precios`;
CREATE TABLE `precios` (
  `idPrecio` int(11) NOT NULL auto_increment,
  `fecha` date default NULL,
  `precio` double(11,2) default NULL,
  PRIMARY KEY  (`idPrecio`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of precios
-- ----------------------------
INSERT INTO `precios` VALUES ('1', '2018-02-15', '25.00');
INSERT INTO `precios` VALUES ('2', '2018-11-01', '30.00');
INSERT INTO `precios` VALUES ('3', '2018-12-01', '32.28');
INSERT INTO `precios` VALUES ('4', '2018-11-01', '33.33');

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
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of trabajos
-- ----------------------------
INSERT INTO `trabajos` VALUES ('14', '2018-11-04', '6', '360784.9', '1', '');
INSERT INTO `trabajos` VALUES ('13', '2018-11-02', '6', '359791.5', '1', '');
INSERT INTO `trabajos` VALUES ('15', '2018-11-07', '6', '361830.7', '1', '');
INSERT INTO `trabajos` VALUES ('16', '2018-11-09', '6', '362871.5', '1', '');
INSERT INTO `trabajos` VALUES ('17', '2018-11-11', '6', '363562.7', '1', '');
INSERT INTO `trabajos` VALUES ('18', '2018-11-14', '6', '364698.3', '1', '');
INSERT INTO `trabajos` VALUES ('19', '2018-11-15', '6', '365550.5', '1', '');
INSERT INTO `trabajos` VALUES ('20', '2019-12-04', '6', '370100.0', '1', null);
INSERT INTO `trabajos` VALUES ('21', '2019-12-02', '6', '370000.0', '1', null);
INSERT INTO `trabajos` VALUES ('22', '2019-12-07', '6', '370200.0', '1', null);
INSERT INTO `trabajos` VALUES ('23', '2019-12-09', '6', '370300.0', '1', null);
INSERT INTO `trabajos` VALUES ('24', '2019-12-11', '6', '370400.0', '1', null);
INSERT INTO `trabajos` VALUES ('25', '2019-12-14', '6', '370500.0', '1', null);
INSERT INTO `trabajos` VALUES ('26', '2019-12-15', '6', '370600.0', '1', null);

-- ----------------------------
-- Table structure for `usuarios`
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL default '0',
  `nombre` varchar(50) default NULL,
  `user` varchar(20) default NULL,
  `pass` varchar(50) default NULL,
  PRIMARY KEY  (`idUsuario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of usuarios
-- ----------------------------

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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of vehiculos
-- ----------------------------
INSERT INTO `vehiculos` VALUES ('1', '123', 'maquina', '1144.0');
INSERT INTO `vehiculos` VALUES ('2', '444', 'otra', '12345.0');
INSERT INTO `vehiculos` VALUES ('3', '0', '', '0.0');
INSERT INTO `vehiculos` VALUES ('4', '0', '', '0.0');
INSERT INTO `vehiculos` VALUES ('5', '233', 'Amasadora MORANDO AST (Sector Humedo)', '12345.0');
INSERT INTO `vehiculos` VALUES ('6', '624', 'Pasillo de Carga (Secadero)', '358633.5');
INSERT INTO `vehiculos` VALUES ('7', '0', 'undefined', '0.0');
INSERT INTO `vehiculos` VALUES ('8', null, null, null);
INSERT INTO `vehiculos` VALUES ('9', '30', 'Amasadora (Sector Humedo)', '369.0');

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

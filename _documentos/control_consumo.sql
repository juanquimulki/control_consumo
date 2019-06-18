/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50067
Source Host           : localhost:3306
Source Database       : control_consumo

Target Server Type    : MYSQL
Target Server Version : 50067
File Encoding         : 65001

Date: 2019-06-18 10:39:51
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
  `resultados` text,
  PRIMARY KEY  (`idDetalle`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of detalles
-- ----------------------------
INSERT INTO `detalles` VALUES ('12', '6', '1', '', null, null);
INSERT INTO `detalles` VALUES ('13', '6', '7', 'Esta muy pesada', '2018-12-26', 'Esta es la soluciÃ³n');
INSERT INTO `detalles` VALUES ('14', '6', '8', '', null, null);
INSERT INTO `detalles` VALUES ('15', '7', '1', 'Cargar aceite', '2018-12-26', '');
INSERT INTO `detalles` VALUES ('16', '7', '7', '', '2018-12-20', null);
INSERT INTO `detalles` VALUES ('17', '8', '7', '', null, null);
INSERT INTO `detalles` VALUES ('18', '8', '8', '', null, null);
INSERT INTO `detalles` VALUES ('19', '8', '12', 'Se quemo la delantera derecha', null, null);
INSERT INTO `detalles` VALUES ('20', '9', '1', '', null, null);
INSERT INTO `detalles` VALUES ('21', '9', '4', '', null, null);

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
  `observaciones` text,
  PRIMARY KEY  (`idHistorial`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of historial_neuma
-- ----------------------------
INSERT INTO `historial_neuma` VALUES ('1', '2', '2019-06-04', '1', '123', '3', '12', null);
INSERT INTO `historial_neuma` VALUES ('2', '2', '2019-06-06', '2', '13', '3', '8', 'jola');
INSERT INTO `historial_neuma` VALUES ('3', '2', '2019-06-10', '2', '333', '3', '7', 'jajajaja');
INSERT INTO `historial_neuma` VALUES ('4', '4', '2019-06-07', '1', '321', '0', '0', '');
INSERT INTO `historial_neuma` VALUES ('5', '3', '2019-06-24', '2', '123', '3', '6', '');

-- ----------------------------
-- Table structure for `items`
-- ----------------------------
DROP TABLE IF EXISTS `items`;
CREATE TABLE `items` (
  `idItem` int(11) NOT NULL auto_increment,
  `idSeccion` int(11) default NULL,
  `item` varchar(30) default NULL,
  PRIMARY KEY  (`idItem`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of items
-- ----------------------------
INSERT INTO `items` VALUES ('1', '2', 'Tren rodante');
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
INSERT INTO `items` VALUES ('20', '7', 'otra');

-- ----------------------------
-- Table structure for `neumaticos`
-- ----------------------------
DROP TABLE IF EXISTS `neumaticos`;
CREATE TABLE `neumaticos` (
  `idNeumatico` int(11) NOT NULL auto_increment,
  `codigo` varchar(20) default NULL,
  `marca` varchar(50) default NULL,
  `modelo` varchar(50) default NULL,
  `medida` varchar(20) default NULL,
  `estado` tinyint(1) default NULL,
  `fecha` date default NULL,
  `precio` double default NULL,
  `kilometros` double default NULL,
  `observaciones` tinytext,
  PRIMARY KEY  (`idNeumatico`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of neumaticos
-- ----------------------------
INSERT INTO `neumaticos` VALUES ('1', '123', 'pirelli', 'p400', '123/45/67', '1', '2019-08-01', '123.45', '1234.56', 'prueba');
INSERT INTO `neumaticos` VALUES ('2', 'PX3-123456', '1', '1', '1', '1', '2019-06-02', '1', '1', '1');
INSERT INTO `neumaticos` VALUES ('3', 'codigo', 'marca', 'modelo', 'medida', '2', '2019-06-03', '123', '345', '456');
INSERT INTO `neumaticos` VALUES ('4', '333', 'firestone', 'catumba', '1122', '2', '2019-06-01', '123', '321', 'hola');

-- ----------------------------
-- Table structure for `operaciones_neuma`
-- ----------------------------
DROP TABLE IF EXISTS `operaciones_neuma`;
CREATE TABLE `operaciones_neuma` (
  `idOperacion` int(11) NOT NULL auto_increment,
  `descripcion` varchar(50) default NULL,
  `validar` varchar(20) default NULL,
  PRIMARY KEY  (`idOperacion`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of operaciones_neuma
-- ----------------------------
INSERT INTO `operaciones_neuma` VALUES ('1', 'Registrado', null);
INSERT INTO `operaciones_neuma` VALUES ('2', 'Colocado', '1.3.4.5.6');
INSERT INTO `operaciones_neuma` VALUES ('3', 'Quitado', '2');
INSERT INTO `operaciones_neuma` VALUES ('4', 'Recapado', '3');
INSERT INTO `operaciones_neuma` VALUES ('5', 'Reparado', '3');
INSERT INTO `operaciones_neuma` VALUES ('7', 'Descartado', '3');
INSERT INTO `operaciones_neuma` VALUES ('6', 'Rotado', '3');

-- ----------------------------
-- Table structure for `operarios`
-- ----------------------------
DROP TABLE IF EXISTS `operarios`;
CREATE TABLE `operarios` (
  `idOperario` int(11) NOT NULL auto_increment,
  `nombre` varchar(50) default NULL,
  `abreviatura` varchar(20) default NULL,
  PRIMARY KEY  (`idOperario`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of operarios
-- ----------------------------
INSERT INTO `operarios` VALUES ('1', 'Juan Marcos Mulki Aguilera', 'J.Mulki');
INSERT INTO `operarios` VALUES ('2', 'Ramiro Rivera', 'R.Rivera');
INSERT INTO `operarios` VALUES ('3', 'Norma Beatriz Lesca Gomez', 'N.Lesca');
INSERT INTO `operarios` VALUES ('6', 'Carlos Buenaventura', 'C.Buena');
INSERT INTO `operarios` VALUES ('27', 'asdf', 'adf');
INSERT INTO `operarios` VALUES ('20', 'otro', 'otro');
INSERT INTO `operarios` VALUES ('21', 'minimo', 'man');
INSERT INTO `operarios` VALUES ('22', 'Juanqui', 'Juan');
INSERT INTO `operarios` VALUES ('13', 'Arnaldo Ruiz', 'A.Ruiz');
INSERT INTO `operarios` VALUES ('25', 'asdfaaa', 'asdfe');

-- ----------------------------
-- Table structure for `particulares`
-- ----------------------------
DROP TABLE IF EXISTS `particulares`;
CREATE TABLE `particulares` (
  `idParticular` int(11) NOT NULL auto_increment,
  `nombre` varchar(50) default NULL,
  `abreviatura` varchar(20) default NULL,
  PRIMARY KEY  (`idParticular`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of particulares
-- ----------------------------
INSERT INTO `particulares` VALUES ('1', 'Juan Marcos Mulki Aguilera', 'J.Mulki');
INSERT INTO `particulares` VALUES ('2', 'Ramiro Rivera', 'R.Rivera');
INSERT INTO `particulares` VALUES ('3', 'Norma Beatriz Lesca Gomez', 'N.');
INSERT INTO `particulares` VALUES ('6', 'Carlos Buenaventura', 'C.Buena');
INSERT INTO `particulares` VALUES ('27', 'asdf', 'adf');
INSERT INTO `particulares` VALUES ('20', 'otro', 'otro');
INSERT INTO `particulares` VALUES ('22', 'Juanqui', 'Juan');
INSERT INTO `particulares` VALUES ('28', 'prueba', 'prueba');
INSERT INTO `particulares` VALUES ('25', 'asdfaaa', 'asdfe');

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
  `camion` bit(1) default NULL,
  PRIMARY KEY  (`idVehiculo`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of vehiculos
-- ----------------------------
INSERT INTO `vehiculos` VALUES ('1', null, 'aaaaaaaaaaaaa', '123.0', null);
INSERT INTO `vehiculos` VALUES ('2', '0', 'IVECO 2', '1000.0', '');
INSERT INTO `vehiculos` VALUES ('3', '0', 'IVECO 3', '1000.0', '');
INSERT INTO `vehiculos` VALUES ('4', '0', 'IVECO 4', '1000.0', '');
INSERT INTO `vehiculos` VALUES ('5', '0', 'IVECO 5', '1000.0', '');
INSERT INTO `vehiculos` VALUES ('6', '123', 'IVECO 6', '1000.0', '');
INSERT INTO `vehiculos` VALUES ('7', '0', 'Autoelevador LINDE 2', '2500.0', null);
INSERT INTO `vehiculos` VALUES ('8', '0', 'Autoelevador LINDE 4', '2500.0', null);
INSERT INTO `vehiculos` VALUES ('9', '0', 'Autoelevador LINDE 6', '2500.0', null);
INSERT INTO `vehiculos` VALUES ('10', '0', 'Autoelevador LINDE 7', '2500.0', null);
INSERT INTO `vehiculos` VALUES ('11', '0', 'Autoelevador LINDE 8', '2500.0', null);
INSERT INTO `vehiculos` VALUES ('12', '0', 'Autoelevador LINDE 9', '2500.0', null);
INSERT INTO `vehiculos` VALUES ('13', null, 'Autoelevador LINDE 10', '2566.0', null);
INSERT INTO `vehiculos` VALUES ('14', null, 'Autoelevador LINDE 11', '2555.0', null);
INSERT INTO `vehiculos` VALUES ('15', '0', 'Autoelevador LINDE 12', '2500.0', null);
INSERT INTO `vehiculos` VALUES ('16', null, 'nada', '123.0', null);
INSERT INTO `vehiculos` VALUES ('17', '0', 'maquina', '122.0', '');

-- ----------------------------
-- View structure for `consulta`
-- ----------------------------
DROP VIEW IF EXISTS `consulta`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `consulta` AS select `cargas`.`idCarga` AS `idCarga`,`trabajos`.`idTrabajo` AS `idTrabajo`,`cargas`.`fecha` AS `fecha`,`cargas`.`idVehiculo` AS `idVehiculo`,`cargas`.`litros` AS `litros`,`trabajos`.`kmshrs` AS `kmshrs` from (`cargas` join `trabajos` on(((`cargas`.`fecha` = `trabajos`.`fecha`) and (`cargas`.`idVehiculo` = `trabajos`.`idVehiculo`)))) ;

-- ----------------------------
-- View structure for `vw_ultimo_hist_neuma`
-- ----------------------------
DROP VIEW IF EXISTS `vw_ultimo_hist_neuma`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_ultimo_hist_neuma` AS select `historial_neuma`.`idNeumatico` AS `idNeumatico`,max(`historial_neuma`.`idHistorial`) AS `ultimo` from `historial_neuma` group by `historial_neuma`.`idNeumatico` ;

-- ----------------------------
-- View structure for `_consulta`
-- ----------------------------
DROP VIEW IF EXISTS `_consulta`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `_consulta` AS select `cargas`.`idCarga` AS `id`,`cargas`.`fecha` AS `fecha`,`cargas`.`idVehiculo` AS `idvehiculo`,`cargas`.`litros` AS `valor`,1 AS `tipo` from `cargas` union select `trabajos`.`idTrabajo` AS `id`,`trabajos`.`fecha` AS `fecha`,`trabajos`.`idVehiculo` AS `idVehiculo`,`trabajos`.`kmshrs` AS `valor`,2 AS `tipo` from `trabajos` order by `fecha`,`tipo` ;

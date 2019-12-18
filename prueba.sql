-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         10.1.33-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win32
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura para tabla control_consumo.estados_neuma
CREATE TABLE IF NOT EXISTS `estados_neuma` (
  `idEstado` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(20) DEFAULT NULL,
  `valido` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idEstado`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla control_consumo.historial_neuma
CREATE TABLE IF NOT EXISTS `historial_neuma` (
  `idHistorial` int(11) NOT NULL AUTO_INCREMENT,
  `idNeumatico` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `idOperacion` int(11) DEFAULT NULL,
  `destino` int(11) NOT NULL,
  `kilometros` double DEFAULT NULL,
  `idVehiculo` int(11) DEFAULT NULL,
  `posicion` tinyint(4) DEFAULT NULL,
  `observaciones` text,
  PRIMARY KEY (`idHistorial`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla control_consumo.neumaticos
CREATE TABLE IF NOT EXISTS `neumaticos` (
  `idNeumatico` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(20) DEFAULT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `medida` varchar(20) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `proveedor` varchar(50) NOT NULL,
  `fecha` date DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `kilometros` double DEFAULT NULL,
  `observaciones` tinytext,
  PRIMARY KEY (`idNeumatico`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla control_consumo.operaciones_neuma
CREATE TABLE IF NOT EXISTS `operaciones_neuma` (
  `idOperacion` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) DEFAULT NULL,
  `validar` varchar(20) DEFAULT NULL,
  `mostrar` tinyint(4) NOT NULL,
  PRIMARY KEY (`idOperacion`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para vista control_consumo.vw_ultimo_hist_neuma
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `vw_ultimo_hist_neuma` (
	`idNeumatico` INT(11) NULL,
	`ultimo` INT(11) NULL,
	`idOperacion` INT(11) NULL
) ENGINE=MyISAM;

-- Volcando estructura para vista control_consumo.vw_ultimo_hist_neuma
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `vw_ultimo_hist_neuma`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_ultimo_hist_neuma` AS select `historial_neuma`.`idNeumatico` AS `idNeumatico`,max(`historial_neuma`.`idHistorial`) AS `ultimo`,`historial_neuma`.`idOperacion` AS `idOperacion` from `historial_neuma` group by `historial_neuma`.`idNeumatico` ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

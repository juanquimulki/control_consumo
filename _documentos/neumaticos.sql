-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-06-2019 a las 16:35:24
-- Versión del servidor: 10.1.33-MariaDB
-- Versión de PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `control_consumo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `neumaticos`
--

CREATE TABLE `neumaticos` (
  `idNeumatico` int(11) NOT NULL,
  `codigo` varchar(20) DEFAULT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `medida` varchar(20) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `kilometros` double DEFAULT NULL,
  `observaciones` tinytext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `neumaticos`
--

INSERT INTO `neumaticos` (`idNeumatico`, `codigo`, `marca`, `modelo`, `medida`, `estado`, `fecha`, `precio`, `kilometros`, `observaciones`) VALUES
(1, '123', 'pirelli', 'p400', '123/45/67', 1, '2019-08-01', 123.45, 1234.56, 'prueba'),
(2, '1', '1', '1', '1', 1, '2019-06-02', 1, 1, '1'),
(3, 'codigo', 'marca', 'modelo', 'medida', 2, '2019-06-03', 123, 345, '456');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `neumaticos`
--
ALTER TABLE `neumaticos`
  ADD PRIMARY KEY (`idNeumatico`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `neumaticos`
--
ALTER TABLE `neumaticos`
  MODIFY `idNeumatico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

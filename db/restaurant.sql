-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 03-12-2013 a las 20:57:05
-- Versión del servidor: 5.6.12-log
-- Versión de PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `restaurant`
--
CREATE DATABASE IF NOT EXISTS `restaurant` DEFAULT CHARACTER SET latin1 COLLATE latin1_spanish_ci;
USE `restaurant`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `combo`
--

CREATE TABLE IF NOT EXISTS `combo` (
  `cod_combo` int(8) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `imagen` int(50) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`cod_combo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `combo_prodcuto`
--

CREATE TABLE IF NOT EXISTS `combo_prodcuto` (
  `cod_combo_producto` bigint(20) NOT NULL AUTO_INCREMENT,
  `cod_combo` int(8) NOT NULL,
  `cod_producto` varchar(8) COLLATE latin1_spanish_ci NOT NULL,
  `cantidad` int(1) NOT NULL,
  PRIMARY KEY (`cod_combo_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `cod_menu` int(8) NOT NULL AUTO_INCREMENT,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date DEFAULT NULL,
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`cod_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu_dia`
--

CREATE TABLE IF NOT EXISTS `menu_dia` (
  `cod_menu_dia` int(8) NOT NULL AUTO_INCREMENT,
  `dia` varchar(12) COLLATE latin1_spanish_ci NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date DEFAULT NULL,
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`cod_menu_dia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `menu_dia`
--

INSERT INTO `menu_dia` (`cod_menu_dia`, `dia`, `fecha_inicio`, `fecha_fin`, `estado`) VALUES
(1, 'miercoles', '0000-00-00', '0000-00-00', 1),
(2, 'lunes', '2013-12-03', '0000-00-00', 1),
(3, 'lunes', '2013-12-03', '0000-00-00', 1),
(4, 'miercoles', '2013-12-03', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden`
--

CREATE TABLE IF NOT EXISTS `orden` (
  `cod_orden` bigint(20) NOT NULL AUTO_INCREMENT,
  `num_mesa` int(2) NOT NULL,
  `nombre_cliente` varchar(40) COLLATE latin1_spanish_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`cod_orden`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `orden`
--

INSERT INTO `orden` (`cod_orden`, `num_mesa`, `nombre_cliente`, `fecha`, `estado`) VALUES
(5, 2, 'Fernandez', '2013-12-02 16:09:03', 1),
(6, 3, 'Luis', '2013-12-02 20:13:43', 0),
(7, 1, 'Oso', '2013-12-03 15:55:04', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_producto`
--

CREATE TABLE IF NOT EXISTS `orden_producto` (
  `cod_orden_producto` bigint(20) NOT NULL AUTO_INCREMENT,
  `cod_orden` bigint(20) NOT NULL,
  `cod_producto` varchar(8) COLLATE latin1_spanish_ci NOT NULL,
  `cantidad` int(2) NOT NULL,
  PRIMARY KEY (`cod_orden_producto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `orden_producto`
--

INSERT INTO `orden_producto` (`cod_orden_producto`, `cod_orden`, `cod_producto`, `cantidad`) VALUES
(1, 5, 'PM1', 2),
(2, 5, 'QR', 2),
(3, 5, 'PQ', 1),
(4, 6, 's', 3),
(5, 6, 'PM1', 1),
(6, 6, 'QR', 3),
(7, 6, '', 0),
(8, 6, 'PQ', 1),
(9, 6, '', 0),
(10, 7, 'PM1', 2),
(11, 7, '', 0),
(12, 7, '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE IF NOT EXISTS `pedido` (
  `cod_pedido` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) COLLATE latin1_spanish_ci NOT NULL,
  `nit` bigint(12) NOT NULL,
  `direccion` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `telefono` bigint(12) NOT NULL,
  `fecha` datetime NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `entregado` tinyint(1) NOT NULL,
  `usuario` varchar(12) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`cod_pedido`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`cod_pedido`, `nombre`, `nit`, `direccion`, `telefono`, `fecha`, `estado`, `entregado`, `usuario`) VALUES
(3, 'Fernandez', 123, 'C. Antonio IbaÃ±ez', 4421567, '2013-12-03 16:13:54', 1, 0, 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_producto`
--

CREATE TABLE IF NOT EXISTS `pedido_producto` (
  `cod_penido_producto` bigint(20) NOT NULL AUTO_INCREMENT,
  `cod_pedido` bigint(20) NOT NULL,
  `cod_producto` varchar(8) COLLATE latin1_spanish_ci NOT NULL,
  `cantidad` int(2) NOT NULL,
  PRIMARY KEY (`cod_penido_producto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `pedido_producto`
--

INSERT INTO `pedido_producto` (`cod_penido_producto`, `cod_pedido`, `cod_producto`, `cantidad`) VALUES
(7, 0, 'PM1', 3),
(8, 0, '', 0),
(9, 0, 'PQ', 1),
(10, 0, 'PM1', 1),
(11, 0, 'QR', 3),
(12, 0, 'PQ', 1),
(13, 0, 'PM1', 2),
(14, 0, '', 0),
(15, 0, '', 0),
(16, 0, 'PM1', 2),
(17, 0, '', 0),
(18, 0, '', 0),
(19, 3, 'PM1', 3),
(20, 3, '', 0),
(21, 3, '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pensionados`
--

CREATE TABLE IF NOT EXISTS `pensionados` (
  `cod_pensionado` int(8) NOT NULL AUTO_INCREMENT,
  `ci` int(12) NOT NULL,
  `nombre` varchar(40) COLLATE latin1_spanish_ci NOT NULL,
  `direccion` varchar(60) COLLATE latin1_spanish_ci NOT NULL,
  `telefono` bigint(12) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`cod_pensionado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `pensionados`
--

INSERT INTO `pensionados` (`cod_pensionado`, `ci`, `nombre`, `direccion`, `telefono`, `estado`) VALUES
(1, 123, 'piro', 'ho', 456, 1),
(2, 123, 'Fernandez', 'ho', 564, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `cod_producto` varchar(8) COLLATE latin1_spanish_ci NOT NULL,
  `nombre` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `tipo` int(1) NOT NULL,
  `precio` float NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`cod_producto`, `nombre`, `tipo`, `precio`, `estado`) VALUES
('hola', 'hoaskl', 1, 3, 10),
('s', 'Luis', 1, 6, 1),
('PM1', 'Pique Macho', 1, 35, 1),
('PQ', 'Guar', 3, 3, 1),
('QR', 'coca', 2, 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_menu`
--

CREATE TABLE IF NOT EXISTS `producto_menu` (
  `cod_producto_menu` int(8) NOT NULL AUTO_INCREMENT,
  `cod_menu` int(8) NOT NULL,
  `cod_producto` varchar(8) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`cod_producto_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_menu_dia`
--

CREATE TABLE IF NOT EXISTS `producto_menu_dia` (
  `cod_producto_menu_dia` int(8) NOT NULL AUTO_INCREMENT,
  `cod_menu_dia` int(8) NOT NULL,
  `cod_producto` varchar(8) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`cod_producto_menu_dia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `producto_menu_dia`
--

INSERT INTO `producto_menu_dia` (`cod_producto_menu_dia`, `cod_menu_dia`, `cod_producto`) VALUES
(1, 0, 'PM1'),
(2, 2, 'PM1'),
(3, 3, 'PM1'),
(4, 4, 'PM1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promocion`
--

CREATE TABLE IF NOT EXISTS `promocion` (
  `cod_promocion` int(8) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `imagen` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`cod_promocion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promocion_producto`
--

CREATE TABLE IF NOT EXISTS `promocion_producto` (
  `cod_promocion_producto` bigint(20) NOT NULL AUTO_INCREMENT,
  `cod_promocion` int(8) NOT NULL,
  `cod_producto` varchar(8) COLLATE latin1_spanish_ci NOT NULL,
  `cantidad` int(1) NOT NULL,
  PRIMARY KEY (`cod_promocion_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva_mesa`
--

CREATE TABLE IF NOT EXISTS `reserva_mesa` (
  `cod_reserva_mesa` bigint(12) NOT NULL AUTO_INCREMENT,
  `num_mesa` int(2) NOT NULL,
  `nombre_cliente` varchar(40) COLLATE latin1_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `terminada` tinyint(1) NOT NULL,
  PRIMARY KEY (`cod_reserva_mesa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `reserva_mesa`
--

INSERT INTO `reserva_mesa` (`cod_reserva_mesa`, `num_mesa`, `nombre_cliente`, `fecha`, `hora`, `estado`, `terminada`) VALUES
(9, 1, 'Luis', '2014-02-20', '12:00:00', 1, 0),
(11, 1, 'Luis', '2014-02-20', '18:50:00', 1, 0),
(12, 1, 'Luis', '2014-02-20', '20:00:00', 0, 0),
(13, 12, 'Oso', '2013-12-20', '20:00:00', 1, 0),
(15, 12, 'Luis', '2013-12-20', '21:00:00', 1, 0),
(16, 2, 'Fernandez', '2014-02-20', '15:00:00', 1, 0),
(17, 2, 'Fernandez', '2014-02-20', '16:00:00', 1, 0),
(18, 2, 'Fernandez', '2013-12-01', '20:00:00', 1, 1),
(19, 5, 'Prueba', '2013-12-12', '18:50:00', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `login` varchar(12) COLLATE latin1_spanish_ci NOT NULL,
  `password` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `ci` bigint(12) NOT NULL,
  `nombre` varchar(40) COLLATE latin1_spanish_ci NOT NULL,
  `correo` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `rol` int(1) NOT NULL,
  `direccion` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `telefono` bigint(12) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`login`, `password`, `ci`, `nombre`, `correo`, `rol`, `direccion`, `telefono`, `estado`) VALUES
('admin', '202cb962ac59075b964b07152d234b70', 123, 'Admininistrador', 'admin@gmail.com', 1, NULL, NULL, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

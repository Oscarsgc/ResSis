-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 03-12-2013 a las 22:54:27
-- Versión del servidor: 5.5.33
-- Versión de PHP: 5.5.3

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

CREATE TABLE `combo` (
  `cod_combo` int(8) NOT NULL AUTO_INCREMENT COMMENT 'Codigo del Combo',
  `descripcion` varchar(50) COLLATE latin1_spanish_ci NOT NULL COMMENT 'Descripcion del Combo',
  `imagen` int(50) NOT NULL COMMENT 'Imagen de un Combo',
  `fecha_inicio` date NOT NULL COMMENT 'Fecha de inicio de vigencia del Combo',
  `fecha_fin` date NOT NULL COMMENT 'Fecha fin de vigencia del combo',
  `estado` tinyint(1) NOT NULL COMMENT 'Estado activo o inactivo del combo',
  PRIMARY KEY (`cod_combo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `combo_prodcuto`
--

CREATE TABLE `combo_prodcuto` (
  `cod_combo_producto` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Codigo de la tabla',
  `cod_combo` int(8) NOT NULL COMMENT 'Codigo de un combo',
  `cod_producto` varchar(8) COLLATE latin1_spanish_ci NOT NULL COMMENT 'Codigo de un producto',
  `cantidad` int(1) NOT NULL COMMENT 'Cantidad de combos y productos disponibles',
  PRIMARY KEY (`cod_combo_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `cod_menu` int(8) NOT NULL AUTO_INCREMENT COMMENT 'Codigo del menu',
  `fecha_inicio` date NOT NULL COMMENT 'Fecha de inicio de vigencia del menu',
  `fecha_fin` date DEFAULT NULL COMMENT 'Fecha de fin de vigencia del menu',
  `estado` tinyint(1) NOT NULL COMMENT 'Estado del menu activo o inactivo',
  PRIMARY KEY (`cod_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu_dia`
--

CREATE TABLE `menu_dia` (
  `cod_menu_dia` int(8) NOT NULL AUTO_INCREMENT COMMENT 'Codigo del Menu del dia',
  `dia` varchar(12) COLLATE latin1_spanish_ci NOT NULL COMMENT 'Dia del menu',
  `fecha_inicio` date NOT NULL COMMENT 'Fecha inicio de vigencia del menu del dia',
  `fecha_fin` date DEFAULT NULL COMMENT 'Fecha fin de vigencia del menu del dia',
  `estado` tinyint(1) NOT NULL COMMENT 'Estado del menu del dia',
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

CREATE TABLE `orden` (
  `cod_orden` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Codigo de la orden',
  `num_mesa` int(2) NOT NULL COMMENT 'Numero de mesa de la orden',
  `nombre_cliente` varchar(40) COLLATE latin1_spanish_ci NOT NULL COMMENT 'Nombre del cliente de la orden',
  `fecha` datetime NOT NULL COMMENT 'Fecha de la orden',
  `estado` tinyint(1) NOT NULL COMMENT 'Estado de la Orden Activa o Inactiva',
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

CREATE TABLE `orden_producto` (
  `cod_orden_producto` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Codigo de la tabla',
  `cod_orden` bigint(20) NOT NULL COMMENT 'Codigo de una orden',
  `cod_producto` varchar(8) COLLATE latin1_spanish_ci NOT NULL COMMENT 'Codigo de un producto',
  `cantidad` int(2) NOT NULL COMMENT 'Cantidad de Ordenes y Productos Asociados',
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

CREATE TABLE `pedido` (
  `cod_pedido` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Codigo del pedido',
  `nombre` varchar(40) COLLATE latin1_spanish_ci NOT NULL COMMENT 'Nombre del cliente al cual pertenece el pedido',
  `nit` bigint(12) NOT NULL COMMENT 'Nit del cliente',
  `direccion` varchar(50) COLLATE latin1_spanish_ci NOT NULL COMMENT 'Direccion del cliente para el pedido',
  `telefono` bigint(12) NOT NULL COMMENT 'Telefono del cliente para el pedido',
  `fecha` datetime NOT NULL COMMENT 'Fecha del pedido',
  `estado` tinyint(1) NOT NULL COMMENT 'Estado del pedido Activo o Inactivo',
  `entregado` tinyint(1) NOT NULL COMMENT 'Informa si se entrego el pedido o no',
  `usuario` varchar(12) COLLATE latin1_spanish_ci NOT NULL COMMENT 'Codigo del Usuario al que esta asociado el pedido',
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

CREATE TABLE `pedido_producto` (
  `cod_penido_producto` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Codigo de la tabla',
  `cod_pedido` bigint(20) NOT NULL COMMENT 'Codigo de un Pedido',
  `cod_producto` varchar(8) COLLATE latin1_spanish_ci NOT NULL COMMENT 'Codigo de un Producto asociado a un pedido',
  `cantidad` int(2) NOT NULL COMMENT 'Cantidad de Productos Asociados al pedido',
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

CREATE TABLE `pensionados` (
  `cod_pensionado` int(8) NOT NULL AUTO_INCREMENT COMMENT 'Codigo de un pensionado',
  `ci` int(12) NOT NULL COMMENT 'Carnet de Identidad de un pensionado',
  `nombre` varchar(40) COLLATE latin1_spanish_ci NOT NULL COMMENT 'Nombre del Pensionado',
  `direccion` varchar(60) COLLATE latin1_spanish_ci NOT NULL COMMENT 'Direccion del Pensionado',
  `telefono` bigint(12) NOT NULL COMMENT 'Telefono del pensionado',
  `estado` tinyint(1) NOT NULL COMMENT 'Estado del pensionado Activo o Inactivo',
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

CREATE TABLE `producto` (
  `cod_producto` varchar(8) COLLATE latin1_spanish_ci NOT NULL COMMENT 'Codigo de un producto',
  `nombre` varchar(30) COLLATE latin1_spanish_ci NOT NULL COMMENT 'Nombre del Producto',
  `tipo` int(1) NOT NULL COMMENT 'Tipo del Producto Comida, bebida o guarnicion',
  `precio` float NOT NULL COMMENT 'Precio del Producto',
  `estado` tinyint(1) NOT NULL COMMENT 'Estado del producto Activo o Inactivo'
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

CREATE TABLE `producto_menu` (
  `cod_producto_menu` int(8) NOT NULL AUTO_INCREMENT COMMENT 'Codigo de la Tabla',
  `cod_menu` int(8) NOT NULL COMMENT 'Codigo del menu al que se asocia un producto',
  `cod_producto` varchar(8) COLLATE latin1_spanish_ci NOT NULL COMMENT 'Codigo del producto que se asocia a un menu',
  PRIMARY KEY (`cod_producto_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_menu_dia`
--

CREATE TABLE `producto_menu_dia` (
  `cod_producto_menu_dia` int(8) NOT NULL AUTO_INCREMENT COMMENT 'Codigo de la tabla',
  `cod_menu_dia` int(8) NOT NULL COMMENT 'Codigo del menu del dia al que esta asociado un producto',
  `cod_producto` varchar(8) COLLATE latin1_spanish_ci NOT NULL COMMENT 'Codigo del producto asociado a un menu del dia',
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

CREATE TABLE `promocion` (
  `cod_promocion` int(8) NOT NULL AUTO_INCREMENT COMMENT 'Codigo e una promocion',
  `descripcion` varchar(50) COLLATE latin1_spanish_ci NOT NULL COMMENT 'Descripcion de una promocion',
  `imagen` varchar(50) COLLATE latin1_spanish_ci NOT NULL COMMENT 'Imagen de una promocion',
  `fecha_inicio` date NOT NULL COMMENT 'Fecha de inicio de vigencia de una promocion',
  `fecha_fin` date NOT NULL COMMENT 'Fecha de fin de vigencia de una promocion',
  `estado` tinyint(1) NOT NULL COMMENT 'Estado de una promocion Activa o Inactiva',
  PRIMARY KEY (`cod_promocion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promocion_producto`
--

CREATE TABLE `promocion_producto` (
  `cod_promocion_producto` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Codigo de la tabla',
  `cod_promocion` int(8) NOT NULL COMMENT 'Codigo de una promocion a la que esta asociado un producto',
  `cod_producto` varchar(8) COLLATE latin1_spanish_ci NOT NULL COMMENT 'Codigo de un producto asociado a una promocion',
  `cantidad` int(1) NOT NULL COMMENT 'Cantidad de productos asociados a una promocion',
  PRIMARY KEY (`cod_promocion_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva_mesa`
--

CREATE TABLE `reserva_mesa` (
  `cod_reserva_mesa` bigint(12) NOT NULL AUTO_INCREMENT COMMENT 'Codigo de reserva de una mesa',
  `num_mesa` int(2) NOT NULL COMMENT 'Numero de mesa reservada',
  `nombre_cliente` varchar(40) COLLATE latin1_spanish_ci NOT NULL COMMENT 'Nombre del cliente para la reserva',
  `fecha` date NOT NULL COMMENT 'Fecha de la reserva',
  `hora` time NOT NULL COMMENT 'Hora de la reserva',
  `estado` tinyint(1) NOT NULL COMMENT 'Estado de la reserva Activa o Inactiva',
  `terminada` tinyint(1) NOT NULL COMMENT 'Indicador de finalizacion de la reserva',
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

CREATE TABLE `usuarios` (
  `login` varchar(12) COLLATE latin1_spanish_ci NOT NULL COMMENT 'Login del Usuario',
  `password` varchar(100) COLLATE latin1_spanish_ci NOT NULL COMMENT 'Password del usuario',
  `ci` bigint(12) NOT NULL COMMENT 'Carnet de Identidad del usuario',
  `nombre` varchar(40) COLLATE latin1_spanish_ci NOT NULL COMMENT 'Nombre del usuario',
  `correo` varchar(30) COLLATE latin1_spanish_ci NOT NULL COMMENT 'Correo del Usuario',
  `rol` int(1) NOT NULL COMMENT 'Rol del usuario',
  `direccion` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL COMMENT 'Direccion del usuario',
  `telefono` bigint(12) DEFAULT NULL COMMENT 'Telefono del usuario',
  `estado` tinyint(1) NOT NULL COMMENT 'Estado del usuario Activo o Inactivo',
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

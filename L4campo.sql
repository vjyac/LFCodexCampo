-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 24-02-2014 a las 15:06:58
-- Versión del servidor: 5.5.29
-- Versión de PHP: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `campos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividads`
--

CREATE TABLE `actividads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `actividad` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `actividads`
--

INSERT INTO `actividads` (`id`, `actividad`, `created_at`, `updated_at`) VALUES
(1, 'Ganaderia', '2014-02-14 00:00:00', '2014-02-14 00:00:00'),
(2, 'Forestacion', '2014-02-14 00:00:00', '2014-02-14 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caravanas`
--

CREATE TABLE `caravanas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `caravana` varchar(45) DEFAULT NULL,
  `estado` enum('viva','muerta','vendida') DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `caravanas`
--

INSERT INTO `caravanas` (`id`, `caravana`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'GH01', 'vendida', '2014-02-22 22:34:26', '2014-02-22 22:34:26'),
(2, 'gn003', 'vendida', '2014-02-22 22:40:20', '2014-02-22 22:40:20'),
(3, 'GN365-123456', 'vendida', '2014-02-22 22:40:20', '2014-02-22 22:40:20'),
(4, 'GN365-124', 'vendida', '2014-02-22 22:40:20', '2014-02-22 22:40:20'),
(5, 'GN365A01', 'viva', '2014-02-23 12:34:35', '2014-02-23 12:34:35'),
(6, 'GN365A02', 'viva', '2014-02-23 12:34:35', '2014-02-23 12:34:35'),
(7, 'GN365A03', 'viva', '2014-02-23 12:34:35', '2014-02-23 12:34:35'),
(8, 'GN365A04', 'viva', '2014-02-23 12:34:35', '2014-02-23 12:34:35'),
(9, 'GN365A05', 'viva', '2014-02-23 12:34:35', '2014-02-23 12:34:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chofers`
--

CREATE TABLE `chofers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chofer` varchar(125) DEFAULT NULL,
  `domicilio` varchar(125) DEFAULT NULL,
  `ciudads_id` int(11) NOT NULL,
  `dni` varchar(15) DEFAULT NULL,
  `licencia` varchar(15) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `estado` enum('activo','inactivo') DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_chofers_ciudads1_idx` (`ciudads_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `chofers`
--

INSERT INTO `chofers` (`id`, `chofer`, `domicilio`, `ciudads_id`, `dni`, `licencia`, `telefono`, `email`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Portel Abel Gustavo', 'Remedios de Escalada', 1, '23354319', '', '3756611476', 'gportel@navarsa.com', 'activo', '2014-02-14 21:25:18', '2014-02-14 23:03:53'),
(2, 'Da Silva Ramón Ricardo', 'Barrio 115 Viviendas', 1, '18266059', '', '3756611477', '', NULL, '2014-02-14 21:30:20', '2014-02-14 21:30:20'),
(3, 'Ganduglia Nelson Ramón', 'Barrio Narciso Vega', 1, '30827006', '', '3756417553', '', NULL, '2014-02-14 21:32:07', '2014-02-14 21:32:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudads`
--

CREATE TABLE `ciudads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ciudad` varchar(125) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `provincias_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ciudads_provincias1_idx` (`provincias_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `ciudads`
--

INSERT INTO `ciudads` (`id`, `ciudad`, `created_at`, `updated_at`, `provincias_id`) VALUES
(1, 'Virasoro', '2014-02-14 21:20:25', '2014-02-14 21:20:25', 1),
(2, 'Santo Tomé', '2014-02-14 21:21:18', '2014-02-14 21:21:18', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientesproveedors`
--

CREATE TABLE `clientesproveedors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clientesproveedor` varchar(90) DEFAULT NULL,
  `tipo` enum('cliente','proveedor') DEFAULT NULL,
  `ciudads_id` int(11) NOT NULL,
  `direccion` varchar(125) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `email` varchar(125) DEFAULT NULL,
  `estado` enum('activo','inactivo') DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_clientesproveedors_ciudads1_idx` (`ciudads_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `clientesproveedors`
--

INSERT INTO `clientesproveedors` (`id`, `clientesproveedor`, `tipo`, `ciudads_id`, `direccion`, `telefono`, `email`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Navar S.A.', 'cliente', 1, '', '481888', 'navar@navarsa.com', 'activo', '2014-02-14 21:40:45', '2014-02-14 21:40:45'),
(2, 'Virocay S.C.A. ', 'proveedor', 1, '', '', '', 'activo', '2014-02-14 21:41:42', '2014-02-22 21:18:30'),
(3, 'Aires Mario', 'cliente', 1, 'Barrio Cesáreo Navajas', '', '', 'activo', '2014-02-14 22:39:39', '2014-02-14 22:39:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentostipos`
--

CREATE TABLE `documentostipos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `documentostipo` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `documentostipos`
--

INSERT INTO `documentostipos` (`id`, `documentostipo`, `created_at`, `updated_at`) VALUES
(1, 'Remito', '2014-02-14 21:43:10', '2014-02-14 21:43:10'),
(2, 'Factura A', '2014-02-14 21:43:19', '2014-02-14 21:43:19'),
(3, 'Factura B', '2014-02-14 21:43:26', '2014-02-14 21:43:26'),
(4, 'Factura M', '2014-02-14 21:43:40', '2014-02-14 21:44:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `elementos`
--

CREATE TABLE `elementos` (
  `id` int(11) NOT NULL,
  `grupos_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_elementos_grupo1_idx` (`grupos_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `establecimientos`
--

CREATE TABLE `establecimientos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `establecimiento` varchar(45) DEFAULT NULL,
  `ciudads_id` int(11) NOT NULL,
  `clientesproveedors_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_establecimientos_ciu1_idx` (`ciudads_id`),
  KEY `fk_establecimientos_clie1_idx` (`clientesproveedors_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `establecimientos`
--

INSERT INTO `establecimientos` (`id`, `establecimiento`, `ciudads_id`, `clientesproveedors_id`, `created_at`, `updated_at`) VALUES
(1, 'Rincón Virasoro', 1, 1, '2014-02-14 21:47:24', '2014-02-14 21:47:40'),
(2, 'Carvallo', 2, 1, '2014-02-14 21:48:05', '2014-02-14 21:48:05'),
(3, 'La Gloria', 1, 1, '2014-02-14 21:48:40', '2014-02-14 21:48:40'),
(4, 'Virocay', 1, 2, '2014-02-14 21:49:05', '2014-02-22 22:32:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupoalertas`
--

CREATE TABLE `grupoalertas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grupos_id` int(11) NOT NULL,
  `fecha` varchar(45) DEFAULT NULL,
  `alerta` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_grupo_alerta_grupo1_idx` (`grupos_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE `grupos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grupo` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`id`, `grupo`, `created_at`, `updated_at`) VALUES
(1, 'Rodeo1', '2014-02-17 23:57:04', '2014-02-17 23:57:04'),
(2, 'Rodeo2', '2014-02-17 23:57:11', '2014-02-17 23:57:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historialgrupoproductocategorias`
--

CREATE TABLE `historialgrupoproductocategorias` (
  `id` int(11) NOT NULL,
  `grupos_id` int(11) NOT NULL,
  `productocategorias_id` int(11) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_historial_grupo_producto_categoria_grupo1_idx` (`grupos_id`),
  KEY `fk_historial_grupo_producto_categoria_producto_categoria1_idx` (`productocategorias_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historialgruposlotes`
--

CREATE TABLE `historialgruposlotes` (
  `id` int(11) NOT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `fecha_egreso` date DEFAULT NULL,
  `grupos_id` int(11) NOT NULL,
  `lotes_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_historial_grupos_lotes_grupo1_idx` (`grupos_id`),
  KEY `fk_historial_grupos_lotes_lotes1_idx` (`lotes_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historiallabores`
--

CREATE TABLE `historiallabores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `labortipos_id` int(11) NOT NULL,
  `grupos_id` int(11) NOT NULL,
  `clienteproveedors_id` int(11) NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_historial_labores_labores_tipos1_idx` (`labortipos_id`),
  KEY `fk_historial_labores_grupo1_idx` (`grupos_id`),
  KEY `fk_historial_labores_clientes_proveedores1_idx` (`clienteproveedors_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `labores_tipos`
--

CREATE TABLE `labores_tipos` (
  `id_labor_tipo` int(11) NOT NULL AUTO_INCREMENT,
  `labor_tipos` varchar(45) DEFAULT NULL,
  `actividads_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_labor_tipo`),
  KEY `fk_labores_tipos_actividades1_idx` (`actividads_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lotes`
--

CREATE TABLE `lotes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `establecimientos_id` int(11) NOT NULL,
  `lote` varchar(220) DEFAULT NULL,
  `superficie_m2` decimal(10,2) DEFAULT NULL,
  `observaciones` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_lotes_establecimientos1_idx` (`establecimientos_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `lotes`
--

INSERT INTO `lotes` (`id`, `establecimientos_id`, `lote`, `superficie_m2`, `observaciones`, `created_at`, `updated_at`) VALUES
(1, 2, 'A', 0.00, '', '2014-02-14 21:51:07', '2014-02-14 21:51:07'),
(2, 2, 'B', 0.00, '', '2014-02-14 21:51:37', '2014-02-14 21:51:37'),
(3, 2, 'C', 0.00, '', '2014-02-14 21:53:45', '2014-02-14 21:53:45'),
(4, 4, 'Virocay', 0.00, '', '2014-02-14 21:54:35', '2014-02-14 21:54:35'),
(5, 3, 'G', 0.00, '', '2014-02-15 13:56:22', '2014-02-15 13:56:22'),
(6, 1, 'R', 0.00, '', '2014-02-23 15:09:21', '2014-02-23 15:09:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lotesporactividades`
--

CREATE TABLE `lotesporactividades` (
  `id` int(11) NOT NULL,
  `lotes_id` int(11) NOT NULL,
  `actividads_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_lotes_por_actividades_lotes1_idx` (`lotes_id`),
  KEY `fk_lotes_por_actividades_actividades1_idx` (`actividads_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientomotivos`
--

CREATE TABLE `movimientomotivos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `movimientomotivo` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `movimientomotivos`
--

INSERT INTO `movimientomotivos` (`id`, `movimientomotivo`, `created_at`, `updated_at`) VALUES
(1, 'Ventas', '2014-02-14 21:55:05', '2014-02-14 21:55:05'),
(2, 'Compras', '2014-02-14 21:55:12', '2014-02-14 21:55:18'),
(3, 'Muerte', '2014-02-22 00:00:00', '2014-02-22 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos`
--

CREATE TABLE `movimientos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `tipo_movimiento` enum('ingreso','egreso') DEFAULT NULL,
  `proveedorcliente_id` int(11) NOT NULL,
  `contratistas_id` int(11) NOT NULL,
  `documentostipos_id` int(11) NOT NULL,
  `numero_documento` varchar(45) DEFAULT NULL,
  `importe_total` decimal(10,2) DEFAULT NULL,
  `chofers_id` int(11) NOT NULL,
  `vehiculos_id` int(11) NOT NULL,
  `movimientomotivos_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `lotes_id` int(11) NOT NULL,
  `peso_bruto` int(11) DEFAULT NULL,
  `peso_tara` int(11) DEFAULT NULL,
  `peso_neto` int(11) DEFAULT NULL,
  `estado` enum('abierto','cerrado') DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `productos_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_movimientos_clientes_proveedores2_idx` (`proveedorcliente_id`),
  KEY `fk_movimientos_documentos_ti1_idx` (`documentostipos_id`),
  KEY `fk_movimientos_choferes1_idx` (`chofers_id`),
  KEY `fk_movimientos_vehic1_idx` (`vehiculos_id`),
  KEY `fk_movimientos_movimiento_motivos1_idx` (`movimientomotivos_id`),
  KEY `fk_movimientos_lotes1_idx` (`lotes_id`),
  KEY `fk_movimientos_productos1_idx` (`productos_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `movimientos`
--

INSERT INTO `movimientos` (`id`, `fecha`, `tipo_movimiento`, `proveedorcliente_id`, `contratistas_id`, `documentostipos_id`, `numero_documento`, `importe_total`, `chofers_id`, `vehiculos_id`, `movimientomotivos_id`, `created_at`, `updated_at`, `lotes_id`, `peso_bruto`, `peso_tara`, `peso_neto`, `estado`, `cantidad`, `productos_id`) VALUES
(1, '2014-02-14', 'ingreso', 1, 3, 1, '536', 1000.00, 1, 1, 2, '2014-02-14 22:17:25', '2014-02-14 22:48:54', 1, 15000, 5000, 10000, 'abierto', 20, 1),
(2, '2014-02-10', 'ingreso', 1, 3, 1, '40', 789.50, 1, 1, 1, '2014-02-14 22:44:29', '2014-02-15 13:56:39', 5, 25000, 5000, 20000, 'abierto', 0, 3),
(3, '2014-02-14', 'ingreso', 1, 3, 1, '528', 0.00, 1, 1, 1, '2014-02-14 23:59:45', '2014-02-14 23:59:45', 1, 15000, 5000, 10000, 'cerrado', 35, 1),
(4, '2014-02-09', 'ingreso', 1, 3, 1, '895', 0.00, 1, 1, 1, '2014-02-15 00:01:03', '2014-02-15 13:01:30', 4, 30000, 5000, 25000, 'abierto', 0, 3),
(5, '2014-02-14', 'ingreso', 1, 3, 1, '68', 0.00, 1, 2, 1, '2014-02-15 00:03:19', '2014-02-15 12:11:08', 4, 35000, 5000, 30000, 'abierto', 0, 4),
(6, '2014-02-14', 'ingreso', 2, 3, 1, '254', 0.00, 2, 2, 1, '2014-02-15 00:04:53', '2014-02-15 13:23:31', 4, 35000, 5000, 30000, 'abierto', 0, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientoscaravanasgrupos`
--

CREATE TABLE `movimientoscaravanasgrupos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `movimientosganaderias_id` int(11) NOT NULL,
  `caravanas_id` int(11) NOT NULL,
  `grupos_id` int(11) NOT NULL,
  `kilos` decimal(10,3) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_movimientoscaravanasgrupos_caravanas1_idx` (`caravanas_id`),
  KEY `fk_movimientoscaravanasgrupos_grupos1_idx` (`grupos_id`),
  KEY `fk_movimientoscaravanasgrupos_movimientosganaderias1_idx` (`movimientosganaderias_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `movimientoscaravanasgrupos`
--

INSERT INTO `movimientoscaravanasgrupos` (`id`, `movimientosganaderias_id`, `caravanas_id`, `grupos_id`, `kilos`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 100.000, '2014-02-22 22:34:26', '2014-02-22 22:34:26'),
(2, 2, 2, 2, 166.667, '2014-02-22 22:40:20', '2014-02-22 22:40:20'),
(3, 2, 3, 2, 166.667, '2014-02-22 22:40:20', '2014-02-22 22:40:20'),
(4, 2, 4, 2, 166.667, '2014-02-22 22:40:20', '2014-02-22 22:40:20'),
(5, 3, 5, 2, 600.000, '2014-02-23 12:34:35', '2014-02-23 12:34:35'),
(6, 3, 6, 2, 600.000, '2014-02-23 12:34:35', '2014-02-23 12:34:35'),
(7, 3, 7, 2, 600.000, '2014-02-23 12:34:35', '2014-02-23 12:34:35'),
(8, 3, 8, 2, 600.000, '2014-02-23 12:34:35', '2014-02-23 12:34:35'),
(9, 3, 9, 2, 600.000, '2014-02-23 12:34:35', '2014-02-23 12:34:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientosganaderias`
--

CREATE TABLE `movimientosganaderias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `tipo_movimiento` enum('ingreso','egreso','interno') DEFAULT NULL,
  `movimientomotivos_id` int(11) NOT NULL,
  `documentostipos_id` int(11) NOT NULL,
  `numero_documento` varchar(45) DEFAULT NULL,
  `origenlotes_id` int(11) DEFAULT NULL,
  `destinolotes_id` int(11) DEFAULT NULL,
  `nro_cabezas` int(11) DEFAULT NULL,
  `chofers_id` int(11) DEFAULT NULL,
  `peso_bruto` int(11) DEFAULT NULL,
  `peso_tara` int(11) DEFAULT NULL,
  `peso_neto` int(11) DEFAULT NULL,
  `vehiculos_id` int(11) DEFAULT NULL,
  `estado` enum('abierto','cerrado') DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `grupos_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_movimientosganaderias_documentostipos1_idx` (`documentostipos_id`),
  KEY `fk_movimientosganaderias_grupos1_idx` (`grupos_id`),
  KEY `fk_movimientosganaderias_movimientomotivos1_idx` (`movimientomotivos_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `movimientosganaderias`
--

INSERT INTO `movimientosganaderias` (`id`, `fecha`, `tipo_movimiento`, `movimientomotivos_id`, `documentostipos_id`, `numero_documento`, `origenlotes_id`, `destinolotes_id`, `nro_cabezas`, `chofers_id`, `peso_bruto`, `peso_tara`, `peso_neto`, `vehiculos_id`, `estado`, `created_at`, `updated_at`, `grupos_id`) VALUES
(1, '2014-02-22', 'ingreso', 2, 1, '01', 1, 4, 1, 1, 1500, 1400, 100, 1, 'cerrado', '2014-02-22 22:34:04', '2014-02-22 23:43:44', 1),
(2, '2014-02-22', 'ingreso', 2, 1, '02', 4, 1, 2, 1, 2000, 1500, 500, 1, 'cerrado', '2014-02-22 22:37:32', '2014-02-22 23:43:26', 2),
(3, '2014-02-23', 'ingreso', 2, 1, '00000541', 1, 1, 5, 1, 15000, 12000, 3000, 1, 'cerrado', '2014-02-23 12:29:44', '2014-02-23 12:29:44', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientosganaderiascuerpos`
--

CREATE TABLE `movimientosganaderiascuerpos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `movimientosganaderias_id` int(11) NOT NULL,
  `productos_id` int(11) NOT NULL,
  `caravana` varchar(45) DEFAULT NULL,
  `kilos` decimal(10,3) DEFAULT NULL,
  `observaciones` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_movimientosforestacionscuerpos_movimientosforestacions1_idx` (`movimientosganaderias_id`),
  KEY `fk_movimientosforestacionscuerpos_productos1_idx` (`productos_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `movimientosganaderiascuerpos`
--

INSERT INTO `movimientosganaderiascuerpos` (`id`, `movimientosganaderias_id`, `productos_id`, `caravana`, `kilos`, `observaciones`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 'GH01', 100.000, 'bien', '2014-02-22 22:34:21', '2014-02-22 22:34:21'),
(2, 2, 5, 'gn003', 166.667, '', '2014-02-22 22:39:59', '2014-02-22 22:39:59'),
(3, 2, 5, 'GN365-123456', 166.667, '', '2014-02-22 22:40:08', '2014-02-22 22:40:08'),
(4, 2, 5, 'GN365-124', 166.667, '', '2014-02-22 22:40:15', '2014-02-22 22:40:15'),
(5, 3, 6, 'GN365A01', 600.000, '', '2014-02-23 12:33:15', '2014-02-23 12:33:15'),
(6, 3, 5, 'GN365A02', 600.000, '', '2014-02-23 12:33:38', '2014-02-23 12:33:38'),
(7, 3, 5, 'GN365A03', 600.000, '', '2014-02-23 12:33:56', '2014-02-23 12:33:56'),
(8, 3, 5, 'GN365A04', 600.000, '', '2014-02-23 12:34:11', '2014-02-23 12:34:11'),
(9, 3, 5, 'GN365A05', 600.000, '', '2014-02-23 12:34:30', '2014-02-23 12:34:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productocategorias`
--

CREATE TABLE `productocategorias` (
  `id` int(11) NOT NULL,
  `productocategoria` varchar(45) DEFAULT NULL,
  `productos_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_producto_categoria_productos1_idx` (`productos_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `actividads_id` int(11) NOT NULL,
  `productosunidadmedidas_id` int(11) NOT NULL,
  `producto` varchar(45) DEFAULT NULL,
  `producto_codigo` varchar(45) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `estado` enum('activo','inactivo') DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_productos_actividades1_idx` (`actividads_id`),
  KEY `fk_productos_productos_unidad_medida1_idx` (`productosunidadmedidas_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `actividads_id`, `productosunidadmedidas_id`, `producto`, `producto_codigo`, `precio`, `estado`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'Leña Monte', '0001', 80.00, 'activo', '2014-02-14 22:02:27', '2014-02-14 22:02:27'),
(2, 2, 1, 'Leña Eucalipto', '0002', 70.00, 'activo', '2014-02-14 22:02:57', '2014-02-14 22:02:57'),
(3, 2, 2, 'Raleo de Pino', '0003', 100.00, 'activo', '2014-02-14 22:03:43', '2014-02-14 22:03:43'),
(4, 2, 2, 'Raleo de Eucalipto', '0004', 100.00, 'activo', '2014-02-14 22:04:28', '2014-02-14 22:04:28'),
(5, 1, 3, 'N1 - Bangus', 'N1B', 100.00, 'activo', '2014-02-18 23:36:36', '2014-02-18 23:36:36'),
(6, 1, 3, 'V1 - Brangus', 'V1B', 100.00, 'activo', '2014-02-18 23:38:03', '2014-02-18 23:38:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productosunidadmedidas`
--

CREATE TABLE `productosunidadmedidas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productosunidadmedida` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `productosunidadmedidas`
--

INSERT INTO `productosunidadmedidas` (`id`, `productosunidadmedida`, `created_at`, `updated_at`) VALUES
(1, 'Metros Cúbicos', '2014-02-14 22:00:23', '2014-02-14 22:00:23'),
(2, 'Kilos', '2014-02-14 22:00:32', '2014-02-14 22:00:32'),
(3, 'Unidad', '2014-02-14 22:00:41', '2014-02-14 22:00:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE `provincias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `provincia` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `provincias`
--

INSERT INTO `provincias` (`id`, `provincia`, `created_at`, `updated_at`) VALUES
(1, 'Corrientes', '2014-02-14 21:18:37', '2014-02-14 21:18:37'),
(2, 'Misiones', '2014-02-14 21:18:45', '2014-02-14 21:18:50'),
(3, 'Entre Ríos', '2014-02-14 21:18:59', '2014-02-14 21:18:59'),
(4, 'Chaco', '2014-02-14 21:19:07', '2014-02-14 21:19:07'),
(5, 'Santa Fé', '2014-02-14 21:19:15', '2014-02-14 21:19:15'),
(6, 'Buenos Aires', '2014-02-14 21:19:26', '2014-02-14 21:19:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `apellidoynombre` varchar(200) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `apellidoynombre`, `created_at`, `updated_at`) VALUES
(1, 'keloxers', 'keloxers@gmail.com', '$2y$08$Gg8UjTyEMQ8UPQNCZiANLePiIW0C5jgCq1xaGGEDuREMR0APbd3ii', NULL, '2014-02-14 21:07:00', '2014-02-14 21:07:00'),
(2, 'victor', 'victor', '$2y$08$HjOdTQJK0bf2Uscb7U4XS.GB0z1PfhUNnVmAcLX4min9rjFHGcmka', NULL, '2014-02-14 21:08:02', '2014-02-14 21:08:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patente` varchar(6) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `tara_kg` decimal(10,2) DEFAULT NULL,
  `clientesproveedors_id` int(11) NOT NULL,
  `carga_maxima_kg` decimal(10,2) DEFAULT NULL,
  `estado` enum('activo','inactivo') DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_vehiculos_clientes_proveedores1_idx` (`clientesproveedors_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`id`, `patente`, `descripcion`, `tara_kg`, `clientesproveedors_id`, `carga_maxima_kg`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'GLJ807', 'Iveco Cavalino', 6000.00, 1, 8000.00, 'activo', '2014-02-14 22:08:22', '2014-02-14 22:08:22'),
(2, 'FIV398', 'IVECO 380', 12000.00, 1, 35000.00, 'activo', '2014-02-15 12:10:12', '2014-02-15 12:10:12');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `chofers`
--
ALTER TABLE `chofers`
  ADD CONSTRAINT `fk_chofers_ciudads1` FOREIGN KEY (`ciudads_id`) REFERENCES `ciudads` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ciudads`
--
ALTER TABLE `ciudads`
  ADD CONSTRAINT `fk_ciudads_provincias1` FOREIGN KEY (`provincias_id`) REFERENCES `provincias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `clientesproveedors`
--
ALTER TABLE `clientesproveedors`
  ADD CONSTRAINT `fk_clientesproveedors_ciudads1` FOREIGN KEY (`ciudads_id`) REFERENCES `ciudads` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `elementos`
--
ALTER TABLE `elementos`
  ADD CONSTRAINT `fk_elementos_grupo1` FOREIGN KEY (`grupos_id`) REFERENCES `grupos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `establecimientos`
--
ALTER TABLE `establecimientos`
  ADD CONSTRAINT `fk_establecimientos_ciudads1` FOREIGN KEY (`ciudads_id`) REFERENCES `ciudads` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_establecimientos_clientesproveedors1` FOREIGN KEY (`clientesproveedors_id`) REFERENCES `clientesproveedors` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `grupoalertas`
--
ALTER TABLE `grupoalertas`
  ADD CONSTRAINT `fk_grupo_alerta_grupo1` FOREIGN KEY (`grupos_id`) REFERENCES `grupos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `historialgrupoproductocategorias`
--
ALTER TABLE `historialgrupoproductocategorias`
  ADD CONSTRAINT `fk_historial_grupo_producto_categoria_grupo1` FOREIGN KEY (`grupos_id`) REFERENCES `grupos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_historial_grupo_producto_categoria_producto_categoria1` FOREIGN KEY (`productocategorias_id`) REFERENCES `productocategorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `historialgruposlotes`
--
ALTER TABLE `historialgruposlotes`
  ADD CONSTRAINT `fk_historial_grupos_lotes_grupo1` FOREIGN KEY (`grupos_id`) REFERENCES `grupos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_historial_grupos_lotes_lotes1` FOREIGN KEY (`lotes_id`) REFERENCES `lotes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `historiallabores`
--
ALTER TABLE `historiallabores`
  ADD CONSTRAINT `fk_historial_labores_clientes_proveedores1` FOREIGN KEY (`clienteproveedors_id`) REFERENCES `clientesproveedors` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_historial_labores_grupo1` FOREIGN KEY (`grupos_id`) REFERENCES `grupos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_historial_labores_labores_tipos1` FOREIGN KEY (`labortipos_id`) REFERENCES `labores_tipos` (`id_labor_tipo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `labores_tipos`
--
ALTER TABLE `labores_tipos`
  ADD CONSTRAINT `fk_labores_tipos_actividades1` FOREIGN KEY (`actividads_id`) REFERENCES `actividads` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `lotes`
--
ALTER TABLE `lotes`
  ADD CONSTRAINT `fk_lotes_establecimientos1` FOREIGN KEY (`establecimientos_id`) REFERENCES `establecimientos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `lotesporactividades`
--
ALTER TABLE `lotesporactividades`
  ADD CONSTRAINT `fk_lotes_por_actividades_actividades1` FOREIGN KEY (`actividads_id`) REFERENCES `actividads` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_lotes_por_actividades_lotes1` FOREIGN KEY (`lotes_id`) REFERENCES `lotes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD CONSTRAINT `fk_movimientos_choferes1` FOREIGN KEY (`chofers_id`) REFERENCES `chofers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_movimientos_clientes_proveedores1` FOREIGN KEY (`proveedorcliente_id`) REFERENCES `clientesproveedors` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_movimientos_documentos_tipo1` FOREIGN KEY (`documentostipos_id`) REFERENCES `documentostipos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_movimientos_lotes1` FOREIGN KEY (`lotes_id`) REFERENCES `lotes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_movimientos_movimiento_motivos1` FOREIGN KEY (`movimientomotivos_id`) REFERENCES `movimientomotivos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_movimientos_productos1` FOREIGN KEY (`productos_id`) REFERENCES `productos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_movimientos_vehiculos1` FOREIGN KEY (`vehiculos_id`) REFERENCES `vehiculos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `movimientoscaravanasgrupos`
--
ALTER TABLE `movimientoscaravanasgrupos`
  ADD CONSTRAINT `fk_movimientoscaravanasgrupos_caravanas1` FOREIGN KEY (`caravanas_id`) REFERENCES `caravanas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_movimientoscaravanasgrupos_grupos1` FOREIGN KEY (`grupos_id`) REFERENCES `grupos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_movimientoscaravanasgrupos_movimientosganaderias1` FOREIGN KEY (`movimientosganaderias_id`) REFERENCES `movimientosganaderias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `movimientosganaderias`
--
ALTER TABLE `movimientosganaderias`
  ADD CONSTRAINT `fk_movimientosganaderias_documentostipos1` FOREIGN KEY (`documentostipos_id`) REFERENCES `documentostipos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_movimientosganaderias_grupos1` FOREIGN KEY (`grupos_id`) REFERENCES `grupos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_movimientosganaderias_movimientomotivos1` FOREIGN KEY (`movimientomotivos_id`) REFERENCES `movimientomotivos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `movimientosganaderiascuerpos`
--
ALTER TABLE `movimientosganaderiascuerpos`
  ADD CONSTRAINT `fk_movimientosforestacionscuerpos_movimientosforestacions1` FOREIGN KEY (`movimientosganaderias_id`) REFERENCES `movimientosganaderias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_movimientosforestacionscuerpos_productos1` FOREIGN KEY (`productos_id`) REFERENCES `productos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `productocategorias`
--
ALTER TABLE `productocategorias`
  ADD CONSTRAINT `fk_producto_categoria_productos1` FOREIGN KEY (`productos_id`) REFERENCES `productos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_productos_actividades1` FOREIGN KEY (`actividads_id`) REFERENCES `actividads` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_productos_productos_unidad_medida1` FOREIGN KEY (`productosunidadmedidas_id`) REFERENCES `productosunidadmedidas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD CONSTRAINT `fk_vehiculos_clientes_proveedores1` FOREIGN KEY (`clientesproveedors_id`) REFERENCES `clientesproveedors` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

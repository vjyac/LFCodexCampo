-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 17-02-2014 a las 18:21:29
-- Versión del servidor: 5.5.29
-- Versión de PHP: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";





INSERT INTO `provincias` (`id`, `provincia`, `created_at`, `updated_at`) VALUES
(1, 'Corrientes', '2014-02-14 21:18:37', '2014-02-14 21:18:37'),
(2, 'Misiones', '2014-02-14 21:18:45', '2014-02-14 21:18:50'),
(3, 'Entre Ríos', '2014-02-14 21:18:59', '2014-02-14 21:18:59'),
(4, 'Chaco', '2014-02-14 21:19:07', '2014-02-14 21:19:07'),
(5, 'Santa Fé', '2014-02-14 21:19:15', '2014-02-14 21:19:15'),
(6, 'Buenos Aires', '2014-02-14 21:19:26', '2014-02-14 21:19:26');

INSERT INTO `ciudads` (`id`, `ciudad`, `created_at`, `updated_at`, `provincias_id`) VALUES
(1, 'Virasoro', '2014-02-14 21:20:25', '2014-02-14 21:20:25', 1),
(2, 'Santo Tomé', '2014-02-14 21:21:18', '2014-02-14 21:21:18', 1);

INSERT INTO `users` (`id`, `username`, `email`, `password`, `apellidoynombre`, `created_at`, `updated_at`) VALUES
(1, 'keloxers', 'keloxers@gmail.com', '$2y$08$Gg8UjTyEMQ8UPQNCZiANLePiIW0C5jgCq1xaGGEDuREMR0APbd3ii', NULL, '2014-02-14 21:07:00', '2014-02-14 21:07:00'),
(2, 'victor', 'victor', '$2y$08$HjOdTQJK0bf2Uscb7U4XS.GB0z1PfhUNnVmAcLX4min9rjFHGcmka', NULL, '2014-02-14 21:08:02', '2014-02-14 21:08:02');

INSERT INTO `movimientomotivos` (`id`, `movimientomotivo`, `created_at`, `updated_at`) VALUES
(1, 'Ventas', '2014-02-14 21:55:05', '2014-02-14 21:55:05'),
(2, 'Compras', '2014-02-14 21:55:12', '2014-02-14 21:55:18');


INSERT INTO `actividads` (`id`, `actividad`, `created_at`, `updated_at`) VALUES
(1, 'Ganaderia', '2014-02-14 00:00:00', '2014-02-14 00:00:00'),
(2, 'Forestacion', '2014-02-14 00:00:00', '2014-02-14 00:00:00');

INSERT INTO `documentostipos` (`id`, `documentostipo`, `created_at`, `updated_at`) VALUES
(1, 'Remito', '2014-02-14 21:43:10', '2014-02-14 21:43:10'),
(2, 'Factura A', '2014-02-14 21:43:19', '2014-02-14 21:43:19'),
(3, 'Factura B', '2014-02-14 21:43:26', '2014-02-14 21:43:26'),
(4, 'Factura M', '2014-02-14 21:43:40', '2014-02-14 21:44:01');

INSERT INTO `clientesproveedors` (`id`, `clientesproveedor`, `tipo`, `ciudads_id`, `direccion`, `telefono`, `email`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Navar S.A.', 'cliente', 1, '', '481888', 'navar@navarsa.com', 'activo', '2014-02-14 21:40:45', '2014-02-14 21:40:45'),
(2, 'Virocay S.C.A. ', 'proveedor', 1, '', '', '', 'activo', '2014-02-14 21:41:42', '2014-02-14 21:42:37'),
(3, 'Aires Mario', 'cliente', 1, 'Barrio Cesáreo Navajas', '', '', 'activo', '2014-02-14 22:39:39', '2014-02-14 22:39:39');

INSERT INTO `vehiculos` (`id`, `patente`, `descripcion`, `tara_kg`, `clientesproveedors_id`, `carga_maxima_kg`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'GLJ807', 'Iveco Cavalino', 6000.00, 1, 8000.00, 'activo', '2014-02-14 22:08:22', '2014-02-14 22:08:22'),
(2, 'FIV398', 'IVECO 380', 12000.00, 1, 35000.00, 'activo', '2014-02-15 12:10:12', '2014-02-15 12:10:12');

INSERT INTO `establecimientos` (`id`, `establecimiento`, `ciudads_id`, `clientesproveedors_id`, `created_at`, `updated_at`) VALUES
(1, 'Rincón Virasoro', 1, 1, '2014-02-14 21:47:24', '2014-02-14 21:47:40'),
(2, 'Carvallo', 2, 1, '2014-02-14 21:48:05', '2014-02-14 21:48:05'),
(3, 'La Gloria', 1, 1, '2014-02-14 21:48:40', '2014-02-14 21:48:40'),
(4, 'Virocay', 1, 1, '2014-02-14 21:49:05', '2014-02-14 21:49:05');

INSERT INTO `lotes` (`id`, `establecimientos_id`, `lote`, `superficie_m2`, `observaciones`, `created_at`, `updated_at`) VALUES
(1, 2, 'A', 0.00, '', '2014-02-14 21:51:07', '2014-02-14 21:51:07'),
(2, 2, 'B', 0.00, '', '2014-02-14 21:51:37', '2014-02-14 21:51:37'),
(3, 2, 'C', 0.00, '', '2014-02-14 21:53:45', '2014-02-14 21:53:45'),
(4, 4, 'Virocay', 0.00, '', '2014-02-14 21:54:35', '2014-02-14 21:54:35'),
(5, 3, 'G', 0.00, '', '2014-02-15 13:56:22', '2014-02-15 13:56:22');

INSERT INTO `productosunidadmedidas` (`id`, `productosunidadmedida`, `created_at`, `updated_at`) VALUES
(1, 'Metros Cúbicos', '2014-02-14 22:00:23', '2014-02-14 22:00:23'),
(2, 'Kilos', '2014-02-14 22:00:32', '2014-02-14 22:00:32'),
(3, 'Unidad', '2014-02-14 22:00:41', '2014-02-14 22:00:41');


INSERT INTO `productos` (`id`, `actividads_id`, `productosunidadmedidas_id`, `producto`, `producto_codigo`, `precio`, `estado`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'Leña Monte', '0001', 80.00, 'activo', '2014-02-14 22:02:27', '2014-02-14 22:02:27'),
(2, 2, 1, 'Leña Eucalipto', '0002', 70.00, 'activo', '2014-02-14 22:02:57', '2014-02-14 22:02:57'),
(3, 2, 2, 'Raleo de Pino', '0003', 100.00, 'activo', '2014-02-14 22:03:43', '2014-02-14 22:03:43'),
(4, 2, 2, 'Raleo de Eucalipto', '0004', 100.00, 'activo', '2014-02-14 22:04:28', '2014-02-14 22:04:28');

INSERT INTO `chofers` (`id`, `chofer`, `domicilio`, `ciudads_id`, `dni`, `licencia`, `telefono`, `email`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Portel Abel Gustavo', 'Remedios de Escalada', 1, '23354319', '', '3756611476', 'gportel@navarsa.com', 'activo', '2014-02-14 21:25:18', '2014-02-14 23:03:53'),
(2, 'Da Silva Ramón Ricardo', 'Barrio 115 Viviendas', 1, '18266059', '', '3756611477', '', NULL, '2014-02-14 21:30:20', '2014-02-14 21:30:20'),
(3, 'Ganduglia Nelson Ramón', 'Barrio Narciso Vega', 1, '30827006', '', '3756417553', '', NULL, '2014-02-14 21:32:07', '2014-02-14 21:32:07');

INSERT INTO `movimientos` (`id`, `fecha`, `tipo_movimiento`, `proveedorcliente_id`, `contratistas_id`, `documentostipos_id`, `numero_documento`, `importe_total`, `chofers_id`, `vehiculos_id`, `movimientomotivos_id`, `created_at`, `updated_at`, `lotes_id`, `peso_bruto`, `peso_tara`, `peso_neto`, `estado`, `cantidad`, `productos_id`) VALUES
(1, '2014-02-14', 'ingreso', 1, 3, 1, '536', 1000.00, 1, 1, 2, '2014-02-14 22:17:25', '2014-02-14 22:48:54', 1, 15000, 5000, 10000, 'abierto', 20, 1),
(2, '2014-02-10', 'ingreso', 1, 3, 1, '40', 789.50, 1, 1, 1, '2014-02-14 22:44:29', '2014-02-15 13:56:39', 5, 25000, 5000, 20000, 'abierto', 0, 3),
(3, '2014-02-14', 'ingreso', 1, 3, 1, '528', 0.00, 1, 1, 1, '2014-02-14 23:59:45', '2014-02-14 23:59:45', 1, 15000, 5000, 10000, 'cerrado', 35, 1),
(4, '2014-02-09', 'ingreso', 1, 3, 1, '895', 0.00, 1, 1, 1, '2014-02-15 00:01:03', '2014-02-15 13:01:30', 4, 30000, 5000, 25000, 'abierto', 0, 3),
(5, '2014-02-14', 'ingreso', 1, 3, 1, '68', 0.00, 1, 2, 1, '2014-02-15 00:03:19', '2014-02-15 12:11:08', 4, 35000, 5000, 30000, 'abierto', 0, 4),
(6, '2014-02-14', 'ingreso', 2, 3, 1, '254', 0.00, 2, 2, 1, '2014-02-15 00:04:53', '2014-02-15 13:23:31', 4, 35000, 5000, 30000, 'abierto', 0, 4);


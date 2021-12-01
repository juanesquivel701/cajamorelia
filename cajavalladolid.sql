-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-12-2021 a las 21:05:21
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.3.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cajavalladolid`
--

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `actualizar_cliente`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizar_cliente` (`_nombre` TEXT, `_apellido_paterno` TEXT, `_apellido_materno` TEXT, `_rfc` TEXT, `_curp` TEXT, `_id_cliente` INT)  BEGIN
START TRANSACTION;
	UPDATE tbl_cmv_cliente as c SET 
    c.nombre = _nombre, c.apellido_paterno = _apellido_paterno, c.apellido_materno = _apellido_materno, c.rfc = _rfc, c.curp = _curp 
    WHERE c.id_cliente = _id_cliente;
    COMMIT;
end$$

DROP PROCEDURE IF EXISTS `borrar_cliente`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `borrar_cliente` (`_id_cliente` INT)  BEGIN
START TRANSACTION;
	DELETE FROM tbl_cmv_cliente WHERE id_cliente = _id_cliente;
    COMMIT;
end$$

DROP PROCEDURE IF EXISTS `borrar_cliente_cuenta`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `borrar_cliente_cuenta` (`_id_cliente_cuenta` INT)  BEGIN
START TRANSACTION;
	DELETE FROM tbl_cmv_cliente_cuenta WHERE id_cliente_cuenta = _id_cliente_cuenta;
    COMMIT;
end$$

DROP PROCEDURE IF EXISTS `crear_cliente`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `crear_cliente` (`_nombre` TEXT, `_apellido_paterno` TEXT, `_apellido_materno` TEXT, `_rfc` TEXT, `_curp` TEXT)  BEGIN
START TRANSACTION;
	insert into tbl_cmv_cliente(nombre, apellido_paterno, apellido_materno, rfc, curp)
    values
    (_nombre, _apellido_paterno, _apellido_materno, _rfc, _curp);
    COMMIT;
end$$

DROP PROCEDURE IF EXISTS `crear_cliente_cuenta`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `crear_cliente_cuenta` (`_id_cliente` INT, `_id_cuenta` INT, `_saldo_actual` FLOAT, `_fecha_contratacion` DATETIME)  BEGIN
START TRANSACTION;
	insert into tbl_cmv_cliente_cuenta(id_cliente, id_cuenta, saldo_actual, fecha_contratacion)
    values
    (_id_cliente, _id_cuenta, _saldo_actual, _fecha_contratacion);
    COMMIT;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_cmv_tipo_cuenta`
--

DROP TABLE IF EXISTS `cat_cmv_tipo_cuenta`;
CREATE TABLE `cat_cmv_tipo_cuenta` (
  `id_cuenta` int(11) NOT NULL,
  `nombre_cuenta` varchar(80) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cat_cmv_tipo_cuenta`
--

INSERT INTO `cat_cmv_tipo_cuenta` (`id_cuenta`, `nombre_cuenta`) VALUES
(1, 'Bancomer'),
(2, 'Caja Morelia Valladolid');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `cuentaclienteview`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `cuentaclienteview`;
CREATE TABLE `cuentaclienteview` (
`id_cliente` int(11)
,`id_cuenta` int(11)
,`id_cliente_cuenta` int(11)
,`nombre` varchar(50)
,`apellido_paterno` varchar(50)
,`apellido_materno` varchar(50)
,`rfc` varchar(20)
,`curp` varchar(30)
,`fecha_alta` datetime
,`nombre_cuenta` varchar(80)
,`saldo_actual` float
,`fecha_contratacion` datetime
,`fecha_ultimo_movimiento` datetime
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cmv_cliente`
--

DROP TABLE IF EXISTS `tbl_cmv_cliente`;
CREATE TABLE `tbl_cmv_cliente` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_paterno` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_materno` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `rfc` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `curp` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_alta` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_cmv_cliente`
--

INSERT INTO `tbl_cmv_cliente` (`id_cliente`, `nombre`, `apellido_paterno`, `apellido_materno`, `rfc`, `curp`, `fecha_alta`) VALUES
(2, 'Test', 'Test 2', 'Test 3', 'TEST23', 'TEST234567', '2021-11-30 18:12:36'),
(4, 'José Juan', 'Esquivel', 'Vallejo', 'EUVJHMNSLN08', 'EUVJ690143LKIO09', '2021-12-01 13:25:33'),
(5, 'José Juan', 'Esquivel', 'Vallejo', 'EGUB8765409N80', 'EUVJ789253PNDHT09', '2021-12-01 13:26:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cmv_cliente_cuenta`
--

DROP TABLE IF EXISTS `tbl_cmv_cliente_cuenta`;
CREATE TABLE `tbl_cmv_cliente_cuenta` (
  `id_cliente_cuenta` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_cuenta` int(11) NOT NULL,
  `saldo_actual` float NOT NULL,
  `fecha_contratacion` datetime NOT NULL,
  `fecha_ultimo_movimiento` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_cmv_cliente_cuenta`
--

INSERT INTO `tbl_cmv_cliente_cuenta` (`id_cliente_cuenta`, `id_cliente`, `id_cuenta`, `saldo_actual`, `fecha_contratacion`, `fecha_ultimo_movimiento`) VALUES
(4, 2, 1, 200, '2021-12-23 00:00:00', '2021-12-01 12:49:26'),
(5, 4, 2, 10000, '2021-12-06 00:00:00', '2021-12-01 13:28:32'),
(7, 4, 1, 12000, '2021-12-13 00:00:00', '2021-12-01 13:29:43');

-- --------------------------------------------------------

--
-- Estructura para la vista `cuentaclienteview`
--
DROP TABLE IF EXISTS `cuentaclienteview`;

DROP VIEW IF EXISTS `cuentaclienteview`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cuentaclienteview`  AS  select `c`.`id_cliente` AS `id_cliente`,`tc`.`id_cuenta` AS `id_cuenta`,`cc`.`id_cliente_cuenta` AS `id_cliente_cuenta`,`c`.`nombre` AS `nombre`,`c`.`apellido_paterno` AS `apellido_paterno`,`c`.`apellido_materno` AS `apellido_materno`,`c`.`rfc` AS `rfc`,`c`.`curp` AS `curp`,`c`.`fecha_alta` AS `fecha_alta`,`tc`.`nombre_cuenta` AS `nombre_cuenta`,`cc`.`saldo_actual` AS `saldo_actual`,`cc`.`fecha_contratacion` AS `fecha_contratacion`,`cc`.`fecha_ultimo_movimiento` AS `fecha_ultimo_movimiento` from ((`tbl_cmv_cliente` `c` join `tbl_cmv_cliente_cuenta` `cc` on(`cc`.`id_cliente` = `c`.`id_cliente`)) join `cat_cmv_tipo_cuenta` `tc` on(`tc`.`id_cuenta` = `cc`.`id_cuenta`)) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cat_cmv_tipo_cuenta`
--
ALTER TABLE `cat_cmv_tipo_cuenta`
  ADD PRIMARY KEY (`id_cuenta`);

--
-- Indices de la tabla `tbl_cmv_cliente`
--
ALTER TABLE `tbl_cmv_cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `tbl_cmv_cliente_cuenta`
--
ALTER TABLE `tbl_cmv_cliente_cuenta`
  ADD PRIMARY KEY (`id_cliente_cuenta`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_cuenta` (`id_cuenta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cat_cmv_tipo_cuenta`
--
ALTER TABLE `cat_cmv_tipo_cuenta`
  MODIFY `id_cuenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbl_cmv_cliente`
--
ALTER TABLE `tbl_cmv_cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tbl_cmv_cliente_cuenta`
--
ALTER TABLE `tbl_cmv_cliente_cuenta`
  MODIFY `id_cliente_cuenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_cmv_cliente_cuenta`
--
ALTER TABLE `tbl_cmv_cliente_cuenta`
  ADD CONSTRAINT `tbl_cmv_cliente_cuenta_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `tbl_cmv_cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_cmv_cliente_cuenta_ibfk_2` FOREIGN KEY (`id_cuenta`) REFERENCES `cat_cmv_tipo_cuenta` (`id_cuenta`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

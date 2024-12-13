-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 09-12-2024 a las 19:01:48
-- Versión del servidor: 8.0.40-0ubuntu0.24.04.1
-- Versión de PHP: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sucursal`

CREATE DATABASE IF NOT EXISTS sucursal;

use sucursal;
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caja`
--

CREATE TABLE IF NOT EXISTS `caja` (
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `apertura` double NOT NULL,
  `actual` double NOT NULL,
  `cierre` double DEFAULT '0',
  `encargado` varchar(50) NOT NULL,
  `Cod_sucursal` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `caja`
--

INSERT INTO `caja` (`fecha`, `apertura`, `actual`, `cierre`, `encargado`, `Cod_sucursal`) VALUES
('2024-07-02 00:18:41', 4343434, 4343434, 0, 'ff', 1),
('2024-07-02 02:23:49', 32222, 32222, 0, 'etgs', 3),
('2024-07-02 03:08:13', 2332, 2332, 0, 'yrkj', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE IF NOT EXISTS `empleados` (
  `id_empleado` int NOT NULL,
  `DNI` varchar(10) NOT NULL,
  `Clave` varchar(15) NOT NULL,
  `Nombre` text NOT NULL,
  `Apellido` text NOT NULL,
  `Telefono` varchar(12) NOT NULL,
  `Direccion` text NOT NULL,
  `Ingreso` date NOT NULL,
  `Fnac` date NOT NULL,
  `Puesto` varchar(30) NOT NULL,
  `Sueldo` varchar(20) NOT NULL,
  `Cod_sucursal` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id_empleado`, `DNI`, `Clave`, `Nombre`, `Apellido`, `Telefono`, `Direccion`, `Ingreso`, `Fnac`, `Puesto`, `Sueldo`, `Cod_sucursal`) VALUES
(1, '2024', '1234', 'ff', 'aaa', '54', 'sdf', '2024-07-01', '2031-12-01', '5', '686', 1),
(3, '123', '123', 'etgs', 'sfe', '567', 'sdrbg', '2024-07-01', '2022-03-05', 'cocina', '32000', 3),
(4, '123', '1234', 'yrkj', 'ftgj', '65756', 'fgjfg', '2024-07-01', '2025-02-02', '745', '768967', 4),
(5, '46121664', '123', 'Kasela', 'Dev', '1512345678', 'su casa', '2024-12-09', '2005-10-09', 'desarrollador', '100000000000', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastos`
--

CREATE TABLE IF NOT EXISTS `gastos` (
  `id_gasto` int NOT NULL,
  `id_caja` datetime NOT NULL,
  `hora` time NOT NULL,
  `descripcion` text NOT NULL,
  `monto` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `gastos`
--

INSERT INTO `gastos` (`id_gasto`, `id_caja`, `hora`, `descripcion`, `monto`) VALUES
(1, '2024-07-01 18:18:41', '18:40:28', '(canceled)papel', 1000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `infosucursal`
--

CREATE TABLE IF NOT EXISTS `infosucursal` (
  `id` int NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `logo` text NOT NULL,
  `bg_color` varchar(7) NOT NULL,
  `header_color` varchar(7) NOT NULL,
  `table_color` varchar(7) NOT NULL,
  `font` varchar(10) NOT NULL,
  `btn` varchar(7) NOT NULL,
  `aside` varchar(7) NOT NULL,
  `aside_btn` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `infosucursal`
--

INSERT INTO `infosucursal` (`id`, `nombre`, `logo`, `bg_color`, `header_color`, `table_color`, `font`, `btn`, `aside`, `aside_btn`) VALUES
(1, 'Burger Express', 's', '#87942e', '#a76c6c', '#422163', '#fffafa', '#150467', '#ba6969', '#f3b939');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesas`
--

CREATE TABLE IF NOT EXISTS `mesas` (
  `cod_mesa` int NOT NULL,
  `Cod_sucursal` int NOT NULL,
  `mesa` int NOT NULL,
  `estado` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `mesas`
--

INSERT INTO `mesas` (`cod_mesa`, `Cod_sucursal`, `mesa`, `estado`) VALUES
(1, 1, 1, 'libre'),
(2, 1, 2, 'libre'),
(3, 2, 1, 'libre'),
(4, 2, 2, 'libre'),
(5, 2, 3, 'libre'),
(6, 2, 4, 'libre'),
(7, 3, 1, 'libre'),
(8, 3, 2, 'libre'),
(9, 3, 3, 'libre'),
(10, 3, 4, 'libre'),
(11, 3, 5, 'libre'),
(12, 3, 6, 'libre'),
(13, 3, 7, 'libre'),
(14, 3, 8, 'libre'),
(15, 3, 9, 'libre'),
(16, 3, 10, 'libre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE IF NOT EXISTS `pedido` (
  `Cod_pedido` int NOT NULL,
  `idPedido` int NOT NULL,
  `producto` varchar(40) NOT NULL,
  `cantidad` varchar(5) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `cliente` varchar(30) NOT NULL,
  `mesa` varchar(30) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `Cod_sucursal` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`Cod_pedido`, `idPedido`, `producto`, `cantidad`, `fecha`, `hora`, `cliente`, `mesa`, `estado`, `Cod_sucursal`) VALUES
(1, 1, 'Hamburguesa doble', '1', '2024-12-09', '04:07:56', 'jose', '1', 'finalizado', 1),
(2, 1, 'Hamburguesa Simple', '2', '2024-12-09', '04:08:08', 'jose', '1', 'finalizado', 1),
(3, 1, 'Papas con Baicon', '1', '2024-12-09', '04:08:12', 'jose', '1', 'finalizado', 1),
(4, 1, 'Helado Combinado', '1', '2024-12-09', '04:08:14', 'jose', '1', 'finalizado', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `Id_producto` varchar(30) NOT NULL,
  `Nombre` varchar(40) NOT NULL,
  `Descripcion` text NOT NULL,
  `Costo` int NOT NULL,
  `ingredientes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`Id_producto`, `Nombre`, `Descripcion`, `Costo`, `ingredientes`) VALUES
('1', 'Papas fritas', 'medianas', 1500, 'cono de papas'),
('2', 'Hamburguesa Simple', 'con cheddar y ketchup', 2000, 'medallon de carne'),
('3', 'Hamburguesa doble', 'doble carne, cheddar y ketchup', 500, 'medallon de carne,medallon de carne'),
('4', 'Helado vainilla', 'Sabor vainilla', 1500, 'conos de helado'),
('5', 'Helado Chocolate', 'sabor chocolate', 1500, 'conos de helado'),
('6', 'Helado Combinado', 'sabor Vainilla y Chocolate', 2000, 'conos de helado'),
('7', 'Papas con Baicon', 'papas fritas con bacon', 2500, 'cono de papas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promociones`
--

CREATE TABLE IF NOT EXISTS `promociones` (
  `id_promo` int NOT NULL,
  `nombre` text NOT NULL,
  `productos` text NOT NULL,
  `descuento` int NOT NULL,
  `fechaDuracion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `promociones`
--

INSERT INTO `promociones` (`id_promo`, `nombre`, `productos`, `descuento`, `fechaDuracion`) VALUES
(1, 'Combo fin de mes', '[\"1\",\"2\"]', 20, '2024-07-06'),
(2, 'Combo', '[\"1\",\"2\"]', 20, '2024-07-02'),
(3, 'comboSEX', '[\"5\"]', 35, '2024-12-09'),
(4, 'w', '[\"2\"]', 2, '2024-12-09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
  `Cod_producto` varchar(20) NOT NULL,
  `Nombre` text NOT NULL,
  `Cantidad` varchar(10) NOT NULL,
  `Cod_sucursal` int NOT NULL,
  `unidad_medicion` text NOT NULL,
  `aviso` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `stock`
--

INSERT INTO `stock` (`Cod_producto`, `Nombre`, `Cantidad`, `Cod_sucursal`, `unidad_medicion`, `aviso`) VALUES
('1', 'Papas fritas', '183', 1, 'unidades', 150),
('1', 'Papas fritas', '432', 3, 'unidades', 150),
('1', 'Papas fritas', '--', 4, 'unidades', 150),
('10', 'Papas con Baicon', '104', 1, 'cajas', 2),
('10', 'Papas con Baicon', '5', 3, 'cajas', 2),
('10', 'Papas con Baicon', '--', 4, 'cajas', 2),
('11', 'Hamburguesa Simple', '102', 1, 'cajas', 2),
('11', 'Hamburguesa Simple', '5', 3, 'cajas', 2),
('11', 'Hamburguesa Simple', '--', 4, 'cajas', 2),
('12', 'Hamburguesa doble', '353', 1, 'cajas', 2),
('12', 'Hamburguesa doble', '7', 3, 'cajas', 2),
('12', 'Hamburguesa doble', '--', 4, 'cajas', 2),
('2', 'medallon de carne', '184', 1, 'unidades', 200),
('2', 'medallon de carne', '233', 3, 'unidades', 200),
('2', 'medallon de carne', '--', 4, 'unidades', 200),
('3', 'conos de helado', '214', 1, 'unidades', 100),
('3', 'conos de helado', '333', 3, 'unidades', 100),
('3', 'conos de helado', '--', 4, 'unidades', 100),
('4', 'papas', '54', 1, 'kilos', 10),
('4', 'papas', '34', 3, 'kilos', 10),
('4', 'papas', '--', 4, 'kilos', 10),
('5', 'Tomate', '76', 1, 'Kilos', 10),
('5', 'Tomate', '12', 3, 'Kilos', 10),
('5', 'Tomate', '--', 4, 'Kilos', 10),
('6', 'Helado Chocolate', '667', 1, 'Kilos', 10),
('6', 'Helado Chocolate', '23', 3, 'Kilos', 10),
('6', 'Helado Chocolate', '--', 4, 'Kilos', 10),
('7', 'Helado vainilla', '45', 1, 'Kilos', 10),
('7', 'Helado vainilla', '43', 3, 'Kilos', 10),
('7', 'Helado vainilla', '--', 4, 'Kilos', 10),
('8', 'Bacon', '62', 1, 'Kilos', 10),
('8', 'Bacon', '12', 3, 'Kilos', 10),
('8', 'Bacon', '--', 4, 'Kilos', 10),
('9', 'Helado Combinado', '34', 1, 'cajas', 2),
('9', 'Helado Combinado', '5', 3, 'cajas', 2),
('9', 'Helado Combinado', '--', 4, 'cajas', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursales`
--

CREATE TABLE IF NOT EXISTS `sucursales` (
  `Cod_sucursal` int NOT NULL,
  `Direccion` varchar(40) NOT NULL,
  `Capacidad` int NOT NULL,
  `Cod_supervisor` varchar(28) NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `sucursales`
--

INSERT INTO `sucursales` (`Cod_sucursal`, `Direccion`, `Capacidad`, `Cod_supervisor`, `Fecha`) VALUES
(1, 'Nigeria 9023(Wilson)', 2, '1', '2024-07-01'),
(3, 'bogota 3310(Jose C. Paz)', 10, '1', '2024-07-01'),
(4, 'Quiros 5324(Jose C Paz)', 0, '1', '2024-07-01'),
(5, 'Miami', 2, '1', '2024-12-09');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `caja`
--
ALTER TABLE `caja`
  ADD PRIMARY KEY (`fecha`),
  ADD KEY `Cod_sucursal` (`Cod_sucursal`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_empleado`);

--
-- Indices de la tabla `gastos`
--
ALTER TABLE `gastos`
  ADD PRIMARY KEY (`id_gasto`);

--
-- Indices de la tabla `infosucursal`
--
ALTER TABLE `infosucursal`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mesas`
--
ALTER TABLE `mesas`
  ADD PRIMARY KEY (`cod_mesa`),
  ADD KEY `Cod_sucursal_idx` (`Cod_sucursal`);

--
-- Indices de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  ADD PRIMARY KEY (`Cod_sucursal`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_empleado` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `gastos`
--
ALTER TABLE `gastos`
  MODIFY `id_gasto` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `infosucursal`
--
ALTER TABLE `infosucursal`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `mesas`
--
ALTER TABLE `mesas`
  MODIFY `cod_mesa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  MODIFY `Cod_sucursal` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

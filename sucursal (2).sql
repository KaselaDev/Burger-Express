-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-06-2024 a las 22:34:27
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sucursal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caja`
--

CREATE TABLE `caja` (
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `apertura` double NOT NULL,
  `actual` double NOT NULL,
  `cierre` double DEFAULT 0,
  `encargado` varchar(50) NOT NULL,
  `Cod_sucursal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id_empleado` int(11) NOT NULL,
  `DNI` varchar(10) NOT NULL,
  `Clave` varchar(15) NOT NULL,
  `Nombre` text NOT NULL,
  `Apellido` text NOT NULL,
  `Telefono` varchar(12) NOT NULL,
  `Direccion` text NOT NULL,
  `Ingreso` date NOT NULL,
  `Fnac` varchar(15) NOT NULL,
  `Puesto` varchar(30) NOT NULL,
  `Sueldo` varchar(20) NOT NULL,
  `Cod_sucursal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id_empleado`, `DNI`, `Clave`, `Nombre`, `Apellido`, `Telefono`, `Direccion`, `Ingreso`, `Fnac`, `Puesto`, `Sueldo`, `Cod_sucursal`) VALUES
(1, '56654', '123', 'tiziano', 'gomez', '122324', 'trrfhcn', '2024-06-03', '2023-09-04', 'cocina', '32222', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastos`
--

CREATE TABLE `gastos` (
  `id_caja` datetime NOT NULL,
  `hora` time NOT NULL,
  `descripcion` text NOT NULL,
  `monto` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesas`
--

CREATE TABLE `mesas` (
  `cod_mesa` int(20) NOT NULL,
  `Cod_sucursal` int(20) NOT NULL,
  `mesa` int(20) NOT NULL,
  `estado` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `Cod_pedido` int(11) NOT NULL,
  `idPedido` int(8) NOT NULL,
  `producto` varchar(40) NOT NULL,
  `cantidad` varchar(5) NOT NULL,
  `fecha` date NOT NULL,
  `cliente` varchar(30) NOT NULL,
  `mesa` varchar(30) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `Cod_sucursal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `Id_producto` varchar(30) NOT NULL,
  `Nombre` varchar(40) NOT NULL,
  `Descripcion` text NOT NULL,
  `Costo` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`Id_producto`, `Nombre`, `Descripcion`, `Costo`) VALUES
('1', 'Papasfritas', 'medianas', 1500),
('2', 'Hamburguesa Simple', 'con cheddar y ketchup', 2000),
('3', 'Hamburguesa doble', 'doble carne, cheddar y ketchup', 500),
('4', 'Helado vainilla', 'Sabor vainilla', 1500),
('5', 'Helado Chocolate', 'sabor chocolate', 1500),
('6', 'Helado Combinado', 'sabor Vainilla y Chocolate', 2000),
('7', 'Papas con Baicon', 'papas fritas con bacon', 2500);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock`
--

CREATE TABLE `stock` (
  `Cod_producto` varchar(20) NOT NULL,
  `Nombre` text NOT NULL,
  `Cantidad` varchar(10) NOT NULL,
  `codColor` varchar(6) NOT NULL,
  `Cod_sucursal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursales`
--

CREATE TABLE `sucursales` (
  `Cod_sucursal` int(11) NOT NULL,
  `Direccion` varchar(40) NOT NULL,
  `Capacidad` int(10) NOT NULL,
  `Cod_supervisor` varchar(28) NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sucursales`
--

INSERT INTO `sucursales` (`Cod_sucursal`, `Direccion`, `Capacidad`, `Cod_supervisor`, `Fecha`) VALUES
(1, 'Bogota 3310(Quilmes)', 123, 'hola', '2012-12-23');

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
  ADD PRIMARY KEY (`id_empleado`),
  ADD KEY `Cod_sucursal` (`Cod_sucursal`);

--
-- Indices de la tabla `gastos`
--
ALTER TABLE `gastos`
  ADD PRIMARY KEY (`hora`),
  ADD KEY `id_caja` (`id_caja`);

--
-- Indices de la tabla `mesas`
--
ALTER TABLE `mesas`
  ADD PRIMARY KEY (`cod_mesa`),
  ADD KEY `Cod_sucursal` (`Cod_sucursal`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`Cod_pedido`),
  ADD KEY `Cod_sucursal` (`Cod_sucursal`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`Id_producto`);

--
-- Indices de la tabla `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`Cod_producto`),
  ADD KEY `Cod_sucursal` (`Cod_sucursal`);

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
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `Cod_pedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  MODIFY `Cod_sucursal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `sucursal` FOREIGN KEY (`Cod_sucursal`) REFERENCES `sucursales` (`Cod_sucursal`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `gastos`
--
ALTER TABLE `gastos`
  ADD CONSTRAINT `caja` FOREIGN KEY (`id_caja`) REFERENCES `caja` (`fecha`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `mesas`
--
ALTER TABLE `mesas`
  ADD CONSTRAINT `mesas` FOREIGN KEY (`Cod_sucursal`) REFERENCES `sucursales` (`Cod_sucursal`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`Cod_sucursal`) REFERENCES `sucursales` (`Cod_sucursal`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`Cod_sucursal`) REFERENCES `sucursales` (`Cod_sucursal`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

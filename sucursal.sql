-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-05-2024 a las 02:00:35
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

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
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `DNI` varchar(10) NOT NULL,
  `Nombre` text NOT NULL,
  `Apellido` text NOT NULL,
  `Telefono` varchar(12) NOT NULL,
  `Direccion` text NOT NULL,
  `Ingreso` date NOT NULL,
  `Fnac` varchar(15) NOT NULL,
  `Turno` varchar(30) NOT NULL,
  `Puesto` varchar(30) NOT NULL,
  `Sueldo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `cliente` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`Cod_pedido`, `idPedido`, `producto`, `cantidad`, `fecha`, `cliente`) VALUES
(1, 1, 'big mc ', '1', '2024-05-13', 'Negro'),
(2, 1, 'pancho', '3', '2024-05-13', 'Negro'),
(3, 1, 'coca-cola', '2', '2024-05-13', 'Negro'),
(4, 1, 'helado', '1', '2024-05-13', 'Negro'),
(5, 2, 'cuarto libra', '1', '2024-05-13', 'Kasela'),
(6, 2, 'fanta', '1', '2024-05-13', 'Kasela'),
(7, 2, 'helado', '2', '2024-05-13', 'Kasela'),
(8, 3, 'pancho', '5', '2024-05-13', 'Negro'),
(9, 4, 'doble mc', '2', '2024-05-13', 'Michi'),
(10, 4, 'coca-cola', '2', '2024-05-13', 'Michi'),
(11, 5, 'helado', '1', '2024-05-13', 'Galasso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `Id_producto` varchar(30) NOT NULL,
  `Nombre` varchar(40) NOT NULL,
  `Descripcion` text NOT NULL,
  `Costo` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock`
--

CREATE TABLE `stock` (
  `Cod_producto` varchar(20) NOT NULL,
  `Nombre` text NOT NULL,
  `Cantidad` varchar(10) NOT NULL,
  `codColor` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `stock`
--

INSERT INTO `stock` (`Cod_producto`, `Nombre`, `Cantidad`, `codColor`) VALUES
('100', 'Paty', '120', '240f00'),
('101', 'Pan', '150', 'ffe6ad'),
('102', 'Cheddar', '250', 'ffb300'),
('103', 'Lechuga', '350', '007d0a'),
('104', 'Tomate', '125', 'd50000'),
('105', 'Bacon', '80', '6b1200'),
('106', 'Cebolla', '190', 'ffdfd5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursales`
--

CREATE TABLE `sucursales` (
  `Cod_sucursal` varchar(20) NOT NULL,
  `Direccion` varchar(40) NOT NULL,
  `Capacidad` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`DNI`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`Cod_pedido`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`Id_producto`);

--
-- Indices de la tabla `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`Cod_producto`);

--
-- Indices de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  ADD PRIMARY KEY (`Cod_sucursal`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `Cod_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

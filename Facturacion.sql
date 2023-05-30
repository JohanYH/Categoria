-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 26-05-2023 a las 10:58:35
-- Versión del servidor: 8.0.33-0ubuntu0.22.04.2
-- Versión de PHP: 8.1.2-1ubuntu2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `Facturacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Categoria`
--

CREATE TABLE `Categoria` (
  `Categoria_Id` int NOT NULL,
  `Categoria_Nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Descripcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Imagen` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `Categoria`
--

INSERT INTO `Categoria` (`Categoria_Id`, `Categoria_Nombre`, `Descripcion`, `Imagen`) VALUES
(1, 'VideoJuegos', 'es una aplicación interactiva orientada al entretenimiento que, a través de ciertos mandos o controles', 0x766964656f6a7565676f732e6a7067),
(2, 'Dulces', 'Que es como el del azúcar, la miel o ciertas frutas maduras.', 0x64756c6365732e6a7067),
(7, 'VideoJuegos', 'Para Jugar', 0x766964656f6a7565676f732e6a7067),
(8, 'asas', 'asas', 0x616e696d652e6a7067),
(9, 'Zapatos', 'xsadas', 0x7a617061746f732e6a7067);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Clientes`
--

CREATE TABLE `Clientes` (
  `Cliente_Id` int NOT NULL,
  `Celular` varchar(100) NOT NULL,
  `Compañia` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Empleado`
--

CREATE TABLE `Empleado` (
  `Empleado_Id` int NOT NULL,
  `Empleado_Nombre` varchar(100) NOT NULL,
  `Celular` varchar(100) NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `Imagen` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturaDetalle`
--

CREATE TABLE `facturaDetalle` (
  `Facturas_Id` int NOT NULL,
  `Productos_Id` int NOT NULL,
  `Cantidad` varchar(100) NOT NULL,
  `PrecioVenta` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Facturas`
--

CREATE TABLE `Facturas` (
  `Facturas_Id` int NOT NULL,
  `Empleado_Id` int DEFAULT NULL,
  `Cliente_Id` int DEFAULT NULL,
  `Fecha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Productos`
--

CREATE TABLE `Productos` (
  `Productos_Id` int NOT NULL,
  `Categoria_Id` int DEFAULT NULL,
  `Precio_Unitario` varchar(100) NOT NULL,
  `Stock` varchar(100) NOT NULL,
  `UnidadesPedidas` varchar(100) NOT NULL,
  `Proveedor_Id` int DEFAULT NULL,
  `Productos_Nombre` varchar(100) NOT NULL,
  `Descontinuado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Proveedor`
--

CREATE TABLE `Proveedor` (
  `Proveedor_Id` int NOT NULL,
  `Proveedor_Nombre` varchar(100) NOT NULL,
  `Telefono` varchar(100) NOT NULL,
  `Ciudad` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Categoria`
--
ALTER TABLE `Categoria`
  ADD PRIMARY KEY (`Categoria_Id`);

--
-- Indices de la tabla `Clientes`
--
ALTER TABLE `Clientes`
  ADD PRIMARY KEY (`Cliente_Id`);

--
-- Indices de la tabla `Empleado`
--
ALTER TABLE `Empleado`
  ADD PRIMARY KEY (`Empleado_Id`);

--
-- Indices de la tabla `facturaDetalle`
--
ALTER TABLE `facturaDetalle`
  ADD PRIMARY KEY (`Facturas_Id`,`Productos_Id`),
  ADD KEY `Productos_Id` (`Productos_Id`);

--
-- Indices de la tabla `Facturas`
--
ALTER TABLE `Facturas`
  ADD PRIMARY KEY (`Facturas_Id`),
  ADD KEY `Empleado_Id` (`Empleado_Id`),
  ADD KEY `Cliente_Id` (`Cliente_Id`);

--
-- Indices de la tabla `Productos`
--
ALTER TABLE `Productos`
  ADD PRIMARY KEY (`Productos_Id`),
  ADD KEY `Categoria_Id` (`Categoria_Id`),
  ADD KEY `Proveedor_Id` (`Proveedor_Id`);

--
-- Indices de la tabla `Proveedor`
--
ALTER TABLE `Proveedor`
  ADD PRIMARY KEY (`Proveedor_Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Categoria`
--
ALTER TABLE `Categoria`
  MODIFY `Categoria_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `Clientes`
--
ALTER TABLE `Clientes`
  MODIFY `Cliente_Id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Empleado`
--
ALTER TABLE `Empleado`
  MODIFY `Empleado_Id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Facturas`
--
ALTER TABLE `Facturas`
  MODIFY `Facturas_Id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Productos`
--
ALTER TABLE `Productos`
  MODIFY `Productos_Id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Proveedor`
--
ALTER TABLE `Proveedor`
  MODIFY `Proveedor_Id` int NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `facturaDetalle`
--
ALTER TABLE `facturaDetalle`
  ADD CONSTRAINT `facturaDetalle_ibfk_1` FOREIGN KEY (`Facturas_Id`) REFERENCES `Facturas` (`Facturas_Id`),
  ADD CONSTRAINT `facturaDetalle_ibfk_2` FOREIGN KEY (`Productos_Id`) REFERENCES `Productos` (`Productos_Id`);

--
-- Filtros para la tabla `Facturas`
--
ALTER TABLE `Facturas`
  ADD CONSTRAINT `Facturas_ibfk_1` FOREIGN KEY (`Empleado_Id`) REFERENCES `Empleado` (`Empleado_Id`),
  ADD CONSTRAINT `Facturas_ibfk_2` FOREIGN KEY (`Cliente_Id`) REFERENCES `Clientes` (`Cliente_Id`);

--
-- Filtros para la tabla `Productos`
--
ALTER TABLE `Productos`
  ADD CONSTRAINT `Productos_ibfk_1` FOREIGN KEY (`Categoria_Id`) REFERENCES `Categoria` (`Categoria_Id`),
  ADD CONSTRAINT `Productos_ibfk_2` FOREIGN KEY (`Proveedor_Id`) REFERENCES `Proveedor` (`Proveedor_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

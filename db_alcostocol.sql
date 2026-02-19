-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-02-2026 a las 02:32:06
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_alcostocol`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre`, `descripcion`, `estado`) VALUES
(1, 'Panes', 'Panes o producción propia', 1),
(2, 'Bebidas', 'Reventa/Bebidas', 1),
(3, 'Insumos Panaderia', 'Son los ingredientes necesarios para la creaciones los productos de la panadería', 1),
(4, 'Bolsas, Vasos y Papel', 'aja', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `cedula_cliente` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `nombres_apellidos_cliente` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono_cliente` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `correo_cliente` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `estado_cliente` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `cedula_cliente`, `nombres_apellidos_cliente`, `telefono_cliente`, `correo_cliente`, `estado_cliente`) VALUES
(1, '1001', 'carlos pacheco', '311', 'mscalos', 1),
(2, '1002', 'juan peres', '315', 'mscalos6', 1),
(3, '1003', 'Carlos Pache soci', '31321', 'asdfsdf', 1),
(4, '123', 'Carlos Pache datos', '12321', 'asdad', 1),
(5, '1005', 'asdasa', '1231231', 'asdasdasdad', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_ingreso`
--

CREATE TABLE `detalle_ingreso` (
  `id_detalle_ingreso` int(11) NOT NULL,
  `id_ingreso` int(11) NOT NULL,
  `producto_ingresado` int(11) NOT NULL,
  `cantidad_ingresada` int(11) NOT NULL,
  `precio_ingreso` double NOT NULL,
  `estado_detalle_ingreso` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `detalle_ingreso`
--

INSERT INTO `detalle_ingreso` (`id_detalle_ingreso`, `id_ingreso`, `producto_ingresado`, `cantidad_ingresada`, `precio_ingreso`, `estado_detalle_ingreso`) VALUES
(15, 12, 1, 100, 5000, 1),
(16, 12, 2, 200, 5500, 1),
(17, 13, 1, 100, 5000, 1),
(18, 13, 2, 200, 3000, 1),
(19, 20, 3, 1, 0, 1),
(20, 21, 3, 19, 0, 1),
(21, 21, 4, 15, 0, 1),
(22, 21, 5, 100, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_ingreso_panes`
--

CREATE TABLE `detalle_ingreso_panes` (
  `id_detalle_ingreso_panes` int(11) NOT NULL,
  `id_ingreso` int(11) NOT NULL,
  `producto_ingresado` int(11) NOT NULL,
  `cantidad_ingresada` int(11) NOT NULL,
  `estado_detalle_ingreso` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_ingreso_panes`
--

INSERT INTO `detalle_ingreso_panes` (`id_detalle_ingreso_panes`, `id_ingreso`, `producto_ingresado`, `cantidad_ingresada`, `estado_detalle_ingreso`) VALUES
(1, 22, 10, 100, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_ventas`
--

CREATE TABLE `detalle_ventas` (
  `id_detalle_ventas` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `producto_vendido` int(11) NOT NULL,
  `cantidad_vendida` int(11) NOT NULL,
  `precio_venta` double NOT NULL,
  `estado_detalle_venta` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresos`
--

CREATE TABLE `ingresos` (
  `id_ingreso` int(11) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `proveedor` int(11) NOT NULL,
  `estado_ingreso` tinyint(1) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `ingresos`
--

INSERT INTO `ingresos` (`id_ingreso`, `fecha_ingreso`, `proveedor`, `estado_ingreso`, `id_usuario`) VALUES
(12, '2025-02-25', 1, 1, 0),
(13, '2025-02-26', 1, 1, 0),
(14, '2026-02-19', 1, 1, 1),
(15, '2026-02-19', 1, 1, 1),
(16, '2026-02-19', 1, 1, 1),
(17, '2026-02-19', 1, 1, 1),
(18, '2026-02-19', 1, 1, 1),
(19, '2026-02-19', 1, 1, 1),
(20, '2026-02-19', 1, 1, 1),
(21, '2026-02-19', 1, 1, 1),
(22, '2026-02-19', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `nombre_producto` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `existencia_producto` double NOT NULL,
  `estado_producto` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `categoria_id`, `nombre_producto`, `existencia_producto`, `estado_producto`) VALUES
(1, 1, 'Pan leche', 200, 1),
(2, 1, 'Pan de 1000', 400, 1),
(3, 1, 'Pan de 2000', 20, 1),
(4, 1, 'Pan de 5000', 15, 1),
(5, 1, 'Pan Agridulce', 100, 1),
(6, 1, 'Pan Cascara', 0, 1),
(7, 1, 'Pan Croasant', 0, 1),
(8, 1, 'Pan Hawaiano', 0, 1),
(9, 1, 'Pastelitos', 0, 1),
(10, 1, 'Galletas', 100, 1),
(11, 2, 'Coca-Cola Personal', 12, 1),
(12, 2, 'Quatro Personal', 12, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_proveedor` int(11) NOT NULL,
  `nit_proveedor` int(11) NOT NULL,
  `nombre_proveedor` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono_proveedor` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `correo_proveedor` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `estado_proveedor` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedor`, `nit_proveedor`, `nombre_proveedor`, `telefono_proveedor`, `correo_proveedor`, `estado_proveedor`) VALUES
(1, 1, 'Productos Propios', '1234', 'rey@rey.com', 1),
(2, 2, 'Postobon', '1234', 'aja@gmail.com', 1),
(3, 3, 'Coca-Cola', '1234', 'aja@gmail.com', 1),
(4, 4, 'Insumos de Panaderia', '123', 'aja@gmail.com', 1),
(5, 5, 'Big Cola', '1234', 'aja@gmail.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `contrasena` varchar(50) NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `contrasena`, `estado`) VALUES
(1, 'Administrador', 'Admin', 1),
(2, 'Yolber ', '1234', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_ventas` int(11) NOT NULL,
  `fecha_venta` date NOT NULL,
  `cliente` int(11) NOT NULL,
  `estado_venta` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_ventas`, `fecha_venta`, `cliente`, `estado_venta`) VALUES
(1, '2025-02-20', 4, 1),
(2, '2025-02-22', 5, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `detalle_ingreso`
--
ALTER TABLE `detalle_ingreso`
  ADD PRIMARY KEY (`id_detalle_ingreso`),
  ADD KEY `id_ingreso` (`id_ingreso`),
  ADD KEY `producto_ingresado` (`producto_ingresado`);

--
-- Indices de la tabla `detalle_ingreso_panes`
--
ALTER TABLE `detalle_ingreso_panes`
  ADD PRIMARY KEY (`id_detalle_ingreso_panes`),
  ADD KEY `1` (`id_ingreso`),
  ADD KEY `2` (`producto_ingresado`);

--
-- Indices de la tabla `detalle_ventas`
--
ALTER TABLE `detalle_ventas`
  ADD PRIMARY KEY (`id_detalle_ventas`),
  ADD KEY `id_venta` (`id_venta`),
  ADD KEY `producto_vendido` (`producto_vendido`);

--
-- Indices de la tabla `ingresos`
--
ALTER TABLE `ingresos`
  ADD PRIMARY KEY (`id_ingreso`),
  ADD KEY `proveedor` (`proveedor`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `fk_producto_categoria` (`categoria_id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_ventas`),
  ADD KEY `cliente` (`cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `detalle_ingreso`
--
ALTER TABLE `detalle_ingreso`
  MODIFY `id_detalle_ingreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `detalle_ingreso_panes`
--
ALTER TABLE `detalle_ingreso_panes`
  MODIFY `id_detalle_ingreso_panes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `detalle_ventas`
--
ALTER TABLE `detalle_ventas`
  MODIFY `id_detalle_ventas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ingresos`
--
ALTER TABLE `ingresos`
  MODIFY `id_ingreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_ventas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_ingreso`
--
ALTER TABLE `detalle_ingreso`
  ADD CONSTRAINT `detalle_ingreso_ibfk_1` FOREIGN KEY (`id_ingreso`) REFERENCES `ingresos` (`id_ingreso`),
  ADD CONSTRAINT `detalle_ingreso_ibfk_2` FOREIGN KEY (`producto_ingresado`) REFERENCES `productos` (`id_producto`);

--
-- Filtros para la tabla `detalle_ingreso_panes`
--
ALTER TABLE `detalle_ingreso_panes`
  ADD CONSTRAINT `1` FOREIGN KEY (`id_ingreso`) REFERENCES `ingresos` (`id_ingreso`),
  ADD CONSTRAINT `2` FOREIGN KEY (`producto_ingresado`) REFERENCES `productos` (`id_producto`);

--
-- Filtros para la tabla `detalle_ventas`
--
ALTER TABLE `detalle_ventas`
  ADD CONSTRAINT `detalle_ventas_ibfk_1` FOREIGN KEY (`producto_vendido`) REFERENCES `productos` (`id_producto`),
  ADD CONSTRAINT `detalle_ventas_ibfk_2` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id_ventas`);

--
-- Filtros para la tabla `ingresos`
--
ALTER TABLE `ingresos`
  ADD CONSTRAINT `ingresos_ibfk_1` FOREIGN KEY (`proveedor`) REFERENCES `proveedores` (`id_proveedor`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_producto_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id_categoria`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`cliente`) REFERENCES `clientes` (`id_cliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

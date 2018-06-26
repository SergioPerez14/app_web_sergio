-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-06-2018 a las 11:56:42
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `id_tienda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre`, `descripcion`, `fecha`, `id_tienda`) VALUES
(1, 'Botanas', 'Deliciosas frituras para fiestas', '2018-06-05', 2),
(2, 'Bebidas', 'Refrescantes lÃ­quidos', '2018-06-05', 2),
(4, 'Abarrotes', 'De Todo', '2018-06-08', 3),
(6, 'Higiene', 'Articulos de limpieza', '2018-06-10', 0),
(7, 'Higiene', 'ArtÃ­culos de Limpieza', '2018-06-18', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `id_historial` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `nota` varchar(255) NOT NULL,
  `referencia` varchar(100) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `id_tienda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`id_historial`, `id_producto`, `user_id`, `fecha`, `nota`, `referencia`, `cantidad`, `id_tienda`) VALUES
(1, 2, 1, '2018-06-05', 'Se agregaron 2', 'Sergio Perez', 2, 2),
(2, 2, 2, '2018-06-06', 'Se agregaron 2', 'Sergio Perez', 2, 2),
(5, 3, 1, '2018-06-05', 'Se retiraron 10 unidades', 'Sergio Perez', 10, 3),
(6, 3, 3, '2018-06-06', 'Se retiraron 4 unidades', 'Sergio Perez 23', 4, 3),
(7, 3, 2, '2018-06-06', 'Se retiraron 6 unidades', 'Sergio Perez', 6, 3),
(8, 3, 1, '2018-06-06', 'Se agregaron 20', 'Sergio Perez', 20, 3),
(9, 3, 1, '2018-06-08', 'Se agregaron 3', 'Sergio Perez', 3, 3),
(10, 3, 1, '2018-06-08', 'Se retiraron 3 unidades', 'Sergio Perez', 3, 3),
(15, 5, 2, '2018-06-18', 'Se retiraron 4 unidades', 'Sergio Perez', 4, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `codigo_producto` varchar(20) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `preciounitario` double NOT NULL,
  `stock` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_tienda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `codigo_producto`, `nombre`, `fecha`, `preciounitario`, `stock`, `id_categoria`, `id_tienda`) VALUES
(1, 'GAM01', 'Galletas Vainilla', '2018-06-04', 10, 25, 1, 2),
(2, 'GAM02', 'Galletas Chocolate', '2018-06-04', 6, 20, 2, 2),
(3, 'GAM03', 'Galletas Fresa', '2018-06-05', 12, 20, 2, 3),
(5, 'ESP03', 'Jugo', '2018-06-18', 10, 1, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_vendidos`
--

CREATE TABLE `productos_vendidos` (
  `id_producto_vendido` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `id_tienda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos_vendidos`
--

INSERT INTO `productos_vendidos` (`id_producto_vendido`, `id_producto`, `cantidad`, `total`, `id_venta`, `id_tienda`) VALUES
(1, 1, 2, 20, 1, 2),
(5, 2, 3, 18, 23, 2),
(6, 3, 5, 60, 24, 3),
(7, 1, 8, 80, 25, 2),
(8, 2, 9, 54, 26, 2),
(9, 3, 5, 60, 27, 3),
(11, 1, 80, 800, 29, 2),
(13, 1, 1, 10, 31, 2),
(14, 1, 3, 30, 32, 2),
(15, 1, 3, 30, 33, 2),
(16, 1, 4, 40, 34, 2),
(17, 1, 9, 90, 35, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiendas`
--

CREATE TABLE `tiendas` (
  `id_tienda` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tiendas`
--

INSERT INTO `tiendas` (`id_tienda`, `nombre`, `direccion`, `status`) VALUES
(1, 'ROOT', 'Default', 0),
(2, 'Walmart', 'Adelitas', 1),
(3, 'Sam\'s', 'Adelitas', 0),
(4, 'Waldo\'s', 'Centro', 0),
(5, 'Coppel', 'Adelitas', 0),
(6, 'Liverpool', 'Lejos', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(64) NOT NULL,
  `fecha` date NOT NULL,
  `id_tienda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `username`, `password`, `email`, `fecha`, `id_tienda`) VALUES
(1, 'Sergio', 'Perez', 'admin', 'admin', '1530073@upv.edu.mx', '2018-05-10', 1),
(2, 'Allegoric', 'Cheese', 'user', 'user', 'sergio@mail.com', '2018-06-05', 2),
(3, 'Luis', 'Perez', '1530073', 'sergio', 'delta@delta.com', '2018-06-03', 3),
(5, 'Lorena', 'Perez', '1530370', '123', 'delta@delta.com', '2018-06-10', 1),
(6, 'Luis', 'Sanchez', 'LS', '12', 'superadmin@mail.com', '2018-06-18', 2),
(7, 'Sergio2', 'Perez', 'user', 'sergio', 'sergio@mail.com', '2018-06-18', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `total` int(11) NOT NULL,
  `id_tienda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_venta`, `fecha`, `total`, `id_tienda`) VALUES
(1, '2018-06-11', 20, 2),
(23, '2018-06-15', 18, 2),
(24, '2018-06-15', 60, 3),
(25, '2018-06-28', 80, 2),
(26, '2018-06-15', 54, 2),
(27, '2018-06-18', 60, 3),
(28, '2018-06-18', 30, 3),
(29, '2018-06-08', 800, 2),
(31, '2018-06-18', 10, 2),
(32, '2018-06-18', 30, 2),
(33, '2018-06-18', 30, 2),
(34, '2018-06-18', 40, 2),
(35, '2018-06-20', 90, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`id_historial`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `productos_vendidos`
--
ALTER TABLE `productos_vendidos`
  ADD PRIMARY KEY (`id_producto_vendido`),
  ADD KEY `productos_vendidos_ibfk_2` (`id_venta`),
  ADD KEY `productos_vendidos_ibfk_1` (`id_producto`);

--
-- Indices de la tabla `tiendas`
--
ALTER TABLE `tiendas`
  ADD PRIMARY KEY (`id_tienda`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_venta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id_historial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `productos_vendidos`
--
ALTER TABLE `productos_vendidos`
  MODIFY `id_producto_vendido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `tiendas`
--
ALTER TABLE `tiendas`
  MODIFY `id_tienda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `historial_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `historial_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `productos_vendidos`
--
ALTER TABLE `productos_vendidos`
  ADD CONSTRAINT `productos_vendidos_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON DELETE CASCADE,
  ADD CONSTRAINT `productos_vendidos_ibfk_2` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id_venta`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-06-2018 a las 08:13:55
-- Versión del servidor: 10.1.33-MariaDB
-- Versión de PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema5`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnas`
--

CREATE TABLE `alumnas` (
  `id_alumna` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `id_grupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumnas`
--

INSERT INTO `alumnas` (`id_alumna`, `nombre`, `apellido`, `id_grupo`) VALUES
(3, 'Lorena', 'Perez', 1),
(8, 'Lorena', 'Sanchez', 10),
(11, 'Lorena', 'Perez2', 1),
(12, 'Mariana', 'Sanchez', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE `grupos` (
  `id_grupo` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`id_grupo`, `nombre`) VALUES
(1, 'Linces'),
(9, 'A43'),
(10, 'A40'),
(11, 'A203');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id_pago` int(11) NOT NULL,
  `id_grupo` int(11) NOT NULL,
  `id_alumna` int(11) NOT NULL,
  `M_nombre` varchar(20) NOT NULL,
  `M_apellido` varchar(20) NOT NULL,
  `comprobante` varchar(50) DEFAULT NULL,
  `folio` int(11) NOT NULL,
  `fecha_pago` date NOT NULL,
  `fecha_envio` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id_pago`, `id_grupo`, `id_alumna`, `M_nombre`, `M_apellido`, `comprobante`, `folio`, `fecha_pago`, `fecha_envio`) VALUES
(22, 9, 11, 'Lorena', 'Perez2', 'key-512 (1).png', 999, '2018-06-01', '2018-06-22 21:50:57'),
(23, 9, 8, 'Lorena', 'Lopez', 'start.png', 9999, '2018-06-22', '2018-06-22 21:56:55'),
(28, 1, 3, 'Lorena', 'Montelongo', '4.png', 88888, '2018-06-24', '2018-06-25 00:49:29'),
(29, 10, 8, 'Prueba', 'Ejemplo', '2.png', 2222, '2018-06-24', '2018-06-25 02:24:16'),
(30, 9, 12, 'Lorena', 'Lopez', '2.4.jpg', 1111, '2018-06-24', '2018-06-25 05:08:45'),
(31, 10, 8, 'Prueba', 'Ejemplo 2', 'details-icon-1403.png', 7777, '2018-06-29', '2018-06-25 06:22:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `username`, `password`) VALUES
(1, 'Sergio', 'admin', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnas`
--
ALTER TABLE `alumnas`
  ADD PRIMARY KEY (`id_alumna`),
  ADD KEY `alumnas_ibfk_1` (`id_grupo`);

--
-- Indices de la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id_grupo`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id_pago`),
  ADD UNIQUE KEY `folio` (`folio`),
  ADD KEY `pagos_ibfk_2` (`id_alumna`),
  ADD KEY `id_grupo` (`id_grupo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnas`
--
ALTER TABLE `alumnas`
  MODIFY `id_alumna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnas`
--
ALTER TABLE `alumnas`
  ADD CONSTRAINT `alumnas_ibfk_1` FOREIGN KEY (`id_grupo`) REFERENCES `grupos` (`id_grupo`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`id_grupo`) REFERENCES `grupos` (`id_grupo`) ON DELETE CASCADE,
  ADD CONSTRAINT `pagos_ibfk_2` FOREIGN KEY (`id_alumna`) REFERENCES `alumnas` (`id_alumna`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

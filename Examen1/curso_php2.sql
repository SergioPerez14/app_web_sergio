-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-05-2018 a las 20:24:35
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
-- Base de datos: `curso_php2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `matricula` varchar(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `carrera` int(11) NOT NULL,
  `tutor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`matricula`, `nombre`, `carrera`, `tutor`) VALUES
('1530071', 'Luis', 2, 3),
('1530072', 'Sergio', 3, 3),
('1530073', 'Sergio', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`id`, `nombre`) VALUES
(1, 'ITI'),
(2, 'MECA'),
(3, 'ISA'),
(8, 'PYMES'),
(9, 'MANU');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestros`
--

CREATE TABLE `maestros` (
  `nempleado` int(11) NOT NULL,
  `carrera` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `maestros`
--

INSERT INTO `maestros` (`nempleado`, `carrera`, `nombre`, `email`, `password`) VALUES
(1, 1, 'Luis S', 'mail@mail.com', '12345'),
(2, 3, 'Sergio', 'mail@mail.mx', '123'),
(3, 2, 'Oliver', 'L@mail.com', 'allego');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutorias`
--

CREATE TABLE `tutorias` (
  `id` int(11) NOT NULL,
  `alumno` varchar(10) NOT NULL,
  `tutor` int(11) NOT NULL,
  `fecha` varchar(11) NOT NULL,
  `hora` varchar(10) NOT NULL,
  `tipotutoria` varchar(20) NOT NULL,
  `campo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tutorias`
--

INSERT INTO `tutorias` (`id`, `alumno`, `tutor`, `fecha`, `hora`, `tipotutoria`, `campo`) VALUES
(1, '1530073', 2, '2018-05-11', '20:00', 'Grupal', 'Mineria de Datos'),
(5, '1530072', 1, '2018-05-26', '17:00', 'Grupal', 'Seguridad'),
(6, '1530073', 3, '2018-05-26', '17:00', 'Individual', 'Redes');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`matricula`),
  ADD KEY `carrera` (`carrera`),
  ADD KEY `tutor` (`tutor`);

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `maestros`
--
ALTER TABLE `maestros`
  ADD PRIMARY KEY (`nempleado`),
  ADD KEY `carrera` (`carrera`);

--
-- Indices de la tabla `tutorias`
--
ALTER TABLE `tutorias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alumno` (`alumno`),
  ADD KEY `tutor` (`tutor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tutorias`
--
ALTER TABLE `tutorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `alumnos_ibfk_1` FOREIGN KEY (`carrera`) REFERENCES `carreras` (`id`),
  ADD CONSTRAINT `alumnos_ibfk_2` FOREIGN KEY (`tutor`) REFERENCES `maestros` (`nempleado`);

--
-- Filtros para la tabla `maestros`
--
ALTER TABLE `maestros`
  ADD CONSTRAINT `maestros_ibfk_1` FOREIGN KEY (`carrera`) REFERENCES `carreras` (`id`);

--
-- Filtros para la tabla `tutorias`
--
ALTER TABLE `tutorias`
  ADD CONSTRAINT `tutorias_ibfk_1` FOREIGN KEY (`alumno`) REFERENCES `alumnos` (`matricula`),
  ADD CONSTRAINT `tutorias_ibfk_2` FOREIGN KEY (`tutor`) REFERENCES `maestros` (`nempleado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

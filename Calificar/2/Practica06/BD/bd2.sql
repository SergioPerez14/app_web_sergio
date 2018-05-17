-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-05-2018 a las 10:46:51
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `basquetbolistas`
--

CREATE TABLE `basquetbolistas` (
  `Id` int(11) NOT NULL,
  `Dorsal` int(11) NOT NULL,
  `Nombre` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Carrera` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Posicion` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `basquetbolistas`
--

INSERT INTO `basquetbolistas` (`Id`, `Dorsal`, `Nombre`, `Carrera`, `Email`, `Posicion`) VALUES
(1, 2, 'Ernesto Rodriguez Trejo', 'Pymes', 'ernesto@gmail.com', 'Base'),
(2, 8, 'Maximiliano Arriola', 'ISA', 'max@outlook.es', 'Pivot');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `futbolistas`
--

CREATE TABLE `futbolistas` (
  `Id` int(11) NOT NULL,
  `Dorsal` int(11) NOT NULL,
  `Nombre` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Carrera` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Posicion` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `futbolistas`
--

INSERT INTO `futbolistas` (`Id`, `Dorsal`, `Nombre`, `Carrera`, `Email`, `Posicion`) VALUES
(1, 9, 'Juan Enrique Rodriguez', 'ITI', 'juan@outlook,com', 'Media punta'),
(2, 11, 'Fernando Robles', 'ITM', 'fer@gmail.com', 'Defensa'),
(4, 3, 'Jorge Jasso', 'ITI', 'jorge@gmail.com', 'Portero');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `basquetbolistas`
--
ALTER TABLE `basquetbolistas`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `futbolistas`
--
ALTER TABLE `futbolistas`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `basquetbolistas`
--
ALTER TABLE `basquetbolistas`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `futbolistas`
--
ALTER TABLE `futbolistas`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

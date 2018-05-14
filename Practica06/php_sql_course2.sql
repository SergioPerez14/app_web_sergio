-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-05-2018 a las 08:37:02
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
-- Base de datos: `php_sql_course2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `basquetbol`
--

CREATE TABLE `basquetbol` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `posicion` varchar(20) NOT NULL,
  `carrera` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `basquetbol`
--

INSERT INTO `basquetbol` (`id`, `nombre`, `posicion`, `carrera`, `email`) VALUES
(7, 'Michael Jordan', 'Medio', 'ITI', 'mj@mail.com'),
(12, 'Sergio', 'Medio', 'ITI', 'sergio@mail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `futbol`
--

CREATE TABLE `futbol` (
  `id` varchar(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `posicion` varchar(20) NOT NULL,
  `carrera` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `futbol`
--

INSERT INTO `futbol` (`id`, `nombre`, `posicion`, `carrera`, `email`) VALUES
('1', 'Benji Price', 'Portero', 'ITI', 'benji@mail.com'),
('10', 'Oliver Atom', 'Delantero', 'ITI', 'sergio@mail.com'),
('2', 'Sergio', 'Defensa', 'ITI', 'sergio@mail.com'),
('4', 'Tom', 'Delantero', 'ITI', 'tom@mail.com'),
('5', 'Bruce', 'Defensa', 'ITI', 'bruce@mail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `basquetbol`
--
ALTER TABLE `basquetbol`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `futbol`
--
ALTER TABLE `futbol`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

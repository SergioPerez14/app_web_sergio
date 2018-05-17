-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2018 at 10:22 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `deportes`
--

-- --------------------------------------------------------

--
-- Table structure for table `basquet`
--

CREATE TABLE `basquet` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `carrera` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `posicion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `basquet`
--

INSERT INTO `basquet` (`id`, `nombre`, `carrera`, `email`, `posicion`) VALUES
(56, 'Alfredo Villegas', 'IM', 'alfredo@gmail.com', 'otra'),
(64, 'Alexis Martínez', 'ITI', 'alexis@gmail.com', 'delantero');

-- --------------------------------------------------------

--
-- Table structure for table `futbol`
--

CREATE TABLE `futbol` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `posicion` varchar(30) NOT NULL,
  `carrera` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `futbol`
--

INSERT INTO `futbol` (`id`, `nombre`, `posicion`, `carrera`, `email`) VALUES
(48, 'Alejandro Gonzalez', 'delantero', 'ITM', 'alejandro@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basquet`
--
ALTER TABLE `basquet`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `futbol`
--
ALTER TABLE `futbol`
  ADD UNIQUE KEY `id` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

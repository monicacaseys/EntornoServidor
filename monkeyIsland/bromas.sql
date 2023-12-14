-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-12-2023 a las 14:41:17
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
-- Base de datos: `bromas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bromas`
--

CREATE TABLE `bromas` (
  `id` int(11) NOT NULL,
  `contenido` text DEFAULT NULL,
  `puntuacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `bromas`
--

INSERT INTO `bromas` (`id`, `contenido`, `puntuacion`) VALUES
(1, 'Tu agilidad es copmo una tortuga', 5),
(2, 'Tu agilidad es copmo una tortuga', 5),
(3, 'Tu agilidad es copmo una tortuga', 5),
(4, 'luchas como un poco sin plumas', 10),
(5, 'peleas como un loco', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bromas`
--
ALTER TABLE `bromas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bromas`
--
ALTER TABLE `bromas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

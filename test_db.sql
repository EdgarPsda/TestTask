-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 24-04-2019 a las 13:26:59
-- Versión del servidor: 5.7.25-0ubuntu0.16.04.2
-- Versión de PHP: 7.2.17-1+ubuntu16.04.1+deb.sury.org+3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `test_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intervals`
--

CREATE TABLE `intervals` (
  `id` int(11) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `intervals`
--

INSERT INTO `intervals` (`id`, `date_start`, `date_end`, `price`) VALUES
(1, '2019-04-01', '2019-04-02', 25),
(4, '2019-04-02', '2019-04-05', 30);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `intervals`
--
ALTER TABLE `intervals`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `intervals`
--
ALTER TABLE `intervals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

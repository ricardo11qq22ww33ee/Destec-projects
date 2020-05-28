-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-05-2020 a las 17:49:07
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `projects`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activity`
--

CREATE TABLE `activity` (
  `id_activity` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `due_date` date NOT NULL,
  `start_date` date NOT NULL,
  `real_start` date NOT NULL,
  `real_due` date NOT NULL,
  `id_project` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `priority` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `activity`
--

INSERT INTO `activity` (`id_activity`, `name`, `due_date`, `start_date`, `real_start`, `real_due`, `id_project`, `status`, `priority`) VALUES
(1, 'Diseño', '2020-05-01', '2020-01-01', '0000-00-00', '0000-00-00', 1, 'In-progress', 'High'),
(2, 'Fabricación', '2020-03-01', '2020-01-15', '0000-00-00', '0000-00-00', 1, 'In-progress', 'Low'),
(3, 'Control', '2020-03-28', '2020-01-28', '0000-00-00', '0000-00-00', 1, 'No initiated', 'Medium ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `delay`
--

CREATE TABLE `delay` (
  `id_delay` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `id_activity` int(11) NOT NULL,
  `text` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `delay`
--

INSERT INTO `delay` (`id_delay`, `id_project`, `id_activity`, `text`) VALUES
(1, 1, 1, 'Designers have too many projects');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parts`
--

CREATE TABLE `parts` (
  `id_part` varchar(10) NOT NULL,
  `material` varchar(20) NOT NULL,
  `cut` varchar(15) NOT NULL,
  `machining` varchar(20) NOT NULL,
  `image` varchar(256) NOT NULL,
  `status` varchar(20) NOT NULL,
  `status_cut` varchar(20) NOT NULL,
  `id_project` int(11) NOT NULL,
  `name_designer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `parts`
--

INSERT INTO `parts` (`id_part`, `material`, `cut`, `machining`, `image`, `status`, `status_cut`, `id_project`, `name_designer`) VALUES
('COPM2-001-', 'AISI 304', 'Water', 'Turning', '', 'Complete', 'Complete', 1, 'Ricardo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project`
--

CREATE TABLE `project` (
  `id_project` int(11) NOT NULL,
  `due_date` date NOT NULL,
  `start_date` date NOT NULL,
  `name` varchar(50) NOT NULL,
  `client` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `project`
--

INSERT INTO `project` (`id_project`, `due_date`, `start_date`, `name`, `client`) VALUES
(1, '2020-06-01', '2020-01-01', 'Conchas', 'Panovo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `puesto` varchar(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `last_name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `password`, `puesto`, `name`, `last_name`) VALUES
(1, 'david', 'd1a2v3', '1', '', ''),
(2, 'admin', 'admin', 'Manager', 'Ricardo German', 'Serrano Rodriguez');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id_activity`);

--
-- Indices de la tabla `delay`
--
ALTER TABLE `delay`
  ADD PRIMARY KEY (`id_delay`);

--
-- Indices de la tabla `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id_project`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `activity`
--
ALTER TABLE `activity`
  MODIFY `id_activity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `delay`
--
ALTER TABLE `delay`
  MODIFY `id_delay` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `project`
--
ALTER TABLE `project`
  MODIFY `id_project` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

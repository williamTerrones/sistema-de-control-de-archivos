-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-02-2020 a las 00:31:17
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sicoa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_coordinaciones`
--

CREATE TABLE `t_coordinaciones` (
  `Id_coordinacion` int(11) NOT NULL,
  `Id_direcciones` int(11) DEFAULT NULL,
  `nombre_coordinacion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_direcciones`
--

CREATE TABLE `t_direcciones` (
  `Id_direcciones` int(11) NOT NULL,
  `nombre_direccion` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_expediente`
--

CREATE TABLE `t_expediente` (
  `Id_expediente` int(11) NOT NULL,
  `Id_coodinacion` int(11) DEFAULT NULL,
  `Id_direcciones` int(11) DEFAULT NULL,
  `fechaTransferencia` date DEFAULT NULL,
  `claveExpediente` varchar(30) DEFAULT NULL,
  `descripcionExpediente` varchar(255) DEFAULT NULL,
  `yearExpediente` varchar(255) DEFAULT NULL,
  `tiempodeConservacion` varchar(255) DEFAULT NULL,
  `legajos` varchar(255) DEFAULT NULL,
  `hojas` varchar(255) DEFAULT NULL,
  `caracter` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_usuarios`
--

CREATE TABLE `t_usuarios` (
  `Id_usuarios` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `clave` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `t_usuarios`
--

INSERT INTO `t_usuarios` (`Id_usuarios`, `nombre`, `clave`) VALUES
(2, 'willi', '$2y$10$PVWmuk2iH7wUdWzjh7BxheYnhYlxe5PBv4R77qQwWFpxZPt1KnPhK');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `t_coordinaciones`
--
ALTER TABLE `t_coordinaciones`
  ADD PRIMARY KEY (`Id_coordinacion`),
  ADD KEY `Id_direccion` (`Id_direcciones`);

--
-- Indices de la tabla `t_direcciones`
--
ALTER TABLE `t_direcciones`
  ADD PRIMARY KEY (`Id_direcciones`);

--
-- Indices de la tabla `t_expediente`
--
ALTER TABLE `t_expediente`
  ADD PRIMARY KEY (`Id_expediente`);

--
-- Indices de la tabla `t_usuarios`
--
ALTER TABLE `t_usuarios`
  ADD PRIMARY KEY (`Id_usuarios`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `t_coordinaciones`
--
ALTER TABLE `t_coordinaciones`
  MODIFY `Id_coordinacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT de la tabla `t_direcciones`
--
ALTER TABLE `t_direcciones`
  MODIFY `Id_direcciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `t_expediente`
--
ALTER TABLE `t_expediente`
  MODIFY `Id_expediente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `t_usuarios`
--
ALTER TABLE `t_usuarios`
  MODIFY `Id_usuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `t_coordinaciones`
--
ALTER TABLE `t_coordinaciones`
  ADD CONSTRAINT `Id_direccion` FOREIGN KEY (`Id_direcciones`) REFERENCES `t_direcciones` (`Id_direcciones`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 19-01-2024 a las 14:03:05
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
-- Base de datos: `votacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `COMUNA`
--

CREATE TABLE `COMUNA` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(50) NOT NULL,
  `ID_REGION` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `COMUNA`
--

INSERT INTO `COMUNA` (`ID`, `NOMBRE`, `ID_REGION`) VALUES
(1, 'Region 1 Comuna 1', 1),
(2, 'Region 1 Comuna 2', 1),
(3, 'Region 2 Comuna 1', 2),
(4, 'Region 2 Comina 2', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PERSONA`
--

CREATE TABLE `PERSONA` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(50) NOT NULL,
  `APELLIDOS` varchar(50) NOT NULL,
  `ALIAS` varchar(50) NOT NULL,
  `ID_COMUNA` int(11) NOT NULL,
  `RUT` varchar(15) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `ID_TIPO_PERSONA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci COMMENT='Tabla persona ';

--
-- Volcado de datos para la tabla `PERSONA`
--

INSERT INTO `PERSONA` (`ID`, `NOMBRE`, `APELLIDOS`, `ALIAS`, `ID_COMUNA`, `RUT`, `EMAIL`, `ID_TIPO_PERSONA`) VALUES
(1, 'Candidato 1', 'Apellido 1', 'Alias 1', 1, '1-1', 'candidato1@gmail.com', 2),
(2, 'Candidato 2', 'Apellido 2', 'Alias 2', 2, '2-2', 'candidato2@gmail.com', 2),
(39, 'Marcos', 'Ahumada', 'Kalm', 2, '18073629-8', 'marcos.ahumada08@gmail.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `REGION`
--

CREATE TABLE `REGION` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `REGION`
--

INSERT INTO `REGION` (`ID`, `NOMBRE`) VALUES
(1, 'Region 1'),
(2, 'Region 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TIPO_PERSONA`
--

CREATE TABLE `TIPO_PERSONA` (
  `ID` int(11) NOT NULL,
  `DESCRIPCION` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `TIPO_PERSONA`
--

INSERT INTO `TIPO_PERSONA` (`ID`, `DESCRIPCION`) VALUES
(1, 'PERSONA'),
(2, 'CANDIDATO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `VOTO`
--

CREATE TABLE `VOTO` (
  `ID` int(11) NOT NULL,
  `ID_PERSONA` int(11) NOT NULL,
  `ID_CANDIDATO` int(11) NOT NULL,
  `WEB` int(1) DEFAULT NULL,
  `TV` int(1) DEFAULT NULL,
  `REDES_SOCIALES` int(1) DEFAULT NULL,
  `AMIGO` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `VOTO`
--

INSERT INTO `VOTO` (`ID`, `ID_PERSONA`, `ID_CANDIDATO`, `WEB`, `TV`, `REDES_SOCIALES`, `AMIGO`) VALUES
(6, 39, 1, NULL, NULL, 0, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `COMUNA`
--
ALTER TABLE `COMUNA`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `PERSONA`
--
ALTER TABLE `PERSONA`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `REGION`
--
ALTER TABLE `REGION`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `TIPO_PERSONA`
--
ALTER TABLE `TIPO_PERSONA`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `VOTO`
--
ALTER TABLE `VOTO`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `COMUNA`
--
ALTER TABLE `COMUNA`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `PERSONA`
--
ALTER TABLE `PERSONA`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `REGION`
--
ALTER TABLE `REGION`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `TIPO_PERSONA`
--
ALTER TABLE `TIPO_PERSONA`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `VOTO`
--
ALTER TABLE `VOTO`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-06-2023 a las 12:44:50
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `lp2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel`
--

CREATE TABLE `nivel` (
  `IDNIVEL` int(11) NOT NULL,
  `NIVEL` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `nivel`
--

INSERT INTO `nivel` (`IDNIVEL`, `NIVEL`) VALUES
(1, 'Administrador'),
(2, 'Medico'),
(3, 'Secretaria'),
(4, 'Paciente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `obra_social`
--

CREATE TABLE `obra_social` (
  `IDOBRA` int(11) NOT NULL,
  `OBRA` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `obra_social`
--

INSERT INTO `obra_social` (`IDOBRA`, `OBRA`) VALUES
(1, 'Ninguna'),
(2, 'Swiss Medical'),
(3, 'Osde'),
(4, 'Prevención Salud');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `IDPERSONA` int(11) NOT NULL,
  `IDOBRA` int(11) NOT NULL,
  `IDNIVEL` int(11) NOT NULL,
  `NOMBRE` varchar(100) NOT NULL,
  `APELLIDO` varchar(100) NOT NULL,
  `DNI` varchar(100) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `CLAVE` varchar(100) NOT NULL,
  `FOTO` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`IDPERSONA`, `IDOBRA`, `IDNIVEL`, `NOMBRE`, `APELLIDO`, `DNI`, `EMAIL`, `CLAVE`, `FOTO`) VALUES
(1, 1, 1, 'Sue', 'Palacios', '40525330', 'sue@gmail.com', '12345', 'sue.jpg'),
(2, 3, 2, 'Trinidad', 'Moreno', '37984069', 'tmoreno@gmail.com', '12345', 'tmoreno.jpg'),
(3, 4, 4, 'Julieta', 'Echeverri', '40623985', 'jecheverry@gmail.com', '12345', 'jecheverri.jpg'),
(4, 2, 3, 'Jorgelina', 'Perez', '42623985', 'jperez@gmail.com', '12345', 'jperez.jpg'),
(5, 2, 2, 'Mauricio', 'Saude', '23442456', 'msaude@gmail.com', '12345', 'msaude.jpg'),
(6, 3, 4, 'Gloria', 'Navarro', '12345678', 'gnavarro@gmail.com', '12345', 'gnavarro.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestacion`
--

CREATE TABLE `prestacion` (
  `IDPRESTACION` int(11) NOT NULL,
  `PRESTACION` varchar(100) NOT NULL,
  `PRECIO` decimal(10,2) DEFAULT NULL,
  `PORCENTAJE` decimal(5,2) DEFAULT NULL,
  `COMPLEJIDAD` decimal(1,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `prestacion`
--

INSERT INTO `prestacion` (`IDPRESTACION`, `PRESTACION`, `PRECIO`, `PORCENTAJE`, `COMPLEJIDAD`) VALUES
(1, 'Tomografia', '1000.00', '10.00', '1'),
(2, 'Resonancia', '2000.00', '20.00', '1'),
(3, 'Sesiones de Psicología', NULL, NULL, '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turno`
--

CREATE TABLE `turno` (
  `IDTURNO` int(11) NOT NULL,
  `IDPERSONA` int(11) NOT NULL,
  `IDPRESTACION` int(11) NOT NULL,
  `MEDICO` varchar(200) NOT NULL,
  `FECHACONSULTA` datetime NOT NULL,
  `FECHATURNO` datetime NOT NULL,
  `DIAGNOSTICO` varchar(200) DEFAULT NULL,
  `ASISTIDO` decimal(1,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `turno`
--

INSERT INTO `turno` (`IDTURNO`, `IDPERSONA`, `IDPRESTACION`, `MEDICO`, `FECHACONSULTA`, `FECHATURNO`, `DIAGNOSTICO`, `ASISTIDO`) VALUES
(1, 3, 2, 'Trinidad Moreno', '2023-06-14 09:47:08', '2023-06-14 11:47:08', NULL, '2'),
(7, 3, 2, 'Trinidad Moreno', '2023-06-15 06:06:54', '2023-06-21 00:00:00', 'test', '1'),
(11, 6, 3, 'Mauricio Saude', '2023-06-15 06:44:27', '2023-06-14 08:25:00', 'test', '0'),
(20, 6, 2, 'Mauricio Saude', '2023-06-15 07:43:13', '2023-06-13 13:45:45', '', '0');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `nivel`
--
ALTER TABLE `nivel`
  ADD PRIMARY KEY (`IDNIVEL`),
  ADD UNIQUE KEY `NIVEL_PK` (`IDNIVEL`);

--
-- Indices de la tabla `obra_social`
--
ALTER TABLE `obra_social`
  ADD PRIMARY KEY (`IDOBRA`),
  ADD UNIQUE KEY `OBRA_SOCIAL_PK` (`IDOBRA`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`IDPERSONA`),
  ADD UNIQUE KEY `PERSONA_PK` (`IDPERSONA`),
  ADD KEY `RELATION_21_FK` (`IDOBRA`),
  ADD KEY `RELATION_28_FK` (`IDNIVEL`);

--
-- Indices de la tabla `prestacion`
--
ALTER TABLE `prestacion`
  ADD PRIMARY KEY (`IDPRESTACION`),
  ADD UNIQUE KEY `PRESTACION_PK` (`IDPRESTACION`);

--
-- Indices de la tabla `turno`
--
ALTER TABLE `turno`
  ADD PRIMARY KEY (`IDTURNO`),
  ADD UNIQUE KEY `TURNO_PK` (`IDTURNO`),
  ADD KEY `RELATION_51_FK` (`IDPERSONA`),
  ADD KEY `RELATION_53_FK` (`IDPRESTACION`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `turno`
--
ALTER TABLE `turno`
  MODIFY `IDTURNO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`IDOBRA`) REFERENCES `obra_social` (`IDOBRA`),
  ADD CONSTRAINT `persona_ibfk_2` FOREIGN KEY (`IDNIVEL`) REFERENCES `nivel` (`IDNIVEL`);

--
-- Filtros para la tabla `turno`
--
ALTER TABLE `turno`
  ADD CONSTRAINT `turno_ibfk_1` FOREIGN KEY (`IDPERSONA`) REFERENCES `persona` (`IDPERSONA`),
  ADD CONSTRAINT `turno_ibfk_2` FOREIGN KEY (`IDPRESTACION`) REFERENCES `prestacion` (`IDPRESTACION`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

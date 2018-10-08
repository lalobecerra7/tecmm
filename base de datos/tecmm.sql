-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-10-2018 a las 22:26:06
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tecmm`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE `bitacora` (
  `ID_Bitacora` int(11) NOT NULL,
  `FK_ID_Materia_Grupo` int(11) NOT NULL,
  `NoAlumnos` int(11) NOT NULL,
  `Software_utilizar` varchar(50) NOT NULL,
  `Horario_entrada` varchar(20) NOT NULL,
  `Horario_salida` varchar(20) NOT NULL,
  `Fecha` date NOT NULL,
  `Observaciones` text NOT NULL,
  `Activo` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `bitacora`
--

INSERT INTO `bitacora` (`ID_Bitacora`, `FK_ID_Materia_Grupo`, `NoAlumnos`, `Software_utilizar`, `Horario_entrada`, `Horario_salida`, `Fecha`, `Observaciones`, `Activo`) VALUES
(1, 8, 7, 'Autocad', '21:05', '20:05', '2018-10-02', 'lol', 1),
(2, 1, 10, 'Netbeans', '06:02', '16:01', '2018-10-17', 'okokoko', 1),
(3, 1, 20, 'Softare', '09:30', '15:30', '2018-10-03', 'Observacion', 1),
(4, 1, 456, '456', '11:45', '15:42', '2018-10-05', '25445453', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `ID_Carrera` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Plan_estudios` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`ID_Carrera`, `Nombre`, `Plan_estudios`) VALUES
(1, 'ISIC', '1'),
(2, 'IGEM', '2'),
(3, 'IIND', '3'),
(4, 'IEME', '4'),
(5, 'IAMB', '5'),
(6, 'IIAL', '6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `control`
--

CREATE TABLE `control` (
  `ID_Control` int(11) NOT NULL,
  `FK_ID_Materia_Grupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_practicas`
--

CREATE TABLE `detalle_practicas` (
  `ID_Detalle_Practica` int(11) NOT NULL,
  `FK_ID_Practica` int(11) NOT NULL,
  `FK_ID_Laboratorio` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entregas`
--

CREATE TABLE `entregas` (
  `ID_Entrega` int(11) NOT NULL,
  `FK_ID_Tipo_Entrega` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `FK_ID_Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `ID_Grupo` int(11) NOT NULL,
  `Semestre` varchar(15) NOT NULL,
  `Letra` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`ID_Grupo`, `Semestre`, `Letra`) VALUES
(1, 'Primero', 'A'),
(7, 'Segundo', 'A'),
(13, 'Tercero', 'A'),
(19, 'Cuarto', 'A'),
(25, 'Quinto', 'A'),
(31, 'Sexto', 'A'),
(37, 'Septimo', 'A'),
(43, 'Octavo', 'A'),
(49, 'Noveno', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_carrera`
--

CREATE TABLE `grupo_carrera` (
  `ID_Grupo_Carrera` int(11) NOT NULL,
  `FK_ID_Grupo` int(11) NOT NULL,
  `FK_ID_Carrera` int(11) NOT NULL,
  `Activo` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `grupo_carrera`
--

INSERT INTO `grupo_carrera` (`ID_Grupo_Carrera`, `FK_ID_Grupo`, `FK_ID_Carrera`, `Activo`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(3, 1, 3, 1),
(4, 1, 4, 1),
(5, 7, 1, 1),
(7, 1, 6, 1),
(8, 43, 1, 1),
(9, 25, 1, 1),
(10, 25, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `laboratorio`
--

CREATE TABLE `laboratorio` (
  `ID_Laboratorio` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Capacidad` int(11) NOT NULL,
  `Activo` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `laboratorio`
--

INSERT INTO `laboratorio` (`ID_Laboratorio`, `Nombre`, `Capacidad`, `Activo`) VALUES
(1, 'Laboratorio Autocad', 30, 1),
(2, 'Laboratorio Redes', 20, 1),
(3, 'Laboratorio', 50, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestros`
--

CREATE TABLE `maestros` (
  `ID_Maestro` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `FK_ID_Usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `maestros`
--

INSERT INTO `maestros` (`ID_Maestro`, `Nombre`, `FK_ID_Usuario`) VALUES
(1, '22', 3),
(2, 'Juana Cecilia Davila', 12),
(3, 'lo', 15),
(4, 'grgrg', 16),
(5, '33', 17),
(6, '333', 18),
(7, 'Lol', 25),
(8, 'ppÃ±', 26),
(9, 'ddfdf', 27),
(10, '22', 28),
(11, 'Jesus Eduardo Garcia Becerra', 41),
(12, 'Â´Â´', 51),
(13, 'Jesus Eduardo Garcia Becerra', 52);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `ID_Materia` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Codigo` varchar(20) NOT NULL,
  `Horas_TP` varchar(20) NOT NULL,
  `Activo` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`ID_Materia`, `Nombre`, `Codigo`, `Horas_TP`, `Activo`) VALUES
(1, 'Programacion Web', 'PROWEB123', '5', 1),
(2, 'Bases de datos', 'BD1', '15', 1),
(3, 'Taller de redes', 'TDR1', '14', 1),
(4, 'Civica y Etica', 'CIVET1', '14', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia_grupo`
--

CREATE TABLE `materia_grupo` (
  `ID_Materia_Grupo` int(11) NOT NULL,
  `FK_ID_Grupo_Carrera` int(11) NOT NULL,
  `FK_ID_Materia` int(11) NOT NULL,
  `FK_ID_Maestro` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `materia_grupo`
--

INSERT INTO `materia_grupo` (`ID_Materia_Grupo`, `FK_ID_Grupo_Carrera`, `FK_ID_Materia`, `FK_ID_Maestro`, `Cantidad`) VALUES
(1, 1, 1, 2, 0),
(2, 2, 1, 2, 50),
(3, 8, 1, 2, 1),
(6, 1, 1, 13, 8),
(7, 5, 1, 13, 500),
(8, 1, 2, 2, 50),
(9, 1, 3, 2, 0),
(10, 1, 4, 2, 0),
(11, 5, 2, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `practicas`
--

CREATE TABLE `practicas` (
  `ID_Practica` int(11) NOT NULL,
  `FK_ID_Control` int(11) NOT NULL,
  `Unidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

CREATE TABLE `status` (
  `ID_Status` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_entrega`
--

CREATE TABLE `tipo_entrega` (
  `ID_Tipo_Entrega` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Caracteristicas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `ID_Tipo_Usuario` int(11) NOT NULL,
  `Nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`ID_Tipo_Usuario`, `Nombre`) VALUES
(1, 'Admin'),
(2, 'Maestro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID_Usuario` int(11) NOT NULL,
  `Nombre` varchar(100) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `Contrasenia` varchar(100) NOT NULL,
  `FK_ID_Tipo_Usuario` int(11) NOT NULL,
  `Activo` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_Usuario`, `Nombre`, `Contrasenia`, `FK_ID_Tipo_Usuario`, `Activo`) VALUES
(1, 'Lalo', '123', 1, 1),
(2, 'Jesus', '123', 2, 1),
(3, '22', '22', 1, 0),
(12, 'Cecy', '1104', 1, 1),
(15, 'lo', 'lo', 1, 0),
(16, 'rgrg', 'rgrg', 1, 0),
(17, '333', '333', 1, 0),
(18, '33', '3333333', 2, 0),
(25, 'loool', 'lool', 2, 0),
(26, 'pp', 'pp', 1, 0),
(27, 'dfdff', 'dfdf', 2, 0),
(28, 'jjj', 'jjjj', 1, 0),
(41, 'Lalo123', '123', 1, 0),
(51, 'Lalo22', '123', 1, 0),
(52, 'Lalin', '123', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`ID_Bitacora`),
  ADD KEY `FK_ID_Materia_Grupo` (`FK_ID_Materia_Grupo`);

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`ID_Carrera`);

--
-- Indices de la tabla `control`
--
ALTER TABLE `control`
  ADD PRIMARY KEY (`ID_Control`),
  ADD KEY `FK_ID_Materia_Grupo` (`FK_ID_Materia_Grupo`);

--
-- Indices de la tabla `detalle_practicas`
--
ALTER TABLE `detalle_practicas`
  ADD PRIMARY KEY (`ID_Detalle_Practica`),
  ADD KEY `FK_ID_Laboratorio` (`FK_ID_Laboratorio`),
  ADD KEY `FK_ID_Practica` (`FK_ID_Practica`);

--
-- Indices de la tabla `entregas`
--
ALTER TABLE `entregas`
  ADD PRIMARY KEY (`ID_Entrega`),
  ADD KEY `FK_ID_Status` (`FK_ID_Status`),
  ADD KEY `FK_ID_Tipo_Entrega` (`FK_ID_Tipo_Entrega`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`ID_Grupo`);

--
-- Indices de la tabla `grupo_carrera`
--
ALTER TABLE `grupo_carrera`
  ADD PRIMARY KEY (`ID_Grupo_Carrera`),
  ADD KEY `FK_ID_Carrera` (`FK_ID_Carrera`),
  ADD KEY `FK_ID_Grupo` (`FK_ID_Grupo`);

--
-- Indices de la tabla `laboratorio`
--
ALTER TABLE `laboratorio`
  ADD PRIMARY KEY (`ID_Laboratorio`);

--
-- Indices de la tabla `maestros`
--
ALTER TABLE `maestros`
  ADD PRIMARY KEY (`ID_Maestro`),
  ADD KEY `FK_ID_Usuario` (`FK_ID_Usuario`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`ID_Materia`);

--
-- Indices de la tabla `materia_grupo`
--
ALTER TABLE `materia_grupo`
  ADD PRIMARY KEY (`ID_Materia_Grupo`),
  ADD KEY `FK_ID_Maestro` (`FK_ID_Maestro`),
  ADD KEY `FK_ID_Materia` (`FK_ID_Materia`),
  ADD KEY `FK_ID_Grupo-carrera` (`FK_ID_Grupo_Carrera`);

--
-- Indices de la tabla `practicas`
--
ALTER TABLE `practicas`
  ADD PRIMARY KEY (`ID_Practica`),
  ADD KEY `FK_ID_Control` (`FK_ID_Control`);

--
-- Indices de la tabla `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`ID_Status`);

--
-- Indices de la tabla `tipo_entrega`
--
ALTER TABLE `tipo_entrega`
  ADD PRIMARY KEY (`ID_Tipo_Entrega`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`ID_Tipo_Usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_Usuario`),
  ADD UNIQUE KEY `Nombre` (`Nombre`),
  ADD KEY `FK_ID_Tipo_Usuario` (`FK_ID_Tipo_Usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `ID_Bitacora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `carrera`
--
ALTER TABLE `carrera`
  MODIFY `ID_Carrera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `control`
--
ALTER TABLE `control`
  MODIFY `ID_Control` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_practicas`
--
ALTER TABLE `detalle_practicas`
  MODIFY `ID_Detalle_Practica` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `entregas`
--
ALTER TABLE `entregas`
  MODIFY `ID_Entrega` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
  MODIFY `ID_Grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `grupo_carrera`
--
ALTER TABLE `grupo_carrera`
  MODIFY `ID_Grupo_Carrera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `laboratorio`
--
ALTER TABLE `laboratorio`
  MODIFY `ID_Laboratorio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `maestros`
--
ALTER TABLE `maestros`
  MODIFY `ID_Maestro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `ID_Materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `materia_grupo`
--
ALTER TABLE `materia_grupo`
  MODIFY `ID_Materia_Grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `practicas`
--
ALTER TABLE `practicas`
  MODIFY `ID_Practica` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `status`
--
ALTER TABLE `status`
  MODIFY `ID_Status` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_entrega`
--
ALTER TABLE `tipo_entrega`
  MODIFY `ID_Tipo_Entrega` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `ID_Tipo_Usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD CONSTRAINT `bitacora_ibfk_1` FOREIGN KEY (`FK_ID_Materia_Grupo`) REFERENCES `materia_grupo` (`ID_Materia_Grupo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `control`
--
ALTER TABLE `control`
  ADD CONSTRAINT `control_ibfk_1` FOREIGN KEY (`FK_ID_Materia_Grupo`) REFERENCES `materia_grupo` (`ID_Materia_Grupo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_practicas`
--
ALTER TABLE `detalle_practicas`
  ADD CONSTRAINT `detalle_practicas_ibfk_1` FOREIGN KEY (`FK_ID_Laboratorio`) REFERENCES `laboratorio` (`ID_Laboratorio`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_practicas_ibfk_2` FOREIGN KEY (`FK_ID_Practica`) REFERENCES `practicas` (`ID_Practica`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `entregas`
--
ALTER TABLE `entregas`
  ADD CONSTRAINT `entregas_ibfk_1` FOREIGN KEY (`FK_ID_Status`) REFERENCES `status` (`ID_Status`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `entregas_ibfk_2` FOREIGN KEY (`FK_ID_Tipo_Entrega`) REFERENCES `tipo_entrega` (`ID_Tipo_Entrega`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `grupo_carrera`
--
ALTER TABLE `grupo_carrera`
  ADD CONSTRAINT `grupo_carrera_ibfk_1` FOREIGN KEY (`FK_ID_Carrera`) REFERENCES `carrera` (`ID_Carrera`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `grupo_carrera_ibfk_2` FOREIGN KEY (`FK_ID_Grupo`) REFERENCES `grupo` (`ID_Grupo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `maestros`
--
ALTER TABLE `maestros`
  ADD CONSTRAINT `maestros_ibfk_1` FOREIGN KEY (`FK_ID_Usuario`) REFERENCES `usuario` (`ID_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `materia_grupo`
--
ALTER TABLE `materia_grupo`
  ADD CONSTRAINT `materia_grupo_ibfk_2` FOREIGN KEY (`FK_ID_Maestro`) REFERENCES `maestros` (`ID_Maestro`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `materia_grupo_ibfk_3` FOREIGN KEY (`FK_ID_Materia`) REFERENCES `materias` (`ID_Materia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `materia_grupo_ibfk_4` FOREIGN KEY (`FK_ID_Grupo_Carrera`) REFERENCES `grupo_carrera` (`ID_Grupo_Carrera`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `practicas`
--
ALTER TABLE `practicas`
  ADD CONSTRAINT `practicas_ibfk_1` FOREIGN KEY (`FK_ID_Control`) REFERENCES `control` (`ID_Control`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`FK_ID_Tipo_Usuario`) REFERENCES `tipo_usuario` (`ID_tipo_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-10-2018 a las 01:06:26
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `examenes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `idAdmin` int(10) UNSIGNED NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contra` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`idAdmin`, `usuario`, `contra`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `idAlumno` int(10) UNSIGNED NOT NULL,
  `NombreApellido` varchar(50) NOT NULL,
  `DNI` varchar(8) NOT NULL,
  `Curso` int(2) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `idCarrera` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`idAlumno`, `NombreApellido`, `DNI`, `Curso`, `fecha`, `idCarrera`) VALUES
(11, 'Marcelo Ivan Maidana Acevedo', '38818194', 4, '2018-10-10', 1),
(16, 'Juanito Perez', '48743547', 4, '2018-10-10', 1),
(17, 'Test', '38818194', 3, '2018-10-09', 1),
(18, 'test', 'M', 4, '2018-10-22', 1),
(19, 'test2', '3454', 2, '2018-09-10', 1),
(20, 'Anacleto', '23123234', 4, '2018-10-10', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaturas`
--

CREATE TABLE `asignaturas` (
  `idAsignatura` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `grado` int(11) NOT NULL,
  `idCarrera` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asignaturas`
--

INSERT INTO `asignaturas` (`idAsignatura`, `nombre`, `grado`, `idCarrera`) VALUES
(1, 'Lógica', 1, 1),
(2, 'Diseño y gestión de las bases de datos', 2, 1),
(3, 'Informática aplicada', 3, 1),
(4, 'Ética ', 4, 1),
(5, 'Introducción a los Procesos y Sistemas', 1, 1),
(6, 'Ingles Técnico ', 1, 1),
(7, 'Algebra', 1, 1),
(8, 'Estructura del Computador', 2, 1),
(9, 'Recurso Multimedial', 2, 1),
(10, 'Teleinformatica', 2, 1),
(11, 'Análisis Matemático', 2, 1),
(12, 'Informática y Comunicación', 2, 1),
(13, 'Derecho Privado', 2, 1),
(14, 'Derecho Público', 2, 1),
(16, 'Filosofía', 3, 1),
(17, 'Redes de Datos', 3, 1),
(18, 'Seminario', 3, 1),
(19, 'Estadistica', 3, 1),
(20, 'Investigación Aplicada', 4, 1),
(21, 'Pasantía', 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `idCarrera` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`idCarrera`, `nombre`) VALUES
(1, 'Técnicatura Superior en Informática Aplicada'),
(2, 'Profesorado de Lengua y Literatura'),
(3, 'Profesorado de Nivel Primario'),
(4, 'Técnicatura Superior en Desarrollo de Software');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion`
--

CREATE TABLE `inscripcion` (
  `idInscripcion` int(10) NOT NULL,
  `idAlumno` int(10) NOT NULL,
  `idAsignatura` int(10) NOT NULL,
  `llamado1` tinyint(1) NOT NULL,
  `llamado2` tinyint(1) NOT NULL,
  `idTurno` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inscripcion`
--

INSERT INTO `inscripcion` (`idInscripcion`, `idAlumno`, `idAsignatura`, `llamado1`, `llamado2`, `idTurno`) VALUES
(9, 11, 14, 1, 1, 1),
(10, 11, 13, 1, 0, 1),
(11, 11, 4, 1, 1, 1),
(12, 11, 21, 1, 1, 1),
(13, 16, 1, 0, 1, 2),
(14, 16, 5, 1, 0, 2),
(15, 16, 6, 0, 1, 2),
(16, 16, 7, 1, 0, 2),
(17, 16, 14, 0, 1, 2),
(18, 16, 13, 1, 0, 2),
(19, 16, 12, 0, 1, 2),
(20, 16, 10, 1, 0, 2),
(21, 16, 8, 1, 1, 2),
(22, 16, 2, 0, 1, 2),
(23, 16, 17, 1, 0, 2),
(24, 16, 3, 0, 1, 2),
(25, 16, 4, 1, 1, 2),
(26, 16, 20, 0, 1, 2),
(27, 16, 21, 0, 1, 2),
(28, 17, 5, 0, 1, 2),
(29, 17, 7, 1, 0, 2),
(30, 17, 13, 0, 1, 2),
(31, 18, 5, 1, 0, 2),
(32, 18, 7, 0, 1, 2),
(33, 19, 2, 1, 1, 2),
(34, 19, 18, 0, 1, 2),
(35, 20, 1, 0, 1, 1),
(36, 20, 5, 0, 1, 1),
(37, 20, 6, 1, 0, 1),
(38, 20, 7, 1, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turnos`
--

CREATE TABLE `turnos` (
  `idTurno` int(10) UNSIGNED NOT NULL,
  `turno` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `turnos`
--

INSERT INTO `turnos` (`idTurno`, `turno`) VALUES
(1, 'Noviembre-Diciembre'),
(2, 'Febrero-Marzo'),
(3, 'Julio-Agosto');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`idAlumno`);

--
-- Indices de la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  ADD PRIMARY KEY (`idAsignatura`);

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`idCarrera`);

--
-- Indices de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD PRIMARY KEY (`idInscripcion`);

--
-- Indices de la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD PRIMARY KEY (`idTurno`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `idAdmin` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `idAlumno` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  MODIFY `idAsignatura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `idCarrera` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  MODIFY `idInscripcion` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT de la tabla `turnos`
--
ALTER TABLE `turnos`
  MODIFY `idTurno` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

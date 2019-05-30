-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 10-05-2019 a las 02:19:31
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `informatica_unerg`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion`
--

CREATE TABLE IF NOT EXISTS `direccion` (
  `id_direccion` int(11) NOT NULL AUTO_INCREMENT,
  `id_profesor` int(11) NOT NULL,
  `id_estudiante` int(11) NOT NULL,
  `id_responsable` int(11) NOT NULL,
  `direccion` text NOT NULL,
  PRIMARY KEY (`id_direccion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Volcado de datos para la tabla `direccion`
--

INSERT INTO `direccion` (`id_direccion`, `id_profesor`, `id_estudiante`, `id_responsable`, `direccion`) VALUES
(19, 25, 0, 0, 'BARRIO LA VICTORIA AL FINAL DE LA CALLE'),
(22, 28, 0, 0, 'EL JOBO BARRIO LA VICTORIA'),
(24, 30, 0, 0, 'BARRIO LA VICTORIA URBANISMO'),
(25, 31, 0, 0, 'EL JOBO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `email`
--

CREATE TABLE IF NOT EXISTS `email` (
  `id_email` int(11) NOT NULL AUTO_INCREMENT,
  `id_profesor` int(11) NOT NULL,
  `id_estudiante` int(11) NOT NULL,
  `id_responsable` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id_email`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Volcado de datos para la tabla `email`
--

INSERT INTO `email` (`id_email`, `id_profesor`, `id_estudiante`, `id_responsable`, `email`) VALUES
(20, 25, 0, 0, 'CORO@GMAIL.COM'),
(23, 28, 0, 0, 'YORMANPINTO2011@GMAIL.COM'),
(25, 30, 0, 0, 'YAMILETPINTO2012@GMAIL.COM'),
(26, 31, 0, 0, 'YERVIPINTO2017@GMAIL.COM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE IF NOT EXISTS `materia` (
  `id_materia` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(20) NOT NULL,
  `materia` varchar(200) NOT NULL,
  PRIMARY KEY (`id_materia`),
  UNIQUE KEY `codigo` (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`id_materia`, `codigo`, `materia`) VALUES
(1, 'PROGRA-I', 'PORGRAMACION I'),
(3, 'PROGRA-3', 'PROGRAMACION III'),
(5, 'PROGRA-2', 'PROGRAMACION II'),
(6, 'LGJPRO-1', 'LENGUAJE DE PROGRAMACION I'),
(7, 'BASEDT-1', 'BASE DE DATOS I'),
(8, 'BASEDT-2', 'BASE DE DATOS II');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE IF NOT EXISTS `profesores` (
  `id_profesor` int(11) NOT NULL AUTO_INCREMENT,
  `cedula_prof` int(11) NOT NULL,
  `nombre_prof` varchar(100) NOT NULL,
  `apellido_prof` varchar(100) NOT NULL,
  `sede` varchar(100) NOT NULL,
  `estatus` varchar(50) NOT NULL,
  PRIMARY KEY (`id_profesor`),
  UNIQUE KEY `cedula_prof` (`cedula_prof`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`id_profesor`, `cedula_prof`, `nombre_prof`, `apellido_prof`, `sede`, `estatus`) VALUES
(25, 16076390, 'YELIZAT ', 'MEDRANO', 'SAN JUAN DE LOS MORROS', 'activo'),
(28, 20247861, 'YORMAN LUBINO', 'PINTO REQUENA', 'SAN JUAN DE LOS MORROS', 'activo'),
(30, 15711095, 'YAMILET RAMONA', 'PINTO REQUENA', 'SAN JUAN DE LOS MORROS', 'activo'),
(31, 27665049, 'YERVI YOEL', 'PINTO REQUENA', 'SAN JUAN DE LOS MORROS', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prof_materias`
--

CREATE TABLE IF NOT EXISTS `prof_materias` (
  `id_prof_materia` int(11) NOT NULL AUTO_INCREMENT,
  `id_profesor` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `seccion` int(11) NOT NULL,
  `aula_lab` int(11) NOT NULL,
  `dia` varchar(20) NOT NULL,
  `hora1` varchar(10) NOT NULL,
  `hora2` varchar(10) NOT NULL,
  PRIMARY KEY (`id_prof_materia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `prof_materias`
--

INSERT INTO `prof_materias` (`id_prof_materia`, `id_profesor`, `id_materia`, `seccion`, `aula_lab`, `dia`, `hora1`, `hora2`) VALUES
(7, 31, 8, 1, 1, 'LUNES', '14:30', '16:00'),
(8, 28, 3, 2, 2, 'LUNES', '11:00', '13:00'),
(9, 31, 8, 1, 1, 'LUNES', '17:00', '18:00'),
(10, 31, 8, 1, 1, 'LUNES', '17:00', '18:00'),
(12, 31, 8, 1, 1, 'LUNES', '17:00', '18:00'),
(13, 31, 8, 1, 1, 'LUNES', '21:00', '22:00'),
(14, 31, 8, 2, 2, 'MARTES', '07:00', '08:00'),
(15, 31, 8, -1, 1, 'LUNES', '11:00', '13:00'),
(16, 31, 8, 1, 1, 'LUNES', '11:00', '13:00'),
(18, 31, 8, 1, 1, 'LUNES', '11:00', '12:30'),
(19, 31, 8, 1, 1, 'LUNES', '11:30', '12:30'),
(20, 31, 6, 1, 1, 'MARTES', '11:00', '14:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefono`
--

CREATE TABLE IF NOT EXISTS `telefono` (
  `id_telefono` int(11) NOT NULL AUTO_INCREMENT,
  `id_profesor` int(11) NOT NULL,
  `id_estudiante` int(11) NOT NULL,
  `id_responsable` int(11) NOT NULL,
  `telefono` varchar(11) NOT NULL,
  PRIMARY KEY (`id_telefono`),
  UNIQUE KEY `id_profesor` (`id_profesor`,`id_estudiante`,`id_responsable`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Volcado de datos para la tabla `telefono`
--

INSERT INTO `telefono` (`id_telefono`, `id_profesor`, `id_estudiante`, `id_responsable`, `telefono`) VALUES
(23, 25, 0, 0, '02464321010'),
(26, 28, 0, 0, '04149471038'),
(28, 30, 0, 0, '04149471038'),
(29, 31, 0, 0, '02464322258');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_admin`
--

CREATE TABLE IF NOT EXISTS `usuarios_admin` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `usuarios_admin`
--

INSERT INTO `usuarios_admin` (`id_usuario`, `nombre`, `usuario`, `password`, `tipo`) VALUES
(1, 'Yorman', 'admin', 'admin', 'administrador'),
(2, 'Profesor', 'usuario', 'usuario', 'normal');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

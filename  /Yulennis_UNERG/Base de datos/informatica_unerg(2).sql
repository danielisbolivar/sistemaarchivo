-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 11-05-2019 a las 13:28:21
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
-- Estructura de tabla para la tabla `asig_estudiantes`
--

CREATE TABLE IF NOT EXISTS `asig_estudiantes` (
  `id_asig_est` int(11) NOT NULL AUTO_INCREMENT,
  `id_profesor` int(11) NOT NULL,
  `id_estudiante` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `seccion` int(11) NOT NULL,
  PRIMARY KEY (`id_asig_est`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `asig_estudiantes`
--

INSERT INTO `asig_estudiantes` (`id_asig_est`, `id_profesor`, `id_estudiante`, `id_materia`, `seccion`) VALUES
(5, 31, 3, 8, 1),
(6, 31, 3, 6, 1),
(7, 31, 2, 6, 1),
(8, 31, 2, 8, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(100) NOT NULL,
  PRIMARY KEY (`id_categoria`),
  UNIQUE KEY `categoria` (`categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `categoria`) VALUES
(1, 'COMPUTACIÃ³N'),
(21, 'CONSTRUCCIÃ³N'),
(3, 'ELECTRICIDAD'),
(4, 'LIMPIEZA'),
(2, 'PAPELERIA');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Volcado de datos para la tabla `direccion`
--

INSERT INTO `direccion` (`id_direccion`, `id_profesor`, `id_estudiante`, `id_responsable`, `direccion`) VALUES
(19, 25, 0, 0, 'BARRIO LA VICTORIA AL FINAL DE LA CALLE'),
(22, 28, 0, 0, 'EL JOBO BARRIO LA VICTORIA'),
(24, 30, 0, 0, 'BARRIO LA VICTORIA URBANISMO'),
(25, 31, 0, 0, 'EL JOBO'),
(27, 0, 2, 0, 'SAN JUAN DE  LOS MORROS'),
(28, 0, 3, 0, 'SAN JUAN - VIA LOS LLANOS'),
(30, 0, 0, 2, 'SAN JUAN ...');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Volcado de datos para la tabla `email`
--

INSERT INTO `email` (`id_email`, `id_profesor`, `id_estudiante`, `id_responsable`, `email`) VALUES
(20, 25, 0, 0, 'CORO@GMAIL.COM'),
(23, 28, 0, 0, 'YORMANPINTO2011@GMAIL.COM'),
(25, 30, 0, 0, 'YAMILETPINTO2012@GMAIL.COM'),
(26, 31, 0, 0, 'YERVIPINTO2017@GMAIL.COM'),
(28, 0, 2, 0, 'INGPINTO@GMAIL.COM'),
(29, 0, 3, 0, 'YAMILETPINTO2010@GMAIL.COM'),
(31, 0, 0, 2, 'YERVIPINTO2014@GMAIL.COM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE IF NOT EXISTS `estudiantes` (
  `id_estudiante` int(11) NOT NULL AUTO_INCREMENT,
  `cedula_est` varchar(8) NOT NULL,
  `nombre_est` varchar(100) NOT NULL,
  `apellido_est` varchar(100) NOT NULL,
  `sede` varchar(100) NOT NULL,
  `estatus` varchar(10) NOT NULL,
  PRIMARY KEY (`id_estudiante`),
  UNIQUE KEY `cedula_est` (`cedula_est`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`id_estudiante`, `cedula_est`, `nombre_est`, `apellido_est`, `sede`, `estatus`) VALUES
(2, '20247861', 'YORMAN LUBINO', 'PINTO', 'SAN JUAN DE LOS MORROS', 'activo'),
(3, '15711095', 'YAMILET', 'PINTO', 'SAN JUAN DE LOS MORROS', 'activo');

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
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `id_categoria` int(11) NOT NULL,
  `codigo_producto` varchar(100) NOT NULL,
  `nombre_equipo` varchar(100) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `detalle` text NOT NULL,
  `cantidad` int(11) NOT NULL,
  `ubicacion` varchar(250) NOT NULL,
  `sede` varchar(50) NOT NULL,
  `fecha_registro` date NOT NULL,
  PRIMARY KEY (`id_producto`),
  UNIQUE KEY `codigo` (`codigo_producto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `id_categoria`, `codigo_producto`, `nombre_equipo`, `estado`, `detalle`, `cantidad`, `ubicacion`, `sede`, `fecha_registro`) VALUES
(4, 1, 'LGMON34', 'MONITOR PANTALLA PLANA', 'BUENO', 'MONITOR PANTALLA PLANA MARCA LG DE 19 PULGADAS', 10, 'OFICINA', 'SAN JUAN DE LOS MORROS', '2019-05-10');

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
  `id_responsable` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `seccion` int(11) NOT NULL,
  `aula_lab` int(11) NOT NULL,
  `dia` varchar(20) NOT NULL,
  `hora1` varchar(10) NOT NULL,
  `hora2` varchar(10) NOT NULL,
  PRIMARY KEY (`id_prof_materia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Volcado de datos para la tabla `prof_materias`
--

INSERT INTO `prof_materias` (`id_prof_materia`, `id_profesor`, `id_responsable`, `id_materia`, `seccion`, `aula_lab`, `dia`, `hora1`, `hora2`) VALUES
(7, 31, 0, 8, 1, 1, 'LUNES', '14:30', '16:00'),
(8, 28, 0, 3, 2, 2, 'LUNES', '11:00', '13:00'),
(9, 31, 0, 8, 1, 1, 'LUNES', '17:00', '18:00'),
(10, 31, 0, 8, 1, 1, 'LUNES', '17:00', '18:00'),
(12, 31, 0, 8, 1, 1, 'LUNES', '17:00', '18:00'),
(13, 31, 0, 8, 1, 1, 'LUNES', '21:00', '22:00'),
(14, 31, 0, 8, 2, 2, 'MARTES', '07:00', '08:00'),
(15, 31, 0, 8, -1, 1, 'LUNES', '11:00', '13:00'),
(16, 31, 0, 8, 1, 1, 'LUNES', '11:00', '13:00'),
(18, 31, 0, 8, 1, 1, 'LUNES', '11:00', '12:30'),
(19, 31, 0, 8, 1, 1, 'LUNES', '11:30', '12:30'),
(20, 31, 0, 6, 1, 1, 'MARTES', '11:00', '14:00'),
(22, 0, 2, 0, 0, 2, 'MARTES', '09:00', '10:00'),
(23, 0, 2, 0, 0, 1, 'MIERCOLES', '16:00', '18:30'),
(24, 0, 2, 0, 0, 2, 'MARTES', '19:00', '20:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responsables`
--

CREATE TABLE IF NOT EXISTS `responsables` (
  `id_responsable` int(11) NOT NULL AUTO_INCREMENT,
  `cedula_res` varchar(8) NOT NULL,
  `nombre_res` varchar(100) NOT NULL,
  `apellido_res` varchar(100) NOT NULL,
  `sede` text NOT NULL,
  `estatus` varchar(10) NOT NULL,
  PRIMARY KEY (`id_responsable`),
  UNIQUE KEY `cedula_res` (`cedula_res`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `responsables`
--

INSERT INTO `responsables` (`id_responsable`, `cedula_res`, `nombre_res`, `apellido_res`, `sede`, `estatus`) VALUES
(2, '27665049', 'YERVI', 'PINTO', 'SAN JUAN DE LOS MORROS', 'activo');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Volcado de datos para la tabla `telefono`
--

INSERT INTO `telefono` (`id_telefono`, `id_profesor`, `id_estudiante`, `id_responsable`, `telefono`) VALUES
(23, 25, 0, 0, '02464321010'),
(26, 28, 0, 0, '04149471038'),
(28, 30, 0, 0, '04149471038'),
(29, 31, 0, 0, '02464322258'),
(31, 0, 2, 0, '04149471038'),
(32, 0, 3, 0, '02464322258'),
(34, 0, 0, 2, '02464322258');

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

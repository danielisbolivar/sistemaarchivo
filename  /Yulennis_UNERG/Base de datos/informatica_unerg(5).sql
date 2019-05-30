-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 16-05-2019 a las 23:07:25
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `asig_estudiantes`
--

INSERT INTO `asig_estudiantes` (`id_asig_est`, `id_profesor`, `id_estudiante`, `id_materia`, `seccion`) VALUES
(10, 39, 8, 13, 1),
(11, 39, 7, 13, 1),
(12, 39, 6, 13, 1),
(13, 38, 11, 14, 1),
(14, 38, 10, 14, 1),
(15, 38, 9, 14, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE IF NOT EXISTS `asistencia` (
  `id_asistencia` int(11) NOT NULL AUTO_INCREMENT,
  `id_profesor` int(11) NOT NULL,
  `id_responsable` int(11) NOT NULL,
  `hora1` time NOT NULL,
  `hora2` time NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id_asistencia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `asistencia`
--

INSERT INTO `asistencia` (`id_asistencia`, `id_profesor`, `id_responsable`, `hora1`, `hora2`, `fecha`) VALUES
(1, 0, 0, '00:00:00', '00:00:00', '2019-05-16'),
(2, 0, 0, '00:00:00', '00:00:00', '2019-05-16'),
(3, 0, 0, '00:00:00', '00:00:00', '2019-05-16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia_est`
--

CREATE TABLE IF NOT EXISTS `asistencia_est` (
  `id_asistencia_est` int(11) NOT NULL AUTO_INCREMENT,
  `id_estudiante` int(11) NOT NULL,
  `id_profesor` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `seccion` int(11) NOT NULL,
  `fecha_registro` date NOT NULL,
  PRIMARY KEY (`id_asistencia_est`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `asistencia_est`
--

INSERT INTO `asistencia_est` (`id_asistencia_est`, `id_estudiante`, `id_profesor`, `id_materia`, `seccion`, `fecha_registro`) VALUES
(18, 11, 38, 14, 1, '2019-05-16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(100) NOT NULL,
  PRIMARY KEY (`id_categoria`),
  UNIQUE KEY `categoria` (`categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Volcado de datos para la tabla `direccion`
--

INSERT INTO `direccion` (`id_direccion`, `id_profesor`, `id_estudiante`, `id_responsable`, `direccion`) VALUES
(41, 38, 0, 0, 'AVENIDA BOLIVAR, SAN JUAN DE LOS MORROS'),
(42, 39, 0, 0, 'URBANIZACION DOÃ±A EVA, EN LOS EDIFICIOS SAN JUAN'),
(43, 0, 6, 0, 'BANCO OBRERO'),
(44, 0, 7, 0, 'EL SAN DIEGO'),
(45, 0, 8, 0, 'AVENIDAD LASO MARTI, RESIDENCIA AMARILLAS'),
(46, 0, 9, 0, 'EL JOBO BARRIO LA VICTORIA'),
(47, 0, 10, 0, 'BARRIO LA VICTORIA'),
(48, 0, 11, 0, 'SAN JUAN DE LOS MORROS');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Volcado de datos para la tabla `email`
--

INSERT INTO `email` (`id_email`, `id_profesor`, `id_estudiante`, `id_responsable`, `email`) VALUES
(42, 38, 0, 0, 'JAIRO2011@GMAIL.COM'),
(43, 39, 0, 0, 'GREGORISANCHEZ@GMAIL.COM'),
(44, 0, 6, 0, 'JHOINERC@GMAIL.COM'),
(45, 0, 7, 0, 'YONA.CASTI@GMAIL.COM'),
(46, 0, 8, 0, 'REINER_ZULETA@HOTMAIL.COM'),
(47, 0, 9, 0, 'YERVIPINTO2017@GMAIL.COM'),
(48, 0, 10, 0, 'YAMILETPINTO2012@GMAIL.COM'),
(49, 0, 11, 0, 'YESSICAPINTO@GMAIL.COM');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`id_estudiante`, `cedula_est`, `nombre_est`, `apellido_est`, `sede`, `estatus`) VALUES
(6, '26026400', 'JHOINER LUIS', 'CALCURIAN MOSQUEDA', 'SAN JUAN DE LOS MORROS', 'activo'),
(7, '26026601', 'JHONATAN RAFAEL', 'CASTILLO DIAZ', 'SAN JUAN DE LOS MORROS', 'activo'),
(8, '24976375', 'REINER ANDREY', 'ZULETA MANOSALVA', 'SAN JUAN DE LOS MORROS', 'activo'),
(9, '27665049', 'YERVI YOEL', 'PINTO REQUENA', 'SAN JUAN DE LOS MORROS', 'activo'),
(10, '15711095', 'YAMILET', 'PINTO', 'SAN JUAN DE LOS MORROS', 'activo'),
(11, '19472173', 'YESSICA', 'PINTO', 'SAN JUAN DE LOS MORROS', 'activo');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`id_materia`, `codigo`, `materia`) VALUES
(13, 'LENGPROI', 'LENGUAJE DE PORGRAMACION I'),
(14, 'PROGRAW1', 'PROGRAMACION 1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `id_categoria` int(11) NOT NULL,
  `codigo_producto` varchar(100) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `nombre_equipo` varchar(100) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `detalle` text NOT NULL,
  `cantidad` int(11) NOT NULL,
  `ubicacion` varchar(250) NOT NULL,
  `sede` varchar(50) NOT NULL,
  `fecha_registro` date NOT NULL,
  PRIMARY KEY (`id_producto`),
  UNIQUE KEY `codigo` (`codigo_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`id_profesor`, `cedula_prof`, `nombre_prof`, `apellido_prof`, `sede`, `estatus`) VALUES
(38, 15890998, 'JAIRO', 'MOLINA', 'SAN JUAN DE LOS MORROS', 'activo'),
(39, 14326754, 'GREGORI', 'SANCHEZ', 'SAN JUAN DE LOS MORROS', 'activo');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Volcado de datos para la tabla `prof_materias`
--

INSERT INTO `prof_materias` (`id_prof_materia`, `id_profesor`, `id_responsable`, `id_materia`, `seccion`, `aula_lab`, `dia`, `hora1`, `hora2`) VALUES
(37, 39, 0, 13, 1, 1, 'LUNES', '09:20', '11:20'),
(39, 38, 0, 14, 1, 1, 'LUNES', '07:00', '09:20');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Volcado de datos para la tabla `telefono`
--

INSERT INTO `telefono` (`id_telefono`, `id_profesor`, `id_estudiante`, `id_responsable`, `telefono`) VALUES
(45, 38, 0, 0, '04243224678'),
(46, 39, 0, 0, '02464321212'),
(47, 0, 6, 0, '04149472525'),
(48, 0, 7, 0, '04243225654'),
(49, 0, 8, 0, '04125674321'),
(50, 0, 9, 0, '02464322258'),
(51, 0, 10, 0, '04126754322'),
(52, 0, 11, 0, '04124567864');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_admin`
--

CREATE TABLE IF NOT EXISTS `usuarios_admin` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `id_profesor` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `usuarios_admin`
--

INSERT INTO `usuarios_admin` (`id_usuario`, `nombre`, `usuario`, `password`, `tipo`, `id_profesor`) VALUES
(1, 'Yorman', 'admin', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec', 'administrador', 0),
(4, 'JAIRO MOLINA', 'JAIRO2011@GMAIL.COM', '465f8e41a0c98c3123ce44b609799b38e337307c51f5e547fcce804a296a93bc147d31bd8077cf13db51c14d0965cbfedeb2466067a4d97f68e51b61bfe0b906', 'normal', 38),
(5, 'GREGORI', 'GREGORISANCHEZ@GMAIL.COM', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 'normal', 39);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

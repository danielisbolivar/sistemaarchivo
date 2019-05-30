-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 12-05-2019 a las 21:50:26
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Volcado de datos para la tabla `asistencia`
--

INSERT INTO `asistencia` (`id_asistencia`, `id_profesor`, `id_responsable`, `hora1`, `hora2`, `fecha`) VALUES
(18, 34, 0, '07:00:00', '09:20:00', '2019-05-12'),
(19, 34, 0, '09:20:00', '11:20:00', '2019-05-12'),
(20, 34, 0, '14:00:00', '15:20:00', '2019-05-12'),
(21, 32, 0, '07:00:00', '08:00:00', '2019-05-12'),
(22, 32, 0, '14:00:00', '15:50:00', '2019-05-12'),
(23, 32, 0, '08:00:00', '09:00:00', '2019-05-12'),
(24, 32, 0, '09:00:00', '10:00:00', '2019-05-12'),
(25, 32, 0, '10:00:00', '10:30:00', '2019-05-12'),
(26, 33, 0, '07:00:00', '07:30:00', '2019-05-12'),
(27, 33, 0, '07:30:00', '08:00:00', '2019-05-12'),
(28, 33, 0, '20:00:00', '20:30:00', '2019-05-12'),
(29, 0, 3, '07:30:00', '10:30:00', '2019-05-12');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Volcado de datos para la tabla `direccion`
--

INSERT INTO `direccion` (`id_direccion`, `id_profesor`, `id_estudiante`, `id_responsable`, `direccion`) VALUES
(31, 32, 0, 0, 'SAN JUAN DE LOS MORROS ESTADO GUARICO, BARRIO LA VICTORIA EL JOBO CALLEJON EL KINDER CASA NUMERO 5'),
(32, 33, 0, 0, 'BELLA VISTA, SAN JUAN DE LOS MORROS'),
(33, 34, 0, 0, 'CENTRO DE SAN JUAN DE LOS MORROS, AVENIDA BOLIVAR'),
(34, 0, 4, 0, 'AVENIDA LOS LLANOS'),
(35, 0, 5, 0, 'CENTRO DE SAN JUAN'),
(36, 0, 0, 3, 'BARRIO LA VICTORIA'),
(37, 0, 0, 4, 'EL JOBO');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Volcado de datos para la tabla `email`
--

INSERT INTO `email` (`id_email`, `id_profesor`, `id_estudiante`, `id_responsable`, `email`) VALUES
(32, 32, 0, 0, 'YORMANPINTO2011@GMAIL.COM'),
(33, 33, 0, 0, 'ARGENISMENDOZA@GMAIL.COM'),
(34, 34, 0, 0, 'JAIROMOLINA@GMAIL.COM'),
(35, 0, 4, 0, 'LOPEZJOSE@GMAIL.COM'),
(36, 0, 5, 0, 'VALENTINA@GMAIL.COM'),
(37, 0, 0, 3, 'ARELIS@GMAIL.COM'),
(38, 0, 0, 4, 'LUBINO@GMAIL.COM');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`id_estudiante`, `cedula_est`, `nombre_est`, `apellido_est`, `sede`, `estatus`) VALUES
(4, '27665049', 'JOSE', 'LOPEZ', 'SAN JUAN DE LOS MORROS', 'activo'),
(5, '27665309', 'VALENTINA', 'VIÃ±A', 'SAN JUAN DE LOS MORROS', 'activo');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`id_materia`, `codigo`, `materia`) VALUES
(9, 'PROGRA-I', 'PORGRAMACION I'),
(10, 'PROGRA-II', 'PORGRAMACION II'),
(11, 'PROGRA-III', 'PROGRAMACION III');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`id_profesor`, `cedula_prof`, `nombre_prof`, `apellido_prof`, `sede`, `estatus`) VALUES
(32, 20247861, 'YORMAN LUBINO', 'PINTO REQUENA', 'SAN JUAN DE LOS MORROS', 'activo'),
(33, 152345643, 'ARGENIS ', 'MENDOZA ', 'SAN JUAN DE LOS MORROS', 'activo'),
(34, 102321290, 'JAIRO', 'MOLINA', 'SAN JUAN DE LOS MORROS', 'activo');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Volcado de datos para la tabla `prof_materias`
--

INSERT INTO `prof_materias` (`id_prof_materia`, `id_profesor`, `id_responsable`, `id_materia`, `seccion`, `aula_lab`, `dia`, `hora1`, `hora2`) VALUES
(29, 34, 0, 9, 1, 1, 'LUNES', '07:00', '09:20'),
(30, 34, 0, 9, 1, 1, 'MIERCOLES', '07:00', '09:00'),
(31, 32, 0, 10, 1, 1, 'LUNES', '09:20', '11:20'),
(32, 32, 0, 10, 1, 1, 'MIERCOLES', '09:20', '11:20'),
(33, 33, 0, 11, 1, 1, 'MARTES', '07:00', '09:20'),
(34, 33, 0, 11, 1, 1, 'JUEVES', '07:00', '09:20'),
(35, 0, 3, 0, 0, 1, 'LUNES', '07:00', '08:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `responsables`
--

INSERT INTO `responsables` (`id_responsable`, `cedula_res`, `nombre_res`, `apellido_res`, `sede`, `estatus`) VALUES
(3, '8784027', 'ARELIS COROMOTO', 'REQUENA', 'SAN JUAN DE LOS MORROS', 'activo'),
(4, '7284074', 'LUBINO  CELESTINO', 'PINTO ', 'SAN JUAN DE LOS MORROS', 'activo');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Volcado de datos para la tabla `telefono`
--

INSERT INTO `telefono` (`id_telefono`, `id_profesor`, `id_estudiante`, `id_responsable`, `telefono`) VALUES
(35, 32, 0, 0, '04149471038'),
(36, 33, 0, 0, '04245698765'),
(37, 34, 0, 0, '04123908989'),
(38, 0, 4, 0, '02464322258'),
(39, 0, 5, 0, '04242321212'),
(40, 0, 0, 3, '02464322258'),
(41, 0, 0, 4, '04149471038');

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

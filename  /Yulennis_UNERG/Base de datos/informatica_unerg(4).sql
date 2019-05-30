-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 15-05-2019 a las 11:35:03
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(100) NOT NULL,
  PRIMARY KEY (`id_categoria`),
  UNIQUE KEY `categoria` (`categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `usuarios_admin`
--

INSERT INTO `usuarios_admin` (`id_usuario`, `nombre`, `usuario`, `password`, `tipo`, `id_profesor`) VALUES
(1, 'Yorman', 'admin', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec', 'administrador', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

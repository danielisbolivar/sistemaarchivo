-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 22-05-2019 a las 13:22:58
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `asig_estudiantes`
--

INSERT INTO `asig_estudiantes` (`id_asig_est`, `id_profesor`, `id_estudiante`, `id_materia`, `seccion`) VALUES
(1, 4, 17, 1, 1),
(2, 4, 18, 1, 1),
(3, 4, 23, 1, 1),
(4, 4, 21, 1, 1),
(5, 4, 20, 1, 1),
(6, 4, 19, 1, 1),
(7, 4, 16, 1, 1),
(8, 4, 11, 1, 0),
(9, 4, 25, 1, 1),
(10, 4, 4, 1, 1),
(11, 1, 22, 2, 1),
(12, 1, 14, 2, 1),
(13, 1, 12, 2, 1),
(14, 1, 15, 2, 1),
(15, 1, 28, 2, 1),
(16, 1, 24, 2, 1),
(17, 1, 8, 2, 1),
(18, 1, 9, 2, 1),
(19, 1, 10, 2, 1),
(20, 4, 0, 1, 1),
(21, 5, 5, 2, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `asistencia`
--

INSERT INTO `asistencia` (`id_asistencia`, `id_profesor`, `id_responsable`, `hora1`, `hora2`, `fecha`) VALUES
(1, 4, 0, '07:00:00', '09:20:00', '2019-05-18'),
(2, 0, 1, '09:20:00', '11:20:00', '2019-05-18'),
(3, 4, 0, '11:00:00', '13:00:00', '2019-05-19'),
(4, 4, 0, '10:00:00', '11:20:00', '2019-05-19'),
(5, 0, 1, '09:00:00', '12:00:00', '2019-05-19');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Volcado de datos para la tabla `asistencia_est`
--

INSERT INTO `asistencia_est` (`id_asistencia_est`, `id_estudiante`, `id_profesor`, `id_materia`, `seccion`, `fecha_registro`) VALUES
(1, 28, 1, 2, 1, '2019-05-18'),
(2, 24, 1, 2, 1, '2019-05-18'),
(3, 22, 1, 2, 1, '2019-05-18'),
(4, 14, 1, 2, 1, '2019-05-18'),
(5, 12, 1, 2, 1, '2019-05-18'),
(6, 10, 1, 2, 1, '2019-05-18'),
(7, 28, 1, 2, 1, '2019-05-19'),
(8, 24, 1, 2, 1, '2019-05-19'),
(9, 14, 1, 2, 1, '2019-05-19'),
(10, 12, 1, 2, 1, '2019-05-19'),
(11, 10, 1, 2, 1, '2019-05-19'),
(12, 9, 1, 2, 1, '2019-05-19'),
(13, 8, 1, 2, 1, '2019-05-19'),
(14, 25, 4, 1, 1, '2019-05-19'),
(15, 23, 4, 1, 1, '2019-05-19'),
(16, 21, 4, 1, 1, '2019-05-19'),
(17, 20, 4, 1, 1, '2019-05-19'),
(18, 19, 4, 1, 1, '2019-05-19'),
(19, 18, 4, 1, 1, '2019-05-19'),
(20, 17, 4, 1, 1, '2019-05-19'),
(21, 23, 4, 1, 1, '2019-05-20'),
(22, 21, 4, 1, 1, '2019-05-20'),
(23, 20, 4, 1, 1, '2019-05-20'),
(24, 17, 4, 1, 1, '2019-05-20'),
(25, 16, 4, 1, 1, '2019-05-20'),
(26, 4, 4, 1, 1, '2019-05-20'),
(27, 23, 4, 1, 1, '2019-05-22'),
(28, 21, 4, 1, 1, '2019-05-22'),
(29, 20, 4, 1, 1, '2019-05-22'),
(30, 18, 4, 1, 1, '2019-05-22'),
(31, 16, 4, 1, 1, '2019-05-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(100) NOT NULL,
  PRIMARY KEY (`id_categoria`),
  UNIQUE KEY `categoria` (`categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `categoria`) VALUES
(2, 'COMPUTACION'),
(3, 'PAPELERIA');

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

--
-- Volcado de datos para la tabla `direccion`
--

INSERT INTO `direccion` (`id_direccion`, `id_profesor`, `id_estudiante`, `id_responsable`, `direccion`) VALUES
(1, 0, 1, 0, 'URBANIZACIÃ“N CALLE MERIDA DETRAS DE LA FUNDACION DEL NIÃ‘O IZQUIERDA AVENIDA EZEQUIEL ZAMORA'),
(2, 0, 2, 0, 'BARRIO LA ESMERALDA DERECHA CALLE 3. IZQUIERDA CALLE 2.'),
(3, 0, 3, 0, 'BARRIO LA FLORIDA SECTOR 3 DERECHA CALLE PLAZA. IZQUIERDA CALLE LIBERTADOR'),
(4, 0, 4, 0, 'SECTOR LOS MANGUITOS DERECHA CARRETERA VIEJA CARACAS BARUTA. IZQUIERDA CARRETERA VIEJA CARACAS BARUTA'),
(5, 0, 5, 0, 'SECTOR POLVORIM FRENTE AVENIDA ROMULO BETANCOURT. IZQUIERDA CALLE PRINCIPAL URBANIZACION MARCOS PEREZ'),
(6, 0, 6, 0, 'URBANIZACIÃ“N: VISTA AL SOL. FRENTE AVENIDA PRINCIPAL RUTA 1 VISTA AL SOL.'),
(7, 0, 7, 0, 'URBANIZACIÃ“N RORAIMA DERECHA CALLE AVILA. IZQUIERDA CALLE CHURUMERU.'),
(8, 0, 8, 0, 'BARRIO EL PARAISO DERECHA CALLE PRINCIPAL. IZQUIERDA CALLE 3'),
(9, 0, 9, 0, 'SECTOR CASCO CENTRAL DEL PUEBLO SAN JUAN DERECHA CALLE NUEVA. IZQUIERDA CALLE BAJANDO EL CEMENTERIO'),
(10, 0, 10, 0, 'SECTOR TINAPUEY II IZQUIERDA CALLE FINAL DE LA CALLE TINAPUEY II. FRENTE CALLE PRINCIPAL DE TINAPUEY II.'),
(11, 0, 11, 0, 'SECTOR PAVIA ABAJO DERECHA CALLE LA SELVA. FRENTE CALLE LA SELVA.'),
(12, 0, 12, 0, 'SECTOR ARIA BLANCO DERECHA AVENIDA CARACAS. IZQUIERDA CALLE SENDERO SUR.'),
(13, 0, 13, 0, 'SECTOR: EL SOCORRO. FRENTE CALLE EL SOCORRO EL MANGO. IZQUIERDA CALLE EL MANGO. DERECHA CARRETERA NACIONAL CAUCAGUA ARAGUITA VIA EL TUY'),
(14, 0, 14, 0, 'SECTOR LAS PALMAS IZQUIERDA AVENIDA 16. FRENTE AVENIDA 17 AL FONDO DE BALANCIN CASA'),
(15, 0, 15, 0, 'BARRIO BARRIO OBRERO AVENIDA 97 NUMERO 60B_53 FRENTE AVENIDA 97'),
(16, 0, 16, 0, 'BARRIO LA ANTENA DERECHA CALLE 1. IZQUIERDA CALLE 2.'),
(17, 0, 17, 0, 'BARRIO EL NACIONAL, PARTE BAJA. IZQUIERDA CALLE PRINCIPAL Y PARQUE DEL NACIONAL.'),
(18, 0, 18, 0, 'SECTOR CENTRO DERECHA CALLE PAGALLOS. IZQUIERDA CALLE VIGIRIMA'),
(19, 0, 19, 0, 'SECTOR 4 DERECHA CALLE CASAS. IZQUIERDA CALLE CASAS.'),
(20, 0, 20, 0, 'SECTOR EL CHAPARRAL IZQUIERDA CALLE BRASIL. FRENTE CALLE COLOMBIA.'),
(21, 0, 21, 0, 'BARRIO GUAMACHITO DERECHA CALLE LIBERTAD. IZQUIERDA CALLE 5 ENTRADAS'),
(22, 0, 22, 0, 'BARRIO LAS MINITAS FRENTE CALLE MARA. DERECHA CALLEJÃ“N 3.'),
(23, 0, 23, 0, 'URBANIZACIÃ“N RADIO CARACAS FRENTE AVENIDA INTERCOMUNAL DEL VALLE.'),
(24, 0, 24, 0, 'BARRIO CECILIA CUELLO AVENIDA 105A NUMERO 57A_10 FRENTE AVENIDA 105A.'),
(25, 0, 25, 0, 'URBANIZACIÃ“N MIRANDA LA PLATA II DERECHA AVENIDA SANTA BARBARA'),
(26, 0, 26, 0, 'URBANIZACIÃ“N ALTOS DEL SOL AMADO FRENTE AVENIDA BOLIVAR. IZQUIERDA CARRETERA VIA AL AEREOPUERTO.'),
(27, 0, 27, 0, 'BARRIO LOS REYES MAGOS DERECHA AVENIDA 5. FRENTE AVENIDA MILAGRO NORTE'),
(29, 0, 29, 0, 'SECTOR LA BOMBITA FRENTE CALLE PRINCIPAL. DERECHA PROLONGACIÃ“N CASERIO.'),
(30, 0, 30, 0, 'SECTOR SIMON BOLIVAR DERECHA AVENIDA 62. IZQUIERDA AVENIDA 63.'),
(32, 2, 0, 0, 'AVENIDA BOLIBAR'),
(33, 3, 0, 0, 'URB. DOÃ±A EVA'),
(34, 4, 0, 0, 'VISTA HERMOSA'),
(35, 0, 0, 1, 'AVENIDA LOS LLANOS'),
(36, 0, 0, 2, 'AVENIDA LOS LLANOS'),
(38, 5, 0, 0, 'URBANIZACION LAS AVEJITAS '),
(39, 6, 0, 0, 'AVENIDA LOS LLANOS'),
(40, 7, 0, 0, 'CENTRO DE ORTIZ');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Volcado de datos para la tabla `email`
--

INSERT INTO `email` (`id_email`, `id_profesor`, `id_estudiante`, `id_responsable`, `email`) VALUES
(1, 0, 1, 0, 'DELGADOAPONTE@GMAIL.COM'),
(2, 0, 2, 0, 'REINDERLEAL@GMAIL.COM'),
(3, 0, 3, 0, 'JOJANA@HOTMAIL.COM'),
(4, 0, 4, 0, 'JOSECARDOZO@GMAIL.COM'),
(5, 0, 5, 0, 'RIVEROTOVAR@GMAIL.COM'),
(6, 0, 6, 0, 'LUISELIZ@HOTMAIL.COM'),
(7, 0, 7, 0, 'HABIB@YOHAOO.COM'),
(8, 0, 8, 0, 'JAIRODEJESUS@HOTMAIL.COM'),
(9, 0, 9, 0, 'ANAMILENA@HOTMAIL.COM'),
(10, 0, 10, 0, 'CARLOSVILLAREAL@GMAIL.COM'),
(11, 0, 11, 0, 'EDITH@HOTMAIL.COM'),
(12, 0, 12, 0, 'EDGARJOSE@HOTMAIL.COM'),
(13, 0, 13, 0, 'CUICAS@HOTMAIL.COM'),
(14, 0, 14, 0, 'FINOLMALDONADO@GMAIL.COM'),
(15, 0, 15, 0, 'OROZCO@GMAIL.COM'),
(16, 0, 16, 0, 'ALVAREZPEREZ@HOTMAIL.COM'),
(17, 0, 17, 0, 'FERNANDEZ@HOTMAIL.COM'),
(18, 0, 18, 0, 'LAREZLUIS@HOTMAIL.COM'),
(19, 0, 19, 0, 'XIORISMAR@GMAIL.COM'),
(20, 0, 20, 0, 'SOLANGE@GMAIL.COM'),
(21, 0, 21, 0, 'DIONICIO@HOTMAIL.COM'),
(22, 0, 22, 0, 'NACIRA@GMAIL.COM'),
(23, 0, 23, 0, 'EDDANAY@GMAIL.COM'),
(24, 0, 24, 0, 'LUISDAVID@HOTMAIL.COM'),
(25, 0, 25, 0, 'FIORABANTE@GMAIL.COM'),
(26, 0, 26, 0, 'ANGELICATOVAR@GMAIL.COM'),
(27, 0, 27, 0, 'FALCOCASTILLO@GMAIL.COM'),
(29, 0, 29, 0, 'LUISALBERTOHOYOS@HOTMAIL.COM'),
(30, 0, 30, 0, 'PALMAGUETTE@HOTMAIL.COM'),
(32, 2, 0, 0, 'JAIROMOLINA@GMAIL.COM'),
(33, 3, 0, 0, 'GREGORISANCHEZ@GMAIL.COM'),
(34, 4, 0, 0, 'ARGENIS@GMAIL.COM'),
(35, 0, 0, 1, 'LOPEZJOSE@GMAIL.COM'),
(36, 0, 0, 2, 'CARLOS@HOTMAIL.COM'),
(38, 5, 0, 0, 'MIGUELPADRON@GMAIL.COM'),
(39, 6, 0, 0, 'FERNANDO@GMAIL.COM'),
(40, 7, 0, 0, 'CARPIO@GMAIL.COM');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`id_estudiante`, `cedula_est`, `nombre_est`, `apellido_est`, `sede`, `estatus`) VALUES
(1, '18906543', 'LEONARDO ANTONIO', 'DELGADO APONTE', 'SAN JUAN DE LOS MORROS', 'activo'),
(2, '19865432', 'REINDER OSCAR', 'LEAL MENDOZA', 'SAN JUAN DE LOS MORROS', 'activo'),
(3, '19862863', 'JOJANA CAROLINA', 'ARTEAGA RIVAS', 'SAN JUAN DE LOS MORROS', 'activo'),
(4, '20654321', 'JOSE MANUEL', 'CARDOZO TORRES', 'SAN JUAN DE LOS MORROS', 'activo'),
(5, '20465721', 'YETSENIA YOHELY', 'RIVERO TOVAR', 'SAN JUAN DE LOS MORROS', 'activo'),
(6, '21123456', 'LUISELIZ GABRIANIS', 'VASQUEZ MORENO', 'SAN JUAN DE LOS MORROS', 'activo'),
(7, '21234234', 'MARELYS TERESA', 'HABIB LOLLINO', 'SAN JUAN DE LOS MORROS', 'activo'),
(8, '22678666', 'JAIRO DE JESUS', 'GUERRERO QUINTERO', 'SAN JUAN DE LOS MORROS', 'activo'),
(9, '22656789', 'ANA MILENA', 'CARREÃ‘O', 'SAN JUAN DE LOS MORROS', 'activo'),
(10, '22544544', 'CARLOS GILBERTO', 'VILLARREAL MATERAN', 'SAN JUAN DE LOS MORROS', 'activo'),
(11, '24567654', 'EDITH YOHAN', 'MOGOLLON CASTILLO', 'ORTIZ', 'activo'),
(12, '23564787', 'EDGAR JOSE', 'ARRAEZ OROPEZA', 'ORTIZ', 'activo'),
(13, '24543212', 'RICHARD EMMANUEL', 'CUICAS ALVARADO', 'ORTIZ', 'activo'),
(14, '24432456', 'JOENGRYS YENILETH', 'FINOL MALDONADO', 'ORTIZ', 'activo'),
(15, '23456872', 'CARLOS ADOLFO', 'OROZCO OROZCO', 'ORTIZ', 'activo'),
(16, '24567659', 'GENESIS CAROLINA', 'ALVAREZ PEREZ', 'ORTIZ', 'activo'),
(17, '27098659', 'FRANYELYN JOSEFINA', 'FERNANDEZ FUENTES', 'ORTIZ', 'activo'),
(18, '26543789', 'LUIS MARIO', 'LAREZ CAMPOS', 'ORTIZ', 'activo'),
(19, '25543789', 'XIORISMAR DANIELA', 'MARCANO CABRERA', 'ORTIZ', 'activo'),
(20, '25567789', 'SOLANGE MARIA', 'MATA PADRON', 'ORTIZ', 'activo'),
(21, '25675432', 'DIONICIO JOSE', 'TORRES MORENO', 'MELLADO', 'activo'),
(22, '24456533', 'NACIRA DEL SOCORRO', 'VALLE PUENTE', 'MELLADO', 'activo'),
(23, '25676432', 'EDDANAY ', 'HERNANDEZ VERDUD', 'MELLADO', 'activo'),
(24, '23454321', 'LUIS DAVID', 'TERAN ECHETO', 'MELLADO', 'activo'),
(25, '24566321', 'FIORABANTE DI', 'GIOVANNANTONIO ELETERE', 'MELLADO', 'activo'),
(26, '19765439', 'ANGELICA MARIA', 'SULBARAN TOVAR', 'MELLADO', 'activo'),
(27, '19766543', 'JOSE LUIS', 'FALCO CASTILLO', 'MELLADO', 'activo'),
(29, '22456789', 'LUIS ALBERTO', 'HOYOS PEREZ', 'MELLADO', 'activo'),
(30, '22456779', 'MONICA EDITH', 'PALMA GUETTE', 'MELLADO', 'activo');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`id_materia`, `codigo`, `materia`) VALUES
(1, 'PROGRA-I', 'PROGRAMACION I'),
(2, 'LENGPR-O', 'LENGUAJE DE PROGRAMACION I');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `observaciones`
--

CREATE TABLE IF NOT EXISTS `observaciones` (
  `id_observaciones` int(11) NOT NULL AUTO_INCREMENT,
  `id_profesor` int(11) NOT NULL,
  `id_responsable` int(11) NOT NULL,
  `seccion` int(11) NOT NULL,
  `observaciones` text NOT NULL,
  `fecha_registro` date NOT NULL,
  PRIMARY KEY (`id_observaciones`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `observaciones`
--

INSERT INTO `observaciones` (`id_observaciones`, `id_profesor`, `id_responsable`, `seccion`, `observaciones`, `fecha_registro`) VALUES
(2, 4, 0, 1, 'NINGUNA ESTAMOS EN PRUEBA...', '2019-05-19');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `id_categoria`, `codigo_producto`, `marca`, `nombre_equipo`, `estado`, `detalle`, `cantidad`, `ubicacion`, `sede`, `fecha_registro`) VALUES
(1, 2, 'DISCOSATA320GB', 'SATA', 'DISCO DURO SATA DE LAPTOP DE 320GB', 'BUENO', 'DISCO DURO DE LAPTOP CANAIMA DE 320GB', 10, 'LABORATORIO 1', 'SAN JUAN DE LOS MORROS', '2019-05-18'),
(2, 3, 'HOJAOFICIO234', 'MAPE', 'RESMA DE PAPEL OFICIO', 'BUENO', 'CAJA DE RESMA DE PAPEL OFICIO, CADA CADA TRAE 10 RESMA DE PAPEL, EN TOTAL SERIA 120 RESMA', 120, 'OFICINA', 'SAN JUAN DE LOS MORROS', '2019-05-18'),
(3, 2, 'TECH-FZK', 'SONEVIEW', 'TECLADO USB', 'BUENO', 'TECLADO USB SONEVIEW', 10, 'LABORATORIO 1', 'SAN JUAN DE LOS MORROS', '2019-05-18'),
(4, 2, 'FUENTEPW', 'NUSE', 'FUENTE DE PODER 430W', 'EN REPARACION', 'FUENTE DE PODER 430W PARA OC DE ESCRITORIO, ', 8, 'LABORATORIO 1', 'SAN JUAN DE LOS MORROS', '2019-05-18'),
(5, 2, 'MONITORLG', 'LG', 'MONITOR 19 PULGADAS LG', 'BUENO', 'MONITOR LG DE 19 PULGADAS', 18, 'LABORATORIO 1', 'SAN JUAN DE LOS MORROS', '2019-05-18'),
(6, 2, 'IMPRESO345', 'HP', 'IMPRESORAS LASER NEGRO', 'BUENO', 'IMPRESORAS LASER NEGRO', 3, 'OFICINA', 'SAN JUAN DE LOS MORROS', '2019-05-18'),
(7, 2, 'CPU', 'SONEVIEW', 'CPU', 'BUENO', 'CPU SONEVIEW', 18, 'LABORATORIO 1', 'SAN JUAN DE LOS MORROS', '2019-05-18'),
(8, 2, 'CPUHP', 'HP', 'CPU HP', 'BUENO', 'CPU HP', 3, 'OFICINA', 'SAN JUAN DE LOS MORROS', '2019-05-18'),
(9, 2, 'TECLADO SONEVIEW', 'SONEVIEW', 'TECLADO USB', 'EN REPARACION', 'TECLADO EN REPARACION SONEVIEW', 8, 'LABORATORIO 1', 'SAN JUAN DE LOS MORROS', '2019-05-18'),
(10, 2, 'MOUSE', 'HP', 'MOUSE USB', 'BUENO', 'MOUSE USB HP', 18, 'LABORATORIO 1', 'SAN JUAN DE LOS MORROS', '2019-05-18'),
(11, 2, 'DFDGDF', 'SONEVIEW', 'REGULADOR DE CORRIENTE', 'BUENO', 'REGULADOR DE CORRIENTE ', 20, 'LABORATORIO 1', 'SAN JUAN DE LOS MORROS', '2019-05-19');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`id_profesor`, `cedula_prof`, `nombre_prof`, `apellido_prof`, `sede`, `estatus`) VALUES
(2, 14676532, 'JAIRO', 'MOLINA', 'ORTIZ', 'activo'),
(3, 53637544, 'GREGORI', 'SANCHEZ', 'MELLADO', 'activo'),
(4, 26026400, 'ARGENIS', 'MENDOZA', 'SAN JUAN DE LOS MORROS', 'activo'),
(5, 12546786, 'MIGUEL JOSE', 'PADRON', 'SAN JUAN DE LOS MORROS', 'activo'),
(6, 20247861, 'FERNANDO', 'HERNANDEZ', 'MELLADO', 'activo'),
(7, 23454322, 'CARPIO', 'JIMENES', 'MELLADO', 'activo');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `prof_materias`
--

INSERT INTO `prof_materias` (`id_prof_materia`, `id_profesor`, `id_responsable`, `id_materia`, `seccion`, `aula_lab`, `dia`, `hora1`, `hora2`) VALUES
(1, 4, 0, 1, 1, 1, 'LUNES', '07:00', '09:20'),
(2, 1, 0, 2, 1, 1, 'LUNES', '09:20', '10:50'),
(5, 4, 0, 2, 2, 2, 'LUNES', '19:00', '09:20'),
(6, 0, 2, 0, 0, 1, 'VIERNES', '13:00', '15:00'),
(7, 5, 0, 2, 1, 1, 'MIERCOLES', '10:20', '11:50');

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
(1, '25436785', 'JOSE', 'LOPEZ', 'SAN JUAN DE LOS MORROS', 'activo'),
(2, '23476544', 'CARLOS ENRIQUE', 'QUINTANA', 'ORTIZ', 'activo');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Volcado de datos para la tabla `telefono`
--

INSERT INTO `telefono` (`id_telefono`, `id_profesor`, `id_estudiante`, `id_responsable`, `telefono`) VALUES
(1, 0, 1, 0, '04149471038'),
(2, 0, 2, 0, '02464322258'),
(3, 0, 3, 0, '02464322258'),
(4, 0, 4, 0, '04149471038'),
(5, 0, 5, 0, '04243224668'),
(6, 0, 6, 0, '04243224668'),
(7, 0, 7, 0, '04149471038'),
(8, 0, 8, 0, '04123456789'),
(9, 0, 9, 0, '02464322258'),
(10, 0, 10, 0, '04124567864'),
(11, 0, 11, 0, '02464322258'),
(12, 0, 12, 0, '04123456789'),
(13, 0, 13, 0, '04149471038'),
(14, 0, 14, 0, '04243224668'),
(15, 0, 15, 0, '04149876543'),
(16, 0, 16, 0, '04243224660'),
(17, 0, 17, 0, '04126781534'),
(18, 0, 18, 0, '04126754322'),
(19, 0, 19, 0, '04243224669'),
(20, 0, 20, 0, '04123456789'),
(21, 0, 21, 0, '04124567864'),
(22, 0, 22, 0, '04243224668'),
(23, 0, 23, 0, '02464321212'),
(24, 0, 24, 0, '04243224660'),
(25, 0, 25, 0, '04126781534'),
(26, 0, 26, 0, '04149876543'),
(27, 0, 27, 0, '02464321212'),
(29, 0, 29, 0, '04245675432'),
(30, 0, 30, 0, '04243224660'),
(32, 2, 0, 0, '04123456789'),
(33, 3, 0, 0, '04243224668'),
(34, 4, 0, 0, '04149471038'),
(35, 0, 0, 1, '04245643232'),
(36, 0, 0, 2, '04243224668'),
(38, 5, 0, 0, '04265487342'),
(39, 6, 0, 0, '02464322258'),
(40, 7, 0, 0, '04123456789');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_admin`
--

CREATE TABLE IF NOT EXISTS `usuarios_admin` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `pwd` varchar(250) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `id_profesor` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `usuarios_admin`
--

INSERT INTO `usuarios_admin` (`id_usuario`, `nombre`, `usuario`, `password`, `pwd`, `tipo`, `id_profesor`) VALUES
(1, 'YORMAN  PINTO', 'ADMIN', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec', 'admin', 'administrador', 0),
(4, 'JAIRO MOLINA', 'JAIRO2011@GMAIL.COM', '465f8e41a0c98c3123ce44b609799b38e337307c51f5e547fcce804a296a93bc147d31bd8077cf13db51c14d0965cbfedeb2466067a4d97f68e51b61bfe0b906', 'jairo', 'normal', 38),
(5, 'GREGORI', 'GREGORISANCHEZ@GMAIL.COM', '381195b502528b0afb2da89b35c14d03c4b26f5a9ca002a48d98fc394ac6b9233ffd4c7c089e3d01e69b9d33e2abf5f24bf320fb67451203657db466fb3b3b1b', 'gregori', 'normal', 39),
(6, 'YORMAN ', 'YORMANPINTO2011@GMAIL.COM', '4cd3caa98043dc1c45a4bd06671cfcf5a5283687348573f7bf60739c0d676d597eabdd502947ede5a5bf3dc36477403e4ed369bb47c23860e79592c73020364e', '20247861', 'normal', 1),
(7, 'JAIRO', 'JAIROMOLINA@GMAIL.COM', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', '', 'normal', 2),
(9, 'ARGENIS', 'ARGENIS@GMAIL.COM', '91ac54355d997d6ed0eed1e6a2016cb8152d45563b95fe4432ede2e0b2b4cc98d22935ff7d5d0196e0833d6741f795b7e15f1520ba704d4dc3538c19fcefb9b7', 'argenis', 'normal', 4),
(10, 'MIGUEL JOSE', 'MIGUELPADRON@GMAIL.COM', 'e1fc7a4313def98ae5303b0448c89d9a5126f3239608950859f3ea6fdeb8b19f6f7c103ecf97700be851cfbf8cda756c0929498021c675c643809eeeb4ebcbda', '', 'normal', 5),
(11, 'FERNANDO', 'FERNANDO@GMAIL.COM', '936238025aeb5e6812b3b899259c64a2ba41982d75c2eea08f35be315826e9a4506ee69a41023c3a1925868b998c437480f6ae4df7b3f204053b290b9b50193a', '', 'normal', 6),
(12, 'CARPIO', 'CARPIO@GMAIL.COM', '86c4774ca83cec31d140ea696f31d8fd63b536b38a33cd82bceb8738d7fdd02c1edce10039a1195add2c48dc64dece981bb79ae5c85c747510cf5ebc6f458e9b', 'carpio', 'normal', 7);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

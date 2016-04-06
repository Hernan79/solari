-- phpMyAdmin SQL Dump
-- version 3.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 12-07-2002 a las 11:49:52
-- Versión del servidor: 5.0.70
-- Versión de PHP: 5.2.10-pl0-gentoo

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Base de datos: `solari`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE IF NOT EXISTS `alumnos` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `nit` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `fechan` date NOT NULL,
  `folio` varchar(255) NOT NULL,
  `curso` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Volcar la base de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `nombre`, `apellido`, `nit`, `telefono`, `fechan`, `folio`, `curso`, `estado`) VALUES
(17, 'DIEGO', 'MARTINEZ', '123333', '667873', '1978-05-07', '45678', '7', 's'),
(18, ' JORGE', 'VASQUEZ J.', '1128059636', '6679159', '2013-09-19', '10203', '11', 's'),
(19, 'MINDA', 'HERNANDEZ SALVADOR', '1244973778', '6678176', '2013-09-19', '82837', '11', 's'),
(20, 'FABIOLA', 'HERNANDEZ', '233948', '6637749 - 17728839', '2013-09-19', '388477', '1', 's'),
(21, 'OSCAR', 'GUITIERREZ', '28839948', '7738998', '2013-09-19', '388499', '1', 's'),
(22, 'FABIAN', 'GARCIAS', '3949948', '2223333', '2013-09-19', '1212', '1', 's'),
(23, 'TERESA', 'JULIO JULIO', '6578399', '66782776', '2013-09-19', '987', '11', 's'),
(24, 'CESAR ANDRES', 'GARCIAS LOPEZ', '2345564', '6673847', '2013-09-19', '4567', '1', 's'),
(25, 'ANDRES', 'LOPEZ', '9887887', '6671836 - 413 8763 7789', '2013-09-19', '1234', '11', 's');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reg_facturas`
--

CREATE TABLE IF NOT EXISTS `reg_facturas` (
  `id` int(11) NOT NULL auto_increment,
  `fecha_sist` date NOT NULL,
  `factura` varchar(255) collate utf8_spanish_ci NOT NULL,
  `ne` varchar(255) collate utf8_spanish_ci NOT NULL,
  `pedidos` varchar(255) collate utf8_spanish_ci NOT NULL,
  `codigo` varchar(255) collate utf8_spanish_ci NOT NULL,
  `cliente` varchar(255) collate utf8_spanish_ci NOT NULL,
  `vendedor` varchar(255) collate utf8_spanish_ci NOT NULL,
  `bultos` varchar(255) collate utf8_spanish_ci NOT NULL,
  `base_imponible` varchar(255) collate utf8_spanish_ci NOT NULL,
  `fecha_real` date NOT NULL,
  `zona` varchar(255) collate utf8_spanish_ci NOT NULL,
  `estado` varchar(255) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2023 ;

--
-- Volcar la base de datos para la tabla `reg_facturas`
--

INSERT INTO `reg_facturas` (`id`, `fecha_sist`, `factura`, `ne`, `pedidos`, `codigo`, `cliente`, `vendedor`, `bultos`, `base_imponible`, `fecha_real`, `zona`, `estado`) VALUES
(1, '2016-03-31', '34361', '4841', 'ALFA6760', '1', 'FERRETEROS.COM, C.A', '1', '2', '47.646,14', '2016-04-01', 'PLC', 's'),
(2022, '2002-07-12', 'asda', 'sdasd', 'asdasd', 'asdas', 'prueba', '1', 'dasdasda', 'asdas', '2002-07-12', 'dasd', 's');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salones`
--

CREATE TABLE IF NOT EXISTS `salones` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(255) NOT NULL,
  `curso` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcar la base de datos para la tabla `salones`
--

INSERT INTO `salones` (`id`, `nombre`, `curso`, `estado`) VALUES
(1, 'A1 Matematicas', 'Curso de Matematicas', 's'),
(2, 'A2 Matematicas', 'Curso de Matematicas', 's'),
(3, 'B1 Ciencias', 'Curso de Ciencias', 's'),
(4, 'B2 Ciencias', 'Curso de Ciencias', 's'),
(5, 'C1 Programacion', 'Programacion en PHP', 's'),
(6, 'C2 Programacion', 'Programacion PHP', 's'),
(7, 'D1 Manualidades', 'Manualidades Basicas', 's'),
(11, 'Temporal', 'Temporal', 's');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `ced` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `usu` varchar(255) NOT NULL,
  `con` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  PRIMARY KEY  (`ced`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ced`, `estado`, `nom`, `usu`, `con`, `tipo`) VALUES
('13936863', 's', 'Hernan Chaparro', 'Hernan', '123456', 'a');

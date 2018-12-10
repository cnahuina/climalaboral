-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-11-2018 a las 17:48:46
-- Versión del servidor: 10.1.35-MariaDB
-- Versión de PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `form`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos`
--

CREATE TABLE `datos` (
  `id` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nro` varchar(12) NOT NULL,
  `edad` int(11) NOT NULL,
  `nroboleta` varchar(10) NOT NULL,
  `idtienda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_respuesta`
--

CREATE TABLE `detalle_respuesta` (
  `idrespuesta` int(11) DEFAULT NULL,
  `idOpcion` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupopreguntas`
--

CREATE TABLE `grupopreguntas` (
  `idGrupoPregunta` int(11) NOT NULL,
  `grupoPregunta` text NOT NULL,
  `fechaCreacion` date NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `grupopreguntas`
--

INSERT INTO `grupopreguntas` (`idGrupoPregunta`, `grupoPregunta`, `fechaCreacion`, `estado`) VALUES
(1, 'Cuestionario Noviembre', '2018-11-26', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opciones`
--

CREATE TABLE `opciones` (
  `idOpcion` int(11) NOT NULL,
  `idPregunta` int(11) NOT NULL,
  `titulo` text NOT NULL,
  `descOpcion` text NOT NULL,
  `icon` text NOT NULL,
  `opcionCorrecta` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `opciones`
--

INSERT INTO `opciones` (`idOpcion`, `idPregunta`, `titulo`, `descOpcion`, `icon`, `opcionCorrecta`, `estado`) VALUES
(1, 1, '5 mil sonrisas', 'SI', 'si.png', 0, 1),
(2, 1, '5 mil sonrisas', 'NO', 'no.png', 0, 1),
(3, 2, 'cualidades del producto', 'No sabia', 'nosabia.png', 0, 1),
(4, 2, 'cualidades del producto', 'Falta capacitación', 'faltacapacitacion.png', 0, 1),
(5, 2, 'cualidades del producto', 'Muy informada', 'muyinformada.png', 0, 1),
(6, 3, 'atencion ASESORA', 'Mala', 'mala.png', 0, 1),
(7, 3, 'atencion ASESORA', 'Regular', 'regular.png', 0, 1),
(8, 3, 'atencion ASESORA', 'Buena', 'buena.png', 0, 1),
(9, 4, 'atencion CAJERA', 'Mala', 'mala.png', 0, 1),
(10, 4, 'atencion CAJERA', 'Regular', 'regular.png', 0, 1),
(11, 4, 'atencion CAJERA', 'Buena', 'buena.png', 0, 1),
(12, 5, 'Según tu experiencia', 'Poco probable', 'pocoprobable.png', 0, 1),
(13, 5, 'Según tu experiencia', 'Muy probable', 'muyprobable.png', 0, 1),
(14, 6, 'lo que más te gusto', 'Reloj', 'relojes.png', 0, 1),
(15, 6, 'lo que más te gusto', 'Gorra', 'gorras.png', 0, 1),
(16, 6, 'lo que más te gusto', 'Lentes', 'lentes.png', 0, 1),
(17, 7, 'opcional', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `idPregunta` int(11) NOT NULL,
  `pregunta` text COLLATE utf8_spanish_ci NOT NULL,
  `idGrupoPregunta` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`idPregunta`, `pregunta`, `idGrupoPregunta`, `estado`) VALUES
(1, '¿Te informaron sobre la campaña 5mil sonrisas?', 1, 1),
(2, '¿Cuán informada estaba la asesor(a) sobre las cualidades del producto?', 1, 1),
(3, '¿Qué te pareció la atención de nuestro ASESOR?', 1, 1),
(5, 'Según tu experiencia de compra ¿Recomendaría nuestra tienda?', 1, 1),
(6, '¿Qué es lo que más te gusto de nuestra tienda?', 1, 1),
(7, 'Opcional', 1, 1),
(4, '¿Qué te pareció la atención de nuestro CAJERO?', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta`
--

CREATE TABLE `respuesta` (
  `idrespuesta` int(11) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `idGrupoPregunta` int(11) DEFAULT NULL,
  `idPregunta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subopcion`
--

CREATE TABLE `subopcion` (
  `idOpcion` int(11) NOT NULL,
  `subOpcion` text NOT NULL,
  `icon` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `subopcion`
--

INSERT INTO `subopcion` (`idOpcion`, `subOpcion`, `icon`) VALUES
(3, 'Malo', 'mala.png'),
(3, 'Regular', 'regular.png'),
(3, 'Bueno', 'buena.png'),
(4, 'Malo', 'mala.png'),
(4, 'Regular', 'regular.png'),
(4, 'Bueno', 'buena.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `datos`
--
ALTER TABLE `datos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `grupopreguntas`
--
ALTER TABLE `grupopreguntas`
  ADD PRIMARY KEY (`idGrupoPregunta`);

--
-- Indices de la tabla `opciones`
--
ALTER TABLE `opciones`
  ADD PRIMARY KEY (`idOpcion`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`idPregunta`);

--
-- Indices de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD PRIMARY KEY (`idrespuesta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `datos`
--
ALTER TABLE `datos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT de la tabla `opciones`
--
ALTER TABLE `opciones`
  MODIFY `idOpcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  MODIFY `idrespuesta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

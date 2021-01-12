-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-12-2020 a las 05:41:12
-- Versión del servidor: 10.4.16-MariaDB
-- Versión de PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pruebas2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentacion`
--

CREATE TABLE `documentacion` (
  `idDocumentacion` int(11) NOT NULL,
  `nombre_efecto` varchar(50) NOT NULL,
  `contenido` text NOT NULL,
  `observacion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `documentacion`
--

INSERT INTO `documentacion` (`idDocumentacion`, `nombre_efecto`, `contenido`, `observacion`) VALUES
(1, 'primer efecto', '&lt;div class=\"progress\"&gt;\r\n  &lt;div class=\"progress-bar\" style=\"width:70%\"&gt;&lt;/div&gt;\r\n&lt;/div&gt;', 'Ya tamos gozus luego solo hacemos que se muestre en el index junto al land page y nuestro trabajo habra terminado.'),
(7, 'phool', '&lt;div class=\"card\"&gt;\n raaaaaaaa1\n&lt;/div&gt;', 'rous pendeja');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `password` tinytext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `usuario`, `password`) VALUES
(1, 'admin', 'admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997'),
(37, 'Phool', 'herrera condezo', 'gato', '8f39c63d50478f69b087a9696546e72e50cd1967'),
(106, 'hacker', 'hacker', 'hacker', '4dcc4173d80a2817206e196a38f0dbf7850188ff'),
(107, 'fumeque', 'fumeque', 'fumeque', '274bdec5bb3bba7f8fa6b6abf5a22034fef5fe7e'),
(108, 'salcedo', 'salcedo', 'salcedo', '67806dfae2e99eb9a6e2f156872598be7b4be74e'),
(142, 'phool', 'herrera condezo', 'master', '4f26aeafdb2367620a393c973eddbe8f8b846ebd'),
(143, 'phool', 'herrera condezo', 'master123', 'b84689b769ab3d929f7cc14ee35e77c4ae6427c8'),
(144, 'Fabian', 'estrada rivera', 'fabi123', '2231918ae7cccc73ace0ee24259bc65f76aa54ba'),
(145, 'naty', 'calero villena', 'naty123', 'c115ad0fae8bd630b4e4485f4b8e9f4189659354');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `documentacion`
--
ALTER TABLE `documentacion`
  ADD PRIMARY KEY (`idDocumentacion`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `documentacion`
--
ALTER TABLE `documentacion`
  MODIFY `idDocumentacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

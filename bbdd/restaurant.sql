-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: hl1113.dinaserver.com:3306
-- Tiempo de generación: 14-05-2022 a las 19:58:49
-- Versión del servidor: 10.5.15-MariaDB-0+deb11u1-log
-- Versión de PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `restaurant`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `cod_mensaje` smallint(5) UNSIGNED NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `dni` char(9) NOT NULL,
  `mail` varchar(70) NOT NULL,
  `mensaje` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`cod_mensaje`, `nombre`, `apellidos`, `dni`, `mail`, `mensaje`) VALUES
(1, 'Kpop', 'ca pop', '66611133k', 'kpop@gmail.com', 'Hola k ase');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `platos`
--

CREATE TABLE `platos` (
  `cod_plato` smallint(5) UNSIGNED NOT NULL,
  `plato` varchar(60) NOT NULL,
  `ingredientes` varchar(100) NOT NULL,
  `precio` float(5,2) NOT NULL,
  `foto` varchar(10) NOT NULL DEFAULT '0.jpg',
  `descripcion` varchar(2000) NOT NULL DEFAULT 'N/D',
  `seccion_menu` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `platos`
--

INSERT INTO `platos` (`cod_plato`, `plato`, `ingredientes`, `precio`, `foto`, `descripcion`, `seccion_menu`) VALUES
(1, 'Tabla de jamón berico', '', 14.00, '0_0.jpg', '', 'Entrantes'),
(2, 'Tabla de queso de oveja', '', 12.00, '0_0.jpg', '', 'Entrantes'),
(3, 'Tabla de jamón y queso', '', 14.00, '0_0.jpg', '', 'Entrantes'),
(4, 'Paella', 'Arroz, Pollo, Mejillones', 6.00, '0_0.jpg', 'Plato típico Español, servido en la costa mediterránea', 'Entrantes'),
(5, 'Callos', 'tripas de vaca, chorizo, morcilla, pimienta', 5.00, '0_0.jpg', 'Los callos a la madrileña son uno de los platos más típicos del invierno madrileño', 'Entrantes'),
(6, 'Migas', 'Pan, ajo, pimentón', 6.00, '0_0.jpg', 'Las migas son una preparación culinaria habitual de la gente que se dedican a la trashumancia española', 'Entrantes'),
(7, 'Rabo de ternera en su jugo', '', 12.00, '0_0.jpg', '', 'Entrantes'),
(8, 'Codillo de cerdo al horno', '', 12.00, '0_0.jpg', '', 'Entrantes'),
(9, 'Cochinillo al horno', '', 20.00, '0_0.jpg', '', 'Entrantes'),
(10, 'Carrillada en su jugo', '', 12.00, '0_0.jpg', '', 'Entrantes'),
(11, 'Paletlla de cordero', '', 20.00, '0_0.jpg', '', 'Entrantes'),
(12, 'Huevo roto con criollo', '', 8.00, '0_0.jpg', 'Huevos rotos con criollo, un chorizo hecho con una mezcla de carne de cerdo y vacuno', 'Entrantes'),
(13, 'Huevo roto con langostinos', '', 8.00, '0_0.jpg', '', 'Entrantes'),
(14, 'Berenjenas con miel de caña', '', 6.00, '0_0.jpg', '', 'Entrantes'),
(15, 'Caracoles en salsa', '', 8.00, '0_0.jpg', '', 'Entrantes'),
(16, 'Croquetas de cocido', '', 7.00, '0_0.jpg', '', 'Entrantes'),
(17, 'Croquetas de espinacas Y gambas', '', 7.00, '0_0.jpg', '', 'Entrantes'),
(18, 'Croquetas de bacalao', '', 7.00, '0_0.jpg', '', 'Entrantes'),
(19, 'Croquetas de cabrales', '', 7.00, '0_0.jpg', '', 'Entrantes'),
(20, 'Surtido de croquetas', '', 8.00, '0_0.jpg', '', 'Entrantes'),
(21, 'Pimientos del padron', '', 6.00, '0_0.jpg', '', 'Entrantes'),
(22, 'Pulpo a la gallega', '', 14.00, '0_0.jpg', '', 'Entrantes'),
(23, 'Salmorejo', 'tomate, pan, ajo, aceite de oliva, sal', 10.00, '0_0.jpg', 'El salmorejo es una crema tradicional de Córdoba', 'Entrantes'),
(24, 'Gazpacho', 'aceite de oliva, vinagre, agua, tomates, pepinos, pimientos, cebollas, ajo', 14.00, '0_0.jpg', 'El gazpacho es una sopa fría', 'Entrantes'),
(25, 'Ensalada de muslitos de codorniz en escabeche', 'brotes frescos, cabrales, muslitos de codorniz', 11.00, '0_1.jpg', '', 'Primeros'),
(26, 'Tabulé de quinoa con croquetas liquidas de perretxicos', '', 12.00, '0_1.jpg', 'Ensalada típica de Síria y Líbano', 'Primeros'),
(27, 'Tomate con cebolla caramelizada, nueces y queso roquefort', '', 11.00, '0_1.jpg', '', 'Primeros'),
(28, 'Ensalada de foie con aceite de boletus', '', 12.00, '0_1.jpg', '', 'Primeros'),
(29, 'Rulo de hojaldre con verduras de temporada y setas', '', 20.00, '0_1.jpg', '', 'Primeros'),
(30, 'Alcachofas rellenas de bacalao', '', 15.30, '0_1.jpg', '', 'Primeros'),
(31, 'Huevos rotos', '', 20.00, '0_1.jpg', '', 'Primeros'),
(32, 'Fideua de pescado y alioli', '', 20.00, '0_1.jpg', '', 'Primeros'),
(33, 'Alubias con morro y oreja', '', 15.30, '0_1.jpg', '', 'Primeros'),
(34, 'Ternera guisada con champiñones', 'ternera, zanahoria, champiñón, cebolla', 10.00, '0_2.jpg', 'Un estofado de ternera con champiñones y zanahoria', 'Segundos'),
(35, 'Chuletillas al sarmiento', '', 14.00, '0_2.jpg', 'Chuletas de cordero puestas entre dos parrillas al fuego', 'Segundos'),
(36, 'Chuletas de cordero', '', 29.00, '0_2.jpg', 'Chuletas de cordero fritas', 'Segundos'),
(37, 'Solomillo al sarmiento', '', 16.00, '0_2.jpg', 'Solomillo puestas entre dos parrillas al fuego', 'Segundos'),
(38, 'Conejo guisado', 'Conejo, cebolla, nabo', 10.50, '0_2.jpg', 'Conejo estofado con verduras', 'Segundos'),
(39, 'Pimientos rellenos de carne', 'pimiento, ternera, arroz', 8.50, '0_2.jpg', 'Pimiento relleno de una capa de arroz por encima una de ternera', 'Segundos'),
(40, 'Ventresca de atún a la plancha', '', 12.50, '0_2.jpg', '', 'Segundos'),
(41, 'Bacalao a la riojana', 'bacalao, pimiento, tomate, cebolla', 13.00, '0_2.jpg', 'Bacalao guisado en salsa de tomate con cebolla y pimiento', 'Segundos'),
(42, 'Merluza a la romana', '', 15.50, '0_2.jpg', 'Filetes de merluza pasados por harina, después huevo y frito', 'Segundos'),
(43, 'Picadillo', 'carne, patata, guisante, zanahoria', 7.00, '0_2.jpg', 'Un plato solido compuesto de varios ingredientes picados en trozos', 'Segundos'),
(44, 'Crema catalana', 'Crema pastelera, azúcar', 5.50, '0_3.jpg', 'Postre de origen catalán', 'Postres'),
(45, 'Tarta de queso', 'ricota, requesón, fresa', 8.00, '0_3.jpg', 'Postre muy popular hecho a base de ricota, requesón, queso quark, azúcar ', 'Postres'),
(46, 'Flan de huevo', 'huevo, leche, azúcar', 2.00, '0_3.jpg', 'Pequeño postre de origenes de la epoca de los fenicios', 'Postres'),
(47, 'Arroz con leche', 'arroz, leche, limón', 7.00, '0_3.jpg', 'Plato con origen Asturiano, cuya receta fue heredada de los árabes', 'Postres');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`cod_mensaje`),
  ADD UNIQUE KEY `dni` (`dni`),
  ADD UNIQUE KEY `i_nomb_ape` (`nombre`,`apellidos`);

--
-- Indices de la tabla `platos`
--
ALTER TABLE `platos`
  ADD PRIMARY KEY (`cod_plato`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `cod_mensaje` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `platos`
--
ALTER TABLE `platos`
  MODIFY `cod_plato` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

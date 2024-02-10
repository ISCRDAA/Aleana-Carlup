-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 10-02-2024 a las 00:22:22
-- Versión del servidor: 5.7.23-23
-- Versión de PHP: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `carlupya_prueba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colores_hilos`
--

CREATE TABLE `colores_hilos` (
  `id_color` int(11) NOT NULL,
  `nombre_color` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `colores_hilos`
--

INSERT INTO `colores_hilos` (`id_color`, `nombre_color`) VALUES
(1, 'Capuchino'),
(5, 'Hueso'),
(6, 'Mostasa'),
(4, 'Oveja'),
(3, 'Perla'),
(2, 'Piñon');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `color_modelo`
--

CREATE TABLE `color_modelo` (
  `id_color_modelo` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `modelo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `color_modelo`
--

INSERT INTO `color_modelo` (`id_color_modelo`, `color_id`, `modelo_id`) VALUES
(1, 1, 22),
(2, 1, 23),
(3, 1, 24),
(4, 3, 22),
(5, 3, 25),
(6, 3, 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hilo_caja`
--

CREATE TABLE `hilo_caja` (
  `id_hilo_caja` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `marca` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tenida` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_id` int(11) NOT NULL,
  `cantidad_de_cajas` int(11) NOT NULL DEFAULT '0',
  `cantidad_de_conos` int(11) NOT NULL DEFAULT '0',
  `peso_total` decimal(13,3) NOT NULL,
  `tipo_empaquetado` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Caja'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hilo_costal`
--

CREATE TABLE `hilo_costal` (
  `id_hilo_costal` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `marca` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tenida` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_id` int(11) NOT NULL,
  `cantidad_de_cajas` int(11) NOT NULL DEFAULT '0',
  `cantidad_de_conos` int(11) NOT NULL DEFAULT '0',
  `peso_total` decimal(13,3) NOT NULL,
  `tipo_empaquetado` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Costal'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelo`
--

CREATE TABLE `modelo` (
  `id_modelo` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_id` int(11) NOT NULL,
  `peso_modelo` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `modelo`
--

INSERT INTO `modelo` (`id_modelo`, `nombre`, `tipo_id`, `peso_modelo`) VALUES
(22, 'Modelo 01', 1, 0.5),
(23, 'Modelo 03', 1, 0.35),
(24, 'Modelo 04', 1, 0.4),
(25, 'Modelo 16', 1, 0.5),
(26, 'Modelo 21', 1, 0.65),
(27, 'Modelo 27', 1, 0.29),
(28, 'Modelo 131', 2, 600),
(29, 'Modelo 132', 2, 400),
(30, 'Modelo 133', 2, 500),
(31, 'Modelo 134', 2, 250);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `id_tipo` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`id_tipo`, `nombre`) VALUES
(1, 'Acrilan'),
(2, 'Viscosa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `z_categoria`
--

CREATE TABLE `z_categoria` (
  `idcategoria` bigint(20) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `z_detalle_pedido`
--

CREATE TABLE `z_detalle_pedido` (
  `id` bigint(20) NOT NULL,
  `pedidoid` bigint(20) NOT NULL,
  `productoid` bigint(20) NOT NULL,
  `precio` decimal(11,2) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `z_detalle_temp`
--

CREATE TABLE `z_detalle_temp` (
  `id` bigint(20) NOT NULL,
  `productoid` bigint(20) NOT NULL,
  `precio` decimal(11,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `token` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `z_modulo`
--

CREATE TABLE `z_modulo` (
  `idmodulo` bigint(20) NOT NULL,
  `titulo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `z_pedido`
--

CREATE TABLE `z_pedido` (
  `idpedido` bigint(20) NOT NULL,
  `personaid` bigint(20) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `monto` decimal(11,2) NOT NULL,
  `tipopagoid` bigint(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `z_permisos`
--

CREATE TABLE `z_permisos` (
  `idpermiso` bigint(20) NOT NULL,
  `rolid` bigint(20) NOT NULL,
  `moduloid` bigint(20) NOT NULL,
  `r` int(11) NOT NULL DEFAULT '0',
  `w` int(11) NOT NULL DEFAULT '0',
  `u` int(11) NOT NULL DEFAULT '0',
  `d` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `z_persona`
--

CREATE TABLE `z_persona` (
  `idpersona` bigint(20) NOT NULL,
  `indentificacion` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `nombres` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` bigint(20) NOT NULL,
  `email_user` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `nit` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `nombrefiscal` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `direccionfiscal` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `rolid` bigint(20) NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `z_producto`
--

CREATE TABLE `z_producto` (
  `idproducto` bigint(20) NOT NULL,
  `categoriaid` bigint(20) NOT NULL,
  `codigo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `precio` decimal(11,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `imagen` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `z_rol`
--

CREATE TABLE `z_rol` (
  `idrol` bigint(20) NOT NULL,
  `nombrerol` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `colores_hilos`
--
ALTER TABLE `colores_hilos`
  ADD PRIMARY KEY (`id_color`),
  ADD UNIQUE KEY `nombre_color` (`nombre_color`);

--
-- Indices de la tabla `color_modelo`
--
ALTER TABLE `color_modelo`
  ADD PRIMARY KEY (`id_color_modelo`),
  ADD KEY `color_id` (`color_id`),
  ADD KEY `modelo_id` (`modelo_id`);

--
-- Indices de la tabla `hilo_caja`
--
ALTER TABLE `hilo_caja`
  ADD PRIMARY KEY (`id_hilo_caja`),
  ADD KEY `tipo_id` (`tipo_id`),
  ADD KEY `color_id` (`color_id`);

--
-- Indices de la tabla `hilo_costal`
--
ALTER TABLE `hilo_costal`
  ADD PRIMARY KEY (`id_hilo_costal`),
  ADD KEY `tipo_id` (`tipo_id`),
  ADD KEY `color_id` (`color_id`);

--
-- Indices de la tabla `modelo`
--
ALTER TABLE `modelo`
  ADD PRIMARY KEY (`id_modelo`),
  ADD UNIQUE KEY `nombre` (`nombre`),
  ADD KEY `tipo_id` (`tipo_id`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id_tipo`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `z_categoria`
--
ALTER TABLE `z_categoria`
  ADD PRIMARY KEY (`idcategoria`);

--
-- Indices de la tabla `z_detalle_pedido`
--
ALTER TABLE `z_detalle_pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedidoid` (`pedidoid`),
  ADD KEY `productoid` (`productoid`);

--
-- Indices de la tabla `z_detalle_temp`
--
ALTER TABLE `z_detalle_temp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productoid` (`productoid`);

--
-- Indices de la tabla `z_modulo`
--
ALTER TABLE `z_modulo`
  ADD PRIMARY KEY (`idmodulo`);

--
-- Indices de la tabla `z_pedido`
--
ALTER TABLE `z_pedido`
  ADD PRIMARY KEY (`idpedido`),
  ADD UNIQUE KEY `personaid` (`personaid`);

--
-- Indices de la tabla `z_permisos`
--
ALTER TABLE `z_permisos`
  ADD PRIMARY KEY (`idpermiso`),
  ADD KEY `rolid` (`rolid`),
  ADD KEY `moduloid` (`moduloid`);

--
-- Indices de la tabla `z_persona`
--
ALTER TABLE `z_persona`
  ADD PRIMARY KEY (`idpersona`),
  ADD KEY `rolid` (`rolid`);

--
-- Indices de la tabla `z_producto`
--
ALTER TABLE `z_producto`
  ADD PRIMARY KEY (`idproducto`),
  ADD KEY `categoriaid` (`categoriaid`);

--
-- Indices de la tabla `z_rol`
--
ALTER TABLE `z_rol`
  ADD PRIMARY KEY (`idrol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `colores_hilos`
--
ALTER TABLE `colores_hilos`
  MODIFY `id_color` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `color_modelo`
--
ALTER TABLE `color_modelo`
  MODIFY `id_color_modelo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `hilo_caja`
--
ALTER TABLE `hilo_caja`
  MODIFY `id_hilo_caja` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hilo_costal`
--
ALTER TABLE `hilo_costal`
  MODIFY `id_hilo_costal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `modelo`
--
ALTER TABLE `modelo`
  MODIFY `id_modelo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `z_categoria`
--
ALTER TABLE `z_categoria`
  MODIFY `idcategoria` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `z_detalle_pedido`
--
ALTER TABLE `z_detalle_pedido`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `z_detalle_temp`
--
ALTER TABLE `z_detalle_temp`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `z_modulo`
--
ALTER TABLE `z_modulo`
  MODIFY `idmodulo` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `z_pedido`
--
ALTER TABLE `z_pedido`
  MODIFY `idpedido` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `z_permisos`
--
ALTER TABLE `z_permisos`
  MODIFY `idpermiso` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `z_persona`
--
ALTER TABLE `z_persona`
  MODIFY `idpersona` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `z_producto`
--
ALTER TABLE `z_producto`
  MODIFY `idproducto` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `z_rol`
--
ALTER TABLE `z_rol`
  MODIFY `idrol` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `color_modelo`
--
ALTER TABLE `color_modelo`
  ADD CONSTRAINT `color_modelo_ibfk_1` FOREIGN KEY (`color_id`) REFERENCES `colores_hilos` (`id_color`),
  ADD CONSTRAINT `color_modelo_ibfk_2` FOREIGN KEY (`modelo_id`) REFERENCES `modelo` (`id_modelo`);

--
-- Filtros para la tabla `hilo_caja`
--
ALTER TABLE `hilo_caja`
  ADD CONSTRAINT `hilo_caja_ibfk_1` FOREIGN KEY (`tipo_id`) REFERENCES `tipo` (`id_tipo`),
  ADD CONSTRAINT `hilo_caja_ibfk_2` FOREIGN KEY (`color_id`) REFERENCES `colores_hilos` (`id_color`);

--
-- Filtros para la tabla `hilo_costal`
--
ALTER TABLE `hilo_costal`
  ADD CONSTRAINT `hilo_costal_ibfk_1` FOREIGN KEY (`tipo_id`) REFERENCES `tipo` (`id_tipo`),
  ADD CONSTRAINT `hilo_costal_ibfk_2` FOREIGN KEY (`color_id`) REFERENCES `colores_hilos` (`id_color`);

--
-- Filtros para la tabla `modelo`
--
ALTER TABLE `modelo`
  ADD CONSTRAINT `modelo_ibfk_1` FOREIGN KEY (`tipo_id`) REFERENCES `tipo` (`id_tipo`);

--
-- Filtros para la tabla `z_detalle_pedido`
--
ALTER TABLE `z_detalle_pedido`
  ADD CONSTRAINT `z_detalle_pedido_ibfk_1` FOREIGN KEY (`pedidoid`) REFERENCES `z_pedido` (`idpedido`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `z_detalle_pedido_ibfk_2` FOREIGN KEY (`productoid`) REFERENCES `z_producto` (`idproducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `z_detalle_temp`
--
ALTER TABLE `z_detalle_temp`
  ADD CONSTRAINT `z_detalle_temp_ibfk_1` FOREIGN KEY (`productoid`) REFERENCES `z_producto` (`idproducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `z_pedido`
--
ALTER TABLE `z_pedido`
  ADD CONSTRAINT `z_pedido_ibfk_1` FOREIGN KEY (`personaid`) REFERENCES `z_persona` (`idpersona`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `z_permisos`
--
ALTER TABLE `z_permisos`
  ADD CONSTRAINT `z_permisos_ibfk_1` FOREIGN KEY (`rolid`) REFERENCES `z_rol` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `z_permisos_ibfk_2` FOREIGN KEY (`moduloid`) REFERENCES `z_modulo` (`idmodulo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `z_persona`
--
ALTER TABLE `z_persona`
  ADD CONSTRAINT `z_persona_ibfk_1` FOREIGN KEY (`rolid`) REFERENCES `z_rol` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `z_producto`
--
ALTER TABLE `z_producto`
  ADD CONSTRAINT `z_producto_ibfk_1` FOREIGN KEY (`categoriaid`) REFERENCES `z_categoria` (`idcategoria`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

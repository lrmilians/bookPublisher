-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-03-2014 a las 17:14:25
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `cakephp`
--
CREATE DATABASE IF NOT EXISTS `bookPublisherDB` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `bookPublisherDB`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `functionalities`
--

CREATE TABLE IF NOT EXISTS `functionalities` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `url` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `param` tinyint(1) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `functionality_type_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `functionalities_fk` (`functionality_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=39 ;

--
-- Volcado de datos para la tabla `functionalities`
--

INSERT INTO `functionalities` (`id`, `name`, `active`, `url`, `description`, `param`, `created`, `modified`, `functionality_type_id`) VALUES
(1, 'Funcionalidades', 1, '/functionalities', 'GestiÃ³n de Funcionalidades', 0, '2011-10-25 13:53:30', '2014-03-13 16:31:53', 1),
(2, 'Roles', 1, '/roles', 'GestiÃ³n de roles', 0, '2011-10-25 09:52:18', '2014-03-13 16:33:13', 1),
(3, 'Usuarios', 1, '/users', 'GestiÃ³n de usuarios', 0, '2011-10-25 09:51:57', '2014-03-13 16:33:29', 1),
(4, 'Tipos Funcionalidad', 1, '/functionality_types', 'GestiÃ³n de tipos de funcionalidades', 0, '2011-10-25 13:56:34', '2014-03-13 16:34:18', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `functionality_types`
--

CREATE TABLE IF NOT EXISTS `functionality_types` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `functionality_types`
--

INSERT INTO `functionality_types` (`id`, `name`, `description`, `created`, `modified`) VALUES
(1, 'AdministraciÃ³n', 'AdministraciÃ³n', '2011-10-25 13:58:46', '2014-03-13 16:26:07'),
(2, 'Reportes', 'Reportes', '2011-10-25 14:04:03', '2011-10-25 14:04:03'),
(3, 'Operaciones', 'Operaciones', '2012-05-20 18:14:23', '2012-05-20 18:14:23'),
(4, 'Nomencladores', 'Nomencladores', '2012-09-26 11:30:10', '2014-03-13 16:38:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created`, `modified`) VALUES
(6, 'Administrador', 'Administrador del sistema', '2011-10-25 15:45:45', '2012-09-26 13:10:55'),
(7, 'Visor', 'Visor', '2011-10-25 10:50:27', '2012-09-26 13:39:35'),
(8, 'Operador', 'Operador del sistema', '2012-05-20 18:07:21', '2012-09-26 09:52:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles_functionalities`
--

CREATE TABLE IF NOT EXISTS `roles_functionalities` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `role_id` int(10) NOT NULL,
  `functionality_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `roles_functionalities_fk` (`role_id`),
  KEY `roles_functionalities_fk1` (`functionality_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=624 ;

--
-- Volcado de datos para la tabla `roles_functionalities`
--

INSERT INTO `roles_functionalities` (`id`, `role_id`, `functionality_id`) VALUES
(601, 6, 1),
(602, 6, 2),
(620, 6, 4),
(623, 6, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `role_id` int(10) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `name` (`name`),
  KEY `users_fk` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `password`, `active`, `role_id`, `created`, `modified`) VALUES
(7, 'admin', 'Administrador del Sistema', 'efa37ea42da27487c38040402d2515', 1, 6, '2013-10-21 13:56:02', '2013-10-29 14:33:13');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `functionalities`
--
ALTER TABLE `functionalities`
  ADD CONSTRAINT `functionalities_fk` FOREIGN KEY (`functionality_type_id`) REFERENCES `functionality_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `roles_functionalities`
--
ALTER TABLE `roles_functionalities`
  ADD CONSTRAINT `roles_functionalities_fk` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `roles_functionalities_fk1` FOREIGN KEY (`functionality_id`) REFERENCES `functionalities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_fk` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

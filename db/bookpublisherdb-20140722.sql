
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 23-07-2014 a las 02:51:35
-- Versión del servidor: 10.0.11-MariaDB
-- Versión de PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `u428780947_book`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title_unique` (`title`) COMMENT 'Title unique'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `books`
--

INSERT INTO `books` (`id`, `title`, `created`, `modified`) VALUES
(1, 'Libro1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Nuevo Libro', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Libro unico.', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=41 ;

--
-- Volcado de datos para la tabla `functionalities`
--

INSERT INTO `functionalities` (`id`, `name`, `active`, `url`, `description`, `param`, `created`, `modified`, `functionality_type_id`) VALUES
(1, 'Funcionalidades', 1, '/functionalities', 'Gestion de Funcionalidades', 0, '2011-10-25 13:53:30', '2014-03-13 16:31:53', 1),
(2, 'Roles', 1, '/roles', 'Gestion de roles', 0, '2011-10-25 09:52:18', '2014-03-13 16:33:13', 1),
(3, 'Usuarios', 1, '/users', 'Gestion de usuarios', 0, '2011-10-25 09:51:57', '2014-03-13 16:33:29', 1),
(4, 'Tipos Funcionalidad', 1, '/functionality_types', 'Gestion de tipos de funcionalidades', 0, '2011-10-25 13:56:34', '2014-03-13 16:34:18', 1),
(39, 'Libros', 1, '/books', 'Gestion de Libros', NULL, '2014-07-15 15:35:25', '2014-07-15 16:36:56', 3),
(40, 'Contenidos', 1, '/table_contents', 'GestiÃ³n de contenidos', NULL, '2014-07-15 16:35:13', '2014-07-15 16:36:39', 3);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `functionality_types`
--

INSERT INTO `functionality_types` (`id`, `name`, `description`, `created`, `modified`) VALUES
(1, 'Administración', 'Administración', '2011-10-25 13:58:46', '2014-07-18 20:34:14'),
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=630 ;

--
-- Volcado de datos para la tabla `roles_functionalities`
--

INSERT INTO `roles_functionalities` (`id`, `role_id`, `functionality_id`) VALUES
(601, 6, 1),
(602, 6, 2),
(620, 6, 4),
(623, 6, 3),
(624, 6, 39),
(625, 8, 39),
(626, 7, 39),
(627, 6, 40),
(628, 8, 40),
(629, 7, 40);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `table_contents`
--

CREATE TABLE IF NOT EXISTS `table_contents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `children` tinyint(1) NOT NULL,
  `book_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `table_contents_fk` (`book_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `table_contents`
--

INSERT INTO `table_contents` (`id`, `content`, `level`, `order`, `parent_id`, `children`, `book_id`, `created`, `modified`) VALUES
(1, 'Introducción', 1, 1, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Motivación', 2, 2, 1, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Reseña Histórica', 3, 7, 6, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Origen', 3, 6, 6, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Trabajos', 3, 5, 6, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Soluciones Actuales', 2, 3, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Objetivos', 2, 8, 1, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Requisitos', 1, 9, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Hardware', 2, 11, 8, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Software', 2, 10, 8, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Introducción', 1, 1, 0, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'Capitulo 1', 2, 2, 12, 0, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'Epigrafe 1.2', 2, 3, 12, 0, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'Capitulo 2', 1, 2, 0, 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'Epigrafe ', 1, 1, 0, 0, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'ccbdfgdfgd', 3, 4, 6, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `ci` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ruc` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cell` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `role_id` int(10) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `ci` (`ci`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `ruc` (`ruc`),
  KEY `users_fk` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `password`, `address`, `ci`, `ruc`, `phone`, `cell`, `email`, `active`, `role_id`, `created`, `modified`) VALUES
(7, 'admin', 'Administrador del Sistema', '0af146bfcd696ee8c0571e30a897d753bbe72715', 'las casas', '9999999999', '9999999999999', NULL, NULL, 'admin@gmail,com', 1, 6, '2013-10-21 13:56:02', '2014-03-16 20:07:58'),
(11, 'lrmilians', 'Lázaro Raisel Milians Alvarez de la Campa', '0af146bfcd696ee8c0571e30a897d753bbe72715', 'San Carlos N56-155 Diego de trujillo', '1754837548', '1754837548001', '', '0983462403', 'lrmilians@gmail.com', 1, 8, '2014-03-21 00:29:47', '2014-07-18 21:08:15');

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
-- Filtros para la tabla `table_contents`
--
ALTER TABLE `table_contents`
  ADD CONSTRAINT `table_contents_fk` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_fk` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

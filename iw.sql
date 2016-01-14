-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-01-2016 a las 20:32:49
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `iw`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blogs`
--

CREATE TABLE IF NOT EXISTS `blogs` (
`oid` int(11) NOT NULL,
  `title` varchar(120) NOT NULL,
  `description` text,
  `visibility` tinyint(1) DEFAULT '1',
  `domain` int(11) NOT NULL,
  `theme` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `blogs`
--

INSERT INTO `blogs` (`oid`, `title`, `description`, `visibility`, `domain`, `theme`) VALUES
(19, 'Forocoches, su verdadera historia.', NULL, 1, 19, 1),
(20, 'Giras de fito', 'En este blog se irán subiendo las giras de Fito y los Fitipaldis, las fechas, las ciudades y a ser posible cuántas entradas saldrán y cuándo se acaban. Síguenos!', 1, 20, 1),
(21, '¡Madres al poder!', 'Si eres una madre que se siente súper poderosa porque encuentra todo lo que busca cuando sus hijos se estiran de los pelos, únete a este blog! Hablaremos sobre cómo ser más eficiente buscando! Prometemos O(n) siempre que sea posible :D', 1, 21, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`oid` int(11) NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('b0bb1650063b4d2a219489ca00f7f910e6b06048', '::1', 1451997122, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435313939373132323b),
('bf576036a5756231f8b1b9ee27937b63e11d1828', '::1', 1452710908, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323731303930383b),
('7342db09917630a3b3bfe83f407cbe7bbbbcf638', '::1', 1452710908, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323731303930383b),
('396bea99601b527b19f02590de68429d1284d56a', '::1', 1452713370, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435323731333337303b69647c733a323a223132223b6e616d657c733a353a22646965676f223b656d61696c7c733a31373a22646965676f406578616d706c652e636f6d223b6c6f676765645f696e7c623a313b);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domains`
--

CREATE TABLE IF NOT EXISTS `domains` (
`oid` int(11) NOT NULL,
  `url` text NOT NULL,
  `user` int(11) NOT NULL,
  `payplan` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `domains`
--

INSERT INTO `domains` (`oid`, `url`, `user`, `payplan`) VALUES
(19, 'forocoches.com', 12, 1),
(20, 'fitipaldis.com', 12, 1),
(21, 'supermamis.es', 12, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
`oid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `short` varchar(5) NOT NULL,
  `dictionary` text
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `languages`
--

INSERT INTO `languages` (`oid`, `name`, `short`, `dictionary`) VALUES
(1, 'spanish', 'es', NULL),
(2, 'english', 'en', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
`oid` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `controller` varchar(25) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payplan`
--

CREATE TABLE IF NOT EXISTS `payplan` (
`oid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(150) NOT NULL,
  `amount` float DEFAULT '0',
  `start` date NOT NULL,
  `months` int(11) DEFAULT NULL,
  `icon` text
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `payplan`
--

INSERT INTO `payplan` (`oid`, `name`, `description`, `amount`, `start`, `months`, `icon`) VALUES
(1, 'Gratis', 'Sólo tienes que empezar', 0, '2015-12-03', NULL, 'free_pen'),
(2, 'Premium', 'Dale un buen empujón a tu sitio', 99, '2015-12-03', 12, 'premium_pen'),
(3, 'Negocios', 'Negocios', 299, '2015-12-03', 12, 'business_pen');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
`oid` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `content` text,
  `location` varchar(150) DEFAULT NULL,
  `visibility` tinyint(1) DEFAULT '1',
  `date` datetime DEFAULT NULL,
  `blog` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`oid`, `title`, `content`, `location`, `visibility`, `date`, `blog`) VALUES
(8, 'Forocoches y el porno', 'No sé si alguna vez os habéis parado a pensar que, a pesar de llamarse forocoches (reitero el coches), durante una temporada larga fue un poco la meca del porno libre.<br>Cada dos por tres me llegaban gifs o enlaces por redes sociales de guarradas de ese foro. <h1>Menudos.</h1>', NULL, 1, '2016-01-13 08:24:23', 19),
(9, 'Forocoches y los apuntes', '<h2>Tened cuidado!</h2> En ese blog se comparten muchos trabajos que supuestamente están bien, pero no! Son unos malditos <strong>troles</strong> que suben cosas mal para que suspendas por cazurro!', NULL, 1, '2016-01-13 08:25:41', 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `post_category`
--

CREATE TABLE IF NOT EXISTS `post_category` (
`oid` int(11) NOT NULL,
  `post` int(11) NOT NULL,
  `category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `post_tags`
--

CREATE TABLE IF NOT EXISTS `post_tags` (
`oid` int(11) NOT NULL,
  `post` int(11) NOT NULL,
  `tag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
`oid` int(11) NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `themes`
--

CREATE TABLE IF NOT EXISTS `themes` (
`oid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `style` text,
  `preview` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `themes`
--

INSERT INTO `themes` (`oid`, `name`, `style`, `preview`) VALUES
(1, 'Azul lapislázuli', 'azul-bootstrap.css', ''),
(2, 'Calor solabrasador', 'rojo-bootstrap.css', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`oid` int(11) NOT NULL,
  `nick` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(75) DEFAULT NULL,
  `password` varchar(40) NOT NULL,
  `avatar` text,
  `information` text,
  `email` varchar(120) NOT NULL,
  `language` int(11) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`oid`, `nick`, `name`, `surname`, `password`, `avatar`, `information`, `email`, `language`) VALUES
(12, 'diego', 'diego', NULL, 'diego', NULL, NULL, 'diego@example.com', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `blogs`
--
ALTER TABLE `blogs`
 ADD PRIMARY KEY (`oid`), ADD KEY `domain` (`domain`), ADD KEY `theme` (`theme`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`oid`);

--
-- Indices de la tabla `domains`
--
ALTER TABLE `domains`
 ADD PRIMARY KEY (`oid`), ADD KEY `user` (`user`), ADD KEY `payplan` (`payplan`);

--
-- Indices de la tabla `languages`
--
ALTER TABLE `languages`
 ADD PRIMARY KEY (`oid`), ADD UNIQUE KEY `short` (`short`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
 ADD PRIMARY KEY (`oid`);

--
-- Indices de la tabla `payplan`
--
ALTER TABLE `payplan`
 ADD PRIMARY KEY (`oid`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
 ADD PRIMARY KEY (`oid`), ADD KEY `blog` (`blog`);

--
-- Indices de la tabla `post_category`
--
ALTER TABLE `post_category`
 ADD PRIMARY KEY (`oid`), ADD UNIQUE KEY `post` (`post`,`category`), ADD KEY `category` (`category`);

--
-- Indices de la tabla `post_tags`
--
ALTER TABLE `post_tags`
 ADD PRIMARY KEY (`oid`), ADD UNIQUE KEY `post` (`post`,`tag`), ADD KEY `tag` (`tag`);

--
-- Indices de la tabla `tags`
--
ALTER TABLE `tags`
 ADD PRIMARY KEY (`oid`);

--
-- Indices de la tabla `themes`
--
ALTER TABLE `themes`
 ADD PRIMARY KEY (`oid`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`oid`), ADD UNIQUE KEY `nick` (`nick`), ADD KEY `language` (`language`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `blogs`
--
ALTER TABLE `blogs`
MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `domains`
--
ALTER TABLE `domains`
MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `languages`
--
ALTER TABLE `languages`
MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `payplan`
--
ALTER TABLE `payplan`
MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `post_category`
--
ALTER TABLE `post_category`
MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `post_tags`
--
ALTER TABLE `post_tags`
MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tags`
--
ALTER TABLE `tags`
MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `themes`
--
ALTER TABLE `themes`
MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `blogs`
--
ALTER TABLE `blogs`
ADD CONSTRAINT `blogs_ibfk_1` FOREIGN KEY (`domain`) REFERENCES `domains` (`oid`) ON DELETE CASCADE,
ADD CONSTRAINT `blogs_ibfk_2` FOREIGN KEY (`theme`) REFERENCES `themes` (`oid`);

--
-- Filtros para la tabla `domains`
--
ALTER TABLE `domains`
ADD CONSTRAINT `domains_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`oid`) ON DELETE CASCADE,
ADD CONSTRAINT `domains_ibfk_2` FOREIGN KEY (`payplan`) REFERENCES `payplan` (`oid`);

--
-- Filtros para la tabla `posts`
--
ALTER TABLE `posts`
ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`blog`) REFERENCES `blogs` (`oid`) ON DELETE CASCADE;

--
-- Filtros para la tabla `post_category`
--
ALTER TABLE `post_category`
ADD CONSTRAINT `post_category_ibfk_1` FOREIGN KEY (`post`) REFERENCES `posts` (`oid`) ON DELETE CASCADE,
ADD CONSTRAINT `post_category_ibfk_2` FOREIGN KEY (`category`) REFERENCES `categories` (`oid`);

--
-- Filtros para la tabla `post_tags`
--
ALTER TABLE `post_tags`
ADD CONSTRAINT `post_tags_ibfk_1` FOREIGN KEY (`post`) REFERENCES `posts` (`oid`) ON DELETE CASCADE,
ADD CONSTRAINT `post_tags_ibfk_2` FOREIGN KEY (`tag`) REFERENCES `tags` (`oid`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`language`) REFERENCES `languages` (`oid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 14-08-2020 a las 09:57:50
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_shop`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Europa'),
(2, 'AmÃ©rica'),
(3, 'Asia'),
(4, 'Ãfrica'),
(5, 'OceanÃ­a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `manage_orders`
--

DROP TABLE IF EXISTS `manage_orders`;
CREATE TABLE IF NOT EXISTS `manage_orders` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `order_id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `units` int(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_manage_order` (`order_id`),
  KEY `fk_manage_product` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `manage_orders`
--

INSERT INTO `manage_orders` (`id`, `order_id`, `product_id`, `units`) VALUES
(1, 1, 1, 1),
(2, 1, 3, 1),
(3, 1, 4, 1),
(4, 2, 6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) NOT NULL,
  `province` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `cost` float(200,2) NOT NULL,
  `status` varchar(20) NOT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_order_user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `province`, `location`, `address`, `cost`, `status`, `date`, `time`) VALUES
(1, 4, 'Valencia', 'Valencia', 'C/ Falsa, 123', 3950.00, 'confirm', '2020-08-14', '11:34:39'),
(2, 5, 'Madrid', 'Madrid', 'C/ Falsa, 123', 450.00, 'confirm', '2020-08-14', '11:49:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `category_id` int(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `price` float(100,2) NOT NULL,
  `stock` int(255) NOT NULL,
  `offer` varchar(2) DEFAULT NULL,
  `date` date NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_product_category` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `price`, `stock`, `offer`, `date`, `image`) VALUES
(1, 1, 'EspaÃ±a', 'Viaje por EspaÃ±a de 20 dÃ­as de duraciÃ³n.', 1200.00, 100, NULL, '2020-08-14', 'spain.jpg'),
(3, 1, 'Grecia', 'Viaje por Grecia con una duraciÃ³n de 15 dÃ­as.', 950.00, 50, NULL, '2020-08-14', 'greece.jpg'),
(4, 3, 'JapÃ³n', 'Viaje por JapÃ³n de 21 dÃ­as', 1800.00, 25, NULL, '2020-08-14', 'japan.jpg'),
(5, 2, 'MÃ©xico', 'Viaje por MÃ©xico con una duraciÃ³n de 15 dÃ­as', 1300.00, 80, NULL, '2020-08-14', 'mexico.jpg'),
(6, 4, 'Marruecos', 'Viaje por Marruecos de 7 dÃ­as', 450.00, 100, NULL, '2020-08-14', 'morocco.jpg'),
(7, 5, 'Australia', 'Viaje por Australia de 25 dÃ­as', 2200.00, 40, NULL, '2020-08-14', 'australia.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` varchar(20) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `password`, `rol`, `image`) VALUES
(4, 'pedro', 'pedro', 'pedro@pedro.com', '$2y$04$xZOr1z6j0NebA302KJx/.ekIHIHBuGg4pffeRvpZO/.FPw44RG5Yq', 'admin', NULL),
(5, 'Paco', 'Paco', 'paco@paco.com', '$2y$04$CKzMpXO0O/OWWORY8zBzN.lOMna0im9CLY7JDMezHw9el1vH3XHY.', 'user', NULL),
(6, 'admin', 'admin', 'admin@admin.com', '$2y$04$Nw5ArHhg9/crRnOvI4xKlerALrHaQv9PsPcrU0/oEma2yjmZSpmRO', 'admin', NULL);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `manage_orders`
--
ALTER TABLE `manage_orders`
  ADD CONSTRAINT `fk_manage_order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `fk_manage_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Filtros para la tabla `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_order_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_product_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

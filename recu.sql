-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 14-06-2024 a las 07:53:25
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `recu`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_sis`
--

CREATE TABLE `login_sis` (
  `email` varchar(255) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `password_hash` varchar(255) DEFAULT NULL,
  `registration_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `login_sis`
--

INSERT INTO `login_sis` (`email`, `fullname`, `password_hash`, `registration_date`) VALUES
('12345@gmail.com', '12345', 'd7d2f602e155ba700ed76c48d9a48009b9383e8d17435bfb0fe8ad7c664d4002f16cc7a65c6fb066963714a794f96441ef7f9b9c1b1456acfb9225cbad474fb0', '2024-06-13'),
('1234@gmail.com', '1234', 'e65cf99ae53e2c447ef50aba6fceb3d4d468bbfea19a4a43c2c3b1a4cb2af355c18b71c6b0a4aeef90609cee03b6a13baf562dfb56eeb25d26e5252377ab64ca', '2024-06-13'),
('123@gmail.com', '123', '3e39b3844837bdefc8017fbcb386ea302af877fb17baa09d0a1bd34b67bbf2b34fba314bbcab450f5f3f73771b7aea956ba3320defda029723f4fdff7dfa007b', '2024-06-13'),
('1@dod.om', 'ijwji', 'eb973daa92d0a9ce0f6136aba871d2969dd3526b8d90cf7c4bb41f3ed32af01b29e68ddc6b87ae60635feba97e42f86bf1a880f9dd5da717371e6c9007d403e4', '2024-06-13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos_papeleria`
--

CREATE TABLE `pedidos_papeleria` (
  `codigo_pedido` varchar(10) NOT NULL,
  `nombre_cliente` varchar(50) DEFAULT NULL,
  `apellido_cliente` varchar(50) DEFAULT NULL,
  `direccion_entrega` varchar(100) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `producto_pedido` varchar(50) DEFAULT NULL,
  `fecha_pedido` varchar(10) DEFAULT NULL,
  `estado_pedido` varchar(20) DEFAULT NULL,
  `cantidad` decimal(10,2) DEFAULT NULL,
  `precio_total` decimal(10,2) DEFAULT NULL,
  `observaciones` varchar(100) DEFAULT NULL,
  `comentarios` varchar(100) DEFAULT NULL,
  `tipo_pago` varchar(20) DEFAULT NULL,
  `numero_pedidos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos_papeleria`
--

INSERT INTO `pedidos_papeleria` (`codigo_pedido`, `nombre_cliente`, `apellido_cliente`, `direccion_entrega`, `telefono`, `email`, `producto_pedido`, `fecha_pedido`, `estado_pedido`, `cantidad`, `precio_total`, `observaciones`, `comentarios`, `tipo_pago`, `numero_pedidos`) VALUES
('001', 'jose', 'mamatines', 'aaaaaaaa', '1111', 'jjj@gmail.com', '3333', 'oo303030', 'entregado ', 40.00, 30.00, 'kakdl', 'kkkkk', 'llll', NULL),
('88', '8', '8', '9', '8', '7@gmail.com ', '8', '7', '8', 8.00, 8.00, '8', '9', '9', 9),
('PP001', 'Roberto', 'Sánchez', 'Calle Menor 123', '555-2345', 'roberto.sanchez@example.com', 'Cuaderno', '01-2024', 'Pendiente', 20.00, 60.00, 'Ninguna', 'Ninguno', 'Tarjeta', 1),
('PP002', '123456', 'Martinez', 'Avenida Mayor 456', '555-6789', 'elena.martinez@example.com', 'Boligrafo', '02-2024', 'Completado', 30.00, 30.00, 'Ninguna', 'Ninguno', 'Efectivo', 1),
('PP003', 'Fernando', 'Ramirez', 'Boulevard Largo 789', '555-3456', 'fernando.ramirez@example.com', 'Mochila', '03-2024', 'Pendiente', 10.00, 250.00, 'Ninguna', 'Ninguno', 'Tarjeta', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `login_sis`
--
ALTER TABLE `login_sis`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `pedidos_papeleria`
--
ALTER TABLE `pedidos_papeleria`
  ADD PRIMARY KEY (`codigo_pedido`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

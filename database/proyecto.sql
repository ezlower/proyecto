-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-12-2022 a las 18:41:46
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `fecha`) VALUES
(1, 'Gaseosas', '2022-11-11 21:10:09'),
(2, 'Energizantes', '2022-11-11 21:11:53'),
(3, 'Bebidas alcoholicas', '2022-11-11 21:20:43'),
(4, 'Golocinas', '2022-11-18 16:31:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `documento` int(11) NOT NULL,
  `email` text COLLATE utf8_spanish_ci NOT NULL,
  `telefono` text COLLATE utf8_spanish_ci NOT NULL,
  `direccion` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `compras` int(11) NOT NULL,
  `ultima_compra` datetime DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `documento`, `email`, `telefono`, `direccion`, `fecha_nacimiento`, `compras`, `ultima_compra`, `fecha`) VALUES
(1, 'Jose', 12990785, 'josemayta38@gmail.com', '(591) 68991222', '3 de mayo', '1998-08-30', -34, '2021-12-05 12:27:40', '2022-12-15 17:01:37'),
(3, 'Pedro', 2610548, 'pedro@gmail.com', '(591) 68991222', 'Man City Esq.22', '1985-03-22', 589, '2022-12-16 20:24:56', '2022-12-17 00:24:56'),
(4, 'Juan Vargaz', 12345687, 'juanvargaz@gmail.com', '(591) 68122222', 'juan direction', '1989-12-30', 602, '2022-12-15 12:23:43', '2022-12-15 16:23:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `codigo` text COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `imagen` text COLLATE utf8_spanish_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `precio_compra` float NOT NULL,
  `precio_venta` float NOT NULL,
  `venta` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `id_categoria`, `codigo`, `descripcion`, `imagen`, `stock`, `precio_compra`, `precio_venta`, `venta`, `fecha`) VALUES
(1, 1, '101', 'Coca Quina 3LT', 'vistas/img/productos/101/735.jpg', 86, 8, 10, 114, '2022-12-17 00:24:56'),
(2, 1, '102', 'Coca Quina 2LT', 'vistas/img/productos/102/839.jpg', 88, 7, 8, 112, '2022-12-16 20:42:57'),
(3, 1, '103', 'Coca Quina 330ML', 'vistas/img/productos/103/747.jpg', 73, 4, 5, 127, '2022-12-16 20:45:11'),
(4, 1, '104', 'Coca Cola 2LT', 'vistas/img/productos/104/487.jpg', 75, 8, 9, 125, '2022-12-16 20:47:27'),
(5, 1, '105', 'Coca cola 500ML', 'vistas/img/productos/105/968.jpg', 130, 4, 5, 70, '2022-12-16 20:47:44'),
(6, 1, '106', 'Coca Cola 300ML', 'vistas/img/productos/106/179.jpg', 138, 4, 5, 62, '2022-12-16 20:48:02'),
(7, 1, '107', 'Fanta Naranja 2LT', 'vistas/img/productos/107/351.jpg', 168, 9, 10, 32, '2022-12-16 20:52:26'),
(8, 1, '108', 'Fanta Naranja 500ML', 'vistas/img/productos/108/930.jpg', 65, 5, 6, 135, '2022-12-16 20:52:41'),
(9, 1, '109', 'Fanta Papaya 2,5LT', 'vistas/img/productos/109/976.jpg', 180, 10, 11, 20, '2022-12-16 21:02:00'),
(10, 1, '110', 'Sprite 2LT', 'vistas/img/productos/110/769.jpg', 180, 9, 10, 20, '2022-12-16 21:02:36'),
(11, 1, '111', '7up 1LT', 'vistas/img/productos/111/907.jpg', 200, 4, 5, 0, '2022-12-16 21:16:42'),
(12, 2, '201', 'Red Bull 250ML', 'vistas/img/productos/201/473.jpg', 200, 13, 14, 0, '2022-12-16 21:15:31'),
(13, 2, '202', 'Ciclon 250ML', 'vistas/img/productos/202/978.jpg', 200, 10, 10, 0, '2022-12-16 21:14:41'),
(14, 3, '301', 'Paceña lata 354ML', 'vistas/img/productos/301/348.jpg', 150, 7, 8, 50, '2022-12-16 21:13:47'),
(15, 3, '302', 'Paceña lata 473ML', 'vistas/img/productos/302/714.jpg', 150, 9, 10, 50, '2022-12-16 21:12:47'),
(16, 3, '303', 'Sidra Cereser 660ML', 'vistas/img/productos/303/865.jpg', 200, 34, 35, 0, '2022-12-16 21:11:47'),
(17, 3, '304', 'Four Loko 473ML', 'vistas/img/productos/304/113.jpg', 120, 24, 25, 80, '2022-12-16 21:10:52'),
(18, 3, '305', 'Four Loko 695ML', 'vistas/img/productos/305/924.jpg', 140, 31, 36, 60, '2022-12-16 21:09:52'),
(19, 3, '306', 'Bock lata 473ML', 'vistas/img/productos/306/486.jpg', 150, 7, 8, 50, '2022-12-16 21:08:25'),
(23, 4, '401', 'Chupetes Bon Bon Bum', 'vistas/img/productos/401/565.jpg', 200, 10, 11.2, 0, '2022-12-16 21:07:13'),
(25, 1, '113', 'Pepsi 2Lt', 'vistas/img/productos/113/289.jpg', 150, 10, 11, 50, '2022-12-16 21:20:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `usuario` text COLLATE utf8_spanish_ci NOT NULL,
  `password` text COLLATE utf8_spanish_ci NOT NULL,
  `perfil` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `ultimo_login` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `perfil`, `foto`, `estado`, `ultimo_login`, `fecha`) VALUES
(1, 'administrador', 'admin', '$2a$07$usesomesillystringforegFOeQOp8RK/V8Yn0LZIZwSlh5IkndD.', 'Administrador', '', 1, '2022-12-16 20:22:50', '2022-12-17 00:22:50'),
(3, 'Ana Gonzales', 'ana', '$2a$07$usesomesillystringforeEwIJUWl9EEhto3A5coVfjMMR7WC2GuC', 'Administrador', 'vistas/img/usuarios/ana/560.jpg', 0, '2022-12-16 14:08:39', '2022-12-17 00:48:12'),
(5, 'Jose Yhilmar', 'jose', '$2a$07$usesomesillystringfore7KVQAzGriIlssIyKqJnWEuhz1mxMJHi', 'Vendedor', 'vistas/img/usuarios/jose/774.jpg', 1, '2022-12-17 00:57:00', '2022-12-17 04:57:00'),
(6, 'Roberto', 'robert', '$2a$07$usesomesillystringfore4aFqOaqr7jA4RGCxIwlWz.n9oUVodBm', 'Especial', 'vistas/img/usuarios/robert/828.jpg', 1, '2022-12-17 00:59:33', '2022-12-17 04:59:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `productos` text COLLATE utf8_spanish_ci NOT NULL,
  `impuesto` float NOT NULL,
  `neto` float NOT NULL,
  `total` float NOT NULL,
  `metodo_pago` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `codigo`, `id_cliente`, `id_vendedor`, `productos`, `impuesto`, `neto`, `total`, `metodo_pago`, `fecha`) VALUES
(25, 10001, 4, 1, '[{\"id\":\"1\",\"descripcion\":\"Coca Quina 3LT\",\"cantidad\":\"7\",\"stock\":\"193\",\"precio\":\"10\",\"total\":\"70\"},{\"id\":\"2\",\"descripcion\":\"Coca Quina 2LT\",\"cantidad\":\"5\",\"stock\":\"195\",\"precio\":\"8\",\"total\":\"40\"}]', 14.3, 110, 124.3, 'Efectivo', '2022-08-09 23:07:12'),
(26, 10002, 3, 1, '[{\"id\":\"1\",\"descripcion\":\"Coca Quina 3LT\",\"cantidad\":\"15\",\"stock\":\"178\",\"precio\":\"10\",\"total\":\"150\"},{\"id\":\"2\",\"descripcion\":\"Coca Quina 2LT\",\"cantidad\":\"15\",\"stock\":\"180\",\"precio\":\"8\",\"total\":\"120\"},{\"id\":\"3\",\"descripcion\":\"Coca Quina 500ML\",\"cantidad\":\"15\",\"stock\":\"185\",\"precio\":\"5\",\"total\":\"75\"}]', 44.85, 345, 389.85, 'TC-123123', '2022-07-15 21:06:39'),
(1008, 10003, 3, 1, '[{\"id\":\"10\",\"descripcion\":\"Sprite 2LT\",\"cantidad\":\"20\",\"stock\":\"180\",\"precio\":\"10\",\"total\":\"200\"},{\"id\":\"9\",\"descripcion\":\"Fanta Papaya 2,5LT\",\"cantidad\":\"20\",\"stock\":\"180\",\"precio\":\"11\",\"total\":\"220\"},{\"id\":\"8\",\"descripcion\":\"Fanta Naranja 500ML\",\"cantidad\":\"20\",\"stock\":\"180\",\"precio\":\"6\",\"total\":\"120\"},{\"id\":\"7\",\"descripcion\":\"Fanta Naranja 2LT\",\"cantidad\":\"20\",\"stock\":\"180\",\"precio\":\"10\",\"total\":\"200\"},{\"id\":\"6\",\"descripcion\":\"Coca Cola 300ML\",\"cantidad\":\"02\",\"stock\":\"198\",\"precio\":\"5\",\"total\":\"10\"}]', 97.5, 750, 847.5, 'Efectivo', '2022-06-06 16:20:27'),
(1009, 10004, 3, 1, '[{\"id\":\"2\",\"descripcion\":\"Coca Quina 2LT\",\"cantidad\":\"50\",\"stock\":\"190\",\"precio\":\"8\",\"total\":\"400\"},{\"id\":\"3\",\"descripcion\":\"Coca Quina 500ML\",\"cantidad\":\"50\",\"stock\":\"180\",\"precio\":\"5\",\"total\":\"250\"},{\"id\":\"4\",\"descripcion\":\"Coca Cola 2LT\",\"cantidad\":\"50\",\"stock\":\"150\",\"precio\":\"9\",\"total\":\"450\"}]', 143, 1100, 1243, 'Efectivo', '2022-05-25 16:20:58'),
(1010, 10005, 3, 1, '[{\"id\":\"1\",\"descripcion\":\"Coca Quina 3LT\",\"cantidad\":\"30\",\"stock\":\"214\",\"precio\":\"10\",\"total\":\"300\"},{\"id\":\"2\",\"descripcion\":\"Coca Quina 2LT\",\"cantidad\":\"25\",\"stock\":\"165\",\"precio\":\"8\",\"total\":\"200\"},{\"id\":\"3\",\"descripcion\":\"Coca Quina 500ML\",\"cantidad\":\"80\",\"stock\":\"100\",\"precio\":\"5\",\"total\":\"400\"},{\"id\":\"4\",\"descripcion\":\"Coca Cola 2LT\",\"cantidad\":\"50\",\"stock\":\"100\",\"precio\":\"9\",\"total\":\"450\"},{\"id\":\"5\",\"descripcion\":\"Coca cola 500ML\",\"cantidad\":\"20\",\"stock\":\"180\",\"precio\":\"5\",\"total\":\"100\"}]', 188.5, 1450, 1638.5, 'Efectivo', '2022-04-06 16:21:34'),
(1011, 10006, 4, 1, '[{\"id\":\"1\",\"descripcion\":\"Coca Quina 3LT\",\"cantidad\":\"50\",\"stock\":\"164\",\"precio\":\"10\",\"total\":\"500\"},{\"id\":\"2\",\"descripcion\":\"Coca Quina 2LT\",\"cantidad\":\"50\",\"stock\":\"115\",\"precio\":\"8\",\"total\":\"400\"},{\"id\":\"5\",\"descripcion\":\"Coca cola 500ML\",\"cantidad\":\"50\",\"stock\":\"130\",\"precio\":\"5\",\"total\":\"250\"},{\"id\":\"6\",\"descripcion\":\"Coca Cola 300ML\",\"cantidad\":\"50\",\"stock\":\"148\",\"precio\":\"5\",\"total\":\"250\"},{\"id\":\"25\",\"descripcion\":\"Pepsi\",\"cantidad\":\"50\",\"stock\":\"150\",\"precio\":\"11\",\"total\":\"550\"},{\"id\":\"17\",\"descripcion\":\"Four Loko 473ML\",\"cantidad\":\"80\",\"stock\":\"120\",\"precio\":\"25\",\"total\":\"2000\"},{\"id\":\"18\",\"descripcion\":\"Four Loko 695ML\",\"cantidad\":\"60\",\"stock\":\"140\",\"precio\":\"36\",\"total\":\"2160\"}]', 794.3, 6110, 6904.3, 'Efectivo', '2022-03-15 16:22:56'),
(1012, 10007, 4, 1, '[{\"id\":\"1\",\"descripcion\":\"Coca Quina 3LT\",\"cantidad\":\"50\",\"stock\":\"114\",\"precio\":\"10\",\"total\":\"500\"},{\"id\":\"14\",\"descripcion\":\"Pace?a lata 354ML\",\"cantidad\":\"50\",\"stock\":\"150\",\"precio\":\"8\",\"total\":\"400\"},{\"id\":\"15\",\"descripcion\":\"Pace?a lata 473ML\",\"cantidad\":\"50\",\"stock\":\"150\",\"precio\":\"10\",\"total\":\"500\"},{\"id\":\"19\",\"descripcion\":\"Bock lata 473ML\",\"cantidad\":\"50\",\"stock\":\"150\",\"precio\":\"8\",\"total\":\"400\"}]', 234, 1800, 2034, 'TC-456578', '2022-02-15 16:23:43'),
(1013, 10008, 1, 1, '[{\"id\":\"6\",\"descripcion\":\"Coca Cola 300ML\",\"cantidad\":\"10\",\"stock\":\"138\",\"precio\":\"5\",\"total\":\"50\"},{\"id\":\"7\",\"descripcion\":\"Fanta Naranja 2LT\",\"cantidad\":\"12\",\"stock\":\"168\",\"precio\":\"10\",\"total\":\"120\"},{\"id\":\"8\",\"descripcion\":\"Fanta Naranja 500ML\",\"cantidad\":\"115\",\"stock\":\"65\",\"precio\":\"6\",\"total\":\"690\"}]', 111.8, 860, 971.8, 'TD-789879', '2022-01-30 16:24:13'),
(1016, 10011, 3, 1, '[{\"id\":\"1\",\"descripcion\":\"Coca Quina 3LT\",\"cantidad\":\"1\",\"stock\":\"111\",\"precio\":\"10\",\"total\":\"10\"},{\"id\":\"2\",\"descripcion\":\"Coca Quina 2LT\",\"cantidad\":\"1\",\"stock\":\"112\",\"precio\":\"8\",\"total\":\"8\"},{\"id\":\"3\",\"descripcion\":\"Coca Quina 500ML\",\"cantidad\":\"1\",\"stock\":\"97\",\"precio\":\"5\",\"total\":\"5\"}]', 2.99, 23, 25.99, 'TC-4654', '2022-12-15 16:38:54'),
(1017, 10012, 3, 1, '[{\"id\":\"1\",\"descripcion\":\"Coca Quina 3LT\",\"cantidad\":\"1\",\"stock\":\"110\",\"precio\":\"10\",\"total\":\"10\"},{\"id\":\"2\",\"descripcion\":\"Coca Quina 2LT\",\"cantidad\":\"1\",\"stock\":\"111\",\"precio\":\"8\",\"total\":\"8\"},{\"id\":\"3\",\"descripcion\":\"Coca Quina 500ML\",\"cantidad\":\"1\",\"stock\":\"96\",\"precio\":\"5\",\"total\":\"5\"}]', 2.99, 23, 25.99, 'Efectivo', '2022-12-15 16:39:13'),
(1018, 10013, 3, 3, '[{\"id\":\"1\",\"descripcion\":\"Coca Quina 3LT\",\"cantidad\":\"25\",\"stock\":\"87\",\"precio\":\"10\",\"total\":\"250\"},{\"id\":\"2\",\"descripcion\":\"Coca Quina 2LT\",\"cantidad\":\"25\",\"stock\":\"88\",\"precio\":\"8\",\"total\":\"200\"},{\"id\":\"3\",\"descripcion\":\"Coca Quina 500ML\",\"cantidad\":\"25\",\"stock\":\"73\",\"precio\":\"5\",\"total\":\"125\"},{\"id\":\"4\",\"descripcion\":\"Coca Cola 2LT\",\"cantidad\":\"25\",\"stock\":\"75\",\"precio\":\"9\",\"total\":\"225\"}]', 104, 800, 904, 'TC-123123', '2022-12-16 18:09:11'),
(1019, 10014, 3, 1, '[{\"id\":\"1\",\"descripcion\":\"Coca Quina 3LT\",\"cantidad\":\"1\",\"stock\":\"86\",\"precio\":\"10\",\"total\":\"10\"}]', 1.3, 10, 11.3, 'Efectivo', '2022-12-17 00:24:56');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1020;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

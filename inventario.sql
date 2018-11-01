-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-10-2018 a las 11:35:43
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
-- Base de datos: `inventario`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_categorias` ()  NO SQL
SELECT * FROM categoria order by nombre_categoria$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_categoria_byid` (IN `_idCategoria` INT)  NO SQL
SELECT * FROM categoria WHERE idCategoria = _idCategoria$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_productos` ()  NO SQL
SELECT producto.*, categoria.nombre_categoria FROM producto
INNER JOIN categoria ON producto.idCategoria= categoria.idCategoria$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_producto_byid` (IN `_id` INT)  NO SQL
SELECT producto.*, categoria.nombre_categoria FROM producto
INNER JOIN categoria ON producto.idCategoria= categoria.idCategoria WHERE _id = producto.idProducto$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_categoria` (IN `_idCategoria` INT, IN `_nombre_categoria` VARCHAR(120), IN `_descripcion` VARCHAR(120), IN `_fecha` DATE)  NO SQL
UPDATE categoria SET nombre_categoria = _nombre_categoria, descripcion = _descripcion, fecha = _fecha 
WHERE idCategoria = _idCategoria$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_producto` (IN `_idProducto` INT, IN `_nombre_producto` VARCHAR(120), IN `_codigo` VARCHAR(120), IN `_fecha` DATE, IN `_precio` VARCHAR(120), IN `_stock` VARCHAR(120), IN `_idCategoria` INT, IN `_imagenProducto` VARCHAR(120))  NO SQL
UPDATE producto SET 
nombre_producto = _nombre_producto, 
codigo = _codigo, 
fecha = _fecha, 
precio = _precio, 
stock = _stock, 
idCategoria = _idCategoria, 
imagenProducto = _imagenProducto

WHERE idProducto = _idProducto$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_stock` (IN `_cantidad` INT, IN `_idProducto` INT)  NO SQL
UPDATE producto SET stock = stock + _cantidad 
WHERE idProducto = _idProducto$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL,
  `nombre_categoria` varchar(200) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `nombre_categoria`, `descripcion`, `fecha`) VALUES
(1, 'Electronicos', 'Productos de la secciÃ³n de electronica.', '2018-10-25'),
(2, 'Celulares', 'Dispositivos mÃ³viles.', '2018-10-26'),
(3, 'Ropa Caballero', 'CategorÃ­a de ropa para caballero.', '2018-10-26'),
(4, 'Linea Blanca', 'Categoria de linea blanca.', '2018-10-27'),
(5, 'Ropa de Dama', 'CategorÃ­a para la ropa de dama.', '2018-10-27'),
(6, 'Entretenimiento', 'CategorÃ­a para los artÃ­culos de entretenimiento (Consolas, videojuegos, pelÃ­culas).', '2018-10-27'),
(9, 'Accesorios', 'CategorÃ­a para accesorios de diferente tipo.', '2018-10-27'),
(11, 'Ropa para nino', 'Toda la ropa para los ninos', '2018-10-30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `idHistorial` int(11) NOT NULL,
  `idProducto` int(11) DEFAULT NULL,
  `idusuario` int(11) DEFAULT NULL,
  `facha` date DEFAULT NULL,
  `nota` varchar(200) DEFAULT NULL,
  `refrencia` varchar(200) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idProducto` int(11) NOT NULL,
  `nombre_producto` varchar(200) DEFAULT NULL,
  `codigo` varchar(50) NOT NULL,
  `fecha` date DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `idCategoria` int(11) DEFAULT NULL,
  `imagenProducto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProducto`, `nombre_producto`, `codigo`, `fecha`, `precio`, `stock`, `idCategoria`, `imagenProducto`) VALUES
(1, 'iPhone X 128 GB', '1234', '2018-10-31', 19000, 15, 2, 'images/iphx.jpg'),
(2, 'Samsung Galaxy S9', '1FC35', '2018-10-27', 18000, 10, 2, 'images/galaxyS9.jpg'),
(3, 'Xiaomi Mi A2', 'XIA-MA-2', '2018-10-27', 8000, 10, 2, 'images/XiaomiA2.png'),
(5, 'iPhone 8 Plus', '', '2018-10-27', 15000, 10, 2, 'images/Apple-iPhone-8-Plus-256GB.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `apellido` varchar(200) DEFAULT NULL,
  `nombre_usuario` varchar(200) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `correo` varchar(200) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `imagenPerfil` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombre`, `apellido`, `nombre_usuario`, `password`, `correo`, `fecha`, `imagenPerfil`) VALUES
(1, 'Jesus', 'Vega Rodriguez', 'jesusvega', '$2y$10$2BQyCzpwPAClNICm7afuqufFVdD/CLioUUuY594a11PAXkjbviwQO', '1430471@upv.edu.mx', '2018-10-30', 'images/'),
(2, 'Admin', 'Admin', 'admin', '$2y$10$EMJNmZkt4671QKCvOcRfAespix.vCjBs5iK.vM1ispWgJr43T8Klm', 'admin@admin.com', '2018-10-30', 'images/'),
(3, '', '', 'Admin2', '$2y$10$AFLmfBrL7n.T51/Su.BWVez9mnK1eD/EfK441MicMBRPWWSsuFomu', 'admin2@admin.com', '2018-10-30', 'images/');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`idHistorial`),
  ADD KEY `idProducto` (`idProducto`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idProducto`),
  ADD KEY `idCategoria` (`idCategoria`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `idHistorial` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `historial_ibfk_1` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`),
  ADD CONSTRAINT `historial_ibfk_2` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`idCategoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

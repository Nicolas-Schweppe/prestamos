-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 12-07-2019 a las 11:32:37
-- Versión del servidor: 5.7.22
-- Versión de PHP: 7.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `trabajo_final`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `idCliente` int(8) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `dni` varchar(30) NOT NULL,
  `domicilio` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `trabajo` varchar(30) NOT NULL,
  `garante` varchar(30) NOT NULL,
  `telefonoGarante` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idCliente`, `nombre`, `apellido`, `telefono`, `dni`, `domicilio`, `email`, `trabajo`, `garante`, `telefonoGarante`) VALUES
(1, 'roberto', 'nervo', '2920145243', '322232323', 'calle zatty 163', 'roberto_nervo@hotmail.com', 'administracion', 'hector nervos', '2920534212'),
(2, 'agustin', 'garcias', '2920466783', '27463522', 'barrio los frenos', 'agustin_garcia@gimail.com', 'policia', 'juan garcia', '29205342223'),
(3, 'silvio guillermo', 'tordi', '2920404679', '24656549', 'arroyo el ternero', 'stordi@vialidad.gob.ar', 'vialidad nacional', 'guillermo negri', '2920376466'),
(5, 'sebastian', 'hernandez', '29201453323', '278345112', 'las heras 345', 'sebastian_hernandez@hotmail.com', 'administracion', 'hernandes hector', '29203344323'),
(6, 'giuliana paola', 'de vivo', '2920699956', '37212911', 'savedra 321', 'giuli_noimporta@hotmail.com', 'municipalidad', 'nicolas schweppe', '2920344663'),
(8, 'manuel', 'rodriguez', '2920455669', '37451009', 'zatti 344', 'manuel_viedma@hotmail.com', 'comerciante', 'rodriguez hector', '2920544330'),
(9, 'pedro', 'zarga', '29147765354', '34956010', 'patagones', 'pedro_32@yahoo.com', 'monotributista', 'jose zargas', '2919313331'),
(10, 'patricia ', 'hernandez', '2920543454', '24534567', 'barrio amel', 'pato_2960@hotmail.com', 'empleada publica', 'pablo hernandez', '2920653453'),
(12, 'francisco', 'de la nieve', '29203877362', '25345432', 'viedma', 'fran_22_12@hotmail.com', 'empleado', 'de la nieve hector', '29203877363');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuota`
--

CREATE TABLE `cuota` (
  `idCuota` int(25) NOT NULL,
  `idPrestamo` int(25) NOT NULL,
  `numeroCuotas` int(25) NOT NULL,
  `estadoCuota` text NOT NULL,
  `fechaUltima` date NOT NULL,
  `fechaProxima` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cuota`
--

INSERT INTO `cuota` (`idCuota`, `idPrestamo`, `numeroCuotas`, `estadoCuota`, `fechaUltima`, `fechaProxima`) VALUES
(1, 1, 1, 'pagado', '2019-07-04', '2019-08-04'),
(2, 1, 2, 'pagado', '2019-08-04', '2019-09-04'),
(3, 1, 3, 'pagado', '2019-09-04', '2019-10-04'),
(4, 1, 4, 'pagado', '2019-10-04', '2019-11-04'),
(5, 2, 1, 'pagado', '2019-07-04', '2019-08-04'),
(6, 2, 2, 'pagado', '2019-08-04', '2019-09-04'),
(7, 2, 3, 'activo', '2019-09-04', '2019-10-04'),
(8, 2, 4, 'activo', '2019-10-04', '2019-11-04'),
(9, 2, 5, 'activo', '2019-11-04', '2019-12-04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `idFactura` int(25) NOT NULL,
  `idCuota` int(25) NOT NULL,
  `fechaPago` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`idFactura`, `idCuota`, `fechaPago`) VALUES
(1, 1, '2019-07-04'),
(2, 2, '2019-07-04'),
(3, 3, '2019-07-04'),
(4, 4, '2019-07-04'),
(5, 5, '2019-07-04'),
(6, 6, '2019-07-05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `idPerfiles` int(15) NOT NULL,
  `persmisos` varchar(25) NOT NULL,
  `generarPrestamosV` int(3) NOT NULL,
  `prestamosV` int(3) NOT NULL,
  `clientesV` int(3) NOT NULL,
  `usuariosV` int(3) NOT NULL,
  `facturasV` int(3) NOT NULL,
  `cuotas` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`idPerfiles`, `persmisos`, `generarPrestamosV`, `prestamosV`, `clientesV`, `usuariosV`, `facturasV`, `cuotas`) VALUES
(1, 'administrador', 1, 1, 1, 1, 1, 1),
(2, 'operador', 0, 0, 0, 0, 0, 0),
(3, 'encargado', 1, 1, 1, 0, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

CREATE TABLE `prestamos` (
  `idPrestamos` int(25) NOT NULL,
  `idCliente` int(25) NOT NULL,
  `monto` int(25) NOT NULL,
  `total` int(25) NOT NULL,
  `interes` int(25) NOT NULL,
  `cuotas` int(25) NOT NULL,
  `montoCuotas` int(25) NOT NULL,
  `pagado` int(25) NOT NULL,
  `faltante` int(25) NOT NULL,
  `fecha` date DEFAULT NULL,
  `estadoPrestamo` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `prestamos`
--

INSERT INTO `prestamos` (`idPrestamos`, `idCliente`, `monto`, `total`, `interes`, `cuotas`, `montoCuotas`, `pagado`, `faltante`, `fecha`, `estadoPrestamo`) VALUES
(1, 2, 20000, 22400, 12, 4, 5600, 22400, 0, '2019-07-04', 'Finalizado'),
(2, 9, 5000, 6000, 20, 5, 1200, 2400, 3600, '2019-07-04', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimiento`
--

CREATE TABLE `seguimiento` (
  `idSeguimiento` int(8) NOT NULL,
  `fecha` varchar(30) NOT NULL,
  `usuario` varchar(25) NOT NULL,
  `accion` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `seguimiento`
--

INSERT INTO `seguimiento` (`idSeguimiento`, `fecha`, `usuario`, `accion`) VALUES
(1, '4 July 2019 01:03:40 PM', '', 'Salio del Sistema'),
(2, '4 July 2019 01:03:44 PM', 'nicolas', 'Ingreso al Sistema'),
(3, '4 July 2019 01:04:09 PM', 'nicolas', 'Nuevo Prestamo'),
(4, '4 July 2019 01:04:26 PM', 'nicolas', 'Nuevo Prestamo'),
(5, '4 July 2019 01:04:34 PM', 'nicolas', 'Pago de Cuota'),
(6, '4 July 2019 01:04:40 PM', 'nicolas', 'Pago de Cuota'),
(7, '4 July 2019 01:04:59 PM', 'nicolas', 'Pago de Cuota'),
(8, '4 July 2019 01:05:05 PM', 'nicolas', 'Pago de Cuota'),
(9, '4 July 2019 01:05:09 PM', 'nicolas', 'Pago de Cuota'),
(10, '4 July 2019 01:05:18 PM', 'nicolas', 'Pago de Cuota'),
(11, '4 July 2019 01:55:42 PM', 'nicolas', 'Salio del Sistema'),
(12, '4 July 2019 01:55:42 PM', '', 'Salio del Sistema'),
(13, '4 July 2019 01:55:46 PM', 'nicolas', 'Ingreso al Sistema'),
(14, '5 July 2019 08:51:48 AM', 'nicolas', 'Salio del Sistema'),
(15, '5 July 2019 08:51:49 AM', '', 'Salio del Sistema'),
(16, '5 July 2019 08:51:55 AM', 'nicolas', 'Ingreso al Sistema'),
(17, '5 July 2019 11:53:21 AM', 'nicolas', 'Salio del Sistema'),
(18, '5 July 2019 11:53:25 AM', 'nicolas', 'Ingreso al Sistema'),
(19, '5 July 2019 12:08:55 PM', 'nicolas', 'Pago de Cuota'),
(20, '5 July 2019 12:24:21 PM', 'nicolas', 'Salio del Sistema'),
(21, '5 July 2019 12:24:27 PM', 'empleado', 'Ingreso al Sistema'),
(22, '5 July 2019 12:29:53 PM', 'empleado', 'Salio del Sistema'),
(23, '5 July 2019 12:30:01 PM', 'eduardo', 'Ingreso al Sistema'),
(24, '5 July 2019 12:34:07 PM', 'eduardo', 'Salio del Sistema'),
(25, '5 July 2019 12:34:12 PM', 'nicolas', 'Ingreso al Sistema'),
(26, '5 July 2019 12:57:41 PM', 'nicolas', 'Salio del Sistema'),
(27, '5 July 2019 12:57:47 PM', 'empleado', 'Ingreso al Sistema'),
(28, '5 July 2019 01:05:15 PM', 'empleado', 'Salio del Sistema'),
(29, '5 July 2019 01:05:20 PM', 'nicolas', 'Ingreso al Sistema'),
(30, '5 July 2019 01:32:51 PM', 'nicolas', 'Salio del Sistema'),
(31, '5 July 2019 01:32:56 PM', 'empleado', 'Ingreso al Sistema'),
(32, '5 July 2019 01:41:19 PM', 'nicolas', 'Ingreso al Sistema'),
(33, '5 July 2019 01:41:43 PM', 'nicolas', 'Salio del Sistema'),
(34, '5 July 2019 01:41:49 PM', 'empleado', 'Ingreso al Sistema'),
(35, '5 July 2019 01:42:56 PM', 'empleado', 'Salio del Sistema'),
(36, '5 July 2019 01:42:59 PM', '', 'Salio del Sistema'),
(37, '5 July 2019 01:43:00 PM', '', 'Salio del Sistema'),
(38, '5 July 2019 01:43:04 PM', 'nicolas', 'Ingreso al Sistema'),
(39, '5 July 2019 01:43:20 PM', 'nicolas', 'Salio del Sistema'),
(40, '5 July 2019 02:32:18 PM', 'nicolas', 'Ingreso al Sistema'),
(41, '5 July 2019 02:34:40 PM', 'nicolas', 'Salio del Sistema'),
(42, '5 July 2019 02:34:45 PM', 'empleado', 'Ingreso al Sistema'),
(43, '5 July 2019 02:35:33 PM', 'empleado', 'Salio del Sistema'),
(44, '5 July 2019 02:35:40 PM', 'eduardo', 'Ingreso al Sistema'),
(45, '5 July 2019 02:36:00 PM', 'eduardo', 'Salio del Sistema'),
(46, '5 July 2019 02:36:26 PM', 'nicolas', 'Ingreso al Sistema'),
(47, '10 July 2019 07:10:15 PM', 'empleado', 'Ingreso al Sistema'),
(48, '10 July 2019 07:12:38 PM', 'empleado', 'Salio del Sistema'),
(49, '10 July 2019 07:12:42 PM', 'nicolas', 'Ingreso al Sistema'),
(50, '10 July 2019 09:11:56 PM', 'nicolas', 'Ingreso al Sistema'),
(51, '10 July 2019 09:15:04 PM', 'nicolas', 'Salio del Sistema'),
(52, '10 July 2019 09:16:56 PM', 'nicolas', 'Ingreso al Sistema'),
(53, '12 July 2019 03:11:21 PM', 'nicolas', 'Ingreso al Sistema');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(8) NOT NULL,
  `usuario` varchar(15) NOT NULL,
  `contraseña` varchar(120) NOT NULL,
  `permisos` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `usuario`, `contraseña`, `permisos`) VALUES
(1, 'nicolas', 'b9bce7cdc59fe1de6c951f768aa2ee17', 'administrador'),
(2, 'eduardo', 'c3792c84fb35aa24c795b9a3788ae488', 'encargado'),
(3, 'empleado', 'f72e9105795af04cd4da64414d9968ad', 'operador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indices de la tabla `cuota`
--
ALTER TABLE `cuota`
  ADD PRIMARY KEY (`idCuota`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`idFactura`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`idPerfiles`);

--
-- Indices de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD PRIMARY KEY (`idPrestamos`);

--
-- Indices de la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
  ADD PRIMARY KEY (`idSeguimiento`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idCliente` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `cuota`
--
ALTER TABLE `cuota`
  MODIFY `idCuota` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `idFactura` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `idPerfiles` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  MODIFY `idPrestamos` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
  MODIFY `idSeguimiento` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

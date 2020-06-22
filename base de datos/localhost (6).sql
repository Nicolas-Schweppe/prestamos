-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 27-05-2019 a las 07:24:45
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
CREATE DATABASE IF NOT EXISTS `trabajo_final` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `trabajo_final`;

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
(7, 'paolo', 'dinge', '2920344212', '34987555', 'san cayetano 364', 'paolo@hotmail.com', 'administrativo', 'paolo ricardo', '2920344332'),
(8, 'manuel', 'rodriguez', '2920455669', '37451009', 'zatti 344', 'manuel_viedma@hotmail.com', 'comerciante', 'rodriguez hector', '2920544330'),
(9, 'pedro', 'zargas', '29147765354', '34956010', 'patagones', 'pedro_32@yahoo.com', 'monotributista', 'jose zargas', '2919313331'),
(10, 'patricia ', 'hernandez', '2920543454', '24534567', 'barrio amel', 'pato_2960@hotmail.com', 'empleada publica', 'pablo hernandez', '2920653453'),
(11, 'pablo nicolas', 'schweppe', '2920344663', '35415369', 'san cayetano 364', 'nicolas_vialidad@hotmail.com', 'vialidad nacional', 'sandra conforti', '2920506021');

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
(1, 1, 1, 'pagado', '2019-05-24', '2018-05-08'),
(2, 1, 2, 'pagado', '2019-06-24', '2018-07-19'),
(3, 1, 3, 'pagado', '2019-07-24', '2019-08-24'),
(4, 1, 4, 'pagado', '2019-08-24', '2019-04-17'),
(5, 1, 5, 'pagado', '2019-09-24', '2019-10-24'),
(6, 1, 6, 'pagado', '2019-10-24', '2019-11-24'),
(7, 1, 7, 'pagado', '2019-11-24', '2019-12-24'),
(8, 1, 8, 'pagado', '2019-12-24', '2020-01-24'),
(9, 1, 9, 'pagado', '2020-01-24', '2020-02-24'),
(10, 1, 10, 'pagado', '2020-02-24', '2020-03-24'),
(11, 1, 11, 'pagado', '2020-03-24', '2020-04-24'),
(12, 1, 12, 'activo', '2020-04-24', '2020-05-24'),
(13, 2, 1, 'pagado', '2019-05-24', '2019-06-24'),
(14, 2, 2, 'pagado', '2019-06-24', '2019-07-24'),
(15, 2, 3, 'pagado', '2019-07-24', '2019-08-24'),
(16, 2, 4, 'pagado', '2019-08-24', '2019-09-24'),
(17, 2, 5, 'pagado', '2019-09-24', '2019-10-24'),
(18, 2, 6, 'vencido', '2019-10-24', '2018-08-17'),
(19, 2, 7, 'activo', '2019-11-24', '2019-12-24'),
(20, 2, 8, 'activo', '2019-12-24', '2020-01-24'),
(21, 2, 9, 'activo', '2020-01-24', '2020-02-24'),
(22, 2, 10, 'activo', '2020-02-24', '2020-03-24'),
(23, 2, 11, 'pagado', '2020-03-24', '2020-04-24'),
(24, 2, 12, 'vencido', '2020-04-24', '2018-11-14'),
(31, 8, 1, 'pagado', '2019-05-25', '2019-06-25'),
(32, 8, 2, 'pagado', '2019-06-25', '2019-07-25'),
(33, 8, 3, 'pagado', '2019-07-25', '2019-08-25'),
(34, 8, 4, 'pagado', '2019-08-25', '2019-09-25'),
(35, 8, 5, 'pagado', '2019-09-25', '2019-10-25'),
(36, 8, 6, 'pagado', '2019-10-25', '2019-11-25');

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
(1, 15, '2019-05-26'),
(2, 16, '2019-05-26'),
(3, 23, '2019-05-26'),
(4, 17, '2019-05-26'),
(5, 11, '2019-05-26'),
(6, 1, '2019-05-26');

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
  `agregarClientesV` int(3) NOT NULL,
  `modificarClienteV` int(3) NOT NULL,
  `usuariosV` int(3) NOT NULL,
  `reporteV` int(3) NOT NULL,
  `cuotas` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`idPerfiles`, `persmisos`, `generarPrestamosV`, `prestamosV`, `clientesV`, `agregarClientesV`, `modificarClienteV`, `usuariosV`, `reporteV`, `cuotas`) VALUES
(1, 'administrador', 1, 1, 1, 1, 1, 1, 1, 1),
(2, 'operador', 0, 1, 1, 1, 0, 0, 1, 0);

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
(1, 1, 15000, 15750, 5, 12, 1313, 11817, 3933, '2019-05-24', 'activo'),
(2, 10, 50000, 52500, 5, 12, 4375, 26250, 26250, '2019-05-24', 'activo'),
(8, 11, 23000, 25760, 12, 6, 4293, 8586, 17174, '2019-05-25', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimiento`
--

CREATE TABLE `seguimiento` (
  `idSeguimiento` int(8) NOT NULL,
  `idPrestamo` int(8) NOT NULL,
  `idCliente` int(8) NOT NULL,
  `cuotas` int(3) NOT NULL,
  `ultimaCuota` int(8) NOT NULL,
  `fechaUltima` date NOT NULL,
  `fechaProxima` date NOT NULL,
  `faltanCuotas` int(3) NOT NULL,
  `estado` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(8) NOT NULL,
  `usuario` varchar(15) NOT NULL,
  `contraseña` varchar(15) NOT NULL,
  `permisos` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `usuario`, `contraseña`, `permisos`) VALUES
(1, 'nicolas', '2minutos', 'administrador'),
(2, 'empleado', 'ramones', 'operador'),
(3, 'paola', 'punky', 'operador');

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
  MODIFY `idCliente` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `cuota`
--
ALTER TABLE `cuota`
  MODIFY `idCuota` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `idFactura` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `idPerfiles` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  MODIFY `idPrestamos` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
  MODIFY `idSeguimiento` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

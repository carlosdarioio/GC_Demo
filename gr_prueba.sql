-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2020 at 1:26 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gr_prueba`
--

-- --------------------------------------------------------

--
-- Table structure for table `db_almacen`
--

CREATE TABLE `db_almacen` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `descripcion` text NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `db_almacen`
--

INSERT INTO `db_almacen` (`id`, `nombre`, `descripcion`, `estado`) VALUES
(1, 'Primer', 'que todo lo puedes siempre...', 1),
(2, 'test mio', 'test description', 0),
(3, 'Segundo', 'Prueba', 1);

-- --------------------------------------------------------

--
-- Table structure for table `db_clasificaciones_gastos`
--

CREATE TABLE `db_clasificaciones_gastos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `db_clasificaciones_gastos`
--

INSERT INTO `db_clasificaciones_gastos` (`id`, `nombre`, `estado`) VALUES
(1, 'GASTO COMBUSTIBLE2', 0),
(2, 'GASTO COMBUSTIBLE', 1),
(22, 'SERVICIOS WEB', 1),
(23, 'GASTO ALIMENTACION REUNION TRABAJO', 1),
(24, 'GASTOS ADMINISTRATIVOS', 1),
(25, 'SUELDOS Y SALARIOS', 1),
(26, 'IMPUESTOS MUNICIPALES', 1),
(27, 'Comidas', 1),
(28, 'Comidas2', 0);

-- --------------------------------------------------------

--
-- Table structure for table `db_compras_y_gastos`
--

CREATE TABLE `db_compras_y_gastos` (
  `id` int(11) NOT NULL,
  `clasificacion_id` int(11) NOT NULL,
  `proveedor_id` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `numero_documento` varchar(10) NOT NULL,
  `documento_fiscal` varchar(25) NOT NULL,
  `impuesto` double NOT NULL,
  `total` double NOT NULL,
  `saldo` double NOT NULL,
  `id_forma_de_pago` int(11) NOT NULL,
  `referencia` text NOT NULL,
  `concepto` varchar(100) NOT NULL,
  `file` text NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `db_compras_y_gastos`
--

INSERT INTO `db_compras_y_gastos` (`id`, `clasificacion_id`, `proveedor_id`, `fecha`, `numero_documento`, `documento_fiscal`, `impuesto`, `total`, `saldo`, `id_forma_de_pago`, `referencia`, `concepto`, `file`, `estado`) VALUES
(1, 24, 4, '2020-09-12 22:02:37', '123', '-15258', 15, 1500, 0, 2, 'Atraparlos', '', 'icon2.pngZxxZ', 1),
(2, 26, 1, '2020-09-12 22:12:54', '123456789', '002-005-01-15254 99', 15, 24965, 400, 3, 'Atraparlos2', 'Pokemon2', 'icon3.pngZxxZ', 1),
(3, 26, 1, '2020-07-12 22:14:37', '123456789', '002-005-01-15254 99', 15, 24965, 400, 3, 'Atraparlos2', 'Pokemon2', 'icon3.pngZxxZ', 1),
(4, 23, 3, '2020-09-13 08:12:38', '11', '002-005-01-152541', 15, 99, 0, 2, 'Atraparlos', 'Pokemon', 'ZxxZ', 0),
(5, 26, 1, '2020-09-13 15:21:28', '123456', '677665', 15, 500, 400, 2, 'ref', 'concepto', 'ZxxZ', 1),
(6, 2, 1, '2020-09-13 15:55:38', '3', '002-005-01-152541', 13, 150, 400, 3, 'Atraparlos2', 'Pokemon2', 'ZxxZ', 1),
(7, 26, 1, '2020-09-13 16:22:03', '11112', '003-06-100050', 15, 987, 400, 3, 'Pago a CL', 'Concepto de impuesto', 'ZxxZ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `db_formas_de_pago`
--

CREATE TABLE `db_formas_de_pago` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `descripcion` text NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `db_formas_de_pago`
--

INSERT INTO `db_formas_de_pago` (`id`, `nombre`, `descripcion`, `estado`) VALUES
(2, 'CONTADO', 'Pagos de clientes realizados al contado', 1),
(3, 'PAGO-CL', 'Gastos Pagados a x cliente por parte de la empresa.', 1),
(4, 'New Pago form2020a', 'Hay Madreaa111', 0),
(5, 'ioxx', 'pioXX', 0);

-- --------------------------------------------------------

--
-- Table structure for table `db_numeracion`
--

CREATE TABLE `db_numeracion` (
  `id` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `tipo` varchar(60) NOT NULL,
  `numero` int(11) NOT NULL,
  `rangomaximo` int(11) NOT NULL,
  `referencia` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `db_proveedor`
--

CREATE TABLE `db_proveedor` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `saldo` double NOT NULL,
  `fecha` datetime NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `db_proveedor`
--

INSERT INTO `db_proveedor` (`id`, `nombre`, `saldo`, `fecha`, `estado`) VALUES
(1, 'LA UNICA', 400, '2020-09-02 16:04:44', 1),
(2, 'gatey99', 0, '2020-09-12 16:25:37', 0),
(3, 'La nueva Era', 0, '2020-09-12 16:33:33', 1),
(4, 'Blancas', 0, '2020-09-12 16:43:07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `db_ventas`
--

CREATE TABLE `db_ventas` (
  `id` int(11) NOT NULL,
  `no_referencia` varchar(25) NOT NULL,
  `no_factura` varchar(25) NOT NULL,
  `fecha` datetime NOT NULL,
  `id_cliente` varchar(10) NOT NULL,
  `subtotal` double NOT NULL,
  `isv` double NOT NULL,
  `total` double NOT NULL,
  `saldo` double NOT NULL,
  `status` varchar(60) NOT NULL,
  `idalmacen` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `db_ventas`
--

INSERT INTO `db_ventas` (`id`, `no_referencia`, `no_factura`, `fecha`, `id_cliente`, `subtotal`, `isv`, `total`, `saldo`, `status`, `idalmacen`, `id_usuario`) VALUES
(1, '99', '99', '2020-09-08 12:04:31', '99', 99, 99, 99, 99, 'c satus', 1, 1),
(18, '1000013', '004-051-0444', '2020-09-13 15:55:01', 'c9', 849.15, 15, 999, 1000013, 'CL', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `name`) VALUES
(1, '1.jpg'),
(2, '10.png'),
(3, '11.jpg'),
(4, '12.jpg'),
(5, '13.jpg'),
(6, '14.jpg'),
(7, '15.jpg'),
(8, '16.jpg'),
(9, '17.jpg'),
(10, '2.jpg'),
(11, '3.jpg'),
(12, '4.jpg'),
(13, '5.jpg'),
(14, '6.jpg'),
(15, '7.jpg'),
(16, '8.jpg'),
(17, '9.jpg'),
(18, '18.jpg'),
(19, '19.jpg'),
(20, '20.jpg'),
(21, '21.jpg'),
(22, '22.jpg'),
(23, '23.jpg'),
(24, '24.jpg'),
(25, '25.jpg'),
(26, '26.jpg'),
(27, '27.jpg'),
(28, '28.jpg'),
(29, '29.jpg'),
(34, '30.jpg'),
(35, '31.jpg'),
(36, '32.jpg'),
(37, '33.jpg'),
(38, '34.jpg'),
(39, '35.jpeg'),
(40, '36.jpg'),
(41, '37.jpg'),
(42, '38.jpg'),
(43, '39.jpg'),
(45, '40.jpg'),
(46, '41.jpg'),
(47, '42.jpg'),
(48, '43.jpg'),
(49, '44.jpg'),
(50, '45.jpg'),
(51, '46.jpg'),
(52, '47.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kind`
--

CREATE TABLE `kind` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kind`
--

INSERT INTO `kind` (`id`, `name`) VALUES
(1, 'admin'),
(3, 'ventas');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `kind` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `name`, `lastname`, `email`, `password`, `is_active`, `kind`, `created_at`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@admin.intra', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', 1, 1, '2017-05-30 22:18:04'),
(2, 'Programador2', 'carlosdarioio', ' ', 'cdfn33@outlook.com', 'c95593636d4dbd45d88ffc8ad5c8ef56d192e312', 0, 1, '2017-06-02 12:14:49'),
(3, 'GC', 'GASTOS', 'COMPRAS', 'TEST@TEST.INTRAs', '83fa2b2a91836d6c009ee8eb68e8f57cefa20980', 1, 2, '2018-12-11 15:40:22'),
(4, 'Ventas', 'Ventas', 'Ventas', '', '50ff18be2045e6df2144c6c1b946e6653e31279e', 1, 3, '2019-09-04 16:28:27'),
(5, 'test', 'test99zz', 'test99', 'test99', '4028a0e356acc947fcd2bfbf00cef11e128d484a', 0, 2, '2020-09-13 14:46:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `db_almacen`
--
ALTER TABLE `db_almacen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_clasificaciones_gastos`
--
ALTER TABLE `db_clasificaciones_gastos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_compras_y_gastos`
--
ALTER TABLE `db_compras_y_gastos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_formas_de_pago`
--
ALTER TABLE `db_formas_de_pago`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_numeracion`
--
ALTER TABLE `db_numeracion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_proveedor`
--
ALTER TABLE `db_proveedor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_ventas`
--
ALTER TABLE `db_ventas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kind`
--
ALTER TABLE `kind`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `db_almacen`
--
ALTER TABLE `db_almacen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `db_clasificaciones_gastos`
--
ALTER TABLE `db_clasificaciones_gastos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `db_compras_y_gastos`
--
ALTER TABLE `db_compras_y_gastos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `db_formas_de_pago`
--
ALTER TABLE `db_formas_de_pago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `db_numeracion`
--
ALTER TABLE `db_numeracion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `db_proveedor`
--
ALTER TABLE `db_proveedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `db_ventas`
--
ALTER TABLE `db_ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `kind`
--
ALTER TABLE `kind`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1046;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

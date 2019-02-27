-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-02-2019 a las 14:13:45
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `chollosbdd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anuncios`
--

CREATE TABLE `anuncios` (
  `idAnuncio` int(10) NOT NULL,
  `foto` varchar(250) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `precio` int(9) NOT NULL,
  `icono` int(1) NOT NULL,
  `urlAnuncio` varchar(1000) NOT NULL,
  `idUsuario` int(10) NOT NULL,
  `idCategoria` int(10) NOT NULL,
  `idWeb` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `anuncios`
--

INSERT INTO `anuncios` (`idAnuncio`, `foto`, `titulo`, `precio`, `icono`, `urlAnuncio`, `idUsuario`, `idCategoria`, `idWeb`) VALUES
(13, 'https://a.ccdn.es/cnet/2019/01/14/36890012/170156765_g.jpg', 'Toyota yaris', 14500, 1, 'https://www.coches.net/km-0/toyota/yaris/alicante/15_hybrid_active-electrico-hibrido-de-km0-36890012-kovn.aspx', 3, 1, 1),
(14, 'https://a.ccdn.es/cnet/2019/02/26/37573354/174476549_g.jpg', 'Alfa Romeo 147', 2000, 0, 'https://www.coches.net/alfa-romeo-147-16-ts-105cv-selective-3p-gasolina-2005-en-pontevedra-37573354-covo.aspx', 3, 1, 1),
(15, 'https://a.ccdn.es/cnet/2018/07/11/34976444/147411937_g.jpg', 'Renault talisman', 23000, 2, 'https://www.coches.net/renault-talisman-st-zen-energy-dci-118kw-160cv-tt-edc-5p-diesel-2017-en-zamora-34976444-covo.aspx', 3, 1, 1),
(18, 'https://thumb.pccomponentes.com/w-530-530/articles/16/166873/miair01.jpg', 'Xiaomi Mi Air 13.3', 899, 1, 'https://www.pccomponentes.com/xiaomi-mi-air-133', 3, 2, 1),
(19, 'https://thumb.pccomponentes.com/w-530-530/articles/18/181148/001.jpg', 'PcComWorkStation titan', 7823, 2, 'https://www.pccomponentes.com/pccom-workstation-titan-intel-core-i9-9980xe-64gb-1tb-ssd-8tb-titanrtx', 3, 2, 1),
(20, 'https://img.pccomponentes.com/articles/6/64288/64288.jpg', 'AcerV22 21.5\'', 88, 0, 'https://www.pccomponentes.com/acer-v226hql-215-led', 3, 2, 1),
(21, 'https://images.vibbo.com/635x476/945/94501825197.jpg', 'Cesta Relax', 139, 1, 'https://www.vibbo.com/toda-espana/cesta-relax/a121102155/?ca=0_s&st=a&c=12', 3, 3, 1),
(22, 'https://images.vibbo.com/635x476/953/95379615438.jpg', 'Mesa circular', 18, 0, 'https://www.vibbo.com/sta-cruz-tenerife/mesas-circulares/a121310976/?ca=0_s&st=a&c=12', 3, 3, 1),
(23, 'https://ae01.alicdn.com/kf/HTB1W.N3bdfvK1RjSspfq6zzXFXa4.jpg', 'Maceta gigante', 2037, 2, 'https://es.aliexpress.com/store/product/Iron-plant-stand-bonsai-garden-furniture-gigantic-creative-engineering-pot/4691026_32972633153.html?spm=a219c.search0203.3.19.34ae1415PrKUNd&ws_ab_test=searchweb0_0,searchweb201602_7_10065_10068_10547_319_10891_317_10548_10696_10084_453_454_10083_10618_10307_10820_10821_10301_10303_537_536_10902_10059_10884_10887_321_322_10103,searchweb201603_35,ppcSwitch_0&algo_expid=ac4f9d02-d323-4184-b1dc-7c4d93789a91-3&algo_pvid=ac4f9d02-d323-4184-b1dc-7c4d93789a91&transAbTest=ae803_4', 3, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `idCategoria` int(10) NOT NULL,
  `nombreCategoria` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idCategoria`, `nombreCategoria`) VALUES
(1, 'Motor'),
(2, 'Informática'),
(3, 'Hogar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(10) NOT NULL,
  `nombre_apellidos` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombre_apellidos`, `email`, `password`) VALUES
(1, 'Shepi', 'Shepi', '1234'),
(2, 'sheapard', 'shepard', '123'),
(3, 'pinga', 'pinga', '1234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `webanuncios`
--

CREATE TABLE `webanuncios` (
  `idWeb` int(10) NOT NULL,
  `nombreWeb` varchar(20) NOT NULL,
  `url` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `webanuncios`
--

INSERT INTO `webanuncios` (`idWeb`, `nombreWeb`, `url`) VALUES
(1, 'MilAnuncios', 'https://www.milanuncios.es/'),
(2, 'Vibbo', 'https://www.vibbo.com/');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `anuncios`
--
ALTER TABLE `anuncios`
  ADD PRIMARY KEY (`idAnuncio`),
  ADD KEY `idUsuario` (`idUsuario`,`idCategoria`,`idWeb`),
  ADD KEY `idCategoria` (`idCategoria`),
  ADD KEY `idWeb` (`idWeb`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Indices de la tabla `webanuncios`
--
ALTER TABLE `webanuncios`
  ADD PRIMARY KEY (`idWeb`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `anuncios`
--
ALTER TABLE `anuncios`
  MODIFY `idAnuncio` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idCategoria` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `webanuncios`
--
ALTER TABLE `webanuncios`
  MODIFY `idWeb` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `anuncios`
--
ALTER TABLE `anuncios`
  ADD CONSTRAINT `anuncios_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`),
  ADD CONSTRAINT `anuncios_ibfk_2` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`idCategoria`),
  ADD CONSTRAINT `anuncios_ibfk_3` FOREIGN KEY (`idWeb`) REFERENCES `webanuncios` (`idWeb`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

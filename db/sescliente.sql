-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-07-2019 a las 16:52:03
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sescliente`
--
CREATE DATABASE IF NOT EXISTS `sescliente` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sescliente`;

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_edit_us` (IN `usuario` VARCHAR(50), IN `clave` VARCHAR(255), IN `cargo` VARCHAR(50), IN `depto` VARCHAR(50), IN `empresa` INT, IN `correo` VARCHAR(50), IN `telefono` VARCHAR(50), IN `idUser` INT)  BEGIN
	UPDATE usuarios SET Usuario = usuario, Clave = clave, Cargo = cargo, Departamento = depto, idEmpresa = empresa WHERE idUsuario = idUser;
    UPDATE correos SET Correo = correo WHERE idUsuario =  idUser;
    UPDATE telefonos SET Numero = telefono WHERE idUsuario =  idUser;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ingr_us` (IN `usuario` VARCHAR(50), IN `clave` VARCHAR(255), IN `cargo` VARCHAR(50), IN `depto` VARCHAR(50), IN `empresa` INT, IN `correo` VARCHAR(50), IN `telefono` VARCHAR(50))  BEGIN
	INSERT INTO usuarios (Usuario, Clave, Cargo, Departamento, idEmpresa)
    VALUES (usuario, clave, cargo, depto, empresa);
    INSERT INTO correos (Correo, idUsuario) VALUES(correo, LAST_INSERT_ID());
    INSERT INTO telefonos (Numero, idUsuario) VALUES (telefono, LAST_INSERT_ID());
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacorausuarios`
--

CREATE TABLE `bitacorausuarios` (
  `IdBitUs` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `Acceso` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Salida` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `Actividad` varchar(100) NOT NULL,
  `DescripcionAct` text NOT NULL,
  `Ip` varchar(15) DEFAULT NULL,
  `DispositivoCon` enum('Computadora','Tablet','Movil') NOT NULL DEFAULT 'Computadora'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `IdComentarios` int(11) NOT NULL,
  `Comentarios` text NOT NULL,
  `idEncuesta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `correos`
--

CREATE TABLE `correos` (
  `IdCorreo` int(11) NOT NULL,
  `Correo` varchar(150) NOT NULL,
  `idUsuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `correos`
--

INSERT INTO `correos` (`IdCorreo`, `Correo`, `idUsuario`) VALUES
(1, 'a@gmail.com', 1),
(2, 'stan@gmail.com', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `IdDepartamento` int(11) NOT NULL,
  `Departamento` varchar(100) DEFAULT NULL,
  `idPais` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`IdDepartamento`, `Departamento`, `idPais`) VALUES
(1, 'Ahuachapan', 1),
(2, 'Santa Ana', 1),
(3, 'Sonsonate', 1),
(4, 'Chalatenango', 1),
(5, 'La Libertad', 1),
(6, 'San Salvador', 1),
(7, 'Cuscatlan', 1),
(8, 'La Paz', 1),
(9, 'Cabañas', 1),
(10, 'San Vicente', 1),
(11, 'Usulutan', 1),
(12, 'San Miguel', 1),
(13, 'Morazán', 1),
(14, 'La Unión', 1),
(15, 'Quezaltenango', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `idEmpresa` int(11) NOT NULL,
  `NombreComercial` varchar(100) DEFAULT NULL,
  `RazonSocial` varchar(100) DEFAULT NULL,
  `DireccionFisica` varchar(250) DEFAULT NULL,
  `IdMunicipio` int(11) DEFAULT NULL,
  `DescripcionEmpresa` varchar(150) DEFAULT NULL,
  `SectorEconomico` enum('Agricultura','Ganaderia','Pesca','Selvicultura','Mineria','Industria','Comercio','Transporte','Financiero','Social','Servicios') NOT NULL,
  `FechaFundacion` date DEFAULT NULL,
  `Correo` varchar(50) NOT NULL,
  `Telefono` varchar(50) DEFAULT NULL,
  `Iva` char(7) DEFAULT NULL,
  `Nit` char(17) DEFAULT NULL,
  `ContactoEmpresa` varchar(100) DEFAULT NULL,
  `TelefonoContacto` char(9) DEFAULT NULL,
  `CorreoContacto` varchar(100) DEFAULT NULL,
  `CargoEmpresarial` varchar(100) DEFAULT NULL,
  `PropietarioEmpresa` varchar(100) DEFAULT NULL,
  `RepresentanteLegal` varchar(100) DEFAULT NULL,
  `TipoCuenta` enum('Basica','Avanzada') DEFAULT NULL,
  `LogoEmpresa` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`idEmpresa`, `NombreComercial`, `RazonSocial`, `DireccionFisica`, `IdMunicipio`, `DescripcionEmpresa`, `SectorEconomico`, `FechaFundacion`, `Correo`, `Telefono`, `Iva`, `Nit`, `ContactoEmpresa`, `TelefonoContacto`, `CorreoContacto`, `CargoEmpresarial`, `PropietarioEmpresa`, `RepresentanteLegal`, `TipoCuenta`, `LogoEmpresa`) VALUES
(1, 'Super Hamburguesas', 'Hamburgueseria Salvadoreña', 'Colonia Brisas', 114, 'Venta de hamburguesas', '', '2019-01-01', 'super@gmail.com', '7845-1245', '78542-1', '1234-123456-123-1', 'Administrador', '1234-1234', 'a@gmail.com', 'Gerente', 'Administrador', 'Administrador', 'Avanzada', 'assets/images/logos/5d28a063db6b0empresas1.png'),
(2, 'Evergreen', 'The People Company', 'Final 91 av. norte, col. escalon', 110, 'Servicios varios', '', '2008-11-10', 'peoplegreat@change.com', '2262-5200', '98950-8', '1604-789563-125-2', 'Estándar', '2262-5218', 'e@gmail.com', 'gerente', 'Estándar', 'Estándar', 'Basica', 'assets/images/logos/5d1e09482f839');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuestas`
--

CREATE TABLE `encuestas` (
  `idEncuesta` int(11) NOT NULL,
  `NombreEncuesta` varchar(45) NOT NULL,
  `ObjetivoEncuesta` varchar(100) DEFAULT NULL,
  `Estado` enum('Activo','Inactivo') DEFAULT 'Inactivo',
  `FechaCreacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `FechaFinalizacion` timestamp NULL DEFAULT NULL,
  `MensajeInicio` text NOT NULL,
  `MensajeFinalizacion` text NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `Demograficos` enum('Si','No') NOT NULL DEFAULT 'No',
  `Resultados` enum('Si','No') NOT NULL DEFAULT 'No',
  `IdFormato` int(11) DEFAULT NULL,
  `Url` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `encuestas`
--

INSERT INTO `encuestas` (`idEncuesta`, `NombreEncuesta`, `ObjetivoEncuesta`, `Estado`, `FechaCreacion`, `FechaFinalizacion`, `MensajeInicio`, `MensajeFinalizacion`, `idUsuario`, `Demograficos`, `Resultados`, `IdFormato`, `Url`) VALUES
(4, 'Encuesta', 'Evaluacion', 'Inactivo', '2019-07-09 14:10:40', '2019-07-25 06:00:00', 'Gracias por su visita. Contestando esta encuesta, nos ayudará a mejorar nuestros servicios.', 'Muchas Gracias por contestar la encuesta', 1, 'Si', 'Si', 3, 'http://localhost/Survey/PrincipalC/index/?e=NA=='),
(10, 'Caritas', 'ejemplo', 'Inactivo', '2019-07-11 19:25:57', '2019-07-25 06:00:00', 'Gracias por su visita. Contestando esta encuesta, nos ayudará a mejorar nuestros servicios.', 'Muchas Gracias por contestar la encuesta', 1, 'No', 'No', 3, 'http://localhost/Survey/PrincipalC/index/?e=MTA='),
(13, 'Simple', 'Ejemplo', 'Inactivo', '2019-07-11 23:46:55', '0000-00-00 00:00:00', 'Gracias por su visita. Contestando esta encuesta, nos ayudará a mejorar nuestros servicios.', 'Muchas Gracias por contestar la encuesta', 1, 'No', 'No', 1, 'http://localhost/Survey/PrincipalC/index/?e=MTM='),
(15, 'Caritas', 'Ejemplo', 'Inactivo', '2019-07-12 00:00:54', '0000-00-00 00:00:00', 'Gracias por su visita. Contestando esta encuesta, nos ayudará a mejorar nuestros servicios.', 'Muchas Gracias por contestar la encuesta', 1, 'No', 'No', 3, 'http://localhost/Survey/PrincipalC/index/?e=MTU='),
(16, 'Ponderaciones', 'Ejemplo', 'Inactivo', '2019-07-12 01:43:13', '2019-07-12 12:00:00', 'Gracias por su visita. Contestando esta encuesta, nos ayudará a mejorar nuestros servicios.', 'Muchas Gracias por contestar la encuesta', 1, 'No', 'No', 4, 'http://localhost/Survey/PrincipalC/index/?e=MTY='),
(17, 'Manitas', 'Ejemplo', 'Inactivo', '2019-07-12 01:50:09', '2019-07-12 12:00:00', 'Gracias por su visita. Contestando esta encuesta, nos ayudará a mejorar nuestros servicios.', 'Muchas Gracias por contestar la encuesta', 1, 'No', 'No', 5, 'http://localhost/Survey/PrincipalC/index/?e=MTc='),
(18, 'Escala', 'Ejemplo', 'Inactivo', '2019-07-12 01:53:02', '0000-00-00 00:00:00', 'Gracias por su visita. Contestando esta encuesta, nos ayudará a mejorar nuestros servicios.', 'Muchas Gracias por contestar la encuesta', 1, 'No', 'Si', 6, 'http://localhost/Survey/PrincipalC/index/?e=MTg='),
(19, 'Combobox', 'Ejemplo', 'Inactivo', '2019-07-12 01:55:36', '2019-07-12 12:00:00', 'Gracias por su visita. Contestando esta encuesta, nos ayudará a mejorar nuestros servicios.', 'Muchas Gracias por contestar la encuesta', 1, 'Si', 'Si', 7, 'http://localhost/Survey/PrincipalC/index/?e=MTk='),
(20, 'Multiple', 'Ejemplo', 'Inactivo', '2019-07-12 02:25:13', '2019-07-12 12:00:00', 'Gracias por su visita. Contestando esta encuesta, nos ayudará a mejorar nuestros servicios.', '', 1, 'No', 'No', 2, 'http://localhost/Survey/PrincipalC/index/?e=MjA='),
(21, 'example q', 'ver qr', 'Inactivo', '2019-07-16 14:45:39', '2019-07-31 06:00:00', 'Bienvenido(a). Gracias por su visita, contestando la siguiente encuesta, nos ayudara a mejorar.', 'Muchas Gracias por contestar la encuesta', 1, 'Si', 'No', 1, 'http://localhost/Survey/PrincipalC/index/?e=MjE=');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formato`
--

CREATE TABLE `formato` (
  `IdFormato` int(11) NOT NULL,
  `Tipo` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `formato`
--

INSERT INTO `formato` (`IdFormato`, `Tipo`) VALUES
(1, 'Simple'),
(2, 'Multiple'),
(3, 'IconosC'),
(4, 'Ponderaciones'),
(5, 'IconosM'),
(6, 'Escala'),
(7, 'Combobox');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipios`
--

CREATE TABLE `municipios` (
  `IdMunicipio` int(11) NOT NULL,
  `Municipio` varchar(100) DEFAULT NULL,
  `IdDepartamento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `municipios`
--

INSERT INTO `municipios` (`IdMunicipio`, `Municipio`, `IdDepartamento`) VALUES
(1, 'Ahuachapán', 1),
(2, 'Apaneca', 1),
(3, 'Atiquizaya', 1),
(4, 'Concepcion de Ataco', 1),
(5, 'El Refugio', 1),
(6, 'Guaymango', 1),
(7, 'Jujutla', 1),
(8, 'San Francisco Menendez', 1),
(9, 'San Lorenzo', 1),
(10, 'San Pedro Puxtla', 1),
(11, 'Tacuba', 1),
(12, 'Turín', 1),
(13, 'Candelaria de la Frontera', 2),
(14, 'Coatepeque', 2),
(15, 'Chalchuapa', 2),
(16, 'El Congo', 2),
(17, 'El Porvenir', 2),
(18, 'Masahuat', 2),
(19, 'Metapán', 2),
(20, 'San Antonio Pajonal', 2),
(21, 'San Sebastian Salitrillo', 2),
(22, 'Santa Ana', 2),
(23, 'Santa Rosa Guachipilín', 2),
(24, 'Santiago de la Frontera', 2),
(25, 'Texistepeque', 2),
(26, 'Acajutla', 3),
(27, 'Armenia', 3),
(28, 'Caluco', 3),
(29, 'Cuisnahuat', 3),
(30, 'Santa Isabel Ishuatán', 3),
(31, 'Izalco', 3),
(32, 'Juayua', 3),
(33, 'Nahuizalco', 3),
(34, 'Nahulingo', 3),
(35, 'Salcoatitan', 3),
(36, 'San Antonio del Monte', 3),
(37, 'San Julian', 3),
(38, 'Santa Catarina Masahuat', 3),
(39, 'Santo Domingo de Guzman', 3),
(40, 'Sonsonate', 3),
(41, 'Sonzacate', 3),
(42, 'Agua Caliente', 4),
(43, 'Arcatao', 4),
(44, 'Azacualpa', 4),
(45, 'Citalá', 4),
(46, 'Comalapa', 4),
(47, 'Concepción Quezaltepeque', 4),
(48, 'Chalatenango', 4),
(49, 'Dulce Nombre de María', 4),
(50, 'El Carrizal', 4),
(51, 'El Paraíso', 4),
(52, 'La Laguna', 4),
(53, 'La Palma', 4),
(54, 'La Reina', 4),
(55, 'Las Vueltas', 4),
(56, 'Nombre de Jesús', 4),
(57, 'Nueva Concepción', 4),
(58, 'Nueva Trinidad', 4),
(59, 'Ojos de Agua', 4),
(60, 'Potonico', 4),
(61, 'San Antonio de la Cruz', 4),
(62, 'San Antonio los Ranchos', 4),
(63, 'San Fernando ', 4),
(64, 'San Francisco Lempa', 4),
(65, 'San Francisco Morazán', 4),
(66, 'San Ignacio', 4),
(67, 'San Isidro Labrador', 4),
(68, 'San José Cancasque', 4),
(69, 'San José las Flores', 4),
(70, 'San Luis del Carmen', 4),
(71, 'San Miguel de Mercedes', 4),
(72, 'San Rafael', 4),
(73, 'Santa Rita', 4),
(74, 'Tejutla', 4),
(75, 'Antiguo Cuscatlan', 5),
(76, 'Ciudad Arce', 5),
(77, 'Colon', 5),
(78, 'Comasagua', 5),
(79, 'Chiltiupán', 5),
(80, 'Huizucar', 5),
(81, 'Jayaque', 5),
(82, 'Jicalapa', 5),
(83, 'La Libertad', 5),
(84, 'Nuevo Cuscatlan', 5),
(85, 'Santa Tecla', 5),
(86, 'Quezaltepeque', 5),
(87, 'Sacacoyo', 5),
(88, 'San José Villanueva', 5),
(89, 'San Juan Opico', 5),
(90, 'San Matías', 5),
(91, 'San Pablo Tacachico', 5),
(92, 'Tamanique', 5),
(93, 'Talnique', 5),
(94, 'Teotepeque', 5),
(95, 'Tepecoyo', 5),
(96, 'Zaragoza', 5),
(97, 'Aguilares', 6),
(98, 'Apopa', 6),
(99, 'Ayutuxtepeque', 6),
(100, 'Cuscatancingo', 6),
(101, 'El Paisnal', 6),
(102, 'Guazapa', 6),
(103, 'Ilopango', 6),
(104, 'Mejicanos', 6),
(105, 'Nejapa', 6),
(106, 'Panchimalco', 6),
(107, 'Rosario de Mora', 6),
(108, 'San Marcos', 6),
(109, 'San Martín', 6),
(110, 'San Salvador', 6),
(111, 'Santiago Texacuangos', 6),
(112, 'Santo Tomás', 6),
(113, 'Soyapango', 6),
(114, 'Tonacatepeque', 6),
(115, 'Ciudad Delgado', 6),
(116, 'Candelaria', 7),
(117, 'Cojutepeque', 7),
(118, 'El Carmen', 7),
(119, 'El Rosario', 7),
(120, 'Monte San Juan', 7),
(121, 'Oratorio de Concepción', 7),
(122, 'San Bartolomé Perulapía', 7),
(123, 'San Cristóbal', 7),
(124, 'San José Guayabal', 7),
(125, 'San Pedro Perulapán ', 7),
(126, 'San Rafael Cedros', 7),
(127, 'San Ramón', 7),
(128, 'Santa Cruz Analquito', 7),
(129, 'Santa Cruz Michapa', 7),
(130, 'Suchitoto', 7),
(131, 'Tenancingo', 7),
(132, 'Cuyultitan', 8),
(133, 'El Rosario', 8),
(134, 'Jerusalen', 8),
(135, 'Mercedes La Ceiba', 8),
(136, 'Olocuilta', 8),
(137, 'Paraíso de Osorio', 8),
(138, 'San Antonio Masahuat', 8),
(139, 'San Emigdio', 8),
(140, 'San Francísco Chinameca', 8),
(141, 'San Juan Nonualco', 8),
(142, 'San Juan Talpa', 8),
(143, 'San Juan Tepezontes', 8),
(144, 'San Luis Talpa', 8),
(145, 'San Miguel Tepezontes', 8),
(146, 'San Pedro Masahuat', 8),
(147, 'San Pedro Nonualco', 8),
(148, 'San Rafael Obrajuelo', 8),
(149, 'Santa María Ostuma', 8),
(150, 'Santiago Nonualco', 8),
(151, 'Tapalhuaca', 8),
(152, 'Zacatecoluca', 8),
(153, 'San Luis La Herradura', 8),
(154, 'Cinquera', 9),
(155, 'Guacotecti', 9),
(156, 'Ilobasco', 9),
(157, 'Jutiapa', 9),
(158, 'San Isidro', 9),
(159, 'Sensuntepeque', 9),
(160, 'Tejutepeque', 9),
(161, 'Victoria', 9),
(162, 'Dolores', 9),
(163, 'Apastepeque', 10),
(164, 'Guadalupe', 10),
(165, 'San Cayetano Istepeque', 10),
(166, 'Santa Clara', 10),
(167, 'Santo Domingo', 10),
(168, 'San Esteban Catarina', 10),
(169, 'San Ildefonso', 10),
(170, 'San Lorenzo', 10),
(171, 'San Sebastián', 10),
(172, 'San Vicente', 10),
(173, 'Tecoluca', 10),
(174, 'Tepetitán', 10),
(175, 'Verapaz', 10),
(176, 'Alegría', 11),
(177, 'Berlín', 11),
(178, 'California', 11),
(179, 'Concepción Batres', 11),
(180, 'El Triunfo', 11),
(181, 'Ereguayquín', 11),
(182, 'Estanzuelas', 11),
(183, 'Jiquilisco', 11),
(184, 'Jucuapa', 11),
(185, 'Jucuaran', 11),
(186, 'Mercedes Umaña', 11),
(187, 'Nueva Granada', 11),
(188, 'Ozatlan', 11),
(189, 'Puerto el Triunfo', 11),
(190, 'San Agustín', 11),
(191, 'San Buenaventura', 11),
(192, 'San Dionisio', 11),
(193, 'Santa Elena', 11),
(194, 'San Francisco Javier', 11),
(195, 'Santa María', 11),
(196, 'Santiago de María', 11),
(197, 'Tecapan', 11),
(198, 'Usulután', 11),
(199, 'Carolina', 12),
(200, 'Ciudad Barrios', 12),
(201, 'Comacarán', 12),
(202, 'Chapeltique', 12),
(203, 'Chinameca', 12),
(204, 'Chirilagua', 12),
(205, 'El Transito', 12),
(206, 'Lolotique', 12),
(207, 'Moncagua', 12),
(208, 'Nueva Guadalupe', 12),
(209, 'Nuevo Edén de San Juan', 12),
(210, 'Quelepa', 12),
(211, 'San Antonio del Mosco', 12),
(212, 'San Gerardo', 12),
(213, 'San Jorge', 12),
(214, 'San Luis de La Reina', 12),
(215, 'San Miguel', 12),
(216, 'San Rafael Oriente', 12),
(217, 'Sesori', 12),
(218, 'Uluazapa', 12),
(219, 'Arambala', 13),
(220, 'Cacaopera', 13),
(221, 'Corinto', 13),
(222, 'Chilanga', 13),
(223, 'Delicias de Concepción', 13),
(224, 'El Divisadero', 13),
(225, 'El Rosario', 13),
(226, 'Gualococti', 13),
(227, 'Guatajiagua', 13),
(228, 'Joateca', 13),
(229, 'Jocoaitique', 13),
(230, 'Jocoro', 13),
(231, 'Lolotiquillo', 13),
(232, 'Meanguera', 13),
(233, 'Osicala', 13),
(234, 'Perquín', 13),
(235, 'San Carlos', 13),
(236, 'San Fernando', 13),
(237, 'San Francisco Gotera', 13),
(238, 'San Isidro', 13),
(239, 'San Simón', 13),
(240, 'Sensembra', 13),
(241, 'Sociedad', 13),
(242, 'Torola', 13),
(243, 'Yamabal', 13),
(244, 'Yoloaiquín', 13),
(245, 'Anamorós', 14),
(246, 'Bolivar', 14),
(247, 'Concepción de Oriente', 14),
(248, 'Conchagua', 14),
(249, 'El Carmen', 14),
(250, 'El Sauce', 14),
(251, 'Intipuca', 14),
(252, 'La Unión', 14),
(253, 'Lislique', 14),
(254, 'Meanguera del Golfo', 14),
(255, 'Nueva Esparta', 14),
(256, 'Pasaquina', 14),
(257, 'Polomorós', 14),
(258, 'San Alejo', 14),
(259, 'San José', 14),
(260, 'Santa Rosa de Lima', 14),
(261, 'Yayantique', 14),
(262, 'Yucuaiquin', 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE `paises` (
  `idPais` int(11) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`idPais`, `Nombre`) VALUES
(1, 'El Salvador'),
(2, 'Guatemala'),
(3, 'Honduras'),
(4, 'Nicaragua'),
(5, 'Costa Rica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `idPregunta` int(11) NOT NULL,
  `Numero` int(11) NOT NULL,
  `Pregunta` varchar(250) DEFAULT NULL,
  `PorDefecto` enum('1','2') DEFAULT '2',
  `IdEncuesta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`idPregunta`, `Numero`, `Pregunta`, `PorDefecto`, `IdEncuesta`) VALUES
(7, 1, '¿Nos recomendaría con amigo?', '2', 13),
(8, 2, '¿Cómo le parecieron nuestras instalaciones?', '2', 13),
(9, 3, '¿qué le parecieron nuestros nuevos productos?', '2', 13),
(11, 1, '¿Cuál fue el grado de satisfación de su visita?', '2', 15),
(12, 2, '¿Le gustaron nuestras instalaciones?', '2', 15),
(15, 5, '¿Encontró limpias nuestras instalaciones?', '2', 15),
(16, 1, '¿Cómo fue la atención de nuestro personal?', '2', 16),
(17, 2, '¿Encontro limpias y ordenadas nuestras instalaciones?', '2', 16),
(18, 3, '¿Le gustaron nuestros productos?', '2', 16),
(19, 1, '¿Nos recomendría con un amigo?', '2', 17),
(20, 2, '¿Volvería a visitarnos en los proximos treinta días?', '2', 17),
(21, 3, '¿Compraría de nuevo nuestros productos?', '2', 17),
(22, 1, '¿Considera que nuestros precios son competitivos?', '2', 18),
(23, 2, '¿Cómo calificaría nuestros productos?', '2', 18),
(24, 3, '¿Califique nuestra atención?', '2', 18),
(25, 1, '¿Cuál es su edad?', '1', 19),
(26, 2, '¿Cuál es su género?', '1', 19),
(27, 3, '¿Cuál es su ciudad de residencia?', '1', 19),
(28, 4, '¿Nos recomendaría con un amigo?', '2', 19),
(29, 5, '¿Cómo se entero de nuestros servicios?', '2', 19),
(30, 6, '¿Le parece novedosos nuestros productos?', '2', 19),
(31, 1, '¿Nos recomendaría con un amigo?', '2', 20),
(32, 2, '¿Le gustaron nuestras instalaciones?', '2', 20),
(33, 3, '¿Le parecieron limpias nuestras instalaciones?', '2', 20),
(34, 1, '¿Cuál es su edad?', '1', 21),
(35, 2, '¿Cuál es su género?', '1', 21),
(36, 3, '¿Cuál es su ciudad de residencia?', '1', 21),
(37, 4, 'algo', '2', 21),
(38, 5, 'dos', '2', 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicidad`
--

CREATE TABLE `publicidad` (
  `IdPub` int(11) NOT NULL,
  `Imagen` varchar(100) NOT NULL,
  `IdUsuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `publicidad`
--

INSERT INTO `publicidad` (`IdPub`, `Imagen`, `IdUsuario`) VALUES
(5, 'assets/images/publicidad/5d28ea3c4033f3.png', 1),
(6, 'assets/images/publicidad/5d28ea438f9f95d27b872583101.png', 1),
(7, 'assets/images/publicidad/5d28ea4c3b3ed5d1faff4bd419publi2.png', 1),
(8, 'assets/images/publicidad/5d2dde4f9062fpublic4.png', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE `respuestas` (
  `IdRespuestas` int(11) NOT NULL,
  `Numero` int(11) NOT NULL,
  `Respuestas` varchar(45) DEFAULT NULL,
  `IdPregunta` int(11) NOT NULL,
  `Contador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `respuestas`
--

INSERT INTO `respuestas` (`IdRespuestas`, `Numero`, `Respuestas`, `IdPregunta`, `Contador`) VALUES
(9, 1, 'Si', 7, 0),
(10, 2, 'No', 7, 0),
(11, 3, 'Talvez', 7, 0),
(12, 1, 'Limpias', 8, 0),
(14, 3, 'Sucias ', 8, 0),
(15, 4, 'Amigables con el medio ambiente', 8, 0),
(17, 2, 'Calidad', 9, 0),
(18, 3, 'Presentación', 9, 0),
(19, 4, 'Precio', 9, 0),
(22, 1, 'Si', 28, 0),
(23, 2, 'No', 28, 0),
(24, 3, 'Talvez', 28, 0),
(25, 1, '18 años a 28 años', 25, 0),
(26, 2, '29 años a 38 años', 25, 0),
(27, 3, '39 años a 48 años', 25, 0),
(28, 3, '49 años a 58 años', 25, 0),
(29, 4, 'Mayor de 59 años', 25, 0),
(30, 1, 'Radio', 29, 0),
(31, 2, 'Television', 29, 0),
(32, 3, 'Redes sociales', 29, 0),
(34, 2, 'Si son muy innovadores', 30, 0),
(35, 3, 'No no son innovadores', 30, 0),
(36, 1, 'Si', 31, 0),
(37, 2, 'No', 31, 0),
(38, 3, 'Talvez', 31, 0),
(39, 1, 'Si', 32, 0),
(40, 2, 'No', 32, 0),
(41, 3, 'Talvez', 32, 0),
(42, 1, 'Si', 33, 0),
(43, 2, 'No', 33, 0),
(44, 3, 'Talvez', 33, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefonos`
--

CREATE TABLE `telefonos` (
  `IdTelefono` int(11) NOT NULL,
  `Numero` varchar(15) DEFAULT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `telefonos`
--

INSERT INTO `telefonos` (`IdTelefono`, `Numero`, `idUsuario`) VALUES
(5, '7845-7845', 1),
(6, '7285-2020', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `Usuario` varchar(45) DEFAULT NULL,
  `Clave` varchar(250) DEFAULT NULL,
  `Cargo` varchar(50) DEFAULT NULL,
  `Departamento` varchar(50) DEFAULT NULL,
  `Rol` enum('Administrador','Estandar') NOT NULL DEFAULT 'Estandar',
  `Estado` enum('Disponible','Ocupado','Desconectado','Bloqueado') NOT NULL DEFAULT 'Disponible',
  `idEmpresa` int(11) NOT NULL,
  `Foto` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `Usuario`, `Clave`, `Cargo`, `Departamento`, `Rol`, `Estado`, `idEmpresa`, `Foto`) VALUES
(1, 'Administrador', '8cb2237d0679ca88db6464eac60da96345513964', 'Gerente de marca', 'Atencion al cliente', 'Administrador', 'Disponible', 1, 'assets/images/perfil/5d27b8117aa435.jpg'),
(2, 'Estandar', '8cb2237d0679ca88db6464eac60da96345513964', 'Gerente', 'recursos', 'Estandar', 'Disponible', 2, '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bitacorausuarios`
--
ALTER TABLE `bitacorausuarios`
  ADD PRIMARY KEY (`IdBitUs`),
  ADD KEY `fk_bita_usu` (`IdUsuario`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`IdComentarios`),
  ADD KEY `fk_comentarios_encuesta` (`idEncuesta`);

--
-- Indices de la tabla `correos`
--
ALTER TABLE `correos`
  ADD PRIMARY KEY (`IdCorreo`),
  ADD KEY `fk_correos_usuarios` (`idUsuario`),
  ADD KEY `IdCorreo` (`IdCorreo`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`IdDepartamento`),
  ADD KEY `fk_departamentos_pais` (`idPais`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`idEmpresa`),
  ADD UNIQUE KEY `Empresa` (`NombreComercial`),
  ADD KEY `fk_empresas_municipios` (`IdMunicipio`),
  ADD KEY `fk_empre_clasi` (`DescripcionEmpresa`);

--
-- Indices de la tabla `encuestas`
--
ALTER TABLE `encuestas`
  ADD PRIMARY KEY (`idEncuesta`),
  ADD KEY `fk_encuesta_usuario` (`idUsuario`),
  ADD KEY `IdFormato` (`IdFormato`);

--
-- Indices de la tabla `formato`
--
ALTER TABLE `formato`
  ADD PRIMARY KEY (`IdFormato`);

--
-- Indices de la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD PRIMARY KEY (`IdMunicipio`),
  ADD KEY `fk_municipios_departamentos` (`IdDepartamento`);

--
-- Indices de la tabla `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`idPais`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`idPregunta`),
  ADD KEY `fk_preguntas_encuestas` (`IdEncuesta`);

--
-- Indices de la tabla `publicidad`
--
ALTER TABLE `publicidad`
  ADD PRIMARY KEY (`IdPub`),
  ADD KEY `fk_publicidad_usuarios` (`IdUsuario`);

--
-- Indices de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD PRIMARY KEY (`IdRespuestas`),
  ADD KEY `fk_preguntas_respuestas` (`IdPregunta`);

--
-- Indices de la tabla `telefonos`
--
ALTER TABLE `telefonos`
  ADD PRIMARY KEY (`IdTelefono`),
  ADD UNIQUE KEY `Numero` (`Numero`),
  ADD KEY `fk_telefonos_usuarios` (`idUsuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `Usuarioscol_UNIQUE` (`Usuario`),
  ADD KEY `fk_Usuarios_empresa` (`idEmpresa`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bitacorausuarios`
--
ALTER TABLE `bitacorausuarios`
  MODIFY `IdBitUs` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `IdComentarios` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `correos`
--
ALTER TABLE `correos`
  MODIFY `IdCorreo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `IdDepartamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `encuestas`
--
ALTER TABLE `encuestas`
  MODIFY `idEncuesta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `formato`
--
ALTER TABLE `formato`
  MODIFY `IdFormato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `municipios`
--
ALTER TABLE `municipios`
  MODIFY `IdMunicipio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;

--
-- AUTO_INCREMENT de la tabla `paises`
--
ALTER TABLE `paises`
  MODIFY `idPais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `idPregunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `publicidad`
--
ALTER TABLE `publicidad`
  MODIFY `IdPub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `IdRespuestas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `telefonos`
--
ALTER TABLE `telefonos`
  MODIFY `IdTelefono` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bitacorausuarios`
--
ALTER TABLE `bitacorausuarios`
  ADD CONSTRAINT `fk_bita_usu` FOREIGN KEY (`IdUsuario`) REFERENCES `usuarios` (`idUsuario`);

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `fk_comentarios_encuesta` FOREIGN KEY (`idEncuesta`) REFERENCES `encuestas` (`idEncuesta`);

--
-- Filtros para la tabla `correos`
--
ALTER TABLE `correos`
  ADD CONSTRAINT `fk_correos_usuarios` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD CONSTRAINT `fk_departamentos_pais` FOREIGN KEY (`idPais`) REFERENCES `paises` (`idPais`);

--
-- Filtros para la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD CONSTRAINT `fk_empresas_municipios` FOREIGN KEY (`IdMunicipio`) REFERENCES `municipios` (`IdMunicipio`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Filtros para la tabla `encuestas`
--
ALTER TABLE `encuestas`
  ADD CONSTRAINT `fk_encuestas_formato` FOREIGN KEY (`IdFormato`) REFERENCES `formato` (`IdFormato`),
  ADD CONSTRAINT `fk_encuestas_usuarios` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`);

--
-- Filtros para la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD CONSTRAINT `fk_municipios_departamentos` FOREIGN KEY (`IdDepartamento`) REFERENCES `departamentos` (`IdDepartamento`);

--
-- Filtros para la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD CONSTRAINT `fk_preguntas_encuestas` FOREIGN KEY (`IdEncuesta`) REFERENCES `encuestas` (`idEncuesta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `publicidad`
--
ALTER TABLE `publicidad`
  ADD CONSTRAINT `fk_publicidad_usuarios` FOREIGN KEY (`IdUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD CONSTRAINT `fk_preguntas_respuestas` FOREIGN KEY (`IdPregunta`) REFERENCES `preguntas` (`idPregunta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `telefonos`
--
ALTER TABLE `telefonos`
  ADD CONSTRAINT `fk_telefonos_usuarios` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`idEmpresa`) REFERENCES `empresas` (`idEmpresa`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

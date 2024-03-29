-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-07-2019 a las 19:21:11
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
CREATE DATABASE IF NOT EXISTS `sescliente` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
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
(1, 'Super Hamburguesas', 'Hamburgueseria Salvadoreña', 'Colonia Brisas', 114, 'Venta de hamburguesas', 'Servicios', '2019-01-01', 'super@gmail.com', '7845-1245', '78542-1', '1234-123456-123-1', 'Administrador', '1234-1234', 'a@gmail.com', 'Gerente', 'Administrador', 'Administrador', 'Avanzada', 'assets/images/logos/5d28a063db6b0empresas1.png'),
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
  `FechaCreacion` date DEFAULT NULL,
  `FechaActivacion` date NOT NULL,
  `FechaFinalizacion` date DEFAULT NULL,
  `MensajeInicio` text NOT NULL,
  `MensajeFinalizacion` text NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `Demograficos` enum('Si','No') NOT NULL DEFAULT 'No',
  `Resultados` enum('Si','No') NOT NULL DEFAULT 'No',
  `IdFormato` int(11) DEFAULT NULL,
  `Url` varchar(250) NOT NULL,
  `Contador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `encuestas`
--

INSERT INTO `encuestas` (`idEncuesta`, `NombreEncuesta`, `ObjetivoEncuesta`, `Estado`, `FechaCreacion`, `FechaActivacion`, `FechaFinalizacion`, `MensajeInicio`, `MensajeFinalizacion`, `idUsuario`, `Demograficos`, `Resultados`, `IdFormato`, `Url`, `Contador`) VALUES
(13, 'Simple', 'Ejemplo', 'Activo', '2019-07-11', '0000-00-00', '2019-07-31', 'Gracias por su visita. Contestando esta encuesta, nos ayudará a mejorar nuestros servicios.', 'Muchas Gracias por contestar la encuesta', 1, 'No', 'No', 1, 'http://localhost/Survey/PrincipalC/index/?e=MTM=', 13),
(19, 'Combobox', 'Ejemplo', 'Inactivo', '2019-07-11', '0000-00-00', '2019-07-12', 'Gracias por su visita. Contestando esta encuesta, nos ayudará a mejorar nuestros servicios.', 'Muchas Gracias por contestar la encuesta', 1, 'Si', 'Si', 7, 'http://localhost/Survey/PrincipalC/index/?e=MTk=', 0),
(20, 'Multiple', 'Ejemplo', 'Inactivo', '2019-07-11', '0000-00-00', '2019-07-12', 'Gracias por su visita. Contestando esta encuesta, nos ayudará a mejorar nuestros servicios.', '', 1, 'No', 'No', 2, 'http://localhost/Survey/PrincipalC/index/?e=MjA=', 0),
(24, 'Caritas', 'Prueba', 'Activo', '2019-07-24', '0000-00-00', '2019-07-31', '¡Gracias por su visita!. Su opinión es muy importante, por favor conteste la siguiente encuesta, sus comentarios nos ayudarán a mejorar. ', 'Agradecemos que se tomara el tiempo de completar la encuesta, sus comentarios nos permiten mejorar nuestros servicios.', 1, 'Si', 'No', 3, 'http://localhost/Survey/PrincipalC/index/?e=MjQ=', 3),
(25, 'Ponderaciones', 'prueba', 'Activo', '2019-07-24', '0000-00-00', '2019-07-31', '¡Gracias por su visita!. Su opinión es muy importante, por favor conteste la siguiente encuesta, sus comentarios nos ayudarán a mejorar. ', 'Agradecemos que se tomara el tiempo de completar la encuesta, sus comentarios nos permiten mejorar nuestros servicios.', 1, 'No', 'Si', 4, 'http://localhost/Survey/PrincipalC/index/?e=MjU=', 8),
(26, 'Manitas', 'prueba', 'Activo', '2019-07-24', '0000-00-00', '2019-07-31', '¡Gracias por su visita!. Su opinión es muy importante, por favor conteste la siguiente encuesta, sus comentarios nos ayudarán a mejorar. ', 'Agradecemos que se tomara el tiempo de completar la encuesta, sus comentarios nos permiten mejorar nuestros servicios.', 1, 'Si', 'No', 5, 'http://localhost/Survey/PrincipalC/index/?e=MjY=', 4),
(29, 'Escala', 'prueba', 'Activo', '2019-07-24', '0000-00-00', '2019-07-31', '¡Gracias por su visita!. Su opinión es muy importante, por favor conteste la siguiente encuesta, sus comentarios nos ayudarán a mejorar. ', 'Agradecemos que se tomara el tiempo de completar la encuesta, sus comentarios nos permiten mejorar nuestros servicios.', 1, 'Si', 'No', 6, 'http://localhost/Survey/PrincipalC/index/?e=Mjk=', 3);

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
  `Pregunta` varchar(250) DEFAULT NULL,
  `PorDefecto` enum('1','2') DEFAULT '2',
  `IdEncuesta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`idPregunta`, `Pregunta`, `PorDefecto`, `IdEncuesta`) VALUES
(7, '¿Nos recomendaría con amigo?', '2', 13),
(8, '¿Cómo le parecieron nuestras instalaciones?', '2', 13),
(9, '¿qué le parecieron nuestros nuevos productos?', '2', 13),
(25, '¿Cuál es su edad?', '1', 19),
(26, '¿Cuál es su género?', '1', 19),
(27, '¿Cuál es su ciudad de residencia?', '1', 19),
(28, '¿Nos recomendaría con un amigo?', '2', 19),
(29, '¿Cómo se entero de nuestros servicios?', '2', 19),
(30, '¿Le parece novedosos nuestros productos?', '2', 19),
(31, '¿Nos recomendaría con un amigo?', '2', 20),
(32, '¿Le gustaron nuestras instalaciones?', '2', 20),
(33, '¿Le parecieron limpias nuestras instalaciones?', '2', 20),
(57, '¿Cuál es su edad?', '1', 24),
(58, '¿Cuál es su género?', '1', 24),
(59, '¿Cuál es su municipio de residencia?', '1', 24),
(60, '¿Cómo le pareció nuestro servicio?', '2', 24),
(61, '¿Le atendieron amablemente?', '2', 24),
(62, '¿Qué le parecieron nuestras instalaciones?', '2', 24),
(63, '¿Como fue su experiencia con nosotros?', '2', 25),
(64, '¿Encontro la solucion a su respuesta?', '2', 25),
(65, '¿Fue util la informacion proporcionada?', '2', 25),
(66, '¿Cuál es su edad?', '1', 26),
(67, '¿Cuál es su género?', '1', 26),
(68, '¿Cuál es su municipio de residencia?', '1', 26),
(69, '¿Le gusto nuestro servicio?', '2', 26),
(70, '¿Como nos califica?', '2', 26),
(71, '¿Ha sido util la informacion?', '2', 26),
(81, '¿Cuál es su edad?', '1', 29),
(82, '¿Cuál es su género?', '1', 29),
(83, '¿Cuál es su municipio de residencia?', '1', 29),
(84, 'pregunta 1', '2', 29),
(85, 'pregunta 2', '2', 29),
(86, 'pregunta 3', '2', 29);

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
(8, 'assets/images/publicidad/5d2dde4f9062fpublic4.png', 1),
(9, 'assets/images/publicidad/5d3092673520elogo3.png', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE `respuestas` (
  `IdRespuestas` int(11) NOT NULL,
  `Respuestas` varchar(45) DEFAULT NULL,
  `IdPregunta` int(11) NOT NULL,
  `Contador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `respuestas`
--

INSERT INTO `respuestas` (`IdRespuestas`, `Respuestas`, `IdPregunta`, `Contador`) VALUES
(9, 'Si', 7, 6),
(10, 'No', 7, 6),
(11, 'Talvez', 7, 1),
(12, 'Limpias', 8, 2),
(14, 'Sucias', 8, 4),
(15, 'Amigables con el medio ambiente', 8, 7),
(17, 'Calidad', 9, 3),
(18, 'Presentación', 9, 5),
(19, 'Precio', 9, 5),
(22, 'Si', 28, 0),
(23, 'No', 28, 0),
(24, 'Talvez', 28, 0),
(25, '18 años a 28 años', 25, 0),
(26, '29 años a 38 años', 25, 0),
(27, '39 años a 48 años', 25, 0),
(28, '49 años a 58 años', 25, 0),
(29, 'Mayor de 59 años', 25, 0),
(30, 'Radio', 29, 0),
(31, 'Television', 29, 0),
(32, 'Redes sociales', 29, 0),
(34, 'Si son muy innovadores', 30, 0),
(35, 'No no son innovadores', 30, 0),
(36, 'Si', 31, 0),
(37, 'No', 31, 0),
(38, 'Talvez', 31, 0),
(39, 'Si', 32, 0),
(40, 'No', 32, 0),
(41, 'Talvez', 32, 0),
(42, 'Si', 33, 0),
(43, 'No', 33, 0),
(44, 'Talvez', 33, 0),
(96, 'Lo odio', 60, 3),
(97, 'Normal', 60, 1),
(98, 'Me encanta', 60, 1),
(99, 'Lo odio', 61, 1),
(100, 'Normal', 61, 3),
(101, 'Me encanta', 61, 1),
(102, 'Lo odio', 62, 3),
(103, 'Normal', 62, 1),
(104, 'Me encanta', 62, 1),
(105, '-- Selecione su edad', 57, 1),
(106, '', 58, 1),
(107, 'Acajutla', 59, 1),
(108, '1', 63, 1),
(109, '2', 63, 1),
(110, '3', 63, 1),
(111, '4', 63, 1),
(112, '5', 63, 1),
(113, '1', 64, 1),
(114, '2', 64, 1),
(115, '3', 64, 1),
(116, '4', 64, 1),
(117, '5', 64, 1),
(118, '1', 65, 1),
(119, '2', 65, 1),
(120, '3', 65, 1),
(121, '4', 65, 1),
(122, '5', 65, 1),
(123, 'No me gusta', 69, 2),
(124, 'Me gusta', 69, 2),
(125, 'No me gusta', 70, 2),
(126, 'Me gusta', 70, 2),
(127, 'No me gusta', 71, 2),
(128, 'Me gusta', 71, 2),
(129, '-- Selecione su edad', 66, 1),
(130, '', 67, 1),
(131, 'Acajutla', 68, 1),
(198, '0', 84, 1),
(199, '25', 84, 1),
(200, '50', 84, 0),
(201, '75', 84, 1),
(202, '100', 84, 0),
(203, '0', 85, 1),
(204, '25', 85, 1),
(205, '50', 85, 1),
(206, '75', 85, 0),
(207, '100', 85, 0),
(208, '0', 86, 1),
(209, '25', 86, 1),
(210, '50', 86, 0),
(211, '75', 86, 1),
(212, '100', 86, 0),
(213, '-- Selecione su edad', 81, 1),
(214, '', 82, 1),
(215, 'Acajutla', 83, 1);

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
  MODIFY `idEncuesta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

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
  MODIFY `idPregunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT de la tabla `publicidad`
--
ALTER TABLE `publicidad`
  MODIFY `IdPub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `IdRespuestas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;

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

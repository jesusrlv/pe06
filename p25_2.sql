-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 30-04-2026 a las 00:18:27
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `p25_2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion`
--

CREATE TABLE `calificacion` (
  `id` int(11) NOT NULL,
  `id_ext` int(11) NOT NULL,
  `id_jurado` int(11) NOT NULL,
  `documento` int(11) NOT NULL,
  `calificacion` int(11) NOT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogo_documentos`
--

CREATE TABLE `catalogo_documentos` (
  `id` int(11) NOT NULL,
  `documento` varchar(50) NOT NULL,
  `subtitulo` varchar(50) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `link` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `catalogo_documentos`
--

INSERT INTO `catalogo_documentos` (`id`, `documento`, `subtitulo`, `descripcion`, `link`) VALUES
(1, 'Carta Propuesta', 'Carta Propuesta', 'Emitida por alguna institución, organismo, dependencia, agrupación o proponerse a si mismo.', '0'),
(2, 'Currículum Vitae', 'Currículum Vitae', 'Currículum Vitae actualizado con datos generales.', '0'),
(3, 'Semblanza trayectoria', 'Semblanza trayectoria', 'Semblanza trayectoria (máximo una cuartilla)', '0'),
(4, 'Copia acta de nacimiento', 'Copia acta de nacimiento', 'Copia acta de nacimiento', '0'),
(5, 'Copia INE', 'Copia INE', 'Copia de credencial de elector del interesado o del tutor', '0'),
(6, 'Copia simple de comprobante de domicilio', 'Copia simple de comprobante de domicilio', 'Copia simple de comprobante de domicilio no mayor a 3 meses', '0'),
(7, 'CURP', 'CURP', 'CURP en PDF', '0'),
(8, 'Material bibliográfico', 'Material bibliográfico', 'Material bibliográfico, audiovisual y/o gráficos.', '0'),
(9, 'Cápsula video', 'Cápsula video', 'Link de video que no dure más de 60 segundos (Youtube de preferencia)', '0'),
(10, 'Carta protesta de decir verdad', 'Carta protesta de decir verdad', 'Carta protesta de decir verdad donde especifica no ser servidor público', NULL),
(11, 'Constancia de situación fiscal', 'Constancia de situación fiscal', 'Constancia de situación fiscal emitida por el SAT', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'LOGRO ACADÉMICO (12 - 18 AÑOS)'),
(2, 'LOGRO ACADÉMICO (19 - 29 AÑOS)'),
(3, 'DISCAPACIDAD E INTEGRACIÓN'),
(4, 'INGENIO EMPRENDEDOR'),
(5, 'RESPONSABILIDAD SOCIAL'),
(6, 'MÉRITO MIGRANTE'),
(7, 'MÉRITO CAMPESINO'),
(8, 'PROTECCIÓN AL MEDIO AMBIENTE'),
(9, 'CULTURA CÍVICA, POLÍTICA Y DEMOCRACIA'),
(10, 'LITERATURA'),
(11, 'ARTES ESCÉNICAS (MÚSICA)'),
(12, 'ARTES ESCÉNICAS (TEATRO)'),
(13, 'ARTES ESCÉNICAS (DANZA)'),
(14, 'ARTES PLÁSTICAS, VISUALES Y POPULARES'),
(15, 'ARTE URBANO'),
(16, 'CIENCIA Y TECNOLOGÍA (CIENCIAS APLICADAS)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

CREATE TABLE `documentos` (
  `id` int(11) NOT NULL,
  `documento` int(11) NOT NULL COMMENT 'Tipo documento numerado',
  `id_ext` int(11) NOT NULL,
  `link` varchar(150) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `documentos`
--

INSERT INTO `documentos` (`id`, `documento`, `id_ext`, `link`, `fecha`) VALUES
(1, 1, 1, 'docs/archivo1_1.pdf', '2026-04-29 15:51:13'),
(2, 2, 1, 'docs/archivo2_1.pdf', '2026-04-29 15:51:27'),
(3, 3, 1, 'docs/archivo3_1.pdf', '2026-04-29 15:51:35'),
(4, 5, 1, 'docs/archivo5_1.pdf', '2026-04-29 15:51:44'),
(5, 6, 1, 'docs/archivo6_1.pdf', '2026-04-29 15:51:52'),
(6, 4, 1, 'docs/archivo4_1.pdf', '2026-04-29 15:52:08'),
(7, 7, 1, 'docs/archivo7_1.pdf', '2026-04-29 15:52:17'),
(8, 8, 1, 'docs/archivo8_1.pdf', '2026-04-29 15:52:32'),
(9, 9, 1, 'https://www.youtube.com/watch?v=pitrvrqix00&pp=ugUIEgZlcy00MTk%3D', '2026-04-29 15:54:17'),
(10, 10, 1, 'docs/archivo10_1.pdf', '2026-04-29 15:54:56'),
(11, 11, 1, 'docs/archivo11_1.pdf', '2026-04-29 15:55:03'),
(12, 1, 427, 'docs/archivo1_427.pdf', '2026-04-29 16:43:07'),
(13, 2, 427, 'docs/archivo2_427.pdf', '2026-04-29 16:43:57'),
(14, 3, 427, 'docs/archivo3_427.pdf', '2026-04-29 16:44:04'),
(15, 4, 427, 'docs/archivo4_427.pdf', '2026-04-29 16:44:14'),
(16, 5, 427, 'docs/archivo5_427.pdf', '2026-04-29 16:44:21'),
(17, 6, 427, 'docs/archivo6_427.pdf', '2026-04-29 16:45:40'),
(18, 7, 427, 'docs/archivo7_427.pdf', '2026-04-29 16:45:46'),
(19, 8, 427, 'docs/archivo8_427.pdf', '2026-04-29 16:45:56'),
(20, 9, 427, 'sss', '2026-04-29 16:46:01'),
(21, 10, 427, 'docs/archivo10_427.pdf', '2026-04-29 16:46:09'),
(22, 11, 427, 'docs/archivo11_427.pdf', '2026-04-29 16:46:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado`
--

CREATE TABLE `grado` (
  `id` int(11) NOT NULL,
  `grado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `grado`
--

INSERT INTO `grado` (`id`, `grado`) VALUES
(1, 'Primaria'),
(2, 'Secundaria'),
(3, 'Preparatoria'),
(4, 'Universidad'),
(5, 'Maestría'),
(6, 'Doctorado'),
(7, 'Otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE `municipio` (
  `id` int(11) NOT NULL,
  `municipio` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`id`, `municipio`) VALUES
(1, 'Apozol'),
(2, 'Apulco'),
(3, 'Atolinga'),
(4, 'Benito Juárez'),
(5, 'Calera'),
(6, 'Cañitas de Felipe Pescador'),
(7, 'Concepción del Oro'),
(8, 'Cuauhtémoc'),
(9, 'Chalchihuites'),
(10, 'Fresnillo'),
(11, 'Trinidad García de la Cadena'),
(12, 'Genaro Codina'),
(13, 'General Enrique Estrada'),
(14, 'General Francisco R. Murguía'),
(15, 'El Plateado de Joaquín Amaro'),
(16, 'General Pánfilo Natera'),
(17, 'Guadalupe'),
(18, 'Huanusco'),
(19, 'Jalpa'),
(20, 'Jerez'),
(21, 'Jiménez del Teul'),
(22, 'Juan Aldama'),
(23, 'Juchipila'),
(24, 'Loreto'),
(25, 'Luis Moya'),
(26, 'Mazapil'),
(27, 'Melchor Ocampo'),
(28, 'Mezquital del Oro'),
(29, 'Miguel Auza'),
(30, 'Momax'),
(31, 'Monte Escobedo'),
(32, 'Morelos'),
(33, 'Moyahua de Estrada'),
(34, 'Nochistlán de Mejía'),
(35, 'Noria de Ángeles'),
(36, 'Ojocaliente'),
(37, 'Pánuco'),
(38, 'Pinos'),
(39, 'Río Grande'),
(40, 'Sain Alto'),
(41, 'El Salvador'),
(42, 'Sombrerete'),
(43, 'Susticacán'),
(44, 'Tabasco'),
(45, 'Tepechitlán'),
(46, 'Tepetongo'),
(47, 'Teúl de González Ortega'),
(48, 'Tlaltenango de Sánchez Román'),
(49, 'Valparaíso'),
(50, 'Vetagrande'),
(51, 'Villa de Cos'),
(52, 'Villa García'),
(53, 'Villa González Ortega'),
(54, 'Villa Hidalgo'),
(55, 'Villanueva'),
(56, 'Zacatecas'),
(57, 'Trancoso'),
(58, 'Santa María de la Paz');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usr`
--

CREATE TABLE `usr` (
  `id` int(11) NOT NULL,
  `usr` varchar(36) DEFAULT NULL,
  `pwd` varchar(100) DEFAULT NULL,
  `perfil` int(11) DEFAULT NULL,
  `curp` varchar(18) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `municipio` int(11) DEFAULT NULL,
  `telefono` varchar(30) DEFAULT NULL,
  `categoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usr`
--

INSERT INTO `usr` (`id`, `usr`, `pwd`, `perfil`, `curp`, `nombre`, `edad`, `municipio`, `telefono`, `categoria`) VALUES
(6, 'califica1', '123456789', 3, NULL, 'Califica 1', 0, 10, '0', 13),
(7, 'califica2', '123456789', 3, NULL, '', 0, 34, '0', 11),
(8, 'califica3', '123456789', 3, NULL, '', 0, 32, '0', 0),
(21, 'SAMR090824HZSLRDA7', '0', 2022, 'SAMR090824HZSLRDA7', 'SAMR090824HZSLRDA7', 0, 0, '0', 2022),
(23, 'LIMS950308MZSRNN00', '0', 2022, 'LIMS950308MZSRNN00', '0', 0, 0, '0', 2022),
(24, 'RAMM990829MZSMRY03', '0', 0, 'RAMM990829MZSMRY03', 'RAMM990829MZSMRY03', 0, 0, '0', 2022),
(25, 'mald930713mzsrpn09', '0', 0, 'mald930713mzsrpn09', '0', 0, 0, '0', 2022),
(26, 'GABN980327MZSRRB08', '0', 0, 'GABN980327MZSRRB08', '0', 0, 0, '0', 2022),
(27, 'MARM011221HZSRBRA0', '0', 0, 'MARM011221HZSRBRA0', '0', 0, 0, '0', 2022),
(28, 'EARI931001MZSSMT09', '0', 0, 'EARI931001MZSSMT09', '0', 0, 0, '0', 2022),
(29, 'MERA930502HZSNMN06', '0', 0, 'MERA930502HZSNMN06', '0', 0, 0, '0', 2022),
(30, 'PAPJ001004HZSMRSA2', '0', 0, 'PAPJ001004HZSMRSA2', '0', 0, 0, '0', 2022),
(31, 'EARZ930910MZSSDR03', '0', 0, 'EARZ930910MZSSDR03', '0', 0, 0, '0', 2022),
(32, 'MECF941126HZSNLL00', '0', 0, 'MECF941126HZSNLL00', '0', 0, 0, '0', 2022),
(33, 'LAML930823MZSRRS04', '0', 0, 'LAML930823MZSRRS04', '0', 0, 0, '0', 2022),
(34, 'MAOR050102HZSRRYA1', '0', 0, 'MAOR050102HZSRRYA1', '0', 0, 0, '0', 2022),
(35, 'HERD930220HZSRDV06', '0', 0, 'HERD930220HZSRDV06', '0', 0, 0, '0', 2022),
(36, 'AIAE980509HZSVRD05', '0', 0, 'AIAE980509HZSVRD05', '0', 0, 0, '0', 2022),
(38, 'adminInj', '123456789qwerty', 2, '0', 'Admin', 0, 0, '0', 0),
(55, 'AOAJ030427HZSRLRA4', '0', 2021, 'AOAJ030427HZSRLRA4', 'AOAJ030427HZSRLRA4', 0, 0, '0', 2021),
(56, 'EATA940916MZSSNN17', '0', 2021, 'EATA940916MZSSNN17', 'EATA940916MZSSNN17', 0, 0, '0', 2021),
(57, 'MUSA030923HZSXLNA3', '0', 2021, 'MUSA030923HZSXLNA3', 'MUSA030923HZSXLNA3', 0, 0, '0', 2021),
(58, 'SOMG931024MZSRRB01', '0', 2021, 'SOMG931024MZSRRB01', 'SOMG931024MZSRRB01', 0, 0, '0', 2021),
(59, 'SIJC910718MZSLMR19', '0', 2021, 'SIJC910718MZSLMR19', 'SIJC910718MZSLMR19', 0, 0, '0', 2021),
(60, 'ROZG971031HZSBMR08', '0', 2021, 'ROZG971031HZSBMR08', 'ROZG971031HZSBMR08', 0, 0, '0', 2021),
(61, 'VAXA980224HNEZXR01', '0', 2021, 'VAXA980224HNEZXR01', 'VAXA980224HNEZXR01', 0, 0, '0', 2021),
(62, 'HEZD971206HZSRXG04', '0', 2021, 'HEZD971206HZSRXG04', 'HEZD971206HZSRXG04', 0, 0, '0', 2021),
(63, 'SAVM020521HZSLLRA1', '0', 2021, 'SAVM020521HZSLLRA1', 'SAVM020521HZSLLRA1', 0, 0, '0', 2021),
(64, 'ROMA930416MZSDNL04', '0', 2021, 'ROMA930416MZSDNL04', 'ROMA930416MZSDNL04', 0, 0, '0', 2021),
(65, 'MAHE040422HZSNRLA6', '0', 2021, 'MAHE040422HZSNRLA6', 'MAHE040422HZSNRLA6', 0, 0, '0', 2021),
(66, 'SIJS931129MZSLML06', '0', 2021, 'SIJS931129MZSLML06', 'SIJS931129MZSLML06', 0, 0, '0', 2021),
(67, 'AAME960720HZSLLN07', '0', 2021, 'AAME960720HZSLLN07', 'AAME960720HZSLLN07', 0, 0, '0', 2021),
(68, 'PEPJ990624HZSRRN05', '0', 2021, 'PEPJ990624HZSRRN05', 'PEPJ990624HZSRRN05', 0, 0, '0', 2021),
(69, 'GAGA920430HZSLLM03', '0', 2021, 'GAGA920430HZSLLM03', 'GAGA920430HZSLLM03', 0, 0, '0', 2021),
(70, 'MEOC911207HZSRRH05', '0', 2021, 'MEOC911207HZSRRH05', 'MEOC911207HZSRRH05', 0, 0, '0', 2021),
(71, 'EIHJ971228HZSSRM07', '0', 2021, 'EIHJ971228HZSSRM07', 'EIHJ971228HZSSRM07', 0, 0, '0', 2021),
(164, 'logroacademicoA01', 'INJacademicoA01', 3, NULL, 'logroacademicoA01', NULL, NULL, NULL, 1),
(165, 'logroacademicoA02', 'INJacademicoA02', 33, NULL, 'logroacademicoA02', NULL, NULL, NULL, 1),
(166, 'logroacademicoA03', 'INJacademicoA03', 33, NULL, 'logroacademicoA03', NULL, NULL, NULL, 1),
(167, 'logroacademicoB01', 'INJacademicoB01', 33, NULL, 'logroacademicoB01', NULL, NULL, NULL, 2),
(168, 'logroacademicoB02', 'INJacademicoB02', 33, NULL, 'logroacademicoB02', NULL, NULL, NULL, 2),
(169, 'logroacademicoB03', 'INJacademicoB03', 33, NULL, 'logroacademicoB03', NULL, NULL, NULL, 2),
(170, 'discintegracion01', 'INJdisc01', 33, NULL, 'discintegracion01', NULL, NULL, NULL, 3),
(171, 'discintegracion02', 'INJdisc02', 33, NULL, 'discintegracion02', NULL, NULL, NULL, 3),
(172, 'discintegracion03', 'INJdisc03', 33, NULL, 'discintegracion03', NULL, NULL, NULL, 3),
(173, 'ingemp01', 'INJingemp01', 33, NULL, 'ingemp01', NULL, NULL, NULL, 4),
(174, 'ingemp02', 'INJingemp02', 33, NULL, 'ingemp02', NULL, NULL, NULL, 4),
(175, 'ingemp03', 'INJingemp03', 33, NULL, 'ingemp03', NULL, NULL, NULL, 4),
(176, 'respsoc01', 'INJrespsoc01', 33, NULL, 'respsoc01', NULL, NULL, NULL, 5),
(177, 'respsoc02', 'INJrespsoc02', 33, NULL, 'respsoc02', NULL, NULL, NULL, 5),
(178, 'respsoc03', 'INJrespsoc03', 33, NULL, 'respsoc03', NULL, NULL, NULL, 5),
(179, 'mmigrante01', 'INJmmigrante01', 33, NULL, 'mmigrante01', NULL, NULL, NULL, 6),
(180, 'mmigrante02', 'INJmmigrante02', 33, NULL, 'mmigrante02', NULL, NULL, NULL, 6),
(181, 'mmigrante03', 'INJmmigrante03', 33, NULL, 'mmigrante03', NULL, NULL, NULL, 6),
(182, 'mcampesino01', 'INJmcampesino01', 33, NULL, 'mcampesino01', NULL, NULL, NULL, 7),
(183, 'mcampesino02', 'INJmcampesino02', 33, NULL, 'mcampesino02', NULL, NULL, NULL, 7),
(184, 'mcampesino03', 'INJmcampesino03', 33, NULL, 'mcampesino03', NULL, NULL, NULL, 7),
(185, 'pmedioamb01', 'INJpmedioamb01', 33, NULL, 'pmedioamb01', NULL, NULL, NULL, 8),
(186, 'pmedioamb02', 'INJpmedioamb02', 33, NULL, 'pmedioamb02', NULL, NULL, NULL, 8),
(187, 'pmedioamb03', 'INJpmedioamb03', 33, NULL, 'pmedioamb03', NULL, NULL, NULL, 8),
(188, 'ccivicapm01', 'INJccivicapm01', 33, NULL, 'ccivicapm01', NULL, NULL, NULL, 9),
(189, 'ccivicapm02', 'INJccivicapm02', 33, NULL, 'ccivicapm02', NULL, NULL, NULL, 9),
(190, 'ccivicapm03', 'INJccivicapm03', 33, NULL, 'ccivicapm03', NULL, NULL, NULL, 9),
(191, 'literatura01', 'INJliteratura01', 33, NULL, 'literatura01', NULL, NULL, NULL, 10),
(192, 'literatura02', 'INJliteratura02', 33, NULL, 'literatura02', NULL, NULL, NULL, 10),
(193, 'literatura03', 'INJliteratura03', 33, NULL, 'literatura03', NULL, NULL, NULL, 10),
(194, 'aemusica01', 'INJaemusica01', 33, NULL, 'aemusica01', NULL, NULL, NULL, 11),
(195, 'aemusica02', 'INJaemusica02', 33, NULL, 'aemusica02', NULL, NULL, NULL, 11),
(196, 'aemusica03', 'INJaemusica03', 33, NULL, 'aemusica03', NULL, NULL, NULL, 11),
(197, 'aeteatro01', 'INJaeteatro01', 33, NULL, 'aeteatro01', NULL, NULL, NULL, 12),
(198, 'aeteatro02', 'INJaeteatro02', 33, NULL, 'aeteatro02', NULL, NULL, NULL, 12),
(199, 'aeteatro03', 'INJaeteatro03', 33, NULL, 'aeteatro03', NULL, NULL, NULL, 12),
(200, 'aedanza01', 'INJaedanza01', 33, NULL, 'aedanza01', NULL, NULL, NULL, 13),
(201, 'aedanza02', 'INJaedanza02', 33, NULL, 'aedanza02', NULL, NULL, NULL, 13),
(202, 'aedanza03', 'INJaedanza03', 33, NULL, 'aedanza03', NULL, NULL, NULL, 13),
(203, 'apvp01', 'INJapvp01', 33, NULL, 'apvp01', NULL, NULL, NULL, 14),
(204, 'apvp02', 'INJapvp02', 33, NULL, 'apvp02', NULL, NULL, NULL, 14),
(205, 'apvp03', 'INJapvp03', 33, NULL, 'apvp03', NULL, NULL, NULL, 14),
(206, 'aurbano01', 'INJaurbano01', 33, NULL, 'aurbano01', NULL, NULL, NULL, 15),
(207, 'aurbano02', 'INJaurbano02', 33, NULL, 'aurbano02', NULL, NULL, NULL, 15),
(208, 'aurbano03', 'INJaurbano03', 33, NULL, 'aurbano03', NULL, NULL, NULL, 15),
(209, 'cienciasaplicadas01', 'INJcienciasa01', 3, NULL, 'cienciasaplicadas01', NULL, NULL, NULL, 16),
(210, 'cienciasaplicadas02', 'INJcienciasa02', 3, NULL, 'cienciasaplicadas02', NULL, NULL, NULL, 16),
(211, 'cienciasaplicadas03', 'INJcienciasa03', 3, NULL, 'cienciasaplicadas03', NULL, NULL, NULL, 16),
(259, 'NotarioPublicoINJ', 'NTJuventud@01', 4, '0', 'Notario Público', 0, 0, '0', 0),
(261, 'GOSB080606HZSNNRA1', '0', 2023, 'GOSB080606HZSNNRA1', 'GOSB080606HZSNNRA1', 0, 0, '0', 2023),
(262, 'ROMP970822MZSSDR03', '0', 2023, 'ROMP970822MZSSDR03', 'ROMP970822MZSSDR03', 0, 0, '0', 2023),
(263, 'OIDF060418MZSRVTA7', '0', 2023, 'OIDF060418MZSRVTA7', 'OIDF060418MZSRVTA7', 0, 0, '0', 2023),
(264, 'CEDA941227MZSRXL02', '0', 2023, 'CEDA941227MZSRXL02', 'CEDA941227MZSRXL02', 0, 0, '0', 2023),
(265, 'RACF950826MZSMLT00', '0', 2023, 'RACF950826MZSMLT00', 'RACF950826MZSMLT00', 0, 0, '0', 2023),
(266, 'LUFA060526MDGVLNA2', '0', 2023, 'LUFA060526MDGVLNA2', 'LUFA060526MDGVLNA2', 0, 0, '0', 2023),
(267, 'PAVE970308MZSLLS00', '0', 2023, 'PAVE970308MZSLLS00', 'PAVE970308MZSLLS00', 0, 0, '0', 2023),
(268, 'OIAM971106MZSRLN05', '0', 2023, 'OIAM971106MZSRLN05', 'OIAM971106MZSRLN05', 0, 0, '0', 2023),
(269, 'CAMS970531MZSSCR07', '0', 2023, 'CAMS970531MZSSCR07', 'CAMS970531MZSSCR07', 0, 0, '0', 2023),
(270, 'AADR950224HZSRXF00', '0', 2023, 'AADR950224HZSRXF00', 'AADR950224HZSRXF00', 0, 0, '0', 2023),
(271, 'VIDI940310HZSLVS07', '0', 2023, 'VIDI940310HZSLVS07', 'VIDI940310HZSLVS07', 0, 0, '0', 2023),
(272, 'ROMA961110MZSBRN04', '0', 2023, 'ROMA961110MZSBRN04', 'ROMA961110MZSBRN04', 0, 0, '0', 2023),
(273, 'BASE960302MGTZMD08', '0', 2023, 'BASE960302MGTZMD08', 'BASE960302MGTZMD08', 0, 0, '0', 2023),
(274, 'VAHD980731MZSLRN03', '0', 2023, 'VAHD980731MZSLRN03', 'VAHD980731MZSLRN03', 0, 0, '0', 2023),
(275, 'GABS980911MZSLNR00', '0', 2023, 'GABS980911MZSLNR00', 'GABS980911MZSLNR00', 0, 0, '0', 2023),
(276, 'RORA940510HZSDDL08', '0', 2023, 'RORA940510HZSDDL08', 'RORA940510HZSDDL08', 0, 0, '0', 2023),
(277, 'fridamariabarrios@gmail.com', 'Capsula8', 1, 'BAPF950204MZSRLR02', 'Frida Barrios', 29, 17, '4929499677', 5),
(278, 'acunayeimy@gmail.com', 'AnniramFca12#', 1, 'AUVY971110MZSCLM04', 'Yeimy Marina Acuña Valencia', 26, 56, '4921600088', 9),
(279, 'revazosrecicla@gmail.com', 'Leanbeck723', 1, 'ZUCE941009HZSXML09', 'Eliazar', 29, 56, '4921195682', 8),
(280, 'alexchivas1396@gmail.com', 'Alex10alfaro', 1, 'ROAA960313HZSDLL03', 'Alejandro Rodríguez Alfaro', 28, 17, '4922188097', 4),
(281, 'tecnologias.injuventud@gmail.com', 'montserrat29', 0, 'SAAS990209MZSLRN09', 'Sonia Montserrat Saldivar Arteaga', 25, 31, '4921232458', 1),
(282, 'danielaguilardiosdado@gmail.com', 'Dani12345', 1, 'AUDJ020524HZSGSLA2', 'Julio César Daniel Aguilar Diosdado ', 22, 56, '4921621521', 13),
(283, 'montoyamigue70@gmail.com', 'Mamc07117Ar', 1, 'MOCM071117HZSNRGA3', 'Miguel', 16, 35, '496 142 1665', 4),
(284, 'yahirnava508@gmail.com', 'rayadodecorazon', 1, 'LONP050426HZSPVBA3', 'Pablo Yahir López Nava ', 19, 48, '4371097990', 7),
(285, 'jazminselene1999@gmail.com', 'Jazmin12', 1, 'AIGS991229MZSVLL06', 'Selene Jazmin De Ávila Galván ', 24, 17, '+52 492 294 1402', 5),
(286, 'jh7708912@gmail.com', 'E07B2J16', 1, 'HEGB070114MHGRNRA0', 'Brenda ', 17, 48, '4371023461', 1),
(287, 'lisset.chairez@gmail.com', 'Pereida199', 1, 'CARK970430MZSHJN03', 'Kennia Higinia Lisset Chairez Rojas', 27, 56, '4922504899', 2),
(288, 'ximeavila2002@gmail.com', 'bonita2002', 1, 'AIMX020509MZSVRMA0', 'Ximena Ávila Márquez ', 22, 55, '4991007307', 4),
(289, 'valeriaiarteaga@gmail.com', 'IronFeAlpha\"1043', 1, 'AEMV970803MCHRXL07', 'Valeria Itzel Arteaga Muniz', 26, 17, '4921752201', 2),
(290, 'jjuanm127@icloud.com', 'FSAlicemad224', 1, 'MABJ950211HZSCRN08', 'Juan Carlos Macías Berumen', 29, 20, '4941164831', 10),
(291, 'maximilianoqr20@gmail.com', 'Maxquintero222', 1, 'QURM000220HZSNNXA6', 'Maximiliano ', 24, 56, '4921741753', 11),
(292, 'jesshernandez9907@hotmail.com', '_Julioxx28_', 1, 'HEMJ990728MZSRNS06', 'Jessica Hernández Mendiola', 24, 56, '4921234409', 2),
(293, 'reginacarrillo42@gmail.com', 'americalover14', 1, 'MOCA060130MZSLRMA3', 'América Regina Molina Carrillo ', 18, 56, '4922329676', 4),
(294, 'angelsotto77@gmail.com', 'zorrode9colas', 1, 'SOGA950710HZSTMN00', 'Ángel Emiliano Soto Gámez', 28, 17, '4922460908', 10),
(295, '1210302@upz.edu.mx', 'Dink4578', 1, 'SAHD031010HZSRRGA8', 'Diego Alejandro Sarabia Hernandez', 20, 10, '4931450831', 4),
(296, 'arturocamposc27@gmail.com', 'tutu272005', 1, 'CXCA051127HZSMRRA5', 'ARTURO CAMPOS CARRILLO', 18, 56, '4921975132', 1),
(297, 'siderezorrilla@gmail.com', 'ELIOTESMISOBRINO', 1, 'ZOAS990111MZSRLD04', 'Sidere Monserrath Zorrilla Alfaro', 25, 56, '4921977283', 2),
(298, 'domennickherrera720@gmail.com', 'junio2419', 1, 'BECC010619MZSRRNA9', 'CINTHIA DOMENICA BERMUDEZ DE LA CRUZ ', 23, 39, '4989813387', 9),
(299, '20207301@uaz.edu.mx', 'Miocardio9', 1, 'GOMM021008HASMRRA9', 'Mauro Salvador Gómez Marín', 21, 38, '4922030953', 2),
(300, 'aguilargeraldine2@gmail.com', 'Fgas34151574', 1, 'AUSF990305HZSGLR03', 'Frida Geraldine Aguilar Salas', 25, 56, '4921131117', 5),
(301, 'tanializ.maciashdz@gmail.com', 'Tl050302', 1, 'MAHT050302MZSCRNA3', 'Tania Lizeth Macias Hernandez', 19, 56, '4921357708', 5),
(302, 'rafael.com.com.mx@gmail.com', 'ra08be14', 1, 'AUSR081108HZSRLFA9', 'RAFAEL ARGUMEDO SOLIS', 15, 17, '4922001356', 1),
(303, 'lalo.san7927@gmail.com', 'xuwsim-meqGac-3kuxvu', 1, 'TOME010907HZSRRDA5', 'Jose Eduardo Torres Martínez', 22, 17, '4581004198', 3),
(304, 'lizbethmolina44055@gmail.com', 'molina123', 1, 'MORL070109MZSLDZA6', 'Lizbeth Molina Rodríguez ', 17, 38, '4961169456', 1),
(305, 'bruno-ordaz@hotmail.com', 'realmadrid7', 1, 'OAGB960214HZSRNR09', 'Bruno Octavio Ordaz González', 28, 56, '4921004472', 10),
(306, 'analaura_220397@hotmail.com', '12345678910', 1, 'OIGA970322MZSRTN09', 'ANA LAURA ORTIZ GUTIERREZ', 27, 17, '4922935061', 3),
(307, 'valdez.roman.pau@gmail.com', 'mona1313', 1, 'ROVA990913MZSMLN05', 'Ana Paula Roman Valdez ', 24, 56, '4929426578', 9),
(308, 'chokyflays@gmail.com', 'Timbos18#', 1, 'ROGJ100118MCHMLQA6', 'Jaquelin Román Galaviz', 14, 10, '4931038724', 14),
(309, 'dayana.meza.0602@gmail.com', 'Dayana0602?', 1, 'MEAD060206MZSZRYA8', 'Dayana Ximena Meza Arellano', 18, 10, '4931285727', 1),
(310, 'axlandrea.huerta@gmail.com', 'vifnuw-tEvfoh-xobfy0', 1, 'HURH100616MMCRMDA1', 'Heidi Huerta', 14, 56, '5586139389', 14),
(311, 'fj3264823@gmail.com', 'fer-32', 1, 'VAJL080630MZSLRSA9', 'Luisa Fernanda Valdez Juarez ', 16, 56, '492 330 7464 ', 8),
(312, 'tvliocortez@gmail.com', 'Martillo21', 1, 'COAM981009HZSRRR08', 'Marco Tulio Cortez Arriaga', 25, 20, '5519683899', 14),
(313, 'arellano.gallegos.alexis01@gmail.com', 'PUTO5_NegRO5?', 1, 'AEGA020827HZSRLLA0', 'Alexis Michel Arellano Gallegos', 21, 56, '4921974172', 11),
(314, 'boriiolivaa@gmail.com', 'MARICOTECA190208', 1, 'OIRB080219HZSLDRA1', 'Boris Uriel  Oliva Rodríguez ', 16, 56, '492 112 2998', 11),
(315, 'oswaldo_emmanuel15@hotmail.com', '1999Rojo.', 1, 'ROMO990315HDGBRS06', 'OSWALDO EMMANUEL ROBLES MIRANDA', 25, 9, '4571072071', 8),
(316, 'davca2410@gmail.com', 'torres123casdav', 1, 'CATD951024HZSSRV05', 'David Castillo Torres', 28, 37, '4923037144', 3),
(317, 'cristian100084e@gmail.com', 'cristian132546', 1, 'AOMC030723HZSCRHA5', 'Christian yahir acosta ', 20, 17, '4921739902 ', 4),
(318, 'jorgeeduardo19482@gmail.com', 'Jorchep1*', 1, 'MARJ040113HZSRBRA1', 'Jorge Eduardo Martínez Robles ', 20, 17, '492 949 3400‬', 7),
(319, 'salma.galileadelatorrecruz@gmail.com', 'Salma0308.', 1, 'TOCS030803MZSRRLA7', 'Salma Galilea de la Torre Cruz', 20, 17, '4921210770', 2),
(320, 'maryibel.loera2@gmail.com', 'Estudios2', 1, 'LOLM960814MZSRRR05', 'Maribel De Loera', 27, 17, '4921921292', 2),
(321, 'nataliaalvmal@gmail.com', 'Luciateamo123', 1, 'AAMN000327MZSLLTA6', 'Natalia Álvarez Maldonado', 24, 56, '4924930383', 14),
(322, '6a10lozadainformatica@gmail.com', 'CORALEMI3k', 1, 'LORA060320MZSZMLA5', 'Alejandra Lozada ', 18, 5, '478 125 0459', 11),
(323, 'gcastillo3010@yahoo.com', 'Acevedo22', 1, 'AECL060622HNECSSA9', 'Luis Humberto Acevedo Castillo', 18, 49, '4571001015', 1),
(324, 'sclar.2204@gmail.com', 'Saraiclarinete.2299', 1, 'GORS990422MZSMDR01', 'Saraí Julieta Gómez Rodríguez ', 25, 17, '492 129 1323', 11),
(325, 'alfonso_gurrola@hotmail.com', 'Bridget.02', 1, 'SIGL980502HZSLRS02', 'Luis Mario Alfonso Silva Gurrola', 26, 10, '4931003963', 10),
(326, 'svell0421@gmail.com', 'Coincidencias2018.', 1, 'EALS040521MZSSLFA5', 'Sofía Valeria Esparza Llamas', 20, 56, '4922019173', 3),
(327, 'madai1497@gmail.com', 'yonoseque2121', 1, 'SAMM970214MZSNRD03', 'Madai Sánchez Martínez', 27, 29, '4922006487', 9),
(328, 'a01541610@tec.mx', 'Boniteamo.23', 1, 'CASG030130MZSRLLA1', 'Gloria Carrera', 21, 20, '4941167312', 5),
(329, 'acsaandi9@gmail.com', 'Plantagua42', 1, 'AIMA030516MZSLLCA7', 'Acsa Andrea Alvizar Maldonado ', 21, 56, '4921444862', 11),
(330, 'aldavaperezalejandro@gmail.com', 'Alex290600', 1, 'AAPE000629HZSLRDA9', 'EDUARDO ALEJANDRO ALDAVA PEREZ', 24, 9, '4571030611', 9),
(331, 'anelguerrerorod@gmail.com', 'Ternurin17', 1, 'GURA031224MZSRDNA5', 'Anel Guerrero Rodríguez', 20, 56, '4922431530', 2),
(332, 'mildredlorenajdl@gmail.com', 'mildredjdl', 1, 'EIOD100930HZSLRRA1', 'Derek Elías Ortiz', 13, 37, '4961129516', 1),
(333, 'omrc_2001@hotmail.com', 'Jonitasfe456', 1, 'RICO010604MZSVRSA7', 'Osiris Margarita Rivera Cervantes ', 23, 17, '4401050111', 5),
(334, 'alexandernava.cont@gmail.com', 'nava0701', 1, 'NAUS060107HZSVRNA0', 'Santiago Alexander Nava Ureña', 18, 10, '4931243032', 5),
(335, 'sarahijmnzpc@gmail.com', 'Conejoblas03', 1, 'JIZS990824MZSMMR00', 'Sarahí Jiménez Zamora ', 24, 17, '4922188922', 2),
(336, 'kievebull.4@gmail.com', 'kievebull4', 1, 'BUPA050814HZSLCLA2', 'Alan Kieve Bulbow Pichardo', 18, 20, '4949423468', 1),
(337, 'brauliogongar@gmail.com', '3n9V9TfkMyUfPbH', 1, 'GOGB080612HZSNRRA5', 'Braulio González García', 16, 55, '4991022568', 1),
(338, 'alexisvargas73150@gmail.com', 'Confieso73150*', 1, 'VAOA940827HZSRRL08', 'Alexis Osiel Vargas Orozco', 29, 20, '4941163669', 2),
(339, 'velazquezgaucinyesenia@gmail.com', 'jrjSpQ3M6gSA3P5', 1, 'VEGY061114MZSLCSA6', 'Yesenia Velazquez Gaucin', 17, 10, '493 143 3384', 5),
(340, 'gissxxiv@gmail.com', 'giseZamoraa1$', 1, 'ZASP050312MZSMNMA2', 'Pamela Giselle Zamora Santos', 19, 56, '4921195651', 5),
(341, 'jenniromero108@gmail.com', 'Pdc.100801', 1, 'ROSJ011008MZSMNNA2', 'Jennifer Romero', 22, 56, '4921699359', 13),
(342, 'zacatecascapital@outlook.com', 'zcinjuve2024', 1, 'LURJ951010HZSNDL07', 'Jael Alejandro Luna Raudales', 28, 17, '4921689417', 5),
(343, 'trejovane526@gmail.com', '1e234d56', 1, 'TECV070216MZSRRNA0', 'Vanessa Lizeth Trejo Carrillo ', 17, 5, '4931428320', 8),
(344, 'clubopmexico@gmail.com', 'Mono.loco7', 1, 'EUZB950721HZSSMR04', 'Bruno Esquivel', 29, 56, '4921593858', 5),
(345, 'osielp341@gmail.com', 'gamo1996', 1, 'PEGO960216HZSRLS00', 'osiel jesus perez galvez', 28, 17, '4492877471', 13),
(346, 'diegojim407@hotmail.com', 'Avalancha1.', 1, 'SAJD960515HZSNMG02', 'Diego Santiago Jiménez', 28, 56, '5581878549', 2),
(347, 'noe.viramontesgo@gmail.com', 'VTS98Sb70@', 1, 'VIGN980525HZSRMX05', 'Noe', 26, 19, '4639533452', 14),
(348, 'sebastian.guzman@uaz.edu.mx', 'Teofilo27$', 1, 'GUAS001227HZSZLBA4', 'SEBASTIAN GUZMAN ALFARO', 23, 17, '4929095916', 16),
(349, 'divadyer98@hotmail.com', 'Mar9380276', 1, 'MASR981229HDGRFY07', 'REY DAVID MARTINEZ SIFUENTES', 25, 9, '4922185575', 4),
(350, 'dulce.valeria.1.rdz@gmail.com', 'Carmelita1234', 1, 'RURD020906MZSZDLA0', 'Dulce Valeria Ruiz Rodriguez', 21, 56, '4922031557', 4),
(351, 'juanpabloe038@gmail.com', 'xBWedJuGgcrV2Fn', 1, 'EAGJ070125HZSSLNA0', 'Juan Pablo Esparza Galarza ', 17, 25, '4581019634', 14),
(352, 'charlygaucin@gmail.com', '13101998Elviajedecopperpottt', 1, 'SAGC981013HDGNCH06', 'Charly Santos Gaucin', 25, 42, '4331053623', 2),
(353, 'moontseglez@gmail.com', 'S0l0vin022', 1, 'GORM960329MZSNZN01', 'MONTSERRAT GONZALEZ RUIZ FLORES', 28, 56, '4924921055', 8),
(354, 'luisdavidvargaslopezz@gmail.com', 'Luis1998', 1, 'VALL980129HZSRPS08', 'Luis David Vargas López', 26, 10, '2281591224', 2),
(355, 'angel.ma.9512@gmail.com', 'Angel=M#12', 1, 'MAAA090512HZSRLNA9', 'Ángel de la Cruz Martínez Almeida', 15, 50, '4923957865', 1),
(356, 'felipeola63@gmail.com', 'Ancina1243.', 1, 'MULF010520HZSXCLA5', 'Felipe Muñoz', 23, 56, '4922016353', 4),
(357, '39202799@uaz.edu.mx', 'PEJ2024.', 1, 'GAPA071210HZSRRDA8', 'Adrián García Pérez', 16, 17, '492 219 2588', 14),
(358, 'joredloavi@gmail.com', 'tjQFRGC4nQ82bME', 1, 'LOAJ970922HZSPVR04', 'Jorge Eduardo Lopez Avila', 26, 10, '4931112862', 16),
(359, 'rafaelsalinasz@outlook.com', 'Mejores44', 1, 'SAZR961202HZSLMF06', 'Rafael Salinas', 27, 56, '4921062662', 10),
(360, 'valery.oj@hotmail.com', 'valeriaoj7.', 1, 'OIJL980407MZSRRC08', 'Lucia Valeria Ortiz Juárez ', 26, 20, '494 943 4569', 4),
(361, 'everjosuemartinezrios3@gmail.com', '093sh21g', 1, 'MARE051010HZSRSVA5', 'EVER JOSUE MARTINEZ RIOS', 18, 17, '4921968861', 14),
(362, 'javmecha@gmail.com', 'Palomitas135', 1, 'MECJ060401HCHNHVA7', 'Javier Mena Chávez', 18, 44, '4921955757', 16),
(363, 'iseelaay@gmail.com', 'Pelusa.10', 1, 'DOQI980811MZSRMS05', 'Isela Yudith Dorado Quemada', 25, 56, '4921160187', 5),
(364, 'jhovan541@gmail.com', '4ARFBkdkYzr5G3g', 1, 'LOCJ940909HZSPSH03', 'Jhovan López Castañeda', 29, 16, '4921166112', 14),
(365, 'psiquetat@gmail.com', 'v.i.t.r.i.o.l.696.', 1, 'RIRG950918HZSVJR08', 'Gerardo Neftalí Rivera Rojas', 28, 56, '4922192837', 3),
(366, 'eifijaquez@gmail.com', 'ositopolar', 1, 'RAJE001228MZSMQDA7', 'EDITH RAMIREZ JÁQUEZ', 23, 56, '4921362049', 4),
(367, 'sofiveyna@gmail.com', 'LGmvs2721', 1, 'VETS070121MZSYRFA6', 'Sofía', 17, 56, '4921044806', 4),
(368, 'lisette20.zar@gmail.com', 'DanielaZ2', 1, 'SAZD990802MZSNRN00', 'DANIELA LISETTE SANTILLÁN ZARZOZA', 25, 56, '4921464260', 13),
(369, 'ing.hernandez.20202031@uaz.edu.mx', 'LeoHdz2504', 1, 'HERC020425HDGRJRA0', 'Leonel Rojas', 22, 21, '4921019874', 2),
(370, 'MARIFERCSS_@HOTMAIL.COM', 'Fereslamejor1', 1, 'CASF961029MZSRNR00', 'MARÍA FERNANDA CARRILLO SÁNCHEZ ', 27, 17, '4921211767', 14),
(371, 'javier.glezova99@gmail.com', 'premiozacatecas9', 1, 'GOOF991229HZSNVR05', 'Francisco Javier González Ovalle', 24, 10, '4939490473', 14),
(372, 'bereroad14@gmail.com', 'W3Z9fLuLN8Tk3KE', 1, 'ROGS951214MMCDTN03', 'SONIA BERENICE RODRIGUEZ GUTIERREZ', 28, 17, '4921447807', 4),
(373, 'dolly_414@hotmail.com', 'Camj88metz', 1, 'EOCM090710MZSSSTA4', 'Metztli Escobedo Castañeda ', 15, 17, '4925441296', 1),
(374, 'jazielarmandosg@gmail.com', 'Verito2025', 1, 'SAGJ100709HZSLRZA8', 'Jaziel Armando Salazar Garcia', 14, 17, '4921029578', 9),
(375, 'dragonava2000@gmail.com', 'Nava231w', 1, 'NAPJ000907HZSVDNA0', 'Juan Antonio Nava Pedroza ', 23, 10, '4931150487', 9),
(376, 'camisrael09@gmail.com', 'catdyt-zuctek-5cisQo', 1, 'MAAI050502HZSRGSA3', 'israel martínez agüero ', 19, 10, '4932158153', 15),
(377, 'cristianeliasjimenez@gmail.com', 'Elias261', 1, 'EIJC011026HZSLMRA0', 'Cristian Elias Jimenez ', 22, 57, '4921514089', 14),
(378, 'anayantzinayala@gmail.com', 'Composmentis2', 1, 'AAHA970527MZSYRN05', 'Anayantzin Esperanza Ayala Haro', 27, 56, '4921276052', 16),
(379, 'emmanuelarqsegovia@hotmail.com', 'CHYME', 1, 'SEME951227HZSGRM00', 'Emmanuel de Jesús Segovia Miranda', 28, 56, '+4921621926', 15),
(380, 'rivel75@hotmail.com', 'nomeacuerdoxd', 1, 'IEVR991126HVZLLL08', 'Raúl Illescas Velázquez', 24, 10, '2711458177', 2),
(381, 'remhug23@gmail.com', 'Premio2024', 1, 'BODR950423HGTSRM06', 'Rembrandt Hugo Bosco Duran', 29, 56, '4772296576', 4),
(382, 'banahi_12_@hotmail.com', 'Brendabefa12', 1, 'OOCB950512MZSRNR06', 'Brenda  Anahí Orozco Contreras', 29, 48, '437-1001368', 13),
(383, 'monicasegovia98@gmail.com', 'aqswde43', 1, 'LOSM980528MZSPGN01', 'Mónica Andrea López Segovia', 26, 10, '4939373025', 16),
(384, 'kgm160599@gmail.com', 'AaronMG123', 1, 'GOMK990516MZSNXR06', 'KARINA GONZALEZ', 25, 34, '3461053605', 9),
(385, '36173226@uaz.edu.mx', 'Dmms839201', 1, 'MESD010520MZSNLLA5', 'Dulce Maria Mendoza Salazar', 23, 17, '4921362599', 2),
(386, 'valeriafraustrom02@gmail.com', 'ATENEO2020.', 1, 'FAMV961202MZSRLL03', 'Valeria Frausto Maldonado', 27, 56, '4921442228', 9),
(387, 'deavilasaucedov@gmail.com', '1batayon', 1, 'AISV990529HZSVCC05', 'VICTOR HUGO DE AVILA SAUCEDO', 25, 17, '4922936327', 9),
(388, '38192814@uaz.edu.mx', 'Thebigdog117', 1, 'GORG000716HZSNDRA5', 'Germán González', 24, 5, '4781251612', 3),
(389, 'i2d.leolugo@uaz.edu.mx', 'L25.j.ls', 1, 'LUSL000425HZSGLNA2', 'Leonardo Josué Lugo Salas', 24, 56, '4921604677', 16),
(390, 'irving.gonzalez@uadec.edu.mx', 'LESP1995', 1, 'GOLI950619HCLNRR06', 'IRVING ADRIAN GONZALEZ LARA', 29, 7, '8442367597', 16),
(391, 'salvamarin54@gmail.com', 'GPASG2024', 1, 'MALS050419HZSRNLA6', 'Salvador Marín de León ', 19, 10, '4931036730', 11),
(392, 'ani35arte@outlook.com', 'bompi4-pizquk-xUwbeb', 1, 'AEGA000812MPLRMNA9', 'Ana Iraís Arteaga Gómez', 23, 17, '4922176820', 11),
(393, 'napsi1904@gmail.com', 'Cromatografia19', 1, 'MACN050419HZSRHPA9', 'Napoleón Martínez Chávez', 19, 56, '49925598779', 2),
(394, 'sarimun689@gmail.com', 'SaraMunoz1234', 1, 'MURS980824MZSXDR02', 'Sara Muñoz Rodríguez ', 25, 56, '5585949021', 12),
(395, 'logoma01@gmail.com', '21mb0298', 1, 'LOGM980221MZSZND07', 'Madeline Beatriz Lozano González', 26, 56, '4921706456', 12),
(396, 'andreea.chavez.88@gmail.com', 'Andreach98.', 1, 'CANM981208MJCHXR04', 'Mariana Andrea Chávez Nuño', 25, 17, '3324051247', 15),
(397, 'iezekielalvmza@gmail.com', 'Valentina8..', 1, 'AAME950509HZSLNZ04', 'Ezequiel Alvarado Mendoza', 29, 56, '492 290 0044 ', 14),
(398, 'frida.castanedar@gmail.com', '9XdTAVyMt6ANaZ2', 1, 'CARF000530MZSSMRA7', 'FRIDA MARÍA CASTAÑEDA ROMERO', 24, 22, '4981129181', 9),
(399, 'paulinamedina.18.hernandez@gmail.com', 'CHEERIOS230G', 1, 'HEMK981107MZSRDR00', 'Karla Paulina Hernández Medina', 25, 56, '4921518150', 14),
(400, 'betancourtgherardini@gmail.com', 'RubenDo3', 1, 'BEMG991103MZSTCH08', 'Gherardini Bernardeth Betancourt Macías', 24, 10, '4931009329', 2),
(401, 'eliatovar02606@gmail.com', '606229227', 1, 'TOHE060426MZSVRLA0', 'Elia Gabriela Tovar Haro ', 18, 56, '49224291117', 14),
(402, 'oagmed123@gmail.com', 'SrpskaIgra1020?', 1, 'AUMO941014HZSGDS09', 'OSCAR AGUILERA MEDRANO', 29, 17, '4925440122', 11),
(403, 'figueroajessica386@gmail.com', 'Figueipn14.', 1, 'FIGJ951014MZSGRS03', 'Jessica ', 28, 17, '4921072852', 7),
(404, 'dpaguilartavizon@gmail.com', 'ximena3001', 1, 'AUTD980727HZSGVV02', 'David Patricio Aguilar Tavizon', 26, 56, '4922186670', 4),
(405, 'greciacastrellon8@gmail.com', 'dANZARTE101', 1, 'CAVG980823MZSSLR02', 'GRECIA YISSEL CASTRELLÓN VILLEGAS ', 25, 56, '4921015675', 13),
(406, 'desaix9@live.com', '52365236', 1, 'SORA950530HZSSDL07', 'José Alexander Sosa Rodríguez', 29, 17, '4921757507', 2),
(407, 'chris.percusion@gmail.com', 'Imperial1', 1, 'LOSC970803HZSPRH06', 'Christian López Soriano', 27, 20, '4921306578', 11),
(408, 'noraaobando@gmail.com', 'pumaespin16', 1, 'BAAN071221MZSSCYA3', 'Nayla Denise Basilio Acosta', 16, 56, '4921421592', 15),
(409, 'duenasalejandromoreno11@gmail.com', 'duenas11', 1, 'DUMD060503HZSXRGA0', 'Diego Alejandro Dueñas Moreno', 18, 17, '4922287484', 9),
(410, 'pcorreavelasco@gmail.com', 'Al17Pa98', 1, 'COVP980224MZSRLL00', 'Paulina Correa Velasco', 26, 17, '4921032904', 13),
(411, 'dcabrahammd@outlook.es', 'Xolcreador1', 1, 'MADJ970413HZSRZS00', 'Jesús Abraham Martínez Díaz ', 27, 17, '2282560202', 13),
(412, 'jorgeameno19@gmail.com', 'J@rc4898P', 1, 'RACJ980804HZSDSR08', 'Jorge alejandro Raudales castañeda', 26, 56, '4922239548', 4),
(413, 'jose_alpa@uaz.edu.mx', 'BuscandoChamba2024*', 1, 'AAPJ981015HZSLDS06', 'José de Jesús Alvarado Padilla', 25, 20, '4941033672', 16),
(414, 'lumetal22@gmail.com', 'LuCyIsA023', 1, 'NALL960622MZSJRC02', 'Lucero Isabel Nájera Lerma', 28, 29, '4924920301', 12),
(415, 'hayleygaray222@gmail.com', 'hayleygaray', 1, 'GAAH090417MNERRYA5', 'Hayley Lucía Garay Arteaga', 15, 56, '4921742739', 11),
(416, 'axlitamak@gmail.com', 'alejandria1995', 1, 'RUNK951207MZSZXR01', 'Karla Alejandría Ruiz Esparza Nunez', 28, 17, '4922249398', 4),
(417, 'ernestoaguileraarellano@gmail.com', 'gargolado199401', 1, 'AUAC940901HZSGRR09', 'Carlos Ernesto Aguilera Arellano', 29, 10, '4921201074', 14),
(418, 'premiojuventud2024zac@gmail.com', 'proteger', 1, 'GAVA990504MZSRNB09', 'Abigail García Vanegas', 25, 17, '4921304131', 8),
(419, 'sergio-mongar@hotmail.com', 'Montoya03', 1, 'MOGS000303HZSNRRA5', 'Sergio ', 24, 17, '4921378850', 5),
(420, 'sofi11062005dltm@gmail.com', 'Taponudita11', 1, 'TOMS050611MZSRDFA9', 'Sofia De La Torre Medina', 19, 20, '4941029428', 2),
(421, 'rosadelgador6.samsung@gmail.com', 'Pantalon1.', 1, 'MADL110508MZSGLRA7', 'LAURA SOFIA MAGALLANES DELGADO', 13, 17, '4921043691', 1),
(422, 'annaisablhdez@gmail.com', 'Com3019Bel', 1, 'OIHA960916MZSRRN02', 'Ana Isabel Ortiz', 27, 56, '4921248115', 2),
(423, 'karinaliz1012@gmail.com', 'lizy2112396i', 1, 'IARL961221MZSBZZ07', 'Liz Karina Ibarra Ruiz', 27, 17, '4921112230', 5),
(424, '39206968@uaz.edu.mx', 'Jalpe1997', 1, 'SAPJ970219HZSLRV02', 'Javier', 27, 56, '4921736580', 16),
(425, 'mruniverseepic123@gmail.com', 'SoyBienHardcore', 1, 'TIDL990316HZSJLN01', 'LEONARDO DANIEL DE JESUS', 25, 17, '4922455587', 9),
(426, 'rioyaretzicampostovalin@gmail.com', 'holaRio123', 1, 'CATR111208MZSMVXA9', 'Rio Yaretzi Campos Tovalin', 12, 17, '4921246650', 9),
(427, 'jesusrlvrojo@gmail.com', '123456789', 1, 'GARL960928HZSRYS05', 'JESIUS', 29, 56, '0999', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `catalogo_documentos`
--
ALTER TABLE `catalogo_documentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `grado`
--
ALTER TABLE `grado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usr`
--
ALTER TABLE `usr`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `catalogo_documentos`
--
ALTER TABLE `catalogo_documentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `documentos`
--
ALTER TABLE `documentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `grado`
--
ALTER TABLE `grado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `municipio`
--
ALTER TABLE `municipio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de la tabla `usr`
--
ALTER TABLE `usr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=428;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

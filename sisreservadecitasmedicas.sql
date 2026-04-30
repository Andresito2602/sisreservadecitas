-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 30-04-2026 a las 17:03:28
-- Versión del servidor: 8.4.7
-- Versión de PHP: 8.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sisreservadecitasmedicas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuraciones`
--

DROP TABLE IF EXISTS `configuraciones`;
CREATE TABLE IF NOT EXISTS `configuraciones` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `configuraciones`
--

INSERT INTO `configuraciones` (`id`, `nombre`, `direccion`, `telefono`, `correo`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'Salud clinica', 'cl 4415 #4c este', '3112223355', 'saludclinica@clinica.com', 'logos/MVvqCx0ZzCZTzJN7Yb2MbvcVrN0YlJD5UQhXqFOO.png', '2026-04-30 03:45:02', '2026-04-30 03:45:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultorios`
--

DROP TABLE IF EXISTS `consultorios`;
CREATE TABLE IF NOT EXISTS `consultorios` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ubicacion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacidad` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `especialidad` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `consultorios`
--

INSERT INTO `consultorios` (`id`, `nombre`, `ubicacion`, `capacidad`, `telefono`, `especialidad`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'PEDIATRIA', '1-1A', '10', '', 'PEDIATRIA', 'ACTIVO', '2026-04-30 03:42:52', '2026-04-30 03:42:52'),
(2, 'ODONTOLOGIA', '2-1A', '5', '851284', 'ODONTOLOGIA', 'ACTIVO', '2026-04-30 03:42:52', '2026-04-30 03:42:52'),
(3, 'FISIOTERAPIA', '3-1A', '20', '17277257', 'FISIOTERAPIA', 'ACTIVO', '2026-04-30 03:42:52', '2026-04-30 03:42:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctors`
--

DROP TABLE IF EXISTS `doctors`;
CREATE TABLE IF NOT EXISTS `doctors` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombres` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `licencia_medica` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `especialidad` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `doctors_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `doctors`
--

INSERT INTO `doctors` (`id`, `nombres`, `apellidos`, `telefono`, `licencia_medica`, `especialidad`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Doctor1', 'Swift', '7474757', '054527', 'PEDIATRIA', 3, '2026-04-30 03:42:51', '2026-04-30 03:42:51'),
(2, 'Doctor2', 'Barrientos', '7474451', '054248', 'ODONTOLOGIA', 4, '2026-04-30 03:42:52', '2026-04-30 03:42:52'),
(3, 'Doctor3', 'Valdez', '74745212', '054614', 'FISIOTERAPIA', 5, '2026-04-30 03:42:52', '2026-04-30 03:42:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `doctor_id` bigint UNSIGNED NOT NULL,
  `consultorio_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `events_user_id_foreign` (`user_id`),
  KEY `events_doctor_id_foreign` (`doctor_id`),
  KEY `events_consultorio_id_foreign` (`consultorio_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `events`
--

INSERT INTO `events` (`id`, `title`, `start`, `end`, `color`, `user_id`, `doctor_id`, `consultorio_id`, `created_at`, `updated_at`) VALUES
(1, '08:00 PEDIATRIA', '2026-05-04 08:00:00', '2026-05-04 08:00:00', '#e82216', 8, 1, 1, '2026-04-30 07:12:58', '2026-04-30 07:12:58'),
(2, '14:00 ODONTOLOGIA', '2026-05-05 14:00:00', '2026-05-05 14:00:00', '#e82216', 9, 2, 2, '2026-04-30 21:28:02', '2026-04-30 21:28:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historials`
--

DROP TABLE IF EXISTS `historials`;
CREATE TABLE IF NOT EXISTS `historials` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `detalle` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_visita` date NOT NULL,
  `paciente_id` bigint UNSIGNED NOT NULL,
  `doctor_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `historials_paciente_id_foreign` (`paciente_id`),
  KEY `historials_doctor_id_foreign` (`doctor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `historials`
--

INSERT INTO `historials` (`id`, `detalle`, `fecha_visita`, `paciente_id`, `doctor_id`, `created_at`, `updated_at`) VALUES
(1, '<p>asdsadasdasd<strong>asdsadsadsadsadasdsadasdasdasd</strong></p>', '2026-04-30', 38, 2, '2026-04-30 03:46:28', '2026-04-30 03:46:28'),
(2, '<p>sadasdsadsadsad<strong>dsadasdasdasd</strong></p>', '2026-04-30', 24, 3, '2026-04-30 03:54:29', '2026-04-30 03:54:29'),
(3, '<p>ADASDASSADDsad<strong>asdsad</strong></p>', '2026-07-02', 24, 3, '2026-04-30 04:27:13', '2026-04-30 04:27:13'),
(4, '<p>Paciente llego con gripe se le receto medicamente&nbsp;</p>', '2026-06-01', 201, 1, '2026-04-30 07:18:54', '2026-04-30 07:18:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

DROP TABLE IF EXISTS `horarios`;
CREATE TABLE IF NOT EXISTS `horarios` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `dia` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `doctor_id` bigint UNSIGNED NOT NULL,
  `consultorio_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `horarios_doctor_id_foreign` (`doctor_id`),
  KEY `horarios_consultorio_id_foreign` (`consultorio_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`id`, `dia`, `hora_inicio`, `hora_fin`, `doctor_id`, `consultorio_id`, `created_at`, `updated_at`) VALUES
(1, 'LUNES', '08:00:00', '16:00:00', 1, 1, '2026-04-30 03:45:52', '2026-04-30 03:45:52'),
(2, 'MARTES', '08:00:00', '16:00:00', 2, 2, '2026-04-30 07:07:51', '2026-04-30 07:07:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2026_01_20_175125_create_secretarias_table', 1),
(7, '2026_01_26_223340_create_pacientes_table', 1),
(8, '2026_03_30_202443_create_consultorios_table', 1),
(9, '2026_03_30_204125_create_doctors_table', 1),
(10, '2026_03_30_204208_create_horarios_table', 1),
(11, '2026_04_02_223234_create_permission_tables', 1),
(12, '2026_04_06_013207_create_events_table', 1),
(13, '2026_04_07_171533_create_configuraciones_table', 1),
(14, '2026_04_29_195224_create_historials_table', 1),
(15, '2026_04_29_210000_create_pagos_table', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3),
(3, 'App\\Models\\User', 4),
(3, 'App\\Models\\User', 5),
(4, 'App\\Models\\User', 6),
(5, 'App\\Models\\User', 7),
(5, 'App\\Models\\User', 8),
(5, 'App\\Models\\User', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

DROP TABLE IF EXISTS `pacientes`;
CREATE TABLE IF NOT EXISTS `pacientes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombres` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_documento` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cc` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nro_seguro` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_nacimiento` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genero` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `celular` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grupo_sanguineo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alergias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contacto_emergencia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observaciones` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pacientes_cc_unique` (`cc`),
  UNIQUE KEY `pacientes_nro_seguro_unique` (`nro_seguro`),
  UNIQUE KEY `pacientes_correo_unique` (`correo`)
) ENGINE=InnoDB AUTO_INCREMENT=203 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id`, `nombres`, `apellidos`, `tipo_documento`, `cc`, `nro_seguro`, `fecha_nacimiento`, `genero`, `celular`, `correo`, `direccion`, `grupo_sanguineo`, `alergias`, `contacto_emergencia`, `observaciones`, `created_at`, `updated_at`) VALUES
(1, 'Brandi Abshire IV', 'Auer', 'PP', '30248324', '62620869', '1970-08-06', 'M', '907-675-8110', 'bartell.emery@example.com', '92717 Kilback Well\nWest Derecktown, SC 36436', 'O+', 'asperiores possimus aut', '+1-478-414-8217', 'quaerat voluptas quasi', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(2, 'Dr. Keith Batz', 'Torphy', 'PP', '51112845', '99025733', '1983-04-21', 'F', '270.468.8892', 'xwilkinson@example.com', '44351 Medhurst Creek\nWest Barry, NM 50829', 'A-', 'et et vel', '1-425-410-6363', 'non sunt est', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(3, 'Dejah Monahan', 'Medhurst', 'PP', '72154445', '91073735', '1990-10-10', 'F', '+18634878663', 'shields.nettie@example.net', '402 Kulas Estate Suite 563\nWest Hollis, VT 87031', 'O-', 'recusandae et possimus', '1-520-577-9811', 'eum enim a', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(4, 'Ellen Conroy', 'Schaden', 'TI', '13519826', '22016452', '1972-11-26', 'M', '+1-681-734-4939', 'cremin.harvey@example.net', '45903 Aron Islands Suite 244\nStromanchester, NM 88070', 'O+', 'id omnis ut', '956.605.3897', 'iste adipisci ipsam', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(5, 'Theron Reichel', 'Murphy', 'PP', '22800146', '96100829', '1995-06-11', 'M', '+1-732-753-9691', 'alize52@example.org', '4561 Rachael Ferry Suite 014\nNorth Melyssaton, IA 03300-2937', 'A-', 'perferendis quas omnis', '202.256.5348', 'aliquid et commodi', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(6, 'Dr. Eleanore Franecki', 'Robel', 'CC', '20455250', '39615054', '1998-06-28', 'M', '1-231-269-0626', 'kaelyn75@example.net', '8596 Stefanie Road Suite 158\nEast Beryl, MD 69904', 'A+', 'qui harum quibusdam', '220.391.1740', 'error aut aut', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(7, 'Mary Crooks', 'Crooks', 'TI', '19767611', '16968722', '1978-08-27', 'M', '+1.256.863.8172', 'rempel.jamel@example.net', '601 Schmidt Land Apt. 658\nPort Lillymouth, IL 40414-4875', 'A+', 'aut nisi nisi', '+1-586-839-0913', 'sint eum esse', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(8, 'Alessia Ziemann DDS', 'Jast', 'CC', '93240020', '32438529', '1971-11-22', 'M', '405-421-9527', 'queenie.aufderhar@example.com', '7518 Deckow Village\nTobinhaven, FL 81104-3709', 'A+', 'dignissimos ex vitae', '+1 (845) 481-9138', 'dolorem et nihil', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(9, 'Prof. Carlotta O\'Keefe III', 'Morissette', 'TI', '56169953', '34098360', '1997-04-22', 'M', '+17063146953', 'beaulah62@example.com', '327 Reese Route\nLegrosmouth, WV 22414', 'B+', 'aut qui expedita', '+1-520-331-4337', 'consequuntur nobis illum', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(10, 'Aric Dietrich PhD', 'Lesch', 'TI', '56556675', '87494041', '2018-08-02', 'M', '712-226-7065', 'batz.morgan@example.org', '71167 Anderson Club\nPort Teagan, MT 33888-7583', 'B-', 'minima vel laboriosam', '847-297-8537', 'omnis sint soluta', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(11, 'Hipolito Tromp', 'O\'Kon', 'CC', '01286347', '03216746', '1975-09-03', 'M', '1-281-378-2751', 'kayden98@example.org', '5724 Mara Groves\nNorth Laneyland, NY 22190-5845', 'A-', 'aperiam vel voluptatem', '(414) 349-8943', 'ea cumque ea', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(12, 'Kassandra Walter', 'Oberbrunner', 'TI', '50160706', '38135042', '2003-02-01', 'M', '1-424-752-7282', 'qlubowitz@example.net', '234 Dicki Coves\nCortezchester, NC 38808-7829', 'A+', 'sequi et quia', '+1 (440) 953-4084', 'velit odio pariatur', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(13, 'Mr. Emerald Beier', 'Harris', 'PP', '13329693', '42779684', '2019-11-09', 'F', '+1.872.789.1829', 'esteuber@example.net', '84822 Schmeler Trail Apt. 569\nWest Neva, PA 15596-8803', 'O+', 'et qui aliquam', '806-218-4757', 'ratione libero quas', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(14, 'Jeramie Olson Sr.', 'Oberbrunner', 'CE', '99257054', '81575042', '1974-08-20', 'M', '+12188559629', 'seamus50@example.net', '764 Ayana Circle Suite 062\nOndrickashire, AR 17409-6927', 'A+', 'et molestiae voluptatem', '+1 (530) 991-5919', 'adipisci ipsa dolorem', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(15, 'Julien Conroy', 'Macejkovic', 'CE', '04720634', '07827110', '1972-03-25', 'M', '+1 (754) 313-1836', 'mueller.roma@example.org', '8478 Elian Key Suite 843\nEast Godfrey, MI 92221-7290', 'A+', 'praesentium voluptates ipsum', '608-667-1308', 'tenetur dignissimos maiores', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(16, 'Dr. Paige Becker', 'Anderson', 'TI', '95118095', '84224595', '2002-12-16', 'F', '+1 (415) 952-8625', 'fidel.langosh@example.org', '80263 Hoppe Loop Suite 403\nVernicehaven, NE 95707', 'A-', 'aut vel consequatur', '(832) 925-0129', 'facere accusamus est', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(17, 'Prof. Isaac Ullrich', 'Osinski', 'CE', '62952541', '18771127', '2003-07-31', 'M', '+1-239-878-8371', 'oleta.nader@example.org', '1116 Towne Radial\nCyrilmouth, NC 63567-9196', 'B+', 'rerum error tenetur', '(618) 370-5555', 'id et tempora', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(18, 'Emmanuelle McDermott', 'Herman', 'RC', '91328373', '40333088', '1999-02-22', 'M', '(360) 903-7077', 'brycen.schinner@example.com', '352 Rogahn Rapid\nNew Raquel, MI 31992-9064', 'O+', 'corporis fuga voluptas', '1-727-667-9901', 'suscipit doloribus voluptatum', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(19, 'Prof. Louvenia Becker', 'Turcotte', 'RC', '46356782', '94358805', '2002-12-09', 'F', '+1-352-413-0332', 'gjacobs@example.com', '407 Vincent Tunnel\nFerrybury, KY 54625-9592', 'O-', 'totam eligendi dolorem', '1-657-657-0942', 'omnis dolor voluptas', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(20, 'Mr. Kareem Muller III', 'Turcotte', 'TI', '44424625', '62922619', '1999-03-15', 'M', '(415) 981-5349', 'little.celestino@example.net', '857 Harris Key\nWest Winfield, DC 37700', 'O-', 'praesentium officiis dolores', '+1-719-767-3437', 'quia qui quis', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(21, 'Ms. Bridgette Ernser DVM', 'Schinner', 'TI', '86811336', '61315699', '2004-10-04', 'F', '(432) 364-2233', 'fwalsh@example.org', '1555 Jennie Expressway Apt. 137\nPort Llewellynmouth, ID 69005-8021', 'A+', 'cum nam dolores', '1-272-456-2818', 'sequi consequatur sed', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(22, 'Zachary Heller', 'Stracke', 'TI', '96046079', '41908996', '1993-01-12', 'F', '+19094880936', 'wuckert.meggie@example.com', '356 Verda Walk\nNew Dangelo, AL 64386-4644', 'O-', 'voluptas praesentium recusandae', '1-360-505-9823', 'qui occaecati voluptatum', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(23, 'Quinn Pagac', 'Zieme', 'PP', '07258666', '60947887', '1992-09-04', 'M', '(321) 906-2459', 'imurphy@example.net', '61925 Gutmann Curve\nFayburgh, ID 27315', 'A-', 'doloribus cupiditate voluptatem', '641-324-5197', 'perspiciatis et voluptatem', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(24, 'Francisco Braun', 'Gulgowski', 'CC', '85563630', '09730451', '1998-10-31', 'M', '(650) 419-1987', 'hane.nasir@example.org', '56639 Braden Path\nPort Leoraberg, PA 94428-0691', 'B+', 'in voluptates ut', '+1.804.837.4999', 'nemo qui ratione', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(25, 'Lucius Nitzsche', 'Ledner', 'CE', '25875571', '92820696', '1971-05-15', 'M', '731-282-8991', 'littel.shyanne@example.com', '284 Kautzer Knolls Suite 341\nSouth Lempi, CO 62724', 'B+', 'assumenda sunt sed', '1-281-527-1988', 'et at vero', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(26, 'Eudora Shanahan Sr.', 'Schowalter', 'CC', '78498755', '37802617', '1978-02-20', 'F', '1-629-553-6270', 'hyatt.maxwell@example.net', '4446 Arnulfo Key Suite 437\nSouth Dewayneview, ND 18782-1028', 'B-', 'ipsa asperiores tenetur', '+1 (386) 649-0260', 'accusantium earum nihil', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(27, 'Consuelo Smith', 'Prohaska', 'CC', '59749526', '58239759', '1982-10-18', 'M', '+1-903-243-7496', 'iroberts@example.com', '6856 McLaughlin Parks Apt. 521\nMedhurststad, NE 10987', 'B-', 'non incidunt eos', '+1 (360) 355-1731', 'excepturi necessitatibus quia', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(28, 'Dr. Jameson Abbott', 'Rohan', 'PP', '63993280', '71753092', '1984-07-30', 'M', '985.419.3908', 'hilpert.jefferey@example.net', '16175 Frami Curve Suite 296\nNorth Parker, SC 08567-3637', 'B+', 'eum blanditiis qui', '+1 (667) 485-0019', 'dolorem natus qui', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(29, 'Claudie Morar', 'Ledner', 'PP', '34585930', '67174489', '1985-12-03', 'F', '803.613.1379', 'ofisher@example.net', '25014 Jakubowski Isle\nDevanfurt, NC 42170', 'A+', 'quis ex non', '414-315-6778', 'voluptatibus vitae ipsam', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(30, 'Omari Wolff', 'Walter', 'CC', '00442543', '94877163', '2010-02-11', 'F', '(629) 580-1348', 'mozelle89@example.com', '85557 Bennie Roads\nTheresiamouth, NJ 83586', 'A-', 'dicta laborum qui', '+1 (360) 570-2113', 'odit magnam labore', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(31, 'Clarissa Simonis', 'Hickle', 'CC', '21306645', '19945894', '2005-08-18', 'M', '772.622.3146', 'esmeralda.will@example.com', '769 Hirthe Terrace Apt. 815\nMaddisonberg, AL 95526-7612', 'B+', 'vitae iste itaque', '+1.984.317.9435', 'quas corrupti odit', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(32, 'Oleta Schultz', 'Haag', 'CC', '80626889', '52366140', '2008-09-08', 'F', '(831) 304-2871', 'mosciski.wilber@example.org', '25082 Blanda Gardens Apt. 221\nEast Clinthaven, CT 56170-1538', 'B+', 'quia cum sunt', '+1.610.915.3952', 'voluptas libero porro', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(33, 'Evangeline Emmerich', 'Carter', 'PP', '20050470', '03379712', '1987-08-11', 'F', '1-337-747-4078', 'hahn.alexandrine@example.org', '3678 Mackenzie Heights\nSouth Milo, CA 50690-2442', 'O-', 'magni error illum', '+1.940.465.6555', 'doloremque sequi cum', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(34, 'Dr. Watson Heller', 'Abshire', 'TI', '57365648', '93910407', '1981-05-28', 'M', '419.517.2826', 'sbatz@example.org', '101 Gerard Locks Suite 448\nPort Lysanne, MD 86633-9738', 'A-', 'voluptas sunt aut', '+1-318-375-3806', 'iusto aut ducimus', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(35, 'Nicholas Torp', 'Waters', 'CE', '91104615', '23005163', '2000-01-20', 'F', '+1.234.737.5884', 'wilfred56@example.com', '821 Deshawn Canyon\nNedland, WI 78425', 'O-', 'quis perspiciatis mollitia', '+1-251-750-8698', 'vel repellendus commodi', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(36, 'Cristopher Glover', 'Murazik', 'CC', '13724732', '47249951', '1970-02-17', 'M', '878.486.0285', 'blanda.jimmie@example.org', '489 Hills Crescent\nSouth Eloyhaven, NH 07055-5379', 'O-', 'eaque nostrum autem', '234.645.8634', 'corrupti repellat quis', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(37, 'Dr. Gus Bednar PhD', 'Blick', 'PP', '89483995', '28339462', '1989-09-05', 'M', '(947) 794-4831', 'ondricka.celestino@example.com', '91212 Becker Meadows Apt. 214\nNorth Reese, IN 61766-9566', 'O-', 'iusto incidunt ut', '+1.415.434.3922', 'porro dolores numquam', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(38, 'Yasmine Kilback', 'Ankunding', 'CE', '74818889', '30837535', '1971-07-15', 'M', '+1.458.591.4427', 'lblock@example.org', '4638 Fae Motorway\nCandacetown, WV 11804-3544', 'A-', 'ut doloribus expedita', '+1.458.689.0976', 'numquam quis possimus', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(39, 'Prof. Elroy Langosh MD', 'Skiles', 'RC', '31443885', '88406736', '1977-06-26', 'M', '1-341-890-1062', 'eva51@example.net', '440 Wunsch Ranch Suite 488\nPort Hillary, NM 66286', 'A-', 'dicta rem aliquam', '610.307.3083', 'omnis aut maxime', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(40, 'Prof. Hans Jacobson MD', 'Bins', 'RC', '98152750', '57390229', '1986-12-29', 'M', '331.289.7785', 'amaya.turner@example.org', '4905 Feest Center\nEast Virgil, KY 62592-1324', 'O+', 'ab nihil tempore', '+1-828-843-1236', 'et quia est', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(41, 'Marta Schmeler', 'Jacobson', 'CC', '85158457', '19379786', '1988-12-21', 'M', '802.615.6883', 'vernie02@example.org', '6101 Marjory Green\nKozeytown, TN 62392', 'A-', 'odio unde repellendus', '270.241.5249', 'maiores totam quidem', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(42, 'Candida Cassin', 'Swaniawski', 'CE', '64552853', '52911931', '1999-08-31', 'M', '831-376-6403', 'georgiana24@example.net', '49654 Jermey Lodge Apt. 559\nPadbergtown, NC 13759', 'B-', 'voluptate voluptatibus nesciunt', '929.652.0846', 'facilis vel rerum', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(43, 'Eric Conroy', 'Feeney', 'RC', '19428609', '79846865', '1979-07-30', 'F', '(419) 330-3733', 'shemar.shields@example.net', '15330 Shad Passage\nReichelmouth, KS 35763', 'O+', 'est quis minus', '+1 (412) 712-2091', 'quisquam quibusdam consequatur', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(44, 'Jazlyn Gutmann', 'Harber', 'RC', '66337175', '84196793', '1998-01-20', 'F', '650.298.9537', 'emckenzie@example.org', '9969 Boehm Glens\nGloverburgh, SC 85420-0343', 'A-', 'ut expedita voluptate', '757-762-3730', 'rerum vel distinctio', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(45, 'Mr. Akeem Renner', 'Stamm', 'PP', '34946622', '60583572', '1978-02-22', 'M', '(667) 374-8817', 'trantow.eugenia@example.net', '4616 Jerde Plains\nWest Helmerside, MN 96477', 'O-', 'non vitae quaerat', '458.906.3256', 'aliquam dolorem unde', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(46, 'Dr. Arnold Schuppe DDS', 'Gusikowski', 'CE', '75013997', '71295560', '1985-07-05', 'F', '+1-531-968-6450', 'wilfredo.huel@example.org', '727 Burley Island\nNorth Shemar, RI 92057', 'O-', 'iste facere voluptates', '1-586-540-5794', 'assumenda nostrum sed', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(47, 'Rocio Muller III', 'Yost', 'RC', '65105796', '71933713', '1997-09-05', 'M', '+16512122276', 'bartell.andre@example.com', '5947 Vandervort Ramp Apt. 527\nLake Davin, NV 34936', 'A+', 'quo dolores et', '+1-361-998-4178', 'dicta laboriosam aut', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(48, 'Kaleb Franecki', 'Kreiger', 'RC', '01147737', '87870943', '2017-11-18', 'F', '+1 (678) 889-3451', 'eabshire@example.net', '345 Alden Freeway\nD\'Amoreland, TN 96949-7405', 'A-', 'est repellendus ipsa', '301.448.7487', 'dolore tenetur illo', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(49, 'Prof. Jorge Hane', 'Goldner', 'TI', '74376456', '56820790', '1983-11-05', 'M', '1-331-823-6883', 'hermiston.ezra@example.org', '5129 Eichmann Common Suite 421\nBradville, KS 06636-3951', 'O-', 'distinctio distinctio quod', '+1-979-600-5381', 'beatae ipsum dolorem', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(50, 'Maida Blick', 'Heathcote', 'TI', '91570945', '50469469', '1993-04-15', 'M', '(352) 494-2210', 'rice.brent@example.net', '523 Beer Mountain Suite 733\nNorth Prudenceborough, IA 04721-4302', 'B-', 'molestiae quis aliquid', '+19016104064', 'autem et mollitia', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(51, 'Miss Brisa Toy', 'Spencer', 'RC', '30509566', '26905513', '1993-03-10', 'F', '806.420.9360', 'lavern00@example.org', '484 Auer Spurs Apt. 523\nNorth Orieberg, AL 63764-3048', 'O+', 'placeat aliquid omnis', '386-354-6720', 'voluptate minima dolor', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(52, 'Icie Schumm', 'Kemmer', 'TI', '85854841', '50983213', '1991-11-08', 'F', '520-960-1935', 'suzanne.ruecker@example.net', '15669 Schneider Ports\nMartaside, AZ 95472-6637', 'B+', 'id voluptatem voluptatum', '754.626.5106', 'quae sunt et', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(53, 'Prof. Kamron Kiehn V', 'Schneider', 'PP', '24432518', '87687421', '1982-06-28', 'M', '(845) 659-9352', 'zweissnat@example.com', '340 Alana Point\nLake Marisa, SC 32504', 'A+', 'adipisci ipsum ea', '+15084922977', 'necessitatibus quo odit', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(54, 'Devyn Bergnaum', 'Hermiston', 'RC', '78452211', '17371879', '2001-02-27', 'M', '689-730-3543', 'jprice@example.com', '73457 Kameron Knolls Apt. 508\nUllrichbury, IL 15351', 'O-', 'impedit in quae', '+1-612-698-7493', 'aliquam eveniet occaecati', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(55, 'Deangelo Nicolas', 'Mraz', 'PP', '74806245', '75990667', '2011-12-13', 'F', '828.571.2296', 'sedrick.koch@example.com', '752 Satterfield Junctions Suite 033\nAmayahaven, KY 42306-6237', 'O-', 'veritatis saepe cumque', '+1 (623) 979-6032', 'inventore fugit facilis', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(56, 'Isabella Brekke', 'Mayer', 'TI', '39654880', '35404184', '1991-06-05', 'M', '(352) 755-7722', 'qcrona@example.com', '23967 Donnelly Dale\nClairbury, IA 79381', 'A-', 'vel quibusdam enim', '+1-779-865-5701', 'sed nihil eos', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(57, 'Dr. Judson Boyer II', 'Stroman', 'PP', '60934236', '81632711', '2000-09-27', 'M', '(616) 932-3115', 'teagan14@example.org', '517 Erdman Path\nLangworthbury, CA 66005', 'A-', 'et a quos', '928.799.6809', 'non saepe consectetur', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(58, 'Mr. Remington Nienow', 'Moen', 'CC', '48173893', '43080319', '1970-02-20', 'F', '1-702-267-9653', 'libby.abbott@example.com', '3159 Donald Fall\nMillerberg, MD 92951-2860', 'A+', 'ea eius sunt', '+1-727-887-1757', 'eveniet omnis impedit', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(59, 'Mrs. Heloise Swaniawski II', 'Hilpert', 'CE', '58994254', '58144803', '1972-07-06', 'F', '351.453.9511', 'ebba38@example.com', '3532 Lucius Plains\nNew Madilynside, ME 81384', 'O+', 'illo et velit', '+1-863-823-4467', 'ratione ratione adipisci', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(60, 'Athena Kilback', 'Ankunding', 'TI', '94587202', '83176056', '2019-11-17', 'F', '+17632487634', 'modesto48@example.net', '990 Schulist Parks\nSouth Carli, ID 79680-5441', 'O+', 'esse fugit assumenda', '+1-415-529-4658', 'ipsam ipsa voluptas', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(61, 'Prof. Johann Russel MD', 'Halvorson', 'PP', '10638560', '26493886', '1989-05-26', 'F', '650-255-3144', 'leonora.bergstrom@example.net', '346 Lowe Alley Suite 787\nSouth Noemie, MO 77929-7118', 'A+', 'saepe vel reprehenderit', '+1 (463) 484-7997', 'modi architecto ex', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(62, 'Dr. Vicente Rippin Sr.', 'Glover', 'CE', '45336237', '25078600', '1985-11-13', 'F', '+1 (541) 307-1797', 'kiera35@example.com', '631 Wolf Corners\nNolanberg, AZ 99205-0736', 'A+', 'dolorem dolorum reprehenderit', '772-697-3324', 'repellat provident praesentium', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(63, 'Miss Alyce Rempel', 'O\'Reilly', 'PP', '91382954', '69309609', '1996-12-04', 'F', '+1-414-374-8149', 'zane90@example.org', '407 McLaughlin Neck\nSouth Stephon, LA 53291', 'A+', 'porro sit nisi', '(502) 596-0111', 'iste neque non', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(64, 'Art Zemlak', 'Collier', 'CE', '26452213', '59867523', '1995-08-23', 'M', '+1-260-386-7411', 'hbogisich@example.com', '4568 Nader Mountain\nWest Giovannaberg, MN 44952', 'B-', 'nihil quas omnis', '(443) 789-4193', 'praesentium dolores eius', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(65, 'Dr. Waino Lakin III', 'Larson', 'CE', '09609350', '57827532', '1999-12-30', 'M', '(320) 333-3248', 'huel.chloe@example.org', '81576 Will Prairie\nNorth Johathan, TX 06711-2415', 'B-', 'et id reiciendis', '+13868550455', 'expedita corrupti vero', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(66, 'Jan Koss', 'Wolff', 'TI', '29949888', '92474764', '2015-10-02', 'F', '854-208-1553', 'dkling@example.net', '457 Blanda Curve\nNorth June, KS 37456', 'O+', 'corrupti odio est', '(781) 973-0038', 'eos quasi tempora', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(67, 'Constance Hudson', 'Kiehn', 'RC', '02331495', '79317853', '2012-07-17', 'M', '+1.445.944.7569', 'rath.zachary@example.com', '355 Van Ville\nWest Johnpaul, WY 13183-4529', 'B-', 'qui perferendis illum', '+1.415.806.1709', 'a fuga sed', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(68, 'Prof. Leora Wiegand I', 'Ward', 'PP', '29503355', '23582096', '2010-07-04', 'F', '253-802-9052', 'kaleb.feeney@example.net', '296 Wyatt Spur\nKyleeshire, KS 76716-2408', 'B+', 'amet qui corrupti', '786.769.1985', 'consequatur occaecati sunt', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(69, 'Kiana Lowe', 'Rau', 'CE', '40490498', '01467440', '2013-03-11', 'M', '+1 (650) 983-7345', 'candice31@example.com', '154 Will Stravenue Suite 211\nWest Maximilliaburgh, UT 81770', 'A-', 'iste velit perspiciatis', '(831) 581-3950', 'dolores asperiores fuga', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(70, 'Melyssa Wyman MD', 'Kihn', 'TI', '58210357', '11029990', '1977-04-08', 'M', '+13016646627', 'dominic.durgan@example.org', '77839 Nader Trace\nMittieport, TX 83474-9877', 'B-', 'ea accusantium qui', '+1-970-832-3042', 'et ducimus natus', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(71, 'Ida Kris', 'Kuphal', 'CC', '71670096', '28688823', '1992-10-08', 'F', '+1-423-338-8878', 'elbert97@example.org', '99827 Megane Springs Apt. 601\nEast Enrique, NY 71454', 'O+', 'qui atque suscipit', '1-530-815-5158', 'fuga vel quasi', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(72, 'Kailey Breitenberg', 'Koepp', 'CE', '93782662', '51929207', '2018-01-25', 'F', '+14199684893', 'ethelyn91@example.com', '87407 Kreiger Circle Suite 580\nKrisfort, KS 03995', 'A-', 'occaecati voluptate voluptas', '1-408-853-1295', 'corrupti cupiditate commodi', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(73, 'Melyssa Koelpin III', 'Gutmann', 'TI', '11222453', '38171444', '2013-10-06', 'F', '812-968-2324', 'zbernhard@example.org', '74708 Beahan Villages\nCruickshankland, WI 77365', 'O-', 'est magnam qui', '+1-360-765-4522', 'reiciendis velit in', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(74, 'Mr. Jo Fisher DVM', 'Mraz', 'TI', '55715314', '20210149', '1988-02-05', 'F', '+12348296284', 'aliya68@example.net', '35310 Marilie Prairie\nNew Giannitown, OK 44573-5690', 'O-', 'sunt est sit', '+1.586.305.4967', 'sapiente provident aliquid', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(75, 'Rose Daniel', 'Brown', 'CC', '03689181', '82993645', '2002-04-14', 'M', '+1-505-660-1129', 'kohler.aurelio@example.com', '479 Adrian Locks Apt. 855\nNorth Carloburgh, TX 59175', 'B-', 'sunt consequatur optio', '1-906-814-2758', 'quia ad dolore', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(76, 'Evie Nikolaus', 'Kuhlman', 'CE', '58635685', '73081055', '2015-05-24', 'M', '872.350.3336', 'antoinette.rath@example.net', '129 Shaun Summit Suite 694\nNew Sammieview, KY 06678-2521', 'A-', 'suscipit voluptates vero', '1-754-651-1637', 'ipsam omnis provident', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(77, 'Devan Harris', 'Durgan', 'RC', '29783130', '17951911', '1998-09-15', 'M', '1-458-879-8839', 'christopher.marks@example.com', '8367 Kunde Streets Apt. 456\nEmmyside, WY 20942', 'A-', 'nam natus unde', '(847) 610-8983', 'in placeat voluptas', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(78, 'Destinee Rice', 'Waelchi', 'PP', '27603021', '52474942', '1970-10-13', 'F', '978.220.9724', 'lrau@example.com', '300 Feeney Grove Apt. 724\nSouth Jordynberg, TX 61474-2506', 'A-', 'aut eveniet sed', '409.367.0852', 'qui odio velit', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(79, 'Jairo Heller', 'Ziemann', 'CC', '29340499', '93861026', '1990-07-31', 'M', '1-385-936-2369', 'zhodkiewicz@example.com', '262 Smith Burgs\nLake Mayraview, MT 60246', 'B-', 'minus iure qui', '+1-303-529-0344', 'eos animi delectus', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(80, 'Kylee Cronin Jr.', 'Botsford', 'TI', '75703139', '52621992', '2006-05-30', 'M', '602-907-0567', 'lakin.donald@example.org', '41324 Welch Estate Apt. 078\nRohanstad, WV 60837', 'A+', 'et et reiciendis', '678-483-2959', 'dolor nisi eaque', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(81, 'Mr. Osvaldo Vandervort Sr.', 'Davis', 'TI', '51312732', '80281129', '2002-10-27', 'M', '(785) 857-3689', 'adelbert.schaefer@example.net', '96593 Kayden Lake\nLake Arloshire, IN 21149-9455', 'O-', 'ipsum quisquam illum', '+1 (848) 452-0197', 'quia laudantium quam', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(82, 'Tomasa Dietrich', 'Streich', 'RC', '17037483', '94987803', '2005-10-03', 'M', '(689) 926-0116', 'skuhn@example.com', '62970 Feeney Tunnel Apt. 915\nElisabethberg, RI 94431', 'B+', 'aliquam officiis ex', '240.334.2467', 'et laudantium consequuntur', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(83, 'Mr. Reilly Hermann IV', 'Muller', 'CC', '13934184', '16805466', '2019-10-01', 'M', '+15202770982', 'smurphy@example.org', '212 Ansel Trail\nSouth Wileyton, SC 41487', 'B+', 'quaerat quia omnis', '+1.480.845.2883', 'ad cupiditate qui', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(84, 'Nicole Lehner', 'VonRueden', 'CC', '14100960', '21597043', '1970-09-17', 'F', '+1.586.787.5075', 'abdul.metz@example.org', '415 Bins Stravenue\nMantebury, HI 84735', 'A+', 'vero odio natus', '931-390-1630', 'nemo rerum eos', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(85, 'Dr. Augustus Towne MD', 'Parker', 'CE', '82534491', '77994823', '1989-03-18', 'F', '928-539-3610', 'jdeckow@example.org', '70456 Schmitt Extension\nEast Gladysbury, IN 34175-7619', 'O-', 'hic tenetur quae', '+1-857-758-3962', 'a fuga minima', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(86, 'Fred Huel I', 'Abshire', 'PP', '68251014', '86548867', '1995-10-03', 'F', '1-863-739-8600', 'twehner@example.org', '34205 Sophie Tunnel Suite 472\nEast Dakotaberg, OH 14098-7219', 'B+', 'eum quam itaque', '+18564512300', 'sint enim similique', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(87, 'Prof. Judson Marquardt', 'Bechtelar', 'RC', '65998958', '79381421', '1984-04-11', 'M', '(434) 405-9457', 'enrico.bogisich@example.org', '821 Aufderhar Canyon\nPort Auroreville, MI 61739-1342', 'B-', 'eos animi at', '(571) 796-1778', 'nemo ea atque', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(88, 'Maximo Lynch Jr.', 'Schowalter', 'TI', '21790524', '97736136', '2010-08-16', 'F', '1-269-375-4101', 'mann.ryann@example.org', '882 Ledner Burgs Apt. 275\nLake Alexandriamouth, HI 94868-5705', 'B-', 'corporis adipisci voluptas', '(256) 855-7186', 'ut sunt consequatur', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(89, 'Jarrod Bahringer', 'Mertz', 'CE', '61498990', '27615410', '2010-09-30', 'F', '+1 (458) 381-8657', 'creola.franecki@example.net', '314 Schmitt Road Suite 063\nLefflerside, IL 44131-7233', 'A-', 'iure ut molestiae', '+14349489301', 'est nobis et', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(90, 'Mrs. Freda Botsford Sr.', 'Reinger', 'CC', '60093313', '37618780', '2002-11-24', 'M', '504-761-1903', 'carley29@example.net', '33121 Schuster Island Apt. 515\nJacksonbury, WV 95372', 'O-', 'quis provident necessitatibus', '828-649-0763', 'omnis ut aliquam', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(91, 'Dave Strosin', 'Jaskolski', 'TI', '61431961', '94720638', '2015-10-26', 'M', '(518) 808-9305', 'nikko.jakubowski@example.net', '9422 Myra Mill\nWunschstad, HI 47021-3402', 'O-', 'et aut alias', '747.441.0366', 'ut sapiente et', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(92, 'Giovanni Pagac', 'Macejkovic', 'PP', '15535023', '87620628', '1987-12-03', 'M', '+1 (986) 297-1355', 'kshlerin.joanie@example.com', '63760 Gia Road\nHackettport, MN 29320-6425', 'B+', 'sint dignissimos repellendus', '(646) 268-7375', 'culpa tempore expedita', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(93, 'Miss Rachael Wisoky II', 'Lesch', 'PP', '93209794', '77147132', '2002-10-18', 'M', '308-519-5653', 'oconnell.otilia@example.org', '975 Jeanette River Suite 809\nKonopelskiburgh, CO 45275-3145', 'B+', 'hic ipsa earum', '+15103999488', 'accusantium accusantium sed', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(94, 'Helen Kunze', 'Kutch', 'CE', '98780773', '58946163', '1996-01-17', 'F', '+1-380-791-6485', 'dejah33@example.com', '296 Reichert Common Apt. 659\nLake Lexusberg, DC 56453-8514', 'B+', 'magnam et deserunt', '+1 (202) 492-1668', 'deleniti et ratione', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(95, 'Janice Kunze PhD', 'Feil', 'TI', '81754292', '24222764', '1986-03-09', 'M', '1-425-494-8013', 'brent40@example.com', '56189 D\'Amore Gateway Apt. 432\nRandymouth, TX 99051', 'A+', 'doloremque suscipit aut', '+1-346-510-1910', 'libero saepe modi', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(96, 'Dr. Sibyl Wolff I', 'O\'Keefe', 'CC', '01484460', '51092531', '1989-04-18', 'M', '478-469-6330', 'jerald86@example.com', '6912 Gia Crest\nLake Simeonchester, KS 00568-7171', 'B-', 'ea ducimus consectetur', '352-907-9821', 'blanditiis nisi qui', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(97, 'Petra Fahey Sr.', 'Gutmann', 'CC', '48261774', '54262588', '1989-06-23', 'M', '+1.818.231.4767', 'leslie.ratke@example.com', '7173 Schumm Mill\nBoydborough, WA 12738-1095', 'B+', 'nulla qui quibusdam', '708.461.9705', 'ex quas hic', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(98, 'Bridget Zieme II', 'Jacobs', 'TI', '53645920', '26919767', '1999-07-03', 'M', '1-716-751-1832', 'nova.hagenes@example.org', '4815 Botsford Burgs Suite 627\nAdamville, AR 33568-3670', 'B+', 'exercitationem rerum expedita', '+1.269.851.4234', 'accusamus tempore veniam', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(99, 'Addie Hyatt', 'Berge', 'PP', '60614049', '40861775', '2018-08-25', 'F', '562.940.1286', 'wwilderman@example.org', '7816 Justus Island\nSouth Miracleland, AZ 82188', 'A+', 'voluptas dolore pariatur', '406-239-0966', 'ipsum eligendi dicta', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(100, 'Jennifer McDermott', 'Kiehn', 'CC', '87279528', '82371428', '1987-08-30', 'F', '220-670-5412', 'lavina.wilkinson@example.org', '9825 Willms Corner Apt. 217\nNigelville, ME 68391-4137', 'O-', 'repellendus eius ipsa', '+1.301.813.1674', 'nulla sunt quo', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(101, 'Ruben Nader Sr.', 'Nitzsche', 'PP', '54490324', '15706947', '2016-08-16', 'M', '+1-720-756-6766', 'kirlin.alana@example.org', '25178 Jacobi Freeway Suite 977\nJenkinshaven, PA 80401', 'B-', 'id alias perferendis', '+1-917-998-0161', 'sit vitae est', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(102, 'Delmer Casper', 'Crooks', 'CC', '07280974', '52491132', '1971-10-09', 'F', '1-253-323-6019', 'arnulfo.lesch@example.com', '51660 Efrain Creek\nCummeratachester, AR 70788', 'A+', 'dignissimos itaque magnam', '726-731-1600', 'minus in omnis', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(103, 'Prof. Erik Bruen', 'Schimmel', 'CE', '12523712', '65840860', '1973-06-26', 'M', '931.875.4546', 'tillman.caleigh@example.com', '160 Farrell Canyon Suite 660\nEast Norrisstad, OK 92299', 'O+', 'sunt esse perferendis', '830-621-9825', 'voluptatem occaecati voluptatum', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(104, 'Prof. Jules Nikolaus II', 'Roberts', 'PP', '36342973', '60949484', '1976-02-02', 'M', '+12248497852', 'caleb.runolfsson@example.org', '552 Ewald Extension\nDarrickshire, FL 73259-2608', 'A-', 'id magni corporis', '+1.680.554.0188', 'omnis eius id', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(105, 'Darion Schuppe', 'Runte', 'CE', '83387103', '54687874', '1995-01-26', 'M', '+1-820-447-1148', 'kacie96@example.com', '72756 Steuber Manor\nSigridhaven, HI 23074', 'A+', 'repellendus occaecati saepe', '+1-443-766-8538', 'beatae laborum voluptatem', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(106, 'Ariane Pouros Sr.', 'Powlowski', 'TI', '99221059', '57618573', '1986-06-01', 'F', '509-685-0587', 'grant.ritchie@example.org', '1072 Alexie Harbors\nDaisyhaven, IN 50703-9068', 'A+', 'molestiae sed explicabo', '385.362.7974', 'praesentium repudiandae fuga', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(107, 'Prof. Jaron Heathcote', 'Kovacek', 'CE', '27843015', '55550719', '1983-04-22', 'M', '1-940-242-1723', 'wmorissette@example.com', '749 Prohaska Parkway Suite 588\nNew Clevemouth, MA 78165-5120', 'A-', 'sint iste modi', '234-924-0701', 'laborum inventore tempore', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(108, 'Claudia Hessel', 'Cremin', 'CC', '70453038', '42243490', '1994-01-11', 'F', '930-947-6120', 'devin77@example.net', '2592 Arlene Station Apt. 783\nWest Mohamedside, AR 85245', 'A+', 'deserunt voluptatum quod', '+1-251-597-9168', 'eum itaque et', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(109, 'Jean Cremin', 'Cruickshank', 'PP', '43182404', '00128370', '2018-10-24', 'F', '281.357.2705', 'flatley.salvatore@example.net', '96149 Tia Throughway\nLake Michale, NH 27803', 'A-', 'soluta ut libero', '(941) 557-8194', 'ratione repudiandae voluptatibus', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(110, 'Dr. Madisen Lemke V', 'Buckridge', 'PP', '01972294', '72938010', '2012-08-23', 'M', '(615) 694-9429', 'oschneider@example.org', '357 Annabel Summit\nCarolyneburgh, DE 15319', 'B+', 'cum perferendis totam', '+15029317835', 'culpa et quaerat', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(111, 'Rusty Bayer', 'Hamill', 'PP', '71317104', '13266782', '1983-08-16', 'F', '707.489.1388', 'aweber@example.net', '4084 Keely Ville Suite 361\nCummerataburgh, PA 57581', 'A+', 'quas dolores est', '+1-667-289-9675', 'quidem dolores libero', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(112, 'Mr. Dominic Cormier', 'Daugherty', 'PP', '88797269', '72089297', '2015-05-04', 'M', '1-458-204-3204', 'dulce17@example.com', '34803 Dorothy Keys\nBeierfurt, MD 11538-8917', 'O-', 'quo nesciunt eos', '(219) 651-5541', 'accusantium facilis ut', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(113, 'Oceane Jenkins II', 'Walker', 'TI', '26618639', '24516315', '1978-07-28', 'F', '+1.848.867.2912', 'baumbach.dominic@example.org', '75273 Aliza Hollow Suite 936\nRosellamouth, WI 09001-1314', 'A-', 'non atque vel', '774-270-1278', 'et et aliquam', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(114, 'Emmalee Bernhard', 'Homenick', 'CE', '56568852', '85497850', '2011-09-25', 'M', '(415) 858-4424', 'hborer@example.com', '97037 Runolfsdottir Lock\nLaishaborough, OK 76693-1338', 'B-', 'sed quas inventore', '1-785-901-5815', 'incidunt nesciunt facilis', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(115, 'Liza Brekke V', 'Stracke', 'CE', '46357845', '55922273', '1987-09-04', 'M', '1-419-664-5952', 'wspinka@example.org', '98605 Mose Village Apt. 224\nLake Chasefort, MI 58706', 'A+', 'omnis sapiente quasi', '913.593.9994', 'cum modi eos', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(116, 'Dr. Reggie Robel', 'Abernathy', 'TI', '35351773', '84649122', '2012-12-22', 'M', '830-373-5725', 'kheidenreich@example.net', '3271 Michael Tunnel Apt. 414\nNew Jazmyne, RI 20102-3011', 'B-', 'esse est unde', '1-830-390-2754', 'quia occaecati ipsa', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(117, 'Sherwood Hudson', 'McLaughlin', 'RC', '93089686', '21384146', '1996-11-14', 'M', '+1.937.424.0063', 'rollin.gislason@example.com', '2930 Senger Plain Suite 019\nBeattychester, DE 44756', 'A+', 'dicta sint velit', '281.474.0512', 'voluptatem quo totam', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(118, 'Emmy Friesen', 'Stamm', 'TI', '32576510', '65893152', '1978-05-03', 'M', '+1-310-364-5605', 'bergnaum.cory@example.org', '5277 Cruickshank Avenue\nTillmanshire, MD 13252', 'O+', 'ea vitae earum', '+17148083315', 'iusto hic culpa', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(119, 'Miss Alba Moen', 'Dickinson', 'CE', '28772931', '25163239', '1983-10-21', 'M', '+1-725-755-0649', 'rbartoletti@example.net', '213 Sporer Parkways Apt. 979\nEast Dedricview, VT 87808', 'O+', 'enim eius unde', '+1.385.710.0649', 'natus quia in', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(120, 'Prof. Savion Feest', 'Reichel', 'CE', '96157440', '33086082', '1980-07-18', 'M', '1-605-932-7833', 'uhudson@example.net', '80671 Davon Streets Apt. 414\nNorth Randal, SD 38396', 'O+', 'voluptate libero dolorem', '1-520-200-2314', 'harum harum enim', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(121, 'Mrs. Berneice Lebsack V', 'Cronin', 'RC', '32189765', '69344974', '1982-07-17', 'F', '+1.508.869.8514', 'hessel.aiden@example.org', '1398 Effie Islands Apt. 982\nTurnerfurt, MA 22826-8903', 'O-', 'corporis facilis id', '520.268.1540', 'possimus expedita et', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(122, 'Ms. Camilla Kilback', 'Gleason', 'PP', '32551486', '36517626', '2000-01-09', 'F', '+1-740-479-3259', 'wisozk.kathryne@example.net', '8551 Horace Divide\nMyrtleville, AL 59265-8813', 'A-', 'qui iure minus', '+18564650562', 'voluptatum tempore consequatur', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(123, 'Miss Shanna Harris MD', 'Ebert', 'CE', '01807442', '43814577', '1980-08-12', 'F', '954.202.3022', 'jonatan.herzog@example.org', '36996 Vernie Drive\nEliezerborough, IL 20335', 'B-', 'voluptas aspernatur vel', '+1-678-792-1380', 'facilis atque quia', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(124, 'Ofelia Fay', 'Dibbert', 'TI', '18537487', '16706328', '2006-04-10', 'F', '614-687-6480', 'schultz.wellington@example.com', '87040 Libbie Flats Apt. 592\nSouth Rollinshire, AK 95112-7024', 'B-', 'nam numquam perferendis', '(458) 749-0524', 'dolor vitae mollitia', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(125, 'Miss Roma Shields DVM', 'McKenzie', 'CE', '31856966', '86225481', '1990-06-21', 'M', '814-444-5839', 'nannie54@example.com', '99132 Ankunding Haven Apt. 321\nDelbertstad, MO 28498-3477', 'A-', 'explicabo voluptas et', '+1-951-810-7571', 'sint consequatur iure', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(126, 'Timmothy Lesch', 'Boehm', 'CC', '88113348', '59467079', '2010-04-21', 'F', '737-425-0118', 'reva47@example.net', '7363 Turcotte Divide\nRusselview, VA 87110-9687', 'O-', 'perferendis exercitationem corporis', '1-586-358-0341', 'omnis et qui', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(127, 'Janick Emmerich DVM', 'Langworth', 'TI', '90577808', '30296776', '1985-01-29', 'F', '1-279-518-1649', 'bailey.kyla@example.com', '9278 Langosh Via\nEast Clark, OR 18939-4318', 'A+', 'itaque nobis quis', '(334) 632-7181', 'natus consequatur dicta', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(128, 'Jordy Conn II', 'Baumbach', 'RC', '57557610', '64990896', '2018-06-17', 'F', '407-976-4068', 'eloisa.little@example.net', '75770 Stacy Summit\nEast Boydfurt, CT 73112-5696', 'B-', 'ea atque laborum', '341.886.3165', 'ut cupiditate quasi', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(129, 'Jany Ankunding DDS', 'Bradtke', 'CE', '64356739', '15257031', '1996-02-18', 'F', '+1 (919) 950-0611', 'thiel.betsy@example.net', '7269 Karen Brook Apt. 786\nNew Maiamouth, KS 07400', 'O+', 'officiis soluta voluptatem', '781.230.8629', 'sit delectus aperiam', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(130, 'Mr. Pedro Ondricka Jr.', 'Jenkins', 'TI', '67064627', '90957579', '1986-10-20', 'M', '820-871-9913', 'vicky.weimann@example.net', '109 Herzog Prairie Suite 577\nLake Edythefort, OK 34102-3792', 'O-', 'totam nam natus', '+1-262-507-9561', 'eaque a commodi', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(131, 'Wilhelm Barton', 'Roberts', 'TI', '89281357', '99333978', '1981-07-02', 'M', '1-602-529-2906', 'irving.jast@example.net', '2664 Jacobson Key Apt. 758\nTerrillbury, MA 98666', 'B+', 'labore eum dolorum', '1-732-779-1120', 'consectetur nobis repudiandae', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(132, 'Deanna Ortiz', 'Crona', 'CC', '22776216', '86891577', '1975-02-12', 'M', '+1 (484) 788-4710', 'hartmann.aglae@example.com', '53779 Tabitha Knolls Suite 498\nSouth Lindsey, CA 91001-1695', 'A+', 'ut sed enim', '248.719.0036', 'soluta ipsum praesentium', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(133, 'Prof. Darrin McKenzie DDS', 'Dooley', 'CE', '98781555', '46389245', '2018-06-01', 'M', '+14024835723', 'ikris@example.net', '9925 Bins Village\nBergstromborough, CA 63853-5406', 'O+', 'sint beatae at', '650.690.1698', 'itaque assumenda quod', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(134, 'Makenna Hoeger', 'O\'Connell', 'RC', '60115084', '23164538', '1988-04-15', 'M', '+1 (516) 965-7123', 'daija79@example.org', '23847 Nasir Summit Suite 379\nKuhicfurt, KS 45218-4358', 'O-', 'dolore distinctio quae', '+14809069411', 'saepe temporibus sed', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(135, 'Charles Gerhold', 'Lehner', 'CC', '95783131', '54980568', '1999-01-06', 'M', '(984) 560-8666', 'freddie.sipes@example.com', '8196 Stracke Summit\nEast Shannaview, TN 83025-0724', 'O-', 'rem consequatur aut', '+1-573-509-3972', 'sint cum mollitia', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(136, 'Alexander Stoltenberg', 'McKenzie', 'RC', '00906475', '40232388', '2009-07-20', 'M', '740-405-1805', 'verda87@example.org', '428 McCullough Courts\nPort Edport, AZ 54923-3033', 'B-', 'nostrum et aut', '272-521-1979', 'quod atque dolorem', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(137, 'Bobby Gutkowski', 'Goyette', 'CE', '79733554', '97000480', '2013-04-29', 'M', '+1 (781) 824-9165', 'faufderhar@example.org', '53065 Hoppe Valley Suite 767\nNew Carlos, NE 04541-5980', 'A+', 'unde officia maiores', '+1-347-719-3608', 'quo totam aut', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(138, 'Jake Hahn', 'Muller', 'TI', '10572421', '60435324', '1995-09-08', 'M', '(510) 506-6955', 'eflatley@example.org', '292 Shanna Prairie Suite 821\nEast Donny, UT 22150-7885', 'A-', 'animi praesentium eos', '(765) 812-5467', 'assumenda aspernatur laudantium', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(139, 'Yessenia Kautzer', 'Gleichner', 'RC', '04735287', '61780159', '1970-08-05', 'M', '+1 (512) 362-0372', 'nienow.jairo@example.net', '521 Zora Fall Apt. 253\nAltheaville, KS 16673', 'O-', 'vel ut velit', '+16788799033', 'inventore cum sit', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(140, 'Kasey Gleichner', 'Reichel', 'RC', '29114575', '21245981', '1975-07-28', 'F', '+17572514543', 'wuckert.jed@example.com', '95372 Stehr Lodge\nWest Estevan, AZ 66464', 'B-', 'hic ab dolores', '+1.224.404.0635', 'voluptas repellendus dignissimos', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(141, 'Sydni Schumm', 'Parker', 'PP', '40074174', '54369310', '2009-06-30', 'M', '1-678-925-0092', 'khintz@example.net', '7000 Balistreri Gardens Apt. 152\nEast Juana, AK 35919-4870', 'B+', 'doloribus possimus recusandae', '1-210-523-0802', 'labore doloribus et', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(142, 'Ms. Christa Fay Sr.', 'Pollich', 'RC', '90269597', '26566163', '1984-04-19', 'F', '+1.570.600.1867', 'tconnelly@example.org', '9328 Maci Forks Suite 943\nNew Kirstin, SC 57395', 'B-', 'molestias in et', '+1-909-931-0915', 'id necessitatibus id', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(143, 'Vivienne Barton', 'Jacobs', 'CC', '88324372', '14258584', '1970-05-27', 'M', '(586) 755-9362', 'sherman04@example.com', '181 Alexandrine Islands Apt. 944\nNorth Theresia, MS 33289-2292', 'A-', 'magnam sit dolores', '1-520-724-7466', 'et quasi odit', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(144, 'Golden Herman', 'Eichmann', 'CE', '79643598', '85261558', '2012-07-07', 'M', '(541) 912-4125', 'usawayn@example.com', '7897 Leif Mountains\nKristopherview, WA 85814', 'A+', 'ad itaque molestias', '848-213-8720', 'qui ad iure', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(145, 'Katarina Macejkovic IV', 'Deckow', 'PP', '97687723', '16673801', '1998-02-12', 'F', '989-634-9844', 'dominique29@example.org', '4726 Elsie Club Apt. 791\nMohamedbury, MD 27266', 'O+', 'aut officiis doloremque', '1-240-312-6524', 'nihil earum et', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(146, 'Norval Murphy', 'Schaden', 'PP', '38804627', '87727911', '1994-09-25', 'F', '(720) 668-0908', 'cruickshank.uriel@example.com', '7707 Norberto Canyon Suite 314\nLake Gust, TX 56237', 'A-', 'sint quidem harum', '1-269-233-3842', 'dolor qui neque', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(147, 'Lisa Kreiger V', 'Medhurst', 'TI', '93888772', '79002663', '1982-04-11', 'F', '458.835.6717', 'bfranecki@example.com', '886 Micah Vista Apt. 711\nOthatown, OH 30739-9386', 'B-', 'ad cupiditate non', '484.789.2083', 'eaque tempora esse', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(148, 'Santino Dach MD', 'McClure', 'PP', '16328894', '41459140', '1992-05-19', 'F', '+1-951-490-9437', 'elroy.luettgen@example.com', '66017 Legros Islands\nNew Destineystad, NC 30551-7761', 'O+', 'ex in aspernatur', '580.862.9109', 'ipsam nam totam', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(149, 'Liza Haley', 'Roberts', 'PP', '83979825', '69238523', '1970-03-12', 'F', '+1-386-653-4701', 'karli.considine@example.com', '61587 Jarrell Keys\nLake Chasemouth, NJ 57448', 'O+', 'sit et qui', '1-470-370-3742', 'debitis fuga ex', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(150, 'Mr. Paris D\'Amore I', 'Johnston', 'CE', '31513616', '67753236', '1988-08-22', 'F', '+1.351.875.6212', 'sabernathy@example.org', '977 Rutherford Shoals Suite 876\nJamilton, OK 21845-1108', 'O-', 'qui qui aspernatur', '(234) 935-0378', 'fugit voluptas cumque', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(151, 'Rosa Torp', 'Monahan', 'PP', '07828678', '61129089', '2019-12-03', 'F', '970-665-9276', 'jbecker@example.com', '597 Keanu Skyway\nDestinstad, OH 17783', 'O+', 'quia perferendis est', '+1-850-904-8513', 'veritatis quaerat omnis', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(152, 'Amira Franecki', 'Romaguera', 'TI', '72796489', '43138773', '2012-02-18', 'M', '(571) 366-7235', 'jrogahn@example.net', '488 Alberto Brooks\nMacejkovictown, DE 45005-6860', 'O-', 'quia explicabo sit', '929-398-2119', 'voluptates aperiam perferendis', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(153, 'Prof. Elbert Gutmann DVM', 'Torphy', 'CC', '00656971', '87489112', '2000-10-17', 'M', '+1.539.406.5765', 'hwaters@example.net', '34237 Watsica Street Apt. 944\nMcKenzieborough, NC 38809', 'A-', 'officia quis tempora', '1-423-651-7891', 'sint non excepturi', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(154, 'Rosella Swift', 'Stracke', 'TI', '17746484', '30899773', '2015-02-03', 'M', '+13238466290', 'willie.gaylord@example.net', '5771 Grady Mountains Suite 350\nJohnsonville, FL 09108-8302', 'B-', 'nostrum beatae dolorem', '(940) 779-6190', 'doloribus maxime nam', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(155, 'Prof. Modesto Frami', 'Bogisich', 'RC', '23361985', '03500866', '2017-05-04', 'F', '+1-220-441-5095', 'jjohnson@example.org', '5466 O\'Keefe Cliffs Suite 792\nHandview, VA 57433', 'A-', 'ut assumenda quibusdam', '+1 (442) 301-2319', 'deserunt dolorum dolores', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(156, 'Nelson Prosacco', 'Parisian', 'RC', '10542382', '67361768', '1996-05-20', 'F', '276-624-3151', 'mosciski.adele@example.org', '772 Weimann Stream\nVerdamouth, MS 00783-9458', 'B+', 'nostrum dicta eligendi', '430-455-6927', 'in reprehenderit magnam', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(157, 'Edison Moen', 'Konopelski', 'TI', '20556070', '56768229', '1997-03-10', 'F', '1-660-688-4039', 'etha06@example.com', '735 Gayle Walks Suite 469\nSouth Perry, NE 53154-5959', 'O+', 'est tempore at', '+1-620-313-1353', 'ipsa labore vel', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(158, 'Sammie Fadel', 'Denesik', 'TI', '60019835', '98177045', '2018-05-26', 'F', '+1-786-868-9619', 'aadams@example.org', '6883 Diamond Prairie Apt. 811\nAdityaside, DE 06813', 'O-', 'ipsam aut dolorem', '769.654.5295', 'iste accusantium occaecati', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(159, 'Martina Ankunding', 'Leffler', 'TI', '32341714', '69520867', '1986-06-11', 'M', '+1.669.480.9932', 'jimmie02@example.net', '88616 Felix Point Apt. 872\nCarissatown, TX 55604-7287', 'B-', 'omnis odio minus', '1-231-340-7441', 'magni aut nihil', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(160, 'Jaylen Wehner DVM', 'Heaney', 'TI', '22032782', '56262493', '1970-05-05', 'M', '(775) 330-6844', 'xzboncak@example.com', '18827 Jeanette Lodge Suite 868\nPort Adellaborough, GA 14841-5561', 'B+', 'voluptas sequi repudiandae', '223.545.4957', 'est ducimus perspiciatis', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(161, 'Graham Boyer', 'Nitzsche', 'CE', '74292993', '30408604', '1972-12-03', 'F', '352-578-4909', 'wmayer@example.com', '6641 Durward Gateway\nSouth Jacklyn, NE 32400-8172', 'B+', 'ea et quasi', '1-909-834-7400', 'molestiae ex tempore', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(162, 'Reta Hessel', 'Rippin', 'CE', '86920700', '12839092', '1996-11-17', 'M', '(470) 880-3701', 'ismael63@example.org', '4443 Padberg Mountain\nRogahnstad, NE 72471-0410', 'B+', 'voluptas quaerat sit', '+1 (858) 756-9477', 'fuga earum quia', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(163, 'Norberto Nikolaus', 'Gusikowski', 'CE', '59028068', '69478306', '1986-10-26', 'F', '(910) 753-6594', 'rice.emmitt@example.org', '80234 Sipes Cliff\nLake Nathanfurt, SD 11414-0767', 'B-', 'possimus ullam provident', '+1-209-205-2992', 'ipsam voluptatem dolore', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(164, 'Miss Berenice Bergstrom IV', 'Skiles', 'RC', '73181976', '39592218', '2013-05-01', 'M', '(540) 614-6390', 'princess52@example.com', '9068 Reinhold Trafficway\nPort Ambrose, SD 35005-9536', 'A-', 'cum rerum qui', '+1-337-720-7709', 'eligendi ut qui', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(165, 'Karlee O\'Kon', 'Armstrong', 'TI', '88793866', '12543691', '2012-01-21', 'M', '(463) 868-6532', 'thiel.pedro@example.org', '5080 Kulas Mills Apt. 613\nConnellyfurt, OH 77177-1755', 'A+', 'nesciunt sint est', '843-995-3513', 'rerum quasi sapiente', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(166, 'Joany Grady', 'Bogisich', 'TI', '91315319', '05059802', '1981-07-06', 'M', '(713) 929-0188', 'rratke@example.net', '670 Marks Oval Suite 607\nSouth Brian, AZ 14478', 'A-', 'voluptatem sequi eos', '(520) 805-7018', 'quibusdam aut temporibus', '2026-04-30 03:42:53', '2026-04-30 03:42:53');
INSERT INTO `pacientes` (`id`, `nombres`, `apellidos`, `tipo_documento`, `cc`, `nro_seguro`, `fecha_nacimiento`, `genero`, `celular`, `correo`, `direccion`, `grupo_sanguineo`, `alergias`, `contacto_emergencia`, `observaciones`, `created_at`, `updated_at`) VALUES
(167, 'Herminia Johnston', 'Feil', 'TI', '73230050', '46768078', '1998-09-12', 'M', '+1 (385) 689-4687', 'domingo04@example.com', '7989 Elvie Green Suite 840\nHertamouth, CO 86819-2353', 'A+', 'enim illum ab', '463-478-9539', 'aut occaecati autem', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(168, 'Dixie Waters', 'Hansen', 'RC', '62579491', '77295250', '2013-04-16', 'F', '571-891-2626', 'murray.jeffry@example.com', '417 Raphael Ville\nWest Maggie, TX 32228-8718', 'A-', 'nihil numquam nostrum', '323.287.5024', 'corporis ducimus ut', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(169, 'Al Kub', 'Larson', 'CE', '05110484', '20563843', '1995-10-05', 'M', '1-978-486-8425', 'karley.kuvalis@example.com', '7074 O\'Connell Harbor\nRodriguezview, FL 63298', 'A+', 'molestiae provident laborum', '+1 (820) 591-9080', 'velit qui sit', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(170, 'Jeanie Yost', 'Gottlieb', 'CC', '40177493', '01086408', '1987-11-24', 'M', '+1 (629) 641-1434', 'heidi37@example.net', '462 Tyson View Suite 275\nEast Olaftown, ME 26290-1146', 'O-', 'asperiores nobis et', '410.310.2421', 'delectus molestiae rem', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(171, 'Ahmad Marks', 'Heathcote', 'CC', '11314317', '19888213', '1994-08-26', 'F', '346.334.4968', 'dora.jenkins@example.com', '53739 Kip Rapid Suite 869\nHermistonside, NV 17973-6932', 'O-', 'iste illo quaerat', '(386) 929-2561', 'molestias est est', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(172, 'Karley Torp', 'Shanahan', 'CC', '49004421', '70551278', '1991-10-29', 'F', '1-585-566-6156', 'gregory02@example.net', '657 Wolf Point Apt. 519\nMissouriland, ME 03784', 'A-', 'earum unde qui', '217.472.5866', 'natus quisquam nam', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(173, 'Muriel Leuschke', 'Bahringer', 'RC', '77858932', '43974702', '1996-04-14', 'F', '657-309-6004', 'carroll.maye@example.org', '701 Tess Vista Apt. 331\nReillychester, KS 51525-7225', 'A-', 'nam omnis dolore', '478.871.9586', 'consequatur quia iure', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(174, 'Kristoffer Reichel II', 'Bernhard', 'RC', '35714742', '71463453', '2016-01-13', 'M', '571-807-9661', 'bettie69@example.org', '7130 Koelpin Spur Apt. 644\nBerniershire, AK 15739-9201', 'A-', 'tempora aut eaque', '424-706-3816', 'cumque sit laudantium', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(175, 'Sean Carroll', 'Monahan', 'CE', '75600393', '61851112', '1978-11-07', 'F', '757.622.5885', 'walker.jevon@example.com', '41275 Raquel Corner Apt. 667\nWest Garnettland, IA 65893', 'B-', 'natus et eum', '931.290.5104', 'odio voluptas totam', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(176, 'Dr. Jayde Bayer', 'Renner', 'TI', '23115671', '68843036', '1981-02-01', 'F', '+1 (347) 510-6402', 'waelchi.stanton@example.com', '88925 Gulgowski Springs Suite 278\nNew Jane, MO 51268-5972', 'A-', 'magnam et recusandae', '828.784.0665', 'impedit quod quo', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(177, 'Melyna Schneider', 'Yundt', 'PP', '60764185', '16060675', '1991-03-31', 'F', '(828) 630-9649', 'cristopher.bergnaum@example.org', '948 Turner Dale\nBlakeborough, ND 94435', 'B-', 'quam harum et', '1-601-506-3844', 'ut ab mollitia', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(178, 'Marlon McLaughlin', 'Carter', 'TI', '81414119', '41724219', '1999-11-25', 'M', '424-702-1303', 'allison.zieme@example.com', '41636 Padberg Unions\nWisozkland, FL 10068-0010', 'O-', 'quo iusto et', '1-272-845-2463', 'aut sapiente exercitationem', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(179, 'Florencio DuBuque', 'Smith', 'RC', '49051092', '33907698', '1995-05-28', 'M', '+1 (313) 624-4338', 'qtorp@example.com', '33017 Klocko Parks\nCassandreburgh, VA 14460', 'O+', 'vel ut delectus', '+1.947.653.6138', 'voluptatibus ipsam atque', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(180, 'Sarai Quigley', 'Walter', 'CE', '69414445', '87123327', '2000-08-27', 'M', '+1-937-372-0404', 'lgrimes@example.net', '91244 Will Trafficway Apt. 772\nWest Adrain, RI 58799', 'O+', 'optio optio quos', '662.440.5205', 'ea dolore deserunt', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(181, 'Alisa Bruen', 'Hirthe', 'CE', '52127390', '86243408', '1989-02-10', 'F', '+14302092874', 'evangeline82@example.net', '7415 Roberts Vista Suite 995\nMcLaughlinchester, MS 92779-7518', 'A-', 'natus laudantium laborum', '+1.406.755.9634', 'qui velit consectetur', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(182, 'Prof. Jayde Cartwright', 'Littel', 'CE', '34638022', '33288865', '1982-11-21', 'M', '+1.941.745.8130', 'smitham.lon@example.org', '1168 Cummings Cape Suite 482\nNorth Leonel, KS 22476', 'A-', 'nisi consequatur laborum', '+1-210-347-0056', 'voluptas est veritatis', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(183, 'Chester Aufderhar', 'Moen', 'PP', '09568630', '49728589', '1992-10-07', 'M', '+1 (951) 588-5247', 'weldon82@example.org', '7113 Krajcik Avenue\nLake Bradford, NE 22547-7844', 'O-', 'consequatur autem commodi', '+1-320-279-1745', 'sed vel et', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(184, 'Isac Marquardt', 'Swaniawski', 'PP', '00937159', '19357564', '1975-07-25', 'M', '1-509-933-7928', 'friesen.esta@example.com', '4970 Glennie Bypass Apt. 152\nNew Nannieland, TX 32138-7435', 'O+', 'est recusandae atque', '380-362-3878', 'ducimus vero maxime', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(185, 'Mrs. Asia Gutkowski DVM', 'Pfannerstill', 'CC', '70640404', '77075062', '2003-01-24', 'M', '+1.678.672.0087', 'tania.bergnaum@example.com', '90468 Murl Path\nEast Annabell, MI 53749', 'B-', 'fugit ut cum', '+13606884473', 'et aspernatur libero', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(186, 'Kailee Pfeffer', 'Torp', 'TI', '24369317', '07681811', '1996-04-15', 'M', '364.437.3880', 'alexandre59@example.org', '976 Olson Stravenue\nPort Malcolm, NC 00317', 'B-', 'voluptatum consequatur praesentium', '+1-351-215-6826', 'non illo rerum', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(187, 'Anastasia Botsford', 'Frami', 'RC', '32709477', '32426697', '1996-01-19', 'M', '1-949-883-4080', 'haley66@example.com', '4491 Kihn Stravenue\nPort Brisa, WA 69608-2815', 'A-', 'accusantium aut debitis', '+1-424-560-3130', 'ut voluptatibus est', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(188, 'Marguerite Wiza V', 'Robel', 'CC', '96853938', '42794172', '2006-04-02', 'M', '316.693.0575', 'pking@example.net', '92600 Conroy Squares Suite 425\nNorth Carriehaven, IL 47887-2799', 'A+', 'aut voluptatem ipsum', '708.770.1773', 'saepe ut et', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(189, 'Miss Makayla Tremblay V', 'Hilpert', 'RC', '72238181', '15592115', '2004-01-12', 'F', '929.870.3311', 'corene.runolfsdottir@example.com', '5504 Aileen Island Apt. 487\nNorth Phyllis, WI 15270', 'O-', 'sunt non qui', '(910) 287-3165', 'sapiente est rerum', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(190, 'Mr. Jensen Sanford', 'Moore', 'PP', '84180402', '60724098', '1975-11-18', 'F', '+1.920.299.0878', 'maude69@example.com', '98252 Ziemann Prairie Suite 052\nNonaton, NY 17021-8527', 'A-', 'dignissimos consectetur labore', '+1-404-390-4320', 'eos neque tempore', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(191, 'Shana Moen Sr.', 'Nitzsche', 'CE', '32998183', '19713015', '1986-12-29', 'F', '+1 (870) 303-2917', 'stokes.nannie@example.com', '97044 Cormier Falls\nPort Kurtfort, NY 09405', 'O+', 'ut omnis vel', '+1 (919) 249-4589', 'nostrum maxime nisi', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(192, 'Angela Emmerich PhD', 'Schimmel', 'TI', '57291203', '06179916', '1978-05-27', 'M', '440-619-5277', 'mmurphy@example.com', '772 Jordi Lane Suite 254\nEast Sandrinefort, CO 14118-4218', 'A+', 'est asperiores nam', '(628) 868-5688', 'repudiandae reprehenderit molestias', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(193, 'Lavonne Oberbrunner', 'Kuphal', 'PP', '37088994', '66390354', '1989-10-16', 'M', '903.343.1106', 'murray20@example.net', '3906 Percival Mission Suite 485\nEast Vita, IN 61437-9767', 'A-', 'quia deleniti rerum', '1-425-468-2185', 'et provident laboriosam', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(194, 'Kurt Veum', 'Barrows', 'CC', '85649451', '02105212', '1978-10-07', 'F', '952.604.1694', 'tillman.mike@example.org', '7976 Vanessa Via\nNorth Rosamond, FL 52515', 'A+', 'porro quas odit', '206.908.1507', 'ipsa soluta excepturi', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(195, 'Dr. Steve Quitzon', 'Prosacco', 'RC', '69974381', '44600712', '1973-02-25', 'M', '1-458-562-1878', 'kaley32@example.com', '671 Hills Prairie Suite 269\nNew Elody, ND 22401', 'A-', 'veniam natus similique', '+1.563.764.7240', 'minima nisi odit', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(196, 'Rosalyn Zulauf', 'Hettinger', 'TI', '01278637', '19871929', '1992-05-04', 'F', '1-856-773-9746', 'mvolkman@example.com', '53229 Stracke Pike Suite 480\nAniyachester, GA 93905-1134', 'A+', 'doloremque quasi atque', '(941) 738-6097', 'nostrum quo inventore', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(197, 'Dr. Elody Ebert', 'Grant', 'RC', '01406785', '34060222', '1986-08-27', 'M', '865-701-4964', 'acollins@example.org', '2352 Fay Stream\nEast Angus, ME 02695', 'O+', 'officiis illo voluptatum', '252-532-7069', 'ut consequatur consequatur', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(198, 'Ethyl Crooks', 'Grant', 'CC', '32370275', '75897196', '1999-07-23', 'M', '364.483.0828', 'florence.quitzon@example.com', '476 Greg Shoals\nKutchshire, NV 66298', 'A-', 'eos magnam id', '(860) 575-9837', 'ipsam tempore voluptates', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(199, 'Griffin Schneider', 'Runte', 'PP', '76662490', '54652728', '1985-06-02', 'F', '301-656-2863', 'flo37@example.org', '20308 Olson Burg\nRitchieview, DE 12703-7706', 'O-', 'magnam eligendi esse', '470.713.6115', 'in rerum voluptas', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(200, 'Cora Kub MD', 'Predovic', 'CE', '09162503', '62245783', '2014-01-03', 'M', '1-332-909-3974', 'jan36@example.com', '83483 Eileen Track Suite 485\nWest Estachester, WY 67763-4471', 'O-', 'modi delectus qui', '352-906-4251', 'et alias quibusdam', '2026-04-30 03:42:53', '2026-04-30 03:42:53'),
(201, 'Andres Felipe', 'Villamil Melo', 'CC', '1000182022', '204551515', '2026-02-26', 'M', '573204050542', 'afvm2602@gmail.com', 'Cl 29b #6c 24 este', 'O-', 'ninguna', '573204050542', NULL, '2026-04-30 07:15:12', '2026-04-30 07:15:12'),
(202, 'rochy', 'melo', 'CC', '22618630', '123456', '1978-11-07', 'F', '3123468939', 'rochymelo1107@gmail.com', 'Cl 29b #6c 24 este', 'O+', 'ninguna', '0000', NULL, '2026-04-30 21:31:22', '2026-04-30 21:31:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

DROP TABLE IF EXISTS `pagos`;
CREATE TABLE IF NOT EXISTS `pagos` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `paciente_id` bigint UNSIGNED NOT NULL,
  `doctor_id` bigint UNSIGNED NOT NULL,
  `fecha_pago` date NOT NULL,
  `monto` decimal(8,2) NOT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pagos_paciente_id_foreign` (`paciente_id`),
  KEY `pagos_doctor_id_foreign` (`doctor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id`, `paciente_id`, `doctor_id`, `fecha_pago`, `monto`, `descripcion`, `created_at`, `updated_at`) VALUES
(2, 201, 1, '2026-04-30', 10000.00, NULL, '2026-04-30 07:16:40', '2026-04-30 07:16:40'),
(3, 202, 2, '2026-05-05', 150000.00, NULL, '2026-04-30 21:32:12', '2026-04-30 21:32:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin.index', 'web', '2026-04-30 03:42:48', '2026-04-30 03:42:48'),
(2, 'admin.usuarios.index', 'web', '2026-04-30 03:42:48', '2026-04-30 03:42:48'),
(3, 'admin.usuarios.create', 'web', '2026-04-30 03:42:48', '2026-04-30 03:42:48'),
(4, 'admin.usuarios.store', 'web', '2026-04-30 03:42:48', '2026-04-30 03:42:48'),
(5, 'admin.usuarios.show', 'web', '2026-04-30 03:42:48', '2026-04-30 03:42:48'),
(6, 'admin.usuarios.edit', 'web', '2026-04-30 03:42:48', '2026-04-30 03:42:48'),
(7, 'admin.usuarios.update', 'web', '2026-04-30 03:42:48', '2026-04-30 03:42:48'),
(8, 'admin.usuarios.confirmDelete', 'web', '2026-04-30 03:42:48', '2026-04-30 03:42:48'),
(9, 'admin.usuarios.destroy', 'web', '2026-04-30 03:42:48', '2026-04-30 03:42:48'),
(10, 'admin.configuraciones.index', 'web', '2026-04-30 03:42:48', '2026-04-30 03:42:48'),
(11, 'admin.configuraciones.create', 'web', '2026-04-30 03:42:49', '2026-04-30 03:42:49'),
(12, 'admin.configuraciones.store', 'web', '2026-04-30 03:42:49', '2026-04-30 03:42:49'),
(13, 'admin.configuraciones.show', 'web', '2026-04-30 03:42:49', '2026-04-30 03:42:49'),
(14, 'admin.configuraciones.edit', 'web', '2026-04-30 03:42:49', '2026-04-30 03:42:49'),
(15, 'admin.configuraciones.update', 'web', '2026-04-30 03:42:49', '2026-04-30 03:42:49'),
(16, 'admin.configuraciones.confirmDelete', 'web', '2026-04-30 03:42:49', '2026-04-30 03:42:49'),
(17, 'admin.configuraciones.destroy', 'web', '2026-04-30 03:42:49', '2026-04-30 03:42:49'),
(18, 'admin.secretarias.index', 'web', '2026-04-30 03:42:49', '2026-04-30 03:42:49'),
(19, 'admin.secretarias.create', 'web', '2026-04-30 03:42:49', '2026-04-30 03:42:49'),
(20, 'admin.secretarias.store', 'web', '2026-04-30 03:42:49', '2026-04-30 03:42:49'),
(21, 'admin.secretarias.show', 'web', '2026-04-30 03:42:49', '2026-04-30 03:42:49'),
(22, 'admin.secretarias.edit', 'web', '2026-04-30 03:42:49', '2026-04-30 03:42:49'),
(23, 'admin.secretarias.update', 'web', '2026-04-30 03:42:49', '2026-04-30 03:42:49'),
(24, 'admin.secretarias.confirmDelete', 'web', '2026-04-30 03:42:49', '2026-04-30 03:42:49'),
(25, 'admin.secretarias.destroy', 'web', '2026-04-30 03:42:49', '2026-04-30 03:42:49'),
(26, 'admin.pacientes.index', 'web', '2026-04-30 03:42:49', '2026-04-30 03:42:49'),
(27, 'admin.pacientes.create', 'web', '2026-04-30 03:42:49', '2026-04-30 03:42:49'),
(28, 'admin.pacientes.store', 'web', '2026-04-30 03:42:49', '2026-04-30 03:42:49'),
(29, 'admin.pacientes.show', 'web', '2026-04-30 03:42:49', '2026-04-30 03:42:49'),
(30, 'admin.pacientes.edit', 'web', '2026-04-30 03:42:49', '2026-04-30 03:42:49'),
(31, 'admin.pacientes.update', 'web', '2026-04-30 03:42:49', '2026-04-30 03:42:49'),
(32, 'admin.pacientes.confirmDelete', 'web', '2026-04-30 03:42:49', '2026-04-30 03:42:49'),
(33, 'admin.pacientes.destroy', 'web', '2026-04-30 03:42:49', '2026-04-30 03:42:49'),
(34, 'admin.consultorios.index', 'web', '2026-04-30 03:42:49', '2026-04-30 03:42:49'),
(35, 'admin.consultorios.create', 'web', '2026-04-30 03:42:49', '2026-04-30 03:42:49'),
(36, 'admin.consultorios.store', 'web', '2026-04-30 03:42:49', '2026-04-30 03:42:49'),
(37, 'admin.consultorios.show', 'web', '2026-04-30 03:42:49', '2026-04-30 03:42:49'),
(38, 'admin.consultorios.edit', 'web', '2026-04-30 03:42:49', '2026-04-30 03:42:49'),
(39, 'admin.consultorios.update', 'web', '2026-04-30 03:42:49', '2026-04-30 03:42:49'),
(40, 'admin.consultorios.confirmDelete', 'web', '2026-04-30 03:42:49', '2026-04-30 03:42:49'),
(41, 'admin.consultorios.destroy', 'web', '2026-04-30 03:42:49', '2026-04-30 03:42:49'),
(42, 'admin.doctores.index', 'web', '2026-04-30 03:42:49', '2026-04-30 03:42:49'),
(43, 'admin.doctores.create', 'web', '2026-04-30 03:42:49', '2026-04-30 03:42:49'),
(44, 'admin.doctores.store', 'web', '2026-04-30 03:42:49', '2026-04-30 03:42:49'),
(45, 'admin.doctores.show', 'web', '2026-04-30 03:42:49', '2026-04-30 03:42:49'),
(46, 'admin.doctores.edit', 'web', '2026-04-30 03:42:49', '2026-04-30 03:42:49'),
(47, 'admin.doctores.update', 'web', '2026-04-30 03:42:49', '2026-04-30 03:42:49'),
(48, 'admin.doctores.confirmDelete', 'web', '2026-04-30 03:42:49', '2026-04-30 03:42:49'),
(49, 'admin.doctores.destroy', 'web', '2026-04-30 03:42:50', '2026-04-30 03:42:50'),
(50, 'admin.doctores.reportes', 'web', '2026-04-30 03:42:50', '2026-04-30 03:42:50'),
(51, 'admin.doctores.pdf', 'web', '2026-04-30 03:42:50', '2026-04-30 03:42:50'),
(52, 'admin.horarios.index', 'web', '2026-04-30 03:42:50', '2026-04-30 03:42:50'),
(53, 'admin.horarios.create', 'web', '2026-04-30 03:42:50', '2026-04-30 03:42:50'),
(54, 'admin.horarios.store', 'web', '2026-04-30 03:42:50', '2026-04-30 03:42:50'),
(55, 'admin.horarios.show', 'web', '2026-04-30 03:42:50', '2026-04-30 03:42:50'),
(56, 'admin.horarios.edit', 'web', '2026-04-30 03:42:50', '2026-04-30 03:42:50'),
(57, 'admin.horarios.update', 'web', '2026-04-30 03:42:50', '2026-04-30 03:42:50'),
(58, 'admin.horarios.confirmDelete', 'web', '2026-04-30 03:42:50', '2026-04-30 03:42:50'),
(59, 'admin.horarios.destroy', 'web', '2026-04-30 03:42:50', '2026-04-30 03:42:50'),
(60, 'admin.horarios.cargar_datos_consultorios', 'web', '2026-04-30 03:42:50', '2026-04-30 03:42:50'),
(61, 'cargar_datos_consultorios', 'web', '2026-04-30 03:42:50', '2026-04-30 03:42:50'),
(62, 'cargar_reserva_doctores', 'web', '2026-04-30 03:42:50', '2026-04-30 03:42:50'),
(63, 'ver_reservas', 'web', '2026-04-30 03:42:50', '2026-04-30 03:42:50'),
(64, 'admin.eventos.create', 'web', '2026-04-30 03:42:50', '2026-04-30 03:42:50'),
(65, 'admin.eventos.destroy', 'web', '2026-04-30 03:42:50', '2026-04-30 03:42:50'),
(66, 'admin.reservas.reportes', 'web', '2026-04-30 03:42:50', '2026-04-30 03:42:50'),
(67, 'admin.reservas.pdf', 'web', '2026-04-30 03:42:50', '2026-04-30 03:42:50'),
(68, 'admin.reservas.pdf_fechas', 'web', '2026-04-30 03:42:50', '2026-04-30 03:42:50'),
(69, 'admin.historiales.index', 'web', '2026-04-30 03:42:50', '2026-04-30 03:42:50'),
(70, 'admin.historiales.create', 'web', '2026-04-30 03:42:50', '2026-04-30 03:42:50'),
(71, 'admin.historiales.store', 'web', '2026-04-30 03:42:51', '2026-04-30 03:42:51'),
(72, 'admin.historiales.show', 'web', '2026-04-30 03:42:51', '2026-04-30 03:42:51'),
(73, 'admin.historiales.edit', 'web', '2026-04-30 03:42:51', '2026-04-30 03:42:51'),
(74, 'admin.historiales.update', 'web', '2026-04-30 03:42:51', '2026-04-30 03:42:51'),
(75, 'admin.historiales.confirmDelete', 'web', '2026-04-30 03:42:51', '2026-04-30 03:42:51'),
(76, 'admin.historiales.destroy', 'web', '2026-04-30 03:42:51', '2026-04-30 03:42:51'),
(77, 'admin.historiales.pdf', 'web', '2026-04-30 03:42:51', '2026-04-30 03:42:51'),
(78, 'admin.historiales.buscar_paciente', 'web', '2026-04-30 04:25:27', '2026-04-30 04:25:27'),
(79, 'admin.historiales.pdf_paciente', 'web', '2026-04-30 04:25:27', '2026-04-30 04:25:27'),
(80, 'admin.pagos.index', 'web', '2026-04-30 06:34:11', '2026-04-30 06:34:11'),
(81, 'admin.pagos.create', 'web', '2026-04-30 06:34:11', '2026-04-30 06:34:11'),
(82, 'admin.pagos.store', 'web', '2026-04-30 06:34:11', '2026-04-30 06:34:11'),
(83, 'admin.pagos.show', 'web', '2026-04-30 06:34:11', '2026-04-30 06:34:11'),
(84, 'admin.pagos.edit', 'web', '2026-04-30 06:34:11', '2026-04-30 06:34:11'),
(85, 'admin.pagos.update', 'web', '2026-04-30 06:34:11', '2026-04-30 06:34:11'),
(86, 'admin.pagos.confirmDelete', 'web', '2026-04-30 06:34:11', '2026-04-30 06:34:11'),
(87, 'admin.pagos.destroy', 'web', '2026-04-30 06:34:11', '2026-04-30 06:34:11'),
(88, 'admin.pagos.pdf', 'web', '2026-04-30 06:34:11', '2026-04-30 06:34:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2026-04-30 03:42:48', '2026-04-30 03:42:48'),
(2, 'secretaria', 'web', '2026-04-30 03:42:48', '2026-04-30 03:42:48'),
(3, 'doctor', 'web', '2026-04-30 03:42:48', '2026-04-30 03:42:48'),
(4, 'paciente', 'web', '2026-04-30 03:42:48', '2026-04-30 03:42:48'),
(5, 'usuario', 'web', '2026-04-30 03:42:48', '2026-04-30 03:42:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(77, 1),
(78, 1),
(79, 1),
(80, 1),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(85, 1),
(86, 1),
(87, 1),
(88, 1),
(26, 2),
(27, 2),
(28, 2),
(29, 2),
(30, 2),
(31, 2),
(32, 2),
(33, 2),
(34, 2),
(35, 2),
(36, 2),
(37, 2),
(38, 2),
(39, 2),
(40, 2),
(41, 2),
(42, 2),
(43, 2),
(44, 2),
(45, 2),
(46, 2),
(47, 2),
(48, 2),
(49, 2),
(50, 2),
(51, 2),
(52, 2),
(53, 2),
(54, 2),
(55, 2),
(56, 2),
(57, 2),
(58, 2),
(59, 2),
(60, 2),
(80, 2),
(81, 2),
(82, 2),
(83, 2),
(84, 2),
(85, 2),
(86, 2),
(87, 2),
(88, 2),
(69, 3),
(70, 3),
(71, 3),
(72, 3),
(73, 3),
(74, 3),
(75, 3),
(76, 3),
(77, 3),
(78, 3),
(79, 3),
(61, 5),
(62, 5),
(63, 5),
(64, 5),
(65, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secretarias`
--

DROP TABLE IF EXISTS `secretarias`;
CREATE TABLE IF NOT EXISTS `secretarias` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombres` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cc` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `celular` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_nacimiento` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `secretarias_cc_unique` (`cc`),
  KEY `secretarias_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `secretarias`
--

INSERT INTO `secretarias` (`id`, `nombres`, `apellidos`, `cc`, `celular`, `fecha_nacimiento`, `direccion`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Secretaria', '1', '111111', '7777777', '20/10/2000', 'Zona Miraflores calle 5', 2, '2026-04-30 03:42:51', '2026-04-30 03:42:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'admin@admin.com', NULL, '$2y$12$99GsAJHhI2VTbGYiByU4ReRrzUFl1/smepRuS2h2H0Q5aPr4ykTGm', NULL, '2026-04-30 03:42:51', '2026-04-30 03:42:51'),
(2, 'Secretaria', 'secretaria@admin.com', NULL, '$2y$12$2FobILiJw5XMh1sfKEHP/OFXt7vaTLqBEy.4JIl4VpKt8LUfDe9Ky', NULL, '2026-04-30 03:42:51', '2026-04-30 03:42:51'),
(3, 'Doctor1', 'doctor1@admin.com', NULL, '$2y$12$lkuXLuNr1./zViOXZfAuZ.42qq.dAAU1Zc475NaSL.WMCxu/f3TEW', NULL, '2026-04-30 03:42:51', '2026-04-30 03:42:51'),
(4, 'Doctor2', 'doctor2@admin.com', NULL, '$2y$12$FEl23XWubv65fVWuWlw3iOK37HTjY3u2xCujPo3Z8TWBbgm17NxMC', NULL, '2026-04-30 03:42:52', '2026-04-30 03:42:52'),
(5, 'Doctor3', 'doctor3@admin.com', NULL, '$2y$12$WizA0vnw8L2MzGkvugbkp.L0YjOKli7ZmlIJH86OaFVRDnT7paZm.', NULL, '2026-04-30 03:42:52', '2026-04-30 03:42:52'),
(6, 'Paciente1', 'paciente1@admin.com', NULL, '$2y$12$dcN0Z9GfbO0CpDCJcl80z.UfiK/a9j4lUQ0hx0q2lEmvaEgstt4BC', NULL, '2026-04-30 03:42:52', '2026-04-30 03:42:52'),
(7, 'Usuario1', 'usuario1@admin.com', NULL, '$2y$12$D.Gf6bQeBBrL1LTFneY5tOC9.P6ugkH5T8I5b1w2K.Wddj0/Ifr5G', NULL, '2026-04-30 03:42:52', '2026-04-30 03:42:52'),
(8, 'andres villamil', 'afvm2602@gmail.com', NULL, '$2y$12$AIyVznhy3IHYB5bwMOVy1OLwoSClnXjYlHxm8lJxYvn5btc2Fkl0q', NULL, '2026-04-30 07:12:05', '2026-04-30 07:12:05'),
(9, 'rochy melo', 'rochymelo1107@gmail.com', NULL, '$2y$12$ZJHKDt50N14LXeEPnOM4RuYUa0Myv0ZLY7qvOdg8w/BZA4D9XOikK', NULL, '2026-04-30 21:26:03', '2026-04-30 21:26:03');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_consultorio_id_foreign` FOREIGN KEY (`consultorio_id`) REFERENCES `consultorios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `events_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `events_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `historials`
--
ALTER TABLE `historials`
  ADD CONSTRAINT `historials_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE RESTRICT,
  ADD CONSTRAINT `historials_paciente_id_foreign` FOREIGN KEY (`paciente_id`) REFERENCES `pacientes` (`id`) ON DELETE RESTRICT;

--
-- Filtros para la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD CONSTRAINT `horarios_consultorio_id_foreign` FOREIGN KEY (`consultorio_id`) REFERENCES `consultorios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `horarios_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `pagos_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pagos_paciente_id_foreign` FOREIGN KEY (`paciente_id`) REFERENCES `pacientes` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `secretarias`
--
ALTER TABLE `secretarias`
  ADD CONSTRAINT `secretarias_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

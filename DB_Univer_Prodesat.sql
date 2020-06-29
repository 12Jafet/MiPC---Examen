-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 28-06-2020 a las 21:44:23
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `DB_Univer_Prodesat`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_alumnos`
--

CREATE TABLE `cat_alumnos` (
  `iCodigoAlumno` int(11) NOT NULL,
  `vchNombres` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vchApellidos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dtFechaNac` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cat_alumnos`
--

INSERT INTO `cat_alumnos` (`iCodigoAlumno`, `vchNombres`, `vchApellidos`, `dtFechaNac`, `created_at`, `updated_at`) VALUES
(7, 'Cristiano', 'Ronaldo', '1987-06-21', NULL, NULL),
(12, 'Jafet', 'Cruz', '1997-04-23', NULL, NULL),
(13, 'Rubén', 'González', '1997-05-29', NULL, NULL),
(20, 'Juan', 'Perez', '1992-02-10', NULL, NULL),
(24, 'Melina', 'Villa', '1996-03-20', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_materias`
--

CREATE TABLE `cat_materias` (
  `vchCodigoMateria` int(11) NOT NULL,
  `vchMateria` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cat_materias`
--

INSERT INTO `cat_materias` (`vchCodigoMateria`, `vchMateria`, `created_at`, `updated_at`) VALUES
(1, 'Programación', NULL, NULL),
(2, 'Matemáticas', NULL, NULL),
(3, 'Bases de datos', NULL, NULL),
(4, 'Física', NULL, NULL),
(5, 'Química', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_rel__alumno__materia`
--

CREATE TABLE `cat_rel__alumno__materia` (
  `iCodigoAlumno` int(11) NOT NULL,
  `vchCodigoMateria` int(11) NOT NULL,
  `fCalificacion` double(5,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cat_rel__alumno__materia`
--

INSERT INTO `cat_rel__alumno__materia` (`iCodigoAlumno`, `vchCodigoMateria`, `fCalificacion`, `created_at`, `updated_at`) VALUES
(7, 5, 82.00, '2020-06-29 02:25:50', '2020-06-29 02:25:50'),
(12, 4, NULL, '2020-06-29 02:26:12', '2020-06-29 02:26:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_06_26_230629_create_cat__alumnos_table', 1),
(4, '2020_06_26_230709_create_cat__materias_table', 1),
(5, '2020_06_26_232820_create_cat_rel__alumno__materia_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cat_alumnos`
--
ALTER TABLE `cat_alumnos`
  ADD PRIMARY KEY (`iCodigoAlumno`);

--
-- Indices de la tabla `cat_materias`
--
ALTER TABLE `cat_materias`
  ADD PRIMARY KEY (`vchCodigoMateria`);

--
-- Indices de la tabla `cat_rel__alumno__materia`
--
ALTER TABLE `cat_rel__alumno__materia`
  ADD KEY `cat_rel__alumno__materia_icodigoalumno_foreign` (`iCodigoAlumno`),
  ADD KEY `cat_rel__alumno__materia_vchcodigomateria_foreign` (`vchCodigoMateria`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cat_rel__alumno__materia`
--
ALTER TABLE `cat_rel__alumno__materia`
  ADD CONSTRAINT `cat_rel__alumno__materia_icodigoalumno_foreign` FOREIGN KEY (`iCodigoAlumno`) REFERENCES `cat_alumnos` (`iCodigoAlumno`),
  ADD CONSTRAINT `cat_rel__alumno__materia_vchcodigomateria_foreign` FOREIGN KEY (`vchCodigoMateria`) REFERENCES `cat_materias` (`vchCodigoMateria`);

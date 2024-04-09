-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-01-2023 a las 03:49:47
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `php_login_database`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `id_alumno` int(150) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `sexo` int(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `curp` varchar(150) NOT NULL,
  `grado` int(150) NOT NULL,
  `grupo` int(20) NOT NULL,
  `procede` varchar(150) NOT NULL,
  `ciudad_origen` varchar(50) NOT NULL,
  `situacion` int(50) NOT NULL,
  `estatus` int(50) NOT NULL,
  `regularizacion` date DEFAULT NULL,
  `repetidor` int(50) NOT NULL,
  `hermanos` int(50) NOT NULL,
  `jornada` int(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`id_alumno`, `nombre`, `sexo`, `email`, `curp`, `grado`, `grupo`, `procede`, `ciudad_origen`, `situacion`, `estatus`, `regularizacion`, `repetidor`, `hermanos`, `jornada`) VALUES
(1, 'Javier Montoya Perez', 1, 'montoya.javier.0522@gmail.com', 'MAROS4564ASDASD', 1, 1, 'Francisco I 0322', 'MEXICO', 1, 1, '2022-12-13', 1, 1, 1),
(5, 'Marcos Adrian Gonzales Garcia', 1, 'nieves@hotmail.com', 'Mopj812723', 2, 5, 'Francisco I 0322', 'Morelos', 0, 1, '0000-00-00', 1, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id_evento` int(50) NOT NULL,
  `evento` varchar(50) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id_evento`, `evento`, `fecha`) VALUES
(3, 'Dia del niño', '2022-05-24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastos`
--

CREATE TABLE `gastos` (
  `id_gasto` int(50) NOT NULL,
  `gasto` varchar(50) NOT NULL,
  `cantidad` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `gastos`
--

INSERT INTO `gastos` (`id_gasto`, `gasto`, `cantidad`) VALUES
(3, 'Gas', 45),
(4, 'Internet', 560),
(5, 'Internet', 560);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `id_docente` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `id_rubro` int(50) NOT NULL,
  `rubro` varchar(50) NOT NULL,
  `cantidad` int(50) NOT NULL,
  `comentarios` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`id_rubro`, `rubro`, `cantidad`, `comentarios`) VALUES
(8, 'Moscos', 8, NULL),
(9, 'Laptops', 9, NULL),
(15, 'Compus', 5, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `id_materia` int(50) NOT NULL,
  `id_docente` int(10) NOT NULL,
  `materia` varchar(255) NOT NULL,
  `materia2` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id_materia`, `id_docente`, `materia`, `materia2`) VALUES
(16, 56, 'Español <br>Segunda Lengua <br> Ciencias 1 <br>', ''),
(17, 58, 'Español <br>Segunda Lengua <br> ', ''),
(18, 56, 'Español <br>Matematicas 1 <br>Ciencias 1 <br>', ''),
(19, 56, 'Español <br>Ciencias 1 <br>Tecnologia', ''),
(20, 17, 'Español <br>Segunda Lengua <br> Matematicas 1 <br>Ciencias 1 <br>Tecnologia', ''),
(21, 56, 'Segunda Lengua <br> Matematicas 1 <br>', ''),
(22, 59, 'Español <br>Segunda Lengua <br> Matematicas 1 <br>', ''),
(23, 17, 'Español <br>Segunda Lengua <br> Matematicas 1 <br>Ciencias 1 <br>Tecnologia', ''),
(24, 17, 'Matematicas 1 <br>Ciencias 1 <br>', ''),
(25, 17, 'Español <br>Ciencias 1 <br>', ''),
(26, 95, 'Español <br>Matematicas 1 <br>', ''),
(27, 100, 'Español <br>Segunda Lengua <br> Ciencias 1 <br>Tecnologia', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `sexo` varchar(10) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `curp` varchar(60) DEFAULT NULL,
  `rfc` varchar(50) DEFAULT NULL,
  `estudios` text DEFAULT NULL,
  `ingreso` date DEFAULT NULL,
  `turno` int(50) DEFAULT NULL,
  `matutino` int(10) DEFAULT NULL,
  `vespertino` int(10) DEFAULT NULL,
  `primero` int(10) DEFAULT NULL,
  `segundo` int(10) DEFAULT NULL,
  `tercero` int(10) DEFAULT NULL,
  `rol` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `sexo`, `email`, `password`, `curp`, `rfc`, `estudios`, `ingreso`, `turno`, `matutino`, `vespertino`, `primero`, `segundo`, `tercero`, `rol`) VALUES
(17, 'Javier Montoya Perez', 'M', 'jmontoyap001@alumno.uaemex.mx', '$2y$10$7BUICAe9Tmc.1K8uBIZ9iuJa7o72pSE/EbcLz5Apc6M9604S05S5G', 'MOPV870512FMCNRV09', 'MOPJ990716H', 'Doctorado', '2013-01-08', 0, 1, 1, 1, 2, 3, 3),
(100, 'Jessica Perez Sequeda', 'F', 'jessi@hotmail.com', '$2y$10$GzclIEeY.E2xCzZy93pt/eAy3JsYcQL8XITpIiYTjmUnYUvYxQJXy', 'MOPJ990716HMCNRV08', 'MOPJ990716HMCNRV09', 'Licenciatura', '2023-01-11', NULL, 1, NULL, NULL, 2, NULL, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`id_alumno`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id_evento`);

--
-- Indices de la tabla `gastos`
--
ALTER TABLE `gastos`
  ADD PRIMARY KEY (`id_gasto`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id_rubro`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id_materia`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `id_alumno` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id_evento` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `gastos`
--
ALTER TABLE `gastos`
  MODIFY `id_gasto` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id_rubro` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `id_materia` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

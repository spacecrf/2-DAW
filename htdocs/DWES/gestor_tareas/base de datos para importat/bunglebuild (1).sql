-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-11-2025 a las 14:01:42
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bunglebuild`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE `tareas` (
  `id` int(11) NOT NULL,
  `nif_cif` varchar(15) NOT NULL,
  `persona_contacto` varchar(100) NOT NULL,
  `telefono_contacto` varchar(20) DEFAULT NULL,
  `descripcion` text NOT NULL,
  `correo_contacto` varchar(100) NOT NULL,
  `direccion` text DEFAULT NULL,
  `poblacion` varchar(100) DEFAULT NULL,
  `codigo_postal` char(5) DEFAULT NULL,
  `provincia` int(11) DEFAULT NULL,
  `estado` char(1) DEFAULT 'B',
  `fecha_creacion` datetime DEFAULT current_timestamp(),
  `operario_encargado` varchar(100) DEFAULT NULL,
  `fecha_realizacion` date DEFAULT NULL,
  `anotaciones_anteriores` text DEFAULT NULL,
  `anotaciones_posteriores` text DEFAULT NULL,
  `fichero_resumen` varchar(255) DEFAULT NULL,
  `fotos` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`id`, `nif_cif`, `persona_contacto`, `telefono_contacto`, `descripcion`, `correo_contacto`, `direccion`, `poblacion`, `codigo_postal`, `provincia`, `estado`, `fecha_creacion`, `operario_encargado`, `fecha_realizacion`, `anotaciones_anteriores`, `anotaciones_posteriores`, `fichero_resumen`, `fotos`) VALUES
(5, '49395529Q', 'Manuel', '639005756', 'Adios', 'mg@gmail.com', 'MURILLO N26', 'BOLLULLOS CDO', '21710', 21, 'P', '2025-11-19 09:52:29', 'mko', '2025-11-22', 'aa', NULL, '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

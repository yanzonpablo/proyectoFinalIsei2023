-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-06-2023 a las 15:41:43
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `capacitacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `afiliados`
--

CREATE TABLE `afiliados` (
  `id` int(10) NOT NULL,
  `telefono` varchar(12) COLLATE utf8mb4_spanish_ci NOT NULL,
  `dni` int(10) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `direccion` varchar(120) COLLATE utf8mb4_spanish_ci NOT NULL,
  `codigo_postal` int(10) NOT NULL,
  `id_provincia` int(10) NOT NULL,
  `fecha_alta` date NOT NULL,
  `afiliado_activo` int(1) NOT NULL,
  `id_camara` int(10) NOT NULL,
  `id_ciudad` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `camaras`
--

CREATE TABLE `camaras` (
  `id` int(10) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `logo_camara` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `telefono` varchar(12) COLLATE utf8mb4_spanish_ci NOT NULL,
  `direccion` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `codigo_postal` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL,
  `provincia` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `email` varchar(120) COLLATE utf8mb4_spanish_ci NOT NULL,
  `web` varchar(120) COLLATE utf8mb4_spanish_ci NOT NULL,
  `camara_cancelada` int(1) NOT NULL DEFAULT 0,
  `fecha_alta` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `camaras`
--

INSERT INTO `camaras` (`id`, `nombre`, `descripcion`, `logo_camara`, `telefono`, `direccion`, `codigo_postal`, `provincia`, `email`, `web`, `camara_cancelada`, `fecha_alta`) VALUES
(119, 'FECHACO', 'FEDERACIÓN ECONÓMICA DEL CHACO', 'IMG-6494373354aa74.54298394.jpg', '03624435536', 'Juan Domingo Perón 111', '3506', 'Chaco', 'gerencia@fechaco.org', 'http://fechaco.org/', 0, '2023-06-22 11:57:39'),
(120, 'AMA', 'ASOCIACIÓN MECÁNICOS Y AFINES', 'IMG-649437efcad881.59196698.jpg', '034041564176', 'Islas Malvinas 441', '3013', 'Santa Fe', 'amasancarlos@hotmail.com', 'http://www.amasancarlos.com.ar', 0, '2023-06-22 12:00:47'),
(121, 'AMUPTRA', 'ASOCIACIÓN MUTUAL DE PROPIETARIOS DE TALLERES DE REPARACIÓN DE AUTOMOTORES', 'IMG-6494386698f584.99419884.jpg', '3513021357', ' Italia 2472', '5000', 'Córdoba', 'amuptra@hotmail.com', 'www.amuptra.org.ar', 0, '2023-06-22 12:02:46'),
(122, 'APROTAME', 'ASOCIACIÓN DE PROPIETARIOS DE TALLERES MECÁNICOS Y AFINES', 'IMG-64943913a489c3.47308014.jpg', '034921550779', 'Aristóbulo del Valle 1036', '2300', 'Santa Fe', 'osvaldodcardoso@hotmail.es', 'www.aprotame.org.ar', 0, '2023-06-22 12:05:39'),
(123, 'APTA', 'ASOCIACIÓN PROPIETARIOS DE TALLERES DE REPARACIÓN DE AUTOMOTORES DE ZONA NORTE', 'IMG-6494399f4cf6a2.41109247.jpg', '01147560694', ' Sargento Cabral 3431', '1605', 'Buenos Aires', 'aptazonanorte@yahoo.com.ar', 'www.aptazonanorte.org.ar', 0, '2023-06-22 12:07:59'),
(124, 'APTMA', 'ASOCIACIÓN DE PROPIETARIOS DE TALLERES MECÁNICOS DE AUTOMOTORES Y AFINES', 'IMG-64943a274ecde6.03670357.jpg', '3424601185', 'Padre Genesio 151', '3000', 'Santa Fe', 'aptmasantafe@gmail.com', 'www.mecanicosunidos.com.ar', 0, '2023-06-22 12:10:15'),
(125, 'APTRA', 'ASOCIACIÓN PROPIETARIOS DE TALLERES RAMO AUTOMOTOR', 'IMG-64943ac3bdb396.30253018.jpg', '03814243044', 'General Simón Bolívar 1637', '4000', 'Tucumán', 'aptra1973@hotmail.com', 'www.aptratucuman.org', 0, '2023-06-22 12:12:51'),
(126, 'ATA', 'ASOCIACIÓN TALLERISTAS AUTOMOTORES DE PARANÁ', 'IMG-64943b28f3ada0.68503201.jpg', '03434075243', 'Amancio Alcorta 564', '3100', 'Entre Rios', 'ataparana@gmail.com', 'www.ataparana.org', 0, '2023-06-22 12:14:32'),
(127, 'ATAM', 'ASOCIACIÓN TALLERISTAS AUTOMOTORES MARPLATENSES', 'IMG-64943b93c332d6.33522103.jpg', '02234822618', 'Florencio Sanchez 28', '7600', 'Buenos Aires', 'atam-mdp@hotmail.com', 'www.atam-mdp.com.ar', 0, '2023-06-22 12:16:19'),
(128, 'ATASAN', 'ASOCIACIÓN TALLERES Y AFINES SAN NICOLÁS', 'IMG-64943c227aaae3.31400630.jpg', '03364437034', 'España 602', '2900', 'Buenos Aires', 'atasancamara@hotmail.com', 'www.atasan.com.ar', 0, '2023-06-22 12:18:42'),
(129, 'ATGS', 'ASOCIACIÓN DE TALLERISTAS GENERAL SARMIENTO', 'IMG-64943c8d4687f5.96516723.jpg', '01144516808', 'Vicente López 2792', '1663', 'Buenos Aires', 'atgs2006@yahoo.com.ar', 'www.atgs.com.ar', 0, '2023-06-22 12:20:29'),
(130, 'ATRAANES', 'ASOCIACIÓN DE TALLERES REPARADORES DE AUTOMOTORES', 'IMG-64943d18048ce6.58695929.jpg', '03482552513', 'Calle 20 N°1028', '3560', 'Santa Fe', 'atraanes@gmail.com', 'www.atraanes.com.ar', 0, '2023-06-22 12:22:48'),
(131, 'ATRAR', 'ASOCIACIÓN TALLERES REPARACIONES DE AUTOMOTORES Y AFINES DE ROSARIO', 'IMG-64943e1dd6aa21.01677416.jpg', '03414400388', 'Montevideo 1060', '2000', 'Santa Fe', 'atrar@atrar.org.ar', 'www.atrar.org.ar', 0, '2023-06-22 12:27:09'),
(132, 'CMSL', 'CAMARA  DE TALLERES DE REPARACIONES DE AUTOMOTORES Y AFINES DE SAN LUIS', 'IMG-64943e901f0557.67999326.jpeg', '026571560267', 'Av. 25 De Mayo 795', '5700', 'San Luis', 'camaramecanicossl@gmail.com', 'www.camaramecanicossl.com', 0, '2023-06-22 12:29:04'),
(133, 'CRA', 'CÁMARA DE RECTIFICACIÓN AUTOMOTRIZ', 'IMG-64943f79907675.85251914.jpg', '01149416666', 'Cochabamba 2774', '1252', 'Buenos Aires', 'camararectificacion@fibertel.com.ar', 'http://camararectificacion.org/', 0, '2023-06-22 12:32:57'),
(134, 'CRABB', 'CÁMARA DE REPARACIÓN DE AUTOMOTORES DE BAHÍA BLANCA', 'IMG-64943fef3f9c97.77789383.jpg', '029115440270', 'Güemes 524', '8000', 'Buenos Aires', 'crabahiablanca@gmail.com', 'www.crabb.org.ar', 0, '2023-06-22 12:34:55'),
(135, 'CTAC', 'CENTRO DE TALLERISTAS DE AUTOMOTORES CONCORDIA', 'IMG-6494404d40c6b1.72213099.jpg', '03454273091', 'Teniente Ibañez 938', '3200', 'Entre Rios', 'centrotalleresconcordia@gmail.com', 'www.centrotalleresconcordia.org.ar', 0, '2023-06-22 12:36:29'),
(136, 'UPTMA', 'UNIÓN PROPIETARIOS DE TALLERES MECÁNICOS DE AUTOMÓVILES', 'IMG-649440acbe4536.43446318.jpg', '01149429942', 'Adolfo Alsina 2540', '1000', 'Buenos Aires', 'unionpropietarios@uptma.org.ar', 'www.uptma.org.ar', 0, '2023-06-22 12:38:04'),
(137, 'UTMA', 'UNIÓN TALLERES MECÁNICOS Y ANEXOS ZONA CUYO', 'IMG-6494411f072da5.63709780.jpg', '2614311061', 'Dorrego 841', '5500', 'Mendoza', 'utmamendoza@gmail.com', 'www.utma.weebly.com', 0, '2023-06-22 12:39:59'),
(138, 'FAATRA', 'FEDERACIÓN ARGENTINA DE ASOCIACIÓN DE TALLERES DE REPARACIÓN DE AUTOMOTORES Y AFINES', 'IMG-649441c9311556.70132713.png', '03414810047', 'La Paz 1864', '2000', 'Santa Fe', 'info@faatra.org.ar', 'www.faatra.org.ar', 0, '2023-06-22 12:42:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capacitadores`
--

CREATE TABLE `capacitadores` (
  `id` int(10) NOT NULL,
  `nombre` varchar(120) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellido` varchar(120) COLLATE utf8mb4_spanish_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `descripcion` varchar(1000) COLLATE utf8mb4_spanish_ci NOT NULL,
  `cuil_cuit` int(10) NOT NULL,
  `telefono` varchar(12) COLLATE utf8mb4_spanish_ci NOT NULL,
  `direccion` varchar(120) COLLATE utf8mb4_spanish_ci NOT NULL,
  `codigo_postal` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL,
  `email` varchar(120) COLLATE utf8mb4_spanish_ci NOT NULL,
  `empresa` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha_alta` date NOT NULL,
  `fecha_baja` date NOT NULL,
  `id_camara` int(10) NOT NULL,
  `id_provincia` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `certificados`
--

CREATE TABLE `certificados` (
  `id` int(10) NOT NULL,
  `asistencia` int(10) NOT NULL,
  `aprobado` int(10) NOT NULL,
  `id_curso` int(10) NOT NULL,
  `id_usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(120) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nivel_curso` int(1) NOT NULL,
  `descripcion` varchar(1000) COLLATE utf8mb4_spanish_ci NOT NULL,
  `carga_horaria` int(10) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `publicacion` int(1) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `id_capacitador` int(10) NOT NULL,
  `id_inscripcion` int(10) NOT NULL,
  `id_modalidad` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos_ofrecidos`
--

CREATE TABLE `cursos_ofrecidos` (
  `id` int(10) NOT NULL,
  `id_curso` int(10) NOT NULL,
  `id_camara` int(10) NOT NULL,
  `id_capacitador` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entidades`
--

CREATE TABLE `entidades` (
  `id` int(10) NOT NULL,
  `fecha_alta` date NOT NULL,
  `id_curso` int(10) NOT NULL,
  `id_afiliado` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripciones`
--

CREATE TABLE `inscripciones` (
  `id` int(10) NOT NULL,
  `fecha_inscripcion` date NOT NULL,
  `id_usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modalidades`
--

CREATE TABLE `modalidades` (
  `id` int(10) NOT NULL,
  `modalidad` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_curso` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `modalidades`
--

INSERT INTO `modalidades` (`id`, `modalidad`, `id_curso`) VALUES
(4, 'On-line', 0),
(5, 'Mixta', 0),
(7, 'Presencial', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `newsletters`
--

CREATE TABLE `newsletters` (
  `id` int(10) NOT NULL,
  `email` varchar(120) COLLATE utf8mb4_spanish_ci NOT NULL,
  `baja` int(1) NOT NULL,
  `fecha_alta` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `newsletters`
--

INSERT INTO `newsletters` (`id`, `email`, `baja`, `fecha_alta`) VALUES
(3, 'pablo@algo.com', 0, '2023-06-19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `niveles_cursos`
--

CREATE TABLE `niveles_cursos` (
  `id` int(10) NOT NULL,
  `nivel` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `carga_horaria` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `sub_indice` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `niveles_cursos`
--

INSERT INTO `niveles_cursos` (`id`, `nivel`, `carga_horaria`, `sub_indice`) VALUES
(1, 'Perfeccionamiento profesional', '12 Horas', 2),
(2, 'Perfeccionamiento no profesional', '12 Horas', 2),
(3, 'Charla Técnica', '3 Horas', 3),
(4, 'Presentación comercial', '3 Horas', 3),
(5, 'Curso Base', '60 Horas', 1),
(6, 'Inclusión social', '60 Horas', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE `provincias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `provincias`
--

INSERT INTO `provincias` (`id`, `nombre`) VALUES
(1, 'Santa Fe'),
(2, 'Buenos Aires'),
(3, 'Corrientes'),
(4, 'Chaco'),
(5, 'San Luis'),
(6, 'La Rioja'),
(7, 'Catamarca'),
(8, 'Córdoba'),
(9, 'Entre Rios'),
(10, 'Catamarca'),
(11, 'Jujuy'),
(12, 'Tierra del Fuego'),
(13, 'Santa Cruz'),
(14, 'Neuquén'),
(15, 'Rio Negro'),
(16, 'Formosa'),
(17, 'Misiones'),
(18, 'Chubut'),
(19, 'La Pampa'),
(20, 'Mendoza'),
(21, 'San Juan'),
(22, 'Salta'),
(23, 'Santiago del Estero'),
(24, 'Tucumán');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellido` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `password` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha_alta` date NOT NULL,
  `rol_usuario` int(1) NOT NULL,
  `id_afiliados` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `afiliados`
--
ALTER TABLE `afiliados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_camara` (`id_camara`),
  ADD KEY `id_ciudad` (`id_ciudad`),
  ADD KEY `id_ciudad_2` (`id_ciudad`),
  ADD KEY `id_provincia` (`id_provincia`),
  ADD KEY `id_ciudad_3` (`id_ciudad`);

--
-- Indices de la tabla `camaras`
--
ALTER TABLE `camaras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `capacitadores`
--
ALTER TABLE `capacitadores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_camara` (`id_camara`),
  ADD KEY `id_provincia` (`id_provincia`);

--
-- Indices de la tabla `certificados`
--
ALTER TABLE `certificados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_curso` (`id_curso`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_capacitador` (`id_capacitador`),
  ADD KEY `id_inscripcion` (`id_inscripcion`),
  ADD KEY `id_modalidad` (`id_modalidad`);

--
-- Indices de la tabla `cursos_ofrecidos`
--
ALTER TABLE `cursos_ofrecidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_curso` (`id_curso`),
  ADD KEY `id camara` (`id_camara`),
  ADD KEY `id_capacitador` (`id_capacitador`);

--
-- Indices de la tabla `entidades`
--
ALTER TABLE `entidades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_curso` (`id_curso`),
  ADD KEY `id_afiliado` (`id_afiliado`);

--
-- Indices de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `modalidades`
--
ALTER TABLE `modalidades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_curso` (`id_curso`);

--
-- Indices de la tabla `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `niveles_cursos`
--
ALTER TABLE `niveles_cursos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_inscripto` (`id_afiliados`),
  ADD KEY `id_inscripto_2` (`id_afiliados`),
  ADD KEY `id_afiliados` (`id_afiliados`),
  ADD KEY `id_afiliados_2` (`id_afiliados`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `afiliados`
--
ALTER TABLE `afiliados`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `camaras`
--
ALTER TABLE `camaras`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT de la tabla `capacitadores`
--
ALTER TABLE `capacitadores`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `certificados`
--
ALTER TABLE `certificados`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cursos_ofrecidos`
--
ALTER TABLE `cursos_ofrecidos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `entidades`
--
ALTER TABLE `entidades`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `modalidades`
--
ALTER TABLE `modalidades`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `niveles_cursos`
--
ALTER TABLE `niveles_cursos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `provincias`
--
ALTER TABLE `provincias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `afiliados`
--
ALTER TABLE `afiliados`
  ADD CONSTRAINT `afiliados_ibfk_2` FOREIGN KEY (`id_provincia`) REFERENCES `provincias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `capacitadores`
--
ALTER TABLE `capacitadores`
  ADD CONSTRAINT `capacitadores_ibfk_2` FOREIGN KEY (`id_provincia`) REFERENCES `provincias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `certificados`
--
ALTER TABLE `certificados`
  ADD CONSTRAINT `certificados_ibfk_1` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `certificados_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `cursos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cursos_ibfk_2` FOREIGN KEY (`id_inscripcion`) REFERENCES `inscripciones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cursos_ibfk_3` FOREIGN KEY (`id_capacitador`) REFERENCES `capacitadores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cursos_ibfk_4` FOREIGN KEY (`id_modalidad`) REFERENCES `modalidades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cursos_ofrecidos`
--
ALTER TABLE `cursos_ofrecidos`
  ADD CONSTRAINT `cursos_ofrecidos_ibfk_3` FOREIGN KEY (`id_capacitador`) REFERENCES `capacitadores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `entidades`
--
ALTER TABLE `entidades`
  ADD CONSTRAINT `entidades_ibfk_1` FOREIGN KEY (`id_afiliado`) REFERENCES `afiliados` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `entidades_ibfk_2` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD CONSTRAINT `inscripciones_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_afiliados`) REFERENCES `afiliados` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

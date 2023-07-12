-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-07-2023 a las 21:30:28
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
  `id_provincia` int(2) NOT NULL,
  `fecha_alta` date NOT NULL DEFAULT current_timestamp(),
  `id_usuario` int(10) NOT NULL,
  `afiliado_activo` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `afiliados`
--

INSERT INTO `afiliados` (`id`, `telefono`, `dni`, `fecha_nacimiento`, `direccion`, `codigo_postal`, `id_provincia`, `fecha_alta`, `id_usuario`, `afiliado_activo`) VALUES
(17, '3453453', 0, '1970-01-01', 'asdfasdfas werqwe', 234234, 1, '2023-07-05', 0, 1);

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
  `facebook` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `instagram` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `camara_cancelada` int(1) NOT NULL DEFAULT 0,
  `fecha_alta` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `camaras`
--

INSERT INTO `camaras` (`id`, `nombre`, `descripcion`, `logo_camara`, `telefono`, `direccion`, `codigo_postal`, `provincia`, `email`, `web`, `facebook`, `instagram`, `camara_cancelada`, `fecha_alta`) VALUES
(119, 'FECHACO', 'FEDERACIÓN ECONÓMICA DEL CHACO', 'IMG-6494373354aa74.54298394.jpg', '03624435536', 'Juan Domingo Perón 111', '3506', 'Chaco', 'gerencia@fechaco.org', 'http://fechaco.org/', '', '', 0, '2023-06-22 11:57:39'),
(120, 'AMA', 'ASOCIACIÓN MECÁNICOS Y AFINES', 'IMG-649437efcad881.59196698.jpg', '034041564176', 'Islas Malvinas 441', '3013', 'Santa Fe', 'amasancarlos@hotmail.com', 'http://www.amasancarlos.com.ar', '', '', 0, '2023-06-22 12:00:47'),
(121, 'AMUPTRA', 'ASOCIACIÓN MUTUAL DE PROPIETARIOS DE TALLERES DE REPARACIÓN DE AUTOMOTORES', 'IMG-6494386698f584.99419884.jpg', '3513021357', ' Italia 2472', '5000', 'Córdoba', 'amuptra@hotmail.com', 'www.amuptra.org.ar', '', '', 0, '2023-06-22 12:02:46'),
(122, 'APROTAME', 'ASOCIACIÓN DE PROPIETARIOS DE TALLERES MECÁNICOS Y AFINES', 'IMG-64943913a489c3.47308014.jpg', '034921550779', 'Aristóbulo del Valle 1036', '2300', 'Santa Fe', 'osvaldodcardoso@hotmail.es', 'www.aprotame.org.ar', '', '', 0, '2023-06-22 12:05:39'),
(123, 'APTA', 'ASOCIACIÓN PROPIETARIOS DE TALLERES DE REPARACIÓN DE AUTOMOTORES DE ZONA NORTE', 'IMG-6494399f4cf6a2.41109247.jpg', '01147560694', ' Sargento Cabral 3431', '1605', 'Buenos Aires', 'aptazonanorte@yahoo.com.ar', 'www.aptazonanorte.org.ar', '', '', 0, '2023-06-22 12:07:59'),
(124, 'APTMA', 'ASOCIACIÓN DE PROPIETARIOS DE TALLERES MECÁNICOS DE AUTOMOTORES Y AFINES', 'IMG-64943a274ecde6.03670357.jpg', '3424601185', 'Padre Genesio 151', '3000', 'Santa Fe', 'aptmasantafe@gmail.com', 'www.mecanicosunidos.com.ar', '', '', 0, '2023-06-22 12:10:15'),
(125, 'APTRA', 'ASOCIACIÓN PROPIETARIOS DE TALLERES RAMO AUTOMOTOR', 'IMG-64943ac3bdb396.30253018.jpg', '03814243044', 'General Simón Bolívar 1637', '4000', 'Tucumán', 'aptra1973@hotmail.com', 'www.aptratucuman.org', '', '', 0, '2023-06-22 12:12:51'),
(126, 'ATA', 'ASOCIACIÓN TALLERISTAS AUTOMOTORES DE PARANÁ', 'IMG-64943b28f3ada0.68503201.jpg', '03434075243', 'Amancio Alcorta 564', '3100', 'Entre Rios', 'ataparana@gmail.com', 'www.ataparana.org', '', '', 0, '2023-06-22 12:14:32'),
(127, 'ATAM', 'ASOCIACIÓN TALLERISTAS AUTOMOTORES MARPLATENSES', 'IMG-64943b93c332d6.33522103.jpg', '02234822618', 'Florencio Sanchez 28', '7600', 'Buenos Aires', 'atam-mdp@hotmail.com', 'www.atam-mdp.com.ar', '', '', 0, '2023-06-22 12:16:19'),
(128, 'ATASAN', 'ASOCIACIÓN TALLERES Y AFINES SAN NICOLÁS', 'IMG-64943c227aaae3.31400630.jpg', '03364437034', 'España 602', '2900', 'Buenos Aires', 'atasancamara@hotmail.com', 'www.atasan.com.ar', '', '', 0, '2023-06-22 12:18:42'),
(129, 'ATGS', 'ASOCIACIÓN DE TALLERISTAS GENERAL SARMIENTO', 'IMG-64943c8d4687f5.96516723.jpg', '01144516808', 'Vicente López 2792', '1663', 'Buenos Aires', 'atgs2006@yahoo.com.ar', 'www.atgs.com.ar', '', '', 0, '2023-06-22 12:20:29'),
(130, 'ATRAANES', 'ASOCIACIÓN DE TALLERES REPARADORES DE AUTOMOTORES', 'IMG-64943d18048ce6.58695929.jpg', '03482552513', 'Calle 20 N°1028', '3560', 'Santa Fe', 'atraanes@gmail.com', 'www.atraanes.com.ar', '', '', 0, '2023-06-22 12:22:48'),
(131, 'ATRAR', 'ASOCIACIÓN TALLERES REPARACIONES DE AUTOMOTORES Y AFINES DE ROSARIO', 'IMG-64943e1dd6aa21.01677416.jpg', '03414400388', 'Montevideo 1060', '2000', 'Santa Fe', 'atrar@atrar.org.ar', 'www.atrar.org.ar', '', '', 0, '2023-06-22 12:27:09'),
(132, 'CMSL', 'CAMARA  DE TALLERES DE REPARACIONES DE AUTOMOTORES Y AFINES DE SAN LUIS', 'IMG-64943e901f0557.67999326.jpeg', '026571560267', 'Av. 25 De Mayo 795', '5700', 'San Luis', 'camaramecanicossl@gmail.com', 'www.camaramecanicossl.com', '', '', 0, '2023-06-22 12:29:04'),
(133, 'CRA', 'CÁMARA DE RECTIFICACIÓN AUTOMOTRIZ', 'IMG-64943f79907675.85251914.jpg', '01149416666', 'Cochabamba 2774', '1252', 'Buenos Aires', 'camararectificacion@fibertel.com.ar', 'http://camararectificacion.org/', '', '', 0, '2023-06-22 12:32:57'),
(134, 'CRABB', 'CÁMARA DE REPARACIÓN DE AUTOMOTORES DE BAHÍA BLANCA', 'IMG-64943fef3f9c97.77789383.jpg', '029115440270', 'Güemes 524', '8000', 'Buenos Aires', 'crabahiablanca@gmail.com', 'www.crabb.org.ar', '', '', 0, '2023-06-22 12:34:55'),
(135, 'CTAC', 'CENTRO DE TALLERISTAS DE AUTOMOTORES CONCORDIA', 'IMG-6494404d40c6b1.72213099.jpg', '03454273091', 'Teniente Ibañez 938', '3200', 'Entre Rios', 'centrotalleresconcordia@gmail.com', 'www.centrotalleresconcordia.org.ar', '', '', 0, '2023-06-22 12:36:29'),
(136, 'UPTMA', 'UNIÓN PROPIETARIOS DE TALLERES MECÁNICOS DE AUTOMÓVILES', 'IMG-649440acbe4536.43446318.jpg', '01149429942', 'Adolfo Alsina 2540', '1000', 'Buenos Aires', 'unionpropietarios@uptma.org.ar', 'www.uptma.org.ar', '', '', 0, '2023-06-22 12:38:04'),
(137, 'UTMA', 'UNIÓN TALLERES MECÁNICOS Y ANEXOS ZONA CUYO', 'IMG-6494411f072da5.63709780.jpg', '2614311061', 'Dorrego 841', '5500', 'Mendoza', 'utmamendoza@gmail.com', 'www.utma.weebly.com', '', '', 0, '2023-06-22 12:39:59'),
(138, 'FAATRA', 'FEDERACIÓN ARGENTINA DE ASOCIACIÓN DE TALLERES DE REPARACIÓN DE AUTOMOTORES Y AFINES', 'IMG-649441c9311556.70132713.png', '03414810047', 'La Paz 1864', '2000', 'Santa Fe', 'info@faatra.org.ar', 'www.faatra.org.ar', '', '', 0, '2023-06-22 12:42:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capacitadores`
--

CREATE TABLE `capacitadores` (
  `id` int(10) NOT NULL,
  `nombre` varchar(120) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellido` varchar(120) COLLATE utf8mb4_spanish_ci NOT NULL,
  `cuil_cuit` int(11) NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT 'usersNone.png',
  `telefono` varchar(12) COLLATE utf8mb4_spanish_ci NOT NULL,
  `direccion` varchar(120) COLLATE utf8mb4_spanish_ci NOT NULL,
  `codigo_postal` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL,
  `email` varchar(120) COLLATE utf8mb4_spanish_ci NOT NULL,
  `especialidad` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `descripcion` varchar(1000) COLLATE utf8mb4_spanish_ci NOT NULL,
  `provincia` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha_alta` date NOT NULL DEFAULT current_timestamp(),
  `fecha_baja` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `capacitadores`
--

INSERT INTO `capacitadores` (`id`, `nombre`, `apellido`, `cuil_cuit`, `imagen`, `telefono`, `direccion`, `codigo_postal`, `email`, `especialidad`, `descripcion`, `provincia`, `fecha_alta`, `fecha_baja`) VALUES
(10, 'Alejandro', 'Berbetoros', 2030404659, 'IMG-64a0e445f028c7.10791201.jpg', '3414595987', 'La paz 1864', '2000', 'berbetoros@gmail.com', 'Inyección Electrónica', ' Docente argentino recibido para dar clases en EGB 1 y 2. Luego de años dedicados a la docencia decidió retomar el oficio de cerrajero que heredó de su padre y comenzó a capacitarse, orientándose al rubro de la cerrajería automotriz.\r\n\r\nObtuvo capacitaciones en inmovilizadores electrónicos, instalación de alarmas, instalación de estéreos y accesorios, diagnóstico y procedimientos de inmovilizadores electrónicos, inyección electrónica, procedimientos de inmovilizadores para cerrajeros y desbloqueo de centrales electrónicas.             ', 'Santa Fe', '2023-06-27', '0000-00-00'),
(11, 'Martin', 'Desiveri', 2147483647, 'IMG-649acfa8da0ae5.14453762.jpg', '034041564176', 'Santa Fe 12', '1016', 'martin@gmail.com', 'Mecánica Gral.', ' Ingenierio electrónico argentino recibido en la Universidad Nacional de Rosario. Se desempeña en su propio taller y laboratorio de ingeniería automotriz POWERINYECTION.\r\n\r\nAdemás de sus conocimientos en el rubro automotriz cuenta con tecnicaturas en Reparación de PCs y Reparación de Redes Informáticas.\r\n\r\n', 'Buenos Aires', '2023-06-27', '0000-00-00'),
(12, 'Leandro Facundo', 'Garcia', 2147483647, 'IMG-649ad012e2f289.81292554.jpg', '3415645665', 'Laprida 1235', '1017', 'carlos@gmail.com', 'Transmisión Robotizada', ' Instructor argentino con 11 años de experiencia. Brindando  capacitaciones de Ford Motor Company y General Motors Argentina.\r\n\r\nSe desempeñó como capacitador para empresas como, “SECCO auto elevadores y grúas” y “Norauto” en capacitaciones de aire acondicionado y mantenimiento.\r\n\r\nTambién brindó seminarios WEB para GM Latinoamérica en Chile, Perú, Bolivia y Colombia.\r\n\r\nContinúa trabajando en su propio taller ofreciendo diagnósticos y soluciones a sus clientes.\r\n\r\nDesde el año 2020 se incorpora a CEA ELECTRONICA AUTOMOTRIZ como instructor y referente de FORD Y GENERAL MOTORS.\r\n\r\n', 'Buenos Aires', '2023-06-27', '0000-00-00'),
(13, 'Tilso ', 'Castro', 2147483647, 'IMG-649ad0639f1a04.82306375.png', '3425987456', 'San Martin 2356', '1017', 'tilso@gmail', 'AIRBAG Y ABS', ' El ingeniero Tilso Castro es instructor internacional en tecnologías Automotrices desde el año 2005.\r\nImparte entrenamiento en los siguientes países, Colombia, Ecuador, Bolivia, Argentina, Guatemala, Panamá, Costa Rica, Colombia, Perú, Estados Unidos, México, Venezuela, República Dominicana, Haiti, Canadá, Chile y Colombia, entre otros.\r\n\r\nAcumula más de 40.000 horas como instructor en tecnologías automotrices con presencia en todo el continente , también sirve como colaborador para eventos en Europa.\r\n\r\nSu especialidad e brindar capacitaciones en nuevas tecnologías Automotrices, dentro de sus cursos se encuentran temas desde el sistema de control electrónico en vehículos diésel y gasolina, hasta sistemas de control electrónico avanzado, multiplexado y reparación de computadoras.\r\n\r\nHa trabajado en proyectos con empresas del sector, como son Caterpillar, General Motors, Ford Motor, Instituto Cea Costa Rica, Confederación Nacional de Talleres México, Dimauto Tools, Autosoporte, Autoava', 'Buenos Aires', '2023-06-27', '0000-00-00'),
(23, 'Jorge', 'Desiervi', 2147483647, 'IMG-649ddc25454015.02821007.jpg', '034041564176', 'Padre Genesio 151', '1016', 'amasancarlos@hotmail.com', 'Electrónica', ' Nacido en Capital Federal en 1959 comenzó su trabajo en talleres de reparación mecánica de automóviles a los 9 años. Tiempo después abrió su propio taller en la cochera de la casa de sus padres donde hacía afinados y demás trabajos mecánicos. Luego se especializó en carburadores y a partir de ahí ya comenzó a perfeccionarse con teoría a través de los estudios.\r\n\r\nTécnico nacional en automotores recibido en el año 1977. Trabajó en concesionarios Fiat donde en 1 año llego a ser gerente de Servicios haciendo todos los cursos.', 'Buenos Aires', '2023-06-29', '0000-00-00'),
(24, 'Carlos', 'Perez', 2147483647, 'IMG-649ddcd6911e60.50308414.jpg', '351 3021357', 'Islas Malvinas 441', '5002', 'cperez@gmail.com', 'Reparación ECU', ' Bioingeniero argentino recibido en la facultad de ingeniería de la UNER.\r\n\r\nSe desempeña como instructor desde 1999 ofreciendo cursos sobre programación de microcontroladores y desarrollo de circuitos impresos electrónicos.\r\n\r\nCon más de 20 años de experiencia en el diseño de equipamiento electrónico, ofreció sus conocimientos para empresas como “Gran Buenos Aires RX”, “Gurpo Avatech SA” e “Ingenieria Inversa SA”. Desde el año 2011 se dedica al diseño y desarrollo de equipamiento electrónico en forma particular para empresas de productos médicos.\r\n', 'Córdoba', '2023-06-29', '0000-00-00'),
(26, 'Pablo', 'asd', 2027564352, 'IMG-64a1ad9a3aba41.09761851.png', '1324512345', 'asdfasdf 2345', '2000', 'asdf@gmail.com', 'cualquiera', ' adfgsdfgsdfgh', 'Santa Fe', '2023-07-02', '0000-00-00'),
(28, 'Hector', 'Cairo', 12548765, 'IMG-64ad9012979d11.41890438.jpg', '3416493187', 'Islas Malvinas 441', '1016', 'cairooscar@gmail.com', 'Electrónica', ' \r\nTécnico electrónico argentino recibido en la ENET PF de San Nicolás (Escuela privada de fabrica, EX SOMISA).\r\n\r\nSe desempeña hace más de 10 años en su propio negocio “HERRAJES CAIRO” en la ciudad de San Nicolás, ofreciendo soluciones a sus clientes en el rubro de la cerrajería automotriz.\r\nFue creador y desarrollador del reconocido software “B-CHIP”.\r\n\r\nSe unió a CEA ELECTRONICA AUTOMOTRIZ para el desarrollo del Software “INMOCODE”, trabajo en el cual permanece como referente y administrador hasta el día de la fecha.\r\n\r\nBrinda capacitaciones en INMOVILIZADORES desde el año 2021.', 'Buenos Aires', '2023-07-11', '0000-00-00'),
(29, 'Heriberto', 'Valenzuela', 2030404659, 'IMG-64ad91b09c7394.66195119.png', '034041564176', 'Juan Domingo Perón 111', '2000', 'asdfasfd@asdfasef.com', 'Ing. Electrónico ', ' Ingeniero en Electrónica Automotriz oriundo de México y socio fundador de la firma HPR TOOLS.\r\nLleva 30 años de experiencia como especialista en programación automotriz, lo que le permitió especializarse en sistemas de algunas de las marcas más populares del mercado como lo son NISSAN y RENAULT.\r\n\r\nSe desempeña como instructor hace 12 años dando capacitación en diferentes países; Argentina, Brasil, Bolivia, Perú y México.\r\n\r\nLa perseverancia es la llave del éxito.', 'Santa Fe', '2023-07-11', '0000-00-00');

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
  `nombre` varchar(120) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nivel_curso` int(10) NOT NULL,
  `descripcion` varchar(1000) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `logo_curso` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `carga_horaria` int(10) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `id_capacitador` int(10) NOT NULL,
  `id_modalidad` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id`, `nombre`, `nivel_curso`, `descripcion`, `logo_curso`, `carga_horaria`, `fecha_inicio`, `fecha_fin`, `id_capacitador`, `id_modalidad`) VALUES
(17, 'ELECTRICIDAD DEL AUTOMOTOR', 5, ' DESTINATARIOS  \r\nDestinado a personas que quieran aprender e iniciarse en el mundo de la electricidad automotora.  \r\n\r\nOBJETIVOS  Acercar los conocimientos básicos, así poder iniciar el camino a la capacitación de mayor nivel. Lograr insertarlos en el mundo laboral con conocimiento.  \r\n\r\nCONTENIDO  Modulo I • Necesidad de conocer la Teoría Atómica y principios básicos de la electricidad • Preguntas para la evaluación diagnóstica • Identificación de cómo se desarrolla la electricidad mediante la Física • ¿Qué es la electricidad? • Conocimiento y aplicación de voltaje –corriente y resistencia en la electricidad del automóvil • Conocimiento de la Teoría Atómica • Interpretación sobre cómo actúa la teoría atómica a través de reacciones químicas • Necesidad de conocer las leyes de Ohm, Kirchhoff y circuitos simples y potencia • Interpretación de las leyes de Ohm y Kirchhoff • Interpretación y aplicación de potencia • Reconocimiento e interpretación de circuitos simples • Mediciones eléctri', 'IMG-64ad8183d7af26.18317383.jpeg', 1, '2023-06-30', '2023-09-30', 13, 7),
(18, 'ELECTRÓNICA DEL AUTOMOTOR', 5, ' DESTINATARIOS\r\n Destinado a personas que quieran aprender e iniciarse en el mundo de los sistemas que componen un automotor.  \r\n\r\nOBJETIVOS Acercar los conocimientos básicos de los sistemas automotrices, así poder iniciar el camino a la capacitación de mayor nivel. Lograr insertarlos en el mundo laboral con conocimiento.  \r\n\r\nCONTENIDO • Módulo I • Medición de señales eléctricas y estructuras de control • Señales eléctricas • Preguntas para la evaluación diagnóstica • Generador de señales • Introducción • Osciloscopio • Señales analógicas y señales digitales • Sistemas electrónicos • Introducción • Estructuras de control Módulo II • Montaje de circuitos electrónicos en placa • Placas electrónicas • Preguntas para la evaluación diagnóstica • Tarjetas de circuitos impresos • Protoboard • Soldadura • Soldadura blanda • Características de una buena soldadura • Herramientas • Recomendaciones y medidas de seguridad', 'IMG-64ad8201afe187.90464063.jpg', 1, '2023-06-15', '2023-09-15', 11, 7),
(19, 'AIRE ACONDICIONADO AUTOMOTOR', 5, ' DESTINATARIOS\r\n Destinado a personas que quieran iniciarse en el mundo de la reparación de automotores, sin conocimiento previo.  \r\n\r\nOBJETIVOS Acercar los conocimientos básicos de la mecánica, así poder iniciar el camino a la capacitación de mayor nivel. Lograr insertarlos en el mundo laboral con conocimiento.  \r\n\r\nCONTENIDO • Reconocimiento inicial y visual de todos sus componentes • Compresor • Evaporador • Condensador • Cañería baja y alta • Filtros • Desarrollo individual de cada componente • Medición • Actuación • Comparación • Reconocimiento de su instalación y medición de sus componentes eléctricos • Bobina • Presostato • Termostato • Forzador • Electro ventilador • Válvulas reguladoras de presión • Relay • Cableado • Fusibles • Ecu • Comando • Lectura e interpretación de un circuito eléctrico • Presiones • Equivalencias • Formas de medición • Precauciones y seguridad de trabajo • Desarrollo y reconocimiento de herramientas de trabajo • Manipulación • Recomendación • Alternati', 'IMG-64ad82eed88412.06217888.jpeg', 1, '2023-06-10', '2023-09-10', 11, 7),
(20, 'MECÁNICA DE MOTORES NAFTEROS', 5, ' DESTINATARIOS Destinado a personas que quieran iniciarse en el mundo de la reparación de automotores, sin conocimiento previo.  \r\n\r\nOBJETIVOS Acercar los conocimientos básicos de la mecánica, así poder iniciar el camino a la capacitación de mayor nivel. Lograr insertarlos en el mundo laboral con conocimiento.  \r\n\r\nCONTENIDO Modulo I • Metrología • Metrología y mediciones • Preguntas para la evaluación diagnóstica • Precisión y exactitud • ¿Qué es la metrología? • El error en las mediciones • Sistema Métrico Legal Argentino (SIMELA) • Determinación del error • Definición de medición • Error relativo y error porcentual • Factores que afectan las mediciones • Medios de verificación y control • Instrumentos de medición y calibres • Conceptos de metrología • Diferencia entre medición y calibrado • Instrumentos de medición • Pie de Rey (Calibre) • Sondas o galgas de espesores • Micrómetro • Regla para control de planitud • Reloj comparador Módulo II • Motor naftero de cuatro tiempos • El mo', 'IMG-64ad84485df288.52976666.jpg', 1, '2023-07-01', '2023-10-23', 12, 7),
(21, 'SUSPENCIÓN Y DIRECCIÓN AUTOMOTOR', 5, ' DESTINATARIOS\r\n\r\n Destinado a personas que quieran aprender e iniciarse en el mundo de los sistemas que componen un automotor.  \r\n\r\nBJETIVOS Acercar los conocimientos básicos de los sistemas automotrices, así poder iniciar el camino a la capacitación de mayor nivel. Lograr insertarlos en el mundo laboral con conocimiento.  \r\n\r\nCONTENIDO  Módulo I Neumática e Hidráulica • Conceptos y magnitudes aplicadas a los fluidos • Preguntas para la evaluación diagnóstico • Concepto de fluido en los fluidos • Magnitudes y principios físicos de aplicación Circuitos neumáticos • Introducción • Características de los sistemas neumáticos • Propiedades físicas del aire • Principios físicos en gases • Producción de aire comprimido • Almacenamiento y tratamiento del aire comprimido Circuitos hidráulicos • Características de los circuitos hidráulicos • Elementos del circuito • Red de distribución Módulo II Sistemas de suspensión • Objetivo y funcionamiento de la suspensión • Preguntas para la evaluación d', 'IMG-64ad84d59dba65.33833415.jpg', 1, '2023-07-19', '2023-10-19', 24, 7),
(22, 'CORREAS Y TENSORES', 3, ' Historia\r\n-PRODUCTOS\r\n-CORREAS \r\n\r\nTipos en producción. \r\nDiagnóstico y roturas.\r\n\r\nTENSORES DE DISTRIBUCIÓN y POLY V.-KITS DE DISTRIBUCION. \r\nDiagnóstico y roturas Tensores', 'IMG-64ad863fc8f041.05702833.jpg', 3, '2023-07-20', '2023-07-20', 12, 4),
(23, 'LINEA TÉRMICA', 3, 'OBJETIVOS \r\nTransmitir los beneficios y propiedades de nuestros productos                                                                     \r\n\r\nCONTENIDO\r\n • Radiadores • Intercoolers • Radiadores de Aceite • Termostatos • Que son cada uno y sus fallas ', 'IMG-64ad8a46b9b410.97983744.jpg', 3, '2023-07-18', '2023-07-18', 24, 4),
(25, 'COJINETES', 3, 'OBJETIVOS\r\nTransmitir los beneficios y propiedades de nuestros productos                                                                     \r\n\r\nCONTENIDO\r\n• Línea pesada y liviana • Concepto de luces y ajustes • Nuevas Tecnologías de fabricación y prestaciones asociadas • Fallas típicas y causas que las producen • Influencia de la lubricación sintética ', 'IMG-64ad8b74ec09e0.53681711.jpg', 3, '2023-07-22', '2023-07-22', 10, 4),
(26, 'TURBOCOMPRESORES', 3, ' OBJETIVOS \r\nTransmitir los beneficios y propiedades de nuestros productos                                                                     \r\n\r\nCONTENIDO TURBOCOMPRESORES\r\n• Livianos y pesados • Tecnología de Fabricación y conceptos básicos de montaje en los vehículos • Fallas en los turbocompresores debido al uso • Lubricación e inyección ', 'IMG-64ad8bf1cb71f0.89702238.jpg', 3, '2023-07-22', '2023-07-22', 13, 4),
(27, 'JUNTAS', 3, 'OBJETIVOS \r\nTransmitir los beneficios y propiedades de nuestros productos                                                                     \r\n\r\nCONTENIDO \r\nJuntas de Culata • Tipos/Materiales • Propiedades y Características • Condición de la Superficie • Tipos de Fuga • Forma de Montaje Elementos de fijación y otros tipos de apriete Retenes/Tipos • Funcionamiento • Fallas potenciales ', 'IMG-64ad8c824710a7.28568364.jpg', 3, '2023-07-25', '2023-07-25', 12, 4),
(28, 'BUJIAS Y CABLES', 3, ' Temario: \r\n- Características y Codificación de\r\n- Bujías - Cables de Encendido - Bujías\r\n- STD - Resistivas - Green Pluss - De metales preciosos', 'IMG-64ad8d158defd6.24727511.png', 3, '2023-07-30', '2023-07-30', 11, 4),
(29, 'TURBOCOMPRESORES', 3, 'OBJETIVOS \r\nTransmitir los beneficios y propiedades de nuestros productos                                                                   \r\n\r\nCONTENIDO \r\n• Nivel 1 (inicial) • 1-El turboalimentador • 1-1-Justificación del uso del turboalimentador. • 1-2-Principio de funcionamiento. • 1-3-Componentes fundamentales. • 1-4-Identificación del turboalimentado. • 1-5-Ventajas del uso del turboalimentado. • 2-Fallas en los turboalimentadores por agentes externos • 2-1-Temperatura de gases de escape excesiva. • 2-2-Materiales extraños en la rueda compresora. • 2-3-Rueda compresora erosionada. • 2-4-Rueda compresora atacada por formaciones salitrosas. • 2-5-Materiales extraños en la rueda de turbina. • 2-6-Lubricación deficiente. • 2-7-Otras causas de falla. • 3-Cuidados del turboalimentado • 3-1-Aceite. • 3-2-Filtro de aceite. • 3-3-Filtro de aire. • 4-Instalación del turboalimentado • 4-1-Precauciones a verificar en el motor previo a la instalación de turbo alimentadores. • 4-2-Recomendacio', 'IMG-64ad8e2cce6d11.61759323.jpg', 3, '2023-07-12', '2023-07-12', 24, 4),
(30, 'CLIMATIZACION AUTOMOTRIZ', 1, 'DESTINATARIOS\r\n Destinado al personal que realice mantenimiento y reparaciones de A/A y quieran intervenir vehículos con climatización automática. Es necesario tener realizado el curso de A/A \r\n\r\nOBJETIVOS\r\n Tiene como objetivo interpretar el sistema en su funcionamiento reconocer sus componentes y diagnosticar correctamente. La climatización automotriz requiere componentes eléctricos y electrónicos, esto, nos obliga a medir, emular y diagnosticar cada uno de ellos. \r\n\r\nCONTENIDO Principios básicos del funcionamiento del aire acondicionado automotriz. Reconocimiento de un sistema climatizador. Como lo identificamos. Como actúa. Cómo reacciona. \r\nctura del sistema, explicación de cada uno de los módulos y forma de trabajo. • Sensores. • Actuadores. • Unidad de control. • Sensores NTC – PTC. • Sensores temperatura exterior. • Zonda térmico interior. • Temperatura aire central. • Sensores de humedad. • Captación solar. • Calidad y limpieza de aire. • Presostatos electrónicos. • Forzadores', 'IMG-64ad96396975d1.46595898.jpg', 2, '2023-08-01', '2023-08-03', 13, 5),
(31, 'MOTOS ALTA DE CILINDRADA', 1, 'DESTINATARIOS\r\nEl siguiente curso va dirigido a talleristas con un conocimiento básico- previo, que quieran profundizar y desarrollar trabajos en motos de varios cilindros y alta complejidad. \r\n\r\nOBJETIVOS\r\nLa finalidad de este curso será poder entender en profundidad e individualmente todo lo que respecta a la afinación de motos con características que requieran métodos de trabajo muy específicos y delicados.\r\n\r\nCONTENIDO • Conocimiento específico y profundo de los distintos tipos de aceites a emplear. • Conocimiento de los distintos filtros; material, composición y • rendimiento. • Calibración y registro de los distintos sistemas de distribución. • Ajuste y calibración de múltiples carburadores. • Utilización de vacuómetro. • Chequeo y control mediante scanner de la inyección.', 'IMG-64ad96d2cb16a5.29797441.jpg', 2, '2023-07-05', '2023-07-08', 29, 5),
(32, 'MOTORIZACIÓN THP NIVEL 1', 1, ' CONTENIDOS: \r\nPresentación de los distintos tipos de motores • 120 cv / 156 cv / 165 cv / 200 cv • Conceptos básicos de inyección directa • Sistema Valvetronic • Sobrealimentación asistida electrónicamente Periféricos del Motor • Bomba de agua eléctrica y accionamiento intermediario de bomba eléctrica convencional • Bomba de aceite pilotada ', 'IMG-64ad97246777b4.45195559.jpg', 2, '2023-08-20', '2023-08-23', 26, 5),
(33, 'MOTORIZACIÓN THP NIVEL 2', 1, ' CONTENIDOS: \r\nPresentación de los distintos tipos de motores • 120 cv / 156 cv / 165 cv / 200 cv • Conceptos básicos de inyección directa • Sistema Valvetronic • Sobrealimentación asistida electrónicamente Periféricos del Motor • Bomba de agua eléctrica y accionamiento intermediario de bomba eléctrica convencional • Bomba de aceite pilotada ', 'IMG-64ad9742d1ced5.51136628.jpg', 2, '2023-08-24', '2023-08-27', 11, 7),
(34, 'MOTORIZACIÓN THP NIVEL 3', 1, 'FINALIDAD U OBJETIVOS DEL CURSO: \r\n-Una vez finalizado el curso los participantes podrán: •Realizar diagnóstico de manera precisa, certera y eficiente de los sistemas valvetronic presentes en las motorizaciones THP de más de 200 cv •Establecer a partir de la hipótesis de falla la secuencia correcta de actividades por realizar •Seleccionar y manipular con destreza y en forma segura las herramientas necesarias para los trabajos de reparación y diagnóstico. •Funcionamiento y control del sistema •Identificación de las distintas evoluciones del sistema •Identificación de los nuevos componentes de las evoluciones F y similares •Nueva inyección bosch', 'IMG-64ad977cdb5304.30758638.jpg', 2, '2023-08-29', '2023-09-01', 11, 4),
(35, 'MOTORES SISTEMAS DIESEL HDI', 1, ' CONTENIDOS:\r\nUna vez finalizado el curso los participantes podrán: • Lograr interpretar la correcta finalidad de los sistemas HDI • Se logra un entendimiento del sistema en su conjunto para poder abordar las fallas y llegar al diagnóstico correcto • Lograr la correcta medición de sensores y actuadores e identificar sus fallas • Diagnóstico de Inyectores, Medición eléctrica control por scanner, control por retornos', 'IMG-64ad988537d9a3.99526084.jpeg', 2, '2023-09-01', '2023-09-03', 24, 7),
(36, 'VEHÍCULOS ELECTRICOS NIVEL 1', 1, ' CONTENIDOS:\r\nUna vez finalizado el curso los participantes podrán: • Lograr interpretar la correcta finalidad de los sistemas HDI • Se logra un entendimiento del sistema en su conjunto para poder abordar las fallas y llegar al diagnóstico correcto • Lograr la correcta medición de sensores y actuadores e identificar sus fallas • Diagnóstico de Inyectores, Medición eléctrica control por scanner, control por retornos\r\n12) Sistema de almacenamiento de energía • Parámetros fundamentales de una batería de un EV • Concepto de una batería de EV • Tipos de celdas según su composición química • Tipos de celdas según su forma geométrica • Tecnologías más utilizadas en baterías de VE • Montaje de un pack de baterías • Módulo BMS (battery management system) • Sensor de corriente • Refrigeración del pack de baterías  • Elementos de protección necesarios 13) Proceso de carga de una celda de ion-litio 14) Sistema de recarga de un VE 15) Sistema de carga on board 16) Sistema de carga off board 17) Pre', 'IMG-64ad994f188ff8.36102666.jpg', 2, '2023-09-02', '2023-09-05', 11, 7),
(37, 'SOLDADURA EN ALUMINIO', 1, ' CONTENIDOS:\r\nUnidad 1 • Acondicionar los insumos y el espacio de trabajo y poner a punto el equipo de soldar interpretando la especificación de la orden de trabajo. 1.1 Interpretar las especificaciones orales, escritas o gráficas de la soldadura para planificar la secuencia de actividades a realizar. • 1.2 Acondicionar el espacio de trabajo aplicando criterios de seguridad e higiene establecidos por normas generales y particulares para prevenir riesgos y asegurar la calidad y productividad del proceso. • 1.3 Controlar las condiciones cuantitativas del material base a soldar.\r\nUnidad 2 • Proponer acciones de mejora continua del proceso de soldadura y del ámbito de trabajo. • 2.1 Redactar informes y completar registros que identifiquen mejoras a incorporar en el proceso y en el ámbito de trabajo, aplicando conceptos de productividad, calidad, orden, seguridad, higiene y preservación del medioambiente. Unidad 3 • Soldar, aplicando las técnicas del proceso de soldadura TIG en chapas de ac', 'IMG-64ad99c2db78c4.97035364.jpg', 2, '2023-09-02', '2023-09-05', 12, 5),
(38, 'VÁLVULAS', 3, ' CONTENIDO\r\n• Concepto de sistemas multiválvulas • Nuevas tecnologías en válvulas y asientos • Fallas del sistema de sellado de la cámara • Falla de válvulas    ', 'IMG-64ad9af33f2b88.95740255.jpg', 2, '2023-10-10', '2023-10-10', 12, 4),
(39, 'MECÁNICA DE MOTOS INICIAL', 5, 'OBJETIVOS\r\nAcercar los conocimientos básicos de la reparación de motos, así poder iniciar el camino a la capacitación de mayor nivel. Lograr insertarlos en el mundo laboral con conocimiento. \r\n\r\nCONTENIDO\r\n • Diagnóstico de fallas y reparación del motor y sus subsistemas • El proceso de diagnóstico • Función del orden de trabajo, Importancia de un buen diagnóstico. • Componentes y funcionamiento del motor • Ciclo de 4 tiempos • Ciclo de 2 tiempos. • Sistema de distribución. • Factores que provocan fallas en el mismo. • Conocimiento y correcta utilización de las herramientas de medición • Sonda • Micrómetro • Calibre • Manómetro • Compresómetro • Torquímetro. • Manejo de herramientas de modo seguro. • Manejo e interpretación de tablas de especificaciones técnicas. • Problemas en aros, pistón y cilindros. • Medición de luz entre el cilindro y el pistón. • Función y relación entre cigüeñal, árbol de levas, cojinetes y rodamientos. • Control de desgaste y reparación referida a la medición ', 'IMG-64ad9b8fa955f0.03373739.jpg', 1, '2023-07-04', '2023-10-04', 28, 7),
(40, 'CHAPERIA Y PINTURA AUTOMOTOR', 5, ' CONTENIDO\r\n• 1. Introducción a la Chapería. • 2. Recepción del vehículo, reparación de los daños. • 3. Tipos de herramientas que conoce para la reparación de un vehículo. • 4. Pasos que seguir para reparar el capot, puerta, etc. De un vehículo. • 5. Los diferentes métodos para soldar la chapa • 6. Elementos de seguridad. • 7. Máquina saca bollos: funcionamiento y características. • 8. Equipo Autógeno: elementos de este. • 9. Como realizar el encendido del equipo autógeno. • 10. Soldadura Mig y sus elementos de seguridad. • 11. Cuidados que hay que tener en el momento de desarmar un vehículo. • 12. Equipo expansor. • 13. Banco chapista. • 14. Evaluación final ', 'IMG-64ad9c27861418.61328272.jpg', 2, '2023-09-20', '2023-12-20', 24, 4),
(41, 'MEDICIÓN SENSORES Y ACTUADORES', 5, ' OBJETIVOS\r\nAcercar los conocimientos básicos del funcionamiento de los sensores y actuadores, así poder iniciar el camino a la capacitación de mayor nivel. Lograr insertarlos en el mundo laboral con conocimiento.  \r\n\r\nCONTENIDO\r\nMódulo I Sistemas de alimentación en motores Otto • Combustible y características de la mezcla • Características de la mezcla • Gasolina • Elementos comunes a todo sistema de alimentación • Depósito de combustible • Filtro de aire • Bomba de combustible • Tuberías  Módulo II Sistemas de inyección electrónica • Sistemas de alimentación en motores de gasolina • Preguntas para la evaluación diagnóstica • Tipos de corriente en los sistemas de gestión • Clasificación de los sistemas de inyección electrónica • Unidad de control electrónica (ECU) 2.5 Verificación de las caídas de tensión • Sistemas de inyección • Inyección mono punto • Inyección multipunto directa • Inyección multipunto indirecta • Funcionamiento básico de los sistemas de inyección multipunto • Depós', 'IMG-64ad9d4043e444.18347343.jpg', 2, '2023-01-02', '2023-04-02', 11, 5),
(42, 'GESTION DE TALLER', 2, ' OBJETIVOS\r\n• Desarrollar método y actividades para lograr mejorar la gestión administrativa y técnica del negocio, en relación con el contexto actual y lograr que nuestros clientes repitan en el servicio y poder captar nuevos clientes  \r\n\r\nCONTENIDO\r\n• Realizar un ingreso y diagnóstico adecuado como base de lograr una reparación y servicio que satisfaga al cliente • Realización de un presupuesto jurídicamente correcto • Involucramiento de los colaboradores con una permanente capacitación • Adecuación del flujo de tareas para optimizar los tiempos, los recursos, reducir costos y maximizar la rentabilidad.\r\n• Adecuación del tratamiento de los repuestos y las evoluciones de esos costos • Evaluar y accionar sobre los riesgos potenciales del negocio • Prestar un servicio de excelencia para que nuestros clientes repitan y captar nuevos clientes \r\n\r\nREQUISITOS DE INGRESO\r\n• Poseer experiencia en el trabajo en servicios automotor o estar comenzando esta actividad \r\n', 'IMG-64ad9e34d62870.45022189.jpg', 2, '2023-10-02', '2023-10-05', 28, 4),
(43, 'MARKETING INICIAL', 2, 'OBJETIVOS Ingresar al mundo de la promoción digital de nuestros productos/trabajos, accediendo al conocimiento de las herramientas disponibles. \r\n\r\nCONTENIDO • Conocimientos generales de marketing para principiantes • Marketing digital • Herramientas.  \r\n\r\nREQUISITOS DE INGRESO • Conocimientos de manejo de herramientas informáticas y secundario completo.', 'IMG-64ad9e98720d87.69151438.jpg', 2, '2023-10-17', '0000-00-00', 13, 4),
(44, 'MEJORAS DE PROCESO', 2, ' OBJETIVOS\r\n Obtener los conocimientos necesarios para la optimización de los procesos y mejoras en la gestión con sus clientes. \r\n\r\nCONTENIDO ✓Enfoque a procesos. ✓Qué hacemos, como lo hacemos, análisis de actividades claves. ✓Que actividades suman valor al cliente y cuáles no. ✓Enfoque 360° del negocio y sus procesos', 'IMG-64ad9f834834a1.64837412.jpg', 2, '2023-11-01', '2011-03-23', 29, 5),
(45, 'S&H PARA TALLER', 2, ' A QUIEN ESTA DIRIGIDO:\r\n- Titulares de Talleres o administrativos   \r\n\r\nFINALIDAD U OBJETIVOS DEL CURSO: \r\n- Una vez finalizado el curso los participantes podrán: • Conocer la legislación vigente en materia de Higiene y Seguridad • Comprender los beneficios de aplicar las normas de Higiene y Seguridad en su taller • Aprender cómo evitar multas, suspensiones o clausuras • Aplicar técnicas de orden y limpieza en su lugar de trabajo • Preparar sus establecimientos para la prevención de incendios • Realizar una correcta gestión de los residuos que genera el taller • Manipular y almacenar productos químicos de forma segura • Aplicar los protocolos de bioseguridad para la prevención de COVID-19 • Como seleccionar elementos de protección.\r\n\r\nCONTENIDOS: \r\nIntroducción a la Higiene y Seguridad • Para qué sirve la higiene y seguridad • Beneficios de aplicar normas de higiene y seguridad en su taller • Como evitar multas • Marco Legal • Análisis de la legislación • La importancia del orden y la', 'IMG-64ada145e512e5.99956815.jpg', 2, '2023-10-22', '0000-00-00', 11, 7),
(46, 'S&H PARA OPERARIOS', 2, ' DESTINATARIOS\r\nEmpleados de talleres y titulares sin empleados \r\n\r\nOBJETIVOS • Comprender para que sirve la higiene y seguridad • Identificar actos y condiciones inseguras en su puesto de trabajo • Prevenir accidentes laborarles • Distinguir las señales y colores de seguridad • Evitar contactos eléctricos • Utilizar un matafuego • Aprender a actuar en casos de emergencia • Utilizar de forma correcta y cuidar los elementos de seguridad • Separar las distintas clases de residuos que genera el taller • Conocer las técnicas adecuadas para el manejo manual de cargas pesadas • Manipular y almacenar productos químicos de forma segura • Aplicar los protocolos de bioseguridad para la prevención del • covid-19 \r\n\r\nCONTENIDO • Introducción a la higiene y seguridad - ¿Para sirve la higiene y seguridad? - Distinguir accidentes de incidentes - Detectar actos y condiciones inseguras • La importancia de mantener su lugar de trabajo limpio y ordenado - Significado de los colores de seguridad - Signifi', 'IMG-64ada1fd582398.67648301.jpg', 2, '2023-11-01', '2011-03-23', 29, 7),
(47, 'GESTION RR.HH', 2, ' DESTINATARIOS \r\n• Titulares de talleres, administrativos o encargados \r\n\r\nOBJETIVOS • Obtener los conocimientos necesarios para la gestión de los recursos humanos de su empresa CONTENIDO • Conceptos generales de RRHH. • Gestión de RRHH herramientas. • La Inteligencia Colaborativa para el progreso y sustentabilidad de las empresas Pymes. • La mejora continua y sus beneficios. \r\n\r\nREQUISITOS DE INGRESO\r\n• Conocimientos de manejo de herramientas informáticas y secundario completo.', 'IMG-64ada258e7a988.84898279.jpeg', 2, '2023-11-10', '0000-00-00', 24, 5),
(48, 'ANALISIS DE COSTO', 2, 'DESTINATARIOS \r\n\r\nDestinado a titulares o administrativos de talleres\r\n\r\nOBJETIVOS\r\n • Mejorar la toma de decisiones a partir de un profundo conocimiento de los costos de la empresa. • Comprender la importancia del Punto de Equilibro Dinámico del negocio para minimizar pérdidas en época de crisis • Conocer con precisión la importancia de tomar decisiones agiles pensando en la supervivencia de mi negocio. • Lograr un aprendizaje que permita enfrentar la próxima crisis con más herramientas.', 'IMG-64ada2c27ed841.64059673.jpeg', 2, '2023-11-18', '0000-00-00', 28, 4),
(52, 'FECHACO', 4, ' es una prueba', 'IMG-64aefbed392560.02212376.png', 3, '2023-10-10', '2023-10-10', 26, 5);

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
  `modalidad` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `modalidades`
--

INSERT INTO `modalidades` (`id`, `modalidad`) VALUES
(4, 'On-line'),
(5, 'Mixta'),
(7, 'Presencial');

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
(3, 'pablo@algo.com', 0, '2023-06-19'),
(4, 'asdf@asdf.com', 0, '2023-06-28'),
(5, 'amasancarlos@hotmail.com', 0, '2023-06-28'),
(6, 'asdfasfd@asdfasef.com', 0, '2023-06-28'),
(7, 'gerencia@fechaco.org', 0, '2023-06-28');

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
  `password` varchar(20) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `fecha_alta` date NOT NULL DEFAULT current_timestamp(),
  `rol_usuario` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `email`, `password`, `fecha_alta`, `rol_usuario`) VALUES
(16, 'asdfasdf', 'asdfasdf', 'asedfasdf@asdf.com', NULL, '2023-07-05', 1),
(17, 'FECHACO', 'Ortize', 'asdfasfd@asdfasef.com', NULL, '2023-07-12', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `afiliados`
--
ALTER TABLE `afiliados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_provincia` (`id_provincia`),
  ADD KEY `afiliado_activo` (`afiliado_activo`);

--
-- Indices de la tabla `camaras`
--
ALTER TABLE `camaras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `capacitadores`
--
ALTER TABLE `capacitadores`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `id_capacitador` (`id_capacitador`),
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
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `afiliados`
--
ALTER TABLE `afiliados`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `camaras`
--
ALTER TABLE `camaras`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT de la tabla `capacitadores`
--
ALTER TABLE `capacitadores`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `certificados`
--
ALTER TABLE `certificados`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

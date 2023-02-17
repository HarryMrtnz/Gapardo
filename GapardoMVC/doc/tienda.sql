-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-02-2023 a las 21:43:09
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion`
--

CREATE TABLE `calificacion` (
  `id_calificacion` int(100) NOT NULL,
  `comentario` varchar(100) NOT NULL,
  `puntuacion` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `fk_usuario` int(100) NOT NULL,
  `fk_instrumento` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `calificacion`
--

INSERT INTO `calificacion` (`id_calificacion`, `comentario`, `puntuacion`, `fecha`, `fk_usuario`, `fk_instrumento`) VALUES
(1, 'Muy buena Guitarra!!', 5, '2022-11-22', 1, 1),
(2, 'Â¿Aceptan efectivo? me robaron la tarjeta de crÃ©dito! :(', 3, '2022-12-02', 6, 1),
(3, 'Mira que te como hermano!', 4, '2022-12-08', 5, 1),
(4, 'QuemirÃ¡ bobo? AndapayÃ¡!', 5, '2022-12-15', 4, 1),
(5, 'La compre hace 3 dÃ­as, suena barbaro!', 5, '2022-12-08', 2, 9),
(6, 'Buenisimo!', 3, '2022-12-04', 2, 9),
(7, 'No me termina de convencer', 2, '2022-11-17', 1, 2),
(8, 'Buena calidad!!! :D', 4, '2022-11-24', 2, 2),
(9, 'Barbaro!', 3, '2022-11-10', 6, 4),
(10, 'Precio y calidad! Muy Bueno', 3, '2022-12-05', 3, 3),
(11, 'AAAAAAAA', 2, '2022-12-02', 5, 6),
(12, 'No suena como esperaba, igual bien', 3, '2022-12-06', 1, 7),
(13, 'Cuanto es en Dolares?', 4, '2022-12-09', 6, 12),
(14, 'Por diabetes no puedo comprar la flauta dulce', 4, '2023-02-17', 2, 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id_carrito` int(11) NOT NULL,
  `fk_usuario` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`id_carrito`, `fk_usuario`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(100) NOT NULL,
  `nombre_categoria` varchar(100) NOT NULL,
  `fk_tipo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre_categoria`, `fk_tipo`) VALUES
(1, 'Guitarra', 1),
(2, 'Violin', 1),
(3, 'Bajo', 1),
(4, 'Flauta', 2),
(5, 'Saxo', 2),
(6, 'ArmÃ³nica', 2),
(7, 'BaterÃ­a', 3),
(8, 'XilÃ³fono', 3),
(9, 'Pandereta', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instrumento`
--

CREATE TABLE `instrumento` (
  `id_instrumento` int(100) NOT NULL,
  `nombre_instrumento` varchar(100) NOT NULL,
  `marca` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `detalle` text NOT NULL,
  `precio` double(9,2) NOT NULL,
  `cantidad` int(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `fk_categoria` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `instrumento`
--

INSERT INTO `instrumento` (`id_instrumento`, `nombre_instrumento`, `marca`, `descripcion`, `detalle`, `precio`, `cantidad`, `foto`, `fk_categoria`) VALUES
(1, 'Guitarra criolla clÃ¡sica', 'Gracia M1\r\n\r\n', 'Guitarra para diestros natural\r\n\r\n', 'Construida de Abedul.\r\nTiene 6 cuerdas de nailon.\r\nGuitarra versÃ¡til que se adapta a una gran variedad de estilos musicales.\r\n', 19800.00, 60, 'Guitarra criolla clÃ¡sica.jpg', 1),
(2, 'Guitarra elÃ©ctrica GRX40 ', 'Ibanez RG GIO\r\n\r\n', 'Color negro y blanco\r\n\r\n', 'Fabricada en Ã¡lamo.\r\nCon 6 cuerdas y 22 trastes de tamaÃ±o medium jumbo.\r\nEl largo de escala es de 25.5 \".\r\nEl puente es tremolo.\r\nIncluye 3 micrÃ³fonos humbucker, simples.\r\nControles de selector de micrÃ³fonos, tono y volumen.\r\nPalanca incluida.\r\nSonidos fuertes y firmes con un estilo propio.\r\n', 51900.00, 80, 'Guitarra elÃ©ctrica GRX40.jpg', 1),
(3, 'Guitarra acÃºstica EG481SCX \r\n\r\n', 'Takamine\r\n\r\n', 'Color negro mate.\r\n\r\n', 'Tapa de abeto.\r\nAcabado de gloss.\r\nForma del cuerpo: jumbo.\r\nTiene 6 cuerdas de metal.\r\nGuitarra versÃ¡til que se adapta a una gran variedad de estilos musicales.\r\n', 205600.00, 65, 'Guitarra acÃºstica EG481SCX-W.jpg', 1),
(4, 'ViolÃ­n acÃºstico', 'Segovia', 'Estudio Antique 1/2 Tilo Arco', 'TerminaciÃ³n: MarrÃ³n antiguo mate. Tapa: madera contrachapada de tilo Parte posterior y lateral: madera contrachapada de tilo DiapasÃ³n: Madera dura terciada Clavija y mentonera: madera terciada Cordal: aleaciÃ³n de aluminio Arco redondo de palisandro Estuche Triangular de Gomaespuma', 11600.00, 45, 'ViolÃ­n acÃºstico.jpg', 2),
(5, 'ViolÃ­n elÃ©ctrico', 'Parquer ', 'Con Estuche Arco Resina Cable', 'CUELLO MADERA Caoba\nFORMA DEL CUELLO Perfil bajo\nTUERCA PlÃ¡stico\nANCHO DE TUERCA 42 mm\nSINTONIZADORES Die Cast\nESCALA 812 mm\nPROFUNDIDAD DEL CUERPO 95-118 mm\nPUENTE Sudamericano RoupanÃ \nSILLÃN PlÃ¡stico\nCOLOR / ACABADO Natural / Brillo\n', 64700.00, 55, 'ViolÃ­n ElÃ©ctrico.jpg', 2),
(6, 'Bajo elÃ©ctrico Jazz Bass', 'Sx', 'Con chapÃ³n Fjb-62/c y Funda', 'Escala: 864mm\nCuerpo: Basswood Solido\nMÃ¡stil : Selected Canadian Maple\nDiapasÃ³n: Rosewood\nTrastes: 20\nPuente: Chrome\nBridge Cover: Chrome\nPickups: 2 x Single Coil\nControles: 2V. 1T.\nAccesorios: SX BB400 Funda\n', 46900.00, 80, 'Bajo elÃ©ctrico Jazz Bass.jpg', 3),
(7, 'Bajo acÃºstico Nxt Bass ', 'Eko ', 'Con ecualizador afinador y corte', 'CUELLO MADERA Caoba\r\nFORMA DEL CUELLO Perfil bajo\r\nTUERCA PlÃ¡stico\r\nANCHO DE TUERCA 42 mm\r\nSINTONIZADORES Die Cast\r\nESCALA 812 mm\r\nPROFUNDIDAD DEL CUERPO 95-118 mm\r\nPUENTE Sudamericano RoupanÃ \r\nSILLÃN PlÃ¡stico\r\nCOLOR / ACABADO Natural / Brillo\r\n', 64700.00, 75, 'Bajo Acustico.jpg', 3),
(8, 'BaterÃ­a Prodigy PDG5254T', 'Mapex ', 'Fierros + Platos + Banqueta', 'Medidas:\nB 22\"\nTT 12\"\nTT 13\"\nTF 16\"\nR 14\"x5,5\n', 160000.00, 65, 'BaterÃ­a Prodigy PDG5254T.jpg', 7),
(9, 'BaterÃ­a elÃ©ctrica Sensitiva Skd130 ', 'Soundking Parquer ', 'Cantidad de cuerpos: 8\r\nTipos de conexiones: PLUG,USB,MIDI\r\nCantidad de sonidos: 250\r\nIncluye palillos: SÃ­\r\nIncluye pedales: SÃ­\r\n', 'TamaÃ±o: 700 mm Ã— 1100 mm\r\nmÃ³dulo SKD130\r\n250 voces de percusiÃ³n de alta calidad\r\n20 kits de baterÃ­a predefinidos + 10 kits de baterÃ­a definidos por el usuario\r\n20 canciones de demostraciÃ³n\r\nInstalaciÃ³n de grabaciÃ³n y reproducciÃ³n\r\nMetrÃ³nomo: haga clic voz, selecciÃ³n de intervalo, volumen de clic\r\ntempo: 35-280bpm\r\n', 121000.00, 45, 'BaterÃ­a elÃ©ctrica Sensitiva Skd130.jpg', 7),
(10, 'XilofÃ³n cromÃ¡tico XCS', 'Nacional', 'En el xilofÃ³n cromÃ¡tico podemos interpretar todo tipo de melodÃ­as con el cÃ¡lido sonido de sus placas de quina.\r\nSu fabricaciÃ³n artesanal y sonido natural, evoca lo autÃ³ctono y aporta originalidad a cualquier gÃ©nero musical. Desde mÃºsica clÃ¡sica a rock, y desde pop a mÃºsica fusiÃ³n.\r\n', 'Quince notas naturales â€“ C a C2 (DO a DO2).\r\nDiez semitonos â€“ C# a Bb1 (DO# a SIb1).\r\nPlacas desmontables de madera de quina.\r\nCaja acÃºstica de madera.\r\nDos baquetas.\r\n', 18300.00, 80, 'XilofÃ³n cromÃ¡tico XCS.jpg', 8),
(11, 'XilofÃ³n diatÃ³nico X28', 'Nacional', 'Cantidad de teclas: 17\r\nEscala musical: DiatÃ³nica\r\nMaterial del cuerpo: Madera\r\nMaterial de las teclas: Madera\r\nAncho: 2 cm\r\n', 'Placas desmontables de madera de quina.\r\nCaja acÃºstica de madera.\r\nDos baquetas.\r\nEl ancho de cada placa es de 2 Cm.\r\n', 10500.00, 60, 'XilofÃ³n diatÃ³nico X28.jpg', 8),
(12, 'Pandero JB910H', 'Knight', '10 Pulgadas 8 Pares De Sonajas', '10 pulgadas/25 centÃ­metros de diÃ¡metro\r\nParche de cuero sintÃ©tico\r\n8 pares de sonajas\r\nColor natural\r\n', 1600.00, 75, 'Pandero JB910H.jpg', 9),
(13, 'Pandereta media luna Jb918', 'Knight', '4 Sonajas 4.5 X 5.5', 'DiÃ¡metro: 4.5 \"\r\nCantidad de sonajas: 4\r\nForma: Media luna\r\n', 500.00, 140, 'Pandereta media luna Jb918.jpg', 9),
(14, 'Flauta dulce Yrf23 ', 'Yamaha ', 'Escolar soprano', 'CondiciÃ³n del Ã­tem: Nuevo\r\nColor: Blanco marfil\r\nIncluye estuche: Si\r\nModelo: YRS23\r\nNivel de habilidad: Principiante\r\nTipo de digitaciÃ³n: Alemana\r\nTipo de flauta: Dulce\r\nAfinaciÃ³n: Do\r\nMaterial: ABS Resina\r\n', 2000.00, 170, 'Flauta dulce Yrf23.jpg', 4),
(15, 'Flauta traversa JBFL-6248S', 'Knight ', 'Material: Metal\r\nNivel de habilidad: Profesional\r\nTipo de digitaciÃ³n: Alemana\r\nIncluye estuche: SÃ­\r\n', 'AfinaciÃ³n en C\r\nMaterial: Metal\r\nFlauta de plata\r\nSuperficie Plateado\r\nClave de diseÃ±o: 16 hoyos cerrado\r\nTecla de disposiciÃ³n: desalineado G, el tornillo de ajuste\r\nAlmohadillas Italia\r\nNivel de habilidad: Profesional\r\nIncluye estuche\r\nDimensiones: 13 x 8 x 41cm\r\nPeso: 0.9 k\r\nOrigen: China\r\n', 45400.00, 75, 'Flauta traversa JBFL-6248S.jpg', 4),
(16, 'Saxo alto JBAS-200', 'Knight ', 'Eb Llave F# Laqueado + estuche', 'Excelente Saxo Alto en Eb (Mi Bemol) y llave de F#, cuerpo dorado laqueado, incluye estuche semi rÃ­gido y boquilla.', 125300.00, 30, 'Saxo alto JBAS-200.jpg', 5),
(17, 'Saxo soprano SS650', 'Conn-Selmer', 'nstrumento ideal principiantes\r\nLos saxofones Conn-Selmer son una opciÃ³n ideal para jÃ³venes y estudiantes mÃºsicos. El tamaÃ±o de la soprano es cÃ³modo, ligero y fÃ¡cil de alcanzar, lo que le permite centrarse en su mÃºsica.\r\n', 'Cuerpo: LatÃ³n\r\nLlaves: LatÃ³n\r\nTamaÃ±o: Soprano\r\nMÃ¡stil: Recto\r\nBotones: Blanco perlado\r\nClave: F #\r\nPads: Pisoni\r\nAcabado: Laca del oro\r\nAccesorios incluidos: MaletÃ­n ligero\r\n', 180000.00, 40, 'Saxo soprano SS650.jpg', 5),
(18, 'Saxo plÃ¡stico Venova', 'Yamaha ', 'El Venova es un tipo completamente nuevo de instrumento que ofrece la expresividad de un instrumento de viento, que utiliza un sistema de digitaciÃ³n tan simple como el de una flauta dulce.', 'Tipo de saxofÃ³n Soprano', 27200.00, 65, 'Saxo plÃ¡stico Venova.jpg', 5),
(19, 'ArmÃ³nica diatÃ³nica cromada', 'Magma', 'ArmÃ³nica Blusera Afina Do + Estuche', 'Medidas: 103x27x21 mm.\r\nPlaca de caÃ±a de cobre de 0,9 mm.\r\nCubierta de metal, cromada, gran terminaciÃ³n\r\n', 1300.00, 180, 'ArmÃ³nica diatÃ³nica cromada.jpg', 6),
(20, 'ArmÃ³nica cromÃ¡tica 64', 'Hohner', 'Con el nuevo Super 64, HOHNER actualiza este icÃ³nico instrumento con un diseÃ±o impresionante y una amplia gama de caracterÃ­sticas innovadoras. ', 'Teclas: C\r\nEscribe: cromÃ¡tico\r\nAfinaciÃ³n: afinaciÃ³n en solitario\r\nNumero de agujeros: diecisÃ©is\r\nGama tonal: 4 octavas, C3 - D7\r\nLargo: 19,8 cm / 7,8 \"\r\n', 82300.00, 130, 'ArmÃ³nica cromÃ¡tica 64 Hohner.jpg', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_carrito`
--

CREATE TABLE `producto_carrito` (
  `id_producto_carrito` int(11) NOT NULL,
  `fk_carrito` int(11) NOT NULL,
  `fk_instrumento` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `producto_carrito`
--

INSERT INTO `producto_carrito` (`id_producto_carrito`, `fk_carrito`, `fk_instrumento`) VALUES
(4, 4, 2),
(5, 4, 5),
(6, 4, 16),
(7, 5, 17),
(8, 5, 4),
(9, 5, 10),
(10, 5, 1),
(20, 1, 3),
(21, 1, 14),
(22, 1, 13),
(23, 1, 19),
(24, 2, 10),
(25, 2, 13),
(26, 2, 16),
(27, 2, 1),
(28, 2, 12),
(29, 2, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `id_tipo` int(10) NOT NULL,
  `nombre_tipo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`id_tipo`, `nombre_tipo`) VALUES
(1, 'Cuerda'),
(2, 'Vientos'),
(3, 'PercusiÃ³n'),
(4, 'Otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(8) NOT NULL,
  `nombre_usuario` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `clave` varchar(100) DEFAULT NULL,
  `nivel` varchar(100) DEFAULT NULL,
  `fecha_alta` date DEFAULT NULL,
  `estado` enum('activo','banneado') NOT NULL DEFAULT 'activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `apellido`, `email`, `clave`, `nivel`, `fecha_alta`, `estado`) VALUES
(1, 'Harry', 'Mrtnz', 'hm@dv.net', 'f10e2821bbbea527ea02200352313bc059445190', 'admin', '2022-07-22', 'activo'),
(2, 'Luca', 'Di Nardo', 'luca@dv.net', 'f10e2821bbbea527ea02200352313bc059445190', 'usuario', '2022-07-30', 'activo'),
(3, 'Damian', 'Reyes', 'dami@dv.net', 'f10e2821bbbea527ea02200352313bc059445190', 'usuario', '2022-08-12', 'activo'),
(4, 'Lionel', 'Messi', 'lio@dv.net', 'f10e2821bbbea527ea02200352313bc059445190', 'usuario', '2022-08-26', 'activo'),
(5, 'Dibu', 'MartÃ­Â­nez', 'dibu@dv.net', 'f10e2821bbbea527ea02200352313bc059445190', 'usuario', '2022-09-15', 'activo'),
(6, 'Elda', 'Montoto', 'elda@dv.net', 'f10e2821bbbea527ea02200352313bc059445190', 'usuario', '2022-10-01', 'activo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD PRIMARY KEY (`id_calificacion`),
  ADD KEY `calificacion_ibfk_1` (`fk_usuario`),
  ADD KEY `calificacion_ibfk_2` (`fk_instrumento`);

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id_carrito`),
  ADD KEY `fk_carrito_usuario` (`fk_usuario`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`),
  ADD KEY `codigoTipo` (`fk_tipo`);

--
-- Indices de la tabla `instrumento`
--
ALTER TABLE `instrumento`
  ADD PRIMARY KEY (`id_instrumento`),
  ADD KEY `codigoCategoria` (`fk_categoria`);

--
-- Indices de la tabla `producto_carrito`
--
ALTER TABLE `producto_carrito`
  ADD PRIMARY KEY (`id_producto_carrito`),
  ADD KEY `fk_producto_carrito_carrito1` (`fk_carrito`),
  ADD KEY `fk_producto_carrito_instrumento1` (`fk_instrumento`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  MODIFY `id_calificacion` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id_carrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `instrumento`
--
ALTER TABLE `instrumento`
  MODIFY `id_instrumento` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `producto_carrito`
--
ALTER TABLE `producto_carrito`
  MODIFY `id_producto_carrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id_tipo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD CONSTRAINT `calificacion_ibfk_1` FOREIGN KEY (`fk_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `calificacion_ibfk_2` FOREIGN KEY (`fk_instrumento`) REFERENCES `instrumento` (`id_instrumento`);

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `fk_carrito_usuario` FOREIGN KEY (`fk_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD CONSTRAINT `codigoTipo` FOREIGN KEY (`fk_tipo`) REFERENCES `tipo` (`id_tipo`);

--
-- Filtros para la tabla `instrumento`
--
ALTER TABLE `instrumento`
  ADD CONSTRAINT `codigoCategoria` FOREIGN KEY (`fk_categoria`) REFERENCES `categoria` (`id_categoria`);

--
-- Filtros para la tabla `producto_carrito`
--
ALTER TABLE `producto_carrito`
  ADD CONSTRAINT `fk_producto_carrito_carrito1` FOREIGN KEY (`fk_carrito`) REFERENCES `carrito` (`id_carrito`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_producto_carrito_instrumento1` FOREIGN KEY (`fk_instrumento`) REFERENCES `instrumento` (`id_instrumento`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

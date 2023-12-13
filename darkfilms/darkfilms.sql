-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 13-12-2023 a las 22:23:34
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `darkfilms`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'payasos'),
(2, 'slasher'),
(3, 'scream queens'),
(4, 'grupo'),
(5, 'gorno'),
(6, 'comedia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradas`
--

CREATE TABLE `entradas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `fecha_creacion` date NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `descripcion` varchar(1000) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `entradas`
--

INSERT INTO `entradas` (`id`, `titulo`, `fecha_creacion`, `categoria_id`, `descripcion`, `imagen`) VALUES
(9, 'Terrifier (Damien Leone, 1 y 2) ', '2023-12-07', 1, '\"Terrifier\" y su secuela continúan la pesadilla iniciada por el director Damien Leone, llevando el género slasher a nuevas alturas sádicas. La historia sigue a Art the Clown, un payaso macabro con una sonrisa pintada que acecha las sombras de la noche. Con un enfoque implacable en el terror visceral, estas películas te sumergen en un mundo donde la risa se mezcla con la agonía, desafiando tus expectativas y llevando el horror a extremos perturbadores.', '/images/terrifier.jpeg'),
(10, 'The Babysitter (McG, 2017)', '2023-12-07', 6, '\"The Babysitter\" es una comedia de terror dirigida por McG que sigue a un joven que descubre que su atractiva niñera está involucrada en un culto satánico. La película combina elementos de comedia y horror, ofreciendo una experiencia divertida y llena de sorpresas.', '/images/babylister.png'),
(11, ' Hostel ( Eli Roth, 2005)  ', '2023-12-07', 5, '\"Hostel\" de Eli Roth es una película de terror y tortura que sigue a un grupo de jóvenes que viajan a Europa y se ven envueltos en una red sádica donde los turistas son cazados por placer. La película es conocida por su violencia explícita y su enfoque en el horror psicológico.', '/images/hostel.jpeg'),
(13, 'Circus of the Dead (Billy  Pon, 2014)', '2023-12-10', 1, '\"Circus of the Dead\" es un viaje descarnado al lado más oscuro del circo, donde la diversión se convierte en pesadilla. Dirigida por Bloody Bill, la película sigue a un grupo de payasos sádicos que aterrorizan a una familia inocente. A medida que se desarrolla la trama, la línea entre la comedia retorcida y el horror genuino se difumina, creando una experiencia cinematográfica que te mantendrá en vilo y hará que la risa se vuelva escalofriante.', '/images/circus.jpeg'),
(14, 'Balada triste de trompeta (Álex de la Iglesia, 2010) ', '2023-12-10', 1, 'La visión surrealista y oscura de Álex de la Iglesia cobra vida en \"Balada Triste de Trompeta\", una película que fusiona la comedia negra con elementos de horror y drama. Ambientada en un circo durante la Guerra Civil Española, la película sigue la historia de dos payasos enfrentados en un conflicto grotesco y violento. Con una estética visual única y un enfoque magistralmente perturbador, la película es un viaje emocional que desafía las convenciones y deja una marca indeleble en la mente del espectador.', '/images/balada.jpeg'),
(15, 'La casa del terror( Scott Beck, Bryan Woods, 2019)', '2023-12-10', 1, '\"La Casa del Terror\" es un thriller psicológico que te sumerge en un juego aterrador de la mente. Dirigida por Scott Beck y Bryan Woods, la película sigue a un grupo de amigos que aceptan participar en una experiencia única en una casa embrujada. Sin embargo, a medida que avanzan, descubren que los límites entre la realidad y la pesadilla se desdibujan. Con giros inesperados y una atmósfera inquietante, la película desafía las convenciones del terror, llevándote a través de pasajes oscuros de suspense y sorpresa.', '/images/casaTerror.jpeg'),
(16, 'Pearl(Ti West, 2022)', '2023-12-10', 2, '\"Pearl\" es un thriller psicológico dirigido por Ti West que te sumerge en un oscuro laberinto de secretos y obsesiones. La película sigue la historia de Pearl, una mujer que se muda a una pequeña ciudad en busca de un nuevo comienzo, solo para verse envuelta en un misterio inquietante que involucra a la comunidad local. Con una narrativa envolvente y un enfoque tenso, West construye un mundo donde la paranoia y la tensión se entrelazan, creando un viaje cinematográfico que te mantiene al borde de tu asiento.', '/images/pearl.jpeg'),
(17, 'La conferencia (Patrik Eklund, 2023)', '2023-12-10', 2, '\"La Conferencia\" del director Patrik Eklund presenta una trama intrigante en el mundo de los negocios y la tecnología. La película sigue la historia de un evento empresarial aparentemente rutinario que toma un giro sorprendente cuando los participantes se ven atrapados en una red de intrigas y conflictos. Con un enfoque agudo en el suspenso y el humor sutil, Eklund ofrece una experiencia cinematográfica que combina elementos de comedia y thriller, desafiando las expectativas y manteniendo a la audiencia intrigada hasta el último minuto.', '/images/conferencia.jpeg'),
(18, 'Feliz dia de tu muerte (Christopher B. Landon, 2017)', '2023-12-10', 2, 'En \"Feliz Día de tu Muerte\", Christopher B. Landon reinventa el género slasher con un toque ingenioso. La película sigue a Tree Gelbman, quien se ve atrapada en un bucle temporal, reviviendo el día de su asesinato una y otra vez. Con una mezcla única de horror, comedia y misterio, la trama se desarrolla mientras Tree intenta descubrir la identidad de su asesino. Llena de giros inesperados y momentos impactantes, la película ofrece una experiencia fresca y emocionante en el mundo del cine de terror.', '/images/feliz.jpeg'),
(19, 'The Human Centipede 1y 2 (Tom Six, 2009,2011)', '2023-12-10', 2, 'La controvertida y impactante saga \"The Human Centipede\", creada por Tom Six, explora los límites del horror corporal y psicológico. La primera película presenta la perturbadora historia de un cirujano obsesionado que intenta crear un \"centípedo humano\". La secuela lleva la premisa a extremos aún más oscuros, centrándose en un fanático de la primera película que busca emularla de manera grotesca. Ambas películas desafían la sensibilidad del espectador, explorando el lado más oscuro de la experimentación médica y la depravación humana.', '/images/100.jpeg'),
(20, 'Sscream (1996-presente)', '2023-12-10', 2, 'La icónica saga \"Scream\", creada por Wes Craven y continuada por varios directores, revitaliza el género slasher con su inteligente mezcla de horror y meta-humor. La serie sigue las peripecias de un misterioso asesino conocido como Ghostface, que acecha a un grupo de jóvenes mientras juega con las convenciones del género. Con un elenco dinámico, diálogos afilados y giros inesperados, \"Scream\" se ha convertido en un referente del cine de terror moderno, desafiando las expectativas y manteniendo a la audiencia en vilo a lo largo de los años.', '/images/scream.jpeg'),
(21, 'Haute tension (Alexandre Aja, 2003)', '2023-12-10', 3, '\"Haute Tension\" de Alexandre Aja es un thriller intenso que sigue a dos amigas que se ven atrapadas en una pesadilla cuando un asesino en serie acecha. Con giros impactantes y una narrativa llena de suspenso, la película ofrece una experiencia visceral que mantiene a la audiencia al borde de sus asientos.', '/images/tension.jpeg'),
(22, 'scream queens (Ryan Murphy, 2015)', '2023-12-10', 3, '\"Scream Queens\", creada por Ryan Murphy, es una serie que combina el horror con la comedia negra. Ambientada en un campus universitario, la historia sigue a un grupo de jóvenes mientras enfrentan misteriosos asesinatos. La serie mezcla elementos de slasher clásico con el estilo distintivo y el humor irónico característicos de las producciones de Ryan Murphy.', '/images/queens.jpeg'),
(23, 'X ( Ti West, 2022)', '2023-12-10', 4, '\"X\" de Ti West es una película de terror que se adentra en el género de la casa embrujada con un toque único. Ambientada en la década de 1970, la trama sigue a un grupo de cineastas que se aventuran a filmar una película para adultos en una mansión aislada. Con un estilo visual distintivo y un enfoque en la construcción de la atmósfera, West ofrece una experiencia escalofriante que rinde homenaje al cine de terror de la época.', '/images/x.jpeg'),
(24, 'Holocausto Caníbal (Ruggero Deodato, 1980)', '2023-12-10', 4, '\"Holocausto Caníbal\" es una película italiana controvertida y gráfica que sigue a un grupo de documentalistas que desaparece en la selva amazónica. La película es conocida por su realismo extremo y el enfoque en la violencia gráfica, así como por su impacto en el género de \"found footage\".', '/images/holocausto.jpeg'),
(25, 'Ichi the killer (Takashi Miike, 2001', '2023-12-10', 4, 'Dirigida por Takashi Miike, \"Ichi the Killer\" es una película japonesa de crimen y acción extrema que sigue a un sádico asesino y a un misterioso personaje con habilidades mortales. La película es famosa por su violencia gráfica, estilo visual distintivo y giros narrativos impactantes.', '/images/ichi.jpeg'),
(26, 'Los renegados del diablo (Rob Zombie, 2005)', '2023-12-10', 5, '\"Los Renegados del Diablo\", dirigida por Rob Zombie, es una película de terror que sigue a una familia que, después de un viaje por carretera, se enfrenta a una tribu de asesinos caníbales. La película destaca por su estilo visual distintivo y su enfoque en el horror rural.', '/images/renegados.jpeg'),
(27, ' Baise-moi (Virginie Despentes y Coralie Trinh Thi, 2000) ', '2023-12-10', 5, '\"Baise-Moi\" es una película francesa que combina elementos de thriller y pornografía. La historia sigue a dos mujeres que se embarcan en un violento viaje después de experimentar situaciones traumáticas. La película es conocida por su enfoque explícito y provocador.', '/images/baise.jpeg'),
(28, 'Salo o los 120 días de Sodoma (Pier Paolo Pasolini, 1975)', '2023-12-10', 5, '\"Salo o los 120 días de Sodoma\" es una película italiana dirigida por Pier Paolo Pasolini, basada en la obra del Marqués de Sade. La película es notoria por su representación gráfica de tortura, violencia y depravación, sirviendo como una obra polémica y provocadora.', '/images/salo.jpeg'),
(29, 'La casa de cera (Jaume Collet-Serra, 2005)', '2023-12-10', 6, '\"La Casa de Cera\" es un remake del clásico homónimo de 1953. Dirigida por Jaume Collet-Serra, la película sigue a un grupo de jóvenes que se encuentran en una ciudad desierta con una casa de cera que esconde oscuros secretos. La película destaca por sus efectos visuales y momentos impactantes.', '/images/cera.jpeg'),
(30, 'Pink Flamingos (John Waters, 1972)', '2023-12-10', 6, '\"Pink Flamingos\", dirigida por John Waters, es una película transgresora que sigue a Divine, una figura excéntrica, mientras compite con otros por el título de la persona más repugnante del mundo. La película es conocida por su provocación, humor oscuro y desafío a las convenciones sociales.', '/images/pink.jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--
-- Error leyendo la estructura de la tabla darkfilms.notas: #1932 - Table 'darkfilms.notas' doesn't exist in engine
-- Error leyendo datos de la tabla darkfilms.notas: #1064 - Algo está equivocado en su sintax cerca 'FROM `darkfilms`.`notas`' en la linea 1

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas1`
--

CREATE TABLE `notas1` (
  `id` int(11) NOT NULL,
  `entrada_id` int(11) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `puntuacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `contrasena` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `contrasena`) VALUES
(1, 'monik6664', 'monik666'),
(2, 'monik66', 'monik666'),
(3, 'monik', 'monik666'),
(4, 'monik666', 'monik666');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indices de la tabla `notas1`
--
ALTER TABLE `notas1`
  ADD PRIMARY KEY (`id`),
  ADD KEY `entrada_id` (`entrada_id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `entradas`
--
ALTER TABLE `entradas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `notas1`
--
ALTER TABLE `notas1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD CONSTRAINT `entradas_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`);

--
-- Filtros para la tabla `notas1`
--
ALTER TABLE `notas1`
  ADD CONSTRAINT `notas1_ibfk_1` FOREIGN KEY (`entrada_id`) REFERENCES `entradas` (`id`),
  ADD CONSTRAINT `notas1_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

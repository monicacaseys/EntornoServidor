-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-11-2023 a las 14:16:58
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda_virtual`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(10) NOT NULL,
  `nombre` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'pintalabios'),
(2, 'sombras'),
(3, 'rimel'),
(4, 'colorete'),
(5, 'fond de teint'),
(6, 'brows'),
(7, 'eyeliner'),
(8, 'decorativas'),
(9, 'polvos'),
(10, 'lapices');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(10) NOT NULL,
  `fecha` date DEFAULT NULL,
  `cantidad` int(10) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `id_producto` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `precio` double NOT NULL,
  `destacado` tinyint(1) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `destacado`, `id_categoria`) VALUES
(1, 'Laxacin', 'Nondisp bimalleol fx r low leg, 7thH', 1.07, 0, 7),
(2, 'CLADOSPORIUM SPHAEROSPERMUM', 'Disp fx of second metatarsal bone, unspecified foot, sequela', 3.39, 0, 6),
(3, 'Terrasil Shingles Treatment', 'Toxic effect of tetrachloroethylene, undetermined', 1.67, 1, 9),
(4, 'QVAR', 'Gastric contents in oth prt resp tract causing asphyx, subs', 3.05, 0, 5),
(5, 'Metoprolol Tartrate', 'Lacerat musc/fasc/tend at thigh level, right thigh, init', 3.93, 0, 10),
(6, 'Guanfacine', 'Oth fx shaft of left tibia, subs for clos fx w malunion', 1.62, 0, 4),
(7, 'Mickey Sun Smacker SPF 24 Classic Strawberry', 'Corrosion of third degree of unspecified thigh, subs encntr', 2.46, 1, 9),
(8, 'SNAIL THERAPY 80 EMULSION', 'Leakage of aortic (bifurcation) graft (replacement)', 2.82, 1, 8),
(9, 'RUE 21 Fallen Vixen Anti Bacterial Hand Sanitizer', 'Unsp fx shaft of left ulna, init for opn fx type 3A/B/C', 1.02, 1, 2),
(10, 'Chloraseptic Sore Throat Liquid Center', 'Other superficial bite of left shoulder, subs encntr', 3.95, 0, 6),
(11, 'Cymbalta', 'Malocclusion, Angle\'s class I', 2.61, 1, 9),
(12, 'allergy', 'Unspecified sprain of right elbow, subsequent encounter', 1.04, 1, 5),
(13, 'Childrens Allergy Relief', 'Other fracture of first lumbar vertebra', 1.54, 0, 5),
(14, 'Risperidone', 'Nondisplaced oblique fracture of shaft of right femur', 1.37, 0, 8),
(15, 'clear days ahead', 'Other specified crystal arthropathies, unspecified hand', 3.52, 0, 7),
(16, 'Gelato Topical Anesthetic', 'Other sprain of right elbow, initial encounter', 3.95, 1, 7),
(17, 'Sure', 'Unsp injury of musc/tend at lower leg level, right leg, init', 1.72, 0, 8),
(18, 'Lyrica', 'Toxic effect of ketones, undetermined', 3.22, 0, 2),
(19, 'LEVAQUIN', 'Diaphragmatic hernia', 1.97, 0, 5),
(20, 'Ringers', 'Bent bone of r ulna, subs for opn fx type 3A/B/C w nonunion', 1.53, 1, 6),
(21, 'BLEPHAMIDE', 'Contusion of lung, bilateral, subsequent encounter', 1.14, 0, 6),
(22, 'Charm Tex Fluoride', 'Military operations involving explosion of marine mine', 1.67, 0, 10),
(23, 'Instant Hand Sanitizer Lemon Drop', 'Prsn brd/alit a 3-whl mv injured in nonclsn trnsp acc, init', 3.76, 0, 9),
(24, 'PF ANTI-BACTERIAL HAND SANITIZING WIPES', 'Unspecified injury of muscle and tendon of head, sequela', 3.96, 1, 2),
(25, 'Metformin Hydrochloride', 'Tox eff of carb monx fr incmpl combst dmst fuel, undet, sqla', 3.4, 0, 1),
(26, 'Alpet E3 Hand Sanitizer Spray', 'Superficial frostbite of unspecified wrist', 3.89, 1, 7),
(27, 'Mometasone Furoate', 'Traumatic hemorrhage of right cerebrum', 2.39, 0, 9),
(28, 'BF-PARADAC', 'Acute contact otitis externa, unspecified ear', 2.68, 1, 7),
(29, 'Perphenazine and Amitriptyline Hydrochloride', 'Carrier of other intestinal infectious diseases', 1.91, 0, 2),
(30, 'Ranitidine', 'Fracture of superior rim of right pubis, init for clos fx', 2.83, 0, 3),
(31, 'Banana', 'Longitudinal reduction defect of ulna, bilateral', 1.15, 1, 9),
(32, 'CY BETTER LIPS BALM Humectante para Labios con col', 'Subluxation stenosis of neural canal of cervical region', 1.96, 1, 1),
(33, 'Keppra', 'Poisoning by unsp hormone antagonists, self-harm, subs', 2.8, 0, 10),
(34, 'Nitrostat', 'Nondisp fx of med condyle of l femr, 7thM', 3.86, 0, 7),
(35, 'KINEVAC', 'Unspecified perforation of tympanic membrane', 1.26, 0, 8),
(36, 'CEDERROTH Emergency Eye Wash', 'Other tear of unsp meniscus, current injury, left knee', 3.98, 0, 6),
(37, 'Cashew', 'Degenerated conditions of globe', 1.03, 1, 4),
(38, 'SeptoSan', 'Accidental malfunction of airgun, sequela', 2.18, 0, 4),
(39, 'Brome Grass', 'Flail joint, wrist', 3.22, 0, 4),
(40, 'Dexamethasone sodium phosphate', 'Occup of hv veh injured in clsn w statnry object nontraf', 2.33, 1, 4),
(41, 'Multi-Symptom Menstrual Pain Relief', 'Inj superficial vein at shldr/up arm, unsp arm', 2.29, 1, 6),
(42, 'Sulfamylon', 'Chronic osteomyelitis with draining sinus, tibia and fibula', 2.53, 0, 9),
(43, 'Malt', 'Type I occipital condyle fracture, unspecified side, sequela', 1.29, 1, 2),
(44, 'Propoxyphene Napsylate and Acetaminophen', 'Primary blast injury of transverse colon, sequela', 3.67, 1, 9),
(45, 'Percogesic Extra Strength', 'Breakdown of breast prosthesis and implant, subs', 3.56, 1, 5),
(46, 'Goose Meat', 'Burn of left eyelid and periocular area, initial encounter', 1.29, 1, 6),
(47, 'hydrocodone bitartrate and acetaminophen', 'Synovial hypertrophy, NEC, unsp shoulder', 2.26, 0, 4),
(48, 'Ciclopirox', 'Nondisp intertroch fx r femur, subs for clos fx w nonunion', 2.69, 0, 4),
(49, 'Bupropion hydrochloride', 'Contusion of bladder, sequela', 2.45, 1, 6),
(50, 'Dicyclomine', 'Underdosing of monoamine-oxidase-inhibitor antidepressants', 3.33, 0, 6),
(51, 'CLE DE PEAU BEAUTE CR COMPACT FOUNDATION', 'Oth comp of fb acc left in body following surgical operation', 3.86, 0, 5),
(52, 'Childrens Allergy', 'Barton\'s fx unsp radius, subs for clos fx w nonunion', 3.38, 0, 8),
(53, 'Pepper Tree Pollen', 'Disp fx of dist phalanx of l less toe(s), 7thD', 2.8, 1, 5),
(54, 'Bactrim DS', 'Unsp opn wnd l bk wl of thorax w/o penet thor cavity, subs', 3.84, 0, 4),
(55, 'ONDANSETRON HYDROCHLORIDE', 'Displaced fracture of navicular of right foot, sequela', 3.66, 0, 5),
(56, 'Lidocaine Hydrochloride and Dextrose', 'Toxic effect of venom of black widow spider, assault, init', 3.84, 0, 6),
(57, 'Risperidone', 'Lac w/o fb of l frnt wl of thorax w penet thor cavity, sqla', 1.99, 1, 9),
(58, 'Neut', 'Interstitial myositis, right lower leg', 2.28, 0, 2),
(59, 'Terbinafine Hydrochloride', 'Duane\'s syndrome, right eye', 1.65, 0, 8),
(60, 'Atorvastatin Calcium', 'Encntr screen for certain developmental disorders in chldhd', 2.67, 1, 2),
(61, 'Actos', 'Meconium ileus in cystic fibrosis', 1.31, 1, 4),
(62, 'ACYCLOVIR', 'Path fx in oth disease, r femur, subs for fx w routn heal', 1.16, 0, 4),
(63, 'loperamide hydrochloride', 'Binge eating disorder', 1.38, 1, 9),
(64, 'Levetiracetam', 'Unsp fracture of unsp talus, subs for fx w malunion', 3.3, 0, 7),
(65, 'Gabapentin', 'Coma scale, best motor response, abnormal, unspecified time', 3.34, 1, 9),
(66, 'Amitriptyline Hydrochloride', 'Unsp physeal fracture of upper end of unspecified femur', 2.64, 1, 8),
(67, 'Primidone', 'Age-rel osteopor w crnt path fx, unsp humer, 7thD', 2.41, 0, 6),
(68, 'Sodum Chloride', 'Other physeal fracture of upper end of humerus, left arm', 2.45, 0, 8),
(69, 'Rite Aid Sensitive Toothpaste Extra Whitening', 'Abnormal level of hormones in specimens from resp org/thrx', 3.05, 0, 2),
(70, 'TRETIN.X', 'Inj unsp musc/fasc/tend at forearm level, unsp arm, subs', 2.1, 1, 6),
(71, 'MORUS ALBA POLLEN', 'Longitudinal reduction defect of left tibia', 1.47, 0, 8),
(72, 'ISOXSUPRINE HYDROCHLORIDE', 'Nondisp fx of lesser tuberosity of r humer, init for opn fx', 3.3, 1, 1),
(73, 'Pioglitazone', 'Puncture wound w/o foreign body of thumb with damage to nail', 2.02, 1, 5),
(74, 'Omeprazole', 'Nondisplaced articular fracture of head of unsp femur, init', 2.52, 1, 7),
(75, 'VANILLA CREAM AND APPLE BLOSSOM ANTIBACTERIAL HAND', 'Chronic mastoiditis, left ear', 1.97, 1, 1),
(76, 'Orange Bliss Antibacterial Foaming Hand Wash', 'Disp fx of posterior column of right acetabulum, sequela', 2.97, 1, 10),
(77, 'PLEO THYM', 'Displ commnt fx shaft of rad, r arm, 7thR', 3.35, 0, 4),
(78, 'Western Family Sport Sunscreen', 'Tension-type headache, unspecified', 2.31, 0, 9),
(79, 'Oxygen', 'Insect bite (nonvenomous), unspecified foot, sequela', 1.46, 1, 3),
(80, 'Norpramin', 'Dislocation of distal interphaln joint of right thumb, subs', 1.11, 0, 3),
(81, 'Clopidogrel', 'Pedl cyc pasngr inj in clsn w rail trn/veh in traf, sequela', 3.17, 0, 6),
(82, 'Diazepam', 'Acute infection fol tranfs,infusn,inject blood/products', 1.15, 1, 3),
(83, 'Muscle Rub Ultra', 'Strain of musc/fasc/tend triceps, right arm, sequela', 2.13, 0, 7),
(84, 'Amoxicillin and Clavulanate Potassium', 'Unspecified physeal fracture of lower end of right fibula', 1.67, 1, 7),
(85, 'good sense anti itch', 'Nondisp fx of low epiphy (separation) of r femr, 7thC', 2.52, 0, 5),
(86, 'Oratox', 'Sprain of unsp collateral ligament of unsp knee, init encntr', 2.13, 0, 8),
(87, 'Geodon', 'Unsp Zone II fracture of sacrum, subs for fx w delay heal', 1.5, 1, 4),
(88, 'Zyprexa', 'Unsp open wound of right cheek and TMJ area, subs', 2.61, 0, 6),
(89, 'Neut', 'Adverse effect of stimulant laxatives', 2.57, 0, 5),
(90, 'CALMING', 'Strain extensor musc/fasc/tend r little finger at forarm lv', 1.59, 1, 2),
(91, 'Cultivated Rye', 'Total traumatic cataract, left eye', 2.05, 1, 10),
(92, 'METOPROLOL TARTRATE', 'Displ unsp condyle fx low end r femr, 7thK', 1.18, 1, 1),
(93, 'Female Stimulant', 'Macrostomia', 2.21, 1, 2),
(94, 'MBM 5 Large Intestine', 'Inj oth blood vessels at shldr/up arm, left arm', 2.43, 1, 7),
(95, 'Lemon Quince Allergy Relief', 'Unspecified dislocation of other finger, sequela', 3.99, 1, 4),
(96, 'ANTIBACTERIAL', 'Displaced trimalleolar fracture of right lower leg, init', 1.45, 1, 8),
(97, 'citalopram hydrobromide', 'Poisoning by thyroid hormones and sub, self-harm, init', 3.74, 0, 9),
(98, 'Xarelto', 'Varicose veins of r low extrem w ulcer of heel and midfoot', 2.62, 0, 3),
(99, 'Trazodone Hydrochloride', 'Idiopathic gout, left hand', 3.41, 1, 3),
(100, 'Levetiracetam', 'Strain of intrinsic musc/fasc/tend unsp finger at wrs/hnd lv', 2.23, 0, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `contrasena` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `contrasena`) VALUES
(1, '', 'ee'),
(2, '', 'hf'),
(3, 'cosmin44', 'hf'),
(4, 'cosmin44', '44'),
(5, 'mm', 'mm'),
(6, 'qq', 'qq');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usuario` (`id_usuario`),
  ADD KEY `fk_productos` (`id_producto`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_categoria` (`id_categoria`);

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `fk_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

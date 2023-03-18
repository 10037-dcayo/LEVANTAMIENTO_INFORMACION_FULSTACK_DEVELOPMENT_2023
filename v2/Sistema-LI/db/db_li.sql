
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";



-- Base de datos: `db_li`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administratives`
--

CREATE TABLE `administratives` (
  `user` varchar(50) COLLATE utf8_spanish2_ci NOT NULL UNIQUE,
  `name` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `surnames` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `cedula` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `id` varchar(18) COLLATE utf8_spanish2_ci NOT NULL,
  `carrera` varchar(80) COLLATE utf8_spanish2_ci NOT NULL,
  `sede` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `celular` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `pass` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `administratives`
--

INSERT INTO `administratives` (`user`, `name`, `surnames`, `date_of_birth`, `cedula`, `id`, `carrera`, `sede`, `email`, `celular`, `pass`, `created_at`, `updated_at`) VALUES
('admin', 'Diego Carpas', 'Carmona Bernal', '1997-04-05', '1600943241', 'L0012312', 'Tecnologias de la Informacion', 'Sangolquí', 'cabernal@espe.edu.ec', '0983525002', 'chiapas123', '2021-12-05 18:33:37', '2022-04-03 06:06:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `attendance`
--

CREATE TABLE `attendance` (
  `id_attendance` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `id_group` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `school_period` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `semester` int(2) NOT NULL,
  `subject` varchar(400) COLLATE utf8_spanish2_ci NOT NULL,
  `user_teacher` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `registered` date NOT NULL,
  `update_registered` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `attendance`
--

INSERT INTO `attendance` (`id_attendance`, `id_group`, `school_period`, `semester`, `subject`, `user_teacher`, `registered`, `update_registered`) VALUES
('xfs980s', 'ADMIN_1205', '2021-1', 1, 'CAL_DIF_01', 'teacher_e94ac', '2021-03-09', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `attendance_details`
--

CREATE TABLE `attendance_details` (
  `id_attendance` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `id_group` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `school_period` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `semester` int(2) NOT NULL,
  `subject` varchar(400) COLLATE utf8_spanish2_ci NOT NULL,
  `user_teacher` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `registered` date NOT NULL,
  `update_registered` date DEFAULT NULL,
  `user_student` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `attend` int(1) NOT NULL DEFAULT '0',
  `tardiness` int(1) NOT NULL DEFAULT '0',
  `absent` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `careers`
--

CREATE TABLE `careers` (
  `career` varchar(20) COLLATE utf8_spanish2_ci NOT NULL UNIQUE,
  `name` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `description` text COLLATE utf8_spanish2_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `careers`
--

INSERT INTO `careers` (`career`, `name`, `description`) VALUES
('IDS', 'Ingeniería en Desarrollo de Software', 'Es la aplicación práctica del conocimiento científico y humanístico al diseño y construcción de programas de computadora, diseñando soluciones de software innovadoras y acordes con el entorno social y empresarial, mediante herramientas, técnicas, tecnologías de usabilidad, base de datos, redes, teleproceso y lenguajes de programación. En Politécnica de Chiapas formamos ingenieros profesionales especializados en el desarrollo de software; capaces de crear, innovar y aplicar la tecnología para ofrecer soluciones en las áreas de la comunicación digital, automatización, negocios, sistemas computacionales, educación, transportes, diversión y entretenimiento.'),
('IEM', 'Ingeniería Mecatrónica', 'En esta Ingeniería se combinan diversas disciplinas como la mecánica, electrónica, computación, y control. Las (os) ingenieros mecatrónicos diseñan, integran y desarrollan diversos productos, mecanismos, equipos, maquinaria y sistemas integrales de automatización, así como la elaboración de análisis y consultorías técnicas en procesos relacionados con las áreas de aplicación de la ingeniería mecatrónica, todo esto con la ayuda de herramientas de hardware y software de vanguardia. En la Politécnica de Chiapas contamos con una formación integral, humana, práctica, teórica, empresarial, que permite a nuestras (os) ingenieros desarrollar e implementar tecnología para ofrecer soluciones que contribuyan a mejorar la calidad de vida de las personas así como optimizar los recursos de las empresas. Para ello, contamos con laboratorios equipados, académicos reconocidos y un programa educativo reconocido por una institución de calidad, CACEI.'),
('INGBIO', 'Ingeniería Biomédica', 'En esta rama de la ingeniería se fusionan aspectos de electrónica, medicina, física, informática, química, biología y matemáticas. Las y los ingenieros biomédicos diseñan, crean, desarrollan, innovan e implementan equipos, dispositivos y sistemas médicos que ofrezcan soluciones tecnológicas y científicas en el área de la salud; así también manejan programas de mejoramiento, administración, operación y conservación de instalaciones y equipo hospitalario. En Politécnica de Chiapas formamos ingenieras (os) biomédicos profesionales y especializados, con valores, capaces de desarrollar, adoptar y aplicar la tecnología para ofrecer soluciones científicas y administrativas integrales en el campo de la salud en nuestro país.'),
('INGPLRA', 'Ingeniería Petrolera', 'El ingeniero petrolero se forma aprovechando de manera sustentable los recursos naturales, atendiendo la preservación del medio ambiente, aplicando para ello las nuevas tecnologías, con habilidades, actitudes, aptitudes analíticas y creativas, de liderazgo y calidad humana, con un espíritu de superación permanente para investigar, desarrollar y aplicar el conocimiento científico y tecnológico. Las y los ingenieros petroleros son profesionistas capaces de atender las necesidades emanadas de los procesos de explotación de hidrocarburos, de agua y de energía geotérmica, a fin de redituar beneficios económicos al país y prever los posibles daños ecológicos al medio ambiente. En la Politécnica de Chiapas formamos ingenieros(as) petroleros de manera profesional, técnica y humana, comprometidos con las necesidades sociales, ambientales y económicas.'),
('MATBASICAS', 'Tronco común', 'El Mejor lider del Mundo'),
('MTABIOTEC', 'Maestría en Biotecnología', 'Mediante la biotecnología, los científicos buscan formas de aprovechar la \"tecnología biológica\" de los seres vivos para generar alimentos más saludables, mejores medicamentos, materiales más resistentes o menos contaminantes, cultivos más productivos, fuentes de energía renovables e incluso sistemas para eliminar la contaminación.\r\n\r\nLas y los maestros en Biotecnología podrán coadyuvar en la incorporación de procesos y técnicas biotecnológicas para la producción y transformación en diferentes sectores socioeconómicos, así también podrán participar en ámbitos académicos, empresariales y de investigación.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `school_periods`
--

CREATE TABLE `school_periods` (
  `school_period` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `active` int(1) NOT NULL,
  `current` int(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `school_periods`
--

INSERT INTO `school_periods` (`school_period`, `name`, `start_date`, `end_date`, `active`, `current`, `created_at`, `updated_at`) VALUES
('2023-SI', 'Enero - Abril 2023', '2023-01-06', '2023-04-09', 1, 0, '2023-12-04 00:57:04', '2023-02-04 06:15:56'),
('2023-SII', 'Abril - Julio 2023', '2023-04-30', '2023-07-23', 1, 0, '2023-10-08 20:38:04', '2023-02-04 06:14:40'),
('2023-SIII', 'Septiembre - Diciembre 2023', '2023-08-30', '2023-12-14', 1, 0, '2023-12-04 00:59:21', '2023-03-13 04:02:16'),
('2022-SI', 'Enero - Abril 2022', '2022-01-03', '2022-04-26', 1, 1, '2022-01-05 05:37:49', '2022-03-13 03:27:59'),
('2022-SII', 'Abril - Julio 2022', '2022-04-27', '2022-07-08', 1, 0, '2022-04-03 05:30:20', '2022-04-03 06:10:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `students`
--

CREATE TABLE `students` (
  `user` varchar(50) COLLATE utf8_spanish2_ci NOT NULL UNIQUE,
  `name` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `surnames` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `sede` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cedula` varchar(18) COLLATE utf8_spanish2_ci NOT NULL,
  `pass` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `id` varchar(13) COLLATE utf8_spanish2_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `career` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `documentation` int(1) NOT NULL,
  `admission_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `students`
--

INSERT INTO `students` (`user`, `name`, `surnames`, `email`,`date_of_birth`, `sede`, `cedula`, `pass`, `id`, `phone`, `address`, `career`, `documentation`, `admission_date`, `created_at`, `updated_at`) values

('stdt-9a13f','Luis Juan','Perez Poteiro','test@espe.edu.ec','1999-01-01','matriz','1730456776','abcd1234','L00391331','0982244691', 'Los tulipanes', 'IDS', '1' ,'2023-03-13','2022-12-04 00:57:04', '2023-02-04 06:15:56'),
('stdt-8b9a5','Simon Antonio','Chevrolet Corsa Zambrano','test2@espe.edu.ec','1999-03-23','stodomingo','1712345678','qwerty12','L00391334','0981122567','Los Caifanes y Cafe tacuba','INGPLRA','1','2023-03-15','2023-03-14 15:07:56','2023-03-14 15:08:41'),
('stdt-c9fe9','Michael Andres','Espinosa Caicedo','test3@espe.edu.ec','2000-12-23','latacunga','1743567889','abcd1234','L00039499','0981122345','la quebrada del centro','INGPLRA','1','2023-03-14','2023-03-13 16:15:26','2023-03-13 16:16:05'),
('stdt-e71e0','Juan Carlos','Duty Salcedo','test4@espe.edu.ec','1999-03-23','matriz','1713457602','abcd1234','L00982331','0987234567','Los Naranjos y Amazonas','IDS','1','2023-03-14','2023-03-13 16:09:08','2023-03-13 16:10:31'),
('stdt-aceb0','Ricardo Alejandro','Jaramillo Salgado','donrichard@espe.edu.ec','1999-03-23','matriz','1750245779','abc12345','L00391334','0983594593','las conchas y cerezos','INGPLRA','1','2023-03-13','2023-03-13 16:01:02','2023-03-13 16:11:01');

SELECT * FROM students



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subjects`
--
CREATE TABLE `subjects` (
  `subject` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `career` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `semester` int(2) NOT NULL,
  `description` text COLLATE utf8_spanish2_ci,
  `user_teachers` text COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `subjects`
--

INSERT INTO `subjects` (`subject`, `career`, `name`, `semester`, `description`, `user_teachers`) VALUES
('CALDIF01', 'MATBASICAS', 'Calculo Diferencial', 9, 'Calculo jsjsjs', 'teacher_e9418,tchr37db23,teacher_e9408,'),
('CALINT', 'IDS', 'Calculo Integral', 1, '', ',teacher_e9443,tchra80e12,teacher_617af,'),
('DESARROLLO', 'MATBASICAS', 'Software', 3, 'jsjsjsj lalalas', 'teacher_e9408,'),
('EDU_FISC01QR', 'MATBASICAS', 'Educación física', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque venenatis lectus at rhoncus faucibus. Etiam sit amet nulla eu tortor luctus semper. Donec egestas leo nisl, at ornare ex tempus id. Nullam at euismod arcu, vitae bibendum risus. Vivamus cursus elit at diam mattis pretium. Maecenas non condimentum justo, et tempor tortor. Nam at mi commodo, euismod enim non, malesuada felis. Proin quis elementum justo. In posuere, nunc vel ultrices sagittis, velit purus viverra augue, posuere scelerisque dolor magna vel nisl. Aliquam in commodo ligula, at mattis ligula. Curabitur et arcu metus. Mauris neque arcu, volutpat quis volutpat a, bibendum ac magna. Duis pellentesque viverra quam eget euismod.\r\n\r\nPhasellus tincidunt posuere faucibus. Sed imperdiet metus ullamcorper enim consequat tempor. Quisque nec lectus facilisis, gravida nisl sit amet, egestas nunc. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vitae turpis massa. Aenean gravida commodo ante a maximus. Sed eget mi ac ante hendrerit molestie. Vivamus feugiat purus sit amet lobortis tempor. Quisque neque libero, ultrices non ex id, venenatis convallis lorem. Suspendisse malesuada erat vel ornare interdum. In hac habitasse platea dictumst.', ',teacher_e9408,'),
('INGBAS01', 'IDS', 'Ingles Básico', 1, 'El idioma inglés (English language o English, pronunciado /ˈɪŋɡlɪʃ/) es una lengua germánica occidental que surgió en los reinos anglosajones de Inglaterra y se extendió hasta el Norte en lo que se convertiría en el sudeste de Escocia, bajo la influencia del Reino de Northumbria.', ',teacher_617af,tchra80e12,teacher_e9443,');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teachers`
--

CREATE TABLE `teachers` (
  `user` varchar(50) COLLATE utf8_spanish2_ci NOT NULL UNIQUE,
  `name` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `surnames` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cedula` varchar(18) COLLATE utf8_spanish2_ci NOT NULL,
  `pass` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `id` varchar(13) COLLATE utf8_spanish2_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `level_studies` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `career` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `teachers`
--

 INSERT INTO `teachers` (`user`, `name`, `surnames`, `date_of_birth`, `gender`, `cedula`, `id`,`pass`, `phone`, `address`, `level_studies`,`email`, `career`, `created_at`, `updated_at`) VALUES
 ('tchr-0daed', 'Luis Miguel', 'Maná Zoé', '2001-04-20', 'hombre', '1750245009', 'qwerty12', 'L00123456','0983594591','Avenida Libertador Simon Bolivar', 'Ingenieria', 'lapapachola@gmail.com','IDS', '2023-04-03 17:35:39', '2023-02-07 12:45:38'),
 ('tchra80e12', 'Pamela Alaba', 'Sánchez Caizahuano', '2022-02-08', 'mujer', '1750245008', 'qwerty12', 'L00123455','0983594592', 'Av. Siempre Viva', 'Licenciatura', 'encebollado1@gmail.com', 'IDS,INGBIO,MATBASICAS,MTABIOTEC', '2022-02-02 00:47:13', '2022-02-07 12:45:38'),
 ('teacher_5c1ca', 'Moisés Pedro', 'Gómez Meléndez', '1996-02-02', 'hombre', '1750245009', 'qwerty12', 'L00123454', '0983594591','Av Eloy Alfaro', 'Ingenieria', 'libertad@hotmail.com', 'IDS,INGPLRA', '2022-02-06 20:37:47', '2022-02-06 20:34:37'),
 ('teacher_e9423', 'Carlos Alberto', 'Marín Roblero', '1987-04-15', 'hombre', '1175024507', 'qwerty12', 'L00123453', '0983594593','Calle E14-97', 'Ingenieria', 'Automata@hotmail.com', 'IDS,IEM,INGBIO,INGPLRA,MATBASICAS,MTABIOTEC', '2022-02-06 20:38:03', '2022-04-03 06:16:28');

-- --------------------------------------------------------



--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `name` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `surnames` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,  
  `email` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `pass` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `permissions` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `image` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `image_updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=UTF8_SPANISH2_CI;

--
-- Volcado de datos para la tabla `users`
--
-- Commit

INSERT INTO `users` (`user`, `name`,`surnames`,`email`, `pass`, `permissions`, `image`, `image_updated_at`, `created_at`, `updated_at`) VALUES
('admin', 'admin', 'admin', 'carmonabernaldiego@gmail.com', 'root', 'admin', 'admin221.png', '2022-02-22 15:18:06', '2021-12-05 18:27:39', '2022-04-03 06:10:34'),
('admineb405',  'admineb405', 'admineb405','magnoliamontejogomez@gmail.com', 'admineb405', 'editor', 'user.png', NULL, '2021-12-04 02:13:36', '2022-03-13 02:59:59'),
('admineb408', 'admineb405', 'admineb405','rosalindamendoza@gmail.com', 'adminec4e9', 'admin', 'user.png', NULL, '2021-08-27 03:41:36', NULL),
('student', 'student', 'student', 'test@gmail.com', 'student', 'student', 'user.png', '2022-02-22 15:18:06', '2021-12-05 18:27:39', '2022-04-03 06:10:34'),
( 'editor', 'editor', 'editor', 'editor@gmail.com', 'editor', 'editor', 'user.png', NULL, '2021-05-01 00:00:00', NULL),
( 'teacher', 'editor', 'editor', 'edit@gmail.com', 'teacher', 'teacher', 'user.png', NULL, '2021-05-01 00:00:00', NULL),
( 'empre', 'editor', 'editor', 'edor@gmail.com', 'empre', 'empre', 'user.png', NULL, '2021-05-01 00:00:00', NULL);



-- db_schoolusers


-- Índices para tablas volcadas
--

--
-- Creacion de Tabla Emprendedores
--
CREATE TABLE `emprendedor` (
  `user` varchar(50) COLLATE utf8_spanish2_ci NOT NULL UNIQUE,
  `name` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `surnames` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cedula` varchar(18) COLLATE utf8_spanish2_ci NOT NULL,
  `pass` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;


INSERT INTO `emprendedor` (`user`,`name`,`surnames`,`date_of_birth`,`gender`,`cedula`,`pass`,`phone`,`address`,`email`,`created_at`,`updated_at`) VALUES
('empre-fa051','Kia Picanto','Salcedo Velez','2000-03-17','mujer','1713905213','qwerty15','0987345672','Ecuatoriana','elpicante@gmail.com','2023-03-17 16:22:33','2023-03-18 16:22:33'),
('empre-fa050','Pedro Alexander','Dominguez Sanchez','2000-04-10','hombre','1713905211','qwerty12','0987345671','Ecuatoriana','metegolgana@gmail.com','2023-03-16 16:22:33','2023-03-18 16:22:33');


SELECT * FROM emprendedor


--
-- Indices de la tabla `administratives`
--
ALTER TABLE `administratives`
  ADD PRIMARY KEY (`user`);

--
-- Indices de la tabla `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id_attendance`);

--
-- Indices de la tabla `attendance_details`
--
ALTER TABLE `attendance_details`
  ADD KEY `FK_attendance_details_attendance` (`id_attendance`);

--
-- Indices de la tabla `careers`
--
ALTER TABLE `careers`
  ADD PRIMARY KEY (`career`);

--
-- Indices de la tabla `school_periods`
--
ALTER TABLE `school_periods`
  ADD PRIMARY KEY (`school_period`);

--
-- Indices de la tabla `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`user`);

--
-- Indices de la tabla `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject`);

--
-- Indices de la tabla `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`user`);
--
-- Indices de la tabla `emprendedor`
--
  
ALTER TABLE `emprendedor`
  ADD PRIMARY KEY (`user`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user`),
  ADD UNIQUE KEY `email` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

/*db_schooldb_schoolemprendedoremprendedorcareersemprendedoremprendedor*/
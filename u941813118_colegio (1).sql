-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 27-02-2025 a las 09:14:00
-- Versión del servidor: 10.11.10-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u941813118_colegio`
--
CREATE DATABASE IF NOT EXISTS `u941813118_colegio` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `u941813118_colegio`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acceso`
--

CREATE TABLE `acceso` (
  `idAcceso` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `rol` enum('superAdmin','admin','editor','usuario') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `idAlumno` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `etapa` enum('INF','PRI','ESO','BACH','PD') DEFAULT NULL,
  `curso` int(11) DEFAULT NULL CHECK (`curso` between 1 and 6),
  `clase` varchar(2) DEFAULT NULL,
  `Actividades_y_Talleres` enum('S','N') DEFAULT NULL,
  `infoColegio` enum('S','N') DEFAULT NULL,
  `Revista_y_Catalogo` enum('S','N') DEFAULT NULL,
  `Web_y_RRSS` enum('S','N') DEFAULT NULL,
  `APA` enum('S','N') DEFAULT NULL,
  `Antiguos_Alumnos` enum('S','N') DEFAULT NULL,
  `Editoriales` enum('S','N') DEFAULT NULL,
  `Escuelas_Catolicas` enum('S','N') DEFAULT NULL,
  `Prensa` enum('S','N') DEFAULT NULL,
  `Orla` enum('S','N') DEFAULT NULL,
  `Examenes_Oficiales` enum('S','N') DEFAULT NULL,
  `reportes` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Disparadores `alumno`
--
DELIMITER $$
CREATE TRIGGER `validar_categoria_alumno` BEFORE INSERT ON `alumno` FOR EACH ROW BEGIN
    
    DECLARE categoria_usuario VARCHAR(50);

    
    SELECT categoria INTO categoria_usuario
    FROM usuario
    WHERE idUsuario = NEW.idUsuario;

    
    IF categoria_usuario != 'Alumno' THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'El usuario no tiene la categoría de Alumno y no puede insertarse en la tabla de alumnos.';
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areaMonitor`
--

CREATE TABLE `areaMonitor` (
  `idareaMonitor` int(11) NOT NULL,
  `nombreArea` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `areaMonitor`
--

INSERT INTO `areaMonitor` (`idareaMonitor`, `nombreArea`) VALUES
(1, 'Fútbol'),
(2, 'Baloncesto'),
(3, 'Voley'),
(4, 'Multideporte'),
(5, 'Música'),
(6, 'Idiomas'),
(7, 'Atletismo'),
(8, 'Otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areaPas`
--

CREATE TABLE `areaPas` (
  `idAreaPas` int(11) NOT NULL,
  `area` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `areaPas`
--

INSERT INTO `areaPas` (`idAreaPas`, `area`) VALUES
(1, 'Secretaria'),
(2, 'Administración'),
(3, 'Mantenimiento'),
(4, 'NN.TT'),
(5, 'Cocina'),
(6, 'Servicios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areaProfesorado`
--

CREATE TABLE `areaProfesorado` (
  `idAreaProfesorado` int(11) NOT NULL,
  `nombreArea` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `areaProfesorado`
--

INSERT INTO `areaProfesorado` (`idAreaProfesorado`, `nombreArea`) VALUES
(1, 'Matematicas'),
(2, 'Ingles'),
(3, 'Historia'),
(4, 'Tecnologia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monitor`
--

CREATE TABLE `monitor` (
  `idMonitor` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `area` int(11) DEFAULT NULL,
  `ciudad` enum('Gijon','Oviedo') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Disparadores `monitor`
--
DELIMITER $$
CREATE TRIGGER `validar_categoria_monitor` BEFORE INSERT ON `monitor` FOR EACH ROW BEGIN
    
    DECLARE categoria_usuario VARCHAR(50);

    
    SELECT categoria INTO categoria_usuario
    FROM usuario
    WHERE idUsuario = NEW.idUsuario;

    
    IF categoria_usuario != 'Monitor' THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'El usuario no tiene la categoría de Monitor y no puede insertarse en la tabla de monitor.';
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pas`
--

CREATE TABLE `pas` (
  `idPas` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `area` int(11) DEFAULT NULL,
  `fotocopiadora` varchar(16) DEFAULT NULL,
  `equipo` enum('chromebook','PC','Tablet','Ninguno') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Disparadores `pas`
--
DELIMITER $$
CREATE TRIGGER `validar_categoria_pas` BEFORE INSERT ON `pas` FOR EACH ROW BEGIN
    
    DECLARE categoria_usuario VARCHAR(50);

    
    SELECT categoria INTO categoria_usuario
    FROM usuario
    WHERE idUsuario = NEW.idUsuario;

    
    IF categoria_usuario != 'Pas' THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'El usuario no tiene la categoría de Pas y no puede insertarse en la tabla de pas.';
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `practica`
--

CREATE TABLE `practica` (
  `idPractica` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `personaAsociada` varchar(50) DEFAULT NULL,
  `equipo` enum('Chromebook','PC','Tablet','Ninguno') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Disparadores `practica`
--
DELIMITER $$
CREATE TRIGGER `validar_categoria_practica` BEFORE INSERT ON `practica` FOR EACH ROW BEGIN
    
    DECLARE categoria_usuario VARCHAR(50);

    
    SELECT categoria INTO categoria_usuario
    FROM usuario
    WHERE idUsuario = NEW.idUsuario;

    
    IF categoria_usuario != 'Practicas' THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'El usuario no tiene la categoría de Practicas y no puede insertarse en la tabla de practicas.';
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `idProfesor` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `area` int(11) DEFAULT NULL,
  `etapa` varchar(50) NOT NULL,
  `fotocopiadora` varchar(10) DEFAULT NULL,
  `equipo` enum('Chromebook','PC','Tablet','Ninguno') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Disparadores `profesor`
--
DELIMITER $$
CREATE TRIGGER `validar_categoria_profesor` BEFORE INSERT ON `profesor` FOR EACH ROW BEGIN
    
    DECLARE categoria_usuario VARCHAR(50);

    
    SELECT categoria INTO categoria_usuario
    FROM usuario
    WHERE idUsuario = NEW.idUsuario;

    
    IF categoria_usuario != 'Profesor' THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'El usuario no tiene la categoría de Profesor y no puede insertarse en la tabla de profesores.';
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido1` varchar(50) NOT NULL,
  `apellido2` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dni` varchar(9) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `comentario` varchar(200) DEFAULT NULL,
  `usuarioActivo` enum('Activo','Inactivo') DEFAULT NULL,
  `categoria` enum('Alumno','Profesor','Pas','Monitor','Practicas') NOT NULL,
  `usuarioWifi` varchar(50) DEFAULT NULL,
  `passwordWifi` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acceso`
--
ALTER TABLE `acceso`
  ADD PRIMARY KEY (`idAcceso`),
  ADD UNIQUE KEY `idUsuario` (`idUsuario`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`idAlumno`),
  ADD UNIQUE KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `areaMonitor`
--
ALTER TABLE `areaMonitor`
  ADD PRIMARY KEY (`idareaMonitor`);

--
-- Indices de la tabla `areaPas`
--
ALTER TABLE `areaPas`
  ADD PRIMARY KEY (`idAreaPas`);

--
-- Indices de la tabla `areaProfesorado`
--
ALTER TABLE `areaProfesorado`
  ADD PRIMARY KEY (`idAreaProfesorado`);

--
-- Indices de la tabla `monitor`
--
ALTER TABLE `monitor`
  ADD PRIMARY KEY (`idMonitor`),
  ADD UNIQUE KEY `idUsuario` (`idUsuario`),
  ADD KEY `fkAreaMonitor` (`area`);

--
-- Indices de la tabla `pas`
--
ALTER TABLE `pas`
  ADD PRIMARY KEY (`idPas`),
  ADD UNIQUE KEY `idUsuario` (`idUsuario`),
  ADD KEY `fkAreaPas` (`area`);

--
-- Indices de la tabla `practica`
--
ALTER TABLE `practica`
  ADD PRIMARY KEY (`idPractica`),
  ADD UNIQUE KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`idProfesor`),
  ADD UNIQUE KEY `idUsuario` (`idUsuario`),
  ADD KEY `fkProfesorArea` (`area`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `dni` (`dni`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acceso`
--
ALTER TABLE `acceso`
  MODIFY `idAcceso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `idAlumno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `areaMonitor`
--
ALTER TABLE `areaMonitor`
  MODIFY `idareaMonitor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `areaPas`
--
ALTER TABLE `areaPas`
  MODIFY `idAreaPas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `areaProfesorado`
--
ALTER TABLE `areaProfesorado`
  MODIFY `idAreaProfesorado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `monitor`
--
ALTER TABLE `monitor`
  MODIFY `idMonitor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pas`
--
ALTER TABLE `pas`
  MODIFY `idPas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `practica`
--
ALTER TABLE `practica`
  MODIFY `idPractica` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `profesor`
--
ALTER TABLE `profesor`
  MODIFY `idProfesor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `acceso`
--
ALTER TABLE `acceso`
  ADD CONSTRAINT `acceso_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE;

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `alumno_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE;

--
-- Filtros para la tabla `monitor`
--
ALTER TABLE `monitor`
  ADD CONSTRAINT `fkAreaMonitor` FOREIGN KEY (`area`) REFERENCES `areaMonitor` (`idareaMonitor`),
  ADD CONSTRAINT `monitor_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pas`
--
ALTER TABLE `pas`
  ADD CONSTRAINT `fkAreaPas` FOREIGN KEY (`area`) REFERENCES `areaPas` (`idAreaPas`),
  ADD CONSTRAINT `pas_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE;

--
-- Filtros para la tabla `practica`
--
ALTER TABLE `practica`
  ADD CONSTRAINT `practica_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE;

--
-- Filtros para la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD CONSTRAINT `fkProfesorArea` FOREIGN KEY (`area`) REFERENCES `areaProfesorado` (`idAreaProfesorado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `profesor_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

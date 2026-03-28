-- =============================================================================
-- Base de datos: gestion_profesoral
-- Descripción: Esquema de la base de datos para el módulo de gestión profesoral
-- =============================================================================

CREATE DATABASE IF NOT EXISTS `db_gestion_profesoral`
    DEFAULT CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE `db_gestion_profesoral`;

-- Tablas principales

CREATE TABLE IF NOT EXISTS `area_conocimiento` (
    `id` VARCHAR(36) NOT NULL DEFAULT UUID(),
    `gran_area` VARCHAR(60) NOT NULL,
    `area` VARCHAR(60) NOT NULL,
    `disciplina` VARCHAR(60) NOT NULL,
    `fecha_borrado` DATETIME DEFAULT NULL,
    `fecha_creacion` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `fecha_actualizacion` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `termino_clave` (
    `id` VARCHAR(36) NOT NULL DEFAULT UUID(),
    `termino` VARCHAR(30) NOT NULL,
    `termino_ingles` VARCHAR(30),
    `fecha_borrado` DATETIME DEFAULT NULL,
    `fecha_creacion` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `fecha_actualizacion` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `linea_investigacion` (
    `id` VARCHAR(36) NOT NULL DEFAULT UUID(),
    `nombre` VARCHAR(100) NOT NULL,
    `descripcion` TEXT NOT NULL,
    `fecha_borrado` DATETIME DEFAULT NULL,
    `fecha_creacion` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `fecha_actualizacion` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `programa` (
    `id` VARCHAR(36) NOT NULL DEFAULT UUID(),
    `nombre` VARCHAR(60) NOT NULL,
    `tipo` VARCHAR(45) NOT NULL,
    `nivel` VARCHAR(45) NOT NULL,
    `fecha_cierre` DATETIME,
    `numero_cohortes` VARCHAR(45) NOT NULL,
    `cant_graduados` VARCHAR(45) NOT NULL,
    `ciudad` VARCHAR(45) NOT NULL,
    `facultad` INT NOT NULL,
    `fecha_borrado` DATETIME DEFAULT NULL,
    `fecha_creacion` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `fecha_actualizacion` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `red` (
    `id` VARCHAR(36) NOT NULL DEFAULT UUID(),
    `nombre` VARCHAR(45) NOT NULL,
    `url` VARCHAR(45) NOT NULL,
    `pais` VARCHAR(45) NOT NULL,
    `fecha_borrado` DATETIME DEFAULT NULL,
    `fecha_creacion` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `fecha_actualizacion` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `rol` (
    `id`  VARCHAR(36) NOT NULL DEFAULT UUID(),
    `nombre` VARCHAR(50) NOT NULL,
    `descripcion` TEXT NOT NULL,
    `activo` TINYINT(1) DEFAULT 1,
    `fecha_creacion` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `fecha_borrado` DATETIME DEFAULT NULL,
    `fecha_actualizacion` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `usuario` (
    `id` VARCHAR(36) NOT NULL DEFAULT UUID(),
    `username` VARCHAR(100) NOT NULL UNIQUE,
    `password` VARCHAR(255) NOT NULL,
    `email` VARCHAR(150) NOT NULL UNIQUE,
    `nombre_completo` VARCHAR(200),
    `activo` TINYINT(1) DEFAULT 1,
    `fecha_creacion` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `fecha_actualizacion` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `usuario_rol` (
    `usuario_id` VARCHAR(36),
    `rol_id` VARCHAR(36),
    PRIMARY KEY (`usuario_id`, `rol_id`),
    FOREIGN KEY (`usuario_id`) REFERENCES `usuario`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`rol_id`) REFERENCES `rol`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB;

INSERT INTO area_conocimiento (id, gran_area, area, disciplina)
VALUES
(UUID(), 'Ingeniería', 'Ingeniería de Sistemas', 'Ciencia de Datos'),
(UUID(), 'Ciencias Sociales', 'Economía', 'Econometría'),
(UUID(), 'Ciencias Naturales', 'Biología', 'Genética'),
(UUID(), 'Ingeniería', 'Ingeniería Industrial', 'Optimización de Procesos'),
(UUID(), 'Humanidades', 'Filosofía', 'Ética');

INSERT INTO termino_clave (id, termino, termino_ingles)
VALUES
(UUID(), 'Datos', 'Data'),
(UUID(), 'Algoritmo', 'Algorithm'),
(UUID(), 'Modelo', 'Model'),
(UUID(), 'Optimización', 'Optimization'),
(UUID(), 'Simulación', 'Simulation');

INSERT INTO linea_investigacion (id, nombre, descripcion)
VALUES
(UUID(), 'Analítica de Datos', 'Estudio y desarrollo de técnicas para el análisis, procesamiento y visualización de datos.'),
(UUID(), 'Inteligencia Artificial', 'Investigación en modelos y algoritmos que permiten a las máquinas aprender y tomar decisiones.'),
(UUID(), 'Optimización de Procesos', 'Diseño y mejora de procesos mediante técnicas matemáticas y computacionales para aumentar la eficiencia.'),
(UUID(), 'Transformación Digital', 'Aplicación de tecnologías digitales para mejorar procesos, servicios y modelos de negocio.'),
(UUID(), 'Sostenibilidad y Medio Ambiente', 'Investigación orientada a la gestión eficiente de recursos y la reducción del impacto ambiental.');

INSERT INTO programa (
    id, nombre, tipo, nivel, fecha_cierre, numero_cohortes, cant_graduados, ciudad, facultad
)
VALUES
(UUID(), 'Ingeniería de Sistemas', 'Académico', 'Pregrado', NULL, '15', '1200', 'Medellín', 1),
(UUID(), 'Maestría en Ciencia de Datos', 'Académico', 'Posgrado', NULL, '8', '320', 'Bogotá', 2),
(UUID(), 'Administración de Empresas', 'Académico', 'Pregrado', NULL, '20', '2500', 'Cali', 3),
(UUID(), 'Especialización en Analítica', 'Académico', 'Posgrado', '2025-12-31 00:00:00', '5', '150', 'Medellín', 2),
(UUID(), 'Ingeniería Industrial', 'Académico', 'Pregrado', NULL, '18', '1800', 'Barranquilla', 1);

INSERT INTO red (id, nombre, url, pais)
VALUES
(UUID(), 'Red Colombiana de Investigación', 'https://www.redcol.org', 'Colombia'),
(UUID(), 'IEEE', 'https://www.ieee.org', 'Estados Unidos'),
(UUID(), 'Red Iberoamericana de Innovación', 'https://www.rii.org', 'España'),
(UUID(), 'ACM', 'https://www.acm.org', 'Estados Unidos'),
(UUID(), 'Red Latinoamericana de Datos', 'https://www.rldatos.org', 'México');

INSERT INTO rol (id, nombre, descripcion, activo)
VALUES
(UUID(), 'Administrador', 'Acceso total al sistema y gestión de usuarios', 1),
(UUID(), 'Coordinador', 'Gestiona programas académicos y líneas de investigación', 1),
(UUID(), 'Docente', 'Registra y actualiza información académica e investigativa', 1),
(UUID(), 'Investigador', 'Participa en proyectos y líneas de investigación', 1),
(UUID(), 'Invitado', 'Acceso limitado solo de consulta', 1);

INSERT INTO usuario (id, username, password, email, nombre_completo, activo)
VALUES
(UUID(), 'admin01', 'pass123', 'admin@uni.edu', 'Administrador General', 1),
(UUID(), 'coord01', 'pass123', 'coord@uni.edu', 'Coordinador Académico', 1),
(UUID(), 'doc01', 'pass123', 'docente@uni.edu', 'Juan Pérez', 1),
(UUID(), 'inv01', 'pass123', 'investigador@uni.edu', 'Ana Gómez', 1),
(UUID(), 'guest01', 'pass123', 'guest@uni.edu', 'Usuario Invitado', 1);

INSERT INTO usuario_rol (usuario_id, rol_id)
VALUES
(
    (SELECT id FROM usuario WHERE username = 'admin01'),
    (SELECT id FROM rol WHERE nombre = 'Administrador')
),
(
    (SELECT id FROM usuario WHERE username = 'coord01'),
    (SELECT id FROM rol WHERE nombre = 'Coordinador')
),
(
    (SELECT id FROM usuario WHERE username = 'doc01'),
    (SELECT id FROM rol WHERE nombre = 'Docente')
),
(
    (SELECT id FROM usuario WHERE username = 'inv01'),
    (SELECT id FROM rol WHERE nombre = 'Investigador')
),
(
    (SELECT id FROM usuario WHERE username = 'guest01'),
    (SELECT id FROM rol WHERE nombre = 'Invitado')
);
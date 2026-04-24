-- =============================================================================
-- Base de datos: gestion_profesoral
-- Descripción: Esquema de la base de datos para el módulo de gestión profesoral
-- =============================================================================

CREATE DATABASE IF NOT EXISTS `db_gestion_profesoral`
    DEFAULT CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE `db_gestion_profesoral`;

-- Tabla area_conocimiento

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

INSERT INTO area_conocimiento (id, gran_area, area, disciplina)
VALUES
(UUID(), 'Ingeniería', 'Ingeniería de Sistemas', 'Ciencia de Datos'),
(UUID(), 'Ciencias Sociales', 'Economía', 'Econometría'),
(UUID(), 'Ciencias Naturales', 'Biología', 'Genética'),
(UUID(), 'Ingeniería', 'Ingeniería Industrial', 'Optimización de Procesos'),
(UUID(), 'Humanidades', 'Filosofía', 'Ética');

-- Tabla termino_clave

CREATE TABLE IF NOT EXISTS `termino_clave` (
    `id` VARCHAR(36) NOT NULL DEFAULT UUID(),
    `termino` VARCHAR(30) NOT NULL,
    `termino_ingles` VARCHAR(30),
    `fecha_borrado` DATETIME DEFAULT NULL,
    `fecha_creacion` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `fecha_actualizacion` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

INSERT INTO termino_clave (id, termino, termino_ingles)
VALUES
(UUID(), 'Datos', 'Data'),
(UUID(), 'Algoritmo', 'Algorithm'),
(UUID(), 'Modelo', 'Model'),
(UUID(), 'Optimización', 'Optimization'),
(UUID(), 'Simulación', 'Simulation');

-- Tabla linea_investigacion

CREATE TABLE IF NOT EXISTS `linea_investigacion` (
    `id` VARCHAR(36) NOT NULL DEFAULT UUID(),
    `nombre` VARCHAR(100) NOT NULL,
    `descripcion` TEXT NOT NULL,
    `fecha_borrado` DATETIME DEFAULT NULL,
    `fecha_creacion` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `fecha_actualizacion` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

INSERT INTO linea_investigacion (id, nombre, descripcion)
VALUES
(UUID(), 'Analítica de Datos', 'Estudio y desarrollo de técnicas para el análisis, procesamiento y visualización de datos.'),
(UUID(), 'Inteligencia Artificial', 'Investigación en modelos y algoritmos que permiten a las máquinas aprender y tomar decisiones.'),
(UUID(), 'Optimización de Procesos', 'Diseño y mejora de procesos mediante técnicas matemáticas y computacionales para aumentar la eficiencia.'),
(UUID(), 'Transformación Digital', 'Aplicación de tecnologías digitales para mejorar procesos, servicios y modelos de negocio.'),
(UUID(), 'Sostenibilidad y Medio Ambiente', 'Investigación orientada a la gestión eficiente de recursos y la reducción del impacto ambiental.');

-- Tabla programa

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

INSERT INTO programa (
    id, nombre, tipo, nivel, fecha_cierre, numero_cohortes, cant_graduados, ciudad, facultad
)
VALUES
(UUID(), 'Ingeniería de Sistemas', 'Académico', 'Pregrado', NULL, '15', '1200', 'Medellín', 1),
(UUID(), 'Maestría en Ciencia de Datos', 'Académico', 'Posgrado', NULL, '8', '320', 'Bogotá', 2),
(UUID(), 'Administración de Empresas', 'Académico', 'Pregrado', NULL, '20', '2500', 'Cali', 3),
(UUID(), 'Especialización en Analítica', 'Académico', 'Posgrado', '2025-12-31 00:00:00', '5', '150', 'Medellín', 2),
(UUID(), 'Ingeniería Industrial', 'Académico', 'Pregrado', NULL, '18', '1800', 'Barranquilla', 1);

-- Tabla red

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

INSERT INTO red (id, nombre, url, pais)
VALUES
(UUID(), 'Red Colombiana de Investigación', 'https://www.redcol.org', 'Colombia'),
(UUID(), 'IEEE', 'https://www.ieee.org', 'Estados Unidos'),
(UUID(), 'Red Iberoamericana de Innovación', 'https://www.rii.org', 'España'),
(UUID(), 'ACM', 'https://www.acm.org', 'Estados Unidos'),
(UUID(), 'Red Latinoamericana de Datos', 'https://www.rldatos.org', 'México');

-- Tabla rol

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

INSERT INTO rol (id, nombre, descripcion, activo)
VALUES
(UUID(), 'Administrador', 'Acceso total al sistema y gestión de usuarios', 1),
(UUID(), 'Coordinador', 'Gestiona programas académicos y líneas de investigación', 1),
(UUID(), 'Docente', 'Registra y actualiza información académica e investigativa', 1),
(UUID(), 'Investigador', 'Participa en proyectos y líneas de investigación', 1),
(UUID(), 'Invitado', 'Acceso limitado solo de consulta', 1);

-- Tabla usuario

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

INSERT INTO usuario (id, username, password, email, nombre_completo, activo)
VALUES
(UUID(), 'admin01', 'pass123', 'admin@uni.edu', 'Administrador General', 1),
(UUID(), 'coord01', 'pass123', 'coord@uni.edu', 'Coordinador Académico', 1),
(UUID(), 'doc01', 'pass123', 'docente@uni.edu', 'Juan Pérez', 1),
(UUID(), 'inv01', 'pass123', 'investigador@uni.edu', 'Ana Gómez', 1),
(UUID(), 'guest01', 'pass123', 'guest@uni.edu', 'Usuario Invitado', 1);

-- Tabla usuario_rol

CREATE TABLE IF NOT EXISTS `usuario_rol` (
    `usuario_id` VARCHAR(36),
    `rol_id` VARCHAR(36),
    PRIMARY KEY (`usuario_id`, `rol_id`),
    FOREIGN KEY (`usuario_id`) REFERENCES `usuario`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`rol_id`) REFERENCES `rol`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB;

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

-- Tabla docente

CREATE TABLE IF NOT EXISTS `docente` (
    `id` VARCHAR(36) NOT NULL DEFAULT UUID(),
    `cedula` VARCHAR(20) NOT NULL,
    `nombres` VARCHAR(50) NOT NULL,
    `apellidos` VARCHAR(50) NOT NULL,
    `genero` VARCHAR(20),
    `cargo` VARCHAR(50),
    `fecha_nacimiento` DATE,
    `correo` VARCHAR(150),
    `telefono` VARCHAR(20),
    `url_cvlac` VARCHAR(255),
    `escalafon` VARCHAR(50),
    `perfil` TEXT,
    `cat_minciencia` VARCHAR(50),
    `conv_minciencia` VARCHAR(50),
    `nacionalidad` VARCHAR(50),
    `linea_investigacion_principal` VARCHAR(36),
    `fecha_borrado` DATETIME DEFAULT NULL,
    `fecha_creacion` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `fecha_actualizacion` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    
    PRIMARY KEY (`id`),
    
    CONSTRAINT `fk_docente_linea_investigacion`
        FOREIGN KEY (`linea_investigacion_principal`)
        REFERENCES `linea_investigacion`(`id`)
        ON DELETE SET NULL
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- Tabla estudios_realizados

CREATE TABLE IF NOT EXISTS `estudios_realizados` (
    `id` VARCHAR(36) NOT NULL DEFAULT UUID(),
    `docente` VARCHAR(36) NOT NULL,
    `titulo` VARCHAR(255) NOT NULL,
    `universidad` VARCHAR(150) NOT NULL,
    `fecha` DATE,
    `tipo` VARCHAR(50),
    `ciudad` VARCHAR(100),
    `pais` VARCHAR(100),
    `ins_acreditada` BOOLEAN,
    `metodologia` VARCHAR(100),
    `perfil_egresado` TEXT,
    `fecha_borrado` DATETIME DEFAULT NULL,
    `fecha_creacion` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `fecha_actualizacion` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    
    PRIMARY KEY (`id`),
    
    CONSTRAINT `fk_estudios_docente`
        FOREIGN KEY (`docente`)
        REFERENCES `docente`(`id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS `docente_departamento` (
    `id` VARCHAR(36) NOT NULL DEFAULT UUID(),
    `docente` VARCHAR(36) NOT NULL,
    `programa` VARCHAR(36) NOT NULL,
    `dedicacion` VARCHAR(50), -- tiempo completo, medio tiempo, cátedra, etc.
    `modalidad` VARCHAR(50),  -- presencial, virtual, híbrido, etc.
    `fecha_ingreso` DATE,
    `fecha_salida` DATE,
    `fecha_borrado` DATETIME DEFAULT NULL,
    `fecha_creacion` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `fecha_actualizacion` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    
    PRIMARY KEY (`id`),

    CONSTRAINT `fk_docente_departamento_docente`
        FOREIGN KEY (`docente`)
        REFERENCES `docente`(`id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE,

    CONSTRAINT `fk_docente_departamento_programa`
        FOREIGN KEY (`programa`)
        REFERENCES `programa`(`id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `intereses_futuros` (
    `id` VARCHAR(36) NOT NULL DEFAULT UUID(),
    `docente` VARCHAR(36) NOT NULL,
    `termino_clave` VARCHAR(36) NOT NULL,
    `fecha_borrado` DATETIME DEFAULT NULL,
    `fecha_creacion` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `fecha_actualizacion` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    PRIMARY KEY (`id`),

    CONSTRAINT `fk_intereses_docente`
        FOREIGN KEY (`docente`)
        REFERENCES `docente`(`id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE,

    CONSTRAINT `fk_intereses_termino`
        FOREIGN KEY (`termino_clave`)
        REFERENCES `termino_clave`(`id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `evaluacion_docente` (
    `id` VARCHAR(36) NOT NULL DEFAULT UUID(),
    `calificacion` DECIMAL(5,2) NOT NULL,
    `semestre` VARCHAR(10) NOT NULL,
    `docente` VARCHAR(36) NOT NULL,
    `fecha_borrado` DATETIME DEFAULT NULL,
    `fecha_creacion` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `fecha_actualizacion` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    PRIMARY KEY (`id`),

    CONSTRAINT `fk_evaluacion_docente`
        FOREIGN KEY (`docente`)
        REFERENCES `docente`(`id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE,

    CONSTRAINT `uq_docente_semestre`
        UNIQUE (`docente`, `semestre`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `reconocimiento` (
    `id` VARCHAR(36) NOT NULL DEFAULT UUID(),
    `tipo` VARCHAR(100) NOT NULL,
    `nombre` VARCHAR(255) NOT NULL,
    `institucion` VARCHAR(150),
    `ambito` VARCHAR(50),
    `fecha` DATE,
    `docente` VARCHAR(36) NOT NULL,
    `fecha_borrado` DATETIME DEFAULT NULL,
    `fecha_creacion` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `fecha_actualizacion` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    PRIMARY KEY (`id`),

    CONSTRAINT `fk_reconocimiento_docente`
        FOREIGN KEY (`docente`)
        REFERENCES `docente`(`id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `experiencia` (
    `id` VARCHAR(36) NOT NULL DEFAULT UUID(),
    `nombre_cargo` VARCHAR(150) NOT NULL,
    `institucion` VARCHAR(150) NOT NULL,
    `tipo` VARCHAR(50), -- académico, administrativo, investigación, etc.
    `fecha_inicio` DATE NOT NULL,
    `fecha_fin` DATE,
    `docente` VARCHAR(36) NOT NULL,
    `fecha_borrado` DATETIME DEFAULT NULL,
    `fecha_creacion` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `fecha_actualizacion` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    PRIMARY KEY (`id`),

    CONSTRAINT `fk_experiencia_docente`
        FOREIGN KEY (`docente`)
        REFERENCES `docente`(`id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `red_docente` (
    `id` VARCHAR(36) NOT NULL DEFAULT UUID(),
    `red` VARCHAR(36) NOT NULL,
    `docente` VARCHAR(36) NOT NULL,
    `fecha_inicio` DATE,
    `fecha_fin` DATE,
    `act_destacadas` TEXT,
    `fecha_borrado` DATETIME DEFAULT NULL,
    `fecha_creacion` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `fecha_actualizacion` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    PRIMARY KEY (`id`),

    CONSTRAINT `fk_red_docente_red`
        FOREIGN KEY (`red`)
        REFERENCES `red`(`id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE,

    CONSTRAINT `fk_red_docente_docente`
        FOREIGN KEY (`docente`)
        REFERENCES `docente`(`id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `estudio_ac` (
    `id` VARCHAR(36) NOT NULL DEFAULT UUID(),
    `estudio` VARCHAR(36) NOT NULL,
    `area_conocimiento` VARCHAR(36) NOT NULL,
    `fecha_borrado` DATETIME DEFAULT NULL,
    `fecha_creacion` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `fecha_actualizacion` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    PRIMARY KEY (`id`),

    CONSTRAINT `fk_estudio_ac_estudio`
        FOREIGN KEY (`estudio`)
        REFERENCES `estudios_realizados`(`id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE,

    CONSTRAINT `fk_estudio_ac_area`
        FOREIGN KEY (`area_conocimiento`)
        REFERENCES `area_conocimiento`(`id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE,

    CONSTRAINT `uq_estudio_area`
        UNIQUE (`estudio`, `area_conocimiento`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `apoyo_profesoral` (
    `id` VARCHAR(36) NOT NULL DEFAULT UUID(),
    `estudio` VARCHAR(36) NOT NULL,
    `con_apoyo` BOOLEAN NOT NULL,
    `institucion` VARCHAR(150),
    `tipo` VARCHAR(100),
    `fecha_borrado` DATETIME DEFAULT NULL,
    `fecha_creacion` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `fecha_actualizacion` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    PRIMARY KEY (`id`),

    CONSTRAINT `fk_apoyo_estudio`
        FOREIGN KEY (`estudio`)
        REFERENCES `estudios_realizados`(`id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `beca` (
    `id` VARCHAR(36) NOT NULL DEFAULT UUID(),
    `estudio` VARCHAR(36) NOT NULL,
    `tipo` VARCHAR(100) NOT NULL,
    `institucion` VARCHAR(150) NOT NULL,
    `fecha_inicio` DATE,
    `fecha_fin` DATE,
    `fecha_borrado` DATETIME DEFAULT NULL,
    `fecha_creacion` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `fecha_actualizacion` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    PRIMARY KEY (`id`),

    CONSTRAINT `fk_beca_estudio`
        FOREIGN KEY (`estudio`)
        REFERENCES `estudios_realizados`(`id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) ENGINE=InnoDB;
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
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `termino_clave` (
    `id` VARCHAR(36) NOT NULL DEFAULT UUID(),
    `termino` VARCHAR(30) NOT NULL,
    `termino_ingles` VARCHAR(30),
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `linea_investigacion` (
    `id` VARCHAR(36) NOT NULL DEFAULT UUID(),
    `nombre` VARCHAR(100) NOT NULL,
    `descripcion` TEXT NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `programa` (
    `id` VARCHAR(36) NOT NULL DEFAULT UUID(),
    `nombre` VARCHAR(60) NOT NULL,
    `tipo` VARCHAR(45) NOT NULL,
    `nivel` VARCHAR(45) NOT NULL,
    `fecha_creacion` DATETIME NOT NULL,
    `fecha_cierre` DATETIME,
    `numero_cohortes` VARCHAR(45) NOT NULL,
    `cant_graduados` VARCHAR(45) NOT NULL,
    `fecha_actualizacion` DATETIME NOT NULL,
    `ciudad` VARCHAR(45) NOT NULL,
    `facultad` INT NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `red` (
    `id` VARCHAR(36) NOT NULL DEFAULT UUID(),
    `nombre` VARCHAR(45) NOT NULL,
    `url` VARCHAR(45) NOT NULL,
    `pais` VARCHAR(45) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;
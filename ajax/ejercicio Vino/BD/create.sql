-- MySQL Workbench Forward Engineering

-- Drop schema if exists Vinoteca
DROP SCHEMA IF EXISTS Vinoteca;

-- Create schema Vinoteca
CREATE SCHEMA IF NOT EXISTS Vinoteca DEFAULT CHARACTER SET utf8;

-- Use schema Vinoteca
USE Vinoteca;

-- Create table Vinos
CREATE TABLE IF NOT EXISTS Vinos (
  codigo VARCHAR(20) PRIMARY KEY,
  nombre VARCHAR(50) NOT NULL,
  tipo VARCHAR(30) NOT NULL,
  anio INT NOT NULL,
  descripcion TEXT
) ENGINE = InnoDB;

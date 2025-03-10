-- Crear base de datos
CREATE DATABASE IF NOT EXISTS concesionario;
USE concesionario;

-- Crear tabla clientes
CREATE TABLE IF NOT EXISTS clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    dni VARCHAR(9) UNIQUE NOT NULL,
    telefono VARCHAR(15),
    email VARCHAR(100)
);

-- Crear tabla autos
CREATE TABLE IF NOT EXISTS autos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    marca VARCHAR(50) NOT NULL,
    modelo VARCHAR(50) NOT NULL,
    matricula VARCHAR(10) UNIQUE NOT NULL,
    precio DECIMAL(10, 2) NOT NULL
);

-- Crear tabla compras
CREATE TABLE IF NOT EXISTS compras (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cliente_id INT,
    auto_id INT,
    fecha DATE NOT NULL,
    FOREIGN KEY (cliente_id) REFERENCES clientes(id),
    FOREIGN KEY (auto_id) REFERENCES autos(id)
);

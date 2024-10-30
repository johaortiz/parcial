-- Comprobar si la base de datos ya existe y crearla si no existe
CREATE DATABASE IF NOT EXISTS jo_blog;

-- Usar la base de datos
USE jo_blog;

-- Comprobar si la tabla jo_users ya existe y crearla si no existe
CREATE TABLE IF NOT EXISTS jo_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'user') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
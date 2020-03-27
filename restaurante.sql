CREATE DATABASE IF NOT EXISTS restaurante DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE restaurante;

CREATE TABLE IF NOT EXISTS cliente (
    email VARCHAR(30) NOT NULL PRIMARY KEY,
    telefono INT UNSIGNED NOT NULL,
    direccion VARCHAR(30),
    ultimo_registro TIMESTAMP
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS reserva (
    num_reserva INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(30) NOT NULL,
    fecha DATE NOT NULL,
    hora TIME NOT NULL,
    comensales INT UNSIGNED NOT NULL,
    fecha_registro TIMESTAMP,
  
    CONSTRAINT fk_email_reserva FOREIGN KEY (email) 
    REFERENCES cliente (email)
    ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS plato (
    id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(40) NOT NULL,
    precio FLOAT UNSIGNED NOT NULL,
    tipo VARCHAR(30) NOT NULL
) ENGINE = InnoDB;

INSERT INTO plato VALUES 
(null, "Ensalada de Ventresca", 7.00, "Entrantes"),
(null, "Croquetas de Pollo", 8.00, "Entrantes"),
(null, "Croquetas de Mixtas", 10.00, "Entrantes"),
(null, "Calamares a la Romana", 11.00, "Entrantes"),
(null, "Patatas Bravas", 6.00, "Entrantes"),
(null, "Ensalada del Rincon", 8.00, "Entrantes"),
(null, "Espaguetis a la Carbonara", 10.00, "Pastas"),
(null, "Macarrones a la Bolonnesa", 10.00, "Pastas"),
(null, "Lasanna de Carne", 12.00, "Pastas"),
(null, "Raviolis de Atun", 10.00, "Pastas"),
(null, "Tallarines orientales tres delicias", 12.00, "Pastas"),
(null, "Secreto Iberico", 12.00, "Carnes"),
(null, "Chuletillas de Lechal", 14.00, "Carnes"),
(null, "Solomillo", 14.00, "Carnes"),
(null, "Brochetas de pollo", 12.00, "Carnes"),
(null, "Pollo con Setas", 8.00, "Carnes"),
(null, "Enrollado de pollo", 10.00, "Carnes"),
(null, "Tiramisu", 5.00, "Postre"),
(null, "Tarta de Queso", 5.00, "Postre"),
(null, "Pastel de Zanahoria", 5.00, "Postre"),
(null, "Tarta Sacher", 5.00, "Postre"),
(null, "Nuggets de pollo", 8.00, "Infantil"),
(null, "Hamburguesa 'El Rincon'", 8.00, "Infantil"),
(null, "Huevo frito con Lomo", 8.00, "Infantil"),
(null, "Merluza", 8.00, "Infantil"),
(null, "Arroz a la Cubana", 8.00, "Infantil");

CREATE TABLE IF NOT EXISTS pedido (
    num_pedido INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(30) NOT NULL,
    
    fecha_registro TIMESTAMP,
  
    CONSTRAINT fk_email_pedido FOREIGN KEY (email) 
    REFERENCES cliente (email)
    ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB;

ALTER USER 'root'@'%' IDENTIFIED WITH mysql_native_password BY 'rootroot';
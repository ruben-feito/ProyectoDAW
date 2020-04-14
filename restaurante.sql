CREATE DATABASE IF NOT EXISTS restaurante DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE restaurante;

CREATE TABLE IF NOT EXISTS cliente (
    email VARCHAR(30) NOT NULL PRIMARY KEY,
    telefono INT UNSIGNED NOT NULL,
    direccion VARCHAR(30),
    ultimo_registro TIMESTAMP
) ENGINE = InnoDB;

INSERT INTO cliente VALUES 
("admin", 0, "admin", null);

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
    id INT UNSIGNED NOT NULL PRIMARY KEY,
    nombre VARCHAR(40) NOT NULL,
    precio FLOAT UNSIGNED NOT NULL,
    tipo VARCHAR(30) NOT NULL
) ENGINE = InnoDB;

INSERT INTO plato VALUES 
(1, "Ensalada de Ventresca", 7.00, "Entrantes"),
(2, "Croquetas de Pollo", 8.00, "Entrantes"),
(3, "Croquetas de Mixtas", 10.00, "Entrantes"),
(4, "Calamares a la Romana", 11.00, "Entrantes"),
(5, "Patatas Bravas", 6.00, "Entrantes"),
(6, "Ensalada del Rincon", 8.00, "Entrantes"),
(7, "Espaguetis a la Carbonara", 10.00, "Pastas"),
(8, "Macarrones a la Bolonnesa", 10.00, "Pastas"),
(9, "Lasanna de Carne", 12.00, "Pastas"),
(10, "Raviolis de Atun", 10.00, "Pastas"),
(11, "Tallarines orientales tres delicias", 12.00, "Pastas"),
(12, "Secreto Iberico", 12.00, "Carnes"),
(13, "Chuletillas de Lechal", 14.00, "Carnes"),
(14, "Solomillo", 14.00, "Carnes"),
(15, "Brochetas de pollo", 12.00, "Carnes"),
(16, "Pollo con Setas", 8.00, "Carnes"),
(17, "Enrollado de pollo", 10.00, "Carnes"),
(18, "Tiramisu", 5.00, "Postre"),
(19, "Tarta de Queso", 5.00, "Postre"),
(20, "Pastel de Zanahoria", 5.00, "Postre"),
(21, "Tarta Sacher", 5.00, "Postre"),
(22, "Nuggets de pollo", 8.00, "Infantil"),
(23, "Hamburguesa El Rincon", 8.00, "Infantil"),
(24, "Huevo frito con Lomo", 8.00, "Infantil"),
(25, "Merluza", 8.00, "Infantil"),
(26, "Arroz a la Cubana", 8.00, "Infantil");

CREATE TABLE IF NOT EXISTS pedido (
    num_pedido INT UNSIGNED NOT NULL PRIMARY KEY,
    email VARCHAR(30) NOT NULL,
    metodo_pago VARCHAR(8) NOT NULL,
    total FLOAT UNSIGNED NOT NULL,
    fecha_registro TIMESTAMP,
    
    CONSTRAINT fk_email_pedido FOREIGN KEY (email) 
    REFERENCES cliente (email)
    ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS desglose_pedido (
    num_pedido INT UNSIGNED NOT NULL,
    id_plato INT UNSIGNED NOT NULL,
    unidades INT NOT NULL,

    PRIMARY KEY (num_pedido, id_plato, unidades),
  
    CONSTRAINT fk_plato_desglose FOREIGN KEY (id_plato) 
    REFERENCES plato (id)
    ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT fk_pedido_desglose FOREIGN KEY (num_pedido) 
    REFERENCES pedido (num_pedido)
    ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB;
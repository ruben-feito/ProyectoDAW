CREATE DATABASE IF NOT EXISTS restaurante DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE restaurante;

CREATE TABLE IF NOT EXISTS cliente (
    email VARCHAR(30) NOT NULL PRIMARY KEY,
    telefono INT UNSIGNED NOT NULL,
    ultimo_registro TIMESTAMP
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS reserva (
    num_reserva INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(30) NOT NULL,
    fecha DATE NOT NULL,
    hora TIME NOT NULL,
    comensales INT UNSIGNED NOT NULL,
    fecha_registro TIMESTAMP,
  
    CONSTRAINT fk_email FOREIGN KEY (email) 
    REFERENCES cliente (email)
    ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB;

ALTER USER 'root'@'%' IDENTIFIED WITH mysql_native_password BY 'rootroot';
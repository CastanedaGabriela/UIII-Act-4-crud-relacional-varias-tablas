DROP DATABASE IF EXISTS ferrari;
CREATE DATABASE IF NOT EXISTS ferrari;
USE ferrari;
CREATE TABLE vehiculo(
	id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
	vin VARCHAR(255) NOT NULL,
	modelo VARCHAR(255) NOT NULL,
	costo DECIMAL(10, 2) NOT NULL, 
	transmision VARCHAR(255) NOT NULL,
	cilindraje VARCHAR(255) NOT NULL,
	color VARCHAR(255) NOT NULL,
	descripcion VARCHAR(255) NOT NULL,
	existencia VARCHAR(255) NOT NULL,
	PRIMARY KEY(id)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;

CREATE TABLE ventas(
	id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
	idcliente VARCHAR(255) NOT NULL,
	transmision VARCHAR(255) NOT NULL,
	idempleado VARCHAR(255) NOT NULL,
	preciototal DECIMAL(10, 2) NOT NULL, 
	fecha DATETIME NOT NULL,
	PRIMARY KEY(id)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;

CREATE TABLE vehiculos_vendidos(
	id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
	id_vehiculo BIGINT UNSIGNED NOT NULL,
	cantidad BIGINT UNSIGNED NOT NULL,
	id_venta BIGINT UNSIGNED NOT NULL,
	PRIMARY KEY(id),
	FOREIGN KEY(id_vehiculo) REFERENCES vehiculo(id) ON DELETE CASCADE,
	FOREIGN KEY(id_venta) REFERENCES ventas(id) ON DELETE CASCADE
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;

INSERT INTO vehiculo(id, vin, modelo, costo, transmision, cilindraje, color, descripcion, existencia) 
VALUES
(1, '1', 'FERRARI1', 15000, 'Manual', 'V10', 'Rojo', 'Super rapido', 100),
(2, '2', 'FERRARI2', 80500, 'Automatico', 'V12', 'Negro', 'Elegante', 100),
(3, '3', 'FERRARI3', 20900, 'Automatico', 'W16', 'Amarillo', 'Muy veloz', 100),
(4, '4', 'FERRARI4', 15200, 'Manual', 'V8', 'Gris', 'Increible', 100),
(5, '5', 'FERRARI5', 8500, 'Automatico', 'V12', 'Azul', 'Clasico', 100);

# Correcto

drop database if exists db_pelicula;
create database db_pelicula;

use db_pelicula;

drop table if exists peliculas;
CREATE TABLE `peliculas` (
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(100) NOT NULL,
	`anio_estreno` INTEGER NOT NULL,
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY(`id`)
);



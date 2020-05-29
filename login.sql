DROP DATABASE IF EXISTS login;
CREATE DATABASE IF NOT EXISTS login;
USE login;

CREATE TABLE IF NOT EXISTS `incidencies` (
	`id` INT AUTO_INCREMENT PRIMARY KEY,
	`nom` VARCHAR(50) NOT NULL,
	`data` DATETIME DEFAULT CURRENT_TIMESTAMP,
	`component` VARCHAR(50) NOT NULL,
	`aula` varchar(55) NOT NULL,
	`descrip` VARCHAR(200) DEFAULT NULL,
	`estat` enum('PENDENT','RESOLTA') DEFAULT 'PENDENT'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `users` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`nom` varchar(50) NOT NULL,
  	`username` varchar(50) NOT NULL,
  	`password` varchar(255) NOT NULL,
  	`email` varchar(100) NOT NULL,
  	`rol` int(1),
    PRIMARY KEY (`id`,`rol`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `rols` (
	`id` int(1) AUTO_INCREMENT,
  	`rol` VARCHAR(15),
  	`descripcio`VARCHAR(50), 
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `rols` (`id`,`rol`, `descripcio`) VALUES (1, 'administrador','Administra la pagina de incidencies');
INSERT INTO `rols` (`id`,`rol`, `descripcio`) VALUES (2, 'gestor','Gestiona la pagina de incidencies');
INSERT INTO `rols` (`id`,`rol`, `descripcio`) VALUES (3, 'professor','Fa incidencies a la pagina de incidencies');


INSERT INTO `users` (`id`,`nom`, `username`, `password`, `email`,`rol`) VALUES (1,'Eric Garcia', 'administrador', 'admin123', 'egarcia@test.com','1');
INSERT INTO `users` (`id`,`nom`,  `username`, `password`, `email`,`rol`) VALUES (2, 'Fernando Suarez','gestor', 'gestor123', 'fsanchez@test.com','2');
INSERT INTO `users` (`id`,`nom`,  `username`, `password`, `email`,`rol`) VALUES (3,'Javier Garcia' ,'professor', 'professor123', 'jgarciatest.com','3');


INSERT INTO `incidencies` (`id`,`nom`, `data`, `component`, `aula`,`descrip`,`estat`) VALUES (1,'administrador',DEFAULT, 'projector', 'Aula musica', 'No funciona correctament el projector de la sala de musica','RESOLTA');
INSERT INTO `incidencies` (`id`,`nom`, `data`, `component`, `aula`,`descrip`,`estat`) VALUES (2,'gestor',DEFAULT, 'impressora', 'Aula informatica', 'La impressora no imprimeix en color','RESOLTA');

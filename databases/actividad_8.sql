DROP DATABASE IF EXISTS actividad_8;
CREATE DATABASE actividad_8;
USE actividad_8;
CREATE TABLE registered_users (
	id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	nickname varchar(20) NOT NULL UNIQUE,
	passW varchar(250) NOT NULL UNIQUE,
	dni varchar(9) NOT NULL UNIQUE,
	email varchar(50) NOT NULL UNIQUE,
	phone varchar(13) NOT NULL UNIQUE,
	address varchar(50) NOT NULL

);
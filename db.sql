CREATE DATABASE the_flash;

USE the_flash;

CREATE TABLE user(
    id int(5) NOT NULL AUTO_INCREMENT,
    email varchar(100) NOT NULL,
    username varchar(50) NOT NULL,
    password varchar(50) NOT NULL,
    role varchar(10) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE film(
    id int(5) NOT NULL AUTO_INCREMENT,
    nama varchar(50) NOT NULL,
    tahun varchar(4),
    sinopsis text,
    PRIMARY KEY (id)
);
CREATE DATABASE the_flash;

USE the_flash;

CREATE TABLE user(
    id_user int(11) NOT NULL AUTO_INCREMENT,
    email varchar(100) NOT NULL,
    username varchar(100) NOT NULL,
    password varchar(100) NOT NULL,
    role varchar(50) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE film(
    id_film int(11) NOT NULL AUTO_INCREMENT,
    nama_film varchar(100) NOT NULL,
    tahun int(4),
    sinopsis text,
    poster varchar(300),
    banner varchar(300),
    link varchar(300) NOT NULL,
    PRIMARY KEY (id)
);
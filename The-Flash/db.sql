CREATE DATABASE the_flash;

USE the_flash;

CREATE TABLE `user`(
    id_user int(11) NOT NULL PRIMARY KEY,
    email varchar(255) NOT NULL UNIQUE,
    username varchar(255) NOT NULL UNIQUE,
    password varchar(255) NOT NULL,
    role varchar(50) NOT NULL,
);

CREATE TABLE `film`(
    id_film int(11) NOT NULL PRIMARY KEY,
    nama_film varchar(255) NOT NULL,
    info varchar(255),
    sinopsis text,
    poster varchar(255),
    banner varchar(255),
    link varchar(255) NOT NULL,
);

CREATE TABLE `comic`(
    id_comic int(11) NOT NULL PRIMARY KEY,
    nama_comic varchar(255) NOT NULL,
    tahun int(4),
    sinopsis text,
    poster varchar(255),
    link varchar(255) NOT NULL,
);

ALTER TABLE `user`
    MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

ALTER TABLE `film`
    MODIFY `id_film` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

ALTER TABLE `comic`
    MODIFY `id_comic` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;
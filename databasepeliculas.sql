create database peliculas;
use peliculas;
create table pelicula(idPelicula INT NOT NULL AUTO_INCREMENT, nombre VARCHAR(100) NOT NULL, img VARCHAR(200), activo TINYINT(1) NOT NULL, PRIMARY KEY(idPelicula));

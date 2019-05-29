drop database if exists base_datos;
create database base_datos;
use base_datos;

create table socios(
	socios_id int not null auto_increment primary key,
	dni varchar(20) not null,
	nombres varchar(50) not null,
	apellidos varchar(50) not null,
	telefono varchar(13) not null,
	direccion varchar(30) not null,
	directores_favoritos varchar(30) not null,
	generos_favoritos varchar(30) not null
);

create table peliculas(
	peliculas_id int not null auto_increment primary key,
	dni varchar(20) not null,
	nombre varchar(50) not null,
	directores varchar(30) not null,
	actores varchar(30) not null,
	numero_de_cinta int(11) null
);

create table generos(
	generos_id int not null auto_increment primary key,
	id_peliculas int(11) not null,
	genero varchar(30) not null,
	foreign key(id_peliculas) references peliculas(peliculas_id)
);

create table actores(
	actores_id int not null auto_increment primary key,
	id_peliculas int(11) not null,
	nombre varchar(50) not null,
	genero varchar(10) null,
	director varchar(10) null,
	foreign key(id_peliculas) references peliculas(peliculas_id)
);

create table maneja(
	manejar_id int(11) not null auto_increment primary key,
	id_generos int(11) not null,
	id_actores int(11) not null,
	id_peliculas int(11) not null,
	unique(id_generos,id_actores,id_peliculas),
	foreign key(id_generos) references generos(generos_id),
	foreign key(id_actores) references actores(actores_id),
	foreign key(id_peliculas) references peliculas(peliculas_id)
);

create table video_club(
	video_id int(11) not null auto_increment primary key,
    	nombre_club varchar(20) not null,
    	id_peliculas int(11) not null,
	id_socios int(11) not null,
	id_manejar int(11) not null,
	foreign key(id_peliculas) references peliculas(peliculas_id),
	foreign key(id_socios) references socios(socios_id),
	foreign key(id_manejar) references maneja(manejar_id)
);
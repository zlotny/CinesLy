drop database if exists CinesLy;
create database CinesLy;
use CinesLy;

drop table if exists contiene;
drop table if exists evento;
drop table if exists sesion;
drop table if exists comenta;
drop table if exists pelicula;
drop table if exists agrega;
drop table if exists usuario;

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
CREATE DATABASE `CinesLy` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci;
USE `CinesLy`;

create table usuario(
    nombreUsuario	varchar(20)	not null,
    email		varchar(50)	primary key,
    pass		varchar(20)	not null,
    foto			varchar(50),
    preferencia1	varchar(20),
    preferencia2	varchar(20),
    preferencia3	varchar(20),
    estado		varchar(20),
    ciudadActual	varchar(20),
    fechaNacimiento	date,
    tipoUsuario	int	not null,
    eslogan		varchar(140)
);


create table agrega(
    email1       varchar(50),
    email2       varchar(50),
    estado       int, 
    
    primary key(email1,email2),
    foreign key(email1) references usuario(email) on delete cascade on update cascade,
    foreign key(email2) references usuario(email) on delete cascade on update cascade
);


create table pelicula(
	idPelicula int not null auto_increment,
	titulo        	varchar(50),
	director    	varchar(50),
	distribuidora    	varchar(50),
	duracion    	varchar(10),
	sinopsis    	varchar(500),
	actores    	varchar(200),
	anho        	year,
	fecha_estreno	date,
	genero    	varchar(50),
	pais        	varchar(20),
	votos    	int,
	valoracion    	int,
	tipo        	enum('cartelera','especial','proximamente') not null,
	cont_valoracion	int,
	foto                     	varchar(500),

	primary key(idPelicula)
);


create table comenta(
  	idPelicula   int,
    email		varchar(50),
    comentario       	varchar(140), 
    fecha		datetime,
    
    primary key(idPelicula,email,comentario),
    foreign key(idPelicula) references pelicula(idPelicula) on delete cascade on update cascade,
    foreign key(email) references usuario(email) on delete cascade on update cascade
);


create table sesion(
	idPelicula         	int not null,
	idSesion           	int not null auto_increment,
	fecha    	datetime,
	sala        	int,
	capacidad    	int,

	primary key(idSesion),
	foreign key(idPelicula) references pelicula(idPelicula) on delete cascade on update cascade
	);

create table evento(
	id_evento    	int not null auto_increment,    
	idSesion      	int not null,
	email    	varchar(50) not null,
	descripcion    	varchar(140),
	nombre     	varchar(20) not null,   
 
	primary key(id_evento),
	foreign key(idSesion) references  sesion (idSesion) on delete cascade on update cascade,
	foreign key(email) references usuario(email) on delete cascade on update cascade
   );



  create table contiene(
  id_evento	int not null,
  email		varchar(50),
  primary key(id_evento, email),
  foreign key(id_evento) references evento(id_evento) on delete cascade on update cascade,
  foreign key(email) references usuario (email) on delete cascade on update cascade
  );



drop table contiene;
drop table evento;
drop table sesion;
drop table comenta;
drop table pelicula;
drop table agrega;
drop table usuario;



create table usuario(
    nombreUsuario	varchar(20)	not null,
    email		varchar(50)	primary key,
    pass		varchar(10)	not null,
    foto			varchar(50),
    preferencia1	varchar(20),
    preferencia2	varchar(20),
    preferencia3	varchar(20),
    estado		varchar(20),
    ciudad_actual	varchar(20),
    fecha_nacimiento	date,
    tipol	int	not null,
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
    titulo			varchar(50),
    director		varchar(50),
    distribuidora		varchar(50),
    duracion		varchar(10), /*time*/
    sinopsis		varchar(500),
    actores		varchar(200),
    año			year,
    fecha_estreno	date,
    genero		varchar(20),
    pais			varchar(20),
    votos		int,
    valoracion		int,
    tipo			varchar(20) not null,
    cont_valoracion	int,


primary key(titulo,director)
);

create table comenta(
    titulo       		varchar(50),
    director       		varchar(50),
    email		varchar(50),
    comentario       	varchar(140), 
    
    primary key(titulo,director,email),
    foreign key(titulo,director) references pelicula(titulo,director) on delete cascade on update cascade,
     foreign key(email) references usuario(email) on delete cascade on update cascade
);



create table sesion(
    titulo			varchar(50),
    director		varchar(50),
    fecha		datetime,
    sala			int,
    capacidad		int,

    primary key(titulo,director,fecha,sala),
    foreign key(titulo,director) references pelicula(titulo,director) on delete cascade on update cascade
    );

create table evento(
    id_evento		varchar(10),    
    titulo			varchar(50),
    director		varchar(50),
    fecha_sesion	datetime,
    sala			int,
    email		varchar(50),
    descripcion		varchar(140),
    nombre 		varchar(20),	
    primary key(id_evento),
    foreign key(titulo,director,fecha_sesion,sala) references  sesion(titulo,director,fecha,sala) on delete cascade on update cascade,
    foreign key(email) references usuario(email) on delete cascade on update cascade
   );


  create table contiene(
  id_evento	varchar(10),
  email		varchar(50),
  primary key(id_evento, email),
  foreign key(id_evento) references evento(id_evento) on delete cascade on update cascade,
  foreign key(email) references usuario (email) on delete cascade on update cascade
  );

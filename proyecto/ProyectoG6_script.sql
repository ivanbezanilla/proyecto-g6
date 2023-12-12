# Una pequeña academia de pintura con recursos económicos mínimos necesita buscar una solución económica y 
# segura para mantener operativa una aplicación pequeña de administración y una pequeña nube de almacenamiento para los archivos de la academia 
# Se deberá crear una pequeña base de datos con acceso desde una aplicación realizada en PHP o Python para dar solución a la parte administrativa de la academia.
#inicio del script
start transaction;

#database
drop database if exists paprm;
create database paprm;
use paprm;

#tables
# profesor
drop table if exists profesor;
create table profesor (
	id int auto_increment unique not null,
    nombre varchar(55) not null,
    apellidos varchar(55) not null,
    email varchar(255) not null unique,
    pass varchar (255) not null,
		primary key (id)
);

#alumno
drop table if exists alumno;
create table alumno (
    id int auto_increment unique not null,
    nombre varchar(55) not null,
    apellidos varchar(55) not null,
	email varchar(255) not null unique,
    pass varchar(255) not null,
		primary key (id)
);

#clase
drop table if exists clase;
create table clase (
    id int auto_increment unique not null,
    fecha date not null,
    hora time not null,
    capacidad int not null,
    profesor int,
		primary key (id),
		foreign key (profesor) references profesor(id)
        on update cascade
        on delete cascade
);

#alumno-clase debido a relación
drop table if exists alumnoclase;
create table alumnoclase (
    alumno_id int,
    clase_id int,
		primary key (alumno_id, clase_id),
		foreign key (alumno_id) references alumno(id),
		foreign key (clase_id) references clase(id)
		on update cascade
		on delete cascade
);
insert into alumno 
values (default, 'testalumno', 'testalumno', 'test@profesor', 'testalumno');
insert into profesor
values (default, 'testprofesor', 'testprofesor', 'test@alumno','testprofesor');
commit;
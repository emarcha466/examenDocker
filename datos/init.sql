CREATE DATABASE IF NOT EXISTS cestaDB;

USE cestaDB;

create table cesta(
	nombre varchar(20) primary key,
    correo varchar(100),
    jamon varchar(2)
);

insert into cesta values ('manolo','ejmc00@gmail.com','no'),
                ('emilio','ejmc00@gmail.com','si'),
                ('silverio','ejmc00@gmail.com','si');
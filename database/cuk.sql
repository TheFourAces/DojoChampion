CREATE DATABASE  cuk;
use cuk;
CREATE TABLE torneo (
    idTorneo INT(2) PRIMARY KEY,
    fecha DATE NOT NULL
);

CREATE TABLE competidor (
    ci  int(8)PRIMARY KEY NOT NULL,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL, 
    fnac DATE NOT NULL,
   sexo char(1) NOT NULL,
   categoria varchar(30) not null);
   
   CREATE TABLE juez  (
    ci  int(8) PRIMARY KEY NOT NULL,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL, 
	contraseña VARCHAR(50) NOT NULL,
	numeroJuez int(1) NOT NULL
   );
   
      CREATE TABLE administrativo  (
    ci  int PRIMARY KEY NOT NULL,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL, 
	contraseña VARCHAR(50) NOT NULL
   );

      CREATE TABLE dojo  (
    nombreDeDojo VARCHAR(50) PRIMARY KEY NOT NULL,
	cantidadCompetidores int  NOT NULL
   );
   
   CREATE TABLE kata (
	numeroKata int primary key NOT NULL,
    nombreKata varchar(50) NOT NULL
   );
   
   CREATE TABLE ronda(
	id_ronda int primary key NOT NULL 
   );
   
   
INSERT INTO torneo (idTorneo, fecha) VALUES (1, '2023-11-11');


INSERT INTO administrativo (ci, nombre, apellido, contraseña)
VALUES
(11111111, 'diego', 'ferandnez', '1234'),
(22222222, 'david', 'aleman', '1234');

INSERT INTO dojo(nombreDeDojo, cantidadCompetidores)
VALUES ('lexus', 5);


   INSERT INTO juez (ci, nombre, apellido, contraseña, numeroJuez)
VALUES
(33333333, 'diego', 'protasio', '1234', 1),
(44444444, 'juan', 'perez', '1234', 2);

INSERT INTO competidor (ci, nombre, apellido, fnac, sexo,categoria)
VALUES
(55555555, 'chao', 'leoin', '2001-03-12', 'M','sub-22'),
(66666666, 'ignacio', 'rodriguez', '2001-04-15', 'M','sub-22'),
(77777777, 'lucia', 'perez', '2004-007-31', 'F','sub-20');

select * from administrativo;
select * from juez;
select * from dojo;
select * from competidor;





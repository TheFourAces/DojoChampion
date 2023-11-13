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
	id int(1) PRIMARY KEY NOT NULL
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
CREATE TABLE pool(
	id_pool int primary key NOT NULL,
   ci_competidor int NOT NULL;
);
   
   
INSERT INTO torneo (idTorneo, fecha) VALUES 
(1, '2023-11-11');


INSERT INTO administrativo (ci, nombre, apellido, contraseña)
VALUES
(11111111, 'diego', 'fernandez', '1234'),
(22222222, 'david', 'aleman', '1234');

INSERT INTO dojo(nombreDeDojo, cantidadCompetidores)
VALUES ('lexus', 5);

INSERT INTO juez (id)
VALUES
(1),
(2),
(3),
(4),
(5),


INSERT INTO competidor (ci, nombre, apellido, fnac, sexo, categoria)
VALUES
(55555555, 'chao', 'leoin', '2001-03-12', 'M','mayores'),
(66666666, 'ignacio', 'rodriguez', '2001-04-15', 'M','mayores'),
(77777777, 'lucia', 'perez', '2004-007-31', 'F','mayores'),
(01239002, 'kristen', 'yaguaron', '2000-007-31', 'F','mayores'),
(81239892, 'nacho', 'vallejo', '1999-007-31', 'M','mayores'),
(92938129, 'lucas', 'gonzalez', '2004-007-31', 'M','mayores');

INSERT INTO `kata` (`numeroKata`, `nombreKata`) VALUES
(1, 'Anan'),
(2, 'Anan Dai'),
(3, 'Ananko'),
(4, 'Aoyagi'),
(5, 'Bassai'),
(6, 'Bassai Dai'),
(7, 'Bassai Sho'),
(8, 'Chatanyara Kusanku'),
(9, 'Chibana No Kushanku'),
(10, 'Chinte'),
(11, 'Chinto'),
(12, 'Enpi'),
(13, 'Fukyugata Ichi'),
(14, 'Fukyugata Ni'),
(15, 'Gankaku'),
(16, 'Garyu'),
(17, 'Gekisai (Geksai) 1'),
(18, 'Gekisai (Geksai) 2'),
(19, 'Gojushiho'),
(20, 'Gojushiho Dai'),
(21, 'Gojushiho Sho'),
(22, 'Hakusho'),
(23, 'Hangetsu'),
(24, 'Haufa (Haffa)'),
(25, 'Heian Shodan'),
(26, 'Heian Nidan'),
(27, 'Heian Sandan'),
(28, 'Heian Yondan'),
(29, 'Heian Godan'),
(30, 'Heiku'),
(31, 'Ishimine Bassai'),
(32, 'Itosu Rohai Shodan'),
(33, 'Itosu Rohai Nidan'),
(34, 'Itosu Rohai Sandan'),
(35, 'Jiin'),
(36, 'Jion'),
(37, 'Jitte'),
(38, 'Juroku'),
(39, 'Kanchin'),
(40, 'Kanku Dai'),
(41, 'Kanku Sho'),
(42, 'Kanshu'),
(43, 'Kishimono No Kushanku'),
(44, 'Kousoukun'),
(45, 'Kousoukun Dai'),
(46, 'Kousoukun Sho'),
(47, 'Kururunfa'),
(48, 'Kusanku'),
(49, 'Kyan No Chinto'),
(50, 'Kyan No Wanshu'),
(51, 'Matsukaze'),
(52, 'Matsumura Bassai'),
(53, 'Matsumura Rohai'),
(54, 'Meikyo'),
(55, 'Myojo'),
(56, 'Naifanchin Shodan'),
(57, 'Naifanchin Nidan'),
(58, 'Naifanchin Sandan'),
(59, 'Naihanchi'),
(60, 'Nijushiho'),
(61, 'Nipaipo'),
(62, 'Niseishi'),
(63, 'Ohan'),
(64, 'Ohan Dai'),
(65, 'Oyadomari No Passai'),
(66, 'Pachu'),
(67, 'Paiku'),
(68, 'Papuren'),
(69, 'Passai'),
(70, 'Pinan Shodan'),
(71, 'Pinan Nidan'),
(72, 'Pinan Sandan'),
(73, 'Pinan Yondan'),
(74, 'Pinan Godan'),
(75, 'Rohai'),
(76, 'Saifa'),
(77, 'Sanchin'),
(78, 'Sansai'),
(79, 'Sanseiru'),
(80, 'Sanseru'),
(81, 'Seichin'),
(82, 'Seienchin (Seiyunchin)'),
(83, 'Seipai'),
(84, 'Seiryu'),
(85, 'Seishan'),
(86, 'Seisan (Sesan)'),
(87, 'Shiho Kousoukun'),
(88, 'Shinpa'),
(89, 'Shinsei'),
(90, 'Shisochin'),
(91, 'Sochin'),
(92, 'Suparinpei'),
(93, 'Tekki Shodan'),
(94, 'Tekki Nidan'),
(95, 'Tekki Sandan'),
(96, 'Tensho'),
(97, 'Tomari Bassai'),
(98, 'Unshu'),
(99, 'Unsu'),
(100, 'Useishi'),
(101, 'Wankan'),
(102, 'Wanshu');
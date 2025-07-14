CREATE TABLE USUARIO(
id int PRIMARY KEY AUTO_INCREMENT,
nombre char NOT NULL,
apellido char NOT NULL,
direccion char(100) NOT NULL,
telefono int(10) NOT NULL,
email char NOT NULL,
password char(40) NOT NULL,--Sugerencia MySQL
permiso char NOT NULL,
);

CREATE TABLE PEDIDO(
id in PRIMARY KEY AUTO_INCREMENT,
fecha date() NOT NULL,--Consultar formado de fecha
precio_total float NOT NULL,
cargo_domicilio char NOT NULL, --Validar este campo con Naye
);

CREATE TABLE CONTIENE( --lleva llave foranea
id int PRIMARY KEY AUTO_INCREMENT,
cantidad int NOT NULL,
precio float NOT NULL,
);

CREATE TABLE PRODUCTOS(
id int PRIMARY KEY AUTO_INCREMENT,
nombre char NOT NULL,
precio float NOT NULL,
descripcion char(100),
tamanio char() NOT NULL, -- EJEM 'C', 'M', 'G'
);

CREATE TABLE CATEGORIA(
id in PRIMARY KEY AUTO_INCREMENT,
nombre char NOT NULL,
);

CREATE TABLE INVENTARIO(
id in PRIMARY KEY AUTO_INCREMENT,
nombre char NOT NULL,
stock int NOT NULL,
fecha_caducidad date() NOT NULL,--Consultar formado de fecha
fecha_entrada date() NOT NULL,--Consultar formado de fecha
tipo_almacenamiento char NOT NULL,
);
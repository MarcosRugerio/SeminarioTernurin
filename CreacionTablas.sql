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

CREATE TABLE PRODUCTOS(
id int PRIMARY KEY AUTO_INCREMENT,
nombre char NOT NULL,
precio float NOT NULL,
descripcion char(100),
tamanio char() NOT NULL, -- EJEM 'C', 'M', 'G'
);

-- INSERTS de 100 productos aleatorios
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Crema Antiarrugas 1', 40.77, 'Para todo tipo de piel', 'M');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Aceite Facial 2', 71.82, 'Con colágeno', 'M');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Exfoliante 3', 74.66, 'Con colágeno', 'C');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Exfoliante 4', 21.69, 'Para todo tipo de piel', 'G');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Sérum Facial 5', 98.94, 'Con ácido hialurónico', 'G');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Mascarilla 6', 36.71, 'Protección UV', 'M');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Aceite Facial 7', 26.13, 'Con extracto natural', 'C');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Tónico Facial 8', 72.69, 'Con ácido hialurónico', 'C');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Crema Hidratante 9', 13.33, 'Hidratación profunda', 'G');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Exfoliante 10', 58.28, 'Con ácido hialurónico', 'G');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Limpiador Facial 11', 56.19, 'Revitalizante', 'M');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Bálsamo Labial 12', 19.55, 'Con colágeno', 'M');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Limpiador Facial 13', 14.92, 'Revitalizante', 'C');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Limpiador Facial 14', 5.02, 'Protección UV', 'G');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Gel Antiacné 15', 96.79, 'Reafirmante', 'C');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Limpiador Facial 16', 96.58, 'Con extracto natural', 'C');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Crema Antiarrugas 17', 71.2, 'Protección UV', 'M');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Crema Hidratante 18', 69.96, 'Hidratación profunda', 'M');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Protector Solar 19', 23.83, 'Con ácido hialurónico', 'M');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Mascarilla 20', 94.22, 'Con ácido hialurónico', 'M');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Sérum Facial 21', 37.41, 'Con colágeno', 'M');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Sérum Facial 22', 42.44, 'Revitalizante', 'G');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Gel Antiacné 23', 6.14, 'Sin fragancia', 'G');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Gel Antiacné 24', 58.82, 'Con colágeno', 'C');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Gel Antiacné 25', 5.3, 'Con extracto natural', 'C');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Gel Antiacné 26', 12.1, 'Uso diario', 'C');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Crema Hidratante 27', 60.5, 'Reafirmante', 'C');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Gel Antiacné 28', 26.15, 'Hidratación profunda', 'G');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Protector Solar 29', 22.52, 'Sin fragancia', 'G');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Bálsamo Labial 30', 61.06, 'Con extracto natural', 'M');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Aceite Facial 31', 16.7, 'Para piel sensible', 'G');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Tónico Facial 32', 95.73, 'Con extracto natural', 'G');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Gel Antiacné 33', 10.8, 'Con ácido hialurónico', 'C');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Exfoliante 34', 53.6, 'Revitalizante', 'C');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Gel Antiacné 35', 30.24, 'Uso diario', 'G');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Exfoliante 36', 19.65, 'Hidratación profunda', 'G');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Aceite Facial 37', 27.49, 'Sin fragancia', 'M');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Aceite Facial 38', 92.55, 'Con colágeno', 'G');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Crema Hidratante 39', 19.86, 'Reafirmante', 'C');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Mascarilla 40', 83.18, 'Para todo tipo de piel', 'C');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Exfoliante 41', 16.53, 'Revitalizante', 'C');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Sérum Facial 42', 5.39, 'Reafirmante', 'M');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Crema Antiarrugas 43', 55.43, 'Reafirmante', 'M');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Sérum Facial 44', 23.73, 'Revitalizante', 'G');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Gel Antiacné 45', 39.89, 'Con ácido hialurónico', 'G');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Contorno de Ojos 46', 82.58, 'Protección UV', 'M');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Protector Solar 47', 31.76, 'Sin fragancia', 'M');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Protector Solar 48', 75.59, 'Con extracto natural', 'C');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Gel Antiacné 49', 44.99, 'Libre de parabenos', 'G');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Tónico Facial 50', 18.13, 'Hidratación profunda', 'G');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Tónico Facial 51', 59.95, 'Uso diario', 'C');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Crema Hidratante 52', 5.41, 'Con ácido hialurónico', 'C');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Mascarilla 53', 39.88, 'Libre de parabenos', 'M');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Protector Solar 54', 37.5, 'Protección UV', 'G');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Crema Antiarrugas 55', 58.89, 'Hidratación profunda', 'G');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Tónico Facial 56', 9.24, 'Reafirmante', 'M');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Bálsamo Labial 57', 39.99, 'Revitalizante', 'M');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Limpiador Facial 58', 76.29, 'Hidratación profunda', 'M');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Bálsamo Labial 59', 40.36, 'Para piel sensible', 'C');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Crema Hidratante 60', 15.96, 'Con colágeno', 'M');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Contorno de Ojos 61', 69.77, 'Protección UV', 'M');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Tónico Facial 62', 18.26, 'Revitalizante', 'G');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Contorno de Ojos 63', 7.67, 'Sin fragancia', 'M');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Gel Antiacné 64', 32.26, 'Con ácido hialurónico', 'C');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Sérum Facial 65', 96.03, 'Con ácido hialurónico', 'M');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Crema Antiarrugas 66', 80.73, 'Uso diario', 'C');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Crema Hidratante 67', 40.57, 'Con extracto natural', 'C');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Crema Hidratante 68', 70.87, 'Con ácido hialurónico', 'G');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Gel Antiacné 69', 75.59, 'Con colágeno', 'M');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Protector Solar 70', 13.16, 'Protección UV', 'G');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Mascarilla 71', 19.25, 'Hidratación profunda', 'C');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Contorno de Ojos 72', 83.52, 'Para piel sensible', 'M');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Aceite Facial 73', 81.63, 'Sin fragancia', 'C');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Exfoliante 74', 83.63, 'Reafirmante', 'C');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Gel Antiacné 75', 60.69, 'Revitalizante', 'C');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Crema Antiarrugas 76', 57.6, 'Reafirmante', 'M');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Sérum Facial 77', 9.6, 'Con extracto natural', 'G');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Limpiador Facial 78', 37.72, 'Para piel sensible', 'M');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Crema Hidratante 79', 65.66, 'Revitalizante', 'M');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Bálsamo Labial 80', 10.17, 'Libre de parabenos', 'C');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Contorno de Ojos 81', 97.28, 'Libre de parabenos', 'M');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Aceite Facial 82', 46.76, 'Revitalizante', 'C');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Gel Antiacné 83', 85.63, 'Libre de parabenos', 'M');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Tónico Facial 84', 18.55, 'Con ácido hialurónico', 'C');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Tónico Facial 85', 50.05, 'Uso diario', 'G');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Crema Hidratante 86', 80.95, 'Libre de parabenos', 'M');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Bálsamo Labial 87', 50.07, 'Con ácido hialurónico', 'M');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Bálsamo Labial 88', 17.5, 'Con extracto natural', 'M');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Limpiador Facial 89', 85.09, 'Sin fragancia', 'C');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Mascarilla 90', 50.78, 'Libre de parabenos', 'M');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Tónico Facial 91', 17.2, 'Revitalizante', 'M');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Sérum Facial 92', 71.78, 'Sin fragancia', 'G');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Bálsamo Labial 93', 16.58, 'Uso diario', 'G');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Gel Antiacné 94', 75.18, 'Con colágeno', 'M');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Contorno de Ojos 95', 48.33, 'Reafirmante', 'C');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Sérum Facial 96', 26.62, 'Para piel sensible', 'C');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Aceite Facial 97', 84.97, 'Reafirmante', 'G');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Contorno de Ojos 98', 33.71, 'Para todo tipo de piel', 'G');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Protector Solar 99', 83.83, 'Con extracto natural', 'G');
INSERT INTO PRODUCTOS (nombre, precio, descripcion, tamanio) VALUES ('Crema Antiarrugas 100', 18.11, 'Sin fragancia', 'C');

CREATE TABLE CONTIENE( --lleva llave foranea
id int PRIMARY KEY AUTO_INCREMENT,
cantidad int NOT NULL,
precio float NOT NULL,
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

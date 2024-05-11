CREATE DATABASE minegocio;
USE minegocio;

CREATE TABLE Usuarios (
   cedula_u INT PRIMARY KEY,
   nombre_u VARCHAR(50),
   apellido_u VARCHAR(50),
   telefono BIGINT,
   direccion VARCHAR(50)
);

CREATE TABLE Productos (
   id_producto INT PRIMARY KEY,
   nombre_pr VARCHAR(50),
   precio INT
);

CREATE TABLE Carrito (
   id_carrito INT PRIMARY KEY,
   cedula_u INT,
   FOREIGN KEY (cedula_u) REFERENCES Usuarios(cedula_u)
);

CREATE TABLE Ventas (
   id_venta INT PRIMARY KEY,
   id_producto INT,
   id_carrito INT,
   fecha_venta TIMESTAMP,
   valor_venta INT,
   FOREIGN KEY (id_producto) REFERENCES Productos(id_producto),
   FOREIGN KEY (id_carrito) REFERENCES Carrito(id_carrito)
);

CREATE TABLE Registros (
   numero_registro INT PRIMARY KEY,
   id_venta INT,
   cantidad_productos_vendidos INT,
   precio_venta_total INT,
   fecha_registro TIMESTAMP,
   FOREIGN KEY (id_venta) REFERENCES Ventas(id_venta)
);


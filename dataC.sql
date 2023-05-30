CREATE DATABASE Facturacion;

use Facturacion;

CREATE TABLE Categoria(
    Categoria_Id INTEGER PRIMARY KEY AUTO_INCREMENT,
    Categoria_Nombre VARCHAR(255) NOT NULL,
    Descripcion VARCHAR(255) NOT NULL,
    Imagen LONGBLOB NOT NULL

);

CREATE TABLE Clientes(
    Cliente_Id INT PRIMARY KEY AUTO_INCREMENT,
    Celular VARCHAR(100) NOT NULL,
    Compañia VARCHAR(90) NOT NULL
);

CREATE TABLE Empleado(
    Empleado_Id INT PRIMARY KEY AUTO_INCREMENT,
    Empleado_Nombre VARCHAR(100) NOT NULL,
    Mobile VARCHAR(100) NOT NULL,
    Direccion VARCHAR(100) NOT NULL,
    Imagen VARCHAR (500) NOT NULL
);

CREATE TABLE Facturas(
    Facturas_Id INT PRIMARY KEY AUTO_INCREMENT,
    Empleado_Id INT,
    Cliente_Id INT,
    Fecha VARCHAR(100) NOT NULL,
    FOREIGN KEY (Empleado_Id) REFERENCES Empleado(Empleado_Id),
    FOREIGN KEY (Cliente_Id) REFERENCES Clientes(Cliente_Id)
);

CREATE TABLE facturaDetalle(
    FacturasD_Id INT PRIMARY KEY AUTO_INCREMENT,
    Facturas_Id INT,
    Productos_Id INT,
    Cantidad VARCHAR (100) NOT NULL,
    PrecioVenta VARCHAR (100) NOT NULL,
    FOREIGN KEY (Facturas_Id) REFERENCES Facturas(Facturas_Id),
    FOREIGN KEY (Productos_Id) REFERENCES Productos(Productos_Id)
);


CREATE TABLE Productos(
    Productos_Id INTEGER PRIMARY KEY AUTO_INCREMENT,
    Categoria_Id INTEGER,
    Precio_Unitario VARCHAR (100) NOT NULL,
    Stock VARCHAR (100) NOT NULL,
    UnidadesPedidas VARCHAR (100) NOT NULL,
    Proveedor_Id INTEGER,
    Productos_Nombre VARCHAR (100) NOT NULL,
    Descontinuado VARCHAR (500) NOT NULL,
    FOREIGN KEY (Categoria_Id) REFERENCES Categoria(Categoria_Id),
    FOREIGN KEY (Proveedor_Id) REFERENCES Proveedor(Proveedor_Id)
);

CREATE TABLE Proveedor(
    Proveedor_Id INTEGER PRIMARY KEY AUTO_INCREMENT,
    Proveedor_Nombre VARCHAR (100) NOT NULL,
    Telefono VARCHAR (100) NOT NULL,
    Ciudad VARCHAR (100) NOT NULL
);
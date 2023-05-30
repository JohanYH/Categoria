<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);
require_once("db.php");

    class Categoria{
        private $Categoria_Id;
        private $Categoria_Nombre;
        private $Descripcion;
        private $Imagen;
        protected $dbCnx;

        public function __construct($Categoria_Id = 0, $Categoria_Nombre = "", $Descripcion = "", $Imagen = "")
        {
            $this->Categoria_Id = $Categoria_Id;
            $this->Categoria_Nombre = $Categoria_Nombre;
            $this->Descripcion = $Descripcion;
            $this->Imagen = $Imagen;
            $this->dbCnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
            
        }

        public function setCategoria_Id($Categoria_Id)
        {
            $this->Categoria_Id = $Categoria_Id;
        }

        public function getCategoria_Id()
        {
            $this->Categoria_Id;
        }

        public function setCategoria_Nombre($Categoria_Nombre)
        {
            $this->Categoria_Nombre = $Categoria_Nombre;
        }

        public function getCategoria_Nombre()
        {
            $this->Categoria_Nombre;
        }

        public function setDescripcion($Descripcion)
        {
            $this->Descripcion = $Descripcion;
        }

        public function getDescripcion()
        {
            $this->Descripcion;
        }    

        public function setImagen($Imagen)
        {
            $this->Imagen = $Imagen;
        }

        public function getImagen()
        {
            $this->Imagen;
        }

        public function insertCategoria()
        {
            try {
                $stm = $this-> dbCnx -> prepare("INSERT INTO Categoria (Categoria_Nombre,Descripcion, Imagen) values (?,?,?)");
                $stm -> execute([$this->Categoria_Nombre, $this->Descripcion, $this->Imagen]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function selectCategoriaAll()
        {
            try {
                $stm = $this-> dbCnx -> prepare("SELECT * FROM Categoria");
                $stm -> execute();
                return $stm->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        //Eliminar

        public function delete()
        {
            try {
                $stm = $this->dbCnx->prepare ("DELETE FROM Categoria WHERE Categoria_Id =?");
                $stm -> execute([$this->Categoria_Id]);
                return $stm -> fetchAll();
                echo "<script>alert('Ha sido Borrado Exitosamente');document.location='../CategoriasCrud/categorias.php'</script>";
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }


        //Editar Categoria

        public function selectOneCategoria()
        {
            try {
                $stm = $this-> dbCnx -> prepare("SELECT * FROM Categoria WHERE Categoria_Id=?");
                $stm -> execute([$this->Categoria_Id]);
                return $stm->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function updateCategoria()
        {
            try {
                $stm = $this-> dbCnx -> prepare("UPDATE Categoria SET Categoria_Nombre = ?, Descripcion = ?, Imagen = ?  WHERE Categoria_Id=?");
                $stm -> execute([$this->Categoria_Nombre,$this->Descripcion, $this->Imagen,$this->Categoria_Id]);
                
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    }

    //Clientes

    class Clientes{
        private $Cliente_Id;
        private $Celular;
        private $Compañia;
        protected $dbCnx;
        public function __construct($Cliente_Id = 0, $Celular ="", $Compañia = "")
        {
            $this->Cliente_Id = $Cliente_Id;
            $this->Celuar = $Celular;
            $this->Compañia = $Compañia;
            $this->dbCnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
            
        }
        public function setCliente_Id($Cliente_Id)
        {
            $this->Cliente_Id = $Cliente_Id;
        }

        public function getCliente_Id()
        {
            $this->Cliente_Id;
        }

        public function setCelular($Celular)
        {
            $this->Celular = $Celular;
        }

        public function getCelular()
        {
            $this->Celular;
        }

        public function setCompañia($Compañia)
        {
            $this->Compañia = $Compañia;
        }

        public function getCompañia()
        {
            $this->Compañia;
        }

        public function insertCliente()
        {
            try {
                $stm = $this-> dbCnx -> prepare ("INSERT INTO Clientes (Cliente_Id, Celular, Compañia) values(?,?,?)");
                $stm -> execute([$this->Cliente_Id, $this->Celular, $this->Compañia]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function selectClienteAll()
        {
            try {
                $stm = $this-> dbCnx -> prepare ("SELECT * FROM Clientes");
                $stm ->execute();
                return $stm ->fetchAll();
            }  catch (Exception $e) {
                return $e->getMessage();
            }
        }

        //Eliminar Cliente 

        public function delete()
        {
            try {
                $stm = $this->dbCnx->prepare ("DELETE FROM Clientes WHERE Cliente_Id = ?");
                $stm -> execute([$this->Cliente_Id]);
                return $stm -> fetchAll();
                echo "<script>alert('Ha sido Borrado Exitosamente');document.location='../Clientes/clientes.php'</script>";
                
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        //Editar Cliente

        public function selectOneCliente()
        {
            try {
                $stm = $this-> dbCnx -> prepare( "SELECT * FROM Clientes WHERE Cliente_Id = ?");
                $stm -> execute ([$this->Cliente_Id]);
                return $stm -> fetchAll();
            }   catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function updateCliente()
        {
            try {
                $stm = $this-> dbCnx ->prepare ("UPDATE Clientes SET Celular = ?, Compañia = ? , Cliente_Id = ?");
                $stm -> execute([$this->Celular, $this-> Compañia,$this->Cliente_Id ]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    }
    ini_set("display_errors", 1);

    ini_set("display_startup_errors", 1);

    error_reporting(E_ALL);

    class Empleados{
        private $Empleado_Id;
        private $Empleado_Nombre;
        private $Mobile;
        private $Direccion;
        private $Imagen;
        protected $dbCnx;
        public function __construct($Empleado_Id = 0, $Empleado_Nombre = "", $Mobile = "", $Direccion = "", $Imagen = "")
        {
            $this->Empleado_Id = $Empleado_Id;
            $this->Empleado_Nombre = $Empleado_Nombre;
            $this->Mobile = $Mobile;
            $this->Direccion = $Direccion;
            $this->Imagen = $Imagen;
            $this->dbCnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
        }

        public function setEmpleado_Id($Empleado_Id)
        {
            $this->Empleado_Id = $Empleado_Id;
        }

        public function getEmpleado_Id()
        {
            $this->Empleado_Id;
        }

        public function setEmpleado_Nombre($Empleado_Nombre)
        {
            $this->Empleado_Nombre = $Empleado_Nombre;
        }

        public function getEmpleado_Nombre()
        {
            $this->Empleado_Nombre;
        }

        public function setMobile($Mobile)
        {
            $this->Mobile = $Mobile;
        }

        public function getMobile()
        {
            $this->Mobile;
        }

        public function setDireccion($Direccion)
        {
            $this->Direccion = $Direccion;
        }

        public function getDireccion()
        {
            $this->Direccion;
        }

        public function setImagen($Imagen)
        {
            $this->Imagen = $Imagen;
        }

        public function getImagen()
        {
            $this->Imagen;
        }

        public function insertEmpleado()
        {
            try {
                $stm = $this-> dbCnx -> prepare("INSERT INTO Empleado (Empleado_Nombre, Mobile, Direccion, Imagen) values(?,?,?,?)");
                $stm -> execute([$this->Empleado_Nombre, $this->Mobile, $this->Direccion, $this->Imagen]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function selectEmpleadoAll()
        {
            try {
                $stm = $this-> dbCnx -> prepare("SELECT * FROM Empleado");
                $stm -> execute();
                return $stm->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

    }

    class Factura{
        private $Facturas_Id;
        private $Empleado_Id;
        private $Cliente_Id;
        private $Fecha;
        protected $dbCnx;

        public function __construct($Facturas_Id = 0, $Empleado_Id = 0, $Cliente_Id = 0, $Fecha = "")
        {
            $this->Facturas_Id = $Facturas_Id;
            $this->Empleado_Id = $Empleado_Id;
            $this->Cliente_Id = $Cliente_Id;
            $this->Fecha = $Fecha;
            $this->dbCnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
        }

        public function setFacturas_Id($Facturas_Id)
        {
            $this->FActuras_Id = $Facturas_Id;
        }

        public function getFacturas_Id()
        {
            $this->Facturas_Id;
        }

        public function setEmpleado_Id($Empleado_Id)
        {
            $this->Empleado_Id = $Empleado_Id;
        }

        public function getEmpleado_Id()
        {
            $this->Empleado_Id;
        }

        public function setCliente_Id($Cliente_Id)
        {
            $this->Cliente_Id = $Cliente_Id;
        }

        public function getCliente_Id()
        {
            $this->Cliente_Id;
        }

        public function setFecha($Fecha)
        {
            $this->Fecha = $Fecha;
        }

        public function getFecha()
        {
            $this->Fecha;
        }

        public function insertFactura()
        {
            try {
                $stm = $this->dbCnx->prepare("INSERT INTO Facturas (Facturas_Id, Empleado_Id, Cliente_Id, Fecha) values(?,?,?,?)");
                $stm->execute([$this->Facturas_Id, $this->Empleado_Id, $this->Cliente_Id, $this->Fecha]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function selectFacturaAll()
        {
            try {
                $stm = $this->dbCnx->prepare("SELECT Facturas.Facturas_Id, Empleado.Empleado_Nombre, Clientes.Compañia, Facturas.Fecha FROM Facturas 
                INNER JOIN Empleado ON Facturas.Empleado_Id = Empleado.Empleado_Id
                INNER JOIN Clientes ON Facturas.Cliente_Id = Clientes.Cliente_Id");
                
                $stm->execute();
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function selectFacturaOne()
        {
            try {
                $stm = $this->dbCnx->prepare("SELECT Facturas.Facturas_Id, Empleado.Empleado_Nombre, Clientes.Compañia, Facturas.Fecha FROM Facturas 
                INNER JOIN Empleado ON Facturas.Empleado_Id = Empleado.Empleado_Id
                INNER JOIN Clientes ON Facturas.Cliente_Id = Clientes.Cliente_Id
                WHERE Facturas.Facturas_Id = ?;");
                
                $stm->execute([$this->Facturas_Id]);
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

    }

    class FacturaDetalle{
        private $FacturasD_Id;
        private $Facturas_Id;
        private $Productos_Id;
        private $Cantidad;
        private $PrecioVenta;
        protected $dbCnx;

        public function __construct($FacturasD_Id = 0, $Facturas_Id = 0, $Productos_Id = 0, $Cantidad = "", $PrecioVenta = "")
        {
            $this->FacturasD_Id = $FacturasD_Id;
            $this->Facturas_Id = $Facturas_Id;
            $this->Productos_Id = $Productos_Id;
            $this->Cantidad = $Cantidad;
            $this->PrecioVenta = $PrecioVenta;
            $this->dbCnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
        }

        public function setFacturasD_Id($FacturasD_Id)
        {
            $this->FacturasD_Id = $FacturasD_Id;
        }

        public function getFacturasD_Id()
        {
            $this->FacturasD_Id;
        }

        public function setFacturas_Id($Facturas_Id)
        {
            $this->Facturas_Id = $Facturas_Id;
        }

        public function getFacturas_Id()
        {
            $this->Facturas_Id;
        }

        public function setProductos_Id($Productos_Id)
        {
            $this->Productos_Id = $Productos_Id;
        }

        public function getProductos_Id()
        {
            $this->Productos_Id;
        }

        public function setCantidad($Cantidad)
        {
            $this->Cantidad = $Cantidad;
        }

        public function getCantidad()
        {
            $this->Cantidad;
        }

        public function setPrecioVenta($PrecioVenta)
        {
            $this->PrecioVenta = $PrecioVenta;
        }

        public function getPrecioVenta()
        {
            $this->PrecioVenta;
        }

        public function insertFacturaD()
        {
            try {
                $stm = $this->dbCnx->prepare("INSERT INTO facturaDetalle (FacturasD_Id,Facturas_Id, Productos_Id, Cantidad, PrecioVenta ) values(?,?,?,?,?)");
                $stm->execute([$this->FacturasD_Id, $this->Facturas_Id, $this->Productos_Id, $this->Cantidad,$this->PrecioVenta]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function selectFacturaDAll()
        {
            try {
                $stm = $this->dbCnx->prepare("SELECT facturaDetalle.FacturasD_Id, Facturas.Fecha, Productos.Productos_Nombre, facturaDetalle.Cantidad, facturaDetalle.PrecioVenta FROM facturaDetalle 
                INNER JOIN Facturas ON facturaDetalle.Facturas_Id = Facturas.Facturas_Id
                INNER JOIN Productos ON facturaDetalle.Productos_Id = Productos.Productos_Id");
                $stm->execute();
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
        
    }

    class Proveedor{
        private $Proveedor_Id;
        private $Proveedor_Nombre;
        private $Telefono;
        private $Ciudad;
        protected $dbCnx;

        public function __construct($Proveedor_Id = 0, $Proveedor_Nombre = "", $Telefono = "", $Ciudad = "")
        {
            $this->Proveedor_Id = $Proveedor_Id;
            $this->Proveedor_Nombre = $Proveedor_Nombre;
            $this->Telefono = $Telefono;
            $this->Ciudad = $Ciudad;
            $this->dbCnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
        }

        public function setProveedor_Id($Proveedor_Id)
        {
            $this->Proveedor_Id = $Proveedor_Id;
        }

        public function getProveedor_Id()
        {
            $this->Proveedor_Id;
        }

        public function setProveedor_Nombre($Proveedor_Nombre)
        {
            $this->Proveedor_Nombre = $Proveedor_Nombre;
        }

        public function getProveedor_Nombre()
        {
            $this->Proveedor_Nombre;
        }

        public function setTelefono($Telefono)
        {
            $this->Telefono = $Telefono;
        }

        public function getTelefono()
        {
            $this->Telefono;
        }

        public function setCiudad($Ciudad)
        {
            $this->Ciudad = $Ciudad;
        }

        public function getCiudad()
        {
            $this->Ciudad;
        }

        public function insertProveedor()
        {
            try {
                $stm = $this-> dbCnx -> prepare("INSERT INTO Proveedor (Proveedor_Nombre, Telefono, Ciudad) values(?,?,?)");
                $stm -> execute([$this->Proveedor_Nombre, $this->Telefono, $this->Ciudad]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function selectProveedorAll()
        {
            try {
                $stm = $this-> dbCnx -> prepare("SELECT * FROM Proveedor");
                $stm -> execute();
                return $stm->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

    }

   

    class Productos {
        private $Productos_Id;
        private $Categoria_Id;
        private $Precio_Unitario;
        private $Stock;
        private $UnidadesPedidas;
        private $Proveedor_Id;
        private $Productos_Nombre;
        private $Descontinuado;
        protected $dbCnx;

        public function __construct($Productos_Id = 0, $Categoria_Id = 0, $Precio_Unitario = "", $Stock = "", $UnidadesPedidas = "", $Proveedor_Id = 0, $Productos_Nombre = "", $Descontinuado = "")
        {
            $this->Productos_Id = $Productos_Id;
            $this->Categoria_Id = $Categoria_Id;
            $this->Precio_Unitario = $Precio_Unitario;
            $this->Stock = $Stock;
            $this->UnidadesPedidas = $UnidadesPedidas;
            $this->Proveedor_Id = $Proveedor_Id;
            $this->Productos_Nombre = $Productos_Nombre;
            $this->Descontinuado = $Descontinuado;
            $this->dbCnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
        }

        public function setProductos_Id($Productos_Id)
        {
            $this->Productos_Id = $Productos_Id;
        }

        public function getProductos_Id()
        {
            $this->Productos_Id;
        }

        public function setCategoria_Id($Categoria_Id)
        {
            $this->Categoria_Id = $Categoria_Id;
        }

        public function getCategoria_Id()
        {
            $this->Categoria_Id;
        }

        public function setPrecio_Unitario($Precio_Unitario)
        {
            $this->Precio_Unitario = $Precio_Unitario;
        }
        
        public function getPrecio_Unitario()
        {
            $this->Precio_Unitario;
        }

        public function setStock($Stock)
        {
            $this->Stock = $Stock;
        }

        public function getStock()
        {
            $this->Stock;
        }

        public function setUnidadesPedidas($UnidadesPedidas)
        {
            $this->UnidadesPedidas = $UnidadesPedidas;
        }
        
        public function getUnidadesPedidas()
        {
            $this->UnidadesPedidas;
        }

        public function setProveedor_Id($Proveedor_Id)
        {
            $this->Proveedor_Id = $Proveedor_Id;
        }
        
        public function getProveedor_Id()
        {
            $this->Proveedor_Id;
        }

        public function setProductos_Nombre($Productos_Nombre)
        {
            $this->Productos_Nombre = $Productos_Nombre;
        }
        
        public function getProductos_Nombre()
        {
            $this->Productos_Nombre;
        }

        public function setDescontinuado($Descontinuado)
        {
            $this->Descontinuado = $Descontinuado;
        }
        
        public function getDescontinuado()
        {
            $this->Descontinuado;
        }

        public function insertProductos()
        {
            try {
                $stm = $this->dbCnx->prepare("INSERT INTO Productos (Productos_Id, Categoria_Id, Precio_Unitario, Stock, UnidadesPedidas,Proveedor_Id, Productos_Nombre, Descontinuado ) values(?,?,?,?,?,?,?,?)");
                $stm->execute([$this->Productos_Id, $this->Categoria_Id, $this->Precio_Unitario, $this->Stock,$this->UnidadesPedidas,$this->Proveedor_Id,$this->Productos_Nombre,$this->Descontinuado]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function selectProductosAll()
        {
            try {
                $stm = $this->dbCnx->prepare("SELECT Productos.Productos_Id, Categoria.Categoria_Nombre, Productos.Precio_Unitario, Productos.Stock, Productos.UnidadesPedidas, Proveedor.Proveedor_Nombre, Productos.Productos_Nombre, Productos.Descontinuado  FROM Productos 
                INNER JOIN Categoria ON Productos.Categoria_Id = Categoria.Categoria_Id
                INNER JOIN Proveedor ON Productos.Proveedor_Id = Proveedor.Proveedor_Id");
                $stm->execute();
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

    }

    
?>
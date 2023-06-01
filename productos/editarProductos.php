<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

require_once("../Config/config.php");
require_once("../Login/LoginU.php");

session_start();

$datos = new Productos();

$Productos_Id = $_GET["Productos_Id"];
$datos -> setProductos_Id($Productos_Id);
$record = $datos ->selectOneProductos();
$val = $record[0]; 

$categoria = $datos->selectCategoria();
$proveedor = $datos->selectProveedor();

if (isset($_POST["editar"])) {

    $datos->setCategoria_Id($_POST["Categoria_Id"]);
    $datos->setPrecio_Unitario($_POST["Precio_Unitario"]);
    $datos->setStock($_POST["Stock"]);
    $datos->setUnidadesPedidas($_POST["UnidadesPedidas"]);
    $datos->setProveedor_Id($_POST["Proveedor_Id"]);
    $datos->setProductos_Nombre($_POST["Productos_Nombre"]);
    $datos->setDescontinuado($_POST["Descontinuado"]);

    $datos->updateProductos();
    echo "<script>alert('Los Datos Editados ha sido Exitosamente');document.location='../productos/productos.php'</script>";
}


?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Actualizar Cliente</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">


  <link rel="stylesheet" type="text/css" href="../css/estudiantes.css">

</head>

<body>
  <div class="contenedor">

    <div class="parte-izquierda">

      <div class="perfil">
        <h3 style="margin-bottom: 2rem;">Camp Skiler.</h3>
        <img src="../images/ana.png" alt="" class="imagenPerfil">
        <h3><?php echo $_SESSION["UserName"]?></h3>
      </div>
      <div class="menus">
        <a href="#" style="display: flex;gap:2px;">
          <i class="bi bi-house-door"> </i>
          <h3 style="margin: 0px;font-weight: 800;">Editar</h3>
        </a>
        <a href="proveedor.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 800;">Productos</h3>
        </a>
      </div>
    </div>

    <div class="parte-media">
        <h2 class="m-2">Productos Editar</h2>
      <div class="menuTabla contenedor2">
      <form class="col d-flex flex-wrap" action=""  method="post">
              <div class="mb-1 col-12">
                <label for="Mobile" class="form-label">Categoria Id</label>
                <select name="Categoria_Id" id="Categoria_Id" class="form-control">
                    <?php
                    foreach ($categoria as $categorias){
                    $idCategoria = $categorias["Categoria_Id"];
                    $nombreCategoria = $categorias["Categoria_Nombre"];
                    ?>
                    <option value="<?php echo intval($idCategoria) ?>"><?php echo $nombreCategoria?></option>
                    <?php
                    }
                    ?>
                </select>
              </div>
              <div class="mb-1 col-12">
                <label for="Direccion" class="form-label">Precio Unitario</label>
                <input 
                  type="text"
                  id="Precio_Unitario"
                  name="Precio_Unitario"
                  class="form-control"  
                  value="<?php echo $val["Precio_Unitario"];?>"
                 
                />
              </div>

              <div class="mb-1 col-12">
                <label for="Imagen" class="form-label">Stock</label>
                <input 
                  type="text"
                  id="Stock"
                  name="Stock"
                  class="form-control"  
                  value="<?php echo $val["Stock"];?>"
                 
                />
              </div>
              <div class="mb-1 col-12">
                <label for="Imagen" class="form-label">Unidades Pedidas</label>
                <input 
                  type="text"
                  id="UnidadesPedidas"
                  name="UnidadesPedidas"
                  class="form-control"  
                  value="<?php echo $val["UnidadesPedidas"];?>"
                 
                />
              </div>
              <div class="mb-1 col-12">
                <label for="Imagen" class="form-label">Proveedor Id</label>
                <select name="Proveedor_Id" id="Proveedor_Id" class="form-control">
                  <?php
                  foreach ($proveedor as $proveedores){ $idProveedor = $proveedores ['Proveedor_Id']; $nombreProveedor = $proveedores ['Proveedor_Nombre']; ?>
                  <option value="<?php echo intval($idProveedor) ?>"><?php echo $nombreProveedor ?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>
              <div class="mb-1 col-12">
                <label for="Imagen" class="form-label">Productos_Nombre</label>
                <input 
                  type="text"
                  id="Productos_Nombre"
                  name="Productos_Nombre"
                  class="form-control"  
                  value="<?php echo $val["Productos_Nombre"];?>"
                 
                />
              </div>
              <div class="mb-1 col-12">
                <label for="Imagen" class="form-label">Descontinuado</label>
                <input 
                  type="text"
                  id="Descontinuado"
                  name="Descontinuado"
                  class="form-control"  
                  value="<?php echo $val["Descontinuado"];?>"
                 
                />
              </div>

              <div class=" col-12 m-2">
                <input type="submit" class="btn btn-primary" value="UPDATE" name="editar"/>
              </div>
            </form>  
        <div id="charts1" class="charts"> </div>
      </div>
    </div>

    <div class="parte-derecho " id="detalles">
      <h3>Detalle Productos</h3>
      <p>Cargando...</p>
       <!-- ///////Generando la grafica -->

    </div>

  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>




</body>

</html>
<?php

require_once("../Config/config.php");
require_once("../Login/LoginU.php");

session_start();

$datos = new Productos();

$all = $datos -> selectProductosAll();

$categoria = $datos->selectCategoria();

$proveedor = $datos->selectProveedor();

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SuperMarket </title>
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
        <h3 style="margin-bottom: 2rem;">Camper Skills.</h3>
        <img src="../images/ana.png" alt="" class="imagenPerfil">
        <h3><?php echo $_SESSION["UserName"]?></h3>
      </div>
      <div class="menus">
        <a href="../Home/home.php" style="display: flex;gap:2px;">
          <i class="bi bi-house-door"> </i>
          <h3 style="margin: 4px;">Home</h3>
        </a>
        <a href="../CategoriasCrud/categorias.php" style="display: flex;gap:1px;">
          <i class="bi bi-calendar-plus"></i>
          <h3 style="margin: 8px;">Categoria</h3>
        </a>
        <a href="../Clientes/clientes.php" style="display: flex;gap:1px;">
          <i class="bi bi-person-circle"></i>
          <h3 style="margin: 8px;">Clientes</h3>
        </a>
        <a href="../Empleado/empleado.php" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 8px;">Empleado</h3>
        </a>
        <a href="../proveedor/proveedor.php" style="display: flex;gap:1px;">
        <i class="bi bi-truck"></i>
          <h3 style="margin: 8px;">Proveedor</h3>
        </a>
        <a href="#" style="display: flex;gap:1px;">
          <i class="bi bi-shop"></i>
          <h3 style="margin: 8px;font-weight: 800;">Productos</h3>
        </a>
        <a href="../factura/Facturas.php" style="display: flex;gap:1px;">
          <i class="bi bi-journal-text"></i>
          <h3 style="margin: 8px;">Factura</h3>
        </a>
        <a href="#" style="display: flex;gap:1px;">
          <i class="bi bi-journals"></i>
          <h3 style="margin: 8px;">Factura Detalle</h3>
        </a>
      </div>
    </div>

    <div class="parte-media">
      <div style="display: flex; justify-content: space-between;">
        <h2>Productos</h2>
        <button class="btn-m" data-bs-toggle="modal" data-bs-target="#registrarProducto"><i class="bi bi-person-add " style="color: rgb(255, 255, 255);" ></i></button>
      </div>
      <div class="menuTabla contenedor2">
        <table class="table table-custom ">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Categoria</th>
              <th scope="col">Precio Unitario</th>
              <th scope="col">Stock</th>
              <th scope="col">Unidades Pedidas</th>
              <th scope="col">Proveedor</th>
              <th scope="col">Productos Nombre</th>
              <th scope="col">Descontinuado</th>
              <th scope="col">Eliminar</th>
              <th scope="col">Editar</th>
            </tr>
          </thead>
          <tbody class="" id="tabla">

            <!-- ///////Llenado DInamico desde la Base de Datos -->
         
            <?php
              foreach($all as $key => $val){
            ?>
            <tr>
              <td><?php echo $val['Productos_Id']?></td>
              <td><?php echo $val['Categoria_Nombre']?></td>
              <td><?php echo $val['Precio_Unitario']?></td>
              <td><?php echo $val['Stock']?></td>
              <td><?php echo $val['UnidadesPedidas']?></td>
              <td><?php echo $val['Proveedor_Nombre']?></td>
              <td><?php echo $val['Productos_Nombre']?></td>
              <td><?php echo $val['Descontinuado']?></td>
              <td>
                <a class="btn btn-danger" href="borrarProductos.php?Productos_Id=<?=$val['Productos_Id']?>&req=delete">Borrar</a>
              </td>
              <td>
                <a class="btn btn-warning" href="editarProductos.php?Productos_Id=<?=$val['Productos_Id']?>">Editar</a>
              </td>
            </tr>
            <?php
             }
            ?> 

          </tbody>
          
        </table>

      </div>


    </div>

    <div class="parte-derecho " id="detalles">
      <h3>Detalle Producto</h3>
      <p>Cargando...</p>
      <!-- ///Generando la grafica -->

    </div>





    <!-- /////////Modal de registro de nuevo estuiante //////////-->
    <div class="modal fade" id="registrarProducto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="backdrop-filter: blur(5px)">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" >
        <div class="modal-content" >
          <div class="modal-header" >
            <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Producto</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" style="background-color: rgb(231, 253, 246);">
            <form class="col d-flex flex-wrap" action="registrarProducto.php" method="post">
            <div class="mb-1 col-12">
                <label for="Nombre" class="form-label">Categoria Id</label>
                <select name="Nombre" id="Nombre" class="form-control">
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
                <label for="Precio_Unitario" class="form-label">Precio Unitario</label>
                <input 
                  type="text"
                  id="Precio_Unitario" 
                  name="Precio_Unitario"
                  class="form-control"  
                />
              </div>

              <div class="mb-1 col-12">
                <label for="Stock" class="form-label">Stock</label>
                <input 
                  type="text"
                  id="Stock"
                  name="Stock"
                  class="form-control"  
                />
              </div>
              <div class="mb-1 col-12">
                <label for="direccion" class="form-label">Unidades Pedidas</label>
                <input 
                  type="text"
                  id="UnidadesPedidas"
                  name="UnidadesPedidas"
                  class="form-control"  
                />
              </div>
              <div class="mb-1 col-12">
                <label for="NombreP" class="form-label">Proveedor Id</label>
                <select name="NombreP" id="NombreP" class="form-control">
                  <?php
                  foreach ($proveedor as $proveedores){ $idProveedor = $proveedores ['Proveedor_Id']; $nombreProveedor = $proveedores ['Proveedor_Nombre']; ?>
                  <option value="<?php echo intval($idProveedor) ?>"><?php echo $nombreProveedor ?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>
              <div class="mb-1 col-12">
                <label for="Productos_Nombre" class="form-label">Nombre del Producto</label>
                <input 
                  type="text"
                  id="Productos_Nombre"
                  name="Productos_Nombre"
                  class="form-control"  
                />
              </div>
              <div class="mb-1 col-12">
                <label for="Descontinuado" class="form-label">Descontinuado</label>
                <input 
                  type="text"
                  id="Descontinuado"
                  name="Descontinuado"
                  class="form-control"  
                />
              </div>

             

              <div class=" col-12 m-2">
                <input type="submit" class="btn btn-primary" value="guardar" name="guardar"/>
              </div>
            </form>  
         </div>       
        </div>
      </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"></script>


</body>

</html>
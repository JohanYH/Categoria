<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

require_once("../Config/config.php");
require_once("../Login/LoginU.php");

session_start();

$datos = new Factura();

$all = $datos->selectFacturaAll();

$nombres = $datos->selectNombres();

$clientes = $datos->selectClientes();

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
        <a href="../productos/productos.php" style="display: flex;gap:1px;">
          <i class="bi bi-shop"></i>
          <h3 style="margin: 8px;">Productos</h3>
        </a>
        <a href="#" style="display: flex;gap:1px;">
          <i class="bi bi-journal-text"></i>
          <h3 style="margin: 8px;font-weight: 800;">Factura</h3>
        </a>
        <a href="../facturaD/facturaDetalle.php" style="display: flex;gap:1px;">
          <i class="bi bi-journals"></i>
          <h3 style="margin: 8px;">Factura Detalle</h3>
        </a>
      </div>
    </div>

    <div class="parte-media">
      <div style="display: flex; justify-content: space-between;">
        <h2>Factura</h2>
        <button class="btn-m" data-bs-toggle="modal" data-bs-target="#registrarFactura"><i class="bi bi-person-add " style="color: rgb(255, 255, 255);" ></i></button>
      </div>
      <div class="menuTabla contenedor2">
        <table class="table table-custom ">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Empleado</th>
              <th scope="col">Cliente</th>
              <th scope="col">Fecha</th>
              <th scope="col">Eliminar</th>
            </tr>
          </thead>
          <tbody class="" id="tabla">

            <!-- ///////Llenado DInamico desde la Base de Datos -->
            <?php
            foreach($all as $key=> $val){
            ?>
            <tr>
              <td><?php echo $val['Facturas_Id'] ?></td>
              <td><?php echo $val['Empleado_Nombre'] ?></td>
              <td><?php echo $val['Compañia'] ?></td>
              <td><?php echo $val['Fecha'] ?></td>
              <td>
                <a class="btn btn-danger" href="borrarFacturas.php?Facturas_Id=<?=$val["Facturas_Id"]?>&req=delete">Borrar</a>
              </td>
            </tr>
          </tbody>
        <?php
            }
            ?>
        </table>

      </div>


    </div>

    <div class="parte-derecho " id="detalles">
      <h3>Detalle Facturas</h3>
      <p>Cargando...</p>
       <!-- ///////Generando la grafica -->

    </div>





    <!-- /////////Modal de registro de nuevo estuiante //////////-->
    <div class="modal fade" id="registrarFactura" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="backdrop-filter: blur(5px)">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" >
        <div class="modal-content" >
          <div class="modal-header" >
            <h1 class="modal-title fs-5" id="exampleModalLabel">Nueva Factura</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" style="background-color: rgb(231, 253, 246);">
            <form class="col d-flex flex-wrap" action="registrarFactura.php" method="post">
              <div class="mb-1 col-12">
                <label for="Nombre" class="form-label">Empleado Nombre</label>
                <select name="Nombre" id="Nombre" class="form-control">
                  <?php
                  foreach ($nombres as $nombre /* $key => $val */){
                    $idEmpleado = $nombre['Empleado_Id'];
                    $nombreEmpleado = $nombre['Empleado_Nombre'];
                    ?>
                  <option value="<?php echo intval($idEmpleado)?>"><?php echo $nombreEmpleado?></option>
                  <?php } ?>
                </select>
              </div>

              <div class="mb-1 col-12">
                <label for="Cliente" class="form-label">Clientes</label>
                <select name="Compañia" id="Compañia" class="form-control">
                  <?php
                  foreach ($clientes as $cliente){
                    $idCliente = $cliente['Cliente_Id'];
                    $Compañia = $cliente['Compañia'];
                    ?>
                  <option value="<?php echo intval($idCliente) ?>"><?php echo $Compañia?></option>
                  <?php } ?>
                </select>
              </div>

              <div class="mb-1 col-12">
                <label for="Fecha" class="form-label">Fecha</label>
                <input 
                  type="date"
                  id="Fecha"
                  name="Fecha"
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
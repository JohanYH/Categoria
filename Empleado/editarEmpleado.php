<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

require_once('../Config/config.php');

$datos = new Empleados();

$Empleado_Id = $_GET["Empleado_Id"];
$datos-> setEmpleado_Id($Empleado_Id);
$record = $datos-> selectOneEmpleado();
$val = $record [0];

if (isset($_POST['editar'])) {

    $datos->setMobile($_POST["Mobile"]);
    $datos->setDireccion($_POST["Direccion"]);
    $datos->setImagen($_POST["Imagen"]);

    $datos->updateEmpleado();
    echo "<script>alert('Los Datos Editados ha sido Exitosamente');document.location='../Empleado/empleado.php'</script>";
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
        <h3>Ana Yamada</h3>
      </div>
      <div class="menus">
        <a href="#" style="display: flex;gap:2px;">
          <i class="bi bi-house-door"> </i>
          <h3 style="margin: 0px;font-weight: 800;">Editar</h3>
        </a>
        <a href="#" style="display: flex;gap:1px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;font-weight: 800;">Empleado</h3>
        </a>
      </div>
    </div>

    <div class="parte-media">
        <h2 class="m-2">Categoria a Editar</h2>
      <div class="menuTabla contenedor2">
      <form class="col d-flex flex-wrap" action=""  method="post">
              <div class="mb-1 col-12">
                <label for="Mobile" class="form-label">Mobile</label>
                <input 
                  type="text"
                  id="Mobile"
                  name="Mobile"
                  class="form-control"
                  value="<?php echo $val["Mobile"];?>"  
                 
                />
              </div>
              <div class="mb-1 col-12">
                <label for="Direccion" class="form-label">Direccion</label>
                <input 
                  type="text"
                  id="Direccion"
                  name="Direccion"
                  class="form-control"  
                  value="<?php echo $val["Direccion"];?>"
                 
                />
              </div>

              <div class="mb-1 col-12">
                <label for="Imagen" class="form-label">Imagen</label>
                <input 
                  type="text"
                  id="Imagen"
                  name="Imagen"
                  class="form-control"  
                  value="<?php echo $val["Imagen"];?>"
                 
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
      <h3>Detalle Empleado</h3>
      <p>Cargando...</p>
       <!-- ///////Generando la grafica -->

    </div>

  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>




</body>

</html>
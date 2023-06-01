<?php

require_once("../Config/config.php");

session_start();

$record = new Empleados();

if (isset($_GET["Empleado_Id"]) && isset ($_GET["req"])) {
    if ($_GET["req"] == "delete") {

        if ($_SESSION["tiposUsuario"] == "Administrador"){
            $record -> setEmpleado_Id($_GET["Empleado_Id"]);
            $record -> delete();
            echo "<script>alert('Los datos han sido Borrados Exitosamente'); document.location='../Empleado/empleado.php'</script>";
        }else {
            echo "<script>alert('No tienes Permiso para Borrar'); document.location='../Empleado/empleado.php'</script>";
        }
        
    }
}

?>
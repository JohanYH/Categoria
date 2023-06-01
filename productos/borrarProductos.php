<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

require_once("../Config/config.php");

session_start();

$record = new Productos();

if (isset($_GET["Productos_Id"]) && isset ($_GET["req"])) {
    if ($_GET["req"] == "delete") {
        if ($_SESSION["tiposUsuario"] == "Administrador"){
            $record -> setProductos_Id($_GET["Productos_Id"]);
            $record -> delete();
            echo "<script>alert('Los datos han sido Borrados Exitosamente'); document.location='../productos/productos.php'</script>";
        }else {
            echo "<script>alert('No tienes Permiso para Borrar'); document.location='../productos/productos.php'</script>";
        }
        
    }
}

?>
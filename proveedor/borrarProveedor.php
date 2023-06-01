<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

require_once("../Config/config.php");

session_start();

$record = new Proveedor();

if (isset($_GET["Proveedor_Id"]) && isset ($_GET["req"])) {
    if ($_GET["req"] == "delete") {
        if ($_SESSION["tiposUsuario"] == "Administrador"){
            $record -> setProveedor_Id($_GET["Proveedor_Id"]);
            $record -> delete();
            echo "<script>alert('Los datos han sido Borrados Exitosamente'); document.location='../proveedor/proveedor.php'</script>";
        }else {
            echo "<script>alert('No tienes Permiso para Borrar'); document.location='../proveedor/proveedor.php'</script>";
        }
        
    }
}

?>
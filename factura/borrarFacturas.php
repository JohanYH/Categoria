<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

session_start();

require_once("../Config/config.php");

$record = new Factura();

if (isset($_GET["Facturas_Id"]) && isset ($_GET["req"])) {
    if ($_GET["req"] == "delete") {
        if ($_SESSION["tiposUsuario"] == "Administrador"){
            $record -> setFacturas_Id($_GET["Facturas_Id"]);
            $record -> delete();
            echo "<script>alert('Los datos han sido Borrados Exitosamente');document.location='../factura/Facturas.php'</script>";
        }else {
            echo "<script>alert('No tienes Permiso para Borrar'); document.location='../factura/Facturas.php'</script>";
        }
        
    }
}

?>
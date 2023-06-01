<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

if (isset($_POST["guardar"])) {
    require_once("../Config/config.php");

    $facturaD = new FacturaDetalle();

    $facturaD->setFacturas_Id($_POST["Fecha"]);
    $facturaD->setProductos_Id($_POST["Productos_Nombre"]);
    $facturaD->setCantidad($_POST["Cantidad"]);
    $facturaD->setPrecioVenta($_POST["PrecioVenta"]);

    $facturaD->insertFacturaD();

    echo "<script> alert('Los datos fueron guardados Satisfactoriamente'); document.location='../facturaD/facturaDetalle.php' </script>";
}


?>
<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

if (isset($_POST["guardar"])) {
    require_once("../config.php");

    $factura = new Factura();

    $factura->setEmpleado_Id($_POST["Nombre"]);
    $factura->setCliente_Id($_POST["Compañia"]);
    $factura->setFecha($_POST["Fecha"]);

    $factura->insertFactura();

    echo "<script> alert('Los datos fueron guardados Satisfactoriamente'); document.location='../factura/Facturas.php' </script>";


}

?>
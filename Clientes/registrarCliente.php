<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

if (isset($_POST["guardar"])) {
    
    require_once("../Config/config.php");

    $clientes = new Clientes();

    $clientes  -> setCelular($_POST["Celular"]);
    $clientes -> setCompañia($_POST["Compañia"]);

    $clientes -> insertCliente();

    echo "<script> alert ('Los datos fueron guardados exitosamente'); document.location='../Clientes/clientes.php'</script>";
}


?>
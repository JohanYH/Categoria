<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

    if (isset($_POST["guardar"])) {
        require_once ("../Config/config.php");

        $categories = new Proveedor();

        $categories->  setProveedor_Nombre($_POST["Proveedor_Nombre"]);
        $categories->  setTelefono($_POST["Telefono"]);
        $categories->  setCiudad($_POST["Ciudad"]);
        
        $categories->insertProveedor();

        echo "<script> alert ('Los datos fueron guardados exitosamente'); document.location='../proveedor/proveedor.php'</script>";
    }

?>
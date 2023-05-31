<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

require_once("../config.php");

$record = new Proveedor();

if (isset($_GET["Proveedor_Id"]) && isset ($_GET["req"])) {
    if ($_GET["req"] == "delete") {
        $record -> setProveedor_Id($_GET["Proveedor_Id"]);
        $record -> delete();
        echo "<script>alert('Los datos han sido Borrados Exitosamente'); document.location='../proveedor/proveedor.php'</script>";
    }
}

?>
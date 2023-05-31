<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

require_once("../config.php");

$record = new Productos();

if (isset($_GET["Productos_Id"]) && isset ($_GET["req"])) {
    if ($_GET["req"] == "delete") {
        $record -> setProductos_Id($_GET["Productos_Id"]);
        $record -> delete();
        echo "<script>alert('Los datos han sido Borrados Exitosamente'); document.location='../productos/productos.php'</script>";
    }
}

?>
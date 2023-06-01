<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

require_once("../Config/config.php");

$record = new FacturaDetalle();

if (isset($_GET["FacturasD_Id"]) && isset ($_GET["req"])) {
    if ($_GET["req"] == "delete") {
        $record -> setFacturasD_Id($_GET["FacturasD_Id"]);
        $record -> delete();
        echo "<script>alert('Los datos han sido Borrados Exitosamente'); document.location='../facturaD/facturaDetalle.php'</script>";
    }
}

?>
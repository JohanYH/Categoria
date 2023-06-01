<?php

require_once("../Config/config.php");

$record = new Clientes();

if (isset($_GET["Cliente_Id"]) && isset ($_GET["req"])) {
    if ($_GET["req"] == "delete") {
        $record -> setCliente_Id($_GET["Cliente_Id"]);
        $record -> delete();
        echo "<script>alert('Los datos han sido Borrados Exitosamente'); document.location='../Clientes/clientes.php'</script>";
    }
}

?>
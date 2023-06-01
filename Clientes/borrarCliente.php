<?php

require_once("../Config/config.php");

session_start();

$record = new Clientes();

if (isset($_GET["Cliente_Id"]) && isset ($_GET["req"])) {
    if ($_GET["req"] == "delete") {

        if ($_SESSION["tiposUsuario"] == "Administrador"){
            $record -> setCliente_Id($_GET["Cliente_Id"]);
            $record -> delete();
            echo "<script>alert('Los datos han sido Borrados Exitosamente'); document.location='../Clientes/clientes.php'</script>";
        }else {
            echo "<script>alert('No tienes Permiso para Borrar'); document.location='../Clientes/clientes.php'</script>";
        }
        
    }
}

?>
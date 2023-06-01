<?php

require_once("../Config/config.php");

session_start();

$record = new Categoria();

if (isset($_GET["Categoria_Id"]) && isset($_GET["req"])) {
    if ($_GET["req"] == "delete") {
        
        if ($_SESSION["tiposUsuario"] == "Administrador"){
            $record -> setCategoria_Id($_GET["Categoria_Id"]);
            $record ->delete();
            echo "<script>alert('Los datos han sido Borrados Exitosamente'); document.location='../CategoriasCrud/categorias.php'</script>";
        }else {
            echo "<script>alert('No tienes Permiso para Borrar'); document.location='../CategoriasCrud/categorias.php'</script>";
        }

    }
}

?>
<?php

require_once("../config.php");

$record = new Categoria();

if (isset($_GET["Categoria_Id"]) && isset($_GET["req"])) {
    if ($_GET["req"] == "delete") {
        $record -> setCategoria_Id($_GET["Categoria_Id"]);
        $record ->delete();
        echo "<script>alert('Los datos han sido Borrados Exitosamente'); document.location='../CategoriasCrud/categorias.php'</script>";
    }
}

?>
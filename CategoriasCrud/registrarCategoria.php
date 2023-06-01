<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

    if (isset($_POST["guardar"])) {
        require_once (".../Config/config.php");

        $categories = new Categoria();

        $categories->  setCategoria_Nombre($_POST["Categoria_Nombre"]);
        $categories->  setDescripcion($_POST["Descripcion"]);
        $categories->  setImagen($_POST["Imagen"]);
        
        $categories->insertCategoria();

        echo "<script> alert ('Los datos fueron guardados exitosamente'); document.location='../CategoriasCrud/categorias.php'</script>";
    }

?>
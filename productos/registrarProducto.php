<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

if (isset($_POST["guardar"])) {

    require_once("../config.php");

    $productos = new Productos();

    $productos->setCategoria_Id($_POST["Nombre"]);
    $productos->setPrecio_Unitario($_POST["Precio_Unitario"]);
    $productos->setStock($_POST["Stock"]);
    $productos->setUnidadesPedidas($_POST["UnidadesPedidas"]);
    $productos->setProveedor_Id($_POST["NombreP"]);
    $productos->setProductos_Nombre($_POST["Productos_Nombre"]);
    $productos->setDescontinuado($_POST["Descontinuado"]);

    $productos -> insertProductos();

    echo "<script> alert('Los datos fueron guardados Satisfactoriamente'); document.location='../productos/productos.php' </script>";

}

?>
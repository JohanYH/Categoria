<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

    if (isset($_POST["guardar"])) {
        require_once ("../Config/config.php");

        $personas = new Empleados();

        $personas->  setEmpleado_Nombre($_POST["Empleado_Nombre"]);
        $personas->  setMobile($_POST["Mobile"]);
        $personas->  setDireccion($_POST["Direccion"]);
        $personas -> setImagen($_POST["Imagen"]);
        
        $personas->insertEmpleado();

        echo "<script> alert ('Los datos fueron guardados exitosamente');document.location='../Empleado/empleado.php'</script>";
    }

?>
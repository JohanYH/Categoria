<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

if (isset($_POST["registrarse"])) {
    
    require_once("Registro.php");

    $newUser = new Registrarse();

    $newUser->setIdCamper(1);
    $newUser->setEmail($_POST["Email"]);
    $newUser->setUserName($_POST["UserName"]);
    $newUser->setPassword($_POST["Password"]);
    
    if ($newUser->checkUser($_POST["Email"])) {
        echo "<script> alert ('Usuario ya existente');document.location='Registrarse.php'</script>";
    }else {
        $newUser->insertDatos();
        echo "<script> alert ('El Usuario ha sido Registrado Correctamente');document.location='../Home/home.php'</script>";
    }
}



?>
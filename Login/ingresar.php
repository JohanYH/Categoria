<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

session_start();

if (isset($_POST["Iniciar"])) {
    require_once("../Login/LoginU.php");

    $credenciales = new LoginUser();

    $credenciales->setEmail($_POST["Email"]);
    $credenciales->setPassword($_POST["Password"]);

    $login = $credenciales->LoginUsers();

    if ($login) {
        header('Location:../Home/home.php');
    }else {
        echo "<script> alert ('Password/Email Invalida');document.location='Registrarse.php'</script>";
    }
}

?>
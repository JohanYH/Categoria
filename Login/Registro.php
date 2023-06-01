<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

require_once('../Config/dbCnx.php');
require_once('../Config/db.php');
require_once('../Login/LoginU.php');

class Registrarse extends SuperMarket{
    private $Id;
    private $IdCamper;
    private $Email;
    private $UserName;
    private $Password;

    public function __construc($Id = 0, $IdCamper = "", $Email = "", $UserName = "", $Password = "", $dbCnx = "")
    {
        $this->Id = $Id;
        $this->IdCamper = $IdCamper;
        $this->Email = $Email;
        $this->UserName = $UserName;
        $this->Password = $Password;
        parent::__construc($dbCnx);

    }

    public function setId($Id)
    {
        $this->Id = $Id;
    }

    public function getId()
    {
        $this->Id;
    }

    public function setIdCamper($IdCamper)
    {
        $this->IdCamper = $IdCamper;
    }

    public function getIdCamper()
    {
        $this->IdCamper;
    }

    public function setEmail($Email)
    {
        $this->Email = $Email;
    }

    public function getEmail()
    {
        $this->Email;
    }

    public function setUserName($UserName)
    {
        $this->UserName = $UserName;
    }
    
    public function getUserName()
    {
        $this->UserName;
    }

    public function setPassword($Password)
    {
        $this->Password = $Password;
    }

    public function getPassword()
    {
        $this->Password;
    }

    public function checkUser($Email)
    {
        try {
            $stm = $this->dbCnx->prepare("SELECT * FROM Users WHERE Email = '$Email'");
            $stm->execute();
            if ($stm->fetchColumn()) {
                return true;
            }else {
                return false;
            }
        }  catch (Exception $e) {
            $e -> getMessage();
        }
    }

    public function insertDatos()
    {
        try {
            $stm = $this->dbCnx -> prepare("INSERT INTO Users (IdCamper, Email, UserName, Password) values(?,?,?,?)");
            $stm -> execute([$this->IdCamper,$this->Email,$this->UserName,md5($this->Password)]);

            $login = new LoginUser();
            $login->setEmail($_POST["Email"]);
            $login->setPassword($_POST["Password"]);

            $success = $login->LoginUsers();

        } catch (Exception $e) {
            $e -> getMessage();
        }
    }

}


?>
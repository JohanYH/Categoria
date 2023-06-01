<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

require_once("../Config/db.php");
require_once("../Config/dbCnx.php");

class Login extends SuperMarket{
    private $Id;
    private $Email;
    private $Password;

    public function __construct($Id = 0, $Email = "", $Password = "", $dbCnx = "")
    {
        $this->Id = $Id;
        $this->Email = $Email;
        $this->Password = $Password;
        parent::__construct($dbCnx);
    }

    public function setId($Id)
    {
        $this->Id = $Id;
    }

    public function getId()
    {
        $this->Id;
    }

    public function setEmail($Email)
    {
        $this->Email = $Email;
    }

    public function getEmail()
    {
        $this->Email;
    }

    public function setPassword($Password)
    {
        $this->Password = $Password;
    }

    public function getPassword()
    {
        $this->Password;
    }

    public function fetchAll()
    {
        try {
            $stm = $this->dbCnx->prepare("SELECT * FROM Users");
        } catch (Exception $e) {
            $e -> getMessage();
        }
    }
}


?>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Database{
private $servername = "localhost";
protected $username = "root";
private $password = "9090";
private $database = "multiUser";

public $conn;

public function getConnection()
{
    $this->conn = new mysqli($this->servername,$this->username,$this->password,$this->database);

    if($this->conn->connect_error){
        die("connection Error".$this->conn->connect_error);
    }
    return $this->conn;
}



}



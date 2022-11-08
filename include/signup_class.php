<?php
session_start();

include "_dbconnect.php";

class queryInsert extends Database
{

    public $username;
    public $email;
    public $password;
    public $role;
    public $sql;


    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }



    public function insert()
    {

        if($_SERVER['REQUEST_METHOD'] == "POST")
        {

            $this->username = $this->test_input($_POST['username']);
            $this->email = $this->test_input($_POST['email']);
            $this->password = $this->test_input($_POST['password']);
            $this->role = $this->test_input($_POST['role']);



            $this->sql = "INSERT INTO `multiUser` (`username`, `email`, `password`, `role`) VALUES ('$this->username', '$this->email', '$this->password', '$this->role')";




            if(empty($this->username) || empty($this->email) || empty($this->password) || empty($this->role) )

            {

                $_SESSION['signup'] = false;
                header("location: ../signup.php");

            }



            if($this->getConnection()->query($this->sql))
                {
                    var_dump($_SESSION['signup'] = true);
                    header("location:login.php");


                }



        }




    }




}


$obj = new queryInsert();
$insert = $obj->insert();





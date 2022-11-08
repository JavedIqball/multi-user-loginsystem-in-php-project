<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include "_dbconnect.php";


class Mylogin extends Database{

    public $email;
    public $password;
    public $myname;
    public $sql;
    public $role;

    public function Mylog(){

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $this->email = $_POST['email'];
            $this->password = $_POST['password'];


            $this->sql = "Select * from `multiUser` where email = '$this->email' AND password = '$this->password'";

            $result = $this->getConnection()->query($this->sql);

            while($row = mysqli_fetch_assoc($result)) {
                $this->myname=$row["username"];
                $this->role = $row["role"];
            }

               var_dump($result);

//
//            if($result->num_rows === 1)
//            {
//                $role = $this->role;
//                $_SESSION[$role] = $this->myname;
////                header("location: ".$role.".php");
//            }
//            else
//            {
//                $_SESSION['login'] = true;
////                header("location: login.php");
//
//
//            }



        }





    }


}
$myobj = new Mylogin();
$Logresult=$myobj->Mylog();

?>
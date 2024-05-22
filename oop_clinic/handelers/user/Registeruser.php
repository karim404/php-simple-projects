<?php
if(session_status() == PHP_SESSION_NONE) session_start();

require_once "../Connection.php";
class RegisterUser extends Connection
{
    public $name;
    public $email;
    public $phone;

    public $password;

    public function checkRequest_Sanitaize(){
        if($_SERVER['REQUEST_METHOD']=='POST'){


            $this->name = trim(stripslashes(htmlspecialchars(htmlentities($_POST['name']))));
            $this->phone =trim(stripslashes(htmlspecialchars(htmlentities($_POST['phone']))));
            $this->password =password_hash(trim(stripslashes(htmlspecialchars(htmlentities($_POST['password'])))), PASSWORD_BCRYPT);

            $this->email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);


        }


    }

    public  function checkLenght() {

        if(empty($this->name)) {
            $_SESSION['errors'] = 'Please type your Name !';
        }
        elseif(strlen($this->name) > 15 || strlen($this->name)<3){
            $_SESSION['errors'] ='Type A name between 3-15 letters!';
        }
        if(empty($this->phone)) {
            $_SESSION['errors'] = 'Please Enter a Phone Number !';
        }
        elseif(strlen($this->phone) > 16 || strlen($this->phone)<5) {
            $_SESSION['errors'] ='Enter A phone number between 5-16 numbers!';
        }

        if(empty($this->email)) $_SESSION['errors'] = 'Please type An Email !';
        if(empty($this->password)){
            $_SESSION['errors'] = 'Please type A Password !';
        }
        elseif(strlen($this->password) <6 ) {
            $_SESSION['errors'] ='Type A Password between 3-15 characters';
        }

        if(!empty($_SESSION['errors'])){
            header("location:../../register.php");
        }


    }

    public function checkIfEmailExists(){
        $query = "SELECT * FROM `user` " ;
        $sql = $this->conn->query($query);
        $row= $sql->fetch(PDO::FETCH_ASSOC);
        if($this->email == $row['email']){
            $_SESSION['errors'] = 'Select Another Email ...This Email Exists!';
            header("location:../../register.php");
            die;
        }


    }

    public function insertUserToSql(){
        $query = "INSERT INTO `user` (`name` ,`email` , `password` , `phone` , `role` ) 
                  VALUES ('$this->name' , '$this->email' , '$this->password', $this->phone , '0')";
        $sql = $this->conn->prepare($query);
        return $sql->execute();


    }
    public function FetchUserId(){
        $query = "SELECT * FROM `user` WHERE `email` = '$this->email'" ;
        $sql = $this->conn->query($query);
        $row= $sql->fetch(PDO::FETCH_ASSOC);
        $_SESSION['auth'] = ["user_id"=>$row["id"]] ;


    }


}

$user = new RegisterUser;
$user->checkRequest_Sanitaize();
$user->checkLenght();
$user->checkIfEmailExists();
$user->insertUserToSql();
$user->FetchUserId();
header("location:../../index.php");


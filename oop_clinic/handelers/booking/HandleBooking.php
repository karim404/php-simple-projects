<?php
if(session_status() == PHP_SESSION_NONE) session_start();
//require_once "../../handelers/Connection.php" ;



class HandleBooking
{
    public  $conn;
    public $name;
    public $email;
    public $phone;
    public $user_id;

    public $doctor_id;

    public  function __construct(){
        $this->conn = new PDO("mysql:host=localhost;dbname=oopclinic" , "root", "");
    }
    public function SetAttributes(){
        if ($_SERVER['REQUEST_METHOD']=='POST' && $_SESSION['auth']){
            $this->name = trim(stripslashes(htmlspecialchars(htmlentities($_POST['name']))));
            $this->email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
            $this->phone = trim(stripslashes(htmlspecialchars(htmlentities($_POST['phone']))));
            $this->user_id = $_SESSION['auth']['user_id'];
            $this->doctor_id = $_SESSION['auth_doctor']['doctor_id'];

//            echo"<pre>";
//            print_r($this->user_id);
//            echo"<br>";
//            print_r(($this->doctor_id));
//            die;

        }


    }

    public function inserIntoBookingSql(){
        $query = "INSERT INTO `booking` (`user_id` , `doctors_id` , `status` , `booking_name` ,`booking_phone`,`booking_email`) 
                        VALUES ('$this->user_id' , '$this->doctor_id' ,'pending' ,'$this->name' ,'$this->phone','$this->email')" ;
        $sql = $this->conn->prepare($query);
        return $sql->execute();
    }

    public function selectBookingFromSql()
    {
        $query = "SELECT * FROM `booking`  ";
        $sql = $this->conn->query($query);
        return $sql->fetchAll(PDO::FETCH_ASSOC);
//        echo"<pre>";
//            print_r($row);
//        die;
    }

    public function selectUser($filter= true){
        $query = "SELECT * FROM `user` WHERE $filter";
        $sql = $this->conn->query($query);
        return $sql->fetch(PDO::FETCH_ASSOC);

    }

    public function selectDoctorFromSql( $filter=true){

        $query = "SELECT * FROM `doctors`  WHERE $filter";
        $sql = $this->conn->query($query);
        return $sql->fetch(PDO::FETCH_ASSOC);


    }
}



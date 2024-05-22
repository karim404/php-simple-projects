<?php

class UpdateHandelDoctor
{
    public $conn;

    public $doctor_name;
    public $doctor_major_id;
    public $bio;
    public $id;

    public $image_name;

    public $tmp_name;

    public $path;


    public function __construct()
    {
        $this->conn = new PDO("mysql:host=localhost;dbname=oopclinic" , "root", "");
    }

    public function checkRequest(){
        if($_SERVER['REQUEST_METHOD']=='POST'){

//            echo"<pre>";
//            print_r($_POST);
//            echo "<br>";
//            print_r($_GET);
//            die;
            $this->id = $_GET['id'];
            $this->doctor_name = $_POST['doctor_name'];
            $this->doctor_major_id = $_POST['doctor_major_id'];
            $this->bio = $_POST['bio'];
            $this->image_name = $_FILES['image']['name'];
            $this->tmp_name = $_FILES['image']['tmp_name'];
            $this->path = '../assets/images/doctor-image/'.$this->image_name;

        }

    }

    public function uploadImage(){

        move_uploaded_file($this->tmp_name , 'C:\xampp\htdocs\G318\projects\oop clinic\assets\images\doctor-image\\' .$this->image_name );

    }


    public function updateDoctorFromSql(){
        $query = "UPDATE `doctors` SET `name` = '$this->doctor_name' , `image` = '$this->path' WHERE `id` = '$this->id'";
        return $this->conn->prepare($query)->execute();

    }


}

$doctor = new UpdateHandelDoctor();
$doctor->checkRequest();
$doctor->uploadImage();
$doctor->updateDoctorFromSql();

header("location:../../doctors/index.php");



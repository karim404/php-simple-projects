<?php

class Handeladddoctor
{
    public $conn;

    public $doctor_name;
    public $doctor_major_id;
    public $bio;

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
//            die;

            $this->doctor_name = $_POST['doctor_name'];
            $this->doctor_major_id = $_POST['doctor_major'];
            $this->bio = $_POST['bio'];
            $this->image_name = $_FILES['image']['name'];
            $this->tmp_name = $_FILES['image']['tmp_name'];
            $this->path = '../assets/images/doctor-image/'.$this->image_name;

        }

    }

    public function uploadImage(){

        move_uploaded_file($this->tmp_name , 'C:\xampp\htdocs\G318\projects\oop clinic\assets\images\doctor-image\\' .$this->image_name );

    }


    public function insertDoctorToSql(){

        $query = "INSERT INTO `doctors` (`name` ,`image` ,`bio` , `majors_id`)
                  VALUES ('$this->doctor_name' , '$this->path' , '$this->bio' , '$this->doctor_major_id')";


        $sql = $this->conn->prepare($query);

        return $sql->execute();
    }

    public function selectDoctorFromSql( $filter=true){

        $query = "SELECT * FROM `doctors`  WHERE $filter";
        $sql = $this->conn->query($query);
        return $sql->fetchAll(PDO::FETCH_ASSOC);


    }
    public function selectDoctorFromSqlwithfilter($filter=true){

        $query = "SELECT * FROM `doctors`  WHERE $filter";
        $sql = $this->conn->query($query);
        $records = $sql->fetchAll(PDO::FETCH_ASSOC);
        $Array = [];
        foreach ($records as $record){
           $rr =  str_replace('../' , '' , $record['image']);
           $record['image'] = $rr;
           $Array[]=$record;
        }
        return $Array;


    }
    public function selectMajorNameFromSql(){

        $query = "SELECT `name` FROM `majors` WHERE `id` = '$this->doctor_major'";
        $sql = $this->conn->query($query);
        return $sql->fetchAll(PDO::FETCH_ASSOC);


    }






}



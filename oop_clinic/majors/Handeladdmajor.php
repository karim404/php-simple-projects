<?php

class Handeladdmajor
{
    public $conn;

    public $majortitle;

    public $image_name;

    public $tmp_name;

    public $path;

    public function __construct()
    {
        $this->conn = new PDO("mysql:host=localhost;dbname=oopclinic" , "root", "");
    }

    public function checkRequest(){
        if($_SERVER['REQUEST_METHOD']=='POST'){

            $this->majortitle = $_POST['majortitle'];
            $this->image_name = $_FILES['image']['name'];
            $this->tmp_name = $_FILES['image']['tmp_name'];
            $this->path = 'assets/images/major-image/'.$this->image_name;

        }

    }

    public function uploadImage(){

        move_uploaded_file($this->tmp_name , 'C:\xampp\htdocs\G318\projects\oop clinic\assets\images\major-image\\' .$this->image_name );

    }

    public function insertMajorToSql(){

        $query = "INSERT INTO `majors` (`name` ,`image` ) VALUES ('$this->majortitle' , '$this->path')";


        $sql = $this->conn->prepare($query);

        return $sql->execute();
    }

    public function selectMajorFromSql(){

        $query = "SELECT * FROM `majors`";
        $sql = $this->conn->query($query);
        return $sql->fetchAll(PDO::FETCH_ASSOC);


    }




}







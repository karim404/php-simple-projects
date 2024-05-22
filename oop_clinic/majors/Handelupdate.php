<?php

class Handelupdate
{
    public $conn;
   public $id;
   public $majortitle;
   public $path;
   public $image_name;
   public $tmp_name;

    public function __construct()
    {
        $this->conn = new PDO("mysql:host=localhost;dbname=oopclinic" , "root", "");
    }
    public function recieveDataFromGet(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $this->id = $_GET['id'];
            $this->majortitle = $_POST['majortitle'];
            $this->tmp_name = $_FILES['image']['tmp_name'];
            $this->image_name = $_FILES['image']['name'];
            $this->path = 'assets/images/major-image/'.$this->image_name;
        }

    }

    public function uploadImage(){

        move_uploaded_file($this->tmp_name , 'C:\xampp\htdocs\G318\projects\oop clinic\assets\images\major-image\\' .$this->image_name );

    }

    public function updateMajorFromSql(){
        $query = "UPDATE `majors` SET `name` = '$this->majortitle' , `image` = '$this->path' WHERE `id` = '$this->id'";
        return $this->conn->prepare($query)->execute();

    }
}

$updatemajor = new Handelupdate;

$updatemajor->recieveDataFromGet();
$updatemajor->uploadImage();

$updatemajor->updateMajorFromSql();

 header("location:../majors.php");
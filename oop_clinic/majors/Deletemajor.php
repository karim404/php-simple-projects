<?php



class Deletemajor
{
    public $id;

    public $conn;

    public function __construct(){
        if ($_SERVER['REQUEST_METHOD']=='GET'){

            $this->id = $_GET['id'];
            $this->conn = new PDO("mysql:host=localhost;dbname=oopclinic" , "root", "");
        }
    }

    public function deleteMajorFromSql(){
        $query = "DELETE FROM `majors` WHERE `id` = '$this->id' ";
        return $this->conn->prepare($query)->execute();

    }
}

$deletemajor = new Deletemajor;

$deletemajor->deleteMajorFromSql();

header("location:../majors.php");
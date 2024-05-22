<?php

//include "../Connection.php";

class ContactHandling
{
    public $name;
    public $email;
    public $phone;
    public $subject;
    public $message;
    public $conn;

    public function __construct()
    {
        $this->conn = new PDO("mysql:host=localhost;dbname=oopclinic" , "root", "");
    }
    public function SanitizeAttrOfContact(){

        $this->name = trim(stripslashes(htmlspecialchars(htmlentities($_POST['name']))));
        $this->phone =trim(stripslashes(htmlspecialchars(htmlentities($_POST['phone']))));
        $this->subject =trim(stripslashes(htmlspecialchars(htmlentities($_POST['subject']))));
        $this->message =trim(stripslashes(htmlspecialchars(htmlentities($_POST['message']))));

        $this->email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);

    }

    public function insertContactToSql(){
        $query = "INSERT INTO `contact` (`name`,`email`,`phone`,`subject`,`message`) 
                    VALUES('$this->name','$this->email','$this->phone','$this->subject','$this->message')";
        $sql = $this->conn->prepare($query);
        return $sql->execute();
    }

    public  function selectContactFromSql(){
        $query = "SELECT * FROM `contact` ";
        $sql = $this->conn->query($query);
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}


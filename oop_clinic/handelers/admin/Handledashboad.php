<?php
if(session_status() == PHP_SESSION_NONE) session_start();
require_once "../Connection.php";

class Handledashboad extends Connection
{
    public $id;


    public function setAttr(){
        $this->id = $_GET['id'];
    }
    public function changeBookingStatis($status){
        $query = "UPDATE `booking` SET `status` = '$status' WHERE `id` = '$this->id'";
        $sql = $this->conn->prepare($query);
//        $_SESSION['booking_status']='approve';
        return $sql->execute();
    }

    public function selectBookingStatus(){
        $query = "SELECT * FROM `booking` WHERE `id` = $this->id";
        $sql = $this->conn->query($query);
        $row = $sql->fetch(PDO::FETCH_ASSOC);
        if(($row['status'])=='approve'){
            $this->changeBookingStatis('pending');
//            $_SESSION['booking_status']='pending';
        }elseif(($row['status'])=='pending'){
            $this->changeBookingStatis('approve');
//            $_SESSION['booking_status']='approve';
        }


    }




}


<?php 

session_start();

if(isset($_GET['id'])){

    $conn = mysqli_connect("localhost","root","","todoapp");

    if(!$conn){
        $_SESSION['errors']="connection error" . mysqli_connect_error($conn);
    }

    $id = $_GET['id'];

    $sql = "SELECT * FROM `tasks` WHERE `id` = '$id' ";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_row($result);

    // var_dump($row);
    // die;

    if($row==NULL){
        $_SESSION['errors']= "data not exsists";
        // echo"not";
        
    }else{
        $id = $_GET['id'];
        $sql = "DELETE FROM `tasks` WHERE `id` = $id";
        mysqli_query($conn,$sql);
        $_SESSION['success']='data deleted successfully';
    }


    header("location: ../index.php");


}


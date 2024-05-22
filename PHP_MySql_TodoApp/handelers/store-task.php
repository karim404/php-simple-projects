<?php 
session_start();
// require_once("../database/migiration.php");

$conn = mysqli_connect("localhost","root","","todoapp");

if(!$conn){
    echo"connection error" . mysqli_connect_error($conn);
}



if ($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['title'])){
    
    $title = trim(stripslashes(htmlentities(htmlspecialchars($_POST['title']))));

    $sql = "INSERT INTO `tasks` (`title`) VALUES ('$title')";

    $result = mysqli_query($conn,$sql);

    echo mysqli_affected_rows($conn);

    if(mysqli_affected_rows($conn)==1){
        $_SESSION['success']='data inserted successfully';
    }else{
        echo "data didn't insert successfully";
    }

    header("location: ../index.php");






}

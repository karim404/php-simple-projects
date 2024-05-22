<?php 
session_start();

// echo"<pre>";
// var_dump($_POST);

// echo"<br>";
// echo"<pre>";
// var_dump($_GET);
// die;

$conn = mysqli_connect("localhost","root","","todoapp");
if(!$conn){
    $_SESSION['errors']=  "connect error " . mysqli_connect_error($conn);
}


if($_SERVER['REQUEST_METHOD']  == "POST"){

    

    $id = $_GET['id'];
    $title = trim(stripslashes(htmlentities(htmlspecialchars($_POST['title']))));

    if(strlen($title)<3){
        $_SESSION['errors']="title must be greather than 3 characters";
    }


    if(empty($_SESSION['errors'])){
        $sql = "UPDATE `tasks` SET `title`='$title' WHERE `id` = $id ";
        $result = mysqli_query($conn,$sql);

        if($result){
            $_SESSION['success']="data updated successfully";
        }
        
    }else{
        header("location:../update.php");
        
    }



    header("location:../index.php");


    
}
<?php
if(session_status() == PHP_SESSION_NONE) session_start();
require_once "HandleBooking.php";
if(isset($_SESSION['auth']['user_id'])){
    $booking = new HandleBooking();
    $booking->SetAttributes();
    $booking->inserIntoBookingSql();
    header("location:../../index.php");
}else{
    header("location:../../login.php");
    $_SESSION['errors']='please login with your Email!';

}


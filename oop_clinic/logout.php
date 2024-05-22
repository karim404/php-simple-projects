<?php
if(session_status() == PHP_SESSION_NONE) session_start();
//echo"<pre>";
//print_r($_SESSION['auth']['user_id']);

unset($_SESSION['auth']);
//session_destroy($_SESSION['auth']);
header("location:index.php");
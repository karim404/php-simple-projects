<?php
require_once '../inc/functions.php';

if(session_status() === PHP_SESSION_NONE) session_start();

if(isset($_GET['id'])){
    dd($_GET);
    $key = $_GET['id'];
    $students = json_decode(file_get_contents('../data.json'), true);
    foreach ($students as $student){
        echo $students['id'];
        die;
        if($_GET['id']==$students[$key]){
            unset($students[$key]);

            $students = array_values($students);

            file_put_contents('../data.json', json_encode($students));

            $_SESSION['success'] = 'Student Deleted Successfully!';
            redirect('../index.php');        }
    }

}


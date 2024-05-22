<?php
require_once '../inc/functions.php';

if( session_status()=== PHP_SESSION_NONE) session_start();

if($_SERVER['REQUEST_METHOD']=='POST'){
    $errors=[];

//    dd($_POST);

    // sanitize Inputs

    foreach ($_POST as $key => $value)
        $$key=sanitizeInput($value);
//        echo "$key" . " : " . "$value" ."<br>";
//        var_dump($key);
//        echo "<br>";


    // validation Inputs
    if (empty($name)) {$errors[]='Please Enter Your Name';}
    if (minval($name,3 || maxval ($name, 20))) $errors[]='Please Enter a Name among 3 to 20 characters';
    if(empty($email)) $errors[] = 'Please enter your email!';
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Please enter a valid email!';

    if(empty($age)) $errors[] = 'Please enter your age!';

    if (empty($errors)) {
        // الخطوة دي مهمة
        $students = json_decode(file_get_contents('../data.json'), true);

        $newStudent = [
            'name' => $name,
            'email' => $email,
            'age' => $age,

        ];

        $students[] = $newStudent;
//        dd($students);

        file_put_contents('../data.json', json_encode($students));
        header('location: ../index.php');
        die;
    }else{
        $_SESSION['errors']=$errors;
        header('location: ../pages/create.php');
        die;
    }










//    print_r($name);


//    $email=$_POST['email'];
//    $name=$_POST['name'];
//    $age=$_POST['age'];
//
//    sanitizeInput()
}
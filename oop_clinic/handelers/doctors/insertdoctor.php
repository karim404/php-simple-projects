<?php

require_once "Handeladddoctor.php";

//echo"<pre>";
//                    print_r($_GET);
//                    die;

$id = $_GET['id'];

$insert_doctor = new Handeladddoctor();
$insert_doctor->checkRequest();
$insert_doctor->uploadImage();
$insert_doctor->insertDoctorToSql();
header("location:../../doctors/index.php");
<?php

require_once "Handeladdmajor.php";

$insertmajor = new Handeladdmajor;

$insertmajor->checkRequest();
$insertmajor->uploadImage();
$insertmajor->insertMajorToSql();
header("location:../majors.php");
<?php
if(session_status() == PHP_SESSION_NONE) session_start();
require_once "contactHandling.php";
$contact = new ContactHandling();
$contact->SanitizeAttrOfContact();
$contact->insertContactToSql();
$_SESSION['success']='message had been send successfully';
header("location:../../contact.php");
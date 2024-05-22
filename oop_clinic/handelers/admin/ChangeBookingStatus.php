<?php
require_once "Handledashboad.php";
$approve  = new Handledashboad();
$approve ->setAttr();
$approve ->selectBookingStatus();

header("location:../../dashboard.php");
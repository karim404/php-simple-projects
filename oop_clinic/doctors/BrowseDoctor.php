<?php

require_once '../handelers/doctors/headerDoctor.php';
require_once '../handelers/doctors/navbar.php';
require_once "../handelers/doctors/Handeladddoctor.php";


$doctor = new Handeladddoctor();
$id = $_GET['id'];
$rows = $doctor->selectDoctorFromSql(" `majors_id` = $id");
?>
<div class="d-flex flex-wrap gap-4 justify-content-center">
<?php
foreach ($rows as $row):

    $query = "SELECT * FROM `majors` WHERE `id` = '$id'";
    $sql = $doctor->conn->query($query);
    $r = $sql->fetch(PDO::FETCH_ASSOC);

    ?>

    <div class="doctors-grid">
        <div class="card p-2" style="width: 18rem;">
            <img src="<?=$row['image']?>" class="card-img-top rounded-circle card-image-circle"
                 alt="major">
            <div class="card-body d-flex flex-column gap-1 justify-content-center">
                <h4 class="card-title fw-bold text-center"><?=$row['name']?></h4>
                <h6 class="card-title fw-bold text-center">Major Of <?=$r['name']?></h6>
                <a href="./doctor.php?id=<?=$row['id'] ;?>" class="btn btn-outline-primary card-button">Book an appointment</a>
            </div>
        </div>
    </div>
<?php endforeach;?>

</div>
<?php require_once '../handelers/doctors/footerDoctor.php'; ?>





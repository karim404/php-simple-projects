<?php
if(session_status() == PHP_SESSION_NONE) session_start();

require_once '../handelers/doctors/headerDoctor.php';
require_once '../handelers/doctors/navbar.php';
require_once "../handelers/doctors/Handeladddoctor.php";

//echo"<pre>";
//print_r($_SESSION['auth']['user_id']);
//die;


                $doctor = new Handeladddoctor();

                $rows = $doctor->selectDoctorFromSql();
?>
    <div class="d-flex flex-wrap gap-4 justify-content-center">
<?php
                foreach ($rows as $row):
                    $major_id = $row["majors_id"];
                    $query = "SELECT `name` FROM `majors` WHERE `id` = '$major_id'";
                    $sql = $doctor->conn->query($query);
                    $r = $sql->fetch(PDO::FETCH_ASSOC);
//                    echo"<pre>";
//                    print_r($r);
//                    die;

            ?>
            <div class="doctors-grid">

                <div class="card p-2" style="width: 18rem;">
                    <img src="<?=$row['image']?>" class="card-img-top rounded-circle card-image-circle"
                        alt="major">
                    <div class="card-body d-flex flex-column gap-1 justify-content-center">
                        <h4 class="card-title fw-bold text-center"><?=$row['name']?></h4>
                        <h6 class="card-title fw-bold text-center">Major Of <?=$r['name']?></h6>
                        <a href="./doctor.php?id=<?=$row['id'] ;?>"  class="btn btn-outline-primary card-button">Book an appointment</a>
                        <?php if(isset($_SESSION['auth']['admin_id'])): ?>
                        <a href="../handelers/doctors/UpdateDoctor.php?id=<?= $row['id']?>" class="btn btn-outline-secondary card-button">update</a>
                        <a href="../handelers/doctors/DeleteDoctor.php?id=<?= $row['id'] ?>" class="btn btn-outline-danger card-button">delete</a>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
            <?php endforeach;?>
    </div>

<?php require_once '../handelers/doctors/footerDoctor.php'; ?>
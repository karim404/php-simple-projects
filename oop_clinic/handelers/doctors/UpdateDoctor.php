
<?php
require_once "../../inc/header.php";

$con= mysqli_connect('localhost','root' , '', 'oopclinic');
$query = "SELECT * FROM `majors`";
$result = mysqli_query($con , $query);
$rows = mysqli_fetch_all($result , MYSQLI_ASSOC) ;
$doctor_id = $_GET['id'];
?>

<div class="d-flex align-items-center justify-content-center" >

    <form class="card p-2" style="width: 30rem; height:25rem;" action="UpdateHandelDoctor.php?id=<?=$doctor_id?>" method="POST" enctype="multipart/form-data">
        <input type="file"   name="image"/>
        <div class="card-body d-flex flex-column gap-1 justify-content-center">
            <input class="" name="doctor_name" placeholder="type doctor name">



            <div class="input-group mb-3">
                <select class="form-select" name="doctor_major_id" value="" id="inputGroupSelect02">
                    <option selected>Choose...</option>
                    <?php foreach ($rows as $row ): ?>

                        <option value="<?=$row['id'] ;?>"><?=$row['name'] ;?></option>
                        <
                    <?php endforeach; ?>
                </select>
                <label class="input-group-text" for="inputGroupSelect02">doctor major </label>
            </div>



            <a href="./doctors/index.php" class="btn btn-outline-primary card-button">Browse Doctors</a>
            <textarea class="form-control" name="bio" id="exampleFormControlTextarea1" rows="3" placeholder="type bio "></textarea>
            <button  class="btn btn-outline-primary card-button">add</button>


        </div>
    </form>
</div>
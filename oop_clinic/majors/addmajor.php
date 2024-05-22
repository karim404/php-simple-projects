<?php
    require_once "../inc/header.php";
?>


    <div class="d-flex align-items-center justify-content-center" >

        <form class="card p-2" style="width: 18rem;" action="insertmajor.php" method="POST" enctype="multipart/form-data">
            <input type="file"   name="image"/>
            <div class="card-body d-flex flex-column gap-1 justify-content-center">
                <input class="" name="majortitle" placeholder="type Major title">
                <a href="./doctors/index.php" class="btn btn-outline-primary card-button">Browse Doctors</a>
                <button  class="btn btn-outline-primary card-button">add</button>


            </div>
        </form>
    </div>
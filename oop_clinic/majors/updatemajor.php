
<?php
require_once "../inc/header.php";

if ($_SERVER['REQUEST_METHOD']=='GET'){
    $id = $_GET['id'];
}
?>

<div class="d-flex align-items-center justify-content-center" >

    <form class="card p-2" style="width: 18rem;" action="Handelupdate.php?id=<?=$id?>" method="POST" enctype="multipart/form-data">
        <input type="file"   name="image"/>
        <div class="card-body d-flex flex-column gap-1 justify-content-center">
            <input class="" name="majortitle" placeholder="type Major title">
            <a href="./doctors/index.php" class="btn btn-outline-primary card-button">Browse Doctors</a>
            <button  class="btn btn-outline-primary card-button">update</button>


        </div>
    </form>
</div>

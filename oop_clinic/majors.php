<?php
    require_once "inc/header.php";
?>


<body>
    <div class="page-wrapper">
        <?php require_once "inc/nav.php";?>
        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">majors</li>
                </ol>
                <?php if(isset($_SESSION['auth']['admin_id'])): ?>
                <a href="majors/addmajor.php" class="btn btn-outline-primary card-button">Add Major</a>
                <?php endif; ?>
            </nav>

            <div class="d-flex flex-wrap gap-4 justify-content-center">

                <?php  require_once "majors/Handeladdmajor.php";

                        $insertmajor = new Handeladdmajor;

                        $rows = $insertmajor->selectMajorFromSql();

                                foreach($rows as $row){ ?>
                                    <div class="card p-2" style="width: 18rem;>
                                        <div class="card p-2" style="width: 18rem " >
                                            <img src="<?=$row['image']?>" class="card-img-top rounded-circle card-image-circle"
                                                alt="major">
                                            <div class="card-body d-flex flex-column gap-1 justify-content-center">
                                                <h4 class="card-title fw-bold text-center"><?= $row['name'] ?></h4>
                                                <a href="./doctors/BrowseDoctor.php?id=<?= $row['id']?>" class="btn btn-outline-primary card-button">Browse Doctors</a>

                                                <?php if(isset($_SESSION['auth']['admin_id'])): ?>
                                                <a href="majors/UpdateMajor.php?id=<?= $row['id']?>" class="btn btn-outline-secondary card-button">update</a>
                                                <a href="majors/DeleteMajor.php?id=<?= $row['id']?>" class="btn btn-outline-danger card-button">delete</a>
                                                <?php endif; ?>
                                            </div>
<!--                                        </div>-->

                                    </div>
                                <?php } ?>
            </div>




            <nav class="mt-5" aria-label="navigation">
                <ul class="pagination justify-content-center">
                    <li class="page-item">
                        <a class="page-link page-prev" href="#" aria-label="Previous">
                            <span aria-hidden="true">
                                < </span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link page-next" href="#" aria-label="Next">
                            <span aria-hidden="true"> > </span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <?php require_once "inc/footer.php";?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js"
        integrity="sha512-fHY2UiQlipUq0dEabSM4s+phmn+bcxSYzXP4vAXItBvBHU7zAM/mkhCZjtBEIJexhOMzZbgFlPLuErlJF2b+0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>
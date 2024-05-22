<?php if(session_status() == PHP_SESSION_NONE) session_start(); ?>
<nav class="navbar navbar-expand-lg navbar-expand-md bg-blue sticky-top">
    <div class="container">
        <div class="navbar-brand">
            <a class="fw-bold text-white m-0 text-decoration-none h3" href="index.php">VCare</a>
        </div>
        <button class="navbar-toggler btn-outline-light border-0 shadow-none" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <div class="d-flex gap-3 flex-wrap justify-content-center" role="group">
                <a type="button" class="btn btn-outline-light navigation--button" href="index.php">Home</a>
                <?php
                    if(isset($_SESSION['auth']['admin_id'])){ ?>
                        <a type="button" class="btn btn-outline-light navigation--button" href="dashboard.php">Dashboard</a>

                    <?php } ?>


                <a type="button" class="btn btn-outline-light navigation--button"
                   href="majors.php">majors</a>
                <a type="button" class="btn btn-outline-light navigation--button"
                   href="./doctors/index.php">Doctors</a>
<!--                <a type="button" class="btn btn-outline-light navigation--button" href="login.php">login</a>-->
                <?php
                if(isset($_SESSION['auth'] )): ?>
                <a type="button" class="btn btn-outline-light navigation--button" href="logout.php">logout</a>

                <?php endif; ?>

                <?php
                if(!isset($_SESSION['auth'])): ?>
                    <a type="button" class="btn btn-outline-light navigation--button" href="login.php">login</a>

                <?php endif; ?>

            </div>
        </div>
    </div>
</nav>

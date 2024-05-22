<?php
if(session_status() == PHP_SESSION_NONE) session_start();
?>

<div class="page-wrapper">
    <nav class="navbar navbar-expand-lg navbar-expand-md bg-blue sticky-top">
        <div class="container">
            <div class="navbar-brand">
                <a class="fw-bold text-white m-0 text-decoration-none h3" href="../index.php" index.php">VCare</a>
            </div>
            <button class="navbar-toggler btn-outline-light border-0 shadow-none" type="button"
                    data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <div class="d-flex gap-3 flex-wrap justify-content-center" role="group">
                    <a type="button" class="btn btn-outline-light navigation--button" href="../index.php"
                       index.php">Home</a>
                    <?php
                    if(isset($_SESSION['auth']['admin_id'])){ ?>
                        <a type="button" class="btn btn-outline-light navigation--button" href="../dashboard.php">Dashboard</a>

                    <?php } ?>
                    <a type="button" class="btn btn-outline-light navigation--button" href="../majors.php"
                       majors.php">majors</a>
                    <a type="button" class="btn btn-outline-light navigation--button"
                       href="./index.php">Doctors</a>
                    <?php
                    if(isset($_SESSION['auth'] )): ?>
                        <a type="button" class="btn btn-outline-light navigation--button" href="../logout.php">logout</a>

                    <?php endif; ?>

                    <?php
                    if(!isset($_SESSION['auth'])): ?>
                        <a type="button" class="btn btn-outline-light navigation--button" href="../login.php">login</a>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a class="text-decoration-none" href="../index.php"
                                               index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">doctors</li>
            </ol>
        </nav>
        <div
            class="filteration d-flex gap-3 mb-3 flex-wrap justify-content-center justify-content-lg-start justify-content-md-start">
            <div class="dropdown">
                <button class="btn bg-blue btn-primary align-items-center d-flex gap-2 dropdown-toggle"
                        type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    governorate
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Cairo</a></li>
                    <li><a class="dropdown-item" href="#">Alexandria</a></li>
                    <li><a class="dropdown-item" href="#">Giza</a></li>
                    <li><a class="dropdown-item" href="#">Shubra El-Kheima</a></li>
                    <li><a class="dropdown-item" href="#">Port Said</a></li>
                    <li><a class="dropdown-item" href="#">Suez</a></li>
                    <li><a class="dropdown-item" href="#">Luxor</a></li>
                    <li><a class="dropdown-item" href="#">Asyut</a></li>
                    <li><a class="dropdown-item" href="#">Ismailia</a></li>
                    <li><a class="dropdown-item" href="#">Fayoum</a></li>
                    <li><a class="dropdown-item" href="#">Zagazig</a></li>
                    <li><a class="dropdown-item" href="#">Aswan</a></li>
                    <li><a class="dropdown-item" href="#">Damietta</a></li>
                    <li><a class="dropdown-item" href="#">Damanhur</a></li>
                    <li><a class="dropdown-item" href="#">Minya</a></li>
                    <li><a class="dropdown-item" href="#">Beni Suef</a></li>
                    <li><a class="dropdown-item" href="#">Qena</a></li>
                    <li><a class="dropdown-item" href="#">Sohag</a></li>
                    <li><a class="dropdown-item" href="#">Hurghada</a></li>
                    <li><a class="dropdown-item" href="#">6th of October</a></li>
                    <li><a class="dropdown-item" href="#">Shibin El Kom</a></li>
                    <li><a class="dropdown-item" href="#">Banha</a></li>
                    <li><a class="dropdown-item" href="#">Kafr el-Sheikh</a></li>
                    <li><a class="dropdown-item" href="#">Arish</a></li>
                    <li><a class="dropdown-item" href="#">Mallawi</a></li>
                    <li><a class="dropdown-item" href="#">10th of Ramadan</a></li>
                    <li><a class="dropdown-item" href="#">Bilbais</a></li>
                    <li><a class="dropdown-item" href="#">Marsa Matruh</a></li>
                    <li><a class="dropdown-item" href="#">Idfu</a></li>
                    <li><a class="dropdown-item" href="#">Mit Ghamr</a></li>
                    <li><a class="dropdown-item" href="#">Al-Hamidiyya</a></li>
                    <li><a class="dropdown-item" href="#">Desouk</a></li>
                    <li><a class="dropdown-item" href="#">Qalyub</a></li>
                    <li><a class="dropdown-item" href="#">Abu Kabir</a></li>
                    <li><a class="dropdown-item" href="#">Kafr el-Dawwar</a></li>
                    <li><a class="dropdown-item" href="#">Girga</a></li>
                    <li><a class="dropdown-item" href="#">Akhmim</a></li>
                    <li><a class="dropdown-item" href="#">Matareya</a></li>
                    <li><a class="dropdown-item" href="#">Qutur</a></li>
                    <li><a class="dropdown-item" href="#">New Cairo</a></li>
                    <li><a class="dropdown-item" href="#">Siwa Oasis</a></li>
                    <li><a class="dropdown-item" href="#">Hurghada</a></li>
                    <li><a class="dropdown-item" href="#">El Alamein</a></li>
                    <li><a class="dropdown-item" href="#">Ras El Bar</a></li>
                    <li><a class="dropdown-item" href="#">Rafah</a></li>
                    <li><a class="dropdown-item" href="#">Dahab</a></li>
                    <li><a class="dropdown-item" href="#">Nuweiba</a></li>
                    <li><a class="dropdown-item" href="#">Saint Catherine</a></li>
                </ul>
            </div>
            <div class="dropdown">
                <button class="btn bg-blue btn-primary align-items-center d-flex gap-2 dropdown-toggle"
                        type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    city
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Cairo</a></li>
                    <li><a class="dropdown-item" href="#">Alexandria</a></li>
                    <li><a class="dropdown-item" href="#">Giza</a></li>
                    <li><a class="dropdown-item" href="#">Shubra El-Kheima</a></li>
                    <li><a class="dropdown-item" href="#">Port Said</a></li>
                    <li><a class="dropdown-item" href="#">Suez</a></li>
                    <li><a class="dropdown-item" href="#">Luxor</a></li>
                    <li><a class="dropdown-item" href="#">Asyut</a></li>
                    <li><a class="dropdown-item" href="#">Ismailia</a></li>
                    <li><a class="dropdown-item" href="#">Fayoum</a></li>
                    <li><a class="dropdown-item" href="#">Zagazig</a></li>
                    <li><a class="dropdown-item" href="#">Aswan</a></li>
                    <li><a class="dropdown-item" href="#">Damietta</a></li>
                    <li><a class="dropdown-item" href="#">Damanhur</a></li>
                    <li><a class="dropdown-item" href="#">Minya</a></li>
                    <li><a class="dropdown-item" href="#">Beni Suef</a></li>
                    <li><a class="dropdown-item" href="#">Qena</a></li>
                    <li><a class="dropdown-item" href="#">Sohag</a></li>
                    <li><a class="dropdown-item" href="#">Hurghada</a></li>
                    <li><a class="dropdown-item" href="#">6th of October</a></li>
                    <li><a class="dropdown-item" href="#">Shibin El Kom</a></li>
                    <li><a class="dropdown-item" href="#">Banha</a></li>
                    <li><a class="dropdown-item" href="#">Kafr el-Sheikh</a></li>
                    <li><a class="dropdown-item" href="#">Arish</a></li>
                    <li><a class="dropdown-item" href="#">Mallawi</a></li>
                    <li><a class="dropdown-item" href="#">10th of Ramadan</a></li>
                    <li><a class="dropdown-item" href="#">Bilbais</a></li>
                    <li><a class="dropdown-item" href="#">Marsa Matruh</a></li>
                    <li><a class="dropdown-item" href="#">Idfu</a></li>
                    <li><a class="dropdown-item" href="#">Mit Ghamr</a></li>
                    <li><a class="dropdown-item" href="#">Al-Hamidiyya</a></li>
                    <li><a class="dropdown-item" href="#">Desouk</a></li>
                    <li><a class="dropdown-item" href="#">Qalyub</a></li>
                    <li><a class="dropdown-item" href="#">Abu Kabir</a></li>
                    <li><a class="dropdown-item" href="#">Kafr el-Dawwar</a></li>
                    <li><a class="dropdown-item" href="#">Girga</a></li>
                    <li><a class="dropdown-item" href="#">Akhmim</a></li>
                    <li><a class="dropdown-item" href="#">Matareya</a></li>
                    <li><a class="dropdown-item" href="#">Qutur</a></li>
                    <li><a class="dropdown-item" href="#">New Cairo</a></li>
                    <li><a class="dropdown-item" href="#">Siwa Oasis</a></li>
                    <li><a class="dropdown-item" href="#">Hurghada</a></li>
                    <li><a class="dropdown-item" href="#">El Alamein</a></li>
                    <li><a class="dropdown-item" href="#">Ras El Bar</a></li>
                    <li><a class="dropdown-item" href="#">Rafah</a></li>
                    <li><a class="dropdown-item" href="#">Dahab</a></li>
                    <li><a class="dropdown-item" href="#">Nuweiba</a></li>
                    <li><a class="dropdown-item" href="#">Saint Catherine</a></li>
                </ul>
            </div>
            <div class="dropdown">
                <button class="btn bg-blue btn-primary align-items-center d-flex gap-2 dropdown-toggle"
                        type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    major
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>

            </div>
            <?php if(isset($_SESSION['auth']['admin_id'])): ?>
            <a class="btn bg-blue btn-primary align-items-center d-flex gap-2" href="../handelers/doctors/adddoctor.php">add doctor</a>
            <?php endif; ?>
        </div>
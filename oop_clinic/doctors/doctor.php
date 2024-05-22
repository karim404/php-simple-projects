<?php
if(session_status() == PHP_SESSION_NONE) session_start();
require_once '../handelers/doctors/headerDoctor.php';
require_once '../handelers/doctors/Handeladddoctor.php';
$doctor_id = $_GET['id'];
if(isset($_SESSION['auth']) && $_GET['id']) {



    $doctor_id = $_GET['id'];

    $_SESSION['auth_doctor']=[ 'doctor_id'=>$doctor_id];
//    echo"<pre>";
//    print_r($_SESSION['auth']);
//    print_r($_SESSION['auth_doctor']);
//    die;
//    $user_id = $_SESSION['auth'];

}

$doctor = new Handeladddoctor;
//$doctor->selectDoctorFromSql();
$rows = $doctor->selectDoctorFromSql(" `id` = $doctor_id " );


?>


<body>
    <div class="page-wrapper">
        <nav class="navbar navbar-expand-lg navbar-expand-md bg-blue sticky-top">
            <div class="container">
                <div class="navbar-brand">
                    <a class="fw-bold text-white m-0 text-decoration-none h3" href="../index.php">VCare</a>
                </div>
                <button class="navbar-toggler btn-outline-light border-0 shadow-none" type="button"
                    data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <div class="d-flex gap-3 flex-wrap justify-content-center" role="group">
                        <a type="button" class="btn btn-outline-light navigation--button" href="../index.php">Home</a>
                        <?php
                        if(isset($_SESSION['auth']['admin_id'])){ ?>
                            <a type="button" class="btn btn-outline-light navigation--button" href="../dashboard.php">Dashboard</a>

                        <?php } ?>
                        <a type="button" class="btn btn-outline-light navigation--button"
                            href="../majors.php">majors</a>
                        <a type="button" class="btn btn-outline-light navigation--button"
                            href="../doctors/index.php">Doctors</a>
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
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="../index.php">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="./index.php">doctors</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">doctor name</li>
                </ol>
            </nav>
            <div class="d-flex flex-column gap-3 details-card doctor-details">
                <div class="details d-flex gap-2 align-items-center">
                    <img src="<?=$rows[0]['image']?>" alt="doctor" class="img-fluid rounded-circle" height="150"
                        width="150">
                    <div class="details-info d-flex flex-column gap-3 ">
                        <h4 class="card-title fw-bold"><?=$rows[0]['name']?></h4>
                        <div class="d-flex gap-3 align-bottom">
                            <ul class="rating">
                                <li class="star"></li>
                                <li class="star"></li>
                                <li class="star"></li>
                                <li class="star"></li>
                                <li class="star"></li>
                            </ul>
                            <a href="#" class="align-baseline">submit rating</a>
                        </div>
                        <h6 class="card-title fw-bold"><?=$rows[0]['bio']?></h6>
                    </div>
                </div>
                <hr />
                <form class="form" method="POST" action="../handelers/booking/addbooking.php">
                    <div class="form-items">
                        <div class="mb-3">
                            <label class="form-label required-label" for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label required-label" for="phone">Phone</label>
                            <input type="tel" class="form-control" name="phone" id="phone" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label required-label" for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" >Confirm Booking</button>
                </form>

            </div>
        </div>
    </div>
    <footer class="container-fluid bg-blue text-white py-3">
        <div class="row gap-2">

            <div class="col-sm order-sm-1">
                <h1 class="h1">About Us</h1>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsa nesciunt repellendus itaque,
                    laborum
                    saepe
                    enim maxime, delectus, dicta cumque error cupiditate nobis officia quam perferendis consequatur
                    cum
                    iure
                    quod facere.</p>
            </div>
            <div class="col-sm order-sm-2">
                <h1 class="h1">Links</h1>
                <div class="links d-flex gap-2 flex-wrap">
                    <a href="../index.php" class="link text-white">Home</a>
                    <a href="../majors.php" class="link text-white">Majors</a>
                    <a href="./index.php" class="link text-white">Doctors</a>
                    <a href="../login.php" class="link text-white">Login</a>
                    <a href="../register.php" class="link text-white">Register</a>
                    <a href="../contact.php" class="link text-white">Contact</a>
                </div>
            </div>
        </div>
    </footer>
    <script>
        const stars = document.querySelectorAll('.star');

        stars.forEach((star, index) => {
            star.addEventListener('click', () => {
                const isActive = star.classList.contains('active');
                if (isActive) {
                    star.classList.remove('active');
                } else {
                    star.classList.add('active');
                }
                for (let i = 0; i < index; i++) {
                    stars[i].classList.add('active');
                }
                for (let i = index + 1; i < stars.length; i++) {
                    stars[i].classList.remove('active');
                }
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js"
        integrity="sha512-fHY2UiQlipUq0dEabSM4s+phmn+bcxSYzXP4vAXItBvBHU7zAM/mkhCZjtBEIJexhOMzZbgFlPLuErlJF2b+0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>
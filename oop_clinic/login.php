<?php
    if(session_status() == PHP_SESSION_NONE) session_start();
    require_once "inc/header.php";
?>


<body>
    <div class="page-wrapper">
        <?php require_once "inc/nav.php";?>
        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">login</li>
                </ol>
            </nav>
            <div class="d-flex flex-column gap-3 account-form  mx-auto mt-5">

                <?php if(isset($_SESSION['success'])){ ?>
                    <div class="div alert alert-success text-center mt-3">
                        <?php
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);

                        ?>
                    </div>
                <?php }elseif(isset($_SESSION['errors'])){ ?>
                    <div class="div alert alert-danger text-center mt-3">
                        <?php
                        echo $_SESSION['errors'];
                        unset($_SESSION['errors']);

                        ?>
                    </div>
                <?php }?>
                <form class="form" action="handelers/user/LoginUser.php" method="POST">

                    <div class="mb-3">
                        <label class="form-label required-label" for="email" >Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label required-label" for="password">password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
                <div class="d-flex justify-content-center gap-2 flex-column flex-lg-row flex-md-row flex-sm-column">
                    <span>don't have an account?</span><a class="link" href="register.php">create account</a>
                </div>
            </div>

        </div>
    </div>
    <?php require_once "inc/footer.php";?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js"
        integrity="sha512-fHY2UiQlipUq0dEabSM4s+phmn+bcxSYzXP4vAXItBvBHU7zAM/mkhCZjtBEIJexhOMzZbgFlPLuErlJF2b+0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>
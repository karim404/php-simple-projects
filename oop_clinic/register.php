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
            <div class="d-flex flex-column gap-3 account-form mx-auto mt-5">
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
                <form class="form" action="handelers/user/Registeruser.php" method="POST">
                    <div class="form-items">
                        <div class="mb-3">
                            <label class="form-label required-label" for="name" ">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label required-label" for="phone" ">Phone</label>
                            <input type="tel" class="form-control" id="phone" name="phone" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label required-label" for="email" ">Email</label>
                            <input type="email" class="form-control" id="email"  name="email" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label required-label" for="password" ">password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Create account</button>
                </form>
                <div class="d-flex justify-content-center gap-2">
                    <span>already have an account?</span><a class="link" href="login.php" > login</a>
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
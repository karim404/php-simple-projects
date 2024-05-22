<?php
if(session_status()=== PHP_SESSION_NONE) session_start() ;
if(isset($_SESSION['errors'])){ ?>
    <div class="alert alert-danger">
        <ul>
            <?php  foreach ($_SESSION['errors'] as $error) {
                echo "<li>$error</li>";
            }
            unset($_SESSION['errors']);
            ?>
        </ul>
    </div>
    <?php
}?>

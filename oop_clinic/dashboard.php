<?php
if(session_status() == PHP_SESSION_NONE) session_start();

if(isset($_SESSION['auth']['admin_id'])){


require_once "inc/header.php";
require_once "inc/nav.php";
require_once "handelers/doctors/Handeladddoctor.php";
require_once "handelers/booking/HandleBooking.php";
require_once "handelers/contact/ContactHandling.php";

$booking = new HandleBooking();
$bookingrows = $booking->selectBookingFromSql();

$contact = new ContactHandling();
$contactrows = $contact->selectContactFromSql();


}else{
    header("location:index.php");
}
?>


<table class="table table-light">
<!--    <caption>List of users</caption>-->

    <thead>
    <tr>
<!--        <th scope="col">#</th>-->
        <th scope="col">Doctor</th>

        <th scope="col">user name</th>
        <th scope="col">user id</th>
        <th scope="col">booking name</th>
        <th scope="col">booking Email</th>
        <th scope="col">booking phone</th>
        <th scope="col">status</th>
    </tr>
    </thead>
    <?php
    foreach ($bookingrows as $b):
        $user_id = $b['user_id'];
        $doctor_id = $b['doctors_id'];
    $user = $booking->selectUser("id = $user_id");
    $doctor = $booking->selectDoctorFromSql( " id = $doctor_id");
//    echo"<pre>";
//    var_dump($doctor);


    ?>
    <tbody>
    <tr>
<!--        <th scope="row">1</th>-->

        <td><?=$doctor['name']?></td>
        <td><?=$user['name']?></td>
        <td><?=$b['user_id']?></td>


            <td><?=$b['booking_name']?></td>
            <td><?=$b['booking_email']?></td>
            <td><?=$b['booking_phone']?></td>

            <td>
                <?php
//                    if($_SESSION['booking_status'] == 'approve'):?>
                    <a class="btn btn-primary"
                    href="handelers/admin/ChangeBookingStatus.php?id=<?=$b['id']?>"><?=$b['status']?>
                    </a>
<!--                    --><?php //endif;?>

<!--                --><?php //if($_SESSION['booking_status'] == 'pending'):?>

<!--                <a class="btn btn-warning" href="handelers/admin/ChangeToApproval.php?id=--><?php //=$b['id']?><!--">--><?php //=$b['status']?>
<!--                </a>-->

<!--                --><?php //endif;?>
            </td>






    </tr>
    <?php endforeach; ?>

    </tbody>
</table >

<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">contact name</th>
            <th scope="col">contact email</th>
            <th scope="col">contact phone</th>
            <th scope="col">contact subject</th>
            <th scope="col">contact message</th>

        </tr>
    </thead>
    <tbody>
        <?php foreach ($contactrows as $contactrow): ?>
            <tr>
                <th scope="row">1</th>
                <td><?=$contactrow['name']?></td>
                <td><?=$contactrow['email']?></td>
                <td><?=$contactrow['phone']?></td>
                <td><?=$contactrow['subject']?></td>
                <td><?=$contactrow['message']?></td>
            </tr>
        <?php endforeach;?>

    </tbody>

</table>


<?php require_once "inc/footer.php";?>

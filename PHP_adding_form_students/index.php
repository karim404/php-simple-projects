
<?php
$students=json_decode(file_get_contents('data.json'),true);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" />
</head>
<body>


    <div class="container">
        <div class="row">
            <h1 class="text-center my-5">All Students</h1>
            <a class="btn btn-primary" href="pages/create.php">add new student</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Age</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach ($students as $key => $student) {
                    ?>
                    <tr>
                        <th scope="row"><?= $key+1;  ?></th>
                        <td><?= $student['name'] ?></td>
                        <td><?= $student['email'] ?></td>
                        <td><?= $student['age'] ?></td>
                        <td>
                            <a href="#" class="btn btn-info">Edit</a>
                              <a href="logic/delete.php?id=<?=$key?> & x=<?php print_r ($student)  ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>


</body>
</html>
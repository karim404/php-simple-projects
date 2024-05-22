

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
            <h1 class="text-center my-5">Add New Student</h1>
            <a class="btn btn-primary mb-5" href="../index.php">All Students</a>
            <?php require_once "../inc/messages.php"; ?>
            <form action="../logic/store.php" method="POST">
                <div class="form-group  mb-3">
                    <label for="email">email</label>
                    <input type="email" name="email" class="form-control" id="email"  placeholder="Enter email">
                </div>
                <div class="form-group  mb-3">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-check  mb-3 padding-left:0">
                    <label for="age">Age</label>
                    <input type="number" name="age" class="form-control" id="age" placeholder="Age">
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
            
        </div>
    </div>

    
</body>
</html>
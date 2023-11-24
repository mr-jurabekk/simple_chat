<?php

require_once 'functions.php';
if (!empty($_SESSION['user'])){
    header('refresh:0;updateprofil.php'); die;
}


$errorMessage = '';
if (!empty($_POST)) {
    if (!empty($_POST['signin']) && !empty($_POST['password'])) {

        $signin = ($_POST['signin']);
        $newpassword = ($_POST['password']);
        if (signin($signin, $newpassword)){
            header('refresh:0;'); die;
        }else{
            $errorMessage = "Nimadir xato !";
        }
    }
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
    <title>Login</title>
</head>
<body>

<div class="container">
    <div class="row justify-content-center mt-5">

        <div class="col-md-4">
            <form method="post" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h3>Chat - Login</h3>
                        <a class="btn btn-secondary" href="login.php">Log in</a>
                    </div>
                    <div class="card-body">
                        <?php if (!empty($errorMessage)): ?>
                            <div class="alert alert-danger">
                                <?=$errorMessage; ?>
                            </div>
                        <?php endif ?>
                        <input class="form-control my-4" type="text" name="signin" placeholder="Username">
                        <input class="form-control my-4" type="password" name="password" placeholder="Password">
<!--                        <input type="file" name="filename">-->
                        <button type="submit" class="btn btn-success w-100">Send</button>
                    </div>
                </div>
            </form>
           </div>

    </div>

</div>
</body>
</html>

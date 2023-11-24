<?php
include_once 'functions.php';

$err = null;
if (!empty($_FILES)) {
    $extension = '';
    $error = null;
    switch ($_FILES['filename']['type']) {
        case 'image/png':
            $extension = '.png';
            break;
        case 'image/jpg':
            $extension = '.jpg';
            break;
        case 'image/jpeg':
            $extension = '.jpeg';
            break;
        default:
            $error = "Ruxsat etilmagan formatni tanladingiz!";
            break;
    }

    if (empty($error)) {
            $editor = $_SESSION['user'][0];
            move_uploaded_file($_FILES['filename']['tmp_name'], 'files/' . $editor . $extension);
            $filename = $editor . $extension;
            $_SESSION['user']['img'] = $filename;

         header('refresh:0;index.php');
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
    <title>Document</title>
</head>
<body>
<div class="container">
 <div class="row d-flex justify-content-center">
     <div class="col-md-5 mt-5">


    <form class="form  bg-light p-lg-5  m-auto" action="" method="post" enctype="multipart/form-data" >
        <div class="d-flex">
            <input type="file" name="filename">
        </div>
        <button class="btn btn-success d-block w-100 my-4">Upload</button>
    </form>

     </div>
 </div>
</div>
</body>
</html>

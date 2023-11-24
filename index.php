<?php

require_once 'functions.php';

if (empty($_SESSION['user'])){
    echo "<h1>Chatni boshlash uchun avval <a href='login.php'> ro'yxatdan o'ting</a></h1>"; die;
}

$allMessages = allGetMessage();
array_pop($allMessages);
if (!empty($_POST)){
    $img = $_POST['img'];
    $message = $_POST['message'];
    $login = $_SESSION['user'][0];
    if (!empty($message)){
        saveUserData($login, $message, $img);
    }

}
//$array = explode("\n", $allMessages);
foreach ($allMessages as $datas) {
    $data = explode(" | ", $datas);

    if ($_SESSION['user'][0] == $data[0]){
        file_put_contents('img.txt', $data[3]);

    }
}
if (empty($_SESSION['user']['img'])){
    $newName = file_get_contents('img.txt');
    $_SESSION['user']['img'] = $newName;
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
    <title>Newchat</title>
</head>
<body>

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-10">
            <div class="d-flex justify-content-between mb-3">
            <h4>Welcome <?=$_SESSION['user'][0];?></h4>
                <a class="btn btn-danger" href="logout.php">Log Out</a>
            </div>
            <div class="box bg-light">

                <?php if (!empty(allGetMessage())){
                    foreach ($allMessages as $allMessage):
                        $userData = getUserMessage($allMessage);
                        ?>
                    <div class="my-5">
                        <div class="d-flex">
                            <h6 style="margin-right: 200px"><?=$userData[0]; ?></h6>
                            <span style="font-size: 12px"><?=$userData[2]; ?></span>
                        </div>
                        <div class="message_item">
                            <div>
                                <div class="row">
                                    <div class='img col-md-2'>
                                        <img src='<?='files/' .$userData[3]; ?>'>
                                    </div>
                                    <div class="col-md-auto">
                                        <div class="card-body card_text  bg-info" style="border-radius: 18px 18px 18px 0" >
                                            <div>
                                            <?=$userData[1]; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; }  ?>
            </div>
            <form method="post">
                <input name="img" type="text" hidden value="<?= $_SESSION['user']['img'] ?>">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <input class="form-control w-75 my-4" autofocus type="text" name="message" placeholder="Message...">
                        <button class="btn btn-success w-25" >Send</button>
                        </div>

                    </div>

                </div>

            </form>
        </div>

    </div>

</div>

<script>
    document.querySelector('.box').scrollTo(0,9999)
</script>
</body>
</html>
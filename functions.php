<?php

session_start();

date_default_timezone_set("Asia/Tashkent");


function debug($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

function allGetMessage(){
    $file = 'message.txt';
    if (is_file($file)){
        $fileData = file_get_contents($file);
        return explode("\n", $fileData);
    }
    return null;
}

function getUserMessage($messageString){
    return explode(" | ", $messageString);
}
function saveUserData($login, $message, $img){
    $time = date("d-m-Y  H:i");
    $userMessage = "$login | $message | $time | $img\n";
    file_put_contents('message.txt', $userMessage, FILE_APPEND);
    header('refresh:0');
}



// SIGN IN FILE_PUT_CONTENT

function signin($signin, $newpassword){
    $file = 'userData.txt';
    if (is_file($file)) {
        $userData = "$signin | $newpassword\n";
        file_put_contents('userData.txt', $userData, FILE_APPEND);
        $array = explode("\n", file_get_contents('userData.txt'));

        foreach ($array as $data) {
            $new1 = explode(" | ", $data);
            if ($new1[0] == $signin && $new1[1] == $newpassword) {
                $_SESSION['user'] = $new1;
                return true;
            }

        }

    }
}

//  LOG IN

function login($login, $password)
{
    $array = explode("\n", file_get_contents('userData.txt'));

    foreach ($array as $data) {
        $new1 = explode(" | ", $data);
        if ($new1[0] == $login && $new1[1] == $password) {
            $_SESSION['user'] = $new1;
            return true;
        }

    }
}

function login2($login){
    $array = explode("\n", file_get_contents('message.txt'));

    foreach ($array as $data){
        $new = explode(' | ', $data);
        if ($new[0] == $login){
            $_SESSION['user']['img'] = $new[3];
            return true;
        }
    }
}

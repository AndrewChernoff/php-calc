<?php

//var_dump($_SERVER['REQUEST_METHOD']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $firstName = htmlspecialchars($_POST["firstname"]);
    $lastName = htmlspecialchars($_POST["lastname"]);
    $pets = htmlspecialchars($_POST["favouritepet"]);

    if(empty($firstName) || empty($lastName) || empty($pets)) {
        header('Location: ../index.php');
        exit();
    }

    header('Location: ../index.php');
} else {
    header('Location: ../index.php');
}
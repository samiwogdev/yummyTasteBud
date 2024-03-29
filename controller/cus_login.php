<?php

include_once '../convig.php';
if (NULL !== filter_input(INPUT_GET, "n")) {
    $shop_id = filter_input(INPUT_GET, "n");

    if (!isset($_POST['cus_login'])) {
        header("location: ../signin?info=invalid1&n=" . $shop_id);
        exit;
    }
    if (!isset($_POST['email']) || !isset($_POST['password'])) {
        header("location: ../signin?info=empty&n=" . $shop_id);
        exit;
    }

    $email = filter_input(INPUT_POST, "email");
    $password = filter_input(INPUT_POST, "password");

    $customer = Customer::getInstance();
    if ($customer->userLogin($email, $password)) {
        $_SESSION['email'] = $email;
        header("location: ../shop-details?info=loginSuccessful&n=" . $shop_id);
        exit;
    } else {
        header("location: ../signin?info=invalidUser&n=" . $shop_id);
        exit;
    }
} else {
    if (!isset($_POST['cus_login'])) {
        header("location: ../signin?info=invalid1");
        exit;
    }
    if (!isset($_POST['email']) || !isset($_POST['password'])) {
        header("location: ../signin?info=empty");
        exit;
    }
    $email = filter_input(INPUT_POST, "email");
    $password = filter_input(INPUT_POST, "password");

    $customer = Customer::getInstance();
    if ($customer->userLogin($email, $password)) {
        $_SESSION['email'] = $email;
        header("location: ../?info=loginSuccessful");
        exit;
    } else {
        header("location: ../signin?info=invalidUser");
        exit;
    }
}


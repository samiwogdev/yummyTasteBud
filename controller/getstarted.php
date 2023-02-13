<?php

include_once '../convig.php';
if (NULL !== filter_input(INPUT_GET, "n")) {
    $shop_id = filter_input(INPUT_GET, "n");

    if (!isset($_POST['getStarted'])) {
        header("location: ../signup?info=invalid1&n=" . $shop_id);
        exit;
    }

    if (!isset($_POST['fullname']) || !isset($_POST['phone']) || !isset($_POST['email']) || !isset($_POST['address']) || !isset($_POST['password'])) {
        header("location: ../signup?info=empty&n=" . $shop_id);
        exit;
    }

    $fullname = filter_input(INPUT_POST, "fullname");
    $phone = filter_input(INPUT_POST, "phone");
    $email = filter_input(INPUT_POST, "email");
    $address = filter_input(INPUT_POST, "address");
    $password = filter_input(INPUT_POST, "password");

    $customer = Customer::getInstance();
    $phone_check = $customer->checkPhone($phone);
    $email_check = $customer->checkEmail($email);

    if ($email_check > 0) {
        header("location: ../signup?info=invalid2&n=" . $shop_id);
        exit;
    }

    if ($phone_check > 0) {
        header("location: ../signup?info=invalid3&n=" . $shop_id);
        exit;
    }

    $customer->add($fullname, $phone, $email, $address, $password);
    $_SESSION['email'] = $email;
    header("location: ../shop-details?info=success&n=" . $shop_id);
    exit;
} else {
    if (!isset($_POST['getStarted'])) {
        header("location: ../signup?info=invalid1");
        exit;
    }

    if (!isset($_POST['fullname']) || !isset($_POST['phone']) || !isset($_POST['email']) || !isset($_POST['address']) || !isset($_POST['password'])) {
        header("location: ../signup?info=empty");
        exit;
    }

    $fullname = filter_input(INPUT_POST, "fullname");
    $phone = filter_input(INPUT_POST, "phone");
    $email = filter_input(INPUT_POST, "email");
    $address = filter_input(INPUT_POST, "address");
    $password = filter_input(INPUT_POST, "password");

    $customer = Customer::getInstance();
    $phone_check = $customer->checkPhone($phone);
    $email_check = $customer->checkEmail($email);

    if ($email_check > 0) {
        header("location: ../signup?info=emailExist");
        exit;
    }

    if ($phone_check > 0) {
        header("location: ../signup?info=phoneExist");
        exit;
    }

    $customer->add($fullname, $phone, $email, $address, $password);
    $_SESSION['email'] = $email;
    header("location: ../shop-details?info=success");
    exit;
}


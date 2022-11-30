<?php

include_once '../convig.php';

if (NULL !== filter_input(INPUT_GET, "n")) {
    $shop_id = filter_input(INPUT_GET, "n");

    if (!isset($_POST['login_but'])) {
        header("location: ../signin?info=invalid?n=" . $shop_id);
        exit;
    }
    if (!isset($_POST['email']) || !isset($_POST['password'])) {
        header("location: ../signin?info=empty?n=" . $shop_id);
        exit;
    }

    $email = filter_input(INPUT_GET, "email");
    $password = filter_input(INPUT_GET, "password");
    $customer = Customer::getInstance();
    if ($customer->userLogin($email, $password)) {
        $_SESSION['email'] = $email;
        header("location: ../shop-details?info=success?n=" . $shop_id);
        exit;
    } else {
        header("location: ../signin?info=invalid?n=" . $shop_id);
        exit;
    }
}
 else {
    echo 'checking';
    exit;
}


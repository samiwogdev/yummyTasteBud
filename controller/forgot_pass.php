<?php

include_once '../convig.php';

    if (!isset($_POST['forgot_pass'])) {
        header("location: ../forgot_pass?info=invalid");
        exit;
    }
    if (!isset($_POST['email'])) {
        header("location: ../forgot_pass?info=empty");
        exit;
    }
    $email = filter_input(INPUT_POST, "email");

    $customer = Customer::getInstance();
    if ($customer->checkEmail($email) == 1) {
        $_SESSION['email'] = $email;
        header("location: ../reset");
        exit;
    } else {
        header("location: ../forgot_pass?info=emailInvalid");
        exit;
    }



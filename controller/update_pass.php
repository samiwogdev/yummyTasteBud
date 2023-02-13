<?php

include_once '../convig.php';

    if (!isset($_POST['updt_pass'])) {
        echo '1'; exit;
        header("location: ../reset?info=invalid");
        exit;
    }
    if (!isset($_POST['password'])) {
        echo '2'; exit;
        header("location: ../reset?info=empty");
        exit;
    }
    $email = $_SESSION['email'];
    $password = filter_input(INPUT_POST, "password");

    $customer = Customer::getInstance();
    
    if ($customer->updatePasswordByEmail($email, $password)) {
        header("location: ../signin?info=pass_success");
        exit;
    } else {
        header("location: ../reset?info=pass_failed");
        exit;
    }



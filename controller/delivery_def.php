<?php

include_once '../convig.php';
if (isset($_POST['delivery_def'])) {
    $errorMsg = "";
    $info = "";
    $city = filter_input(INPUT_POST, "location");
    $amount = filter_input(INPUT_POST, "amount");

    if (!isset($city)) {
        $errorMsg = "city_empty";
        header("location: ../admin/delivery?info=" . $errorMsg);
        exit;
    }
    
    if (!isset($amount)) {
        $errorMsg = "amount_empty";
        header("location: ../admin/delivery?info=" . $errorMsg);
        exit;
    }

    $delivery = Delivery::getInstance();
    if ($delivery->add($city, $amount)) {
        header("location: ../admin/delivery?info=success");
        exit;
    } else {
        header("location: ../admin/delivery?info=" . $errorMsg);
        exit;
    }
}


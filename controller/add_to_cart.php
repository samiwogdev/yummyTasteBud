<?php

include_once '../convig.php';
//session_destroy();
if (NULL == filter_input(INPUT_GET, "n")) {
    header("location: ../shop-details?info=invalid");
    exit;
}

$shop_id = filter_input(INPUT_GET, "n");
if (!isset($_SESSION['email'])) {
    header("location: ../signin?n=" . $shop_id);
    exit;
}
if (!isset($_POST['addcart'])) {
    header("location: ../index?info=invalid");
    exit;
}

if (NULL == filter_input(INPUT_POST, "quantity")) {
    header("location: ../shop-details?info=empty&n=" . $shop_id);
    exit;
}
$qty = filter_input(INPUT_POST, "quantity");
$order = Order::getInstance();

if ($order->add($_SESSION['email'], $shop_id, $qty, 0, 0, 0)) {
    header("location: ../cart?info=success&n=" . $shop_id);
    exit;
} else {
    header("location: ../shop-details?info=invalid&n=" . $shop_id);
    header("location: ../shop-details?info=invalid&n=" . $shop_id);
    exit;
}






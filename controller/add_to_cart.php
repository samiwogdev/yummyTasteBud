<?php

include_once '../convig.php';
//session_destroy();
if (NULL == filter_input(INPUT_GET, "n")) {
    header("location: ../shop-details?info=invalid");
    exit;
}

$shop_id = filter_input(INPUT_GET, "n");
if (!isset($_SESSION['email'])) {
    header("location: ../signin?info=login&n=" . $shop_id);
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

if ($order->add($_SESSION['email'], $shop_id, $qty)) {
    header("location: ../cart?info=cartsuccess&n=" . $shop_id);
    exit;
} else {
    header("location: ../shop-details?info=invalid&n=" . $shop_id);
    exit;
}






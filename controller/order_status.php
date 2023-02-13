<?php

include_once '../convig.php';
if (!isset($_GET['n'])) {
    header("location: ../admin/order?n=invalid");
    exit;
}

$order_status = $_GET['n'];
$shop_id = $_GET['shop_id'];
$page = $_GET['page'];

$order = Order::getInstance();
if ($order_status == 1) {
    if ($order->updateOrderStatus($order_status, $shop_id)) {
        header("location: ../admin/" . $page . "?n=success");
    } else {
        header("location: ../admin/" . $page . "?n=failed");
    }
}

if ($order_status == 2) {
    if ($order->updateOrderStatus($order_status, $shop_id)) {
        header("location: ../admin/" . $page . "?n=success");
    } else {
        header("location: ../admin/" . $page . "?n=failed");
    }
}

if ($order_status == 3) {
    if ($order->updateOrderStatus($order_status, $shop_id)) {
        header("location: ../admin/" . $page . "?n=success");
    } else {
        header("location: ../admin/" . $page . "?n=failed");
    }
}




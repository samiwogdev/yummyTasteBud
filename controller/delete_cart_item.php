<?php

include_once '../convig.php';
if (isset($_GET['n'])) {
    $id = filter_input(INPUT_GET, "n");
    $order = Order::getInstance();

    if ($order->delete($id)) {
        header("location: ../cart?info=del_success");
        exit;
    } else {
        header("location: ../cart?info=invalid");
        exit;
    }
} else {
    header("location: ../cart?info=invalid");
    exit;
}

<?php

include_once '../convig.php';
if (isset($_POST['updt_cart_item'])) {
    $order = Order::getInstance();
    foreach ($_POST as $key => $value) {
        $id = substr($key, 9);
        $qty = $value;
        if ($key !== "updt_cart_item") {
            echo $id . " => " . $qty . "</br>";
            $order->updateQty($id, $qty);
        }
    }
    header("location: ../cart?info=success");
    exit;
} else {
    header("location: ../index");
    exit;
}



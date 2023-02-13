<?php

include_once '../convig.php';
if (isset($_POST['updt_cart_item'])) {
    $order = Order::getInstance();
    foreach ($_POST as $key => $value) {
        $id = substr($key, 9);
        $qty = $value;
        if ($key !== "updt_cart_item") {
            if ($qty == "" || $qty == 0) {
                $qty = 1;
            }
            echo $id . " => " . $qty . "</br>";
            $order->updateQty($id, $qty);
        }
    }
    header("location: ../cart?info=cart_updt_success");
    exit;
} else {
    header("location: ../index");
    exit;
}



<?php

include_once '../convig.php';
if (null == filter_input(INPUT_GET, "n")) {
    header("location: ../index");
}
$id = filter_input(INPUT_GET, "n");
if (!is_numeric($id)) {
    header("location: ../checkout?info=invalid");
}
$order_deliv_loaction = Order::getInstance();
$del_location_id_temp = filter_input(INPUT_GET, "n");
$del_location_id = Order::sanitize_input($del_location_id_temp);
$customer_email = $_SESSION['email'];

if ($order_deliv_loaction->updateDeliveryID($del_location_id, $customer_email)) {
    header("location: ../checkout?info=upt_success&n=$del_location_id");
} else {
    header("location: ../checkout?info=invalid");
}
?>

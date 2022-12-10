<?php
include_once '../convig.php';

if (null == filter_input(INPUT_GET, "n")) {
    header("location: ../admin/delivery?info=invalid");
}

$id = filter_input(INPUT_GET, "n");
if (!is_numeric($id)) {
    header("location: ../admin/delivery?info=invalid");
}

$deliver = Delivery::getInstance();
if(isset($_POST['delivery_update'])) {
    $errorMsg = "";
    $city = filter_input(INPUT_POST, "city");
    $amount = filter_input(INPUT_POST, "amount");
    
    if (!isset($city)) {
        $errorMsg = "city_empty";
        header("location: ../admin/delivery?info=" . $errorMsg);
        exit;
    }
    if (!isset($amount)) {
        $errorMsg = "amount_empty";
        header("location: ../admin/deliverys?info=" . $errorMsg);
        exit;
    }
    
    if ($deliver->update($id, $city, $amount)) {
        header("location: ../admin/delivery?info=upt_success");
    } else {
        header("location: ../admin/delivery?info=" . $errorMsg);
    }
} else {
    header("location: ../admin/delivery?info=invalid");
}
?>
